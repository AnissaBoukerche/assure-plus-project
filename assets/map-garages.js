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
    L.marker([garage.latitude, garage.longitude]).addTo(map)
      .bindPopup(`Merci d'avoir choisi ${garage.name}. Vous souhaitez être contactés ? <br/><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGarages">
      Être contacté
    </button>`);
  });
}
createMarkers();

const modalGarages = document.getElementById('modalGarages');

modalGarages.addEventListener('shown.bs.modal', function () {
  let temps = 30 * 60;
  const timerElement = document.getElementById('timer2');
  function countDown() {
    let minutes = parseInt(temps / 60, 10);
    let secondes = parseInt(temps % 60, 10);
    minutes = minutes < 10 ? '0' + minutes : minutes;
    secondes = secondes < 10 ? '0' + secondes : secondes;
    timerElement.innerText = `${minutes}:${secondes}`;
    temps = temps <= 0 ? 0 : temps - 1;
  }

  setInterval(countDown, 1000);
});
