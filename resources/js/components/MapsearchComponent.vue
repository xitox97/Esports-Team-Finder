<template>
  <div class="flex flex-col">
    <p class="text-lg font-semibold">Nearby player</p>
    <div id="map" tabindex="0" class="max-w-5xl"></div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      locations: [],
      users: [],
      accounts: []
    };
  },
  created() {
    axios
      .get("/loc")
      .then(
        response => (
          (this.locations = response.data.locations),
          (this.users = response.data.users),
          (this.accounts = response.data.accounts)
        )
      );
  },

  methods: {},
  mounted() {
    var lamarin = ol.proj.transform(
      [11309258.355987966, 356120.4458968876],
      "EPSG:900913",
      "EPSG:900913"
    );

    //console.log(lamarin);

    var view = new ol.View({
      center: lamarin,
      zoom: 16 // 5
    });

    var vectorSource = new ol.source.Vector({});
    var places = [
      [
        11309119.314336767,
        355596.4074399446,
        "http://maps.google.com/mapfiles/ms/micons/blue.png"
      ],
      [
        11310070.774330724,
        356207.3101690329,
        "https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/17/17c5648c635b1a51f2457cb96bfed58d3fa3fc56_full.jpg"
      ],
      [
        11309258.355987966,
        356120.4458968876,
        "https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/37/3798569a9d02b99ddb7d806c58d7a1413b7949fe_full.jpg" /* [113, 140, 0]*/
      ]
    ];

    var features = [];
    for (var i = 0; i < places.length; i++) {
      var iconFeature = new ol.Feature({
        geometry: new ol.geom.Point(
          ol.proj.transform(
            [places[i][0], places[i][1]],
            "EPSG:900913",
            "EPSG:3857"
          )
        )
      });

      /* from https://openlayers.org/en/latest/examples/icon-color.html
    rome.setStyle(new ol.style.Style({
      image: new ol.style.Icon(({
       color: '#8959A8',
       crossOrigin: 'anonymous',
       src: 'https://openlayers.org/en/v4.6.5/examples/data/dot.png'
      }))
    })); */

      var iconStyle = new ol.style.Style({
        image: new ol.style.Icon({
          anchor: [0.5, 0.5],
          anchorXUnits: "fraction",
          anchorYUnits: "fraction",
          src: places[i][2],
          color: places[i][3],
          crossOrigin: "anonymous",
          scale: 0.4
        })
      });
      iconFeature.setStyle(iconStyle);
      vectorSource.addFeature(iconFeature);
    }

    var vectorLayer = new ol.layer.Vector({
      source: vectorSource,
      updateWhileAnimating: true,
      updateWhileInteracting: true
    });

    var map = new ol.Map({
      target: "map",
      view: view,
      layers: [
        new ol.layer.Tile({
          preload: 3,
          source: new ol.source.OSM()
        }),
        vectorLayer
      ],
      loadTilesWhileAnimating: true
    });
  }
};
</script>

