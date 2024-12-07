@extends('layouts.mobilemaster')

@section('styles')
	@parent
@stop

@section('scripts')
	@parent
	
	{{HTML::script("/static_resources/js/pharmacy-vendors.js")}}
	<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDD75AGkRMX-lkOt_uOQ6EEok3oy1NXLOc&libraries=places"></script>

	{{HTML::script("/static_resources/js/pharmacyfinder.js")}}
	
      <script src="https://js.adsrvr.org/up_loader.1.1.0.js" type="text/javascript"></script>
        
	<!--<script type="text/javascript">
		window.kias = window.kias || [];
		window.kias.push({ cmd: 'setPageSlots', slots: {
			selector5aabc4ae5194980015076166:'kairionSelector5aabc4ae5194980015076166'
		}});
		window.kias.push({ cmd: 'getSelector', id:'5aabc4ae5194980015076166'});
	</script>
	<script src="https://external-media.kairion.de/client/stable/sanofi.min.js"></script>	
	<script src='//grmtech.net/r/de92f54963fc39a9d87c2253186808ea61.js' async defer></script>-->

	
@stop

@section('content')

{{HTML::style("/static_resources/css/pharmacyfinder.css")}}

<!--[if lte IE 9]>
{{HTML::style('/static_resources/mobile/css/ie9.css')}}
<![endif]-->

<div id="wrapper" class="section-pharmacy-finder">
    <div class="box_content faq mobile_version row">
        <div class="inner_page_content page_right_single_column desktop-item mobile_content content-pharmacy-finder col-sm-12">
			
			<h1 class="kaufen_title">Dulcolax<sup>®</sup> jetzt kaufen!</h1>         

			<img style="margin: -15px 0;" class="img-responsive" src="{{ URL::to('static_resources/mobile/images/buynow/Dulcolax_Produkt2.png')}}" alt="{{ trans('content.common_23') }}" title="{{ trans('content.common_23') }}">
			
			<div id="apotheken-in-der-naehe" class="kaufen_section">
				<h2 class="kaufen_title">Dulcolax<sup>®</sup> in der Apotheke kaufen</h2>
				<p>Dulcolax<sup>®</sup> können Sie in jeder Apotheke kaufen. Wir zeigen Ihnen den Weg zur nächsten Apotheke.</p><br />
				<div class="app-pharmacyfinder">
					<div id="searchform" class="block">
						<form class="form-horizontal" action="{{action('PageController@pharmacyfinder')}}" method="get">
							<label class="sr-only" for="searchterm">Adresse, Ort oder Postleitzahl:</label>
							<span class="input-group input-group-lg">
								<input type="text" class="form-control" name="searchterm" id="searchterm" placeholder="Ort oder PLZ">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default">&nbsp;&nbsp;<i class="fa fa-search"></i>&nbsp;&nbsp;</button>
								</span>
							</span>
						</form>
					</div>
				</div>
			</div>
			
			<div id="online-kaufen" class="kaufen_section">
				<h2 class="kaufen_title">Dulcolax<sup>®</sup> online kaufen</h2>						
				<p>Dulcolax<sup>®</sup> können Sie in einer Online-Apotheke Ihrer Wahl bestellen.*</p>
				<br />				
				<!--<div id="kairionSelector5aabc4ae5194980015076166"></div>-->				
				<div class="kairion-shop-now">
					<div class="kairion-shop-now-logo">
						<a href="https://www.vitalsana.com/catalogsearch/result/?q=dulcolax" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/vitalsana.png')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://www.apodiscounter.de/advanced_search_result.php?keywords=dulcolax&fbrand=152&filter_is_open=true" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/apodiscounter.png')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://www.sanicare.de/search?p=1&q=dulcolax&o=7&n=12&s=16232" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/sanicare.png')}}">
						</a>
					</div>
					<!--
					<div class="kairion-shop-now-logo">
						<a href="https://www.docmorris.de/search?query=dulcolax&t=2aa021a1-8f49-4bb1-b7de-6f4505b22aea" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/docmorris.png')}}">
						</a>
					</div>
					-->
					<div class="kairion-shop-now-logo">
						<a href="https://shop.apotal.de/keywordsearch/?SEARCH_STRING_CONTENT=dulcolax+sanofi" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/apotal.jpg')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://www.shop-apotheke.com/search.htm?i=1&query=dulcolax" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/shop-apotheke.jpg')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://www.medikamente-per-klick.de/keywordsearch/searchitem=dulcolax%20sanofi" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/medikamente-per-klick.png')}}">
						</a>
					</div>
					<!--
					<div class="kairion-shop-now-logo">
						<a href="https://volksversand.de/search?sSearch=Dulcolax&k_cmp=kairion_selector_5aabc4ae5194980015076166" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/volksversand.jpg')}}">
						</a>
					</div>
					-->
					<div class="kairion-shop-now-logo">
						<a href="https://www.besamex.de/search/result?term=dulcolax&row=0&count=20&order_by=Manufacturer&order_direction=ASC&filter[Hersteller]=Sanofi-Aventis+Deutschland+GmbH+GB+Selbstmedikation+%2FConsumer-Care" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/besamex.png')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://www.medpex.de/search.do?filter=%5Bmf%7CSanofi-Aventis+Deutschland+GmbH+Gesch%E4ftsbereich+Selbstmedikation%2FConsumer-Care%5D&method=similarity&q=Dulcolax" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/medpex.jpg')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://www.mycare.de/suche/dulcolax?q=dulcolax" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/mycare.png')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://disapo.de/bin/geossql.pl" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/disapo.png')}}">
						</a>
					</div>
					<div class="kairion-shop-now-logo">
						<a href="https://www.aponeo.de/suche/?q=dulcolax&sf=eyJSZWltcG9ydCI6eyJLZXkiOiIwIiwiRGlzcGxheSI6ImtlaW5lIFJlaW1wb3J0ZSJ9LCJTdWNoZ2VuYXVpZ2tlaXQiOnsiS2V5IjoiMC42IiwiRGlzcGxheSI6IjAuNiJ9LCJIZXJzdGVsbGVyIjp7IkRpc3BsYXlzb3J0Ijoic2Fub2ZpLWF2ZW50aXMgZGV1dHNjaGxhbmQgZ21iaCBnYiBzZWxic3RtZWRpa2F0aW9uIFwvY29uc3VtZXItY2FyZSIsIktleSI6IjYxNjciLCJEaXNwbGF5IjoiU2Fub2ZpLUF2ZW50aXMgRGV1dHNjaGxhbmQgR21iSCBHQiBTZWxic3RtZWRpa2F0aW9uIFwvQ29uc3VtZXItQ2FyZSIsIkNvdW50Ijo5fX0%3D" target="_blank">
							<img src="{{ URL::to('static_resources/mobile/images/buynow/aponeo.jpg')}}">
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
				<p>*Dies ist eine beispielhafte Übersicht von Online-Apotheken</p>
			</div>
			
		</div>
    </div>
</div>
@stop