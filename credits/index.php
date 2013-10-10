<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/engine.php');
require_once('resources/scripts/tablegen.php');
$page = new Page;
$page->setTitle('Credits');
$page->startBody();
?>
<table class="table table-hover">
	<tbody>
		<tr>
			<td>citricsquid</td>
			<td>Founding the Minecraft Forums and kindly offering to host these pages for the mod list!</td>
		</tr>
		<tr>
			<td>catqueen5</td>
			<td>Creating the original mod list thread on the Minecraft Forums and allowing ZeroLevels to help mantain it.</td>
		</tr>
		<tr>
			<td>Vattic</td>
			<td>Giving ZeroLevels permission to use a copy of his javascript file which enables the old (no longer used) search function on the mod list. Vattic is the creator of the <a href="http://www.minecraftforum.net/topic/72747-">Faithful 32x32 Texturepack</a>.</td>
		</tr>
		<tr>
			<td>z2deker</td>
			<td>For creating the "<a href="http://fontstruct.com/fontstructions/show/517576" title="FontStruct | Minecraft z2font">Minecraft z2font</a>" used in the creation of the title images used in the original version of the site.</td>
		</tr>
		<tr>
			<td>GrygrFlzr</td>
			<td>Creator of the new site design, search scripts, backend panels, APIs, submission forms and more.</td>
		</tr>
		<tr>
			<td>ZeroLevels</td>
			<td>Maintaining/improving the mod list thread up until now. Now mantains the list on this site.</td>
		</tr>
		<tr>
			<td>All Contributors</td>
			<td>Obviously, this list would be nothing without all of you who contribute to it, whether it be new entries for the list, suggestions for improvement, or those who show their appreciation, which fuels us to continue maintaining it. The amount of submissions alone is staggering.</td>
		</tr>
		<tr>
			<td>VeryBigBro (Top Contributor)</td>
			<td>VeryBigBro has been around on the Mod List thread for a while, usually popping up with little less than ten mods to add to the list (per post), as well as additional info fixes for others. He easily deserves a place in the credits.</td>
		</tr>
	</tbody>
</table>
<?php
$page->endBody();
echo $page->render('resources/templates/modlist-template.php');