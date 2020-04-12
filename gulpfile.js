// Load plugins
var gulp = require("gulp"),
  scss = require("gulp-ruby-sass"),
  concatCss = require("gulp-concat-css");
debug = require("gulp-debug");

wpPot = require("gulp-wp-pot");

var requireDir = require("require-dir");
requireDir("./gulp");

//CSS
gulp.task("sass", function () {
  scss([
    //'./assets/css/src/typography.scss',
    //'./assets/css/src/layout.scss',
    "./assets/css/src/main.scss",
  ])
    //.pipe(sass())
    .pipe(concatCss("style.prod.css"))
    .pipe(gulp.dest("./assets/css"));
});

//gulp.task('default', ['sass']);

gulp.task("watch", function () {
  gulp.watch("./assets/css/src/*.scss", gulp.series("sass"));
  gulp.watch("./assets/js/vendor/*.js", gulp.series("vendorsJs"));
  gulp.watch("./assets/js/custom/*.js", gulp.series("scriptsJs"));
  //gulp.watch('./development/scripts/*.js', gulp.series('scripts') );
});

/**
 *
 * Gulpfile setup
 *
 * @since 1.0.0
 * @authors Ahmad Awais, @digisavvy, @desaiuditd, @jb510, @dmassiani and @Maxlopez
 * @package neat
 * @forks _s & some-like-it-neat
 */

// Project configuration
var project = "page-speed", // Project name, used for build zip.
  url = "neat.dev", // Local Development URL for BrowserSync. Change as-needed.
  bower = "./assets/bower_components/"; // Not truly using this yet, more or less playing right now. TO-DO Place in Dev branch
build = "/Users/satish/Work/Development/can-delete/buildtheme/page-speed/"; // Files that you want to package into a zip go here
buildInclude = [
  // include common file types
  "**/*.php",
  "**/*.html",
  "**/*.css",
  "**/*.scss",
  "**/*.js",
  "**/*.svg",
  "**/*.ttf",
  "**/*.otf",
  "**/*.eot",
  "**/*.woff",
  "**/*.woff2",
  "**/*.pot",

  // include specific files and folders
  "screenshot.png",
  "readme.txt",
  "readme.md",
  "plugins",
  "**/plugins/*.zip",

  // exclude files and folders
  "!assets/images/customize/color-schemes/color_schemes.psd",
  "!node_modules/**/*",
  "!buildtheme/**/*",
  "!assets/bower_components/**/*",
  "!style.css.map",
  // '!assets/js/custom/*',
  "!gulp/*",
  "!*.psd",
  "!gulpfile.js",
];
buildIncludeOrg = [
  // include common file types
  "**/*.php",
  "**/*.html",
  "**/*.css",
  "**/*.scss",
  "**/*.js",
  "**/*.svg",
  "**/*.ttf",
  "**/*.otf",
  "**/*.eot",
  "**/*.woff",
  "**/*.woff2",
  "**/*.pot",

  // include specific files and folders
  "screenshot.png",
  "readme.txt",
  "readme.md",

  // exclude files and folders
  "!framework/helium/{pro,pro/**}",
  "!inc/{pro,pro/**}",
  "!tpl-airy-img.php",
  "!tpl-airy.php",
  "!tpl-wide.php",
  "!tpl-landing.php",
  "!tpl-lsb.php",
  "!tpl-rsb.php",
  "!tpl-woo-lsb.php",
  "!tpl-woo-rsb.php",

  "!author.php",
  "!category.php",
  "!tag.php",

  "!assets/images/customize/color-schemes/color_schemes.psd",
  "!node_modules/**/*",
  "!buildtheme/**/*",
  "!assets/bower_components/**/*",
  "!style.css.map",
  // '!assets/js/custom/*',
  "!gulp/*",
  "!*.psd",
  "!gulpfile.js",
];

// Load plugins
var gulp = require("gulp"),
  browserSync = require("browser-sync"), // Asynchronous browser loading on .scss file changes
  reload = browserSync.reload,
  autoprefixer = require("gulp-autoprefixer"), // Autoprefixing magic
  minifycss = require("gulp-uglifycss"),
  filter = require("gulp-filter"),
  uglify = require("gulp-uglify"),
  imagemin = require("gulp-imagemin"),
  newer = require("gulp-newer"),
  rename = require("gulp-rename"),
  concat = require("gulp-concat"),
  notify = require("gulp-notify"),
  cmq = require("gulp-combine-media-queries"),
  runSequence = require("gulp-run-sequence"),
  sass = require("gulp-sass"),
  plugins = require("gulp-load-plugins")({ camelize: true }),
  ignore = require("gulp-ignore"), // Helps with ignoring files and directories in our run tasks
  rimraf = require("gulp-rimraf"), // Helps with removing files and directories in our run tasks
  zip = require("gulp-zip"), // Using to zip up our packaged theme into a tasty zip file that can be installed in WordPress!
  plumber = require("gulp-plumber"), // Helps prevent stream crashing on errors
  cache = require("gulp-cache"),
  sourcemaps = require("gulp-sourcemaps");

