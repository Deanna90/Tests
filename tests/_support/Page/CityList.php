<?php
namespace Page;

class CityList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/city/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/city/index?page=$number"; }
    
    public static $Title                = 'h1';
    public static $CityRow              = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    
    public static $CreateCityButton     = 'a.btn-green-lite';
    public static $FilterButton         = 'button.btn-green-lite';
    
    public static $FilterTitle                  = 'p.green-title';
    public static $FilterByStatusSelect         = '#city-status';
    public static $FilterByStateSelect          = '#city-state_id';
    public static $SelectedFilterByStatusOption = '#city-status [selected]';
    public static $SelectedFilterByStateOption  = '#city-state_id [selected]';
    public static $FilterByStatusOption         = '#city-status option';
    public static $FilterByStateOption          = '#city-state_id option';
    public static function filterByStatusSelectOption($number) { return "#city-status option:nth-of-type($number)";}
    public static function filterByStateSelectOption($number)  { return "#city-state_id option:nth-of-type($number)";}
    public static $FilterByStatusLabel          = 'p:last-of-type.p-label';
    public static $FilterByStateLabel           = 'p:nth-last-of-type(2).p-label';
   
    public static $IdHead               = 'table[class*=table] tr>th:first-of-type';
    public static $NameLinkHead         = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $StateLinkHead        = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $CreatedLinkHead      = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $UpdatedLinkHead      = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $StatusHead           = 'table[class*=table] tr>th:nth-of-type(6)';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type";  }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function StateLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ZipsLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function CreatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function UpdatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }


}
