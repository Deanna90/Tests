<?php
namespace Page;

class ApplicationDetails extends \AcceptanceTester 

{
    public static $URL_BusinessProfile             = "/user/business/profile";
    
    public static function URL_BusinessInfo($businessID)      { return parent::$URL_UserAccess."/business/index?business_id=$businessID";}
    public static function URL_Records($businessID)           { return parent::$URL_UserAccess."/business/records?business_id=$businessID";}
    public static function URL_Communication($businessID)     { return parent::$URL_UserAccess."/communication/index?business_id=$businessID";}
    public static function URL_BusinessProfile($businessID)   { return parent::$URL_UserAccess."/business/profile?business_id=$businessID";}
    
    public static $BusinessInfoTab              = '#checklist-number [selected]';
    public static $RecordsTab                   = '#checklist-number option';
    public static $CommunicationTab             = '#checklist-number option';
    public static $BusinessProfileTab           = '#checklist-number option';
   
    //--------------------------------------------------------------------------
    //-----------------------------Business Info Tab----------------------------
    //--------------------------------------------------------------------------
    const InProcessStatus       = 'In process';
    const RecognizedStatus      = 'Recognized';
    const DecertifiedStatus     = 'Decertified';
    const DisqualifiedStatus    = 'Disqualified';
    const NonresponsiveStatus   = 'Nonresponsive';
    const RequiresRenewalStatus = 'Requires renewal';
    const MovedClosedStatus     = 'Moved/Closed';
    const NotSuitableStatus     = 'Not Suitable';
    const ExpiredStatus         = 'Expired';
    const RejectedStatus        = 'Rejected';
    
    const ArchivedStatus        = 'Archived';
    
    public static $StatusSelect_BusinessInfoTab          = '#application_dropdown_1';
    public static $RecognitionDateField_BusinessInfoTab  = '#recognition_date_input';
    public static $SaveDateButton_BusinessInfoTab        = 'button#recognition_date_save_button';
    public static $AddNewChecklistButton_BusinessInfoTab = 'a.btn-renew';
    
    public static $BusinessAddress_BusinessInfoTab         = '.company-status h5+span';
    public static $City_Zip_ShortStateName_BusinessInfoTab = '.company-status>span:nth-of-type(2)';
    public static $Phone_BusinessInfoTab                   = '.company-status>span:nth-of-type(3)';
    //Contact Info
    public static $ContactNameField_BusinessInfoTab     = '#businesscontactform_1-full_name';
    public static $PhoneNumberField_BusinessInfoTab     = '#business_phone_disabled_input';
    public static $EmailField_BusinessInfoTab           = '#businesscontactform_1-email';
    public static $ManageContactsButton_BusinessInfoTab = 'a#popup_link_0';
    //Tier Statuses
    public static $TierStatusTitle_BusinessInfoTab            = 'button#recognition_date_save_button';
    public static function TierName_BusinessInfoTab($row)     { return "[class*=margin-top]>div:nth-of-type($row) .lite-green";}
    public static function TierStatus_BusinessInfoTab($row)   { return "[class*=margin-top]>div:nth-of-type($row) .p-label";}
    public static $TierPromotionsTitle_BusinessInfoTab        = 'button#recognition_date_save_button';
    
    public static function TierTab_BusinessInfoTab($tierNumber)     { return "[class*=margin-top]>div:nth-of-type($row) .lite-green";}
    public static $ApplicationStatusSelect_BusinessInfoTab          = '#application_dropdown_2';
    public static $PhoneConsultStatusSelect_BusinessInfoTab         = '#application_dropdown_3';
    public static $ComplianceCheckStatusSelect_BusinessInfoTab      = '#application_dropdown_4';
    public static $SiteVisitStatusSelect_BusinessInfoTab            = '#application_dropdown_5';
    public static $AuditsStatusSelect_BusinessInfoTab               = '#application_dropdown_6';
    public static $RecognitionTasksStatusSelect_BusinessInfoTab     = '#application_dropdown_7';
    public static $AddDetailsButton_ComplianceCheck_BusinessInfoTab = 'a#popup_link_1';
    public static $AddDetailsButton_Audits_BusinessInfoTab          = 'a#popup_link_2';
    
    //----Statuses in tier tab----
    const InProcessStatus_TierTab               = 'In Process';
    const NotReadyStatus_TierTab                = 'Not Ready';
    const ReadyStatus_TierTab                   = 'Ready';
    const PassedStatus_TierTab                  = 'Passed';
    const NotPassedStatus_TierTab               = 'Not Passed';
    const NotApplicableStatus_TierTab           = 'Not Applicable';
    const ApplicantActionRequiredStatus_TierTab = 'Applicant Action Required';
    const PendingStatus_TierTab                 = 'Pending';
    
