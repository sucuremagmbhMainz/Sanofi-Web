@extends('layouts.mobilemaster')

@section('styles')
	@parent
@stop

@section('scripts')
	@parent
		
@stop

@section('content')

  <div id="wrapper" class="productDetail">

    <div class="hist box_content">
      <div class="hist product_desc clearfix">
        <div class="hist product_header">
          <h2 class="hist product_name">Info-Broschüre</h2>          
        </div>       
        <div class="hist_content">                   
          <p>Lesen Sie hier alles Wichtige rund um das Medizinprodukt DulcoSoft<sup>®</sup> bei hartem, trockenem Stuhl und laden Sie sich die kostenlose Info-Broschüre herunter</p>
		  <br>
		  <a target="_blank" href="{{URL::to('pdf/DulcoSoft_Infobroschüre.pdf')}}">
			<img src="/static_resources/images/pdf-icon.png" alt="" title="" style="width: 40px; margin-right: 20px; vertical-align: middle;">
            <span class="blue">Info-Broschüre</span>
          </a>
		  <br><br>
        </div>
      </div>
    </div>
    
  </div>
@stop
