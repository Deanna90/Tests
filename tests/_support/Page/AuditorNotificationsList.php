<?php
namespace Page;

class AuditorNotificationsList extends \AcceptanceTester
{
    public static function URL()                    { return parent::$URL_UserAccess.'/communication/notification-report?trigger=6';}
    public static function URL_AuditComplete()      { return parent::$URL_UserAccess.'/communication/notification-report?trigger=14';}
    public static $Title                         = 'h1';
    public static $RequestRow                    = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    public static $EmptyListLabel                = 'tr .empty';
    
    public static $ExportToExcelButton           = 'a.btn-green-lite';
    public static $ApplyFiltersButton            = 'button.btn-green-outline[type=submit]';
    public static $ClearAllFiltersButton         = 'button.btn-green-outline:not([type])';
    
    public static $FilterTitle                   = 'p:first-of-type.green-title';
    public static $SearchTitle                   = 'p:nth-of-type(3).green-title';
    public static $FilterByProgramSelect         = '#program-id';
    
    public static $SearchByKeywordField          = '#dynamicmodel-description';
    public static $SearchByNumberField           = '#dynamicmodel-id';
    
    public static $SelectedFilterByProgramOption = '#program-id [selected]';
    
    public static $FilterByProgramOption         = '#program-id option';
    
    public static function filterByProgramSelectOption($number)       { return "#program-id option:nth-of-type($number)";}
    
    public static $FilterByProgramLabel         = 'p:nth-last-of-type(3).p-label';
    public static $SearchByKeywordLabel         = 'p:nth-of-type(2).p-label';
    public static $SearchByNumberLabel          = 'p:nth-of-type(4).p-label';
    
   
    public static $ProgramLinkHead              = 'table[class*=table] tr>th:first-of-type a';
    public static $BusinessLinkHead             = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $AuditorLinkHead              = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $AuditorEmailLinkHead         = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $AuditOrganizationLinkHead    = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $SentLinkHead                 = 'table[class*=table] tr>th:nth-of-type(6) a';
    
    public static function ProgramLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function BusinessLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function AuditorLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function AuditorEmailLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function AuditOrganizationLine($row)  { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function SentLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    
    //By description value
//    public static function IdLine_ByTitleValue($title)              { return "//table//tbody/tr[contains(td[2]/text(), '$title')]/td[1]"; }
//    public static function MeasureLine_ByTitleValue($title)         { return "//table//tbody/tr[contains(td[2]/text(), '$title')]/td[2]"; }
//    public static function DescriptionLine_ByTitleValue($title)     { return "//table//tbody/tr[contains(td[2]/text(), '$title')]/td[3]"; }
//    public static function StatusLine_ByTitleValue($title)          { return "//table//tbody/tr[contains(td[2]/text(), '$title')]/td[4]"; }
//    public static function CreatedLine_ByTitleValue($title)         { return "//table//tbody/tr[contains(td[2]/text(), '$title')]/td[5]"; }
//    public static function UpdatedLine_ByTitleValue($title)         { return "//table//tbody/tr[contains(td[2]/text(), '$title')]/td[6]"; }
//    public static function UpdateButtonLine_ByTitleValue($title)    { return "//table//tbody/tr[contains(td[2]/text(), '$title')]//*[@title='Update']"; }
//    public static function DeleteButtonLine_ByTitleValue($title)    { return "//table//tbody/tr[contains(td[2]/text(), '$title')]//*[@title='Delete']"; }

}
