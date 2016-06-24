var gulp = require('gulp')
  , gutil = require('gulp-util')
  , config = require('../gulp-config.json')
  , concat = require('gulp-concat')
;

var sources = [
  config.global.bower.components.dir + "/bootstrap/dist/css/bootstrap.min.css"
];

gulp.task('concat:css-third-party', function() {
  gulp.src(sources)
  .pipe(concat(config.css.dist.filename_libs))
  .pipe(gulp.dest(config.css.dist.dir))
})
