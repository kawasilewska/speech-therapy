function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 54.371674, lng: 18.612429},
    scrollwheel: false,
    zoom: 17
  });

  var marker = new google.maps.Marker({
  	map: map,
    position: {lat: 54.371674, lng: 18.612429},
    title: 'Wydział Elektroniki, Telekomunikacji i Informatyki Politechniki Gdańskiej'
  });

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h6 id="firstHeading" class="firstHeading">Wydział Elektroniki, Telekomunikacji i Informatyki Politechniki Gdańskiej</h6>'+
      '<div id="bodyContent">'+'<p>Gabriela Narutowicza 11/12, 80-233 Gdańsk</p>'+'<a href="http://eti.pg.edu.pl/">'+
      'http://eti.pg.edu.pl/</a>'+'</div>'+'</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}

initMap();