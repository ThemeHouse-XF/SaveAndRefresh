<?php

class ThemeHouse_SaveAndRefresh_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_SaveAndRefresh' => array(
                'controller' => array(
                    'XenForo_ControllerAdmin_User',
                    'XenForo_ControllerAdmin_AdminTemplateModification',
                    'XenForo_ControllerAdmin_TemplateModification'
                ), /* END 'controller' */
            ), /* END 'ThemeHouse_SaveAndRefresh' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new ThemeHouse_SaveAndRefresh_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */
}