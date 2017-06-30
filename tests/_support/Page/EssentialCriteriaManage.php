<?php
namespace Page;

class EssentialCriteriaManage extends \AcceptanceTester
{
    public static function URL($id)       { return parent::$URL_UserAccess."/checklist/measures?id=$id";}
    public static $Title                  = 'h2';
    public static $StatusTitle            = 'h2+p>span:first-of-type';
    
    public static $VersionHistoryTab            = '.tabs>ul>li:nth-of-type(1) a';
    public static $ManageMeasuresTab            = '.tabs>ul>li:nth-of-type(2) a';
    public static $DefineTotalMeasuresNeededTab = '.tabs>ul>li:nth-of-type(3) a';
    public static $PointsTab                    = '.tabs>ul>li:nth-of-type(4) a';
    
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
    
    //-----Manage Measure Tab-----
    public static $SaveButton                                      = '.btn.send-form';
    
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
    
    public static $TierLevelSelect_ManageMeasureTab                = '[name=id]';
    
    public static $ChangeTierButton_ManageMeasureTab               = '.btn-green-outline';
    
    public static $IncludedMeasuresForm                            = '#number-of-included-measures';
    public static $IncludedMeasuresForm_Title                      = '.green-title';
    public static $IncludedMeasuresForm_CoreTitle                  = '.included-measures>fieldset:first-of-type legend';
    public static $IncludedMeasuresForm_DefaultCoreValue           = '.core-measures-req>p:nth-of-type(1) span';
    public static $IncludedMeasuresForm_LBCoreValue                = '.core-measures-req>p:nth-of-type(2) span';
    public static $IncludedMeasuresForm_LLCoreValue                = '.core-measures-req>p:nth-of-type(3) span';
    public static $IncludedMeasuresForm_LB_LLCoreValue             = '.core-measures-req>p:nth-of-type(4) span';
    public static $IncludedMeasuresForm_TotalCoreRequiredValue     = '.core-measures-req>p:nth-of-type(5) span';
    public static $IncludedMeasuresForm_ElectiveTitle              = '.included-measures>fieldset:nth-of-type(2) legend';
    public static $IncludedMeasuresForm_DefaultElectiveValue       = '.elective-measures-req>p:nth-of-type(1) span';
    public static $IncludedMeasuresForm_LBElectiveValue            = '.elective-measures-req>p:nth-of-type(2) span';
    public static $IncludedMeasuresForm_LLElectiveValue            = '.elective-measures-req>p:nth-of-type(3) span';
    public static $IncludedMeasuresForm_LB_LLElectiveValue         = '.elective-measures-req>p:nth-of-type(4) span';
    public static $IncludedMeasuresForm_TotalElectiveValue         = '.elective-measures-req>p:nth-of-type(5) span';
    public static $IncludedMeasuresForm_TotalElectiveRequiredValue = '.elective-measures-req>p:nth-of-type(6) span';
    public static $IncludedMeasuresForm_TotalValue                 = '.total-req-measures span';
    //-----Define Total Measures Needed Tab-----
    public static $FilterMenu_EnergyGroupButton                    = "//ul[@class='filter-menu']/li/a[text()='Energy']";
    public static $FilterMenu_GeneralGroupButton                   = "//ul[@class='filter-menu']/li/a[text()='General']";
    public static $FilterMenu_PollutionPreventionGroupButton       = "//ul[@class='filter-menu']/li/a[text()='Pollution Prevention']";
    public static $FilterMenu_SolidWasteGroupButton                = "//ul[@class='filter-menu']/li/a[text()='Solid Waste']";
    public static $FilterMenu_TransportationGroupButton            = "//ul[@class='filter-menu']/li/a[text()='Transportation']";
    public static $FilterMenu_WastewaterGroupButton                = "//ul[@class='filter-menu']/li/a[text()='Wastewater']";
    public static $FilterMenu_Water                                = "//ul[@class='filter-menu']/li/a[text()='Water']";
    
    public static $GroupTableTitle_DefineTotalTab                    = '.title-row';
    
    public static $SubgroupsHead_DefineTotalTab                      = '.table-striped tr>th:nth-of-type(1)';
    public static $RequiredMeasuresHead_DefineTotalTab               = '.table-striped tr>th:nth-of-type(2)';
    public static $TotalOptionalHead_DefineTotalTab                  = '.table-striped tr>th:nth-of-type(3)';
    public static $CountOfOptionalEnabledMeasuresHead_DefineTotalTab = '.table-striped tr>th:nth-of-type(4)';
    public static $TotalMeasuresMustCompleteHead_DefineTotalTab      = '.table-striped tr>th:nth-of-type(5)';
    
    public static function SubgroupLine_DefineTotalTab($subgroup)                             { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[1]";}
    public static function RequiredMeasuresLine_DefineTotalTab($subgroup)                     { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[2]/span";}
    public static function TotalOptionalLine_DefineTotalTab($subgroup)                        { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[3]/span";}
    public static function CountOfOptionalEnabledMeasuresFieldLine_DefineTotalTab($subgroup)  { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[4]//input";}
    public static function TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup)            { return "//table[@class='table-striped custom-table']/tbody/tr[contains(td/text(), '$subgroup')]/td[5]/span";}
    //-----Points Tab-----
    public static $RequiredPointsField                      = '#checklist-complete_points';
    public static $RequiredPointsLabel                      = '[for=checklist-complete_points]';
}
