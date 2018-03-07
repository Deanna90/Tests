<?php
namespace Step\Acceptance;

class Report extends \AcceptanceTester
{
    public function GetSavingAreaNumberInTable($area)
    {
        $I = $this;
        $I->wantTo("Get Area Number In Table");
        $I->wait(2);
        $count = $I->getAmount($I, \Page\ReportResult::$Head);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\ReportResult::SavingAreaHead($i)) == $area){
                break;
            }
        }
        $I->comment("Saving area: $area is on $i column");
        return $i;
    }
    
    public function CheckMoneySavedValueIfThatIsNotZero($moneySaved, $selector)
    {
        $I = $this;
        if($moneySaved == '0'){
            $I->cantSeeElement($selector);
        }
        else {
            $I->canSee("$$moneySaved", $selector);
        }
    }
    
}