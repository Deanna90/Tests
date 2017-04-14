<?php
namespace Page;

class ProgramUpdate
{
    public static function URL($id)       { return  "/master-admin/program/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#program-name';
    
    public static $StateSelect            = '#program-state_id';
    public static $CitySelect             = '#program-cities+div';
    public static $SelectedStateOption    = '#program-state_id [selected]';
    public static $StateOption            = '#program-state_id option';
    public static $SelectedCityOption     = '#program-cities+div a>span';
    public static $CityOption             = '#program-cities+div ul>li';
    
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
