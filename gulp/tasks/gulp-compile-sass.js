var gulp = require('gulp')
  , gutil = require('gulp-util')
  , config = require('../gulp-config.json')
  , sass = require('gulp-sass')
  , concat = require('gulp-concat')
;

gulp.task('compile:sass', function() {
  gulp.src('src/scss/**/*.scss')
  .pipe(sass({style: 'expanded'}))
  .on('error', gutil.log)
  .pipe(concat(config.css.dist.filename))
  .pipe(gulp.dest(config.css.dist.dir))
});
