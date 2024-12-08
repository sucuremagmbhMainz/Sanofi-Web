'use strict';

import React from 'react'

const axios = require('axios').default;

const e = React.createElement;

let loadingOverlay;
let lastLoadingCounter = 0;

class PDBList extends React.Component {
    constructor(props)
    {
        super(props);

        this.state = {
            initialized: false,
            searchedOnce: false,
            liked: false,
            filterBy: sessionStorage.getItem('lastFilterBy_' + props.preview) ?? 'products',
            lastFilterBy: undefined,
            searchTerm: sessionStorage.getItem('lastSearchTerm_' + props.preview) ?? '',
            lastSearchTerm: undefined,
            activeLetter: sessionStorage.getItem('lastActiveLetter_' + props.preview) ?? '',
            lastActiveLetter: undefined,
            letters: [],
            filteredProducts: [],
            loadingCounter: 0,
            preview: props.preview,
            generalItemHeight: 'auto',
        };
    }

    updateListSizing()
    {
        let elemLetterList = document.querySelector('#letter-list');
        if (elemLetterList != null && elemLetterList != undefined) {
            const listWidth = elemLetterList.clientWidth;

            let letterChilds = document.querySelectorAll('.letter-wrapper');
            letterChilds.forEach(function (child, index) {
                child.style.flexBasis = listWidth / (Math.floor(listWidth / 41)) + 'px';
            });

            // console.log("Width: " + listWidth + ' // Count: ' + Math.floor(listWidth / 41));
        }
    }

    resizeProductItems = () => {
        this.updateListSizing(null, null);
        this.updateLoadingOverlayPosition();
        this.updateBasicContentSize();

        const element = document.querySelector('.product-item-wrapper');
        if (element == null) {
            return };

        if (this.state.generalItemHeight != element.clientWidth) {
            this.setState({ generalItemHeight: element.clientWidth }) };
    }

    componentDidMount()
    {
        this.setState({
            started: true
        });

        window.addEventListener("keydown",  (event) => {
            if (event.keyCode == 27) {
                this.setState({
                    searchTerm: '',
                }, () => {
                    this.loadLetters();
                    this.loadProducts();
                })
            }
        }, false);

        window.addEventListener('resize',  this.resizeProductItems);
    }

    componentDidUpdate()
    {
        if (!this.state.initialized) {
            this.setState({
                initialized: true
            });

            loadingOverlay = document.querySelector('#load-overlay');
            loadingOverlay.querySelector('.bg').classList.add('animated');

            this.initData();
        }

        if (lastLoadingCounter != this.state.loadingCounter) {
            if (this.state.loadingCounter >= 1) {
                loadingOverlay.classList.add('active');
            } else {
                loadingOverlay.classList.remove('active');
            }

            lastLoadingCounter = this.state.loadingCounter;
        }

        this.resizeProductItems();
    }

    increaseLoad = () =>
    {
        this.setState({
            loadingCounter: this.state.loadingCounter+1
        });
    }

    decreaseLoad = () =>
    {
        this.setState({
            loadingCounter: Math.max(0, this.state.loadingCounter-1),
        });
    }

    updateBasicContentSize = () => {
        const prodListEl = document.querySelector('.product-list');
        const botElement = document.querySelector('footer');

        let listPos = prodListEl.getBoundingClientRect().y + window.scrollY;
        let footerHeight = botElement.getBoundingClientRect().height + 15;
        let minListHeight = Math.max(0, listPos + footerHeight);
        prodListEl.style.minHeight = 'calc(100vh - ' + minListHeight + 'px)';
    }

    updateLoadingOverlayPosition()
    {
        const topElement = document.querySelector('.toolbar-base.second');
        const botElement = document.querySelector('footer');
        const topPos = topElement.getBoundingClientRect().y + topElement.getBoundingClientRect().height;
        loadingOverlay.style.top = topPos + 'px';
        loadingOverlay.style.height = 'calc(100% - ' + (topPos + botElement.getBoundingClientRect().height) + 'px)';
        loadingOverlay.style.bottom = 0;
    }

