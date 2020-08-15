$(document).ready(function () {
    var interleaveOffset = -.5;

    var interleaveEffect = {

        onProgress: function(swiper, progress){
            for (var i = 0; i < swiper.slides.length; i++){
                var slide = swiper.slides[i];
                var translate, innerTranslate;
                progress = slide.progress;

                if (progress > 0) {
                    translate = progress * swiper.width;
                    innerTranslate = translate * interleaveOffset;
                }
                else {
                    innerTranslate = Math.abs( progress * swiper.width ) * interleaveOffset;
                    translate = 0;
                }

                $(slide).css({
                    transform: 'translate3d(' + translate + 'px,0,0)'
                });

                $(slide).find('.slide-inner').css({
                    transform: 'translate3d(' + innerTranslate + 'px,0,0)'
                });
            }
        },

        onTouchStart: function(swiper){
            for (var i = 0; i < swiper.slides.length; i++){
                $(swiper.slides[i]).css({ transition: '' });
            }
        },

        onSetTransition: function(swiper, speed) {
            for (var i = 0; i < swiper.slides.length; i++){
                $(swiper.slides[i])
                    .find('.slide-inner')
                    .andSelf()
                    .css({ transition: speed + 'ms' });
            }
        }
    };

    var swiperOptions = {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        loop: true,
        speed: 1000,
        watchSlidesProgress: true,
        mousewheelControl: true
    };

    swiperOptions = $.extend(swiperOptions, interleaveEffect);

    var swiper = new Swiper('.swiper-container', swiperOptions);
});


