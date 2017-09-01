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
    public static $TitleLabel             = '[for=globalvariable-title]';
    public static $NameLabel              = '[for=globalvariable-name]';
    public static $ValueLabel             = '[for=globalvariable-value]';
    public static $DescriptionLabel       = '[for=globalvariable-description]';
    
    public static $UnitsSelectLabel       = '[for=globalvariable-units]';
}
