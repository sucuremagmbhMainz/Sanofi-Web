@extends('layouts.mobilemaster')

@section('styles')
    @parent

@stop

@section('scripts')
    @parent

@stop

@section('content')
    <div itemscope itemtype="http://schema.org/Drug">
        <div id="wrapper" class="productDetail productDulcoSoft">

            <div class="box_content">
                <div class="product_desc">
                    <div class="product_header">
                        <h2 class="product_name blue">{{ trans('content.header_80') }}</h2>
						<h3 class="product_subheader blue">{{ trans('content.header_251') }}</h3>
                    </div>
                    <div class="product_image softener_img mbalance_img">
                        <img src="{{URL::to('static_resources/mobile/images/packshots/DulcoSoft_Loesung_Packshot_2.png')}}"
                             alt="{{ trans('content.header_80a') }}" title="{{ trans('content.header_80a') }}">
                    </div>
                    <div class="product_details">
                        <ul>
                            <li class="blue"><span>Weicht harten Stuhl auf und erleichtert den Stuhlgang</span></li>
                            <li class="blue"><span>Sanfte Wirkweise dank Macrogol 4000</span></li>
                            <li class="blue"><span>Medizinprodukt (physikalische Wirkung)</span></li>
                            <li class="blue"><span>Frei von Aroma, Kochsalz, Zucker und Gluten</span></li>
                            <li class="blue"><span>Packungsgröße: 250 ml (Lösung)</span></li>
                        </ul>
                        <div class="pd_buttons">
                            <a class="learnMore hash_reload bg-blue" href="#produktdetails">{{ trans('content.common_0005') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" rel="tab5"
                                   class="buy hash_reload bg-blue">{{ trans('content.common_2') }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- tabs -->

                <div id="tabs-detail" class="add_margin" name="tab-area">
                    <ul class="tabs_menu">
                        <li class="tab_item" name="produktdetails" id="tab-produktdetails">
                            <a href="#produktdetails" onclick="stop()" class="tab_active"><span itemprop="name">Produktdetails</span></a>
                        </li>
                        <li class="tab_item" name="produktdetails-flussig" id="tab-produktdetails-flussig">
                            <a href="#produktdetails-flussig" onclick="stop()"> <span itemprop="name">Dosierung und Anwendung</span></a>
                        </li>
                        <li class="tab_item" name="wirkung" id="tab-wirkung">
                            <a href="#wirkung" onclick="stop()" class="padding-top-increase">{{ trans('content.tabs_2') }}</a>
                        </li>
                        <li class="tab_item" name="beipackzettel" id="tab-beipackzettel">
                            <a href="#beipackzettel" onclick="stop()" class="padding-top-increase">Gebrauchsanweisung</a>
                        </li>
                    </ul>
                    <div class="tabs_content">
                        <h3 onclick="stop()">Produktdetails</h3>
                        <div id="produktdetails" class="tab_content">
							<span itemprop="description">
								<b>Stoff oder Substanz</b><br/>
								Macrogol 4000, salzfrei – für Patienten mit kochsalzarmer Diät geeignet<br/>
								<b>Darreichungsform</b><br/>
								Aromafreie Lösung zum Einnehmen – mit einem Getränk der Wahl mischbar<br/>
								<b>Beginn der Wirkungsweise</b><br/>
								Für einen weichen Stuhl nach 24-72 Std. (meist innerhalb eines Tages)<br/>
								<b>Für wen?</b><br/>
								Für alle, die von hartem, trockenem Stuhl betroffen sind.<br/>
							</span>
                        </div>

                        <h3 onclick="stop()">Dosierung und Anwendung</h3>
                        <div id="produktdetails-flussig" class="tab_content">
                            <span itemprop="description">
								DulcoSoft<sup><sup>&reg;</sup></sup> ist auch geeignet für Schwangere, stillende Mütter<sup>1</sup>, Diabetiker und Kinder ab 2 Jahre (Lösung<sup>2</sup>) bzw. 8 Jahre (Pulver)<br/>
								<span style="font-size: smaller;"><sup>1</sup> Es ist ratsam, vor der Einnahme einen Arzt zu fragen<br/>
								<sup>2</sup> Die Anwendung bei Kindern bis 8 Jahre sollte nur auf ärztliche Anweisung erfolgen</span><br/><br/>
								<b>Vorteile Lösung:</b><br/>
								Individuelle Dosierung nach dem persönlichen Bedarf<br/><br/>
								<img style="max-width: 100%;" src="{{URL::to('static_resources/mobile/images/DulcoSoft_Dosierung_und_Anwendung.jpg')}}" alt="Dosierung und Anwendung" title="Dosierung und Anwendung"><br/>
							</span>
                        </div>

                        <h3 onclick="stop()">{{ trans('content.tabs_2') }}</h3>
                        <div id="wirkung" class="tab_content">
                            <p>DulcoSoft<sup>&reg;</sup> ist eine salzfreie Macrogol-Rezeptur. Das Macrogol funktioniert ähnlich wie ein Schwamm. Es nimmt das getrunkene Wasser auf und transportiert es gezielt in den Darm. Dort wird der Stuhl aufgeweicht und gewinnt an Volumen. Die natürliche Darmbewegung setzt ein und die Verdauung wird sanft in Gang gebracht – für einen normalen, weichen Stuhl innerhalb von ca. 24-72 Stunden, meist innerhalb eines Tages.</p>
                            <p>*frei von Natriumchlorid, Kaliumchlorid, Natriumhydrogencarbonat.</p><br/>                            
                        </div>
                        
						<h3 onclick="stop()">Gebrauchsanweisung</h3>
                        <div id="beipackzettel" class="tab_content clearfix">                                                     
                            <a class="underline pdf-link blue" target="_blank" href="{{URL::to('pdf/5_GI Gebrauchsanweisung DulcoSoft Lösung.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png" alt="{{ trans('content.common_107b') }}" title="{{ trans('content.common_107b') }}">
								<span class="pdf-text">DulcoSoft<sup>&reg;</sup> Lösung (Medizinprodukt) Gebrauchsanweisung</span>
							</a>
                            <br><br><br>
                            
							<!-- Info from PDF Lösung  -->
                            <h4>Gebrauchsanweisung: Information für den Anwender</h4>

							<p><strong>DulcoSoft<sup>&reg;</sup> Lösung</strong><br>
							Lösung zum Einnehmen<br>
							5 g Macrogol 4000 in 10 ml Wasser</p>

							<p>Liebe Patientin, lieber Patient, bitte lesen Sie die folgende Gebrauchsanweisung sorgfältig durch, denn sie enthält wichtige Informationen darüber, was Sie bei der Anwendung von DulcoSoft Lösung beachten sollen. Wenden Sie sich bei Fragen bitte an Ihren Arzt oder Apotheker.</p>

							<p>DulcoSoft Lösung ist ein Medizinprodukt zur Aufweichung von hartem Stuhl und zur symptomatischen Behandlung von unregelmäßigem, hartem Stuhlgang.</p>
							
							<p>Heben Sie diese Gebrauchsanweisung auf. Vielleicht möchten Sie diese später nochmals lesen.</p>

							<p>In dieser Gebrauchsanweisung:<br>
							1.	Was ist DulcoSoft Lösung und wofür wird sie angewendet?<br>
							2.	Was ist DulcoSoft Lösung und wofür wird sie angewendet?<br>
							3.	Wie ist DulcoSoft Lösung einzunehmen?<br>
							4.	Welche Nebenwirkungen sind möglich?<br>
							5.	Wie ist DulcoSoft Lösung aufzubewahren?<br>
							6.	Weitere Informationen</p>

							<p><strong>1. Was ist DulcoSoft Lösung und wofür wird es angewendet?</strong></p>
							
							<p>Ist die normale Darmtätigkeit verlangsamt, kann dies zu hartem, kompaktem Stuhl mit einem erschwerten und schmerzhaften Stuhlgang führen. DulcoSoft Lösung enthält den osmotisch aktiven Wirkstoff Macrogol 4000, der Wasser bindet und so den Flüssigkeitsgehalt im Dickdarm erhöht. Auf diese Weise wird harter Stuhl aufgeweicht und der Weitertransport durch den Darm erleichtert - für einen regelmäßigen, erleichterten Stuhlgang.</p>

						   <p>Macrogol 4000 wirkt rein physikalisch. Die Aufnahme in den Blutkreislauf ist vernachlässigbar; es verbleibt im Darm, von wo aus es  unverändert wieder ausgeschieden wird.<br>
						   Die Wirksamkeit des Produktes bleibt auch bei längerer Anwendung unverändert.</p>

						   <p>DulcoSoft Lösung wird angewendet zur:<br>
						   – Aufweichung von hartem Stuhl<br>
						   – Erleichterung bei unregelmäßigem, hartem Stuhlgang</p>

						   <p><strong>2. Was sollten Sie vor der Einnahme von DulcoSoft Lösung beachten?</strong></p>
						   
						   <p>DulcoSoft Lösung darf nicht eingenommen werden,</p>

						   <p>- wenn Sie überempfindlich (allergisch) gegen Macrogol (Polyethylenglykol) oder einen der sonstigen Bestandteile von DulcoSoft Lösung sind (siehe 6. Weitere Informationen).<br>
						   - bei schwerer entzündlicher Darmerkrankung (wie z. B. Colitis Ulcerosa, Morbus Crohn) oder abnormer Darmweitstellung (toxisches Megakolon).<br>
						   -	bei Darmdurchbruch bzw. Gefahr eines Darmdurchbruchs.<br>
						   -	bei Darmverschluss oder Verdacht auf Darmverschluss oder Darmverengung.<br>
						   -	bei Schmerzen im Bauchraum unbekannter Ursache.</p>

						   <p>Nehmen Sie dieses Produkt nicht ein, wenn eine der oben aufgeführten Krankheiten bei Ihnen vorliegt. Wenn Sie sich nicht ganz sicher sind, fragen Sie zuerst Ihren Arzt oder Apotheker, bevor Sie DulcoSoft Lösung einnehmen.</p>

						   <p><strong>Besondere Vorsicht bei der Einnahme von DulcoSoft Lösung ist erforderlich.</strong><br>
						   Wie bei jedem Abführmittel sollte vor Beginn der Behandlung eine organische Ursache ausgeschlossen werden. Ohne Abklärung der Ursache der Darmbeschwerden sollte DulcoSoft Lösung nicht über längere Zeit regelmäßig täglich eingenommen werden. Im Fall andauernder Bauchschmerzen sollten Sie einen Arzt aufsuchen.</p>

						   <p>Bei Durchfall ist bei Patienten, die zu Störungen des Wasser- oder Salz-(Elektrolyt)haushalts neigen, Vorsicht geboten (z. B. bei älteren Patienten, bei Patienten mit Leber- oder Nierenfunktionsstörung oder bei Patienten, die Diuretika (Wasser-Tabletten) einnehmen), und es sollte eine Überwachung der Elektrolytwerte erwogen werden.</p>

						   <p>Bei Patienten, die Macrogol enthaltende Präparate eingenommen haben, sind allergische Reaktionen (wie anaphylaktischer Schock, anaphylaktische Reaktion, Angioödem (z. B. Gesichtsschwellung), Nesselsucht, Ausschlag und Überempfindlichkeit) beobachtet worden.</p>

						   <p><strong>Wenn Sie eines der oben genannten Anzeichen oder Symptome bei sich bemerken, sollten Sie die Einnahme von DulcoSoft Lösung beenden und sofort einen Arzt aufsuchen.</strong></p>

						   <p><strong>Schwangerschaft und Stillzeit</strong><br>
						   DulcoSoft Lösung kann während Schwangerschaft und Stillzeit eingenommen werden, da die Resorption von Macrogol 4000 vernachlässigbar ist und aus diesem Grund keine Auswirkungen zu erwarten sind. Jedoch ist es ratsam, wenn Sie schwanger sind oder stillen, vor der Einnahme von DulcoSoft Lösung Ihren Arzt zu fragen.</p>

						   <p><strong>Anwendung bei Kindern</strong><br>
						   Dieses Medizinprodukt darf bei Kindern unter 2 Jahren nicht angewendet werden.</p>

						   <p><strong>Anwendung bei Diabetikern</strong><br>
						   DulcoSoft Lösung ist für Diabetiker geeignet. Die Lösung enthält keinen Zucker.</p>

						   <p><strong>Einnahme von DulcoSoft Lösung zusammen mit Arzneimitteln</strong><br>
						   Macrogol 4000 erhöht den osmotischen Druck im Darm und kann somit die Aufnahme von anderen gleichzeitig verabreichten Präparaten verändern.</p>
						   
						   <p>Bitte informieren Sie Ihren Arzt oder Apotheker, wenn Sie andere Arzneimittel einnehmen/anwenden bzw. vor kurzem eingenommen/angewendet haben, oder wenn andere Arzneimittel bei Ihrem Kind angewendet wurden/werden, auch wenn es sich um nicht verschreibungspflichtige Arzneimittel handelt.</p>

						   <p><strong>3. Wie ist DulcoSoft Lösung einzunehmen?</strong></p>
						   
						   <p>Nehmen Sie DulcoSoft Lösung immer genau nach der Anweisung in dieser Gebrauchsanweisung ein. Wenn Sie sich nicht ganz sicher sind, fragen Sie Ihren Arzt oder Apotheker.</p>

							<p>Die Anwendung bei Kindern bis 8 Jahre sollte nur auf ärztliche Anweisung erfolgen.</p>

							<p><strong>Erwachsene und Kinder ab 8 Jahren:</strong><br>
							Falls vom Arzt nicht anders verordnet, ist die übliche Dosis:<br>
							20 bis 40 ml Lösung (entspricht 10 bis 20 g Macrogol 4000) pro Tag, vorzugsweise als eine Dosis morgens.</p>

							<p><strong>Kinder von 4 bis 7 Jahren:</strong><br>
							Falls vom Arzt nicht anders verordnet, ist die übliche Dosis:<br>
							16 bis 32 ml Lösung (entspricht 8 bis 16 g Macrogol 4000) pro Tag, vorzugsweise als eine Dosis morgens.</p>
							
							<p><strong>Kinder von 2 bis 3 Jahren:</strong><br>
							Falls vom Arzt nicht anders verordnet, ist die übliche Dosis:<br>
							8 bis 16 ml Lösung (entspricht 4 bis 8 g Macrogol 4000) pro Tag, vorzugsweise als eine Dosis morgens.</p>
							
							<p>Die Dosis von DulcoSoft Lösung wird mit dem beigefügten Dosierbecher abgemessen und kann je nach erzielter Wirkung angepasst werden. Die richtige Dosis ist die niedrigste Dosis, die zu regelmäßigem, weichem Stuhl führt.</p>
							
							<p>DulcoSoft Lösung ist für die tägliche Anwendung geeignet. Entsprechend des persönlichen Bedarfs kann die empfohlene Dosierung täglich oder jeden 2. Tag eingenommen werden. Die Einnahme von DulcoSoft Lösung sollte nur verdünnt erfolgen. DulcoSoft Lösung ist aromafrei und kann mit einem Getränk Ihrer Wahl, z.B. mit einem Glas (ca. 150 ml) Wasser, Fruchtsaft oder Tee gemischt werden, um Ihrem persönlichen Geschmack zu entsprechen.</p>
							
							<p><strong>Bitte beachten Sie:</strong><br>
							Der Effekt von DulcoSoft Lösung tritt gewöhnlich 24 bis 72 Stunden nach der Einnahme ein. Klinische Studien zeigen, dass es bei regelmäßiger Anwendung normalerweise einmal pro Tag zu einer Darmentleerung kommt.<br>
							Wenn die Verstopfung länger anhält, sollte deren Ursache untersucht werden. Kinder sollten DulcoSoft Lösung nicht länger als 3 Monate einnehmen.</p>
							
							<p><strong>Wenn Sie eine größere Menge DulcoSoft Lösung eingenommen haben, als Sie sollten </strong><br>
							Sie müssen mit Durchfällen, Bauchschmerzen, Völlegefühl und Erbrechen rechnen, die nach Unterbrechen der Behandlung oder Verringerung der Dosis zum Stillstand kommen.<br>
							Hoher Flüssigkeitsverlust durch Durchfälle oder Erbrechen kann eine Korrektur des Salz- (Elektrolyt)haushalts erfordern, weswegen Sie einen Arzt kontaktieren sollten.</p>
							
							<p><strong>Wenn Sie die Einnahme von DulcoSoft Lösung vergessen haben</strong><br>
							Nehmen Sie nicht die doppelte Dosis ein, wenn Sie die vorherige Einnahme vergessen haben.</p>

							<p><strong>4. Welche Nebenwirkungen sind möglich?</strong></p>
							
							<p>DulcoSoft Lösung kann Nebenwirkungen haben, die aber nicht bei jedem auftreten müssen. Die Nebenwirkungen waren im Allgemeinen schwach und vorübergehend:</p>

							<p><span style="text-decoration: underline;">Erwachsene und Kinder:</span><br>
							Durchfall, Bauchschmerzen, Völlegefühl, Übelkeit, Erbrechen, Stuhlinkontinenz und Blähungen. Selten kann es zu allergischen Reaktionen (wie anaphylaktischer Schock, anaphylaktische Reaktion, Angioödem (z. B. Gesichtsschwellung), Nesselsucht, Ausschlag und Überempfindlichkeit) kommen.<br>
							Bei Durchfall kann in Betracht gezogen werden, ggf. therapeutische Maßnahmen gegen einen Salz(Elektrolyt)-/ Flüssigkeitsverlust einzuleiten. Durchfall verschwindet normalerweise bei Absetzen oder Reduktion der Dosis.</p>
							
							<p>Salz(Elektrolyt)-/ Flüssigkeitsverlust einzuleiten. Durchfall verschwindet normalerweise bei Absetzen oder Reduktion der Dosis.</p>
							
							<p>Bei Kindern kann Durchfall Wundsein um den After verursachen.</p>
							
							<p>Informieren Sie bitte Ihren Arzt oder Apotheker, wenn eine der aufgeführten Nebenwirkungen Sie erheblich beeinträchtigt oder Sie Nebenwirkungen bemerken, die nicht in dieser Gebrauchsanweisung angegeben sind.</p>

							<p><strong>5. Wie ist DulcoSoft Lösung aufzubewahren?</strong></p>
							
							<p>Für Kinder unzugänglich aufbewahren.<br>
							Bitte verwenden Sie DulcoSoft Lösung nicht mehr nach dem auf der Faltschachtel und dem Flaschenetikett angegebenen Verfalldatum. Das Verfalldatum bezieht sich auf den letzten Tag des Monats.<br>
							Bitte lagern Sie DulcoSoft Lösung nicht über 25 °C und nicht im Kühlschrank. Nach dem Öffnen der Flasche ist DulcoSoft Lösung noch 6 Wochen haltbar.</p>

							<p><strong>6. Weitere Informationen</strong></p>
							
							<p>10 ml Lösung zum Einnehmen enthalten:<br>
							5 g Macrogol 4000 in gelöster Form.</p>

							<p>Die Lösung zum Einnehmen ist als Packung mit 250 ml erhältlich.</p>
							
							<p>Sonstige Bestandteile: Macrogol 400, Citronensäure, Kaliumsorbat (Konservierungsmittel) und gereinigtes Wasser.</p>
							
							<p><strong>Hersteller:</strong><br>
							Hälsa Pharma GmbH<br>
							Maria-Goeppert-Straße 5<br>
							23562 Lübeck</p>
							
							<p><strong>Vertrieb:</strong><br>
							Sanofi-Aventis Deutschland GmbH 65926 Frankfurt am Main</p>
							
							<p>Postanschrift:<br>
							Postfach 80 08 60<br>
							65908 Frankfurt am Main<br>
							Telefon: 0800 56 56 010<br>
							Telefax: 0800 56 56 011<br>
							www.dulcolax.de</p>
							
							<p>Apothekenexklusives Medizinprodukt</p>
							
							<p><strong>CE0482</strong></p>
														
							<p>Stand der Information: März 2018</p>

							<p>*kochsalzfrei<br>
							*geeignet für Patienten unter kochsalzarmer Diät. Außerdem frei von Kaliumchlorid und Natriumhydrogencarbonat.<br>
							*zuckerfrei: Für Diabetiker geeignet.<br>
							*glutenfrei</p>

							<p>Wir wünschen Ihnen gute Besserung!</p>
                            <!-- END Info from PDF fluessig -->
                            
							<a class="underline pdf-link blue" target="_blank" href="{{URL::to('pdf/5_GI Gebrauchsanweisung DulcoSoft Lösung.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png" alt="{{ trans('content.common_107b') }}" title="{{ trans('content.common_107b') }}">
								<span class="pdf-text">DulcoSoft<sup>&reg;</sup> Lösung (Medizinprodukt) Gebrauchsanweisung</span>
							</a>
							
                        </div>
                    </div>
                </div>


                <!-- grid -->
                <div class="product_grid">
                    <h4>{{ trans('content.common_8b') }}</h4>
                    @include('includes.related-products')

                </div>
            </div>
        </div>
    </div>
@stop
