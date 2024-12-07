@extends('layouts.mobilemaster')

@section('styles')
	@parent
@stop

@section('scripts')
	@parent
	<!--<script src='//grmtech.net/r/de92f54963fc39a9d87c2253186808ea61.js' async defer></script>-->
@stop

@section('content')
<div id="wrapper">
    <div class="box_content new_style dulcosoft_style clearfix">

        <!-- Module 1 -->
        <div class="section_one">
			<ul class="slider">
                <li class="slide_05"></li>
				<li class="slide_06"></li>
            </ul>
        </div>
        <!-- Module 2 -->
        <section class="section_two">
            <div class="box_content products">
                <h2 class="section_title blue">Unsere Produkte</h2>
                <section class="products_grid">
                    <article class="mod">
                        <img src="{{URL::to('static_resources/mobile/images/all-products/DulcoSoft_Loesung_Packshot.png')}}" alt="{{ trans('content.header_80a') }}" title="{{ trans('content.header_80a') }}">
                        <h3 class="blue">{{ trans('content.header_80') }}</h3>
                        <p><a class="blue" href="{{action('PageController@dulcosoftloesung')}}" target="_blank">{{ trans('content.common_0001') }}</a></p>
                        <p>DulcoSoft<sup>®</sup> Lösung mit Stuhlweichmacher-Effekt ermöglicht bei hartem, trockenem Stuhlgang eine gute individuelle Dosierung nach dem persönlichen Bedarf innerhalb der Dosierempfehlung. Es weicht harten Stuhl auf und erleichtert den Stuhlgang. Für einen angenehmeren Toilettengang.</p>
                        <div class="buy-button">
                            <a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe"  target="_blank" class="buttonFlat bg-blue">{{ trans('content.common_110') }}</a>
                        </div>			  
                    </article>					
                    <article class="mod">
                        <img src="{{URL::to('static_resources/mobile/images/all-products/DulcoSoft_Pulver_Packshot.png')}}" title="{{ trans('content.header_81a') }}" alt="{{ trans('content.header_81a') }}" >
                        <h3 class="blue">{{ trans('content.header_81') }}</h3>
                        <p><a class="blue" href="{{action('PageController@dulcosoftpulver')}}" target="_blank">{{ trans('content.common_0001') }}</a></p>
                        <p>DulcoSoft<sup>®</sup> Pulver mit Stuhlweichmacher-Effekt ist in praktisch vordosierten Beuteln erhältlich. Es weicht harten Stuhl auf und erleichtert den Stuhlgang. Für einen angenehmeren Toilettengang.</p>
                        <div class="buy-button">
                            <a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat bg-blue">{{ trans('content.common_110') }}</a>
                        </div>
                    </article>                    
                </section>		  
            </div>
        </section>

        <!-- Module 3 -->
        <section class="section_three">
			<div class="section_three_intro">
				<h2 class="section_title blue">DulcoSoft<sup>®</sup> – für einen angenehmeren Toilettengang.</h2>
				<p>Leiden Sie unter hartem und daher schmerzhaftem Stuhlgang? Ist Ihr Toilettengang mit unangenehmen Pressen verbunden? Hier gibt es eine Lösung, die Ihnen auf sanfte und schonende Weise hilft, den Toilettengang wieder angenehmer zu gestalten: DulcoSoft<sup>®</sup> mit Stuhlweichmacher-Effekt weicht harten Stuhl auf und erleichtert so den Stuhlgang.</p>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box">
					<h3 class="section_subtitle blue">Häufigkeit und Konsistenz – wann ist Stuhlgang eigentlich normal?</h3>
					<p>Wie oft man Stuhlgang hat, variiert von Person zu Person. In der Allgemeinmedizin spricht man von einer „normalen“ Stuhlfrequenz, wenn man zwischen dreimal täglich und dreimal wöchentlich auf die Toilette geht – es ist also durchaus normal, nicht jeden Tag Stuhlgang zu haben. Dennoch kann seltener Stuhlgang als störend empfunden werden. Besonders, wenn es sich um harten Stuhl handelt, der mit viel Mühe, starkem Pressen und Schmerzen verbunden ist. Die genannten Beschwerden können erste Symptome eines trägen Darms sein und unbehandelt die Lebensqualität Betroffener beeinträchtigen.<sup>1</sup> Neben der Häufigkeit des Stuhlgangs spielt auch die Konsistenz – sprich, ob fest, weich, klumpig oder glatt – eine wichtige Rolle.</p>
					<br>
					<p>Manchmal kann unser Darm aus dem Takt geraten; er wird träge und der Nahrungsbrei verweilt länger im Verdauungstrakt. Dabei gilt: Je länger der Passiervorgang der Nahrung im Darm dauert, desto mehr Wasser wird dem Stuhl entzogen – und er wird hart.<sup>2</sup> Eine aktuelle Umfrage bei Patienten mit Verstopfung zeigt, dass starkes Pressen bei knapp 60% und harter Stuhl bei 71% der Befragten zu den häufigsten Symptomen gehören.<sup>1</sup> Doch wann ist die Stuhlkonsistenz so wie sie sein sollte? Auskunft hierüber kann die Bristol-Stuhlformen-Skala geben, die auch Rückschlüsse auf die Verweildauer des Stuhls im Darm zulässt.<sup>3</sup> Mit dieser Skala kann die Stuhlkonsistenz als ‚normal’ (Typ 3, 4, 5) ‚zu weich’ (Typ 6, 7) oder ‚zu hart’ (Typ 1, 2) eingeordnet werden.</p>
					<br>
					<p>Bei hartem, trockenem Stuhlgang hilft DulcoSoft<sup>®</sup> mit Stuhlweichmacher-Effekt. Mit Macrogol 4000 weicht es harten, trockenen Stuhl auf und erleichtert den Stuhlgang – für einen angenehmeren Toilettengang.</p>
					<p><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat bg-blue">{{ trans('content.common_110') }}</a></p>
				</div> 
				<div class="box_img right_img" style="background-image: url(static_resources/mobile/images/dulcosoft-1.jpg); background-size: contain;"></div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box pull-right">
					<h3 class="section_subtitle blue">Kategorie Stuhlweichmacher: Was hilft bei hartem Stuhl?</h3>
					<p>Wer unter hartem und schmerzhaftem Toilettengang leidet und pressen muss, obwohl er regelmäßig zur Toilette kann, ist womöglich von einem trägen Darm betroffen. Für diese Patienten findet sich in der Apotheke mit DulcoSoft<sup>®</sup> eine neue Produktkategorie – die des Stuhlweichmachers. Die als Lösung oder Pulver erhältlichen Medizinprodukte sind besonders für Patienten ausgelegt, die bislang noch kein geeignetes Mittel gefunden haben. Mit DulcoSoft<sup>®</sup> steht Ihnen eine sanfte Behandlungsoption bei hartem, trockenem Stuhl zur Verfügung. Es ist nach Rücksprache mit dem Arzt für Schwangere und Stillende geeignet. Die DulcoSoft<sup>®</sup> Lösung kann bei Kindern ab 2 Jahren verwendet werden<sup>4</sup>.</p>
					<p><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat bg-blue">{{ trans('content.common_110') }}</a></p>
				</div> 
				<div class="box_img" style="background-image: url(static_resources/mobile/images/dulcosoft-2.jpg);"></div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box" style="width: 100%;">
					<h3 class="section_subtitle blue">DulcoSoft<sup>®</sup>: Produkt und Wirkweise</h3>
					<p>Harter, schmerzhafter Stuhlgang kann das eigene Wohlbefinden und die Lebensqualität erheblich einschränken. DulcoSoft<sup>®</sup> enthält Macrogol 4000, einen Inhaltsstoff, der die Verdauung auf sanfte und schonende Weise unterstützt. Macrogol 4000 wirkt rein physikalisch, wird unverändert ausgeschieden und entzieht dem Körper kein Wasser. Bei der Einnahme mit einer Flüssigkeit bindet Macrogol Wasser und erhöht so den Flüssigkeitsgehalt in dem unteren Verdauungstrakt, wo trockener, fester Stuhl aufgeweicht und das Stuhlvolumen vergrößert wird. Dadurch wird die natürliche Eigenbewegung des Darms angeregt und in Folge die Darmentleerung unterstützt – für einen regelmäßigen, erleichterten Stuhlgang.</p>
					<br>
					<p>DulcoSoft<sup>®</sup> ist als Lösung innerhalb der Empfehlung gut individuell dosierbar und in Pulverform in praktisch vordosierten Beuteln erhältlich. Sowohl Pulver als auch Lösung sind aromafrei und können mit einem Getränk der Wahl gemischt werden. Beide Formen sind gluten-, zucker- und kochsalzfrei und wirken innerhalb von 24 bis 72 Stunden.</p>
					<br>
					<div class="product_table">
						<table style="width: 100%;">
							<tr>
								<td>
									<h3 class="section_subtitle blue">Produktdetails DulcoSoft<sup>®</sup> Lösung</h3>										
									<img src="{{URL::to('static_resources/mobile/images/icon-1.png')}}" alt="" title="">
									<p><strong>Stoff oder Substanz:</strong><br>
									Macrogol 4000, kochsalz-, gluten- und zuckerfrei</p>
									<div style="clear: both;"></div>
									<img src="{{URL::to('static_resources/mobile/images/icon-2.png')}}" alt="" title="">
									<p><strong>Darreichungsform</strong><br>
									Lösung zum Einnehmen – aromafrei</p>
									<div style="clear: both;"></div>
									<img src="{{URL::to('static_resources/mobile/images/icon-3.png')}}" alt="" title="">
									<p><strong>Beginn der Wirkungsweise</strong><br>
									Die Wirkung ist in der Regel nach 24–72 Stunden spürbar</p>
									<p style="margin-top: 5px; margin-left: 50px;"><strong>Für wen?</strong><br>
									Für Patienten, die unter hartem, trockenen Stuhl leiden</p>
								</td>
								<td></td>
								<td>
									<h3 class="section_subtitle blue">Produktdetails DulcoSoft<sup>®</sup> Pulver </h3>
									<img src="{{URL::to('static_resources/mobile/images/icon-4.png')}}" alt="" title="">
									<p><strong>Stoff oder Substanz:</strong><br>
									Macrogol 4000, kochsalz-, gluten- und zuckerfrei</p>
									<div style="clear: both;"></div>
									<img src="{{URL::to('static_resources/mobile/images/icon-5.png')}}" alt="" title="">
									<p><strong>Darreichungsform</strong><br>
									Pulver zum Auflösen und Trinken – aromafrei</p>
									<div style="clear: both;"></div>
									<img src="{{URL::to('static_resources/mobile/images/icon-3.png')}}" alt="" title="">
									<p><strong>Beginn der Wirkungsweise</strong><br>
									Die Wirkung ist in der Regel nach 24–72 Stunden spürbar</p>
									<p style="margin-top: 5px; margin-left: 50px;"><strong>Für wen?</strong><br>
									Für Patienten, die unter hartem, trockenen Stuhl leiden</p>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box">
					<h3 class="section_subtitle blue">Für wen ist DulcoSoft<sup>®</sup> geeignet?</h3>
					<p>DulcoSoft<sup>®</sup> eignet sich für Patienten, die durch Ihren harten trockenen Stuhl unter unangenehmen Toilettengängen leiden. Wenn Allgemeinmaßnahmen wie eine ausreichende Trinkmenge und gesunde Ernährung nicht weiterhelfen, lässt sich harter Stuhlgang in der Regel mit entsprechenden Produkten gut in den Griff bekommen.</p>
					<br>
					<p>DulcoSoft<sup>®</sup> ist aufgrund der gluten-, zucker- und kochsalzfreier Formulierung für Patienten mit besonderen Bedürfnissen  wie Zöliakie, Diabetes oder Senioren unter kochsalzarmer Diät geeignet. DulcoSoft<sup>®</sup> kann während Schwangerschaft und Stillzeit eingenommen werden, da die Resorption von Macrogol 4000 vernachlässigbar ist und aus diesem Grund keine Auswirkungen zu erwarten sind. Jedoch ist es ratsam in solchen Situationen  Ihren Arzt einzubinden. DulcoSoft<sup>®</sup> Pulver ist für Kinder ab 8 Jahren, DulcoSoft<sup>®</sup> Lösung ist für Kinder ab 2 Jahren geeignet; eine Anwendung bei Kinder unter 8 Jahren sollte nur auf ärztliche Anweisung erfolgen.</p>
					<p><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat bg-blue">{{ trans('content.common_110') }}</a></p>
				</div>
				<div class="box_img right_img" style="background-image: url(static_resources/mobile/images/dulcosoft-4.jpg); background-size: contain;"></div>
			</div>
        </section>

        <!-- References -->
		<section class="references" style="padding-top: 0;">
			<p><sup>1</sup> Enck P et al. Prevalence of constipation in the German population – a representative survey (GECCO). United European Gastroenterol J 2016; 4: 429–437<br>
			<sup>2</sup> Stephen AM et al. Effect of changing transit time on colonic microbial metabolism in man. Gut 1987; 28: 601–609<br>
			<sup>3</sup> Lewis SJ, Heaton KW. Stool form scale as a useful guide to intestinal transit time. Scand J Gastroenterol 1997; 32: 920–924<br>
			<sup>4</sup> DulcoSoft Lösung: ab 2 Jahren, die Anwendung bei Kindern unter 8 Jahren sollte nur auf ärztliche Anweisung erfolgen. DulcoSoft Pulver: ab 8 Jahren</p>			
        </section>

    </div>
</div>

@stop
