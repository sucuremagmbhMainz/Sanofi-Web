
 declare var $:any;


 /*/////////////////////////Resize needs rework ////////////////////////////////////////////////////

 function getClosest(elem, selector) {
     // Element.matches() polyfill
     if (!Element.prototype.matches) {
         Element.prototype.matches =
             Element.prototype.matchesSelector ||
             Element.prototype.mozMatchesSelector ||
             Element.prototype.msMatchesSelector ||
             Element.prototype.oMatchesSelector ||
             Element.prototype.webkitMatchesSelector ||
             function(s) {
                 var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                     i = matches.length;
                 while (--i >= 0 && matches.item(i) !== this) {}
                 return i > -1;
             };
     };

     // Get the closest matching element
     for ( ; elem && elem !== document; elem = elem.parentNode ) {
         if ( elem.matches( selector ) ) return elem;
     }
     return null;
 };*/

if (!HTMLElement.prototype.closest) HTMLElement.prototype.closest = function (classKey: String) {
    var el = this;
    while (el) {
        if (el.classList.contains(classKey)) {
            return el;
        }
        el = el.parentElement;
    }
};

class Vec2 {
    public x:number;
    public y:number;
}

class IlumeBackend {

    private bodyNode:HTMLDivElement = null;
    private mutationObserver:MutationObserver = null;
    private repeaterObserver:MutationObserver = null;

    private layoutCanvas:HTMLElement = null;
    private displayFrame:HTMLElement = null;
    private frameHolder:HTMLElement = null;
    private previewFrame:HTMLIFrameElement = null;

    private previewVertResizeDragActive:boolean = false;

    private mousePos:Vec2= new Vec2();
    private dragStartPos:Vec2 = new Vec2();

    private vertLineBasePos:number = 0;
    private previewTransformActive:boolean;

    constructor() {

        // we rely on nodeList.foreach(), since this is not supported in IE11 we shall add a polyfill
        if ('NodeList' in window && !NodeList.prototype.forEach) {
            NodeList.prototype.forEach = function (callback, thisArg) {
                thisArg = thisArg || window;
                for (var i = 0; i < this.length; i++) {
                    callback.call(thisArg, this[i], i, this);
                }
            };
        }

        // we just observe the whole body content of the layout
        // this shall be enough to get and trigger changes we may need
        // since we removed all other tabs, we can simply check for the tab-content in the layout row
        this.bodyNode = document.querySelector('.tab-content.layout-row');
        if (this.bodyNode === null) {
            return;
        }

        // add the mutationObserver (main element + children - repeater - observer
        this.mutationObserver = new MutationObserver(this.observerListener);
        this.repeaterObserver = new MutationObserver(this.childRepeaterObserver);

        // we observe everything
        this.mutationObserver.observe(this.bodyNode, {
            childList: true,
            //subtree: true <-- decreases the performance too much -> we shall only use the direct children
        });


    }

    strToSlug = (str: string) => {
        str = str.replace(/^\s+|\s+$/g, '');

        // Make the string lowercase
        str = str.toLowerCase();

        // Remove accents, swap ñ for n, etc
        var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆÍÌÎÏŇÑÓÖÒÔÕØŘŔŠŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇíìîïňñóöòôõøðřŕšťúůüùûýÿžþÞĐđßÆa·/_,:;";
        var to   = "AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        // Remove invalid chars
        str = str.replace(/[^a-z0-9 -]/g, '')
            // Collapse whitespace and replace by -
            .replace(/\s+/g, '-')
            // Collapse dashes
            .replace(/-+/g, '-');

        return str;
    };


    processIconNode = (node:HTMLElement, index: number) => {
        const iconClass = node !== null ? node.getAttribute('data-icon') : null;

        if (iconClass !== null) {
            let titleNode = node.querySelector('.field-section:first-child > h4');
            if (titleNode !== null) {
                if (titleNode.getAttribute('icon-done')) {return; } // we don't want duplicates
                titleNode.setAttribute('icon-done',"true");
                titleNode.innerHTML = '<i class="list-icon ' + iconClass + '"></i>' + titleNode.innerHTML;
            }
        }

    };

