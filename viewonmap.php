<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client Map</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 600px;
    }
  </style>
</head>
<body>
  <div id="map"></div>


  <!-- Leaflet JavaScript -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    var map = L.map('map').setView([-0.2777, 32.0817], 13);  // Set initial view to Bunjako Subcounty, Mpigi District, Uganda

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibmRlcmV5YSIsImEiOiJja3RraDFrOTIxbHBvMm9qb2FmOXB0bnk5In0.j9JypS7K2OJlqYuqytWw7A'
}).addTo(map);


    // Fetch client data from the server (Assuming you have an endpoint to fetch client data)
    fetch('fetch.php')
      .then(response => response.json())
      .then(data => {
        // Loop through client data and add markers to the map
        data.forEach(client => {
          L.marker([client.latitude, client.longitude]).addTo(map)
            .bindPopup(`<b>${client.job}</b><br>${client.full_name}`);
        });
      })
      .catch(error => {
        console.error('Error fetching client data:', error);
      });
  </script>
</body>
</html>
