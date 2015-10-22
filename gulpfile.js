// imports
var gulp = require('gulp'),    
    autoprefixer = require('gulp-autoprefixer'),
    compass = require('gulp-compass'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    watch = require('gulp-watch'),
    del = require('del');
    


gulp.task('styles', function() {  // nombre del proceso
    return gulp.src("scss/app.scss") // ruta a los archivos scss, en este caso es un archivo que importa al resto
        .pipe(compass({
            config_file: "config.rb", // ruta al archivo config.rb
            css: "stylesheets",  // carpeta de salida del scss
            sass: "scss"  
        }))
        .pipe(autoprefixer('last 2 version'))         // versiones de navegadores que soportar
        .pipe(gulp.dest('dist/assets/css'))   // ruta destino de los archivos procesados
        .pipe(rename({suffix: '.min'}))     // agregamos el prefijo min para los archivos minimizados
        .pipe(minifycss())  // minimizamos el css
        .pipe(gulp.dest('dist/assets/css'))  // ruta destino del archivo minimizado
        .pipe(notify({ message: 'Styles task complete' }));  // avisamos al sistema que el proceso se completó.
});  

gulp.task('scripts', function() {
  return gulp.src(["bower_components/jquery/dist/jquery.min.js" , 'js/*.js']) // trabajaremos con el archivo de jquery y nuestros js 
    .pipe(concat('main.js')) // los concatenamos en el archivo main.js
    .pipe(gulp.dest('dist/assets/js')) // guardamos el archivo concatenado
    .pipe(rename({suffix: '.min'})) // hacemos unacopia y le agregamos el prefijo min
    .pipe(uglify()) // lo minimizamos
    .pipe(gulp.dest('dist/assets/js')) // lo guardamos
    .pipe(notify({ message: 'Scripts task complete' })); // avisamos al sistema que la tarea se completó
}); 

gulp.task('images', function() {
  return gulp.src('images/**/*') // ruta a nuestras imágenes, queremos que busque a dos niveles
    .pipe(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })) // proceso de optimización
    .pipe(gulp.dest('dist/assets/img')) // guardamos las imágenes procesadas
    .pipe(notify({ message: 'Images task complete' })); // avisamos al sistema
});

gulp.task('clean', function(cb) {
    del(['dist/assets/css', 'dist/assets/js', 'dist/assets/img'], cb) // borramos todos los archivos procesados por las tareas previas. 
});

gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'scripts');
});

gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('scss/**/*', ['styles']);

  // Watch .js files
  gulp.watch('js/**/*.js', ['scripts']);

});