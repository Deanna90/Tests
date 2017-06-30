<?php
namespace Page;

class GlobalVariableList extends \AcceptanceTester
{
    public static function URL()     { return parent::$URL_UserAccess."/global-variable/index";}
    public static $Title                         = 'h1';
    public static $GlobalVariableRow             = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    
    public static $SearchByKeywordField          = '#dynamicmodel-description';
    
    public static $CreateGlobalVariableButton    = '.left-column-block .btn-success';
    public static $FilterButton                  = '#dynamicmodel-description';
    
   
    public static $IdLinkHead               = 'table[class*=table] tr>th:first-of-type a';
    public static $TitleLinkHead            = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $NameLinkHead             = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $ValueLinkHead            = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $UnitsStringHead          = 'table[class*=table] tr>th:nth-of-type(5)';
    public static $StatusLinkHead           = 'table[class*=table] tr>th:nth-of-type(7) a';
    public static $TargetTypeLinkHead       = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $TargetIDLinkHead         = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $ActionsHead              = 'table[class*=table] tr>th:nth-of-type(8)';
    
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function TitleLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ValueLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function UnitsStringLine($row)  { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function TargetTypeLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7)"; }
    public static function TargetIDLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(8)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }
}
