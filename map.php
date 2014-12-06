<!DOCTYPE html>
<html>
  <head>
    <style>
      #map-canvas {
        width: 500px;
        height: 400px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      var lat1= 0;
      var lng1= 0;

        function initialize(name) {
          var address = document.getElementById(name).value;
          var styles = [
    {
        "stylers": [
            {
                "saturation": -100
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": 50
            },
            {
                "gamma": 0
            },
            {
                "hue": "#50a5d1"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#333333"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [
            {
                "weight": 0.5
            },
            {
                "color": "#333333"
            }
        ]
    },
    {
        "featureType": "transit.station",
        "elementType": "labels.icon",
        "stylers": [
            {
                "gamma": 1
            },
            {
                "saturation": 50
            }
        ]
    }
];

          var arr = [];
          var x;
          $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address="'+address+'"&sensor=true%27', function(data){
            for(var x in data['results'][0]['geometry']['location']){
            arr.push(data[x]);
          }

          lat1 = parseInt(data['results'][0]['geometry']['location']['lat']);
           lng1 = parseInt(data['results'][0]['geometry']['location']['lng']);
                   var mapCanvas = document.getElementById('map-canvas');
         var myLatlng = new google.maps.LatLng(lat1, lng1);

        var mapOptions = {
          center: new google.maps.LatLng(lat1, lng1),
          zoom: 5,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          styles: styles
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: address
        });


          });

      }
      //google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
  <input type="text" name="txt" id="txt">
    <button onclick="initialize('txt');">click</button>
    <div id="map-canvas"></div>

  </body>
</html>