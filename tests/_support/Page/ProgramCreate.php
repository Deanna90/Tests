<?php
namespace Page;

class ProgramCreate extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/program/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NameField              = '#program-name';
    
    public static $StateSelect                = '#program-state_id';
    public static $CitySelect                 = '#program_cities_chosen';
    public static $RecertificationCycleSelect = '#program-recertification_cycle';
    public static $SelectedStateOption        = '#program-state_id [selected]';
    public static $StateOption                = '#program-state_id option';
    public static $SelectedCityOption         = '#program_cities_chosen a>span';
    public static $CityOption                 = '#program-cities+div ul>li';
    
    public static $NameLabel              = '[for=program-name]';
    public static $StateSelectLabel       = '[for=program-state_id]';
    public static $CitySelectLabel        = '[for=program-cities]';
    public static $NameErrorHelpBlock     = '#program-name+.help-block';
    public static $StateErrorHelpBlock    = '#program-state_id+.help-block';
    public static $CityErrorHelpBlock     = '#program-cities~.help-block';
    public static $CityWarningHelpBlock   = '.alert-warning';
    
    public static function selectStateOption($number)      { return "#program-state_id option:nth-of-type($number)";}
    public static function selectCityOption($number)       { return "#program_cities_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectCityOptionByName($name)   { return "//*[@id='program_cities_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedCityOption($number)     { return "#program_cities_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedCityOptionByName($name) { return "//*[@id='program_cities_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
}
