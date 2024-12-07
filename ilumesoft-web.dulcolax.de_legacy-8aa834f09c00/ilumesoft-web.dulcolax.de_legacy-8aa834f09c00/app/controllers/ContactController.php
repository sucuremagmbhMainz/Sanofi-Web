<?php
class ContactController extends BaseController {
    public function postKontakt() {
        $g_response = json_decode(
        		file_get_contents('https://www.google.com/recaptcha/api/siteverify' . 
        				'?secret=' . Config::get('recaptcha.private_key') . 
        				'&response=' . Input::get('g-recaptcha-response') . 
        				'&remoteip=' . $_SERVER['REMOTE_ADDR'], true)
       	);
        
        $validationEntries = strip_tags(Input::all());
        $validationEntries['recaptcha'] = $g_response->success ? 'VALID' : '';

        $validator = Validator::make($validationEntries, array(
                    'land' => 'required',
                    'mail' => 'required|email',
                    'msg' => 'required',
                    'recaptcha' => 'required'
        ));

        if ($validator->fails()) {
            return Redirect::route('kontaktForm')->withErrors($validator)->withInput();
        } else {
            Mail::send('emails.contact', strip_tags(Input::all()), function($message) {
                $message->subject('Dulcolax.de kontakt form');

                foreach (Config::get('mail.contactReceivers') as $receiver) {
                    $message->to($receiver);
                }
                foreach (Config::get('mail.contactReceiversCC') as $cc) {
                    $message->cc($cc);
                }
            });
            return Redirect::route('bestatigung');
        }
    }

}
