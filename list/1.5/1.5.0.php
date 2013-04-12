<!doctype html>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	
	<title>MCF Mod List - 1.5.0</title>
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../resources/js/tableSearch.js">/*Search script courtesy of Vattic*/</script>
	
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/modlist.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/nav.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/common.css" media="screen" />
	
</head>
  
<body>
	<center>
		<p>
			<img src="../../resources/images/1.5.0.png" width="128" height="58"/><br/>
			<span style="font-size:200%">Last Updated: <?php $content = file('changelog_1.5.0.txt'); echo $content[0]; ?></span><br/><a href="changelog_1.5.0.txt" class="ns">Click here</a> to view the changelog.
		</p>
		
		<ul id="list-nav">
			<li><a href="/">Home</a></li>
			<li><a href="/credits/">Credits</a></li>
			<li><a href="/latest/">Current List</a></li>
			<li><a href="/banners/">Banners</a></li>
			
			<![if !IE]>
				<br/><li class="nh"><a href="/resources/igml2/" class="igml">Ingame Mod List</a></li>
			<![endif]>
			
			<!--[if IE]>
				<li><a href="/resources/igml2/">Ingame Mod List</a></li>
			<![endif]-->
		</ul>
				
	<br/><hr width="99%" size="6" noshade>
		
	<p class="padded">If you know of a mod that's not on this list, please let us know. There are three ways to inform us of new mods. If you have an account on the Minecraft Forums, leave a post in the suggestion thread <a href="http://bit.ly/13fsFlm" class="ns" title="The original Minecraft Forums post for the mod list">here</a>, or drop by the <span style="color: #0481ff">#mcf_modlist</span> IRC channel on <span style="color: purple">EsperNet</span>. If you wish to remain anonymous, you may use the submission form <a href="/list/submit/">here</a>. Please check to see if the mod is on the list already before suggesting.<br/><br/>If there's an icon in the "Info" column, hover over it to read the description for that mod.</p>
	
	<table class="listnav nav major">
		<thead>
			<th colspan="2" style="color: black">List Version Navigation</th>
		</thead>
		
		<tbody>
			<tr class="c">
				<!-- <td class="nh"><a href="../1.3/">1.3</a></td>-->
				<td class="nh" onclick="window.location.href='../1.4/'"><a href="../1.4/">1.4</a></td>
				<td class="h">1.5</td>
			</tr>
		</tbody>
	</table>
	
	<table class="minor listnav nav">
		<tr>
			<td class="h">1.5.0</td>
			<td class="nh" onclick="window.location.href='1.5.1.php'"><a href="1.5.1.php">1.5.1</a></td>
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

<!--Aliens Vs Predator-->
<tr>
	<td><a href="http://bit.ly/YaUXfI">Aliens Vs Predator</a></td>
	<td class="desctt"><span class="tt">Adds new mobs, aesthetics, weapons, and challenge to the game.</span></td>
	<td>Ri5ux</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

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
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>This block will give you a place to show off your armor. Just place the block and right click on the platform. You can choose from a selection of skins to hold your armor, as well as have it stare at you, constantly. You may also change the texture of platform by putting block in the last slot.</span></td>
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

<!--Atomic Science-->
<tr>
	<td><a href="http://bit.ly/WTdY8p">Atomic Science</a></td>
	<td class="desctt"><span class="tt">Atomic Science brings you the best fission and fusion reactors as well as the one and only atomic particle accelerator.</span></td>
	<td>Calclavia</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--AudioMod (API)-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">AudioMod</a> (API)</td>
	<td class="desctt"><span class="tt">AudioMod is an upgrade of sorts, and a modder's utility. Included in this mod is CodecIBXM, created by Paul at www.paulscode.com, who is the creator of the sound system used in Minecraft. It allows Minecraft to play (in addition to ogg, wav, and mus files), xm, s3m, and mod files. The only readily available feature of this mod is the ability to add new music, however, it adds support for modders to add new records and sound effects.<br/><br/><i class="w">NOTE: Do not install this with Forge. Forge has its own version that's backwards compatible with Risugami's.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Audiotori-->
<tr>
	<td><a href="http://bit.ly/Ty8izp">Audiotori</a></td>
	<td class="desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/> Audiotori is a cascading sound pack manager. It allows you to use multiple sound packs at once to replace the default Minecraft sounds, or replace sounds added by other mods.</span></td>
	<td>Hurricaaane</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Auto Farmer-->
<tr>
	<td><a href="http://bit.ly/ZOUv3Q">Auto Farmer</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Automatically harvests fully matured plants as well as automatically plant seeds.</span></td>
	<td>Corosus</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--AutoSwitch-->
<tr>
	<td><a href="http://bit.ly/108x1gj">AutoSwitch</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Option</big><br/><small class="d">This mod has separate ModLoader and Forge versions.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>A highly-configurable, advanced mod that automatically switches to the correct tool when mining a block and automatically uses the correct weapon when attacking a mob or a player. It will also switch back to your previous item when you are done mining or attacking a mob, useful for building and going on mining trips.</span></td>
	<td>thebombzen</td>
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

<!--BatsDropLeather-->
<tr>
	<td><a href="http://bit.ly/117U1v2">BatsDropLeather</a></td>
	<td class="desctt"><span class="tt">When you kill a bat it has a chance of dropping 0 � 3 pieces of leather during the daytime. If you kill a bat during the night it's yield may improve since bats are nocturnal creatures. Sometimes they may even drop other kinds of seeds! You can also feed them seeds to breed them. I felt like bats were kind of useless at this point as they don't drop anything or give you XP so I added this in.</span></td>
	<td>MorpheusZero</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Better Biomes-->
<tr>
	<td><a href="http://bit.ly/ZQhm0K">Better Biomes</a></td>
	<td class="desctt"><span class="tt">Adds a new world type, more biomes, and configuration options for vanilla biomes. The Better Biomes world type contains all the new biomes - they do not generate in the standard Overworld. Each one can be turned off in the config.</span></td>
	<td>SMEZ1234</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--BetterFonts-->
