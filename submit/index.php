<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/engine.php');
require_once('resources/scripts/tablegen.php');
$page = new Page;
$page->setTitle('Submission List');
$page->startBody();

$percentUpdate = percentage(countCompleteUpdate(),countAll());
$percentNew = percentage(countCompleteNew(),countAll());
?>
<div class="page-header">
  <h1>Mod submissions<br /><small>Submitted mods in queue</small></h1>
  <a class="btn btn-primary" href="form">Submit a mod</a>
</div>
<div class="progress">
<?php
echo '<div class="progress-bar" style="width: ' . $percentUpdate .
	'%" data-title="' . countCompleteUpdate() . ' mod updates completed"></div>';
echo '<div class="progress-bar progress-bar-info" style="width: ' . $percentNew .
	'%" data-title="' . countCompleteNew() . ' new mods completed"></div>';
echo '</div>';

submissionTable();
//echo '<a href="form"><button type="submit" class="btn btn-primary">Click to submit a mod</button></a>';

$page->endBody();
echo $page->render('resources/templates/modlist-template.php');