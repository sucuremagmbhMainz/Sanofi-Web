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

                <h1 class="all-display" style="color: #d50061; margin-left: 20px!important;">Hormone im Umschwung:
                    Träger Darm nach der Schwangerschaft und in der Stillzeit
                </h1>

                <div class="nptropfen-image nptropfen-right perlenbox" >
                    <div style="Position:relative;">
                        <video style="width: 80%" loop autoplay><source src="static_resources\images\stock\videos\hormone-rendert.mp4" type="video/mp4" /> </video>
                        <img id="icanimg"  style="top: 0; right: 4.7em; position: absolute;" src="/static_resources/images/stock/videos/overlayimg.png" alt="overlayimg not found!">
                    </div>
                </div>

                <div>
                    <p style=" line-height: 20px;">
                        Gefühle auf dem Höhepunkt – Verdauung auf dem Tiefpunkt? Das kann im Babyglück passieren!<br> Denn
                        während der Körper während einer Schwangerschaft zahlreiche Veränderungen durchläuft, legt einer
                        oft eine Pause ein: unser Darm. In der Schwangerschaft ist Verstopfung ein häufiges
                        Symptom.<sup>4</sup>
                        Jede dritte Frau scheint während dieser aufregenden Zeit unter einem trägen Darm zu
                        leiden.<sup>5</sup><br><br>
                        Was aber viele nicht wissen: Auch nach der Schwangerschaft – besonders im Wochenbett und in der
                        Stillzeit – können junge Mütter von Entleerungsschwierigkeiten geplagt sein.<br> Und das kann ganz
                        schön belasten, sowohl körperlich als auch psychisch. Die Verdauung ist nach einer oder mehreren
                        Schwangerschaften oft nicht mehr dieselbe wie zuvor.<sup>6</sup> Doch woran liegt das, was passiert im
                        Körper?
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
                                        <p> Ohnehin ist Verstopfung eher Frauensache. Sie leiden doppelt so oft unter Verstopfung
                                            wie Männer: Rund 70 Prozent der Betroffenen sind Frauen.<sup>1</sup><br> Warum das so ist, ist
                                            bisher nicht abschließend geklärt, im Verdacht stehen aber unter anderem weibliche
                                            Sexualhormone und deren Veränderungen.
                                            Wenn die Hormone in Schwangerschaft und Stillzeit im positiven Sinne Achterbahn
                                            fahren, kann das für die Verdauung weniger schön werden. Denn diese hormonellen
                                            Veränderungen sind eine Ursache von Verstopfung, die oft auch noch von Blähungen
                                            begleitet wird.<br> Wenn sich in der Schwangerschaft die Gebärmutter vergrößert, wird
                                            das Organ durch Hormone wie Progesteron gewissermaßen entspannt, damit es nicht zu
                                            vorzeitigen Wehen kommt.<sup>7</sup><br> Dies überträgt sich auch auf die dahinterliegende
                                            Darmmuskulatur – ein träger Darm und Verstopfung drohen.<br> Nach der Schwangerschaft
                                            muss sich für die frischgebackenen Eltern vieles erst einmal einspielen – und so
                                            geht es auch dem Gewohnheitstier Darm.<br> Wenn zu hormonellen Veränderungen der
                                            veränderte Tagesrhythmus als junge Mutter, Stress oder andere Essgewohnheiten
                                            dazukommen, läuft oft auch nach der Schwangerschaft und in der Stillzeit die
                                            Verdauung noch nicht wieder rund.<sup>4,8</sup><br> Was tun?
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
                                        <p> Verstopfung – und den damit oft einhergehenden Blähbauch – braucht man als junge
                                            Mutter gerade im Wochenbett oder in der Stillzeit nicht!<br> Die gute
                                            Nachricht: Dulcolax<sup>®</sup> NP Perlen helfen gut verträglich.<br> Die Perlen aus dem
                                            eleganten Flakon können je nach Bedarf und Stärke der Beschwerden
                                            individuell dosiert werden.<sup>*</sup> Mit dem Wirkstoff Natriumpicosulfat wirken
                                            sie in etwa 10 bis 12 Stunden.<br> Und zwar so: Dulcolax® NP Perlen entfalten
                                            ihre Wirkung lokal im Dickdarm, wo das Natriumpicosulfat durch Enzyme
                                            körpereigener Darmbakterien in seine aktive Wirkform umgewandelt wird.<br>
                                            Diese setzt die Darmbewegung wieder in Gang, erhöht gleichzeitig den
                                            Flüssigkeitsgehalt im Dickdarm und verbessert so die Stuhlkonsistenz.<br> In
                                            Absprache mit dem Arzt sind Dulcolax<sup>®</sup> NP Perlen für Stillende geeignet.
                                            Damit es heißt:<br> Ich kann wieder – befreiter mein Babyglück genießen!<br> Denn
                                            die Verdauung läuft wieder rund.
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