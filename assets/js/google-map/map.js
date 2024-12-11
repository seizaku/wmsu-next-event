export async function initMap(coordinates) {
  // Request needed libraries.
  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
  const map = new Map(document.getElementById("map"), {
    center: {
      lat: coordinates?.lat ?? 6.9214,
      lng: coordinates?.lng ?? 122.079,
    },
    zoom: 14,
    mapId: "4504f8b37365c3d0",
  });
  const infoWindow = new InfoWindow();
  const draggableMarker = new AdvancedMarkerElement({
    map,
    position: {
      lat: coordinates?.lat ?? 6.9214,
      lng: coordinates?.lng ?? 122.079,
    },
    gmpDraggable: true,
    title: "This marker is draggable.",
  });

  draggableMarker.addListener("dragend", (event) => {
    const position = draggableMarker.position;

    infoWindow.close();
    infoWindow.setContent(`Pin dropped at: ${position.lat}, ${position.lng}`);
    infoWindow.open(draggableMarker.map, draggableMarker);
  });
}
