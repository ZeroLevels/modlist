/* Submission Form Check
 * Written by GrygrFlzr
 */
var lastName = $('#name').val();
resetAll();
$('#submit').attr('disabled',true);

function checkExist() {
	if($('#name').val() !== window.lastName) {
		$('#nametext').html('Checking for existing entries...');
		$.getJSON("getinfo.php?request=name&value=" + encodeURIComponent($('#name').val()), function(data) {
			if(data !== false) {
				if(data['name'].toUpperCase() == $('#name').val().toUpperCase()) {
					$('#name').val(data['name']);
					$('#link').val(data['link']);
					$('#desc').val(data['desc']);
					$('#author').val(data['author']);
					
					if(data['versions'].indexOf("1.5.2") > -1)
						$('#ver152').attr('checked','true');
					else
						$('#ver152').removeAttr('checked');
					if(data['versions'].indexOf("1.5.1") > -1)
						$('#ver151').attr('checked','true');
					else
						$('#ver151').removeAttr('checked');
					if(data['versions'].indexOf("1.5.0") > -1)
						$('#ver150').attr('checked','true');
					else
						$('#ver150').removeAttr('checked');
					if(data['versions'].indexOf("1.4.7") > -1)
						$('#ver147').attr('checked','true');
					else
						$('#ver147').removeAttr('checked');
					if(data['versions'].indexOf("1.4.5") > -1)
						$('#ver145').attr('checked','true');
					else
						$('#ver145').removeAttr('checked');
					if(data['versions'].indexOf("1.4.2") > -1)
						$('#ver142').attr('checked','true');
					else
						$('#ver142').removeAttr('checked');
					
					
					if(data['dependencies'].indexOf("Forge Required") > -1 ||
						data['dependencies'].indexOf("Forge Itself") > -1)
						$('#fr').attr('checked','true');
					else
						$('#fr').removeAttr('checked');
					if(data['dependencies'].indexOf("Forge Compatible") > -1)
						$('#fc').attr('checked','true');
					else
						$('#fc').removeAttr('checked');
					if(data['dependencies'].indexOf("Not Forge Compatible") > -1)
						$('#nfc').attr('checked','true');
					else
						$('#nfc').removeAttr('checked');
					
					
					if(data['type'].indexOf("SSP") > -1)
						$('#ssp').attr('checked','true');
					else
						$('#ssp').removeAttr('checked');
					if(data['type'].indexOf("SMP") > -1)
						$('#smp').attr('checked','true');
					else
						$('#smp').removeAttr('checked');
					if(data['type'].indexOf("LAN") > -1)
						$('#lan').attr('checked','true');
					else
						$('#lan').removeAttr('checked');
					if(data['type'].indexOf("Universal") > -1)
						$('#universal').attr('checked','true');
					else
						$('#universal').removeAttr('checked');
					if(data['type'].indexOf("Client") > -1)
						$('#client').attr('checked','true');
					else
						$('#client').removeAttr('checked');
					if(data['type'].indexOf("Server") > -1)
						$('#server').attr('checked','true');
					else
						$('#server').removeAttr('checked');
					
					
					$('#nametext').html('<span class="found">Entry found. Loaded mod details.</span>');
					updateShow();
				}
			} else {
				$('#nametext').html('<span class="failed">Not found. Treated as new entry.</span>');
				newShow();
			}
		});
	}
	window.lastName = $('#name').val();
}

function checkAuthor() {
	$('#authortext').html('Checking for capitalisation...');
	$.getJSON("getinfo.php?request=author&value=" + encodeURIComponent($('#author').val()), function(data) {
		if(data !== false) {
			$('#author').val(data);
			$('#authortext').html('<span class="found">Author found.</span>');
		} else {
			$('#authortext').html('<span class="failed">Author not found.</span>');
		}
	});
}

function checkFields() {
	if($('#newmod').is(":checked")) {
		if(
			$('#name').val() !== "" &&
			$('#link').val() !== "" &&
			isLink($('#link').val()) &&
			$('#desc').val() !== "" &&
			$('#author').val() !== "" &&
			(
				$('#ssp').is(":checked") ||
				$('#smp').is(":checked") ||
				$('#lan').is(":checked") ||
				$('#universal').is(":checked") ||
				$('#client').is(":checked") ||
				$('#server').is(":checked")
			) &&
			(
				$('#ver152').is(":checked") ||
				$('#ver151').is(":checked") ||
				$('#ver150').is(":checked") ||
				$('#ver147').is(":checked")
			) &&
			$('#notbot').is(":checked")
		) {
			$('#submit').removeAttr('disabled');
		} else {
			$('#submit').attr('disabled',true);
		}
	} else if($('#oldmod').is(":checked")) {
		if(
			$('#name').val() !== "" &&
			(
				$('#ver152').is(":checked") ||
				$('#ver151').is(":checked") ||
				$('#ver150').is(":checked") ||
				$('#ver147').is(":checked")
			) &&
			$('#notbot').is(":checked")
		) {
			$('#submit').removeAttr('disabled');
		} else {
			$('#submit').attr('disabled',true);
		}
	}
}

