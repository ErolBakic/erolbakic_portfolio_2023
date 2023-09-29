'use strict';

const { gulp, watch, series, src, dest } = require('gulp');
const sass                               = require('gulp-sass')(require('sass'));
const autoprefixer                       = require('gulp-autoprefixer');
const uglify                             = require('gulp-uglify');
const rename                             = require('gulp-rename');
const include                            = require('gulp-include')

const styles = [
  'assets/scss/main.scss'
];

const scripts = [
  'assets/js/main.js',
  'assets/js/partials/*'
];

// Optimize SCSS
const css = (e) => {
  styles.forEach(style => {
    src(style)
      .pipe(sass({
        outputStyle: 'compressed'
      }).on('error', sass.logError))
      .pipe(autoprefixer({
        cascade: false
      }))
      .pipe(rename({suffix:'.min'}))
      .pipe(dest('assets/css/'));
  });
}

// Optimize JS
const js = (e) => {
  scripts.forEach(script => {
    src(script)
      .pipe(include())
        .on('error', console.log)
        /* .pipe(babel({
          presets: [
            ["@babel/preset-env", {
              "useBuiltIns": false,
            }],
          ],
          plugins: [
            "@babel/plugin-transform-runtime"
          ]
        })) */
      .pipe(uglify())
      .pipe(rename({
        suffix: '.min'
      }))
      .pipe(dest('./assets/js/'))
  });

}

exports.default = () => {

  // Watch SCSS
  styles.forEach(style => {
    watch(style, series(css)).on('change', () => {
      css();
      console.log(`${style} has been compiled successfully!`);
    });
  });

  // Watch JS
  scripts.forEach(script => {
    watch(script, series(js)).on('change', () => {
      js();
      console.log(`${script} has been compiled successfully!`);
    });
  });


};