    getFilterBy()
    {
        return this.state.filterBy == 'products' ? 'products' : 'ingredients';
    }

    setFilterBy = (value) =>
    {
        if (value == 'products' || value == 'ingredients') {
            this.setState({
                filterBy: value,
                activeLetter: '',
            }, () => {
                this.loadLetters();
                this.loadProducts();
            });
        } else {
            return;
        }

        if (value == 'products') {
            document.querySelector('#filter-ingredients').classList.remove('active');
        } else if (value == 'ingredients') {
            document.querySelector('#filter-products').classList.remove('active');
        }

        document.querySelector('#filter-' + value).classList.add('active');
    }

    initData()
    {
        this.loadLetters();
        this.loadProducts();
    }

    resetSearch = (e) => {
        this.setState({
            filterBy: 'products',
            searchTerm: '',
            activeLetter: '',
        }, () => {
            this.loadLetters();
            this.loadProducts();
        });
    }

    onSearchTextChange = (e) =>
    {
        this.setState({
            searchTerm: e.target.value,
            activeLetter: '',
        }, () => {
            this.loadLetters();
            this.loadProducts();
        });
    }

    isLetterAvailable(letterToSearch)
    {
        var isAvailable = false;

        this.state.letters.forEach(function (entry) {
            if (entry.letter == letterToSearch && entry.available) {
                isAvailable = true;
            }
        });

        return isAvailable;
    }

    onLetterToggle = (e) =>
    {
        const target = e.currentTarget;
        var letterVal = target.getAttribute('letter-val', false);
        letterVal = (letterVal != this.state.activeLetter) ? letterVal : '';

        if (letterVal !== false) {
            if (letterVal != '' && !this.isLetterAvailable(letterVal)) {
                return;
            }

            this.setState({
                activeLetter: letterVal,
                searchTerm: '',
            }, () => {
                this.loadLetters();
                this.loadProducts();
            });
        }
    }

    loadLetters()
    {
        let activeLetter = this.state.activeLetter;
        let filterBy = this.state.filterBy;
        if (!['products', 'ingredients'].includes(filterBy)) {
            return;
        }

        if (this.state.lastActiveLetter == activeLetter && this.state.lastFilterBy == filterBy) {
            return;
        }

        this.setState({
            lastActiveLetter: activeLetter,
            lastFilterBy: filterBy,
        }, function () {
            sessionStorage.setItem('lastActiveLetter_' + this.state.preview, this.state.lastActiveLetter);
            sessionStorage.setItem('lastFilterBy_' + this.state.preview, this.state.lastFilterBy);
        });

        this.increaseLoad();
        axios({
            dataType: "json",
            method: "post",
            url: "/pdb/fetchFilterLetters",
            data: {
                filterBy: this.getFilterBy(),
                // searchTerm: this.state.searchTerm,
                preview: this.state.preview,
            }
        }).then(data => {
            // this.decreaseLoad();

            if (data.data.hasOwnProperty("status") && data.data.status == "success") {
                let rawData = data.data['data'];
                let letterData = [];
                for (let i = 65; i <= 90; i++) {
                    let rawLetter = String.fromCharCode(i);

                    letterData.push({
                        'letter': rawLetter,
                        'available': rawData.includes(rawLetter),
                        'active': rawLetter == this.state.activeLetter,
                    });
                }
                this.setState({
                    letters: letterData
                });
            } else if (data.data.hasOwnProperty("status") && data.data.status == "error") {
                $.oc.flashMsg({text: data.data['msg'], 'class': 'error', 'interval': 4}); return false;
            }

            setTimeout(this.decreaseLoad, 200);
        });
    }

