@section('scripts')

<script type="text/javascript">
function onClickUrl(val){
  location.href= val;
        }
    </script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

function trackOutboundLink(link, category, action1, action2) {
  try { 
    _gaq.push(['_trackEvent', category , action1, action2]); 
    } catch(err){} 
      setTimeout(function() {
        document.location.href = link.href;
    }, 100);
  }

var myVideo = document.getElementById("video1");

function play() {
  myVideo.load();
  myVideo.play();
}

function stop() {
  myVideo.pause();
}

</script>
@show
