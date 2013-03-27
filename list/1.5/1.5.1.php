<!doctype html>
<html>

<head>

	<meta charset="utf-8">

	<title>MCF Mod List - 1.5.1</title>
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../resources/js/tableSearch.js">/*Search script courtesy of Vattic*/</script>
	
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/modlist.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/nav.css" media="screen" />
	
</head>
  
<body>
	<center>
		<p>
			<img src="../../resources/images/1.5.1.png" width="130" height="58"/><br/>
			<span style="font-size:200%">Last Updated: <?php $content = file('changelog_1.5.1.txt'); echo $content[0]; ?></span><br/><a href="changelog_1.5.1.txt" class="ns">Click here</a> to view the changelog.
		</p>
		
		<ul id="list-nav">
			<li><a href="/">Home</a></li>
			<li><a href="/credits/">Credits</a></li>
			<li><a href="/latest/">Current List</a></li>
			<li><a href="/banners/">Banners</a></li>
			<br/><li class="nh"><a href="/resources/igml2/" class="igml">Ingame Mod List</a></li>
		</ul>
				
	<br><hr width="99%" size="6" noshade>
		
	<p>If you know of a mod that's not on this list, please leave a post on the Minecraft Forums <a href="http://bit.ly/13fsFlm" class="ns" title="The original Minecraft Forums post for the mod list">here</a>, or in the <span style="color: #0481ff">#mcf_modlist</span> IRC channel on <span style="color: purple">EsperNet</span> if ZeroLevels or ImperialFeline is available. Make sure to search for it here first.<br/><br/>If there's an icon in the "Info" column, hover over it to read the description for that mod.</p>
	
	<table class="listnav nav major">
		<thead>
			<th colspan="2" style="color: black">List Version Navigation</th>
		</thead>
		
		<tbody>
			<tr class="c">
				<!-- <td class="nh"><a href="../1.3/">1.3</a></td> -->
				<td class="nh" onclick="window.location.href='../1.4/'"><a href="../1.4/">1.4</a></td>
				<td class="h">1.5</td>
			</tr>
		</tbody>
	</table>
	
	<table class="minor listnav nav">
		<tr>
			<td class="nh" onclick="window.location.href='1.5.0.php'"><a href="1.5.0.php">1.5.0</a></td>
			<td class="h">1.5.1</td>
	</table>
	
	<table cellspacing="0" class="modlist" id="example">
		<thead>
			<th style="min-width:262px">Mod Name<br/><input style="display:none" class="searchEmpty" /></th>
			<th style="min-width: 50px; max-width:51px">Info</th>
			<th>Author</th>
			<th>Availability</th>
			<th>Compatibility with Forge</th>
		</thead>
		
<tbody>


<!----------------------------------------------------------#-------------------------------------------------------->

<!----------------------------------------------------------A-------------------------------------------------------->

<!--AllSnow Mod-->
<tr>
	<td><a href="http://bit.ly/XVofQc">AllSnow Mod</a></td>
	<td class="desctt"><span class="tt">Changes the properties of the non-snowy biomes in Minecraft, lowering their ambient temperatures and essentially cooling them down so that snow and ice will not melt when generated. It then switches on the biomes' toggles for snowfall. The result is all biomes have snow in them, and when precipitation falls it is always snow (except in ocean biomes).</span></td>
	<td>Sopwith</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Ariadne's Thread-->
<tr>
	<td><a href="http://bit.ly/13Y62Vg">Ariadne's Thread</a></td>
	<td class="desctt"><span class="tt">Upon hitting the activation key (default is P), this mod creates a floating thread that leads from where you pressed the key to wherever you walk to. Never get lost again!</span></td>
	<td>Iron_Pike</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Armor Stand-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Armor Stand</a></td>
	<td class="desctt"><span class="tt">This block will give you a place to show off your armor. Just place the block and right click on the platform. You can choose from a selection of skins to hold your armor, as well as have it stare at you, constantly. You may also change the texture of platform by putting block in the last slot.</span></td> 
	<td>Risugami</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--ArmorStatusHUD-->
<tr>
	<td><a href="http://bit.ly/WmtGCf">ArmorStatusHUD</a></td> 
	<td class="ml desctt"><span class="tt"><center><big class="d bc">ModLoader Mod, bspkrsCore Required</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>ArmorStatusHUD displays your currently equipped armor and held item along with the durability remaining without having to open your inventory!</span></td> 
	<td>bspkrs</td> 
	<td>Clientside Mod</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--Asgard Shield-->
<tr>
	<td><a href="http://bit.ly/WRfjWs">Asgard Shield: Sword -n- Board Action</a></td>
	<td class="desctt"><span class="tt">Adds shields and guarding mechanics to Minecraft.</span></td>
	<td>Jade Knightblazer</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--AudioMod (API)-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">AudioMod</a> (API)</td>
	<td class="desctt"><span class="tt">AudioMod is an upgrade of sorts, and a modder's utility. Included in this mod is CodecIBXM, created by Paul at www.paulscode.com, who is the creator of the sound system used in Minecraft. It allows Minecraft to play (in addition to ogg, wav, and mus files), xm, s3m, and mod files. The only readily available feature of this mod is the ability to add new music, however, it adds support for modders to add new records and sound effects.<br/><br/><i>NOTE: Do not install this with Forge. Forge has its own version that's backwards compatible with Risugami's.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Auto Farmer-->
<tr>
	<td><a href="http://bit.ly/ZOUv3Q">Auto Farmer</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Automatically harvests fully matured plants as well as automatically plant seeds.</span></td>
	<td>Corosus</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!----------------------------------------------------------B-------------------------------------------------------->

<!--Backpacks-->
<tr>
	<td><a href="http://bit.ly/WmsjDo">Backpacks</a></td>
	<td class="desctt"><span class="tt">Adds dyable backpacks to the game for storing extra items. Backpack size is configurable.</span></td>
	<td>Eydamos</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--BattleTowers-->
<tr>
	<td><a href="http://bit.ly/as-battletowers">BattleTowers</a></td> 
	<td class="desctt"><span class="tt">Adds towers that spawn throughout your world for you to ascend and gain treasure from, each floor containing mobs and loot with a boss at the very top.</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Better Biomes-->
<tr>
	<td><a href="http://bit.ly/ZQhm0K">Better Biomes</a></td>
	<td class="desctt"><span class="tt">Adds a new world type, more biomes, and configuration options for vanilla biomes. The Better Biomes world type contains all the new biomes - they do not generate in the standard Overworld. Each one can be turned off in the config.</span></td>
	<td>SMEZ1234</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Better World Generation 4-->
<tr>
	<td><a href="http://bit.ly/WmtfYF">Better World Generation 4</a></td>
	<td class="desctt"><span class="tt">Adds many world generation options regarding previous versions of Minecraft.</span></td>
	<td>ted80</td>
	<td>SSP SMP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--B&I-->
<tr>
	<td><a href="http://bit.ly/WdWkqT">B&I</a></td>
	<td class="desctt"><span class="tt">Adds some recipes that help the player and also adds some Block and Items.</span></td>
	<td>Megabitus98</td>
	<td>N/A</td>
	<td class="fr">Forge Required</td>
</tr>

<!--BiblioCraft-->
<tr>
	<td><a href="http://bit.ly/ZvRIOm">BiblioCraft</a></td>
	<td class="desctt"><span class="tt">A fairly simple mod that adds 8 new types of unique storage blocks to display a few different items. There is a bookcase that shows up to 16 books on the shelf, an Armor stand to display a full set of armor. There is also a potion shelf for up to 12 potions, a tool rack to hang 4 different tools/weapons, a general shelf that can display any 4 items, a display case for a single fancy item, and a wooden label that can display up to 3 items in small scale for tasks such as indicating what is in a chest. The newest edition includes the wooden Desk that can hold up to 9 books.</span></td>
	<td>Nuchaz</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Biosphere-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Biosphere</a></td> 
	<td class="desctt"><span class="tt">This is a new generator. You may select this generator in More World Options when creating world. In this generator, the world is made up of massive spheres with glass domes. Inside these spheres are random biomes. There is a random chance of a lake being placed in the center of each sphere. Usually water, but rarely lava. Bordering this lake you will find sand for water, or gravel for lava. Connecting each sphere is a wooden bridge with fence rail. Beside each sphere is a smaller sphere, which is where you will find diamond and lapis lazuli. These ores only occur here, the others are equally spread throughout the spheres. The cave generator used here is a modified Nether cave generator, where like on the surface, will generate lava below a certain level. If this lava reaches the outside, an obsidian wall will be made to hold it in.</span></td> 
	<td>Risugami</td> 
	<td>SSP</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--BlockBreaker / ConnectedDestruction-->
