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
        <div class="product_header dulcogas_header">          
            <h1 class="product_name">{{ trans('content.common_6') }}</h1>
            <div class="product_recommended" style="margin: 30px 0 0 -20px;">
                <img src="{{ URL::to('static_resources/images/seal_dulcolax.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}">
            </div>
            <h3 class="product_subheader">{{ trans('content.dulcogasgasrelief_3') }}
            </h3>
          </div>
        <div class="product_image dulcogas">
          <img src="{{URL::to('static_resources/mobile/images/products/dulcogas-gas-relief-tablets.png')}}" alt="{{ trans('content.common_52') }}" title="{{ trans('content.common_52') }}">
        </div>
        <div class="product_details">
          <ul>
            <li><span>{{ trans('content.dulcogasgasrelief_5') }}</span></li>
            <li><span>{{ trans('content.dulcogasgasrelief_6') }}</span></li>
            <li><span>{{ trans('content.dulcogasgasrelief_7') }}</span></li>
          </ul>
          <div class="pd_buttons">          
              <a class="learnMore hash_reload" href="#learn-more" >{{ trans('content.common_1') }}</a><a href="#buy-now" rel="tab7" class="buy hash_reload" >{{ trans('content.common_2') }}</a>
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
          <h3>{{ trans('content.dulcogasgasrelief_17') }}</h3>
          <div id="learn-more" class="tab_content">
            <h1>{{ trans('content.common_6') }}</h1>
            <h2>{{ trans('content.dulcogasgasrelief_19') }}</h2>
            <p>{{ trans('content.dulcogasgasrelief_20') }}</p>
            <p>
            </p>
            <ul>
              <li><span>{{ trans('content.dulcogasgasrelief_21') }}</span> </li>
              <li><span>{{ trans('content.dulcogasgasrelief_22') }} </span></li>
              <li><span>{{ trans('content.dulcogasgasrelief_23') }} </span></li>
              <li><span>{{ trans('content.dulcogasgasrelief_24') }}</span></li>
            </ul>
            <p>
              {{ trans('content.dulcogasgasrelief_25') }}'
            </p>
            <p>
            </p>
            <ul>
              <li><span>{{ trans('content.dulcogasgasrelief_26') }} </span></li>
              <li><span>{{ trans('content.dulcogasgasrelief_27') }}</li>
            </ul>
          </div>

          <h3 id="buyNow-title">{{ trans('content.common_1') }}</h3>
            <div id="buy-now" class="tab_content">
							<h1>{{ trans('content.common_6') }}</h1>
							<p>{{ trans('content.dulcogasgasrelief_30') }}</p>
							<h4>{{ trans('content.common_77') }}</h4>    
						</div> 


          <h3>{{ trans('content.common_3') }}</h3>
          <div id="drug-facts" class="tab_content">
            <h1>{{ trans('content.dulcogasgasrelief_33') }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p>
            </p>
            <div class="drug-fact-hdr-container">
              {{ trans('content.dulcogasgasrelief_35') }}'           
            </div>
            <div class="drug-fact-hdr-container">
              {{ trans('content.common_83') }}'
            </div>
            <br>
            <br>
            <h4>{{ trans('content.common_16') }}</h4>
            <ul>
              <li><span>{{ trans('content.dulcogasgasrelief_38') }}</span></li>              
            </ul>
            <h4>{{ trans('content.common_24') }}</h4>
            <ul>
            <li><span>{{ trans('content.common_15') }}</span></li>
            <li><span>{{ trans('content.dulcogasgasrelief_41') }}</span></li> 
            </ul>         
            <p>
              <b>{{ trans('content.common_53') }}</b> 
            </p>
            <p>
            </p>
            <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
            <tbody>
            <tr>
            	<td class="dfacts_tdl dulcogas">
            		    {{ trans('content.dulcogasgasrelief_43') }}' 
              </td>
            	<td class="dfacts_tdr">
            		<ul>
							<li><span>{{ trans('content.dulcogasgasrelief_44') }}</span></li>
							<li><span>{{ trans('content.common_81') }}</span></li>
			      </ul>
   			  </td>
           	  </tr>
            </tbody>
            </table>
            <h4>{{ trans('content.common_20') }}</h4>
            <ul>
              <li><span><b>{{ trans('content.common_79') }}</b></span></li>
              
            </ul>
            <p>
          
            </p>
            <h1>{{ trans('content.dulcogasgasrelief_48') }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p>
            </p>
            <div class="drug-fact-hdr-container">
              {{ trans('content.dulcogasgasrelief_50') }}'           
            </div>
            <div class="drug-fact-hdr-container">
              {{ trans('content.common_83') }}'
            </div>
            <h4>{{ trans('content.common_16') }}</h4>
            <ul>
              <li><span>{{ trans('content.dulcogasgasrelief_53') }}</span></li>              
            </ul>
            <h4>{{ trans('content.common_24') }}</h4>
            <ul>
            <li><span>{{ trans('content.common_15') }}</span></li>
            <li><span>{{ trans('content.dulcogasgasrelief_56') }}</span></li> 
            </ul>         
            <p>
              <b>{{ trans('content.common_53') }}</b> 
            </p>
            <p>
            </p>
            <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
            <tbody>
            <tr>
              <td class="dfacts_tdl dulcogas">
                    {{ trans('content.dulcogasgasrelief_58') }}' 
              </td>
              <td class="dfacts_tdr">
                <ul>
              <li><span>{{ trans('content.dulcogasgasrelief_59') }}</span></li>
              <li><span>{{ trans('content.common_81') }}</span></li>
               </ul>
              </td>
              </tr>
            </tbody>
            </table>
            <h4>{{ trans('content.common_20') }}</h4>
             <ul>
              <li><span><b>{{ trans('content.common_79') }}</b></span></li>
              
            </ul>
         
            <p>
            <h1>{{ trans('content.dulcogasgasrelief_63') }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p>
            </p>
            <div class="drug-fact-hdr-container">
              {{ trans('content.dulcogasgasrelief_65') }}'          
            </div>
            <div class="drug-fact-hdr-container">
              {{ trans('content.common_83') }}'
            </div>
            <h4>{{ trans('content.common_16') }}</h4>
            <ul>
              <li><span>{{ trans('content.dulcogasgasrelief_68') }}</span></li>              
            </ul>
            <h4>{{ trans('content.common_24') }}</h4>
            <ul>
            <li><span>{{ trans('content.common_15') }}</span></li>
            <li><span>{{ trans('content.dulcogasgasrelief_71') }}</span></li> 
            </ul>         
            <p>
              <b>{{ trans('content.common_53') }}</b> 
            </p>
            <p>
            </p>
            <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
            <tbody>
            <tr>
              <td class="dfacts_tdl dulcogas">
                    {{ trans('content.dulcogasgasrelief_73') }}' 
              </td>
              <td class="dfacts_tdr">
                <ul>
              <li><span>{{ trans('content.dulcogasgasrelief_74') }}</span></li>
              <li><span>{{ trans('content.common_81') }}</span></li>
               </ul>
              </td>
              </tr>
            </tbody>
            </table>
            <h4>{{ trans('content.common_20') }}</h4>
             <ul>
              <li><span><b>{{ trans('content.common_79') }}</b></span></li>
              
            </ul>
            
            </p>            
          </div>
          <!--FAQs-->
          <h3>{{ trans('content.common_9') }}</h3>
          <div id="faqs" class="tab_content" >
            <h1>{{ trans('content.common_6') }}</h1>
            <div class="faq_container">
              <div class="faq_icon">
               <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
             </div>
              <div class="faq_question">
                <h4>{{ trans('content.dulcogasgasrelief_80') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_81') }}
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
                <h4>{{ trans('content.dulcogasgasrelief_82') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_83') }}
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
                <h4>{{ trans('content.dulcogasgasrelief_84') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_85') }}
                  <ul>
                    <li><span>{{ trans('content.dulcogasgasrelief_86') }}</span></li>
                    <li><span>{{ trans('content.dulcogasgasrelief_87') }}</span></li>
                    <li><span>{{ trans('content.dulcogasgasrelief_88') }}</span></li>
                    <li><span>{{ trans('content.dulcogasgasrelief_89') }}</span></li>
                  </ul>
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
                <h4>{{ trans('content.dulcogasgasrelief_90') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_91') }}'
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
                <h4>{{ trans('content.dulcogasgasrelief_92') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_93') }}'
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
                <h4>{{ trans('content.dulcogasgasrelief_94') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_95') }}
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
                <h4>{{ trans('content.dulcogasgasrelief_96') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_97') }}
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
                <h4>{{ trans('content.dulcogasgasrelief_98') }}</h4>
                <div class="faq_answer">
                  {{ trans('content.dulcogasgasrelief_99') }}<br>
                  {{ trans('content.dulcogasgasrelief_100') }}<br>
                  {{ trans('content.dulcogasgasrelief_101') }}<br>
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <p>
              {{ trans('content.dulcogasgasrelief_102') }}
            </p>
          </div>
          <!--Ratings tab-->
          {{--<h3>{{ trans('content.common_14') }}</h3>
          <div id="ratings" class="tab_content">
            <h1>{{ trans('content.common_6') }}</h1>

            
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
