'use strict';
var autoprefixerList = [
    'Chrome >= 45',
    'Firefox ESR',
    'Edge >= 12',
    'Explorer >= 10',
    'iOS >= 9',
    'Safari >= 9',
    'Android >= 4.4',
    'Opera >= 30'
];/* подключаем gulp и плагины */
var gulp = require('gulp'),  // подключаем Gulp
    webserver = require('browser-sync'), // сервер для работы и автоматического обновления страниц
    plumber = require('gulp-plumber'), // модуль для отслеживания ошибок
    rigger = require('gulp-rigger'), // модуль для импорта содержимого одного файла в другой
    sourcemaps = require('gulp-sourcemaps'), // модуль для генерации карты исходных файлов
    sass = require('gulp-sass'), // модуль для компиляции SASS (SCSS) в CSS
    autoprefixer = require('gulp-autoprefixer'), // модуль для автоматической установки автопрефиксов
    cleanCSS = require('gulp-clean-css'), // плагин для минимизации CSS
    uglify = require('gulp-uglify'); // модуль для минимизации JavaScript

	
	
var path = {
    build: {
        frontJS: 'frontend/web/js',
        backJS: 'backend/web/js',
        frontStyle: 'frontend/web/css',
        backStyle: 'backend/web/css',
    },
    src: {
        frontJS: 'frontend/js/common.js',
        backJS: 'backend/js/common.js',
        frontStyle: 'frontend/style/main.scss',
        backStyle: 'backend/style/main.scss',
    },
    watch: {
        frontJS: 'frontend/js/**/*',
        backJS: 'backend/js/**/*',
        frontStyle: 'frontend/style/**/*',
        backStyle: 'backend/style/**/*',
        bootstrap: 'bower_components/bootstrap/style/**/*',
        frontend: 'frontend/**/*.php',
        backend: 'backend/**/*.php',
    }
};

var config = {
    proxy: 'don'
};

gulp.task('fjs:build', function () {
    return gulp.src(path.src.frontJS) // получим файл main.js
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(rigger()) // импортируем все указанные файлы в main.js
        .pipe(sourcemaps.init()) //инициализируем sourcemap
        .pipe(uglify()) // минимизируем js
        .pipe(sourcemaps.write('./')) //  записываем sourcemap
        .pipe(gulp.dest(path.build.frontJS)) // положим готовый файл
        .pipe(webserver.reload({stream: true})); // перезагрузим сервер
});

gulp.task('bjs:build', function () {
    return gulp.src(path.src.backJS) // получим файл main.js
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(rigger()) // импортируем все указанные файлы в main.js
        .pipe(sourcemaps.init()) //инициализируем sourcemap
        .pipe(uglify()) // минимизируем js
        .pipe(sourcemaps.write('./')) //  записываем sourcemap
        .pipe(gulp.dest(path.build.backJS)) // положим готовый файл
        .pipe(webserver.reload({stream: true})); // перезагрузим сервер
});

gulp.task('fstyle:build', function () {
    return gulp.src(path.src.frontStyle) // получим main.style
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(sourcemaps.init()) // инициализируем sourcemap
        .pipe(sass()) // style -> css
        .pipe(autoprefixer({ // добавим префиксы
            browsers: autoprefixerList
        }))
        .pipe(cleanCSS()) // минимизируем CSS
        .pipe(sourcemaps.write('./')) // записываем sourcemap
        .pipe(gulp.dest(path.build.frontStyle)) // выгружаем в build
        .pipe(webserver.reload({stream: true})); // перезагрузим сервер

});

gulp.task('bstyle:build', function () {
    return gulp.src(path.src.backStyle) // получим main.style
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(sourcemaps.init()) // инициализируем sourcemap
        .pipe(sass()) // style -> css
        .pipe(autoprefixer({ // добавим префиксы
            browsers: autoprefixerList
        }))
        .pipe(cleanCSS()) // минимизируем CSS
        .pipe(sourcemaps.write('./')) // записываем sourcemap
        .pipe(gulp.dest(path.build.backStyle)) // выгружаем в build
        .pipe(webserver.reload({stream: true})); // перезагрузим сервер

});

gulp.task('build', [
    'fjs:build',
    'bjs:build',
    'fstyle:build',
    'bstyle:build',
]);


gulp.task('watch', function(){
    gulp.watch([path.watch.frontStyle], function(event, cb) {
        gulp.start('fstyle:build');
    });
    gulp.watch([path.watch.backStyle], function(event, cb) {
        gulp.start('bstyle:build');
    });
    gulp.watch([path.watch.frontJS], function(event, cb) {
        gulp.start('fjs:build');
    });
    gulp.watch([path.watch.backJS], function(event, cb) {
        gulp.start('bjs:build');
    });

    gulp.watch(path.watch.frontend).on('change', webserver.reload);
    gulp.watch(path.watch.backend).on('change', webserver.reload);
});

gulp.task('webserver', function () {
    webserver(config);
});

gulp.task('default', ['build','webserver', 'watch']);