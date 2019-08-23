<?php
namespace Page;

class CityMessageList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess."/city-message/index";}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/city-message/index?page=$number"; }
    
    public static $Title                  = 'h1';
    public static $MessageRow             = 'table[class*=table] tbody>tr';
    public static $SummaryCount           = '.summary>b:last-of-type';
    
    public static $CreateMessageButton    = '.left-column-buttons>a.btn-green-lite';
   
    public static $IdHead          = 'table[class*=table] tr>th:first-of-type a';
    public static $CitiesHead      = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $TitleLinkHead   = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $MessageLinkHead = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $ActionsHead     = 'table[class*=table] tr>th:first-of-type';
    
    
    public static function IdLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CitiesLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function TitleLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function MessageLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)>p"; }
    public static function UpdateButtonLine($row)  { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row)  { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }
    
    public static function IdLine_ByName($message)             { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td/p/text(), '$message')]/td[1]"; }
    public static function CitiesLine_ByName($message)         { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td/p/text(), '$message')]/td[2]"; }
    public static function TitleLine_ByName($message)          { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td/p/text(), '$message')]/td[3]"; }
    public static function MessageLine_ByName($message)        { return "//table[contains(@class, 'table-striped')]//tbody/tr/td/p[text()='$message']"; }
    public static function UpdateButtonLine_ByName($message)   { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td/p/text(), '$message')]/td[5]//*[@title='Update']"; }
    public static function DeleteButtonLine_ByName($message)   { return "//table[contains(@class, 'table-striped')]//tbody/tr[contains(td/p/text(), '$message')]/td[5]//*[@title='Delete']"; }

}
