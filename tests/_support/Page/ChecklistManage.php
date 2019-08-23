<?php
namespace Page;

class ChecklistManage extends \AcceptanceTester
{
    public static function URL($id)                 { return parent::$URL_UserAccess."/checklist/measures?id=$id";}
    public static function URL_VersionTab($id)      { return parent::$URL_UserAccess."/checklist/version?id=$id";}
    public static function URL_DefineTotalTab($id)  { return parent::$URL_UserAccess."/checklist/define-total?id=$id&type=tier";}
    public static function URL_PointsTab($id)       { return parent::$URL_UserAccess."/checklist/points?id=$id";}
    public static function URL_PointsTab_ExtensionTab($id, $extension)       { return parent::$URL_UserAccess."/checklist/points?id=$id&type=tier&tab=$extension";}
    
    public static $Title                  = 'h2';
    public static $VersionDateInfo        = '//h2/following-sibling::p';
    public static $StatusTitle            = 'h2+p>span:first-of-type';
    public static $TierTitle              = 'h2+p>span:last-of-type';
    
    public static $VersionHistoryTab            = '.right-column-checklist>div>div.tabs>ul>li:nth-of-type(1) a';
    public static $ManageMeasuresTab            = '.right-column-checklist>div>div.tabs>ul>li:nth-of-type(2) a';
    public static $DefineTotalMeasuresNeededTab = '.right-column-checklist>div>div.tabs>ul>li:nth-of-type(3) a';
    public static $PointsTab                    = '.right-column-checklist>div>div.tabs>ul>li:last-of-type a';
    
    public static $OnlyViewModeAlert = '.title-block+div.alert';
    const OnlyViewModeMessage        = "Tier is available in view mode only, because checklist is in use. Please clone the checklist to create a draft version.";
    
    //-----Version History Tab-----
    public static $VersionRow           = 'table[class*=version-history] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    
    public static $IdLinkHead_VersionHistoryTab                = '.version-history tr>th:nth-last-of-type(5) a';
    public static $StatusHead_VersionHistoryTab                = '.version-history tr>th:nth-last-of-type(4)';
    public static $UpdatedLinkHead_VersionHistoryTab           = '.version-history tr>th:nth-last-of-type(3) a';
    public static $CreatedLinkHead_VersionHistoryTab           = '.version-history tr>th:nth-last-of-type(2) a';
    public static $ActionsHead_VersionHistoryTab               = '.version-history tr>th:last-of-type';
    
    public static function IdLine_VersionHistoryTab($row)             { return ".version-history tbody>tr:nth-of-type($row)>td:nth-last-of-type(5)";}
    public static function StatusLine_VersionHistoryTab($row)         { return ".version-history tbody>tr:nth-of-type($row)>td:nth-last-of-type(4)";}
    public static function UpdatedLine_VersionHistoryTab($row)        { return ".version-history tbody>tr:nth-of-type($row)>td:nth-last-of-type(3)";}
    public static function CreatedLine_VersionHistoryTab($row)        { return ".version-history tbody>tr:nth-of-type($row)>td:nth-last-of-type(2)";}
    public static function EditButtonLine_VersionHistoryTab($row)     { return "//table[@class='version-history define setup']//tr[$row]//a[text()='Edit']";}
    public static function CloneButtonLine_VersionHistoryTab($row)    { return "//table[@class='version-history define setup']//tr[$row]//a[text()='Clone']";}
    public static function PublishButtonLine_VersionHistoryTab($row)  { return "//table[@class='version-history define setup']//tr[$row]//a[text()='Publish']";}
    public static function UnPublishButtonLine_VersionHistoryTab($row){ return "//table[@class='version-history define setup']//tr[$row]//a[text()='UnPublish']";}
    public static function ArchiveButtonLine_VersionHistoryTab($row)  { return "//table[@class='version-history define setup']//tr[$row]//a[text()='Archive']";}
    public static function ViewButtonLine_VersionHistoryTab($row)     { return "//table[@class='version-history define setup']//tr[$row]//a[text()='View']";}
    
