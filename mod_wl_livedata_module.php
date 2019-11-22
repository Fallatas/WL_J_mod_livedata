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

    $data = ModWL_Livedata_Module_Helper::getLivedataParams ($params);
    $allusers = ModWL_Livedata_Module_Helper::getUsers();
    $articles = ModWL_Livedata_Module_Helper::getArticles();
    $style = ModWL_Livedata_Module_Helper::getStyleParams();
    $count = ModWL_Livedata_Module_Helper::getOnlineCount();
    $chartJs =  ModWL_Livedata_Module_Helper::chartJs($count);
    $save =  ModWL_Livedata_Module_Helper::saveData();


	// Check for a custom CSS file
    JHtml::_('stylesheet', 'mod_wl_livedata_module/user.css', array('version' => 'auto', 'relative' => true));
    

   require JModuleHelper::getLayoutPath('mod_wl_livedata_module', $params->get('layout', 'default'));