    //--------------------------Compliance Check Popup--------------------------
    public static $ComplianceCheckPopup                    = '.modal.in';
    
    public static $ComplianceCheckPopup_Title              = '.modal.in h2';
    
    public static $ComplianceCheckPopup_StatusHead         = '.modal.in table tr>th:nth-of-type(2)';
    public static $ComplianceCheckPopup_AuditReadyDateHead = '.modal.in table tr>th:nth-of-type(3)';
    public static $ComplianceCheckPopup_CompletionDateHead = '.modal.in table tr>th:nth-of-type(4)';
    public static $ComplianceCheckPopup_OrganizationHead   = '.modal.in table tr>th:nth-of-type(5)';
    public static $ComplianceCheckPopup_InspectorHead      = '.modal.in table tr>th:nth-of-type(6)';
    
    public static function ComplianceCheckPopup_ComplianceCheck($row)         { return ".modal.in table>tbody>tr:nth-of-type($row)>td:nth-of-type(1)";}
    public static function ComplianceCheckPopup_StatusSelect($row)            { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=status]";}
    public static function ComplianceCheckPopup_AuditReadyDateField($row)     { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=ready_date]";}
    public static function ComplianceCheckPopup_CompletionDateField($row)     { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=completion_date]";}
    public static function ComplianceCheckPopup_OrganizationSelect($row)      { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=audit_organization]";}
    public static function ComplianceCheckPopup_InspectorSelect($row)         { return ".modal.in table>tbody>tr:nth-of-type($row) [class*=organization_user]";}
    
