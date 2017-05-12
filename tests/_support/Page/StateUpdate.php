<?php
namespace Page;

class StateUpdate extends \AcceptanceTester
{
    public static function URL($id)       { return parent::$URL_UserAccess."/state/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '.state-update [type=submit]';
    
    public static $NameField              = '#state-name';
    public static $ShortNameField         = '#state-short_name';
    
    public static $WeightedSelect         = '#state-is_weighted';
    public static $SelectedWeightedOption = '#state-is_weighted [selected]';
    public static $WeightedOption         = '#state-is_weighted option';
    
    public static $NameLabel              = '[for=state-name]';
    public static $ShortNameLabel         = '[for=state-short_name]';
    public static $WeightedSelectLabel    = '[for=state-is_weighted]';
    public static $NameErrorHelpBlock     = '#state-name+.help-block';
    
    public static function selectWeightedOption($number) { return "#state-is_weighted option:nth-of-type($number)";}


}