<tr>
	<td><a href="http://bit.ly/UxdaF2">BetterFonts</a></td>
	<td class="desctt"><span class="tt">Adds TrueType/OpenType font support for Minecraft. This mod will use the fonts installed on your system for drawing text instead of the builtin bitmap fonts that come with Minecraft.</span></td>
	<td>The_MiningCrafter</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--BattleTowers-->
<tr>
	<td><a href="http://bit.ly/as-battletowers">BattleTowers</a></td>
	<td class="desctt"><span class="tt">Adds towers that spawn throughout your world for you to ascend and gain treasure from, each floor containing mobs and loot with a boss at the very top.</span></td>
	<td>AtomicStryker</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Better Sprinting-->
<tr>
	<td><a href="http://bit.ly/WA0xnr">Better Sprinting</a></td>
	<td class="desctt"><span class="tt">Allows you to bind keys to the vanilla movements such as sprinting, as well as keys to toggle sprint/sneak while also adding new functionality.</span></td>
	<td>chylex</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Better World Generation 4-->
<tr>
	<td><a href="http://bit.ly/WmtfYF">Better World Generation 4</a></td>
	<td class="desctt"><span class="tt">Adds many world generation options regarding previous versions of Minecraft.</span></td>
	<td>ted80</td>
	<td>SSP SMP</td>
	<td class="nfc">Not Forge Compatible</td>
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
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>This is a new generator. You may select this generator in More World Options when creating world. In this generator, the world is made up of massive spheres with glass domes. Inside these spheres are random biomes. There is a random chance of a lake being placed in the center of each sphere. Usually water, but rarely lava. Bordering this lake you will find sand for water, or gravel for lava. Connecting each sphere is a wooden bridge with fence rail. Beside each sphere is a smaller sphere, which is where you will find diamond and lapis lazuli. These ores only occur here, the others are equally spread throughout the spheres. The cave generator used here is a modified Nether cave generator, where like on the surface, will generate lava below a certain level. If this lava reaches the outside, an obsidian wall will be made to hold it in.</span></td>
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

<!--Caption API-->
<tr>
	<td><a href="http://bit.ly/WCNwtc">Caption API</a> (for the Hearing Impaired)</td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Allows sounds to be displayed as text for those with no sound or that are hearing impaired.</span></td>
	<td>WyrdOne</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
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
	<td class="fr">Forge Required</td>
</tr><!--Version Independent-->

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

<!--ComputerCraft-->
<tr>
	<td>
	<a href="http://bit.ly/13aWXXd">ComputerCraft</a></td>
	<td class="desctt"><span class="tt">ComputerCraft adds programmable computers and robots to minecraft.</span></td>
	<td>dan200</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--[ComputerCraft] Immibis's Peripherals-->
<tr>
	<td><a href="http://bit.ly/YJGFPC">[ComputerCraft] Immibis's Peripherals</a></td>
	<td class="desctt"><span class="tt">Adds RFID cards, Mag-cards, Speakers, LAN cables, Cryptographic Accelerators, and an Adventure map interface.</span></td>
	<td>immibis</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--CraftGuide-->
<tr>
	<td><a href="http://bit.ly/ZfKdKh">CraftGuide</a></td>
	<td class="desctt"><span class="tt">Quick access to a list of every crafting recipe in the game!</span></td>
	<td>Uristqwerty</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--CreepersNoCreeping-->
<tr>
	<td><a href="http://bit.ly/117U1v2">CreepersNoCreeping</a></td>
	<td class="desctt"><span class="tt">Creepers will burn in the sunlight and flee in the sun to find shade when burning. They are also afraid of water because they cannot swim and will explode if they touch water. They also make a sound when wandering around.</span></td>
	<td>MorpheusZero</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--CreeperSpecies-->
<tr>
	<td><a href="http://bit.ly/ZGFfHV">CreeperSpecies</a></td>
	<td class="desctt"><span class="tt">Adds a variety of new creepers to the game.</span></td>
	<td>ryan44851111</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
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

<!--Death Chest-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Death Chest</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Required</big><br/>See <i class="d">bit.ly/modloader</i></center><br/>When you die, if you have a chest in your inventory, it will be placed where you die, or in the closest available spot. The chest will be filled with as many items as possible. Items stored in the crafting slot are still lost, as usual, and any excess that won't fit in the chest will be dropped.</span></td>
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

<!--Defensive Villagers-->
<tr>
	<td><a href="http://bit.ly/XWkxFW">Defensive Villagers</a></td>
	<td class="desctt"><span class="tt">Rewrites the villager AI and render and model file. Villagers defend themselves from Zombies, Skeletons and Spiders.</span></td>
	<td>sheenrox82</td>
	<td>Universal</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Derpy Sheep Mod-->
<tr>
	<td><a href="http://bit.ly/ZPxkHV">Derpy Sheep Mod</a></td>
	<td class="desctt"><span class="tt">This fun mods makes sheep appear big and fluffy!</span></td>
	<td>AwesomestM</td>
	<td><b>Clientside Mod</b></td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Diamond Buckets+-->
<tr>
	<td><a href="http://bit.ly/117JZKq">Diamond Buckets+</a></td>
	<td class="desctt"><span class="tt">Introduces twenty-two new buckets in three distinct types. The types are big buckets, flimsy buckets, and special buckets.</span></td>
	<td>thorgot</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Dimensional Anchors-->
<tr>
	<td><a href="http://bit.ly/Uvusgl">Dimensional Anchors</a></td>
	<td class="desctt"><span class="tt">This is a block that loads chunks. There is a limit on the number of chunks each non-op player can load in SMP, and each chunk loader can load an adjustable area. Requires fuel.</span></td>
	<td>immibis</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--DirectionHUD-->
<tr>
	<td><a href="http://bit.ly/WmtGCf">DirectionHUD</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d bc" style="max-width: 10px"><u>ModLoader Mod, bspkrsCore Required</u></big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Displays your magnetic compass heading at the top of your screen.</span></td>
	<td>bspkrs</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Dungeon Mobs-->