<tr>
	<td><a href="http://bit.ly/TWHHIG">BlockBreaker / ConnectedDestruction</a></td> 
	<td class="d desctt"><span class="tt"><center><big class="d bc" style="max-width: 10px"><u>bspkrsCore Required</u></big><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Allows you to define a list of blocks that will break in a chain reaction when an adjacent block of the same type is broken.</span></td> 
	<td>bspkrs</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--bspkrsCore-->
<tr>
	<td><a href="http://bit.ly/bspkrscore">bspkrsCore</a> (Dependency)</td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>This mods is required by all other mods created/maintained by bspkrs.</span></td>
	<td>bspkrs</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------C-------------------------------------------------------->

<!--Chainz: The -Missing- Iron Link-->
<tr>
	<td><a href="http://bit.ly/UWxU5G">Chainz: The -Missing- Iron Link</a></td>
	<td class="desctt"><span class="tt">Chainz is inspired by innovation to create new ways to create in game Minecraft Items legit and to provide a brand new transportation feature, along with fresh weaponry.</span></td>
	<td>Jade Knightblazer</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--ChickenChunks-->
<tr>
	<td><a href="http://bit.ly/IRSg84">ChickenChunks</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">CodeChickenCore Required:</big><br/>See <i class="d">bit.ly/cb-core</i></center><br/>Adds a block called a chunkloader, when placed it will keep chunks around it loaded even if no players are nearby or even online. So now your plants can grow and your automatic quarries can run, even when you're not around. Works in singleplayer as well.</span></td>
	<td>chicken_bones</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--ChickenShed-->
<tr>
	<td><a href="http://bit.ly/ChickenShed">ChickenShed</a></td> 
	<td class="desctt"><span class="tt">This is a simple two-class mod that makes it so that chickens will shed a feather now and then. It also makes it so that upon death, they are guaranteed to drop at least one feather. Lastly, baby chickens will now also drop a single feather upon death (but why would you kill it?! D: ).</span></td> 
	<td>Vazkii</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--CJB API-->
<tr>
	<td><a href="http://bit.ly/cjbmodsr">CJB API</a> (Dependency)</td>
	<td class="desctt"><span class="tt">CJB API is required for any of CJB's mods work. It doesn't do anything on its own.</span></td>
	<td>CJB</td>
	<td><b>Universal</b></td>
	<td class="fr">Forge Required</td>
</tr>

<!--CodeChickenCore-->
<tr>
	<td><a href="http://bit.ly/cb-core">CodeChickenCore</a> (Dependency)</td>
	<td class="desctt"><span class="tt">This mod is required for "Not Enough Items (NEI)", "Ender Storage", and "ChickenChunks".</span></td>
	<td>chicken_bones</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Combat Bars-->
<tr>
	<td><a href="http://bit.ly/14bQNbq">Combat Bars</a></td>
	<td class="desctt"><span class="tt">Adds 4 new items to Minecraft, which can help you in several situations, but aren't terribly overpowered at the same time.</span></td>
	<td>ocomobock</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Compact Crafting-->
<tr>
	<td><a href="http://bit.ly/ZgsLaY">Compact Crafting</a></td>
	<td class="desctt"><span class="tt">Allows you to compact items and other blocks into Compact Blocks, making it much easier for you to carry things in your inventory!</span></td>
	<td>Moony22</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Creeper Sword-->
<tr>
	<td><a href="http://bit.ly/ZJdluZ">Creeper Sword</a></td>
	<td class="desctt"><span class="tt">Adds a sword imbued with the explosive power of the creepers.</span></td>
	<td>Guff</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--CrystalWing-->
<tr>
	<td><a href="http://bit.ly/TWHHIG">CrystalWing</a></td> 
	<td class="ml desctt"><span class="tt"><center><big class="d bc">ModLoader Mod, bspkrsCore Required</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>With this enchanted wing, you'll be able to teleport back to your spawn point or bed (fancy effects included!).</span></td> 
	<td>bspkrs</td> 
	<td>SSP</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--Custom NPCs-->
<tr>
	<td><a href="http://bit.ly/ZwE4Os">Custom NPCs</a></td>
	<td class="desctt"><span class="tt">This mod adds a set of tools to create npcs with different roles/jobs and other functions. It gives Creative Players a way to liven up their world with fully Customizable NPCs.</span></td>
	<td>Noppes</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------D-------------------------------------------------------->

<!--Damage Indicators-->
<tr>
	<td><a href="http://bit.ly/WnybMA">Damage Indicators</a></td>
	<td class="desctt"><span class="tt">When anything living takes damage, the damage they took will bounce off their head, with a cool little effect. Also shows a mod portrait, with name, status</span></td>
	<td>rich1051414</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Deadly World-->
<tr>
	<td><a href="http://bit.ly/VuOduI">Deadly World</a></td>
	<td class="desctt"><span class="tt">Adds a few world generation features that make living more difficult! These features include mines, silverfish veins, lava pockets, and things that shoot arrows everywhere, all using blocks and features included in vanilla!</span></td>
	<td>FatherToast</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Death Chest-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Death Chest</a></td>
	<td class="desctt"><span class="tt">When you die, if you have a chest in your inventory, it will be placed where you die, or in the closest available spot. The chest will be filled with as many items as possible. Items stored in the crafting slot are still lost, as usual, and any excess that won't fit in the chest will be dropped.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Death Counter-->
<tr>
	<td><a href="http://bit.ly/ichun-deathcounter">Death Counter</a></td> 
	<td class="desctt"><span class="tt">Adds a way for the server to calculate the number of deaths a player has (since its installation). It will also notify the player of the death count and ranking on the server (Configurable)</span></td> 
	<td>iChun</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--DirectionHUD-->
<tr>
	<td><a href="http://bit.ly/WmtGCf">DirectionHUD</a></td> 
	<td class="ml desctt"><span class="tt"><center><big class="d bc" style="max-width: 10px"><u>ModLoader Mod, bspkrsCore Required</u></big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Displays your magnetic compass heading at the top of your screen.</span></td> 
	<td>bspkrs</td> 
	<td>Clientside Mod</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--DungeonPack-->
<tr>
	<td><a href="http://bit.ly/V5Ecn9">DungeonPack</a></td>
	<td class="desctt"><span class="tt">Adds many new structures to the game, most of which are hostile and contain loot! Also good for a free home once you clear out all the baddies.</span></td>
	<td>Stuuupiiid</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Dungeon Mobs-->
<tr>
	<td><a href="http://bit.ly/dungeonmobs">Dungeon Mobs</a></td>
	<td class="desctt"><span class="tt">Dungeon Mobs is intended to be a more dangerous analogue to Mo' Creatures. Instead of providing new animals that liven up the overworld and improve ambiance, this mod introduces a variety of new hostile mobs, each of which presents a different challenge, requiring you to think tactically about how to surmount the difficulty they pose. Supports "Biomes O' Plenty", "ExtraBiomesXL", and "Highlands".</span></td>
	<td>GnomeWorks</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Dynamic Lights-->
<tr>
	<td><a href="http://bit.ly/as-dynamiclights">Dynamic Lights</a></td> 
	<td class="desctt"><span class="tt">This modification makes 'shining' items <i>(default: Torch, Glowstone, Glowdust, Lit Pumpkin, Redstone, Lava Bucket, powered Minecart)</i> illuminate everything around them if:<br><ul><li>the player has them equipped (in hand/armor)</li><li>they are dropped on the ground</li><li>another player has them equipped in Multiplayer</li></ul><br/>On top of that, burning Entities shine light, and Creepers about to explode light up!</span></td> 
	<td>AtomicStryker</td> 
	<td>Clientside Mod</td> 
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------E-------------------------------------------------------->

