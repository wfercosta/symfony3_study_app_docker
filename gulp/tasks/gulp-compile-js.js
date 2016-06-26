var gulp = require('gulp')
  , gutil = require('gulp-util')
  , config = require('../gulp-config.json')
  , uglify = require('gulp-uglify')
  , concat = require('gulp-concat')

;

gulp.task('compile:js', function() {
  gulp.src('src/js/**/*.js')
  .pipe(uglify()).on('error', gutil.log)
  .pipe(concat(config.js.dist.filename))
  .pipe(gulp.dest(config.js.dist.dir))
});