    //Publish All Popup
    public static $PublishAllPopup                             = '.modal.in';
    public static $PublishAllPopup_Title                       = '.modal.in h2';
    public static $PublishAllPopup_WarningMessage              = '.modal.in #bsf';
    public static $PublishAllPopup_DraftVersionCountInfo       = '.modal.in form>div>div>div>div>p';
    public static $PublishAllPopup_TierNameHead                = '.modal.in button.confirm';
    public static $PublishAllPopup_StatusHead                  = '.modal.in button.confirm';
    public static function PublishAllPopup_TierNameLine($tierName)    { return "//div[contains(div/p/text(), '$tierName')]/div[1]/p";}
    public static function PublishAllPopup_StatusLine($tierName)      { return "//div[contains(div/p/text(), '$tierName')]/div[2]/p";}
    public static $PublishAllPopup_PublishAllDraftButton       = '.modal.in button[type=submit]:nth-of-type(1)';
    public static $PublishAllPopup_PublishAnywayButton         = '.modal.in button[type=submit]:nth-of-type(2)';
    public static $PublishAllPopup_CloseButton                 = '.modal.in .close';
    
    
    //-----Manage Measure Tab-----
    public static $SaveButton                                      = '.btn-green-lite.send-form[data-form=manage-checklist]';
    public static $PreviewButton                                   = '.btn-green-lite.ajax';
    public static $PrintButton                                     = '.btn-green-lite.no-ajax';
    public static $MeasureRow                                      = '.version-history.manage tr>td:first-of-type>p';
    
    public static $GroupTableTitle_ManageMeasureTab                = '.group-table';
    public static $SubgroupTableTitle_ManageMeasureTab             = '.sub-group-table';
    
    public static $IdHead_ManageMeasureTab                = '.title-row>th:nth-of-type(1)';
    public static $MeasureHead_ManageMeasureTab           = '.title-row>th:nth-of-type(2)';
    public static $MeasureExtensionHead_ManageMeasureTab  = '.title-row>th:nth-of-type(3)';
    public static $StatusHead_ManageMeasureTab            = '.title-row>th:nth-of-type(4)';
    
    public static function Line_ManageMeasureTab($desc)                        { return "//table[@class='version-history manage small-dropdown-text']//tr[contains(td[2]/p/text(),'$desc')]";}
    public static function IdLine_ManageMeasureTab($desc)                      { return "//table[@class='version-history manage small-dropdown-text']//tr[contains(td[2]/p/text(),'$desc')]/td[1]/p";}
    public static function MeasureDescLine_ManageMeasureTab($desc)             { return "//table[@class='version-history manage small-dropdown-text']//tr[contains(td[2]/p/text(),'$desc')]/td[2]/p";}
    public static function MeasureExtensionSelectLine_ManageMeasureTab($desc)  { return "//table[@class='version-history manage small-dropdown-text']//tr[contains(td[2]/p/text(),'$desc')]/td[3]//select";}
    public static function StatusSelectLine_ManageMeasureTab($desc)            { return "//table[@class='version-history manage small-dropdown-text']//tr[contains(td[2]/p/text(),'$desc')]/td[4]//select";}
    
    public static $TierLevelSelect_ManageMeasureTab                = '#tier_level';
    public static $VersionToEditSelect_ManageMeasureTab            = '#version_id';
    
    
    public static $Filter_ByExtensionSelect                        = "#filter-measure_extensions";
    public static $Filter_ByStatusSelect                           = "#filter-type";
    public static $Filter_ByQuantitativeSelect                     = "#filter-is_quantitative";
    public static $Filter_ByAuditGroupSelect                       = "#filter-audit_group_id";
    public static $Filter_ByAuditSubgroupSelect                    = "#filter-audit_subgroup_id";
    
    public static $Search_ByKeywordField                           = "#filter-keyword";
    public static $Search_ByNumberField                            = "#filter-measure_id";
     
