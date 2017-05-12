<?php
namespace Page;

class AuditGreenTipUpdate extends \AcceptanceTester
{
    public static function URL($id)         { return parent::$URL_UserAccess."/audit-green-tip/update?id=$id";}
    public static $Title                    = 'h1';
    
    public static $UpdateButton                  = '.audit-green-tip-update [type=submit]';
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

    public static $AuditGroupHeadTitle                    = '.title-block>div:last-of-type .panel-heading';
    public static $AddAuditGroupButton                    = "[data-target='#add-audit-modal']";
    public static $AuditGroupSelect_AddAuditGroupPopup    = '#relaudittoauditgreentip-audit_group_id';
    public static $AuditSubgroupSelect_AddAuditGroupPopup = '#subgroups';
    public static $AddButton_AddAuditGroupPopup           = '[name=add-audit]';
    
    public static $AuditSubgroupOption_AddAuditGroupPopup = '#subgroups option';
    public static function selectAuditSubgroupOption($number)           { return "#subgroups>option:nth-of-type($number)";}
    public static function selectAuditSubgroupOption_ByName($subgroup)  { return "//*[@id='subgroups']/option[contains(text(), '$subgroup')]";}
    
    public static function AuditGroupAndSubgrouopLine_ByName($name)             { return "//li[contains(text(), '$name')]";}
    public static function DeleteAuditGroupAndSubgroupButtonLine_ByName($name)  { return "//li[contains(text(), '$name')]/a";}


}
