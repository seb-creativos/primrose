import GLightbox from 'glightbox';

export default class singleProperty {
	mapElement;
	galleryObj;
	galleryVideoObj;

	constructor() {
		// Map Initialization
		this.mapElement = document.querySelector('.map');
		if (this.mapElement) this.initMapButtons();

		// Gallery Initialization
		this.initGallery();
	}

	// To load libraries at runtime, use the await operator to call importLibrary() from within an async function
	async initMap() {
		const { Map } = await google.maps.importLibrary('maps');

		const { lat, lng, zoom, style } = this.mapElement.dataset;

		const latitude = parseFloat(lat);
		const longitude = parseFloat(lng);
		const zoomLevel = parseFloat(zoom);
		const mapStyle = style ? JSON.parse(style) : [];

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
			gestureHandling: 'auto',
			mapTypeId: 'roadmap',
			mapTypeControl: false,
			streetViewControl: false,
			rotateControl: false,
			fullscreenControl: false,
			scaleControl: true,
			clickableIcons: true,
			disableDefaultUI: false,
			styles: mapStyle,
		};

		const map = new Map(this.mapElement, mapOptions);

		new google.maps.Circle({
			center: mapOptions.center,
			radius: 500,
			fillColor: '#A02245',
			strokeColor: '#A02245',
			strokeWeight: 0,
			strokeOpacity: 0,
			map,
		});
	}

	initMapButtons() {
		this.mapElement.querySelector('.map__trigger').addEventListener( 'click', async () => {
			this.initMap();
        } ) 
	}

	initGallery() {
		// IMAGES
		// const images = document.querySelectorAll('.glightbox');
		// const imagesArr = Array.from(images).map((image) => {
		// 	return {
		// 		href: image.src ?? image.dataset.src,
		// 		type: 'image',
		// 	};
		// });

		// this.galleryObj = GLightbox({
		// 	touchNavigation: true,
		// 	loop: true,
		// 	autoplayVideos: true,
		// 	elements: imagesArr,
		// });

		// const inViewElements = document.querySelectorAll(
		// 	'.property-gallery__item .glightbox'
		// );
		// inViewElements?.forEach((element, index) => {
		// 	element.addEventListener('click', () => {
		// 		this.galleryObj.openAt(index);
		// 	});
		// });

		// VIDEO
		const videos = document.querySelectorAll('.glightbox-video');
		const videosArr = Array.from(videos).map((video) => {
			const href = video.src ?? video.dataset.src;

			let source;
			if (href.includes('youtube.com') || href.includes('youtu.be')) {
				source = 'youtube';
			} else if (href.includes('vimeo.com')) {
				source = 'vimeo';
			} else {
				source = 'local';
			}

			return {
				href,
				type: 'video',
				source,
			};
		});

		this.galleryVideoObj = GLightbox({
			touchNavigation: true,
			loop: true,
			autoplayVideos: true,
			elements: videosArr,
		});

		videos?.forEach((video) => {
			video.addEventListener('click', () => {
				this.galleryVideoObj.open();
			});
		});
	}
}
