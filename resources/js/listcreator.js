/* List Creator Javascript
 */
var sessionVar = Math.random();
var skipVersions = false;
var lastName = '';

function checklink() {
	//http://www.minecraftforum.net/topic/\d+-
	var link = $('#link').val();
	if(link != "") {
		if(/^[a-z]+:\/\//i.test(link)) {
			if(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-./.test(link)) {
				$('#link').val(link.match(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-/)[0]);
				$('#linktext').html('<span class="found">MCF Link cut</span>');
			}
			link = $('#link').val();
			if(!/http:\/\/bit\.ly\/[a-zA-Z0-9]*/.test(link)) {
				if($('#linktext').html() == '<span class="found">MCF Link cut</span>') {
					$('#linktext').html('<span class="found">MCF Link cut - <a href="javascript:bitly();">bit.ly this link</a></span>');
				} else {
					$('#linktext').html('<span class="found"><a href="javascript:bitly();">bit.ly this link</a></span>');
				}
			}
		} else {
			$('#linktext').html('<span class="failed">Not a valid link</span>');
		}
	} else {
		$('#linktext').html('Link to the mod\'s page');
	}
}

function checksource() {
	var link = $('#source').val();
	if(link != "") {
		if(/^[a-z]+:\/\//i.test(link)) {
			if(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-./.test(link)) {
				$('#source').val(link.match(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-/)[0]);
				$('#sourcetext').html('<span class="found">MCF Link cut</span>');
			}
			link = $('#source').val();
			if(!/http:\/\/bit\.ly\/[a-zA-Z0-9]*/.test(link)) {
				if($('#sourcetext').html() == '<span class="found">MCF Link cut</span>') {
					$('#sourcetext').html('<span class="found">MCF Link cut - <a href="javascript:bitlysource();">bit.ly this link</a></span>');
				} else {
					$('#sourcetext').html('<span class="found"><a href="javascript:bitlysource();">bit.ly this link</a></span>');
				}
			}
		} else {
			$('#sourcetext').html('<span class="failed">Not a valid link</span>');
		}
	} else {
		$('#sourcetext').html('Link to Source Code');
	}
}

function setVersions(versionlist) {
	window.skipVersions = true;
	var versions = versionlist.split(',');
	if(versions.indexOf('1.6.2') != -1)
		$('#ver162').prop('checked', true);
	else
		$('#ver162').attr('checked', false);
	if(versions.indexOf('1.6.1') != -1)
		$('#ver161').prop('checked', true);
	else
		$('#ver161').attr('checked', false);
	if(versions.indexOf('1.5.2') != -1)
		$('#ver152').prop('checked', true);
	else
		$('#ver152').attr('checked', false);
	if(versions.indexOf('1.5.1') != -1)
		$('#ver151').prop('checked', true);
	else
		$('#ver151').attr('checked', false);
	if(versions.indexOf('1.5.0') != -1)
		$('#ver150').prop('checked', true);
	else
		$('#ver150').attr('checked', false);
	if(versions.indexOf('1.4.7') != -1)
		$('#ver147').prop('checked', true);
	else
		$('#ver147').attr('checked', false);
	if(versions.indexOf('1.4.5') != -1)
		$('#ver145').prop('checked', true);
	else
		$('#ver145').attr('checked', false);
	if(versions.indexOf('1.4.2') != -1)
		$('#ver142').prop('checked', true);
	else
		$('#ver142').attr('checked', false);
	if(versions.indexOf('1.3.2') != -1)
		$('#ver132').prop('checked', true);
	else
		$('#ver132').attr('checked', false);
}

function bitly() {
	$('#linktext').html('Processing link...');
	$.getJSON("tools/bitly.php?mode=save&link=" + $('#link').val(), function(data) {
			if(data['link'] != "") {
				$('#link').val(data['link']);
				$('#linktext').html('<span class="found">Link shortened!</span>');
				generate();
			} else
				$('#sourcetext').html('<span class="failed">Failed to shorten link</span>');
		});
}

function bitlysource() {
	$('#sourcetext').html('Processing link...');
	$.getJSON("tools/bitly.php?mode=save&link=" + $('#source').val(), function(data) {
			if(data['link'] != "") {
				$('#source').val(data['link']);
				$('#sourcetext').html('<span class="found">Link shortened!</span>');
				generate();
			} else
				$('#sourcetext').html('<span class="failed">Failed to shorten link</span>');
		});
}

