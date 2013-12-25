var $rows = $('#modlist tbody tr');
var searchFilter = / +/g;
var modFilter = /\s+/g;
$('#search').bind("change keyup input",function() {
    var val = $.trim($(this).val()).replace(searchFilter, ' ').toLowerCase();
    
    if(val === '')
        $rows.show();
    else {
        var match = RegExp('\\b'+val+'|'+val+'\\b');
        $rows.show().filter(function() {
            var text = $(this).text().replace(modFilter, ' ').toLowerCase();
            if(~text.indexOf(val))
                return !match.test(text);
            return true;
        }).hide();
    }
});
$('.advanced-search-panel input').bind("change keyup input",function() {
    var name = $.trim($('#search-name').val()).replace(searchFilter, ' ').toLowerCase();
    var time = $.trim($('#search-time').val()).replace(searchFilter, ' ').toLowerCase();
    var tag = $.trim($('#search-tag').val()).replace(searchFilter, ' ').toLowerCase();
    
    if(name === '' && time === '' && tag === '')
        $rows.show();
    else
        $rows.show().filter(function() {
            var modname = $(this).find('span').first().text().toLowerCase();
            var modauthor = $(this).find('i').first().text().toLowerCase();
            var modtags = $(this).find('p:last-child').text().toLowerCase();
            
            return !~modname.indexOf(name) || !~modauthor.indexOf(time) || !~modtags.indexOf(tag);
        }).hide();
});
$('#search-simple').click(function() {
    if($('.advanced-search').is(":visible")) {
        $('.advanced-search').addClass('hidden-search');
        $('#search').prop('disabled', false);
    }
});
$('#search-advanced').click(function() {
    if(!$('.advanced-search').is(":visible")) {
        $('.advanced-search').removeClass('hidden-search');
        $('#search').prop('disabled', true);
    }
});
$('#search-reset').click(function() {
    $('#search').val('');
    $('.advanced-search input').val('');
    $rows.show();
});

$('#bitly-link').click(function() {
    $.getJSON("/panel/bitly/save?link=" + $('#link').val(), function(data) {
        if(data !== '' && data['link'] !== null) {
            $('#link').val(data['link']);
        }
    });
});

$('#modlist').stickyTableHeaders({fixedOffset: $('.navbar')});

$('#panel-save').tooltip({
    placement: "auto",
    title: "Save the current progress"
});
$('#panel-queue').tooltip({
    placement: "auto",
    title: "Save and add to queue"
});
$('#panel-delay').tooltip({
    placement: "auto",
    title: "Set aside for later"
});
$('#panel-invalid').tooltip({
    placement: "auto",
    title: "Mark as invalid"
});