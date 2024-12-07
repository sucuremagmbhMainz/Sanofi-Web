@extends('layouts.mobilemaster')

@section('styles')
    @parent

@stop

@section('scripts')
    @parent
@stop

@section('content')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--[if lte IE 9]>
    {{HTML::style('/static_resources/mobile/css/ie9.css')}}
    <![endif]-->
    <style>
        body{
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        }
        .header h2{
            margin-top: -26px;
            margin-bottom: 4px;
        }
    </style>
<div class="modal fade" id="disclaim_external" tabindex="-1" role="dialog" aria-labelledby="externLabel" aria-hidden="true">
    <div class="modal-dialog">	
        <div class="modal-content robots-noindex robots-nocontent">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X<span class="sr-only">Schließen</span></button>
                <h4 class="modal-title" id="externLabel">Sie verlassen jetzt unsere Webseite</h4>
            </div>
            <div class="modal-body">
                <p>Bitte beachten Sie, dass dieser Link eine Webseite öffnet, für deren Inhalt die Sanofi-Aventis Deutschland GmbH nicht verantwortlich ist und auf die unsere Datenschutzbestimmungen keine Anwendung finden.</p>
                <p><a id="anker_external" href="" target="_blank" class="hidden"></a></p>
            </div>
            <div class="modal-footer">
                <a id="button_external" href="" class="gotoSite" target="_blank">weiter</a>
            </div>
        </div>
    </div>
</div>

