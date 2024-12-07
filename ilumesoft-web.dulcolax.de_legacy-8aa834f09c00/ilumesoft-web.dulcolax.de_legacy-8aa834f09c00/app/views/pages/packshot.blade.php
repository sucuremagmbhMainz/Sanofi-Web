@extends('layouts.mobilemaster')

@section('styles')
    @parent
@stop

@section('scripts')
    @parent

@stop

@section('content')
    <div id="wrapper">
        <div class="box_content products packshot-page">
            <h3 class="title">Laden Sie hier die aktuellen Packungsbilder herunter</h3>
            <div class="section_images">
                <div class="row_product">
                    <div class="dragees-left">
                        <h4>Dulcolax<sup>&reg;</sup> Dragées 20 Stück</h4>
                        <div class="inside_image">
                            <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_20_Packshot.jpg')}}">
								<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_20_Packshot.png')}}" alt="Dulcolax Dragées 20 Packshot">
							</a>
                        </div>
                    </div>
                    <div class="dragees-right">
                        <h4>Dulcolax<sup>&reg;</sup> Dragées 40 Stück</h4>
                        <div class="inside_image">
                            <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.jpg')}}">
								<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}" alt="Dulcolax Dragées 40 Packshot">
							</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section_images">
                <div class="row_product">
                    <h4>Dulcolax<sup>&reg;</sup> Dragées 100 Stück</h4>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_100_Packshot.jpg')}}">
							<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_100_Packshot.png')}}" alt="Dulcolax Dragées 100 Blister Packshot">
						</a>
                    </div>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_100_Dose_Packshot.jpg')}}">
							<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_100_Dose_Packshot.png')}}" alt="Dulcolax Dragées 100 Dose Packshot">
						</a>
                    </div>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_100_Dose_Packshot1.jpg')}}">
							<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_100_Dose_Packshot1.png')}}" alt="Dulcolax Dragées 100 Dose + Packshot">
						</a>
                    </div>
                </div>
            </div>
            <div class="section_images">
                <div class="row_product">
                    <h4>Dulcolax<sup>&reg;</sup> Produktfamilie</h4>
                    <div class="inside_image inside_image_bigger">
                        <a href="{{ URL::to('static_resources/mobile/images/main-menu/Dulcolax_Sortiment.jpg')}}">
							<img src="{{ URL::to('static_resources/mobile/images/main-menu/Dulcolax_Sortiment.png')}}" width="260" alt="Dulcolax Kernsortiment Packshot">
						</a>
                    </div>
                </div>
            </div>
            <div class="section_images">
                <div class="row_product">
                    <h4>Dulcolax<sup>&reg;</sup> NP Tropfen 30ml</h4>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.jpg')}}">
							<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}" alt="Dulcolax NP Tropfen_30ml Packshot">
						</a>
                    </div>
                    {{--<div class="inside_image">
                        <a href="{{ URL::to('static_resources/images/packshot/jpg/tropfen_30ml_inhalt_rechts.jpg')}}">
                            <img src="{{ URL::to('static_resources/images/packshot/min/Dulcolax_NP_Tropfen_30ml_Flasche_Packshot.png')}}" alt="Dulcolax NP Tropfen 30ml Flasche Packshot">
						</a>
                    </div>--}}
                </div>
            </div>
            <div class="section_images">
                <div class="row_product">
                    <h4>Dulcolax<sup>&reg;</sup> Zäpfchen 6 Stück</h4>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.jpg')}}">
							<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}" alt="Dulcolax Zaepfchen 6 Packshot">
						</a>
                    </div>
                </div>
            </div>
			<div class="section_images">
                <div class="row_product">
                    <h4 class="pink">Dulcolax<sup>&reg;</sup> NP Perlen 50 Stück</h4>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.jpg')}}">
							<img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.png')}}" alt="Dulcolax NP Perlen 50 Packshot">
						</a>
                    </div>
                </div>
            </div>
            <div class="section_images">
                <div class="row_product">
                    <h4 class="blue">DulcoSoft<sup>&reg;</sup> Pulver (Medizinprodukt) 20 Stück</h4>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot.jpg')}}">
                            <img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot.png')}}" alt="DulcoSoft Pulver Medizinprodukt 20 Packshot">
						</a>
                    </div>
					<div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot_2.jpg')}}">
                            <img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot_2.png')}}" alt="DulcoSoft Pulver Medizinprodukt 20 + Packshot">
						</a>
                    </div>

                </div>
            </div>
            <div class="section_images">
                <div class="row_product">
                    <h4 class="blue">DulcoSoft<sup>&reg;</sup> Lösung (Medizinprodukt) 250 ml</h4>
                    <div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot.jpg')}}">
                            <img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot.png')}}" alt="DulcoSoft Lösung 250ml Packshot">
						</a>
                    </div>
					<div class="inside_image">
                        <a href="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot_2.jpg')}}">
                            <img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot_2.png')}}" alt="DulcoSoft Lösung 250ml + Packshot"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