<tr>
	<td><a href="http://bit.ly/dungeonmobs">Dungeon Mobs</a></td>
	<td class="desctt"><span class="tt">Dungeon Mobs is intended to be a more dangerous analogue to Mo' Creatures. Instead of providing new animals that liven up the overworld and improve ambiance, this mod introduces a variety of new hostile mobs, each of which presents a different challenge, requiring you to think tactically about how to surmount the difficulty they pose. Supports "Biomes O' Plenty", "ExtraBiomesXL", and "Highlands".</span></td>
	<td>GnomeWorks</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--DungeonPack-->
<tr>
	<td><a href="http://bit.ly/V5Ecn9">DungeonPack</a></td>
	<td class="desctt"><span class="tt">Adds many new structures to the game, most of which are hostile and contain loot! Also good for a free home once you clear out all the baddies.</span></td>
	<td>Stuuupiiid</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Durability101-->
<tr>
	<td><a href="http://bit.ly/UCsPzk">Durability101</a></td>
	<td class="desctt"><span class="tt">Shows numbers instead of a bar representing the durability of items.</span></td>
	<td>RedBanHammer</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Dynamic Lights-->
<tr>
	<td><a href="http://bit.ly/as-dynamiclights">Dynamic Lights</a></td>
	<td class="desctt"><span class="tt">This modification makes 'shining' items <i>(default: Torch, Glowstone, Glowdust, Lit Pumpkin, Redstone, Lava Bucket, powered Minecart)</i> illuminate everything around them if:<br/><ul><li>the player has them equipped (in hand/armor)</li><li>they are dropped on the ground</li><li>another player has them equipped in Multiplayer</li></ul><br/>On top of that, burning Entities shine light, and Creepers about to explode light up!</span></td>
	<td>AtomicStryker</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Dynmap-->
<tr>
	<td><a href="http://bit.ly/VNNyib">Dynmap</a></td>
	<td class="desctt"><span class="tt">Real-time Minecraft maps:Dynmap provides an in-browser map, like Google Maps, of your Minecraft world. It updates the map in realtime while you have your browser opened and shows the current players, regions and in-game messages on top of the map. It also allows viewers of the map to chat from within their browser with players in-game.</span></td>
	<td>mikeprimm</td>
	<td>SMP</td>
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

<!--Elemental Tinkerer-->
<tr>
	<td><a href="http://bit.ly/10tghAD">Elemental Tinkerer</a></td>
	<td class="desctt"><span class="tt">A mod that adds Elemental magic to the game. This is achieved through research and experimentation. Available in this mod are spells and fun items to play with.</span></td>
	<td>Vazkii</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Ellian's MaterialDetector-->
<tr>
	<td><a href="http://bit.ly/RBP6OY">Ellian's MaterialDetector</a></td>
	<td class="desctt"><span class="tt">A material detector. It shows the surrounding material at your level/height map</span></td>
	<td>Ellian</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Enchanting Plus-->
<tr>
	<td><a href="http://bit.ly/UvMdBK">Enchanting Plus</a></td>
	<td class="desctt"><span class="tt">Removes the randomness of enchanting, allowing you to choose what enchantments you want. Including enchantments added by other mods.</span></td>
	<td>mssodin28</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Ender Storage-->
<tr>
	<td><a href="http://bit.ly/UvpH6y">Ender Storage</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">CodeChickenCore Required:</big><br/>See <i class="d">bit.ly/cb-core</i></center><br/>EnderStorage is a mod that offers a means to store your items in The END, causing them to be everywhere and nowhere at the same time.  All EnderStorage makes use of the magic of colors to link storage with its little piece of The END.  Any EnderStorage with the same color code share inventory (even across dimensions).  Currently there are two types of storage, EnderChest and EnderPouch.</span></td>
	<td>chicken_bones</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--EnderStuff+-->
<tr>
	<td><a href="http://bit.ly/VuxebI">EnderStuff+</a></td>
	<td class="desctt"><span class="tt">This mod adds a bunch of stuff to the End dimension. From mobs over blocks to tools and weapons. </span></td>
	<td>SanAndreasP</td>
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

<!--Extended Workbench-->
<tr>
	<td><a href="http://bit.ly/VFB6UT">Extended Workbench</a></td>
	<td class="desctt"><span class="tt">Extends the abilities of the workbench, allowing for more powerful tools, armour, and weapons.</span></td>
	<td>Naruto1310</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--ExtraWorldGeneration-->
<tr>
	<td><a href="http://bit.ly/VFsYo1">ExtraWorldGeneration</a></td>
	<td class="desctt"><span class="tt">Extra World Generation is a mod made to allow for most types of non-vanilla world gen to be consolidated into one fully configurable mod, from rarity, size of nodes, and location of spawning.</span></td>
	<td>Servovicis</td>
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

<!--Fancy Fences-->
<tr>
	<td><a href="http://bit.ly/TGtVeq">Fancy Fences</a></td>
	<td class="desctt"><span class="tt">Fences, walls, and panes better interact with each other - plus stack-able walls, new wall-types, and more!</span></td>
	<td>Koopinator</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Fancy Glass-->
<tr>
	<td><a href="http://bit.ly/10b0Kzy">Fancy Glass</a></td>
	<td class="desctt"><span class="tt">Have you ever wanted to build something awesome out of glass, maybe a castle or a giant green house? Vanilla glass just not doing it for you? Fancy Glass adds craftable Glass Bricks in three different styles: Regular, Cracked, and Chiseled.</span></td>
	<td>Darkmainiac</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Female Gender Option-->
<tr>
	<td><a href="http://bit.ly/108keKU">Female Gender Option</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Option</big><br/><small class="d">This mod has separate ModLoader and Forge versions.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Provides the option to turn the player into a female model while maintaining the minecraft style.</span></td>
	<td>iPixeli</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Fireplace Mod-->
