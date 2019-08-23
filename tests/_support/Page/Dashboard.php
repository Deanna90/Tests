<?php
namespace Page;

class Dashboard extends \AcceptanceTester
{
    public static function URL()          { return parent::$URL_UserAccess.'/default/index';}
    public static function URL_InspAud()  { return parent::$URL_UserAccess.'/dashboard';}
    
    const NoChecklistText            = 'No checklist! Sorry but we don`t have a checklist for business.';
    
    public static $NeedRenewalBusinessesAlert       = '.dashboard .alert';
    public static $LinkToNeedRenewalListInAlert     = '.dashboard .alert a';
    
    //Filter Items
    const All_Filter                  = 'ALL';
    const InProcess_Filter            = 'In process';
    const ChecklistSubmission1_Filter = 'Checklist Submission Tier 1';
    const ChecklistSubmission2_Filter = 'Checklist Submission Tier 2';
    const ChecklistSubmission3_Filter = 'Checklist Submission Tier 3';
    const Recertification_Filter      = 'Recertification';
    const PhoneConsult_Filter         = 'Phone Consult';
    const SiteVisit_Filter            = 'Site Visit';
    const Audit_Filter                = 'Audit';
    const ComplianceCheck_Filter      = 'Compliance Check';
    const Tier1_Filter                = 'Tier 1';
    const Tier2_Filter                = 'Tier 2';
    const Tier3_Filter                = 'Tier 3';
    const Recognized_Filter           = 'Recognized';
    const PendingRenewals_Filter      = 'Pending Renewals';
    const Decertified_Filter          = 'Decertified';
    const Disqualified_Filter         = 'Disqualified';
    const Nonresponsive_Filter        = 'Nonresponsive';
    const MovedClosed_Filter          = 'Moved/Closed';
    const NotSuitable_Filter          = 'Not Suitable';
    
    //Statuses
    const InProcessStatus            = 'In process';
    const InProgressStatus           = 'In progress';
    const PassedStatus               = 'Passed';
    
