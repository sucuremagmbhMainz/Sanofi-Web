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

        @media screen and (max-width: 710px) {
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

                <h1 class="all-display" style="color: #d50061; margin-left: 20px!important;">Verstopfung mit Blähungen
                    oder Darmträgheit? Nein, danke!</h1>

                <div class="nptropfen-image nptropfen-right perlenbox">
                    <div style="Position:relative;">
                        <video style="width: 80%" loop autoplay>
                            <source src="static_resources\images\stock\videos\perlen-rendert.mp4" type="video/mp4"/>
                        </video>
                        <img id="icanimg" style="top: 0; right: 4.7em; position: absolute;"
                             src="/static_resources/images/stock/videos/overlayimg.png" alt="overlayimg not found!">
                    </div>
                </div>

                <div>
                    <p style=" line-height: 20px;">Mal unter uns – spricht man mit der besten Freundin über die
                        Verdauung?<br>
                        Und darüber, wenn mal
                        nicht alles rund läuft?<br> Wenn man verstopft ist und dazu Luft im Bauch hat?<br>
                        Wahrscheinlich nicht.<br>
                        Warum eigentlich? Verstopfung sollte kein Tabuthema sein – denn es ist alles andere als
                        selten.<br>
                        <br>
                        Etwa 15 Prozent aller Erwachsenen leiden zumindest zeitweise darunter. Zumeist Frauen,
                        wenngleich nicht nur.<br> Auch Männern kann ein träger Darm zu schaffen machen. Und Darmträgheit
                        ist
                        keine Frage des Alters.<sup>1</sup><br> Die Verstopfung sowie der damit oft einhergehende
                        Blähbauch oder
                        Blähungen können nicht nur schmerzhaft und unangenehm, sondern für viele Betroffene auch ein
                        emotionales wie ein optisches Problem sein.<br> Bleibt eine Verstopfung unbehandelt, kann das
                        mitunter ganz schön aufs Gemüt schlagen und die Lebensqualität stark
                        beeinträchtigen.<sup>1,2</sup> Was
                        hilft?<br> Ein gut verträgliches Mittel gegen Verstopfung! Damit <br>es heißt:
                        #ichkannwieder!<br>
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
                                        <p>Wird der Darm träge, liegt das schlechte Gewissen nahe – oder auch die Scheu
                                            vor dem
                                            Gang
                                            in die Apotheke.<br> Doch das muss nicht sein! Denn heute weiß man:
                                            Verstopfung hat
                                            viele
                                            Ursachen, wird oft von unangenehmen Blähungen begleitet – und oft reichen
                                            Ballaststoffe
                                            und Bewegung alleine nicht aus, um dem Darm auf die Sprünge zu helfen!
                                            Konkrete Ursachen können zum Beispiel folgende sein:<br>
                                        </p>
                                        <ul>
                                            <li style="font-size: 14px;">Körperliche Ursachen, wie z. B. ein langsamerer
                                                Darmtransit
                                            </li>
                                            <li style="font-size: 14px;"><a
                                                        href="{{action('PageController@verstopung_perlen_hormone')}}">Hormonumstellungen,
                                                    z. B. während Schwangerschaft oder Stillzeit sowie den Wechseljahren
                                                    <br> oder der Menstruation</a></li>
                                            <li style=" font-size: 14px;"><a
                                                        href="{{action('PageController@verstopung_perlen_reise')}}">Veränderter
                                                    Tagesrhythmus, Scheu vor fremden Toiletten oder Zeitverschiebung auf
                                                    Reisen</a></li>
                                            <li style=" font-size: 14px;"><a
                                                        href="{{action('PageController@verstopung_perlen_ernaehrung')}}">Ernährungsgewohnheiten
                                                    oder bestimmte Speisen</a></li>
                                            <li style="font-size: 14px;"><a
                                                        href="{{action('PageController@verstopung_perlen_stress')}}">Stress</a>
                                            </li>
                                            <li style=" font-size: 14px;">Verhaltensweisen, wie etwa das Unterdrücken
                                                des Stuhlgangs
                                            </li>
                                            <li style=" font-size: 14px;">Medikamente und bestimmte Grunderkrankungen
                                                wie etwa das Reizdarmsyndrom
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-flex-item">
                                        <a href="{{action('PageController@npperlen')}}" style="text-align: center">
                                            <p>Hier gibt's noch mehr Infos <br> zu Dulcolax<sup>&reg;</sup> NP Perlen
                                            </p>
                                            <img src="{{ URL::to('static_resources/mobile/images/packshots/Dulcolax_NP_Perlen_Packshot.png') }}"
                                                 alt="NP Perlen">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h3>{{ trans('Behandlung') }}</h3>
                            <div id="hinweis" class="tab_content clearfix">
                                <div class="tab-flex">

                                    <div class="tab-flex-item">
                                        <p>Verstopfung – und der damit oft einhergehende Blähbauch – können ganz schön
                                            aufs
                                            Gemüt schlagen!<sup>3</sup> Die gute Nachricht:<br>Es gibt eine gut
                                            verträgliche Lösung gegen die
                                            Beschwerden. Und die kommt sogar im eleganten Flakon daher. Die
                                            ansprechenden
                                            Dulcolax<sup>®</sup>
                                            NP Perlen sind diskret einnehmbar, deshalb praktisch für unterwegs und
                                            können je
                                            nach Bedarf und Stärke der Beschwerden individuell dosiert
                                            werden.<sup>*</sup><br> Mit dem Wirkstoff
                                            Natriumpicosulfat wirken sie in ca. 10 bis 12 Stunden. Damit haben
                                            Betroffene die
                                            Freiheit, so zu behandeln, wie sie möchten.<br> Dulcolax<sup>®</sup> NP
                                            Perlen entfalten ihre
                                            Wirkung lokal im Dickdarm. Denn erst dort wird der Wirkstoff durch Enzyme
                                            körpereigener
                                            Darmbakterien in seine aktive Wirkform umgewandelt. Das so „aktivierte“
                                            Natriumpicosulfat setzt die Darmbewegung in Gang, erhöht gleichzeitig den
                                            Flüssigkeitsgehalt im Dickdarm und verbessert so die Stuhlkonsistenz.<br>
                                            Zwar sind
                                            Dulcolax<sup>®</sup> NP Perlen besonders für Frauen relevant, da diese
                                            häufiger als Männer von
                                            Verstopfung betroffen sind – verstopfungsgeplagten Männern helfen
                                            Dulcolax<sup>®</sup> NP
                                            Perlen aber natürlich genauso gut. Dulcolax® NP Perlen sind außerdem für
                                            Kinder ab vier Jahren
                                            zugelassen und in Absprache mit dem Arzt auch für Stillende gut
                                            geeignet.<br> Damit es
                                            heißt:<br> Ich kann wieder – befreiter mein Leben genießen!
                                        </p>
                                    </div>
                                    <div class="tab-flex-item">
                                        <a href="{{action('PageController@npperlen')}}" style="text-align: center">
                                            <p>Hier gibt's noch mehr Infos <br> zu Dulcolax<sup>&reg;</sup> NP Perlen
                                            </p>
                                            <img src="{{ URL::to('static_resources/mobile/images/packshots/Dulcolax_NP_Perlen_Packshot.png') }}"
                                                 alt="NP Perlen">
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