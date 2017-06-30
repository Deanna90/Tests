<?php
namespace Page;

class SavingAreaList extends \AcceptanceTester
{
    public static function URL()                 { return parent::$URL_UserAccess."/saving-area/index";}
    public static $Title                         = 'h1';
    public static $SavingAreaRow                 = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    
    public static $CreateSavingAreaButton        = 'a.btn-green-lite';
    
   
    public static $IdLinkHead                       = 'table[class*=table] tr>th:first-of-type a';
    public static $NameLinkHead                     = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $HasVisualRepresentationLinkHead  = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $StatusLinkHead                   = 'table[class*=table] tr>th:nth-of-type(7) a';
    
    
    public static function IdLine($row)                       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function NameLine($row)                     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function HasVisualRepresentationLine($row)  { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function StatusLine($row)                   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function UpdateButtonLine($row)             { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
}