// gulp.task(
//   "pot",
//   ["page-speed-translations", "helium-translations"],
//   function() {
//     // gulp.src( ...
//     console.log("Dummy");
//   }
// );

gulp.task("page-speed-translations", function () {
  return gulp
    .src("**/*.php")
    .pipe(
      wpPot({
        domain: "page-speed",
        package: "page-speed",
      })
    )
    .pipe(gulp.dest("./languages/page-speed.pot"));
});

gulp.task("helium-translations", function () {
  return gulp
    .src("**/*.php")
    .pipe(
      wpPot({
        domain: "helium",
        package: "helium",
      })
    )
    .pipe(gulp.dest("./languages/helium.pot"));
});

gulp.task(
  "pot",
  gulp.series(["page-speed-translations", "helium-translations"])
);

/**
 * Browser Sync
 *
 * Asynchronous browser syncing of assets across multiple devices!! Watches for changes to js, image and php files
 * Although, I think this is redundant, since we have a watch task that does this already.
 */
gulp.task("browser-sync", function () {
  var files = ["**/*.php", "**/*.{png,jpg,gif}"];
  browserSync.init(files, {
    // Read here http://www.browsersync.io/docs/options/
    proxy: url,

    // port: 8080,

    // Tunnel the Browsersync server through a random Public URL
    // tunnel: true,

    // Attempt to use the URL "http://my-private-site.localtunnel.me"
    // tunnel: "ppress",

    // Inject CSS changes
    injectChanges: true,
  });
});

/**
 * Styles
 *
 * Looking at src/sass and compiling the files into Expanded format, Autoprefixing and sending the files to the build folder
 *
 * Sass output styles: https://web-design-weekly.com/2014/06/15/different-sass-output-styles/
 */
gulp.task("styles", function (cb) {
  gulp
    .src("./assets/css/*.scss")
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        errLogToConsole: true,

        //outputStyle: 'compressed',
        outputStyle: "compact",
        // outputStyle: 'nested',
        // outputStyle: 'expanded',
        precision: 10,
      })
    )
    .pipe(sourcemaps.write({ includeContent: false }))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      autoprefixer(
        "last 2 version",
        "> 1%",
        "safari 5",
        "ie 8",
        "ie 9",
        "opera 12.1",
        "ios 6",
        "android 4"
      )
    )
    .pipe(sourcemaps.write("."))
    .pipe(plumber.stop())
    .pipe(gulp.dest("./"))
    .pipe(filter("**/*.css")) // Filtering stream to only css files
    .pipe(cmq()) // Combines Media Queries
    .pipe(reload({ stream: true })) // Inject Styles when style file is created
    .pipe(rename({ suffix: ".min" }))
    .pipe(
      minifycss({
        maxLineLen: 80,
      })
    )
    .pipe(gulp.dest("./"))
    .pipe(reload({ stream: true })) // Inject Styles when min style file is created
    .pipe(notify({ message: "Styles task complete", onLast: true }));

  cb();
});

/**
 * Scripts: Vendors
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
 */
gulp.task("vendorsJs", function () {
  return (
    gulp
      .src([
        "./assets/js/vendor/*.js",
        bower + "**/*.js",
        "!./assets/js/vendor/*min.js",
      ])
      // .pipe(concat('vendors.js'))
      // .pipe(gulp.dest('./assets/js'))
      .pipe(
        rename({
          // basename: "vendors",
          suffix: ".min",
        })
      )
      .pipe(uglify())
      .pipe(gulp.dest("./assets/js/vendor"))
      .pipe(notify({ message: "Vendor scripts task complete", onLast: true }))
  );
});

/**
 * Scripts: Custom
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
 */

gulp.task("scriptsJs", function () {
  return (
    gulp
      .src(["./assets/js/custom/*.js", "!./assets/js/custom/*min.js"])
      .pipe(debug())
      // .pipe(concat('custom.js'))
      // .pipe(gulp.dest('./assets/js'))
      .pipe(
        rename({
          // basename: "custom",
          suffix: ".min",
        })
      )
      .pipe(uglify())
      .pipe(gulp.dest("./assets/js/custom/"))
      .pipe(notify({ message: "Custom scripts task complete", onLast: true }))
  );
});

/**
 * Scripts: Optional
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
 */

gulp.task("optionalScriptsJs", function () {
  return (
    gulp
      .src(["./assets/js/custom/optional-*.js"])
      // .pipe(concat('custom.js'))
      // .pipe(gulp.dest('./assets/js'))
      .pipe(
        rename({
          suffix: ".min",
        })
      )
      .pipe(uglify())
      .pipe(gulp.dest("./assets/js/"))
      .pipe(notify({ message: "Custom scripts task complete", onLast: true }))
  );
});

