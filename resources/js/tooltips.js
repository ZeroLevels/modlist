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
var searchFilter = / +/g;
var modFilter = /\s+/g;
$('#search').bind("change keyup input",function() {
	var val = $.trim($(this).val()).replace(searchFilter, ' ').toLowerCase();
	
	if(val == '')
		$rows.show();
	else
		var match = RegExp('\\b'+val+'|'+val+'\\b');
		$rows.show().filter(function() {
			var text = $(this).text().replace(modFilter, ' ').toLowerCase();
			if(~text.indexOf(val))
				return !match.test(text);
			return true;
		}).hide();
});
$('.advanced-search input').bind("change keyup input",function() {
	var name = $.trim($('#search-name').val()).replace(searchFilter, ' ').toLowerCase();
	var author = $.trim($('#search-author').val()).replace(searchFilter, ' ').toLowerCase();
	var desc = $.trim($('#search-desc').val()).replace(searchFilter, ' ').toLowerCase();
	var tag = $.trim($('#search-tag').val()).replace(searchFilter, ' ').toLowerCase();
	
	if(name == '' && author == '' && desc == '' && tag == '')
		$rows.show();
	else
		$rows.show().filter(function() {
			var modname = $(this).find('span').first().text().toLowerCase();
			var modauthor = $(this).find('b>i').first().text().toLowerCase();
			var moddesc = '';
			if ($(this).find('p').length > 2)
				moddesc = $(this).find('p:nth-child(2)').text().replace(modFilter, ' ').toLowerCase();
			var modtags = $(this).find('p:last-child').text().toLowerCase();
			
			return !~modname.indexOf(name) || !~modauthor.indexOf(author) || !~moddesc.indexOf(desc) || !~modtags.indexOf(tag);
		}).hide();
});
$('#search-simple').click(function() {
	if($('.advanced-search').is(":visible"))
		$('.advanced-search').addClass('hidden-search');
		$('#search').prop('disabled', false);
});
$('#search-advanced').click(function() {
	if(!$('.advanced-search').is(":visible"))
		$('.advanced-search').removeClass('hidden-search');
		$('#search').prop('disabled', true);
});
$('#search-reset').click(function() {
	$('#search').val('');
	$('.advanced-search input').val('');
	$rows.show();
});

$('#modlist').stickyTableHeaders({fixedOffset: $('.navbar')});