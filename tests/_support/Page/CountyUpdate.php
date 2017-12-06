<?php
namespace Page;

class CountyUpdate extends \AcceptanceTester
{
    public static function URL($id)       { return parent::$URL_UserAccess."/county/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '.county-update [type=submit]';
    
    public static $NameField              = '#county-name';
    
    public static $StateSelect            = '#county-state_id';
    public static $SelectedStateOption    = '#county-state_id [selected]';
    public static $StateOption            = '#county-state_id option';
    
    public static $NameLabel              = '[for=county-name]';
    public static $StateSelectLabel       = '[for=county-state_id]';
    public static $NameErrorHelpBlock     = '#county-name+.help-block';
    public static $StateErrorHelpBlock    = '#county-state_id+.help-block';
    
    public static function selectStateOption($number) { return "#county-state_id option:nth-of-type($number)";}

}
