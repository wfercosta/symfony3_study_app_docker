var gulp = require('gulp');
require('require-dir')('./tasks');

gulp.task('build', ['concat:js-third-party', 'concat:css-third-party', 'copy:fonts', 'compile:sass', 'compile:js']);
gulp.task('default', ['compile:sass', 'compile:js']);
