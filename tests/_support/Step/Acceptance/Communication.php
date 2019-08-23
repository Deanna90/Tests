<?php
namespace Step\Acceptance;

class Communication extends \AcceptanceTester
{
    public function GetNotificationRowOnCommunicationTab($subject)
    {
        $I = $this;
        $I->wait(1);
        $rows = $I->getAmount($I, \Page\ApplicationDetails::$ConversationRow_CommunicationTab);
        $I->comment("Count of rows = $rows");
        for($j=1; $j<=$rows; $j++){
            if($I->grabTextFrom(\Page\ApplicationDetails::SubjectLine_CommunicationTab($j)) == $subject){
                $I->comment("I find notification: $subject at row: $j");
                break;
            }
        }
        $row  = $j;
        return $row;
    }
    
    public function GetNotificationRowOnCommunicationListForBusiness($subject)
    {
        $I = $this;
        $I->wait(1);
        $rows = $I->getAmount($I, \Page\CommunicationsList::$EmailRow);
        $I->comment("Count of rows = $rows");
        for($j=1; $j<=$rows; $j++){
            if($I->grabTextFrom(\Page\CommunicationsList::SubjectLine($j)) == $subject){
                $I->comment("I find notification: $subject at row: $j");
                break;
            }
        }
        $row  = $j;
        return $row;
    }
    
    public function GetCountOfSameNotificationOnCommunicationListForBusiness($subject)
    {
        $I = $this;
        $I->wait(1);
        $rows = $I->getAmount($I, \Page\CommunicationsList::$EmailRow);
        $I->comment("Count of rows = $rows");
        $count = 0;
        for($j=1; $j<=$rows; $j++){
            if($I->grabTextFrom(\Page\CommunicationsList::SubjectLine($j)) == $subject){
                $I->comment("I find notification: $subject at row: $j");
                $count++;
            }
        }
        return $count;
    }
}