    public static function ComplianceCheckPopup_ComplianceCheckByName($complName)      { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$complName')]/td[1]";}
    public static function ComplianceCheckPopup_StatusSelectByName($complName)         { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$complName')]/td[2]//select";}
    public static function ComplianceCheckPopup_AuditReadyDateFieldByName($complName)  { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$complName')]/td[3]//input";}
    public static function ComplianceCheckPopup_CompletionDateFieldByName($complName)  { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$complName')]/td[4]//input";}
    public static function ComplianceCheckPopup_OrganizationSelectByName($complName)   { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$complName')]/td[5]//select";}
    public static function ComplianceCheckPopup_InspectorSelectByName($complName)      { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$complName')]/td[6]//select";}
    
    public static $ComplianceCheckPopup_UpdateButton             = '.modal.in [type=submit]';
    public static $ComplianceCheckPopup_CloseButton              = '.modal.in .close';
    
    //---------------------------------Audits Popup-----------------------------
    public static $AuditsPopup                    = '.modal.in';
    
    public static $AuditsPopup_Title              = '.modal.in h2';
    
    public static $AuditsPopup_StatusHead         = '.modal.in table tr>th:nth-of-type(2)';
    public static $AuditsPopup_AuditReadyDateHead = '.modal.in table tr>th:nth-of-type(3)';
    public static $AuditsPopup_CompletionDateHead = '.modal.in table tr>th:nth-of-type(4)';
    public static $AuditsPopup_OrganizationHead   = '.modal.in table tr>th:nth-of-type(5)';
    public static $AuditsPopup_AuditorHead        = '.modal.in table tr>th:nth-of-type(6)';
    
    public static function AuditsPopup_AuditGroup($row)              { return ".modal.in table>tbody>tr:nth-of-type($row)>td:nth-of-type(1)";}
    public static function AuditsPopup_StatusSelect($row)            { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=status]";}
    public static function AuditsPopup_AuditReadyDateField($row)     { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=ready_date]";}
    public static function AuditsPopup_CompletionDateField($row)     { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=completion_date]";}
    public static function AuditsPopup_OrganizationSelect($row)      { return ".modal.in table>tbody>tr:nth-of-type($row) [id*=audit_organization]";}
    public static function AuditsPopup_AuditorSelect($row)           { return ".modal.in table>tbody>tr:nth-of-type($row) [class*=organization_user]";}
    
    public static function AuditsPopup_AuditGroupByName($audGroup)           { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$audGroup')]/td[1]";}
    public static function AuditsPopup_StatusSelectByName($audGroup)         { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$audGroup')]/td[2]//select";}
    public static function AuditsPopup_AuditReadyDateFieldByName($audGroup)  { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$audGroup')]/td[3]//input";}
    public static function AuditsPopup_CompletionDateFieldByName($audGroup)  { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$audGroup')]/td[4]//input";}
    public static function AuditsPopup_OrganizationSelectByName($audGroup)   { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$audGroup')]/td[5]//select";}
    public static function AuditsPopup_AuditorSelectByName($audGroup)        { return "//*[@id='popup']//tbody/tr[contains(td[1]/text(), '$audGroup')]/td[6]//select";}
    
    public static $AuditsPopup_UpdateButton             = '.modal.in [type=submit]';
    public static $AuditsPopup_CloseButton              = '.modal.in .close';
    
    //--------------------------------------------------------------------------
    //-------------------------------Records Tab--------------------------------
    //--------------------------------------------------------------------------
    
    public static $BusinessTitle                       = 'h2';
    public static $RecordRow_RecordsTab                = 'table[class*=table] tbody>tr';
    public static $SummaryCount_RecordsTab             = '.summary>b:last-of-type';
    
   
    public static $IdLinkHead_RecordsTab               = 'table[class*=table] tr>th:first-of-type a';
    public static $CreatedLinkHead_RecordsTab          = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $LastModifiedLinkHead_RecordsTab     = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $StatusHead_RecordsTab_RecordsTab    = 'table[class*=table] tr>th:nth-of-type(4)';
    public static $RecognitionLinkHead_RecordsTab      = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $RenewalLinkHead_RecordsTab          = 'table[class*=table] tr>th:nth-of-type(6) a';
    
    public static function IdLine_RecordsTab($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CreatedLine_RecordsTab($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function LastModifiedLine_RecordsTab($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function StatusLine_RecordsTab($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function RecognitionLine_RecordsTab($row)  { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function RenewalLine_RecordsTab($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function ViewButtonLine_RecordsTab($row)   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7) a"; }
    
    //--------------------------------------------------------------------------
    //---------------------------Communication Tab------------------------------
    //--------------------------------------------------------------------------
    
    public static $CreateNewConversationButton         = 'h2';
    public static $ConversationRow_CommunicationTab    = 'table[class*=table] tbody>tr';
    public static $SummaryCount_CommunicationTab       = '.summary>b:last-of-type';
    
   
    public static $SenderHead_CommunicationTab         = 'table[class*=table] tr>th:first-of-type';
    public static $SubjectLinkHead_CommunicationTab    = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $SentLinkHead_CommunicationTab       = 'table[class*=table] tr>th:nth-of-type(3) a';
    
    public static function SenderLine_CommunicationTab($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function SubjectLine_CommunicationTab($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function SentLine_CommunicationTab($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function DeleteButtonLine_CommunicationTab($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td [title=Delete]"; }
    public static function ViewButtonLine_CommunicationTab($row)   { return "table[class*=table] tbody>tr:nth-of-type($row)>td [title=View]"; }

    //--------------------------------------------------------------------------
    //--------------------------Business Profile Tab----------------------------
    //--------------------------------------------------------------------------
    
    public static $BusinessName_BusinessProfileTab                    = '.company-profile-info>p:first-of-type';
    public static $Address_BusinessProfileTab                         = '.company-profile-info>p:nth-of-type(2)';
    public static $City_BusinessProfileTab                            = '.company-profile-info>p:nth-of-type(3)';
    public static $Zip_BusinessProfileTab                             = '.company-profile-info>p:nth-of-type(4)';
    
    public static $PhoneField_BusinessProfileTab                      = '#businessform-phone';
    public static $FaxField_BusinessProfileTab                        = '#businessform-fax';
    public static $EmailField_BusinessProfileTab                      = '#businessform-email';
    public static $SiteField_BusinessProfileTab                       = '#businessform-website';
    public static $FacebookLinkField_BusinessProfileTab               = '#businessform-social_facebook';
    public static $TwitterLinkField_BusinessProfileTab                = '#businessform-social_twitter';
    public static $LinkedInField_BusinessProfileTab                   = '#businessform-social_linkedin';
    
    public static $SectorSelect_BusinessProfileTab                    = '#businessform-sector_id';
    public static $BusinessTypeSelect_BusinessProfileTab              = '#businessform-category_id';
    public static $BusinessCategorySelect_BusinessProfileTab          = "[name='BusinessForm[sub_category_id]']";
    
    public static $BusinessDescriptionField_BusinessProfileTab        = '#businessform-description';
    public static $DescribeHowBusinessIsGreenField_BusinessProfileTab = '#businessform-how_green';
    public static $TestimonialsField_BusinessProfileTab               = '#businessform-testimonials';
    
    //About the business block
    public static $NumberOfEmployeesField_BusinessProfileTab      = '#businessform-employees_number';
    public static $BusinessSquareFootageField_BusinessProfileTab  = '#businessform-business_square_footage';
    public static $LandscapeSquareFootageField_BusinessProfileTab = '#businessform-landscape_square_footage';
    
    public static function AboutQuestion_Name_ByName_BusinessProfileTab($name)                        { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]";}
    public static function AboutQuestion_AnswerButtonLabel_ByName_BusinessProfileTab($name, $answer)  { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]//div/label[contains(text(), '$answer')]";}
    public static function AboutQuestion_AnswerButton_ByName_BusinessProfileTab($name, $answer)       { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]/div/input[@class='$answer-btn']";}
    
    public static $AboutQuestion_OwnershipStatusQuestion           = 'What is the building ownership status?';
    public static $AboutQuestion_OwnershipStatus_OwnBuilding       = '#normalradio-ownership_status_0';
    public static $AboutQuestion_OwnershipStatus_RentSpace         = '#normalradio-ownership_status_1';
    public static $AboutQuestion_OwnershipStatus_HomeOffice        = '#normalradio-ownership_status_2';
    
    public static $AboutQuestion_BusinessLocationQuestion          = 'What is the building ownership status?';
    public static $AboutQuestion_BusinessLocation_Yes              = '#checkbox-i0';
    public static $AboutQuestion_BusinessLocation_No               = '#checkbox-0-n';
    
    public static $AboutQuestion_HazardousMaterialsOrWasteQuestion = 'What is the building ownership status?';
    public static $AboutQuestion_HazardousMaterialsOrWaste_Yes     = '#checkbox-i1';
    public static $AboutQuestion_HazardousMaterialsOrWaste_No      = '#checkbox-1-n';
    
    public static $AboutQuestion_PoolOrSpaQuestion                 = 'What is the building ownership status?';
    public static $AboutQuestion_PoolOrSpa_Yes                     = '#checkbox-i2';
    public static $AboutQuestion_PoolOrSpa_No                      = '#checkbox-2-n';
    
    public static $AboutQuestion_EmergencyBackUpGeneratorQuestion  = 'What is the building ownership status?';
    public static $AboutQuestion_EmergencyBackUpGenerator_Yes      = '#checkbox-i3';
    public static $AboutQuestion_EmergencyBackUpGenerator_No       = '#checkbox-3-n';
    
    const AboutQuestion_OwnershipStatus           = 'What is the building ownership status?';
    const OwnBuildingStatus                       = 'Own Building';
    const RentSpaceStatus                         = 'Rent Space';
    const HomeOfficeStatus                        = 'Home Office';
    const AboutQuestion_BusinessLocation          = 'Are there other business locations?';
    const AboutQuestion_HazardousMaterialsOrWaste = 'Are there hazardous materials or waste on site?';
    const AboutQuestion_PoolOrSpa                 = 'Is there a pool or spa on site?';
    const AboutQuestion_EmergencyBackUpGenerator  = 'Is there an Emergency Back-Up Generator on site?';
    
    //Permits block
    const Permits_Air                     = 'Air';
    const Permits_HazardousMaterials      = 'Hazardous materials';
    const Permits_HazardousWaste          = 'Hazardous waste';
    const Permits_StormWater              = 'Storm water';
    const Permits_Wastewater              = 'Wastewater';
    const Permits_FoodSafety              = 'Food safety';
    const Permits_FireCode                = 'Fire code';
    const Permits_UndergroundStorageTanks = 'Underground storage tanks';
    const Permits_AboveGroundStorageTanks = 'Above ground storage tanks';
    const Permits_PoolAndSpaSafety        = 'Pool and spa safety';
    const Permits_Other                   = 'Other';

    public static $Permits_AirButton                     = '#checkbox-permits_air';
    public static $Permits_HazardousMaterialsButton      = '#checkbox-permits_hazardous_materials';
    public static $Permits_HazardousWasteButton          = '#checkbox-permits_hazardous_waste';
    public static $Permits_StormWaterButton              = '#checkbox-permits_storm_water';
    public static $Permits_WastewaterButton              = '#checkbox-permits_wastewater';
    public static $Permits_FoodSafetyButton              = '#checkbox-permits_food_safety';
    public static $Permits_FireCodeButton                = '#checkbox-permits_fire_code';
    public static $Permits_UndergroundStorageTanksButton = '#checkbox-permits_fire_under_tanks';
    public static $Permits_AboveGroundStorageTanksButton = '#checkbox-permits_fire_above_tanks';
    public static $Permits_PoolAndSpaSafetyButton        = '#checkboxpermits_pool_safety';
    public static $Permits_OtherButton                   = '#checkboxpermits_other';
    
    public static function Permits_Name_ByName_BusinessProfileTab($name)         { return "//*[@class='buttons-group']//label[contains(text(), '$name')]";}
    public static function Permits_ButtonLabel_ByName_BusinessProfileTab($name)  { return "//*[@class='buttons-group']//label[contains(text(), '$name')]";}
    
    
    }
