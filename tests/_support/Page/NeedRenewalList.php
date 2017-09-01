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
    
    public static function IdLine($row)                 { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CompanyNameLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ExpirationDateLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function RenotifyButtonLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4) [href*=re-notify]"; }
    public static function Extend3MonthButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4) [href*=extend]"; }
    public static function DecertifyButtonLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4) [href*=decertify]"; }
    
    public static function IdLine_ByBusName($business)                 { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[1]"; }
    public static function CompanyNameLine_ByBusName($business)        { return "//table[contains(@class, 'table')]//tbody/tr/td[2]/a[contains(text(), '$business')]"; }
    public static function ExpirationDateLine_ByBusName($business)     { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[3]"; }
    public static function RenotifyButtonLine_ByBusName($business)     { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[4]/a[contains(@href, 're-notify')]"; }
    public static function Extend3MonthButtonLine_ByBusName($business) { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[4]/a[contains(@href, 'extend')]"; }
    public static function DecertifyButtonLine_ByBusName($business)    { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/a/text(), '$business')]/td[4]/a[contains(@href, 'decertify')]"; }
}
