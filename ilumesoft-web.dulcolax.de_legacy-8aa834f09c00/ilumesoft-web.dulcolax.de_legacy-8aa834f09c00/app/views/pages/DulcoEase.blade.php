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
        <!--<div class="product_introducing"></div>-->
        <div class="product_header ease_header">          
            <h1 class="product_name">{{ trans('content.common_25') }}</h1>
            <div class="product_recommended">
            <img src="{{ URL::to('static_resources/images/seal_dulcoease.png')}}" alt="{{ trans('content.DulcoEase_2') }}" title="{{ trans('content.DulcoEase_2') }}" />
            </div>
            <h3 class="product_subheader">{{ trans('content.common_71') }}</h3>
          </div>
        <div class="product_image ease_img">
          <img src="{{URL::to('static_resources/mobile/images/products/dulcoease-pink-stool-softener.png')}}" alt="{{ trans('content.common_25') }}" title="{{ trans('content.common_25') }}">
        </div>
        <div class="product_details">
          <p>{{ trans('content.DulcoEase_4') }}</p>
          <ul>
            <li><span>{{ trans('content.common_66') }}</span></li>
            <li><span>{{ trans('content.DulcoEase_6') }}</span></li>
          </ul>
          <div class="pd_buttons">
            <a class="learnMore hash_reload" href="#learn-more">{{ trans('content.common_1') }}</a><a href="#buy-now" rel="tab4" class="buy hash_reload">{{ trans('content.common_2') }}</a>
          </div>
          <span class="pd_links">
              <a href="#drug-facts" class="hash_reload">{{ trans('content.common_3') }}</a>, <a href="#faqs" class="hash_reload">{{ trans('content.common_4') }}</a>
            </span>
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
            <h1>{{ trans('content.common_25') }}</h1>
            <h2>{{ trans('content.common_71') }}</h2>
            <p>
              {{ trans('content.DulcoEase_14') }}
            </p>
            <ul>
              <li><span>{{ trans('content.common_66') }}</span> </li>
              <li><span>{{ trans('content.DulcoEase_16') }}</span></li>
            </ul>
            <p>
              {{ trans('content.DulcoEase_17') }}
            </p>
            <ul>
              <li><span>{{ trans('content.common_71') }}</span></li>
              <li><span>{{ trans('content.common_64') }}</span> </li>
              <li><span>{{ trans('content.DulcoEase_20') }}</span> </li>
            </ul>
          </div>
          <h3 id="buyNow-title">{{ trans('content.common_2') }}</h3>
          <div id="buy-now" class="tab_content">
  <h1>{{ trans('content.common_25') }}</h1>
  <p>{{ trans('content.DulcoEase_21') }}</p>
</br>
<p><b>{{ trans('content.common_50') }}</b>
<p>
<div class="menu_buy_now tab_bn">
    <span class="retailer_logo_h">{{ trans('content.common_21') }}</span> 
        <span class="retailer_desc_h">{{ trans('content.common_43') }}</span> 
        <span class="retailer_buy_now_h">{{ trans('content.common_32') }}</span>        
         
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_amazon.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.amazon.com/DulcoEase-Stool-Softener-Softgel-Women/dp/B00BN5LJUG/ref=sr_1_1?ie=UTF8&qid=1367524283&sr=8-1&keywords=B00BN5LJUG">{{ trans('content.DulcoEase_27') }}</option>
                <option value="http://www.amazon.com/DulcoEase-Stool-Softener-Softgel-Women/dp/B00BN5LKK0/ref=sr_1_2?ie=UTF8&qid=1363879881&sr=8-2&keywords=dulcoease">{{ trans('content.DulcoEase_28') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'DulcoEase Pink Stool Softener', 'Amazon');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}"></a>
            </div>    
          <div class="clear"></div> 
        </div>  
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_walgreens.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.walgreens.com/store/c/dulcoease-pink-stool-softener-softgels/ID=prod6162050-product">{{ trans('content.DulcoEase_27') }}</option>    
                <option value="http://www.walgreens.com/store/c/dulcoease-pink-stool-softener-softgels/ID=prod6191747-product">{{ trans('content.DulcoEase_28') }}</option>               
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'DulcoEase Pink Stool Softener', 'Walgreens');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>   
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_cvs.png')}}" class="rlogo"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.cvs.com/shop/product-detail/DulcoEase-Pink-Stool-Softener-Softgels?skuId=927369">{{ trans('content.DulcoEase_27') }}</option>
                
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'DulcoEase Pink Stool Softener', 'CVS');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>
        
        <div class="bnm_retailer">
          <div class="retailer_logo"><img src="{{ URL::to('static_resources/images/rlogo_drugstore.png')}}"></div>
            <div class="retailer_desc">
              <select>
                <option value="">{{ trans('content.common_17') }}</option>
                <option value="http://www.drugstore.com/dulcoease-pink-stool-softener-softgels/qxp480182?catid=184260">{{ trans('content.DulcoEase_27') }}</option>
                <option value="http://www.drugstore.com/dulcoease-pink-stool-softener-softgels/qxp480181?catid=184260">{{ trans('content.DulcoEase_28') }}</option>
                </select>
            </div>
            <div class="retailer_buy_now">
              <a href="javascript:void(0)" onClick="trackOutboundLink(this, 'Buy Now', 'DulcoEase Pink Stool Softener', 'Drugstore');  return false;"><img src="{{ URL::to('static_resources/images/mbn_right_buy_now.png')}}" alt="{{ trans('content.common_2') }}" title="{{ trans('content.common_2') }}"></a>
            </div>    
          <div class="clear"></div> 
        </div>   
        
      <div class="clear"></div>   
