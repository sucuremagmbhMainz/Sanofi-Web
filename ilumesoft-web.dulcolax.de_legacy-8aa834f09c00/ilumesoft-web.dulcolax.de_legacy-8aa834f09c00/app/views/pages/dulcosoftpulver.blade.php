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
                        <h2 class="product_name blue">{{ trans('content.header_81') }}</h2>
						<h3 class="product_subheader blue">{{ trans('content.header_251') }}</h3>
                    </div>
                    <div class="product_image softener_img mbalance_img">
                        <img class="add_height"
                             src="{{URL::to('static_resources/mobile/images/packshots/DulcoSoft_Pulver_Packshot_2.png')}}"
                             alt="{{ trans('content.header_83a') }}" title="{{ trans('content.header_83a') }}">
                    </div>
                    <div class="product_details">
                        <ul>
                            <li class="blue"><span>Weicht harten Stuhl auf und erleichtert den Stuhlgang</span></li>
                            <li class="blue"><span>Sanfte Wirkweise dank Macrogol 4000</span></li>
                            <li class="blue"><span>Medizinprodukt (physikalische Wirkung)</span></li>
                            <li class="blue"><span>Frei von Aroma, Kochsalz, Zucker und Gluten</span></li>
                            <li class="blue"><span>Packungsgröße: 20 (Pulver)</span></li>
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
								Pulver zum Auflösen und Trinken - aromafrei<br/>
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
								<b>Vorteile Pulver:</b><br/>
								Vordosierte praktische Beutel, elektrolytfrei und kochsalzfrei<br/><br/>
								<img style="max-width: 100%;" src="{{URL::to('static_resources/mobile/images/DulcoSoft_Dosierung_und_Anwendung.jpg')}}" alt="Dosierung und Anwendung" title="Dosierung und Anwendung"><br/>
							</span>
                        </div>

                        <h3 onclick="stop()">Gebrauchsanweisung</h3>
                        <div id="wirkung" class="tab_content">
                            <p>DulcoSoft<sup>&reg;</sup> ist eine salzfreie Macrogol-Rezeptur. Das Macrogol funktioniert ähnlich wie ein Schwamm. Es nimmt das getrunkene Wasser auf und transportiert es gezielt in den Darm. Dort wird der Stuhl aufgeweicht und gewinnt an Volumen. Die natürliche Darmbewegung setzt ein und die Verdauung wird sanft in Gang gebracht – für einen normalen, weichen Stuhl innerhalb von ca. 24-72 Stunden, meist innerhalb eines Tages.</p>
                            <p>*frei von Natriumchlorid, Kaliumchlorid, Natriumhydrogencarbonat.</p><br/>                            
                        </div>
                        <h3 onclick="stop()">{{ trans('content.tabs_8a') }}</h3>
                        <div id="beipackzettel" class="tab_content clearfix">
                          <a class="underline pdf-link blue" target="_blank" href="{{URL::to('pdf/6_GI Gebrauchsanweisung DulcoSoft Pulver.pdf')}}">
                              <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                   alt="{{ trans('content.common_107a') }}" title="{{ trans('content.common_107a') }}">
                              <span class="pdf-text">DulcoSoft<sup>&reg;</sup> Pulver (Medizinprodukt) Gebrauchsanweisung</span>
                          </a>
                          <br><br><br>
                          
                            <!-- Info from PDF pulver -->
                            <h4>Gebrauchsanweisung: Information für den Anwender</h4>

							<p><strong>DulcoSoft<sup>&reg;</sup> Pulver</strong><br>
							Pulver zur Herstellung einer Lösung zum Einnehmen<br>
							Macrogol 4000</p>

							<p><strong>Was Sie wissen sollten über DulcoSoft<sup>&reg;</sup> Pulver </strong><br>
							Bitte lesen Sie diese Gebrauchsanweisung aufmerksam durch, da sie wichtige Informationen enthält, die Sie vor der Einnahme dieses Medizinprodukts beachten müssen. Wenn Sie sich nicht sicher sind oder weitere Fragen haben, wenden Sie sich an Ihren Arzt oder Apotheker.</p>

							<p>DulcoSoft<sup>&reg;</sup> Pulver ist ein Medizinprodukt zur Aufweichung von hartem Stuhl und zur symptomatischen Behandlung von unregelmäßigem, hartem Stuhlgang.</p>
							
							<p>Heben Sie diese Gebrauchsanweisung auf. Vielleicht möchten Sie diese später nochmals lesen.</p>

							<p>In dieser Gebrauchsanweisung:<br>
							1. Was ist DulcoSoft<sup>&reg;</sup> Pulver und wofür wird es angewendet?<br>
							2. Was sollten Sie vor der Einnahme von DulcoSoft<sup>&reg;</sup> Pulver beachten?<br>
							3. Wie ist DulcoSoft<sup>&reg;</sup> Pulver einzunehmen?<br>
							4. Welche Nebenwirkungen sind möglich?<br>
							5. Wie ist DulcoSoft<sup>&reg;</sup> Pulver aufzubewahren?<br>
							6. Weitere Informationen</p>

							<p><strong>1. Was ist DulcoSoft<sup>&reg;</sup> Pulver und wofür wird es angewendet?</strong></p>
							
							<p>Ist die normale Darmtätigkeit verlangsamt, kann dies zu hartem, kompaktem Stuhl mit einem erschwerten und schmerzhaften Stuhlgang führen. DulcoSoft<sup>&reg;</sup> Pulver enthält den osmotisch aktiven Wirkstoff Macrogol 4000, der Wasser bindet und so den Flüssigkeitsgehalt im Dickdarm erhöht. Auf diese Weise wird harter Stuhl aufgeweicht und der Weitertransport durch den Darm wird erleichtert - für einen regelmäßigen und erleichterten Stuhlgang.</p>

						   <p>Macrogol 4000 wirkt rein physikalisch. Die Aufnahme in den Blutkreislauf ist vernachlässigbar; es verbleibt im Darm, von wo aus es unverändert wieder ausgeschieden wird.</p>

						   <p>DulcoSoft<sup>&reg;</sup> Pulver wird angewendet zur:<br>
						   – Aufweichung von hartem Stuhl<br>
						   – Erleichterung bei unregelmäßigem, hartem Stuhlgang</p>

						   <p><strong>2. Was sollten Sie vor der Einnahme von DulcoSoft<sup>&reg;</sup> Pulver beachten?</strong></p>
						   
						   <p>DulcoSoft<sup>&reg;</sup> Pulver darf nicht eingenommen werden,</p>

						   <p>•	wenn Sie überempfindlich gegen den Wirkstoff sind (siehe Zusammensetzung).<br>
						   •	bei schwerer entzündlicher Darmerkrankung (wie z.B. Colitis ulcerosa, Morbus Crohn) oder abnormer Darmweitstellung (toxisches Megakolon).<br>
						   •	bei Darmdurchbruch bzw. Gefahr eines Darmdurchbruchs.<br>
						   •	bei Darmverschluss oder Verdacht auf Darmverschluss oder Darmverengung.<br>
						   •	bei Schmerzen im Bauchraum unbekannter Ursache.</p>

						   <p>Nehmen Sie DulcoSoft<sup>&reg;</sup> Pulver nicht ein, wenn einer der oben genannten Punkte auf Sie zutrifft. Wenn Sie sich nicht sicher sind, fragen Sie vor der Einnahme von DulcoSoft<sup>&reg;</sup> Pulver Ihren Arzt oder Apotheker.</p>

						   <p><strong>Besondere Vorsicht ist geboten</strong><br>
						   Wie bei jedem Abführmittel sollte vor Beginn der Behandlung eine organische Ursache ausgeschlossen werden. Ohne Klärung der Ursache der Darmbeschwerden sollte DulcoSoft<sup>&reg;</sup> Pulver nicht über längere Zeit regelmäßig täglich eingenommen werden. Im Fall andauernder Bauchschmerzen sollten Sie einen Arzt aufsuchen.</p>

						   <p>Bei Durchfall ist bei Patienten, die zu Störungen des Wasser- oder Elektrolythaushalts neigen, Vorsicht geboten (z.B. bei älteren Patienten, bei Patienten mit Leber- oder Nierenfunktionsstörung oder bei Patienten, die Diuretika einnehmen), und es sollte eine Überwachung der Elektrolytwerte erwogen werden.</p>

						   <p>Bei Patienten, die Macrogol enthaltende Präparate eingenommen haben, sind allergische Reaktionen (wie anaphylaktischer Schock, anaphylaktische Reaktion, Angioödem (z.B. Gesichtsschwellung), Nesselsucht, Ausschlag und Überempfindlichkeit) beobachtet worden.</p>

						   <p><strong>Wenn Sie eines der oben genannten Anzeichen oder Symptome bei sich bemerken, sollten Sie die Einnahme von DulcoSoft<sup>&reg;</sup> Pulver beenden und sofort einen Arzt aufsuchen.</strong></p>

						   <p><strong>Schwangerschaft und Stillzeit</strong><br>
						   DulcoSoft<sup>&reg;</sup> Pulver kann während Schwangerschaft und Stillzeit eingenommen werden, da die Resorption von Macrogol 4000 vernachlässigbar ist und aus diesem Grund keinerlei Auswirkungen zu erwarten sind. Jedoch ist es ratsam, wenn Sie schwanger sind oder stillen, vor der Einnahme von DulcoSoft<sup>&reg;</sup> Pulver Ihren Arzt zu fragen.</p>

						   <p><strong>Anwendung bei Kindern</strong><br>
						   Dieses Medizinprodukt darf bei Kindern unter 8 Jahren nicht angewendet werden.</p>

						   <p><strong>Anwendung bei Diabetikern</strong><br>
						   DulcoSoft<sup>&reg;</sup> Pulver ist für Diabetiker geeignet. Das Pulver enthält keinen Zucker.</p>

						   <p><strong>Einnahme von DulcoSoft<sup>&reg;</sup> Pulver zusammen mit Arzneimitteln</strong><br>
						   Macrogol 4000 erhöht den osmotischen Druck im Darm und kann daher die Resorption gleichzeitig verabreichter Präparate im Darm beeinflussen.</p>

						   <p><strong>3. Wie ist DulcoSoft<sup>&reg;</sup> Pulver einzunehmen?</strong></p>
						   
						   <p>Nehmen Sie DulcoSoft<sup>&reg;</sup> Pulver immer genau wie in dieser Gebrauchsanweisung beschrieben ein. Wenn Sie sich nicht sicher sind, fragen Sie Ihren Arzt oder Apotheker.</p>

							<p>DulcoSoft<sup>&reg;</sup> Pulver ist aromafrei, hat einen neutralen Geschmack und kann in einem Getränk Ihrer Wahl, z.B. in Wasser, Fruchtsaft oder Tee aufgelöst werden, um Ihrem persönlichen Geschmack zu entsprechen. Lösen Sie den Inhalt eines Beutels unmittelbar vor dem Einnehmen in einem Glas Flüssigkeit (etwa 150 ml) auf.</p>

							<p><strong>Erwachsene und Kinder ab 8 Jahren:</strong><br>
							Falls vom Arzt nicht anders verordnet, beträgt die übliche Dosis:<br>
							1 - 2 Beutel pro Tag aufgelöst in Flüssigkeit (entspricht 10 - 20 g Macrogol 4000), einzunehmen vorzugsweise als Einzeldosis am Morgen.</p>

							<p>Kinder unter 8 Jahren sollten dieses Medizinprodukt nicht anwenden.</p>
							
							<p>Im Rahmen der Dosisempfehlung kann die Dosis an Ihre individuellen Bedürfnisse angepasst werden. Sie kann zwischen einem Beutel jeden zweiten Tag und zwei Beuteln pro Tag betragen. Die richtige Dosis ist die niedrigste Dosis, die zu regelmäßigem, weichem Stuhl führt.</p>

							<p><strong>Bitte beachten Sie:</strong><br>
							Die Wirkung von DulcoSoft<sup>&reg;</sup> Pulver setzt in der Regel nach 24 - 72 Stunden ein. Klinische Studien zeigen, dass es bei regelmäßiger Anwendung normalerweise einmal pro Tag zu einer Darmentleerung kommt.<br>
							DulcoSoft<sup>&reg;</sup> Pulver sollte nicht länger als 28 Tage angewendet werden. Wenn die Verstopfung länger anhält, sollte deren Ursache untersucht werden.</p>
							
							<p><strong>Wenn Sie eine größere Menge eingenommen haben als Sie sollten</strong><br>
							Zu hohe Dosen von DulcoSoft<sup>&reg;</sup> Pulver können zu Durchfall, Bauchschmerzen, Völlegefühl und Erbrechen führen. Diese Symptome klingen ab, wenn die Behandlung unterbrochen oder die Dosis verringert wird.<br>
							Ein hoher Flüssigkeitsverlust infolge von Durchfall oder Erbrechen erfordert u. U. eine Wiederherstellung des Elektrolytgleichgewichts. Wenden Sie sich in diesem Fall an Ihren Arzt.</p>
							
							<p><strong>Wenn Sie die Einnahme von DulcoSoft<sup>&reg;</sup> Pulver vergessen haben</strong><br>
							Nehmen Sie nicht die doppelte Dosis DulcoSoft<sup>&reg;</sup> Pulver ein, wenn Sie die Einnahme vergessen haben.</p>

							<p><strong>4. Welche Nebenwirkungen sind möglich?</strong></p>
							
							<p>Die Nebenwirkungen sind in der Regel mild und vorübergehend.</p>

							<p><span style="text-decoration: underline;">Bei Erwachsenen:</span><br>
							Durchfall, Bauchschmerzen, Völlegefühl, Übelkeit, Erbrechen, Stuhlinkontinenz und Blähungen.<br>
							Selten können allergische Reaktionen (wie anaphylaktischer Schock, anaphylaktische Reaktion, Angioödem (z. B. Gesichtsschwellung), Nesselsucht, Ausschlag und Überempfindlichkeit) auftreten.</p>

							<p><span style="text-decoration: underline;">Bei Kindern:</span><br>
							Durchfall, Bauchschmerzen, Völlegefühl, Übelkeit, Erbrechen und Blähungen.<br>
							Selten können allergische Reaktionen (wie anaphylaktischer Schock, anaphylaktische Reaktion, Angioödem (z. B. Gesichtsschwellung), Nesselsucht, Ausschlag und Überempfindlichkeit) auftreten.</p>

							<p>Wenn eine dieser Nebenwirkungen Sie erheblich beeinträchtigt oder wenn Sie Nebenwirkungen bemerken, die nicht in dieser Gebrauchsanweisung angegeben sind, wenden Sie sich an Ihren Arzt oder Apotheker.</p>

							<p><strong>5. Wie ist DulcoSoft<sup>&reg;</sup> Pulver aufzubewahren?</strong></p>
							
							<p>Bewahren Sie Medizinprodukte für Kinder unzugänglich auf.<br>
							Sie dürfen DulcoSoft<sup>&reg;</sup> Pulver nach dem auf dem Umkarton angegebenen Verfalldatum nicht mehr verwenden. Das Verfalldatum bezieht sich auf den letzten Tag des angegebenen Monats.</p>

							<p>Bewahren Sie DulcoSoft<sup>&reg;</sup> Pulver nicht über 25 °C auf.</p>

							<p><strong>6. Weitere Informationen</strong></p>
							
							<p>1 Beutel enthält 10 g Macrogol 4000 als Pulver zur Herstellung einer Lösung zum Einnehmen (keine sonstigen Bestandteile).</p>

							<p>Das Pulver zur Herstellung einer Lösung zum Einnehmen ist erhältlich in Packungen mit 20 Beuteln.</p>
							
							<p>Geeignet für Patienten unter kochsalzarmer Diät.<br>
							Glutenfrei.</p>
							
							<p><strong>CE0197</strong></p>
							
							<p>Fairpharm Vertriebs GmbH<br>
							Am Krebsenbach 5 - 7<br>
							83670 Bad Heilbrunn<br>
							Deutschland</p>

							<p><strong>Vertrieb:</strong><br>
							Sanofi-Aventis Deutschland GmbH<br>
							65926 Frankfurt am Main</p>
							
							<p>Postanschrift:<br>
							Postfach 80 08 60<br>
							65908 Frankfurt am Main</p>
							
							<p>Telefon: 0 800 56 56 010<br>
							Telefax: 0 800 56 56 011</p>

							<p><strong>Apothekenexklusives Medizinprodukt</strong></p>
							<p>Stand der Informationen: März 2018</p>
                            <!-- END Info from PDF pulver -->
                            
							<a class="underline pdf-link blue" target="_blank" href="{{URL::to('pdf/6_GI Gebrauchsanweisung DulcoSoft Pulver.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png" alt="{{ trans('content.common_107a') }}" title="{{ trans('content.common_107a') }}">
                                <span class="pdf-text">DulcoSoft<sup>&reg;</sup> Pulver (Medizinprodukt) Gebrauchsanweisung</span>
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
