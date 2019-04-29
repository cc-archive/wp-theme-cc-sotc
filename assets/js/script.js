jQuery(document).ready(function($){
    //SOTC website main script
    $(document).foundation();
    $('.entry-more').on('click', function(e){
        e.preventDefault();
        var object = $(this),
            replaceText = object.data('replace-text'),
            currentText = object.html(),
            currentTarget = (object.data('target') != undefined) ? $(object.data('target')) : object.next();
            currentTarget.slideToggle('fast');
            object.data('replace-text',currentText);
            object.html(replaceText);
            object.toggleClass('opened');
        return false;
    });

    //Mobile menu
    var lastScroll = 0;
    $(window).scroll(function () {
        var st = $(window).scrollTop();
        if ($('body').hasClass('admin-bar')) {
            if ((st > 10) && (st > lastScroll)) {
                $('.mobile-nav').css({ top: 0 });
                $('.menu-mobile-container').css({ top: -42 });
                $('.main-header-sticky').addClass('opened');
            } else {
                //arriba
                if (st < 45) {
                    $('.mobile-nav').css({ top: 45 });
                    $('.main-header-sticky').removeClass('opened');
                    $('.menu-mobile-container').css({ top: 4 });
                }
            }
        }
        lastScroll = st;
    });
    $('.mobile-nav-open').on('click', function (e) {
        e.preventDefault();
        $('.menu-mobile-container').toggleClass('closed');
        return false;
    });
    $('.menu-mobile-container').find('.close').on('click', function (e) {
        e.preventDefault();
        $(this).parent().addClass('closed');
        return false;
    });
});