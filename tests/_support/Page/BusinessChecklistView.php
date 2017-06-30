<?php
namespace Page;

class BusinessChecklistView extends \AcceptanceTester
{
    public static function URL_Business($businessID)     { return parent::$URL_UserAccess."/business/index?business_id=$businessID";}

    public static $Title                      = 'h1';
   
    public static $SaveButton_Footer          = '.success.save-buttons button[type=submit].btn-green';
    public static $SaveAndNextButton_Footer   = '.success.save-buttons button[name=save_next]';
    public static $PreviousButton_Footer      = '.success.save-buttons>div:first-of-type a.btn-md';
    public static $ReviewButton_Footer        = '.success.save-buttons>div:last-of-type a.btn-md';
    
    //-----Left Menu-----
    public static $LeftMenu_ApplicationDetailsButton       = '.getstarted-group';
    
    public static $LeftMenu_EnergyGroupButton              = '.energy-group';
    public static $LeftMenu_GeneralGroupButton             = '.general-group';
    public static $LeftMenu_PollutionPreventionGroupButton = '.pollution-prevention-group';
    public static $LeftMenu_SolidWasteGroupButton          = '.solid-waste-group';
    public static $LeftMenu_TransportationGroupButton      = '.transportation-group';
    public static $LeftMenu_WastewaterGroupButton          = '.wastewater-group';
    public static $LeftMenu_WaterGroupButton               = '.water-group';
    
    public static function LeftMenu_Subgroup_ByName($subgroup) { return "//*[@class='sub-menu active']//li/a[text()='$subgroup']";}
    public static function LeftMenu_Subgroup($row)             { return ".sub-menu.active li:nth-of-type($row)>a";}
    
    public static $LeftMenu_HowToUseThisAppButton          = '#checklist-number [selected]';
    public static $LeftMenu_BusinessLoginButton            = '#checklist-number option';
    public static $LeftMenu_PrintApplicationButton         = '#checklist-number option';
    public static $LeftMenu_NoteToBusinessButton           = '#checklist-number option';
    
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
    
    public static $StatusSelect_BisinessInfoTab          = '#application_dropdown_1';
    public static $RecognitionDateField_BisinessInfoTab  = '#recognition_date_input';
    public static $SaveDateButton_BisinessInfoTab        = 'button#recognition_date_save_button';
    public static $AddNewChecklistButton_BisinessInfoTab = 'a.btn-renew';
    
    public static $BusinessAddress_BisinessInfoTab = 'button#recognition_date_save_button';
    public static $City_BisinessInfoTab            = 'button#recognition_date_save_button';
    public static $ZipCode_BisinessInfoTab         = 'button#recognition_date_save_button';
    public static $Phone_BisinessInfoTab           = 'button#recognition_date_save_button';
    //Contact Info
    public static $ContactNameField_BisinessInfoTab     = 'button#recognition_date_save_button';
    public static $PhoneNumberField_BisinessInfoTab     = 'button#recognition_date_save_button';
    public static $EmailField_BisinessInfoTab           = 'button#recognition_date_save_button';
    public static $ManageContactsButton_BisinessInfoTab = 'a#popup_link_0';
    //Tier Statuses
    public static $TierStatusTitle_BisinessInfoTab      = 'button#recognition_date_save_button';
    public static function TierName_BisinessInfoTab($row)     { return "[class*=margin-top]>div:nth-of-type($row) .lite-green";}
    public static function TierStatus_BisinessInfoTab($row)   { return "[class*=margin-top]>div:nth-of-type($row) .p-label";}
    public static $TierPromotionsTitle_BisinessInfoTab     = 'button#recognition_date_save_button';
    
    public static function TierTab_BisinessInfoTab($tierNumber)     { return "[class*=margin-top]>div:nth-of-type($row) .lite-green";}
    public static $ApplicationStatusSelect_BisinessInfoTab          = '#application_dropdown_2';
    public static $PhoneConsultStatusSelect_BisinessInfoTab         = '#application_dropdown_3';
    public static $ComplianceCheckStatusSelect_BisinessInfoTab      = '#application_dropdown_4';
    public static $SiteVisitStatusSelect_BisinessInfoTab            = '#application_dropdown_5';
    public static $AuditsStatusSelect_BisinessInfoTab               = '#application_dropdown_6';
    public static $RecognitionsTasksStatusSelect_BisinessInfoTab    = '#application_dropdown_7';
    public static $AddDetailsButton_ComplianceCheck_BisinessInfoTab = 'a#popup_link_1';
    public static $AddDetailsButton_Audits_BisinessInfoTab          = 'a#popup_link_2';
    
    
    
