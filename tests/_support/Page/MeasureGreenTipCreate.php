<?php
namespace Page;

class MeasureGreenTipCreate extends \AcceptanceTester
{
    public static function URL($measureId)  { return parent::$URL_UserAccess."/green-tip/create?measure_id=$measureId";}
    public static $Title                 = 'h1';
    
    public static $CreateButton          = '[type=submit][class*=success]';
    
    public static $ProgramSelect         = '#greentip_program_ids_chosen';
    public static $ProgramOption         = '#greentip_program_ids_chosen>div>ul>li';
    
    public static $DescriptionField      = '#greentip-description';
    public static $DescriptionLabel      = '[for=greentip-description]';
    
    
    public static function selectProgramOption($number)       { return "#greentip_program_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectProgramOptionByName($name)   { return "//*[@id='greentip_program_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedProgramOption($number)     { return "#greentip_program_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedProgramOptionByName($name) { return "//*[@id='greentip_program_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}


}
