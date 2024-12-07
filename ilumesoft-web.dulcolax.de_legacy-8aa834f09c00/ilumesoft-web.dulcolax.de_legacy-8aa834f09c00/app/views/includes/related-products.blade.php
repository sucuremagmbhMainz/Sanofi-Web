<ul class="grid_row">
    <li class="grid_product">
        <a href="{{action('PageController@dragees')}}">
            <div class="grid-image">
                <img src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}"
                     alt="{{ trans('content.header_78a') }}" title="{{ trans('content.header_78a') }}"/>
            </div>
            <div class="grid-title">
                {{ trans('content.header_78') }}
            </div>
        </a>

        <div class="relatedProductsLinks">
            <a href="{{action('PageController@dragees')}}"
               class="no-top-bottom-margin">{{ trans('content.common_0001') }}</a>
        </div>
    </li>

    <li class="grid_product">
        <a href="{{action('PageController@nptropfen')}}">
            <div class="grid-image"><img
                        src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}"
                        alt="{{ trans('content.header_214a') }}" title="{{ trans('content.header_214a') }}"/></div>

            <div class="grid-title">
                {{ trans('content.header_214') }}
            </div>
        </a>

        <div class="relatedProductsLinks">
            <a href="{{action('PageController@nptropfen')}}"
               class="no-top-bottom-margin">{{ trans('content.common_0002') }}</a>
        </div>
    </li>

    {{--<li class="grid_product">
        <a href="{{action('PageController@kinder')}}">
            <div class="grid-image">
                <img src=
                     "{{URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Kinder_Tropfen_Packshot.png')}}"
                     alt="{{ trans('content.header_78b') }}" title="{{ trans('content.header_78b') }}"/>
            </div>

            <div class="grid-title">
                Dulcolax<sup>&reg;</sup> NP Kinder Tropfen
            </div>
        </a>
        <div class="relatedProductsLinks">
            <a href="{{action('PageController@kinder')}}"
               class="no-top-bottom-margin">{{ trans('content.common_02a') }}</a>
        </div>
    </li>--}}

    <li class="grid_product">
        <a href="{{action('PageController@zapfchen')}}">
            <div class="grid-image">
                <img src=
                     "{{URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}"
                     alt="{{ trans('content.header_82a') }}"
                     title="{{ trans('content.header_82a') }}"/></div>
            <div class="grid-title">
                {{ trans('content.header_82') }}
            </div>
        </a>
        <div class="relatedProductsLinks">
            <a href="{{action('PageController@zapfchen')}}"
               class="no-top-bottom-margin">{{ trans('content.common_0003') }}</a>
        </div>
    </li>
	
	<li class="grid_product">
        <a href="{{action('PageController@npperlen')}}" class="pink">
            <div class="grid-image">
                <img src=
                     "{{URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.png')}}"
                     alt="{{ trans('content.header_206a') }}"
                     title="{{ trans('content.header_206a') }}"/></div>
            <div class="grid-title pink">
                {{ trans('content.header_206') }}
            </div>
        </a>
        <div class="relatedProductsLinks">
            <a href="{{action('PageController@npperlen')}}"
               class="no-top-bottom-margin bg-pink">{{ trans('content.common_0003') }}</a>
        </div>
    </li>
	
	<li class="grid_product">
        <a href="{{action('PageController@dulcosoftloesung')}}" class="blue">
            <div class="grid-image">
                <img src=
                     "{{URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot_2.png')}}"
                     alt="{{ trans('content.header_80a') }}"
                     title="{{ trans('content.header_80a') }}"/></div>
            <div class="grid-title blue">
                {{ trans('content.header_80') }}
            </div>
        </a>
        <div class="relatedProductsLinks">
            <a href="{{action('PageController@dulcosoftloesung')}}"
               class="no-top-bottom-margin bg-blue">{{ trans('content.common_0003') }}</a>
        </div>
    </li>
	
	<li class="grid_product">
        <a href="{{action('PageController@dulcosoftpulver')}}" class="blue">
            <div class="grid-image">
                <img src=
                     "{{URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot_2.png')}}"
                     alt="{{ trans('content.header_81a') }}"
                     title="{{ trans('content.header_81a') }}"/></div>
            <div class="grid-title blue">
                {{ trans('content.header_81') }}
            </div>
        </a>
        <div class="relatedProductsLinks">
            <a href="{{action('PageController@dulcosoftpulver')}}"
               class="no-top-bottom-margin bg-blue">{{ trans('content.common_0003') }}</a>
        </div>
    </li>
    
</ul>
