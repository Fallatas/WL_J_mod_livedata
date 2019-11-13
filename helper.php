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

    
    /**
     * Show online count
     *
     * @return  array  The number of Users and Guests online.
     *
     * @since   1.5
     **/
    
    
     public static function getOnlineCount()
    {
        $db = JFactory::getDbo();

        // Calculate number of guests and users
        $result	     = array();
        $user_array  = 0;
        $guest_array = 0;

        $whereCondition = JFactory::getConfig()->get('shared_session', '0') ? 'IS NULL' : '= 0';

        $query = $db->getQuery(true)
            ->select('guest, client_id')
            ->from('#__session')
            ->where('client_id ' . $whereCondition);
        $db->setQuery($query);

        try
        {
            $sessions = (array) $db->loadObjectList();
        }
        catch (RuntimeException $e)
        {
            $sessions = array();
        }

        if (count($sessions))
        {
            foreach ($sessions as $session)
            {
                // If guest increase guest count by 1
                if ($session->guest == 1)
                {
                    $guest_array ++;
                }

                // If member increase member count by 1
                if ($session->guest == 0)
                {
                    $user_array ++;
                }
            }
        }

        $result['user']  = $user_array;
        $result['guest'] = $guest_array;

        $totalNumber = $result['user']  = $user_array + $result['guest'] = $guest_array;
        echo $totalNumber;
    }
    

}