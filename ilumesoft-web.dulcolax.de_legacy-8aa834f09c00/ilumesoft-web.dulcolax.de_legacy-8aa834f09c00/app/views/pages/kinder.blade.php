@extends('layouts.mobilemaster')

@section('styles')
    @parent

@stop

@section('scripts')
    @parent

@stop

@section('content')
    <div itemscope itemtype="http://schema.org/Drug">

        <div id="wrapper" class="productDetail section-nptropfen">

            <div class="box_content">
                <div class="product_desc">
                    <div class="product_header dulcogas_header">
						{{--<div class="product_recommended">
                            <img src="{{URL::to('static_resources/mobile/images/main-menu/slider/storer-100.png')}}"
                                 alt="Neu Storer" title="Neu Storer">
                        </div>--}}
                        <h2 class="product_name">{{ trans('content.header_214b') }}</h2>
                        {{--<div class="product_recommended" style="margin: 30px 0 0 -20px;">
                            <img src="{{ URL::to('static_resources/mobile/images/main-menu/slider/neu-storer.png')}}" alt="Neu Storeer" title="Neu Storer">
                        </div>--}}

                        <h3 class="product_subheader">{{ trans('content.header_230a') }}</h3>
                    </div>
                    <div class="product_image dragees_img">
                        <img src="{{URL::to('static_resources/mobile/images/packshots/Dulcolax_NP_Kinder_Tropfen_Packshot.png')}}"
                             alt="Dulcolax NP Kinder Tropfen" title="Dulcolax NP Kinder Tropfen">
                    </div>
                    {{--<p>{{ trans('content.header_230') }}</p>--}}
                    <div class="product_details">
                        <ul>
                            <li><span>Für Kinder ab 4 Jahre</span></li>
                            <li><span>Genau dosierbar: je nach Stärke der Verstopfung</span></li>
                            <li><span>Aromafrei: kann jedem Getränk beigemischt werden</span></li>
                            <li><span>Beliebteste Darreichungsform<sup>1</sup>: angenehmer als Zäpfchen und Klistiere</span></li>
                            <li><span>Packungsgröße : 15ml</span></li>
                        </ul>
                        <small><sup>1</sup>Ipsos Bus 03/2015: Repräsentative Mehrthemenumfrage n = 1.000 Personen in Deutschland</small>
                        <div class="pd_buttons">
                            <a class="learnMore hash_reload" href="#produktdetails">{{ trans('content.common_0002b') }}</a>
                            @if (false)
                                <a href="{{action('PageController@onlineshops')}}" rel="tab7"
                                   class="buy hash_reload">{{ trans('content.common_2') }}</a>
                            @endif
                        </div>
                          <!-- <div id="pdf-link">
                            <a target="_blank" href="{{URL::to('pdf/np-kinder-tropfen-malbuch.pdf')}}">
                                <img class="pdf-image" height="40" src="/static_resources/images/pdf-icon-download.png"
                                     alt="{{ trans('content.common_105') }}" title="{{ trans('content.common_105') }}">
                                      Gratis-Download: Malbuch
                            </a>
                          </div> -->
                    </div>
                </div>

                <!-- tabs -->

                <div id="tabs-detail" name="tab-area">
                    <ul class="tabs_menu">
                        <li class="tab_item" name="produktdetails" id="tab-produktdetails">
                            <a href="#produktdetails" class="tab_active"><span itemprop="name">Produktdetails</span></a>
                        </li>
                        <li class="tab_item" name="wirkung" id="tab-wirkung">
                            <a class="padding-top-increase" href="#wirkung">{{ trans('content.tabs_2') }}</a>
                        </li>
                        <li class="tab_item" name="hinweis" id="tab-hinweis">
                            <a class="padding-top-increase" href="#hinweis">{{ trans('content.tabs_3') }}</a>
                        </li>
                        <li class="tab_item" name="beipackzettel" id="tab-beipackzettel">
                            <a class="padding-top-increase padding-left-reduced" href="#beipackzettel">{{ trans('content.tabs_8') }}</a>
                        </li>
                    </ul>
                    <div class="tabs_content">
                        <h3>Produktdetails</h3>
                        <div id="produktdetails" class="tab_content">
                            {{ trans('content.kinder_tab1') }}
                        </div>

                        <h3>{{ trans('content.tabs_2') }}</h3>
                        <div id="wirkung" class="tab_content">
                            <p>{{ trans('content.kinder_tab2') }}</p>
                        </div>


                        <h3>{{ trans('content.tabs_3') }}</h3>
                        <div id="hinweis" class="tab_content">
                            <p>{{ trans('content.kinder_tab3') }}</p>
                        </div>


                        <h3>{{ trans('content.tabs_8') }}</h3>
                        <div id="beipackzettel" class="tab_content clearfix">
                        {{--<ul>--}}
                        {{--<li>--}}

                          <a class="pdf-link" target="_blank" href="{{URL::to('pdf/Dulcolax_NP_Kinder_Tropfen_Beipackzettel.pdf')}}">
                              <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                   alt="{{ trans('content.common_105k') }}" title="{{ trans('content.common_105k') }}"><span class="pdf-text">{{ trans('content.common_105k') }}</span></a>

                          <br><br><br>
                        <!-- Info from PDF -->
    <h4>GEBRAUCHSINFORMATION: INFORMATION FÜR DEN ANWENDER</h4>

    <p><strong>Dulcolax<sup>&reg;</sup> NP Kinder Tropfen</strong></p>

    <p><strong>7,5 mg/ml Tropfen zum Einnehmen, Lösung</strong></p>

    <p>Zur Anwendung bei Kindern ab 4 Jahren<br>
      Wirkstoff: Natriumpicosulfat-Monohydrat</p>

    <p style="border: 1px solid #000; padding: 5px;"><strong>Lesen Sie die gesamte Packungsbeilage sorgfältig durch, bevor Ihr Kind mit der Einnahme dieses Arzneimittels beginnt, denn sie enthält wichtige Informationen.</strong><br>