    //Checklist View
    public static function MeasureDescription_ByDesc($desc)      { return "//*[@id='measures-form']//p[contains(text(), '$desc')]";}
//    public static function MeasureGreenTip_ByDesc($desc, $grTip) { return "//*[@id='measures-form']//p[contains(text(), '$desc')]/span[@data-original-title='<p>$grTip</p>\n']";}
    public static function MeasureGreenTip($grTip)               { return "//*[@class='short-articles link-green no-ajax'][contains(h4/text(), 'Measure')]//*[text()='$grTip']";}
    public static function MeasureToggleButton_ByDesc($desc)     { return "//*[@id='measures-form']//p[contains(text(), '$desc')]//*[@id='relmeasuretobusiness-answer_type_switch_control']";}
    public static function MeasurePoints_ByDesc($desc)           { return "//*[@id='measures-form']//li//div[contains(p/text(), '$desc')]/span";}
    public static function Savings_ByDesc($desc)                 { return "//*[@id='measures-form']//li//div[contains(p/text(), '$desc')]/div";}
    
    public static function Submeasure_ByMeasureDesc($desc, $row)        { return "//*[@id='measures-form']//li/div[contains(div/p/text(), '$desc')]//ul/li[$row]/div/span";}
    public static function SubmeasureSelect_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//select";}
    public static function SubmeasureField_ByMeasureDesc($desc, $row)   { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//input";}
    public static function SubmeasureToggleButton_2Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-2-items']";}
    public static function SubmeasureToggleButton_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-3-items']";}
    
    public static function AuditGreenTip_ByTipDesc($grTip)              { return "//*[@class='right-column-block']//h4[text()='$grTip']/i";}
    
    public static $CoreProgressBarInfo           = '#measures-form>div:first-of-type .progress-wrapper+span';
    public static $ElectiveProgressBarInfo       = '#measures-form>div:nth-last-of-type(3) .progress-wrapper+span';
    
    public static $FirstMeasuresTitle            = '#measures-form>div:first-of-type h3';
    public static $SecondMeasuresTitle           = '#measures-form>div:nth-of-type(2) h3';
    
    public static function Core_MeasureDescription_ByDesc($desc)        { return "//*[@id='measures-form']//div[contains(div/h3/text(), 'Core measures')]//p[contains(text(), '$desc')]";}
    public static function Elective_MeasureDescription_ByDesc($desc)    { return "//*[@id='measures-form']//div[contains(div/h3/text(), 'Elective measures')]//p[contains(text(), '$desc')]";}
    
    //-----------------------------Therms Popup---------------------------------
    
    const ThermsPopup                                                 = '.modal.fade.in';
    public static $ThermsPopup_TotalEstimatedField_Section1           = '.modal.fade.in .therm-section-1 #total_estimated';
    public static $ThermsPopup_TotalEstimatedLabel_Section1           = '.modal.fade.in .therm-section-1 [for=total_estimated]';
    
    public static function ThermsPopup_OptionSelect_Section2($number)           { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [id*='therm-opt']";}
    public static function ThermsPopup_OptionSelectOption_Section2($number)     { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [id*='therm-opt'] option";}
    public static function ThermsPopup_OptionSelectLabel_Section2($number)      { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [for=qt]";}
    public static function ThermsPopup_TotalEstimatedField_Section2($number)    { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [id*='qt']";}
    public static function ThermsPopup_TotalEstimatedLabel_Section2($number)    { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a)";}
    public static function ThermsPopup_DeleteOptionButton_Section2($number)     { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [data-action=delete]";}
    
    public static $ThermsPopup_AddOptionButton          = '.modal.fade.in [data-action=add]';
    public static $ThermsPopup_SaveChangesButton        = '.modal.fade.in button[type=submit]';
    public static $ThermsPopup_CloseButton              = '.modal.fade.in .close';

}
