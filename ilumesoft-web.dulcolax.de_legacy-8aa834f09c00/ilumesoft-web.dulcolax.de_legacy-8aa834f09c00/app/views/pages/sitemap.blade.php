@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent
@stop

@section('content')
<div id="wrapper">
  <div class="box_content sitemap">
    <div>
      <h1>Sitemap</h1>
      <ul class="sitemap">
        <li><a href="index.html">Home</a></li>
		<li><a href="{{action('PageController@stoolsoftener')}}">{{ trans('content.common_11') }}</a>
          <ul class="sub_map">
            <li><a href="{{action('PageController@dulcosoft')}}">{{ trans('content.header_88') }}</a></li>            
            <li><a href="{{action('PageController@dulcosoftpregnancy')}}">{{ trans('content.header_89') }}</a></li>
          </ul>
        </li>
        <li><a href="{{action('PageController@constipationcausessymptoms')}}">{{ trans('content.common_10') }}</a></li>
        <li><a href="{{action('PageController@constipationandgasrelief')}}">{{ trans('content.common_23') }}</a>
          <ul class="sub_map">
            <li><a href="{{action('PageController@dragees')}}">{{ trans('content.header_78') }}</a></li>            
            <li><a href="{{action('PageController@nptropfen')}}">{{ trans('content.header_214') }}</a></li>
			{{--<li><a href="{{action('PageController@kinder')}}">Dulcolax<sup>&reg;</sup> NP Kinder Tropfen</a></li>--}}
            <li><a href="{{action('PageController@zapfchen')}}">{{ trans('content.header_82') }}</a></li>
			<li><a href="{{action('PageController@npperlen')}}">{{ trans('content.header_206') }}</a></li>
            <li><a href="{{action('PageController@dulcosoftloesung')}}">{{ trans('content.header_80') }}</a></li>
			<li><a href="{{action('PageController@dulcosoftpulver')}}">{{ trans('content.header_81') }}</a></li>
            <li><a href="{{action('PageController@packshot')}}">Packshots</a></li>			
          </ul>
		</li>
        <li><a href="{{action('PageController@advice')}}">{{ trans('content.common_51a') }}</a>
          <ul class="sub_map">
            <li><a href="{{action('PageController@advice')}}">{{ trans('content.common_63') }}</a></li>            
            <li><a href="{{action('PageController@historie')}}">Historie</a></li>
			<li><a href="{{action('PageController@brochure')}}">Info-Broschüre</a></li>
          </ul>
        </li>
		<li><a href="{{action('PageController@kaufen')}}">Dulcolax<sup>&reg;</sup> kaufen</a></li>
		<li><a href="{{action('PageController@kaufendulcosoft')}}">DulcoSoft<sup>&reg;</sup> kaufen</a></li>
        <li><a href="{{action('PageController@tv_spot')}}">Dulcolax<sup>&reg;</sup> TV-Spot</a></li>
		<li><a href="{{action('PageController@selbsttest')}}">Dulcolax<sup>&reg;</sup> Selbst – Test</a></li>
      </ul>
    </div>
  </div>
</div>
@stop 