<!--Elemental Arrows-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Elemental Arrows</a></td>
	<td class="desctt"><span class="tt">Adds four new types of arrows; explosive arrows, fire arrows, ice arrows, and a joke weapon, egg arrows.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Elemental Creepers-->
<tr>
	<td><a href="http://bit.ly/elementalcreepers-user">Elemental Creepers</a> (<a href="http://bit.ly/elementalcreepers-mod" title="This link only works for MCF Moderators, as the original link does not">MCF Moderator Link</a>)</td>
	<td class="desctt"><span class="tt">Adds creepers with different elements to the game.</span></td>
	<td>xSmallDeadGuyx</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Elemental Orbs-->
<tr>
	<td><a href="http://bit.ly/ZMwKMm">Elemental Orbs</a></td>
	<td class="desctt"><span class="tt">Allows you to use element-related orbs to do many things to the area around you.</span></td>
	<td>MaximumTechnology</td>
	<td>SSP</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Elemental Tinkerer-->
<tr>
	<td><a href="http://bit.ly/10tghAD">Elemental Tinkerer</a></td>
	<td class="desctt"><span class="tt">A mod that adds Elemental magic to the game. This is achieved through research and experimentation. Available in this mod are spells and fun items to play with.</span></td>
	<td>Vazkii</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Enchanting Plus-->
<tr>
	<td><a href="http://bit.ly/UvMdBK">Enchanting Plus</a></td>
	<td class="desctt"><span class="tt">Removes the randomness of enchanting, allowing you to choose what enchantments you want. Including enchantments added by other mods.</span></td>
	<td>mssodin28</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Endermen Don't Pick Up Blocks Mod-->
<tr>
	<td><a href="http://bit.ly/13vszGc">Endermen Don't Pick Up Blocks Mod</a></td>
	<td class="desctt"><span class="tt">Disables the Enderman's ability to pickup blocks as well as a few other small mods that modify enderman.</span></td>
	<td>Jeffrey6978</td>
	<td>SSP SMP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Ender Storage-->
<tr>
	<td><a href="http://bit.ly/UvpH6y">Ender Storage</a></td> 
	<td class="d desctt"><span class="tt"><center><big class="d">CodeChickenCore Required:</big><br/>See <i class="d">bit.ly/cb-core</i></center><br/>EnderStorage is a mod that offers a means to store your items in The END, causing them to be everywhere and nowhere at the same time.  All EnderStorage makes use of the magic of colors to link storage with its little piece of The END.  Any EnderStorage with the same color code share inventory (even across dimensions).  Currently there are two types of storage, EnderChest and EnderPouch.</span></td> 
	<td>chicken_bones</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Enhanced Portals-->
<tr>
	<td><a href="http://bit.ly/TGk9sM">Enhanced Portals</a></td>
	<td class="desctt"><span class="tt">Allows you to create any size or shape nether portal that you want. Unlike other mods, this mod has no limit on the size of the portal you want to create - as long as it's a valid portal (a frame of obsidian with nothing else in the way) - you're good to go.</span></td>
	<td>Alz454</td>
	<td>Universal</td>
	<td class="fc">Forge Required</td>
</tr>

<!--Extra Doors-->
<tr>
	<td><a href="http://bit.ly/XcIDOh">Extra Doors</a></td>
	<td class="desctt"><span class="tt">Adds cobblestone, stone, obsidian, gold, diamond, glass, stone brick,  cracked stone brick, quartz, nether brick, sandstone and smooth sandstone doors!</span></td>
	<td>Zolandre</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--ExtraneousCraft-->
<tr>
	<td><a href="http://bit.ly/105cRxN">ExtraneousCraft</a></td>
	<td class="desctt"><span class="tt">An Alien Tech mod that adds many cool machines and high-end stuff but with new physics and models.</span></td>
	<td>xxAKSxx</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------F-------------------------------------------------------->

<!--Familiars Mod-->
<tr>
	<td><a href="http://bit.ly/VNNZZT">Familiars Mod</a> (and API)</td>
	<td class="desctt"><span class="tt">Adds miniature mobs who float next to you at all times (if equipped), giving off small perks besides the obvious one of having a companion to accompany you on your adventures.</span></td>
	<td>pitman-87</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Fancy Glass-->
<tr>
	<td><a href="http://bit.ly/10b0Kzy">Fancy Glass</a></td>
	<td class="desctt"><span class="tt">Have you ever wanted to build something awesome out of glass, maybe a castle or a giant green house? Vanilla glass just not doing it for you? Fancy Glass adds craftable Glass Bricks in three different styles: Regular, Cracked, and Chiseled.</span></td>
	<td>Darkmainiac</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Finder Compass-->
<tr>
	<td><a href="http://bit.ly/ZhnTRT">Finder Compass</a></td> 
	<td class="desctt"><span class="tt">Makes your compass point to dungeons, strongholds, and diamonds if within a certain range of them.</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Flan's Mod-->
<tr>
	<td><a href="http://bit.ly/13aYRXO">Flan's Mod</a></td>
	<td class="desctt"><span class="tt">A combination of Planes, Vehicles and WW2Guns rewritten with a whole load of awesome new features and designed to allow easy custom content creation by anyone. Flan's mod alone is useless, it requires content packs in order to be of any use.</span></td>
	<td>jamioflan</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Flintlock Guns Mod-->
<tr>
	<td><a href="http://bit.ly/ZjQ6bZ">Flintlock Guns Mod</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Adds six new flintlock weapons: Pistol, Double-Barreled Pistol, Musket, Revolver, and Hand Cannon, and a makeshift stone pistol. Loading these flintlock weapons in real life is quite cumbersome, and this mod replicates that. To load a weapon, you must craft together an unloaded one, gunpowder, and your ammo. The multi-shot weapons can do this multiple times to become fully loaded. Also be aware, your gun may misfire, making a sad click and losing your ammo. Reload and try again.</span></td>
	<td>WillDaBeast509</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--FloatingRuins-->
<tr>
	<td><a href="http://bit.ly/TWHHIG">FloatingRuins</a></td> 
	<td class="ml desctt"><span class="tt"><center><big class="d rpa">ModLoader Option, bspkrsCore Required</big><br/><small class="d">This mod has separate ModLoader and Forge versions.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Floating islands taken from the ground with mini-ruins on top. The ruins' shape, material and mob spawners' choice of mobs are all biome-based.</span></td> 
	<td>bspkrs</td> 
	<td>Universal</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--Floodgate-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Floodgate</a></td> 
	<td class="desctt"><span class="tt">The Floodgate block can be used as either a floodgate, allowing toggleable water and lava falls, or as a trapdoor. When you place the floodgate control block, it will place a gate in front of the control block in the direction you are facing.</span></td> 
	<td>Risugami</td> 
	<td>SSP</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--Fly Mod-->
<tr>
	<td><a href="http://bit.ly/cjbmodsr">Fly Mod</a></td>
	<td class="desctt"><span class="tt">Lets you fly by a simple button press. (Default F Key). It is possible to change the fly speed. There is also a button that makes you run faster (Press/Hold Left-Shift Key by default). You can also enable to fly up/down by using the mouse (disabled by default).</span></td>
	<td>CJB</td>
	<td>SSP</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Forge-->
<tr>
	<td><a href="http://bit.ly/forge-dl">Forge</a> (API)</td> 
	<td class="desctt"><span class="tt">A powerful, open source API used to develop mods as well as maintain compatibility with other mods for minecraft.</span></td> 
	<td>LexManos</td> 
	<td>Universal</td> 
	<td class="fr">Forge Itself</td>
</tr>

<!----------------------------------------------------------G-------------------------------------------------------->

<!--Galacticraft-->
<tr>
	<td><a href="http://bit.ly/galacticraft">Galacticraft</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d rpa">Player API & Render Player API Required</big><br/>For Player API, see <i class="d">bit.ly/playerapi</i><br/>For Render Player API, see <i class="d">bit.ly/rplayerapi</i></center><br/>Lets you travel to new planets with your own spaceship.</span></td>
	<td>Micdoodle8</td>
	<td><b>Universal</b></td>
	<td class="fr">Forge Required</td>
