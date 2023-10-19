const path = require("path");
const WebpackBar = require("webpackbar");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
	mode: "production",
	entry: "./src/js/app.js",
	output: {
		filename: "app.min.js",
	},
	devtool: "source-map",

	resolve: {
		alias: {
			"~": path.resolve(__dirname, "node_modules"),
		},
	},

	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					"css-loader",
					"postcss-loader",
					"sass-loader",
				],
			},
		],
	},

	plugins: [
		new WebpackBar(),
		new MiniCssExtractPlugin({
			filename: "app.min.css",
		}),
	],

	performance: {
		maxAssetSize: 512000,
		maxEntrypointSize: 1280000,
	},
};
