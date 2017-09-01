<?php
namespace Page;

class ResourceList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/resource/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/resource/index?page=$number"; }
    
    public static $Title                = 'h1';
    public static $ResourceRow          = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    public static $EmptyListLabel               = 'tr .empty';
   
    public static $CreateResourceButton = 'a.btn-success';
    
    public static $IdLinkHead               = 'table[class*=table] tr>th:first-of-type a';
    public static $TitleLinkHead            = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ShortDescriptionLinkHead = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $ContentLinkHead          = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $AttachmentTitleLinkHead  = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $ActionsHead              = 'table[class*=table] tr>th:nth-of-type(6)';
    
    public static function IdLine($row)                   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function TitleLine($row)                { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ShortDescriptionLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ContentLine($row)              { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function AttachmentTitleLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function UpdateButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }
    
    public static function IdLine_ByTitle($title)                { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$title')]/td[1]"; }
    public static function TitleLine_ByTitle($title)             { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$title')]/td[2]"; }
    public static function ShortDescriptionLine_ByTitle($title)  { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$title')]/td[3]"; }
    public static function ContentLine_ByTitle($title)           { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$title')]/td[4]"; }
    public static function AttachmentTitleLine_ByTitle($title)   { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$title')]/td[5]"; }
    public static function UpdateButtonLine_ByTitle($title)      { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$title')]/td[6]//*[@title='Update']"; }
    public static function DeleteButtonLine_ByTitle($title)      { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$title')]/td[6]//*[@title='Delete']"; }
}
