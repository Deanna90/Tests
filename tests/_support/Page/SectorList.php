<?php
namespace Page;

class SectorList extends \AcceptanceTester
{
    const DefaultSectorOfficeRetail              = 'Office / Retail';
    
    public static function URL()                    { return parent::$URL_UserAccess."/sector/list";}
    public static function UrlPageNumber($number)   { return parent::$URL_UserAccess."/sector/list&page=$number"; }
    public static $Title                = 'h1';
    public static $SectorRow            = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    
    //Filter
    public static $FilterTitle                  = 'p:first-of-type.green-title';
    public static $FilterByStateSelect          = '#state_id';
    public static $FilterByProgramSelect        = '#program-id';
    public static $FilterByStatusSelect         = '#status';
    
    public static $SelectedFilterByStatusOption        = '#status [selected]';
    public static $SelectedFilterByStateOption         = '#state_id [selected]';
    public static $SelectedFilterByProgramOption       = '#program-id [selected]';
    
    public static $FilterByStatusOption         = '#status option';
    public static $FilterByStateOption          = '#state_id option';
    public static $FilterByProgramOption        = '#program-id option';
    
    public static function filterByStatusSelectOption($number)        { return "#status option:nth-of-type($number)";}
    public static function filterByStateSelectOption($number)         { return "#state_id option:nth-of-type($number)";}
    public static function filterByProgramSelectOption($number)       { return "#program-id option:nth-of-type($number)";}
    
    public static $FilterByStatusLabel          = 'p:last-of-type.p-label';
    public static $FilterByStateLabel           = 'p:nth-last-of-type(6).p-label';
    public static $FilterByProgramLabel         = 'p:nth-last-of-type(3).p-label';
    
    public static $FilterButton               = '.left-column-block button';
    public static $CreateSectorButton         = '.left-column-buttons>a';
    
   
    public static $IdLinkHead               = 'table[class*=table] tr>th:first-of-type';
    public static $NameLinkHead             = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ProgramLinkHead          = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $StatusLinkHead           = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $ActionsHead              = 'table[class*=table] tr>th:nth-of-type(5)';
    
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ProgramLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }

    //By Name & Program values
    public static function IdLine_ByNameValue($name, $program)            { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$name') and contains(td[3]/text(), '$program')]/td[1]"; }
    public static function NameLine_ByNameValue($name, $program)          { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$name') and contains(td[3]/text(), '$program')]/td[2]"; }
    public static function ProgramLine_ByNameValue($name, $program)       { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$name') and contains(td[3]/text(), '$program')]/td[3]"; }
    public static function StatusLine_ByNameValue($name, $program)        { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$name') and contains(td[3]/text(), '$program')]/td[4]"; }
    public static function UpdateButtonLine_ByNameValue($name, $program)  { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$name') and contains(td[3]/text(), '$program')]//a[@title='Update']"; }
    public static function DeleteButtonLine_ByNameValue($name, $program)  { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$name') and contains(td[3]/text(), '$program')]//a[@title='Delete']"; }
    
}