    processColorTooltip = (node:HTMLElement, index:number) => {
        $(node).tooltip({
            title: function() {
                const dataHexColor = this.getAttribute("data-hex-color");
                if (dataHexColor != "default-theme") {
                    const $colorEntry = this.closest('.color-entry');
                    if ($colorEntry !== null) {
                        const bgColor = $colorEntry.style.backgroundColor;
                        if (bgColor.length > 0) {
                            return bgColor;
                        } else {
                            return "undefined";
                        }
                    }
                } else {
                    return dataHexColor;
                }
            },
            content: function() {
                const bgColor = this.style.backgroundColor;
                if (bgColor.length > 0) {
                    // return bgColor;
                    return "-";
                }
            }
        });


    };

    processNodeTitle = (node:HTMLElement) => {

        const parentWithHeadClass = node.closest('.form-group');
        if (parentWithHeadClass !== null) {
            const nodeParentLi = node.closest('li');
            if (nodeParentLi !== null) {
                const collapsedTitleNode = nodeParentLi.querySelector('.repeater-item-collapsed-title');
                if (collapsedTitleNode !== null) {
                    if (parentWithHeadClass.classList.contains('block-head')) {
                        collapsedTitleNode.classList.add('block-head');
                    } else {
                        parentWithHeadClass.classList.add('section-sub-head');
                        collapsedTitleNode.classList.add('element-head');
                    }
                }
            }
        }

    };

    processRepeaterChildren = (node:HTMLLIElement, index:number)  => {

        // this method does multiple things
        // 1. Add Icons to section headlines
        // 2. add tooltips to colorpicker entries
        // 3. toggle the initial state for the repeater children
        // 4. toggle the controls

        // if this node was already processed in the past we can just ignore it
        if (node.getAttribute('ilume-node-processed')) {
            return;
        }

        // ensure we don't process the node twice
        node.setAttribute('ilume-node-processed', "true");

        // [1]
        let iconNodes = node.querySelectorAll('[data-icon]');
        if (iconNodes !== null && iconNodes.length > 0) {
            iconNodes.forEach(this.processIconNode)
        }

        // [2] (Re)initialize color tooltips
        // Required to enable tooltips newly created colorpicker-elements
        let toolTipNodes = node.querySelectorAll('.field-colorpicker li');
        if (toolTipNodes !== null && toolTipNodes.length > 0) {
            toolTipNodes.forEach(this.processColorTooltip)
        }

        // [3]
        // since the Label is empty by default, we need to take care of setting the collapsed label
        let topicTitle:HTMLElement = node.querySelector('.field-section h4');

        if (topicTitle != null) {
            this.processNodeTitle(topicTitle);
        }

        let titleNode = node.querySelector('.repeater-item-collapsed-title');
        let inputTitleNode = node.querySelector('input[type="text"]') as HTMLInputElement;

        if (inputTitleNode === null) {
            inputTitleNode = node.querySelector('textarea') as HTMLTextAreaElement;
        }

        if (inputTitleNode === null) {
            return;
        }

        let beforeContent = '';
        if (topicTitle !== null) {
            let beforeElement = node.querySelector('.field-section h4:before');
            beforeContent = beforeElement !== null ? beforeElement.innerHTML : '';
        }

        var contentHint = (inputTitleNode !== null && inputTitleNode.hasOwnProperty('value') !== undefined && inputTitleNode.value.length > 0 ? inputTitleNode.value.trim() : '');

        // Strip tags
        contentHint = contentHint.replace(/<[^>]*>/gi, "");
        contentHint = contentHint.substring(0, 30).trim() + (inputTitleNode.value.length > 30 ? '...' : '');

        if (contentHint.length > 0) {
            contentHint = '(' + contentHint + ')';
        }

        titleNode.innerHTML = beforeContent + (topicTitle ? topicTitle.innerHTML : '') + ' <span style="color:#999;font-style: italic;">' + contentHint + '</span>';

        // we use the index to define which elements should be shown
        // the first element shall be visible by default
        // you may add another check for a class here if you want to disable the behavior
        if (!node.classList.contains('collapsed') && index !== 0) {
            node.classList.add('collapsed');
        }

        // [4]
        // get the field controls, they all shall have an attribute "ilume-toggle"
        const toggleFields = node.querySelectorAll('[ilume-toggle]');
        toggleFields.forEach(this.processFormElements)

    };

