;(function($){
    $(document).ready(function() {
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        }
        if (isMobile.any()) {
            var SetInterval = 1000000000;
        } else {
            var SetInterval = 3000;
        }
        if ($('.featured').length > 0) {
            $('#ri-grid').gridrotator( {
                rows: 3,
                columns: 9,
                step: 'random',
                maxStep: 3,
                animType: 'random',
                animSpeed: 500,
                interval: SetInterval,
                nochange : [],
                preventClick : false,
            });
        }
    });
    $(window).load(function() {
        $('#preloader').fadeOut(1000);
    });
})(jQuery)