Wenden Sie dieses Arzneimittel bei Ihrem Kind immer genau wie in dieser Packungsbeilage beschrieben bzw. genau nach Anweisung Ihres Arztes oder Apothekers an.<br />
    • Heben Sie die Packungsbeilage auf. Vielleicht möchten Sie diese später nochmals lesen.<br>
    • Fragen Sie Ihren Apotheker, wenn Sie weitere Informationen oder einen Rat benötigen.<br>
    • Wenn Ihr Kind Nebenwirkungen bemerkt, wenden Sie sich an Ihren Arzt oder Apotheker. Dies gilt auch für Nebenwirkungen, die nicht in dieser Packungsbeilage angegeben sind. Siehe Abschnitt 4.<br>
    • Wenn Ihr Kind sich nicht besser oder gar schlechter fühlt, wenden Sie sich an Ihren Arzt.
    </p>

    <p><strong>Was in dieser Packungsbeilage steht:</strong><br>
    1. Was sind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen und wofür werden sie angewendet?<br>
    2. Was sollten Sie vor der Einnahme von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen beachten?<br>
    3. Wie sind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen einzunehmen?<br>
    4. Welche Nebenwirkungen sind möglich?<br>
    5. Wie sind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen aufzubewahren?<br>
    6. Inhalt der Packung und weitere Informationen</p>

    <p><strong>1. Was sind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen und wofür werden sie angewendet?</strong></p>
    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen sind ein Abführmittel.</p>
    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen werden angewendet bei Verstopfung sowie bei Erkrankungen, die eine erleichterte Stuhlentleerung erfordern. Wie andere Abführmittel sollten DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen ohne ärztliche Abklärung der Verstopfungsursache nicht täglich oder über einen längeren Zeitraum eingenommen werden.</p>

    <p><strong>2. Was sollten Sie vor der Einnahme von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen beachten?</strong></p>

    <p><strong>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen dürfen nicht eingenommen werden,</strong></p>

    <p>• wenn Ihr Kind allergisch gegen Natriumpicosulfat, verwandte Wirkstoffe aus der Gruppe der Triarylmethane oder einen der in Abschnitt 6. genannten sonstigen Bestandteile dieses Arzneimittels ist;<br>
    • wenn Ihr Kind eine Darmverengung mit verschlechterter Darmpassage oder einen Darmverschluss hat;<br>
    • wenn Ihr Kind an starken, akuten Bauchschmerzen mit oder ohne Fieber (z. B. Blinddarmentzündung), möglicherweise in Verbindung mit Übelkeit und Erbrechen leidet;<br>
    • wenn Ihr Kind an akut entzündlichen Erkrankungen des Magen-Darm-Traktes leidet;<br>
    • wenn der Körper Ihres Kindes einen erheblichen Flüssigkeitsmangel aufweist;<br>
    • wenn Ihr Kind an einer seltenen angeborenen Fructose-Unverträglichkeit leidet (siehe unten, Abschnitt „DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen enthalten Sorbitol“).</p>
    <p>Verstopfung, verbunden mit anderen Beschwerden wie Bauchschmerzen, Erbrechen und Fieber, kann Anzeichen einer ernsten Erkrankung (Darmverschluss, akute Entzündung im Bauchbereich) sein. Bei solchen Beschwerden darf Ihr Kind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen oder andere Arzneimittel nicht einnehmen und sollte unverzüglich einen Arzt aufsuchen.</p>

    <p>Bei Erkrankungen, die mit Störungen des Wasser- und Mineralsalzhaushaltes einhergehen (z. B. stark eingeschränkte Nierenfunktion), darf Ihr Kind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen nur unter ärztlicher Kontrolle einnehmen.</p>

    <p><strong>Warnhinweise und Vorsichtsmaßnahmen</strong></p>

    <p>Bitte sprechen Sie mit Ihrem Arzt oder Apotheker, bevor Ihr Kind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen einnimmt.<br /> Wenn die Beschwerden spontan aufgetreten sind, länger andauern und/oder von Symptomen wie Blut im Stuhl oder Fieber begleitet werden, sollte Ihr Kind sich vor Beginn einer Behandlung mit DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen von Ihrem Arzt beraten und untersuchen lassen, denn Störungen bzw. Beeinträchtigungen des Stuhlgangs können Anzeichen einer ernsten Erkrankung sein.</p>
    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen sollten ohne vorherige ärztliche Abklärung nicht ununterbrochen täglich oder über längere Zeiträume eingenommen werden.</p>
    <p>Wenn DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen abgesetzt werden, kann es zum Wiederauftreten der Symptome kommen. Nach langfristiger Anwendung bei chronischer Verstopfung kann das Wiederauftreten der Symptome auch mit einer Verschlimmerung der Verstopfung verbunden sein.</p>
    <p>Bei Patienten, die DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen eingenommen haben, wurde über Schwindelanfälle und kurzzeitige Anfälle von Bewusstlosigkeit (Synkopen) berichtet. Nach den entsprechenden Fallberichten handelt es sich dabei vermutlich um Synkopen, die entweder auf den Abführvorgang an sich, auf das Pressen oder auf Kreislaufreaktionen aufgrund von Unterleibsschmerzen zurückgehen.</p>

    <p><strong>Kinder</strong></p>

    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen sollten bei Kindern unter 4 Jahren nicht angewendet werden.<br /> Bitte wenden Sie DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen bei Ihrem Kind erst nach Rücksprache mit Ihrem Arzt an, wenn Ihnen bekannt ist, dass Ihr Kind unter einer Unverträglichkeit gegenüber bestimmten Zuckern leidet.</p>

    <p><strong>Einnahme von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen zusammen mit anderen Arzneimitteln</strong></p>

    <p>Informieren Sie Ihren Arzt oder Apotheker, wenn Ihr Kind andere Arzneimittel einnimmt/anwendet, kürzlich andere Arzneimittel eingenommen/angewendet hat oder beabsichtigt, andere Arzneimittel einzunehmen/anzuwenden.</p>

    <p>Bei gleichzeitiger Einnahme von Antibiotika (Arzneimittel gegen bakterielle Infektionen) kann es zum Verlust der abführenden Wirkung von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen kommen.</p>

    <p>Bei übermäßigem Gebrauch von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen besteht das Risiko eines Ungleichgewichtes von Kalium und anderen Salzen im Blut. Bei gleichzeitiger Einnahme anderer Arzneimittel (z. B. harntreibende Mittel (Diuretika) oder Hormone der Nebennierenrinde (Kortikosteroide)) kann dieses Risiko erhöht sein. Dies kann zu Störungen der Herzfunktion und Muskelschwäche führen und die Empfindlichkeit gegenüber bestimmten Arzneimitteln zur Stärkung der Herzfunktion (herzwirksame Glykoside) erhöhen.</p>


    <p><strong>Schwangerschaft und Stillzeit</strong></p>

    <p>Wenn Ihr Kind schwanger ist oder stillt, oder wenn Ihr Kind vermutet, schwanger zu sein, fragen Sie vor der Einnahme dieses Arzneimittels Ihren Arzt oder Apotheker um Rat.</p>
    <p>Es liegen keine aussagekräftigen klinischen Studien zur Anwendung in der Schwangerschaft vor. Auf eine Anwendung in der Schwangerschaft sollte möglichst verzichtet werden.</p>
    <p>Es hat sich gezeigt, dass weder Wirkform noch Abbauprodukte in die Muttermilch übertreten. DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen können daher während der Stillzeit angewendet werden.</p>

    <p><strong>Verkehrstüchtigkeit und Fähigkeit zum Bedienen von Maschinen</strong></p>
    <p>Bei der Anwendung von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen in der vorgesehenen Dosierung ist normalerweise keine Beeinträchtigung zu erwarten. Sollten aber dennoch Symptome wie Schwindel, kurzzeitige Bewusstlosigkeit (Synkope) oder Bauchkrämpfe auftreten, dann kann die Fähigkeit zur Teilnahme am Straßenverkehr und zum Bedienen von Maschinen beeinträchtigt werden.</p>

    <p><strong>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen enthalten Sorbitol</strong></p>
    <p>Dieses Arzneimittel enthält ca. 450 mg Sorbitol je 1 ml Lösung. Dies entspricht einer Menge von ca. 300 mg Sorbitol berechnet auf die maximal empfohlene Tagesdosis für Kinder. Bitte wenden Sie DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen bei Ihrem Kind erst nach Rücksprache mit Ihrem Arzt an, wenn Ihnen bekannt ist, dass Ihr Kind unter einer Unverträglichkeit gegenüber bestimmten Zuckern leidet.</p>

    <p><strong>3. Wie sind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen einzunehmen?</strong></p>
    <p>Wenden Sie dieses Arzneimittel bei Ihrem Kind immer genau wie in dieser Packungsbeilage beschrieben bzw. genau nach Anweisung Ihres Arztes oder Apothekers an. Fragen Sie bei Ihrem Arzt oder Apotheker nach, wenn Sie sich nicht sicher sind.</p>
    <p>Kinder ab 4 Jahren nehmen eine Einzeldosis von 5 - 9 Tropfen (entspricht 2,5 - 5 mg Natriumpicosulfat) ein.</p>
    <p>Es wird empfohlen, mit der niedrigsten Dosierung zu beginnen. Die Dosis kann bis zur maximal empfohlenen Dosis angepasst werden, um regelmäßigen Stuhlgang zu ermöglichen.<br>
      Die Tageshöchstdosis von 9 Tropfen sollte nicht überschritten werden.</p>
    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen werden am besten abends eingenommen. Die Einnahme kann mit oder ohne Flüssigkeit erfolgen. Die abführende Wirkung tritt normalerweise nach 10 - 12 Stunden ein.</p>
    <p>Beachten Sie bitte die Dauer bis zum Wirkeintritt und versuchen Sie nicht, durch starkes Pressen einen Stuhlgang zu erzwingen.</p>
    <table>
    <tr><td width="80px" style="border: 1px solid #000;"><img src="/static_resources/mobile/images/dulcolax_tropfen.jpg" alt="Dulcolax NP Tropfen gebrauchen" title="Dulcolax NP Tropfen gebrauchen"></td><td style="vertical-align: middle; border: 1px solid #000; padding: 10px;">Flasche zum Tropfen mit dem Tropfer nach unten senkrecht halten (Abb.).<br><br>Nicht schütteln!<br><br>Wenn der Tropfvorgang nicht sofort beginnt, bitte leicht auf den Flaschenboden klopfen.</td></tr>
    </table>

    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen sollten ohne vorherige ärztliche Abklärung nicht ununterbrochen täglich oder über längere Zeiträume eingenommen werden.</p>

    <p><strong>Wenn Ihr Kind eine größere Menge von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen eingenommen hat, als es sollte</strong></p>

    <p>Akute Überdosierung von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen kann zu Durchfall, Beschwerden im Bauchraum, Verlust von Flüssigkeit, Kalium und anderen Mineralien führen. Die Gegenmaßnahmen richten sich nach den Symptomen. Innerhalb kurzer Zeit nach Einnahme kann durch induziertes Erbrechen oder Magenspülung die Wirkung des Arzneimittels vermindert oder verhindert werden. Bei starken Wasser- und Mineralverlusten sind diese nach Anleitung des Arztes auszugleichen. Die Gabe von krampflösenden Mitteln kann unter Umständen sinnvoll sein.</p>
    <p>Des Weiteren wurde von Einzelfällen verminderter bzw. unterbrochener Durchblutung der Dickdarmschleimhaut berichtet, bei denen die Dosierung von Natriumpicosulfat beträchtlich höher lag als die zur Behandlung einer Verstopfung empfohlene Dosierung.</p>
    <p><span style="text-decoration: underline">Hinweis:</span><br/>
