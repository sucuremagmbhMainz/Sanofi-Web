@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent
	
@stop

@section('content')

    <div id="wrapper" class="productDetail">
  <div class="box_content">
    <div class="product_desc">
      <div class="product_header">
        <h1 class="product_name">{{ trans('content.common_19') }}</h1>
        <div class="product_recommended">
            <img src="{{ URL::to('static_resources/images/seal_dulcolax_women.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}" />
        </div>
        <h3 class="product_subheader">{{ trans('content.dulcolax_laxative_for_women_3') }}</h3>
      </div>
      <div class="product_image pinkLaxative_img"> <img src="{{URL::to('static_resources/mobile/images/products/dulcolax-pink-laxative-tablets-for-women.png')}}" alt="{{ trans('content.common_19') }}" title="{{ trans('content.common_19') }}">
      </div>
      <div class="product_details">
        <p><span class="boldFont">{{ trans('content.dulcolax_laxative_for_women_4') }}</span><br />
          {{ trans('content.dulcolax_laxative_for_women_5') }}</p>
        <ul>
          <li><span>{{ trans('content.common_55') }}</span></li>
          <li><span>{{ trans('content.dulcolax_laxative_for_women_7') }}</span></li>
        </ul>
        <div class="pd_buttons"> <a class="learnMore hash_reload" href="#learn-more">{{ trans('content.common_1') }}</a><a href="#buy-now" rel="tab2" class="buy hash_reload">{{ trans('content.common_2') }}</a> </div>
        <span class="pd_links">
              <a href="#drug-facts" class="hash_reload">Drug Facts</a>, <a href="#faqs" class="hash_reload">{{ trans('content.common_4') }}</a>
            </span>
      </div>
    </div>
    
    <!-- tabs -->
    
    <div id="tabs-detail" name="tab-area" class="clearfix">
      <ul class="tabs_menu clearfix" >
        <li class="tab_item" name="learn-more" id="tab-learn-more" > <a href="#learn-more" class="tab_active">{{ trans('content.common_1') }}</a> </li>
         <li class="tab_item" name="buy-now" id="tab-buy-now" ><a href="#buy-now">{{ trans('content.common_2') }}</a> </li>
        <li class="tab_item" name="drug-facts" id="tab-drug-facts" > <a href="#drug-facts">{{ trans('content.common_3') }}</a> </li>
        <li class="tab_item" name="faqs" id="tab-faqs" > <a href="#faqs">{{ trans('content.common_4') }}</a> </li>
        <li class="tab_item" name="video" id="tab-video" > <a href="#video" name="faqs">{{ trans('content.common_27') }}</a> </li>
      </ul>
      <div class="tabs_content clearfix"> 
        
        <!--Learn more-->
        <h3>{{ trans('content.common_1') }}</h3>
        <div id="learn-more" class="tab_content clearfix">
          <h1>{{ trans('content.common_19') }}</h1>
          <h2>{{ trans('content.dulcolax_laxative_for_women_3') }}</h2>
          <p>{{ trans('content.dulcolax_laxative_for_women_14') }}</p>
          <p></p>
          <ul>
            <li><span>{{ trans('content.common_55') }}</span></li>
            <li><span>{{ trans('content.dulcolax_laxative_for_women_7') }}</span></li>
          </ul>
          <p>{{ trans('content.dulcolax_laxative_for_women_15') }}</p>
          <p></p>
          <ul>
            <li><span>{{ trans('content.dulcolax_laxative_for_women_16') }}</span></li>
            <li><span>{{ trans('content.common_56') }}</span></li>
            <li><span>{{ trans('content.common_73') }}</span></li>
            <li><span>{{ trans('content.common_70') }}</span></li>
          </ul>
        </div>
        
        <h3 id="buyNow-title">{{ trans('content.common_1') }}</h3>
       <div id="buy-now" class="tab_content clearfix">
  <h1>{{ trans('content.common_19') }}</h1>

