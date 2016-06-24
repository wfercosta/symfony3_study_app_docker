var gulp = require('gulp')
  , gutil = require('gulp-util')
  , config = require('../gulp-config.json')
  , concat = require('gulp-concat')
;


var sources = [
    config.global.bower.components.dir + "/jquery/dist/jquery.min.js"
  , config.global.bower.components.dir + "/bootstrap/dist/js/bootstrap.min.js"
];

gulp.task('concat:js-third-party', function() {
  gulp.src(sources)
  .pipe(concat(config.js.dist.filename_libs))
  .pipe(gulp.dest(config.js.dist.dir))
})
