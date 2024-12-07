@extends('layouts.mobilemaster')

@section('content') 
<div id="wrapper">
    <div class="box_content error-page">
        <h1>{{ trans('content.error_500_1') }}</h1>
        <p>
            {{ trans('content.error_500_2') }} <a href="{{action('PageController@home')}}">{{ trans('content.error_500_3') }}</a>
        </p>
    </div>
 </div>
@stop
