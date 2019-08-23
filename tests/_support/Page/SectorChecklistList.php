<?php
namespace Page;

class SectorChecklistList extends \AcceptanceTester
{
    public static function URL()          { return parent::$URL_UserAccess.'/checklist/sector-checklists';}
    public static $Title                  = 'h1';
    public static $SectorChecklistRow     = 'table[class*=table] tbody>tr';
    
    public static $CreateSectorChecklistButton  = 'a.btn-green-outline';
    public static $ApplyFiltersButton           = 'button.btn-green-outline[type=submit]';
    public static $ClearAllFiltersButton        = 'button.btn-green-outline:not([type])';
    
    public static $AddMeasureButton     = 'a[href*=add-measures]';
    public static $RemoveMeasureButton  = 'a[href*=remove-measures]';
    
    public static $FilterTitle                  = 'p:first-of-type.green-title';
    public static $SearchTitle                  = 'p:nth-of-type(3).green-title';
    public static $FilterByStateSelect          = '#state_id';
    public static $FilterBySectorSelect         = '#sector-id';
    public static $FilterByVersionStatusSelect  = '#dynamicmodel-version_status';
    
    public static $SelectedFilterBySectorOption        = '#sector-id [selected]';
    public static $SelectedFilterByStateOption         = '#state_id [selected]';
    public static $SelectedFilterByVersionStatusOption = '#dynamicmodel-version_status [selected]';
    
    public static $FilterBySectorOption         = '#sector-id option';
    public static $FilterByStateOption          = '#state_id option';
    public static $FilterByVersionStatusOption  = '#dynamicmodel-version_status option';
    
    public static function filterByVersionStatusSelectOption($number)  { return "#dynamicmodel-version_status option:nth-of-type($number)";}
    public static function filterBySectorSelectOption($number)         { return "#sector-id option:nth-of-type($number)";}
    public static function filterByStateSelectOption($number)          { return "#state_id option:nth-of-type($number)";}
    
    public static $FilterBySectorLabel          = 'p:last-of-type.p-label';
    public static $FilterByStateLabel           = 'p:nth-last-of-type(2).p-label';
    public static $FilterByVersionStatusLabel   = 'p:nth-last-of-type(2).p-label';
   
    public static $IdLinkHead                   = 'table[class*=table] tr>th:first-of-type a';
    public static $SectorHead                   = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $NameHead                     = 'table[class*=table] tr>th:nth-of-type(3)';
    public static $ActionsHead                  = 'table[class*=table] tr>th:nth-of-type(4)';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function SectorLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function TierLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ManageButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) a[title=Manage]"; }
    public static function CopyButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) a[title=Copy]"; }
    public static function ViewButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) a[title=View]"; }
    public static function SummaryButtonLine($row){ return "table[class*=table] tbody>tr:nth-of-type($row) a[title=History]"; }
    
    public static function IdByIdLine($id)            { return "//*[@id='w1']/table/tbody/tr[contains(td/text(), '$id')]/td[1]"; }
    public static function SectorByIdLine($id)        { return "//*[@id='w1']/table/tbody/tr[contains(td/text(), '$id')]/td[2]"; }
    public static function TierByIdLine($id)          { return "//*[@id='w1']/table/tbody/tr[contains(td/text(), '$id')]/td[3]"; }
    public static function ManageButtonByIdLine($id)  { return "//*[@id='w1']/table/tbody/tr[contains(td/text(), '$id')]//a[title='Manage'']"; }
    public static function CopyButtonByIdLine($id)    { return "//*[@id='w1']/table/tbody/tr[contains(td/text(), '$id')]//a[title='Copy']"; }
    public static function ViewButtonByIdLine($id)    { return "//*[@id='w1']/table/tbody/tr[contains(td/text(), '$id')]//a[title='View']"; }
    public static function SummaryButtonByIdLine($id) { return "//*[@id='w1']/table/tbody/tr[contains(td/text(), '$id')]//a[title='History]"; }
    
    public static function Id_BySect_Tier_Line($sector, $tier)            { return "//*[@id='w1']/table/tbody/tr[contains(td[2]/text(), '$sector') and contains(td[3]/text(), '$tier')]/td[1]"; }
    public static function Sector_BySect_Tier_Line($sector, $tier)        { return "//*[@id='w1']/table/tbody/tr[contains(td[2]/text(), '$sector') and contains(td[3]/text(), '$tier')]/td[2]"; }
    public static function Tier_BySect_Tier_Line($sector, $tier)          { return "//*[@id='w1']/table/tbody/tr[contains(td[2]/text(), '$sector') and contains(td[3]/text(), '$tier')]/td[3]"; }
    public static function ManageButton_BySect_Tier_Line($sector, $tier)  { return "//*[@id='w1']/table/tbody/tr[contains(td[2]/text(), '$sector') and contains(td[3]/text(), '$tier')]//a[title='Manage]"; }
    public static function CopyButton_BySect_Tier_Line($sector, $tier)    { return "//*[@id='w1']/table/tbody/tr[contains(td[2]/text(), '$sector') and contains(td[3]/text(), '$tier')]//a[title='Copy]"; }
    public static function ViewButton_BySect_Tier_Line($sector, $tier)    { return "//*[@id='w1']/table/tbody/tr[contains(td[2]/text(), '$sector') and contains(td[3]/text(), '$tier')]//a[title='View]"; }
    public static function SummaryButton_BySect_Tier_Line($sector, $tier) { return "//*[@id='w1']/table/tbody/tr[contains(td[2]/text(), '$sector') and contains(td[3]/text(), '$tier')]//a[title='History]"; }

    //Copy Sector Checklist Popup
    public static $CopySectorChecklistPopup                             = '.modal.in';
    public static $CopySectorChecklistPopup_Title                       = '.modal.in h2';
    public static $CopySectorChecklistPopup_FromSectorSelect            = ".modal.in [name='sector_id']";
    public static $CopySectorChecklistPopup_ToSectorSelect              = ".modal.in [name='target_sector_id']";
    public static $CopySectorChecklistPopup_ToSectorOption              = ".modal.in [name='target_sector_id'] option";
    public static $CopySectorChecklistPopup_CopyButton                  = '.modal.in button[type=submit]';
    public static $CopySectorChecklistPopup_CloseButton                 = '.modal.in .close';
    
}