</tr>

<!--Gems+-->
<tr>
	<td><a href="http://bit.ly/VFCpmA">Gems+</a></td>
	<td class="desctt"><span class="tt">Adds many gem ores, items, blocks, tools, weapons, armors, dusts, sands and glasses to the game.</span></td>
	<td>RobZ51</td>
	<td><b>Universal</b></td>
	<td class="fr">Forge Required</td>
</tr>

<!--Gravestone Mod-->
<tr>
	<td><a href="http://bit.ly/XSirsO">Gravestone Mod</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="bc d">ModLoader Mod, Player API Required</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For Player API, see <i class="d">bit.ly/playerapi</i></center><br/>Adds a gravestone and a cemetery to the game. Gravestone "spawns" after player's death. You can break it with a pickaxe and put it into another place only on "diggable" blocks: dirt, grass, mycelium, gravel, sand, soul sand and snow.</span></td>
	<td>NightKosh</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Gravity Gun-->
<tr>
	<td><a href="http://bit.ly/ichun-gravitygun">Gravity Gun</a></td> 
	<td class="d desctt"><span class="tt"><center><big class="d">iChun Util Required:</big><br/>See <i class="d">bit.ly/ichun-util</i></center><br/>Adds the Gravity Gun from Half Life 2 to Minecraft.</span></td> 
	<td>iChun</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Griefer Creepers-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Griefer Creepers</a></td> 
	<td class="desctt"><span class="tt"><u>WARNING:</u><br/>Backup your world before installing.<br/><br/>This mod changes how creepers attack. Instead of blowing itself up, It will disappear and launcher 100 arrows straight into the air, which will rain down on the landscape. These arrows will be 25% fire arrows, 75% explosive arrows.</span></td> 
	<td>Risugami</td> 
	<td>SSP</td> 
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------H-------------------------------------------------------->

<!--Health Bars-->
<tr>
	<td><a href="http://bit.ly/VuOduI">Health Bars</a></td>
	<td class="desctt"><span class="tt">Adds customizable health bars to mobs.</span></td>
	<td>FatherToast</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--HybridCraft-->
<tr>
	<td><a href="http://bit.ly/WdXKBQ">HybridCraft</a></td>
	<td class="desctt"><span class="tt">Adds hybrid ores and tools to the game.</span></td>
	<td>Geforce132</td>
	<td>SSP</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------I-------------------------------------------------------->

<!--iChun Util-->
<tr>
	<td><a href="http://bit.ly/ichun-util">iChun Util</a> (Dependency)</td>
	<td class="desctt"><span class="tt">As of Minecraft 1.5, this mod is required to be installed for iChun's "Gravity Gun", "Portal Gun", and "Trail Mix" mods to work</span></td>
	<td>iChun</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Infernal Mobs-->
<tr>
	<td><a href="http://bit.ly/as-infernalmobs">Infernal Mobs</a></td> 
	<td class="desctt"><span class="tt">This mod randomly imbues spawning Mobs in the World with Diablo-style random Enchantments, making them much harder and much more rewarding to kill. They also drop the quadruple amount of xp and a random enchanted item.</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--IngameInfo-->
<tr>
	<td><a href="http://bit.ly/TWHHIG">IngameInfo</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d bc"><u>ModLoader Mod, bspkrsCore Required</u></big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Want to know how much score you have without having to die? In need of real time information like weather, light level or your world size as you explore? Then this mod is for you!</span></td>
	<td>bspkrs</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Inventory Tweaks-->
<tr>
	<td><a href="http://bit.ly/k-invtweaks">Inventory Tweaks</a></td>
	<td class="desctt"><span class="tt">Allows you to easily manage your inventory, in both single player and multiplayer. It works out of the box, and will save you a massive amount of time!</span></td>
	<td>Kobata</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--IronChests 2-->
<tr>
	<td><a href="http://bit.ly/ironchests2">IronChests 2</a></td>
	<td class="desctt"><span class="tt">Adds chests made from different types of metal to the game. Each tier of metal chest can contain more items.</span></td>
	<td>cpw</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Item Frame Lag Fix-->
<tr>
	<td><a href="http://bit.ly/ZO6xMj">Item Frame Lag Fix</a></td>
	<td class="desctt"><span class="tt">Some people get major fps drops in areas with a lot of item frames.  This is a simple mod that changes how item frames are rendered depending on how far away you are.  This is really useful on servers that have economy / shop plugins that uses item frames. Works with Optifine as well.</span></td>
	<td>chrisk123999</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------J-------------------------------------------------------->

<!--Jammy Furniture Mod-->
<tr>
	<td><a href="http://bit.ly/RBQOQg">Jammy Furniture Mod</a></td>
	<td class="desctt"><span class="tt">Adds a large amount of decorative blocks, most of which are furniture. Each piece of furniture functions in its own way. You can sit in chairs, on couches, switch on lamps much more.</span></td>
	<td>Jammy780</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------K-------------------------------------------------------->

<!--KeepMyStats-->
<tr>
	<td><a href="http://bit.ly/ZPNPm4">KeepMyStats</a></td>
	<td class="desctt"><span class="tt">Keeps minecraft from resetting achievements when installing/uninstalling mods.</span></td>
	<td>Naruto1310</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--KenshiroMod-->
<tr>
	<td><a href="http://bit.ly/as-kenshiro">KenshiroMod</a></td> 
	<td class="desctt"><span class="tt">Unleashing rage only possible with bare chest and empty hands. Drains a lot of stamina / hunger. "For real men only."</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------L-------------------------------------------------------->

<!--Lava Monsters-->
<tr>
	<td><a href="http://bit.ly/VuOduI">Lava Monsters</a></td> 
	<td class="desctt"><span class="tt">If you've ever found yourself bored once you mine down to lava because it stops hostile mobs from spawning, then this is the mod for you! This is a small mod that adds a new hostile monster to the game that spawns in lava and spits fireballs at you.</span></td> 
	<td>FatherToast</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Lost Books-->
<tr>
	<td><a href="http://bit.ly/VuOduI">Lost Books</a></td>
	<td class="desctt"><span class="tt">Adds a chance for monsters to drop randomly books out of a set of books that anyone can create with ease! Books can even support randomized words for books similar to automatically generated Mad Libs!</span></td>
	<td>FatherToast</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------M-------------------------------------------------------->

<!--Magic Yarn-->
<tr>
	<td><a href="http://bit.ly/XlFeu1">Magic Yarn</a></td> 
	<td class="desctt"><span class="tt">Introduces a new Item to Minecraft; the Ball of Magic Yarn. It is crafted by surrounding a Compass with Wool (any kind).<br/><br/>The item serves as pathfinding tool and to keep track of your movements. In other words, you should never again get lost exploring the Nether or some complex cave system, and without leaving a ridiculous amount of Torches to mark your trail.<br/><br/><i>NOTE:<br/>In Multiplayer, you can't craft this Item. You use a button instead, by default "J". Button can be customized in auto-created file under mods/MagicYarn.txt</i></span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--MapWriter Minimap Mod-->
<tr>
	<td><a href="http://bit.ly/13duyig">MapWriter Minimap Mod</a></td>
	<td class="desctt"><span class="tt">A minimap mod that not only shows your surroundings, but everywhere you've been.</span></td>
	<td>mapwriter</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Millenaire-->
<tr>
	<td><a href="http://millenaire.org/">Millenaire</a></td>
	<td class="desctt"><span class="tt">This mod aims to fill the "emptyness" of Minecraft worlds by adding NPC villages to it, with loose 11th-century Norman, Japanese and Mayan themes and additional cultures planned.<br/><br/>Villages are populated with men, women and children of various kinds, who perform tasks such as trading with the player, expending current buildings or improving existing ones, cultivating crops such as wheat in Norman villages and rice in Indian ones, crafting tools and powerful amulets, etc. As the village expends, the number of villagers increases as couples have children who grow up into new adults.<br/><br/>Help villages grow by trading with them and be rewarded with unique items such as Normand and Indian food or statues and tapestries to decorate your house with. And if they start liking you enough, they might even build you a house of your own.</span></td>
	<td>Kinniken</td>
	<td>SSP SMP</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Minecraft Capes-->
