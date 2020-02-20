var map
var targetElt = document.getElementById('target')

function initMap() {
  console.log('maps api')
  // Specify features and elements to define styles.
  var styleArray = [
    {
      featureType: 'landscape',
      stylers: [
        {
          saturation: -100
        },
        {
          lightness: 60
        }
      ]
    },
    {
      featureType: 'road.local',
      stylers: [
        {
          saturation: -100
        },
        {
          lightness: 40
        },
        {
          visibility: 'on'
        }
      ]
    },
    {
      featureType: 'transit',
      stylers: [
        {
          saturation: -100
        },
        {
          visibility: 'simplified'
        }
      ]
    },
    {
      featureType: 'administrative.province',
      stylers: [
        {
          visibility: 'off'
        }
      ]
    },
    {
      featureType: 'water',
      stylers: [
        {
          visibility: 'on'
        },
        {
          lightness: 30
        }
      ]
    },
    {
      featureType: 'road.highway',
      elementType: 'geometry.fill',
      stylers: [
        {
          color: '#ef8c25'
        },
        {
          lightness: 40
        }
      ]
    },
    {
      featureType: 'road.highway',
      elementType: 'geometry.stroke',
      stylers: [
        {
          visibility: 'off'
        }
      ]
    },
    {
      featureType: 'poi.park',
      elementType: 'geometry.fill',
      stylers: [
        {
          color: '#b6c54c'
        },
        {
          lightness: 40
        },
        {
          saturation: -40
        }
      ]
    },
    {}
  ]

  // Create a map object and specify the DOM element for display.
  map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: 44.840644, lng: -0.82945 },
    scrollwheel: false,
    // Apply the map style array to the map.
    styles: styleArray,
    zoom: 11
  })

  var myLatLng = { lat: 44.840644, lng: -0.82945 }

  // var marker = new google.maps.Marker({
  //   map: map,
  // 	draggable: true,
  //   position: myLatLng,
  // 	 icon :'../wp-content/themes/boutique-immo/assets/img/marker-twist.png'
  // });

  // var secretMessage = 'No place like home'

  //   var infowindow = new google.maps.InfoWindow({
  //       content: secretMessage
  //     });

  // marker.addListener('click', function() {
  //   infowindow.open(marker.get('map'), marker);
  //   map.setZoom(16);
  //   map.setCenter(marker.getPosition());
  // });

  var event = new Event('map:ready')
  window.dispatchEvent(event)
}

window.addEventListener('map:ready', function() {
  displayMarkersOnMap()
  let filterButton = document.querySelector('.filters')
  let resetButton = document.querySelector('.filters--reset')
  filterButton.addEventListener('click', applyFilters)
  resetButton.addEventListener('click', resetFilters)
})

function resetFilters() {
  document.querySelector('.filter-field.price-min').value = ''
  document.querySelector('.filter-field.price-max').value = ''
  document.querySelector('.filter-field.rooms-min').value = ''
  document.querySelector('.filter-field.rooms-max').value = ''
  document.querySelector('.filter-field.surface-min').value = ''
  document.querySelector('.filter-field.surface-max').value = ''

  applyFilters()
}

function applyFilters() {
  axios
    .get(ajax.url, {
      params: {
        action: 'fetch_biens',
        price_min: document.querySelector('.filter-field.price-min').value,
        price_max: document.querySelector('.filter-field.price-max').value,
        rooms_min: document.querySelector('.filter-field.rooms-min').value,
        rooms_max: document.querySelector('.filter-field.rooms-max').value,
        surface_min: document.querySelector('.filter-field.surface-min').value,
        surface_max: document.querySelector('.filter-field.surface-max').value,
        type: document.querySelector('.filter-field.type').value
      }
    })
    .then(response => {
      target.innerHTML = response.data
      target.querySelectorAll('.bien').forEach(element => {
        element.classList.add('animation-fade-up')
      })
    })
}

function displayMarkersOnMap() {
  var bienElements = document.querySelectorAll('.bien')

  for (var i = 0; i < bienElements.length; i++) {
    const bien = bienElements[i]
    if (bien.getAttribute('data-gps').length > 6) {
      var gps = new google.maps.LatLng(bien.getAttribute('data-gps').split(',')[0], bien.getAttribute('data-gps').split(',')[1])
      console.log(gps)
      console.log('data', bien.getAttribute('data-price'))
      const label = {
        text: bien.getAttribute('data-price')
      }
      var marker = new google.maps.Marker({
        position: gps,
        map: map,
        icon: '../wp-content/themes/boutique-immo/assets/img/marker-twist.svg',

        //label
      })
      var content = `<div class='map-bien-link'>
              <img src="${bien.getAttribute('data-thumbnail')}" />
              <div class='map-bien-child'>
              <h3 class='fw-600 source-sans fs-17 mb-15'>${bien.getAttribute('data-title')}</h3>
							<a class='fs-15 text-immo' href="${bien.getAttribute('data-url')}">Voir le bien</a></div></div>`
      var infowindow = new google.maps.InfoWindow({
        content
      })
      google.maps.event.addListener(
        marker,
        'click',
        (function(marker, content, infowindow) {
          return function() {
            infowindow.setContent(content)
            infowindow.open(map, marker)
          }
        })(marker, content, infowindow)
      )
    }
  }
}
