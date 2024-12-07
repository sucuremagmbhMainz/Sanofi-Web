@extends('layouts.mobilemaster')

@section('styles')

    <style>
        .tab-flex {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-content: center;
            align-items: center;
        }

        .tab-flex-item:nth-child(1) {
            order: 0;
            flex: 0 1 auto;
            align-self: flex-start;
        }

        .tab-flex-item:nth-child(2) {
            order: 0;
            flex: 0 1 auto;
            align-self: center;
        }

        .tab-flex a img {
            width: auto !important;
        }

        @media screen and (max-width: 710px){
            .tab-flex {
                flex-wrap: wrap;
                flex-direction: column;
            }

            .tab-flex-item:nth-child(1) {
                order: 1;
            }

            .tab-flex-item:nth-child(1) {
                order: 0;
            }


        }

    </style>
    @parent

@stop

@section('scripts')
    @parent
@stop

@section('content')
    <div itemscope itemtype="http://schema.org/Drug">

        <div id="wrapper" class="productDetail section-nptropfen">
            <div class="box_content" style="min-height: 1000px;">

                <h1 class="all-display" style="color: #d50061; margin-left: 20px!important;">Verstopfung und Blähbauch
                    trotz #healthyfood? Das hilft!</h1>

                <div class="nptropfen-image nptropfen-right perlenbox" >
                    <div style="Position:relative;">
                        <video style="width: 80%" loop autoplay><source src="static_resources\images\stock\videos\ernaerung-rendert.mp4" type="video/mp4" /> </video>
                        <img id="icanimg"  style="top: 0; right: 4.7em; position: absolute;" src="/static_resources/images/stock/videos/overlayimg.png" alt="overlayimg not found!">
                    </div>
                </div>

                <div>
                    <p style=" line-height: 20px;">Mealprep, Clean Eating, Bowls in Regenbogenfarben: Instagram ist voll
                        vom gesunden Lifestyle.<br> Auch im Real Life liegt gesunde Ernährung im Trend!<br> Und das ist gut so.<br>
                        Denn ein ausgewogener Speiseplan tut dem Darm und damit dem ganzen Körper gut.<br> Schließlich
                        beherbergt der Darm einen Großteil unseres Immunsystems.<sup>11</sup><br> Und: Über die sogenannte
                        Darm-Hirn-Achse werden aus dem Darm heraus sogar psychische Faktoren gesteuert und damit ganz
                        allgemein beeinflusst, wie wir uns fühlen.<sup>11</sup><br> Dadurch kann es aber auch aufs Gemüt
                        schlagen, wenn
                        es im Darm mal nicht so läuft, wie es soll – oder auch einfach gar nichts mehr geht.<br> Fakt ist:
                        Ein ausgewogener Speiseplan schützt leider nicht immer vor Verstopfung. Wir klären auf, woran
                        das liegt!<br>
                    </p>
                </div>
                <div style="margin-top: 50px!important;">
                    <div id="tabs-detail" class="clearfix" name="tab-area">
                        <ul class="tabs_menu nptropfen">
                            <li class="tab_item" name="produktdetails" id="tab-produktdetails">
                                <a href="#produktdetails" class="padding-top-increase tab_active">
                                    <span itemprop="name">Ursachen</span>
                                </a>
                            </li>
                            <li class="tab_item" name="drug-hinweis" id="tab-hinweis">
                                <a href="#hinweis" class="padding-top-increase">
                                    {{ trans('Behandlung') }}
                                </a>
                            </li>
                        </ul>
                        <div class="tabs_content clearfix">
                            <h3>Ursachen</h3>
                            <div id="produktdetails" class="tab_content clearfix">
                                <div class="tab-flex">
                                    <div class="tab-flex-item">
                                        <p>Morgens Müsli, mittags Salat, nachmittags Obst und abends Gemüse mit Fisch – und
                                            trotzdem ist der Darm träge.<br> Ja, das kann vorkommen!<br> Und damit ist man nicht allein.<br>
                                            Schließlich wird unser Verdauungssystem neben der Ernährung von zahlreichen weiteren
                                            Faktoren beeinflusst:<br>

                                            <a href="{{action('PageController@verstopung_perlen_hormone')}}">Auch hormonelle
                                                Veränderungen</a>,<br>

                                            <a href="{{action('PageController@verstopung_perlen_stress')}}">Stress</a>, ein
                                            veränderter Tagesrhythmus wie zum Beispiel auf

                                            <a href="{{action('PageController@verstopung_perlen_reise')}}">Reisen</a>

                                            oder bestimmte
                                            Verhaltensweisen wie eine Verzögerung oder Unterdrückung des Stuhlgangs können eine
                                            Rolle bei Verstopfung oder Völlegefühl spielen.<sup>1,9</sup><br> Dazu kommt:<br> Ein gesunder
                                            Lebensstil mit ausreichender Bewegung und ballaststoffreicher Ernährung ist
                                            unbestritten wichtig.<br> Aber: Ballaststoffe und Rohkost regen zwar die Verdauung an,
                                            besteht aber bereits eine träge Verdauung, können sie unter Umständen sogar
                                            kontraproduktiv sein.<br> Denn sie können zu Blähungen führen und so für zusätzliche
                                            Belastung im Darm sorgen.<br> Doch was tun gegen Verstopfung und Blähungen?<br>
                                        </p>
                                    </div>
                                    <div class="tab-flex-item">
                                        <a href="{{action('PageController@npperlen')}}" style="text-align: center">
                                            <p>Hier gibt's noch mehr Infos <br> zu Dulcolax<sup>&reg;</sup> NP Perlen</p>
                                            <img src="{{ URL::to('static_resources/mobile/images/packshots/Dulcolax_NP_Perlen_Packshot.png') }}" alt="NP Perlen">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h3>{{ trans('Behandlung') }}</h3>
                            <div id="hinweis" class="tab_content clearfix">
                                <div class="tab-flex">

                                    <div class="tab-flex-item">
                                    <p>Verstopfung – und der damit oft einhergehende Blähbauch – können ganz schön aufs
                                        Gemüt schlagen!<sup>3</sup> Vor allem, wenn man sich ausgewogen ernährt.<br> Doch es gibt Hilfe:
                                        Die ansprechenden Dulcolax<sup>®</sup> NP Perlen im eleganten Flakon sind praktisch für
                                        unterwegs, diskret einnehmbar und individuell dosierbar, je nachdem wie stark die
                                        Beschwerden ausfallen.<sup>*</sup><br> Der Wirkstoff Natriumpicosulfat wirkt in circa 10 bis 12
                                        Stunden.<br> Dulcolax<sup>®</sup> NP Perlen entfalten ihre Wirkung lokal im Dickdarm.<br> Denn erst
                                        dort wird der Wirkstoff durch Enzyme körpereigener Darmbakterien in seine aktive
                                        Wirkform umgewandelt.<br> Das so „aktivierte“ Natriumpicosulfat regt die Darmbewegung
                                        an, sorgt gleichzeitig für einen höheren Flüssigkeitsgehalt im Dickdarm – was zu
                                        einer Verbesserung der Stuhlkonsistenz führt.<br> Dulcolax<sup>®</sup> NP Perlen helfen
                                        verstopfungsgeplagten Frauen, Männern, Kindern ab vier Jahren sowie – in Absprache
                                        mit dem Arzt – auch Stillenden. Das gemeinsame Ziel: #ichkannwieder.<br>
                                    </p>
                                </div>
                                <div class="tab-flex-item">
                                    <a href="{{action('PageController@npperlen')}}" style="text-align: center">
                                        <p>Hier gibt's noch mehr Infos <br> zu Dulcolax<sup>&reg;</sup> NP Perlen</p>
                                        <img src="{{ URL::to('static_resources/mobile/images/packshots/Dulcolax_NP_Perlen_Packshot.png') }}" alt="NP Perlen">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding: 20px; margin-top: 1.5em;">
                    @include('includes.reference')
                </div>
            </div>
        </div>
    </div>

@stop