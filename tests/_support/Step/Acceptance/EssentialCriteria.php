<?php
namespace Step\Acceptance;

class EssentialCriteria extends \AcceptanceTester
{
    
    public function CreateEssentialCriteria($number = null, $status = null, $state = null, $completePoints = null)
    {
        $I = $this;
        $I->amOnPage(\Page\EssentialCriteriaList::URL());
        $I->wait(1);
        $I->click(\Page\EssentialCriteriaList::$CreateECButton);
        $I->wait(2);
        if (isset($number)){
            $I->selectOption(\Page\EssentialCriteriaCreate::$NumberSelect, $number);
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
        $I->wait(2);
    }  

    public function ManageEssentialCriteria($descs = null, $statuses = null)
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
                $I->selectOption(\Page\EssentialCriteriaManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statusesNew[$i]);
            }
        }
        $I->click(\Page\EssentialCriteriaManage::$SaveButton);
        $I->wait(2);
        return $statusesNew;
    }
    
    public function PublishECStatus($row = '1')
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\EssentialCriteriaManage::$SaveButton);
        $I->click(\Page\EssentialCriteriaManage::$VersionHistoryTab);
        $I->wait(1);
        $I->click(\Page\EssentialCriteriaManage::PublishButtonLine_VersionHistoryTab($row));
        $I->wait(1);        
        $I->see('Published', \Page\EssentialCriteriaManage::$StatusTitle);
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
                $I->seeOptionIsSelected(\Page\EssentialCriteriaManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statuses[$i]);
            }
        }
        $I->wait(1);
    }
}