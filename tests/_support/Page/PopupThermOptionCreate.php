<?php
namespace Page;

class PopupThermOptionCreate extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/popup-therm/create-option';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NameField              = '#popupthermoption-name';
    public static $ThermsCountField       = '#popupthermoption-therms_count';
    
    public static $NameLabel                 = '[for=popupthermoption-name]';
    public static $ThermsCountLabel          = '[for=popupthermoption-therms_count]';
    public static $NameErrorHelpBlock        = '#popupthermoption-name+.help-block';
    public static $ThermsCountErrorHelpBlock = '#popupthermoption-therms_count+.help-block';

}
