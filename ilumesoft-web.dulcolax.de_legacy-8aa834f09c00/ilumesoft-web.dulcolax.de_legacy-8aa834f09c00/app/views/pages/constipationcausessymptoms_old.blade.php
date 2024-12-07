@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

@stop

@section('content') 

<h1></h1>
    <p>

    </p>
    

<div id="wrapper" class="constipation_causes">
  <div class="box_content">
    <div class="box">
      <!-- TEMP style -->
      <div class="img">
        <div class="box_left">

          <h1>{{ trans('content.constipation_facts_title') }}</h1>
          <p style="padding-bottom: 30px;"> {{ trans('content.constipation_facts_body_1') }}</p>
          <div class="image-mobile">
            <img src="{{URL::to('static_resources/mobile/images/verstopfung-mobile.jpg')}}" alt="verstopfung-was-tun">
          </div>
          <p style="padding-bottom: 30px;"> {{ trans('content.constipation_facts_body_2') }}</p>

          <h3 class="content_subheader"></h3>

      </div>
     </div>
    </div>
  </div>
</div>

<!--dt -->
<div id="wrapper" class="dt verstopfung">
  <div class="box_content">
    <div class="box" style="position: relative; overflow: hidden;">
           <!-- TEMP style -->
      <div class="img">
        <img style="left: 35px; bottom:0" class="slider-img" src="{{URL::to('static_resources/mobile/images/verstopfung-was-tun.png')}}" alt="verstopfung-was-tun">
        <div class="box_left">
          <h1>{{ trans('content.constipation_facts_title') }}</h1>
          <h2>{{ trans('content.constipation_facts_title_1') }}</h2>
          <p> {{ trans('content.constipation_facts_body') }}</p>

          <h3 class="content_subheader"></h3>

        </div>
      </div>
    </div>
  </div>
</div>
@stop 
