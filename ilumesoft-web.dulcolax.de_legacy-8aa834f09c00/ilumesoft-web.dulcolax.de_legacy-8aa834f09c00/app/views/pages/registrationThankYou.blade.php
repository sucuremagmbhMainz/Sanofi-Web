@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

@stop

@section('content')
 <div id="wrapper"> 
  
  <!-- main content here-->
  <div class="box_content thankYou">
  
    <div>
      <h1>Coupons &amp; Special Offers</h1>
			<p>Thank you for your interest in Dulcolax<sup>&reg;</sup> products. <a href="{{action('PageController@constipationandgasrelief')}}">Explore Dulcolax<span class="reg">&reg;</span> Products</a></p>
      
    </div>
    
  </div>
  
</div>

@stop
