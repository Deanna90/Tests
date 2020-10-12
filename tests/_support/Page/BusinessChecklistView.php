<?php
namespace Page;

class BusinessChecklistView extends \AcceptanceTester
{
    public static function URL_BusinessInfo($businessID)                    { return parent::$URL_UserAccess."/business/index?business_id=$businessID";}
    public static function URL_Records($businessID)                         { return parent::$URL_UserAccess."/business/records?business_id=$businessID";}
    public static function URL_Communication($businessID)                   { return parent::$URL_UserAccess."/communication/index?business_id=$businessID";}
    public static function URL_BusinessProfile($businessID)                 { return parent::$URL_UserAccess."/business/profile?business_id=$businessID";}
    public static function URL_AuditGroupInChecklist($businessID, $idSubGr) { return parent::$URL_UserAccess."/business/complete-measures?audit_subgroup_id=$idSubGr&business_id=$businessID";}
    
    public static $Title                      = 'h1';
   
    public static $SaveButton_Footer          = '.success.save-buttons button[type=submit].btn-green';
    public static $SaveAndNextButton_Footer   = '.success.save-buttons button[name=save_next]';
    public static $PreviousButton_Footer      = '.success.save-buttons>div:first-of-type a.btn-md';
    public static $ReviewButton_Footer        = '.success.save-buttons>div:last-of-type a.btn-md';
    
    public static $OnlyViewModeAlert = '.right-column-checklist .alert';
    const OnlyViewModeMessage        = "Tier is available in view mode only.";
    
    
    //-----Left Menu-----
    public static $LeftMenu_ApplicationDetailsButton       = '.getstarted-group';
    
    public static $LeftMenu_EnergyGroupButton              = '.energy-group';
    public static $LeftMenu_GeneralGroupButton             = '.general-group';
    public static $LeftMenu_PollutionPreventionGroupButton = '.pollution-prevention-group';
    public static $LeftMenu_SolidWasteGroupButton          = '.solid-waste-group';
    public static $LeftMenu_TransportationGroupButton      = '.transportation-group';
    public static $LeftMenu_WastewaterGroupButton          = '.wastewater-group';
    public static $LeftMenu_WaterGroupButton               = '.water-group';
    
    public static function LeftMenu_Subgroup_ByName($subgroup)       { return "//*[@class='sub-menu active']//li/a[text()='$subgroup']";}
    public static function LeftMenu_Subgroup($row)                   { return ".sub-menu.active li:nth-of-type($row)>a";}
    public static function LeftMenu_PrintSecondTierButton($Tiername) { return "//a[text()[contains(., '$Tiername')]]";}
    
    public static $LeftMenu_DeleteApplicationButton        = '.delete-app-btn';
    public static $LeftMenu_BusinessLoginButton            = "a[href*='business/login']";
    public static $LeftMenu_GetNewChecklistButton          = "a.new-checklist-btn";
    public static $LeftMenu_PrintFirstTierButton           = '#checklist-number option';
    public static $LeftMenu_PrintSecondTierButton          = '#checklist-number option';
    public static $LeftMenu_PrintThirdTierButton           = '#checklist-number option';
    
    public static $LeftMenu_ApplicationDetails_ProgressBar       = '.getstarted-group .progress-bar';
    public static $LeftMenu_EnergyGroup_ProgressBar              = '.energy-group .progress-bar';
    public static $LeftMenu_GeneralGroup_ProgressBar             = '.general-group .progress-bar';
    public static $LeftMenu_PollutionPreventionGroup_ProgressBar = '.pollution-prevention-group .progress-bar';
    public static $LeftMenu_SolidWasteGroup_ProgressBar          = '.solid-waste-group .progress-bar';
    public static $LeftMenu_TransportationGroup_ProgressBar      = '.transportation-group .progress-bar';
    public static $LeftMenu_WastewaterGroup_ProgressBar          = '.wastewater-group .progress-bar';
    public static $LeftMenu_WaterGroup_ProgressBar               = '.water-group .progress-bar';
    
