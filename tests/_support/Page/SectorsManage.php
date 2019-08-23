<?php
namespace Page;

class SectorsManage extends \AcceptanceTester
{
    public static function URL()                    { return parent::$URL_UserAccess."/sector/manage-program";}
    public static function UrlPageNumber($number)   { return parent::$URL_UserAccess."/sector/manage-program?page=$number"; }
    public static $Title                        = 'h1';
    public static $SectorRow                    = 'table[class*=table] tbody>tr';
    public static $SummaryCount                 = '.summary>b:last-of-type';
    public static $EmptyListLabel               = 'tr .empty';
    
    //Filter
    public static $FilterTitle                  = 'p:first-of-type.green-title';
    public static $FilterByStateSelect          = '#relsectortoprogram-state_id';
    public static $FilterByProgramSelect        = '#relsectortoprogram-program_id';
    public static $FilterBySectorSelect         = '#relsectortoprogram-sector_id';
    
    public static $SelectedFilterBySectorOption        = '#relsectortoprogram-sector_id [selected]';
    public static $SelectedFilterByStateOption         = '#relsectortoprogram-state_id [selected]';
    public static $SelectedFilterByProgramOption       = '#relsectortoprogram-program_id [selected]';
    
    public static $FilterBySectorOption         = '#relsectortoprogram-sector_id option';
    public static $FilterByStateOption          = '#relsectortoprogram-state_id option';
    public static $FilterByProgramOption        = '#relsectortoprogram-program_id option';
    
    public static function filterBySectorSelectOption($number)        { return "#relsectortoprogram-sector_id option:nth-of-type($number)";}
    public static function filterByStateSelectOption($number)         { return "#relsectortoprogram-state_id option:nth-of-type($number)";}
    public static function filterByProgramSelectOption($number)       { return "#relsectortoprogram-program_id option:nth-of-type($number)";}
    
    public static $FilterBySectorLabel          = 'p:last-of-type.p-label';
    public static $FilterByStateLabel           = 'p:nth-last-of-type(6).p-label';
    public static $FilterByProgramLabel         = 'p:nth-last-of-type(3).p-label';
    
    public static $FilterButton               = '.left-column-block button';
    public static $CreateSectorButton         = '.left-column-buttons>a';
    
   
    public static $ProgramLinkHead            = 'table[class*=table] tr>th:nth-of-type(1) a';
    public static $SectorLinkHead             = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ActionsHead                = 'table[class*=table] tr>th:nth-of-type(3)';
    
    
    public static function ProgramLine($row)              { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function SectorLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ToggleButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3) #undefined_switch_control"; }

    //By Name & Program values
    public static function ProgramLine_ByNameValue($program, $sector)      { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[1]/text(), '$program') and contains(td[2]/text(), '$sector')]/td[1]"; }
    public static function SectorLine_ByNameValue($program, $sector)       { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[1]/text(), '$program') and contains(td[2]/text(), '$sector')]/td[2]"; }
    public static function ToggleButtonLine_ByNameValue($program, $sector) { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[1]/text(), '$program') and contains(td[2]/text(), '$sector')]/td[4]/div"; }
    

}
