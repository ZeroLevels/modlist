<div class="listcontain">
<form id="listcreator">
<h1>List Creator</h1>
<p>Easily write JSON for the modlist</p>
<label>Name
<span class="small" id="nametext">The name of the mod</span>
</label>
<input type="text" id="name" name="name" /></br>
<label>Other
<span class="small">Extra names attached</span>
</label>
<input type="text" id="other" name="other" /></br>
<label>Link
<span class="small" id="linktext">Link to the mod's page</span>
</label>
<input type="url" id="link" name="link" /></br>
<label>Desc
<span class="small">Mod Description</span>
</label>
<textarea id="desc" name="desc"></textarea></br>
<label>Author
<span class="small" id="authortext">Mod Creator</span>
</label>
<input type="text" id="author" name="author" /></br>
<label>Source
<span class="small" id="sourcetext">Link to Source Code</span>
</label>
<input type="text" id="source" name="source" /></br>
<label>Type
<span class="small">Comma separated</span>
</label>
<input type="text" id="type" name="type" /></br>
<label>Dependencies
<span class="small" id="dependencytext">Comma separated</span>
</label>
<input type="text" id="dependencies" name="dependencies" /></br>
<label>Versions
<span class="small">Supported MC Versions</span>
</label>
<fieldset class="checkcontain">
<input id="ver162" type="checkbox" name="version" value="162"><label for="162">1.6.2</label>
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
    "link":"",
    "desc":"",
    "author":[],
    "type":[],
    "dependencies":[],
    "versions":[]
  }</textarea>
<input id="copy" type="button" value="Copy to Clipboard" data-clipboard-target="output" />
</form>
</div>
