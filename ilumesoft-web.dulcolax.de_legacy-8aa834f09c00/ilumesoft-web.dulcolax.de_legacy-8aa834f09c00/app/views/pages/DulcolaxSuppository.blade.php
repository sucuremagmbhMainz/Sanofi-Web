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
            <h1 class="product_name">{{ trans('content.common_5') }}</h1>
              <div class="product_recommended">
                <img src="{{ URL::to('static_resources/images/seal_dulcolax_2.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}" />
              </div>
            <h3 class="product_subheader">{{ trans('content.common_65') }}</h3>
          </div>
        <div class="product_image suppository">
          <img src="{{URL::to('static_resources/mobile/images/products/dulcolax-laxative-suppositories.png')}}" alt="{{ trans('content.dulcolaxsuppository_4') }}" title="{{ trans('content.dulcolaxsuppository_4') }}">
        </div>
        <div class="product_details">
          <p>{{ trans('content.dulcolaxsuppository_5') }}</p>
          <ul>
            <li><span>{{ trans('content.dulcolaxsuppository_6') }}</span></li>
            <li><span>{{ trans('content.dulcolaxsuppository_7') }}</span></li>
          </ul>
          <div class="pd_buttons">
            <a class="learnMore hash_reload" href="#learn-more">{{ trans('content.common_1') }}</a><a href="#buy-now" rel="tab5" class="buy hash_reload">{{ trans('content.common_2') }}</a>
          </div>
          <span class="pd_links">
              <a href="#drug-facts" class="hash_reload">{{ trans('content.common_3') }}</a>, <a href="#faqs" class="hash_reload">{{ trans('content.common_4') }}</a>
            </span>
        </div>
         <div class="pd_buttons box_call_out">            
          <p>{{ trans('content.dulcolaxsuppository_12') }}</p><a href="dulcoglide-applicators.html#learn-more" class="no-top-bottom-margin"><img src="{{ URL::to('static_resources/images/btn_learn_more_g.png')}}" alt="Learn More" title="Learn More"></a>          
        </div>
      </div>
    
      <!-- tabs -->

      <div id="tabs-detail" name="tab-area">
        <ul class="tabs_menu" >
          <li class="tab_item" name="learn-more" id="tab-learn-more" >        
              <a href="#learn-more" class="tab_active">{{ trans('content.common_1') }}</a>       
          </li>
          <li class="tab_item" name="buy-now" id="tab-buy-now" >        
              <a href="#buy-now">{{ trans('content.common_2') }}</a>       
          </li>
          <li class="tab_item" name="drug-facts" id="tab-drug-facts" >        
              <a href="#drug-facts">{{ trans('content.common_3') }}</a>        
          </li>
          <li class="tab_item" name="faqs" id="tab-faqs" >        
              <a href="#faqs">{{ trans('content.common_4') }}</a>        
          </li>
        </ul>
        <div class="tabs_content">
          <h3>{{ trans('content.common_1') }}</h3>
          <div id="learn-more" class="tab_content">
            <h1>{{ trans('content.common_5') }}</h1>
            <h2>{{ trans('content.common_65') }}</h2>
            <p>
              {{ trans('content.dulcolaxsuppository_21') }}'
            </p>
            <ul>
              <li><span>{{ trans('content.dulcolaxsuppository_22') }}</span> </li>
              <li><span>{{ trans('content.dulcolaxsuppository_23') }}</span></li>
            </ul>
            <p>
              {{ trans('content.dulcolaxsuppository_24') }}'
            </p>
            <ul>
              <li><span>{{ trans('content.common_56') }} </span></li>
              <li><span>{{ trans('content.common_73') }}</span> </li>
              <li><span>{{ trans('content.dulcolaxsuppository_27') }} </li>
              <li><span>{{ trans('content.common_70') }} </li>
            </ul>
          </div>

            <h3 id="buyNow-title">{{ trans('content.common_1') }}</h3>
       <!-- Buy Now tab-->
<div id="buy-now" class="tab_content">
  <h1>{{ trans('content.common_5') }}</h1>

