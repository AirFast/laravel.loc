require('./bootstrap');

// Custom js
if ($('.scroll-nav-tabs').length) {
    var navTabs = $('.scroll-nav-tabs'),
        activeTab = $('.scroll-nav-tabs .nav-link.active');

    var scrollPosition = activeTab.offset().left + activeTab.outerWidth() / 2 - navTabs.width() / 4;
    navTabs.animate({scrollLeft: scrollPosition}, 1000, 'swing');
}

if ($('.custom-range').length) {
    var range = $('.custom-range'),
        rangeVal = $('.range-value'),
        setRangeVal = () => {
            var newValue = Number((100 / range.attr('max')) * range.val());

            rangeVal.html(range.val());

            rangeVal.css({
                left: newValue + '%',
            });
        }

    setRangeVal();

    range.on('input', function () {
        setRangeVal();
    });

    range.on('mouseover', function () {
        rangeVal.removeClass('is-hidden');
    });

    range.on('mouseout', function () {
        rangeVal.addClass('is-hidden');
    });
}

if ($('.has-label').length) {
    $('.has-label').on('mousemove', function () {
        let scrollTop = $(window).scrollTop(),
            left = $(this).offset().left,
            top = $(this).offset().top;

        $(this).find('.label').css({
            left: left,
            top: top - scrollTop,
        });
    });
}

$('#create-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);

    let time = button.data('time');
    let userId1 = button.data('user-id-1');
    let userId2 = button.data('user-id-2');

    modal.find('#create-modal-time').text(time + ':00');
    modal.find('#store-time').val(time);
    modal.find('#store-user-id-1').val(userId1);
    modal.find('#store-user-id-2').val(userId2);
})

$('#update-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);
    const form = modal.find('#edit-form');

    let updateUrl = button.data('update-url');
    let crtDltSign = button.data('crt-dlt-sign');
    let time = button.data('time');
    let userId1 = button.data('user-id-1');
    let userId2 = button.data('user-id-2');

    form.attr('action', updateUrl);
    modal.find('#crt-dlt-sign').text(crtDltSign);
    modal.find('#update-modal-time').text(time + ':00');
    modal.find('#edit-user-id-1').val(userId1);
    modal.find('#edit-user-id-2').val(userId2);
})

$('#delete-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);
    const form = modal.find('#delete-form');

    let deleteUrl = button.data('delete-url');
    let userName = button.data('user');

    form.attr('action', deleteUrl);
    modal.find('#user-name').text(userName);
})

$('#delete-territory-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);
    const form = modal.find('#delete-form');

    let deleteUrl = button.data('delete-url');
    let territoryName = button.data('territory');

    form.attr('action', deleteUrl);
    modal.find('#territory-name').text(territoryName);
})

$('#update-territory-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);
    const form = modal.find('#update-form');

    let updateUrl = button.data('update-url');
    let territoryName = button.data('territory');

    form.attr('action', updateUrl);
    modal.find('#territory-name').text(territoryName);
})

if ($('#google-map').length) {
    var map = $('#google-map'),
        mapLatLngArr = map.data('map-lat-lng').split(', '),
        mapLatLng = new google.maps.LatLng(mapLatLngArr[0], mapLatLngArr[1]),
        mapZoom = map.data('map-zoom'),
        mapZoomControl = map.data('map-zoom-control'),
        mapTypeControl = map.data('map-type-control'),
        mapStreetViewControl = map.data('map-street-view-control'),
        mapFullScreenControl = map.data('map-full-screen-control'),
        mapScrollWheel = map.data('map-scroll-wheel'),
        mapMarkerIcon = map.data('map-marker-icon'),
        mapMarkerTitle = map.data('map-marker-title');

    var googleMap = new google.maps.Map(document.getElementById('google-map'), {
        center: mapLatLng,
        zoom: mapZoom,
        zoomControl: mapZoomControl,
        mapTypeControl: mapTypeControl,
        streetViewControl: mapStreetViewControl,
        fullscreenControl: mapFullScreenControl,
        scrollwheel: mapScrollWheel,
        gestureHandling: 'cooperative',
        styles: [
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.school",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.sports_complex",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit.station.bus",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "saturation": "21"
                    },
                    {
                        "weight": "4.05"
                    }
                ]
            }
        ]
    });

    var marker = new google.maps.Marker({
        position: mapLatLng,
        map: googleMap,
        icon: mapMarkerIcon,
        title: mapMarkerTitle
    });

    var infoWindowTitle = map.data('map-info-window-title'),
        infoWindowContent = '<div class="info-window-content">' +
            '<h6>' + infoWindowTitle + '</h6>' +
            '</div>';

    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent,
        maxWidth: 300
    });

    marker.addListener('click', function () {
        infoWindow.open(googleMap, marker);
    });
}
