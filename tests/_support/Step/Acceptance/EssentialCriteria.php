<?php
namespace Step\Acceptance;

class EssentialCriteria extends \AcceptanceTester
{
    
    public function CreateEssentialCriteria($number = null, $status = null, $state = null, $completePoints = null)
    {
        $I = $this;
        $I->amOnPage(\Page\EssentialCriteriaList::URL());
        $I->wait(2);
        $I->click(\Page\EssentialCriteriaList::$CreateECButton);
        $I->wait(5);
        if (isset($number)){
            $I->click(\Page\EssentialCriteriaCreate::$NumberSelect);
            $I->wait(2);
            $I->selectOption(\Page\EssentialCriteriaCreate::$NumberSelect, $number);
            $I->wait(1);
        }
        if (isset($status)){
            $I->selectOption(\Page\EssentialCriteriaCreate::$StateSelect, $status);
        }
        if (isset($state)){
            $I->seeOptionIsSelected(\Page\EssentialCriteriaCreate::$StatusSelect, $state);
        }
        if (isset($completePoints)){
            $I->fillField(\Page\EssentialCriteriaCreate::$StatusSelect, $state);
        }
        $I->click(\Page\EssentialCriteriaCreate::$CreateButton);
        $I->wait(4);
    }  

    public function ManageEssentialCriteria($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\EssentialCriteriaManage::$SaveButton);
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
                $I->wait(1);
                $I->selectOption(\Page\EssentialCriteriaManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statusesNew[$i]);
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
                $I->selectOption(\Page\EssentialCriteriaManage::MeasureExtensionSelectLine_ManageMeasureTab($descs[$i]), $extensionsNew[$i]);
            }
        }
        $I->click(\Page\EssentialCriteriaManage::$SaveButton);
        $I->wait(2);
        return $statusesNew;
    }
    
    public function PublishECStatus($row = '1')
    {
        $I = $this;
        $I->wait(4);
        $I->waitForElement(\Page\EssentialCriteriaManage::$VersionHistoryTab);
        $I->click(\Page\EssentialCriteriaManage::$VersionHistoryTab);
        $I->wait(4);
        $I->click(\Page\EssentialCriteriaManage::PublishButtonLine_VersionHistoryTab($row));
        $I->wait(3);        
        $I->canSee('Published', \Page\EssentialCriteriaManage::$StatusTitle);
    }
    
    public function GetIdOfPublishedEC()
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\EssentialCriteriaManage::$VersionHistoryTab);
        $I->wait(1);
        $id = $I->grabTextFrom(\Page\EssentialCriteriaManage::$IdOfPublishedEC_VersionHistoryTab);
        $I->comment("Published EC id: $id");
        return $id;
    }
    
    public function UpdateECPoints($points)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\EssentialCriteriaManage::$SaveButton);
        $I->click(\Page\EssentialCriteriaManage::$PointsTab);
        $I->wait(1);
        $I->fillField(\Page\EssentialCriteriaManage::$RequiredPointsField);
        $I->wait(1);        
        $I->click(\Page\EssentialCriteriaManage::$SaveButton);
    }
    
    public function CheckSavedValuesOnManageEssentialCriteriaPage($descs = null, $statuses = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\EssentialCriteriaManage::$SaveButton);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeOptionIsSelected(\Page\EssentialCriteriaManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statuses[$i]);
            }
        }
        $I->wait(1);
    }
}