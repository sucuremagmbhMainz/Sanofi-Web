@extends('layouts.mobilemaster')
@section('styles')
@parent
@stop
@section('scripts')
@parent
<script src="/static_resources/mobile/js/selbsttest.js"></script>
@stop
@section('content')
<div id="wrapper">
    <div class="box_content new_style clearfix">
        <div class="section_top">

            {{--TEST--}}
            <form method="post" id="frm_selbsttest" name="test" enctype="multipart/form-data" action="http://www.dulcolax.de/service_und_extras/selbsttest.sendform_form.html/_jcr_content/par/form.html">
                <input type="hidden" name="cq5_action_type" value="/apps/netvision/internet/components/form/actions/mail">
                <input type="text" name="cq5_message" value="" style="display:none;">
                <input type="hidden" name="cq5_created" value="1438600474718">
                <input type="hidden" name="targeturl" value="">
                <input type="hidden" name="rule_result1" value="sum:min=10;max=25">
                <input type="hidden" name="rule_result2" value="sum:min=26;max=35">
                <input type="hidden" name="rule_result3" value="sum:min=36;max=45">
                <input type="hidden" name="rule_result4" value="sum:min=46;max=50">
                <h1>Selbst-Test „Bin ich betroffen?“</h1>
                <div class="sc-block" style="" id="que1" data-qid="1">
                    <h2>1. Ich stehe meist unter Stress. Den Drang, auf die Toilette zu gehen, muss ich dadurch häufig unterdrücken.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que1" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que1" data-aid="1" data-count="2" ><p>Stimmt überwiegend</p></li>
                            <li data-name="que1" data-aid="2" data-count="4" ><p>Stimmt gelegentlich</p></li>
                            <li data-name="que1" data-aid="3" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que2" data-qid="2">
                    <h2>2. Ich übe eine sitzende Tätigkeit aus. Zeit und Lust für ausgleichende Bewegung habe ich selten.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que2" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que2" data-aid="1" data-count="2" ><p>Stimmt überwiegend</p></li>
                            <li data-name="que2" data-aid="2" data-count="4" ><p>Stimmt gelegentlich</p></li>
                            <li data-name="que2" data-aid="3" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que3" data-qid="3">
                    <h2>3. Hier einen Burger, da eine Currywurst – tatsächlich ernähre ich mich häufig von Fast Food. Etwas Gesundes wie Obst oder Vollkornprodukte kommen selten auf den Tisch.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que3" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que3" data-aid="1" data-count="2" ><p>Stimmt überwiegend</p></li>
                            <li data-name="que3" data-aid="2" data-count="4" ><p>Stimmt gelegentlich</p></li>
                            <li data-name="que3" data-aid="3" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que4" data-qid="4">
                    <h2>4. Ich muss häufig, etwa bei jedem vierten Stuhlgang, stark pressen.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que4" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que4" data-aid="1" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que5" data-qid="5">
                    <h2>5. Ich schaffe es einfach nicht, täglich die empfohlene Menge von zwei Litern Flüssigkeit zu trinken.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que5" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que5" data-aid="1" data-count="2" ><p>Stimmt überwiegend</p></li>
                            <li data-name="que5" data-aid="2" data-count="4" ><p>Stimmt gelegentlich</p></li>
                            <li data-name="que5" data-aid="3" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que6" data-qid="6">
                    <h2>6. Mindestens jeder vierte Stuhlgang ist hart.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que6" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que6" data-aid="1" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que7" data-qid="7">
                    <h2>7. Ich habe das Gefühl, dass sich mein Darm nicht richtig entleert.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que7" data-aid="0" data-count="1" ><p>Trifft immer zu</p></li>
                            <li data-name="que7" data-aid="1" data-count="2" ><p>Trifft bei mindestens jedem vierten Stuhlgang zu</p></li>
                            <li data-name="que7" data-aid="2" data-count="4" ><p>Trifft seltener als bei jedem vierten Stuhlgang zu</p></li>
                            <li data-name="que7" data-aid="3" data-count="5" ><p>Trifft überhaupt nicht zu</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que8" data-qid="8">
                    <h2>8. Nach dem Stuhlgang habe ich ein unangenehmes Völlegefühl.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que8" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que8" data-aid="1" data-count="2" ><p>Stimmt überwiegend</p></li>
                            <li data-name="que8" data-aid="2" data-count="4" ><p>Stimmt gelegentlich</p></li>
                            <li data-name="que8" data-aid="3" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que9" data-qid="9">
                    <h2>9. Ich habe bis zu drei Mal in der Woche Stuhlgang.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que9" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que9" data-aid="1" data-count="5" ><p>Stimmt nicht, ich habe öfter Stuhlgang</p></li>
                        </ul>
                    </div>
                </div>
                <div class="sc-block" style="" id="que10" data-qid="10">
                    <h2>10. Ich brauche manchmal rektale Unterstützung (z.B. Klistier, Zäpfchen), um Stuhl abzusetzen.</h2>
                    <div class="actions">
                        <ul>
                            <li data-name="que10" data-aid="0" data-count="1" ><p>Stimmt</p></li>
                            <li data-name="que10" data-aid="1" data-count="5" ><p>Stimmt nicht</p></li>
                        </ul>
                    </div>
                </div>
                <a href="#checkresult" id="checkresult" class="next-section buttonFlat">Test auswerten</a>
                <div class="clearfix"></div>
            </form>

            {{--RESULTS--}}
            <div class="sc-results">
                <h1>TEST „BIN ICH BETROFFEN?“</h1>
                <div id="result1">
                    <div id="result-constipation" class="result-box1">
                        <h2>"Die Betroffenen“</h2>
                        <p>Sie haben häufig Verstopfung und leiden unter zu seltenem Stuhlgang, der mit starkem Pressen einhergeht. Der Stuhl ist hart, die ausscheidbaren Stuhlmengen sind klein und es bleibt ein Gefühl der unvollständigen Entleerung zurück. Sprechen Sie mit Ihrem Arzt oder Apotheker darüber. Sie können Ihnen eine geeignete Therapie empfehlen.</p>
                        <div class="buttons">
                            {{--<a href="#" id="view_answers"><span class="scButton scViewPrint buttonFlat">Ausdrucken</span></a>--}}
                            <a href="{{URL::route('selbsttest')}}"><span class="scButton scViewPrint buttonFlat">Test wiederholen</span></a>
                        </div>
                    </div>
                </div>
                <div id="result2">
                    <div id="result-constipation" class="result-box2">
                        <h2>"Die Risikogruppe“</h2>
                        <p>Ihre Verdauung verliert immer wieder an Schwung und erste Anzeichen deuten auf die Entwicklung einer Verstopfung hin. Beobachten Sie dies genau. Möglicherweise hemmen bestimmte Lebensmittel oder Medikamente die Verdauung, die Sie meiden können. Darüber hinaus versuchen Sie Stress zu vermeiden und Ihrem Körper Ruhepausen zu gönnen. Eine ausgewogene Ernährung und ausgleichende Bewegung unterstützen zusätzlich den trägen Darm.</p>
                        <div class="buttons">
                            {{--<a href="#" id="view_answers"><span class="scButton scViewPrint buttonFlat">Ausdrucken</span></a>--}}
                            <a href="{{URL::route('selbsttest')}}"><span class="scButton scViewPrint buttonFlat">Test wiederholen</span></a>
                        </div>
                    </div>
                </div>
                <div id="result3">
                    <div id="result-constipation" class="result-box3">
                        <h2>"Die gelegentlich Betroffenen"</h2>
                        <p>Bei Ihnen scheint eigentlich alles im Lot zu sein und Ihre Verdauung streikt nur in Ausnahmefällen wie z.B. auf Reisen. Lesen Sie mehr über die Ursachen und Therapie einer Verstopfung, um diese zu kennen und im Fall der Fälle schnell und gezielt reagieren zu können.</p>
                        <div class="buttons">
                            {{--<a href="#" id="view_answers"><span class="scButton scViewPrint buttonFlat">Ausdrucken</span></a>--}}
                            <a href="{{URL::route('selbsttest')}}"><span class="scButton scViewPrint buttonFlat">Test wiederholen</span></a>
                        </div>
                    </div>
                </div>
                <div id="result4">
                    <div id="result-constipation" class="result-box4">
                        <h2>"Die Problemlosen“</h2>
                        <p>Sie haben kein Verstopfungsproblem und dürfen sich glücklich schätzen, denn eine Verstopfung mindert deutlich die Lebensqualität. Daher sollte dieses Volksleiden kein Tabuthema mehr sein. Zeigen Sie Verständnis für Betroffene und räumen Sie mit Vorurteilen auf.</p>
                        <div class="buttons">
							{{--<a href="#" id="view_answers"><span class="scButton scViewPrint buttonFlat">Ausdrucken</span></a>--}}
                            <a href="{{URL::route('selbsttest')}}"><span class="scButton scViewPrint buttonFlat">Test wiederholen</span></a>
                        </div>
                    </div>
                </div>
            </div>

            {{--POPUP-RESULT--}}
			{{--<div id="resultPopup">
                {{ Html::image  ('static_resources/images/close.png',  'costam' , array('id' => 'closeButton'))}}
                <div id="printFrame">
                    <h2>Selbst-Test Ergebnis</h2>
                    <div id="view_result">
                    </div>
                </div>
                <div id="print-link"><a href="#" class="scButton">Ausdrucken</a></div>
			</div>--}}

        </div>
    </div>
</div>
@stop