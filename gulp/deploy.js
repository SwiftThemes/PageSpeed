/*******************************************************************************
 * Description:
 *
 *   Gulp file to push changes to remote servers (eg: staging/production)
 *
 * Usage:
 *
 *   gulp deploy --target
 *
 * Examples:
 *
 *   gulp deploy --production   // push to production
 *   gulp deploy --staging      // push to staging
 *
 ******************************************************************************/
var gulp = require('gulp');

// gulp-util - https://www.npmjs.com/package/gulp-util
var gutil = require('gulp-util');

// Minimist - https://www.npmjs.com/package/minimist
var argv = require('minimist')(process.argv);

// gulp-rsync - https://www.npmjs.com/package/gulp-rsync
var rsync = require('gulp-rsync');

// gulp-prompt - https://www.npmjs.com/package/gulp-prompt
var prompt = require('gulp-prompt');

// gulp-if - https://www.npmjs.com/package/gulp-if
var gulpif = require('gulp-if');

var markdown = require('gulp-markdown');

gulp.task('deploy', function () {

    // Dirs and Files to sync
    rsyncPaths = ['/Users/satish/Work/Development/htdocs/helium/wp-content/themes/buildtheme/page-speed/'];

    // Default options for rsync
    rsyncConf = {
        progress: true,
        incremental: true,
        relative: true,
        emptyDirectories: true,
        recursive: true,
        clean: true,
        exclude: [],
        port: 1122
    };
    rsyncConf.root = '/Users/satish/Work/Development/htdocs/helium/wp-content/themes/buildtheme/page-speed/';
    rsyncConf.hostname = '172.93.98.50'; // hostname


    // Staging
    if (argv.sg) {
        rsyncConf.username = 'satishgandham'; // ssh username
        rsyncConf.destination = '/home/satishgandham/public_html/blog/wp-content/themes/page-speed'; // path where uploaded files go

        // Production
    } else if (argv.tgd) {
        rsyncConf.username = 'tgdgeeks'; // ssh username
        rsyncConf.destination = '/home/tgdgeeks/public_html/wp-content/themes/page-speed'; // path where uploaded files go
        // Missing/Invalid Target
    } else if (argv.swift) {
        rsyncConf.username = 'swiftswift'; // ssh username
        rsyncConf.destination = '/home/swiftswift/public_html/blog/wp-content/themes/page-speed'; // path where uploaded files go
        // Missing/Invalid Target
    } else if (argv.demo) {
        rsyncConf.username = 'swiftswift'; // ssh username
        rsyncConf.destination = '/home/swiftswift/public_html/__demos__/wp-content/themes/page-speed'; // path where uploaded files go
    } else {
        throwError('deploy', gutil.colors.red('Missing or invalid target'));
    }


    // Use gulp-rsync to sync the files
    return gulp.src(rsyncPaths)
        .pipe(rsync(rsyncConf));

});


gulp.task('share', function () {
    rsyncPaths = ['/Users/satish/Work/Development/htdocs/helium/wp-content/themes/page-speed.zip'];

    // Default options for rsync
    rsyncConf = {
        progress: true,
        incremental: true,
        relative: true,
        emptyDirectories: true,
        recursive: true,
        clean: true,
        port: 1122,
        exclude: [],
    };
    rsyncConf.root = '/Users/satish/Work/Development/htdocs/helium/wp-content/themes/';
    rsyncConf.hostname = '172.93.98.50'; // hostname


    rsyncConf.username = 'swiftswift'; // ssh username
    rsyncConf.destination = '/home/swiftswift/public_html/page-speed_GBmZxE97uCJctcwXxI78.zip'; // path where uploaded files go
// Use gulp-rsync to sync the files
//     return gulp.src(rsyncPaths)
//         .pipe(rsync(rsyncConf));

    gulp.src(rsyncPaths)
        .pipe(rsync(rsyncConf))

    rsyncConf.destination = '/home/swiftswift/public_html/__updates__/packages/page-speed.zip'; // path where uploaded files go
    // gulp.src(rsyncPaths)
    //     .pipe(rsync(rsyncConf))
    return

});


gulp.task('markdown', function () {
        gulp.src('**/*.md')
            .pipe(markdown())
            .pipe(gulp.dest('./'))
    }
)

function throwError(taskName, msg) {
    throw new gutil.PluginError({
        plugin: taskName,
        message: msg
    });
}