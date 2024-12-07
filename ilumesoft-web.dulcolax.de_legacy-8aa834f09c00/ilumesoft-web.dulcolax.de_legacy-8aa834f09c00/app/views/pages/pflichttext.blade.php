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
          <h1 class="product_name">{{ trans('content.header_216') }}</h1>
          {{--<div class="product_recommended">
            <img src="{{URL::to('static_resources/mobile/images/seal_dulcolax_2.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}">
          </div>
          <h3 class="product_subheader">{{ trans('content.common_12') }}</h3>--}}
        </div>
        {{--<div class="product_image">
          <img src="{{URL::to('static_resources/mobile/images/main-menu/'.$product_img)}}" alt="Dulcolax® " title="Dulcolax® ">

        </div>--}}
        <div>
            <p>{{ trans('content.header_236') }}</p>
        </div>
      </div>
    </div>
  </div>
@stop