<tr>
	<td><a href="http://bit.ly/XD3gCF">Minecraft Capes</a></td>
	<td class="desctt"><span class="tt">"Everybody wants a cape and now you can get one! Create an account in ten seconds and login, upload a cape image or choose one from the gallery! All you have to do now is copy one small changed file into your minecraft.jar file and then you can see it on your character!"</span></td>
	<td>cjz__</td>
	<td>SSP SMP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Minecraft Ideas Mod-->
<tr>
	<td><a href="http://bit.ly/ZFbTdL">Minecraft Ideas Mod</a></td>
	<td class="desctt"><span class="tt">A collaboration of ideas from many minds and meshed together into a single mod!</span></td>
	<td>coau14</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--MineVideo-->
<tr>
	<td><a href="http://bit.ly/108pAFT">MineVideo</a></td>
	<td class="desctt"><span class="tt">MineVideo is an attempt to solve problems such as bad video quality, huge files that have to be compressed afterwards, bad ingame performance, expensive, limited or complicated tools, and watermarks. It is a mod that enables you to record ingame footage with the touch of one button. It's as easy as taking a screenshot and the resulting video files are small enough to quickly upload them to YouTube.</span></td>
	<td>Kovu</td>
	<td>Clientside Mod
	<td class="fr">Forge Required</td>
</tr>

<!--Minions-->
<tr>
	<td><a href="http://bit.ly/as-minions">Minions</a></td> 
	<td class="desctt"><span class="tt">Allows you to summon minions that can (currently):<br/><ul><li>follow you around</li><li>be sent to places</li><li>chop down most any kind of trees, including Jungle giants</li><li>carry you, animals and other players</li><li>pickup and carry Items in their inventory</li><li>dig mineshafts complete with stairwell</li><li>dig out a custom sized space you define</li><li>mine ore veins you point out to them</li><li>intelligently strip mine where you tell them to</li><li>return their goods and loot to you</li><li>or to a chest you pointed out</li></ul></span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Minor Alchemy-->
<tr>
	<td><a href="http://bit.ly/ZJdluZ">Minor Alchemy</a></td>
	<td class="desctt"><span class="tt">Alchemy in its rawest form; take matter and make matter. It works for both Clients and Servers. Please know that server owners can change the universal CV lists, so if an item has a different CV on the server than your client or it doesn't have one when it usually does, this is probably why.</span></td>
	<td>Guff</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Mob Filter Mod-->
<tr>
	<td><a href="http://bit.ly/cjbmodsr">Mob Filter Mod</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">CJB API Required</big><br/>See <i class="d">bit.ly/cjb-api</i></center><br/>Lets you choose mobs to keep the game from spawning.</span></td>
	<td>CJB</td>
	<td><b>SSP</b></td>
	<td class="fr">Forge Required</td>
</tr>

<!--ModLoader-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">ModLoader</a> (API)</td>
	<td class="desctt"><span class="tt">API<br/><br/>A mod, kind of like a mod manager, that stops conflicts with mods that alter rendering, recipes, add entities, gui, smeltables or fuel.<br/><br/><i>NOTE: Do not install this with Forge. Forge has its own version of ModLoader that is backwards compatible with most ModLoader mods.</i></span></td> 
	<td>Risugami</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--More Info Mod-->
<tr>
	<td><a href="http://bit.ly/cjbmodsr">More Info Mod</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">CJB API Required</big><br/>See <i class="d">bit.ly/cjb-api</i></center><br/>Adds a lot more information to your screen. The information you want to see is easily configurable. Just press the I key to open the MoreInfo Options menu, here you can turn on or off the information you want to see. It's also possible to change in which corner the information must be shown.</span></td>
	<td>CJB</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--More Stackables-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">More Stackables</a></td>
	<td class="desctt"><span class="tt">Makes saddles, doors, and signs up to 8 in a stack, minecarts and boats up to 4 in a stack.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--More Village Biomes + Village Logic Addon-->
<tr>
	<td><a href="http://bit.ly/SfwZji">More Village Biomes + Village Logic Addon</a></td>
	<td class="desctt"><span class="tt">With the recent zombie infiltration the villagers have decided to expand into new territories, including biomes such as Forest, Extreme Hills, Jungle, Taiga, Swamp, and Ice Plains on top of the standard Plains and Desert.</span></td>
	<td>shortwind</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--More XP Mod-->
<tr>
	<td><a href="http://bit.ly/13dy8Jt">More XP Mod</a></td>
	<td class="desctt"><span class="tt">Multiplies experience on pick-up. Helpful for those who dislike wasting tons of levels for little to no reason.</span></td>
	<td>dr_frost_dk</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Move Plus-->
<tr>
	<td><a href="http://bit.ly/moveplus">Move Plus</a></td>
	<td class="desctt"><span class="tt">Extends movement in with features such as double jumping, wall jumping, dodging, and persistent running.</span></td>
	<td>Corosus</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Multi Mine-->
<tr>
	<td><a href="http://bit.ly/as-multimine">Multi Mine</a></td> 
	<td class="desctt"><span class="tt">Makes it so you don't have to point nonstop on a Block, never letting go of the mouse button, to finish it off. You can start mining, pause, walk away, mine another block, come back and finish off the one you started previously.</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Mystic Mod-->
<tr>
	<td><a href="http://bit.ly/16RPIWd">Mystic Mod</a></td>
	<td class="desctt"><span class="tt">There are 3 different Mystic mods. Each are optional, but installing all of them will deliver the full experience.<br/><br/>Mystic Ores adds 4 nether ores and 7 overworld ores as well as 1 blastproof glass block into the game, some of which can be used to create some quite impressive tools!<br/><br/>Mystic Ruins adds 2 new structures, some overworld ruins which can contain treasure chests, as well as massive underground dungeons that also double as mazes, as you can quite easily get lost in them!<br/><br/>Mystic Stones adds 7 new stones to the game, as well as planks, bricks, and cobbled versions of each. It also adds reinforced bricks, a compatibility pack for Mystic Ores, which allows you to compress your gems/ingots from Mystic Ores into blocks, which double as beacon bases (currently bugged, fixing right now) and are blastproof. They cannot be uncrafted.</span></td>
	<td>oitsjustjose</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------N-------------------------------------------------------->

<!--No Fire Spread-->
<tr>
	<td><a href="http://bit.ly/V1qVZv">No Fire Spread</a></td>
	<td class="desctt"><span class="tt">Prevents fire from spreading.</span></td>
	<td>soccerguy3</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--No Ice Melt-->
<tr>
	<td><a href="http://bit.ly/V1qVZv">No Ice Melt</a></td>
	<td class="desctt"><span class="tt">Prevents ice from melting.</span></td>
	<td>soccerguy3</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--No Slimes in Superflat-->
<tr>
	<td><a href="http://bit.ly/Ty9cf2">No Slimes in Superflat</a></td>
	<td class="desctt"><span class="tt">Removes slimes in superflat worlds.</span></td>
	<td>MamiyaOtaru</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--NoSnow Mod-->
<tr>
	<td><a href="http://bit.ly/1364GZq">NoSnow Mod</a></td>
	<td class="desctt"><span class="tt">Changes the properties of the snowy biomes in Minecraft, raising their ambient temperatures and essentially warming them up so that snow and ice cannot form at all. It then switches off the biomes' toggles for  snowfall - because having snowfall without any snow is just lame. The result is biomes that have no snow, no ice, and when it rains, it pours - no snowflakes, no snow build-up.</span></td>
	<td>Sopwith</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Not Enough Items (NEI)-->
<tr>
	<td><a href="http://bit.ly/UvpH6y">Not Enough Items (NEI)</a></td> 
	<td class="d desctt"><span class="tt"><center><big class="d">CodeChickenCore Required:</big><br/>See <i class="d">bit.ly/cb-core</i></center><br/>NEI is a successor to both Too Many Items and Recipe Book. It arose around the same time as Craft Guide when Alexandria and a few others on the IRC suggested that I merge both Too Many Items and Recipe Book to remove their greatest flaws, ironically too many items, or in the case of recipe book, too many recipies. Too Many Items was great, but the one thing it lacked was an easy way to search and sort your items. When you had a mod like Red Power coming along with 10000 items both TMI and Recipe Book were racking up the pages.  Even if you don't want to use NEI for cheating in items, you will likely feel right at home with the Recipe component of the mod.</span></td> 
	<td>chicken_bones</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--No Voidfog-->
