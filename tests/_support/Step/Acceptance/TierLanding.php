<?php
namespace Step\Acceptance;

class TierLanding extends \AcceptanceTester
{
    public function OpenTierLandingList($program = null, $tierName = null, $tierRow = null)
    {
        $I = $this;
        $I->amOnPage(\Page\TierLandingManage::URL());
        if (isset($program)){
            $I->selectOption(\Page\TierLandingManage::$ProgramSelect, $program);
            $I->wait(1);
            $I->waitPageLoad();
        }
        if (isset($tierName)){
            $I->click(\Page\TierLandingManage::TierButton_LeftMenu_ByName($tierName));
            $I->wait(1);
            $I->waitPageLoad();
        }
        if (isset($tierRow)){
            $I->click(\Page\TierLandingManage::TierButton_LeftMenu_ByRow($tierRow));
            $I->wait(1);
            $I->waitPageLoad();
        }    
    }
       
    public function CreateTierLandingItem($title = null, $description = null, $color = null)
    {
        $I = $this;
        $I->click(\Page\TierLandingManage::$AddTierLandingButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(\Page\TierLandingManage::$AddTierLandingPopup, '30');
        if (isset($title)){
            $I->fillField(\Page\TierLandingManage::$TitleField_AddTierLandingPopup, $title);
//            $I->wait(1);
        }
        if (isset($description)){
            $I->fillField(\Page\TierLandingManage::$DescriptionField_AddTierLandingPopup, $description);
//            $I->wait(1);
        }
        if (isset($color)){
            $I->selectOption(\Page\TierLandingManage::$BGColorSelect_AddTierLandingPopup, $color);
            $I->wait(2);
        }   
        $I->click(\Page\TierLandingManage::$CreateButton_AddTierLandingPopup);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function CheckBenefitsToTierOnLandingPage($tierNumber = '1', $benefitsArray = null)
    {
        $I = $this;
        $I->wait(2);
        switch ($tierNumber){
            case '1':
                if (isset($benefitsArray)){
                    for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->canSee($benefitsArray[$k], \Page\LandingForTier::Benefit_1stTier_BenefitsBlock($i));
                        if($benefitsArray[$k]=='No benefits'){
                            $I->cantSeeElement(\Page\LandingForTier::BenefitOkIcon_1stTier_BenefitsBlock($i));
                        }
                        else {$I->canSeeElement(\Page\LandingForTier::BenefitOkIcon_1stTier_BenefitsBlock($i));
                        }
                    }
                }
                break;
            case '2':
                if (isset($benefitsArray)){
                    for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->canSee($benefitsArray[$k], \Page\LandingForTier::Benefit_2ndTier_BenefitsBlock($i));
                        if($benefitsArray[$k]=='No benefits'){
                            $I->cantSeeElement(\Page\LandingForTier::BenefitOkIcon_2ndTier_BenefitsBlock($i));
                        }
                        else {$I->canSeeElement(\Page\LandingForTier::BenefitOkIcon_2ndTier_BenefitsBlock($i));
                        }
                    }
                }
                break;
            case '3':
                if (isset($benefitsArray)){
                    for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->canSee($benefitsArray[$k], \Page\LandingForTier::Benefit_3rdTier_BenefitsBlock($i));
                        if($benefitsArray[$k]=='No benefits'){
                            $I->cantSeeElement(\Page\LandingForTier::BenefitOkIcon_3rdTier_BenefitsBlock($i));
                        }
                        else {$I->canSeeElement(\Page\LandingForTier::BenefitOkIcon_3rdTier_BenefitsBlock($i));
                        }
                    }
                }
                break;
        }
        
        $I->wait(1);
    }
}