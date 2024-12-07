@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

@stop

@section('content')
<div id="wrapper" class="treatment_options">
  <div class="box_content">
    <h1>{{ trans('content.treatment_options_1') }}</h1>
    <p>{{ trans('content.treatment_options_2') }}</p>
    <hr>
    <div class="left_content">
      <ul id="constipationAnchor">
        <li><a href="what-is-constipation.html#item1" name="" class="button_grad">{{ trans('content.treatment_options_3') }}</a></li>
        <li><a href="constipation-symptoms.html#item2" name="" class="button_grad">{{ trans('content.treatment_options_4') }}</a></li>
        <li><a href="prevent-constipation.html#item3" name="" class="button_grad">{{ trans('content.treatment_options_5') }}</a></li>
        <li> <a href="treatment-options.html#item4" name="" class="button_grad inactive">{{ trans('content.treatment_options_6') }}</a> 
          <!--right content -->
          <ul>
            <li>
              <p>{{ trans('content.treatment_options_7') }}</p>
              <!--box -->
              <div class="options_box">
                <h4>{{ trans('content.treatment_options_8') }}</h4>
                <div class="clearfix">
                  <div class="leftside">
                    <ul>
                      <li>{{ trans('content.treatment_options_9') }}</li>
                      <li>{{ trans('content.treatment_options_10') }}</li>
                      <li>{{ trans('content.treatment_options_11') }}</li>
                      <li>{{ trans('content.treatment_options_12') }}</li>
                    </ul>
                  </div>
                  <div class="rightside">
                    <ul>
                      <span>{{ trans('content.treatment_options_13') }}</span>
                      <li><a href="{{action('PageController@laxatives')}}" class="">{{ trans('content.treatment_options_14') }}</a></li>
                      <li><a href="#" rel="tab1" class="buy buttonFlat">{{ trans('content.treatment_options_15') }}</a></li>
                      <li><a href="{{action('PageController@dulcolaxlaxativeforwomen')}}" class="">{{ trans('content.treatment_options_16') }}</a></li>
                      <li><a href="#" rel="tab2" class="buy buttonFlat">{{ trans('content.treatment_options_15') }}</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end box --> 
              <!--box -->
              <div class="options_box">
                <h4>{{ trans('content.treatment_options_17') }}</h4>
                <div class="clearfix">
                  <div class="leftside">
                    <ul>
                      <li>{{ trans('content.treatment_options_18') }}</li>
                      <li>{{ trans('content.treatment_options_19') }}</li>
                      <li>{{ trans('content.treatment_options_20') }}:</li>
                      <li>{{ trans('content.treatment_options_21') }}</li>
                    </ul>
                  </div>
                  <div class="rightside">
                    <ul>
                      <span>{{ trans('content.treatment_options_13') }}</span>
                      <li><a href="{{action('PageController@DulcolaxSuppository')}}" class="">{{ trans('content.treatment_options_22') }}</a></li>
                      <li><a href="#" rel="tab5" class="buy buttonFlat">{{ trans('content.treatment_options_15') }}</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end box --> 
              <!--box -->
              <div class="options_box">
                <h4>{{ trans('content.treatment_options_23') }}</h4>
                <div class="clearfix">
                  <div class="leftside">
                    <ul>
                      <li>{{ trans('content.treatment_options_18') }}</li>
                      <li>Softens the stool in the intestine, making it easier to pass</li>
                      <li>Time to Relief:</li>
                      <li>Works gradually</li>
                    </ul>
                  </div>
                  <div class="rightside">
                    <ul>
                      <span>Examples:</span>
                      <li><a href="{{action('PageController@stoolsoftener')}}" class="">Dulcolax<sup>&reg;</sup> Stool Softener</a></li>
                      <li><a href="#" rel="tab3" class="buy buttonFlat">Buy</a></li>
                      <li><a href="{{action('PageController@DulcoEase')}}" class="">DulcoEase Pink<sup>&reg;</sup> Stool Softener</a></li>
                      <li><a href="#" rel="tab4" class="buy buttonFlat">Buy</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end box --> 
              <!--box -->
              <div class="options_box">
                <h4>Osmotic</h4>
                <div class="clearfix">
                  <div class="leftside">
                    <ul>
                      <li>How it Works:</li>
                      <li>Draws water into the bowel, providing softer stools and increases frequency of bowel movements</li>
                      <li>Time to Relief:</li>
                      <li>Works in 1 to 3 days</li>
                    </ul>
                  </div>
                  <div class="rightside">
                    <ul>
                      <span>Examples:</span>
                      <li class="inactive">Miralax<sup>&reg;</sup></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end box --> 
              <!--box -->
              <div class="options_box">
                <h4>Bulk-forming</h4>
                <div class="clearfix">
                  <div class="leftside">
                    <ul>
                      <li>How it Works:</li>
                      <li>Absorbs more fluid in the intestines, making the stool bigger, giving the urge to pass</li>
                      <li>Time to Relief:</li>
                      <li>Works in 12 to 72 hours</li>
                    </ul>
                  </div>
                  <div class="rightside">
                    <ul>
                      <span>Examples:</span>
                      <li class="inactive">Metamucil<sup>&reg;</sup></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end box --> 
              <!--box -->
              <div class="options_box">
                <h4>Lubricant</h4>
                <div class="clearfix">
                  <div class="leftside">
                    <ul>
                      <li>How it Works:</li>
                      <li>Coats the wall of the intestine so that stools can pass through more easily</li>
                      <li>Time to Relief:</li>
                      <li>Works in 6 to 8 hours</li>
                    </ul>
                  </div>
                  <div class="rightside">
                    <ul>
                      <span>Examples:</span>
                      <li class="inactive">Mineral Oil</li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end box -->
              <h5>Miralax<sup>&reg;</sup> is a registered trademark of Bayer Consumer and Metamucil<sup>&reg;</sup> is a registered trademark of Procter & Gamble.</h5>
            </li>
          </ul>
          <!--end right content --> 
        </li>
        <li><a href="talk-to-your-doctor.html#item5" name="" class="button_grad">When to See Your Doctor</a></li>
        <li><a href="constipation-and-pregnancy-breastfeeding.html#item6" name="" class="button_grad">Constipation During Pregnancy & While Breastfeeding</a></li>
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
      <div class="img treatment">
        <div class="box_left">
          <h3 style="border-top:none;">Constipation Treatment Options</h3>
          <p style="width: 710px;">Fortunately, there are a variety of over-the-counter treatment options available to relieve your occasional constipation. Each type of product works differently in your body and the time to relief varies. </p>
          <br>
          
          <!--hidden content-->
          
          <div class="product_comparison border5 border_shadow3">
            <table class="table_about" cellspacing="0" cellpadding="0" border="0" >
              <tr class="border_top">
                <td class="cat_cell top_left">&nbsp;</td>
                <td class="cat_cell w25"> Example </td>
                <td class="cat_cell"> How it Works </td>
                <td class="cat_cell w15"> Time to Relief </td>
                <td class="top_row">&nbsp;</td>
              </tr>
              <tr class="border_top">
                <td class="cat_cell" rowspan="2"> Stimulant Tablet<br>
                  <span class="how_to">(Taken by mouth)</span></td>
                <td><a href="{{action('PageController@laxatives')}}">Dulcolax<sup>&reg;</sup><br>Laxative Tablets</a></td>
                <td rowspan="2" class="hOpt"> Speeds up stool movement by stimulating the bowel muscles </td>
                <td rowspan="2"> Works overnight </td>
                <td><a href="{{action('PageController@laxatives')}}#buy-now"><img src="{{ URL::to('static_resources/images/btn_buy_now_pl.png')}}" alt="Buy Npw" title="Buy Now" /></a></td>
              </tr>
              <tr class="border_top">
                <td class="border_top_dashed"><a href="{{action('PageController@dulcolaxlaxativeforwomen')}}">Dulcolax Pink<sup>&reg;</sup> <br>
                  Laxative Tablets </a></td>
                <td class="border_top_dashed last_right"><a href="{{action('PageController@dulcolaxlaxativeforwomen')}}#buy-now"><img src="{{ URL::to('static_resources/images/btn_buy_now_pl.png')}}" alt="Buy Npw" title="Buy Now" /></a></td>
              </tr>
              <tr class="border_top">
                <td class="cat_cell"> Stimulant Suppository<br>
                  <span class="how_to">(Inserted rectally)</span></td>
                <td><a href="{{action('PageController@DulcolaxSuppository')}}">Dulcolax<sup>&reg;</sup><br>Laxative Suppository</a></td>
                <td class="hOpt"> Speeds up stool movement by stimulating the bowel muscles </td>
                <td> Works in minutes </td>
                <td><a href="{{action('PageController@DulcolaxSuppository')}}#buy-now"><img src="{{ URL::to('static_resources/images/btn_buy_now_pl.png')}}" alt="Buy Npw" title="Buy Now" /></a></td>
              </tr>
              <tr class="border_top">
                <td class="cat_cell" rowspan="2"> Stool Softener </td>
                <td><a href="{{action('PageController@stoolsoftener')}}">Dulcolax<sup>&reg;</sup> Stool Softener</a></td>
                <td rowspan="2" class="hOpt"> Softens the stool in the intestine, making it easier to pass </td>
                <td rowspan="2"> Works gradually </td>
                <td><a href="{{action('PageController@stoolsoftener')}}#buy-now"><img src="{{ URL::to('static_resources/images/btn_buy_now_pl.png')}}" alt="Buy Npw" title="Buy Now" /></a></td>
              </tr>
              <tr class="border_top">
                <td class="border_top_dashed"><a href="{{action('PageController@DulcoEase')}}">DulcoEase Pink<sup>&reg;</sup> Stool Softener</a></td>
                <td class="border_top_dashed last_right "><a href="{{action('PageController@DulcoEase')}}#buy-now"><img src="{{ URL::to('static_resources/images/btn_buy_now_pl.png')}}" alt="Buy Npw" title="Buy Now" /></a></td>
              </tr>
              <tr class="border_top">
                <td class="cat_cell"> Osmotic </td>
                <td> Miralax<sup>&reg;</sup></td>
                <td class="hOpt"> Draws water into the bowel, providing softer stools and increases frequency of bowel movements </td>
                <td> Works in 1 to 3 days </td>
                <td>&nbsp;</td>
              </tr>
              <tr class="border_top">
                <td class="cat_cell"> Bulk-forming </td>
                <td> Metamucil<sup>&reg;</sup></td>
                <td class="hOpt"> Absorbs more fluid in the intestines, making the stool bigger, giving the urge to pass </td>
                <td> Works in 12 to 72 hours </td>
                <td>&nbsp;</td>
              </tr>
              <tr class="border_top border_bottom">
                <td class="cat_cell"> Lubricant </td>
                <td> Mineral Oil </td>
                <td class="hOpt"> Coats the wall of the intestine so that stools can pass through more easily </td>
                <td> Works in 6 to 8 hours </td>
                <td class="bottom_row">&nbsp;</td>
              </tr>
            </table>
            </p>
            <!--end of hidden content-->
            
            <p class="footnote"><em>Miralax<sup>&reg;</sup> is a registered trademark of Bayer Consumer and Metamucil<sup>&reg;</sup> is a registered trademark of Procter & Gamble.</em> </p>
          </div>
          <div class="clear"></div>
          <h3 class="content_subheader no-border">Learn more about these common constipation-<br>related topics</h3>
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
<script>
  $('.buy').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
</script> 
@stop 