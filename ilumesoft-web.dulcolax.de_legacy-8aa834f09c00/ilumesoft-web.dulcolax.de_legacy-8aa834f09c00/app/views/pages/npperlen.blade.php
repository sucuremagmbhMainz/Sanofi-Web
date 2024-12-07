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
                    <div class="product_header">
                        <h2 class="product_name pink">{{ trans('content.header_206') }}</h2>
                        <h3 class="product_subheader pink">{{ trans('content.header_207') }}</h3>
                    </div>
                    <div class="product_image">
                        <img src="{{URL::to('static_resources/mobile/images/packshots/Dulcolax_NP_Perlen_Packshot.png')}}" alt="{{ trans('content.header_206a') }}" title="{{ trans('content.header_206a') }}">
                    </div>
                    {{--<p>{{ trans('content.header_230') }}</p>--}}
                    <div class="product_details">
                        {{ trans('content.npperlen_1') }}
                        <div class="pd_buttons">
                            <a class="learnMore hash_reload bg-pink" href="#produktdetails">{{ trans('content.common_0002') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" rel="tab7"
                                   class="buy hash_reload">{{ trans('content.common_2') }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- tabs -->

                <div id="tabs-detail" name="tab-area">
                    <ul class="tabs_menu nptropfen">
                        <li class="tab_item" name="produktdetails" id="tab-produktdetails">
                            <a href="#produktdetails" class="tab_active"><span itemprop="name">Produktdetails</span></a>
                        </li>
                        <li class="tab_item" name="bn" id="tab-wirkung">
                            <a class="padding-top-increase" href="#wirkung">Dosierung und Anwendung</a>
                        </li>
                        <li class="tab_item" name="hinweis" id="tab-hinweis">
                            <a class="padding-top-increase" href="#hinweis">Wirkung</a>
                        </li>
                        <li class="tab_item" name="beipackzettel" id="tab-beipackzettel">
                            <a class="padding-top-increase padding-left-reduced" href="#beipackzettel">Beipackzettel</a>
                        </li>
                    </ul>
                    <div class="tabs_content">
                        <h3>Produktdetails</h3>
                        <div id="produktdetails" class="tab_content">
                            {{ trans('content.npperlen_tab1') }}
                        </div>

                        <h3>Dosierung und Anwendung</h3>
                        <div id="wirkung" class="tab_content">
                            {{ trans('content.npperlen_tab2') }}
                        </div>

                        <h3>Wirkung</h3>
                        <div id="hinweis" class="tab_content">
                            {{ trans('content.npperlen_tab3') }}
                        </div>

                        <h3>Gebrauchsanweisung</h3>
                        <div id="beipackzettel" class="tab_content clearfix">
							<a class="pdf-link pink" target="_blank" href="{{URL::to('pdf/Dulcolax_NP_Perlen_Beipackzettel.pdf')}}">
								<img class="pdf-image" src="/static_resources/images/pdf-icon.png" alt="{{ trans('content.common_105') }}" title="{{ trans('content.common_105') }}">
								<span class="pdf-text">Dulcolax <sup>&reg;</sup> NP Perlen Beipackzettel</span>
							</a>
							<br><br><br>
							<!-- Info from PDF -->
							{{ trans('content.tab_content_pdf_perlen') }}
							<!-- END Info from PDF -->
                            <a class="pdf-link pink" target="_blank" href="{{URL::to('pdf/Dulcolax_NP_Perlen_Beipackzettel.pdf')}}">
								<img class="pdf-image" src="/static_resources/images/pdf-icon.png" alt="{{ trans('content.common_105') }}" title="{{ trans('content.common_105') }}">
								<span class="pdf-text">Dulcolax <sup>&reg;</sup> NP Perlen Beipackzettel</span>
							</a>
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
