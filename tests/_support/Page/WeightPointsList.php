<?php
namespace Page;

class WeightPointsList extends \AcceptanceTester
{
    public static function URL()            { return parent::$URL_UserAccess.'/measure-weight-points/states';}
    
    public static $Title                    = 'h1';
    public static $WeightedQuestionStateRow = 'table[class*=table] tbody>tr';
    public static $SummaryCount             = '.summary>b:last-of-type';
    public static $EmptyListLabel               = 'tr .empty';
   
    public static $IdLinkHead               = 'table[class*=table] tr>th:first-of-type';
    public static $NameLinkHead             = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $MaxPointsHead            = 'table[class*=table] tr>th:nth-of-type(3) a';
    
    public static function IdLine($row)                   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function IdLine_ByName($name)           { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[1]"; }
    public static function NameLine($row)                 { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function NameLine_ByName($name)         { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[2]"; }
    public static function MaxPointsLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function MaxPoints_ByName($name)        { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[3]"; }
    public static function ManageButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) a.lite-green"; }
    public static function ManageButtonLine_ByName($name) { return "//*[@class='right-column-checklist']//tbody/tr[contains(td[2]/text(), '$name')]/td[4]/a"; }
    


}
