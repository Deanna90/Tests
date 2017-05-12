<?php
namespace Step\Acceptance;

class Checklist extends \AcceptanceTester
{
    public function CreateChecklist($sourceProgram = null, $programDestination = null, $sectorDestination = null, $tier = null, $programCriteria = null, $sectorCriteria = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(2);
        if (isset($sourceProgram)){
            $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
        }
        if (isset($programCriteria)){
            $I->selectOption(\Page\ChecklistCreate::$ProgramCriteriaSelect, $programCriteria);
        }
        if (isset($sectorCriteria)){
            $I->wait(1);
            $I->selectOption(\Page\ChecklistCreate::$SectorCriteriaSelect, $sectorCriteria);
        }
        if (isset($programDestination)){
            $I->selectOption(\Page\ChecklistCreate::$ProgramDestinationSelect, $programDestination);
        }
        if (isset($sectorDestination)){
            $I->wait(1);
            $I->selectOption(\Page\ChecklistCreate::$SectorDestinationSelect, $sectorDestination);
        }
        if (isset($tier)){
            $I->wait(1);
            $I->selectOption(\Page\ChecklistCreate::$TierSelect, $tier);
        }
        $I->wait(1);
        $I->click(\Page\ChecklistCreate::$SaveButton);
        $I->wait(3);
        $I->click('.confirm');
    }  
    
    public function ManageChecklist($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countStat = count($statuses);
            $I->comment("Count of measures: $countDesc");
            $I->comment("Count of statuses: $countStat");
            $count       = $countStat - $countDesc;
            $statusesNew = array_splice($statuses, $count);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
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
            $extensionsNew = array_splice($extension, $count);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->selectOption(\Page\ChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($descs[$i]), $extensionsNew[$i]);
            }
        }
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
//        $I->click(\Page\ChecklistManage::$ConfirmPopup_OkButton);
        $I->wait(2);
        return $statusesNew;
    }
    
    public function PublishChecklistStatus($row = '1')
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab($row));
        $I->wait(1);        
        $I->see('Published', \Page\ChecklistManage::$StatusTitle);
    }
    
    public function UpdateChecklistPoints($points)
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(1);
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points);
        $I->wait(1);        
        $I->click(\Page\ChecklistManage::$SaveButton);
    }
    
    public function CheckSavedValuesOnManageChecklistPage($descs = null, $statuses = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistManage::$SaveButton);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->seeOptionIsSelected(\Page\ChecklistManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statuses[$i]);
            }
        }
        $I->wait(1);
    }
}