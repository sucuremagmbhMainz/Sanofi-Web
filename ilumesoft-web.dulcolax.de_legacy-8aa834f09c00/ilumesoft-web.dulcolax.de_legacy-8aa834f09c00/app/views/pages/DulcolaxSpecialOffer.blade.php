@extends('layouts.mobilemaster')

@section('styles')
@parent

@stop

@section('scripts')
@parent
{{HTML::script('/static_resources/mobile/js/registration.min.js')}}
{{HTML::script('/static_resources/mobile/js/jquery.filter_input.min.js')}}

@stop

@section('content')
<div id="wrapper">

    <div class="box_content reg-form">
        <form id="regForm" name="regForm" method="POST"> 
            <h1 class="offer-tittle desktop-item">
                Offer Sign Up
            </h1>

            <h1>Sign Up NOW for future Dulcolax<sup>&reg;</sup>, DulcoEase<sup>&reg;</sup> and DulcoGas<sup>&reg;</sup> offers</h1>

            <p class="noText">Thank you for printing out your coupon, redeemable at all leading retailers.</p>

            <p>To receive future money-saving offers, plus other helpful information on managing your constipation or gas, simply fill out the form and check the box below. Then press Sign Up.
            </p>
            <p>
                All fields are required.
            </p>
            <div class="names-content">
                <span class="input_labels">
                    <span class="fname">First Name</span>
                </span><br>
                <input type="text" id="fname" name="firstName" class="name" >
            </div>
            <div class="names-content">
                <span class="input_labels">
                    <span class="lname">Last Name</span>
                </span>
                <input type="text" id="lname" name="lastName" class="name" >
            </div>

            <p><span class="input_labels">Zip Code</span><br>
                <input type="text" id="zip" name="zipCode"  class="zip" maxlength="5"> <span class="gr">&ndash;</span> <input type="text" id="zip2" name="zipCodeExtended" class="zip zip_local" maxlength="4">
            </p>
            <p><span class="input_labels">Date of Birth</span><br>
                <input type="text" id="tMonth" name="birthMonth" class="date" maxlength="2" placeholder="MM"> <span class="gr"> /</span> <input type="text" id="tYear" name="birthYear" class="date date_year" maxlength="4" placeholder="YYYY">  
            </p>
            <p>
                <span class="input_labels">Email</span><br>
                <input type="text" id="email" name="email" class="name" placeholder="enter text...">
            </p>
            <br />
            <h3 class="registration_q">What is your gender?</h3>
            <p class="errMsg hideItem" id="gender_err">Please select a gender</p>
            <p><input class="no-border" type="radio" id="gender_m" name="gender" value="M"> Male</p>
            <p><input class="no-border" type="radio" id="gender_f" name="gender" value="F"> Female</p>
            <br />


            <div class="registration_form">
                <h2><a href="#" target="_blank">Privacy Notice</a></h2>
                <p class="errMsg hideItem" id="agree_err">Please indicate that you agree to our Privacy Notice</p>
                <p>
                    <input class="no-border" type="checkbox" name="chk_last" id="chk_last"><label for="chk_last">By checking here, you indicate you agree to our <a href="#" target="_blank">Privacy Notice</a> and allow us to use your information to advertise disease states, branded product, and other products to you.</label>

                </p>


                <p><em>If you do not check the box, you will not receive any on-going communications.</em></p>
                <p>
                    <input type="submit" id="btnSubmit" class="buttonFlat" name="submit" value="Sign Up" style="cursor:pointer;" />

                </p>
            </div>
        </form>
    </div>

</div>
<script>
    $(document).ready(function (e) {
        $('#fname').filter_input({regex: '[a-zA-Z]'});
        $('#lname').filter_input({regex: '[a-zA-Z]'});
        $('#zip').filter_input({regex: '[0-9]'});
        $('#zip2').filter_input({regex: '[0-9]'});
        $('#tMonth').filter_input({regex: '[0-9]'});
        $('#tYear').filter_input({regex: '[0-9]'});
        $('#email').filter_input({regex: '[a-zA-Z0-9-_.@]'});
    });
</script>      
@stop
