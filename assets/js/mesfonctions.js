
  var malongitude="";
  var malatitude="";
  var map = "";
  setTimeout("setPosition();",900);

function setPosition(){
  if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition(position);
}      
  
  


function showCarte( malatitude, malongitude ){ 
  L.mapquest.key = 'MAxEGKsMuGoi5Y7FMzaxC1RirEkOI5xg';
  
  //console.log( malatitude );
  var map = L.mapquest.map('map', {     
    center: [malatitude,malongitude],
    layers: L.mapquest.tileLayer('map'),
    zoom: 13
  });    
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
  }).addTo(map);



    
  $.getJSON('./models/model.php', function(data) {
    L.geoJSON(data, {
      
      onEachFeature:function(feature, layer) {
        

        layer.on({
            click: function showResultsInDiv() {
                var d = document.getElementById('click-tournage');
              
                d.innerHTML = "";

            
                d.innerHTML +=
                    '<h4>Tout savoir sur:</h4>'+ 
                      feature.properties.titre + '</br>' +
                    '<b>Réalisateur : </b>' + feature.properties.realisateur + '</br>' +
                    '<b>Format : </b>' + feature.properties.type_de_tournage + '</br>' +
                    '<b>Organisme demandeur : </b>' + feature.properties.organisme_demandeur + '</br>' +
                    '<b>Adresse : </b>' + feature.properties.adresse + '</br>' +
                    '<b>Arrondissement : </b>' + feature.properties.ardt + '</br>'
            }
          });
        }
      }).addTo(map);
    }); 
}

    
         
function position(pos){    
      var malatitude= pos.coords.latitude;
      var malongitude= pos.coords.longitude;
      showCarte(malatitude, malongitude);
      
}

function geo(){
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(position);
  }
}

function carte(){
  

  $.getJSON('./models/model.php', function(data) {
    L.geoJSON(data, {
       
               onEachFeature:function(feature, layer) {
                  
        
                   layer.on({
                       click: function showResultsInDiv() {
                           var d = document.getElementById('click-tournage');
                          
                           d.innerHTML = "";
      
                       
                           d.innerHTML +=
                               '<h4>Tout savoir sur:</h4>'+ 
                                 feature.properties.titre + '</br>' +
                               '<b>Réalisateur : </b>' + feature.properties.realisateur + '</br>' +
                               '<b>Format : </b>' + feature.properties.type_de_tournage + '</br>' +
                               '<b>Organisme demandeur : </b>' + feature.properties.organisme_demandeur + '</br>' +
                               '<b>Adresse : </b>' + feature.properties.adresse + '</br>' +
                               '<b>Arrondissement : </b>' + feature.properties.ardt + '</br>'
                       }
                  });
               }
           }).addTo(map);
  });

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



  document.addEventListener('click', function(event){
    console.log(event.target);
    console.log(document.querySelector('.leaflet-popup-content').innerText);
    })
  
};
      
    