<tr>
	<td><a href="http://bit.ly/Ty9cf2">No Voidfog</a> (or Dimming)</td>
	<td class="desctt"><span class="tt">Removes the void fog and dimming when getting nearer to bedrock level.</span></td>
	<td>MamiyaOtaru</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------O-------------------------------------------------------->

<!--Old North / Retro Sun Direction-->
<tr>
	<td><a href="http://bit.ly/Ty9cf2">Old North / Retro Sun Direction</a></td>
	<td class="desctt"><span class="tt">Makes the sun travel from north to south, to match the direction it went in Minecraft Beta.  With this mod, clouds go "north" and the sun goes "west", just like it used to.</span></td>
	<td>MamiyaOtaru</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Optifine-->
<tr>
	<td><a href="http://bit.ly/VFKJCV">Optifine</a></td>
	<td class="desctt"><span class="tt">Adds advanced graphical settings to the video options menu as well as grants the ability to easily use high-definition texture packs. Also boosts your FPS. (The update to 1.5 is still very much in progress.)</span></td>
	<td>sp614x</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------P-------------------------------------------------------->

<!--Pet Bat-->
<tr>
	<td><a href="http://bit.ly/as-petbats">Pet Bat</a></td> 
	<td class="desctt"><span class="tt">Lets you tame and level-up bats, which will fight for you.</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Player API-->
<tr>
	<td><a href="http://bit.ly/WnR9CL">Player API</a></td>
	<td class="desctt"><span class="tt">Render Player API gives third party mods managed access to the player render classes.</span></td>
	<td>Divisor</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Player Heads-->
<tr>
	<td><a href="http://bit.ly/VuOduI">Player Heads</a></td>
	<td class="desctt"><span class="tt">Adds the ability for players to drop their own heads.</span></td>
	<td>FatherToast</td>
	<td>Serverside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--PortalGun-->
<tr>
	<td><a href="http://bit.ly/14dknZW">PortalGun</a></td> 
	<td class="d desctt"><span class="tt"><center><big class="d">iChun Util Required:</big><br/>See <i class="d">bit.ly/ichun-util</i></center><br/>Lets you think with portals. In Minecraft.</span></td> 
	<td>iChun</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--ProSthetics-->
<tr>
	<td><a href="http://bit.ly/YVcpnT">ProSthetics</a></td>
	<td class="desctt"><span class="tt">Adds a process of casting different metals and materials into new, better materials.</span></td>
	<td>Guff</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------Q-------------------------------------------------------->

<!--QuickCraft Mod-->
<tr>
	<td><a href="http://bit.ly/cjbmodsr">QuickCraft Mod</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">CJB API Required</big><br/>See <i class="d">bit.ly/cjb-api</i></center><br/>"This mod shows a somewhat XBOX 360 like GUI of crafting. Just with a few clicks you can craft a lot of items. Hover your mouse over the item you want to craft and it will show you the recipe and which items you still require and which items will be used from your inventory. You can also click one of the items in your inventory, this will show you all the recipes which requires that item. There are also 2 buttons, one to switch back to classic crafting and one to toggle to show only the recipes you can craft with the items you have in your inventory. It both works with SSP and SMP and even supports custom items."</span></td>
	<td>CJB</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------R-------------------------------------------------------->

<!--RadarBro-->
<tr>
	<td><a href="http://bit.ly/117W9Dg">RadarBro</a></td>
	<td class="desctt"><span class="tt">RadarBro gives you comfort by letting you know where nearby enemies and mobs are, as well as other entities.</span></td>
	<td>Cali Alec</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Rancraft Penguins-->
<tr>
	<td><a href="http://bit.ly/Wdr4Nt">Rancraft Penguins</a></td> 
	<td class="desctt"><span class="tt">Adds twelve different species of penguins to your world.</span></td> 
	<td>immediately</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--RecallStoneTMD-->
<tr>
	<td><a href="http://bit.ly/Yj7bD5">RecallStoneTMD</a></td>
	<td class="desctt"><span class="tt">This handy item will immediately teleport you from your current location to your spawn point.  The only place that it does not work is in the End.  Other than that, no matter where you are it should teleport you straight home.</span></td>
	<td>TheMaineDragon</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Recipe Book-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Recipe Book</a></td> 
	<td class="desctt"><span class="tt">This item, when used, opens up a GUI of every recipe that can be done. The items can not be touched, but you can read the tool tips. Left click moves to next recipe. Right click moves to previous recipe.</span></td> 
	<td>Risugami</td> 
	<td>SSP</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--Rei's Minimap-->
<tr>
	<td><a href="http://bit.ly/ZwYx5P">Rei's Minimap</a></td>
	<td class="desctt"><span class="tt">Features:
		<ul>
			<li>Fast processing</li>
			<li>Beautiful map rendering:</li>
				<ul>
					<li>Expression of semitransparent blocks</li>
					<li>Bump-map expression of height</li>
					<li>Expression of dynamically changing lighting</li>
					<li>Automatically generate the block colors from your texturepack</li>
					<li>Biome color</li>
				</ul>
			<li>Entities radar</li>
			<li>Cave mapping</li>
			<li>Waypoints (Can not teleport)</li>
			<li>Ingame keyconfig</li>
			<li>ZanMinimap frame appearance</li>
			<li>Indication of slime spawning chunks</li>
		</ul></span></td>
	<td>ReiFNSK</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Render Player API-->
<tr>
	<td><a href="http://bit.ly/13U9b8y">Render Player API</a></td>
	<td class="desctt"><span class="tt">Render Player API gives third party mods managed access to the player render classes</span></td>
	<td>Divisor</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Retro Fences-->
<tr>
	<td><a href="http://bit.ly/Ty9cf2">Retro Fences</a></td>
	<td class="desctt"><span class="tt">Makes fences behave how they used to by making them connect only to themselves, and not other blocks.</span></td>
	<td>MamiyaOtaru</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Ropes+-->
<tr>
	<td><a href="http://bit.ly/as-ropesplus">Ropes+</a></td> 
	<td class="desctt"><span class="tt">A merged and enhanced version of 303's "Elemental Arrows", SDK's "Grappling Hook", and DJRoslin's "Rope".</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--RPG Inventory Mod-->
<tr>
	<td><a href="http://bit.ly/YZGpPk">RPG Inventory Mod</a></td>
	<td class="desctt"><span class="tt">Adds an RPG like inventory that allows you to equip further equipment including: Amulets, Shields, Capes, Gloves, and 2 slots for rings.</span></td>
	<td>senpaisubaraki</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Ruins-->
<tr>
	<td><a href="http://bit.ly/as-ruins">Ruins</a></td> 
	<td class="desctt"><span class="tt">Spawns structures in your Minecraft worlds upon generation, similar to Villages or Strongholds. Every structure is defines by a template and configured to spawn under specific conditions, and all of that can be changed by you!</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------S-------------------------------------------------------->

<!--Shelf-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Shelf</a></td>
	<td class="desctt"><span class="tt">Ever wanted to store your items in a way you can see them? Here you go. This block allows you to add up to 9 items to it and the items you put in are shown in the world.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Sign Tags-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Sign Tags</a></td> 
	<td class="desctt"><span class="tt">Adds tags with functions to signs. Function List:
		<ul>
			<li>[time] shows current time</li>
			<li>[x], [y], or [z] finds the current position</li>
			<li>[a|b] is redstone tetection; a for powered, b for unpowered</li>
			<li>[light] shows current light level</li>
			<li>[biome] tells which biome you're in</li>
			<li>[temp] tells the temperature of that area</li>
			<li>[humid] tells the humidity of that area</li>
				<ul>
					<li>([temp], [humid] will no longer function in Nether.)</li>
				</ul>
		</ul></span></td> 
	<td>Risugami</td> 
	<td>SSP</td> 
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Simply Hax-->
<tr>
	<td><a href="http://bit.ly/as-simplyhax">Simply Hax</a></td> 
	<td class="desctt"><span class="tt">Simply Hax are plain cheating/utility modifications, which, unlike pretty much all other cheat mods, should not interfere with notch classes. Thus, they should be compatible with anything that isn't another cheat mod doing the same thing.</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Smart Spawn Mod-->
