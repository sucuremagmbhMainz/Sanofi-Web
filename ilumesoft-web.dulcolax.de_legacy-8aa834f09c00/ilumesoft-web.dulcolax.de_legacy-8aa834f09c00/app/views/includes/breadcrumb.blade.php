<?php   
	$len=count($BreadCrumblist);
	$i=0;
?>
@if($len>0)
	<div id="nav_breadcrumbs">
		@foreach ($BreadCrumblist as $breadCrumbItems)
			<span @if($i==$len-1) class="active"@endif><a href="{{action('PageController@'.$breadCrumbItems['page'])}}">{{$breadCrumbItems['title']}}</a></span>@if($i!=$len-1) &raquo; @endif
			<?php $i++; ?>
		@endforeach
	</div>
@endif