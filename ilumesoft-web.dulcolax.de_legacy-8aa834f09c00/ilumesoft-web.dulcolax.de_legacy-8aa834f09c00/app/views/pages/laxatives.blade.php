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
      <div class="product_desc clearfix">
        <div class="product_header">          
          <h1 class="product_name">{{ trans('content.common_13') }}</h1>
          <div class="product_recommended">
            <img src="{{URL::to('static_resources/mobile/images/seal_dulcolax_2.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}">
          </div>
          <h3 class="product_subheader">{{ trans('content.common_12') }}</h3>
        </div>
        <div class="product_image">
          <img src="{{URL::to('static_resources/mobile/images/dulcolax-laxative-tablets.png')}}" alt="{{ trans('content.common_13') }}" title="{{ trans('content.common_13') }}">
        </div>
        <div class="product_details">
          <p>{{ trans('content.laxative_4') }}</p>
          <ul>
            <li><span>{{ trans('content.common_55') }}</span></li>
            <li><span>{{ trans('content.laxative_6') }}</span></li>
          </ul>
          <div class="pd_buttons">
            <a class="learnMore hash_reload" href="#learn-more">{{ trans('content.common_1') }}</a><a href="#buy-now" rel="tab1" class="buy hash_reload">{{ trans('content.common_2') }}</a>
          </div>
          <span class="pd_links">
              <a href="#drug-facts" class="hash_reload">{{ trans('content.common_3') }}</a>, <a href="#faqs" class="hash_reload">{{ trans('content.common_4') }}</a>
            </span>
        </div>
      </div>
    
      {{-- tabs --}}
      <div id="tabs-detail" class="clearfix" name="tab-area">
        <ul class="tabs_menu" >
          <li class="tab_item" name="learn-more" id="tab-learn-more"><a href="#learn-more" class="tab_active">{{ trans('content.common_1') }}</a></li>
          <li class="tab_item" name="buy-now" id="tab-buy-now"><a href="#buy-now">{{ trans('content.common_2') }}</a></li>
          <li class="tab_item" name="drug-facts" id="tab-drug-facts"><a href="#drug-facts">{{ trans('content.common_3') }}</a></li>
          <li class="tab_item" name="faqs" id="tab-faqs"><a href="#faqs">{{ trans('content.common_4') }}</a></li>
          <li class="tab_item" name="video" id="tab-video"><a href="#video" name="faqs">{{ trans('content.common_27') }}</a></li>
        </ul>
        <div class="tabs_content clearfix">
          <h3>{{ trans('content.common_1') }}</h3>
          <div id="learn-more" class="tab_content clearfix">
            <h1>{{ trans('content.common_13') }}</h1>
            <h2>{{ trans('content.common_12') }}</h2>
            <p>
              {{ trans('content.laxative_13') }}
            </p>
            <p>
            </p>
            <ul>
              <li><span>{{ trans('content.common_55') }}</span> </li>
              <li><span>{{ trans('content.laxative_6') }} </span></li>
            </ul>
            <p>
             {{ trans('content.laxative_14') }}
            </p>
            <p>
            </p>
            <ul>
              <li><span>{{ trans('content.common_56') }} </span></li>
              <li><span>{{ trans('content.common_73') }}</span> </li>
              <li><span>{{ trans('content.common_70') }} </span></li>
            </ul>
          </div>

          <h3 id="buyNow-title">{{ trans('content.common_2') }}</h3>
          <div id="buy-now" class="tab_content clearfix">
            <h1>{{ trans('content.Dulcolax<sup>&reg;</sup> Laxative Tablets') }}</h1>
            <p>{{ trans('content.laxative_18') }}
            <p><b>{{ trans('content.common_50') }}</b>
            <p></p>
            <div class="menu_buy_now tab_bn">
              <span class="retailer_logo_h">{{ trans('content.common_21') }}</span> 
              <span class="retailer_desc_h">{{ trans('content.common_43') }}</span> 
              <span class="retailer_buy_now_h">{{ trans('content.common_32') }}</span>
          
              <!--list of retailers-->
               <div class="bnm_retailer">
                <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_cvs.png')}}" class="rlogo"></div>
                  <div class="retailer_desc">
                    <select>
                      <option value="">{{ trans('content.common_17') }}</option>
                      <option value="http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=395780">{{ trans('content.laxative_24') }}</option>
                      <option value="http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=108597">{{ trans('content.laxative_25') }}</option>
                      <option value="http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=222885">{{ trans('content.laxative_26') }}</option>
                      <option value="http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=314153">{{ trans('content.laxative_27') }}</option>
                    </select>
                  </div>
                  <div class="retailer_buy_now">
                    <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets', 'CVS');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
                  </div>    
                <div class="clear"></div> 
              </div>
            
              <div class="bnm_retailer">
                <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_amazon.png')}}" class="rlogo"></div>
                  <div class="retailer_desc">
                    <select>
                      <option value="">{{ trans('content.common_17') }}</option>
                      <option value="http://www.amazon.com/Dulcolax-Laxative-Comfort-Tablets-tablets/dp/B000063XTO/ref=sr_1_1?m=ATVPDKIKX0DER&s=hpc&ie=UTF8&qid=1365437226&sr=1-1&keywords=Dulcolax">Dulcolax<sup>&reg;</sup>  Laxative Tablets &ndash; 100 ea</option>
                    </select>
                  </div>
                  <div class="retailer_buy_now">
                    <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets', 'Amazon');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
                  </div>    
                <div class="clear"></div> 
              </div>
            
              <div class="bnm_retailer">
                <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_walgreens.png')}}" class="rlogo"></div>
                  <div class="retailer_desc">
                    <select>
                      <option value="">{{ trans('content.common_17') }}</option>
                      <option value="http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod5015-product">{{ trans('content.laxative_24') }}</option>
                      <option value="http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod5017-product">{{ trans('content.laxative_25') }}</option>
                      <option value="http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod5782-product">{{ trans('content.laxative_26') }}</option>
                      <option value="http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod1418613-product">{{ trans('content.laxative_27') }}</option>
                    </select>
                  </div>
                  <div class="retailer_buy_now">
                    <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets', 'Walgreens');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
                  </div>    
                <div class="clear"></div> 
              </div>
            
              <div class="bnm_retailer">
                <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_walmart.png')}}"></div>
                  <div class="retailer_desc">
                    <select>
                      <option value="">{{ trans('content.common_17') }}</option>
                      <option value="http://www.walmart.com/ip/Dulcolax-Tablets-Laxative-25-ct/10309827">{{ trans('content.laxative_25') }}</option>
                      <option value="http://www.walmart.com/ip/Dulcolax-Tablets-Laxative-100-ct/10309828">{{ trans('content.laxative_27') }}</option>
                    </select>
                  </div>
                  <div class="retailer_buy_now">
                    <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets', 'Walmart');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
                  </div>    
                <div class="clear"></div> 
              </div>
            
              <div class="bnm_retailer">
                <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_drugstore.png')}}"></div>
                  <div class="retailer_desc">
                    <select>
                      <option value="">{{ trans('content.common_17') }}</option>
                      <option value="http://www.drugstore.com/dulcolax-overnight-relief-laxative-tablets/qxp74158?catid=184260">{{ trans('content.laxative_25') }}</option>
                      <option value="http://www.drugstore.com/dulcolax-laxative-tablets/qxp412594?catid=184260">{{ trans('content.laxative_26') }}</option>
                      <option value="http://www.drugstore.com/dulcolax-overnight-relief-laxative-tablets/qxp74157?catid=184260">{{ trans('content.laxative_27') }}</option>
                    </select>
                  </div>
                  <div class="retailer_buy_now">
                    <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets', 'Drugstore');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
                  </div>    
                <div class="clear"></div> 
              </div>
            
              <div class="bnm_retailer">
                <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_target.png')}}"></div>
                  <div class="retailer_desc">
                    <select>
                      <option value="">{{ trans('content.common_17') }}</option>
                      <option value="http://www.target.com/p/dulcolax-gentle-and-predictable-overnight-relief-laxative-tablets-100-count/-/A-14765984#prodSlot=medium_1_1&term=dulcolax">{{ trans('content.laxative_27') }}</option>                
                      </select>
                  </div>
                  <div class="retailer_buy_now">
                    <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'Dulcolax Laxative Tablets', 'Target');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
                  </div>    
                <div class="clear"></div> 
              </div>
            </div>
          </div>

          <h3>{{ trans('content.common_3') }}</h3>
          <div id="drug-facts" class="tab_content clearfix">
            <h1>{{ trans('content.common_13') }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p></p>
            <div class="drug-fact-hdr-container">
              <b>{{ trans('content.laxative_28') }}</b>  <br>
             {{ trans('content.laxative_29') }}           
            </div>
            <div class="drug-fact-hdr-container">
              <b>{{ trans('content.common_58') }}</b><br>
               {{ trans('content.laxative_31') }}
            </div>
            <br>
            <br>
            <h4>{{ trans('content.common_16') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_35') }} </span></li>
              <li><span>{{ trans('content.laxative_34') }} </span></li>
            </ul>
            <h4>{{ trans('content.common_24') }}<br />
            {{ trans('content.laxative_36') }}</h4>
            <h4>{{ trans('content.common_60') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_30') }} </span></li>
              <li><span>{{ trans('content.common_42') }} </span></li>
            </ul>
            <h4>{{ trans('content.laxative_40') }}</h4>
            <ul>
              <li><span>{{ trans('content.laxative_41') }} </span></li>
              <li><span>{{ trans('content.laxative_42') }} </span></li>
              <li><span>{{ trans('content.laxative_43') }} </span></li>
            </ul>
            <h4>{{ trans('content.common_33') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_68') }} </span></li>
              <li><span>{{ trans('content.common_38') }} </span></li>
            </ul>
            <p>
              {{ trans('content.common_15') }}
            </p>
            <p>
              {{ trans('content.common_46') }}
            </p>
            <p>
              {{ trans('content.laxative_49') }}
            </p>
            <p></p>
            <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
              <tbody>
              <tr>
                <td class="dfacts_tdl">
                  {{ trans('content.common_29') }}
                </td>
                <td class="dfacts_tdr">
                  {{ trans('content.common_84') }}
                </td>
              </tr>
              <tr>
                <td class="dfacts_tdl">
                   {{ trans('content.common_61') }}
                </td>
                <td class="dfacts_tdr">
                   {{ trans('content.laxative_53') }}
                </td>
              </tr>
              <tr>
                <td class="dfacts_tdl df_bottom">
                   {{ trans('content.common_82') }}
                </td>
                <td class="dfacts_tdr df_bottom">
                  {{ trans('content.common_45') }}
                </td>
              </tr>
              </tbody>
            </table>
            <h4>{{ trans('content.common_20') }}</h4>
            <ul>
              <li><span>{{ trans('content.laxative_57') }}</span> </li>
            </ul>
          </div>
          
          {{--FAQs--}}
          <h3>{{ trans('content.common_9') }}</h3>
          <div id="faqs" class="tab_content clearfix" >
            <h1>{{ trans('content.common_13') }}</h1>
            <div class="faq_container">
              <div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.laxative_59') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.laxative_60') }}
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.laxative_61') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.laxative_62') }}
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.laxative_63') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.laxative_64') }}
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.laxative_65') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.laxative_66') }}
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.laxative_67') }}</h4>
                <div class="faq_answer">
                    {{ trans('content.laxative_68') }}
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.laxative_69') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.laxative_70') }}
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="faq_container">
              <div class="faq_icon">
                  <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.laxative_71') }}</h4>
                <div class="faq_answer">
                    {{ trans('content.laxative_72') }}
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <p>
              {{ trans('content.laxative_73') }}
            </p>
          </div>
          
          {{--Video tab--}}
          <h3>{{ trans('content.common_27') }}</h3>
          <div id="video" class="tab_content clearfix" >
            <h1>{{ trans('content.common_13') }}</h1>
            <div class="videoFrameWrapper" data-src="//player.vimeo.com/video/102551242?api=1&player_id=player1">
              <iframe id="dulcolaxVideo" src="" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
          </div>
          
          {{--Ratings tab--}}
          {{--<h3>{{ trans('content.common_14') }}</h3>
          <div id="ratings" class="tab_content clearfix">
            <h1>{{ trans('content.common_13') }}</h1>

          </div>--}}
        </div>
      </div>

      {{-- grid --}}
      <div class="product_grid">
        <h4>{{ trans('content.common_8') }}</h4>
        @include('includes.related-products')    
      </div>

    </div>
  </div>
@stop