function loadbitly() {
	var link = $('#link').val();
	if(/http:\/\/bit\.ly\/[a-zA-Z0-9]*/.test(link)) {
		$('#linktext').html('Extracting bitly info...');
		$.getJSON("tools/bitly.php?mode=info&link=" + $('#link').val(), function(data) {
			if(/ - Minecraft Forum/.test(data['title']))
				data['title'] = data['title'].replace(/ - Minecraft Forum/, "");
			if(/\[[a-zA-Z0-9.]*\]/.test(data['title']))
				data['title'] = data['title'].replace(/\[[a-zA-Z0-9.\/]*\]/g, "");
			data['title'] = $.trim(data['title']);
			if(data['title'] == "")
				data['title'] = "Link";
			$('#linktext').html('<span class="found"><a href="' + data['link'] +'">' + data['title'] + '</a></span>');
		});
	}
}

function loadbitlysource() {
	var link = $('#source').val();
	if(/http:\/\/bit\.ly\/[a-zA-Z0-9]*/.test(link)) {
		$('#sourcetext').html('Extracting bitly info...');
		$.getJSON("tools/bitly.php?mode=info&link=" + $('#source').val(), function(data) {
			if(/ - Minecraft Forum/.test(data['title']))
				data['title'] = data['title'].replace(/ - Minecraft Forum/, "");
			if(/\[[a-zA-Z0-9.]*\]/.test(data['title']))
				data['title'] = data['title'].replace(/\[[a-zA-Z0-9.\/]*\]/g, "");
			data['title'] = $.trim(data['title']);
			if(data['title'] == "")
				data['title'] = "Link";
			$('#sourcetext').html('<span class="found"><a href="' + data['link'] +'">' + data['title'] + '</a></span>');
		});
	}
}

function generate() {
	var json = '{\r\n\r\n';
	json += '"name":"' + $.trim($('#name').val()) + '",\r\n';
	if($.trim($('#other').val()) != "")
		json += '"other":"' + $.trim($('#other').val()) + '",\r\n';
	json += '"link":"' + $.trim($('#link').val()) + '",\r\n';
	json += '"desc":"' + $.trim($('#desc').val()) + '",\r\n';
	
	if($.trim($('#author').val()) != "")
		json += '"author":["' +
			$.map($('#author').val().split(','), $.trim).join('","') +
			'"],\r\n';
	else
		json += '"author":[],\r\n';
	
	if($.trim($('#source').val()) != "")
		json += '"source":"' + $.trim($('#source').val()) + '",\r\n';
	if($.trim($('#type').val()) != "")
		json += '"type":["' +
			$.map($('#type').val().split(','), $.trim).join('","') +
			'"],\r\n';
	else
		json += '"type":[],\r\n';
	
	if($.trim($('#dependencies').val()) != "")
		json += '"dependencies":["' +
			$.map($('#dependencies').val().split(','), $.trim).join('","') +
			'"],\r\n';
	else
		json += '"dependencies":[],\r\n';
	
	var versions = new Array();
	if($('#ver132').is(':checked'))
		versions.push('1.3.2');
	if($('#ver142').is(':checked'))
		versions.push('1.4.2');
	if($('#ver145').is(':checked')) {
		versions.push('1.4.4');
		versions.push('1.4.5');
	}
	if($('#ver147').is(':checked')) {
		versions.push('1.4.6');
		versions.push('1.4.7');
	}
	if($('#ver150').is(':checked'))
		versions.push('1.5.0');
	if($('#ver151').is(':checked'))
		versions.push('1.5.1');
	if($('#ver152').is(':checked'))
		versions.push('1.5.2');
	if($('#ver161').is(':checked'))
		versions.push('1.6.1');
	if($('#ver162').is(':checked'))
		versions.push('1.6.2');
	if(versions.length > 0)
		json += '"versions":["' + versions.join('","') + '"]\r\n';
	else
		json += '"versions":[]\r\n';
	
	json += '\r\n}';
	$('#output').val(json);
}

function reset() {
	var json = '  {\r\n';
	json += '    "name":"",\r\n';
	json += '    "other":"",\r\n';
	json += '    "link":"",\r\n';
	json += '    "desc":"",\r\n';
	json += '    "author":[],\r\n';
	json += '    "type":[],\r\n';
	json += '    "dependencies":[],\r\n';
	json += '    "versions":[]\r\n';
	json += '  }';
	$('#output').val(json);
}

