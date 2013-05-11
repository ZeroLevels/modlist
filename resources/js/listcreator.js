/* List Creator Javascript
 */
var sessionVar = Math.random();

function checklink() {
	//http://www.minecraftforum.net/topic/\d+-
	var link = $('#link').val();
	if(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-./.test(link)) {
		$('#link').val(link.match(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-/)[0]);
		$('#linktext').html('<span class="found">MCF Link cut</span>');
	}
}

function generate() {
	var json = '  {\r\n';
	json += '    "name":"' + $.trim($('#name').val()) + '",\r\n';
	json += '    "other":"' + $.trim($('#other').val()) + '",\r\n';
	json += '    "link":"' + $.trim($('#link').val()) + '",\r\n';
	json += '    "desc":"' + $.trim($('#desc').val()) + '",\r\n';
	json += '    "author":"' + $.trim($('#author').val()) + '",\r\n';
	if($.trim($('#type').val()) != "")
		json += '    "type":["' +
			$.map($('#type').val().split(','), $.trim).join('","') +
			'"],\r\n';
	else
		json += '    "type":[],\r\n';
	
	if($.trim($('#dependencies').val()) != "")
		json += '    "dependencies":["' +
			$.map($('#dependencies').val().split(','), $.trim).join('","') +
			'"],\r\n';
	else
		json += '    "dependencies":[],\r\n';
	
	var versions = new Array();
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
	if(versions.length > 0)
		json += '    "versions":["' + versions.join('", "') + '"]\r\n';
	else
		json += '    "versions":[]\r\n';
	
	json += '  }';
	$('#output').val(json);
}

function reset() {
	var json = '  {\r\n';
	json += '    "name":"",\r\n';
	json += '    "other":"",\r\n';
	json += '    "link":"",\r\n';
	json += '    "desc":"",\r\n';
	json += '    "author":"",\r\n';
	json += '    "type":[],\r\n';
	json += '    "dependencies":[],\r\n';
	json += '    "versions":[]\r\n';
	json += '  }';
	$('#output').val(json);
}

function checkExist() {
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
				
				$('#type').val(data[i].type.join(','));
				$('#dependencies').val(data[i].dependencies.join(','));
				
				if(data[i].versions.indexOf('1.5.2') != -1)
					$('#ver152').attr('checked', true);
				else
					$('#ver152').attr('checked', false);
				if(data[i].versions.indexOf('1.5.1') != -1)
					$('#ver151').attr('checked', true);
				else
					$('#ver151').attr('checked', false);
				if(data[i].versions.indexOf('1.5.0') != -1)
					$('#ver150').attr('checked', true);
				else
					$('#ver150').attr('checked', false);
				if(data[i].versions.indexOf('1.4.7') != -1)
					$('#ver147').attr('checked', true);
				else
					$('#ver147').attr('checked', false);
				if(data[i].versions.indexOf('1.4.5') != -1)
					$('#ver145').attr('checked', true);
				else
					$('#ver145').attr('checked', false);
				if(data[i].versions.indexOf('1.4.2') != -1)
					$('#ver142').attr('checked', true);
				else
					$('#ver142').attr('checked', false);

				$('#nametext').html('<span class="found">Match Found</span>');
				checkOtherMods();
				generate();
				match = true;
				break;
			}
		}
		if(!match) {
			$('#nametext').html('<span class="failed">No match found</span>');
		}
	});
}

function checkOtherMods() {
	$('#authortext').html('Matching existing authors...');
	$.getJSON("../list/modlist.json", function(data) {
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


$('#name').keyup(generate);
$('#name').blur(checkExist);
$('#other').keyup(generate);
$('#link').keyup(checklink);
$('#link').keyup(generate);
$('#desc').keyup(generate);
$('#author').keyup(generate);
$('#author').blur(checkOtherMods);
$('#type').keyup(generate);
$('#dependencies').keyup(generate);
$('#dependencies').keyup(checkDepends);
$('#ver152').click(generate);
$('#ver151').click(generate);
$('#ver150').click(generate);
$('#ver147').click(generate);
$('#ver145').click(generate);
$('#ver142').click(generate);
$('#reset').click(reset);
$("#output").focus(function() {
    var $this = $(this);
    $this.select();

    // Work around Chrome's little problem
    $this.mouseup(function() {
        // Prevent further mouseup intervention
        $this.unbind("mouseup");
        return false;
    });
});

// main.js
var clip = new ZeroClipboard(document.getElementById("copy"), {
  moviePath: "../resources/flash/ZeroClipboard.swf"
});