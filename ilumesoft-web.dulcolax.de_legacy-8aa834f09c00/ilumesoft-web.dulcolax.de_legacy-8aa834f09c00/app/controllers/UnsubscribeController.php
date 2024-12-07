<?php

class UnsubscribeController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function unsubscribe() {
		
		if(Input::get('unsubscribeItem')=='all'){
			$QUEST_NM = 'consent_bi';
			$ANSW_NM = 'bo';
		}else{
			$QUEST_NM = 'consent_ni_dulcolax';
			$ANSW_NM = 'no';
		}
		
		$data = array("CID" => Input::get('CID'),"QUEST_NM"=>$QUEST_NM,"ANSW_NM"=>$ANSW_NM);
		
		$add = Webservice::unsubscribe($data);
		if ($add == 1) {
			return Response::json(array('statusCode' => 0));
		} else {
			return Response::json(array('statusCode' => -1));
		}

	}

}
