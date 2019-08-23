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
//        $I->wait(2);
        if (isset($program)){
            $I->selectOption(\Page\TierManage::$ProgramSelect, $program);
            $I->wait(1);
            $I->waitPageLoad();
        }
        if (isset($tier1)){
            $I->click(\Page\TierManage::$Tier1Button_LeftMenu);
            $I->wait(1);
            $I->waitPageLoad();
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
            $I->waitPageLoad();
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
            $I->click(\Page\TierManage::$Tier3Button_LeftMenu);
            $I->wait(1);
            $I->waitPageLoad();
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
        $I->click(\Page\TierManage::$SaveButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->wait(1);
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
    
    public function AddBenefitToTier($program = null, $tierNumber = '1', $benefitsArray = null)
    {
        $I = $this;
        $I->amOnPage(\Page\TierManage::URL());
//        $I->wait(2);
        if (isset($program)){
            $I->selectOption(\Page\TierManage::$ProgramSelect, $program);
            $I->wait(1);
            $I->waitPageLoad();
        }
        switch ($tierNumber){
            case '1':
                $I->click(\Page\TierManage::$Tier1Button_LeftMenu);
                $I->wait(1);
                $I->waitPageLoad();
                break;
            case '2':
                $I->click(\Page\TierManage::$Tier2Button_LeftMenu);
                $I->wait(1);
                $I->waitPageLoad();
                break;
            case '3':
                $I->click(\Page\TierManage::$Tier3Button_LeftMenu);
                $I->wait(1);
                $I->waitPageLoad();
                break;
        }
        if (isset($benefitsArray)){
            for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\TierManage::$AddPromotionalBenefitButton);
                $I->wait(1);
                $I->waitPageLoad();
                $I->fillField(\Page\TierManage::$TitleField_AddPromotionalBenefitPopup, $benefitsArray[$k]);
                $I->wait(1);
                $I->click(\Page\TierManage::$AddButton_AddPromotionalBenefitPopup);
                $I->wait(1);
                $I->waitPageLoad();
            }
        }
        $I->wait(1);
    }
}