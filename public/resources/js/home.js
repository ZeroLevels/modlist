$(document).ready(function() {
    if(screen.width >= 768) {
        var maxHeight = -1;
        $('.home-changelog div p:nth-of-type(2)').each(function() {
            maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
        });
        $('.home-changelog div p:nth-of-type(2)').each(function() {
            $(this).height(maxHeight);
        });
    }
});