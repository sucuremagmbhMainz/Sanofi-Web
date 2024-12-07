<table  cellspacing="0" cellpadding="0" border="0" class="table_comparison tablet">
  <tbody>
    <tr>
      <th style="width:5%"></th>
      <th style="width:12%"></th>
      <th style="width:12%"></th>
      <th style="width:12%"></th>
      <th style="width:12%"></th>
      <th style="width:16%"></th>
      <th style="width:12%"></th>
    </tr>

    <tr class="border_top products">
      <td class="cat_cell top_left left alignMiddle w15">{{ trans('content.products_comparison_table_28') }}</td>
	  <td class="products_name" >
       <h4>{{ trans('content.header_82') }}</h4>
        <a href="dulcolax-zaepfchen.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}" class="pc_image"></a>
        <a class="buttonFlat buy mobile" rel="tab10"  href="#">{{ trans('content.common_2') }}</a>
        @if (false)
        <a class="buttonFlat"  href="{{action('PageController@onlineshops')}}" >{{ trans('content.common_2') }}</a>
        @endif
	  </td>
      <td class="products_name" >
        <h4>{{ trans('content.header_78') }}</h4>
        <a href="dulcolax-dragees.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}" class="pc_image"></a>
        <a class="buttonFlat buy mobile" rel="tab9" href="#">{{ trans('content.common_2') }}</a>
        @if (false)
        <a class="buttonFlat" href="{{action('PageController@onlineshops')}}">{{ trans('content.common_2') }}</a>
        @endif
      </td>
      <td class="products_name" >
        <h4>{{ trans('content.header_214') }}</h4>
        <a href="dulcolax-np-tropfen.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}" class= "pc_image"></a>
        <a class="buttonFlat buy mobile" rel="tab11" href="#">{{ trans('content.common_2') }}</a>
        @if (false)
        <a class="buttonFlat" rel="tab11" href="{{action('PageController@onlineshops')}}" >{{ trans('content.common_2') }}</a>
        @endif
	  </td>
      <td class="products_name" >
        <h4 class="pink">{{ trans('content.header_206') }}</h4>
        <a href="dulcolax-np-perlen.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Perlen_Packshot.png')}}" class= "pc_image"></a>
        <a class="buttonFlat buy mobile" rel="tab11" href="#">{{ trans('content.common_2') }}</a>
        @if (false)
        <a class="buttonFlat" rel="tab11" href="{{action('PageController@onlineshops')}}" >{{ trans('content.common_2') }}</a>
        @endif
	  </td>
      <td class="products_name" >
        <h4 class="blue">{{ trans('content.header_81') }}</h4>
        <a href="dulcosoft-pulver.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot.png')}}" class= "pc_image"></a>
        <a class="buttonFlat buy mobile" rel="tab12" href="#">{{ trans('content.common_2') }}</a>
        @if (false)
        <a class="buttonFlat" href="{{action('PageController@onlineshops')}}">{{ trans('content.common_2') }}</a>
        @endif
	  </td>
      <td class="products_name">
        <h4 class="blue"> {{ trans('content.header_80') }} </h4>
        <a href="dulcosoft-loesung.html"><img src="{{ URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot.png')}}" class= "pc_image"></a>
        <a class="buttonFlat buy mobile" rel="tab12" href="#">{{ trans('content.common_2') }}</a>
        @if (false)
        <a class="buttonFlat" href="{{action('PageController@onlineshops')}}">{{ trans('content.common_2') }}</a>
        @endif
	  </td>
    </tr>
    <tr class="border_top">
      <td class="cat_cell left lineHeightNormal">{{ trans('content.products_comparison_table_40') }}</td>
	  <td colspan="2">{{ trans('content.pct_dragees_1') }}</td>
      <td colspan="2">{{ trans('content.pct_nptropfen_1') }}</td>
      <td colspan="2">{{ trans('content.pct_mbalance_pul_1') }}</td>
    </tr>
    <tr class="border_top">
      <td class="cat_cell left">{{ trans('content.products_comparison_table_2') }}</td>
      <td colspan="4">{{ trans('content.pct_dragees_2') }}</td>
	  <td colspan="2">{{ trans('content.pct_dulcosoft_1') }}</td>
    </tr>
    {{--<tr class="border_top">
      <td class="cat_cell left">{{ trans('content.products_comparison_table_3') }}</td>
      <td colspan="6">{{ trans('content.pct_dragees_3') }}</td>
    </tr>--}}
    <tr class="border_top">
      <td class="cat_cell left">{{ trans('content.products_comparison_table_44') }}</td>
	  <td>{{ trans('content.pct_zapfchen_2') }}</td>
      <td>{{ trans('content.pct_dragees_4') }}</td>
      <td colspan="2">{{ trans('content.pct_nptropfen_2') }}</td>
      <td colspan="2">{{ trans('content.pct_mbalance_pul_2') }}</td>
    </tr>    
    <tr class="border_top">
      <td rowspan="2" class="cat_cell left">{{ trans('content.products_comparison_table_5') }}</td>
	  <td>{{ trans('content.pct_zapfchen_4') }}</td>
      <td>{{ trans('content.pct_dragees_6') }}</td>
      <td colspan="2">{{ trans('content.pct_nptropfen_4') }}</td>
      <td>{{ trans('content.pct_mbalance_pul_4') }}</td>
      <td>{{ trans('content.pct_mbalance_flu_3') }}</td>
    </tr>
	<tr class="border_top">
	  <td colspan="6">{{ trans('content.pct_dragees_6a') }}</td>
    </tr>
	<tr class="border_top">
      <td class="cat_cell left">{{ trans('content.products_comparison_table_4') }}</td>
	  <td>{{ trans('content.pct_zapfchen_3') }}</td>
      <td>{{ trans('content.pct_dragees_5') }}</td>
      <td>{{ trans('content.pct_nptropfen_3') }}</td>
      <td>{{ trans('content.pct_npperlen_2') }}</td>
      <td>{{ trans('content.pct_mbalance_pul_3') }}</td>
      <td>{{ trans('content.pct_mbalance_flu_2') }}</td>
    </tr>
    <tr class="border_top">
      <td class="cat_cell left">{{ trans('content.products_comparison_table_6') }}</td>
      <td>{{ trans('content.pct_zapfchen_5') }}</td>
	  <td>{{ trans('content.pct_dragees_7') }}</td>
      <td>{{ trans('content.pct_nptropfen_5') }}</td>
	  <td>{{ trans('content.pct_npperlen_3') }}</td>
      <td>{{ trans('content.pct_mbalance_pul_7') }}</td>
	  <td>{{ trans('content.pct_mbalance_flu_7') }}</td>
    </tr>
    <tr class="border_top">
      <td class="cat_cell left">{{ trans('content.products_comparison_table_8') }}</td>
	  <td>{{ trans('content.pct_zapfchen_6') }}</td>
      <td>{{ trans('content.pct_dragees_8') }}</td>
      <td colspan="2">{{ trans('content.pct_nptropfen_6') }}</td>
      <td colspan="2">{{ trans('content.pct_mbalance_pul_5') }}</td>
    </tr>
    <tr class="border_top">
      <td class="cat_cell left">  </td>
	  <td colspan="1">{{ trans('content.pct_mbalance_pul_6') }}</td>
      <td colspan="3">{{ trans('content.pct_dragees_9') }}</td>      
      <td colspan="2">{{ trans('content.pct_mbalance_pul_8') }}</td>
    </tr>
    <tr class="border_top">
      <td class="cat_cell left">{{ trans('content.products_comparison_table_9') }}</td>
      <td colspan="6">{{ trans('content.pct_dragees_10')}}</td>
    </tr>
  </tbody>
</table>
<br />
<p class="references">{{ trans('content.pct_references') }}</p>
