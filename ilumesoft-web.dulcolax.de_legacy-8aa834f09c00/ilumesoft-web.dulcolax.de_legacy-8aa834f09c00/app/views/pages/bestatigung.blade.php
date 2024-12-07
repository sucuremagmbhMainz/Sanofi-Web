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
            <h1>Eingangsbestätigung</h1>
          
            <p>Wir haben soeben Ihre Anfrage erhalten und werden Ihnen so schnell wie möglich antworten.</p>
            <p>Inhalte, die Sie interessieren könnten:</p>        
            <br/>
            <p>
                <a href="{{ URL::route('advice') }}" class="standalonelink" title="Häufig gestellte Fragen &amp; die Antworten unserer Experten">
                        - Häufig gestellte Fragen &amp; die Antworten unserer Experten
                </a>
            </p>
            <p>
                <a href="{{ URL::route('home') }}" class="standalonelink" title="Zurück zur Startseite">
                        - Zurück zur Startseite
                </a>
            </p>
        </div>
    </div>
</div>


@stop 