    loadProducts()
    {
        let activeLetter = this.state.activeLetter;
        let filterBy = this.state.filterBy;

        if (!['products', 'ingredients'].includes(filterBy)) {
            return;
        }

        // Check searchTerm
        let searchTerm = this.state.searchTerm.trim();
        if (searchTerm.length > 0 && searchTerm.length < 3) {
            searchTerm = '';
        }

        if (this.state.lastActiveLetter == activeLetter && this.state.lastFilterBy == filterBy && this.state.lastSearchTerm == searchTerm) {
            return;
        }

        this.setState({
            lastActiveLetter: activeLetter,
            lastFilterBy: filterBy,
            lastSearchTerm: searchTerm,
        }, function () {
            sessionStorage.setItem('lastActiveLetter_' + this.state.preview, this.state.lastActiveLetter);
            sessionStorage.setItem('lastFilterBy_' + this.state.preview, this.state.lastFilterBy);
            sessionStorage.setItem('lastSearchTerm_' + this.state.preview, this.state.lastSearchTerm);
        });

        this.increaseLoad();
        axios({
            dataType: "json",
            method: "post",
            url: "/pdb/fetchProducts",
            data: {
                filterBy: this.getFilterBy(),
                searchTerm: searchTerm,
                activeLetter: this.state.activeLetter,
                preview: this.state.preview,
            }
        }).then(data => {

            if (data.data.hasOwnProperty("status") && data.data.status == "success") {
                let productsData = data.data.data;

                this.setState({
                    filteredProducts: productsData,
                    searchedOnce: true,
                });
            } else if (data.data.hasOwnProperty("status") && data.data.status == "error") {
                $.oc.flashMsg({text: data.data['msg'], 'class': 'error', 'interval': 4}); return false;
            }

            setTimeout(this.decreaseLoad, 200);
        });
    }

    render()
    {
        return (
            <React.Fragment>
                <div className="toolbar-base first">
                    <div className="filter-by-type">
                        <div id="filter-products"
                             className={ this.state.filterBy == 'products' ? 'active' : '' }
                             onClick={e => this.setFilterBy('products')}>
                            <span>Produkte</span>
                        </div>
                        <div id="filter-ingredients"
                             className={ this.state.filterBy == 'ingredients' ? 'active' : '' }
                             onClick={e => this.setFilterBy('ingredients')}>
                            <span>Inhaltsstoffe</span>
                        </div>
                    </div>
                    <div className="search-holder">
                        <div className="search-term-wrapper">
                            <input className="search-term-input" value={this.state.searchTerm}
                                   type="text"
                                   placeholder="Suche | min. 3 Zeichen"
                                   maxLength="50"
                                   spellCheck="false"
                                   onChange={this.onSearchTextChange}
                            ></input>
                            <i className="fa fa-search"></i>
                        </div>
                        <i className="fa fa-undo"
                           style={{ display: (this.state.searchTerm.length == 0 && this.state.filterBy == 'products' && this.state.activeLetter == '' ? 'none' : '') }}
                           onClick={this.resetSearch}></i>
                    </div>
                </div>

                <div className="toolbar-base second">
                    <div id="letter-list">
                        {this.state.letters.map((letter, index) => {
                            return (
                                <div className="letter-wrapper" key={index}>
                                    <div className={'letter-btn' + (letter.available == true ? ' available' : '') + (letter.active == true ? ' active' : '')}
                                         letter-val={letter.letter}
                                         onClick={letter.available == true ? this.onLetterToggle : undefined}>
                                        <span>{letter.letter}</span>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                </div>

                <div className="product-list">

                    { this.state.filteredProducts.length > 0 ? this.state.filteredProducts.map((product, index) => {
                        return (
                            <div key={index}className="product-item-wrapper" style={{ height: this.state.generalItemHeight }}>
                                <a className="product-list-item" href={ product.url }>
                                    <h2 dangerouslySetInnerHTML={{__html: product.name}}></h2>
                                    <ul>
                                        <li>{product.ingredients}</li>
                                    </ul>
                                    { product.img.length > 0 ? <img src={ product.img }></img> : <div className="unavailable-img"><i className="fa fa-ban"></i></div> }
                                </a>
                            </div>
                        )
                    }) : (this.state.searchedOnce ? <h3 className="no-product-found">Kein passendes Produkt für die Suche gefunden.</h3> : '') }
                </div>
            </React.Fragment>
        );
    }
}
export default PDBList;
