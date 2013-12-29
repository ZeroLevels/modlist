<?php
/**
 * Modlist helper
 */

namespace Modlist;

/**
 * Permission handler for the modlist panel
 * 
 * @package Modlist
 */
class Permissions {
    /**
     * Root Level - Given automatic permissions to everything
     * @const string
     */
    const ROOT_LEVEL = 'admin';
    
    /**
     * The access level of the user
     * @var string
     * @access protected
     */
    protected $access_level = 'user';
    
    /**
     * The permission list
     * @var array
     * @access protected
     */
    protected $permissions = array();
    
    /**
     * List of display names
     * @var array
     * @access protected
     */
    protected $display_names = array();
    
    /**
     * Constructor
     * 
     * Load permissions list
     * @access public
     */
    public function __construct() {
        $perm_data = 'data/permissions.json';
        if(file_exists($perm_data)) {
            $list = json_decode(file_get_contents($perm_data), true);
            foreach($list as $groupname => $group) {
                if(isset($group['inherit'])) {
                    $group['permissions'] = array_merge(
                            $group['permissions'],
                            $list[$group['inherit']]['permissions']
                            );
                }
                $this->permissions[$groupname] = $group['permissions'];
                $this->display_names[$groupname] = $group['display_name'];
            }
        }
    }
    
    /**
     * Set the access level of the user
     * @param string $level The access level of the user
     * @access public
     * @return void
     */
    public function setAccessLevel($level) {
        $this->access_level = $level;
    }

    /**
     * Check if the user has enough permission to do the action
     * @param string $request The requested permission
     * @access public
     * @return boolean Whether or not the user is allowed to access this section
     */
    public function canAccess($request) {
        if($this->access_level === self::ROOT_LEVEL) {
            return true;
        }
        if(!empty($this->permissions)) {
            if(in_array($request, $this->permissions[$this->access_level], true)) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Returns the display name of the current access level
     * @access public
     * @return string
     */
    public function getDisplayName() {
        return $this->display_names[$this->access_level];
    }
}