<?php
namespace Page;

class SourceProgramList extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/landing-map-program/index';}
    
    public static $Title                = 'h1';
    public static $StateRow             = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
   
    public static $CreateSourceProgramButton = 'a.btn-success';
    
    public static $IdLinkHead           = 'table[class*=table] tr>th:first-of-type a';
    public static $SubdomainLinkHead    = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $TitleLinkHead        = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $ColorLinkHead        = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $StatusLinkHead       = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $CreatedLinkHead      = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $UpdatedLinkHead      = 'table[class*=table] tr>th:nth-of-type(7) a';
    
    public static function IdLine($row)                   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function SubdomainLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function TitleLine($row)                { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ColorLine($row)                { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4) div"; }
    public static function StatusLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function CreatedLine($row)              { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function UpdatedLine($row)              { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7)"; }
    public static function UpdateButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }
    
    public static function IdLine_ByTitle($title)               { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[1]"; }
    public static function SubdomainLine_ByTitle($title)        { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[2]"; }
    public static function TitleLine_ByTitle($title)            { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[3]"; }
    public static function ColorLine_ByTitle($title)            { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[4]/div"; }
    public static function StatusLine_ByTitle($title)           { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[5]"; }
    public static function CreatedLine_ByTitle($title)          { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[6]"; }
    public static function UpdatedLine_ByTitle($title)          { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[7]"; }
    public static function UpdateButtonLine_ByTitle($title)     { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[8]//*[@title='Update']"; }
    public static function DeleteButtonLine_ByTitle($title)     { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[3]/text(), '$title')]/td[8]//*[@title='Delete']"; }

}
