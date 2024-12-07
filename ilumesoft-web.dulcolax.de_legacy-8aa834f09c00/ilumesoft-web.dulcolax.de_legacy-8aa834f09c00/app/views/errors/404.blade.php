@extends('layouts.mobilemaster')

@section('content')
    <div id="wrapper">
        <div class="box_content error-page">
            <h1>{{ trans('content.error_404_1') }}</h1>
            <p>
                {{ trans('content.error_404_2') }} <a href="{{action('PageController@home')}}">{{ trans('content.error_404_3') }}</a>
            </p>
            <img  src="{{URL::to('static_resources/mobile/images/main-menu/produkte.png')}}" alt="dulcolax_404">
        </div>
    </div>
@stop
