<?php
namespace Page;

class CityCreate extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/city/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NameField              = '#city-name';
    public static $ZipsField              = '#city-zips';
    
    public static $StateSelect            = '#city-state_id';
    public static $SelectedStateOption    = '#city-state_id [selected]';
    public static $StateOption            = '#city-state_id option';
    
    public static $CountySelect            = '#city-county_id';
    public static $SelectedCountyOption    = '#city-county_id [selected]';
    public static $CountyOption            = '#city-county_id option';
    
    public static $NameLabel              = '[for=city-name]';
    public static $ZipsLabel              = '[for=city-zips]';
    public static $StateSelectLabel       = '[for=city-state_id]';
    public static $CountySelectLabel      = '[for=city-county_id]';
    public static $NameErrorHelpBlock     = '#city-name+.help-block';
    public static $StateErrorHelpBlock    = '#city-state_id+.help-block';
    public static $CountyErrorHelpBlock   = '#city-county_id+.help-block';
    public static $ZipsErrorHelpBlock     = '#city-zips~.help-block';
    public static $ZipsErrorHintBlock     = '#city-zips~.hint-block';
    
    public static function selectStateOption($number)  { return "#city-state_id option:nth-of-type($number)";}
    public static function selectCountyOption($number) { return "#city-county_id option:nth-of-type($number)";}

}
