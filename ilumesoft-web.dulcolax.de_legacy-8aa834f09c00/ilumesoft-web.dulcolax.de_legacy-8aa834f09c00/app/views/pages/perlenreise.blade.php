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
                <h1 class="all-display" style="color: #d50061; margin-left: 20px!important;">Wenn der Darm Urlaub macht:
                    Verstopfung auf Reisen</h1>

               <div class="nptropfen-image nptropfen-right perlenbox" >
                    <div style="Position:relative;">
                        <video style="width: 80%" loop autoplay><source src="static_resources\images\stock\videos\reisen-rendert.mp4" type="video/mp4" /> </video>
                        <img id="icanimg"  style="top: 0; right: 4.7em; position: absolute;" src="/static_resources/images/stock/videos/overlayimg.png" alt="overlayimg not found!">
                    </div>
                </div>

                <div>
                    <p style=" line-height: 20px;">
                        Ob langersehnter Urlaub oder eine anstehende berufliche Reise – wie das mit unliebsamen
                        Beschwerden so ist, kommen sie meist dann, wenn man sie nicht gebrauchen kann.<br> Fakt ist aber:
                        Gerade auf Reisen macht der Darm nicht selten Urlaub!<br> Verstopfung und ein oft damit
                        einhergehender Blähbauch in der fremden Umgebung sind die Folge. Und das drückt dann nicht nur
                        im Bauch, sondern auch auf die Stimmung.<br>
                        Was hilft bei Verstopfung auf Reisen? Zuerst einmal: Den Stuhlgang nicht unterdrücken!<br> Wer Angst
                        vor fremden Toiletten hat, kann es mit Desinfektionstüchern versuchen. Noch ein Tipp: Morgens
                        früh ist der Darm natürlicherweise am aktivsten.<sup>12</sup><br> Planen Sie daher nach dem
                        Frühstück bewusst
                        und in Ruhe Zeit für den Toilettengang ein. Ist der Darm bereits in den Ruhemodus gegangen,
                        gilt: Verstopfung nicht aussitzen! Ein Mittel gegen Verstopfung gehört in jede gut ausgestattete
                        Reiseapotheke.<br> Dulcolax<sup>®</sup> NP Perlen befreien gut verträglich von Verstopfung und dies<br>
                        auch noch
                        auf diskrete Weise <br> – denn die Darreichungsform als Perlen aus dem eleganten <br> Flakon machen sie zu
                        einem idealen Reisebegleiter.<br>
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
                                        <p>Wir gehen auf Reisen – und der Darm steht still. <br> Woran das liegt?<br> Ursachen für eine
                                            sogenannte Verstopfung auf Reisen, auch Reiseverstopfung genannt, gibt es viele.<br> Und
                                            zumeist macht eine Kombination aus mehreren den Darm träge.<br> Denn: Er ist ein
                                            Gewohnheitstier!<br> Zeitumstellung, das Abweichen vom gewohnten Tagesrhythmus, die
                                            Scheu vor fremden Toiletten oder das Unterdrücken des Stuhlgangs können ihn ganz
                                            schön aus dem Gleichgewicht bringen.<sup>9</sup><br> Das führt oftmals gerade zu Beginn einer Reise
                                            zu Verstopfung, wenn der Körper sich noch auf den neuen Rhythmus einstellen muss.<sup>10</sup><br>
                                            Hinzu kommen vielleicht eine veränderte Ernährung oder Reisestress – und schon geht
                                            nichts mehr! Verstopfung ist die Folge – oft begleitet von einem aufgeblähten Bauch.
                                            So manch Reisender kann dann sogar einige Tage nicht auf die Toilette gehen.<br> Doch
                                            das muss nicht sein!
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
                                        <p> Mit Dulcolax® NP Perlen ist eine gut verträgliche Lösung gegen Verstopfung an Bord.<br>
                                            Die Perlen im ansprechenden Flakon sind diskret einnehmbar und deshalb besonders
                                            praktisch für unterwegs.<br> Je nach Bedarf und Intensität der Beschwerden können sie
                                            individuell dosiert werden<sup>*</sup> und wirken nach circa 10 bis 12 Stunden.<br> Für Betroffene
                                            ermöglicht dies die Freiheit, so zu behandeln, wie man mag.<br> Dulcolax® NP Perlen
                                            entfalten ihre Wirkung direkt im Dickdarm.<br> Erst dort entsteht seine aktive Wirkform,
                                            nachdem der Wirkstoff durch Enzyme körpereigener Darmbakterien umgewandelt wurde.<br>
                                            Das so „aktivierte“ Natriumpicosulfat setzt die Darmbewegung in Gang, erhöht
                                            gleichzeitig den Flüssigkeitsgehalt im Dickdarm und verbessert so die
                                            Stuhlkonsistenz.<br> Übrigens: Zwar sind Frauen etwa doppelt so häufig von Verstopfung
                                            betroffen – Dulcolax<sup>®</sup> NP Perlen helfen aber selbstverständlich auch
                                            verstopfungsgeplagten Männern sowie Kindern ab vier Jahren.<br> In Absprache mit dem
                                            Arzt sind sie außerdem auch für Stillende gut geeignet.<br> Damit es für alle Reisenden
                                            heißt: Ich kann wieder – <br>befreiter mein Leben genießen!
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
                </div>
                <div style="padding: 20px; margin-top: 1.5em;">
                    @include('includes.reference')
                </div>
            </div>
        </div>
    </div>

@stop