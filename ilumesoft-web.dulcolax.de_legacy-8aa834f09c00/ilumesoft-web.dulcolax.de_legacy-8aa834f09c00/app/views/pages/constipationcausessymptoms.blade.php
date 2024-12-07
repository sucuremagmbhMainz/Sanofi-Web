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
    <div class="box_content new_style clearfix">

        <!-- Module 1 -->
        <div class="section_one">
            <ul id="customSlider">
                <li class="slide_01">
                    <div class="slide">
						<div class="container">
							<h1 class="section_title">Gestresst?<br />Von Verstopfung geplagt?</h1>
							<div class="slide_copy">
								<h2>Wenn Stress zu Verstopfung führt, befreit Dulcolax<sup>®</sup> planbar und verträglich. Für ein Problem weniger im Alltag und mehr Lebensqualität.</h2>
							</div>
							<div class="buttons">
								<a href="#stressed" class="buttonFlat" title="Dulcolax® Zäpfchen wirken schnell">{{ trans('content.common_0003') }}</a>
							</div>
						</div>
                    </div>
                </li>
                <li class="slide_02">
                    <div class="slide">
						<div class="container">
							<h1 class="section_title">Verstopfung trotz ausgewogener Ernährung?</h1>
							<div class="slide_copy">
								<h2>Weil gesunde und ausgewogene Ernährung allein nicht immer ausreicht. Dulcolax<sup>®</sup> befreit zuverlässig bei Verstopfung.</h2>
							</div>
							<div class="buttons">
								<a href="#healthy-food" class="buttonFlat" title="Dulcolax(R) NP Kinder Tropfen wirken planbar über Nacht">{{ trans('content.common_0002a') }}</a>
							</div>
						</div>
                    </div>
                </li>
                <li class="slide_03">
                    <div class="slide">
						<div class="container">
							<h1 class="section_title">Bei Verstopfung auf Reisen.</h1>
							<div class="slide_copy">
								<h2>Unterwegs oder in fremder Umgebung kann es zu Verdauungsproblemen wie Verstopfung kommen. Dulcolax<sup>®</sup> befreit planbar, damit es unbeschwert weitergeht.</h2>
							</div>
							<div class="buttons">
								<a href="#travel" class="buttonFlat" title="Dulcolax® Zäpfchen wirken schnell">{{ trans('content.common_0003') }}</a>
							</div>
						</div>
                    </div>
                </li>
                <li class="slide_04">
                    <div class="slide">
						<div class="container">
							<h1 class="section_title">Verstopfung?</h1>
							<div class="slide_copy">
								<h2>Dulcolax<sup>®</sup> Ihr Experte bei Verstopfung: Befreit planbar, ist gut verträglich und verbessert die Lebensqualität.</h2>
							</div>
							<div class="buttons">
								<a href="#people-in-market" class="buttonFlat" title="Dulcolax(R) NP Kinder Tropfen wirken planbar über Nacht">{{ trans('content.common_0002a') }}</a>
							</div>
						</div>
                    </div>
                </li>
            </ul>
        </div>
        
		<!-- Module 2 -->
        <section class="section_two">
            <div class="box_content products">
                <h2 class="section_title">Unsere Produkte</h2>
                <section class="products_grid">
                    <article class="mod">
                        <img src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_Dragees_Packshot.png')}}" alt="{{ trans('content.header_78a') }}" title="{{ trans('content.header_78a') }}">
                        <h3>{{ trans('content.header_78') }}</h3>
                        <p><a href="{{action('PageController@dragees')}}" target="_blank">{{ trans('content.common_0001') }}</a></p>
                        <p>Abends vor dem Schlafengehen eingenommen wirken Dulcolax<sup>®</sup> Dragées planbar über Nacht und befreien am nächsten Morgen – für einen unbeschwerten Tag.</p>
                        <div class="buy-button">
                            <a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe"  target="_blank" class="buttonFlat">{{ trans('content.common_110') }}</a>
                        </div>			  
                    </article>					
                    <article class="mod">
                        <img src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_NP_Tropfen_Packshot.png')}}" alt="{{ trans('content.header_214a') }}" title="{{ trans('content.header_214a') }}">
                        <h3>{{ trans('content.header_214') }}</h3>
                        <p><a href="{{action('PageController@nptropfen')}}" target="_blank">{{ trans('content.common_0001') }}</a></p>
                        <p>Innerhalb der Dosierempfehlung (10-18 Tropfen für Erwachsene), individuell dosierbar, wirken Dulcolax<sup>®</sup> NP Tropfen planbar über Nacht und befreien am nächsten Morgen – für mehr Lebensqualität.</p>
                        <div class="buy-button">
                            <a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat">{{ trans('content.common_110') }}</a>
                        </div>
                    </article>
                    <article class="mod">
                        <img src="{{URL::to('static_resources/mobile/images/all-products/Dulcolax_Zaepfchen_Packshot.png')}}" alt="{{ trans('content.header_82a') }}" title="{{ trans('content.header_82a') }}">
                        <h3>{{ trans('content.header_82') }}</h3>
                        <p><a href="{{action('PageController@zapfchen')}}" target="_blank">{{ trans('content.common_0001') }}</a></p>
                        <p>Ist rasche Hilfe bei Verstopfung gewünscht, wirken Dulcolax<sup>®</sup> Zäpfchen innerhalb von ca. 15-30 Minuten planbar, schnell und zuverlässig.</p>
                        <div class="buy-button">
                            <a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat">{{ trans('content.common_110') }}</a>
                        </div>				  
                    </article>
                </section>		  
            </div>
        </section>

        <!-- Module 3 -->
        <section class="section_three">
			<div class="section_three_intro">
				<h2 class="section_title">Dulcolax<sup>®</sup> – Ihr Experte bei Verstopfung.</h2>
				<p>Wenn Sie unter Verstopfung leiden, sind Sie damit nicht alleine. Denn weltweit leiden Millionen von Menschen unter Verdauungsproblemen bzw. einem unregelmäßigen Stuhlgang. Planbare und gut verträgliche Hilfe bei Verstopfung bieten Ihnen die Produkte von Dulcolax<sup>®</sup>. Ob als Dragées, Tropfen oder Zäpfchen – Ihr Experte befreit von Verstopfungsbeschwerden.</p>
				<br />
				<p>Seit über 65 Jahren hilft Dulcolax<sup>®</sup> Menschen mit Verstopfungsbeschwerden und ist in Deutschland das meist verkaufte Mittel gegen Verstopfung. Dulcolax<sup>®</sup> ist nicht nur gut verträglich, sondern seine Wirkstoffe Bisacodyl und Natriumpicosulfat verbessern nachweislich die Lebensqualität bei Verstopfungsbeschwerden.</p>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box">
					<h3 class="section_subtitle">Stress kann Verstopfung verursachen.</h3>
					<p>Unsere Psyche und unser Darm sind eng miteinander verknüpft. Daher ist es nicht verwunderlich, wenn sich bei einigen Menschen zu viel Stress auf die Verdauung auswirkt und zu Verstopfung führt.</p>
					<br>
					<p>Stress und eine hektische Lebensweise, sind oftmals mit unregelmäßigen Essenszeiten und unregelmäßigem Schlaf bis hin zu Schlafstörungen verbunden. Es kommt vor, dass die Notwendigkeit des Gangs zur Toilette aus Zeitmangel unterdrückt wird. Unter Umständen kann das ein sensibles Verdauungssystem aus dem Takt bringen und zu Verstopfung führen. Deshalb ist es wichtig auf ausreichend Möglichkeiten zur Entspannung, wie beispielsweise regelmäßige Pausen oder viel guten Schlaf zu achten. Sollten Sie weitere Hilfe gegen Ihre Verstopfung benötigen, kann Dulcolax<sup>®</sup> für Befreiung sorgen: Dulcolax<sup>®</sup> Dragées oder NP Tropfen, am Abend eingenommen, wirken planbar über Nacht und befreien am nächsten Morgen. Dulcolax<sup>®</sup> Zäpfchen wirken schnell innerhalb von ca. 15-30 Minuten. Damit Sie ein Problem weniger im Alltag haben.</p>
					<p><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat">{{ trans('content.common_110') }}</a></p>
				</div> 
				<div class="box_img right_img" style="background-image: url(static_resources/mobile/images/slider_stressed.jpg);"></div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box pull-right">
					<h3 class="section_subtitle">Verstopfung trotz ausgewogener Ernährung?</h3>
					<p>Eine gesunde und ausgewogene Ernährung schützt leider nicht immer vor Verstopfung. So regen Ballaststoffe und Rohkostprodukte zwar die Verdauung an, können allerdings bei einer bestehenden trägen Verdauung unter Umständen sogar kontraproduktiv sein; denn dann können Blähungen bzw. Bauchschmerzen für zusätzliche Belastung sorgen.</p>
					<br>
					<p>Auch wenn Sie sich mit viel Obst und ballaststoffreichen Produkten ernähren, kann eine Verstopfung auftreten. Schließlich wird Ihr Verdauungssystem von vielerlei Faktoren beeinflusst. Dulcolax<sup>®</sup> Dragées oder NP Tropfen wirken planbar über Nacht und befreien Sie am nächsten Morgen von Ihrer Verstopfung. Und wenn es doch einmal schneller gehen soll, helfen Dulcolax<sup>®</sup> Zäpfchen in ca. 15-30 Minuten. Die Dulcolax<sup>®</sup>-Wirkstoffe Bisacodyl und Natriumpicosulfat verbessern nachweislich die Lebensqualität bei Verstopfungsbeschwerden.</p>
					<p><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat">{{ trans('content.common_110') }}</a></p>
				</div> 
				<div class="box_img" style="background-image: url(static_resources/mobile/images/slider_healthy-food.jpg);"></div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box">
					<h3 class="section_subtitle">Bei Verstopfung auf Reisen.</h3>
					<p>Oftmals leiden Menschen an Verdauungsproblemen, wenn sie auf Reisen sind bzw. sich in einer fremden Umgebung befinden. Ursachen für eine sogenannte Reiseverstopfung können verschiedener Natur sein: In der Regel ist es eine Kombination aus mehreren Faktoren wie Zeitumstellung, Abweichung im Tagesrhythmus, veränderte Ernährung oder ein Unterdrücken des Stuhlgangs, weil fremde Toiletten gemieden werden.</p>
					<br>
					<p>Reiseverstopfungen können zu Beginn einer Reise auftreten, wenn der Körper sich noch auf die Zeitumstellung bzw. den veränderten Tagesrhythmus einstellen muss.<br />Für manche Reisende hingegen, macht sich eine unregelmäßige Verdauung erst im Laufe Ihrer Reise bemerkbar. Oft können Betroffene mehrere Tage hintereinander nicht auf die Toilette gehen; andere hingegen können sich wiederrum nur unter erschwerten Bedingungen erleichtern. In der Regel verschwinden solche Probleme aber nach kurzer Zeit wieder. Legen sich die Verstopfungsbeschwerden nicht von allein oder wünschen Sie zusätzliche Unterstützung, befreit Dulcolax® planbar von den Beschwerden. Damit es sorglos weitergeht, wirken Dragées und Tropfen planbar über Nacht und befreien am nächsten Morgen, während Zäpfchen schnelle Hilfe innerhalb von ca. 15-30 Minuten bieten. Deshalb Dulcolax® beim Packen nicht vergessen.</p>
					<p><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat">{{ trans('content.common_110') }}</a></p>
				</div>
				<div class="box_img right_img" style="background-image: url(static_resources/mobile/images/slider_travel.jpg);"></div>
			</div>
			<div class="box_container box_spacer clearfix">
				<div class="box pull-right">
					<h3 class="section_subtitle">Dulcolax<sup>®</sup>, befreit planbar und gut verträglich von Verstopfung.</h3>
					<p>Verstopfung kann nicht nur einen unregelmäßigen Stuhlgang bedeuten, sondern auch mit einer Einschränkung der eigenen Lebensqualität sowie des eigenen Wohlbefindens einhergehen. Zu den typischen Symptomen zählen neben einem unregelmäßigen Stuhlgang das Gefühl der unvollständigen Entleerung und Schmerzen beim Stuhlgang durch harten Stuhl.</p>
					<br>
					<p>Üblicherweise sollten Sie zwischen dreimal täglich und dreimal wöchentlich auf die Toilette gehen. Bei belastenden Verdauungsproblemen ist jedoch effektive Hilfe gefragt. Zur Behandlung einer Verstopfung hilft Dulcolax<sup>®</sup>. Ihr Experte bei Verstopfung befreit planbar und gut verträglich mit Produkten, die optimal auf Ihre Bedürfnisse abgestimmt sind: Während Dragées oder Tropfen planbar über Nacht wirken und am nächsten Morgen befreien, bieten Zäpfchen innerhalb von ca. 15-30 Minuten schnelle Hilfe. Nach ärztlicher Abklärung der Verstopfungsursache, darf Dulcolax<sup>®</sup> langfristig angewendet werden. </p>
					<p><a href="{{action('PageController@kaufen')}}#apotheken-in-der-naehe" target="_blank" class="buttonFlat">{{ trans('content.common_110') }}</a></p>
				</div>
				<div class="box_img" style="background-image: url(static_resources/mobile/images/slider_people-in-market.jpg); background-position: 75% 0;"></div>
			</div>
        </section>

        <!-- Module 4 -->
        <section class="section_four">
            <h2 class="section_title">Häufig gestellte Fragen:</h2>
			<div class="box_content faq">
				<div class="faq_container">
					<div class="faq_icon">
						<img src="{{URL::to('static_resources/images/faq_plus.png')}}">
					</div>
					<div class="faq_question">
						<h4 name="ggg">Wie wirken Dulcolax<sup>®</sup>-Produkte?</h4>
						<div>Dulcolax<sup>®</sup> Dragées, NP Tropfen und Zäpfchen fördern die Eigenbewegung des Dickdarms und lösen so die Verstopfung.</div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="faq_container">
					<div class="faq_icon">
						<img src="{{URL::to('static_resources/images/faq_plus.png')}}">
					</div>
					<div class="faq_question">
						<h4 name="ggg">Wie dosiere ich Dulcolax<sup>®</sup>-Tropfen und Dragées?</h4>
						<div>Dosiert wird innerhalb der Dosierungsempfehlung: 10-18 Tropfen bzw. 1-2 Dragées für Erwachsene.</div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="faq_container">
					<div class="faq_icon">
						<img src="{{URL::to('static_resources/images/faq_plus.png')}}">
					</div>
					<div class="faq_question">
						<h4 name="ggg">Muss ich bei der Dosierung von Dulcolax<sup>®</sup> noch etwas beachten?</h4>
						<div>Es wird empfohlen, mit der niedrigsten Dosierung zu beginnen. Anschließend kann diese bei Bedarf bis zur maximal empfohlenen Dosis gesteigert werden. Wichtig ist zu beachten, dass kein Durchfall erzeugt werden soll sondern, dass das Ziel ein weicher aber wohlgeformter Stuhl ist.</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
        </section>

        <!-- Module 5 -->
        <section class="section_five">
            <h2 class="section_title">Machen Sie den Selbst-Test: „Bin ich betroffen von Verstopfung?“</h2>
            <p>Spannt der Bauch und leiden Sie regelmäßig unter Verdauungsproblemen? Wenn Sie sich nicht sicher sind, ob es sich dabei um eine Verstopfung handelt, können Sie mithilfe des „Selbst-Tests“ Ihr aktuelles Befinden besser einschätzen. Denn ein unregelmäßiger Gang zur Toilette ist noch kein Indiz dafür, dass mit Ihrem Darm etwas nicht in Ordnung ist.</p>
            <p>Hinweis: Die auf Basis Ihrer Angaben ermittelten Test-Ergebnisse ersetzen keinen Arztbesuch, können aber zur besseren Auswertung und Erläuterung Ihrer Beschwerden durchaus hilfreich sein.</p>
            {{--<a href="http://www.verstopfung-was-tun.de/selbsttest?start" class="buttonFlat no-disclaimer-popup" target="_blank">Test durchführen</a>--}}
			<a href="{{action('PageController@selbsttest')}}" class="buttonFlat">Test durchführen</a>
        </section>

        <!-- Module 6 -->
        {{--<section class="section_six text-center">
            <h2 class="section_title">Lorem ipsum dolor</h2>
            <h3 class="section_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non eleifend odio, vel rhoncus purus. Suspendisse potenti. Sed mauris tellus, porttitor et purus at, fermentum convallis nibh.</h3>
            <div class="icons_grid">
                <div class="icon">
                    <i class="fa fa-3x fa-heartbeat" aria-hidden="true"></i>
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tempus nunc, quis viverra felis. Praesent vestibulum porttitor neque imperdiet porta.</p>		  
                </div>
                <div class="icon">
                    <i class="fa fa-3x fa-bar-chart" aria-hidden="true"></i>
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tempus nunc, quis viverra felis. Praesent vestibulum porttitor neque imperdiet porta.</p>		  
                </div>
                <div class="icon">
                    <i class="fa fa-3x fa-clock-o" aria-hidden="true"></i>
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tempus nunc, quis viverra felis. Praesent vestibulum porttitor neque imperdiet porta.</p>		  
                </div>
                <div class="icon">
                    <i class="fa fa-3x fa-refresh" aria-hidden="true"></i>
                    <h3>Lorem ipsum</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tempus nunc, quis viverra felis. Praesent vestibulum porttitor neque imperdiet porta.</p>		  
                </div>
                <div class="clearfix"></div>
            </div>			
        </section>--}}

        <!-- Module 7 -->
        {{--<section class="section_seven">
            <h2 class="section_title">Featured news</h2>
            @include('includes.related-news')
        </section>--}}

    </div>
</div>

@stop
