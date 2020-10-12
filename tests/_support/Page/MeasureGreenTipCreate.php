<?php
namespace Page;

class MeasureGreenTipCreate extends \AcceptanceTester
{
    public static function URL($measureId)  { return parent::$URL_UserAccess."/green-tip/create?measure_id=$measureId";}
    public static $Title                 = 'h1';
    
    public static $CreateButton          = '[type=submit][class*=success]';
    
    public static $ProgramSelect         = '#greentip_program_ids_chosen';
    public static $ProgramOption         = '#greentip_program_ids_chosen>div>ul>li';
    
    public static $SectorSelect          = '#greentip_sector_ids_chosen';
    public static $SectorOption          = '#greentip_sector_ids_chosen>div>ul>li';
    
    public static $DescriptionField      = '#greentip-description';
    public static $DescriptionLabel      = '[for=greentip-description]';
    
    public static $DeleteProgramOption   = "#greentip_program_ids_chosen [class*='close']";
    
    public static $UseForAllProgramsToggleButton         = "#greentip-all_programs_switch_control";
    public static $UseForAllProgramsToggleButtonSelect   = "#greentip-all_programs";
    
    public static function selectProgramOption($number)             { return "#greentip_program_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectProgramOptionByName($name)         { return "//*[@id='greentip_program_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedProgramOption($number)           { return "#greentip_program_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedProgramOptionByName($name)       { return "//*[@id='greentip_program_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    public static function DeleteSelectedProgramOption($number)     { return "#greentip_program_ids_chosen>ul>li.search-choice:nth-of-type($number)>a";}
    public static function DeleteSelectedProgramOptionByName($name) { return "//*[@id='greentip_program_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}

    public static $UseForAllSectorsToggleButton         = "#greentip-all_sectors_switch_control";
    public static $UseForAllSectorsToggleButtonSelect   = "#greentip-all_sectors";
    
    public static function selectSectorOption($number)             { return "#greentip-sector_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectSectorOptionByName($name)         { return "//*[@id='greentip_sector_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedSectorOption($number)           { return "#greentip_sector_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedSectorOptionByName($name)       { return "//*[@id='greentip_sector_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    public static function DeleteSelectedSectorOption($number)     { return "#greentip_sector_ids_chosen>ul>li.search-choice:nth-of-type($number)>a";}
    public static function DeleteSelectedSectorOptionByName($name) { return "//*[@id='ggreentip_sector_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}


}
