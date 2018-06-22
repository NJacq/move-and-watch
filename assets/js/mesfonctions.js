  var malongitude="";
  var malatitude="";
  var map = "";
  setTimeout("setPosition();",900);
  var lol = "bd";

function setPosition(){
    navigator.geolocation.getCurrentPosition(position)
  if(malongitude == "" & malatitude == "") {
    malatitude = 48.8566;
    malongitude = 2.3522;
    showCarte(malatitude, malongitude);
  }
}      
function position(pos) {
  var malatitude = pos.coords.latitude;
  var malongitude = pos.coords.longitude;
  showCarte(malatitude, malongitude);
}
var layerAllMarkers = '';


function showCarte( malatitude, malongitude ){ 
  L.mapquest.key = 'MAxEGKsMuGoi5Y7FMzaxC1RirEkOI5xg';
  
  //console.log( malatitude );
    map = L.mapquest.map('map', {     
    center: [malatitude,malongitude],
    layers: L.mapquest.tileLayer('map'),
    zoom: 13
  });
  layerAllMarkers = L.layerGroup().addTo(map);
  map.addControl(L.mapquest.control());
  map.addControl(L.mapquest.geocodingControl({
    position: 'topleft'
  }));

  L.mapquest.directionsControl({
    routeSummary: {
      enabled: true
      
    },
    narrativeControl: {
      enabled: true,
      compactResults: false,
      interactive: true

    }
  }).addTo(map);

  L.marker([malatitude,malongitude], {
    icon: L.mapquest.icons.flag({
      primaryColor: '#22407F',
      secondaryColor: '#3B5998',
      shadow: true,
      size: 'md',
      symbol: 'Ici'
    })
  }).addTo(layerAllMarkers);
}


function itineraire(){
  
  L.mapquest.directionsControl({
    routeSummary: {
      enabled: true
     
    },
    narrativeControl: {
      enabled: true,
      compactResults: false,
      interactive: true

    }
  }).addTo(map);
  
};
      
    
var Ardt = new Vue({
  el: '#checkboxArdt',
  data: {
    checkedArdt: [],
    infosByArdt: null,
    items: []
  },
  beforeCreate: function () {
    var self = this;
    $.ajax({
      url: 'models/model_allardt.php',
      success: function (response) {
        self.items = JSON.parse(response);
      },
      error: function (error) {
        console.log(error);
      }
    });
  },
  methods: {
    loadlist: function () {

      var formData = new FormData();
      map.removeLayer(layerAllMarkers);
      layerAllMarkers = L.layerGroup().addTo(map);
      formData.append('ardt', Ardt.checkedArdt);
      axios({
          method: 'post',
          url: '/move-and-watch/models/model_ardt.php',
          data: formData
        }).then(function (response) {
          Ardt.infosByArdt = response.data;
          L.geoJson(Ardt.infosByArdt, {
            onEachFeature: function (feature, layer) {
              layer.on({
                click: function showResultsInDiv() {
                  var d = document.getElementById('click-tournage');
                  d.innerHTML = "";
                  d.innerHTML +=
                    '<h4>Tout savoir sur:</h4>' +
                    feature.properties.titre + '</br>' +
                    '<b>Réalisateur : </b>' + feature.properties.realisateur + '</br>' +
                    '<b>Format : </b>' + feature.properties.type_de_tournage + '</br>' +
                    '<b>Organisme demandeur : </b>' + feature.properties.organisme_demandeur + '</br>' +
                    '<b>Adresse : </b>' + feature.properties.adresse + '</br>' +
                    '<b>Arrondissement : </b>' + feature.properties.ardt + '</br>'
                }
              });
            }
          }).addTo(layerAllMarkers);
          // console.log(response.data);
        })
        .catch(function (error) {
          // console.log(error);
        })
    }
  }
});

var Realisateurs = new Vue({
  el: '#realisateurs',
  data: {
    selectedRea: [],
    infosByRea: null,
    items: []
  },
  beforeCreate: function () {
    var self = this;
    $.ajax({
      url: 'models/model_rea.php',
      success: function (response) {
        self.items = JSON.parse(response);
      },
      error: function (error) {
        console.log(error);
      }
    });
  },
  methods: {
    loadlist: function () {
      var formData = new FormData();
      map.removeLayer(layerAllMarkers);
      layerAllMarkers = L.layerGroup().addTo(map);
      formData.append('realisateur', Realisateurs.selectedRea);
      axios({
          method: 'post',
          url: '/move-and-watch/models/model_byrea.php',
          data: formData
        }).then(function (response) {
            Realisateurs.infosByRea = response.data;
            console.log(response.data);
            L.geoJson(Realisateurs.infosByRea, {
              onEachFeature: function (feature, layer) {
                layer.on({
                  click: function showResultsInDiv() {
                    var d = document.getElementById('click-tournage');
                    d.innerHTML = "";
                    d.innerHTML +=
                      '<h4>Tout savoir sur:</h4>' +
                      feature.properties.titre + '</br>' +
                      '<b>Réalisateur : </b>' + feature.properties.realisateur + '</br>' +
                      '<b>Format : </b>' + feature.properties.type_de_tournage + '</br>' +
                      '<b>Organisme demandeur : </b>' + feature.properties.organisme_demandeur + '</br>' +
                      '<b>Adresse : </b>' + feature.properties.adresse + '</br>' +
                      '<b>Arrondissement : </b>' + feature.properties.ardt + '</br>'
                  }
                });
              }
            }).addTo(layerAllMarkers);
          // console.log(response.data);
        })
        .catch(function (error) {
          // console.log(error);
        })
    }
  }
});


var Format = new Vue({
  el: '#format',
  data: {
    selectedForm: [],
    infosByForm: null,
    items: []
  },
  beforeCreate: function () {
    var self = this;
    $.ajax({
      url: 'models/model_for.php',
      success: function (response) {
        self.items = JSON.parse(response);
      },
      error: function (error) {
        console.log(error);
      }
    });
  },
  methods: {
    loadlist: function () {
      var formData = new FormData();
      map.removeLayer(layerAllMarkers);
      layerAllMarkers = L.layerGroup().addTo(map);
      formData.append('format', Format.selectedForm);
      axios({
          method: 'post',
          url: '/move-and-watch/models/model_format.php',
          data: formData
        }).then(function (response) {
          Format.infosByForm = response.data;
          console.log(response.data);
          L.geoJson(Format.infosByForm, {
            onEachFeature: function (feature, layer) {
              layer.on({
                click: function showResultsInDiv() {
                  var d = document.getElementById('click-tournage');
                  d.innerHTML = "";
                  d.innerHTML +=
                    '<h4>Tout savoir sur:</h4>' +
                    feature.properties.titre + '</br>' +
                    '<b>Réalisateur : </b>' + feature.properties.realisateur + '</br>' +
                    '<b>Format : </b>' + feature.properties.type_de_tournage + '</br>' +
                    '<b>Organisme demandeur : </b>' + feature.properties.organisme_demandeur + '</br>' +
                    '<b>Adresse : </b>' + feature.properties.adresse + '</br>' +
                    '<b>Arrondissement : </b>' + feature.properties.ardt + '</br>'
                }
              });
            }
          }).addTo(layerAllMarkers);
          // console.log(response.data);
        })
        .catch(function (error) {
          // console.log(error);
        })
    }
  }
});