<div id="wrapper">
    <div class="row box_content faq mobile_version">
        <div class="col-xs-3 inner_page_content page_left_single_column desktop-item mobile_content">
            <ul class="nav-pills">
                <li><a href="{{action('PageController@pharmacyfinder')}}" alt="{{ trans('content.common_94') }}">{{ trans('content.common_94') }}</a></li>
                @if (false)
                <li><a href="{{action('PageController@onlineshops')}}" alt="{{ trans('content.common_95') }}">{{ trans('content.common_95') }}</a></li>
                @endif
            </ul>
        </div>
        <div class="col-xs-9 inner_page_content page_right_single_column desktop-item mobile_content">
            <div style="margin: 0 auto;">
                <h1>{{ trans('content.common_95') }}</h1>
                <p>{{ trans('content.common_96') }}</p>
                <div id="marketplace" class="row"></div>
            </div>

       {{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
       {{--HTML::script("/static_resources/js/bootstrap-twitter-2.2.2.min.js")--}}
       {{--HTML::script("/static_resources/js/modal_dialog.min.js")--}}
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            body{
                font-family: 'Open Sans', Arial, Helvetica, sans-serif;
            }
            .header h2{
                margin-top: -20px;
                margin-bottom: 0px;
            }

        </style>
        <script>
            if (!window.MailOrder) { window.MailOrder = {}; }
            MailOrder= function() {
            'use strict';

            var pharmacies = [
                {
                name: 'aliva',
                claim: 'Aliva-Apotheke',
                link: '#'
                },
                {
                name: 'apodiscounter',
                claim: 'apo-discounter.de, Versandapotheke',
                link: 'http://www.apodiscounter.de/advanced_search_result.php?keywords=dulcolax&amp;fmanu=31310'
                },
                {
                name: 'aponeo',
                claim: 'APONEO, Deutsche Versand-Apotheke',
                link: 'http://www.aponeo.de/produkte/markenshops/dulcolax/'
                },
                {
                name: 'aporot',
                claim: 'apo-rot, Ihre VersandApotheke',
                link: 'http://www.apo-rot.de/index_search.html?_filterktext=dulcolax'
                },
                {
                name: 'apotal',
                claim: 'apotal.de, Ihre Versandapotheke',
                link: 'http://shop.apotal.de/category/Schmerzmittel/dulcolax/c_35528_30732.html?categId=35528'
                },
                {
                name: 'berlinda',
                claim: 'Berlinda Versandapotheke',
                link: 'http://www.berlindaversandapotheke.de/artikelsuches.php?volltext=dulcolax'
                },
                {
                name: 'besamex',
                claim: 'besamex, Ihre Apotheke bringt&rsquo;s',
                link: '#'
                },
                {
                name: 'bio',
                claim: 'BioApotheke.de, Die Versandapotheke',
                link: 'http://www.bioapotheke.de/advanced_search_result.php?keyword=dulcolax'
                },
                {
                name: 'delmed',
                claim: 'delmed, Ihre Versandapotheke',
                link: 'http://www.delmed.de/product/dulcolax-classic-schmerztabletten.309169.html'
                },
                {
                name: 'disapo',
                claim: 'disapo.de Apotheke',
                link: 'http://disapo.de/dulcolax-classic-schmerztabletten-p03046735-00.html'
                },
                {
                name: 'docmorris',
                claim: 'DocMorris, meine neue Apotheke',
                link: 'http://m.exactag.com/cl.aspx?tc=25afdbb35e0b406ce5fa9b5466189696&url=https://www.docmorris.de/inhalte/docmorris-aktion/dulcolax'
                },
                {
                name: 'eurapon',
                claim: 'eurapon Versandapotheke',
                link: 'http://www.eurapon.de/produkte/dulcolax/0/5/7265696d706f72744c69746572616c3a3a6b65696e205265696d706f7274/'
                },
                {
                name: 'europaapotheek',
                claim: 'europa apotheek, Lieber gleich zu den Experten',
                link: 'https://www.europa-apotheek.com/search.go?q=dulcolax'
                },
                {
                name: 'euvanet',
                claim: 'euva.net EU-Versandapotheke',
                link: '#'
                },
                {
                name: 'fliegendepillen',
                claim: 'fliegende-pillen.de, Versandapotheke',
                link: 'http://www.fliegende-pillen.de/keywordsearch/~SEARCH_STRING=dulcolax/~SEARCH_CATEGORY_ID=?anb=861393'
                },
                {
                name: 'mediherz',
                claim: 'mediherz.de, Versandapotheke',
                link: '#'
                },
                {
                name: 'medikamentperklick',
                claim: 'medikamente-per-klick.de, Ihre persönliche Versandapotheke',
                link: 'https://www.medikamente-per-klick.de/dulcolax'
                },
                {
                name: 'medipolis',
                claim: 'MEDIPOLIS GESUND, Online-Apotheke',
                link: 'http://www.medipolis.de/dulcolax-gegen-kopfschmerzen-kaufen-mlp/'
                },
                {
                name: 'medpex',
                claim: 'medpex Versandapotheke',
                link: '#'
                },
                {
                name: 'myapozone',
                claim: 'myapozone.de, Versand- und Internetapotheke',
                link: 'http://my-apozone.de/bin/geossql.pl?Stype=Pzn&amp;Scont=03046735'
                },
                {
                name: 'mycare',
                claim: 'mycare Versandapotheke',
                link: 'http://www.mycare.de/online-kaufen/dulcolax-classic-schmerz-tabletten-3046735'
                },
                {
                name: 'pharmeo',
                claim: 'pharmeo.de, Ihre persönliche Hausapotheke',
                link: '#'
                },
                {
                name: 'sanicare',
                claim: 'SANICARE, Die Versandapotheke',
                link: 'https://www.sanicare.de/keywordsearch/searchitem=dulcolax'
                },
                {
                name: 'schlossapotheke',
                claim: 'Apo.de, die kürzeste Versandapotheke Deutschlands',
                link: 'https://www.apo.de/search/dulcolax'
                },
                {
                name: 'shopapotheke',
                claim: 'shop-apotheke.com, Online-Apotheke',
                link: 'http://www.shop-apotheke.com/arzneimittel/624605/dulcolax-intensiv.htm?know=search:dulcolax%2a'
                },
                {
                name: 'versand',
                claim: 'Online-Apotheke: Versandapotheke für Medikamente/Arzneimittel - Online bestellen & Preisvergleich',
                link: 'https://www.versandapo.de/article/search?lastActionId=1&stamp=46261508&query=dulcolax&search_category=&search_value='
                },
                {
                name: 'vfg',
                claim: 'VfG, Ein Vertriebsweg der Apotheke zur Rose',
                link: 'http://www.vfg.com/catalogsearch/result/?q=dulcolax'
                },
                {
                name: 'vita',
                claim: 'Die VERSANDAPOTHEKE & Internetapotheke, Vitaapotheke',
                link: 'http://www.vitaapotheke.eu/findologic.php?keywords=dulcolax'
                },
                {
                name: 'vitalsana',
                claim: 'VITALSANA Versandapotheke&nbsp;&ndash; Ihre Online-Apotheke',
                link: 'http://www.vitalsana.com/produkte?SEARCH_WORD=dulcolax'
                },
                {
                name: 'volksversand',
                claim: 'Volksversand, Versandapotheke',
                link: 'http://volksversand.de/search?sSearch=dulcolax'
                },
                {
                name: 'zurrose',
                claim: 'zur Rose, Ihre Versandpotheke',
                link: 'http://www.zurrose.de/catalogsearch/result/?q=dulcolax'
                }
            ];

            var template = '<div class="col-sm-4 col-xs-6" ><div class="panel panel-default"><div class="panel-body"><a id="trigger" href="_LINK_" data-rel="external" target="_blank"><img class="img-responsive" src="static_resources/images/onlineshops/_NAME_.jpg"  alt="_CLAIM_"></a></div></div></div>';

            if (!Array.prototype.forEach) {
                Array.prototype.forEach = function(fun /*, thisArg */)  {
                if (this === void 0 || this === null)
                    throw new TypeError();

                var t = Object(this);
                var len = t.length >>> 0;
                if (typeof fun !== "function")
                    throw new TypeError();

                var thisArg = arguments.length >= 2 ? arguments[1] : void 0;
                for (var i = 0; i < len; i++) {
                    if (i in t)
                        fun.call(thisArg, t[i], i, t);
                }
                };
            }

            var shuffle = function (array) {
              var currentIndex = array.length, temporaryValue, randomIndex ;

              // While there remain elements to shuffle...
              while (0 !== currentIndex) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
              }

              return array;
            };

            shuffle(pharmacies);
            pharmacies.forEach(function( pharmacy, index, array ) {
                var content = template.replace(/_NAME_/, pharmacy.name).replace(/_LINK_/, pharmacy.link).replace(/_CLAIM_/, pharmacy.claim);
                $(content).appendTo('#marketplace');
            });

            }();

            </script>

        </div>
    </div>

{{--    <script type="text/jscript" src="{{URL::to('static_resources/mobile/js/faq.min.js')}}"></script>--}}
</div>
@stop
