<?php
namespace Page;

class Dashboard extends \AcceptanceTester
{
    public static function URL()          { return parent::$URL_UserAccess.'/default/index';}
    public static function URL_InspAud()  { return parent::$URL_UserAccess.'/dashboard';}
    
    const NoChecklistText            = 'No checklist! Sorry but we don`t have a checklist for business.';
    
    //Filter Items
    const All_Filter                 = 'ALL';
    const InProcess_Filter           = 'In process';
    const ChecklistSubmisiion_Filter = 'Checklist Submission';
    const PhoneConsult_Filter        = 'Phone Consult';
    const SiteVisit_Filter           = 'Site Visit';
    const Audit_Filter               = 'Audit';
    const ComplianceCheck_Filter     = 'Compliance Check';
    const Tier1_Filter               = 'Tier 1';
    const Tier2_Filter               = 'Tier 2';
    const Tier3_Filter               = 'Tier 3';
    const Recognized_Filter          = 'Recognized';
    const Recertification_Filter     = 'Recertification';
    const Decertified_Filter         = 'Decertified';
    const Disqualified_Filter        = 'Disqualified';
    const Nonresponsive_Filter       = 'Nonresponsive';
    const MovedClosed_Filter         = 'Moved/Closed';
    const NotSuitable_Filter         = 'Not Suitable';
    
    public static function BusinessLink_ByBusName($business)           { return "//h4/a[text()='$business']";}
    public static function MeasuresCompletedInfo_ByBusName($business)  { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div/span";}
    public static function NoChecklistInfo_ByBusName($business)        { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/p";}
    public static function StatusOfBusiness_ByBusName($business)       { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[2]//strong";}
    public static function Date_StatusOfBus_ByBusName($business)       { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[2]//span/span";}
    public static function TierName_ByBusName($business)               { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[3]//strong";}
    public static function TierStatus_ByBusName($business)             { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[3]//div/span";}
    public static function AddressOfBusiness_ByBusName($business)      { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div/div";}
    public static function SectorOfBusiness_ByBusName($business)       { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[2]/span";}
    public static function BusinessType_ByBusName($business)           { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[3]/span";}
    public static function BusinessCategory_ByBusName($business)       { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[4]/span";}
    public static function StatusOfAudits_ByBusName($business)         { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[1]/p[2]";}
    public static function StatusOfApplication_ByBusName($business)    { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[2]/p[2]";}
    public static function StatusOfCompliance_ByBusName($business)     { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[3]/div[1]/p[2]";}

    public static function BusinessInfoLabel_ByBusName($business)          { return "//div[contains(h4/a/text(), '$business')]//h5";}
    public static function SectorOfBusinessLabel_ByBusName($business)      { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[2]/p";}
    public static function BusinessTypeLabel_ByBusName($business)          { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[3]/p";}
    public static function BusinessCategoryLabel_ByBusName($business)      { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[1]/div[4]/p";}
    public static function StatusOfAuditsLabel_ByBusName($business)        { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[1]/p[1]";}
    public static function StatusOfApplicationLabel_ByBusName($business)   { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[2]/div[2]/p[1]";}
    public static function StatusOfComplianceLabel_ByBusName($business)    { return "//div[contains(h4/a/text(), '$business')]/div/div[2]/div/div/div[3]/div[1]/p[1]";}
    
    //Filter
    public static function FilterItem_ByFilterName($filter)                   { return "//ul[@class='filter-menu']/li/label[contains(text(),'$filter')]";}
    public static function FilterItemCount_ByFilterName($filter)              { return "//ul[@class='filter-menu']/li/label[contains(text(),'$filter')]/span";}
    public static function FilterSubItem_ByFilterName($filter, $subitem)      { return "//ul[@class='filter-menu']/li[contains(label/text(),'$filter')]//*[@class='sub-filter-menu']/li/label[contains(text(), '$subitem')]";}
    public static function FilterSubItemCount_ByFilterName($filter, $subitem) { return "//ul[@class='filter-menu']/li[contains(label/text(),'$filter')]//*[@class='sub-filter-menu']/li/label[contains(text(), '$subitem')]/span";}

    //----------------------------Inspector dashboard---------------------------
    public static $CompanyHead                  = 'table[class*=table] tr>th:first-of-type';
    public static $CityHead                     = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $ContactHead                  = 'table[class*=table] tr>th:nth-of-type(3)';
    public static $PhoneHead                    = 'table[class*=table] tr>th:nth-of-type(4)';
    public static $EmailHead                    = 'table[class*=table] tr>th:nth-of-type(5)';
    public static $ReviewTypeLinkHead           = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $AuditStatusLinkHead          = 'table[class*=table] tr>th:nth-of-type(7) a';
    public static $AuditReadyDateLinkHead       = 'table[class*=table] tr>th:nth-of-type(8) a';
    public static $CompletionDateLinkHead       = 'table[class*=table] tr>th:nth-of-type(9) a';
    public static $ActionLinkHead               = 'table[class*=table] tr>th:nth-of-type(10) a';
    
    public static $TasksTitle                   = '.title-block h2';
    public static $EmptyListLabel               = 'tr .empty';
    public static $TaskRow                      = 'tbody tr';
    public static $TasksSummaryCount            = '.summary>b:last-of-type';
    
    public static function CompanyNameLine_InspDashboard($row)  { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CompanyNameLine_AuditDashboard($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type a"; }
    public static function CityLine($row)                       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ContactLine($row)                    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function PhoneLine($row)                      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function EmailLine($row)                      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function ReviewTypeLine($row)                 { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function AuditStatusSelectLine($row)          { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7) select"; }
    public static function AuditReadyDateFieldLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(8) input"; }
    public static function CompletionDateLine($row)             { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(9) input"; }
    public static function UpdateButtonLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(10) button"; }
    
    //By Business name & Review type check values
    public static function CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($busName, $revType)  { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[1]"; }
    public static function CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($busName, $revType) { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[1]/a"; }
    public static function CityLine_ByBusinessNameAndReviewType($busName, $revType)                       { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[2]"; }
    public static function ContactLine_ByBusinessNameAndReviewType($busName, $revType)                    { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[3]"; }
    public static function PhoneLine_ByBusinessNameAndReviewType($busName, $revType)                      { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[4]"; }
    public static function EmailLine_ByBusinessNameAndReviewType($busName, $revType)                      { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[5]"; }
    public static function ReviewTypeLine_ByBusinessNameAndReviewType($busName, $revType)                 { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[6]"; }
    public static function AuditStatusSelectLine_ByBusinessNameAndReviewType($busName, $revType)          { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[7]//select"; }
    public static function AuditReadyDateFieldLine_ByBusinessNameAndReviewType($busName, $revType)        { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[8]//input"; }
    public static function CompletionDateLine_ByBusinessNameAndReviewType($busName, $revType)             { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[9]//input"; }
    public static function UpdateButtonLine_ByBusinessNameAndReviewType($busName, $revType)               { return "//table//tbody/tr[contains(td[1]/text(), '$busName') and contains(td[6]/text(), '$revType')]/td[10]//button"; }
    
    
    
    
    
    
}
