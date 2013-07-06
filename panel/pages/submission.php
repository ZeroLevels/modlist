<?php
function readJSON($filename) {
	if(!isset($GLOBALS[$filename])) {
		$JSONfile = recode(file_get_contents($filename));
		$GLOBALS[$filename] = json_decode($JSONfile);
	}
	return $GLOBALS[$filename];
}
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

$mod = array();
$submissions = readJSON('secrets/submissions.json');

if(isset($_GET['id'])) {
	foreach($submissions as &$modreq) {
		if($modreq->id == intval($_GET['id'])) {
			$mod = $modreq;
			break;
		}
	}
}
if(!empty($mod)) {
	if(
		!isset($mod->assigned) || 
		(
			isset($mod->assigned) &&
			$mod->assigned == $_SESSION['usr']
		)
	) {
	if(!isset($mod->assigned)) {
		$mod->assigned = $_SESSION['usr'];
		$submissions[$mod->id] = $mod;
		file_put_contents('secrets/submissions.json', json_encode($submissions));
		echo '<div class="headermessage canhide">NOTICE: This submission has been assigned to you. <a href="panel.php?view=submission&mode=unassign&id='.$mod->id.'">Click here to undo.</a></div>';
	} else {
		if(isset($_GET['mode'])) {
			switch($_GET['mode']) {
			case 'unassign':
				unset($mod->assigned);
				$submissions[$mod->id] = $mod;
				file_put_contents('secrets/submissions.json', json_encode($submissions));
				header('Location: panel.php?view=submission', true, 302);
				exit();
				break;
			case 'complete':
				$mod->complete = true;
				$submissions[$mod->id] = $mod;
				file_put_contents('secrets/submissions.json', json_encode($submissions));
				header('Location: panel.php?view=submission', true, 302);
				exit();
				break;
			}
		}
	}
?>
<div class="listcontain">
<form id="listcreator">
<h1>List Creator</h1>
<p><?php echo 'Current Mode: ' . $mod->mode; if($mod->other != "") { echo '</br>Other info from submitter: ' . $mod->other; } echo '</br><a href="panel.php?view=submission&mode=unassign&id='.$mod->id.'">Click here to unassign yourself.</a>'; ?></p>
<label>Name
<span class="small" id="nametext">The name of the mod</span>
</label>
<input type="text" id="name" name="name" <?php echo 'value="' . trim($mod->name) . '"'; ?> /></br>
<label>Other
<span class="small">Extra names attached</span>
</label>
<input type="text" id="other" name="other" <?php if(isset($mod->other)) echo 'value="' . trim($mod->other) . '"'; ?> /></br>
<label>Link
<span class="small" id="linktext">Link to the mod's page</span>
</label>
<input type="url" id="link" name="link" <?php echo 'value="' . trim($mod->link) . '"'; ?> /></br>
<label>Desc
<span class="small">Mod Description</span>
</label>
<textarea id="desc" name="desc"><?php echo trim($mod->desc); ?></textarea></br>
<label>Author
<span class="small" id="authortext">Mod Creator</span>
</label>
<input type="text" id="author" name="author" <?php echo 'value="' . trim($mod->author) . '"'; ?> /></br>
<label>Source
<span class="small" id="sourcetext">Link to Source Code</span>
</label>
<input type="text" id="source" name="source" <?php if(isset($mod->source)) echo 'value="' . trim($mod->source) . '"'; ?> /></br>
<label>Type
<span class="small">Comma separated</span>
</label>
<input type="text" id="type" name="type" <?php
if(is_array($mod->availability))
	echo 'value="' . implode(', ',$mod->availability) . '"';
else
	echo 'value="' . $mod->availability . '"';
?> /></br>
<label>Dependencies
<span class="small" id="dependencytext">Comma separated</span>
</label>
<input type="text" id="dependencies" name="dependencies" <?php
if(is_array($mod->compatibility))
	echo 'value="' . implode(', ',$mod->compatibility) . '"';
else
	echo 'value="' . $mod->compatibility . '"';
?> /></br>
<label>Versions
<span class="small">Supported MC Versions</span>
</label>
<fieldset class="checkcontain">
<input id="ver161" type="checkbox" name="version" value="161"><label for="161">1.6.1</label>
<input id="ver152" type="checkbox" name="version" value="152"><label for="152">1.5.2</label>
<input id="ver151" type="checkbox" name="version" value="151"><label for="151">1.5.1</label>
<input id="ver150" type="checkbox" name="version" value="150"><label for="150">1.5</label>
<input id="ver147" type="checkbox" name="version" value="147"><label for="147">1.4.7/1.4.6</label>
<input id="ver145" type="checkbox" name="version" value="145"><label for="145">1.4.5/1.4.4</label>
<input id="ver142" type="checkbox" name="version" value="142"><label for="142">1.4.2</label>
<input id="ver132" type="checkbox" name="version" value="132"><label for="132">1.3.2</label>
</fieldset>
<input id="reset" type="reset" value="Reset" />
</form>
</div>
<div class="listcontain">
<form id="listcreator">
<h1>JSON Output</h1>
<p>Automatically generated output</p>
<textarea id="output" name="output" readonly>  {
    "name":"",
    "other":"",
    "link":"",
    "desc":"",
    "author":[],
    "type":[],
    "dependencies":[],
    "versions":[]
  }</textarea>
<input id="copy" type="button" value="Copy to Clipboard" data-clipboard-target="output" />
<input id="complete" type="button" value="Mark as Complete" onclick="window.location = 'panel.php?view=submission&id=<?php echo $mod->id; ?>&mode=complete';" />
</form>
</div>
<script type="application/javascript" defer>
window.onload = function() {
	<?php if($mod->mode == "Update Request") { echo 'checkExist();'; } ?>
	generate();
	loadbitly();
	checklink();
	checkOtherMods();
	checkDepends();
	<?php echo 'setVersions("'.implode(',',$mod->versions).'"); generate();'; ?>
}
</script>
<?php
	} else {
		echo '<div class="headermessage canhide">Cannot access: This submission is currently assigned to ' . $mod->assigned . '.</br>';
		echo 'This has been done to prevent double submission of the same mod.</br>';
		echo '<a href="panel.php?view=submission">Return to submission list</a></div>';
	}
} else {
if(isset($_GET['hide']))
	echo '<a href="panel.php?view=submission">Hide completed</a></br>';
else
	echo '<a href="panel.php?view=submission&hide=false">Unhide completed</a></br>';
?>
<table class="submissiontable">
	<thead>
		<tr>
			<th class="id">ID</th>
			<th>Mod Name</th>
			<th>Type</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody style="text-align: right;">
		<?php
			$submissions = array_reverse($submissions);
			foreach($submissions as &$modreq) {
				if(!isset($modreq->complete) || isset($_GET['hide'])) {
					echo '<tr>';
					echo '<td class="id">' . $modreq->id . '</td>';
					echo '<td>' . $modreq->name . '</td>';
					echo '<td>' . $modreq->mode . '</td>';
					if(isset($modreq->assigned)) {
						if(isset($modreq->complete))
							echo '<td class="completed">Completed by ' . $modreq->assigned . '</td>';
						else {
							if($modreq->assigned == $_SESSION['usr'])
								echo '<td class="assigned"><a href="panel.php?view=submission&id=' . $modreq->id . '">Assigned to you</a></td>';
							else
								echo '<td class="assigned">Assigned to ' . $modreq->assigned . '</td>';
						}
					} else
						echo '<td class="unresolved"><a href="panel.php?view=submission&id=' . $modreq->id . '">Unresolved</a></td>';
					echo '</tr>';
				}
			}
		?>
	</tbody>
</table>
<?php
}
?>