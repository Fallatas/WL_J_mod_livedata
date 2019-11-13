<?php
/**
 * @package     mod_livedata_module
 * @author      Thomas Winterling
 * @email       info@winterling-labs.com
 * @copyright   Copyright (C) 2005 - 2013, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';   // Helper

JHTML::_('script', 'mod_wl_livedata_module/scripts.js', array('version' => 'auto', 'relative' => true));

$allusers = ModWL_Livedata_Module_Helper::getUsers();
$count = ModWL_Livedata_Module_Helper::getOnlineCount();


	// Check for a custom CSS file
    JHtml::_('stylesheet', 'mod_wl_livedata_module/user.css', array('version' => 'auto', 'relative' => true));
    
    
   require JModuleHelper::getLayoutPath('mod_wl_livedata_module', $params->get('layout', 'default'));