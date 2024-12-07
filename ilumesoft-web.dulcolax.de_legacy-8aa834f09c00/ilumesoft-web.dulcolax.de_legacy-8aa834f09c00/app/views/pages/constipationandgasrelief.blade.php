@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

@stop

@section('content')

	<div id="wrapper"> 
  		@include('includes.all-products')
  	</div>

@stop
