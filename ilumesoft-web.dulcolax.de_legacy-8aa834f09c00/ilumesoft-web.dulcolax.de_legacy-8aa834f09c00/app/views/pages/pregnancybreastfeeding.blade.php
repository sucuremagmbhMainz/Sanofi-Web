@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

@stop

@section('content')
<div id="wrapper" class="pregnancy-breastfeeding">
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
        <li><a href="talk-to-your-doctor.html#item5" name="" class="button_grad">When to See Your Doctor</a></li>
        <li><a href="constipation-and-pregnancy-breastfeeding.html#item6" name="" class="button_grad inactive">Constipation During Pregnancy & While Breastfeeding</a> 
          <!--right content -->
          <ul>
            <li>
              <p>Constipation during pregnancy and while breastfeeding often go hand in hand. Throughout the pregnancy, different factors can contribute to constipation. Some of the more common causes are hormonal changes and prenatal vitamins containing iron. Later in the pregnancy, the expansion of the uterus can increase pressure on the intestines, also triggering constipation.</p>
              <p>After giving birth, women may continue to experience constipation due to hormonal fluctuations, pain medications as the result of an episiotomy or cesarean section, or dehydration if breastfeeding. </p>
              <p>To relieve constipation during or after pregnancy, your health professional may recommend a stool softener, like <a href="{{action('PageController@DulcoEase')}}"> DulcoEase Pink<sup>&reg;</sup></a> or <a href="{{action('PageController@stoolsoftener')}}">Dulcolax<sup>&reg;</sup> Stool Softener</a>. As with any over-the-counter medication, if you're pregnant or breastfeeding, you should talk to your healthcare professional before you take a stool softener. </p>
              <p>After pregnancy, a stimulant laxative, like <a href="{{action('PageController@dulcolaxlaxativeforwomen')}}"> Dulcolax Pink<sup>&reg;</sup> Laxative Tablets</a>, may also be an option to relieve your constipation. Recent clinical research that studied 10 mg of Dulcolax<sup>&reg;</sup> (2 tablets) showed that bisacodyl, the active ingredient in <a href="{{action('PageController@dulcolaxlaxativeforwomen')}}"> Dulcolax Pink<sup>&reg;</sup> Laxative Tablets</a> , is not excreted in breast milk. As with any medication, you should talk to your doctor before taking <a href="{{action('PageController@dulcolaxlaxativeforwomen')}}"> Dulcolax Pink<sup>&reg;</sup> Laxative Tablets</a> if you are breastfeeding. </p>
            </li>
          </ul>
          <!--end right content --> 
          
        </li>
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
        <div class="box_left pregnancy">
          <h3 class="content_subheader" style="margin-top:10px;"><strong id="docs-internal-guid-b67e83f0-05f9-dba7-b7d5-cc1b6e067c8d">Constipation During Pregnancy &amp; While Breastfeeding</strong></h3>
          <p>Constipation during pregnancy and while breastfeeding often go hand in hand.  Throughout the pregnancy, different factors can contribute to constipation.  Some of the more common causes are hormonal changes and prenatal vitamins containing iron.  Later in the pregnancy, the expansion of the uterus can increase pressure on the intestines, also triggering constipation. </p>
          <p>After giving birth, women may continue to experience constipation due to hormonal fluctuations, pain medications as the result of an episiotomy or cesarean section, or dehydration if breastfeeding. </p>
          <p>To relieve constipation during or after pregnancy, your health professional may recommend a stool softener, like <a href="{{action('PageController@DulcoEase')}}">DulcoEase Pink<sup>&reg;</sup></a> or <a href="{{action('PageController@stoolsoftener')}}">Dulcolax<sup>&reg;</sup> Stool Softener</a>. As with any over-the-counter medication, if you're pregnant or breastfeeding, you should talk to your healthcare professional before you take a stool softener.</p>
          <p>After pregnancy, a stimulant laxative, like <a href="{{action('PageController@dulcolaxlaxativeforwomen')}}">Dulcolax Pink<sup>&reg;</sup> Laxative Tablets</a>, may also be an option to relieve your constipation. Recent clinical research that studied 10 mg of Dulcolax<sup>&reg;</sup> (2 tablets) showed that bisacodyl, the active ingredient in <a href="{{action('PageController@dulcolaxlaxativeforwomen')}}">Dulcolax Pink<sup>&reg;</sup> Laxative Tablets</a>, is not excreted in breast milk. As with any medication, you should talk to your doctor before taking <a href="{{action('PageController@dulcolaxlaxativeforwomen')}}">Dulcolax Pink<sup>&reg;</sup> Laxative Tablets</a> if you are breastfeeding.</p>
          
          <!--end of hidden content-->
          <h3 class="content_subheader no-border" style="margin-top:10px;">Learn more about  these common constipation-related topics</h3>
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