@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

@stop

@section('content') 
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!--[if lte IE 9]>
{{HTML::style('/static_resources/mobile/css/ie9.css')}}
<![endif]-->
<style>
    body{
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    }
    .header h2{
        margin-top: -26px;
        margin-bottom: 4px;
    }
</style>
        
<div id="wrapper" class="section-pharmacy-finder">
    <div class=" box_content faq mobile_version" >
    <div class="row">

        <div class="col-xs-9 inner_page_content page_right_single_column desktop-item mobile_content">

            <div style="margin: 0 auto;">
            <h1>{{ trans('content.common_94') }}</h1>
                <p>{{ trans('content.common_98') }}</p>
        <div id="marketplace" class="row"></div>

</div>
        <div id="searchform">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label class="sr-only" for="postcode">Ort oder Postleitzahl:</label>
                    <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Ort oder Postleitzahl">
                </div>

                <div class="form-group">
                    <button type="submit" class="postcode_search"><i class="fa fa-search"></i> Suchen</button>
                </div>
            </form>
        </div>


        </div>
    </div>
        <div class="row">

                <div id="map-canvas" class="gmap"></div>

        </div>
    </div>

        <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDD75AGkRMX-lkOt_uOQ6EEok3oy1NXLOc&libraries=places"></script>
	{{HTML::script("/static_resources/js/pharmacy_finder.js")}}

</div>
@stop
