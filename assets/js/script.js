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
        var st = $(window).scrollTop(),
            top = ($('body').hasClass('admin-bar')) ? 45 : 0,
            menu_top = ($('body').hasClass('admin-bar')) ? 45 : 5;

        if ((st > 10) && (st > lastScroll)) {
            $('.mobile-nav').css({ top: 0 });
            $('.menu-mobile-container').css({ top: 5 });
            $('.main-header-sticky').addClass('opened');
        } else if (st < 45) {
            //goes up
            $('.mobile-nav').css({ top: top });
            $('.main-header-sticky').removeClass('opened');
            $('.menu-mobile-container').css({ top: menu_top });
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
    $('.menu-mobile-container').find('.menu-item > a').on('click', function(e){
        $('.menu-mobile-container').addClass('closed');
    });
    $('.menu-mobile-container').find('.menu-item-has-children > a').on('click', function(e){
		e.preventDefault();
		var obj = $(this);
		obj.parent().toggleClass('opened');
		obj.parent().find('.sub-menu').slideToggle('fast');
		return false;
	});
    $('.more-platforms').on('click', function(e){
		e.preventDefault();
		var obj = $(this),
			size = obj.parent().data('size'), //how many items we'll retrieve
			offset = obj.parent().data('offset'), //Offset value to retrieve entries
            year = obj.parent().data('year'),
            loading_text = obj.parent().data('loading-text'),
            current_text = obj.html();
		$.ajax({
				url: Ajax.url,
				type: 'POST',
				data: { action: 'get_current_platform', size: size, offset: offset, year: year},
				success : function(data){
					obj.html(current_text);
					if (data == 0) {
						obj.hide();
					} else {
						var new_offset = offset + size;
						obj.parent().data('offset',new_offset);

						$(data).hide().appendTo('.platform-list').fadeIn(1000);
                        Foundation.reInit('equalizer');
                        
						//$('.list-feature-projects').append(data);
					}
				},
				beforeSend: function(){
					obj.html(loading_text);
				}
			});
		return false;
	});


});