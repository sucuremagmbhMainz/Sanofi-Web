$(document).ready(function () {
    var popupStatus = 0;
    //format for diagnose object
    //first pair: number of questions that need to be at least or equal
    //the rest pairs are the number of question and the answer they need to meet
    var functional_constipation = {
        "required": 2,
        2: 1,
        3: 1,
        4: 1,
        5: 0,
        6: 0,
        7: 0
    };
    //must-match formate first digit it's the question id and second digit is the answer seprate by "-"
    //var functional_defecation_disorders={"required":1,"must-match":{9:1},4:1,5:1,6:1,7:1,8:1};
    //match-either : at least one of the questions need match
    //match-not : must not match
    var red_flag = {
        "required": 1,
        12: 2,
        13: 2,
        14: 2,
        15: 2,
        17: 2
    };
    //just for complicated q16 bowel habit
    var red_flag_extra = {
        "required": 1,
        "match-either": {
            4: 1,
            5: 1,
            6: 1,
            7: 1
        },
        "must-match": {
            8: 0
        },
        16: 2
    };
    var red_flag_extra_1 = {
        "required": 1,
        "match-not": {
            11: 1
        },
        10: 2
    };
    var ie7 = false;
    if ($('html').hasClass('ie6') || $('html').hasClass('ie7')) {
        ie7 = true;
    }

    var answers,
            questionStr,
            show_answers,
            FEMALE_ONLY_Q_ID,
            user,
            female;

    function centerPopup(popupID) {
        //request data for centering
        var windowWidth = document.documentElement.clientWidth;
        var windowHeight = document.documentElement.clientHeight;
        var bgHeight = document.documentElement.clientHeight;
        var popupHeight = $("#" + popupID).height();
        var popupWidth = $("#" + popupID).width();
        var pageOffset = $(window).scrollTop();
        //centering
        topPos = pageOffset + windowHeight / 2 - popupHeight / 2;
        leftPos = windowWidth / 2 - popupWidth / 2;
        $("#" + popupID).css({
            "top": "20px",
            "left": leftPos + "px"
        });
        //only need force for IE6
        $("#backgroundPopup").css("height", bgHeight + "px");
    }

    function loadPopup(popupID) {

        centerPopup(popupID);
        //loads popup only if it is disabled
        if (popupStatus == 0) {
            $("#backgroundPopup").css({
                "opacity": "0.5"
            });
            $("#backgroundPopup").fadeIn(400);
            //$("#popupConfirm p").html(code);
            $("#" + popupID).fadeIn(400);
            //$.scrollTo($('body'), 500);
            popupStatus = 1;
        }
    }

    function disablePopup(popupID) {
        //disables popup only if it is enabled
        if (popupStatus == 1) {
            //$('#scprint').remove();
            $("#backgroundPopup").fadeOut(400);
            $("#" + popupID).fadeOut(400);
            popupStatus = 0;
        }
    }

    window.getDevicePixelRatio = function () {
        var ratio = 1;
        // To account for zoom, change to use deviceXDPI instead of systemXDPI
        if (window.screen.systemXDPI !== undefined && window.screen.logicalXDPI !== undefined && window.screen.systemXDPI > window.screen.logicalXDPI) {
            // Only allow for values > 1
            ratio = window.screen.systemXDPI / window.screen.logicalXDPI;
        } else if (window.devicePixelRatio !== undefined) {
            ratio = window.devicePixelRatio;
        }
        return ratio;
    };

    function getResult(s_match) {
        var current_match = 0;
        var must_match_flag = true;
        var match_either_flag = true;
        var match_not_flag = true;
        for (var i in answers) {
            //if greater than the answer then a match found
            if (s_match[i] !== undefined && answers[i] > s_match[i]) {
                current_match++;
            }
        }
        //if there is a question need to match
        if (s_match["must-match"] !== undefined) {
            must_match_flag = false;
            //var match_questions = s_match["must-match"].split("-");
            for (var j in s_match["must-match"]) {
                if (answers[parseInt(j)] == s_match["must-match"][j]) {
                    must_match_flag = true
                }
            }
        }
        //if there is a question must not match a specific number
        if (s_match["match-not"] !== undefined) {
            match_not_flag = false;
            //if it's men automatic set to true
            if (!female) {
                match_not_flag = true;
            }
            //var match_questions = s_match["must-match"].split("-");
            for (var j in s_match["match-not"]) {
                if (answers[parseInt(j)] !== s_match["match-not"][j]) {
                    match_not_flag = true
                }
            }
        }
        if (s_match["match-either"] !== undefined) {
            match_either_flag = false;
            //if it's not exist which means is men we don't match women only question
            if (!female) {
                match_either_flag = true;
            }
            //find at least one match
            for (var j in s_match["match-either"]) {
                if (answers[parseInt(j)] > s_match["match-either"][j]) {
                    match_either_flag = true
                }
            }
        }
        //
        if (current_match >= s_match["required"] && must_match_flag && match_either_flag && match_not_flag) {
            return true;
        } else {
            return false;
        }
    }

    function symptomCheckerLoaded() {
        ///Reset vars

        if (!ie7) {
            //store all answers here
            if (localStorage.answers) {
                answers = localStorage.answers.split(',');
            } else {
                answers = new Array();
            }
        } else {
            var a_value = $.jStorage.get("answers");
            //store all answers here
            if (a_value) {
                answers = a_value.split(',');
            } else {
                answers = new Array();
            }
        }

        show_answers = new Array();
        //we know the id of menstrual bleed questions so we can check if we want to display this question or not
        FEMALE_ONLY_Q_ID = "#menstrualBleeding";
        user = {};
        female = false;
        //questions and answers to print out
        if (!ie7) {
            if (localStorage.questionStr) {
                questionStr = localStorage.questionStr;
            } else {
                questionStr = "";
            }
        } else {
            var q_value = $.jStorage.get("questionStr");
            if (q_value) {
                questionStr = q_value;
            } else {
                questionStr = "";
            }
        }

        $('#intro').show();
        $('#symptomsSubMenu').show();
        $('#needtoknow a, #symptom-checker a').addClass('on');
        $('#scStart').show();
        // setTimeout(function(){
        $('#scStart').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 0);
            $('#intro').fadeOut(500, function () {
                $('#frm_selbsttest').fadeIn(500, function () {});
            });
            return false;
        });
        // }, 5000);


        $('#closeButton').unbind().bind('click', function () {
            disablePopup('resultPopup');
        });
        $('#print-link').unbind().bind('click', function () {
            //ga('send', 'event', 'Symptom Checker', 'Print results');
            window.print();
        });
        //back & next button to go to different section of questions
        //show sub question
        $("a.scButton, a#view_answers").unbind().bind('click', function () {
            if (!$(this).hasClass("scButton") && $(this).attr('id') !== "view_answers") {
                return true;
            }
            if ($(this).hasClass('next-section')) {

                var radio_group = {};
                $('#frm_selbsttest').find("li").each(function () {
                    if ($(this).closest('div').css("display") != "none") {
                        //special treatment for female only questions
                        if ($(this).attr("name") == "menstrualBleeding" && !female) {
                        } else {
                            radio_group[$(this).attr("name")] = true;
                        }
                    }
                });
                var temp_count = 0;
                $.each(radio_group, function () {
                    temp_count++;
                });
                var temp_a_count = 0;
                var temp_id = $('#frm_selbsttest').attr("id");
                $('#' + temp_id).find("li").each(function () {
                    if ($(this).hasClass("been_checked")) {
                        temp_a_count++;
                    }
                });
                if (temp_a_count < temp_count) {
                    //disable link
                    alert("Please answer all questions.");
                    return false;
                }
            }
            //show hide questions
            if ($(this).data("showdiv") === undefined) {
                $('#frm_selbsttest').hide();
            }
            if ($(this).attr("id") !== undefined && $(this).attr("id") == "eoq") {
                //window.location = "symptom-checker-result.htm";
                $('.sc-questions').hide();
                $('.sc-results').show();
                symptomCheckerResultsLoaded();
                return false;
            }
            //show results for print
            if (($(this).attr("id") == "view_answers") || ($(this).hasClass("scViewPrint"))) {
                //_gaq.push(['_trackEvent', 'Symptom Checker', "View results"]);
                //ga('send', 'event', 'Symptom Checker', 'View results');
                $("#view_result").html = "";
                $("#view_result").html(questionStr);
                loadPopup('resultPopup');
                return false;
            }

            $($(this).attr("href")).show();
            if ($('html').hasClass('ipad') || $('html').hasClass('ios7')) {
                location.href = "#" + $(this).attr("href");
            } else {
                //$.scrollTo($(this).attr("href"), 500);
            }
            //
        });
        //monitoring every input click
        //$("input").unbind().bind('click',function(){
        $(".actions ul li").unbind().bind('click', function () {
            //alert("clicked");
            //$(this).siblings().css('background-position', '0 0');
            $(this).siblings().removeClass("been_checked");
            //add a class to separate checked from unchecked li
            //$(this).css('background-position', '0 -80px');
            if (!$(this).hasClass("been_checked")) {
                $(this).addClass("been_checked");
            }
            //show hidden answers
            if ($(this).data("showdiv") !== undefined) {
                $("#" + $(this).data("showdiv")).show();
            }
            //hide hidden answers
            if ($(this).data("hidediv") !== undefined) {
                $("#" + $(this).data("hidediv")).hide();
            }
            //male female flag
            if ($(this).data("name") !== undefined) {
                //in case user can go backwards to gender selection div again
                if ($(this).data("value") == "female") {
                    $(FEMALE_ONLY_Q_ID).show();
                    female = true;
                }
                if ($(this).data("value") == "male") {
                    $(FEMALE_ONLY_Q_ID).hide();
                    female = false;
                }
            }
            //store question id in object
            answers[$(this).parents(".sc-block").data("qid")] = $(this).data("aid");
            if (!ie7) {
                localStorage.answers = answers.toString();
            } else {
                $.jStorage.set("answers", answers.toString());
            }
            //if it has sub questions or it's sub questions
            if (($(this).closest(".sc-block").data("haschild") !== undefined && $(this).closest(".sc-block").data("haschild") !== null) || ($(this).closest(".sc-block-sub").data("ischild") !== undefined && $(this).closest(".sc-block-sub").data("ischild") !== null)) {
                var child_flag = false;
                if ($(this).closest(".sc-block").data("haschild") !== undefined && $(this).closest(".sc-block").data("haschild") !== null) {
                    var temp_q_id = $(this).closest(".sc-block").data("qid");
                    var temp_q_text = $(this).closest(".sc-block").find("h3:first").text();
                    var temp_a_text = $(this).text();
                }
                //if it's sub question been answered
                //else{
                if ($(this).closest(".sc-block-sub").data("ischild") !== undefined && $(this).closest(".sc-block-sub").data("ischild") !== null) {
                    child_flag = true;
                    var temp_q_id = $(this).closest(".sc-block").data("qid");
                    var temp_q_text = $(this).closest(".sc-block").find("h3:first").text();
                    //aid must be 1 to be able to answers child questions
                    var temp_a_text = "Yes";
                    var temp_sub_q_text = $(this).closest(".sc-block-sub").find("h3:first").text();
                    var temp_sub_a_text = $(this).text();
                }
                var q_text = temp_q_id;
                var a_text = {};
                a_text[temp_q_text] = temp_a_text;
                if (child_flag)
                    a_text[temp_sub_q_text] = temp_sub_a_text;
            } else {
                var q_text = $(this).closest(".sc-block").data("qid");
                var a_text = {};
                a_text[$(this).closest(".sc-block").find("h3:first").text()] = $(this).text();
            }
            show_answers[q_text] = a_text;
            questionStr = "";
            for (var i in show_answers) {
                if (typeof (show_answers[i]) !== "string") {
                    var counter = 0;
                    for (var j in show_answers[i]) {
                        if (counter == 0)
                            questionStr += ("<h3>" + j + " <span>" + show_answers[i][j] + "</span></h3>");
                        if (counter == 1)
                            questionStr += ("<h4>" + j + " <span>" + show_answers[i][j] + "</span></h4>");
                        counter++;
                    }
                } else {
                    questionStr += "<h3>" + i + " : " + show_answers[i] + "</h3>";
                }
            }
            if (!ie7) {
                localStorage.questionStr = questionStr;
            } else {
                $.jStorage.set("questionStr", questionStr);
            }
        });
    }

    symptomCheckerLoaded();

    function symptomCheckerResultsLoaded() {
        $('#symptom-checker a').addClass('on');
        $('#scStart').show();
        $('#scStart').click(function () {
            $('#intro').fadeOut(500, function () {
                $('#frm_selbsttest').fadeIn(500, function () {
                    $.scrollTo($('#frm_selbsttest'), 500);
                });
            });
            return false;
        });
        $('#closeButton').unbind().bind('click', function () {
            disablePopup('resultPopup');
        });
        $('#print-link').unbind().bind('click', function () {
            //_gaq.push(['_trackEvent', 'Symptom Checker', "Print results"]);
            //ga('send', 'event', 'Symptom Checker', 'Print results');
            window.print();
            return false;
        });
        //check if it match function constipation criteria
        if (getResult(functional_constipation) && (!getResult(red_flag_extra) && !getResult(red_flag) && !getResult(red_flag_extra_1))) {
            $("#result-constipation").show();
        }
        if (getResult(functional_constipation) && (getResult(red_flag_extra) || getResult(red_flag) || getResult(red_flag_extra_1))) {
            $("#result-constipation_redflag").show();
        }
        if (!getResult(functional_constipation) && (getResult(red_flag_extra) || getResult(red_flag) || getResult(red_flag_extra_1))) {
            $("#result-no_constipation_redflag").show();
        }
        //no symptoms
        if (!getResult(functional_constipation) && !getResult(red_flag_extra) && !getResult(red_flag) && !getResult(red_flag_extra_1)) {
            $("#result-no_constipation_no_redflag").show();
        }

        $('.scViewPrint').unbind().bind('click', function () {
            //_gaq.push(['_trackEvent', 'Symptom Checker', "View results"]);
            //ga('send', 'event', 'Symptom Checker', 'View results');
            if (!ie7) {
                $("#view_result").html(localStorage.questionStr);
            } else {
                $("#view_result").html($.jStorage.get("questionStr"));
            }
            loadPopup('resultPopup');
            return false;
        });
        $('.scStartAgain').unbind().bind('click', function () {

            $('.sc-questions').show();
            $('.sc-results').hide();
            answers = '';
            $('.been_checked').removeClass();
            $('.sc-block-sub').hide();
            $('.result-box').hide();

            var url = ('' + document.location);
            var hashIdx = url.indexOf('#');
            if (hashIdx != -1) {
                document.location = url.substring(0, hashIdx);
            }

            symptomCheckerLoaded();
            return false;
        });
    }


    $(window).resize(function () {
        centerPopup('resultPopup');
    });
    $('#closeButton').click(function () {
        $('#resultPopup').css('display', 'none');
    });
    $("#checkresult").unbind('click').bind('click', function (e) {
        e.preventDefault();
        var value = 0;
        if ($('#frm_selbsttest li.been_checked').length == 10) {
            $("html, body").animate({
                scrollTop: 0
            }, 0);
            $('#frm_selbsttest .actions').each(function (elem) {

                value += parseInt($(this).find('li.been_checked').data('count'));
            });
            if (0 <= value && value <= 25) {

                $("#frm_selbsttest").fadeOut(500);
                $(".sc-results").fadeIn(1000);
                $(".result-box1").fadeIn(1000);
            } else if (26 <= value && value <= 35) {

                $("#frm_selbsttest").fadeOut(500);
                $(".sc-results").fadeIn(1000);
                $(".result-box2").fadeIn(1000);
            } else if (35 < value && value <= 45) {
                $("#frm_selbsttest").fadeOut(500);
                $(".sc-results").fadeIn(1000);
                $(".result-box3").fadeIn(1000);
            } else if (45 < value && value <= 50) {
                $("#frm_selbsttest").fadeOut(500);
                $(".sc-results").fadeIn(1000);
                $(".result-box4").fadeIn(1000);
            }

        } else {
            alert("Bitte beantworten Sie alle Fragen.");
        }


    });
});