    public static $IncludedMeasuresForm                            = '#number-of-included-measures';
    public static $IncludedMeasuresForm_Title                      = '.green-title';
    public static $IncludedMeasuresForm_CoreTitle                  = '.included-measures>fieldset:first-of-type legend';
    public static $IncludedMeasuresForm_DefaultCoreValue           = '.core-measures-req>p:nth-of-type(1) span';
    public static $IncludedMeasuresForm_LBCoreValue                = '.core-measures-req>p:nth-of-type(2) span';
    public static $IncludedMeasuresForm_LLCoreValue                = '.core-measures-req>p:nth-of-type(3) span';
    public static $IncludedMeasuresForm_LB_LLCoreValue             = '.core-measures-req>p:nth-of-type(4) span';
    public static $IncludedMeasuresForm_TotalCoreRequiredValue     = '.core-measures-req>p:nth-of-type(4) span';
    
    public static $IncludedMeasuresForm_DefaultCoreLabel           = '.core-measures-req>p:nth-of-type(1) small';
    public static $IncludedMeasuresForm_LBCoreLabel                = '.core-measures-req>p:nth-of-type(2) small';
    public static $IncludedMeasuresForm_LLCoreLabel                = '.core-measures-req>p:nth-of-type(3) small';
    public static $IncludedMeasuresForm_LB_LLCoreLabel             = '.core-measures-req>p:nth-of-type(4) small';
    public static $IncludedMeasuresForm_TotalCoreRequiredLabel     = '.core-measures-req>p:nth-of-type(4)';
    
    public static $IncludedMeasuresForm_ElectiveTitle                = '#included-measures .included-measures>fieldset:nth-of-type(2) legend';
    public static $IncludedMeasuresForm_DefaultElectiveValue         = '#included-measures .elective-measures-req>p:nth-of-type(1) span';
    public static $IncludedMeasuresForm_LBElectiveValue              = '#included-measures .elective-measures-req>p:nth-of-type(2) span';
    public static $IncludedMeasuresForm_LLElectiveValue              = '#included-measures .elective-measures-req>p:nth-of-type(3) span';
    public static $IncludedMeasuresForm_LB_LLElectiveValue           = '#included-measures .elective-measures-req>p:nth-of-type(4) span';
    public static $IncludedMeasuresForm_TotalElectiveValue           = '.elective-measures-req>p:nth-of-type(4) span';
    public static $IncludedMeasuresForm_DefaultElectiveRequiredValue = '#elective-required .elective-measures-req>p:nth-of-type(1) span';
    public static $IncludedMeasuresForm_LBElectiveRequiredValue      = '#elective-required .elective-measures-req>p:nth-of-type(2) span';
    public static $IncludedMeasuresForm_LLElectiveRequiredValue      = '#elective-required .elective-measures-req>p:nth-of-type(3) span';
    public static $IncludedMeasuresForm_LB_LLElectiveRequiredValue   = '#elective-required .elective-measures-req>p:nth-of-type(4) span';
    public static $IncludedMeasuresForm_TotalValue                   = '.total-req-measures span';
    
    public static $IncludedMeasuresForm_DefaultElectiveLabel         = '#included-measures .elective-measures-req>p:nth-of-type(1) small';
    public static $IncludedMeasuresForm_LBElectiveLabel              = '#included-measures .elective-measures-req>p:nth-of-type(2) small';
    public static $IncludedMeasuresForm_LLElectiveLabel              = '#included-measures .elective-measures-req>p:nth-of-type(3) small';
    public static $IncludedMeasuresForm_LB_LLElectiveLabel           = '#included-measures .elective-measures-req>p:nth-of-type(4) small';
    public static $IncludedMeasuresForm_TotalElectiveLabel           = '.elective-measures-req>p:nth-of-type(4)';
    public static $IncludedMeasuresForm_DefaultElectiveRequiredLabel = '#elective-required .elective-measures-req>p:nth-of-type(1)';
    public static $IncludedMeasuresForm_LBElectiveRequiredLabel      = '#elective-required .elective-measures-req>p:nth-of-type(2)';
    public static $IncludedMeasuresForm_LLElectiveRequiredLabel      = '#elective-required .elective-measures-req>p:nth-of-type(3)';
    public static $IncludedMeasuresForm_LB_LLElectiveRequiredLabel   = '#elective-required .elective-measures-req>p:nth-of-type(4)';
    public static $IncludedMeasuresForm_TotalLabel                   = '.total-req-measures p';
    
