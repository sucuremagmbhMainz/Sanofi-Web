<?php
class SourceCode extends Eloquent {

	static $SOURCECODE_POSTFIX = 26;

	/**
	 * Return the stored value.
	 *
	 * 
	 */
	static function getSourceCode(){
		return Session::get('SOURCECODE');
	}
	/**
	 * Store the value.
	 *
	 * 
	 */
	static function setSourceCode($value){
		Session::put('SOURCECODE', $value);
	}

}
?>