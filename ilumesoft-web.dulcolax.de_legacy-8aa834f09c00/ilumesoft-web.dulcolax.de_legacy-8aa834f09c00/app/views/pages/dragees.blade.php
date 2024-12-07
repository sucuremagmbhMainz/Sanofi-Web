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
                <div class="product_desc clearfix">

                    <div class="product_header">
                        <div class="product_recommended">
                            <img src="{{URL::to('static_resources/mobile/images/Dulcolax_Nr.1_meist_verkauft.png')}}"
                                 alt="{{ trans('content.common_11a') }}" title="{{ trans('content.common_11a') }}">
                        </div>
                        <h2 class="product_name">{{ trans('content.header_78') }}</h2>

                        <h3 class="product_subheader">{{ trans('content.header_230c') }}</h3>
                    </div>
                    <div class="product_image dragees_img">
                        <img src="{{URL::to('static_resources/mobile/images/packshots/Dulcolax_Dragees_Packshot.png')}}"
                             alt="{{ trans('content.header_78a') }}" title="{{ trans('content.header_78a') }}">
                    </div>
                    <div class="product_details">
                        {{--<p>{{ trans('content.header_222') }}</p>--}}
                        <ul>
                            <li><span>{{ trans('content.header_223') }}</span></li>
                            <li><span>{{ trans('content.header_224') }}</span></li>
                            <li><span>{{ trans('content.header_242') }}</span></li>
                        </ul>
                        <div class="pd_buttons">
                            <a class="learnMore hash_reload" href="#produktdetails">{{ trans('content.common_0001') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" rel="tab1"
                                   class="buy hash_reload">{{ trans('content.common_2') }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- tabs --}}
                <div id="tabs-detail" class="clearfix" name="tab-area">
                    <ul class="tabs_menu">
                        <li class="tab_item" name="produktdetails" id="tab-produktdetails">
                            <a href="#produktdetails" class="padding-top-increase tab_active">
                                <span itemprop="name">Produktdetails</span>
                            </a>
                        </li>
                        <li class="tab_item" name="drug-hinweis" id="tab-hinweis">
                            <a href="#hinweis" class="padding-top-increase">
                                {{ trans('content.tabs_3') }}
                            </a>
                        </li>
                        <li class="tab_item " name="beipackzettel" id="tab-beipackzettel">
                            <a href="#beipackzettel" class="padding-top-increase">
                                {{ trans('content.tabs_8') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tabs_content clearfix">
                        <h3>Produktdetails</h3>
                        <div id="produktdetails" class="tab_content clearfix">
                            {{ trans('content.dragees_tab1') }}
                        </div>
                        <h3>{{ trans('content.tabs_3') }}</h3>
                        <div id="hinweis" class="tab_content clearfix">
                            <p>{{ trans('content.dragees_tab3') }}</p>
                        </div>
                        <h3>{{ trans('content.tabs_8') }}</h3>
                        <div id="beipackzettel" class="tab_content clearfix">
                        {{--<ul>--}}
                        {{--<li>--}}
                          <a class="pdf-link" target="_blank" href="{{URL::to('pdf/Dulcolax_Dragees_Beipackzettel.pdf')}}">
                              <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                   alt="{{ trans('content.common_104') }}" title="{{ trans('content.common_104') }}"
                                   title="pdf-icon">
                              <span class="pdf-text">Dulcolax<sup>&reg;</sup> Dragées Beipackzettel</span>
                          </a>
                          <br><br><br>
                        <!-- Info from PDF -->
                        {{ trans('content.tab_content_pdf_dragees') }}
                        <!-- END Info from PDF -->

                            <a class="pdf-link" target="_blank" href="{{URL::to('pdf/Dulcolax_Dragees_Beipackzettel.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                     alt="{{ trans('content.common_104') }}" title="{{ trans('content.common_104') }}"
                                     title="pdf-icon">
                                <span class="pdf-text">Dulcolax<sup>&reg;</sup> Dragées Beipackzettel</span>
                            </a>
                            {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>

                {{-- grid --}}
                <div class="product_grid">
                    <h4>{{ trans('content.common_8b') }}</h4>
                    @include('includes.related-products')
                </div>

            </div>
        </div>
    </div>
@stop