    //Weighted state
    public static $IncludedPointsForm_Title                      = '.green-title';
    public static $IncludedPointsForm_CoreTitle                  = '#included-measures-weighted .included-measures>fieldset:first-of-type legend';
    public static $IncludedPointsForm_DefaultCoreValue           = '#included-measures-weighted .core-measures-req>p:nth-of-type(1) span';
    public static $IncludedPointsForm_LBCoreValue                = '#included-measures-weighted .core-measures-req>p:nth-of-type(2) span';
    public static $IncludedPointsForm_LLCoreValue                = '#included-measures-weighted .core-measures-req>p:nth-of-type(3) span';
    public static $IncludedPointsForm_LB_LLCoreValue             = '#included-measures-weighted .core-measures-req>p:nth-of-type(4) span';
    
    public static $IncludedPointsForm_DefaultCoreLabel           = '#included-measures-weighted .core-measures-req>p:nth-of-type(1) small';
    public static $IncludedPointsForm_LBCoreLabel                = '#included-measures-weighted .core-measures-req>p:nth-of-type(2) small';
    public static $IncludedPointsForm_LLCoreLabel                = '#included-measures-weighted .core-measures-req>p:nth-of-type(3) small';
    public static $IncludedPointsForm_LB_LLCoreLabel             = '#included-measures-weighted .core-measures-req>p:nth-of-type(4) small';
    
    public static $IncludedPointsForm_ElectiveTitle                = '#included-measures-weighted .included-measures>fieldset:nth-of-type(2) legend';
    public static $IncludedPointsForm_DefaultElectiveValue         = '#included-measures-weighted .elective-measures-req>p:nth-of-type(1) span';
    public static $IncludedPointsForm_LBElectiveValue              = '#included-measures-weighted .elective-measures-req>p:nth-of-type(2) span';
    public static $IncludedPointsForm_LLElectiveValue              = '#included-measures-weighted .elective-measures-req>p:nth-of-type(3) span';
    public static $IncludedPointsForm_LB_LLElectiveValue           = '#included-measures-weighted .elective-measures-req>p:nth-of-type(4) span';
    
    public static $IncludedPointsForm_DefaultElectiveLabel         = '#included-measures-weighted .elective-measures-req>p:nth-of-type(1) small';
    public static $IncludedPointsForm_LBElectiveLabel              = '#included-measures-weighted .elective-measures-req>p:nth-of-type(2) small';
    public static $IncludedPointsForm_LLElectiveLabel              = '#included-measures-weighted .elective-measures-req>p:nth-of-type(3) small';
    public static $IncludedPointsForm_LB_LLElectiveLabel           = '#included-measures-weighted .elective-measures-req>p:nth-of-type(4) small';
    
    public static $ConfirmPopup                                    = '.sweet-alert.visible';
    public static $ConfirmPopup_Title                              = '.sweet-alert.visible h2';
    public static $ConfirmPopup_OkButton                           = '.sweet-alert.visible button.confirm';
    public static $ConfirmPopup_SuccessIcon                        = '.sweet-alert.visible .sa-success.animate';
    
    //Print Checklist Popup
    public static $PrintChecklistPopup                             = '.modal.in';
    public static $PrintChecklistPopup_Title                       = '.modal.in h2';
    public static $PrintChecklistPopup_BusinessSquireField         = '.modal.in #bsf';
    public static $PrintChecklistPopup_LandscapeSquireField        = '.modal.in #lsf';
    public static $PrintChecklistPopup_BusinessSquireLabel         = '.modal.in button.confirm';
    public static $PrintChecklistPopup_LandscapeSquireLabel        = '.modal.in button.confirm';
    public static $PrintChecklistPopup_GetButton                   = '.modal.in button[type=submit]';
    public static $PrintChecklistPopup_CloseButton                 = '.modal.in .close';
    
