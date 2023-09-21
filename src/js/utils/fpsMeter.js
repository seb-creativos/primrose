export default class FPSMeter {
	constructor() {
		this.fpsContainer = document.createElement("div");
		this.fpsContainer.style.position = "fixed";
		this.fpsContainer.style.top = "10px";
		this.fpsContainer.style.left = "10px";
		this.fpsContainer.style.backgroundColor = "rgba(0,0,0,0.5)";
		this.fpsContainer.style.color = "white";
		this.fpsContainer.style.padding = "5px";
		this.fpsContainer.style.zIndex = "9999";
		document.body.appendChild(this.fpsContainer);

		this.lastTime = performance.now();
		this.frameCount = 0;

		this.updateFPS();
	}

	updateFPS() {
		const currentTime = performance.now();
		const deltaTime = currentTime - this.lastTime;

		this.frameCount++;

		if (deltaTime >= 1000) {
			const fps = (this.frameCount / deltaTime) * 1000;
			this.fpsContainer.textContent = Math.round(fps) + " FPS";
			this.frameCount = 0;
			this.lastTime = currentTime;
		}

		requestAnimationFrame(() => this.updateFPS());
	}
}
