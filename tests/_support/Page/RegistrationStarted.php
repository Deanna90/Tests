<?php
namespace Page;

class RegistrationStarted
{
    public static $URL_Started                 = '/user/application/index';
    public static $URL_TierLanding             = '/user/application/info';
    public static $URL_Review                  = '/user/application/review';
    public static function URL_AuditGroup($idSubGr)  { return "/user/application/complete-measures?audit_subgroup_id=$idSubGr";}

    
    public static $Title                       = 'h2';
    public static $TierTitle                   = 'h4>strong';
    
    public static $OnlyViewModeAlert = '.right-column-checklist .alert';
    const OnlyViewModeMessage        = "Tier is available in view mode only.";
    
    
    public static $RegistrationMenuItem        = 'a.first';
    public static $ApplicationMenuItem         = 'a.second';
    public static $ReviewAndSubmitMenuItem     = 'a.third';
    public static $FewBusinessesDropdownButton = '.dropdown-few-business button';
    public static $FewBusinessesOption         = '.dropdown-few-business ul>li';
    public static function selectBusinessOption($row)             { return ".dropdown-few-business ul>li:nth-of-type($row)>a";}
    public static function selectBusinessOptionByName($business)  { return "//div[contains(@class, 'dropdown-few-business')]//ul/li/a[text()='$business']";}
    
    public static $InfoForNextTierButton      = '.col-md-3>div:last-of-type.row p:first-of-type';
    public static $NextTierButton             = '.col-md-3>div:last-of-type.row a:first-of-type';
    public static $PreviousTierButton         = '.col-md-3>div:last-of-type.row a:last-of-type';
    
    public static $SaveButton_Footer          = '.success.save-buttons button[type=submit].btn-green';
    public static $SaveAndNextButton_Footer   = '.success.save-buttons button[name*=save_next]';
    public static $NextButton_Footer          = '.success.save-buttons button[type=submit]+a';
    public static $PreviousButton_Footer      = '.success.save-buttons>div:first-of-type a.btn-md';
    public static $ReviewButton_Footer        = '.success.save-buttons>div:last-of-type a.btn-md';
    
    public static $TotalPointsBlock              = '.no-padd-left';
    public static $TotalPointsTitle              = '.no-padd-left .p-label';
    public static $TotalPointsInfo_ProgressBar   = '.row>div:nth-of-type(3).info-block p>span';
    
    public static $TotalMeasuresBlock                 = '.info-block';
    public static $TotalMeasuresTitle                 = '.info-block .p-label';
    public static $TotalMeasuresInfo_ProgressBar      = '.row>div:nth-of-type(2).info-block p>span';
    public static $TotalCompletedMeasures_ProgressBar = '.flex-reverse .progress-bar';
    
    public static $TotalPointsText_RightBlock    = '.text-center>div:nth-of-type(1)>p:nth-of-type(1)';
    public static $TotalPointsCount_RightBlock   = '.text-center>div:nth-of-type(1)>p:nth-of-type(2)';
    public static $TierDescription_RightBlock    = '.text-center>p.progress-description>strong';
    
    public static $GetStartedButton           = '.columns-content a[href*=tier]';
    public static $HowToUseThisAppButton      = "a[data-target='#how-to-use']";
    //-----Left Menu-----
    public static $LeftMenu_GetStartedButton               = '.getstarted-group a';
    
    public static $LeftMenu_EnergyGroupButton              = '.energy-group';
    public static $LeftMenu_GeneralGroupButton             = '.general-group';
    public static $LeftMenu_PollutionPreventionGroupButton = '.pollution-prevention-group';
    public static $LeftMenu_SolidWasteGroupButton          = '.solid-waste-group';
    public static $LeftMenu_TransportationGroupButton      = '.transportation-group';
    public static $LeftMenu_WastewaterGroupButton          = '.wastewater-group';
    public static $LeftMenu_WaterGroupButton               = '.water-group';
    
    public static $LeftMenu_GetStarted_ProgressBar               = '.getstarted-group .progress-bar';
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
    
    public static function LeftMenu_Subgroup_ByName($subgroup) { return "//*[@class='sub-menu active']//li/a[text()='$subgroup']";}
    public static function LeftMenu_Subgroup($row)             { return ".sub-menu.active li:nth-of-type($row)>a";}
    
    public static $LeftMenu_HowToUseThisAppButton          = '#checklist-number [selected]';
    public static function LeftMenu_PrintTierButton($row)      { return ".menu~a:nth-of-type($row)";}
    
    public static $RightBlock_NeedToCompleteMeasuresInfo     = '.right-column-block>div:first-of-type h4+p';
    public static $RightBlock_CurrentlyCompletedMeasuresInfo = '.right-column-block>div:first-of-type .large-insert-text';
    
