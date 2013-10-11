<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/engine.php');
$page = new Page;
$page->addJavascript('//cdnjs.cloudflare.com/ajax/libs/hogan.js/2.0.0/hogan.min.js');
$page->addJavascript('//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.9.3/typeahead.min.js');
$page->addLastJavascript('/resources/js/submission.js');
$page->setTitle('Submission Form');
$page->startBody();
?>
<div class="header">
	<h1>Submission Form</h1>
</div>
<?php
if(isset($_GET['incomplete'])) {
?>
<div class="alert alert-dismissable alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Oops!</strong> Make sure you fill in all the required fields and try submitting again.
</div>
<?php
}
if(isset($_GET['success'])) {
?>
<div class="alert alert-dismissable alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Well done!</strong> You successfully submitted the mod.
</div>
<?php
}
if(isset($_GET['failed'])) {
?>
<div class="alert alert-dismissable alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Uh oh!</strong> Something went wrong on our side. Please notify us about this problem.
</div>
<?php
}
?>
<form role="form" method="POST" action="../complete/">
	<div class="form-group">
		<div class="btn-group" id="request-type-group">
			<label class="active">
				<input type="radio" name="request-type" id="new" value="new" checked> New Mod
			</label>
			<label>
				<input type="radio" name="request-type" id="old" value="old"> Update Request
			</label>
		</div>
	</div>
	<div class="form-group">
		<label for="name">Mod Name</label>
		<input type="text" class="form-control typeahead" name="name" id="name" placeholder="Name of the mod" required autofocus>
	</div>
	<div class="form-group">
		<label for="link">Link</label>
		<input type="url" class="form-control" name="link" id="link" placeholder="Link to the site, page or thread of the mod">
	</div>
	<div class="form-group">
		<label for="desc">Description</label>
		<textarea class="form-control" rows="3" name="desc" id="desc" placeholder="What does the mod do? Be as clear and concise as possible."></textarea>
	</div>
	<div class="form-group">
		<label for="authors">Mod Authors</label>
		<input type="text" class="form-control" name="authors" id="authors" placeholder="Enter the author(s) of the mod, comma separated">
	</div>
	<div class="form-group">
		<label for="source">Source</label>
		<input type="url" class="form-control" name="source" id="source" placeholder="Link to site or page of the mod source code">
	</div>
	<div class="form-group" id="forge-compatibility">
		<label for="forge-compatibility">Forge Compatibility</label>
		<div class="radio">
			<label>
				<input type="radio" name="forge" id="required" value="required" checked>
				Forge Required - This mod needs Forge to run.
			</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="forge" id="compatible" value="compatible">
				Forge Compatible - This mod can run alongside Forge, but doesn't require it. Most Modloader mods can be loaded by Forge.
			</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="forge" id="notcompatible" value="notcompatible">
				Not Forge Compatible - This mod cannot run alongside Forge.
			</label>
		</div>
	</div>
	<div class="form-group" id="availability">
		<label for="availability">Availability</label>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="universal" name="availability[]">
				Universal - The mod has the same file that can run on both Singleplayer and Multiplayer.
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="client" name="availability[]">
				Clientside - The mod only needs to run on the client. Example: Minimaps
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="server" name="availability[]">
				Serverside - The mod only needs to run on the server. Example: Extra Commands
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="SSP" name="availability[]">
				SSP - The mod works in Singleplayer, and does not have a universal mod file.
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="SMP" name="availability[]">
				SMP - The mod works in Multiplayer, and does not have a universal mod file.
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="LAN" name="availability[]">
				LAN - The mod works in LAN, and does not have a universal mod file.
			</label>
		</div>
	</div>
	<div class="form-group" id="versions">
		<label for="versions">Versions</label>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.6.4" name="versions[]">
				1.6.4
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.6.2" name="versions[]">
				1.6.2
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.6.1" name="versions[]">
				1.6.1
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.5.2" name="versions[]">
				1.5.2
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.5.1" name="versions[]">
				1.5.1
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.5" name="versions[]">
				1.5
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.4.7" name="versions[]">
				1.4.7 / 1.4.6
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.4.5" name="versions[]">
				1.4.5 / 1.4.4
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.4.2" name="versions[]">
				1.4.2
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1.3.2" name="versions[]">
				1.3.2
			</label>
		</div>
	</div>
	<div class="form-group">
		<label for="other">Other</label>
		<textarea class="form-control" rows="3" name="other" id="other" placeholder="Any other information you want to tell us?"></textarea>
	</div>
	<button type="submit" class="btn btn-primary" data-loading-text="Submitting...">Submit</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>
<?php
$page->endBody();
echo $page->render('resources/templates/modlist-template.php');