@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent
    {{HTML::script('/static_resources/mobile/js/faq.min.js')}}

@stop

@section('content')
<div id="wrapper" class="constipation_causes">
  <div class="box_content">
    <h1>About Constipation</h1>
    <p>Constipation is more common than some people may believe. In fact, about 80 percent of people suffer from constipation at some time during their lives.</p>
    <hr>
    <div class="left_content">
      <ul>
        <li><a href="what-is-constipation.html" class="button_grad inactive">What is constipation?</a> 
          <!--right content -->
          <ul>
            <li>
              <p>Constipation can occur when a person's digestive system, for one reason or another, does not function properly.</p>
              <p>Constipation is commonly understood as having infrequent or difficult bowel movements, as well as having fewer than 3 bowel movements per week. If you experience constipation that lasts longer than 1 week, or notice a sudden change in bowel habits, it is important to consult your doctor.</p>
              <p class="last">Learning to identify constipation by understanding its symptoms and causes can help you interpret your body's messages more clearly so you can find the right type of relief to help you get back to feeling like yourself.</p>
            </li>
          </ul>
          <!--end right content --> 
        </li>
        <li><a href="constipation-symptoms.html" class="button_grad">Constipation Symptoms</a></li>
        <li><a href="prevent-constipation.html" class="button_grad">Tips to Prevent Constipation</a></li>
        <li><a href="treatment-options.html" class="button_grad">Constipation Treatment Options</a></li>
        <li><a href="talk-to-your-doctor.html" class="button_grad">When to See Your Doctor</a></li>
        <li><a href="constipation-and-pregnancy-breastfeeding.html" class="button_grad">Constipation During Pregnancy & While Breastfeeding</a></li>
        <li><a href="travel-constipation.html" class="button_grad">Travel tips</a></li>
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
        <div class="box_left">
        
          <h3 class="content_subheader no-border">Causes of Constipation</h3>
          <p>Constipation can be caused by certain diet and lifestyle choices, as well as physiological changes and certain medications.</p>
          <p>Sometimes it is not always easy to anticipate what will cause constipation; and it is not always predictable. Below is a list of the more common constipation  triggers.</p>
          <ul>
            <li>Diet (high fat and refined sugar, low in fiber) </li>
            <li>Dehydration</li>
            <li>Stress</li>
            <li>Inactivity / Lack of exercise</li>
            <li>Travel</li>
            <li>Pregnancy</li>
            <li>The normal aging process</li>
            <li>Changes in your daily routine</li>
            <li>Not using the bathroom when you have the urge to go</li>
            <li><a href="javascript:void(0)" class="expand-meds">Commonly prescribed medications, vitamins, and dietary supplements</a>
              <ul id="sub-meds" class="sub_list gray hideItem">
                <li>Antacids</li>
                <li>Anticholinergic drugs</li>
                <li>Antidiarrheals</li>
                <li>Antihistamines</li>
                <li>Antiparkinson's drugs</li>
                <li>Antipsychotics</li>
                <li>Antispasmodic drugs</li>
                <li>Calcium channel blockers</li>
                <li>Calcium supplements</li>
                <li>Iron supplements</li>
                <li>Opiates</li>
                <li>Tranquilizers</li>
                <li>Tricyclic antidepressants
                  <p>If you are taking any of these products or other medications, vitamins, or dietary supplements and you experience occasional constipation symptoms, talk to your health professional to find out if they could be a contributing cause.</p>
                </li>
              </ul>
            </li>
          </ul>
          <!--end of hidden content-->
          
          <h3 class="content_subheader no-border" style="padding-top: 20px;">Learn more about these common constipation-related topics</h3>
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