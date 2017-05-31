<?php
namespace Page;

class PopupThermOptionUpdate extends \AcceptanceTester
{
    public static function URL($id)        { return parent::$URL_UserAccess."/popup-therm/update-option?option_id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#popupthermoption-name';
    public static $ThermsCountField       = '#popupthermoption-therms_count';
    
    public static $NameLabel                 = '[for=popupthermoption-name]';
    public static $ThermsCountLabel          = '[for=popupthermoption-therms_count]';
    public static $NameErrorHelpBlock        = '#popupthermoption-name+.help-block';
    public static $ThermsCountErrorHelpBlock = '#popupthermoption-therms_count+.help-block';


}
