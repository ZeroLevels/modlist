<?php
/* Recent Changelog Image Script
 * Written by GrygrFlzr
 */
if(isset($_SESSION['usr'])) {
	$change164 = file('../resources/data/changelogs/1.6.4.txt');
	$change162 = file('../resources/data/changelogs/1.6.2.txt');
	$change161 = file('../resources/data/changelogs/1.6.1.txt');
	$change152 = file('../resources/data/changelogs/1.5.2.txt');
	$counter = 0;
	for($i=0;$i<count($change164);$i++) {
		if($change164[$i] == "\r\n" || $change164[$i] == "\n") {
			$counter = $counter + $i + 1;
			break;
		}
	}
	for($i=0;$i<count($change162);$i++) {
		if($change162[$i] == "\r\n" || $change162[$i] == "\n") {
			$counter = $counter + $i + 1;
			break;
		}
	}
	for($i=0;$i<count($change161);$i++) {
		if($change161[$i] == "\r\n" || $change161[$i] == "\n") {
			$counter = $counter + $i + 1;
			break;
		}
	}
	for($i=0;$i<count($change152);$i++) {
		if($change152[$i] == "\r\n" || $change152[$i] == "\n") {
			$counter = $counter + $i + 1;
			break;
		}
	}
	if(isset($_GET['debug']))
		$image = imagecreate(700, 600);
	else
		$image = imagecreate(700, 32 + ($counter * 14));

	$background = imagecolorallocate($image, 232, 239, 244);
	$cl_black = imagecolorallocate($image, 0, 0, 0);
	$cl_darkgrey = imagecolorallocate($image, 31, 31, 31);
	$cl_white = imagecolorallocate($image, 255, 255, 255);
	$cl_darkgreen = imagecolorallocate($image, 0, 128, 0);
	$cl_darkblue = imagecolorallocate($image, 0, 0, 128);
	$cl_darkred = imagecolorallocate($image, 128, 0, 0);
	$font = '../resources/fonts/arial.ttf';
	$fontb = '../resources/fonts/arialbd.ttf';

	imagettftext($image, 18, 0, 10, 29, $cl_white, $font, "Latest Changes");
	imagettftext($image, 18, 0, 10, 28, $cl_black, $font, "Latest Changes");
	imagettftext($image, 8, 0, 560, 19, $cl_white, $font, "Automatic Changelog Script");
	imagettftext($image, 8, 0, 596, 29, $cl_white, $font, "Written by GrygrFlzr");
	imagettftext($image, 8, 0, 560, 18, $cl_darkgrey, $font, "Automatic Changelog Script");
	imagettftext($image, 8, 0, 596, 28, $cl_darkgrey, $font, "Written by GrygrFlzr");

	imagettftext($image, 12, 0, 10, 48, $cl_black, $fontb, "1.6.4");
	$counter = 0;
	for($i=1;$i<count($change164);$i++) {
		if($change164[$i] != "\r\n" && $change164[$i] != "\n") {
			drawChange($image, 48 + (($i + $counter) * 14), $change164[$i]);
		} else {
			$counter = $counter + $i + 1;
			break;
		}
	}
	imagettftext($image, 12, 0, 10, ($counter * 14) + 48, $cl_black, $fontb, "1.6.2");
	for($i=1;$i<count($change162);$i++) {
		if($change162[$i] != "\r\n" && $change162[$i] != "\n") {
			drawChange($image, 48 + (($i + $counter) * 14), $change162[$i]);
		} else {
			$counter = $counter + $i + 1;
			break;
		}
	}
	imagettftext($image, 12, 0, 10, ($counter * 14) + 48, $cl_black, $fontb, "1.6.1");
	for($i=1;$i<count($change161);$i++) {
		if($change161[$i] != "\r\n" && $change161[$i] != "\n") {
			drawChange($image, 48 + (($i + $counter) * 14), $change161[$i]);
		} else {
			$counter = $counter + $i + 1;
			break;
		}
	}
	imagettftext($image, 12, 0, 10, ($counter * 14) + 48, $cl_black, $fontb, "1.5.2");
	for($i=1;$i<count($change152);$i++) {
		if($change152[$i] != "\r\n" && $change152[$i] != "\n") {
			drawChange($image, 48 + (($i + $counter) * 14), $change152[$i]);
		} else {
			$counter = $counter + $i + 1;
			break;
		}
	}

	imagepng($image, '../resources/images/changelog.png', 9, PNG_ALL_FILTERS);
	echo 'Image generated successfully. Click <a href="/resources/images/changelog.png" target="blank">here</a> to view the image.</br>';
	echo '<img src="/resources/images/changelog.png" alt="Changelog" />';
	imagecolordeallocate($image, $background);
	imagecolordeallocate($image, $cl_black);
	imagecolordeallocate($image, $cl_darkgrey);
	imagecolordeallocate($image, $cl_white);
	imagecolordeallocate($image, $cl_darkgreen);
	imagecolordeallocate($image, $cl_darkblue);
	imagecolordeallocate($image, $cl_darkred);
	imagedestroy($image);
}

function drawChange($image, $y, $text) {
	global $cl_black, $cl_darkgreen, $cl_darkblue, $cl_darkred, $font;
	
	imagettftext($image, 10, 0, 10, $y, $cl_black, $font, $text);
	if(substr($text,1,1) == "+")
		imagettftext($image, 10, 0, 10, $y, $cl_darkgreen, $font, substr($text,0,2));
	if(substr($text,2,1) == "+")
		imagettftext($image, 10, 0, 10, $y, $cl_darkgreen, $font, substr($text,0,3));
	if(substr($text,1,1) == "*")
		imagettftext($image, 10, 0, 10, $y, $cl_darkblue, $font, substr($text,0,2));
	if(substr($text,2,1) == "*")
		imagettftext($image, 10, 0, 10, $y, $cl_darkblue, $font, substr($text,0,3));
	if(substr($text,1,1) == "-")
		imagettftext($image, 10, 0, 10, $y, $cl_darkred, $font, substr($text,0,2));
	if(substr($text,2,1) == "-")
		imagettftext($image, 10, 0, 10, $y, $cl_darkred, $font, substr($text,0,3));
}
?>