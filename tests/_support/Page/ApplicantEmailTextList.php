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

    public static function EmailLine_ByProgramName($trigger, $program)  { return "//table//tbody/tr[contains(td[2]/text(), '$trigger') and contains(td[3]/text(), '$program')]"; }
    
    const GettingStartedMessage_Trigger      = "Getting Started message";
    const CertificationEmail_Trigger         = "Certification email";
    const PGERegisterRequest_Trigger         = "PGE Register Request";
    const AuditorRequest_Trigger             = "Auditor Request";
    const InspectorRequest_Trigger           = "Inspector Request";
    const Month3BeforeCertification_Trigger  = "Recertification Due In 3 Months";
    const RequiresRenewal_Trigger            = "Requires renewal";
    const PleaseReviewMyChecklist_Trigger    = "Please review my checklist";
    const BusinessInactive30Days_Trigger     = "Business Inactive More 30 Days";
    const BusinessTierSubmission_Trigger     = "Business Tier Submission";
    const AuditComplete_Trigger              = "Audit Complete";
    const InspectionComplete_Trigger         = "Inspection Complete";
    const BusinessRegistered_Trigger         = "Business Registered (for coordinator)";
    const BusinessHasChangedAddress_Trigger  = "Business has changed address (for coordinator)";
    const BusinessRegisterViaSpanish_Trigger = "Business Registered via the Spanish language form (for coordinator)";
}