<tr>
	<td><a href="http://bit.ly/118DNyU">Smart Spawn Mod</a></td>
	<td class="desctt"><span class="tt">Protects the player from spawning in dangerous places as will as eliminating the random spawn feature to make it easier to play some custom maps, especially platform based maps like SkyBlock.</span></td>
	<td>HeshamMeneisi</td>
	<td>SSP LAN</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Spawner GUI-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Spawner GUI</a></td> 
	<td class="desctt"><span class="tt">Adds a GUI to all mob spawners that will allow you to pick what mob to spawn. Also allows mining/harvesting spawners. You may also disable the spawners with a redstone signal.</span></td> 
	<td>Risugami</td> 
	<td>SSP</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--Special Mobs-->
<tr>
	<td><a href="http://bit.ly/VuOduI">Special Mobs</a></td> 
	<td class="desctt"><span class="tt">Have you ever felt that your Minecraft monsters lacked variety? Randomized textures not enough? Well, here's a the solution! Introducing: the Special Mobs mod! In short, this small mod introduces variants to your default Minecraft mods, such as creepers with fiery explosions, skeletons that shoot poisoned arrows, and zombies that leap at you. Not only that, but it allows you adjust all vanilla spawn rates and even make jockeys more common!</span></td> 
	<td>FatherToast</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Stalker Creepers-->
<tr>
	<td><a href="http://bit.ly/as-stalkercreepers">Stalker Creepers</a></td> 
	<td class="desctt"><span class="tt">Makes creepers stalk you, blowing up only when you look.</span></td> 
	<td>AtomicStryker</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--StartingInventory-->
<tr>
	<td><a href="http://bit.ly/TWHHIG">StartingInventory</a></td> 
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>This mod gives you items and blocks each time you start a new world, just by editing a .txt file.</span></td> 
	<td>bspkrs</td> 
	<td>SSP</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--StatusEffectHUD-->
<tr>
	<td><a href="http://bit.ly/WmtGCf">StatusEffectHUD</a></td> 
	<td class="ml desctt"><span class="tt"><center><big class="d bc"><u>ModLoader Mod, bspkrsCore Required</u></big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Displays your currently active potions/effects without having to open your inventory!</span></td> 
	<td>bspkrs</td> 
	<td>Clientside Mod</td> 
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------T-------------------------------------------------------->

<!--TabbyChat-->
<tr>
	<td><a href="http://bit.ly/SfA5UA">TabbyChat</a></td>
	<td class="desctt"><span class="tt">Adds handy functionality to the Chat feature in minecraft. More particularly, it adds tabs.</span></td>
	<td>RocketMan10404</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Tale of Kingdoms-->
<tr>
	<td><a href="http://bit.ly/117XVnJ">Tale of Kingdoms</a></td>
	<td class="desctt"><span class="tt">An adventure RPG mod where you prove your worth as a King, fight evil and eventually raise your own Kingdom. The mod currently includes the starting guild, where you must prove to the Guild Master that you are worthy of ruling your Kingdom, as well as several different NPC, friendly, neutral and aggressive.</span></td>
	<td>aginsun</td>
	<td>SSP</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Team Fortress 2 Mods-->
<tr>
	<td><a href="http://bit.ly/TGsYTm">Team Fortress 2 Mods</a></td>
	<td class="desctt"><span class="tt">Includes four mods containing Team Fortress 2 themed content, including teleporters, sentries, dispensers, and a team addon.</span></td>
	<td>pitman-87</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Telicraft-->
<tr>
	<td><a href="http://bit.ly/YzTP2o">Telicraft</a></td>
	<td class="desctt"><span class="tt">Adds a new ore, a bunch of crazy things that almost everybody can enjoy, new tools, new machines, a new Crafting Table, a new flower, new kinds of Netherrack and End Stone and much more!</span></td>
	<td>Telinc1</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--The Barrels Mod-->
<tr>
	<td><a href="http://bit.ly/15eDKSH">The Barrels Mod</a></td>
	<td class="desctt"><span class="tt">Adds three blocks into the game; barrels! The three types of barrels all function similarly. Barrels are used to store item just like you would with a chest, but vastly more items then what you can fit in a chest. Unfortunately, there is a limiting factor like everything: they can only store one item at a time.</span></td>
	<td>Need4Poop402</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--The Camping Mod-->
<tr>
	<td><a href="http://bit.ly/11Nx5yR">The Camping Mod</a></td>
	<td class="desctt"><span class="tt">Adds many items to the game themed towards camping.</span></td>
	<td>__Rilmuld__</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--The Invether-->
<tr>
	<td><a href="http://bit.ly/XzCiqP">The Invether</a></td>
	<td class="desctt"><span class="tt">A new dimension that is set to make a completly reversed Nether. Instead of wide, open spaces prepare to be crammed into tiny, dark caves. Instead of pools of lava on the floor watch out for the ice cold frozen magma - it'll burn you to death!</span></td>
	<td>Ghetsis</td>
	<td>SSP</td>
	<td class="fr">Forge Required</td>
</tr>

<!--The Mists of RioV-->
<tr>
	<td><a href="http://bit.ly/10qPe6k">The Mists of RioV</a></td>
	<td class="desctt"><span class="tt">"The imagined world is called RioV, in the year of 1301 DoC (Death of Carigon.), the land of RioV is filled with Nizonians. A native creature that are basically giant beasts. In 1278 DoC the Natives found a new threat across the land called Granitions, another wild beast. For 10 years they fought and the Nirons arrived dealing poison to all races when fought with. Since then, the races have been weakened and new races have arrived, such as we humans. There is a myth that in 1310 a monster called a Huton will destroy the land of RioV and leave it in ashes. This is The Mists of RioV."</span></td>
	<td>sheenrox82</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--The Ocarina Mod-->
<tr>
	<td><a href="http://bit.ly/UArYTu">The Ocarina Mod</a></td>
	<td class="desctt"><span class="tt">Adds a fully-functioning Ocarina straight from The Legend of Zelda: Ocarina of Time and Majora's Mask into Minecraft! The Ocarina functions just like it does in The Legend of Zelda. You can now learn songs that effect gameplay! Future updates will include more songs and functions!</span></td>
	<td>Boba_Fett_Link</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--The Runic Dust Mod-->
<tr>
	<td><a href="http://bit.ly/VmqTz2">The Runic Dust Mod</a></td>
	<td class="desctt"><span class="tt">Allows you to draw runes on the ground physically and outside the crafting gui. Depending on what pattern you draw and what you give as a sacrifice, something magical will happen.</span></td>
	<td>billythegoat101</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--The Wars Mod-->
<tr>
	<td><a href="http://bit.ly/13dBw7b">The Wars Mod</a></td>
	<td class="desctt"><span class="tt">Adds a massive array of structures. From Spleef to hunger games! As well as special blocks, a new ore and a class system.</span></td>
	<td>resinresin</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Tinkers' Construct-->
<tr>
	<td><a href="http://bit.ly/Z7xU26">Tinkers' Construct</a></td>
	<td class="desctt"><span class="tt">A mod about putting tools together in a wide variety of ways, then modifying them until they turn into something else. The tools never disappear and can be named and changed to your heart's desire. Once you make them, they're yours forever.</span></td>
	<td>mDiyo</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--TooManyItems-->
<tr>
	<td><a href="http://bit.ly/toomanyitems">TooManyItems</a></td>
	<td class="desctt"><span class="tt">Create and enchant items in-game, including mod items. Save and load entire inventories. Create unlimited stacks and tools. Switch game modes, test mods, create huge survival worlds, and more. Updated quickly!</span></td>
	<td>Marglyph</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Torojima's Chococraft-->
<tr>
	<td><a href="http://bit.ly/108xUFw">Torojima's Chococraft</a></td>
	<td class="desctt"><span class="tt">Adds a mob called Chocobo to the game. This includes different coloured mob types with different attributes in their grown-up and juvenile form.</span></td>
	<td>Torojima</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Trail Mix-->
