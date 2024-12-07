@extends('layouts.mobilemaster')

@section('styles')
	@parent

@stop

@section('scripts')
	@parent
@stop

@section('content')
	<div id="wrapper">
		<div class="box_content new_style clearfix">
			<div class="section_top">
				<h1>Fragen an das Dulcolax<sup>&reg;</sup> Team</h1>

				<p>Sie haben eine Frage, auf die Sie hier noch keine Antwort gefunden haben? </p>
				<p>Haben Sie schon in den <strong>häufig gestellten Fragen</strong> (FAQ) nachgesehen? </p>
				<p>Senden Sie uns Ihre Frage mit Hilfe des folgenden Formulars und wir beantworten Ihnen diese gerne. Wir würden gerne Ihre Fragen zur Weiterbildung verwenden. Wir werden keine ihrer persönlichen Daten verwenden. Markieren Sie bitte die Auswahlbox, wenn Ihr Name unter keinen Umständen verwendet werden soll. </p>
			</div>
			<div class="form">
				{{ Form::open(array('url' => 'kontakt', 'name' => 'kontakt', 'id' => 'kontakt')) }}
					<h2>1. Wählen Sie Ihren lokalen Kontakt </h2>
					<div class="inputline">
						<label for="land" class="{{ $errors->has('land') ? 'ui-state-error' : '' }}">Ihr Land<sup>*</sup></label>
						<select name="land" id="land" size="1" class="{{ $errors->has('land') ? 'ui-state-error' : '' }}">
							<option value="">Bitte wählen Sie Ihr Land</option>
							<option value="0" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/argentina/_jcr_content/contact.html"{{ Input::old('land') == '0' ? ' selected' : ''}}>Argentina</option>
							<option value="1" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/australia/_jcr_content/contact.html"{{ Input::old('land') == '1' ? ' selected' : ''}}>Australia</option>
							<option value="2" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/austria/_jcr_content/contact.html"{{ Input::old('land') == '2' ? ' selected' : ''}}>Austria</option>
							<option value="3" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/bulgaria/_jcr_content/contact.html"{{ Input::old('land') == '3' ? ' selected' : ''}}>Bulgaria</option>
							<option value="4" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/brazil/_jcr_content/contact.html"{{ Input::old('land') == '4' ? ' selected' : ''}}>Brazil</option>
							<option value="5" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/canada/_jcr_content/contact.html"{{ Input::old('land') == '5' ? ' selected' : ''}}>Canada</option>
							<option value="6" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/china/_jcr_content/contact.html"{{ Input::old('land') == '6' ? ' selected' : ''}}>China</option>
							<option value="7" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/colombia/_jcr_content/contact.html"{{ Input::old('land') == '7' ? ' selected' : ''}}>Colombia</option>
							<option value="8" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/czech_republic/_jcr_content/contact.html"{{ Input::old('land') == '8' ? ' selected' : ''}}>Czech Republic</option>
							<option value="9" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/denmark/_jcr_content/contact.html"{{ Input::old('land') == '9' ? ' selected' : ''}}>Denmark</option>
							<option value="10" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/finland/_jcr_content/contact.html"{{ Input::old('land') == '10' ? ' selected' : ''}}>Finland</option>
							<option value="11" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/france/_jcr_content/contact.html"{{ Input::old('land') == '11' ? ' selected' : ''}}>France</option>
							<option value="12" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/germany/_jcr_content/contact.html"{{ Input::old('land') == '12' ? ' selected' : ''}}>Germany</option>
							<option value="13" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/greece/_jcr_content/contact.html"{{ Input::old('land') == '13' ? ' selected' : ''}}>Greece</option>
							<option value="14" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/hungary/_jcr_content/contact.html"{{ Input::old('land') == '14' ? ' selected' : ''}}>Hungary</option>
							<option value="15" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/italy/_jcr_content/contact.html"{{ Input::old('land') == '15' ? ' selected' : ''}}>Italy</option>
							<option value="16" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/mexico/_jcr_content/contact.html"{{ Input::old('land') == '16' ? ' selected' : ''}}>Mexico</option>
							<option value="17" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/netherlands/_jcr_content/contact.html"{{ Input::old('land') == '17' ? ' selected' : ''}}>Netherlands</option>
							<option value="18" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/norway/_jcr_content/contact.html"{{ Input::old('land') == '18' ? ' selected' : ''}}>Norway</option>
							<option value="19" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/portugal/_jcr_content/contact.html"{{ Input::old('land') == '19' ? ' selected' : ''}}>Portugal</option>
							<option value="20" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/russia/_jcr_content/contact.html"{{ Input::old('land') == '20' ? ' selected' : ''}}>Russia</option>
							<option value="21" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/south_africa/_jcr_content/contact.html"{{ Input::old('land') == '21' ? ' selected' : ''}}>South Africa</option>
							<option value="22" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/south_korea/_jcr_content/contact.html"{{ Input::old('land') == '22' ? ' selected' : ''}}>South Korea</option>
							<option value="23" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/spain/_jcr_content/contact.html"{{ Input::old('land') == '23' ? ' selected' : ''}}>Spain</option>
							<option value="24" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/sweden/_jcr_content/contact.html"{{ Input::old('land') == '24' ? ' selected' : ''}}>Sweden</option>
							<option value="25" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/united_kingdom/_jcr_content/contact.html"{{ Input::old('land') == '25' ? ' selected' : ''}}>United Kingdom</option>
							<option value="26" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/united_states/_jcr_content/contact.html"{{ Input::old('land') == '26' ? ' selected' : ''}}>United States</option>
							<option value="27" rel="/content/internet/chc/dulcolax/com_EN/muc/contacts/global/_jcr_content/contact.html"{{ Input::old('land') == '27' ? ' selected' : ''}}>Other countries</option>
						</select>
						<div class="error-desc"></div>
					</div>
					<div class="mds-cmp-text">
						<div class="text richtext">
							<p class="last">Sollten Sie Ihr Land hier nicht finden, wählen sie bitte "Andere Länder" aus. </p>
						</div>
					</div>
					<h2>2. Ihre Kontaktdaten<br /></h2>
					<div class="inputline">
						<label for="firstname">Ihr Vorname</label>
						<input id="firstname" name="firstname" type="text" value="{{ Input::old('firstname') }}" class="text" />
						<div class="error-desc"></div>
					</div>
					<div class="inputline">
						<label for="surname">Ihr Nachname</label>
						<input id="surname" name="surname" type="text" value="{{ Input::old('surname') }}" class="text" />
						<div class="error-desc"></div>
					</div>
					<div class="inputline">
						<label for="streetnumber">Straße/Hausnummer</label>
						<input id="streetnumber" name="streetnumber" type="text" value="{{ Input::old('streetnumber') }}" class="text" />
						<div class="error-desc"></div>
					</div>
					<div class="inputline">
						<label for="cityorcipcode">Stadt oder Postleitzahl</label>
						<input id="cityorcipcode" name="cityorcipcode" type="text" value="{{ Input::old('cityorcipcode') }}" class="text" />
						<div class="error-desc"></div>
					</div>
					<div class="inputline">
						<label for="mail" class="{{ $errors->has('mail') ? 'ui-state-error' : '' }}">Ihre Email<span class="mandatory">*</span></label>
						<input id="mail" name="mail" type="text" value="{{ Input::old('mail') }}" class="text{{ $errors->has('mail') ? ' ui-state-error' : '' }}" />
						<div class="error-desc"></div>
					</div>
					<div class="inputline">
						<label for="phone">Telefon</label>
						<input id="phone" name="phone" type="text" value="{{ Input::old('phone') }}" class="text" />
						<div class="error-desc"></div>
					</div>
					<h2>3. Ihre Frage/Ihr Feedback<br /></h2>
					<div class="textarea">
						<label for="msg" class="label{{ $errors->has('msg') ? ' ui-state-error' : '' }}">Geben Sie hier Ihre Frage/ Ihr Feedback ein<span class="mandatory">*</span></label>
						<textarea id="msg" name="msg" rows="6" class="{{ $errors->has('msg') ? 'ui-state-error' : '' }}">{{ Input::old('msg') }}</textarea>
						<div class="error-desc"></div>
					</div>
					<div class="inputline captcha" style="margin: 15px 0;">
						<p>Bitte geben Sie die im Bild angezeigten Zeichen im Textfeld ein.*</p>
						<div id="recaptcha_widget" style="">
							<div class="g-recaptcha" data-sitekey="{{ Config::get('recaptcha.public_key') }}"></div>
						</div>
						<div class="error-desc"></div>
					</div>
					<div class="btn_wrapper">
						<input type="submit" class="submit buttonFlat" name="contact" value="Senden" />
					</div>
					<div class="text mandatory-note">
						<p class="last">*Pflichtfelder </p>
					</div>
				</form>
			</div>
			<div class="section_right">
				<h2>Kontakt</h2>
				<ul>
					<li class="last">
						<div class="content">
							<p>Sie haben Fragen oder benötigen weitere Informationen?</p>
							<div class="richtext-output">
								<p>Kontaktieren Sie uns direkt oder füllen Sie das Kontaktformular aus.</p>
								<p class="bold">Sanofi-Aventis Deutschland GmbH</p>
								<p class="last">Industriepark Hoechst, K703<br />Brüningstr. 50<br />65926 Frankfurt am Main</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>


@stop 