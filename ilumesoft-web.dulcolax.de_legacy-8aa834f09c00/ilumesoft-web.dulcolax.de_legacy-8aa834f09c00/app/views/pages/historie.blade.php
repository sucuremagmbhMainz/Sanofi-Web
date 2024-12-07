@extends('layouts.mobilemaster')

@section('styles')
	@parent
@stop

@section('scripts')
	@parent
		
@stop

@section('content')

  <div id="wrapper" class="productDetail">

    <div class="hist box_content">
      <div class="hist product_desc clearfix">
        <div class="hist product_header">
          <h2 class="hist product_name">{{ trans('content.header_215') }}</h2>
          {{--<div class="product_recommended">
            <img src="{{URL::to('static_resources/mobile/images/seal_dulcolax_2.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}">
          </div>
          <h3 class="product_subheader">{{ trans('content.common_12') }}</h3>--}}
        </div>
        {{--<div class="product_image">
          <img src="{{URL::to('static_resources/mobile/images/main-menu/'.$product_img)}}" alt="Dulcolax® " title="Dulcolax® ">

        </div>--}}
        <div class="hist_content">
          {{--<p>Dulcolax<sup>&reg;</sup> {{ $product_name }}.</p>
          <p>{{ trans('content.dulcolaxpicoliquid_3') }}</p>--}}
          <div>
            {{--<p><span>{{ trans('content.header_233') }}</span></p>--}}
            {{--<p><span>{{ trans('content.header_234') }}</span></p>--}}
          </div>
          <div class="hist product_image">
            <img src="{{ URL::to('static_resources/mobile/images/main-menu/Dulcolax_Produkthistorie.png')}}" alt="{{ trans('content.header_250') }}" title="{{ trans('content.header_250') }}">
          </div>
          <p class="strong text-center"><strong>Packungsdesignentwicklung seit Markteinführung 1952 bis heute</strong></p>
          <p>{{ trans('content.header_233') }}</p>
        </div>
      </div>
    </div>
    
  </div>
@stop
