<?php
namespace Page;

class SectorChecklistManage extends \AcceptanceTester
{
    public static function URL($id)       { return parent::$URL_UserAccess."/checklist/measures?id=$id";}
    public static function URL_VersionTab($id)      { return parent::$URL_UserAccess."/checklist/version?id=$id";}
    public static function URL_DefineTotalTab($id)  { return parent::$URL_UserAccess."/checklist/define-total?id=$id&type=tier";}
    public static function URL_PointsTab($id)       { return parent::$URL_UserAccess."/checklist/points?id=$id";}
    public static function URL_PointsTab_ExtensionTab($id, $extension)       { return parent::$URL_UserAccess."/checklist/points?id=$id&type=tier&tab=$extension";}
    
    public static $Title                  = 'h2';
    public static $VersionDateInfo        = '//h2/following-sibling::p';
    public static $StatusTitle            = 'h2+p>span:first-of-type';
    public static $SectorTierTitle        = 'h2+p>span:last-of-type';
    
    public static $VersionHistoryTab            = '.tabs>ul>li:nth-of-type(1) a';
    public static $ManageMeasuresTab            = '.tabs>ul>li:nth-of-type(2) a';
    public static $DefineTotalMeasuresNeededTab = '.tabs>ul>li:nth-of-type(3) a';
    public static $PointsTab                    = '.tabs>ul>li:nth-of-type(4) a';
    
    public static $OnlyViewModeAlert = '.title-block+div.alert';
    const OnlyViewModeMessage        = "Tier is available in view mode only, because checklist is in use. Please clone the checklist to create a draft version.";
    
    //-----Version History Tab-----
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
    public static function ArchiveButtonLine_VersionHistoryTab($row)  { return "//table[@class='version-history define setup']//tr[$row]//a[text()='Archive']";}
    
    public static $IdOfPublishedSectorChecklist_VersionHistoryTab  = "//table[@class='version-history define setup']//tr[contains(td[3]/text(),'Published')]/td[2]";
    
    //Publish All Popup
    public static $PublishToProgramsPopup                             = '.modal.in';
    public static $PublishToProgramsPopup_Title                       = '.modal.in h2';
    public static function PublishToProgramsPopup_ProgramLine($program)    { return "//div[contains(div/p/text(), '$program')]/div[1]/p";}
    public static $PublishToProgramsPopup_PublishToAllProgramsButton  = ".modal.in button[name='publish-to-program']";
    public static $PublishToProgramsPopup_CloseButton                 = '.modal.in .close';
    
    //-----Manage Measure Tab-----
    public static $SaveButton_Header                               = 'div>div.title-block:first-child .btn.send-form[data-form=manage-checklist]';
    public static $SaveButton_Footer                               = 'div>div.title-block:last-child .btn.send-form[data-form=manage-checklist]';
    public static $PreviewButton                                   = '.btn[href*=preview]';
    public static $PrintButton                                     = '.btn.send-form[href*=print]';
    
    public static $GroupTableTitle_ManageMeasureTab                = '.group-table';
    public static $SubgroupTableTitle_ManageMeasureTab             = '.sub-group-table';
    
    public static $IdHead_ManageMeasureTab                = '.title-row>th:nth-of-type(1)';
    public static $MeasureHead_ManageMeasureTab           = '.title-row>th:nth-of-type(2)';
    public static $MeasureExtensionHead_ManageMeasureTab  = '.title-row>th:nth-of-type(3)';
    public static $StatusHead_ManageMeasureTab            = '.title-row>th:nth-of-type(4)';
    
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
    
    
    public static $ChangeTierButton_ManageMeasureTab               = '.btn-green-outline';
    
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
    
//    public static $IncludedMeasuresForm                            = '#number-of-included-measures';
//    public static $IncludedMeasuresForm_Title                      = '.green-title';
//    public static $IncludedMeasuresForm_CoreTitle                  = '.included-measures>fieldset:first-of-type legend';
//    public static $IncludedMeasuresForm_DefaultCoreValue           = '.core-measures-req>p:nth-of-type(1) span';
//    public static $IncludedMeasuresForm_LBCoreValue                = '.core-measures-req>p:nth-of-type(2) span';
//    public static $IncludedMeasuresForm_LLCoreValue                = '.core-measures-req>p:nth-of-type(3) span';
//    public static $IncludedMeasuresForm_LB_LLCoreValue             = '.core-measures-req>p:nth-of-type(4) span';
//    public static $IncludedMeasuresForm_TotalCoreRequiredValue     = '.core-measures-req>p:nth-of-type(5) span';
//    public static $IncludedMeasuresForm_ElectiveTitle              = '.included-measures>fieldset:nth-of-type(2) legend';
//    public static $IncludedMeasuresForm_DefaultElectiveValue       = '.elective-measures-req>p:nth-of-type(1) span';
//    public static $IncludedMeasuresForm_LBElectiveValue            = '.elective-measures-req>p:nth-of-type(2) span';
//    public static $IncludedMeasuresForm_LLElectiveValue            = '.elective-measures-req>p:nth-of-type(3) span';
//    public static $IncludedMeasuresForm_LB_LLElectiveValue         = '.elective-measures-req>p:nth-of-type(4) span';
//    public static $IncludedMeasuresForm_TotalElectiveValue         = '.elective-measures-req>p:nth-of-type(5) span';
//    public static $IncludedMeasuresForm_TotalElectiveRequiredValue = '.elective-measures-req>p:nth-of-type(6) span';
//    public static $IncludedMeasuresForm_TotalValue                 = '.total-req-measures span';
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
    
    
    public static $GroupTableTitle_DefineTotalTab                    = '.title-row';
    
    public static $SubgroupsHead_DefineTotalTab                      = '.table-striped tr>th:nth-of-type(1)';
    public static $RequiredMeasuresHead_DefineTotalTab               = '.table-striped tr>th:nth-of-type(2)';
    public static $TotalElectiveHead_DefineTotalTab                  = '.table-striped tr>th:nth-of-type(3)';
    public static $CountOfElectiveEnabledMeasuresHead_DefineTotalTab = '.table-striped tr>th:nth-of-type(4)';
    public static $TotalMeasuresMustCompleteHead_DefineTotalTab      = '.table-striped tr>th:nth-of-type(5)';
    
    public static function SubgroupLine_DefineTotalTab($subgroup)                                  { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[1]";}
    public static function CoreMeasuresLine_DefineTotalTab($subgroup)                              { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[2]/span";}
    public static function TotalElectiveLine_DefineTotalTab($subgroup)                             { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[3]/span";}
    public static function CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup)       { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[4]//input";}
    public static function ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup)  { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[4]//div[@class='help-block']";}
    public static function TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup)                 { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[5]/span";}
    //-----Points Tab-----
    public static $RequiredPointsField                      = '#relcompletepointstochecklist-cumulativepoints';
    public static $RequiredPointsLabel                      = '[for=relcompletepointstochecklist-cumulativepoints]';
    public static $Error_RequiredPoints                     = '#relcompletepointstochecklist-cumulativepoints+.help-block';
}