Allgemein ist von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen wie auch von anderen Abführmitteln bekannt, dass sie bei chronischer Überdosierung zu chronischem Durchfall, Bauchschmerzen, erniedrigten Kaliumwerten, übermäßiger Sekretion von Aldosteron und Nierensteinen führen. In Verbindung mit chronischem Abführmittel-Missbrauch wurde ebenfalls über Schädigungen des Nierengewebes, stoffwechselbedingte Erhöhung von Basenkonzentrationen im Blut sowie über durch erniedrigte Kaliumwerte bedingte Muskelschwäche berichtet.</p>


    <p><strong>4. Welche Nebenwirkungen sind möglich?</strong></p>

    <p>Wie alle Arzneimittel kann auch dieses Arzneimittel Nebenwirkungen haben, die aber nicht bei jedem auftreten müssen.</p>

    <p>Bei den Häufigkeitsangaben zu Nebenwirkungen werden folgende Kategorien zugrunde gelegt:</p>

    <table>
    <tr><td>Sehr häufig: </td><td> mehr als 1 Behandelter von 10</td></tr>
    <tr><td>Häufig: </td><td> 1 bis 10 Behandelte von 100</td></tr>
    <tr><td>Gelegentlich: </td><td> 1 bis 10 Behandelte von 1.000</td></tr>
    <tr><td>Selten: </td><td> 1 bis 10 Behandelte von 10.000</td></tr>
    <tr><td>Sehr selten: </td><td> weniger als 1 Behandelter von 10.000</td></tr>
    <tr><td>Nicht bekannt:&nbsp;</td><td> Häufigkeit auf Grundlage der verfügbaren Daten
