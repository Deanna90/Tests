<?php
namespace Page;

class ApplicationDirectionsList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/cms/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/cms/index?page=$number"; }
    
    const Key_YourNextSteps  = 'Your Next Steps';
    const Key_UsefulTips     = 'Useful Tips';
    const Key_GetStartedText = 'Get Started Text';
    const Key_ContactText    = 'Contact Text';


    public static $Title                         = 'h1';
    public static $ApplicationDirectionRow       = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    
    public static $IdLinkHead     = 'table[class*=table] tr>th:first-of-type a';
    public static $StateHead      = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $KeyHead        = 'table[class*=table] tr>th:nth-of-type(3)';
    public static $ActionsHead    = 'table[class*=table] tr>th:last-of-type';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function StateLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function KeyLine($row)          { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ManageButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:last-of-type a"; }

}
