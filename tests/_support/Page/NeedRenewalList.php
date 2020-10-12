<?php
namespace Page;

class NeedRenewalList extends \AcceptanceTester
{
    public static function URL()       { return parent::$URL_UserAccess.'/default/need-renewal';}
    
    public static $Title               = 'h2';
    public static $BusinessRow         = 'table[class*=table] tbody>tr';
    public static $SummaryCount        = '.summary>b:last-of-type';
    public static $EmptyListLabel      = 'tr .empty';
   
    public static $IdHead              = 'table[class*=table] tr>th:first-of-type';
    public static $CompanyNameLinkHead = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ExpirationDateHead  = 'table[class*=table] tr>th:nth-of-type(3)';
    public static $ActionsHead         = 'table[class*=table] tr>th:nth-of-type(6)';
    
    public static $ExportToExcelButton          = 'a.btn-green-outline';
    public static $ApplyFiltersButton           = 'button.btn-green-outline[type=submit]';
    public static $ClearAllFiltersButton        = 'button.btn-green-outline:not([type])';
    
    public static $FilterTitle                       = 'p:first-of-type.green-title';
    
    public static $FilterByProgramSelect             = '#program-id';
    public static $FilterByRenewalNotificationSelect = '[name=renewal_notification]';
    public static $FilterByExtensionHistorySelect    = '[name=extension_history]';
    public static $FilterByDateFromSelect            = '#start';
    public static $FilterByDateToSelect              = '#end';
    
    public static $SelectedFilterByProgramOption             = '#program-id [selected]';
    public static $SelectedFilterByRenewalNotificationOption = '[name=renewal_notification] [selected]';
    public static $SelectedFilterByExtensionHistoryOption    = '[name=extension_history] [selected]';
    public static $SelectedFilterByDateFromOption            = '#start [selected]';
    public static $SelectedFilterByDateToOption              = '#end [selected]';
    
    public static $FilterByProgramOption             = '#program-id option';
    public static $FilterByRenewalNotificationOption = '[name=renewal_notification] option';
    public static $FilterByExtensionHistoryOption    = '[name=extension_history] option';
    public static $FilterByDateFromOption            = '#start option';
    public static $FilterByDateToOption              = '#end option';
    
    public static function filterByProgramSelectOption($number)             { return "#program-id option:nth-of-type($number)";}
    public static function filterByRenewalNotificationSelectOption($number) { return "[name=renewal_notification] option:nth-of-type($number)";}
    public static function filterByExtensionHistorySelectOption($number)    { return "[name=extension_history] option:nth-of-type($number)";}
    public static function filterByDateFromSelectOption($number)            { return "#start option:nth-of-type($number)";}
    public static function filterByDateToSelectOption($number)              { return "#end option:nth-of-type($number)";}
    
    public static $FilterByProgramLabel             = 'p:last-of-type.p-label';
    public static $FilterByRenewalNotificationLabel = 'p:nth-last-of-type(4).p-label';
    public static $FilterByExtensionHistoryLabel    = 'p:nth-last-of-type(3).p-label';
    public static $FilterByDateFromLabel            = 'p:nth-last-of-type(2).p-label';
    public static $FilterByDateToLabel              = 'p:nth-last-of-type(1).p-label';
    
    
    public static function IdLine($row)                 { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CompanyNameLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ExpirationDateLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ReNotifyDateLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function ExtendedDateLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function NotifyButtonLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6) [href*=/notify]"; }
    public static function RenotifyButtonLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6) [href*=re-notify]"; }
    public static function Extend3MonthButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6) [href*=extend]"; }
    public static function DecertifyButtonLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6) [href*=decertify]"; }
    
    public static function IdLine_ByBusName($business)                 { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[1]"; }
    public static function CompanyNameLine_ByBusName($business)        { return "//table[contains(@class, 'table')]//tbody/tr/td[2]/a[contains(text(), '$business')]"; }
    public static function ExpirationDateLine_ByBusName($business)     { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[3]"; }
    public static function ReNotifyDateLine_ByBusName($business)       { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[4]"; }
    public static function ExtendedDateLine_ByBusName($business)       { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[5]";}
    public static function NotifyButtonLine_ByBusName($business)       { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[6]/a[contains(@href, '/notify')]"; }
    public static function RenotifyButtonLine_ByBusName($business)     { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[6]/a[contains(@href, 're-notify')]"; }
    public static function Extend3MonthButtonLine_ByBusName($business) { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[6]/a[contains(@href, 'extend')]"; }
    public static function DecertifyButtonLine_ByBusName($business)    { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[6]/a[contains(@href, 'decertify')]"; }
}