</div>
</div>
          <h3>{{ trans('content.common_3') }}</h3>
          <div id="drug-facts" class="tab_content">
            <h1>{{ trans('content.common_25') }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p>
            </p>
            <div class="drug-fact-hdr-container">
              <b>{{ trans('content.DulcoEase_29') }}</b>  <br>
              {{ trans('content.DulcoEase_30') }}           
            </div>
            <div class="drug-fact-hdr-container">
              <b>{{ trans('content.common_58') }}</b><br>
               {{ trans('content.DulcoEase_32') }}
            </div>
            <br>
            <br>
            <h4>{{ trans('content.common_16') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_35') }} </span></li>
              <li><span>{{ trans('content.DulcoEase_35') }} </span></li>
            </ul>
            <h4>{{ trans('content.DulcoEase_36') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_30') }} </span></li>
              <li><span>{{ trans('content.common_42') }} </span></li>
            </ul>  
            <p>
              <b>{{ trans('content.DulcoEase_39') }}
            </p>          
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
             {{ trans('content.DulcoEase_45') }}
            </p>
            <p>
            </p>
            <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
            <tbody>
            <tr>
              <td class="dfacts_tdl">
                {{ trans('content.common_29') }}
              </td>
              <td class="dfacts_tdr">
                {{ trans('content.DulcoEase_47') }}
              </td>
            </tr>
            <tr>
              <td class="dfacts_tdl">
                 {{ trans('content.DulcoEase_48') }}
              </td>
              <td class="dfacts_tdr">
                 {{ trans('content.DulcoEase_49') }}
              </td>
            </tr>
            <tr>
              <td class="dfacts_tdl df_bottom">
                 {{ trans('content.common_80') }}
              </td>
              <td class="dfacts_tdr df_bottom">
                 {{ trans('content.common_45') }}
              </td>
            </tr>
            </tbody>
            </table>
            <h4>{{ trans('content.common_20') }}</h4>
            <ul>
               <li><span>{{ trans('content.DulcoEase_53') }}</span></li>
               <li><span>{{ trans('content.DulcoEase_54') }}</span> </li>
            </ul>
          </div>
          <!--FAQs-->
          <h3>{{ trans('content.common_9') }}</h3>
          <div id="faqs" class="tab_content" >
            <h1>{{ trans('content.common_25') }}</h1>
            <div class="faq_container">
              <div class="faq_icon">
                <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
             </div>
              <div class="faq_question">
                <h4>{{ trans('content.DulcoEase_56') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.DulcoEase_57') }}
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
                <h4>{{ trans('content.DulcoEase_58') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.DulcoEase_59') }}

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
                <h4>{{ trans('content.DulcoEase_60') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.DulcoEase_61') }}
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
                <h4>{{ trans('content.DulcoEase_62') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.DulcoEase_63') }}
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
                <h4>{{ trans('content.DulcoEase_64') }}</h4>
                <div class="faq_answer">
                    {{ trans('content.DulcoEase_65') }}
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
                <h4>{{ trans('content.DulcoEase_66') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.DulcoEase_67') }}
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
                <h4>{{ trans('content.DulcoEase_68') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.DulcoEase_69') }}
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
                <h4>{{ trans('content.DulcoEase_70') }}</h4>
                <div class="faq_answer">
                    {{ trans('content.DulcoEase_71') }}
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
                <h4>{{ trans('content.DulcoEase_72') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.DulcoEase_73') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <p>
              {{ trans('content.DulcoEase_74') }}
            </p>
          </div>
          <!--Ratings tab-->
          {{--<h3>{{ trans('content.common_14') }}</h3>
          <div id="ratings" class="tab_content">
            <h1>{{ trans('content.common_25') }}</h1>

            </div>
           
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
