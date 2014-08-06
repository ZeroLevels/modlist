<?php
namespace Modlist;

use Author as Author;
use Mod as Mod;
use ModAuthor as ModAuthor;
use ModVersion as ModVersion;
use ModVersionType as ModVersionType;
use ModVersionDependency as ModVersionDependency;
use Type as Type;
use Version as Version;

class Import {

	var $versions = [];

	var $authors = [];

	var $availabilities = [];

	public function __construct($mod_list)
	{
		$this->mod_list = $mod_list;
	}

	public function convert()
	{
		foreach ($this->mod_list as $mod)
		{
			$this->addVersions($mod->versions);
			$this->addAuthors($mod->author);
			$this->addTypes($mod->type);
		}

		foreach ($this->mod_list as $mod)
		{
			$this->addMod($mod);
		}
	}

	public function addVersions($versions)
	{
		foreach ($versions as $version)
		{
			if ( ! isset($this->versions[$version]))
			{
				Version::unguard();
				$v = Version::create([
					'version' => $version,
					'title' => $version,
					'alias' => null,
					'type' => 'release',
					'description' => '',
					'homepage' => 0,
					'public' => 1,
					'accepting' => 1
				]);
				$this->versions[$version] = $v;
			}
		}
	}

	public function addAuthors($authors)
	{
		foreach ($authors as $author)
		{
			if ( ! isset($this->authors[$author]))
			{
				// Must be unique or merge
				// Check not required
				// Fix different capitalizations in modlist.json before import
				$slug = slug($author);
				
				Author::unguard();
				$a = Author::create([
					'name' => $author,
					'slug' => $slug,
					'about' => ''
				]);
				$this->authors[$author] = $a;
			}
		}
	}

	public function addTypes($types)
	{
		foreach ($types as $type)
		{
			if ( ! isset($this->types[$type]))
			{
				Type::unguard();
				$t = Type::create([
					'title' => $type,
					'description' => '',
					'class' => ''
				]);
				$this->types[$type] = $t;
			}
		}
	}

	public function addMod($mod)
	{
		$slug = slug($mod->name);

		while (true)
		{
			if (Mod::where('slug', $slug)->count() != 0)
			{
				$slug .= '-' . rand(1, 100);
				continue;
			}
			break;
		}

		Mod::unguard();
		$m = Mod::create([
			'slug' => $slug,
			'approved' => 1
		]);

		$this->addModVersions($m->id, $mod);
	}
	
	public function slug($name) {
		return preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($name));
	}

	public function addModVersions($mod_id, $mod_data)
	{
		foreach ($mod_data->versions as $version)
		{
			ModVersion::unguard();
			$mv = ModVersion::create([
				'mod_id' => $mod_id,
				'version_id' => $this->versions[$version]->id,
				'title' => $mod_data->name,
				'description' => empty($mod_data->desc) ? null : $mod_data->desc,
				'link' => $mod_data->link,
				'link_source' => isset($mod_data->source) ? $mod_data->source : null,
				'forge' => in_array('Not Forge Compatible', $mod_data->dependencies) ? false : true,
				'release' => null,
				'notes' => isset($mod_data->other) ? $mod_data->other : false,
				'approved' => 1
			]);
			$this->addModVersionAuthors($mv->id, $mod_data->author);
			$this->addModVersionTypes($mv->id, $mod_data->type);
			$this->addModVersionDependencies($mv->id, $mv->version_id, $mod_data->dependencies);
		}
	}

	public function addModVersionAuthors($mod_version_id, $authors)
	{
		foreach ($authors as $author)
		{
			$author_id = Author::where('name', $author)->first()->id;
			ModAuthor::unguard();
			ModAuthor::create([
				'mod_version_id' => $mod_version_id,
				'author_id' => $author_id,
				'meta' => null
			]);
		}
	}

	public function addModVersionTypes($mod_version_id, $types)
	{
		foreach ($types as $type)
		{
			$mvt = ModVersionType::create([
				'mod_version_id' => $mod_version_id,
				'type_id' => $this->types[$type]->id
			]);
		}
	}

	public function addModVersionDependencies($mod_version_id, $version_id, $dependencies)
	{
		foreach ($dependencies as $dependency_name)
		{
			if ($dependency_name == "Forge Compatible") continue;
			if ($dependency_name == "Not Forge Compatible") continue;
			if ($dependency_name == "Base Edit") continue;
			if ($dependency_name == "Forge Required") {
				$dependency_name = 'Forge';
			}
			if($dependency = ModVersion::where('title', $dependency_name)->where('version_id', '=' , $version_id)->first())
			{
				ModVersionDependency::unguard();
				ModVersionDependency::create([
					'mod_version_id' => $mod_version_id,
					'dependency_id' => $dependency->id,
					'order' => 1,
					'notes' => null
				]);
			}
		}
	}
}