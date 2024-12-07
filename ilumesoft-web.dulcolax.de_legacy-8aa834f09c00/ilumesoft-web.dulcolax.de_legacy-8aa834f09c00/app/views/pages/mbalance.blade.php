@extends('layouts.mobilemaster')

@section('styles')
    @parent

@stop

@section('scripts')
    @parent

@stop

@section('content')
    <div itemscope itemtype="http://schema.org/Drug">
        <div id="wrapper" class="productDetail">

            <div class="box_content">
                <div class="product_desc">
                    <div class="product_header">
                        <div class="product_recommended">
                            <img src="{{URL::to('static_resources/mobile/images/Dulcolax_Nr.1_meist_verkauft.png')}}"
                                 alt="{{ trans('content.common_11a') }}" title="{{ trans('content.common_11a') }}">
                        </div>
                        <h2 class="product_name">{{ trans('content.header_213') }}</h2>
                        {{--<div class="product_recommended">
                          <img src="{{ URL::to('static_resources/images/seal_dulcolax_2.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}" />
                        </div>--}}
                        <h3 class="product_subheader">{{ trans('content.header_228b') }}</h3>
                    </div>
                    <div class="product_image softener_img mbalance_img">
                        <img class="no_float margin-top-reduced"
                             src="{{URL::to('static_resources/mobile/images/main-menu/Dulcolax_M_Balance_Pulver_Medizinprodukt_Packshot.png')}}"
                             alt="{{ trans('content.header_213a') }}" title="{{ trans('content.header_213a') }}">
                        <img class="add_height"
                             src="{{URL::to('static_resources/mobile/images/main-menu/Dulcolax_M_Balance_flussig_Packshot.png')}}"
                             alt="{{ trans('content.header_213b') }}" title="{{ trans('content.header_213b') }}">
                    </div>
                    <div class="product_details">
                        {{--<p>{{ trans('content.header_228') }}</p>--}}
                        <ul>
                        <!--  <li><span>{{ trans('content.header_229a') }}</span></li>
              <li><span>{{ trans('content.header_229') }}</span></li>
              <li><span>{{ trans('content.header_238') }}</span></li>
              <li><span>{{ trans('content.header_239') }}</span></li>-->

                            <li><span>{{ trans('content.mbalance_1') }}</span></li>
                            <li><span>{{ trans('content.mbalance_2') }}</span></li>
                            <li><span>{{ trans('content.mbalance_3') }}</span></li>
                            <li><span>{{ trans('content.mbalance_4') }}</span></li>
                            <li><span>{{ trans('content.mbalance_5') }}</span></li>
                            <li><span>{{ trans('content.mbalance_6') }}</span></li>
                        </ul>
                        <div class="pd_buttons">
                            <a class="learnMore hash_reload" href="#produktdetails-pulver-medizinprodukt">{{ trans('content.common_0005') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" rel="tab5"
                                   class="buy hash_reload">{{ trans('content.common_2') }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- tabs -->

                <div id="tabs-detail" class="add_margin" name="tab-area">
                    <ul class="tabs_menu">
                        <li class="tab_item" name="produktdetails-pulver-medizinprodukt" id="tab-produktdetails-pulver-medizinprodukt">
                            <a href="#produktdetails-pulver-medizinprodukt" onclick="stop()" class="tab_active"><span
                                        itemprop="name">Produktdetails</span></a>
                        </li>
                        <li class="tab_item" name="produktdetails-flussig" id="tab-produktdetails-flussig">
                            <a href="#produktdetails-flussig" onclick="stop()"> <span itemprop="name">Produktdetails</span></a>
                        </li>
                        <li class="tab_item" name="wirkung" id="tab-wirkung">
                            <a href="#wirkung" onclick="play()" class="padding-top-increase">{{ trans('content.tabs_2') }}</a>
                        </li>
                        <li class="tab_item" name="beipackzettel" id="tab-beipackzettel">
                            <a href="#beipackzettel" onclick="stop()" class="padding-top-increase">{{ trans('content.tabs_8') }}</a>
                        </li>
                    </ul>
                    <div class="tabs_content">
                        <h3 onclick="stop()">Produktdetails</h3>
                        <div id="produktdetails-pulver-medizinprodukt" class="tab_content">
                            {{ trans('content.mbalance_tab1a') }}

                        </div>

                        <h3 onclick="stop()">Produktdetails</h3>
                        <div id="produktdetails-flussig" class="tab_content">
                            {{ trans('content.mbalance_tab2') }}

                        </div>

                        <h3 onclick="play()">{{ trans('content.tabs_2') }}</h3>
                        <div id="wirkung" class="tab_content">
                            <p>{{ trans('content.mbalance_tab3a') }}</p>

                            <p>{{ trans('content.mbalance_tab3e') }}<br/>
                            {{--<h4>{{ trans('content.mbalance_tab4a') }}</h4>--}}
                            <div class="border_video">
                                {{--<object class="swf" data="{{URL::to('static_resources/swf/Dulcolax_M_Balance_Wirkdemo.swf')}}"--}}
                                        {{--width="512" name="idp19728" height="288" type="application/x-shockwave-flash"--}}
                                        {{--class="left">--}}
                                    {{--<param name="movie" value="static_resources/swf/Dulcolax_Balance_Wirkdemo.swf">--}}
                                    {{--<param name="wmode" value="transparent">--}}
                                    {{--<param name="quality" value="best">--}}
                                    {{--<param name="base" value=".">--}}
                                    {{--<param name="height" value="288">--}}
                                    {{--<param name="width" value="512">--}}
                                    {{--<param name="FlashVars"--}}
                                           {{--value="name=idp19728&amp;MIN-FLASH-PLAYER=9.0.0&amp;BGCOLOR=&amp;QUALITY=high&amp;WMODE=transparent&amp;CONTEXTMENU=show">--}}
                                {{--</object>--}}

                                <video id="video1" width="512" height="288" controls>
                                    <source src="/static_resources/video/Dulcolax_M_Balance_Wirkdemo.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <h3 onclick="stop()">{{ trans('content.tabs_8a') }}</h3>
                        <div id="beipackzettel" class="tab_content clearfix">
                        {{--<ul>--}}
                        {{--<li>--}}
                          <a class="underline pdf-link" target="_blank"
                             href="{{URL::to('pdf/Dulcolax_M_Balance_Pulver_Medizinprodukt_Beipackzettel.pdf')}}">
                              <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                   alt="{{ trans('content.common_107a') }}" title="{{ trans('content.common_107a') }}">
                              <span class="pdf-text">Dulcolax<sup>&reg;</sup> M Balance Pulver Medizinprodukt Beipackzettel</span>
                          </a>
                          <br><br><br>
                          
                            <!-- Info from PDF pulver -->
                            {{ trans('content.tab_content_pdf_balance_pulver') }}
                            <!-- END Info from PDF pulver -->
                            <a class="underline pdf-link" target="_blank"
                               href="{{URL::to('pdf/Dulcolax_M_Balance_Pulver_Medizinprodukt_Beipackzettel.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                     alt="{{ trans('content.common_107a') }}" title="{{ trans('content.common_107a') }}">
                                <span class="pdf-text">Dulcolax<sup>&reg;</sup> M Balance Pulver Medizinprodukt Beipackzettel</span>
                            </a>
                            <br><br><br>
                            <hr><br>

                            <a class="underline pdf-link" target="_blank"
                               href="{{URL::to('pdf/Dulcolax_M_Balance_fluessig_Beipackzettel.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                     alt="{{ trans('content.common_107b') }}" title="{{ trans('content.common_107b') }}"><span class="pdf-text">{{ trans('content.common_107b') }}</span></a>
                            <br><br><br>
                            <!-- Info from PDF fluessig -->
                            {{ trans('content.tab_content_pdf_balance_fluessig') }}
                            <!-- END Info from PDF fluessig -->
                            <a class="underline pdf-link" target="_blank"
                               href="{{URL::to('pdf/Dulcolax_M_Balance_fluessig_Beipackzettel.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                     alt="{{ trans('content.common_107b') }}" title="{{ trans('content.common_107b') }}"><span class="pdf-text">{{ trans('content.common_107b') }}</span></a>
                        {{--</li>--}}
                        {{--</ul>--}}
                        </div>
                    </div>
                </div>


                <!-- grid -->
                <div class="product_grid">
                    <h4>{{ trans('content.common_8b') }}</h4>
                    @include('includes.related-products')

                </div>
            </div>
        </div>
    </div>
@stop