    public static function CoordinatorEmail($row)           { return ".left-column-block>div:nth-of-type(2) ul>li:nth-of-type($row)>a:nth-of-type(2)";}
    public static function CoordinatorPhone($row)           { return ".left-column-block>div:nth-of-type(2) ul>li:nth-of-type($row)>a:nth-of-type(1)";}
    public static function CoordinatorEmail_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a[2]/text(), '$email')]/a[2]";}
    public static function CoordinatorPhone_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a[2]/text(), '$email')]/a[1]";}
    
    public static $CompletionMessage    = '.content-tier-info>div.padding_bottom3p';
    
    public static function MeasureDescription_ByDesc($desc)      { return "//*[@id='measures-form']//div[text()[contains(., '$desc')]]";}
//    public static function MeasureGreenTip_ByDesc($desc, $grTip) { return "//*[@id='measures-form']//p[contains(text(), '$desc')]/span[@data-original-title='<p>$grTip</p>\n']";}
    public static function MeasureGreenTip($desc, $grTip)        { return "//*[@id='measures-form']//div[div/div/div/text()[contains(., '$desc')]]/following-sibling::div//div[1]/div[1]/p[text()='$grTip']";}
    public static function MeasureToggleButton_ByDesc($desc)     { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[@id='relmeasuretobusiness-answer_type_switch_control']";}
    public static function MeasureToggleButton2_ByDesc($desc)    { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[@id='relmeasuretobusiness-answer_type']";}
    public static function MeasurePoints_ByDesc($desc)           { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//span[contains(@class, 'margin-0')]";}
    public static function UploadButton_ByDesc($desc)            { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'file-upload')]/span";}
    public static function UploadInput_ByDesc($desc)             { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//input[@type='file']";}
    public static function UploadedFile_ByDesc($desc, $row)      { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'added-files')]/p[$row]";}
    public static function ViewButton_UploadedFile_ByDesc($desc, $row)      { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'added-files')]/p[$row]//a[1]";}
    public static function DeleteButton_UploadedFile_ByDesc($desc, $row)    { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@class, 'added-files')]/p[$row]//a[2]";}
    
    public static function FlagCheckboxLabel_ByDesc($desc)       { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@for, 'flag')]";}
    public static function PostCheckboxLabel_ByDesc($desc)       { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@for, 'post')]";}
    public static function HelpCheckboxLabel_ByDesc($desc)       { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(@for, 'help')]";}
    
    public static function MeasureToolTip_ByDesc($desc)          { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//div[@class='linked-measure-description'][@data-toggle='tooltip']";}
    public static function HelpCheckboxToolTip_ByDesc($desc)     { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//*[contains(label/@for, 'help')]/div[@class='tooltip fade top in']//*[@class='tooltip-inner']";}
    
    public static function Submeasure_ByMeasureDesc($desc, $row)        { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]/div/span";}
    public static function SubmeasureLink_ByMeasureDesc($desc, $row)    { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]/div/span//a";}
    public static function SubmeasureSelect_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//select";}
    public static function SubmeasureField_ByMeasureDesc($desc, $row)   { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//input";}
    public static function SubmeasureToggleButton_2Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//div[contains(@class, 'switch-control-2-items')]";}
    public static function SubmeasureToggleButton_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//select[contains(@class, 'form-control popup-switcher')]";}
    
    public static function AuditGreenTip_ByTipDesc($grTip)              { return "//*[@class='right-column-block']//h4[text()='$grTip']/i";}
    
    public static $CoreProgressBarInfo           = '#measures-form>div:nth-of-type(2) .progress-wrapper+span';
    public static $ElectiveProgressBarInfo       = '#measures-form>div:nth-last-of-type(3) .progress-wrapper+span';
    
    public static $CoreCompletedProgressBar      = '#measures-form>div:nth-of-type(2) .progress-wrapper .progress-bar';
    public static $ElectiveCompletedProgressBar  = '#measures-form>div:nth-last-of-type(3) .progress-wrapper .progress-bar';
    
    public static $CoreMeasuresTitle             = "//*[@id='measures-form']//div[contains(div/h3/text(), 'Core measures')]";
    public static $ElectiveMeasuresTitle         = "//*[@id='measures-form']//div[contains(div/h3/text(), 'Elective measures')]";
    
    public static $InfoAboutCountToCompleteElectiveMeasures   = "//*[@id='measures-form']//div[contains(h3/text(), 'Elective measures')]/div/p[1]";
    
    
    public static function Core_MeasureDescription_ByDesc($desc)        { return "//*[@id='measures-form']//div[contains(div/div/h3/text(), 'Core measures')]//ol//div[text()[contains(., '$desc')]]";}
    public static function Elective_MeasureDescription_ByDesc($desc)    { return "//*[@id='measures-form']//div[contains(div/div/h3/text(), 'Elective measures')]//ol//div[text()[contains(., '$desc')]]";}
    
    
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
    public static function WasteDiversionPopup_CompactedToggleButtonSelect($row, $beforeOrAfter)  { return "[name='rows[$row][$beforeOrAfter][compacted]']";}
    
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
