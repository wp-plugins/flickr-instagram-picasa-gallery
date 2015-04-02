(function($) {
    "use strict";
    function piIsotope()
    {
        if ($('.portfolio').length) {
            var $container = $('.portfolio #portfolio-wrap');
            $container.isotope({
                transitionDuration: '0.4s',
                hiddenStyle: {
                    opacity: 0,
                    transform: 'scale(0.001)'
                },
                visibleStyle: {
                    opacity: 1,
                    transform: 'scale(1)'
                    }
            });
            $('.portfolio #filters a').on('click', function() {
                $('.select-filter').removeClass('select-filter');
                $(this)
                    .parent('li')
                    .addClass('select-filter');
                var selector = $(this).attr('data-filter');
                $('#portfolio-wrap').isotope({ filter: selector });
                return false;
            });
            $(window).on('load', function() {
                $('#all').trigger('click');
            });
            $(window).on('load resize', function() {
                $('#portfolio-wrap').css('max-width', $(window).width());
            });
        }
    }

    // LOAD JS
    $(window).load(function() {
        setTimeout(function(){
             piIsotope();
        }, 30);
    });
})(jQuery);

