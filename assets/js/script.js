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
});