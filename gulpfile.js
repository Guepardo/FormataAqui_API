const gulp 			= require('gulp');
const vueify 		= require('vueify');
const browserify 	= require('browserify');
const fs 			= require('fs');

vueify.compiler.applyConfig({});

gulp.task('build', () => {
	browserify('./resources/spa/main.js').
	transform(vueify).
	bundle().
	pipe(fs.createWriteStream('./public/js/bundle.js'));
});

gulp.task('watch', () => {
	gulp.watch('./resources/spa/componentes/*', ['build']);
	gulp.watch('./resources/spa/*', ['build'])
});

gulp.task('default', ['watch', 'build']);
