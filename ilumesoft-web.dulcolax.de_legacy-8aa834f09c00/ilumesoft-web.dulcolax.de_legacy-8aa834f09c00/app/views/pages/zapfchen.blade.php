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
                    <div class="product_header softener_header">
                        <div class="product_recommended">
                            <img src="{{URL::to('static_resources/mobile/images/Dulcolax_Nr.1_meist_verkauft.png')}}"
                                 alt="{{ trans('content.common_11a') }}" title="{{ trans('content.common_11a') }}">
                        </div>
                        <h2 class="product_name">{{ trans('content.header_82') }}</h2>
                        {{--<div class="product_recommended">
                          <img src="{{ URL::to('static_resources/mobile/images/main-menu/menu_dulcolax-zapfchen.png')}}" alt="{{ trans('content.header_82a') }}" title="{{ trans('content.header_82a') }}" />
                        </div>--}}
                        <h3 class="product_subheader">{{ trans('content.header_225b') }}</h3>
                    </div>
                    <div class="product_image softener_img">
                        <img src="{{URL::to('static_resources/mobile/images/packshots/Dulcolax_Zaepfchen_Packshot.png')}}"
                             alt="{{ trans('content.header_82a') }}" title="{{ trans('content.header_82a') }}">
                    </div>
                    <div class="product_details">
                        {{--<p>{{ trans('content.header_225') }}</p>--}}
                        <ul>
                            <li><span>{{ trans('content.header_226') }}</span></li>
                            <li><span>{{ trans('content.header_227') }}</span></li>
                            <li><span>{{ trans('content.header_241') }}</span></li>
                        </ul>
                        <div class="pd_buttons">
                            <a class="learnMore hash_reload" href="#produktdetails">{{ trans('content.common_0003') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" rel="tab3"
                                   class="buy hash_reload">{{ trans('content.common_2') }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- tabs -->

                <div id="tabs-detail" name="tab-area">
                    <ul class="tabs_menu">
                        <li class="tab_item" name="produktdetails" id="tab-produktdetails">
                            <a href="#produktdetails" class="padding-top-increase tab_active"><span
                                        itemprop="name">Produktdetails</span></a>
                        </li>
                        <li class="tab_item" name="wirkung" id="tab-wirkung">
                            <a href="#wirkung" class="padding-top-increase">{{ trans('content.tabs_2') }}</a>
                        </li>
                        <li class="tab_item" name="beipackzettel" id="tab-beipackzettel">
                            <a href="#beipackzettel" class="padding-top-increase">{{ trans('content.tabs_8') }}</a>
                        </li>
                    </ul>
                    <div class="tabs_content">
                        <h3>Produktdetails</h3>
                        <div id="produktdetails" class="tab_content">
                            {{ trans('content.zapfchen_tab1') }}
                        </div>

                        <h3>{{ trans('content.tabs_2') }}</h3>
                        <div id="wirkung" class="tab_content">
                            <p>{{ trans('content.zapfchen_tab2') }}</p>
                        </div>

                        <h3>{{ trans('content.tabs_8') }}</h3>
                        <div id="beipackzettel" class="tab_content clearfix">
                        {{--<ul>--}}
                        {{--<li>--}}

                          <a class="pdf-link" target="_blank" href="{{URL::to('pdf/Dulcolax_Zaepfchen_Beipackzettel.pdf')}}">
                              <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                   alt="{{ trans('content.common_106') }}" title="{{ trans('content.common_106') }}">
                             <span class="pdf-text">Dulcolax<sup>&reg;</sup> Zäpfchen Beipackzettel</span>
                          </a>
                          <br><br><br>

                        <!-- Info from PDF -->
                        {{ trans('content.tab_content_pdf_zapfchen') }}
                        <!-- END Info from PDF -->

                            <a class="pdf-link" target="_blank" href="{{URL::to('pdf/Dulcolax_Zaepfchen_Beipackzettel.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                     alt="{{ trans('content.common_106') }}" title="{{ trans('content.common_106') }}">
                                <span class="pdf-text">Dulcolax<sup>&reg;</sup> Zäpfchen Beipackzettel</span>
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
