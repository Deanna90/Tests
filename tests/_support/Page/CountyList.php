<?php
namespace Page;

class CountyList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/county/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/county/index?page=$number"; }
    
    public static $Title                = 'h1';
    public static $CountyRow            = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    
    public static $CreateCountyButton   = 'a.btn-green-lite';
    public static $FilterButton         = 'button.btn-green-lite';
    
    public static $FilterTitle                  = 'p.green-title';
    public static $FilterByStateSelect          = '#city-state_id';
    public static $SelectedFilterByStateOption  = '#city-state_id [selected]';
    public static $FilterByStateOption          = '#city-state_id option';
    public static function filterByStateSelectOption($number)  { return "#city-state_id option:nth-of-type($number)";}
    public static $FilterByStateLabel           = 'p:nth-last-of-type(2).p-label';
   
    public static $IdHead               = 'table[class*=table] tr>th:first-of-type';
    public static $NameLinkHead         = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $StateHead            = 'table[class*=table] tr>th:nth-of-type(3)';
    public static $UpdatedLinkHead      = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $ActionsHead          = 'table[class*=table] tr>th:nth-of-type(5)';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type";  }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function StateLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function UpdatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }


}
