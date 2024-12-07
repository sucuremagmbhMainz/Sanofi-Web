<div class="box_content products">
  <h2 class=" all-display">{{ trans('content.all_products_2b') }}</h2>
  {{--<img class="packshot" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Sortiment.png')}}" alt="" title="">--}}
  {{--<h3>{{ trans('content.all_products_3') }}</h3>--}}
  <p>{{ trans('content.all_products_4') }}</p>
  <a class="comparison_chart" href="{{action('PageController@constipationandgasreliefcomparison')}}">{{ trans('content.all_products_7') }}</a>
  {{--<hr>--}}

  <section class="products_grid">

    <article class="mod">
      <div>
        <div class="mod_product_img img5">
          <a href="{{action('PageController@dragees')}}"><img class="first" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}" alt="{{ trans('content.header_78a') }}" title="{{ trans('content.header_78a') }}"></a>
        </div>
        <div class="mod_product_info">
          <h3>{{ trans('content.header_78') }} <span>{{ trans('content.header_230a') }}</span></h3>
          <div class="mod_links">
            <a href="{{action('PageController@dragees')}}#produktdetails"  class="mod_learnMore">{{ trans('content.common_0001') }}</a>
            @if (false)
            <a href="{{action('PageController@onlineshops')}}"   class="mod_buyNow">{{ trans('content.common_2') }}</a>
            @endif
          </div>
        </div>
      </div>
    </article>

    <article class="mod">
      <div>
        <div class="mod_product_img img5 tropfen">
          <a href="{{action('PageController@nptropfen')}}"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}" alt="{{ trans('content.header_214a') }}" title="{{ trans('content.header_214a') }}"></a>
        </div>
        <div class="mod_product_info">
          <h3>{{ trans('content.header_214') }}
            <span>{{ trans('content.header_230a') }}</span>
          </h3>
          <div class="mod_links">
            <a href="{{action('PageController@nptropfen')}}#produktdetails"  class="mod_learnMore">{{ trans('content.common_0002') }}</a>
            @if (false)
            <a href="{{action('PageController@onlineshops')}}"   class="mod_buyNow">{{ trans('content.common_2') }}</a>
            @endif
          </div>
        </div>
      </div>
    </article>

    {{--<article class="mod">
      <div>
        <div class="mod_product_img img5">
          <a href="{{action('PageController@kinder')}}"><img class="first" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Kinder_Tropfen_Packshot.png')}}" alt="{{ trans('content.header_78b') }}" title="{{ trans('content.header_78b') }}"></a>
        </div>
        <div class="mod_product_info">
          <h3>Dulcolax<sup>&reg;</sup> NP Kinder Tropfen
            <span>{{ trans('content.header_230a') }}</span>
          </h3>
          <div class="mod_links first">
            <a href="{{action('PageController@kinder')}}#produktdetails"  class="mod_learnMore">{{ trans('content.common_0001') }}</a>
            @if (false)
              <a href="{{action('PageController@onlineshops')}}"   class="mod_buyNow">{{ trans('content.common_2') }}</a>
            @endif
          </div>
        </div>
      </div>
    </article>--}}

    <article class="mod">
      <div>
        <div class="mod_product_img img5">
          <a href="{{action('PageController@zapfchen')}}"><img class="third" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}" alt="{{ trans('content.header_82a') }}" title="{{ trans('content.header_82a') }}"></a>
        </div>
        <div class="mod_product_info">
          <h3>{{ trans('content.header_82') }} <span>{{ trans('content.header_225b') }}</span></h3>
          <div class="mod_links">
            <a href="{{action('PageController@zapfchen')}}#produktdetails"   class="mod_learnMore">{{ trans('content.common_0003') }}</a>
            @if (false)
            <a href="{{action('PageController@onlineshops')}}"   class="mod_buyNow">{{ trans('content.common_2') }}</a>
            @endif
          </div>
        </div>
      </div>
    </article>
	
	<article class="mod">
      <div>
        <div class="mod_product_img img5">
          <a href="{{action('PageController@npperlen')}}" class="pink"><img class="third" src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.png')}}" alt="{{ trans('content.header_206a') }}" title="{{ trans('content.header_206a') }}"></a>
        </div>
        <div class="mod_product_info">
          <h3 class="pink">{{ trans('content.header_206') }} <span>{{ trans('content.header_207') }}</span></h3>
          <div class="mod_links">
            <a href="{{action('PageController@npperlen')}}#produktdetails"   class="mod_learnMore bg-pink">{{ trans('content.common_0003') }}</a>
            @if (false)
            <a href="{{action('PageController@onlineshops')}}"   class="mod_buyNow">{{ trans('content.common_2') }}</a>
            @endif
          </div>
        </div>
      </div>
    </article>

    <article class="mod">
      <div>
        <div class="mod_product_img img5 balance">
          <a href="{{action('PageController@dulcosoftloesung')}}" class="blue"><img class="fourth" src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot_2.png')}}" alt="{{ trans('content.header_80a') }}" title="{{ trans('content.header_80a') }}"></a>
        </div>
        <div class="mod_product_info">
          <h3 class="blue">
			{{ trans('content.header_80') }}
			<span>{{ trans('content.header_251') }}</span>
		  </h3>
          <div class="mod_links">
            <a href="{{action('PageController@dulcosoftloesung')}}#produktdetails"  class="mod_learnMore bg-blue">{{ trans('content.common_0004') }}</a>
            @if (false)
            <a href="{{action('PageController@onlineshops')}}"  class="mod_buyNow">{{ trans('content.common_2') }}</a>
            @endif
          </div>
        </div>
      </div>
    </article>
	
	<article class="mod">
      <div>
        <div class="mod_product_img img5 balance">
          <a href="{{action('PageController@dulcosoftpulver')}}" class="blue"><img class="fourth" src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot_2.png')}}" alt="{{ trans('content.header_81a') }}" title="{{ trans('content.header_81a') }}"></a>
        </div>
        <div class="mod_product_info">
          <h3 class="blue">
			{{ trans('content.header_81') }}
			<span>{{ trans('content.header_251') }}</span>
		  </h3>
          <div class="mod_links">
            <a href="{{action('PageController@dulcosoftpulver')}}#produktdetails"  class="mod_learnMore bg-blue">{{ trans('content.common_0004') }}</a>
            @if (false)
            <a href="{{action('PageController@onlineshops')}}"  class="mod_buyNow">{{ trans('content.common_2') }}</a>
            @endif
          </div>
        </div>
      </div>
    </article>


  </section>
  {{--<div class="productsComparisonTable">--}}
      {{--<hr>--}}
    {{--<a name="compare_all_products"></a>--}}
      {{--<h3>{{ trans('content.all_products_41') }}</h3>--}}
      {{--<div class="outerBox">--}}
        {{--@include('includes.products-comparison-table')--}}
      {{--</div>--}}
  {{--</div>--}}
</div>

<script type="text/javascript">

	//This is a delay for links(Learn more and Buy now) so they have time to fire Tags(DoubleClick) before it loads the next page.
	$('.mod_learnMore, .mod_buyNow, .buttonFlat').on("click", function(e){
		//e.preventDefault();

		var alink = $(this).attr("href");
		console.log(alink);

        setTimeout(function() {
            window.location.href = alink;
        }, 500);
	})
</script>
