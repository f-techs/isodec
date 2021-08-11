let map;
let markers = [];
function initMap() {
        let centerCoordinates = new google.maps.LatLng(9.085387225573092, -1.817929818315276);
    map = new google.maps.Map(document.getElementById('map'), {
        center: centerCoordinates,
        zoom: 18
    });
    var card = document.getElementById('pac-card');
    var input = document.getElementById('pac-input');
    var infowindowContent = document.getElementById('infowindow-content');

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

    var autocomplete = new google.maps.places.Autocomplete(input);
    var infowindow = new google.maps.InfoWindow();
    infowindow.setContent(infowindowContent);

    var marker = new google.maps.Marker({
        map: map,

    });

    autocomplete.addListener('place_changed', function () {
        document.getElementById("location-error").style.display = 'none';
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            document.getElementById("location-error").style.display = 'inline-block';
            document.getElementById("location-error").innerHTML = "Cannot Locate '" + input.value + "' on map";
            return;
        }

        map.fitBounds(place.geometry.viewport);
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        infowindowContent.children['place-icon'].src = place.icon;
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = input.value;
        infowindow.open(map, marker);
    });


    map.addListener("click", (mapsMouseEvent) => {
        clearMarkers()
        var gpsLatLong = mapsMouseEvent.latLng.toJSON();
        $('#gps').val(gpsLatLong.lat + ',' + gpsLatLong.lng);

        addMarker(mapsMouseEvent.latLng);

    });


}

// Adds a marker to the map and push to the array.
function addMarker(location) {

    const marker = new google.maps.Marker({
        position: location,
        map: map,
    });
    markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}

