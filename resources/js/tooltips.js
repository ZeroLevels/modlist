$('.universal').tooltip({
	placement: "auto",
	title: "Universal mods can be used on both client and server with the same file"
});
$('.client').tooltip({
	placement: "auto",
	title: "Clientside mods only need to be installed on the client, usually providing display changes"
});
$('.server').tooltip({
	placement: "auto",
	title: "Serverside mods only need to be installed on the server, usually providing extra commands or administration tools"
});
$('.ssp').tooltip({
	placement: "auto",
	title: "SSP mods work in singleplayer and have their own mod file"
});
$('.lan').tooltip({
	placement: "auto",
	title: "LAN mods can be used in LAN mode as long as the other player has the mod"
});
$('.smp').tooltip({
	placement: "auto",
	title: "SMP mods work in multiplayer and have their own mod file"
});
$('.opensource').tooltip({
	placement: "auto",
	title: "Open Source Mod"
});
$('.opensource-contained').tooltip({
	placement: "auto",
	title: "This mod is open source, but the source code is obtained via PM or contained within the main download."
});
$('.forge-required').tooltip({
	title: "Forge is required to run this mod"
});
$('.forge-compatible').tooltip({
	title: "This mod can run on Forge, but Forge is not required. Most ModLoader mods can be loaded by Forge."
});
$('.not-forge-compatible').tooltip({
	title: "This mod cannot run with Forge. It modifies class files that are required for Forge mods to run."
});
$('.version-link').tooltip({
	placement: "right"
});
$('.dependency').tooltip({
	placement: "auto"
});
$('.progress-bar').tooltip({
	placement: "auto"
});
$('#request-type-group').attr('data-toggle','buttons');
$('#request-type-group>label').addClass("btn btn-primary");
$('.dependency').click(function(e) {
	var windowHeight = $(window).height();
	var selected = $(this).parent().attr('href');
	if(typeof selected !== "undefined") {
		e.preventDefault();
		$('#modlist tbody tr').show();
		location.href = selected;
		if($(selected).length > 0) {
			$(selected).addClass('success');
			var elementHeight = $(selected).height();
			var elementPosition = $(selected).position();
			var elementTop = elementPosition.top;
			var toScroll = (windowHeight / 2) - (elementHeight / 2);
			window.scroll(0,(elementTop - toScroll));
			$(selected).removeClass('success').addClass('fade-success');
			setTimeout(function(){
				$(selected).removeClass('fade-success');
			},2000);
		} else {
			if(selected == "#modloader")
				createAlert('Missing Dependency','Modloader is not available for this version. However, Forge should be able to load this mod.');
			else
				createAlert('Missing Dependency','That dependency is not yet listed for this version.');
		}
	}
});
$(document).ready(anchorControl);
function anchorControl() {
	var windowHeight = $(window).height();
	var selected = window.location.hash;
	if(selected !== "") {
		location.href = selected;
		if($(selected).length > 0) {
			$(selected).addClass('success');
			var elementHeight = $(selected).height();
			var elementPosition = $(selected).position();
			var elementTop = elementPosition.top;
			var toScroll = (windowHeight / 2) - (elementHeight / 2);
			setTimeout(function(){
				window.scroll(0,(elementTop - toScroll));
				$(selected).removeClass('success').addClass('fade-success');
				setTimeout(function(){
					$(selected).removeClass('fade-success');
				},2000);
			},0);
		} else {
			if(selected == "#modloader")
				createAlert('Missing Mod','Modloader is not available for this version. However, Forge should be able to load ModLoader mods.');
			else
				createAlert('Missing Mod','That mod is not available for this version.');
		}
	}
}
function createAlert(title, content) {
	$('#alert .modal-dialog .modal-content .modal-header .modal-title').text(title);
	$('#alert .modal-dialog .modal-content .modal-body').text(content);
	$('#alert').modal('show');
}
var $rows = $('#modlist tbody tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
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
	console.log("Loading mod '" + name + "' by '" + author + "'...");
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
	}
});
$('#new').change(function() {
	if($('#new').is(':checked')) {
		$('input').prop('disabled', false);
		$('textarea').prop('disabled', false);
		$('#link').attr('required','required');
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
$('#modlist').stickyTableHeaders({fixedOffset: $('.navbar')});