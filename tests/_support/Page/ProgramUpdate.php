<?php
namespace Page;

class ProgramUpdate extends \AcceptanceTester
{
    public static function URL($id)       { return parent::$URL_UserAccess."/program/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '.btn-green[type=submit]';
    
    public static $NameField              = '#program-name';
    
    public static $StateSelect            = '#program-state_id';
    public static $SelectedStateOption    = '#program-state_id [selected]';
    public static $StateOption            = '#program-state_id option';
    
    public static $CitySelect             = '#program-cities+div';
    public static $SelectedCityOption     = '#program-cities+div a>span';
    public static $CityOption             = '#program-cities+div ul>li';
    
    public static $WeightedSelect         = '#program-is_weighted';
    public static $SelectedWeightedOption = '#program-is_weighted [selected]';
    public static $WeightedOption         = '#program-is_weighted option';
    
    public static $RecertificationCycleSelect = '#program-recertification_cycle';
    
    public static $NameLabel              = '[for=program-name]';
    public static $StateSelectLabel       = '[for=program-state_id]';
    public static $CitySelectLabel        = '[for=program-cities]';
    public static $NameErrorHelpBlock     = '#program-name+.help-block';
    public static $StateErrorHelpBlock    = '#program-state_id+.help-block';
    public static $CityErrorHelpBlock     = '#program-cities~.help-block';
    public static $CityWarningHelpBlock   = '.alert-warning';
    
    public static function selectStateOption($number) { return "#program-state_id option:nth-of-type($number)";}
    public static function selectCityOption($number)  { return "#program-cities+div ul>li:nth-of-type($number)";}


}
