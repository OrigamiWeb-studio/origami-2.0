if($("#map").length){
    function initMap() {
        var myLatLng = {lat: 48.689353, lng: 26.570980};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: myLatLng
        });

        var image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4CsvtJTZ_uws9LeVKFUf9PcDQ7iRFxqW_XhII4B8jqbk-o8ePMQ';

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Столовка',
            icon: image
        });
    }
    initMap();
}
