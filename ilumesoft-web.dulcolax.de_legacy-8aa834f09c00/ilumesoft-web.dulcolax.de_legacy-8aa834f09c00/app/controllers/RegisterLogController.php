<?php

class RegisterLogController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function download() {
		$filep = app_path() . '/storage/registration.txt';
		return Response::download($filep);
	}	

}
