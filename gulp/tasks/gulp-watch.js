var gulp = require('gulp')
  , gutil = require('gulp-util')
  , config = require('../gulp-config.json')
  , watch = require('gulp-watch')
;

gulp.task('watch', function () {

   watch('scripts/**/*.js', function () {
       gulp.start('compile:js');
   });

   watch('styles/**/*.scss', function () {
       gulp.start('compile:sass');
   });
});
