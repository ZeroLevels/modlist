MCF Modlist
---------

A list of mods for Minecraft, available at [modlist.mcf.li](http://modlist.mcf.li).

## installation

* Copy ```data/config_template.php``` to ```data/config.php```
* [Register a GitHub Application](https://github.com/settings/applications)
* Set Client ID, Client Secret and Authorization callback URL for GitHub Application in ```data/config.php```
* Make ```data/cache``` writeable
* From project root run ```composer install```