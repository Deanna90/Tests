<?php
namespace Page;

class ApplicantEmailTextList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/notification/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/notification/index?page=$number"; }
    
    public static $Title                         = 'h1';
    public static $EmailRow                      = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    
    public static $CreateApplicantEmailButton    = 'a.btn-success';
   
    public static $IdLinkHead     = 'table[class*=table] tr>th:first-of-type a';
    public static $EmailHead      = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $ProgramHead    = 'table[class*=table] tr>th:nth-of-type(3)';
    public static $ActionsHead    = 'table[class*=table] tr>th:last-of-type';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function EmailTitleLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ProgramLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ManageButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:last-of-type a"; }

    const GettingStartedMessage_Trigger     = "Getting Started message";
    const CertificationEmail_Trigger        = "Certification email";
    const PGERegisterRequest_Trigger        = "PGE Register Request";
    const AuditorRequest_Trigger            = "Auditor Request";
    const InspectorRequest_Trigger          = "Inspector Request";
    const Month3BeforeCertification_Trigger = "3 months before certification";
    const RequiresRenewal_Trigger           = "Requires renewal";
}