    //Checklist Warning Popup
    public static $ChecklistWarningPopup                           = '.modal.in';
    public static $ChecklistWarningPopup_Title                     = '.modal.in h2';
    public static $ChecklistWarningPopup_TextInfo                  = '.modal.in p';
    public static $ChecklistWarningPopup_YesButton                 = '.modal.in button[type=submit]';
    public static $ChecklistWarningPopup_NoButton                  = '.modal.in button[type=button]';
    public static $ChecklistWarningPopup_CloseButton               = '.modal.in .close';
    
    //-----Define Total Measures Needed Tab-----
    public static $DefaultTab_DefineTotalTab                       = '.tabs .tabs>ul>li:nth-of-type(1) a';
    public static $LBTab_DefineTotalTab                            = '.tabs .tabs>ul>li:nth-of-type(2) a';
    public static $LLTab_DefineTotalTab                            = '.tabs .tabs>ul>li:nth-of-type(3) a';
    public static $LB_LLTab_DefineTotalTab                         = '.tabs .tabs>ul>li:nth-of-type(4) a';
    
    public static $FilterMenu_EnergyGroupButton                    = "//ul[@class='filter-menu']/li/a[text()='Energy']";
    public static $FilterMenu_GeneralGroupButton                   = "//ul[@class='filter-menu']/li/a[text()='General']";
    public static $FilterMenu_PollutionPreventionGroupButton       = "//ul[@class='filter-menu']/li/a[text()='Pollution Prevention']";
    public static $FilterMenu_SolidWasteGroupButton                = "//ul[@class='filter-menu']/li/a[text()='Solid Waste']";
    public static $FilterMenu_TransportationGroupButton            = "//ul[@class='filter-menu']/li/a[text()='Transportation']";
    public static $FilterMenu_WastewaterGroupButton                = "//ul[@class='filter-menu']/li/a[text()='Wastewater']";
    public static $FilterMenu_Water                                = "//ul[@class='filter-menu']/li/a[text()='Water']";
    public static function FilterMenu_AuditGroupItem($group)       { return "//ul[@class='filter-menu']/li/a[text()='$group']";}
    
    public static $GroupTableTitle_DefineTotalTab                    = '.title-row p';
    
    public static $SubgroupsHead_DefineTotalTab                      = '.table-striped tr>th:nth-of-type(1)';
    public static $RequiredMeasuresHead_DefineTotalTab               = '.table-striped tr>th:nth-of-type(2)';
    public static $TotalOptionalHead_DefineTotalTab                  = '.table-striped tr>th:nth-of-type(3)';
    public static $CountOfOptionalEnabledMeasuresHead_DefineTotalTab = '.table-striped tr>th:nth-of-type(4)';
    public static $TotalMeasuresMustCompleteHead_DefineTotalTab      = '.table-striped tr>th:nth-of-type(5)';
    
    public static $SubgroupRow_DefineTotalTab                        = '.table-striped tbody>tr';
    
    public static function SubgroupLine_DefineTotalTab($subgroup)                                  { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[1]";}
    public static function CoreMeasuresLine_DefineTotalTab($subgroup)                              { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[2]/span";}
    public static function TotalElectiveLine_DefineTotalTab($subgroup)                             { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[3]/span";}
    public static function CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup)       { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[4]//div[contains(@class, 'input-row')]/input";}
    public static function ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup)  { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[4]//div[@class='help-block']";}
    public static function TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup)                 { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[5]/span";}
    //-----Points Tab-----
//    public static $RequiredPointsField                      = '#relcompletepointstochecklist-points';
    public static $RequiredPointsField                      = '#relcompletepointstochecklist-cumulativepoints';
    public static $RequiredPointsLabel                      = '[for=relcompletepointstochecklist-cumulativepoints]';
    public static $Error_RequiredPoints                     = '#relcompletepointstochecklist-cumulativepoints+.help-block';

}
