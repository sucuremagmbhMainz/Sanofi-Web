@extends('layouts.mobilemaster')

@section('styles')
    @parent

@stop

@section('scripts')
    @parent

@stop

@section('content')
    <div id="wrapper">
        <div class="box_content products mobile-hide tablet-hide">

            <div class="productsComparisonTable">

                <h3 class="title">{{ trans('content.all_products_41b') }}</h3><br>
				{{--<div class="outerBox">--}}
                    @include('includes.products-comparison-table')
				{{--</div>--}}
            </div>
        </div>
    </div>

    <div id="wrapper">
        <div class="box_content productsComparison desktop-hide">
            <h1>{{ trans('content.all_products_41b') }}</h1>
            <div class="table_comparison mobile tablet">
			
				<article>
                    <h2>{{ trans('content.header_82') }}</h2>
                    <div class="pc_info">
						<div class="img-wrapper">
							<a href="dulcolax-zaepfchen.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}"></a>
						</div>
                        <ul>                           
                            <li><b>{{ trans('content.products_comparison_table_40') }}:</b> {{ trans('content.pct_dragees_1') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_2') }}:</b> {{ trans('content.pct_dragees_2') }}</li>
							{{--<li><b>{{ trans('content.products_comparison_table_3') }}:</b> {{ trans('content.pct_dragees_3') }}</li>--}}
                            <li><b>{{ trans('content.products_comparison_table_44') }}:</b> {{ trans('content.pct_zapfchen_2') }}</li>
							<li><b>{{ trans('content.products_comparison_table_5') }}:</b> {{ trans('content.pct_zapfchen_4') }} {{ trans('content.pct_dragees_6a') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_4') }}:</b> {{ trans('content.pct_zapfchen_3') }}</li>                            
                            <li><b>{{ trans('content.products_comparison_table_6') }}:</b> {{ trans('content.pct_zapfchen_5') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_8') }}:</b> {{ trans('content.pct_zapfchen_6') }}</li>
                            <li>{{ trans('content.pct_mbalance_pul_6') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_9') }}:</b><br>{{ trans('content.pct_dragees_10') }}</li>
                        </ul>
                    </div>
                </article>
                
				<article>
                    <h2>{{ trans('content.header_78') }}</h2>
                    <div class="pc_info">
                        <div class="img-wrapper">
                            <a href="dulcolax-dragees.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}"></a>
                        </div>
                        <ul>
                            <li><b>{{ trans('content.products_comparison_table_40') }}:</b> {{ trans('content.pct_dragees_1') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_2') }}:</b> {{ trans('content.pct_dragees_2') }}</li>
							{{--<li><b>{{ trans('content.products_comparison_table_3') }}:</b> {{ trans('content.pct_dragees_3') }}</li>--}}
                            <li><b>{{ trans('content.products_comparison_table_44') }}:</b> {{ trans('content.pct_dragees_4') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_5') }}:</b> {{ trans('content.pct_dragees_6') }} {{ trans('content.pct_dragees_6a') }}</li>
							<li><b>{{ trans('content.products_comparison_table_4') }}:</b> {{ trans('content.pct_dragees_5') }}</li>                            
                            <li><b>{{ trans('content.products_comparison_table_6') }}:</b> {{ trans('content.pct_dragees_7') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_8') }}:</b> {{ trans('content.pct_dragees_8') }}</li>
                            <li>{{ trans('content.pct_dragees_9') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_9') }}:</b><br>{{ trans('content.pct_dragees_10') }}</li>
                        </ul>
                    </div>
                </article>
				
                <article>
                    <h2>{{ trans('content.header_214') }}</h2>
                    <div class="pc_info">
                        <div class="img-wrapper">
                            <a href="dulcolax-np-tropfen.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}"></a>
                        </div>
                        <ul>
                            <li><b>{{ trans('content.products_comparison_table_40') }}:</b> {{ trans('content.pct_nptropfen_1') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_2') }}:</b> {{ trans('content.pct_dragees_2') }}</li>
								{{--<li><b>{{ trans('content.products_comparison_table_3') }}:</b> {{ trans('content.pct_dragees_3') }}</li>--}}
                            <li><b>{{ trans('content.products_comparison_table_44') }}:</b> {{ trans('content.pct_nptropfen_2') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_5') }}:</b> {{ trans('content.pct_nptropfen_4') }}</li>
							<li><b>{{ trans('content.products_comparison_table_4') }}:</b> {{ trans('content.pct_nptropfen_3') }}</li>                            
                            <li><b>{{ trans('content.products_comparison_table_6') }}:</b> {{ trans('content.pct_nptropfen_5') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_8') }}:</b> {{ trans('content.pct_nptropfen_6') }}</li>
                            <li>{{ trans('content.pct_dragees_9') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_9') }}:</b><br>{{ trans('content.pct_dragees_10') }}</li>
                        </ul>
                    </div>
                </article>

                <article>
                    <h2 class="bg-pink">{{ trans('content.header_206') }}</h2>
                    <div class="pc_info">
                        <div class="img-wrapper">
                            <a href="dulcolax-np-perlen.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.png')}}"></a>
                        </div>
                        <ul>
                            <li><b>{{ trans('content.products_comparison_table_40') }}:</b> {{ trans('content.pct_nptropfen_1') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_2') }}:</b> {{ trans('content.pct_dragees_2') }}</li>
								{{--<li><b>{{ trans('content.products_comparison_table_3') }}:</b> {{ trans('content.pct_dragees_3') }}</li>--}}
                            <li><b>{{ trans('content.products_comparison_table_44') }}:</b> {{ trans('content.pct_nptropfen_2') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_5') }}:</b> {{ trans('content.pct_nptropfen_4') }}</li>
							<li><b>{{ trans('content.products_comparison_table_4') }}:</b> {{ trans('content.pct_npperlen_2') }}</li>                            
                            <li><b>{{ trans('content.products_comparison_table_6') }}:</b> {{ trans('content.pct_npperlen_3') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_8') }}:</b> {{ trans('content.pct_nptropfen_6') }}</li>
                            <li>{{ trans('content.pct_dragees_9') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_9') }}:</b><br>{{ trans('content.pct_dragees_10') }}</li>
                        </ul>
                    </div>
                </article>
              
                <article>
                    <h2 class="bg-blue">{{ trans('content.header_81') }}</h2>
                    <div class="pc_info">
                        <div class="img-wrapper">
                            <a href="dulcosoft-pulver.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot.png')}}"></a>
                        </div>
                        <ul>
                            <li><b>{{ trans('content.products_comparison_table_40') }}:</b> {{ trans('content.pct_mbalance_pul_1') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_2') }}:</b> {{ trans('content.pct_dulcosoft_1') }}</li>
							{{--<li><b>{{ trans('content.products_comparison_table_3') }}:</b> {{ trans('content.pct_dragees_3') }}</li>--}}
                            <li><b>{{ trans('content.products_comparison_table_44') }}:</b> {{ trans('content.pct_mbalance_pul_2') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_5') }}:</b> {{ trans('content.pct_mbalance_pul_4') }}</li>
							<li><b>{{ trans('content.products_comparison_table_4') }}:</b> {{ trans('content.pct_mbalance_pul_3') }}</li>                           
                            <li><b>{{ trans('content.products_comparison_table_6') }}:</b> {{ trans('content.pct_mbalance_pul_7') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_8') }}:</b> {{ trans('content.pct_mbalance_pul_5') }}</li>
                            <li>{{ trans('content.pct_mbalance_pul_8') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_9') }}:</b><br>{{ trans('content.pct_dragees_10') }}</li>
                        </ul>
                    </div>
                </article>
				
                <article>
                    <h2 class="bg-blue">{{ trans('content.header_80') }}</h2>
                    <div class="pc_info">
                        <div class="img-wrapper">
                            <a href="dulcosoft-loesung.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot.png')}}"></a>
                        </div>
                        <ul>
                            <li><b>{{ trans('content.products_comparison_table_40') }}:</b> {{ trans('content.pct_mbalance_pul_1') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_2') }}:</b> {{ trans('content.pct_dulcosoft_1') }}</li>
							{{--<li><b>{{ trans('content.products_comparison_table_3') }}:</b> {{ trans('content.pct_dragees_3') }}</li>--}}
                            <li><b>{{ trans('content.products_comparison_table_44') }}:</b> {{ trans('content.pct_mbalance_pul_2') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_5') }}:</b> {{ trans('content.pct_mbalance_flu_3') }} {{ trans('content.pct_dragees_6a') }}</li>
							<li><b>{{ trans('content.products_comparison_table_4') }}:</b> {{ trans('content.pct_mbalance_flu_2') }}</li>                            
                            <li><b>{{ trans('content.products_comparison_table_6') }}:</b> {{ trans('content.pct_mbalance_flu_7') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_8') }}:</b> {{ trans('content.pct_mbalance_pul_5') }}</li>
                            <li>{{ trans('content.pct_mbalance_pul_8') }}</li>
                            <li><b>{{ trans('content.products_comparison_table_9') }}:</b><br>{{ trans('content.pct_dragees_10') }}</li>
                        </ul>
                    </div>
                </article>
                <p class="references">{{ trans('content.pct_references') }}</p>
            </div>
        </div>

        <script type="text/javascript">

            //This is a delay for links(Learn more and Buy now) so they have time to fire Tags(DoubleClick) before it loads the next page.
            $('.mod_learnMore, .mod_buyNow, .buttonFlat').on("click", function (e) {
                e.preventDefault();

                var alink = $(this).attr("href");
                console.log(alink);

                setTimeout(function () {
                    window.location.href = alink;
                }, 500);
            })
        </script>
    </div>
@stop
