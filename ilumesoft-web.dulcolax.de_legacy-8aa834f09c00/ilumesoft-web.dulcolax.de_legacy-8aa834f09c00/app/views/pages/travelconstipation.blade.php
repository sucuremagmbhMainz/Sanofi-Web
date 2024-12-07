@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent
@stop

@section('content') 

<div id="wrapper" class="travelconstipation">
  <div class="box_content">
    <h1>About Constipation</h1>
    <p>Constipation is more common than some people may believe. In fact, about 80 percent of people suffer from constipation at some time during their lives.</p>
    <hr>
    <div class="left_content">
      <ul id="constipationAnchor">
        <li><a href="what-is-constipation.html#item1" name="" class="button_grad">What is constipation?</a></li>
        <li><a href="constipation-symptoms.html#item2" name="" class="button_grad">Constipation Symptoms and Causes</a></li>
        <li><a href="prevent-constipation.html#item3" name="" class="button_grad">Tips to Prevent Constipation</a></li>
        <li><a href="treatment-options.html#item4" name="" class="button_grad">Constipation Treatment Options</a></li>
        <li><a href="talk-to-your-doctor.html#item5" name="" class="button_grad">When to See Your Doctor</a></li>
        <li><a href="constipation-and-pregnancy-breastfeeding.html#item6" name="" class="button_grad">Constipation During Pregnancy & While Breastfeeding</a></li>
        <li><a href="travel-constipation.html#item7" name="" class="button_grad  inactive">Travel tips</a> 
          
          <!--right content -->
          <ul>
            <li>
              <a href="{{action('PageController@constipationandgasrelief')}}" class="imglink"></a>
              <h3>Pack Dulcolax<sup>&reg;</sup> and Go With Confidence</h3>
              <p>When traveling, changes in lifestyle, schedule, diet and fluid intake may <a href="{{action('PageController@commonsymptoms')}}">cause constipation</a>.  While on vacation, many people like to splurge, and they also use this opportunity to relax.  Sticking to some basic rules may sometimes help prevent constipation. If you do happen to become constipated while you're away, you can turn to a <a href="{{action('PageController@constipationandgasrelief')}}">Dulcolax<sup>&reg;</sup></a> or <a href="{{action('PageController@DulcoEase')}}">DulcoEase<sup>&reg;</sup></a> product to give you predictable relief, so you can get back to being yourself.</p>
              <h3>Tips to prevent constipation while traveling</h3>
              <ul>
                <li> <span>Avoid eating on the run or skipping meals. Keeping to your regular eating schedule will help maintain regularity</span> </li>
                <li> <span>Try to eat like you normally do</span> </li>
                <li> <span>Make healthy food choices like whole grains, dried fruit, fresh vegetables</span> </li>
                <li> <span>Limit caffeine and alcohol</span> </li>
                <li> <span>Make sure to get plenty of sleep</span> </li>
                <li> <span>Keep hydrated</span> </li>
                <li> <span>Stay active</span> </li>
                <li> <span>Don't ignore the urge to go</span> </li>
                <li> <span>If traveling to a developing country, seek advice from your health professional</span> </li>
              </ul>
              <p>Remember that making healthy choices in your diet can help your body stay regular, so you can enjoy your travels without the distraction of constipation.</p>
              <p><a href="http://wwwnc.cdc.gov/travel/page/survival-guide.htm" target="_blank">Read more about safe and healthy travel</a></p>
            </li>
          </ul>
          <!--end right content --> 
          
        </li>
        <div style="clear:both;"></div>
      </ul>
    </div>
  </div>
</div>

<!--dt -->
<div id="wrapper" class="dt">
  <div class="box_content">
    <div class="box">
      <div class="img travel">
        <div class="box_left">
          <a href="{{action('PageController@constipationandgasrelief')}}" class="linkimg"></a>
          <h1>Pack Dulcolax<sup>&reg;</sup> and Go With Confidence</h1>
          <p>When traveling, changes in lifestyle, schedule, diet and fluid intake may <a href="http://myconstipationrelief.com/" target="_blank">cause constipation</a>.  While on vacation, many people like to splurge, and they also use this opportunity to relax.  Sticking to some basic rules may sometimes help prevent constipation. If you do happen to become constipated while you're away, you can turn to a <a href="{{action('PageController@constipationandgasrelief')}}">Dulcolax<sup>&reg;</sup></a> or <a href="{{action('PageController@DulcoEase')}}">DulcoEase<sup>&reg;</sup></a> product to give you predictable relief, so you can get back to being yourself.</p>
          <h3>Tips to prevent constipation while traveling</h3>
          <ul>
            <li>Avoid eating on the run or skipping meals. Keeping to your regular eating schedule will help maintain regularity</li>
            <li>Try to eat like you normally do</li>
            <li>Make healthy food choices like whole grains, dried fruit, fresh vegetables</li>
            <li>Limit caffeine and alcohol</li>
            <li>Make sure to get plenty of sleep</li>
            <li>Keep hydrated</li>
            <li>Stay active</li>
            <li>Don't ignore the urge to go</li>
            <li>If traveling to a developing country, seek advice from your health professional</li>
          </ul>
          <p>Remember that making healthy choices in your diet can help your body stay regular, so you can enjoy your travels without the distraction of constipation.</p>
          <p><a href="http://wwwnc.cdc.gov/travel/page/survival-guide.htm" target="_blank">Read more about safe and healthy travel</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@stop 