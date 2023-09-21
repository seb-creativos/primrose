const swapTheme = () => {
	let currentTheme = document.documentElement.getAttribute("theme"),
		newTheme = currentTheme === "dark" ? "light" : "dark";
	document.documentElement.setAttribute("theme", newTheme);
	localStorage.setItem("theme", newTheme);
};

const swapThemeTrigger = document.querySelector(".scroll-progress");

if (swapThemeTrigger) {
	swapThemeTrigger.addEventListener("click", swapTheme);
}

export default swapTheme;
