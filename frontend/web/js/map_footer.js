$(function () {
    let map, marker, popup;

    function setPoint(target) {
        let coords = [parseFloat(target.attr("data-latitude")), parseFloat(target.attr("data-longitude"))];
        map.flyTo(coords);
        if ( marker ) {
            marker.remove();
        }
        marker = DG.marker(coords);
        if ( popup ) {
            popup.remove();
        }
        popup = DG.popup();
        popup.setLatLng(coords).setContent(target.attr("data-popup"));

        marker.addTo(map).bindPopup(popup);
        map.openPopup(popup);
    }

    DG.then(function () {
        let start = $(".map_content.active");
        let coords = [start.attr("data-latitude"), start.attr("data-longitude")];
        map = DG.map('map', {
            center: coords,
            zoom: 13
        });
        setPoint(start);

        $(".map_content").on("click", (event) => {
            let target = $(event.currentTarget);
            setPoint(target);
        });
    });


})