<tr>
	<td><a href="http://bit.ly/ZRCnYI">Fireplace Mod</a></td>
	<td class="desctt"><span class="tt">There are times when a 3 block long fireplace fits a house and times when a single block looks better or saves room. Regular fires can also be a hazard for wooden houses. The fireplace block has the fire, logs, sides, and smoke compressed into a one block space. Add a few chimney blocks and watch the smoke puff out. Firepits and firerings can be used as an outdoor alternative. Create grills and prepare cooked food. Swipe your flint and steel at your favorite block and enjoy the fire!</span></td>
	<td>ngphoenix</td>
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

<!--Flat Bedrock Layer-->
<tr>
	<td><a href="http://bit.ly/VK1yu3">Flat Bedrock Layer</a> (BaM's)</td>
	<td class="desctt"><span class="tt">Makes the bedrock layer completely flat against the bottom of the world.</span></td>
	<td>DerBaM</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Flintlock Guns Mod-->
<tr>
	<td><a href="http://bit.ly/ZjQ6bZ">Flintlock Guns Mod</a></td>
	<td class="desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Adds six new flintlock weapons: Pistol, Double-Barreled Pistol, Musket, Revolver, and Hand Cannon, and a makeshift stone pistol. Loading these flintlock weapons in real life is quite cumbersome, and this mod replicates that. To load a weapon, you must craft together an unloaded one, gunpowder, and your ammo. The multi-shot weapons can do this multiple times to become fully loaded. Also be aware, your gun may misfire, making a sad click and losing your ammo. Reload and try again.</span></td>
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
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>The Floodgate block can be used as either a floodgate, allowing toggleable water and lava falls, or as a trapdoor. When you place the floodgate control block, it will place a gate in front of the control block in the direction you are facing.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Fluid Mechanics-->
<tr>
	<td><a href="http://bit.ly/Wug20i">Fluid Mechanics</a></td>
	<td class="desctt"><span class="tt">As for the "Fluid" part of the name, this mod is about managing and moving various liquids as needed. To do this, the mod adds pipes, tanks, and machines to handle the job. However, as for the "Mechanics" part of the name, this mod also offers ways to do simple mechanical power.</span></td>
	<td>DarkGuardsman</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Forestry-->
<tr>
	<td><a href="http://bit.ly/Sk5Snp">Forestry</a></td><td class="desctt"><span class="tt">Lets you create things such as automatic farms, intelligent backpacks, a mail system, and energy production. Also allows for such things as bee keeping/breeding and tree breeding.</span></td>
	<td>SirSengir</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Forge-->
<tr>
	<td><a href="http://bit.ly/forge-dl">Forge</a> [<a href="http://bit.ly/TWKJg0">mirror</a>] (API)</td>
	<td class="desctt"><span class="tt">A powerful, open source API for developing mods for minecraft.</span></td>
	<td>LexManos</td>
	<td>Universal</td>
	<td class="fr">Forge Itself</td>
</tr>

<!--fps-fixer-->
<tr>
	<td><a href="http://bit.ly/ZXivDb">fps-fixer</a></td>
	<td class="desctt"><span class="tt">Brings back the previous lighting system (pre 1.5).</span></td>
	<td>cafaxo</td>
	<td>Clientside Mod</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--FriendColour-->
<tr>
	<td><a href="http://bit.ly/friendcolor">FriendColour</a></td>
	<td class="desctt"><span class="tt">A client mod that allows you to give your mates cloaks, an extra nameplate tag and the most useful feature: customize your friends' names and add colours etc.! It is customizable with the advanced, user-friendly FriendColour GUI.</span></td>
	<td>Luke</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------G-------------------------------------------------------->

<!--Gearz Mod-->
<tr>
	<td><a href="http://bit.ly/WZfOol">Gearz Mod</a></td>
	<td class="desctt"><span class="tt">Adds 3 new armor types. Each one has its own buffs such as super speed for the red boots. The red and blue are mainly for exploration and geared towards the new dimension but can be used anywhere, where the purple is mainly focused on mining purposes.</span></td>
	<td>Torquebolt</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Glacier Ice-->
<tr>
	<td><a href="http://bit.ly/Yi2O8n">Glacier Ice</a></td>
	<td class="desctt"><span class="tt">Ever wished you could do some ice skating races, but the ice is too slow? Ever wanted to propel yourself off a giant cliff or perhaps wanted to make a roller coaster? This mod adds in Glacier Ice that propels and bounces you!</span></td>
	<td>fisherman77</td>
	<td><b>Universal</b></td>
	<td class="fr">Forge Required</td>
</tr>

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
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/><u><i class="w">WARNING:</u><br/>Backup your world before installing.</i><br/><br/>This mod changes how creepers attack. Instead of blowing itself up, It will disappear and launcher 100 arrows straight into the air, which will rain down on the landscape. These arrows will be 25% fire arrows, 75% explosive arrows.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--GuiAPI-->
<tr>
	<td><a href="http://bit.ly/TGlcZA">GuiAPI</a></td>
	<td class="desctt"><span class="tt">A powerful API for creating easy to create and use settings and menus in Minecraft, and uses TWL.</span></td>
	<td>ShaRose</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------H-------------------------------------------------------->

<!--Heikki Mod-->
<tr>
	<td><a href="http://bit.ly/15kKIpf">Heikki Mod</a></td>
	<td class="desctt"><span class="tt">"Do you feel minecraft boring, because there is no Heikki? If so, this mod is for you!"</span></td>
	<td>lasa11</td>
	<td>SSP</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------I-------------------------------------------------------->

<!--ICBM - Missiles and Military Tech-->
<tr>
	<td><a href="http://bit.ly/10cq1wu">ICBM - Missiles and Military Tech</a></td>
	<td class="desctt"><span class="tt">ntroduces intercontinental ballistic missilesto Minecraft. But the fun doesn't end there! This mod also features manydifferent types of explosives, missiles and machines seperated in to threedifferent tiers. If strategic warfare, carefully coordinated airstrikes,messing with matter and general destruction are up your alley,then this mod is for you!</span></td>
	<td>Calclavia</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--iChun Util-->
<tr>
	<td><a href="http://bit.ly/ichun-util">iChun Util</a> (Dependency)</td>
	<td class="desctt"><span class="tt">As of Minecraft 1.5, this mod is required to be installed for iChun's "Gravity Gun", "Portal Gun", and "Trail Mix" mods to work</span></td>
	<td>iChun</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--ID Resolver-->
<tr>
	<td><a href="http://bit.ly/IDResolver">ID Resolver</a></td>
	<td class="desctt"><span class="tt">Removes ID conflicts for blocks and items with mods, with extra options for detailed ID Reports and such.</span></td>
	<td>ShaRose</td>
	<td>SSP SMP</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Immibis Core-->
<tr>
	<td><a href="http://bit.ly/Uvusgl">Immibis Core</a> (Dependency)</td>
	<td class="desctt"><span class="tt">This is like CodeChicken Core, Buildcraft Core, RedPower Core, and so on - it provides requirements for other mods.</span></td>
	<td>immibis</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Immibis's Microblocks-->
<tr>
	<td><a href="http://bit.ly/Uvusgl">Immibis's Microblocks</a></td>
	<td class="desctt"><span class="tt">Mostly work like RedPower 2's microblocks. Install into the coremods folder.</span></td>
	<td>immibis</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Infernal Mobs-->
<tr>
	<td><a href="http://bit.ly/as-infernalmobs">Infernal Mobs</a></td>
	<td class="desctt"><span class="tt">This mod randomly imbues spawning Mobs in the World with Diablo-style random Enchantments, making them much harder and much more rewarding to kill. They also drop the quadruple amount of xp and a random enchanted item.</span></td>
	<td>AtomicStryker</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--InfiniTubes-->
<tr>
	<td><a href="http://bit.ly/Uvusgl">InfiniTubes</a></td>
	<td class="desctt"><span class="tt">Provides a way to move items from A to B, by labeling them.</span></td>
	<td>immibis</td>
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

<!--InGame Info XML-->
<tr>
	<td><a href="http://bit.ly/Sw1AcJ">InGame Info XML</a></td>
	<td class="desctt"><span class="tt">Display various information directly only you ingame screen.</span></td>
	<td>Lunatrius</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
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
	<td class="fr">Forge Required</td>
</tr><!--Version Independent-->

<!--Item Frame Lag Fix-->
<tr>
	<td><a href="http://bit.ly/ZO6xMj">Item Frame Lag Fix</a></td>
	<td class="desctt"><span class="tt">Some people get major fps drops in areas with a lot of item frames.  This is a simple mod that changes how item frames are rendered depending on how far away you are.  This is really useful on servers that have economy / shop plugins that uses item frames. Works with Optifine as well.</span></td>
	<td>chrisk123999</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>


<!----------------------------------------------------------J-------------------------------------------------------->

<!--John: Revived-->
<tr>
	<td><a href="http://bit.ly/mc-johnmod">John: Revived</a></td>
	<td class="desctt"><span class="tt">Adds a few mobs called "John" to the game, which are meant to be spooky/scary.</span></td>
	<td>SCMowns</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
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

<!--Kingdoms of Amalur-->
<tr>
	<td><a href="http://bit.ly/YztVek">Kingdoms of Amalur</a></td>
	<td class="desctt"><span class="tt">Adds a new dimension, many weapons, items, lore, blocks, guis, and some new mechanics.</span></td>
	<td>duke_Fr4ns</td>
	<td>SSP</td>
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

<!--Light Level Overlay-->
<tr>
	<td><a href="http://bit.ly/WmOkmG">Light Level Overlay</a></td>
	<td class="desctt"><span class="tt">Visualizes the light levels emitted by torches, glowstone and alike directly on top of blocks, this is helpful to quickly identify areas where mobs can spawn. It shows the light level of the airblock above the block the number is drawn onto, this is the block that is considered for mob spawning, light level 7 or below allows mobs to spawn.</span></td>
	<td>4poc</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Liquid XP-->
<tr>
	<td><a href="http://bit.ly/Uvusgl">Liquid XP</a></td>
	<td class="desctt"><span class="tt">Adds liquid XP, and related machines. You will need a mod capable of transporting liquids. It has been tested with Buildcraft waterproof pipes and Thermal Expansion liquiducts. It does not seem to work with RedPower 2 fluid pipes.</span></td>
	<td>immibis</td>
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

<!--MAtmos-->
<tr>
	<td><a href="http://bit.ly/ZfUxlk">MAtmos</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>MAtmos is a sound atmosphere generator for Minecraft. Whenever you play on any multiplayer server or in singleplayer, it looks at your surroundings and generates natural noises as a soundscape, such as birds chirpling in the forest, rumbling noises near a lava lake or wind gusts on a hilltop. This fills out the perpetual silence of Minecraft.</span></td>
	<td>Hurricaaane</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Melee Skeletons-->
<tr>
	<td><a href="http://bit.ly/WwQtRq">Melee Skeletons</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Make all Skeletons hold a sword instead of bow.</span></td>
	<td>Slayerlord8</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Metal Rods-->
<tr>
	<td><a href="http://bit.ly/TGtVeq">Metal Rods</a></td>
	<td class="desctt"><span class="tt">Adds iron trapdoors and new iron and gold rods which can be used to crafted enhanced tools and weapons.</span></td>
	<td>Koopinator</td>
	<td>Universal</td>
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

<!--Minecraft Lighting Fix-->
<tr>
	<td><a href="http://bit.ly/117QooQ">Minecraft Lighting Fix</a></td>
	<td class="desctt"><span class="tt">Fixes entity based rendering issues you may have with Minecraft.</span></td>
	<td>silverwind213</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Minecraft My Way-->
<tr>
	<td><a href="http://bit.ly/XeiQAH">Minecraft My Way</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d" style="font-size: 103%"><u>ModLoader Mod, ModOptionsAPI Required</u></big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For ModOptionsAPI, see <i class="d">bit.ly/mc-moapi</i></center><br/>Let's you configure Vanilla minecraft to your liking, by letting you turn off mobs, armours, and many more options.</span></td>
	<td>WyrdOne</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--MineTunes-->
<tr>
	<td><a href="http://bit.ly/minetunes">MineTunes</a></td>
	<td class="desctt"><span class="tt">MineTunes combines Minecraft blocks with a MIDI synthesizer to create the ultimate musical solution for doorbells, adventure maps, and creative multiplayer block-jamming. MineTunes works in both single and multiplayer, and adds no new blocks. Further, the mod's attention to detail is vast: you can disable and enable each individual part, you can save music to MIDI files, and new updates arrive every couple of weeks at the press of a button.</span></td>
	<td>fenceFoil</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
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

<!--Mo' Foliage-->
<tr>
	<td><a href="http://bit.ly/UAoujP">Mo' Foliage</a></td>
	<td class="desctt"><span class="tt">Adds about 20 flowers, naturally generated, some are biome specific. All of the flowers have special features.</span></td>
	<td>Andy3285</td>
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

<!--ModOptionsAPI-->
<tr>
	<td><a href="http://bit.ly/XeiQAH">ModOptionsAPI</a></td>
	<td class="desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Does your mod need simple, configurable options?  Do you not want to edit core Minecraft files to do this? Or did the mod you just download tell you to come here? This mod is right for you.</span></td>
	<td>WyrdOne</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Monster Spawn Highlighter-->
<tr>
	<td><a href="http://bit.ly/Sw1AcJ">Monster Spawn Highlighter</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Option</big><br/><small class="d">This mod has separate ModLoader and Forge versions.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Highlights any blocks where monsters can spawn.</span></td>
	<td>Lunatrius</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--More Explosives-->
<tr>
	<td><a href="http://bit.ly/VNTTtZ">More Explosives</a></td>
	<td class="desctt"><span class="tt">Adds many new types of ways to destroy your enemies, more often than not, involving explosions. Be careful you don't set anything off too close to home!</span></td>
	<td>NikolaiTheEpicGenius</td>
	<td>SSP SMP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--More Info Mod-->
<tr>
	<td><a href="http://bit.ly/cjbmodsr">More Info Mod</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">CJB API Required</big><br/>See <i class="d">bit.ly/cjb-api</i></center><br/>Adds a lot more information to your screen. The information you want to see is easily configurable. Just press the I key to open the MoreInfo Options menu, here you can turn on or off the information you want to see. It's also possible to change in which corner the information must be shown.</span></td>
	<td>CJB</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--More Records Mod-->
<tr>
	<td><a href="http://bit.ly/WlEcus">More Records Mod</a></td>
	<td class="desctt"><span class="tt">Includes various records that can be played in a jukebox. These Records can be found in any naturally spawning chest, This includes dungeon loot, blacksmith chests, and jungle temple chests.</span></td>
	<td>DarkHax</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--More Stackables-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">More Stackables</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Makes saddles, doors, and signs up to 8 in a stack, minecarts and boats up to 4 in a stack.</span></td>
	<td>Risugami</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--More Swords Mod-->
<tr>
	<td><a href="http://bit.ly/UR6Wxe">More Swords Mod</a></td>
	<td class="desctt"><span class="tt">Adds many new swords to the game.</span></td>
	<td>DarkHax</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
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

<!--Movement State Display-->
<tr>
	<td><a href="http://bit.ly/ZFklce">Movement State Display</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Displays your current movement state in the bottom-left corner of the screen in color-coded text as well as your animated character model. It's extremely simple in design, but very useful when making sure that you're actually sprinting/sneaking is a necessity (esp. in multiplayer PVP servers).</span></td>
	<td>RedBanHammer</td>
	<td>Clientside Mod</td>
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

<!--No Voidfog-->
<tr>
	<td><a href="http://bit.ly/Ty9cf2">No Voidfog</a> (or Dimming)</td>
	<td class="desctt"><span class="tt">Removes the void fog and dimming when getting nearer to bedrock level.</span></td>
	<td>MamiyaOtaru</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Not Enough Items (NEI)-->
<tr>
	<td><a href="http://bit.ly/UvpH6y">Not Enough Items (NEI)</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">CodeChickenCore Required:</big><br/>See <i class="d">bit.ly/cb-core</i></center><br/>NEI is a successor to both Too Many Items and Recipe Book. It arose around the same time as Craft Guide when Alexandria and a few others on the IRC suggested that I merge both Too Many Items and Recipe Book to remove their greatest flaws, ironically too many items, or in the case of recipe book, too many recipies. Too Many Items was great, but the one thing it lacked was an easy way to search and sort your items. When you had a mod like Red Power coming along with 10000 items both TMI and Recipe Book were racking up the pages.  Even if you don't want to use NEI for cheating in items, you will likely feel right at home with the Recipe component of the mod.</span></td>
	<td>chicken_bones</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--nZuR's RPG-->
<tr>
	<td><a href="http://bit.ly/ZOaWin">nZuR's RPG</a></td>
	<td class="desctt"><span class="tt">Adds many new ores, armours, tools, and weapons.</span></td>
	<td>nZuR</td>
	<td>SSP</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------O-------------------------------------------------------->

<!--Obly's Sheepers Creepers-->
<tr>
	<td><a href="http://bit.ly/15WV7cX">Obly's Sheepers Creepers</a></td>
	<td class="desctt"><span class="tt">Adds several aggressive mob-themed animals. The sheeper, enderchicken, and blaze cow!</span></td>
	<td>Oblyvian</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

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

<!--Primitive Mobs-->
<tr>
	<td><a href="http://bit.ly/11XRgwV">Primitive Mobs</a></td>
	<td class="desctt"><span class="tt">Adds numerous new mobs into your Minecraft world. However unlike some mods out there, this mod adds mobs which are familar to the regular Minecraft player. These mobs look like vanilla features however they add completely new features and behaviour which can benefit the player or the opposite. Before you start checking them out remember: You don't have to like them all, as mobs can be turned off.</span></td>
	<td>Daveyx0</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
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

<!--Rainbow XP Mod-->
<tr>
	<td><a href="http://bit.ly/VFLnjG">Rainbow XP Mod</a></td>
	<td class="desctt"><span class="tt">Changes the colours of the xp orbs into a randomized colour.</span></td>
	<td>AmazedStream</td>
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
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>This item, when used, opens up a GUI of every recipe that can be done. The items can not be touched, but you can read the tool tips. Left click moves to next recipe. Right click moves to previous recipe.</span></td>
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

<!--The Runic Dust Mod-->
<tr>
	<td><a href="http://bit.ly/VmqTz2">The Runic Dust Mod</a></td>
	<td class="desctt"><span class="tt">Allows you to draw runes on the ground physically and outside the crafting gui. Depending on what pattern you draw and what you give as a sacrifice, something magical will happen.</span></td>
	<td>billythegoat101</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>


<!----------------------------------------------------------S-------------------------------------------------------->

<!--Schematica-->
<tr>
	<td><a href="http://bit.ly/XSPYRr">Schematica</a></td>
	<td class="desctt"><span class="tt">Allows you to display a ghost image of a schematic file inside Minecraft to rebuild a structure or export any part of your world (or a server's world) into a schematic file. You're able to export parts of your world, too!</span></td>
	<td>Lunatrius</td>
	<td>Clientside Mod</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Scoaleton-->
<tr>
	<td><a href="http://bit.ly/118TZE9">Scoaleton</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>The Scoaleton is just about as fast as you are when you're sprinting, and holds a Katana in it's hand. Scoaletons drop 0-2 Dark Bones when they die, which can be crafted into one Dark Bone Meal. They will also drop 15 EXP, 0-9 coal, and very rarely a Katana. They also have a custom sound, and will explode at daytime since they're made of coal.</span></td>
	<td>ocomobock</td>
	<td>SSP</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--Show Durability Mod-->
<tr>
	<td><a href="http://bit.ly/VFM4d2">Show Durability Mod</a></td>
	<td class="desctt"><span class="tt">Makes any item (that has it) display its durability below its name whenever you mouse-over it. Thats it, nothing more.</span></td>
	<td>NemockZans</td>
	<td>Clientside Mod</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Sign Tags-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Sign Tags</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Adds tags with functions to signs. Function List:
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

<!--Single Player Commands-->
<tr>
	<td><a href="http://bit.ly/Xen4s0">Single Player Commands</a></td>
	<td class="desctt"><span class="tt">A mod that adds many commands which can help you quickly and efficiently build structures. Easily saves hours for the creative!</span></td>
	<td>simo_415</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Single Player Console-->
<tr>
	<td><a href="http://bit.ly/WDGzrt">Single Player Console</a></td>
	<td class="desctt"><span class="tt">SPConsole is a mod similar to SinglePlayerCommands, infact they share code. Some key improvements over SPCommands are:</span></td>
	<td>q3hardcore</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Smart Moving-->
<tr>
	<td><a href="http://bit.ly/UAvTjb">Smart Moving</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Compatible</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Provides various additional moving possibilities, such as climbing, crawling, sliding, and alternate swim/fly/fall animations.</span></td>
	<td>Divisor</td>
	<td>SSP SMP</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--Smart Spawn Mod-->
<tr>
	<td><a href="http://bit.ly/118DNyU">Smart Spawn Mod</a></td>
	<td class="desctt"><span class="tt">Protects the player from spawning in dangerous places as will as eliminating the random spawn feature to make it easier to play some custom maps, especially platform based maps like SkyBlock.</span></td>
	<td>HeshamMeneisi</td>
	<td>SSP LAN</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--SojaCraft-->
<tr>
	<td><a href="http://bit.ly/Zx0FKY">SojaCraft</a></td>
	<td class="desctt"><span class="tt">Makes it possible to get "meat" without killing animals.</span></td>
	<td>tk911</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Spawner GUI-->
<tr>
	<td><a href="http://bit.ly/WnSwBj">Spawner GUI</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Adds a GUI to all mob spawners that will allow you to pick what mob to spawn. Also allows mining/harvesting spawners. You may also disable the spawners with a redstone signal.</span></td>
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

<!--StackPack-->
<tr>
	<td><a href="http://bit.ly/Z87tZy">StackPack</a></td>
	<td class="desctt"><span class="tt">Allows you to take a stack of certain blocks (for example 64 dirt) and use a "Packer" to compress it into a StackPack which you can use in a crafting inventory to get the dirt back.</span></td>
	<td>sealab865</td>
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

<!--Steve's Carts 2-->
<tr>
	<td><a href="http://bit.ly/VK9ATv">Steve's Carts 2</a></td>
	<td class="desctt"><span class="tt">Introduces a modular system where you can build a huge amount of carts(hundreds of millions) by combining the parts you want.</span></td>
	<td>Vswe</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
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

<!--Team Fortress 2 Mods-->
<tr>
	<td><a href="http://bit.ly/TGsYTm">Team Fortress 2 Mods</a></td>
	<td class="desctt"><span class="tt">Includes four mods containing Team Fortress 2 themed content, including teleporters, sentries, dispensers, and a team addon.</span></td>
	<td>pitman-87</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Texture Pack on Main Menu-->
<tr>
	<td><a href="http://bit.ly/YQZfbG">Texture Pack on Main Menu</a></td>
	<td class="desctt"><span class="tt">Puts the texture Packs button back onto the main menu.</span></td>
	<td>bmanrules</td>
	<td>Clientside Mod</td>
	<td class="nfc">Not Forge Compatible</td>
</tr>

<!--The Barrels Mod-->
<tr>
	<td><a href="http://bit.ly/15eDKSH">The Barrels Mod</a></td>
	<td class="desctt"><span class="tt">Adds three blocks into the game; barrels! The three types of barrels all function similarly. Barrels are used to store item just like you would with a chest, but vastly more items then what you can fit in a chest. Unfortunately, there is a limiting factor like everything: they can only store one item at a time.</span></td>
	<td>Need4Poop402</td>
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

<!--The Ocarina Mod-->
<tr>
	<td><a href="http://bit.ly/UArYTu">The Ocarina Mod</a></td>
	<td class="desctt"><span class="tt">Adds a fully-functioning Ocarina straight from The Legend of Zelda: Ocarina of Time and Majora's Mask into Minecraft! The Ocarina functions just like it does in The Legend of Zelda. You can now learn songs that effect gameplay! Future updates will include more songs and functions!</span></td>
	<td>Boba_Fett_Link</td>
	<td>Universal</td>
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

<!--The Wars Mod-->
<tr>
	<td><a href="http://bit.ly/13dBw7b">The Wars Mod</a></td>
	<td class="desctt"><span class="tt">Adds a massive array of structures. From Spleef to hunger games! As well as special blocks, a new ore and a class system.</span></td>
	<td>resinresin</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Timber!-->
<tr>
	<td><a href="http://bit.ly/13b9vxV">Timber!</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d">ModLoader Mod</big><br/><small class="d">ModLoader can be used instead of Forge for this mod.</small><br/>See <i class="d">bit.ly/modloader</i></center><br/>Makes all the logs in a tree break when you hit the bottom block of the tree with an axe of any type. You can toggle this effect to safely remove logs by holding down the sneak key while chopping logs with your axe.</span></td>
	<td>TehKrush</td>
	<td>SSP</td>
	<td class="fc">Forge Compatible</td>
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

<!--Torch Levers-->
<tr>
	<td><a href="http://bit.ly/Woji2s">Torch Levers</a></td>
	<td class="desctt"><span class="tt">Adds a new item, the Torch Lever, which you can craft by mixing a torch and lever. It functions like a wall lever, but looks (and lights) like a torch.</span></td>
	<td>HitchH1k3r</td>
	<td><b>Universal</b></td>
	<td class="fr">Forge Required</td>
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
	<td class="d desctt"><span class="tt"><center><big class="d">iChun Util Required:</big><br/>See <i class="d">bit.ly/ichun-util</i></center><br/>Adds all sort of crazy stuff. No really, there's freaking nyan pigs, pig launchers, powerfully pooting pigs, and cartoony "POW" and "BAM" shoot icons!</span></td>
	<td>iChun</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td><!--Version Independent-->
</tr>

<!--Travelling House Mod-->
<tr>
	<td><a href="http://bit.ly/Yw7BmH">Travelling House Mod</a></td>
	<td class="desctt"><span class="tt">This mod allows you to explore your minecraft world freely while still having your own base whenever you need it. Pack your base on blueprint schematic and unpack it whenever wherever you please. Not just your house, your farm and all farm animals, your infinite water source etc. Works in other dimensions too!</span></td>
	<td>The_cLyde</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--TreeCapitator-->
<tr>
	<td><a href="http://bit.ly/TWHHIG">TreeCapitator</a></td>
	<td class="ml desctt"><span class="tt"><center><big class="d rpa">ModLoader Option, bspkrsCore Required</big><br/><small class="d">This mod has separate ModLoader and Forge versions.</small><br/>For ModLoader, see <i class="d">bit.ly/modloader</i><br/>For bspkrsCore, see <i class="d">bit.ly/bspkrscore</i></center><br/>Allows you to chop down an entire tree (leaves and all) by harvesting one of its logs. Forge version automatically detects logs/axes from many mods so that they work as well. Now damages axe per log chopped, unless configured otherwise. Highly configurable.</span></td>
	<td>bspkrs</td>
	<td>Universal</td>
	<td class="fc">Forge Compatible</td>
</tr>

<!--TubeStuff-->
<tr>
	<td><a href="http://bit.ly/Uvusgl">TubeStuff</a></td>
	<td class="d desctt"><span class="tt"><center><big class="d">Immibis Core Required</u></big><br/>See <i class="d">bit.ly/immibiscore</i></center><br/>A smallish mod that adds blocks most useful for Buildcraft or RedPower. Neither are actually required though.</span></td>
	<td>immibis</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
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


<!----------------------------------------------------------U-------------------------------------------------------->

<!--Ultimate Tools-->
<tr>
	<td><a href="http://bit.ly/108y7sm">Ultimate Tools</a></td>
	<td class="desctt"><span class="tt">Adds a few new craftable Tools to Minecraft, the Paxe, the Povel, the Shaxe and the Ultimate. They are combinations of Shovel Pickaxe and Axe. You can do everything you could do with the part Tools with it. Harvest levels still apply (as in, iron still can't harvest obsidian).</span></td>
	<td>Umbrosus</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

<!--Universal Electricity-->
<tr>
	<td><a href="http://bit.ly/UCJ3sf">Universal Electricity</a></td>
	<td class="desctt"><span class="tt">Universal Electricity is a modular coding framework that allows the use of electricity in Minecraft. Mods which uses the Universal Electricity API have the ability to communicate and be compatible with each other.</span></td>
	<td>Calclavia</td>
	<td>Universal</td>
	<td class="fr">Forge Required</td>
</tr>

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

<!--WheatTweak-->
<tr>
	<td><a href="http://bit.ly/117U1v2">WheatTweak</a></td>
	<td class="desctt"><span class="tt">Bonemeal has been modified to be closer to that of the pre-1.5 versions of Minecraft. On a normal occurance, it will take 2 pieces of bonemeal to grow a crop. On rare occurances, it will take 1 piece, but no more than 3 pieces to grow a crop. This is much better than 7 pieces every time in my opinion.</span></td>
	<td>MorpheusZero</td>
	<td>Universal</td>
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
</table></center><br/>

<div class="footer">
	Mod count: <b>204</b>
</div>

<div class="API">
	<a href="http://bit.ly/forge-dl">Forge</a> |
	<a href="http://bit.ly/TGlcZA">GuiAPI</a> |
	<a href="http://bit.ly/WnSwBj">ModLoader</a> | 
	<a href="http://bit.ly/WnR9CL">Player API</a> | 
	<a href="http://bit.ly/13U9b8y">Render Player API</a>
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