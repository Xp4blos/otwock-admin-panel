var map = L.map('map', {
  center: [52.1023, 21.2669],
  zoom: 12,
  doubleClickZoom: false 
});

var p = document.getElementById('p');

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

var markers = [];

map.on('dblclick', function(event) {
  var latLng = event.latlng;

  var marker = L.marker(latLng).addTo(map);
  markers.push(marker);
  //Wyświetlanie pina
  fetchStreetNames(latLng)
  .then(function(streetNames) {
    var popupContent = "<form method='post' action='maphandler.php'><div class='ukrywanie'><input value="+ latLng.lat.toFixed(4) + " class='cordx' name='cordx'>"+ "<input value="+ latLng.lng.toFixed(4) + " class='cordy' name='cordy'><input value="+document.querySelector('.nazwa').textContent + " name='name'><input value="+document.querySelector('.kat').textContent + " name='kat'><input value="+document.querySelector('.opis').textContent + " name='opis'></div><br>" ;
    if (streetNames.length > 0) {
      popupContent += 'Ulica: ';
      streetNames.forEach(function(name) {
       
        popupContent += '<p class="street">' + name + '</p>';
        popupContent += '<input name="ulic" class="ukrywanie" value="' + name + '">';
        return name;
       
      });
      
      
    }
    
    popupContent += "<input type='submit' name='submit' class='map-submit' value='Potwierdź'></form>" 
    marker.bindPopup(popupContent).openPopup();

      var deleteButton = marker.getPopup().getContent().querySelector('.deleteButton');
      deleteButton.addEventListener('click', function() {
        deleteMarker(marker);
      });
    })
    .catch(function(error) {
      console.log('Error:', error);
    });

  console.log('Clicked coordinates:', latLng);
});

function deleteMarker(marker) {
  map.removeLayer(marker);
  var index = markers.indexOf(marker);
  if (index > -1) {
    markers.splice(index, 1);
  }
}

var deleteButton = document.getElementById('deleteButton');
deleteButton.addEventListener('click', function() {
  if (markers.length > 0) {
    var lastMarker = markers[markers.length - 1];
    deleteMarker(lastMarker);
  }
});

var drawnItems = new L.FeatureGroup().addTo(map);
var drawControl = new L.Control.Draw({
  edit: {
    featureGroup: drawnItems
  },
  draw: {
    polygon: true,
    rectangle: true,
    circle: true,
    circlemarker: false,
    polyline: false,
    marker: false
  }
});
map.addControl(drawControl);

map.on(L.Draw.Event.CREATED, function(event) {
  var layer = event.layer;
  drawnItems.addLayer(layer);
});

map.on(L.Draw.Event.EDITED, function(event) {
  var layers = event.layers;
  layers.eachLayer(function(layer) {
    // Warstwa
  });
});

map.on(L.Draw.Event.DELETED, function(event) {
  var layers = event.layers;
  layers.eachLayer(function(layer) {
    // Warstwa
  });
});

//Dodawanie ulic
function fetchStreetNames(latLng) {
  var url = 'https://nominatim.openstreetmap.org/reverse?format=json&lat=' + latLng.lat + '&lon=' + latLng.lng;
  return fetch(url)
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      var streetNames = [];
      if (data.address && data.address.road) {
        streetNames.push(data.address.road);
      }
      
      return streetNames;
    });
}

