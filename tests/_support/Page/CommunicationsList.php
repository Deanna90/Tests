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
    
    public static $SubjectColumnRow               = 'table[class*=table] tbody>tr>td:nth-of-type(2)';
    
    public static function SenderLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function SubjectLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function SentLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ViewButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) [title=View]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }
    
    public static function SubjectLine_ByName($subject)   { return "//table[contains(@class, 'table-striped')]//tbody/tr/td[text()='$subject']"; }
    
    public static function SenderLine_BySubject_CommunicationTab($subject)       { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$subject')]/td[1]"; }
    public static function SubjectLine_BySubject_CommunicationTab($subject)      { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$subject')]/td[2]"; }
    public static function SentLine_BySubject_CommunicationTab($subject)         { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$subject')]/td[3]"; }
    public static function DeleteButtonLine_BySubject_CommunicationTab($subject) { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$subject')]/td//*[@title='Delete']"; }
    public static function ViewButtonLine_BySubject_CommunicationTab($subject)   { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$subject')]/td//*[@title='View']"; }
   

}