nicht abschätzbar</td></tr>
    </table>

    <p><span style="font-style: italic;">Haut und Unterhautzellgewebe</span><br> Nicht bekannt: Hautreaktionen wie Schwellung der Haut und/oder Schleimhaut (Angioödem), z. B. im Bereich von Gesicht und Rachen, ggf. mit Atemnot, arzneimittelbedingter Hautausschlag (Arzneimittelexanthem), Hautausschlag (Exanthem), Hautjucken (Pruritus) </p>

    <p><span style="font-style: italic;">Erkrankungen des Immunsystems</span><br>
    Nicht bekannt: allergische Reaktionen</p>

    <p><span style="font-style: italic;">Erkrankungen des Nervensystems</span><br>
Gelegentlich: Schwindel <br>
Nicht bekannt: kurzzeitige Bewusstlosigkeit (Synkope) <br>
Hierbei handelt es sich vermutlich um Kreislaufreaktionen aufgrund von Unterleibsschmerzen oder den Abführvorgang an sich (siehe Kapitel 2 unter „Warnhinweise und Vorsichtsmaßnahmen“).  </p>

    <p><span style="font-style: italic;">Erkrankungen des Magen-Darm-Traktes</span><br>
Sehr häufig: Durchfall<br/> Häufig: Bauchbeschwerden, Bauchschmerzen, Bauchkrämpfe<br/> Gelegentlich: Übelkeit, Erbrechen </p>

    <p>Bei unsachgemäßer Anwendung von DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen (zu lange zu hoch dosiert) kann es zum Verlust von Wasser, Kalium und anderen Elektrolyten kommen. Dies kann Störungen der Herzfunktion und Muskelschwäche verursachen, insbesondere bei gleichzeitiger Einnahme von harntreibenden Arzneimitteln (Diuretika) oder Hormonen der Nebennierenrinde (Kortikosteroiden).</p>

    <p><strong>Maßnahmen, wenn Ihr Kind von Nebenwirkungen betroffen ist</strong></p>

    <p>Beim Auftreten von Nebenwirkungen sollte Ihr Kind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen nicht weiter einnehmen und Sie sollten Ihren Arzt um Rat fragen.</p>

    <p><strong>Meldung von Nebenwirkungen</strong></p>
    <p>Wenn Sie Nebenwirkungen bemerken, wenden Sie sich an Ihren Arzt oder Apotheker. Dies gilt auch für Nebenwirkungen, die nicht in dieser Packungsbeilage angegeben sind. Sie können Nebenwirkungen auch direkt dem Bundesinstitut für Arzneimittel und Medizinprodukte, Abt.  Pharmakovigilanz, Kurt-Georg-Kiesinger-Allee 3, D-53175 Bonn, Website: www.bfarm.de anzeigen. Indem Sie Nebenwirkungen melden, können Sie dazu beitragen, dass mehr Informationen über die Sicherheit dieses Arzneimittels zur Verfügung gestellt werden.</p>
    <p><strong>5. Wie sind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen aufzubewahren?</strong></p>

    <p>Bewahren Sie dieses Arzneimittel für Kinder unzugänglich auf.</p>

    <p>Sie dürfen dieses Arzneimittel nach dem auf dem Umkarton und auf dem Flaschenetikett nach „Verwendbar bis“ angegebenen Verfallsdatum nicht mehr verwenden. Das Verfallsdatum bezieht sich auf den letzten Tag des angegebenen Monats.</p>

    <p>Entsorgen Sie Arzneimittel nicht im Abwasser. Fragen Sie Ihren Apotheker, wie das Arzneimittel zu entsorgen ist, wenn Sie es nicht mehr verwenden.  Sie tragen damit zum Schutz der Umwelt bei.</p>

    <p><strong>Aufbewahrungsbedingungen</strong></p>

    <p>Die Flasche fest verschlossen halten.</p>

    <p><strong>Haltbarkeit nach Anbruch</strong></p>

    <p>Nach dem ersten Öffnen der Flasche sind DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen noch 12 Monate haltbar.</p>

    <p><strong>6. Inhalt der Packung und weitere Informationen</strong></p>

    <p><strong>Was DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen enthalten</strong></p>
    <p>Der Wirkstoff ist Natriumpicosulfat-Monohydrat.</p>
    <p>1 ml Lösung (ca. 14 Tropfen) enthält 7,5 mg Natriumpicosulfat-Monohydrat.</p>

    <p>Die sonstigen Bestandteile sind:<br>
    Natriumbenzoat, Sorbitol-Lösung
    70 % (nicht kristallisierend),
    Natriumcitrat-Dihydrat,
    Citronensäure-Monohydrat,
    gereinigtes Wasser.</p>

    <p><strong>Wie DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen aussehen und Inhalt der Packung</strong></p>

    <p>Farblose bis leicht gelbliche, klare Lösung zum Einnehmen.</p>

    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen sind in Packungen mit 15 ml und mit 30 ml
    Lösung erhältlich.</p>

   <p>Es werden möglicherweise nicht alle Packungsgrößen in den Verkehr
