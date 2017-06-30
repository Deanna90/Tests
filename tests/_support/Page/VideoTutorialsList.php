<?php
namespace Page;

class VideoTutorialsList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/video/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/video/index?page=$number"; }
    
    public static $Title                = 'h1';
    public static $VideoRow             = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    
    public static $CreateVideoButton    = 'a.btn-green-lite';
    
   
    public static $IdLinkHead           = 'table[class*=table] tr>th:first-of-type a';
    public static $TitleLinkHead        = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $StatusLinkHead       = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $CreatedOnLinkHead    = 'table[class*=table] tr>th:nth-last-of-type(2) a';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function VideoLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2) img"; }
    public static function TitleLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function CreatedOnLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-last-of-type(2)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function ViewButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) [title=View]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }

    //Filter
    public static $FilterTitle                    = 'p:first-of-type.green-title';
    
    public static $FilterByCategorySelect         = '#dynamicmodel-category_id';
    public static $SelectedFilterByCategoryOption = '#dynamicmodel-category_id [selected]';
    public static $FilterByCategoryOption         = '#dynamicmodel-category_id option';
    public static $FilterByCategoryLabel          = 'p:last-of-type.p-label';
}
