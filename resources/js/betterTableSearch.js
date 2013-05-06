/* Better Table Search
 * Written by GrygrFlzr
 */

var $rows = $('#example tbody tr');
$('#searchnames').css('display','inline');
$('#searchauthors').css('display','inline');
$('#searchcompatible').css('display','inline');

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

$('#searchcompatible').change(function() {
	var selectVal = $('#searchcompatible :selected').val();
	var selected = '';
	switch(selectVal) {
	case 'fc':
		selected = 'forge compatible';
		break;
	case 'fr':
		selected = 'forge required';
		break;
	case 'nfc':
		selected = 'not forge compatible';
		break;
	default:
		selected = '';
		break;
	}
	if(selected === '') {
		$rows.show();
	} else {
		$rows.show().filter(function() {
			var text = $('td:nth-of-type(5)', $(this)).text().replace(/\s+/g, ' ').toLowerCase();
			//return !~text.indexOf(selected);
			return text !== selected;
		}).hide();
	}
});