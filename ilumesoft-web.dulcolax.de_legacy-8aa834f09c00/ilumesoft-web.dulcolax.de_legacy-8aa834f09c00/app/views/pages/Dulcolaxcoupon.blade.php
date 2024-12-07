@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent      
		{{HTML::script('/static_resources/js/fb_like.js')}}
	@stop

@stop

@section('content')

 <div id="wrapper">
  <div class="box_content coupon">
    <h2 class="tablet-item">Dulcolax<sup>&reg;</sup>, DulcoEase Pink<sup>&reg;</sup> and DulcoGas<sup>&reg;</sup> Coupons</h2>
    <p class="coupon tablet-item">Effective Relief with Dulcolax<sup>&reg;</sup>, DulcoEase<sup>&reg;</sup> and DulcoGas<sup>&reg;</sup> brand products.</p>
    <p class="coupon tablet-item">
    	Please be advised that coupons need to be printed from a desktop or laptop computer.
    </p>
    <div class="social_icons">
      <p>Share with friends</p>
      <div class="social"><a href='https://twitter.com/share?text=Save on Dulcolax(R) and DulcoEase(R) Pink(TM)' class="no-underline" rel="nofollow" onclick="ShowTwitterWindow(this.href,'template_window','500','400','yes','center');return false;" onfocus="this.blur()"><img src="{{URL::to('static_resources/mobile/images/social_twitter.png')}}" alt="Twitter" title="Twitter" /></a></div>
      <div class="social"><a href="https://plus.google.com/share?url=https://www.dulcolax.com/Dulcolax-coupon.html" class="no-underline" target="_blank"><img src="{{URL::to('static_resources/mobile/images/social_google_plus.png')}}" alt="Google Plus" title="Google Plus" /></a></div>
      <div class="social fb"><a href="javascript:void(0)" class="no-underline" onclick="return fb_like('coupon')" target="_blank"><img src="{{URL::to('static_resources/mobile/images/social_facebook.png')}}" alt="Facebook" title="Facebook" /></a></div>
    </div>
    <h2 class="desktop-item"> Dulcolax<sup>&reg;</sup>, DulcoEase Pink<sup>&reg;</sup> and DulcoGas<sup>&reg;</sup> Coupons</h2>
    <p class="coupon desktop-item">Effective Relief with Dulcolax<sup>&reg;</sup>, DulcoEase<sup>&reg;</sup> and DulcoGas<sup>&reg;</sup> brand products.</p>
    <p class="desktop-item">Please be advised that coupons need to be printed from a desktop or laptop computer.</p>
    <div class="coupons clearfix">
      <!--coupon 1-->
      <div class="coupons_left desktop-item">
        <img width="425px" height="125" src="static_resources/mobile/images/coupons/coupons_save1_all-products.png" alt="Constipation Relief Products" title="Constipation Relief Products"/>
    </div>
      <div class="coupon_box clearfix">
        <h4>Save $1 Now</h4>
        <p>on ANY ONE Dulcolax<sup>&reg;</sup> product with 25 count or more.</p>
        <a class="no-underline buttonFlat desktop-item print-button" href="couponRedeem.html?couponid=3&url=http%3A%2F%2Fcoupons2.smartsource.com%2Fsmartsource%2Findex.jsp%3FLink%3DFUKUTATO5VDVC" target="_blank" >Print Your Coupon</a>
      </div>
      
      <!--coupon 2-->
      <div class="coupons_left desktop-item">
        <img width="425px" height="125" src="static_resources/mobile/images/coupons/coupons_save3_all-products.png" alt="Constipation Relief Products" title="Constipation Relief Products"/>
      </div>
      <div class="coupon_box clearfix">
        <h4>Save $3 Now</h4>
        <p>on ANY TWO Dulcolax<sup>&reg;</sup> products with 25 count or more.</p>
        <a class="no-underline buttonFlat desktop-item print-button"  href="couponRedeem.html?couponid=2&url=http%3A%2F%2Fcoupons2.smartsource.com%2Fsmartsource%2Findex.jsp%3FLink%3DRYFBXKMZQJ6YK" target="_blank">Print Your Coupon</a><br>
      </div>
    
      <!--coupon 3-->
      <div class="coupons_left desktop-item">
        <img height="150" src="static_resources/mobile/images/coupons/coupons_save150_dulcogas-gas-relief-tablets.png" alt="Constipation Relief Products" title="Constipation Relief Products"/>
      </div>
      <div class="coupon_box clearfix">
    	<h4>Save $2 Now</h4>
        <p>on any DulcoGas<sup>&reg;</sup> product with 18 count or more.</p>
        <a class="no-underline buttonFlat desktop-item print-button" href="couponRedeem.html?couponid=7&url=http%3A%2F%2Fcoupons2.smartsource.com%2Fsmartsource%2Findex.jsp%3FLink%3D7SYPDIUBE6EGI" target="_blank">Print Your Coupon</a><br>
      </div>
    
    </div>
  </div>
</div>

@stop