    public static $LeftMenu_TierProgressTitle                    = '[class=col-md-3]>div:nth-of-type(2) .row>div:first-of-type p';
    public static function LeftMenu_TierName($row)               { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(1)";}
    public static function LeftMenu_CompletedMeasuresLabel($row) { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(2)";}
    public static function LeftMenu_EarnedPointsLabel($row)      { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(4)";}
    public static function LeftMenu_CompletedMeasuresInfo($row)  { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(3)";}
    public static function LeftMenu_EarnedPointsInfo($row)       { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(5)";}
    public static function LeftMenu_CompletedMeasuresCount($row) { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(3)>span";}
    public static function LeftMenu_EarnedPointsCount($row)      { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(5)>span";}
    public static $LeftMenu_TotalPointsEarnedInfo                = '[class=col-md-3]>div:nth-of-type(2) .row>div:last-of-type>p';
    
    public static $BusinessInfoTab               = '#checklist-number [selected]';
    public static $RecordsTab                    = '#checklist-number option';
    public static $CommunicationTab              = '#checklist-number option';
    public static $BusinessProfileTab            = '#checklist-number option';
   
    public static $TotalPointsBlock              = '.no-padd-left';
    public static $TotalPointsTitle              = '.no-padd-left .p-label';
    public static $TotalPointsInfo_ProgressBar   = '.row>div:nth-of-type(3).info-block p>span';
    
    public static $TotalMeasuresBlock                 = '.info-block';
    public static $TotalMeasuresTitle                 = '.info-block .p-label';
    public static $TotalMeasuresInfo_ProgressBar      = '.row>div:nth-of-type(2).info-block p>span';
    public static $TotalCompletedMeasures_ProgressBar = '.flex-reverse .progress-bar';
    
    public static $TotalPointsText_RightBlock    = '.text-center>div>p:first-of-type';
    public static $TotalPointsCount_RightBlock   = '.text-center>div>p:last-of-type';
    public static $TierDescription_RightBlock    = '.text-center>p';
    
    //--------------------------------------------------------------------------
    //-----------------------------Business Info Tab----------------------------
    //--------------------------------------------------------------------------
    const InProcessStatus            = 'In process';
    const RecognizedStatus           = 'Recognized';
    const DecertifiedStatus          = 'Decertified';
    const DisqualifiedStatus         = 'Disqualified';
    const NonresponsiveStatus        = 'Nonresponsive';
    const RequiresRenewalStatus      = 'Requires renewal';
    const RecertifyStatus            = 'Recertify';
    const RecertifyingStatus         = 'Recertifying';
    const MovedClosedStatus          = 'Moved/Closed';
    const NotSuitableStatus          = 'Not Suitable';
    const ExpiredStatus              = 'Expired';
    const RejectedStatus             = 'Rejected';
    const RequiresNewChecklistStatus = 'Requires new checklist';
    
    public static $StatusSelect_BusinessInfoTab               = '#application_dropdown_1';
    public static $RecognitionDateField_BusinessInfoTab       = '#recognition_date_input';
    public static $SaveDateButton_BusinessInfoTab             = 'button#recognition_date_save_button';
    public static $AddNewChecklistButton_BusinessInfoTab      = 'a.btn-renew';
    public static $RequiresNewChecklistButton_BusinessInfoTab = 'a.btn-new-checklist';
    
    public static $BusinessAddress_BusinessInfoTab = 'button#recognition_date_save_button';
    public static $City_BusinessInfoTab            = 'button#recognition_date_save_button';
    public static $ZipCode_BusinessInfoTab         = 'button#recognition_date_save_button';
    public static $Phone_BusinessInfoTab           = 'button#recognition_date_save_button';
    //Contact Info
    public static $ContactNameField_BusinessInfoTab     = 'button#recognition_date_save_button';
    public static $PhoneNumberField_BusinessInfoTab     = 'button#recognition_date_save_button';
    public static $EmailField_BusinessInfoTab           = 'button#recognition_date_save_button';
    public static $ManageContactsButton_BusinessInfoTab = 'a#popup_link_0';
    //Tier Statuses
    public static $TierStatusTitle_BusinessInfoTab         = 'button#recognition_date_save_button';
    public static function TierName_BusinessInfoTab($row)     { return "[class*=margin-top]>div:nth-of-type($row) .lite-green";}
    public static function TierStatus_BusinessInfoTab($row)   { return "[class*=margin-top]>div:nth-of-type($row) .p-label";}
    public static $TierPromotionsTitle_BusinessInfoTab     = 'button#recognition_date_save_button';
    
    public static function TierTab_BusinessInfoTab($tierNumber)     { return "[class*=margin-top]>div:nth-of-type($row) .lite-green";}
    public static $ApplicationStatusSelect_BusinessInfoTab          = '#application_dropdown_2';
    public static $PhoneConsultStatusSelect_BusinessInfoTab         = '#application_dropdown_3';
    public static $ComplianceCheckStatusSelect_BusinessInfoTab      = '#application_dropdown_4';
    public static $SiteVisitStatusSelect_BusinessInfoTab            = '#application_dropdown_5';
    public static $AuditsStatusSelect_BusinessInfoTab               = '#application_dropdown_6';
    public static $RecognitionTasksStatusSelect_BusinessInfoTab     = '#application_dropdown_7';
    public static $AddDetailsButton_ComplianceCheck_BusinessInfoTab = 'a#popup_link_1';
    public static $AddDetailsButton_Audits_BusinessInfoTab          = 'a#popup_link_2';
    
    public static $CompletionMessage    = 'p.progress-description';
    
    public static $MeasureRow           = '.row.measure-container';
    //Checklist View
    public static function MeasureDescription($row)              { return "(//*[@class='row measure-container'])[$row]/div[1]/p";}
    public static function MeasureToggleButton($row)             { return "(//*[@id='relmeasuretobusiness-answer_type'])[$row]";}
    public static function MeasureDescription_ByDesc($desc)      { return "//*[@id='measures-form']//div[text()[contains(., '$desc')]]";}
//    public static function MeasureGreenTip_ByDesc($desc, $grTip) { return "//*[@id='measures-form']//p[contains(text(), '$desc')]/span[@data-original-title='<p>$grTip</p>\n']";}
    public static function MeasureGreenTip($grTip)               { return "//*[@class='short-articles link-green no-ajax'][contains(h4/text(), 'Measure')]//*[text()='$grTip']";}
    public static function MeasureToggleButton_ByDesc($desc)     { return "//*[@id='measures-form']//div[text()[contains(., '$desc')]]//*[@id='relmeasuretobusiness-answer_type_switch_control']";}
    public static function MeasureToggleButton2_ByDesc($desc)    { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[@id='relmeasuretobusiness-answer_type']";}
    public static function MeasurePoints_ByDesc($desc)           { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//span[contains(@class, 'margin-0')]";}
    public static function Savings_ByDesc($desc)                 { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//div[@class='alert alert-info']";}
    
    public static function UploadButton_ByDesc($desc)            { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'file-upload')]/span";}
    public static function UploadInput_ByDesc($desc)             { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//input[@type='file']";}
    public static function UploadedFile_ByDesc($desc, $row)      { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'added-files')]/p[$row]";}
    public static function ViewButton_UploadedFile_ByDesc($desc, $row)      { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'added-files')]/p[$row]//a[1]";}
    public static function DeleteButton_UploadedFile_ByDesc($desc, $row)    { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'added-files')]/p[$row]//a[2]";}
    
    
    public static function FlagCheckboxLabel_ByDesc($desc)            { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@for, 'flag')]";}
    public static function PostCheckboxLabel_ByDesc($desc)            { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@for, 'post')]";}
    public static function HelpCheckboxLabel_ByDesc($desc)            { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@for, 'help')]";}
    
    
    public static function Submeasure_ByMeasureDesc($desc, $row)        { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]/div/span";}
    public static function SubmeasureLink_ByMeasureDesc($desc, $row)    { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]/div/span//a";}
    public static function SubmeasureSelect_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//select";}
    public static function SubmeasureField_ByMeasureDesc($desc, $row)   { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//input";}
    public static function SubmeasureToggleButton_2Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//div[contains(@class, 'switch-control-2-items')]";}
    public static function SubmeasureToggleButton2_2Items_ByMeasureDesc($desc, $row) { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//select[contains(@class, 'form-control popup-switcher')]";}
    public static function SubmeasureToggleButton_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//select[contains(@class, 'form-control popup-switcher')]";}
    
    public static function SubmeasureToggleButton_NO_2Items_ByMeasureDesc($desc, $row) { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//div[contains(@class, 'switch-control-2-items')]/div[@style='left: 26px; background-color: rgb(209, 74, 60);']";}
    public static function SubmeasureToggleButton_YES_2Items_ByMeasureDesc($desc, $row) { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//div[contains(@class, 'switch-control-2-items')]/div[@style='left: 2px; background-color: rgb(111, 183, 80);']";}
    public static function SubmeasureToggleButton_NO_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//div[contains(@class, 'switch-control-3-items')]/div[@style='left: 26px; background-color: rgb(209, 74, 60);']";}
    public static function SubmeasureToggleButton_YES_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//div[contains(@class, 'switch-control-3-items')]/div[@style='left: 2px; background-color: rgb(111, 183, 80);']";}
    public static function SubmeasureToggleButton_NA_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//div[contains(@class, 'switch-control-3-items')]/div[@style='left: 50px; background-color: rgb(204, 204, 204);']";}
    
    public static function AuditGreenTip_ByTipDesc($grTip)              { return "//*[@class='right-column-block']//h4[text()='$grTip']/i";}
    
    public static $CoreProgressBarInfo           = '#measures-form>div:nth-of-type(2) .progress-wrapper+span';
    public static $ElectiveProgressBarInfo       = '#measures-form>div:nth-last-of-type(3) .progress-wrapper+span';
    
    public static $CoreCompletedProgressBar      = '#measures-form>div:nth-of-type(2) .progress-wrapper .progress-bar';
    public static $ElectiveCompletedProgressBar  = '#measures-form>div:nth-last-of-type(3) .progress-wrapper .progress-bar';
    
    public static $CoreMeasuresTitle             = '//*[@id="measures-form"]//div[contains(div/h3/text(), "Core measures")]';
    public static $ElectiveMeasuresTitle         = '//*[@id="measures-form"]//div[contains(div/h3/text(), "Elective measures")]';
    
    public static $InfoAboutCountToCompleteElectiveMeasures   = "//*[@id='measures-form']//div[contains(h3/text(), 'Elective measures')]/div/p[1]";
    
    public static function Core_MeasureDescription_ByDesc($desc)        { return "//*[@id='measures-form']//div[contains(div/h3/text(), 'Core measures')]//div[text()[contains(., '$desc')]]";}
    public static function Elective_MeasureDescription_ByDesc($desc)    { return "//*[@id='measures-form']//div[contains(div/h3/text(), 'Elective measures')]//div[text()[contains(., '$desc')]]";}
    
    //-----------------------------Therms Popup---------------------------------
    
    const ThermsPopup                                                 = '.modal.in';
    public static $ThermsPopup_TotalReadonlyField                     = '.modal.in #total';
    public static $ThermsPopup_TotalReadonlyLabel                     = '.modal.in [for=total]';
    
    public static function ThermsPopup_OptionSelect_Section2($number)           { $a=$number+1; return ".modal.in .therm-section-2> div:nth-of-type($a) [id*='therm-opt']";}
    public static function ThermsPopup_OptionSelectOption_Section2($number)     { $a=$number+1; return ".modal.in .therm-section-2> div:nth-of-type($a) [id*='therm-opt'] option";}
    public static function ThermsPopup_OptionSelectLabel_Section2($number)      { $a=$number+1; return ".modal.in .therm-section-2> div:nth-of-type($a) [for=qt]";}
    public static function ThermsPopup_TotalEstimatedField_Section2($number)    { $a=$number+1; return ".modal.in .therm-section-2> div:nth-of-type($a) [id*='qt']";}
    public static function ThermsPopup_TotalEstimatedLabel_Section2($number)    { $a=$number+1; return ".modal.in .therm-section-2> div:nth-of-type($a)";}
    public static function ThermsPopup_DeleteOptionButton_Section2($number)     { $a=$number+1; return ".modal.in .therm-section-2> div:nth-of-type($a) [data-action=delete]";}
    
    public static $ThermsPopup_AddOptionButton          = '.modal.in [data-action=add]';
    public static $ThermsPopup_SaveChangesButton        = '.modal.in button[type=submit]';
    public static $ThermsPopup_CloseButton              = '.modal.in .close';

    //----------------------------Lighting Popup--------------------------------
    
    const LightingPopup                                                 = '.modal.in';
    public static $LightingPopup_BuildingTypeSelect                     = '.modal.in #building_type_id_0';
    public static $LightingPopup_BuildingTypeSelectLabel                = '.modal.in [for=building_type_id_0]';
    
    public static function LightingPopup_ReplacementFixtureSelect($number)         { $a=$number+1; return ".modal.in .lighting-section-2> div:nth-of-type($a) [id*='replacement_lighting_id']";}
    public static function LightingPopup_ReplacementFixtureQuantityField($number)  { $a=$number+1; return ".modal.in .lighting-section-2> div:nth-of-type($a) [id*='replacement_quantity']";}
    public static function LightingPopup_ExistingFixtureField($number)             { $a=$number+1; return ".modal.in .lighting-section-2> div:nth-of-type($a) [id*='existing_lighting_id']";}
    public static function LightingPopup_ExistingFixtureQuantityField($number)     { $a=$number+1; return ".modal.in .lighting-section-2> div:nth-of-type($a) [id*='existing_quantity']";}
    public static function LightingPopup_EnergySavingsField($number)               { $a=$number+1; return ".modal.in .lighting-section-2> div:nth-of-type($a) [id*='total_energy_saving']";}
    public static function LightingPopup_ExteriorCheckbox($number)                 { $a=$number+1; return ".modal.in .lighting-section-2> div:nth-of-type($a) [id*='building_space']";}
    public static function LightingPopup_DeleteOptionButton($number)               { $a=$number+1; return ".modal.in .lighting-section-2> div:nth-of-type($a) [data-action=delete]";}
    
    public static $LightingPopup_AddOptionButton          = '.modal.in [data-action=add]';
    public static $LightingPopup_SaveChangesButton        = '.modal.in button[type=submit]';
    public static $LightingPopup_CloseButton              = '.modal.in .close';
    
    //-----------------------------Waste Diversion Popup---------------------------------
    
    const WasteDiversionPopup                                          = '.modal.in';
    public static $WasteDiversionPopup_BeforeGBTab                     = ".modal.in [href='#tab-before']";
    public static $WasteDiversionPopup_AfterGBTab                      = ".modal.in [href='#tab-after']";
    
    public static function WasteDiversionPopup_CommoditySelect($row, $beforeOrAfter)              { return "#commodity_id_$beforeOrAfter"."_"."$row";}
    public static function WasteDiversionPopup_ContainerTypeSelect($row, $beforeOrAfter)          { return "#yards_$beforeOrAfter"."_"."$row";}
    public static function WasteDiversionPopup_ContainersField($row, $beforeOrAfter)              { return "#containers_$beforeOrAfter"."_"."$row";}
    public static function WasteDiversionPopup_CollectionPerWeekField($row, $beforeOrAfter)       { return "#pick_up_to_week_$beforeOrAfter"."_"."$row";}
    public static function WasteDiversionPopup_CompactedToggleButton($row, $beforeOrAfter)        { return "[name='rows[$row][$beforeOrAfter][compacted]']+div";}
    public static function WasteDiversionPopup_CompactedToggleButtonSelect($row, $beforeOrAfter)  { return "#tab-$beforeOrAfter .row-1 select[name*=compacted]";}
    
    public static function WasteDiversionPopup_SaveChangesButton($beforeOrAfter)        { return ".modal.in #tab-$beforeOrAfter tbody>tr:first-of-type button[type=submit]";}
    public static $WasteDiversionPopup_CloseButton             = '.modal.in .close';
    public static $WasteDiversionPopup_NO_SaveButton           = '.modal.in .close-popup';
    
    public static $WasteDiversionPopup_NO_AllPaperLabel        = '.modal.in .close-popup';
    public static $WasteDiversionPopup_NO_BottlesAndCansLabel  = '.modal.in .close-popup';
    public static $WasteDiversionPopup_NO_CompostLabel         = '.modal.in .close-popup';
    
    public static $WasteDiversionPopup_NO_AllPaperInput        = ".modal.in [name='all_paper_percent']";
    public static $WasteDiversionPopup_NO_BottlesAndCansInput  = ".modal.in [name='bottles_cans_percent']";
    public static $WasteDiversionPopup_NO_CompostInput         = ".modal.in [name='compost_percent']";
    
    public static $WasteDiversionPopup_NO_AllPaperProgressBar       = '.modal.in #factor_bar_0 .factor_slider';
    public static $WasteDiversionPopup_NO_BottlesAndCansProgressBar = '.modal.in #factor_bar_1 .factor_slider';
    public static $WasteDiversionPopup_NO_CompostProgressBar        = '.modal.in #factor_bar_2 .factor_slider';
}
