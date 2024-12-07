@extends('layouts.mobilemaster')

@section('styles')
    @parent
@stop

@section('scripts')
    @parent

@stop

@section('content')

    <div id="wrapper">

        <div class="box_content home">
            <section class="mobile">
                <h2>Dulcolax<sup>&reg;</sup> befreit planbar und gut verträglich von Verstopfung</h2>
                <p>Ärzte, Apotheker und Patienten vertrauen seit mehr als 60 Jahren Dulcolax<sup>&reg;</sup> zur
                    wirksamen und sicheren Behandlung von Verstopfung.</p>
                <a href="produkte/das-richtige-dulcolax.html"><img class="img_mobile"
                                                                   src="{{URL::to('static_resources/mobile/images/main-menu/Dulcolax_Sortiment.png')}}"></a>

                <nav class="bottom_nav">
                    <ul>
                        <li><a href="{{action('PageController@constipationandgasrelief')}}">Produkte</a></li>
                        <li><a href="{{action('PageController@constipationcausessymptoms')}}">Verstopfung</a></li>
                    </ul>
                </nav>
            </section>
            <section class="hero">
                <div class="slider_wrapper_t"></div>
                <div class="slider_wrapper_l"></div>
                <div class="slider_wrapper_r"></div>
                <div class="slider_wrapper">
                    <ul class="slider">


                        <li class="slide_05 ex">
                            <div class="slide">
                                <div class="container">

                                </div>
                            </div>
                        </li>

                        <li class="slide_x" style="background-color: white">
                            <div style=" background-color: white; width: 100%; ">
                                <div class="slide">

                                    <div class="container" style="background-color: white!important;">
                                        <iframe src="https://player.vimeo.com/video/360789338" width="640" height="480" class="video-responsive" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="slide_09 ex2">
                            <div class="slide">
                                <div class="container">

                                </div>
                            </div>
                        </li>

                        <li class="slide_07">
                            <div class="slide">
                                <div class="container">
                                    {{--<h3><img src="{{URL::to('static_resources/mobile/images/dulcolax-logo.jpg')}}"/>   offers:</h3> --}}
                                    <h1 class="blue">DulcoSoft mit Stuhlweichmacher-Effekt weicht harten, trockenen
                                        Stuhl auf und erleichtert so den Stuhlgang.</h1>
                                    <div style="float: left">
                                        <div class="slide_copy"><h2>84% bestätigen: DulcsoSoft<sup>®</sup> Lösung hilft,
                                                den Toilettengang wieder angenehmer zu machen.*</h2></div>
                                        <div class="buttons slide1"><a
                                                    href="{{action('PageController@constipationandgasreliefcomparison')}}"
                                                    class="buttonFlat font-size14 bg-blue"><h3
                                                        class="button-link">{{ trans('content.header_126') }}</h3></a>
                                        </div>
                                        <div class="slide_copy"><p class="reference">*Zustimmung [stimme voll und ganz
                                                zu, stimme eher zu], DulcoSoft<sup>®</sup> Lösung Ergebnisse IPSOS Home
                                                Use Test 2018, 182 Anwender (Verstopfung/harter Stuhlgang);
                                                unveröffentlichte Datenerhebung für Sanofi-Aventis Deutschland GmbH</p>
                                        </div>
                                    </div>
                                    <div id="home_video" class="bg-blue">
                                        <p class="video_text">Aktuelle TV-Werbung</p>
                                        <
                                        <div id="player"></div>
                                        <a href="{{action('PageController@tv_spot_dulcosoft')}}">
                                            <img src="{{URL::to('static_resources/mobile/images/movie2.jpg')}}"
                                                 alt="{{ trans('content.header_249') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="slide_07">
                            <div class="slide">
                                <div class="container">
                                    {{--<h3><img src="{{URL::to('static_resources/mobile/images/dulcolax-logo.jpg')}}"/>   offers:</h3> --}}
                                    <h1>Dulcolax, der Experte bei Verstopfung, befreit mit Produkten, die auf Ihre
                                        Bedürfnisse abgestimmt sind.</h1>
                                    <div style="float: left">
                                        <div class="slide_copy"><h2>{{ trans('content.header_237') }}</h2></div>
                                        <div class="buttons slide1"><a
                                                    href="{{action('PageController@constipationandgasreliefcomparison')}}"
                                                    class="buttonFlat font-size14"><h3
                                                        class="button-link">{{ trans('content.header_126') }}</h3></a>
                                        </div>
                                        <div class="slide_copy"><p class="reference">* Müller-Lissner et al.: Bisacodyl
                                                and Sodium Picosulfate Improve Bowel Function and Quality of Life in
                                                Patients with Chronic Constipation—Analysis of Pooled Data from Two
                                                Randomized Controlled Trials. Open Journal of Gastroenterology 2017, 7,
                                                32-43</p></div>
                                    </div>
                                    <div id="home_video">
                                        <p class="video_text">Aktuelle TV-Werbung</p>
                                        <!--<div id="player"></div>-->
                                        <a href="{{action('PageController@tv_spot')}}">
                                            <img src="{{URL::to('static_resources/mobile/images/movie.jpg')}}"
                                                 alt="{{ trans('content.header_249') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slide_01">
                            <img class="slider-img"
                                 src="{{URL::to('static_resources/mobile/images/Dulcolax_Dragees_Homepage.jpg')}}"
                                 alt="Dulcolax Dragées-befreit am nächsten Morgen">
                            <div class="slide">
                                <div class="container">
                                    <h1>{{ trans('content.header_78') }}</h1>
                                    {{--<h2>{{ trans('content.header_222') }}</h2>--}}
                                    <div class="slide_copy">

                                        {{--<li>{{ trans('content.header_244b') }}</li>--}}
                                        <h2>{{ trans('content.header_246a') }}</h2>
                                        {{--<li>{{ trans('content.header_242') }}</li>--}}

                                    </div>
                                    <div class="buttons">
                                        <a href="{{action('PageController@dragees')}}" class="buttonFlat lighter"
                                           title="Dulcolax® Dragées wirken planbar über Nacht">{{ trans('content.common_0001') }} </a>
                                        @if (false)
                                            <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy"
                                               rel="tab4">Kaufen</a>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{action('PageController@dragees')}}" class="slide_product"><img
                                            src="{{URL::to('static_resources/mobile/images/slider/Dulcolax_Dragees_Packshot.png')}}"
                                            alt="{{ trans('content.header_78a') }}"
                                            title="{{ trans('content.header_78a') }}"></a>
                            </div>
                        </li>
                    {{--<li class="slide_03">
                        <img class="slider-img" src="{{URL::to('static_resources/mobile/images/Dulcolax_NP_Tropfen_Homepage.jpg')}}" alt="Dulcolax NP Tropfen-befreit am nächsten Morgen">
                        <div class="slide">
                            <div class="container">
                                <h1>{{ trans('content.header_214') }}</h1>
                                <div  class="slide_copy">
                                    <h2>{{ trans('content.header_246b') }}</h2>
                                </div>
                                <div class="buttons" >
                                    <a href="{{action('PageController@nptropfen')}}" class="buttonFlat lighter" title="Dulcolax(R) NP Tropfen wirken planbar über Nacht">{{ trans('content.common_0002') }}</a>
                                    @if (false)
                                    <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab4">Kaufen</a>
                                    @endif
                                </div>
                            </div>
                            <a href="{{action('PageController@nptropfen')}}" class="slide_product" ><img src="{{URL::to('static_resources/mobile/images/slider/Dulcolax_NP_Tropfen_Packshot.png')}}"  alt="{{ trans('content.header_214a') }}" title="{{ trans('content.header_214a') }}"></a>
                        </div>
                    </li>--}}
                    {{--<li class="slide_08">
                        <img class="slider-img" src="{{URL::to('static_resources/mobile/images/bg-slide-kinder-tropfen.png')}}" alt="Dulcolax NP Kinder Tropfen">
                        <div class="slide">
                            <div class="container">
                                <h1>Dulcolax<sup>&reg;</sup> NP Kinder Tropfen</h1>
                                <div  class="slide_copy">
                                    <h2>{{ trans('content.header_246c') }}</h2>
                                </div>
                                <div class="buttons" >
                                    <a href="{{action('PageController@kinder')}}" class="buttonFlat lighter" title="Dulcolax(R) NP Kinder Tropfen wirken planbar über Nacht">{{ trans('content.common_0002a') }}</a>
                                    @if (false)
                                        <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab4">Kaufen</a>
                                    @endif
                                </div>
                            </div>
                            <a href="{{action('PageController@kinder')}}" class="slide_product" ><img src="{{URL::to('static_resources/mobile/images/slider/Dulcolax_NP_Kinder_Tropfen_Packshot.png')}}"  alt="Dulcolax NP Kinder Tropfen" title="Dulcolax NP Kinder Tropfen"></a>
                        </div>
                    </li>--}}
                    <!--<li class="slide_04">
                        <img class="slider-img" src="{{URL::to('static_resources/mobile/images/Dulcolax_Zaepfchen_Homepage.jpg')}}" alt="Dulcolax Zaepfchen-wirken schnell-schnell befreit">
                        <div class="slide">
                            <div class="container">
                                <h1>{{ trans('content.header_82') }}</h1>
                                {{--<h2>{{ trans('content.header_225') }}</h2>--}}
                            <div  class="slide_copy">

                                    <h2>{{ trans('content.header_245') }}</h2>
                                        {{--<li>{{ trans('content.header_227') }}</li>--}}
                    {{--<li>{{ trans('content.header_241') }}</li>--}}

                            </div>
                            <div class="buttons" >
                                <a href="{{action('PageController@zapfchen')}}" class="buttonFlat lighter" title="Dulcolax® Zäpfchen wirken schnell">{{ trans('content.common_0003') }}</a>
                                </div>
                            </div>
                            <a href="{{action('PageController@zapfchen')}}" class="slide_product"><img src="{{URL::to('static_resources/mobile/images/slider/Dulcolax_Zaepfchen_Packshot.png')}}" alt="{{ trans('content.header_82a') }}" title="{{ trans('content.header_82a') }}"></a>
                        </div>
                    </li>	-->
                    </ul>
                </div>
                <div class="slider_wrapper_b"></div>
            </section>
            <section class="callouts">
                <div class="callout left">
                    <div class="callout_t left"></div>
                    <div class="callout-inner">
                        <h2>{{ trans('content.header_78') }}</h2>
                        <ul>
                            <li>{{ trans('content.header_244a') }}</li>
                            {{--<li>{{ trans('content.header_224') }}</li>--}}
                            {{--<li>{{ trans('content.header_242') }}</li>--}}
                        </ul>
                        <div class="buttons">
                            <a class="buttonFlat lighter"
                               href="{{action('PageController@dragees')}}">{{ trans('content.common_0001') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab7">Kaufen</a>
                            @endif
                        </div>
                        <div class="callout_img_1">
                            <a href="{{action('PageController@dragees')}}"><img
                                        src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}"
                                        alt="{{ trans('content.header_78a') }}"
                                        title="{{ trans('content.header_78a') }}"></a>

                        </div>
                    </div>
                </div>
                <div class="callout center">
                    <div class="callout_t center"></div>
                    <div class="callout-inner">
                        <h2>{{ trans('content.header_214') }}</h2>
                        <ul>
                            <li>{{ trans('content.header_244a') }}</li>
                            {{--<li>{{ trans('content.header_232') }}</li>--}}
                            {{--<li>{{ trans('content.header_240') }}</li>--}}
                        </ul>
                        <div class="buttons">
                            <a class="buttonFlat lighter"
                               href="{{action('PageController@nptropfen')}}">{{ trans('content.common_0002') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab4">Kaufen</a>
                            @endif
                        </div>
                        <div class="callout_img_2">
                            <a href="{{action('PageController@nptropfen')}}"><img
                                        src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}"
                                        alt="{{ trans('content.header_214a') }}"
                                        title="{{ trans('content.header_214a') }}"></a>
                        </div>
                    </div>
                </div>
                <div class="callout right">
                    <div class="callout_t right"></div>
                    <div class="callout-inner">
                        <h2>{{ trans('content.header_82') }}</h2>
                        <ul class="mid_ul">
                            <li>{{ trans('content.header_245') }}</li>
                            {{--<li>{{ trans('content.header_227') }}</li>--}}
                            {{--<li>{{ trans('content.header_241') }}</li>--}}
                        </ul>
                        <div class="buttons last">
                            <a class="buttonFlat lighter"
                               href="{{action('PageController@zapfchen')}}">{{ trans('content.common_0003') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab6">Kaufen</a>
                            @endif
                            {{--<span>See how to use our applicators</span>--}}
                            {{--<a class="buttonFlat video"  href="dulcoglide-applicators.html#video">See Video Here</a>--}}
                        </div>
                        <div class="callout_img_3">
                            <a href="{{action('PageController@zapfchen')}}"><img
                                        src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}"
                                        title="{{ trans('content.header_82a') }}"
                                        alt="{{ trans('content.header_82a') }}"></a>

                        </div>
                    </div>
                </div>
            </section>
            <section class="callouts dulcosoft-callouts clearfix">
                <div class="callout right">
                    <div class="callout-inner">
                        <h2 class="pink">{{ trans('content.header_206') }}</h2>
                        <ul class="mid_ul">
                            <li>{{ trans('content.header_207') }}<br><br></li>
                        </ul>
                        <div class="buttons">
                            <a class="buttonFlat lighter bg-pink"
                               href="{{action('PageController@npperlen')}}">{{ trans('content.common_0001') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab7">Kaufen</a>
                            @endif
                        </div>
                        <div class="callout_img_1">
                            <a href="{{action('PageController@npperlen')}}"><img
                                        src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.png')}}"
                                        alt="{{ trans('content.header_206a') }}"
                                        title="{{ trans('content.header_206a') }}"></a>
                        </div>
                    </div>
                </div>
                <div class="callout right">
                    <div class="callout-inner">
                        <h2 class="blue">{{ trans('content.header_80') }}</h2>
                        <ul class="mid_ul">
                            <li>{{ trans('content.header_251') }}</li>
                        </ul>
                        <div class="buttons">
                            <a class="buttonFlat lighter bg-blue"
                               href="{{action('PageController@dulcosoftloesung')}}">{{ trans('content.common_0001') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab7">Kaufen</a>
                            @endif
                        </div>
                        <div class="callout_img_1">
                            <a href="{{action('PageController@dulcosoftloesung')}}"><img
                                        src="{{URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot.png')}}"
                                        alt="{{ trans('content.header_80a') }}"
                                        title="{{ trans('content.header_80a') }}"></a>
                        </div>
                    </div>
                </div>
                <div class="callout right">
                    <div class="callout-inner">
                        <h2 class="blue">{{ trans('content.header_81') }}</h2>
                        <ul class="mid_ul">
                            <li>{{ trans('content.header_251') }}</li>
                        </ul>
                        <div class="buttons">
                            <a class="buttonFlat lighter bg-blue"
                               href="{{action('PageController@dulcosoftpulver')}}">{{ trans('content.common_0003') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" class="buttonFlat buy" rel="tab6">Kaufen</a>
                            @endif
                            {{--<span>See how to use our applicators</span>--}}
                            {{--<a class="buttonFlat video"  href="dulcoglide-applicators.html#video">See Video Here</a>--}}
                        </div>
                        <div class="callout_img_1">
                            <a href="{{action('PageController@dulcosoftpulver')}}"><img
                                        src="{{URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot.png')}}"
                                        title="{{ trans('content.header_81a') }}"
                                        alt="{{ trans('content.header_81a') }}"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@stop
