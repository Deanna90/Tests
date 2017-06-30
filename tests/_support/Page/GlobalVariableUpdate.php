<?php
namespace Page;

class GlobalVariableUpdate extends \AcceptanceTester
{
   
    public static function URL($id)     { return parent::$URL_UserAccess."/global-variable/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit].btn-green';
    public static $OverrideButton         = 'a.btn-green-outline';
    
    public static $TitleField             = '#globalvariable-title';
    public static $NameField              = '#globalvariable-name';
    public static $ValueField             = '#globalvariable-value';
    public static $DescriptionField       = '#globalvariable-description';
    
    public static $UnitsSelect            = '#globalvariable-units';
    
    //Labels
    public static $TitleLabel             = '#globalvariable-title';
    public static $NameLabel              = '#globalvariable-name';
    public static $ValueLabel             = '#globalvariable-value';
    public static $DescriptionLabel       = '#globalvariable-description';
    
    public static $UnitsSelectLabel       = '#globalvariable-units';

}
