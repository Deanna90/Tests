<?php
namespace Page;

class ChecklistList extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/checklist/list';}
    public static $Title                = 'h1';
    public static $ChecklistRow         = 'table[class*=table] tbody>tr';
    
    public static $CreateChecklistButton         = 'a.btn-green-outline';
    public static $FilterButton                  = 'button.btn-green-lite[type=submit]';
    public static $ClearAllFiltersButton         = 'button.btn-green-outline:not([type])';
    
    public static $FilterTitle                   = 'p:first-of-type.green-title';
    public static $FilterByStateSelect           = '#state_id';
    public static $FilterByStatusSelect          = '#dynamicmodel-version_status';
    public static $FilterByProgramSelect         = '#dynamicmodel-program_id';
    public static $FilterByOptInSelect           = '#dynamicmodel-opt_in';
    
    public static $SelectedFilterByStatusOption  = '#status [selected]';
    public static $SelectedFilterByStateOption   = '#state_id [selected]';
    public static $SelectedFilterByProgramOption = '#dynamicmodel-program_id [selected]';
    public static $SelectedFilterByOptInOption   = '#dynamicmodel-opt_in [selected]';
    
    public static $FilterByStatusOption          = '#dynamicmodel-version_status option';
    public static $FilterByStateOption           = '#state_id option';
    public static $FilterByProgramOption         = '#dynamicmodel-program_id option';
    public static $FilterByOptInOption           = '#dynamicmodel-opt_in option';
    
    public static function filterByStatusSelectOption($number)  { return "#status option:nth-of-type($number)";}
    public static function filterByStateSelectOption($number)   { return "#state_id option:nth-of-type($number)";}
    public static function filterByProgramSelectOption($number) { return "#dynamicmodel-program_id option:nth-of-type($number)";}
    public static function filterByOptInSelectOption($number)   { return "#dynamicmodel-opt_in option:nth-of-type($number)";}
    
    public static $FilterByStatusLabel          = 'p:nth-last-of-type(3).p-label';
    public static $FilterByStateLabel           = 'p:nth-last-of-type(2).p-label';
    public static $FilterByProgramLabel         = 'p:nth-last-of-type(4).p-label';
    public static $FilterByOptInLabel           = 'p:last-of-type.p-label';
    
    public static $IdLinkHead                   = 'table[class*=table] tr>th:first-of-type';
    public static $NameHead                     = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ActionsHead                  = 'table[class*=table] tr>th:nth-of-type(3) a';
    
    public static function IdLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function ProgramLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function SectorLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function TierLine($row)          { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function VersionStatusLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function UpdatedLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function ManageButtonLine($row)  { return "table[class*=table] tbody>tr:nth-of-type($row) a"; }

    public static function IdByIdLine($id)            { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$id')]/td[1]"; }
    public static function ProgramByIdLine($id)       { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$id')]/td[2]"; }
    public static function SectorByIdLine($id)        { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$id')]/td[3]"; }
    public static function TierByIdLine($id)          { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$id')]/td[4]"; }
    public static function VersionStatusByIdLine($id) { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$id')]/td[5]"; }
    public static function UpdatedByIdLine($id)       { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$id')]/td[6]"; }
    public static function ManageButtonByIdLine($id)  { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$id')]//a"; }
}