    processFormElements = (node:HTMLElement, index:number) => {

        // if this node was already processed in the past we can just ignore it
        if (node.getAttribute('ilume-toggle-processed')) {
            return;
        }

        // ensure we don't process the node twice
        node.setAttribute('ilume-toggle-processed', "true");

        // first we check if we have a label node
        // depending on if the node is available we shall configure the state
        const labelNode = node.querySelector('label');
        if (labelNode != null) {
            this.processFormField(node, labelNode);
            return;
        }

        const titleNode = node.querySelector('.field-section h4')
        if (titleNode != null) {
            this.processFormSection(node, titleNode as HTMLElement);
        }
    };

    processFormField = (node: HTMLElement, fieldTitleNode: HTMLElement) => {

        // every control shall have at least a silbing
        let nextToggleChild = fieldTitleNode.nextElementSibling;

        if (nextToggleChild == null) {return;}

        let state = "active";
        let currentContent = fieldTitleNode.innerHTML;

        // we shall allow an default state
        if (node.getAttribute('ilume-hidden') !== null) {
            nextToggleChild.classList.add('hidden');

            state = "inactive";
            currentContent = "<i class=\"icon-chevron-right\" ilume-togglestate='"+state+"'></i> " + currentContent;
        } else {
            currentContent = "<i class=\"icon-chevron-down\" ilume-togglestate='"+state+"'></i> " + currentContent;
        }

        // ugly but we do it inline
        let that = this;

        fieldTitleNode.innerHTML = currentContent;
        fieldTitleNode.addEventListener('click', function(event: Event) {
            that.toggleElement(event, 'field');
        });

        node.classList.add('hasToggle');
    };

    processFormSection = (node: HTMLElement, sectionTitleNode: HTMLElement) => {

        // every control shall have at least a silbing
        var nextToggleChild = node.nextElementSibling;

        if (nextToggleChild == null) {return;}

        let state = "active";
        var currentContent = sectionTitleNode.innerHTML;
        let toggleKey = this.strToSlug(currentContent);

        node.setAttribute('toggle-key-main', toggleKey);

        let isToggleContentHidden = node.getAttribute('ilume-hidden') !== null;

        if (!isToggleContentHidden) {
            node.classList.add('ilume-toggle-open');
        }

        while (nextToggleChild !== null && (!nextToggleChild.classList.contains('section-field') || nextToggleChild.classList.contains('section-split'))) {
            if (isToggleContentHidden) {
                nextToggleChild.classList.add('hidden');
            }
            nextToggleChild.setAttribute('toggle-key-sub', toggleKey);
            nextToggleChild = nextToggleChild.nextElementSibling;
        }

        // we shall allow an default state
        if (isToggleContentHidden) {
            state = "inactive";
            currentContent = "<i class=\"icon icon-chevron-right\" ilume-togglestate='"+state+"'></i> " + currentContent;
        } else {
            currentContent = "<i class=\"icon icon-chevron-down\" ilume-togglestate='"+state+"'></i> " + currentContent;
        }

        // ugly but we do it inline
        let that = this;

        sectionTitleNode.innerHTML = currentContent;
        node.addEventListener('click', function(event: Event) {
            that.toggleElement(event, 'section');
        });

        node.classList.add('hasToggle');
    };

    toggleElement = (event:Event, toggleType:string) => {

        // typecast EventTarget to Element
        let target = <Element>event.currentTarget;
        let nextToggleSibling = target.nextElementSibling;

        // if we don't have a sibling element we can just ignore it
        if (nextToggleSibling === null) {
            return;
        }

        let stateDisplayNode = target.querySelector('[ilume-togglestate]');
        let state = stateDisplayNode.getAttribute('ilume-togglestate');

        // lazy evaluation, we just toggle the class and remove booth possible icon styles
        if (toggleType == 'field') {
            // if we have a simple field toggle, just toggle the next sibling
            nextToggleSibling.classList.toggle('hidden');
        } else {
            // if we have a section toggle, first fetch the section toggle key
            let toggleKey = target.getAttribute('toggle-key-main');

            if (toggleKey == null || toggleKey.length == 0) {
                return;
            }

            // find all toggle siblings, which refer the toggle key as "toggle-key-sub" of the triggered element
            let toggleSiblings = target.parentNode.querySelectorAll('[toggle-key-sub="' + toggleKey + '"]');

            if (toggleSiblings !== null) {
                target.classList.toggle('ilume-toggle-open');

                toggleSiblings.forEach(function (node: HTMLElement) {
                    node.classList.toggle('hidden');
                });
            }
        }
        stateDisplayNode.classList.remove('icon-chevron-right');
        stateDisplayNode.classList.remove('icon-chevron-down');

        if (state == "active") {
            stateDisplayNode.setAttribute('ilume-togglestate', 'inactive');
            stateDisplayNode.classList.add('icon-chevron-right');
        } else if (state == "inactive") {
            stateDisplayNode.setAttribute('ilume-togglestate', 'active');
            stateDisplayNode.classList.add('icon-chevron-down');
        }
    };

