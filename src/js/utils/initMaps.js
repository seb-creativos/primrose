// #region Inline Bootstrap Loader
((g) => {
	var h,
		a,
		k,
		p = "The Google Maps JavaScript API",
		c = "google",
		l = "importLibrary",
		q = "__ib__",
		m = document,
		b = window;
	b = b[c] || (b[c] = {});
	var d = b.maps || (b.maps = {}),
		r = new Set(),
		e = new URLSearchParams(),
		u = () =>
			h ||
			(h = new Promise(async (f, n) => {
				await (a = m.createElement("script"));
				e.set("libraries", [...r] + "");
				for (k in g)
					e.set(
						k.replace(/ [A-Z]/g, (t) => "_" + t[0].toLowerCase()),
						g[k]
					);
				e.set("callback", c + ".maps." + q);
				a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
				d[q] = f;
				a.onerror = () => (h = n(Error(p + " could not load.")));
				a.nonce = m.querySelector("script [nonce]")?.nonce || "";
				m.head.append(a);
			}));
	d[l]
		? console.warn(p + " only loads once. Ignoring:", g)
		: (d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)));
})({
	key: global_params.map_api_key || "AIzaSyBY4Y942umBAtFyrAyHtp69JehsJRPyPSQ",
	v: "weekly",
	language: "es",
});
// #endregion

// To load libraries at runtime, use the await operator to call importLibrary() from within an async function
async function initMap(mapElement) {
	const { Map } = await google.maps.importLibrary("maps");

	const { lat, lng, zoom, style, pin, gmlink } = mapElement.dataset;

	const latitude = parseFloat(lat);
	const longitude = parseFloat(lng);
	const zoomLevel = parseFloat(zoom);
	const mapStyle = style ? JSON.parse(style) : [];
	const locationIcon = pin || null;

	const mapOptions = {
		center: { lat: latitude, lng: longitude },
		zoom: zoomLevel,
		minZoom: null,
		maxZoom: null,
		zoomControl: true,
		scrollwheel: false,
		disableDoubleClickZoom: false,
		draggable: true,
		keyboardShortcuts: true,
		gestureHandling: "auto",
		mapTypeId: "roadmap",
		mapTypeControl: false,
		streetViewControl: false,
		rotateControl: false,
		fullscreenControl: false,
		scaleControl: true,
		clickableIcons: true,
		disableDefaultUI: false,
		styles: mapStyle,
	};

	let map = new Map(mapElement, mapOptions);

	const locations = [
		{
			coords: { lat: latitude, lng: longitude },
			title: "",
			url: gmlink,
			icon: locationIcon,
		},
	];

	let markers = locations.map((location) => createMarker(location, map));
}

function createMarker(location, map) {
	const { coords, title, url, icon } = location;

	let marker = new google.maps.Marker({
		position: coords,
		label: title,
		icon: icon
			? {
					url: icon,
					labelOrigin: { x: -100, y: 16 },
			}
			: null,
		title: title,
		map: map,
	});

	marker.addListener("click", () => {
		window.open(url, "_blank").focus();
	});

	return marker;
}

export default function initMaps() {
	const mapElements = document.querySelectorAll(".map:not(.on-demand)");

	if (mapElements.length) {
		mapElements.forEach(initMap);
	}
}
