@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent
@stop

@section('content')
<div id="wrapper" class="talkto-your-doctor">
  <div class="box_content">
    <h1>About Constipation</h1>
    <p>Constipation is more common than some people may believe. In fact, about 80 percent of people suffer from constipation at some time during their lives.</p>
    <hr>
    <div class="left_content">
      <ul id="constipationAnchor">
        <li><a href="what-is-constipation.html#item1" name="" class="button_grad">What is constipation?</a> </li>
        <li><a href="constipation-symptoms.html#item2" name="" class="button_grad">Constipation Symptoms and Causes</a></li>
        <li><a href="prevent-constipation.html#item3" name="" class="button_grad">Tips to Prevent Constipation</a></li>
        <li><a href="treatment-options.html#item4" name="" class="button_grad">Constipation Treatment Options</a></li>
        <li><a href="talk-to-your-doctor.html#item5" name="" class="button_grad inactive">When to See Your Doctor</a> 
          <!--right content -->
          <ul>
            <li>
              <h3>When to See Your Doctor</h3>
              <p>Constipation isn't usually a serious problem; however, if you need to use a laxative for more than 1 week, you should consult your doctor. Make sure to inform your health professional to any changes in your health and any medications or dietary supplements that you may be taking. Also, make sure to discuss your family's medical history.</p>
              <p>It's important to ask the right questions to get the most out of your discussion with your healthcare professional. Print and fill out this <a href="{{ URL::to('static_resources/downloads/discussion_guide.pdf') }}"  target="_blank">Constipation Discussion Guide Sponsored by Dulcolax<sup>&reg;</sup></a> to help you prepare for your next appointment and to remind you of some of the right questions to ask. </p>
              <p><a href="{{ URL::to('static_resources/downloads/discussion_guide.pdf') }}" target="_blank" class="download_link"><img src="{{ URL::to('static_resources/mobile/images/icon_download.png') }}" width="18"><span>Download discussion guide</span></a></p>
            </li>
          </ul>
          <!--end right content --> 
        </li>
        <li><a href="constipation-and-pregnancy-breastfeeding.html#item6" name="" class="button_grad">Constipation During Pregnancy & While Breastfeeding</a> </li>
        <li><a href="travel-constipation.html#item7" name="" class="button_grad">Travel tips</a></li>
        <div style="clear:both;"></div>
      </ul>
    </div>
  </div>
</div>

<!--dt -->
<div id="wrapper" class="dt">
  <div class="box_content">
    <div class="box">
      <div class="img">
        <div class="box_left wtd">
        
          <h3 class="content_subheader">When to See Your Doctor</h3>
          <p>Constipation isn't usually a serious problem; however, if you need to use a laxative for more than 1 week, you should consult your doctor.  Make sure to inform your health professional to any changes in your health and any medications or dietary supplements that you may be taking. Also, make sure to discuss your family's medical history. </p>
          <!--hidden content-->
          <p>It's important to ask the right questions to get the most out of your discussion with your healthcare professional. Print and fill out this <a href="{{ URL::to('static_resources/downloads/discussion_guide.pdf')}}" target="_blank">Constipation Discussion Guide Sponsored by Dulcolax<sup>&reg;</sup></a> to help you prepare for your next appointment and to remind you of some of the right questions to ask. </p>
          <p><a href="{{ URL::to('static_resources/downloads/discussion_guide.pdf')}}" target="_blank" class="download_link"><img src="{{ URL::to('static_resources/images/icon_download.png')}}"><span>Download discussion guide</span></a></p>
          <!--end of hidden content--> 
          
          <!--end of hidden content-->
          <h3 class="content_subheader no-border">Learn more about  these common constipation-related topics</h3>
          <ul>
            <li><a href="constipation-symptoms.html">Constipation Symptoms</a></li>
            <li><a href="causes-of-constipation.html">Causes of Constipation</a></li>
            <li><a href="prevent-constipation.html">Tips to Prevent Constipation</a></li>
            <li><a href="treatment-options.html">Constipation Treatment Options</a></li>
            <li><a href="talk-to-your-doctor.html">When to See Your Doctor</a></li>
            <li><a href="constipation-and-pregnancy-breastfeeding.html">Constipation During Pregnancy & While Breastfeeding</a></li>
          </ul>
          
        </div>
      </div>
    </div>
  </div>
</div>
@stop 