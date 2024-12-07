@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent
	

@stop

@section('content')

 <div id="wrapper" class="productDetail clearfix">

      <div class="box_content clearfix">
      <div class="product_desc clearfix">
        <div class="product_header applicators_header">  
         <!--<h3 class="product_subheader">Introducing</h3>  -->      
            <h1 class="product_name">{{ trans('content.dulcoglideapplicators_1') }}</h1>
            <div class="product_recommended">
              <img src="{{ URL::to('static_resources/images/seal_dulcolax_2.png')}}" alt="{{ trans('content.common_11') }}" title="{{ trans('content.common_11') }}" />
            </div> 
            <h3 class="product_subheader">{{ trans('content.common_62') }}</h3>
          </div>
        <div class="product_image  applicators_header">
          <img src="{{URL::to('static_resources/mobile/images/products/dulcolax-laxative-suppositories-dulcoglide.png')}}" alt="{{ trans('content.dulcoglideapplicators_4') }}" title="{{ trans('content.dulcoglideapplicators_4') }}">
        </div>
        <div class="product_details">
          <p> {{ trans('content.dulcoglideapplicators_5') }}</p>
          <ul>
            <li><span>{{ trans('content.dulcoglideapplicators_6') }}</span></li>
            <li><span>{{ trans('content.dulcoglideapplicators_7') }}</span></li>
            <li><span>{{ trans('content.dulcoglideapplicators_8') }}</span></li>
          </ul>
          <p> {{ trans('content.dulcoglideapplicators_9') }} </p>
          <div class="pd_buttons">        
            <a class="learnMore hash_reload" href="#learn-more">{{ trans('content.common_1') }}</a><a href="#buy-now" rel="tab6" class="buy hash_reload" >{{ trans('content.common_2') }}</a>
          </div>
          <span class="pd_links">
              <a href="#drug-facts" class="hash_reload">{{ trans('content.common_3') }}</a>, <a href="#faqs" class="hash_reload">{{ trans('content.common_4') }}</a>
            </span>
            <br><br><br>
      <p class="seeVideo">{{ trans('content.dulcoglideapplicators_14') }}</p>
       <div class="pd_buttons seeVideo-img">    
                <a href="#video" class="hash_reload"  ><img src="{{ URL::to('static_resources/images/btn_see_video_pd.png')}}" alt="{{ trans('content.dulcoglideapplicators_15') }}" title="{{ trans('content.dulcoglideapplicators_15') }}" ></a>
            </div>  
        </div>
      </div>
    
      {{-- tabs --}}

      <div id="tabs-detail" name="tab-area" class="clearfix">
        <ul class="tabs_menu clearfix">
          <li class="tab_item" name="learn-more" id="tab-learn-more"><a href="#learn-more" class="tab_active">{{ trans('content.common_1') }}</a></li>
          <li class="tab_item" name="buy-now" id="tab-buy-now"><a href="#buy-now">{{ trans('content.common_2') }}</a></li>
          <li class="tab_item" name="drug-facts" id="tab-drug-facts"><a href="#drug-facts">{{ trans('content.common_3') }}</a></li>
          <li class="tab_item" name="faqs" id="tab-faqs"><a href="#faqs">{{ trans('content.common_4') }}</a></li>
          <li class="tab_item" name="video" id="tab-video"><a href="#video">{{ trans('content.common_27') }}</a></li>
        </ul>
        <div class="tabs_content clearfix">
          <h3>{{ trans('content.common_1') }}</h3>
          <div id="learn-more" class="tab_content clearfix">
            <h1>{{ trans('content.common_22') }}</h1>
            <h2>{{ trans('content.common_62') }}</h2>
            <p>
               {{ trans('content.dulcoglideapplicators_25') }}
            </p>
            <p></p>
            <ul>
              <li><span>{{ trans('content.dulcoglideapplicators_26') }}</span> </li>
              <li><span>{{ trans('content.dulcoglideapplicators_27') }}</span></li>
              <li><span>{{ trans('content.dulcoglideapplicators_28') }}</span></li>
            </ul>
            <p>
              {{ trans('content.dulcoglideapplicators_29') }}
            </p>
            <p></p>
            <ul>
              <li><span>{{ trans('content.dulcoglideapplicators_30') }}</span></li>
              <li><span>{{ trans('content.common_70') }}</span> </li>
              <li><span>{{ trans('content.common_56') }}</li>
              <li><span>{{ trans('content.common_73') }}</li>
              <li><span>{{ trans('content.dulcoglideapplicators_34') }}</li>
            </ul>
          </div>

          <h3 id="buyNow-title">{{ trans('content.common_1') }}</h3>
          <div id="buy-now" class="tab_content clearfix">
        <h1>{{ trans('content.common_22') }}</h1>

          <p>{{ trans('content.dulcoglideapplicators_37') }}</p>
           </div>
          <h3>{{ trans('content.common_3') }}</h3>
          <div id="drug-facts" class="tab_content clearfix">
            <h1>{{ trans('content.common_22') }}</h1>
            <h4 class="section-hdr">{{ trans('content.common_3') }}</h4>
            <p></p>
            <div class="drug-fact-hdr-container">
              {{ trans('content.dulcoglideapplicators_41') }}        
            </div>
            <div class="drug-fact-hdr-container">
              {{ trans('content.dulcoglideapplicators_42') }}
            </div>
            <br><br>
            <h4>{{ trans('content.common_16') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_35') }} </span></li>
              <li><span>{{ trans('content.dulcoglideapplicators_45') }}  </span></li>
            </ul>
            <h4>{{ trans('content.common_24') }}<br>
            {{ trans('content.dulcoglideapplicators_47') }}</h4>           
            <h4>{{ trans('content.common_60') }}</h4>
            <ul>
              <li><span>{{ trans('content.common_30') }} </span></li>
              <li><span>{{ trans('content.common_42') }} </span></li>
            </ul>
             <p>
              {{ trans('content.dulcoglideapplicators_51') }}
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
              <b>{{ trans('content.common_53') }}</b>
            </p>
            <p></p>
            <table class="dfacts" cellspacing="0" cellpadding="0" border="1">
            <tbody>
            <tr>
              <td class="dfacts_tdl">
                {{ trans('content.common_29') }}
              </td>
              <td class="dfacts_tdr">
                {{ trans('content.dulcoglideapplicators_59') }}
              </td>
            </tr>
            <tr>
              <td class="dfacts_tdl">
                {{ trans('content.common_61') }} 
              </td>
              <td rowspan="2" class="dfacts_tdr">
                 {{ trans('content.dulcoglideapplicators_61') }}
              </td>
            </tr>
            <tr>
              <td class="dfacts_tdl df_bottom">
              	{{ trans('content.common_80') }} 
              	</td>
              </tr>
            </tbody>
            </table>
          </div>
          <!--FAQs-->
          <h3>{{ trans('content.common_9') }}</h3>
          <div id="faqs" class="tab_content clearfix" >
            <h1>{{ trans('content.common_22') }}</h1>
            <div class="faq_container">
              <div class="faq_icon">
                 <img src="{{ URL::to('static_resources/images/faq_plus.png')}}">
              </div>
              <div class="faq_question">
                <h4>{{ trans('content.dulcoglideapplicators_65') }}</h4>
                <div class="faq_answer">
                    {{ trans('content.dulcoglideapplicators_66') }} 
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
                <h4>{{ trans('content.dulcoglideapplicators_67') }}</h4>
                <div class="faq_answer">
                   {{ trans('content.dulcoglideapplicators_68') }}
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
                <h4>{{ trans('content.dulcoglideapplicators_69') }}</h4>
                <div class="faq_answer">
                   {{ trans('content.dulcoglideapplicators_70') }}  
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
                <h4>{{ trans('content.dulcoglideapplicators_71') }} </h4>
                <div class="faq_answer">
                   {{ trans('content.dulcoglideapplicators_72') }} 
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
                <h4>{{ trans('content.dulcoglideapplicators_73') }}  </h4>
                <div class="faq_answer">
                  {{ trans('content.dulcoglideapplicators_74') }}
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
                <h4>
                 {{ trans('content.dulcoglideapplicators_75') }}  
                </h4>
                <div class="faq_answer">                  
                  {{ trans('content.dulcoglideapplicators_76') }} 
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
                 <h4>{{ trans('content.dulcoglideapplicators_77') }}</h4>
                <div class="faq_answer">
                 {{ trans('content.dulcoglideapplicators_78') }}
                </div>
              </div>
              <div class="clear">
              </div>
            </div>
            <p>
              {{ trans('content.dulcoglideapplicators_79') }}
            </p>
          </div>          
            
          {{--Video tab--}}
          <h3>{{ trans('content.common_27') }}</h3>
          <div id="video" class="tab_content clearfix">
            <h1>{{ trans('content.dulcoglideapplicators_81') }}</h1>
            <video id="dulcolaxVideo" width="640" height="480" controls preload="none" poster="{{ URL::to('static_resources/images/mobile/product_dulcoglide_suppositories_lg_video.png')}}">
            {{-- <source src="{{ URL::to('static_resources/video/Dulcolax_Supp_Inst_Video_01.mp4')}}" type="video/mp4" /> --}}
            <source src="{{ URL::to('http://www.dulcolax.com/static_resources/video/Dulcolax_Supp_Inst_Video_01.mp4')}}" type="video/mp4" />
            <source src="{{ URL::to('static_resources/video/Dulcolax_Supp_Inst_Video_01.webm')}}" type="video/webm" />
            <source src="{{ URL::to('static_resources/video/Dulcolax_Supp_Inst_Video_01.ogv')}}" type="video/ogg" />

            <object width="538" height="300" type="application/x-shockwave-flash" data="{{ URL::to('static_resources/video/player.swf')}}">
                  <!-- Firefox uses the `data` attribute above, IE/Safari uses the param below -->
                  <param name="movie" value="{{ URL::to('static_resources/video/player.swf')}}" />
                  <param name="allowFullScreen" value="true" />
                  <param name="flashvars" value="file=Dulcolax_Supp_Inst_Video_01.mp4" />
                </object>
            </video>
          </div>
          {{--Ratings tab--}}
          {{--<h3>Reviews</h3>
          <div id="ratings" class="tab_content clearfix">
            <h1>{{ trans('content.common_22') }}</h1>

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
