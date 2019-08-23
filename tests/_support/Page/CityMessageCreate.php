<?php
namespace Page;

class CityMessageCreate extends \AcceptanceTester
{
    public static function URL()    { return parent::$URL_UserAccess."/city-message/create";}
    public static $Alert            = '.alert-warning';
    
    public static $Title            = 'h1';
    
    public static $SaveButton       = '[type=submit][class*=success]';
    
    public static $AllCitiesToggleButton = '#citymessage-all_cities_switch_control';
    public static $AllCitiesToggleLabel  = '[for=citymessage-all_cities]';
            
    public static $CitySelect       = '#program_cities_chosen';
    public static $CityOption       = '#program_cities_chosen>div>ul>li';
    
    public static $TitleField       = '#citymessage-title';
    public static $TitleLabel       = '[for=citymessage-title]';
    
    public static $MessageField     = '#citymessage-message';
    public static $MessageLabel     = '[for=citymessage-message]';
    
    public static $TitleSpanishTranslationField   = '#citymessage-title_es';
    public static $TitleSpanishTranslationLabel   = '[for=citymessage-title_es]';
    
    public static $MessageSpanishTranslationField = '#citymessage-message_es';
    public static $MessageSpanishTranslationLabel = '[for=citymessage-message_es]';
    
    public static $DeleteCityOption = "#program_cities_chosen [class*='close']";
    
    public static function selectCityOption($number)             { return "#program_cities_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectCityOptionByName($name)         { return "//*[@id='program_cities_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedCityOption($number)           { return "#program_cities_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedCityOptionByName($name)       { return "//*[@id='program_cities_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    public static function DeleteSelectedCityOption($number)     { return "#program_cities_chosen>ul>li.search-choice:nth-of-type($number)>a";}
    public static function DeleteSelectedCityOptionByName($name) { return "//*[@id='program_cities_chosen']/ul/li[@class='search-choice']/span[text()='$name']//following-sibling::a";}


}
