var gulp = require('gulp')
  , gutil = require('gulp-util')
  , config = require('../gulp-config.json')
  , watch = require('gulp-watch')
;

gulp.task('watch', function () {

   watch('src/js/**/*.js', function () {
       gulp.start('compile:js');
   });

   watch('src/scss/**/*.scss', function () {
       gulp.start('compile:sass');
   });
});
