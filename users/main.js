var mapPositioningApp = angular.module('mapPositioningApp',[]);
mapPositioningApp.controller('MapPositioning', ['$scope', '$http', function($scope, $http) {
    $scope.cities = [];
    $scope.markers = [];
    $scope.map;
    $scope.infoBox = new google.maps.InfoWindow();
    var mapContainer = document.getElementById('map');
    mapContainer.style.width = '50%';
    mapContainer.style.height = '500px';
    
    var i = 0;
    $http.get('/data/users/1.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });
    
    
    $http.get('/data/users/2.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });
       
    $http.get('/data/users/3.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });

    $http.get('/data/users/4.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });

    $http.get('/data/users/5.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });

    $http.get('/data/users/6.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });
    
    $http.get('/data/users/7.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });

    $http.get('/data/users/8.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });

    $http.get('/data/users/9.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });

    $http.get('/data/users/10.json').success(function(data) {
    $scope.cities[i] = data;
    i++;
    });


    $scope.initialize = function() {
        var marker, map;
        var mapOptions = {
            center: new google.maps.LatLng(49.85, 24.03),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        $scope.map = new google.maps.Map(mapContainer, mapOptions);



          $scope.map.addListener('click', function(e)
   {
     $.get('/users/geocode_reverse.php?latlng=' + e.latLng.lat() + ',' + e.latLng.lng())
     .done(function(response)
     {
       if(marker)
       {
         marker.setMap(null);
       }
       var position = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());

       marker = new google.maps.Marker(
       {
         position: position,
         map: $scope.map,
         title: response.address
       });
        $scope.map.setCenter(position);

     });

    	document.getElementById("lat").value = e.latLng.lat();
    	document.getElementById("lng").value = e.latLng.lng();
     	
   	});
    }

    $scope.showCity = function(city) {
        var coords = new google.maps.LatLng(city.lat, city.lng);
        $scope.infoBox.setContent(city.city + ' - ' + city.desc);
        $scope.infoBox.setPosition(coords);
        $scope.infoBox.open($scope.map);
        $scope.map.setCenter(coords);
    }
}]);
