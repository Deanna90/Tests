<?php
namespace Page;

class PopupThermOptionList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/popup-therm/manage-option';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/popup-therm/manage-option?page=$number"; }
    
    public static $Title                = 'h1';
    public static $ThermOptionRow       = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    public static $EmptyListLabel               = 'tr .empty';
    
    public static $CreatePopupThermsOptionButton    = '.left-column-buttons .btn-success';
   
    public static $IdLinkHead           = 'table[class*=table] tr>th:first-of-type a';
    public static $NameLinkHead         = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ThermsCountLinkHead  = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $StatusLinkHead       = 'table[class*=table] tr>th:nth-of-type(4) a';
    
    public static function IdLine($row)                   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function IdLine_ByName($name)           { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[1]"; }
    public static function NameLine($row)                 { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function NameLine_ByName($name)         { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[2]"; }
    public static function ThermsCountLine($row)          { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ThermsCount_ByName($name)      { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[3]"; }
    public static function StatusLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function StatusLine_ByName($name)       { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[4]"; }
    public static function UpdateButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function UpdateButtonLine_ByName($name) { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]//a[@title='Update']"; }
    public static function DeleteButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }
    public static function DeleteButtonLine_ByName($name) { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]//a[@title='Delete']"; }
    
    

}
