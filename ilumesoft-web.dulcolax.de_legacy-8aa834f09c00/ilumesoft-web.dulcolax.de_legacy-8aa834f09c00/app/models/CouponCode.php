<?php
class CouponCode extends Eloquent {

	static $SOURCECODE_POSTFIX = 26;

	/**
	 * Return the stored value.
	 *
	 * 
	 */
	static function getCouponCode(){
		return Session::get('COUPONCODE');
	}
	/**
	 * Store the value.
	 *
	 * 
	 */
	static function setCouponCode($value){
		Session::put('COUPONCODE', $value);
	}

}
?>