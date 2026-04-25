<?php
/**
 * 
 * @package    System - IWS.BY Yandex Metrica
 * @subpackage Modules
 * @license    GNU GPL v2 or later, see LICENSE.txt
 * @link       https://iws.by/en/product/yandex-metrica-for-joomla/
 * 
 */

// No direct access
defined('_JEXEC') or die;

class plgsystemIwsby_YametrikaInstallerScript
{
	function postflight($type, $parent) 
	{
		if($type == "install" || $type == "update")
		{
            echo JText::_('PLG_IWSBY_YAMETRIKA_INSTALL_INFO_NOTIFY');
		}
	}

	public function update($parent)
    {
        $db = JFactory::getDbo();
        $oldName = 'System - IWS.BY Yandex Metrika';
        $newName = 'System - IWS.BY Yandex Metrica';

        $query = $db->getQuery(true)
            ->update($db->quoteName('#__update_sites'))
            ->set($db->quoteName('name') . ' = ' . $db->quote($newName))
            ->where($db->quoteName('name') . ' = ' . $db->quote($oldName));

        $db->setQuery($query);
        try {
            $db->execute();
        } catch (Exception $e) {
        }
    }
}