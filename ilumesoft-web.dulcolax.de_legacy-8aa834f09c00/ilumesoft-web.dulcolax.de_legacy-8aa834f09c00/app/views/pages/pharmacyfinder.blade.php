@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

	{{HTML::script("/static_resources/js/pharmacy-vendors.js")}}
	<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDD75AGkRMX-lkOt_uOQ6EEok3oy1NXLOc&libraries=places"></script>

	{{HTML::script("/static_resources/js/pharmacyfinder.js")}}

@stop

@section('content')


{{HTML::style("/static_resources/css/pharmacyfinder.css")}}

<!--[if lte IE 9]>
{{HTML::style('/static_resources/mobile/css/ie9.css')}}
<![endif]-->

<div id="wrapper" class="section-pharmacy-finder">
    <div class="box_content faq mobile_version row">
        <div class="inner_page_content page_right_single_column desktop-item mobile_content content-pharmacy-finder col-sm-12">

        	<h1>{{ trans('content.common_94') }}</h1>
            <p>{{ trans('content.common_98') }}</p>

			<div class="app-pharmacyfinder">
				<div id="searchform" class="block pharmacyform">
					<form id="addressform" class="form-horizontal" action="." method="get">
	                    <label class="sr-only" for="searchterm">Adresse, Ort oder Postleitzahl:</label>
	                    <span class="input-group input-group-lg">
	                        <input type="text" class="form-control" name="searchterm" id="searchterm" placeholder="Ort oder PLZ">
	                        <span class="input-group-btn">
	                            <button type="submit" class="btn btn-default">&nbsp;&nbsp;<i class="fa fa-search"></i>&nbsp;&nbsp;</button>
	                            <a href=".?geolocate=1#apo-finder" id="geoloc" class="btn btn-primary hide">&nbsp;<i class="fa fa-crosshairs"></i>&nbsp;</a>
	                        </span>
	                    </span>
	                </form>
			    </div>

				<div class="result-row">
	                <div class="map-wrapper">
	                    <div id="map-canvas" class="map"></div>
	                </div>
	                <div class="result-wrapper">
	                    <div id="addresses"></div>
	                </div>
	            </div>
			</div>

        </div>
    </div>
</div>



@stop
