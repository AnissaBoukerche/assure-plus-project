const map = L.map('map').fitWorld();

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '© OpenStreetMap',
}).addTo(map);

map.locate({ setView: true, maxZoom: 16 });

function onLocationFound(e) {
  const radius = e.accuracy;

  L.marker(e.latlng).addTo(map).bindPopup(`Vous êtes ici`).openPopup();

  L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
  alert(e.message);
}

map.on('locationerror', onLocationError);

async function fetchGarages() {
  const response = await fetch('/garages.json');
  return response.json();
}

async function createMarkers() {
  const garages = await fetchGarages();
  garages.forEach((garage) => {
    L.marker([garage.latitude, garage.longitude])
      .addTo(map)
      .bindPopup(`${garage.name}`);
  });
}
createMarkers();
