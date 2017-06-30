<?php
namespace Page;

class GlobalVariableCreate extends \AcceptanceTester
{
    public static function URL()          { return parent::$URL_UserAccess."/global-variable/create";}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
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
