/* Better Table Search
 * Written by GrygrFlzr
 */

var $rows = $('#example tbody tr');
$('#searchnames').css('display','inline');
$('#searchauthors').css('display','inline');
$('#searchnames').keyup(function() {
	$('#searchauthors').val('');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $('td:nth-of-type(1)', $(this)).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});

$('#searchauthors').keyup(function() {
	$('#searchnames').val('');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $('td:nth-of-type(3)', $(this)).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});