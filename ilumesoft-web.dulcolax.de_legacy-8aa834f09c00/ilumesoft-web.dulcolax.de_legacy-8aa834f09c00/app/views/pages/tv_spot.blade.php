@extends('layouts.mobilemaster')

@section('content')
    <div id="wrapper">
        <div class="box_content">
            <h1 style="font-weight:bold">{{ trans('content.tv_spot_1') }}</h1>
            <div id="spot_video">
                <p class="video_text">Aktuelle TV-Werbung</p>
				<iframe src="https://player.vimeo.com/video/187841985" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                {{-- <p class="video_text"></p> --}}
            </div>
			<p>{{ trans('content.tv_spot_2') }}</p>
        </div>
    </div>
@stop
