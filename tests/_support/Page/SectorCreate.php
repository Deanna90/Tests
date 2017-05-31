<?php
namespace Page;

class SectorCreate extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/sector/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NameField              = '#sector-name';
    
    public static $StateSelect            = '#state-id';
    public static $StatusSelect           = '#sector-status';
    public static $ProgramSelect          = '#program_id-id';
    public static $SelectedStateOption    = '#program-state_id [selected]';
    public static $StateOption            = '#program-state_id option';
    public static $SelectedStatusOption   = '#sector-status [selected]';
    public static $StatusOption           = '#sector-status option';
    public static $SelectedProgramOption  = '#program_id-id [selected]';
    public static $ProgramOption          = '#program_id-id option';
    
    public static $NameLabel              = '[for=sector-name]';
    public static $StateSelectLabel       = '[for=state-id]';
    public static $StatusSelectLabel      = '[for=sector-status]';
    public static $ProgramSelectLabel     = '[for=program_id-id]';
    public static $NameErrorHelpBlock     = '#sector-name+.help-block';
    public static $StateErrorHelpBlock    = '#program-state_id+.help-block';
    public static $ProgramErrorHelpBlock  = '#program_id-id~.help-block';
    
    public static function selectStateOption($number)         { return "#program-state_id option:nth-of-type($number)";}
    public static function selectStatusOption($number)        { return "#program_cities_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectStateOptionByName($name)     { return "//*[@id='program_cities_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedProgramOption($number)     { return "#program_cities_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedProgramOptionByName($name) { return "//*[@id='program_cities_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}

}