gebracht.</p>

    <p><strong>Pharmazeutischer Unternehmer und Hersteller</strong></p>
    <p><strong>Pharmazeutischer Unternehmer</strong></p>

    <p>Sanofi-Aventis Deutschland GmbH<br>
    65926 Frankfurt am Main</p>
    
	<p>Postanschrift:<br>
    Postfach 80 08 60<br>
    65908 Frankfurt am Main</p>
	
	<p>Telefon: 0800 56 56 010<br>
	Telefax: 0800 56 56 011<br>
	www.dulcolax.de</p>

    <p><strong>Hersteller</strong></p>

    <p>Istituto de Angeli, s.r.l.<br>
    Località Prulli, 103/C<br>
    50066 Reggello (Firenze)<br>
    Italien</p>

    <p>Diese Gebrauchsinformation wurde zuletzt überarbeitet im Juni 2017.</p>
	
	<hr>

    <p>Sanofi-Aventis Deutschland GmbH wünscht Ihnen gute Gesundheit!</p>

    <p>Wie wirken DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen?</p>
    <p>DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen enthalten den Wirkstoff Natriumpicosulfat. Nach der Einnahme der Tropfen gelangt der Wirkstoff in den Dickdarm zu den nur dort vorhandenen Bakterien der Darmflora. Durch diese <strong>körpereigenen Darmbakterien</strong> wird in DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen ein Wirkstoff aktiviert, der die Dickdarmmuskulatur anregt und die <strong>Darmbewegung</strong> in Gang setzt. So wird die Verstopfung gelöst.</p>
    <p>Nachfolgend die <strong>Dosierungsempfehlung</strong> für DULCOLAX<sup>&reg;</sup> NP Kinder Tropfen:</p>
    <table>
    <tr><td><strong>Verwender</strong>&nbsp;&nbsp;</td><td><strong>Einzeldosis</strong></td></tr>
    <tr><td><strong>Kinder ab 4 Jahren</strong>&nbsp;&nbsp;</td><td><strong>5 bis 9 Tropfen</strong></td></tr>
    </table>
    <p>Es wird empfohlen, mit der niedrigsten Dosierung zu beginnen. Die Dosis kann bis zur maximal empfohlenen Dosis angepasst werden, um regelmäßigen Stuhlgang zu ermöglichen.</p>
    <p>Weitere Informationen finden Sie auf www.dulcolax.de und www.verstopfung-was-tun.de</p>

                        <!-- END Info from PDF -->

                            <a class="pdf-link" target="_blank" href="{{URL::to('pdf/Dulcolax_NP_Kinder_Tropfen_Beipackzettel.pdf')}}">
                                <img class="pdf-image" src="/static_resources/images/pdf-icon.png"
                                     alt="{{ trans('content.common_105k') }}" title="{{ trans('content.common_105k') }}"><span class="pdf-text">{{ trans('content.common_105k') }}</span></a>
                            {{--</li>--}}
                            {{--</ul>--}}
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
