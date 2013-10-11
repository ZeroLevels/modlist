$('#name').typeahead([
	{
		name: 'mods',
		remote: '/resources/scripts/typeahead.php?q=%QUERY',
		template: [
			'<p><strong>{{value}}</strong> <i class="pull-right">{{author}}</i></p>',
			'<p>{{desc}}</p>'
		].join(''),
		engine: Hogan
	}
]);
function loadMod(name, author) {
	$('#name').popover({
		html: true,
		placement: 'top',
		trigger: 'manual',
		content: '<i class="icon-refresh icon-spin"></i> Loading Mod Information...'
	});
	$('#name').popover('show');
	$.ajax({
		url: '/resources/scripts/loadmod.php?name='+encodeURIComponent(name)+'&author='+encodeURIComponent(author),
		type: 'get',
		dataType: 'json',
		cache: false,
		success: function(data) {completeLoadMod(data);},
		async:true,
		});
}
function completeLoadMod(data) {
	$('#link').val(data['link']);
	$('#desc').val(data['desc']);
	$('#authors').val(data['parsedauthors']);
	if(data['source'] != null)
		$('#source').val(data['source']);
	
	if($.inArray("Forge Required",data['dependencies']) != -1)
		$('#required').prop("checked", true);
	if($.inArray("Forge Compatible",data['dependencies']) != -1)
		$('#compatible').prop("checked", true);
	if($.inArray("Not Forge Compatible",data['dependencies']) != -1)
		$('#notcompatible').prop("checked", true);
	
	if($.inArray("Universal",data['type']) != -1)
		$("input[value='universal']").prop("checked", true);
	else
		$("input[value='universal']").prop("checked", false);
	if($.inArray("Client",data['type']) != -1)
		$("input[value='client']").prop("checked", true);
	else
		$("input[value='client']").prop("checked", false);
	if($.inArray("Server",data['type']) != -1)
		$("input[value='server']").prop("checked", true);
	else
		$("input[value='server']").prop("checked", false);
	if($.inArray("SSP",data['type']) != -1)
		$("input[value='SSP']").prop("checked", true);
	else
		$("input[value='SSP']").prop("checked", false);
	if($.inArray("SMP",data['type']) != -1)
		$("input[value='SMP']").prop("checked", true);
	else
		$("input[value='SMP']").prop("checked", false);
	if($.inArray("LAN",data['type']) != -1)
		$("input[value='LAN']").prop("checked", true);
	else
		$("input[value='LAN']").prop("checked", false);
	$("#versions input").prop("checked", false);
	$.each(data['versions'], function() {
		$("input[value='"+this+"']").prop("checked", true);
		if(this == "1.5.0")
			$("input[value='1.5']").prop("checked", true);
	})
	$('#old').click();
	$('#name').popover('hide');
}
$('#old').change(function() {
	if($('#old').is(':checked')) {
		$('#link').prop('disabled', true);
		$('#desc').prop('disabled', true);
		$('#authors').prop('disabled', true);
		$('#forge-compatibility input').prop('disabled', true);
		$('#availability input').prop('disabled', true);
		
		$('#link').removeAttr('required');
		$('#desc').removeAttr('required');
		$('#authors').removeAttr('required');
	}
});
$('#new').change(function() {
	if($('#new').is(':checked')) {
		$('input').prop('disabled', false);
		$('textarea').prop('disabled', false);
		$('#link').attr('required','required');
		$('#desc').attr('required','required');
		$('#authors').attr('required','required');
	}
});
$(document).ready(function(){
	$('#old').click();
	$('#new').click();
});
$("form button[type='reset']").click(function(){
	$('#new').click();
});
$('#name').bind('typeahead:selected', function(obj, datum) {
	loadMod(datum['value'],datum['author']);
});
$('.twitter-typeahead').css('display','block');
$('#link').blur(function() {
	var link = $('#link').val();
	if(link != "") {
		if(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-./.test(link)) {
			$('#link').val(link.match(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-/)[0]);
		}
	}
});