<?php

class CouponController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function Redeem() {

		$dest = Input::get('url');
		$couponid = Input::get('couponid');
		CouponCode::setCouponCode($couponid);
		return Redirect::away($dest);
	
	}
	public function away($path, $status = 302, $headers = array())
	{
    	return $this->createRedirect($path, $status, $headers);
	}

}
