@extends('layouts.mobilemaster')

@section('styles')
    @parent

@stop

@section('scripts')
    @parent

@stop

@section('content')
    <div itemscope itemtype="http://schema.org/Drug">

        <div id="wrapper" class="productDetail section-nptropfen">

            <div class="box_content">
                <div class="product_desc">
                    <div class="product_header dulcogas_header">
                        <div class="product_recommended">
                            <img src="{{URL::to('static_resources/mobile/images/Dulcolax_Nr.1_meist_verkauft.png')}}"
                                 alt="{{ trans('content.common_11a') }}" title="{{ trans('content.common_11a') }}">
                        </div>
                        <h2 class="product_name">{{ trans('content.header_214') }}</h2>
                        {{--<div class="product_recommended" style="margin: 30px 0 0 -20px;">
                            <img src="{{ URL::to('static_resources/images/seal_dulcolax.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}">
                        </div>--}}

                        <h3 class="product_subheader">{{ trans('content.header_230a') }}</h3>
                    </div>
                    <div class="product_image dulcogas">
                        <img src="{{URL::to('static_resources/mobile/images/packshots/Dulcolax_NP_Tropfen_Packshot.png')}}"
                             alt="{{ trans('content.header_214a') }}" title="{{ trans('content.header_214a') }}">
                    </div>
                    {{--<p>{{ trans('content.header_230') }}</p>--}}
                    <div class="product_details">
                        <ul>
                            <li><span>{{ trans('content.header_231') }}</span></li>
                            <li><span>{{ trans('content.header_232') }}</span></li>
                            <li><span>{{ trans('content.header_240') }}</span></li>
                        </ul>
                        <div class="pd_buttons">
                            <a class="learnMore hash_reload" href="#produktdetails">{{ trans('content.common_0002') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" rel="tab7"
                                   class="buy hash_reload">{{ trans('content.common_2') }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- tabs -->

                <div id="tabs-detail" name="tab-area">
                    <ul class="tabs_menu">
                        <li class="tab_item" name="produktdetails" id="tab-produktdetails">
                            <a href="#produktdetails" class="tab_active"><span itemprop="name">Produktdetails</span></a>
                        </li>
                        <li class="tab_item" name="bn" id="tab-wirkung">
                            <a class="padding-top-increase" href="#wirkung">{{ trans('content.tabs_2') }}</a>
                        </li>
                        <li class="tab_item" name="hinweis" id="tab-hinweis">
                            <a class="padding-top-increase" href="#hinweis">{{ trans('content.tabs_3') }}</a>
                        </li>
                        <li class="tab_item" name="beipackzettel" id="tab-beipackzettel">
                            <a class="padding-top-increase padding-left-reduced" href="#beipackzettel">{{ trans('content.tabs_8') }}</a>
                        </li>
                    </ul>
                    <div class="tabs_content">
                        <h3>Produktdetails</h3>
                        <div id="produktdetails" class="tab_content">
                            {{ trans('content.nptropfen_tab1') }}
                        </div>

                        <h3>{{ trans('content.tabs_2') }}</h3>
                        <div id="wirkung" class="tab_content">
                            <p>{{ trans('content.nptropfen_tab2') }}</p>
                        </div>


                        <h3>{{ trans('content.tabs_3') }}</h3>
                        <div id="hinweis" class="tab_content">
                            <p>{{ trans('content.nptropfen_tab3') }}</p>
                        </div>


                        <h3>{{ trans('content.tabs_8') }}</h3>
                        <div id="beipackzettel" class="tab_content clearfix">
                        {{--<ul>--}}
                        {{--<li>--}}
                          <a class="pdf-link"target="_blank" href="{{URL::to('pdf/Dulcolax_NP_Tropfen_Beipackzettel.pdf')}}">
                              <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                   alt="{{ trans('content.common_105') }}" title="{{ trans('content.common_105') }}">
                                  <span class="pdf-text">Dulcolax <sup>&reg;</sup> NP Tropfen Beipackzettel</span>
                          </a>
                          <br><br><br>
                        <!-- Info from PDF -->
                        {{ trans('content.tab_content_pdf_tropfen') }}
                        <!-- END Info from PDF -->

                            <a class="pdf-link" target="_blank" href="{{URL::to('pdf/Dulcolax_NP_Tropfen_Beipackzettel.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                     alt="{{ trans('content.common_105') }}" title="{{ trans('content.common_105') }}">
                                    <span class="pdf-text">Dulcolax <sup>&reg;</sup> NP Tropfen Beipackzettel</span>
                            </a>
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