    processChildRepeaterNodes = (node:HTMLElement, index:number) => {

        if (node.getAttribute('ilume-r-processed')) {
            return;
        }

        // we don#'t want it twice :)
        node.setAttribute('ilume-r-processed',"true");

        const repeaterMainNodes = node.querySelectorAll('.field-repeater-items');

        // ugly but we do it inline
        let that = this;

        if (repeaterMainNodes !== null && repeaterMainNodes.length > 0) {

            repeaterMainNodes.forEach(function (innerNode) {
                that.repeaterObserver.observe(innerNode, {
                    childList: true,
                    //subtree: true
                });

                // we must process these as well :)
                // so more recursion.. anyway, the speed improvement is worth the mess
                const repeaterChildren = innerNode.querySelectorAll('li.field-repeater-item');
                repeaterChildren.forEach(that.processRepeaterChildren);

                // nested, nested, nested
                const children = innerNode.querySelectorAll('.field-repeater');
                if (children !== null && children.length > 0) {
                    children.forEach(that.processChildRepeaterNodes)
                }


            })
        }

    };

    childRepeaterObserver = (mutationsList:any, observer:MutationObserver) => {

        // we do receive a list of "changed" / "added" / "removed" elements
        for(let mutation of mutationsList) {

            // we may are a child item, let us process our self
            if (mutation.target.classList.contains('field-repeater-item')) {
                this.processRepeaterChildren(mutation.target, 0);
            }

            // re-add other elements as well, if defined -> maybe we're nested?
            if (mutation.target.classList.contains('field-repeater-items')) {
                const repeaterChildren = mutation.target.querySelectorAll('li.field-repeater-item');
                repeaterChildren.forEach(this.processRepeaterChildren);

                // in case we added another repeater
                const children = mutation.target.querySelectorAll('.field-repeater');
                if (children !== null && children.length > 0) {
                    children.forEach(this.processChildRepeaterNodes)
                }
            }

        }

    };

    doPreviewinIframe = (event:Event) => {

        const clickTarget:any = event.currentTarget;

        // console.log(clickTarget, this.previewFrame, clickTarget.href);

        if (this.previewFrame !== null) {
            event.preventDefault();
            event.stopPropagation();
            this.previewFrame.src = clickTarget.href;
        }


    };

    iframeLoadDone = (event:Event) => {
        if (this.previewFrame == null || this.previewFrame.src == "") {
            return;
        }

        // console.log(event.target, this.previewFrame.src);

        if (this.displayFrame !== null) {
          //  this.displayFrame.style.display = "block";
            this.layoutCanvas.style.height = "50%";
            this.layoutCanvas.style.overflowY = "scroll";
            this.layoutCanvas.style.minHeight = "auto";
            this.displayFrame.style.height  = "50%";
        }

    };

    closeIframePreview = (event:Event) => {
        const clickTarget:any = event.currentTarget;

        // console.log(clickTarget);

        if (clickTarget !== null) {
            event.preventDefault();
            event.stopPropagation();


            if (this.displayFrame !== null) {
               // this.displayFrame.style.display = "none";
                this.layoutCanvas.style.height = "100%";
                this.layoutCanvas.style.minHeight = "100%";
                this.displayFrame.style.height  = "0%";
            }
        }


    };

    makeIframeMobile = (event:Event) => {
        const clickTarget:any = event.currentTarget;

        // console.log(clickTarget);

        if (clickTarget !== null) {
            event.preventDefault();
            event.stopPropagation();

           if(this.displayFrame !== null) {
                this.layoutCanvas.style.height= "50%"
                this.layoutCanvas.style.overflowY = "scroll";
                this.layoutCanvas.style.minHeight = "auto";
                this.displayFrame.style.height  = "50%";
                this.previewFrame.style.width = "40%";
            }
        }
    };

