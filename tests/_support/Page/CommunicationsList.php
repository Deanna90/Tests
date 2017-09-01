<?php
namespace Page;

class CommunicationsList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/communication/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/communication/index?page=$number"; }
    
    public static $Title                          = 'h1';
    public static $EmailRow                       = 'table[class*=table] tbody>tr';
    public static $SummaryCount                   = '.summary>b:last-of-type';
    
    public static $CreateApplicantEmailButton     = 'a.btn-success';
   
    public static $SenderHead                     = 'table[class*=table] tr>th:first-of-type a';
    public static $SubjectLinkHead                = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $SentLinkHead                   = 'table[class*=table] tr>th:nth-of-type(3)';
    
    public static function SenderLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function SubjectLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function SentLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ViewButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) [title=View]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }

}