/**
 * Images
 *
 * Look at src/images, optimize the images and send them to the appropriate place
 */
gulp.task("images", function () {
  // Add the newer pipe to pass through newer images only
  return gulp
    .src(["./assets/images/raw/**/*.{png,jpg,gif}"])
    .pipe(newer("./assets/images/"))
    .pipe(rimraf({ force: true }))
    .pipe(
      imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })
    )
    .pipe(gulp.dest("./assets/images/"))
    .pipe(notify({ message: "Images task complete", onLast: true }));
});

/**
 * Clean gulp cache
 */
gulp.task("clear", function () {
  cache.clearAll();
});

/**
 * Clean tasks for zip
 *
 * Being a little overzealous, but we're cleaning out the build folder, codekit-cache directory and annoying DS_Store files and Also
 * clearing out unoptimized image files in zip as those will have been moved and optimized
 */

gulp.task("cleanup", function () {
  return gulp
    .src(["./assets/bower_components", "**/.sass-cache", "**/.DS_Store"], {
      read: false,
      allowEmpty: true,
    }) // much faster
    .pipe(ignore("node_modules/**")) //Example of a directory to ignore
    .pipe(rimraf({ force: true }));
  // .pipe(notify({ message: 'Clean task complete', onLast: true }));
});
gulp.task("cleanupFinal", function (cb) {
  return gulp
    .src(["./assets/bower_components", "**/.sass-cache", "**/.DS_Store"], {
      read: false,
      allowEmpty: true,
    }) // much faster
    .pipe(ignore("node_modules/**")) //Example of a directory to ignore
    .pipe(rimraf({ force: true }));

  cb();
  // .pipe(notify({ message: 'Clean task complete', onLast: true }));
});

/**
 * Build task that moves essential theme files for production-ready sites
 *
 * buildFiles copies all the files in buildInclude to build folder - check variable values at the top
 * buildImages copies all the images from img folder in assets while ignoring images inside raw folder if any
 */

gulp.task("buildFiles", function () {
  return gulp
    .src(buildInclude)
    .pipe(gulp.dest(build))
    .pipe(notify({ message: "Copy from buildFiles complete", onLast: true }));
});

gulp.task("buildFilesOrg", function () {
  return gulp
    .src(buildIncludeOrg)
    .pipe(gulp.dest(build))
    .pipe(notify({ message: "Copy from buildFiles complete", onLast: true }));
});

/**
 * Images
 *
 * Look at src/images, optimize the images and send them to the appropriate place
 */
gulp.task("buildImages", function () {
  return gulp
    .src(["assets/images/**/*", "!assets/images/raw/**"])
    .pipe(gulp.dest(build + "assets/images/"))
    .pipe(
      plugins.notify({
        message: "Images copied to buildTheme folder",
        onLast: true,
      })
    );
});

/**
 * Zipping build directory for distribution
 *
 * Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
 */
gulp.task("buildZip", function () {
  // return 	gulp.src([build+'/**/', './.jshintrc','./.bowerrc','./.gitignore' ])
  return (
    gulp
      .src(build + "/**/*", {
        base: "/Users/satish/Work/Development/can-delete/buildtheme/",
      })
      .pipe(zip(project + ".zip"))
      .pipe(gulp.dest("/Users/satish/Desktop"))
      // .pipe(gulp.dest('/Users/satish/Dropbox/Public/'))
      .pipe(notify({ message: "Zip task complete", onLast: true }))
  );
});

//require('./gulp-bump.js')
// ==== TASKS ==== //
/**
 * Gulp Default Task
 *
 * Compiles styles, fires-up browser sync, watches js and php files. Note browser sync task watches php files
 *
 */

// Package Distributable Theme
gulp.task(
  "build",
  gulp.series(
    // "pot",
    "styles",
    "cleanup",
    "vendorsJs",
    "scriptsJs",
    "buildFiles",
    "markdown",
    "buildImages",
    "buildZip",
    "cleanupFinal"
  )
);

// Package Distributable Theme
gulp.task("buildOrg", function (cb) {
  gulp.series(
    "pot",
    "styles",
    "cleanup",
    "vendorsJs",
    "scriptsJs",
    "buildFilesOrg",
    "buildImages",
    "buildZip",
    "cleanupFinal",
    cb
  );
});

// Watch Task
gulp.task(
  "default",
  gulp.series(
    "styles",
    "vendorsJs",
    "scriptsJs",
    "images",
    "browser-sync",
    function () {
      gulp.watch("./assets/images/raw/**/*", ["images"]);
      gulp.watch("./assets/css/**/*.scss", ["styles"]);
      gulp.watch("./assets/js/**/*.js", ["scriptsJs", browserSync.reload]);
    }
  )
);
