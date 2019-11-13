<?php

/**
 * @package    WL LIVEDATA MODUL
 *
 * @author     Thomas Winterling <info@winterling-labs.com>
 * @copyright  Copyright (C) 2005 - 2019. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

/**
 * Helper for mod_livedata_module
 *
 * @since  Version 1.0.0.0
 */
class ModWL_LIVEDATA_Module_Helper
{   
    
    // Detects Users
    public function getUsers()
    {

        // Get a db connection.
        $db = JFactory::getDbo();

        //Create Query
        $query = $db
            ->getQuery(true)
            ->select("name")
            ->from($db->quoteName('#__users'));

        $db->setQuery($query);
        $column = $db->loadColumn ();

        // using the data
        $countData = count($column);
    }
    

}