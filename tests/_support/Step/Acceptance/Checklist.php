<?php
namespace Step\Acceptance;

class Checklist extends \AcceptanceTester
{
    public function CreateChecklist($sourceProgram = null, $programDestination = null, $sectorDestination = null, $tier = null, $programCriteria = null, $sectorCriteria = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ChecklistCreate::URL());
//        $I->wait(7);
        if (isset($sourceProgram)){
            $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
            $I->wait(1);
            $I->waitPageLoad();
            $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
            $I->wait(1);
            $I->waitPageLoad();
        }
        if (isset($programCriteria)){
            $I->click(\Page\ChecklistCreate::$ProgramCriteriaSelect);
            $I->wait(4);
            $I->selectOption(\Page\ChecklistCreate::$ProgramCriteriaSelect, $programCriteria);
            $I->wait(5);
        }
        if (isset($sectorCriteria)){
            $I->click(\Page\ChecklistCreate::$SectorCriteriaSelect);
            $I->wait(4);
            $I->selectOption(\Page\ChecklistCreate::$SectorCriteriaSelect, $sectorCriteria);
            $I->wait(4);
        }
        if (isset($programDestination)){
            $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
            $I->wait(4);
            $I->selectOption(\Page\ChecklistCreate::$ProgramDestinationSelect, $programDestination);
            $I->wait(6);
        }
        if (isset($sectorDestination)){
            $I->click(\Page\ChecklistCreate::$SectorDestinationSelect);
            $I->wait(5);
            $I->selectOption(\Page\ChecklistCreate::$SectorDestinationSelect, $sectorDestination);
            $I->wait(4);
        }
        if (isset($tier)){
            $I->wait(4);
            $I->click(\Page\ChecklistCreate::$TierSelect);
            $I->wait(4);
            $I->selectOption(\Page\ChecklistCreate::$TierSelect, $tier);
        }
        $I->wait(3);
        $I->scrollTo(\Page\ChecklistCreate::$SaveButton);
        $I->wait(1);
        $I->click(\Page\ChecklistCreate::$SaveButton);
        $I->wait(6);
        $I->waitForElement('.confirm', 150);
        $I->click('.confirm');
        $I->wait(2);
        $checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url: $checklistUrl");
        $u1 = explode('=', $checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $id_checklist = $u2[0];
        $I->comment("Checklist id: $id_checklist");
        return $id_checklist;
    }  
    
