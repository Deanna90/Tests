<?php
namespace Page;

class CompletionNotificationsOptInSettings extends \AcceptanceTester
{
    public static function URL()                    { return parent::$URL_UserAccess."/completion-notification/opt-in";}
    public static function UrlPageNumber($number)   { return parent::$URL_UserAccess."/completion-notification/opt-in?page=$number"; }
    public static $Title                        = 'h1';
    public static $ProgramRow                   = 'table[class*=table] tbody>tr';
    public static $EmptyListLabel               = 'tr .empty';
    
   
    public static $ProgramLinkHead              = 'table[class*=table] tr>th:nth-of-type(1) a';
    public static $CompleteAuditGroupHead       = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $ReachPointsHead              = 'table[class*=table] tr>th:nth-of-type(3)';
    
    
    public static function ProgramLine($row)                        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CompleteAuditGroupToggleButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2) #undefined_switch_control"; }
    public static function ReachPointsToggleButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3) #undefined_switch_control"; }

    //By Name & Program values
    public static function ProgramLine_ByNameValue($program)                        { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[1]/text(), '$program')]/td[1]"; }
    public static function CompleteAuditGroupToggleButtonLine_ByNameValue($program) { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[1]/text(), '$program')]/td[2]/div"; }
    public static function ReachPointsToggleButtonLine_ByNameValue($program)        { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[1]/text(), '$program')]/td[3]/div"; }
    
    public static function CompleteAuditGroupToggleButtonSelectLine_ByNameValue($program) { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[1]/text(), '$program')]/td[2]/select"; }
    public static function ReachPointsToggleButtonSelectLine_ByNameValue($program)        { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td[1]/text(), '$program')]/td[3]/select"; }
    
}
