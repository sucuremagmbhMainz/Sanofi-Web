/**
 * Created by nitro on 23.05.2016.
 */
window.ApoFinder || (window.ApoFinder = {}), ApoFinder = function () {
    "use strict";
    function e(e) {
        var n, a, t, i;
        arguments[1] !== !0 ? (a = e.coords.latitude, t = e.coords.longitude, n = new google.maps.LatLng(a, t)) : n = e, c = new google.maps.Map(document.getElementById("map-canvas"), {
            center: n,
            zoom: 15
        }), r = new google.maps.places.PlacesService(c), i = {
            location: n,
            rankBy: google.maps.places.RankBy.DISTANCE,
            types: ["pharmacy"]
        }, r.search(i, o)
    }

    function o(e, o) {
        o == google.maps.places.PlacesServiceStatus.OK && n(e)
    }

    function n(e) {
        var o = new google.maps.LatLngBounds;
        e.forEach(function (e) {
            var n = {reference: e.reference};
            r.getDetails(n, function (o, n) {
                var a;
                "OK" == n && null !== o ? (a = new google.maps.Marker({
                    map: c,
                    icon: p,
                    position: e.geometry.location
                }), google.maps.event.addListener(a, "click", function () {
                    var e = new google.maps.InfoWindow, n = "<p><strong>" + o.name + "</strong></p>";
                    void 0 !== o.adr_address && (n += "<p>" + o.adr_address.replace(/,( )*/gi, "<br>") + "</p><p>"), void 0 !== o.website && (n += '<a href="' + o.website + '" target="_blank"><span class="fa fa-external-link-square"></span> ' + o.website.replace(/http:/gi, "").replace(/\/\//gi, "").replace(/www\./gi, "").substr(0, 30) + "&hellip;</a>"), void 0 !== o.international_phone_number ? n += '<br><a href="tel:' + o.international_phone_number + '"><span class="fa fa-phone-square"></span> ' + o.international_phone_number + "</a></p>" : void 0 !== o.formatted_phone_number && (n += '<br><a href="tel:' + o.formatted_phone_number + '"><span class="fa fa-phone-square"></span> ' + o.formatted_phone_number + "</a></p>"), e.setContent(n), e.open(c, this)
                })) : (a = new google.maps.Marker({
                    map: c,
                    icon: p,
                    position: e.geometry.location
                }), google.maps.event.addListener(a, "click", function () {
                    var o = "<p><strong>" + e.name + "</strong></p><p>" + e.vicinity + "</p>", n = new google.maps.InfoWindow({content: o});
                    n.open(c, this)
                }))
            }), o.extend(e.geometry.location)
        }), c.fitBounds(o)
    }

    function a() {
    }

    function t() {
        var o, n, t, r, i, c;
        i = document.getElementById("searchform"), c = location.href.replace(location.search, ""), i.action = c, o = s.postcode, void 0 !== o ? (document.getElementById("postcode").value = o, t = new google.maps.Geocoder, t.geocode({address: "Deutschland " + o}, function (o, a) {
            n = a == google.maps.GeocoderStatus.OK ? new google.maps.LatLng(o[0].geometry.location.lat(), o[0].geometry.location.lng()) : new google.maps.LatLng(49.9742817, 8.04425), e(n, !0)
        })) : navigator.geolocation ? (r = {timeout: 1e4}, navigator.geolocation.getCurrentPosition(e, a, r)) : (n = new google.maps.LatLng(49.9742817, 8.04425), e(n, !0))
    }

    var r, i = function () {
        var e = window.location.search, o = {};
        return e.replace(new RegExp("([^?=&]+)(=([^&]*))?", "g"), function (e, n, a, t) {
            o[n] = t
        }), o
    }, s = i();
    Array.prototype.forEach || (Array.prototype.forEach = function (e) {
        if (void 0 === this || null === this)throw new TypeError;
        var o = Object(this), n = o.length >>> 0;
        if ("function" != typeof e)throw new TypeError;
        for (var a = arguments.length >= 2 ? arguments[1] : void 0, t = 0; n > t; t++)t in o && e.call(a, o[t], t, o)
    });
    var c, p = {
        path: "M 153.939,90.3076 L 328.62761,11.236002 L 475.56129,104.09653 L 475.56129,385.41838 L 538.10742,426.78318 L 461.44793,544.91827 L 348.84758,467.83743 L 348.84758,373.46691 L 282.65341,373.46691 L 282.65341,468.14798 L 175.08765,545.37316 L 17.866808,473.65838 L 124.83435,389.71243 L 153.939,404.5694 L 153.939,373.46592 L 92.331509,373.46592 L 92.331509,239.2376 L 153.94,239.2376 L 153.94,90.3076 M 282.74996,127.22208 L 282.74996,238.32584 L 348.84758,238.32584 L 348.84758,165.68536 L 282.74996,127.22208 z",
        fillColor: "red",
        fillOpacity: 1,
        scale: .033,
        stroke: "none"
    };
    return {init: t}
}(), ApoFinder.init();