// Folder destino
var distFolder = 'dist/';

var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    concat = require('gulp-concat'),
    path = require('path'),
    server = require('gulp-server-livereload'),
    sourcemaps = require('gulp-sourcemaps'),
    less = require('gulp-less'),
    csso = require('gulp-csso'),
    uglify = require('gulp-uglify'),
    autoprefixer = require('autoprefixer'),
    postcss = require('gulp-postcss'),
    htmlmin = require('gulp-htmlmin');
    

var modules = path.join(__dirname,'node_modules');
var owlcarousel = path.join(modules,'owl.carousel','dist');
var jquery = path.join(modules,'jquery','dist');
var fontawesome = path.join(modules,'@fortawesome','fontawesome-free');


//Copiar imágenes a la carpeta de distribución
  gulp.task('copyimg', function() {
    return gulp.src('src/img/*')
        .pipe(gulp.dest(distFolder + '/img/'));
});

//Minificar archivos javascript
gulp.task('javascript', function() {

    return gulp.src(
        [
            //path.join( jquery , 'jquery.min.js'),
            path.join( owlcarousel , 'owl.carousel.js'),
            path.join( './src/js/', 'carousels.js'),
            path.join( './src/js/', 'jquery.slicknav.min.js'),
            './src/js/navigation.js',

        ])
        .pipe(plumber())
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(gulp.dest(distFolder + './js/'));
});

gulp.task('less', function () {
    return gulp.src(
        [
            path.join(owlcarousel,'assets','owl.carousel.min.css'),
            path.join(owlcarousel,'assets','owl.theme.default.min.css'),
            './src/less/slicknav.min.css',
           
            './src/less/styles.less'
        ]
    )
    .pipe(plumber())
    .pipe(concat('styles.css'))

    .pipe(sourcemaps.init())
    .pipe(postcss([ autoprefixer() ]))
    .pipe(less({
        paths: [ path.join(__dirname, 'less', 'includes') ]
      }))
    .pipe(sourcemaps.write())
    .pipe(csso())
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./dist/css'));
  });

gulp.task('watch', () => {
    gulp.watch('src/less/**/*.less', gulp.series('less'));
    gulp.watch('src/js/**/*', gulp.series('javascript'));
    gulp.watch('src/img/*', gulp.series('copyimg'));

    //pages
    gulp.watch('src/partials/**/*.html', gulp.series('index'));
    gulp.watch('src/partials/**/*.html', gulp.series('alexa'));
    gulp.watch('src/partials/**/*.html', gulp.series('contacto'));
});


// Index
gulp.task('index', function() {
    return gulp.src([
        './src/partials/_header.html',
        './src/partials/_top-navigation.html',
        './src/partials/_index.html',
        './src/partials/_footer.html',
        ])
        .pipe(plumber())
        .pipe(concat('index.html'))
      
        .pipe(gulp.dest(distFolder));
});

// Alexa
gulp.task('alexa', function() {
    return gulp.src([
        './src/partials/_header.html',
        './src/partials/_top-navigation.html',
        './src/partials/_alexa.html',
        './src/partials/_footer.html',
        ])
        .pipe(plumber())
        .pipe(concat('alexa-jilon.html'))
      
        .pipe(gulp.dest(distFolder));
});

// Contacto
gulp.task('contacto', function() {
    return gulp.src([
        './src/partials/_header.html',
        './src/partials/_top-navigation.html',
        './src/partials/_contacto.html',
        './src/partials/_footer.html',
        ])
        .pipe(plumber())
        .pipe(concat('contacto.html'))
      
        .pipe(gulp.dest(distFolder));
});
//Iniciar el servidor web
gulp.task('webserver', function() {
    gulp.src(distFolder)
        .pipe(server({
            livereload: true,
            directoryListing: false,
            open: true,
            port:5151
        }));
});



gulp.task('default', gulp.parallel('watch','webserver'));