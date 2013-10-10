<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/engine.php');
require_once('resources/scripts/tablegen.php');
$page = new Page;
$page->setTitle('Version List');
$page->startBody();
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Version</th>
			<th>Mods listed</th>
		</tr>
	</thead>
	<tbody>
<?php
$blacklist = Array('.','..','latest','index.php');
$dir    = '.';
$versions = scandir($dir,1);
foreach($versions as &$version) {
	if(!in_array($version,$blacklist)) {
		echo '<tr>';
		echo "<td><a href=\"/version/$version\">$version</a></td>";
		echo '<td>' . countList($version) . '</td>';
		echo "</tr>\n";
	}
}
?>
	</tbody>
</table>
<?php
$page->endBody();
echo $page->render('resources/templates/modlist-template.php');