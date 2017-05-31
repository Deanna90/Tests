<?php
namespace Step\Acceptance;

class Tier extends \AcceptanceTester
{
    public function ManageTiers($program = null, $tier1 = null, $tier1Name = null, $tier1Desc = null, $tier1OptIn = 'yes', 
                                                         $tier2 = null, $tier2Name = null, $tier2Desc = null, $tier2OptIn = 'yes', 
                                                         $tier3 = null, $tier3Name = null, $tier3Desc = null, $tier3OptIn = 'yes')
    {
        $I = $this;
        $I->amOnPage(\Page\TierManage::URL());
        $I->wait(2);
        if (isset($program)){
            $I->selectOption(\Page\TierManage::$ProgramSelect, $program);
            $I->wait(2);
        }
        if (isset($tier1)){
            $I->click(\Page\TierManage::$Tier1Button_LeftMenu);
            $I->wait(1);
            switch ($tier1OptIn){
                case 'yes':
                    $I->click(\Page\TierManage::$YesRadioButton_OptIn);
                    break;
                case 'no':
                    $I->click(\Page\TierManage::$NoRadioButton_OptIn);
                    break;
                case 'ignore':
                    break;
            }
            if (isset($tier1Name)){
                $I->fillField(\Page\TierManage::$TierNameField, $tier1Name);
            }
            if (isset($tier1Desc)){
                $I->fillField(\Page\TierManage::$TierDescriptionField, $tier1Desc);
            }
        }
        if (isset($tier2)){
            $I->click(\Page\TierManage::$Tier2Button_LeftMenu);
            $I->wait(1);
            switch ($tier2OptIn){
                case 'yes':
                    $I->click(\Page\TierManage::$YesRadioButton_OptIn);
                    break;
                case 'no':
                    $I->click(\Page\TierManage::$NoRadioButton_OptIn);
                    break;
                case 'ignore':
                    break;
            }
            if (isset($tier2Name)){
                $I->fillField(\Page\TierManage::$TierNameField, $tier2Name);
            }
            if (isset($tier2Desc)){
                $I->fillField(\Page\TierManage::$TierDescriptionField, $tier2Desc);
            }
        }
        if (isset($tier3)){
            $I->click(\Page\TierManage::$Tier1Button_LeftMenu);
            $I->wait(1);
            switch ($tier3OptIn){
                case 'yes':
                    $I->click(\Page\TierManage::$YesRadioButton_OptIn);
                    break;
                case 'no':
                    $I->click(\Page\TierManage::$NoRadioButton_OptIn);
                    break;
                case 'ignore':
                    break;
            }
            if (isset($tier3Name)){
                $I->fillField(\Page\TierManage::$TierNameField, $tier3Name);
            }
            if (isset($tier3Desc)){
                $I->fillField(\Page\TierManage::$TierDescriptionField, $tier3Desc);
            }
        }
        $I->wait(1);
        $I->click(\Page\TierManage::$SaveButton);
        $I->wait(2);
    }
    
    public function ManageTier($tierNumber = '1', $optIn = 'yes', $tierName = null, $tierDesc = null)
    {
        $I = $this;
        $I->wait(1);
        switch ($tierNumber){
            case '1':
                $I->click(\Page\TierManage::$Tier1Button_LeftMenu);
                break;
            case '2':
                $I->click(\Page\TierManage::$Tier2Button_LeftMenu);
                break;
            case '3':
                $I->click(\Page\TierManage::$Tier3Button_LeftMenu);
                break;
            case '4':
                $I->click(\Page\TierManage::$Tier4Button_LeftMenu);
                break;
        }
        switch ($optIn){
            case 'yes':
                $I->click(\Page\TierManage::$YesRadioButton_OptIn);
                break;
            case 'no':
                $I->click(\Page\TierManage::$NoRadioButton_OptIn);
                break;
            case 'ignore':
                break;
        }
        if (isset($tierName)){
            $I->fillField(\Page\TierManage::$TierNameField, $tierName);
        }
        if (isset($tierDesc)){
            $I->fillField(\Page\TierManage::$TierDescriptionField, $tierDesc);
        }
        $I->wait(1);
    }
}