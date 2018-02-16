<?php
namespace Step\Acceptance;

class Checklist extends \AcceptanceTester
{
    public function CreateChecklist($sourceProgram = null, $programDestination = null, $sectorDestination = null, $tier = null, $programCriteria = null, $sectorCriteria = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(7);
        if (isset($sourceProgram)){
            $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
            $I->wait(2);
            $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
            $I->wait(3);
        }
        if (isset($programCriteria)){
            $I->click(\Page\ChecklistCreate::$ProgramCriteriaSelect);
            $I->wait(3);
            $I->selectOption(\Page\ChecklistCreate::$ProgramCriteriaSelect, $programCriteria);
            $I->wait(5);
        }
        if (isset($sectorCriteria)){
            $I->click(\Page\ChecklistCreate::$SectorCriteriaSelect);
            $I->wait(3);
            $I->selectOption(\Page\ChecklistCreate::$SectorCriteriaSelect, $sectorCriteria);
            $I->wait(4);
        }
        if (isset($programDestination)){
            $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
            $I->wait(3);
            $I->selectOption(\Page\ChecklistCreate::$ProgramDestinationSelect, $programDestination);
            $I->wait(5);
        }
        if (isset($sectorDestination)){
            $I->click(\Page\ChecklistCreate::$SectorDestinationSelect);
            $I->wait(3);
            $I->selectOption(\Page\ChecklistCreate::$SectorDestinationSelect, $sectorDestination);
            $I->wait(4);
        }
        if (isset($tier)){
            $I->wait(4);
            $I->click(\Page\ChecklistCreate::$TierSelect);
            $I->wait(3);
            $I->selectOption(\Page\ChecklistCreate::$TierSelect, $tier);
        }
        $I->wait(3);
        $I->scrollTo(\Page\ChecklistCreate::$SaveButton);
        $I->wait(1);
        $I->click(\Page\ChecklistCreate::$SaveButton);
        $I->wait(6);
        $I->waitForElement('.confirm', 100);
        $I->click('.confirm');
        $I->wait(2);
    }  
    
    public function ManageChecklist($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(6);
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
        $I->scrollTo(\Page\ChecklistManage::$SaveButton);
        $I->wait(5);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
//        $I->click(\Page\ChecklistManage::$ConfirmPopup_OkButton);
        $I->wait(2);
        return $statusesNew;
    }
    
    public function PublishChecklistStatus($row = '1')
    {
        $I = $this;
        $I->wait(4);
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 15);
        $I->wait(2);
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(8);
        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab($row));
        $I->wait(3);        
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
    }
    
    public function UpdateChecklistPoints($points_Default = null, $points_LB = null, $points_LL = null, $points_LL_LB = null)
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(5);
        if(isset($points_Default)){
            $I->comment("-----                      Points for Default:                      -----");
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_Default);
            $I->wait(2);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(2);
            $I->waitForText("Points was successfully updated!", 70);
            $I->reloadPage();
            $I->wait(3);
        }
        if(isset($points_LB)){
            $I->comment("-----                         Points for LB:                        -----");
            $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
            $I->wait(3);
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LB);
            $I->wait(1);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(2);
            $I->waitForText("Points was successfully updated!", 70);
            $I->reloadPage();
            $I->wait(3);
        }
        if(isset($points_LL)){
            $I->comment("-----                         Points for LL:                        -----");
            $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
            $I->wait(3);
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL);
            $I->wait(1);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(2);
            $I->waitForText("Points was successfully updated!", 70);
            $I->reloadPage();
            $I->wait(3);
        }
        if(isset($points_LL_LB)){
            $I->comment("-----                        Points for LL&LB:                      -----");
            $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
            $I->wait(3);
            $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB);
            $I->wait(1);
            $I->click(\Page\ChecklistManage::$SaveButton);
            $I->wait(2);
            $I->waitForText("Points was successfully updated!", 70);
            $I->reloadPage();
            $I->wait(3);
        }
    }
    
    public function CheckSavedChecklistPoints($points_Default = null, $points_LB = null, $points_LL = null, $points_LL_LB = null)
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(5);
        if(isset($points_Default)){
            $I->comment("-----                      Points for Default:                      -----");
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_Default);
            $I->wait(2);
        }
        if(isset($points_LB)){
            $I->comment("-----                         Points for LB:                        -----");
            $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
            $I->wait(4);
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_LB);
            $I->wait(2);
        }
        if(isset($points_LL)){
            $I->comment("-----                         Points for LL:                        -----");
            $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
            $I->wait(4);
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_LL);
            $I->wait(2);
        }
        if(isset($points_LL_LB)){
            $I->comment("-----                        Points for LL&LB:                      -----");
            $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
            $I->wait(4);
            $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB);
            $I->wait(2);
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
    
    public function CheckStatusSelectsForEditingOnManageChecklistPage($disabled_descs = null, $active_descs = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        if (isset($disabled_descs)){
            $countDesc = count($disabled_descs);
            $countDesc--;
            $I->comment("Count of disabled status selects: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeElementIsDisabled($I, \Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($disabled_descs[$i]), $selector = 'xpath');
            }
        }
        if (isset($active_descs)){
            $countDesc = count($active_descs);
            $countDesc--;
            $I->comment("Count of active status selects: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->cantSeeElementIsDisabled($I, \Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($active_descs[$i]), $selector = 'xpath');
            }
        }
        $I->wait(1);
    }
}