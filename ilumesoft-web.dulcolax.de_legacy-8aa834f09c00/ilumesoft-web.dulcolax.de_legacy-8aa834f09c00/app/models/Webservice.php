<?php
class Webservice extends Eloquent {

	static $soapUrlD = "https://uat.bi.epsilon.com/DataServices.CNS.UAT/EpsilonDataServices.svc";
	static $soapUrlP = "https://dataservices.bi.epsilon.com/DataServices.CNS.Host/EpsilonDataServices.svc";

	// asmx URL of WSDL
	static $soapUser = "";
	//  username
	static $soapPassword = "";
	// password
	static $vendorID = 168;
  static $collateralCode = "11";
	
	static $defaultsourcecode = 'DLXACQWEBOTHCOU081200111';

	static function addUser($data = Null) {
		if (getenv('ENVIRONMENT') == 'prod') {
			$soapUrl = Webservice::$soapUrlP;
		} else if (getenv('ENVIRONMENT') == 'qa') {
			$soapUrl = Webservice::$soapUrlD;
		} else if (getenv('ENVIRONMENT') == 'dev') {
			$soapUrl = Webservice::$soapUrlD;
		} else {
			$soapUrl = Webservice::$soapUrlD;
		}
		$tid = Webservice::getTransactionID();
		
		if(SourceCode::getSourceCode()!=''){
				$sc = SourceCode::getSourceCode() . Webservice::$collateralCode;
		} else {
			$sc = Webservice::$defaultsourcecode;
		}
		
		// Get Transaction ID
		if ($data['NEWSL'] == TRUE) {
			$xml_optins_string = ' 
		<ns:SurveyResponse>
            <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
            <ns:SystemCode>BIWEB_168</ns:SystemCode>
            <ns:AnswerTypeCode>S</ns:AnswerTypeCode>
            <ns:ExternalAnswerNumber>bi</ns:ExternalAnswerNumber>
            <ns:ExternalId>$tid</ns:ExternalId>
            <ns:ExternalQuestionNumber>consent_bi</ns:ExternalQuestionNumber>
            <ns:ResponseSourceCode>$sourcecode</ns:ResponseSourceCode>
            <ns:SourceCode>168</ns:SourceCode>
            <ns:SurveyCode>DLX_Web_Reg_2014</ns:SurveyCode>
          </ns:SurveyResponse>
          <ns:SurveyResponse>
            <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
            <ns:SystemCode>BIWEB_168</ns:SystemCode>
            <ns:AnswerTypeCode>S</ns:AnswerTypeCode>
            <ns:ExternalAnswerNumber>ni</ns:ExternalAnswerNumber>
            <ns:ExternalId>$tid</ns:ExternalId>
            <ns:ExternalQuestionNumber>consent_ni_dulcolax</ns:ExternalQuestionNumber>
            <ns:ResponseSourceCode>$sourcecode</ns:ResponseSourceCode>
            <ns:SourceCode>168</ns:SourceCode>
            <ns:SurveyCode>DLX_Web_Reg_2014</ns:SurveyCode>
          </ns:SurveyResponse>
          <ns:SurveyResponse>
            <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
            <ns:SystemCode>BIWEB_168</ns:SystemCode>
            <ns:AnswerTypeCode>S</ns:AnswerTypeCode>
            <ns:ExternalAnswerNumber>pi</ns:ExternalAnswerNumber>
            <ns:ExternalId>$tid</ns:ExternalId>
            <ns:ExternalQuestionNumber>consent_pi_newsletter</ns:ExternalQuestionNumber>
            <ns:ResponseSourceCode>$sourcecode</ns:ResponseSourceCode>
            <ns:SourceCode>168</ns:SourceCode>
            <ns:SurveyCode>DLX_Web_Reg_2014</ns:SurveyCode>
          </ns:SurveyResponse>';
		} else {
			$xml_optins_string = '';
		}
		$xml_optins_string = strtr($xml_optins_string, array('$tid' => $tid,'$sourcecode'=>$sc));
		if ($data['zipcodesuffix'] != '') {
			$xml_zipcode4_string = '<ns:SurveyResponse>
            <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
            <ns:SystemCode>BIWEB_168</ns:SystemCode>
            <ns:AnswerTypeCode>T</ns:AnswerTypeCode>
            <ns:ExternalAnswerNumber>free_answ_ind_number_4</ns:ExternalAnswerNumber>
            <ns:ExternalId>$tid</ns:ExternalId>
            <ns:ExternalQuestionNumber>zipcode_+4</ns:ExternalQuestionNumber>
            <ns:OpenAnswerText>$zipcodesuffix</ns:OpenAnswerText>
            <ns:ResponseSourceCode>$sourcecode</ns:ResponseSourceCode>
            <ns:SourceCode>168</ns:SourceCode>
            <ns:SurveyCode>DLX_Web_Reg_2014</ns:SurveyCode>
          </ns:SurveyResponse>';
		} else {
			$xml_zipcode4_string = '';
		}
		$xml_zipcode4_string = strtr($xml_zipcode4_string, array('$tid' => $tid, '$zipcodesuffix' => $data["zipcodesuffix"],'$sourcecode'=>$sc));
		if($data['CCNM']!=''){
		$xml_coupon_string = '<ns:SurveyResponse>
            <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
            <ns:SystemCode>BIWEB_168</ns:SystemCode>
            <ns:AnswerTypeCode>S</ns:AnswerTypeCode>
            <ns:ExternalAnswerNumber>$CCNM</ns:ExternalAnswerNumber>
            <ns:ExternalId>$tid</ns:ExternalId>
            <ns:ExternalQuestionNumber>coupon_type</ns:ExternalQuestionNumber>
            <ns:ResponseSourceCode>$sourcecode</ns:ResponseSourceCode>
            <ns:SourceCode>168</ns:SourceCode>
            <ns:SurveyCode>DLX_Web_Reg_2014</ns:SurveyCode>
          </ns:SurveyResponse>';
		}else{
			$xml_coupon_string = "";
		} 
		$xml_coupon_string = strtr($xml_coupon_string, array('$tid'=>$tid,'$CCNM' => $data['CCNM'],'$sourcecode'=>$sc));  
		$xml_post_string = '<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ind="http://Epsilon.com/ServiceContracts/2010/02/IndividualServices" xmlns:ns="http://Epsilon.com/DataContracts/2010/02">
  <soapenv:Header/>
  <soapenv:Body>
    <ind:CreateIndividual>
      <ind:request>
        <ns:Individual>
          <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
          <ns:SystemCode>BIWEB_168</ns:SystemCode>
          <ns:Addresses></ns:Addresses>
          <ns:BirthDate>$birthday</ns:BirthDate>
          <ns:Emails>
            <ns:Email>
              <ns:EmailAddress>$email</ns:EmailAddress>
            </ns:Email>
          </ns:Emails>
          <ns:ExternalInfos>
            <ns:ExternalInfo>
              <ns:ExternalId>$tid</ns:ExternalId>
              <ns:ExternalSourceCode>$ExternalSourceCode</ns:ExternalSourceCode>
            </ns:ExternalInfo>
          </ns:ExternalInfos>
          <ns:FirstName>$firstname</ns:FirstName>
          <ns:GenderCode>$gender</ns:GenderCode> 
          <ns:IndividualStatusCode>N</ns:IndividualStatusCode>
          <ns:LastName>$lastname</ns:LastName>
          <ns:Phones></ns:Phones>
        </ns:Individual>
        <ns:PromotionResponses>
          <ns:PromotionResponse>
            <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
            <ns:SystemCode>BIWEB_168</ns:SystemCode>
            <ns:ExternalId>168201402181157011290220111</ns:ExternalId>
            <ns:ResponseSourceCode>$sourcecode</ns:ResponseSourceCode>
            <ns:SourceCode>168</ns:SourceCode>
          </ns:PromotionResponse>
        </ns:PromotionResponses>
        <ns:SurveyResponses>
          <ns:SurveyResponse>
            <ns:ExternalSystemTransactionId>$tid</ns:ExternalSystemTransactionId>
            <ns:SystemCode>BIWEB_168</ns:SystemCode>
            <ns:AnswerTypeCode>T</ns:AnswerTypeCode>
            <ns:ExternalAnswerNumber>free_answ_ind_number_5</ns:ExternalAnswerNumber>
            <ns:ExternalId>$tid</ns:ExternalId>
            <ns:ExternalQuestionNumber>zipcode_5</ns:ExternalQuestionNumber>
            <ns:OpenAnswerText>$zipcodebase</ns:OpenAnswerText>
            <ns:ResponseSourceCode>$sourcecode</ns:ResponseSourceCode>
            <ns:SourceCode>168</ns:SourceCode>
            <ns:SurveyCode>DLX_Web_Reg_2014</ns:SurveyCode>
          </ns:SurveyResponse>
          $xml_zipcode4_string
          $xml_coupon_string
          $xml_optins_string
        </ns:SurveyResponses>
      </ind:request>
    </ind:CreateIndividual>
  </soapenv:Body>
</soapenv:Envelope>';

		$xml_post_string = strtr($xml_post_string, array('$tid' => $tid, '$birthday' => $data["birthday"], '$email' => $data["email"], '$ExternalSourceCode' => 168, '$firstname' => $data["firstname"], '$lastname' => $data["lastname"], '$zipcodebase' => $data["zipcodebase"], '$zipcodesuffix' => $data["zipcodesuffix"], '$CCNM' => $data['CCNM'], '$xml_optins_string' => $xml_optins_string, '$xml_zipcode4_string' => $xml_zipcode4_string,'$xml_coupon_string' => $xml_coupon_string,'$sourcecode'=>$sc,'$gender' => $data['gender']));

		//echo($xml_post_string);

		//echo($xml_post_string);
		$headers = array("Content-type: text/xml;charset=\"utf-8\"", "Accept: text/xml", "Cache-Control: no-cache", "Pragma: no-cache", "SOAPAction: http://Epsilon.com/ServiceContracts/2010/02/IndividualServices/IIndividual/CreateIndividual", "Content-length: " . strlen($xml_post_string), );
		//SOAPAction: your op URL

		$url = $soapUrl;
		//echo($xml_post_string);
		// PHP cURL  for https connection with auth
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERPWD, Webservice::$soapUser . ":" . Webservice::$soapPassword);
		// username and password - declared at the top of the doc
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
		// the SOAP request
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// converting
		$response = curl_exec($ch);
		//print_r($response);
		curl_close($ch);
		$doc = new DOMDocument();
		$doc -> loadXML($response);
		//echo($response);
		$individualidNode = $doc -> getElementsByTagName("IndividualId");
		if ($individualidNode -> length != 0) {// Success Add Individual
			$individualidvalue = $individualidNode -> item(0) -> nodeValue;
			//echo($individualidvalue);
			$data['success'] = TRUE;
			$data['individualid'] = $individualidvalue;

			return $data;
		} else {
      Log::warning('Epsilon service failed. Response: ' . $response . ' Request: ' . $xml_post_string . PHP_EOL);
			return FALSE;
		}
	}

	static function unsubscribe($data = Null) {
		if (getenv('ENVIRONMENT') == 'prod') {
			$soapUrl = Webservice::$soapUrlP;
		} else if (getenv('ENVIRONMENT') == 'qa') {
			$soapUrl = Webservice::$soapUrlD;
		} else if (getenv('ENVIRONMENT') == 'dev') {
			$soapUrl = Webservice::$soapUrlD;
		} else {
			$soapUrl = Webservice::$soapUrlD;
		}
		$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sur="http://Epsilon.com/ServiceContracts/2010/02/SurveyServices" xmlns:ns="http://Epsilon.com/DataContracts/2010/02">
   <soapenv:Header/>
   <soapenv:Body>
      <sur:CreateSurveyResponses>
         <sur:request>
            <ns:SurveyResponse>
               <ns:ExternalSystemTransactionId>%s</ns:ExternalSystemTransactionId>
               <ns:SystemCode>BIWEB_168</ns:SystemCode>
               <ns:AnswerTypeCode>S</ns:AnswerTypeCode>
               <ns:ExternalAnswerNumber>%s</ns:ExternalAnswerNumber>
               <ns:ExternalId>%s</ns:ExternalId>
               <ns:ExternalQuestionNumber>%s</ns:ExternalQuestionNumber>
               <ns:ResponseSourceCode>DLXOPTWEBWEBOUT140300100</ns:ResponseSourceCode>
               <ns:SourceCode>168</ns:SourceCode>
               <ns:SurveyCode>DLX_Web_Reg_2014</ns:SurveyCode>
               <ns:IndividualId>%s</ns:IndividualId>
            </ns:SurveyResponse>
         </sur:request>
      </sur:CreateSurveyResponses>
   </soapenv:Body>
</soapenv:Envelope>
';
		$tid = Webservice::getTransactionID();
		$xml_post_string = sprintf($xml_post_string, $tid, $data['ANSW_NM'], $tid, $data['QUEST_NM'], $data['CID']);
		//echo($xml_post_string);
		$headers = array("Content-type: text/xml;charset=\"utf-8\"", "Accept: text/xml", "Cache-Control: no-cache", "Pragma: no-cache", "SOAPAction: http://Epsilon.com/ServiceContracts/2010/02/SurveyServices/ISurvey/CreateSurveyResponses", "Content-length: " . strlen($xml_post_string), );

		$url = $soapUrl;
		//echo($xml_post_string);
		// PHP cURL  for https connection with auth
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERPWD, Webservice::$soapUser . ":" . Webservice::$soapPassword);
		// username and password - declared at the top of the doc
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
		// the SOAP request
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// converting
		$response = curl_exec($ch);
		//print_r($response);
		curl_close($ch);
		$doc = new DOMDocument();
		$doc -> loadXML($response);
		//echo($response);
		$individualidNode = $doc -> getElementsByTagName("IndividualId");
		if ($individualidNode -> length != 0) {// Success Add Individual
			$individualidvalue = $individualidNode -> item(0) -> nodeValue;
			//echo($individualidvalue);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	static function getTransactionID() {
		$date = '21' . date('ymdHis');
		$randnumber = rand(9000000000, 9999999999);
		$trans = Webservice::$vendorID . $date . $randnumber;
		return $trans;
	}

}
?>