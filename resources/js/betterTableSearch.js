/* Better Table Search
 * Written by GrygrFlzr
 */

var $rows = $('#example tbody tr');
$('#searchnames').css('display','inline');
$('#searchauthors').css('display','inline');
$('#searchcompatible').css('display','inline');
function setOddEven() {
    $('tr:visible:odd').removeClass('odd even').addClass('odd');
    $('tr:visible:even').removeClass('odd even').addClass('even');
}
function search() {
    var valn = $.trim($('#searchnames').val()).replace(/ +/g, ' ').toLowerCase();
    var vala = $.trim($('#searchauthors').val()).replace(/ +/g, ' ').toLowerCase();
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
    
    $rows.show().filter(function() {
        var textn = $('td:nth-of-type(1)', $(this)).text().replace(/\s+/g, ' ').toLowerCase();
        var texta = $('td:nth-of-type(3)', $(this)).text().replace(/\s+/g, ' ').toLowerCase();
		if(selected !== '') {
			var textc = $('td:nth-of-type(5)', $(this)).text().replace(/\s+/g, ' ').toLowerCase();
			return !~textn.indexOf(valn) || !~texta.indexOf(vala) || textc !== selected;
		} else {
			return !~textn.indexOf(valn) || !~texta.indexOf(vala);
		}
    }).hide();
	setOddEven();
}

$('#searchnames').keyup(search);
$('#searchauthors').keyup(search);
$('#searchcompatible').change(search);