<p>{{ trans('content.dulcolaxsuppository_31') }}

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
                <option value="http://cvs.com/shop/product-detail/Dulcolax-Suppositories?skuId=184325">{{ trans('content.dulcolaxsuppository_37') }}</option>
                
                <option value="http://cvs.com/shop/product-detail/Dulcolax-Suppositories?skuId=163386">{{ trans('content.common_78') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Suppositories', 'CVS');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_amazon.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.amazon.com/Dulcolax-Laxative-Comfort-Suppositories-suppositories/dp/B00007MII0/ref=sr_1_1?ie=UTF8&qid=1359563108&sr=8-1&keywords=dulcolax+suppositories">{{ trans('content.common_78') }}</option>
        <option value="http://www.amazon.com/Dulcolax-Laxative-Comfort-Suppositories-suppositories/dp/B00007MII0/ref=sr_1_1?ie=UTF8&qid=1359563108&sr=8-1&keywords=dulcolax+suppositories">{{ trans('content.common_76') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Suppositories', 'Amazon');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}" ></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_walgreens.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">Select product and size</option>
                <option value="http://www.walgreens.com/store/c/dulcolax-laxative-suppositories/ID=prod5016-product">{{ trans('content.dulcolaxsuppository_43') }}</option>
                <option value="http://www.walgreens.com/store/c/dulcolax-laxative-suppositories/ID=prod1418548-product">{{ trans('content.common_76') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Suppositories', 'Walgreens');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_walmart.png')}}"></div>
            <div class="retailer_desc">
              <select>
                <option value="">Select product and size</option>
                <option value="http://www.walmart.com/ip/Dulcolax-Suppositories-Laxative-4-ct/10309829">{{ trans('content.dulcolaxsuppository_45') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Suppositories', 'Walmart');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_drugstore.png')}}"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>                
                <option value="http://www.drugstore.com/dulcolax-laxative-suppositories/qxp412593?catid=184260">{{ trans('content.dulcolaxsuppository_47') }}</option>
                <option value="http://www.drugstore.com/dulcolax-laxative-comfort-shaped-suppositories/qxp78801?catid=184260">{{ trans('content.common_78') }}</option>
                <option value="http://www.drugstore.com/dulcolax-laxative-comfort-shaped-suppositories/qxp79000?catid=184260">{{ trans('content.common_76') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Suppositories', 'Drugstore');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>

     <div class="clear"></div>   
  </div>
</div>
          <h3>{{ trans('content.common_3') }}</h3>
          <div id="drug-facts" class="tab_content">
            <h1>{{ trans('content.common_5') }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p>
            </p>
            <div class="drug-fact-hdr-container">
              {{ trans('content.dulcolaxsuppository_53') }}           
            </div>
            <div class="drug-fact-hdr-container">
              {{ trans('content.dulcolaxsuppository_54') }}'
            </div>
            <br>
            <br>
            <h4>{{ trans('content.common_16') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_35') }}</span></li>
              <li><span>{{ trans('content.dulcolaxsuppository_57') }}</span></li>
            </ul>
            <h4>{{ trans('content.common_24') }}<br />
            {{ trans('content.dulcolaxsuppository_59') }}</h4>
            <h4>{{ trans('content.common_60') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_30') }}</span></li>
              <li><span>{{ trans('content.common_42') }}</span></li>
            </ul>
            <p>{{ trans('content.dulcolaxsuppository_63') }}</p>
            <h4>{{ trans('content.common_33') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_68') }}</span></li>
              <li><span>{{ trans('content.common_38') }}</span></li>
            </ul>
            <p>
              {{ trans('content.common_15') }}
            </p>
            <p>
              {{ trans('content.dulcolaxsuppository_68') }}
            </p>
            <p>
              <b>{{ trans('content.common_53') }}</b> 
            </p>
            <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
            <tbody>
            <tr>
              <td class="dfacts_tdl">
                {{ trans('content.common_29') }}'
              </td>
              <td class="dfacts_tdr">
                {{ trans('content.dulcolaxsuppository_71') }}'
              </td>
            </tr>
            <tr>
              <td class="dfacts_tdl">
                 {{ trans('content.common_61') }}'
              </td>
              <td class="dfacts_tdr">
                 {{ trans('content.dulcolaxsuppository_73') }}'
              </td>
            </tr>
            <tr>
              <td class="dfacts_tdl df_bottom">
                 {{ trans('content.common_82') }}'
              </td>
              <td class="dfacts_tdr df_bottom">
                 {{ trans('content.common_45') }}'
              </td>
            </tr>
            </tbody>
            </table>
            <h4>{{ trans('content.common_20') }}</h4>
            <ul>
              <li><span>{{ trans('content.dulcolaxsuppository_77') }}</span> </li>              
            </ul>
          </div>
          <!--FAQs-->
          <h3>{{ trans('content.common_9') }}</h3>
          <div id="faqs" class="tab_content" >
            <h1>{{ trans('content.common_5') }}</h1>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
               <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_80') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcolaxsuppository_81') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_82') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcolaxsuppository_83') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_84') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcolaxsuppository_85') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_86') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcolaxsuppository_87') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_88') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcolaxsuppository_89') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_90') }}</h4>
                <div class="faq_answer">
                    {{ trans('content.dulcolaxsuppository_91') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_92') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcolaxsuppository_93') }}'
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_94') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcolaxsuppository_95') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
                            
              <div class="faq_question">
                <h4>{{ trans('content.dulcolaxsuppository_96') }}</h4>
                <div class="faq_answer">
                    {{ trans('content.dulcolaxsuppository_97') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <p>
              {{ trans('content.dulcolaxsuppository_98') }}
            </p>
          </div>
          <!--Ratings tab-->
          {{--<h3>{{ trans('content.common_14') }}</h3>
          <div id="ratings" class="tab_content">
            <h1>{{ trans('content.common_5') }}</h1>

          </div>--}}
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