    public static function BusinessLink_ByBusName($business)             { return "//h4/a[text()='$business']";}
    public static function MeasuresCompletedInfo_ByBusName($business)    { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div/span";}
    public static function MeasuresCompleted_ProgressBar_ByBusName($business)    { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div//*[@class='progress-wrapper']/div/div";}
    public static function NoChecklistInfo_ByBusName($business)          { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/p";}
    public static function StatusOfBusiness_ByBusName($business)         { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[2]//strong";}
    public static function Date_StatusOfBus_ByBusName($business)         { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[2]//span";}
    public static function TierName_ByBusName($business)                 { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[3]//strong";}
    public static function TierStatus_ByBusName($business)               { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[3]//div/span";}
    public static function AddressOfBusiness_ByBusName($business)        { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div/div";}
    public static function SectorOfBusiness_ByBusName($business)         { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[2]/span";}
    public static function BusinessType_ByBusName($business)             { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[3]/span";}
    public static function BusinessCategory_ByBusName($business)         { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[4]/span";}
    public static function StatusOfAudits_ByBusName($business)           { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[1]/p[2]";}
    public static function StatusOfApplication_ByBusName($business)      { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[2]/p[2]";}
    public static function StatusOfCompliance_ByBusName($business)       { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[3]/div[1]/p[2]";}
    public static function Date_StatusOfAudits_ByBusName($business)      { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[1]/p[3]";}
    public static function Date_StatusOfApplication_ByBusName($business) { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[2]/p[3]";}
    public static function Date_StatusOfCompliance_ByBusName($business)  { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[3]/div[1]/p[3]";}
    public static function CertificationDate_ByBusName($business)        { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[3]/p[2]";}

    public static function BusinessInfoLabel_ByBusName($business)        { return "//div[contains(h4/a/text(), '$business')]//h5";}
    public static function SectorOfBusinessLabel_ByBusName($business)    { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[2]/p";}
    public static function BusinessTypeLabel_ByBusName($business)        { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[3]/p";}
    public static function BusinessCategoryLabel_ByBusName($business)    { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[4]/p";}
    public static function StatusOfAuditsLabel_ByBusName($business)      { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[1]/p[1]";}
    public static function StatusOfApplicationLabel_ByBusName($business) { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[2]/p[1]";}
    public static function StatusOfComplianceLabel_ByBusName($business)  { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[3]/div[1]/p[1]";}
    public static function CertificationDateLabel_ByBusName($business)   { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[3]/p[1]";}
    
    //Filter
    public static function FilterItem_ByFilterName($filter)                   { return "//ul[@class='filter-menu']/li/label[contains(text(),'$filter')]";}
    public static function FilterItemCount_ByFilterName($filter)              { return "//ul[@class='filter-menu']/li/label[contains(text(),'$filter')]/span";}
    public static function FilterSubItem_ByFilterName($filter, $subitem)      { return "//ul[@class='filter-menu']/li[contains(label/text(),'$filter')]//*[@class='sub-filter-menu']/li/label[contains(text(), '$subitem')]";}
    public static function FilterSubItemCount_ByFilterName($filter, $subitem) { return "//ul[@class='filter-menu']/li[contains(label/text(),'$filter')]//*[@class='sub-filter-menu']/li/label[contains(text(), '$subitem')]/span";}

    //----------------------------Inspector dashboard---------------------------
    public static $CompanyHead                  = 'form table tr>th:first-of-type';
    public static $CityHead                     = 'form table tr>th:nth-of-type(2)';
    public static $AddressHead                  = 'form table tr>th:nth-of-type(3)';
    public static $ContactHead                  = 'form table tr>th:nth-last-of-type(8)';
    public static $PhoneHead                    = 'form table tr>th:nth-last-of-type(7)';
    public static $EmailHead                    = 'form table tr>th:nth-last-of-type(6)';
    public static $ReviewTypeLinkHead           = 'form table tr>th:nth-last-of-type(5) a';
    public static $AuditStatusLinkHead          = 'form table tr>th:nth-last-of-type(4) a';
    public static $AuditReadyDateLinkHead       = 'form table tr>th:nth-last-of-type(3) a';
    public static $CompletionDateLinkHead       = 'form table tr>th:nth-last-of-type(2) a';
    public static $ActionLinkHead               = 'form table tr>th:nth-last-of-type(1) a';
    
    public static $CompanyHead_ArchivedTasks            = '#w1 table tr>th:first-of-type';
    public static $CityHead_ArchivedTasks               = '#w1 table tr>th:nth-of-type(2)';
    public static $AddressHead_ArchivedTasks            = '#w1 table tr>th:nth-of-type(3)';
    public static $ContactHead_ArchivedTasks            = '#w1 table tr>th:nth-last-of-type(7)';
    public static $PhoneHead_ArchivedTasks              = '#w1 table tr>th:nth-last-of-type(6)';
    public static $EmailHead_ArchivedTasks              = '#w1 table tr>th:nth-last-of-type(5)';
    public static $ReviewTypeLinkHead_ArchivedTasks     = '#w1 table tr>th:nth-last-of-type(4) a';
    public static $AuditStatusLinkHead_ArchivedTasks    = '#w1 table tr>th:nth-last-of-type(3)';
    public static $AuditReadyDateLinkHead_ArchivedTasks = '#w1 table tr>th:nth-last-of-type(2) a';
    public static $CompletionDateLinkHead_ArchivedTasks = '#w1 table tr>th:nth-last-of-type(1) a';
    
    public static $TasksTitle                   = '.title-block h2';
    public static $EmptyListLabel               = 'form tr .empty';
    public static $TaskRow                      = 'form tbody tr';
    public static $TasksSummaryCount            = 'form .summary>b:last-of-type';
    
    public static $TasksTitle_ArchivedTasks        = 'h3';
    public static $EmptyListLabel_ArchivedTasks    = '#w1 tr .empty';
    public static $TaskRow_ArchivedTasks           = '#w1 tbody tr';
    public static $TasksSummaryCount_ArchivedTasks = '#w1 .summary>b:last-of-type';
    
    public static function CompanyNameLine_InspDashboard($row)  { return "form table tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CompanyNameLine_AuditDashboard($row) { return "form table tbody>tr:nth-of-type($row)>td:first-of-type a"; }
    public static function CityLine($row)                       { return "form table tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function AdressLine($row)                     { return "form table tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ContactLine($row)                    { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(8)"; }
    public static function PhoneLine($row)                      { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(7)"; }
    public static function EmailLine($row)                      { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(6)"; }
    public static function ReviewTypeLine($row)                 { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(5)"; }
    public static function AuditStatusSelectLine($row)          { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(4) select"; }
    public static function AuditReadyDateFieldLine($row)        { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(3) input"; }
    public static function CompletionDateLine($row)             { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(2) input"; }
    public static function UpdateButtonLine($row)               { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(1) button"; }
    public static function MessageButtonLine($row)              { return "form table tbody>tr:nth-of-type($row)>td:nth-last-of-type(1) a"; }
    
    public static function CompanyNameLine_InspDashboard_ArchivedTasks($row)  { return "#w1 table tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CompanyNameLine_AuditDashboard_ArchivedTasks($row) { return "#w1 table tbody>tr:nth-of-type($row)>td:first-of-type a"; }
    public static function CityLine_ArchivedTasks($row)                       { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function AdressLine_ArchivedTasks($row)                     { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ContactLine_ArchivedTasks($row)                    { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-last-of-type(7)"; }
    public static function PhoneLine_ArchivedTasks($row)                      { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-last-of-type(6)"; }
    public static function EmailLine_ArchivedTasks($row)                      { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-last-of-type(5)"; }
    public static function ReviewTypeLine_ArchivedTasks($row)                 { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-last-of-type(4)"; }
    public static function AuditStatusLine_ArchivedTasks($row)                { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-last-of-type(3)"; }
    public static function AuditReadyDateLine_ArchivedTasks($row)             { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-last-of-type(2)"; }
    public static function CompletionDateLine_ArchivedTasks($row)             { return "#w1 table tbody>tr:nth-of-type($row)>td:nth-last-of-type(1)"; }
    
    //By Business name & Review type check values
    public static function CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($busName, $revType)  { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[1]".parent::$AddTagA; }
    public static function CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($busName, $revType) { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[1]/a"; }
    public static function CityLine_ByBusinessNameAndReviewType($busName, $revType)                       { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[2]"; }
    public static function AdressLine_ByBusinessNameAndReviewType($busName, $revType)                     { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[3]"; }
    public static function ContactLine_ByBusinessNameAndReviewType($busName, $revType)                    { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[4]"; }
    public static function PhoneLine_ByBusinessNameAndReviewType($busName, $revType)                      { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[5]"; }
    public static function EmailLine_ByBusinessNameAndReviewType($busName, $revType)                      { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[6]"; }
    public static function ReviewTypeLine_ByBusinessNameAndReviewType($busName, $revType)                 { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[7]"; }
    public static function AuditStatusSelectLine_ByBusinessNameAndReviewType($busName, $revType)          { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[8]//select"; }
    public static function AuditReadyDateFieldLine_ByBusinessNameAndReviewType($busName, $revType)        { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[9]//input"; }
    public static function CompletionDateLine_ByBusinessNameAndReviewType($busName, $revType)             { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[10]//input"; }
    public static function UpdateButtonLine_ByBusinessNameAndReviewType($busName, $revType)               { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[11]//button"; }
    public static function MessageButtonLine_ByBusinessNameAndReviewType($busName, $revType)              { return "//form//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[11]//a"; }
    
    public static function CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard_ArchivedTasks($busName, $revType)  { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[1]".parent::$AddTagA; }
    public static function CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard_ArchivedTasks($busName, $revType) { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[1]/a"; }
    public static function CityLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)                       { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[2]"; }
    public static function AdressLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)                     { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[3]"; }
    public static function ContactLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)                    { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[4]"; }
    public static function PhoneLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)                      { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[5]"; }
    public static function EmailLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)                      { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[6]"; }
    public static function ReviewTypeLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)                 { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[7]"; }
    public static function AuditStatusLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)                { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[8]"; }
    public static function AuditReadyDateLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)             { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[9]"; }
    public static function CompletionDateLine_ByBusinessNameAndReviewType_ArchivedTasks($busName, $revType)             { return "//*[@id='w1']//table//tbody/tr[contains(td[1]".parent::$AddTagA."/text(), '$busName') and contains(td[7]/text(), '$revType')]/td[10]"; }
    
    
    
    
    
    
}
