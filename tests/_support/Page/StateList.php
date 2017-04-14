<?php
namespace Page;

class StateList extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/state/index';}
    public static $Title                = 'h1';
    public static $StateRow             = 'table[class*=table] tbody>tr';
    
    public static $CreateStateButton    = 'a.btn-green-lite';
   
    public static $IdHead               = 'table[class*=table] tr>th:first-of-type';
    public static $NameLinkHead         = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ShortNameLinkHead    = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $CreatedLinkHead      = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $UpdatedLinkHead      = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $StatusLinkHead       = 'table[class*=table] tr>th:nth-of-type(6) a';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ShortNameLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function CreatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function UpdatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function ViewButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) [title=View]"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }

}
