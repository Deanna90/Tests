<?php
namespace Page;

class AuditGreenTipCreate extends \AcceptanceTester
{
    public static function URL()         { return parent::$URL_UserAccess."/audit-green-tip/create";}
    public static $Title                 = 'h1';
    
    public static $CreateButton                  = '.audit-green-tip-create [type=submit]';
    public static $UseForAllProgramsToggleButton = '#auditgreentip-all_programs_switch_control';
    
    public static $UseForAllProgramsToggleLabel  = '[for=auditgreentip-all_programs]';
    
    public static $ProgramSelect         = '#auditgreentip_program_ids_chosen';
    public static $ProgramOption         = '#auditgreentip_program_ids_chosen>div>ul>li';
    
    public static $TitleField            = '#auditgreentip-title';
    public static $TitleLabel            = '[for=auditgreentip-title]';
    public static $DescriptionField      = '#auditgreentip-description';
    public static $DescriptionLabel      = '[for=auditgreentip-description]';
    
    public static $DeleteProgramOption   = "#auditgreentip_program_ids_chosen [class*='close']";
    
    public static function selectProgramOption($number)             { return "#auditgreentip_program_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectProgramOptionByName($name)         { return "//*[@id='auditgreentip_program_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedProgramOption($number)           { return "#auditgreentip_program_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedProgramOptionByName($name)       { return "//*[@id='auditgreentip_program_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    public static function DeleteSelectedProgramOption($number)     { return "#auditgreentip_program_ids_chosen>ul>li.search-choice:nth-of-type($number)>a";}
    public static function DeleteSelectedProgramOptionByName($name) { return "//*[@id='auditgreentip_program_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}




}