    makeIframeTablet = (event:Event) => {
        const clickTarget:any = event.currentTarget;

        // console.log(clickTarget);

        if (clickTarget !== null) {
            event.preventDefault();
            event.stopPropagation();

           if(this.displayFrame !== null) {
                this.layoutCanvas.style.height= "50%";
                this.layoutCanvas.style.overflowY = "scroll";
                this.layoutCanvas.style.minHeight = "auto";
                this.displayFrame.style.height  = "50%";
                this.previewFrame.style.width = "75%";
            }
        }
    };

    makeIframeNormal = (event:Event) => {
        const clickTarget:any = event.currentTarget;

        // console.log(clickTarget);

        if (clickTarget !== null) {
            event.preventDefault();
            event.stopPropagation();

           if(this.displayFrame !== null) {
                this.layoutCanvas.style.height= "50%";
                this.layoutCanvas.style.overflowY = "scroll";
                this.layoutCanvas.style.minHeight = "auto";
                this.displayFrame.style.height  = "50%";
                this.previewFrame.style.width = "100%";
            }
        }
    };

    openInNewTab = (event:Event) => {
        const clickTarget:any = event.currentTarget;

        // console.log(clickTarget);

        if (clickTarget !== null) {
            event.preventDefault();
            event.stopPropagation();
            var taburl = this.previewFrame.src;
            window.open(taburl);

        }
    };

