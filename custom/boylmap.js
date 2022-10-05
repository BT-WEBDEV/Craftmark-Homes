var map;
function initMap() {
      map = new google.maps.Map(document.getElementById('googft-mapCanvas'), {
      zoom: 8,
      center: {lat: 38.8946862, lng: -77.096291}
  });

  // Load GeoJSON.
  map.data.loadGeoJson('gz_2010_us_050_00_20m_edited.json');
  
  // Color each letter gray. Change the color when the isColorful property
  // is set to true.
  map.data.setStyle(function(feature) {
      return /** @type {!google.maps.Data.StyleOptions} */({
          fillColor: feature.getProperty('color'),
          strokeColor: feature.getProperty('color'),
          strokeWeight: 1
      });
  });
  // When the user clicks, set 'isColorful', changing the color of the letters.
  map.data.addListener('click', function(event) {
      event.feature.setProperty('isColorful', true);
  });

  // When the user hovers, tempt them to click by outlining the letters.
  // Call revertStyle() to remove all overrides. This will use the style rules
  // defined in the function passed to setStyle()
  // map.data.addListener('mouseover', function(event) {
  //     map.data.revertStyle();
  //     map.data.overrideStyle(event.feature, {strokeWeight: 8});
  // });

  // map.data.addListener('mouseout', function(event) {
  //     map.data.revertStyle();
  // });
}