var gulp = require('gulp')
  , gutil = require('gulp-util')
  , config = require('../gulp-config.json')
;

var sources = [
  config.global.bower.components.dir + "/bootstrap/dist/fonts/**/*"
];

gulp.task('copy:fonts', function() {
  gulp.src(sources)
  .pipe(gulp.dest(config.fonts.dist.dir))
});