    observerListener = (mutationsList:any, observer:MutationObserver) => {

        let that = this;

        if (this.layoutCanvas === null) {

            const layoutCanvas:HTMLElement = document.querySelector('#layout-canvas');

            if (layoutCanvas !== null) {

                this.layoutCanvas = layoutCanvas;

                const frameHolder:HTMLElement = document.createElement('div');
                const displayFrame:HTMLIFrameElement = document.createElement('iframe');

                frameHolder.classList.add('frame-holder');
               // frameHolder.style.display = "none";


                frameHolder.appendChild(displayFrame);

                const closeBtn:HTMLElement = document.createElement('div');
                closeBtn.classList.add('preview-close-btn');

                const closeIcon:HTMLElement = document.createElement('i');
                closeIcon.classList.add('fa', 'fa-times');
                closeBtn.appendChild(closeIcon);

                const mobileBtn:HTMLElement = document.createElement('div');
                mobileBtn.classList.add('mobile-btn');

                const mobileIcon:HTMLElement = document.createElement('i');
                mobileIcon.classList.add('fa', 'fa-mobile');
                mobileBtn.appendChild(mobileIcon);

                const tabeltBtn:HTMLElement = document.createElement('div');
                tabeltBtn.classList.add('tablet-btn');

                const tabeltIcon:HTMLElement = document.createElement('i');
                tabeltIcon.classList.add('fa', 'fa-tablet');
                tabeltBtn.appendChild(tabeltIcon);

                const normalBtn:HTMLElement = document.createElement('div');
                normalBtn.classList.add('normal-btn');

                const normalIcon:HTMLElement = document.createElement('i');
                normalIcon.classList.add('fa', 'fa-desktop');
                normalBtn.appendChild(normalIcon);

                const newTabBtn:HTMLElement = document.createElement('div');
                newTabBtn.classList.add('new-tab-btn');

                const newTabIcon:HTMLElement = document.createElement('i');
                newTabIcon.classList.add('fa', 'fa-external-link');
                newTabBtn.appendChild(newTabIcon);

                const previewMenuBar:HTMLElement = document.createElement('div');
                previewMenuBar.classList.add('frame-holder-bar');

                const resizeVertDragline:HTMLElement = document.createElement('div');
                resizeVertDragline.classList.add('preview-vert-dragline');
                previewMenuBar.appendChild(resizeVertDragline);

/*/////////////////////////Resize needs rework ////////////////////////////////////////////////////


                that.previewVertResizeDragActive = false;

                resizeVertDragline.addEventListener('mousedown', function(event: MouseEvent) {
                    let parentFrameHolder:HTMLElement = this.closest('.frame-holder');

                    if (parentFrameHolder !== null) {

                        that.mousePos.x = event.offsetX;
                        that.mousePos.y = event.offsetY;

                        that.dragStartPos = that.mousePos;

                        that.vertLineBasePos = parentFrameHolder.offsetTop;

                        that.previewVertResizeDragActive = true;

                    }
                });

                /*resizeVertDragline.addEventListener('mouseup', this.displayFrameSetter);

                document.addEventListener('mousemove', function(event: MouseEvent) {
                    if (that.previewVertResizeDragActive) {
                        let body:HTMLElement = document.querySelector('body');

                        if (that.frameHolder !== null && body !== null) {
                            that.mousePos.x = event.offsetX;
                            that.mousePos.y = event.offsetY;

                            let difVec:Vec2 = new Vec2();
                            difVec.x = that.mousePos.x - that.dragStartPos.x;
                            difVec.y = that.mousePos.y - that.dragStartPos.y;

                            let previewHolderPos = that.vertLineBasePos + difVec.y;
                            that.frameHolder.style.height = body.style.height + "-" + previewHolderPos.toString();
                            //console.log(body.style.height  -  previewHolderPos.toString());//
                            let offsetHeight = that.frameHolder.offsetHeight;
                            console.log(offsetHeight , previewHolderPos);
                        }
                    }

                }); */

                frameHolder.appendChild(previewMenuBar);

                frameHolder.appendChild(newTabBtn);
                newTabBtn.addEventListener("click", this.openInNewTab);

                frameHolder.appendChild(normalBtn);
                normalBtn.addEventListener("click", this.makeIframeNormal);

                frameHolder.appendChild(tabeltBtn);
                tabeltBtn.addEventListener("click", this.makeIframeTablet);

                frameHolder.appendChild(mobileBtn);
                mobileBtn.addEventListener("click", this.makeIframeMobile);

                frameHolder.appendChild(closeBtn);
                closeBtn.addEventListener("click", this.closeIframePreview);

                displayFrame.addEventListener("load", this.iframeLoadDone);

                document.body.appendChild(frameHolder);
                this.previewFrame = displayFrame;
                this.displayFrame = frameHolder;
                this.frameHolder = frameHolder;

            }
        }

        // const previewButtons = document.querySelectorAll("a[data-control='preview-button']");
        //
        // previewButtons.forEach(function (previewButtonNode:HTMLElement, index:number) {
        //     if (previewButtonNode !== null) {
        //         if (!previewButtonNode.getAttribute('ib-process')) {
        //             previewButtonNode.addEventListener("click", that.doPreviewinIframe);
        //             previewButtonNode.setAttribute('ib-process',"true")
        //         }
        //     }
        // });

        // we do receive a list of "changed" / "added" / "removed" elements
        for(let mutation of mutationsList) {

            // we may have children, lets use them
            const children = mutation.target.querySelectorAll('.field-repeater');

            if (children !== null && children.length > 0) {
                children.forEach(this.processChildRepeaterNodes)
            }

            // we check if the newly added element is a repeater-item
            if (mutation.target.classList.contains('field-repeater-items')) {
                const repeaterChildren = mutation.target.querySelectorAll('li.field-repeater-item');
                repeaterChildren.forEach(this.processRepeaterChildren);
            }

            // just for reference
            // we only care about the repeater controls -
            // as a nice side effect, we can use the result to toggle all elements as well
            // if (!(mutation.target.getAttribute('data-control') !== null && !mutation.target.classList.contains('field-repeater'))) {
            //     console.log(mutation.target, "continue");
            //     continue;
            // }

            // lets get the inner ul, if we don't have that we shall not continue
            const repeaterParent = mutation.target.querySelector('ul.field-repeater-items');
            if (repeaterParent === null) {
                continue;
            }

            // we shall get all children (li) to use them and set the state
            const repeaterChildren = repeaterParent.querySelectorAll('li.field-repeater-item');
            repeaterChildren.forEach(this.processRepeaterChildren);

            processRestrictedWidgets(mutation.target);
        }

    }

/*/////////////////////////Resize needs rework ////////////////////////////////////////////////////
    displayFrameSetter = (event:Event) => {
        this.previewTransformActive = false;
        this.displayFrame.style.height = this.mousePos.y.toString();
        this.displayFrame.style.width = this.mousePos.x.toString();
    }*/


}



window['ilumeBackend'] = null;
document.addEventListener("DOMContentLoaded", function() {
    window['ilumeBackend'] = new IlumeBackend();
});
