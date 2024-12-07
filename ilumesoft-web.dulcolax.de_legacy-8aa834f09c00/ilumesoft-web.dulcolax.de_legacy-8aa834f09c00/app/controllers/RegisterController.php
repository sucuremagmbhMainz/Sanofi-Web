<?php

class RegisterController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function register() {

		$cc = CouponCode::getCouponCode();
		switch ($cc) {
			case 3 :
				$cct = 'DLX $1 coupon';
				$ccnm = 'dlx_one_dollar';
				break;
			case 2 :
				$cct = 'DLX $3 coupon';
				$ccnm = 'dlx_three_dollar';
				break;
			case 7 :
				$cct = 'DulcoGas coupon';
				$ccnm = 'dlx_dulcogas';
				break;
			case 5 :
				$cct = 'DulcoEase coupon';
				$ccnm = 'dlx_dulcoease';
				break;
			case 4 :
				$cct = 'PINK $3 coupon';
				$ccnm = 'dlx_pink';
				break;
			case 6 :
				$cct = 'DulcoGlide coupon';
				$ccnm = 'dlx_dulcoglide';
				break;
			default: 
				$cct = '';
				$ccnm = '';	
		}
		if (Input::get('chk_last') == 'on') {
			$NEWSL = TRUE;
		
		} else {
			$NEWSL = FALSE;
		}
		$data = array("address1" => '', "address2" => '', "city" => '', "state" => Input::get('state'), "zipcodebase" => Input::get('zipCode'), "zipcodesuffix" => Input::get('zipCodeExtended'), "birthday" => Input::get('birthYear') . '-' . Input::get('birthMonth'),
		//"birthday" => "11",
		"email" => Input::get('email'), "firstname" => Input::get('firstName'), "lastname" => Input::get('lastName'), "phone" => "5555", "CCT" => $cct, "CCNM" => $ccnm, "NEWSL" => $NEWSL,'gender' => Input::get('gender'));
		$add = Webservice::addUser($data);
		if ($add['success'] == TRUE) {
			if (getenv('ENVIRONMENT') == 'prod') {
				//$writef = false;
				$writef = true;
			} else if (getenv('ENVIRONMENT') == 'qa') {
				$writef = true;
			} else if (getenv('ENVIRONMENT') == 'dev') {
				$writef = true;
			} else {
				$writef = false;
			}
			if ($writef) {
				//File::append(app_path() . '/storage/registration.txt', getenv('ENVIRONMENT') . ',' . Input::get('email') . ',' . $add['individualid'] . PHP_EOL);
			}
			return Response::json(array('statusCode' => 0));
		} else {
			return Response::json(array('statusCode' => -1));
		}

	}
}