function updateShow() {
	$('#link').attr('disabled',true);
	$('#desc').attr('disabled',true);
	$('#author').attr('disabled',true);
	
	$('#fc').attr('disabled',true);
	$('#fr').attr('disabled',true);
	$('#nfc').attr('disabled',true);
	
	$('#ssp').attr('disabled',true);
	$('#smp').attr('disabled',true);
	$('#lan').attr('disabled',true);
	$('#universal').attr('disabled',true);
	$('#client').attr('disabled',true);
	$('#server').attr('disabled',true);
	
	$('#oldmod').prop('checked',true);
}

function newShow() {
	$('#link').removeAttr('disabled');
	$('#desc').removeAttr('disabled');
	$('#author').removeAttr('disabled');
	
	$('#fc').removeAttr('disabled');
	$('#fr').removeAttr('disabled');
	$('#nfc').removeAttr('disabled');
	
	$('#ssp').removeAttr('disabled');
	$('#smp').removeAttr('disabled');
	$('#lan').removeAttr('disabled');
	$('#universal').removeAttr('disabled');
	$('#client').removeAttr('disabled');
	$('#server').removeAttr('disabled');
	
	$('#newmod').prop('checked',true);
}

function resetAll() {
	$('#ssp').removeAttr('checked');
	$('#smp').removeAttr('checked');
	$('#lan').removeAttr('checked');
	$('#universal').removeAttr('checked');
	$('#client').removeAttr('checked');
	$('#server').removeAttr('checked');
	
	$('#ver152').removeAttr('checked');
	$('#ver151').removeAttr('checked');
	$('#ver150').removeAttr('checked');
	$('#ver147').removeAttr('checked');
	$('#ver145').removeAttr('checked');
	$('#ver142').removeAttr('checked');
	
	$('#fc').removeAttr('checked');
	$('#fr').prop('checked',true);
	$('#nfc').removeAttr('checked');
	newShow();
}

function isLink(link) {
	if(/((https?):\/\/)?[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/.test(link)) {
		if(
			/(^[a-z]+:\/\/)google.co/.test(link) ||
			/(^[a-z]+:\/\/)*www.google.co/.test(link) ||
			/(^[a-z]+:\/\/)*(www)*\.yahoo.co/.test(link) ||
			/(^[a-z]+:\/\/)*(www.)*\.apple.co/.test(link) ||
			/(^[a-z]+:\/\/)*(www.)*\.mcf.li/.test(link) ||
			/(^[a-z]+:\/\/)*(www.)*\.andbox.tk/.test(link) ||
			/(^[a-z]+:\/\/)*127\./.test(link) ||
			/(^[a-z]+:\/\/)*0\./.test(link) ||
			/(^[a-z]+:\/\/)*169\./.test(link)
		)
			return false;
		else
			return true;
	} else
		return false;
}

function checkLink() {
	var link = $('#link').val();
	if(link != "") {
		if(isLink(link)) {
			if(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-./.test(link)) {
				$('#link').val(link.match(/(http:\/\/)*(www.)*minecraftforum.net\/topic\/\d+-/)[0]);
				$('#linktext').html('<span class="found">MCF Link cut</span>');
			} else {
				$('#linktext').html('<span class="found">Valid link</span>');
			}
		} else {
			$('#linktext').html('<span class="failed">Not a valid link</span>');
		}
	} else {
		$('#linktext').html("Enter the full URL to the mod's page here.");
	}
}

$('#name').blur(checkExist);
$('#author').blur(checkAuthor);
$('#reset').click(resetAll);
$('#oldmod').click(updateShow);
$('#newmod').click(newShow);
$('#link').blur(checkLink);

$('#newmod').change(checkFields);
$('#oldmod').change(checkFields);

$('#name').blur(checkFields);
$('#link').blur(checkFields);
$('#desc').blur(checkFields);
$('#author').blur(checkFields);
$('#other').blur(checkFields);

$('#ssp').click(checkFields);
$('#smp').click(checkFields);
$('#lan').click(checkFields);
$('#universal').click(checkFields);
$('#client').click(checkFields);
$('#server').click(checkFields);

$('#ver152').click(checkFields);
$('#ver151').click(checkFields);
$('#ver150').click(checkFields);
$('#ver147').click(checkFields);
$('#ver145').click(checkFields);
$('#ver142').click(checkFields);

$('#fc').click(checkFields);
$('#fr').click(checkFields);
$('#nfc').click(checkFields);
$('#notbot').click(checkFields);