<p>{{ trans('content.dulcolax_laxative_for_women_20') }}

<p><b>{{ trans('content.common_50') }}</b>
<p>
<div class="menu_buy_now tab_bn">
    <span class="retailer_logo_h">{{ trans('content.common_21') }}</span> 
        <span class="retailer_desc_h">{{ trans('content.common_43') }}</span> 
        <span class="retailer_buy_now_h">{{ trans('content.common_32') }}</span>
        
         <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_cvs.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://cvs.com/shop/product-detail/Dulcolax-Laxative-Tablets-for-Women?skuId=883974">{{ trans('content.dulcolax_laxative_for_women_26') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets for Women', 'CVS');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_amazon.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.amazon.com/Dulcolax-Laxative-Tablets-Women-Bisacodyl/dp/B007RWX6HS/ref=sr_1_1?ie=UTF8&qid=1359563033&sr=8-1&keywords=dulcolax+women">{{ trans('content.dulcolax_laxative_for_women_26') }}</option>
                <option value="http://www.amazon.com/Dulcolax-Laxative-Tablets-Women-Bisacodyl/dp/B007RWX6HS/ref=sr_1_1?ie=UTF8&qid=1359563033&sr=8-1&keywords=dulcolax+women">{{ trans('content.dulcolax_laxative_for_women_27') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets for Women', 'Amazon'); return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_walgreens.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.walgreens.com/store/c/dulcolax-laxative-comfort-coated-tablets-for-women/ID=prod6091211-product">{{ trans('content.dulcolax_laxative_for_women_26') }}</option>
                <option value="http://www.walgreens.com/store/c/dulcolax-laxative-comfort-coated-tablets-for-women/ID=prod6162943-product">{{ trans('content.dulcolax_laxative_for_women_27') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets for Women', 'Walgreens');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_drugstore.png')}}"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.drugstore.com/dulcolax-laxative-comfort-coated-tablets-for-women/qxp393008?catid=184260">{{ trans('content.dulcolax_laxative_for_women_26') }}</option>
                <option value="http://www.drugstore.com/dulcolax-laxative-comfort-coated-tablets-for-women/qxp467851?catid=184260">{{ trans('content.dulcolax_laxative_for_women_27') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets for Women', 'Drugstore');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
     <div class="clear"></div> 
  </div>
  
</div> 


        <!--Drug Facts-->
        <h3>{{ trans('content.common_3') }}</h3>
        <div id="drug-facts" class="tab_content clearfix">
          <h1>{{ trans('content.common_19') }}</h1>
          <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
          <p> </p>
          <div class="drug-fact-hdr-container"> <b>{{ trans('content.dulcolax_laxative_for_women_28') }}</b> <br>
            {{ trans('content.dulcolax_laxative_for_women_29') }} </div>
          <div class="drug-fact-hdr-container"> <b>{{ trans('content.common_58') }}</b><br>
            {{ trans('content.dulcolax_laxative_for_women_31') }} </div>
            <br>
            <br>
          <h4>{{ trans('content.common_16') }}</h4>
          <ul>
            <li><span>{{ trans('content.common_35') }} </span></li>
            <li><span>{{ trans('content.dulcolax_laxative_for_women_34') }} </span></li>
          </ul>
          <h4>{{ trans('content.common_24') }}<br />
         {{ trans('content.dulcolax_laxative_for_women_36') }}</h4>
          <h4>{{ trans('content.common_60') }}</h4>
          <ul>
            <li><span>{{ trans('content.common_30') }} </span></li>
            <li><span>{{ trans('content.common_42') }} </span></li>
          </ul>
          <h4>{{ trans('content.dulcolax_laxative_for_women_40') }}</h4>
          <ul>
            <li><span>{{ trans('content.dulcolax_laxative_for_women_41') }} </span></li>
            <li><span>{{ trans('content.dulcolax_laxative_for_women_42') }} </span></li>
            <li><span>{{ trans('content.dulcolax_laxative_for_women_43') }} </span></li>
          </ul>
          <h4>{{ trans('content.common_33') }}</h4>
          <ul>
            <li><span>{{ trans('content.dulcolax_laxative_for_women_45') }} </span></li>
            <li><span>{{ trans('content.common_38') }} </span></li>
          </ul>
          <p> {{ trans('content.common_15') }} </p>
          <p> {{ trans('content.common_46') }} </p>
          <p> {{ trans('content.dulcolax_laxative_for_women_49') }}</p>
          <p> </p>
          <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
            <tbody>
              <tr>
                <td class="dfacts_tdl"> {{ trans('content.dulcolax_laxative_for_women_50') }} </td>
                <td class="dfacts_tdr"> {{ trans('content.common_84') }} </td>
              </tr>
              <tr>
                <td class="dfacts_tdl"> {{ trans('content.common_61') }} </td>
                <td class="dfacts_tdr"> {{ trans('content.dulcolax_laxative_for_women_53') }} </td>
              </tr>
              <tr>
                <td class="dfacts_tdl df_bottom"> {{ trans('content.common_82') }} </td>
                <td class="dfacts_tdr df_bottom"> {{ trans('content.common_45') }} </td>
              </tr>
            </tbody>
          </table>
          <h4>{{ trans('content.common_20') }}</h4>
          <ul>
          	<li><span>{{ trans('content.dulcolax_laxative_for_women_57') }}</span> </li>
          </ul>
        </div>
        
        <!--FAQs-->
        <h3>{{ trans('content.common_9') }}</h3>
        <div id="faqs" class="tab_content clearfix" >
          <h1>{{ trans('content.common_19') }}</h1>
          <div class="faq_container">
            <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_59') }}</h4>
              <div class="faq_answer">{{ trans('content.dulcolax_laxative_for_women_60') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_61') }}</h4>
              <div class="faq_answer">{{ trans('content.dulcolax_laxative_for_women_62') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_63') }}</h4>
              <div class="faq_answer">{{ trans('content.dulcolax_laxative_for_women_64') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_65') }}</h4>
              <div class="faq_answer">{{ trans('content.dulcolax_laxative_for_women_66') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_67') }}</h4>
              <div class="faq_answer">{{ trans('content.dulcolax_laxative_for_women_68') }} </div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_69') }}</h4>
              <div class="faq_answer">{{ trans('content.dulcolax_laxative_for_women_70') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_71') }}</h4>
              <div>{{ trans('content.dulcolax_laxative_for_women_72') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_73') }}</h4>
              <div>{{ trans('content.dulcolax_laxative_for_women_74') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <div class="faq_container">
           <div class="faq_icon">
              <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
           </div>
            <div class="faq_question">
              <h4>{{ trans('content.dulcolax_laxative_for_women_75') }}</h4>
              <div>{{ trans('content.dulcolax_laxative_for_women_76') }}</div>
            </div>
            <div class="clear"> </div>
          </div>
          <p>{{ trans('content.dulcolax_laxative_for_women_77') }} 
        </div>
        
        {{--Video tab--}}
        <h3>{{ trans('content.common_27') }}</h3>
        <div id="video" class="tab_content clearfix" >
          <h1>{{ trans('content.common_19') }}</h1>
          <div class="videoFrameWrapper" data-src="//player.vimeo.com/video/102551242?api=1&player_id=player1">
            <iframe id="dulcolaxVideo" src="" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>
        </div>
        
        <!--Reviews tab-->
        {{--<h3>{{ trans('content.common_14') }}</h3>
            <!--Ratings tab-->
            <div id="ratings" class="tab_content clearfix">
              <h1>{{ trans('content.common_19') }}</h1>

              </div>--}}
          <!--Ratings tab-->        
        
        
      </div>
    </div>
    
    <!-- grid -->
    
    <div class="product_grid">
      <h4>{{ trans('content.common_8') }}</h4>
     @include('includes.related-products')  
      
    </div>
  </div>
</div>
@stop
