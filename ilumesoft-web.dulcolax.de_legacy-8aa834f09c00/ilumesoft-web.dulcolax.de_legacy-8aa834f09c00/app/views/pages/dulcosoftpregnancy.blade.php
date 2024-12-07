@extends('layouts.mobilemaster')

@section('styles')
	@parent
@stop

@section('scripts')
	@parent	
	<!--<script src='//grmtech.net/r/de92f54963fc39a9d87c2253186808ea61.js' async defer></script>-->
       <script type="text/javascript">
            ttd_dom_ready( function() {
                if (typeof TTDUniversalPixelApi === 'function') {
                    var universalPixelApi = new TTDUniversalPixelApi();
                    universalPixelApi.init("ef1t2tu", ["xs5v8gr"], "https://insight.adsrvr.org/track/up");
                }
            });
        </script>

@stop

@section('content')
<div id="wrapper">
    <div class="box_content new_style dulcosoft_style">

        <section class="section_three">
			<div class="box_container clearfix">
				<div class="box">
					<h3 class="section_subtitle blue">Freude mit dem Babybauch. Probleme mit dem Darm?! Das muss nicht sein</h3>
					<p>In der Schwangerschaft vollbringt der Körper einer Frau wahre Wunder. Ein von der Natur choreographiertes Zusammenspiel bewirkt, dass sich in 9 Monaten ein neues Leben entwickelt. Doch die neuen Umstände können auch ziemlich verunsichernd sein. Mache ich alles richtig? Was braucht mein Körper jetzt? Außerdem kommen eventuell neue Beschwerden hinzu, die vor der Schwangerschaft keine Probleme bereitet haben – zum Beispiel Verdauungsprobleme, wie Darmträgheit, Verstopfung oder harter fester Stuhlgang, verbunden mit unangenehmen Pressen.</p>
				</div> 
				<div class="box_img right_img" style="background-image: url(static_resources/mobile/images/dulcosoft-6.jpg);"></div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box pull-right">
					<h3 class="section_subtitle blue">Verstopfung in der Schwangerschaft – warum ist das so?</h3>
					<p>Harter, trockener Stuhl und Verstopfung während der Schwangerschaft sind jedoch in der Regel nichts Ungewöhnliches – etwa 40% aller schwangeren Frauen beklagen sich im Verlauf der neun Monate mindestens einmal über Beschwerden beim Toilettengang.<sup>1</sup> Der Grund: Das Hormon Progesteron, das eine wichtige Rolle für den Erhalt der Schwangerschaft spielt, bewirkt eine Erschlaffung der glatten Muskulatur im Darm, was zu unangenehmen Beschwerden wie Darmträgheit und einem verlängerten Passiervorgang des Stuhls durch den Verdauungstrakt und somit zu Verstopfung führen kann. Um das Ungeborene mit ausreichend Nährstoffen zu versorgen, bewirkt Progesteron außerdem eine gesteigerte Aufnahme von Wasser und Elektrolyten im Darm. Da der Stuhl dadurch härter und fester wird, kann auch dies eine damit verbundene längere Zeit auf der Toilette und unangenehmes Pressen begünstigen. Weitere Ursachen für Verstopfung in der Schwangerschaft sowie harten, trockenen Stuhl können außerdem veränderte Essgewohnheiten (Heißhungerattacken, Appetit auf bestimmte Lebensmittel) und eine verminderte körperliche Aktivität durch den Babybauch sein.<sup>2</sup></p>
				</div> 
				<div class="box_img" style="background-image: url(static_resources/mobile/images/dulcosoft-7.jpg);"></div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box">
					<h3 class="section_subtitle blue">Die sanfte Lösung für Schwangere und stillende Mütter</h3>
					<p>Die Monate in denen im Körper ein neues Lebewesen heranwächst sind aufregend genug. Harter Stuhl, schmerzhafter Stuhlgang und Verstopfung müssen während der Schwangerschaft nicht zusätzlich belasten. Was helfen kann: Ballaststoffreiche Lebensmittel, viel trinken und sich körperlich bewegen. Um Verstopfung während der Schwangerschaft entgegenzuwirken, können zusätzlich spezielle Präparate helfen. Macrogol 4000 in dem Medizinprodukt DulcoSoft wirkt rein physikalisch und ist somit nach Rücksprache mit dem Arzt für Schwangere und stillende Mütter geeignet. Das aroma- und zuckerfreie DulcoSoft ist eine sanfte und gut verträgliche Lösung, indem es festen Stuhl aufweicht und die Eigenbewegungen des Darms unterstützt. Für mehr Freude mit dem Babybauch!</p>
				</div>
				<div class="box_img right_img" style="background-image: url(static_resources/mobile/images/dulcosoft-8.jpg);"></div>
			</div>
        </section>

        <!-- References -->
		<section class="references" style="padding-top: 0;">
			<p><sup>1</sup> Joos AK, Herold A. Hämorrhoidalleiden – Neue konservative und operative Therapien für ein weit verbreitetes Leiden. coloproctology (2011) 33: 86.<br>
			<sup>2</sup> Frias Gomes C. et al. Gastrointestinal diseases during pregnancy: what does the gastroenterologist need to know? Annals of Gastroenterology (2018) 31, 1-11</p>
		</section>
		
    </div>
</div>

@stop
