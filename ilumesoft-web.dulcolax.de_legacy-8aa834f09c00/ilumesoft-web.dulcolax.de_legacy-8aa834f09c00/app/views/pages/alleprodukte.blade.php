@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent

@stop

@section('content')

	<div id="wrapper">


		<div class="box_content products">

			<div class="productsComparisonTable">

				<h3>{{ trans('content.all_products_41b') }}</h3>
				<div class="outerBox">
					@include('includes.products-comparison-table')
				</div>
			</div>
		</div>

		<script type="text/javascript">

			//This is a delay for links(Learn more and Buy now) so they have time to fire Tags(DoubleClick) before it loads the next page.
			$('.mod_learnMore, .mod_buyNow, .buttonFlat').on("click", function(e){
				e.preventDefault();

				var alink = $(this).attr("href");
				console.log(alink);

				setTimeout(function() {
					window.location.href = alink;
				}, 500);
			})
		</script>

	</div>

@stop
