<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.css">
    <link rel="stylesheet" href="https://unpkg.com/ol-popup@4.0.0/src/ol-popup.css">
    <link href="https://cdn.jsdelivr.net/npm/ol-geocoder@latest/dist/ol-geocoder.min.css" rel="stylesheet">
    <style type="text/css">
      html, body, #map {
        width: 100%;
        height: 100%;
        overflow: hidden;
      }
      body {
        font: 1em/1.5 BlinkMacSystemFont,-apple-system,"Segoe UI","Roboto","Oxygen","Ubuntu","Cantarell","Fira Sans","Droid Sans","Helvetica Neue","Helvetica","Arial",sans-serif;
        color: #222;
        font-weight: 400;
      }
      #map {
        position: absolute;
        z-index: 1;
        top: 0; bottom: 0;
      }
    </style>
  </head>
  <body>
    <div id="map" tabindex="0"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.js"></script>
    <script src="https://unpkg.com/ol-popup@4.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/ol-geocoder"></script>
    <script>
        (function(win, doc) {


            var olview = new ol.View({
                // projection: 'EPSG:4326',
                center: [0, 0],
                zoom: 3,
                minZoom: 2,
                maxZoom: 20,
                }),
                baseLayer = new ol.layer.Tile({
                source: new ol.source.OSM(),

                }),
                map = new ol.Map({
                target: doc.getElementById('map'),
                view: olview,
                layers: [baseLayer],

                }),
                popup = new ol.Overlay.Popup();

            //Instantiate with some options and add the Control
            var geocoder = new Geocoder('nominatim', {
                provider: 'osm',
                targetType: 'text-input',
                lang: 'en',
                placeholder: 'Search for ...',
                countrycodes: 'my',
                limit: 5,
                keepOpen: true,
                autoComplete: true,
            });

            map.addControl(geocoder);
            map.addOverlay(popup);

            //Listen when an address is chosen
            geocoder.on('addresschosen', function(evt) {
                console.info(evt);
                window.setTimeout(function() {
                popup.show(evt.coordinate, evt.address.formatted);
                }, 3000);
            });
            })(window, document);
    </script>
  </body>
</html>
