$(document).ready(function() {
    var maxHeight = -1;
    $('.home-changelog div p:nth-of-type(2)').each(function() {
        maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
    });
    $('.home-changelog div p:nth-of-type(2)').each(function() {
        $(this).height(maxHeight);
    });
});