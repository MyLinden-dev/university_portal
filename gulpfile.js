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
];/* ���������� gulp � ������� */
var gulp = require('gulp'),  // ���������� Gulp
    webserver = require('browser-sync'), // ������ ��� ������ � ��������������� ���������� �������
    plumber = require('gulp-plumber'), // ������ ��� ������������ ������
    rigger = require('gulp-rigger'), // ������ ��� ������� ����������� ������ ����� � ������
    sourcemaps = require('gulp-sourcemaps'), // ������ ��� ��������� ����� �������� ������
    sass = require('gulp-sass'), // ������ ��� ���������� SASS (SCSS) � CSS
    autoprefixer = require('gulp-autoprefixer'), // ������ ��� �������������� ��������� �������������
    cleanCSS = require('gulp-clean-css'), // ������ ��� ����������� CSS
    uglify = require('gulp-uglify'); // ������ ��� ����������� JavaScript

	
	
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
    return gulp.src(path.src.frontJS) // ������� ���� main.js
        .pipe(plumber()) // ��� ������������ ������
        .pipe(rigger()) // ����������� ��� ��������� ����� � main.js
        .pipe(sourcemaps.init()) //�������������� sourcemap
        .pipe(uglify()) // ������������ js
        .pipe(sourcemaps.write('./')) //  ���������� sourcemap
        .pipe(gulp.dest(path.build.frontJS)) // ������� ������� ����
        .pipe(webserver.reload({stream: true})); // ������������ ������
});

gulp.task('bjs:build', function () {
    return gulp.src(path.src.backJS) // ������� ���� main.js
        .pipe(plumber()) // ��� ������������ ������
        .pipe(rigger()) // ����������� ��� ��������� ����� � main.js
        .pipe(sourcemaps.init()) //�������������� sourcemap
        .pipe(uglify()) // ������������ js
        .pipe(sourcemaps.write('./')) //  ���������� sourcemap
        .pipe(gulp.dest(path.build.backJS)) // ������� ������� ����
        .pipe(webserver.reload({stream: true})); // ������������ ������
});

gulp.task('fstyle:build', function () {
    return gulp.src(path.src.frontStyle) // ������� main.style
        .pipe(plumber()) // ��� ������������ ������
        .pipe(sourcemaps.init()) // �������������� sourcemap
        .pipe(sass()) // style -> css
        .pipe(autoprefixer({ // ������� ��������
            browsers: autoprefixerList
        }))
        .pipe(cleanCSS()) // ������������ CSS
        .pipe(sourcemaps.write('./')) // ���������� sourcemap
        .pipe(gulp.dest(path.build.frontStyle)) // ��������� � build
        .pipe(webserver.reload({stream: true})); // ������������ ������

});

gulp.task('bstyle:build', function () {
    return gulp.src(path.src.backStyle) // ������� main.style
        .pipe(plumber()) // ��� ������������ ������
        .pipe(sourcemaps.init()) // �������������� sourcemap
        .pipe(sass()) // style -> css
        .pipe(autoprefixer({ // ������� ��������
            browsers: autoprefixerList
        }))
        .pipe(cleanCSS()) // ������������ CSS
        .pipe(sourcemaps.write('./')) // ���������� sourcemap
        .pipe(gulp.dest(path.build.backStyle)) // ��������� � build
        .pipe(webserver.reload({stream: true})); // ������������ ������

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