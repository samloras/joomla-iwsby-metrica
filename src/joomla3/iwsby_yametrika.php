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
jimport('joomla.plugin.plugin');

class plgSystemIwsby_Yametrika extends JPlugin{
    
    protected $autoloadLanguage = true;

    function onBeforeCompileHead() {
        $app = JFactory::getApplication();
		$document = JFactory::getDocument();
        if($app->isAdmin())
        {
            return;
        }
        
		$yamatrikacode = $this->params->get("yacode");
		if(!empty($yamatrikacode)){
			$document->addCustomTag($yamatrikacode);
		}
    }

}