<tr>
	<td><a href="http://bit.ly/YOigbZ">Trail Mix</a></td> 
	<td class="d desctt"><span class="tt"><center><big class="d">iChun Util Required:</big><br/>See <i class="d">bit.ly/ichun-util</i></center><br/>
<!--Start-->	Adds a single food item called "trail mix". This food item does plenty of crazy things when eaten.
	<br/><br/>
	<ul>
		<li><u>It grants you:</u></li>
			<ul>
				<li>Super Punch (with comic explosion effects!)</li>
				<li>Super Speed (even without sprinting!)</li>
				<li>Dispense Fireballs with Middle mouse in an empty hand, once you've eaten enough! (Shooting beneath you "rocket jumps" you up!)</li>
				<li>Fall Dampening (with *poof* effect!)</li>
			</ul>
	</ul>
	<br/>
	Only someone like you would eat it... But wait! Perhaps the critters would like them too? Unfortunately, all the animals turn their heads at trail mix... all but the pig! Give the pig some trail mix and watch what happens!
	<br/>
	<ul>
		<li><u>It grants pigs:</u></li>
			<ul>
				<li>High Pressure Flatulence (pressure so high, you'll fly!)</li>
				<li>Explosive Collision Nature (watch where you leave 'em pigs!)</li>
				<li>Excessive Headbanging</li>
			</ul>
<!--End-->		</ul>
	</span></td> 
	<td>iChun</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--TreeCapitator-->
<tr>
	<td><a href="http://bit.ly/TWHHIG">TreeCapitator</a></td> 
	<td class="ml desctt"><span class="tt"><center><big class="d rpa">ModLoader Option, bspkrsCore Required</big><br/><small class="d">This mod has separate ModLoader and Forge versions.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Allows you to chop down an entire tree (leaves and all) by harvesting one of its logs. Forge version automatically detects logs/axes from many mods so that they work as well. Now damages axe per log chopped, unless configured otherwise. Highly configurable.</span></td> 
	<td>bspkrs</td> 
	<td>Universal</td> 
	<td class="fc">Forge Compatible</td>
</tr>

<!--tukmc-->
<tr>
	<td><a href="http://bit.ly/XUn0Mp">tukmc</a></td> 
	<td class="desctt"><span class="tt">A slick HUD mod that is inspired by the World of Warcraft addon, tukui.</span></td> 
	<td>maxpowa</td> 
	<td>Clientside Mod</td> 
	<td class="fr">Forge Required</td>
</tr>

<!--Twilight Forest-->
<tr>
	<td><a href="http://bit.ly/URaBel">Twilight Forest</a></td>
	<td class="desctt"><span class="tt">Imagine stepping through a portal into a twilight realm, filled with trees as far as they eye can see.  Breathtaking vistas and amazing discoveries await you around every corner.  But beware!  Not all denizens of the forest respond to your intrusion lightly.</span></td>
	<td>Benimatic</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--TwitchTV IRC Mod-->
<tr>
	<td><a href="http://bit.ly/11NuLYu">TwitchTV IRC Mod</a></td>
	<td class="desctt"><span class="tt">Allows you to login into the TwitchTV and go into any channel and read chat!</span></td>
	<td>xIGBClutchIx</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------U-------------------------------------------------------->

<!--Utility Mobs-->
<tr>
	<td><a href="http://bit.ly/VuOduI">Utility Mobs</a></td> 
	<td class="desctt"><span class="tt">Got a mod that makes monsters attack your base? Ever feel a bit spread thin trying to defend all 360 degrees, one degree at a time? Here's the solution: Utility Mobs! This mod adds additional golems built in the same fashion as vanilla golems, plus turrets, together forming the base of a good defense! Turrets and even certain golems can be upgraded to improve their effectiveness!</span></td> 
	<td>FatherToast</td> 
	<td>Universal</td> 
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------V-------------------------------------------------------->

<!--Village Info-->
<tr>
	<td><a href="http://bit.ly/TGtW1L">Village Info</a></td>
	<td class="desctt"><span class="tt">Shows some information about the village you're currently in.</span></td>
	<td>trunkz</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--VoxelMap (Zan's)-->
<tr>
	<td><a href="http://bit.ly/Ty9cf2">VoxelMap</a> (Zan's)</td>
	<td class="desctt"><span class="tt">A feature-packed minimap with many customizations.</span></td>
	<td>MamiyaOtaru</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------W-------------------------------------------------------->

<!--Weather & Tornadoes-->
<tr>
	<td><a href="http://bit.ly/15XagLv">Weather & Tornadoes</a></td>
	<td class="desctt"><span class="tt">Wind system that brings the world to life with particles for leafs, waterfalls, waves on water and more!</span></td>
	<td>Corosus</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--WebChat-->
<tr>
	<td><a href="http://bit.ly/UvEU7P">WebChat</a></td>
	<td class="desctt"><span class="tt">Prevents the chat from being displayed ingame. Instead, it will redirect it to your browser. The whole thing is controlled by regular expressions.</span></td>
	<td>bannedtom</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--WorldStateCheckpoints-->
<tr>
	<td><a href="http://bit.ly/VNYhcp">WorldStateCheckpoints</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d bc">ModLoader Mod, bspkrsCore Required</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Gives you a way to take snapshots of your singleplayer worlds!</span></td>
	<td>bspkrs</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------X-------------------------------------------------------->

<!--X-Ray Mod-->
<tr>
	<td><a href="http://bit.ly/cjbmodsr">X-Ray Mod</a> (CJB)</td>
	<td class="d desctt"><span class="tt"><center><big class="d">CJB API Required</big><br/>See <i class="d">bit.ly/cjb-api</i></center><br/>This mod will show you all the blocks you want in the world. Simply head over to the CJB Option menu and  there you can you can mark the blocks red which you don't wanna see. Press the X-Ray key and voila you now will see all the blocks you want. There is also a Cave and nightvision option for you to use.</span></td>
	<td>CJB</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--X-Ray Mod (craftminer502)-->
<tr>
	<td><a href="http://bit.ly/VxkL27">X-Ray Mod</a> (craftminer502)</td>
	<td class="desctt"><span class="tt">Adds the ability to see through blocks so you may quickly find materials you're looking for.</span></td>
	<td>craftminer502</td>
	<td>N/A</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Xy's Done Fix-->
<tr>
	<td><a href="http://bit.ly/XA5z9y">Xy's Done Fix</a></td>
	<td class="desctt"><span class="tt">Moves the "Done" button to the top of your Controls screen to prevent overlapping with other buttons.</span></td>
	<td>The_xy</td>
	<td>Clientside Mod</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>


<!----------------------------------------------------------Y-------------------------------------------------------->

<!----------------------------------------------------------Z-------------------------------------------------------->

<!--Zombie Awareness-->
<tr>
	<td><a href="http://bit.ly/15X8ZnI">Zombie Awareness</a></td>
	<td class="desctt"><span class="tt">Smarter more aware zombies (and skeletons), they track you down via blood scent, sound, and light source awareness, config lets you pick and choose what features to have.</span></td>
	<td>Corosus</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--ZombieCraft-->
<tr>
	<td><a href="http://bit.ly/ZQQZrl">ZombieCraft</a> (Beta)</td>
	<td class="desctt"><span class="tt">A complete remake of ZombieCraft Classic. Taken to a whole new level, with proper multiplayer and map making support from the start. Currently in its 3rd beta, very stable and polished.<br/><br/>Features:
		<ul>
			<li>Waves of zombie hordes that progress in numbers, health, and speed</li>
			<li>15 Weapons and items to battle off the zombies</li>
			<li>Improved AI Comrade perk to help watch your back, can be given any weapon</li>
			<li>Speed Cola, Juggernog, Charge and ExStatic perk machines</li>
			<li>5 maps so far: Nacht, Last Resort, Observation Deck, Verruckt, and a more open map called Invasion</li>
			<li>Built-in Single/Multiplayer map making support</li>
		</ul>
	</span></td>
	<td>Corosus</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

</tbody>


</table>

</center><br/>

<div class="footer">
	Mod count: <b>151</b>
</div>

<!--Google Analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39433845-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>