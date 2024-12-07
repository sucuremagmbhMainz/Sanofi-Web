@extends('layouts.mobilemaster')

@section('styles')
	@parent
@stop

@section('scripts')
	@parent
		
@stop

@section('content')

  <div id="wrapper" class="productDetail">

    <div class="box_content">
      <div class="product_desc clearfix">
        <div class="product_header">          
          <h1 class="product_name">Dulcolax<sup>&reg;</sup> {{ $product_name }}</h1>
          <div class="product_recommended">
            <img src="{{URL::to('static_resources/mobile/images/seal_dulcolax_2.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}">
          </div>
          <h3 class="product_subheader">{{ trans('content.common_12') }}</h3>
        </div>
        <div class="product_image">
          <img src="{{URL::to('static_resources/mobile/images/main-menu/'.$product_img)}}" alt="Dulcolax® " title="Dulcolax® ">
        </div>
        <div class="product_details">
          <p>Dulcolax<sup>&reg;</sup> {{ $product_name }}.</p>
          <p>{{ trans('content.dulcolaxpicoliquid_3') }}</p>
          <ul>
            <li><span>{{ trans('content.dulcolaxpicoliquid_4') }}</span></li>
            <li><span>{{ trans('content.dulcolaxpicoliquid_5') }}</span></li>
          </ul>
          <p>{{ trans('content.dulcolaxpicoliquid_6') }}</p>
          <div class="pd_buttons">
            <a class="learnMore hash_reload" href="#learn-more">{{ trans('content.common_1') }}</a><a href="#buy-now" rel="tab9" class="buy hash_reload">{{ trans('content.common_2') }}</a>
          </div>
          <span class="pd_links">
              <a href="#drug-facts" class="hash_reload">{{ trans('content.common_3') }}</a>, <a href="#faqs" class="hash_reload">{{ trans('content.common_4') }}</a>
            </span>
        </div>
      </div>
    
      {{-- tabs --}}
      <div id="tabs-detail" class="clearfix" name="tab-area">
        <ul class="tabs_menu" >
          <li class="tab_item" name="learn-more" id="tab-learn-more"><a href="#learn-more" class="tab_active">{{ trans('content.common_1') }}</a></li>
          <li class="tab_item" name="buy-now" id="tab-buy-now"><a href="#buy-now">{{ trans('content.common_2') }}</a></li>
          <li class="tab_item" name="drug-facts" id="tab-drug-facts"><a href="#drug-facts">{{ trans('content.common_3') }}</a></li>
            <li class="tab_item" name="faqs" id="tab-faqs"><a href="#faqs">{{ trans('content.common_4') }}</a></li>
        </ul>
        <div class="tabs_content clearfix">
          <h3>{{ trans('content.common_1') }}</h3>
          <div id="learn-more" class="tab_content clearfix">
            <h1>Dulcolax<sup>&reg;</sup> {{ $product_name }}</h1>
            <p>{{ trans('content.dulcolaxpicoliquid_16') }}</p>
            <p>{{ trans('content.dulcolaxpicoliquid_17') }}</p>
            <ul>
                <li><span>{{ trans('content.dulcolaxpicoliquid_18') }}</span></li>
                <li><span>{{ trans('content.dulcolaxpicoliquid_19') }}</span></li>
            </ul>
          </div>

          <h3 id="buyNow-title">{{ trans('content.common_2') }}</h3>
          <div id="buy-now" class="tab_content clearfix">
            <h1>Dulcolax<sup>&reg;</sup>  {{ $product_name }}</h1>
            <p>{{ trans('content.common_18') }}
            </p>

          </div>

          <h3>{{ trans('content.common_3') }}</h3>
          <div id="drug-facts" class="tab_content clearfix">
            <h1>Dulcolax<sup>&reg;</sup> {{ $product_name }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p>{{ trans('content.common_7') }}</p>     
          </div>
          
            {{--FAQs--}}
          <h3>FAQ</h3>
          <div id="faqs" class="tab_content clearfix" >
            <h1>Dulcolax<sup>&reg;</sup> {{ $product_name }}</h1>
            <div class="faq_container">
                <p>{{ trans('content.common_7') }}</p>     
              <!--div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>Dulcolax<sup>&reg;</sup>  Localized market to provide content</h4>
                <div class="faq_answer">

                </div>
              </div>
              <div class="clear"></div-->
            </div>

          </div>
          
          {{--Video tab--}}
        {{--  <h3>Video</h3>
          <div id="video" class="tab_content clearfix" >
            <h1>Dulcolax<sup>&reg;</sup> Laxative Tablets</h1>
            <div class="videoFrameWrapper" data-src="//player.vimeo.com/video/102551242?api=1&player_id=player1">
              <iframe id="dulcolaxVideo" src="" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
          </div>
           --}}
            {{--Ratings tab--}}
          {{--<h3>Reviews</h3>
          <div id="ratings" class="tab_content clearfix">
            <h1>Dulcolax<sup>&reg;</sup> Laxative Tablets</h1>

          </div> --}}
        </div>
      </div>

      {{-- grid --}}
      <div class="product_grid">
        <h4>{{ trans('content.common_8') }}</h4>
        @include('includes.related-products')    
      </div>

    </div>
  </div>
@stop
