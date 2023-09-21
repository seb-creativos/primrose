import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
	build: {
		// I/O
		rollupOptions: {
			input: "./src/js/app.js",
			output: {
				entryFileNames: "[name].min.js",
				assetFileNames: "[name].min.[ext]",
			},
		},
		sourcemap: true,

		// WATCHDOG
		watch: {
			include: "./src/**/*.{scss,js}",
		},
	},

	resolve: {
		alias: {
			"@": path.resolve(__dirname, "src"),
			"~": path.resolve(__dirname, "node_modules"),
			"~bootstrap": path.resolve(
				__dirname,
				"node_modules/bootstrap/scss"
			),
		},
	},
});
