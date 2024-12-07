<div class="footer">
    <div class="bg">
        <div class="content clearfix">
            <div class="footer_nav_links">
                <a href="{{action('PageController@advice')}}">{{ trans('content.common_63') }}</a><span>|</span>
                <a href="{{action('PageController@impressum')}}">Impressum</a><span>|</span>
                <a href="{{action('PageController@privacy')}}" target="_blank">Datenschutz</a><span>|</span>                
                <a href="{{action('PageController@terms')}}">{{ trans('content.footer_7') }}</a><span>|</span>
                <a href="{{action('PageController@kontakt')}}">{{ trans('content.footer_6') }}</a><span>|</span>

                <span class="countrysel">|</span><a href="{{action('PageController@countryselector')}}">{{ trans('content.common_74') }}</a><span>|</span>
                <a href="{{action('PageController@sitemap')}}">{{ trans('content.footer_10') }}</a>

                <p class="copyright">{{ trans('content.footer_11') }} {{ trans('content.footer_11a') }}</p>
                <p class="disclaimer">					
                    {{ trans('content.footer_13') }}<br>
                    {{ trans('content.footer_14') }}
                </p>
            </div>
        </div>
    </div>
</div>
<div id="popup-background" onclick="popup.close();"></div>
<div id="popup-disclaimer">
    <div class="top_section_popup">
        <div class="close_button" onclick="popup.close();">
            <img src="{{ URL::to('static_resources/mobile/images/close.jpg')}}">
        </div>
        <p class="close_text">Pflichttextinformation schließen</p>
    </div>
    <div class="main_section_popup">
        <p>
			{{ trans('content.footer_13') }}
        </p>
    </div>
    <div class="footer_popup">
        <a href="#" onclick="self.print();" title="Seite Drucken" class="print">Seite Drucken</a>
        <p>{{ trans('content.footer_11') }}</p>
    </div>
</div>
<div id="popup-print">
    <div class="main_section_popup"></div>
    <div class="main_section_popup_additional"></div>
    <div class="footer_popup">	</div>
</div>
<script src="/static_resources/mobile/js/jquery.bxslider.js"></script>
<script src="//grmtech.net/r/de92f54963fc39a9d87c2253186808ea61.js" async defer></script>