<div class="brand-outer-container">
    <div class="header">
        <a class="no-disclaimer-popup" href="http://www.sanofi.de" target="_blank">
            <img src="{{ URL::to('static_resources/mobile/images/sanofi-logo.png')}}" alt="Sanofi" title="Sanofi">
        </a>
    </div>
</div>
<div id="stickyHeader">
    <header class="header">
        <a href="{{action('PageController@home')}}">
			@if (Request::fullUrl() == action('PageController@stoolsoftener') || Request::fullUrl() == action('PageController@dulcosoft') || Request::fullUrl() == action('PageController@dulcosoftpregnancy') || Request::fullUrl() == action('PageController@kaufendulcosoft'))
				<img src="{{ URL::to('static_resources/mobile/images/dulcosoft-logo.jpg')}}" alt="{{ trans('content.header_2') }}" class="logo">
			@else
				<img src="{{ URL::to('static_resources/mobile/images/dulcolax-logo.jpg')}}" alt="{{ trans('content.header_1') }}" class="logo">
			@endif
        </a>
        <a href="#" class="menuBtn">
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </a>
        <nav class="smartphone" id="main-menu">
            <ul class="level-0">
                <li class="with-dropdown">
					<a href="#" class="blue">{{ trans('content.common_11') }}</a>
					<ul class="level-1">
						<li style="border-top-color: #0087a7;"><a href="{{action('PageController@stoolsoftener')}}" class="bg-blue">{{ trans('content.common_11') }}</a></li>
						<li><a href="{{action('PageController@dulcosoft')}}" class="bg-blue">{{ trans('content.header_88') }}</a></li>
						<li><a href="{{action('PageController@dulcosoftpregnancy')}}" class="bg-blue">{{ trans('content.header_89') }}</a></li>
					</ul>
				</li>

                <li class="with-dropdown">
                    <a href="#">{{ trans('content.common_10') }}</a>
                    <ul class="level-1">
                        <li><a href="{{action('PageController@verstopung_perlen')}}" class="bg-pink"> {{ trans('Allgemein') }}</a></li>
                        <li><a href="{{action('PageController@verstopung_perlen_stress')}}" class="bg-pink">{{ trans('Stress') }}</a></li>
                        <li><a href="{{action('PageController@verstopung_perlen_ernaehrung')}}" class="bg-pink">{{ trans('Ernährung') }}</a></li>
                        <li><a href="{{action('PageController@verstopung_perlen_hormone')}}" class="bg-pink">{{ trans('Hormone') }}</a></li>
                        <li><a href="{{action('PageController@verstopung_perlen_reise')}}" class="bg-pink">{{ trans('Reise') }}</a></li>
                        <li><a href="{{action('PageController@constipationcausessymptoms')}}">{{ trans('Dulcolax- Der Klassiker') }}</a></li>
                    </ul>
                </li>


                <li class="with-dropdown">
                    <a href="#">{{ trans('content.common_23') }}</a>
                    <ul class="level-1">
                        <li><a href="{{action('PageController@constipationandgasrelief')}}">{{ trans('content.header_77') }}</a></li>
                        <li><a href="{{action('PageController@dragees')}}">{{ trans('content.header_78') }}</a></li>
                        <li><a href="{{action('PageController@nptropfen')}}">{{ trans('content.header_214') }}</a></li>
						{{--<li><a href="{{action('PageController@kinder')}}">{{ trans('content.header_83') }}</a></li>--}}
                        <li><a href="{{action('PageController@zapfchen')}}">{{ trans('content.header_82') }}</a></li>
						<li><a href="{{action('PageController@npperlen')}}" class="bg-pink">{{ trans('content.header_206') }}</a></li>
                        <li><a href="{{action('PageController@dulcosoftloesung')}}" class="bg-blue">{{ trans('content.header_80') }}</a></li>
                        <li><a href="{{action('PageController@dulcosoftpulver')}}" class="bg-blue">{{ trans('content.header_81') }}</a></li>
                        <li><a href="{{action('PageController@packshot')}}">{{ trans('content.header_84') }}</a></li>
                    </ul>
                </li>



                <li class="with-dropdown">
                    <a href="#">{{ trans('content.common_51a') }}</a>
                    <ul class="level-1">
                        <li><a href="{{action('PageController@advice')}}">{{ trans('content.common_63') }}</a></li>
                        <li><a href="{{action('PageController@historie')}}">{{ trans('content.header_85') }}</a></li>
                        <li><a href="{{action('PageController@brochure')}}">{{ trans('content.header_86') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{action('PageController@kaufen')}}">{{ trans('content.header_87') }}</a></li>
            </ul>
        </nav>

        <nav class="mainNav">
            <ul>
                <li class="tablet-item blue-item @if( $MenuActive == 'StoolSoftener')  active @endif">
                    <a href="{{action('PageController@stoolsoftener')}}">{{ trans('content.common_11') }}</a>
                </li>
                <li class="tablet-item @if( $MenuActive == 'AboutConstipation')  active @endif">
                    <a href="{{action('PageController@constipationcausessymptoms')}}">{{ trans('content.common_10') }}</a>
                </li>
                <li id="allProductsBtn" class="tablet-item @if( $MenuActive == 'AllProducts')  active @endif">
                    <a href="{{action('PageController@constipationandgasrelief')}}">
                        {{ trans('content.common_23') }}
                    </a>
                </li>
                {{--<li><a href="{{action('PageController@pharmacyfinder')}}">{{ trans('content.common_94') }}</a></li>--}}
                {{--<li><a href="{{action('PageController@aboutgas')}}">{{ trans('content.common_49') }}</a></li>--}}
                {{--<li class="selectArrow" id="buyNow-tablet"><a href="{{action('PageController@onlineshops')}}">{{ trans('content.common_39') }}</a></li>--}}
                <li class="tablet-item @if( $MenuActive == 'Advice')  active @endif">
                    <a href="{{action('PageController@advice')}}">{{ trans('content.common_51a') }}</a>
                </li>
                <li class="tablet-item @if( $MenuActive == 'Buy')  active @endif">
                    <a href="{{action('PageController@kaufen')}}">{{ trans('content.header_87') }}</a>
                </li>
            </ul>
        </nav>

        <div class="sub-header">
            <ul class="main-menu">
                <li id="stoolSoftener-item" class="m_buy_now desktop-item @if( $MenuActive == 'StoolSoftener') active @endif">
                    <span class="first-item first-blue-item"></span>
                    <a class="stoolSoftener" href="{{action('PageController@stoolsoftener')}}">
                        {{ trans('content.common_11') }}
                    </a>
					<div id="sm_buy_now" class="">
                        <div class="sm_all_products_wrapper border5 home_page_dd">
                            <div class="menu_buy_now">
                                <div class="left mbn_left">
                                    <div class="bnm_product dulcosoft product_active" name="ap_panel1">
                                        <a href="{{action('PageController@dulcosoft')}}">{{ trans('content.header_88') }}</a>
                                        <!-- Panel 1 -->
                                        <div id="ap_panel1" class="left mbn_right">
                                            <a href="{{action('PageController@dulcosoft')}}">
                                                <img class="" src="{{ URL::to('static_resources/mobile/images/main-menu/stuhlweichmacher_1.jpg')}}" alt="" title="">
                                            </a>
                                        </div>
                                        <!-- End Panel 1-->
                                    </div>
                                    <div class="bnm_product dulcosoft" name="ap_panel2" style="cursor:pointer">
                                        <a href="{{action('PageController@dulcosoftpregnancy')}}">{{ trans('content.header_89') }}</a>
                                        <!-- Panel 2 -->
                                        <div id="ap_panel2" class="left mbn_right">
                                            <a href="{{action('PageController@dulcosoftpregnancy')}}">
                                                <img class="" src="{{ URL::to('static_resources/mobile/images/main-menu/stuhlweichmacher_2.jpg')}}" alt="" title="">
                                            </a>
                                        </div>
                                        <!-- End Panel 2-->
                                    </div>
                                </div>
                                <!-- Starting right panel -->
                            </div> <!--close panels-->
                        </div> <!--close wrapper-->
                    </div>
                </li>




                <li class="separator "></li>
                <li id="advice-item" class="@if( $MenuActive == 'Verstopfung') active @endif">
                    <a class="advice " href="{{action('PageController@constipationcausessymptoms')}}">{{ trans('content.common_10') }}</a>
                    <div id="dropdown">
                        <ul id="dropdown-list" class="">
                            <li><a href="{{action('PageController@verstopung_perlen')}}" class="mega-mind"> {{ trans('Allgemein') }}</a></li>
                            <li><a href="{{action('PageController@verstopung_perlen_stress')}}" class="mega-mind">{{ trans('Stress') }}</a></li>
                            <li><a href="{{action('PageController@verstopung_perlen_ernaehrung')}}" class="mega-mind">{{ trans('Ernährung') }}</a></li>
                            <li><a href="{{action('PageController@verstopung_perlen_hormone')}}" class="mega-mind">{{ trans('Hormone') }}</a></li>
                            <li><a href="{{action('PageController@verstopung_perlen_reise')}}" class="mega-mind">{{ trans('Reise') }}</a></li>
                            <li><a href="{{action('PageController@constipationcausessymptoms')}}">Dulcolax<sup>&reg;</sup> - Der Klassiker</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Color the pink buttons -->
                <style>
                    .mega-mind:hover{
                        background-color: #d50061!important;
                        color: white!important;
                    }
                    .mega-mind {
                        color: #d50061!important;
                    }
                </style>




                <li class="separator"></li>
                <li id="allProducts-item" class="m_all_products desktop-item @if( $MenuActive == 'AllProducts') active @endif">
                    <a class="allProducts" href="{{action('PageController@constipationandgasrelief')}}">
                        {{ trans('content.common_23') }}
                    </a>
                    <div id="sm_all_products" class="">
                        <div class="sm_all_products_wrapper border5 home_page_dd">
                            <div class="menu_buy_now">
                                <div class="left mbn_left">
                                    <div class="bnm_product product_active" name="ap_panel1">
                                        <a href="{{action('PageController@constipationandgasrelief')}}">{{ trans('content.header_77') }}</a>
                                        <!-- Panel 1 - Dulcolax<sup>&reg;</sup> – die gut verträgliche Lösung bei Verstopfung -->
                                        <div id="ap_panel1" class="left mbn_right">
                                            <a href="{{action('PageController@constipationandgasrelief')}}">
                                                <img class="" src="{{ URL::to('static_resources/mobile/images/main-menu/produkte.png')}}" alt="Dulcolax Produkte" title="Dulcolax Produkte">
                                            </a>
                                            <h2 class="new-btn"> <a class="hash_reload btnDark" href="{{action('PageController@constipationandgasreliefcomparison')}}">Erfahren Sie mehr zu den Dulcolax<sup>&reg;</sup> Produkten</a></h2>
                                            <div>
                                                <div class="left popupFont">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Panel 1-->
                                    </div>
                                    <div class="bnm_product" name="ap_panel2" style="cursor:pointer">
                                        <a href="{{action('PageController@dragees')}}">{{ trans('content.header_78') }}</a>
                                        <!-- Panel 2 - Dulcolax<sup>&reg;</sup> Dragées -->
                                        <div id="ap_panel2" class="left mbn_right">
                                            <h1>{{ trans('content.header_78') }}</h1>
                                            {{--<h4>{{ trans('content.header_247') }}</h4>--}}
                                            <div>
                                                <div class="left">
                                                    <img class="product" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}" alt="{{ trans('content.header_78a') }}" title="{{ trans('content.header_78a') }}">
                                                    {{--<p>{{ trans('content.header_222') }}</p>--}}
                                                </div>
                                                <div class="left ul_dd">

                                                    <h2>{{ trans('content.header_244') }}</h2>
                                                    {{--<li>{{ trans('content.header_224') }}</li>--}}
                                                    {{--<li>{{ trans('content.header_242') }}</li>--}}


                                                    <div class="pd_buttons">
                                                        <a class="learnMore hash_reload" href="{{action('PageController@dragees')}}"><h3>{{ trans('content.common_001') }}</h3></a>
                                                    </div>

                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- End Panel 2-->
                                    </div>
                                    <div class="bnm_product" name="ap_panel8">
                                        <a href="{{action('PageController@nptropfen')}}">{{ trans('content.header_214') }}</a>
                                        <!-- Panel 8 - Dulcolax<sup>&reg;</sup> NP Tropfen -->
                                        <div id="ap_panel8" class="left mbn_right">
                                            <h1>{{ trans('content.header_214') }}</h1>
                                            {{--<h4>{{ trans('content.header_249') }}</h4>--}}
                                            <div>
                                                <div class="left"><img class="product3" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}" alt="{{ trans('content.header_214a') }}" title="{{ trans('content.header_214a') }}">
                                                    {{--<p>{{ trans('content.header_230') }}</p>--}}
                                                </div>
                                                <div class="left ul_dd">

                                                    <h2>{{ trans('content.header_244') }}</h2>
                                                    {{--<li>{{ trans('content.header_232') }}</li>--}}
                                                    {{--<li>{{ trans('content.header_240') }}</li>--}}

                                                    <div class="pd_buttons">
                                                        <a class="learnMore hash_reload" href="{{action('PageController@nptropfen')}}"><h3>{{ trans('content.common_002') }}</h3></a>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- End Panel 8-->
                                    </div>
                                    {{--<div class="bnm_product" name="ap_panel5">
                                        <a href="{{action('PageController@kinder')}}">{{ trans('content.header_83') }}</a>
                                        <!-- Panel 5 - Dulcolax<sup>&reg;</sup> NP Tropfen -->
                                        <div id="ap_panel5" class="left mbn_right">
                                            <h1>{{ trans('content.header_83') }}</h1>
                                            <div>
                                                <div class="left">
                                                    <img class="product3" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Kinder_Tropfen_Packshot.png')}}" alt="{{ trans('content.header_214a') }}" title="{{ trans('content.header_214a') }}">
                                                </div>
                                                <div class="left ul_dd">
                                                    <h2>{{ trans('content.header_244') }}</h2>
                                                    <div class="pd_buttons">
                                                        <a class="learnMore hash_reload" href="{{action('PageController@kinder')}}"><h3>{{ trans('content.common_002a') }}</h3></a>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- End Panel 5-->
                                    </div>--}}
                                    <div class="bnm_product" name="ap_panel4">
                                        <a href="{{action('PageController@zapfchen')}}">{{ trans('content.header_82') }}</a>
                                        <!-- Panel 4 - Dulcolax<sup>&reg;</sup> Zäpfchen -->
                                        <div id="ap_panel4" class="left mbn_right">
                                            <h1>{{ trans('content.header_82') }}</h1>
                                            {{--<h4>{{ trans('content.header_248') }}</h4>--}}
                                            <div>
                                                <div class="left"><img class="product" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}" alt="{{ trans('content.header_82a') }}" title="{{ trans('content.header_82a') }}">
                                                    {{--<p>{{ trans('content.header_225') }}</p>--}}
                                                </div>

                                                <div class="left ul_dd">
                                                    <h2>{{ trans('content.header_245') }}</h2>
                                                    {{--<li>{{ trans('content.header_227') }}</li>--}}
                                                    {{--<li>{{ trans('content.header_241') }}</li>--}}
                                                    <div class="pd_buttons">
                                                        <a class="learnMore hash_reload" href="{{action('PageController@zapfchen')}}"><h3>{{ trans('content.common_003') }}</h3></a>
                                                        @if (false)
                                                        <a href="{{action('PageController@onlineshops')}}" class="hash_reload buyNow">{{ trans('content.common_003') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- End Panel 4-->
                                    </div>
									<div class="bnm_product perlen" name="ap_panel3">
                                        <a href="{{action('PageController@npperlen')}}">{{ trans('content.header_206') }}</a>
                                        <!-- Panel 3 - Dulcolax<sup>&reg;</sup> NP Perlen -->
                                        <div id="ap_panel3" class="left mbn_right">
                                            <h1 class="pink">{{ trans('content.header_206') }}</h1>
                                            <div>
                                                <div class="left">
													<img class="product" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.png')}}" alt="{{ trans('content.header_206a') }}" title="{{ trans('content.header_206a') }}">
                                                </div>
                                                <div class="left ul_dd">
                                                    <h2>{{ trans('content.header_207') }}</h2>
                                                    <div class="pd_buttons">
                                                        <a class="learnMore hash_reload bg-pink" href="{{action('PageController@npperlen')}}"><h3>{{ trans('content.common_002') }}</h3></a>
														@if (false)
                                                        <a href="{{action('PageController@onlineshops')}}" class="hash_reload buyNow">{{ trans('content.common_005') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- End Panel 3-->
                                    </div>
                                    <div class="bnm_product dulcosoft" name="ap_panel6">
                                        <a href="{{action('PageController@dulcosoftloesung')}}">{{ trans('content.header_80') }}</a>
                                        <!-- Panel 6 - DulcoSoft<sup>&reg;</sup> -->
                                        <div id="ap_panel6" class="left mbn_right">
                                            <h1 class="blue">{{ trans('content.header_80') }}</h1>
                                            <div>
                                                <div class="left"><img class="product narrow" src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot_2.png')}}" alt="{{ trans('content.header_80a') }}" title="{{ trans('content.header_80a') }}"></div>
                                                <div class="left ul_dd">
                                                    <h2>{{ trans('content.header_251') }}</h2>
                                                    <div class="pd_buttons">
                                                        <a class="learnMore hash_reload bg-blue" href="{{action('PageController@dulcosoftloesung')}}"><h3>{{ trans('content.common_005') }}</h3></a>
                                                        @if (false)
                                                        <a href="{{action('PageController@onlineshops')}}" class="hash_reload buyNow">{{ trans('content.common_005') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- End Panel 6-->
                                    </div>
                                    <div class="bnm_product dulcosoft" name="ap_panel7">
                                        <a href="{{action('PageController@dulcosoftpulver')}}">{{ trans('content.header_81') }}</a>
                                        <!-- Panel 6 - DulcoSoft<sup>&reg;</sup> -->
                                        <div id="ap_panel7" class="left mbn_right">
                                            <h1 class="blue">{{ trans('content.header_81') }}</h1>
                                            <div>
                                                <div class="left"><img class="product narrow" src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot_2.png')}}" alt="{{ trans('content.header_81a') }}" title="{{ trans('content.header_81a') }}"></div>
                                                <div class="left ul_dd">
                                                    <h2>{{ trans('content.header_251') }}</h2>
                                                    <div class="pd_buttons">
                                                        <a class="learnMore hash_reload bg-blue" href="{{action('PageController@dulcosoftpulver')}}"><h3>{{ trans('content.common_005') }}</h3></a>
                                                        @if (false)
                                                        <a href="{{action('PageController@onlineshops')}}" class="hash_reload buyNow">{{ trans('content.common_005') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- End Panel 7-->
                                    </div>
                                    <div class="bnm_product" name="ap_panel13">
                                        <a href="{{action('PageController@packshot')}}">{{ trans('content.header_84') }}</a>
                                        <!-- Panel 13 -->
                                        <div id="ap_panel13" class="left mbn_right pack">
                                            <h1>{{ trans('content.header_84') }}</h1>
                                            <div>
                                                <div class="left popupFont">
                                                    <img class="historie" src="{{ URL::to('static_resources/mobile/images/main-menu/Dulcolax_Sortiment.png')}}" alt="" title="">
                                                    <a class="hash_reload btnDark2" href="{{action('PageController@packshot')}}">Packshots-Download</a>
                                                </div>

                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                        <!-- End Panel 13-->
                                    </div>
                                    {{--<div class="bnm_product" name="ap_panel10"><a href="{{action('PageController@pflichttext')}}">{{ trans('content.header_216') }}</a></div>--}}
                                    {{--<div class="bnm_product" name="ap_panel11"><a href="{{action('PageController@drops')}}">{{ trans('content.common_26') }}</a></div>--}}
                                    {{--<div class="bnm_product" name="ap_panel12"><a href="{{action('PageController@dulcolax_enema')}}">{{ trans('content.common_36') }}</a></div>--}}
                                </div>
                                <!-- Starting right panel -->
                            </div> <!--close panels-->
                        </div> <!--close wrapper-->
                    </div>
                    <!-- end of All Products menu -->
                </li>
                {{--<li class="separator"></li>--}}
                {{--<li id="apofinder-item" class="desktop-item @if( $MenuActive == 'ApoFinder')  active @endif">--}}
                    {{--<a href="{{action('PageController@pharmacyfinder')}}">--}}
                        {{--{{ trans('content.common_94') }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--<li class="separator"></li>--}}
                {{--<li class="@if( $MenuActive == 'AboutGas') active @endif">--}}
                    {{--<a href="{{action('PageController@aboutgas')}}">--}}
                        {{--{{ trans('content.common_49') }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--<li id="buyNow-item-tablet" class="desktop-item">--}}
                    {{--<a href="{{action('PageController@kaufen')}}">--}}
                        {{--{{ trans('content.common_99') }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                <li class="separator"></li>
                <li id="advice-item" class="@if( $MenuActive == 'Advice') active @endif">
                    <a class="advice" href="{{action('PageController@advice')}}">{{ trans('content.common_51a') }}</a>
                    <div id="dropdown">
                        <ul id="dropdown-list">
                            <li><a href="{{action('PageController@advice')}}">{{ trans('content.common_63') }}</a></li>
                            <li><a href="{{action('PageController@historie')}}">{{ trans('content.header_85') }}</a></li>
                            <li><a href="{{action('PageController@brochure')}}">{{ trans('content.header_86') }}</a></li>
                        </ul>
                    </div>
                </li>
                <li class="separator"></li>
                <li id="buy-item" class="@if( $MenuActive == 'Buy') active @endif">
                    <a class="buy" href="{{action('PageController@kaufen')}}">{{ trans('content.header_87') }}</a>
                    <div id="dropdown2">
                        <ul id="dropdown-list2">
                            <li><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe">{{ trans('content.common_100') }}</a></li>
                            <li><a href="{{action('PageController@kaufen')}}#online-kaufen">{{ trans('content.common_111') }}</a></li>
                        </ul>
                    </div>
                    <span class="last-item"></span>
                </li>
            </ul>
        </div>

		<div style="clear: both;"></div>

        @if (Request::fullUrl() == action('PageController@stoolsoftener') || Request::fullUrl() == action('PageController@dulcosoft') || Request::fullUrl() == action('PageController@dulcosoftpregnancy') || Request::fullUrl() == action('PageController@kaufendulcosoft'))
			<h2 class="blue">{{ trans('content.header_243a') }}</h2>
        @else
			<h2>{{ trans('content.header_243') }}</h2>
        @endif

        <script type="text/javascript">
            function onClickUrl(val) {
                location.href = val;
            }
        </script>



        <!-- Buy Now Menu -->

        @include('includes.breadcrumb')
    </header>
</div>
