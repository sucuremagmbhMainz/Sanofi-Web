@extends('layouts.mobilemaster')

@section('styles')
@parent

@stop

@section('scripts')
@parent
{{HTML::script('/static_resources/js/unsubscribe.js')}}
@stop

@section('content')
<div id="wrapper">
    <div class="box_content unsubscribe">
        <form id="swregForm" name="swregForm" method="POST">
            <div class="form">
                <p class="mainCopy">
                    Please select an option to unsubscribe from:
                </p>
                <p class="errMsg hideItem" id="noselection">
                    Please select an option
                </p>
                <input type="radio" id="unsubscribeItem" name="unsubscribeItem" class="unsubscribeItem" value="dulcolax">
                <span>Dulcolax<sup>&reg;</sup> Coupons &amp; Special Offers</span>
                <br>
                <br>
                <input type="submit" id="btnSubmitUns" name="Unsubscribe" value="Unsubscribe" style="cursor:pointer;">
                <input type="hidden" id="CID" name="CID" value="{{ $CID }}">
            </div>
            <div class="formConfirm" style="display: none">
                <h1>Thank you!</h1>
                <p>Your preferences have now been updated.</p>
            </div>
        </form>
    </div>
</div>
@stop
