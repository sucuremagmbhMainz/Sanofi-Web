var gulp = require("gulp");
var uglify = require("gulp-uglify");
var source = require("vinyl-source-stream");
var buffer = require("vinyl-buffer");
var sourcemaps = require("gulp-sourcemaps");
var browserify = require("browserify");
var concat = require("npm");
var babelify = require("babelify");
var minifyCSS = require("gulp-minify-css");
var sass = sass = require('gulp-sass')(require('sass'));
const terser = require("gulp-terser");
/**
 *
 * for gulp-sass python2.7 is needed. Ubuntu 20.04/20.10 apt install python
 *
 * npm install --save-dev gulp babelify browserify babel-preset-es2015 gulp-connect vinyl-source-stream vinyl-buffer
 * gulp-uglify gulp-sourcemaps @babel/plugin-proposal-class-properties @babel/env @babel/react gulp-concat
 * gulp-minify-css gulp-terser
 */
gulp.task("apply-prod-environment", function () {
	return (process.env.NODE_ENV = "production");
});
// gulp.task("build", function () {
// 	return browserify({ entries: "core/react/src/index.js" })
// 		.transform(
// 			babelify.configure({
// 				presets: ["@babel/env", "@babel/react"],
// 				plugins: ["@babel/plugin-proposal-class-properties"],
// 			})
// 		)
// 		.bundle()
// 		.pipe(source("reactCompiled.js"))
// 		.pipe(buffer())
// 		.pipe(sourcemaps.init())
// 		.pipe(terser({ mangle: false }))
// 		.pipe(gulp.dest("design/js/"));
// });

// task for project Related react things beneath /react/src
gulp.task("buildProject", function () {
	return browserify({ entries: "react/src/index.js" })
		.transform(
			babelify.configure({
				presets: ["@babel/env", "@babel/react"],
				plugins: ["@babel/plugin-proposal-class-properties"],
			})
		)
		.bundle()
		.pipe(source("reactProjectCompiled.js"))
		.pipe(buffer())
		.pipe(sourcemaps.init())
		.pipe(terser({ mangle: false }))
        // .pipe(gulp.dest("design/js/"));
        .pipe(gulp.dest("themes/pdb-theme-at/assets/js/react/"));
});

// rules for react core  css/scss files to be compiled in reactCss.css in design/css which gets an include from core if file
// exists
var sass_rules = {
	merge: ["core/react/css/**/*"],
	in: "design/css",
	as: "reactCss.css",
	watch: "core/react/css/**/*",
	sourcemap: "map",
};

gulp.task("sass", function () {
	return gulp
		.src(sass_rules.merge) // Get 'assets/scss/app.scss'
		.pipe(sass()) // SASS compile
		.pipe(concat(sass_rules.as)) // as app.css
		.pipe(minifyCSS())
		.pipe(sourcemaps.init())
		.pipe(sourcemaps.write(sass_rules.sourcemap))
		.pipe(gulp.dest(sass_rules.in)); // in 'assets/css'
});

// rules for react css/scss Project files to be compiled in reactProjectCss.css in design/css which gets an include from core if file
// exists
var sass_rules_project = {
	merge: ["react/**/*.*css"],
	in: "design/css",
	as: "reactProjectCss.css",
	watch: "react/**/*.*css",
	sourcemap: "map",
};

gulp.task("sassProject", function () {
	return gulp
		.src(sass_rules_project.merge) // Get 'assets/scss/app.scss'
		.pipe(sass()) // SASS compile
        .pipe(concat(sass_rules_project.as)) // as app.css
		.pipe(minifyCSS())
		.pipe(sourcemaps.init())
		.pipe(sourcemaps.write(sass_rules_project.sourcemap))
		.pipe(gulp.dest(sass_rules_project.in)); // in 'assets/css'
});
gulp.task("watch", function () {
    process.env.NODE_ENV = "production";

	// gulp.watch("core/react/src/**/*.js", gulp.series(["build"]));
	gulp.watch("react/src/**/*.js", gulp.series(["buildProject"]));
	// gulp.watch(sass_rules.watch, gulp.series(["sass"]));
	// gulp.watch(sass_rules_project.watch, gulp.series(["sassProject"]));
});
