mapboxgl.accessToken = 'pk.eyJ1IjoiYmxhaXplZmYiLCJhIjoiY2s5bTYwZmlwMmRndzNmbzFpcjJoczlwMiJ9.cogH7m0a7U4jCtT7aH8WHg';
var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
mapboxClient.geocoding
    .forwardGeocode({
        query: "<?php echo $venueAddress ?>",
        autocomplete: false,
        limit: 1
    })
    .send()
    .then(function(response) {
        if (
            response &&
            response.body &&
            response.body.features &&
            response.body.features.length
        ) {
            var feature = response.body.features[0];

            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: feature.center,
                zoom: 10
            });
            //map.on('load', () => {
            //    map.resize();
            //});  
            new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
        }
    });