    public function ManageChecklist($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countStat = count($statuses);
            $I->comment("Count of measures: $countDesc");
            $I->comment("Count of statuses: $countStat");
            $count       = $countStat - $countDesc;
            $statusesNew = array_splice($statuses, 0, $countDesc);
            $countDesc--;
            $I->comment("Count of measures -1 for next array: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->selectOption(\Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statusesNew[$i]);
            }
        }
        if (isset($descs) && isset($extension)){
            $countDesc = count($descs);
            $countExtens = count($extension);
            $I->comment("Count of measures: $countDesc");
            $I->comment("Count of extensions: $countExtens");
            $count       = $countExtens - $countDesc;
            $extensionsNew = array_splice($extension, 0, $countDesc);
            $countDesc--;
            $I->comment("Count of measures -1 for next array: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->selectOption(\Page\ChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($descs[$i]), $extensionsNew[$i]);
            }
        }
        $I->wait(2);
        $I->scrollTo(\Page\ChecklistManage::$SaveButton);
        $I->wait(5);
        $I->click(\Page\ChecklistManage::$SaveButton);
//        $I->wait(6);
//        $I->click(\Page\ChecklistManage::$ConfirmPopup_OkButton);
        $I->wait(2);
        $I->waitPageLoad();
        return $statusesNew;
    }
    
    public function PublishChecklistStatus($id_checklist, $row = '1', $endStatus = 'published')
    {
        $I = $this;
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($id_checklist));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 15);
        $I->wait(2);
        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab($row));
        $I->wait(6); 
        $popup = $I->getAmount($I, \Page\ChecklistManage::$PublishAllPopup);
        if($popup == '1'){
            $anyway = $I->getAmount($I, \Page\ChecklistManage::$PublishAllPopup_PublishAnywayButton);
                if($anyway == '1'){
                    $I->click(\Page\ChecklistManage::$PublishAllPopup_PublishAnywayButton);
                    $I->wait(5);
                }
                else{
                    $I->click(\Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
                    $I->wait(5);
                }
        }
        if($endStatus == 'published'){
            $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
            if($popup2 == '1'){
                $I->click(".confirm");
                $I->wait(5);
            }
            $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
        }
        if($endStatus == 'ignore'){
        }
        if($endStatus == 'draft'){
            $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
            if($popup2 == '1'){
                $I->click(".confirm");
                $I->wait(5);
            }
            $I->canSee('Draft', \Page\ChecklistManage::$StatusTitle);
        }
    }
    
    public function UpdateChecklistPoints($points_Default = null, $points_LB = null, $points_LL = null, $points_LL_LB = null)
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(\Page\ChecklistManage::$RequiredPointsField, 150);
        $I->wait(1);
        if(isset($points_Default)){
            $I->comment("-----                      Points for Default:                      -----");
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_Default);
            $I->wait(2);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
            $I->waitForElement(\Page\ChecklistManage::$RequiredPointsField, 150);
        }
        if(isset($points_LB)){
            $I->comment("-----                         Points for LB:                        -----");
            $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_lb'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='lb'].active", 150);
            $I->wait(1);
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LB);
            $I->wait(1);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='lb'].active", 150);
        }
        if(isset($points_LL)){
            $I->comment("-----                         Points for LL:                        -----");
            $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_ll'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='ll'].active", 150);
            $I->wait(1);
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL);
            $I->wait(1);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='ll'].active", 150);
        }
        if(isset($points_LL_LB)){
            $I->comment("-----                        Points for LL&LB:                      -----");
            $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'all'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='all'].active", 150);
            $I->wait(1);
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB);
            $I->wait(1);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='all'].active", 150);
        }
    }
    
    public function CheckSavedChecklistPoints($points_Default = null, $points_LB = null, $points_LL = null, $points_LL_LB = null)
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(\Page\ChecklistManage::$RequiredPointsField, 150);
        $I->wait(1);
        if(isset($points_Default)){
            $I->comment("-----                      Points for Default:                      -----");
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_Default);
//            $I->wait(2);
        }
        if(isset($points_LB)){
            $I->comment("-----                         Points for LB:                        -----");
            $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_lb'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='lb'].active", 150);
            $I->wait(1);
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_LB);
//            $I->wait(2);
        }
        if(isset($points_LL)){
            $I->comment("-----                         Points for LL:                        -----");
            $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_ll'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='ll'].active", 150);
            $I->wait(1);
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_LL);
//            $I->wait(2);
        }
        if(isset($points_LL_LB)){
            $I->comment("-----                        Points for LL&LB:                      -----");
            $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'all'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='all'].active", 150);
            $I->wait(1);
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB);
//            $I->wait(2);
        }
    }
    
    public function CheckSavedValuesOnManageChecklistPage($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures -1 for next array: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeOptionIsSelected(\Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statuses[$i]);
            }
        }
        if (isset($descs) && isset($extension)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures -1 for next array: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeOptionIsSelected(\Page\ChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($descs[$i]), $extension[$i]);
            }
        }
        $I->wait(1);
    }
    
    public function CheckExtensionSelectsForEditingOnManageChecklistPage($disabled_descs = null, $active_descs = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        if (isset($disabled_descs)){
            $countDesc = count($disabled_descs);
            $countDesc--;
            $I->comment("Count of disabled extension selects: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeElementIsDisabled($I, \Page\ChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($disabled_descs[$i]), $selector = 'xpath');
            }
        }
        if (isset($active_descs)){
            $countDesc = count($active_descs);
            $countDesc--;
            $I->comment("Count of active extension selects: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->cantSeeElementIsDisabled($I, \Page\ChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($active_descs[$i]), $selector = 'xpath');
            }
        }
        $I->wait(1);
    }
    
    public function CheckStatusSelectsForEditingOnManageProgramChecklistPage($disabled_descs = null, $active_descs = null, $sectorDisabled_descs = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        if (isset($disabled_descs)){
            $countDesc = count($disabled_descs);
            $countDesc--;
            $I->comment("Count of disabled status selects: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->comment("-------Check that $disabled_descs[$i] is blocked-------");
                $I->canSeeElementIsDisabled($I, \Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($disabled_descs[$i]), $selector = 'xpath');
            }
        }
        if (isset($sectorDisabled_descs)){
            $countDesc = count($sectorDisabled_descs);
            $countDesc--;
            $I->comment("Count of disabled status selects: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->comment("-------Check that $sectorDisabled_descs[$i] is blocked and highlighted-------");
                $I->canSeeElementIsDisabled($I, \Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($sectorDisabled_descs[$i]), $selector = 'xpath');
                $I->canSeeElement(\Page\ChecklistManage::Line_ManageMeasureTab($sectorDisabled_descs[$i])."[@class=' read-only active']");
            }
        }
        if (isset($active_descs)){
            $countDesc = count($active_descs);
            $countDesc--;
            $I->comment("Count of active status selects: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->comment("-------Check that $active_descs[$i] is active to update-------");
                $I->cantSeeElementIsDisabled($I, \Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($active_descs[$i]), $selector = 'xpath');
            }
        }
        $I->wait(1);
    }
    
    public function UpdateDefineTotalValue($extension, $auditGroup, $subgroup, $value) {
        $I = $this;
        $I->comment("-----                      -----                       -----");
        $I->comment("---------------------$auditGroup group----------------------");
        $I->comment("--------------$subgroup subgroup $extension TAB-------------");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        switch ($extension) {
            case 'def':
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
            case 'lb':
                $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='lb'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
            case 'll':
                $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='ll'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
            case 'all':
                $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='all'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
        }
    }
    
    public function CheckSavedDefineTotalValue($extension, $auditGroup, $subgroup, $coreCount =null, $electiveCount=null, $requiredElective=null, $totalRequired=null) {
        $I = $this;
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        $I->comment("---------------------$auditGroup group----------------------");
        $I->comment("--------------$subgroup subgroup $extension TAB-------------");
        switch ($extension) {
            case 'def':
//                $I->wait(2);
//                $I->waitForElement(".tabs a[href*='def'].active", 150);
//                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
            case 'lb':
                $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='lb'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
            case 'll':
                $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='ll'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
            case 'all':
                $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='all'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
        }
    }
    
    public function CheckValidationErrorWhenUpdateDefineTotalValue($extension, $auditGroup, $subgroup, $value, $error) {
        $I = $this;
        $I->comment("-----                      -----                       -----");
        $I->comment("---------------------$auditGroup group----------------------");
        $I->comment("--------------$subgroup subgroup $extension TAB-------------");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        switch ($extension) {
            case 'def':
//                $I->wait(2);
//                $I->waitForElement(".tabs a[href*='def'].active", 150);
//                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
            case 'lb':
                $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='lb'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
            case 'll':
                $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='ll'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
            case 'all':
                $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='all'].active", 150);
                $I->wait(1);
                $I->click(\Page\ChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
        }
    }
    
    public function CheckValidationErrorWhenUpdatePointsValue($extension, $value, $error) {
        $I = $this;
        $I->comment("-----                      -----                       -----");
        $I->comment("-----------------------$extension TAB-----------------------");
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        switch ($extension) {
            case 'def':
//                $I->wait(2);
//                $I->waitForElement(".tabs a[href*='def'].active", 150);
//                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->waitForText("Points was not updated!", 100);
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::$Error_RequiredPoints);
                $I->comment("-----                      -----                       -----");
                break;
            case 'lb':
                $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='lb'].active", 150);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->waitForText("Points was not updated!", 100);
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::$Error_RequiredPoints);
                $I->comment("-----                      -----                       -----");
                break;
            case 'll':
                $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='ll'].active", 150);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->waitForText("Points was not updated!", 100);
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::$Error_RequiredPoints);
                $I->comment("-----                      -----                       -----");
                break;
            case 'all':
                $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='all'].active", 150);
                $I->wait(1);
                $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $value);
                $I->click(\Page\ChecklistManage::$SaveButton);
                $I->wait(2);
                $I->waitPageLoad();
                $I->waitForText("Points was not updated!", 100);
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\ChecklistManage::$Error_RequiredPoints);
                $I->comment("-----                      -----                       -----");
                break;
        }
    }
    
    public function CheckSavedValuesOnManageProgramChecklistPage($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeOptionIsSelected(\Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statuses[$i]);
            }
        }
        if (isset($descs) && isset($extension)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeOptionIsSelected(\Page\ChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($descs[$i]), $extension[$i]);
            }
        }
        $I->wait(1);
    }
    
    public function Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = null, $lbCount = null, $llCount = null, $allCount = null) {
        $I = $this;
        $I->comment("---                     ---Core---                    ---");
        if(isset($defaultCount)){
            $I->canSee($defaultCount, \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        }
        if(isset($lbCount)){
            $I->canSee($lbCount, \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        }
        if(isset($llCount)){
            $I->canSee($llCount, \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        }
        if(isset($allCount)){
            $I->canSee($allCount, \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        }
    }
    
    public function Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = null, $lbCount = null, $llCount = null, $allCount = null) {
        $I = $this;
        $I->comment("---                   ---Elective---                  ---");
        if(isset($defaultCount)){
            $I->canSee($defaultCount, \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        }
        if(isset($lbCount)){
            $I->canSee($lbCount, \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        }
        if(isset($llCount)){
            $I->canSee($llCount, \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        }
        if(isset($allCount)){
            $I->canSee($allCount, \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        }
    }
    
    public function Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = null, $lbCount = null, $llCount = null, $allCount = null) {
        $I = $this;
        $I->comment("---              ---Required Elective---              ---");
        if(isset($defaultCount)){
            $I->canSee($defaultCount, \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredValue);
        }
        if(isset($lbCount)){
            $I->canSee($lbCount, \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredValue);
        }
        if(isset($llCount)){
            $I->canSee($llCount, \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredValue);
        }
        if(isset($allCount)){
            $I->canSee($allCount, \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredValue);
        }
    }
    
    public function Check_PointsOf_Core_Measures_IncludedPointsForm($defaultPoints = null, $lbPoints = null, $llPoints = null, $allPoints = null) {
        $I = $this;
        $I->comment("---                    ---Core---                    ---");
        if(isset($defaultPoints)){
            $I->canSee($defaultPoints, \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        }
        if(isset($lbPoints)){
            $I->canSee($lbPoints, \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        }
        if(isset($llPoints)){
            $I->canSee($llPoints, \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        }
        if(isset($allPoints)){
            $I->canSee($allPoints, \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        }
    }
    
    public function Check_PointsOf_Elective_Measures_IncludedPointsForm($defaultPoints = null, $lbPoints = null, $llPoints = null, $allPoints = null) {
        $I = $this;
        $I->comment("---                  ---Elective---                  ---");
        if(isset($defaultPoints)){
            $I->canSee($defaultPoints, \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        }
        if(isset($lbPoints)){
            $I->canSee($lbPoints, \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        }
        if(isset($llPoints)){
            $I->canSee($llPoints, \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        }
        if(isset($allPoints)){
            $I->canSee($allPoints, \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        }
    }
}