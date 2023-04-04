const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');

// SASS Task
function scssTask() {
    return src(['assets/sass/*.scss', 'public/sass/**/*.scss'], { sourcemaps: true })
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(postcss([cssnano()]))
    .pipe(dest('assets/css', {sourcemaps: '.' }));
}

// JavaScript Task
function jsTask() {
    return src('assets/js/*.js', { sourcemaps: true })
    .pipe(terser())
    .pipe(dest('dist/js', { sourcemaps: '.' }));
}

// Watch Task
function watchTask() {
    watch('*.php');
    watch(['assets/sass/**/*.scss', 'assets/js/*.js'], series(scssTask, jsTask));
}

// Default Gulp Task
exports.default = series(
    scssTask,
    jsTask,
    watchTask
);