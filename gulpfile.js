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
    htmlmin = require('gulp-htmlmin'),
    babel= require('gulp-babel');;
    

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
            
           
            './src/js/app.js',

        ])
        .pipe(babel({
            presets: ['@babel/env']
        }))
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
    gulp.watch('src/partials/**/*.php', gulp.series('index'));
    gulp.watch('src/partials/**/*.php', gulp.series('alexa'));
    gulp.watch('src/partials/**/*.php', gulp.series('interna'));
    gulp.watch('src/partials/**/*.php', gulp.series('detail-page'));
    gulp.watch('src/partials/**/*.php', gulp.series('vestido'));
    gulp.watch('src/partials/**/*.php', gulp.series('contacto'));

    gulp.watch('src/partials/**/*.php', gulp.series('send'));
    gulp.watch('src/partials/**/*.php', gulp.series('sendemail'));
    
});


// Index
gulp.task('index', function() {
    return gulp.src([
        './src/partials/_header.php',
        './src/partials/_top-navigation.php',
        './src/partials/_index.php',
        './src/partials/_footer.php',
        ])
        .pipe(plumber())
        .pipe(concat('index.php'))
      
        .pipe(gulp.dest(distFolder));
});

// Alexa
gulp.task('alexa', function() {
    return gulp.src([
        './src/partials/_header.php',
        './src/partials/_top-navigation.php',
        './src/partials/_alexa.php',
        './src/partials/_footer.php',
        ])
        .pipe(plumber())
        .pipe(concat('alexa-jilon.php'))
      
        .pipe(gulp.dest(distFolder));
});

// Contacto
gulp.task('contacto', function() {
    return gulp.src([
        './src/partials/_header.php',
        './src/partials/_top-navigation.php',
        './src/partials/_contacto.php',
        './src/partials/_footer.php',
        ])
        .pipe(plumber())
        .pipe(concat('contacto.php'))
      
        .pipe(gulp.dest(distFolder));
});

// Business line
gulp.task('interna', function() {
    return gulp.src([
        './src/partials/_header.php',
        './src/partials/_top-navigation.php',
        './src/partials/_business_line.php',
        './src/partials/_footer.php',
        ])
        .pipe(plumber())
        .pipe(concat('lineas-alexa-jilon.php'))
      
        .pipe(gulp.dest(distFolder));
});

// Business line
gulp.task('detail-page', function() {
    return gulp.src([
        './src/partials/_header.php',
        './src/partials/_top-navigation.php',
        './src/partials/_detail-page.php',
        './src/partials/_footer.php',
        ])
        .pipe(plumber())
        .pipe(concat('coleccion.php'))
      
        .pipe(gulp.dest(distFolder));
});

// Business line
gulp.task('vestido', function() {
    return gulp.src([
        './src/partials/_header.php',
        './src/partials/_top-navigation.php',
        './src/partials/_vestido.php',
        './src/partials/_footer.php',
        ])
        .pipe(plumber())
        .pipe(concat('vestido.php'))
      
        .pipe(gulp.dest(distFolder));
});

// send newsletter
gulp.task('send', function() {
    return gulp.src([
        './src/partials/send.php',
        ])
        .pipe(plumber())
        .pipe(concat('send.php'))
      
        .pipe(gulp.dest(distFolder));
});

gulp.task('sendemail', function() {
    return gulp.src([
        './src/partials/sendemail.php',
        ])
        .pipe(plumber())
        .pipe(concat('sendemail.php'))
      
        .pipe(gulp.dest(distFolder));
});
//Iniciar el servidor web
gulp.task('webserver', function() {
    gulp.src(distFolder)
        .pipe(server({
            livereload: true,
            directoryListing: false,
            open: true,
            port:8102
        }));
});



gulp.task('default', gulp.parallel('watch'));