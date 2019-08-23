<?php
namespace Page;

class CompletionNotificationsManage extends \AcceptanceTester
{
    public static function URL()               { return parent::$URL_UserAccess.'/completion-notification/index';}
    public static $Title                       = '.app-detail-title>h3';
    public static $BlockTitle                  = '.application-info h3';
    
    public static $ProgramSelect               = '#program-id';
    public static $ProgramOption               = '#program-id option';
    
    public static $CompletionNotificationsButton_LeftMenu   = '.filter-menu.tier>li:nth-of-type(1) a';
    public static $OptInButton_LeftMenu                     = '.filter-menu.tier>li:nth-of-type(2) a';
    
    public static $NewNotificationButton        = "a[href*='completion-notification/create']";
    
    public static $MessageRow                   = 'table[class*=table] tbody>tr>td:nth-of-type(2)';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function MessageLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function AuditGroupsLine($row)  { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ViewButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) [href*='view']"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [href*='update']"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [href*='delete']"; }
    
    public static function IdLine_ByMessageName($message)           { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[2]/text(), '$message')]/td[1]"; }
    public static function MessageLine_ByMessageName($message)      { return "//table[contains(@class, 'table-striped')]//tbody/tr/td[text()='$message']"; }
    public static function AuditGroupsLine_ByMessageName($message)  { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[2]/text(), '$message')]/td[3]"; }
    public static function ViewButtonLine_ByMessageName($message)   { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[2]/text(), '$message')]//a[contains(@href, 'view')]"; }
    public static function UpdateButtonLine_ByMessageName($message) { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[2]/text(), '$message')]//a[contains(@href, 'update')]"; }
    public static function DeleteButtonLine_ByMessageName($message) { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[2]/text(), '$message')]//a[contains(@href, 'delete')]"; }
    
}