function checkExist() {
	if($('#name').val != window.lastName) {
		$('#nametext').html('Matching existing mods...');
		$.getJSON("../list/modlist.json?" + window.sessionVar, function(data) {
			var match = false;
			for(var i = 0; i < Object.keys(data).length; i++) {
				if(data[i].name.toUpperCase() == $.trim($('#name').val().toUpperCase())) {
					$('#name').val(data[i].name);
					$('#other').val(data[i].other);
					$('#link').val(data[i].link);
					$('#desc').val(data[i].desc);
					$('#author').val(data[i].author);
					$('#source').val(data[i].source);
					
					$('#type').val(data[i].type.join(','));
					$('#dependencies').val(data[i].dependencies.join(','));
					
					if(window.skipVersions === false) {
						if(data[i].versions.indexOf('1.6.2') != -1)
							$('#ver162').prop('checked', true);
						else
							$('#ver162').attr('checked', false);
						if(data[i].versions.indexOf('1.6.1') != -1)
							$('#ver161').prop('checked', true);
						else
							$('#ver161').attr('checked', false);
						if(data[i].versions.indexOf('1.5.2') != -1)
							$('#ver152').prop('checked', true);
						else
							$('#ver152').attr('checked', false);
						if(data[i].versions.indexOf('1.5.1') != -1)
							$('#ver151').prop('checked', true);
						else
							$('#ver151').attr('checked', false);
						if(data[i].versions.indexOf('1.5.0') != -1)
							$('#ver150').prop('checked', true);
						else
							$('#ver150').attr('checked', false);
						if(data[i].versions.indexOf('1.4.7') != -1)
							$('#ver147').prop('checked', true);
						else
							$('#ver147').attr('checked', false);
						if(data[i].versions.indexOf('1.4.5') != -1)
							$('#ver145').prop('checked', true);
						else
							$('#ver145').attr('checked', false);
						if(data[i].versions.indexOf('1.4.2') != -1)
							$('#ver142').prop('checked', true);
						else
							$('#ver142').attr('checked', false);
					}
					window.skipVersions = false;

					$('#nametext').html('<span class="found">Match Found</span>');
					checkOtherMods();
					generate();
					loadbitly();
					match = true;
					break;
				}
			}
			if(!match) {
				$('#nametext').html('<span class="failed">No match found</span>');
			}
		});
	}
}

function checkOtherMods() {
	$('#authortext').html('Matching existing authors...');
	$.getJSON("../list/modlist.json?" + window.sessionVar, function(data) {
		var match = false;
		var modcount = 0;
		for(var i = 0; i < Object.keys(data).length; i++) {
			if(data[i].author.toUpperCase() == $.trim($('#author').val().toUpperCase())) {
				$('#author').val(data[i].author);
				match = true;
				modcount++;
			}
		}
		if(!match) {
			$('#authortext').html('<span class="found">No entries by this author</span>');
		} else {
			if(modcount == 1)
				$('#authortext').html('<span class="found">1 mod by this author</span>');
			else
				$('#authortext').html('<span class="found">' + modcount + ' mods by this author</span>');
		}
	});
}

function checkDepends() {
	
}

function hideDivs() {
	$('.canhide').css('display','none');
}


$('#name').focus(function() {
	window.lastName = $('#name').val();
});
$('#name').bind('input propertychange', null,generate);
$('#name').blur(checkExist);
$('#other').bind('input propertychange', null,generate);
$('#link').bind('input propertychange', null,checklink);
$('#link').bind('input propertychange', null,generate);
$('#link').blur(loadbitly);
$('#desc').bind('input propertychange', null,generate);
$('#author').bind('input propertychange', null,generate);
$('#author').blur(checkOtherMods);
$('#source').bind('input propertychange', null,checksource);
$('#source').bind('input propertychange', null,generate);
$('#source').blur(loadbitlysource);
$('#type').bind('input propertychange', null,generate);
$('#dependencies').bind('input propertychange', null,generate);
$('#dependencies').bind('input propertychange', null,checkDepends);
$('#ver162').click(generate);
$('#ver161').click(generate);
$('#ver152').click(generate);
$('#ver151').click(generate);
$('#ver150').click(generate);
$('#ver147').click(generate);
$('#ver145').click(generate);
$('#ver142').click(generate);
$('#reset').click(reset);
$('#output').focus(function() {
    var $this = $(this);
    $this.select();

    // Work around Chrome's little problem
    $this.mouseup(function() {
        // Prevent further mouseup intervention
        $this.unbind('mouseup');
        return false;
    });
});

// main.js
var clip = new ZeroClipboard(document.getElementById('copy'), {
  moviePath: '../resources/flash/ZeroClipboard.swf'
});

$('.canhide').html(
	$('.canhide').html() +
	'<div class="closebutton"><a href="javascript:hideDivs();" title="Click to close this message">&times;</a></div>'
	);