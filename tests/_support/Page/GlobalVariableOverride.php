<?php
namespace Page;

class GlobalVariableOverride
{
    public static function URL($id)     { return parent::$URL_UserAccess."/global-variable/override?id=$id";}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $TitleField             = '#globalvariable-title';
    public static $NameField              = '#globalvariable-name';
    public static $ValueField             = '#globalvariable-value';
    public static $DescriptionField       = '#globalvariable-description';
    
    public static $UnitsSelect            = '#globalvariable-units';
    public static $TargetTypeSelect       = '#globalvariable-target_type';
    public static $TargetIdSelect         = '#target_id';
    
    //Labels
    public static $TitleLabel             = '[for=globalvariable-title]';
    public static $NameLabel              = '[for=globalvariable-name]';
    public static $ValueLabel             = '[for=globalvariable-value]';
    public static $DescriptionLabel       = '[for=globalvariable-description]';
    
    public static $UnitsSelectLabel       = '[for=globalvariable-units]';
    public static $TargetTypeSelectLabel  = '[for=globalvariable-target_type]';
    public static $TargetIdSelectLabel    = '[for=target_id]';
}
