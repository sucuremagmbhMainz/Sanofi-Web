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

                <h1 class="all-display bg" style="color: #d50061; margin-left: 20px!important;">Verstopfung: Stress im
                    Alltag – Streik im Darm?</h1>

                <div class="nptropfen-image nptropfen-right perlenbox" >
                    <div style="Position:relative;">
                        <video style="width: 80%" loop autoplay><source src="static_resources\images\stock\videos\stress-rendert.mp4" type="video/mp4" /> </video>
                        <img id="icanimg"  style="top: 0; right: 4.7em; position: absolute;" src="/static_resources/images/stock/videos/overlayimg.png" alt="overlayimg not found!">
                    </div>
                </div>
                <div>
                    <p style=" line-height: 20px;">Stress im Alltag, Stillstand auf der Toilette? Ja, das gibt’s! <br>Das
                        liegt daran, dass unsere Psyche und unser Darm über die Darm-Hirn-Achse eng miteinander
                        verknüpft sind.<sup>11</sup> <br> Geht es im Alltag dann mal wieder hektisch zu, kann sich dies auf die
                        Verdauung auswirken. Lange To-do-Listen, viele Termine oder es steht wieder alles gleichzeitig
                        an? Wer dann einen Toilettengang gerne mal unterdrückt, weil es „gerade nicht passt“, sollte
                        wissen: Das ist keine gute Idee!<sup>9</sup> <br> Denn: Was raus muss, muss raus – auch Wirken schnell in ca. 15-30 MinutenWirken schnell in ca. 15-30 Minutenenn das mal länger
                        dauert. <br><br> Übrigens: Morgens ist die Darmaktivität am höchsten und der Toilettengang klappt hier am
                        leichtesten.<sup>12</sup>
                    </p>
                </div>

                <!-- menu  -->

                <div style="margin-top: 100px!important;">
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
                                        <p>#alwaysbusy? Keine gute Idee!<br> Zwar kann Stress im positiven Sinne für Tatendrang und
                                            Aktivismus sorgen, im negativen Fall aber auf den Magen – oder vielmehr den Darm –
                                            schlagen.<br> Denn das dort weit verzweigte Nervengeflecht, auch „Bauchhirn“ genannt,
                                            kann durchaus empfindlich auf Einflüsse des täglichen Lebens reagieren – wie eben
                                            auch stressige Situationen.<br> Unter Stress und einer hektischen Lebensweise kommen
                                            außerdem regelmäßige Mahlzeiten oder Schlaf nicht selten zu kurz. Aus Zeitmangel
                                            wird dann schon mal eine schnelle Mahlzeit vor dem Computer oder im Gehen
                                            eingenommen oder der Toilettengang unterdrückt.<br> Beides kann das sensible
                                            Verdauungssystem aus dem Takt bringen – Verstopfung und Blähungen durch Stress
                                            können die Folge sein.<sup>9</sup><br>Verbleibt die Nahrung zu lange im Darm, kann der Stuhl hart
                                            und die Entleerung zum Problem werden.
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
                                        <p>Wenn es im Stress mal wieder schnell gehen soll – aber nichts mehr geht, ist gut
                                            verträgliche Hilfe gefragt.<br> Denn: Verstopfung – auch oft begleitet von Blähungen –
                                            kann die Lebensqualität beeinträchtigen!<br> Aber: Es gibt eine gut verträgliche Lösung
                                            gegen die Beschwerden.<br> Und die kommt sogar im eleganten Flakon daher, der sich im
                                            Badezimmer optisch gut macht.<br> Doch auch für unterwegs sind die Perlen praktisch,
                                            weil diskret einnehmbar.<br> Dulcolax® NP Perlen können je nach Bedarf und Stärke der
                                            Beschwerden individuell dosiert werden.<sup>*</sup><br> Mit dem Wirkstoff Natriumpicosulfat wirken
                                            sie in circa 10 bis 12 Stunden.<br> Damit haben Verstopfungsgeplagte die Freiheit, so zu
                                            behandeln, wie sie möchten.<br> Dulcolax® NP Perlen entfalten ihre Wirkung lokal im
                                            Dickdarm. Denn erst dort wird der Wirkstoff durch Enzyme körpereigener Darmbakterien
                                            in seine aktive Wirkform umgewandelt. Das „aktivierte“ Natriumpicosulfat aktiviert
                                            wiederum die Darmbewegung und erhöht gleichzeitig den Flüssigkeitsgehalt im
                                            Dickdarm.<br> Die Folge: Eine verbesserte Stuhlkonsistenz. Zwar sind Dulcolax® NP Perlen
                                            besonders für Frauen relevant, da diese fast doppelt so oft wie Männer von
                                            Verstopfung betroffen sind – verstopfungsgeplagten Männern helfen Dulcolax® NP
                                            Perlen aber natürlich genauso gut.<br> Dulcolax® NP Perlen sind außerdem für Kinder ab
                                            vier Jahren zugelassen und in Absprache mit dem Arzt auch für Stillende gut
                                            geeignet.<br> Damit es heißt: Ich kann wieder – befreiter mein Leben genießen!
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