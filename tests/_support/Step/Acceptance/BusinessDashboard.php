<?php
namespace Step\Acceptance;

class BusinessDashboard extends \AcceptanceTester
{

    public function CheckBenefitsToTier_TierOverviews($tierNumber = '1', $benefitsArray = null)
    {
        $I = $this;
        $I->wait(2);
        switch ($tierNumber){
            case '1':
                if (isset($benefitsArray)){
                    for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->canSee($benefitsArray[$k], \Page\BusinessDashboard::Benefit_1stTier_BenefitsBlock_TierOverviews($i));
                        if($benefitsArray[$k]=='No benefits'){
                            $I->cantSeeElement(\Page\BusinessDashboard::BenefitOkIcon_1stTier_BenefitsBlock_TierOverviews($i));
                        }
                        else {
                            $I->canSeeElement(\Page\BusinessDashboard::BenefitOkIcon_1stTier_BenefitsBlock_TierOverviews($i));
                        }
                    }
                }
                break;
            case '2':
                if (isset($benefitsArray)){
                    for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->canSee($benefitsArray[$k], \Page\BusinessDashboard::Benefit_2ndTier_BenefitsBlock_TierOverviews($i));
                        if($benefitsArray[$k]=='No benefits'){
                            $I->cantSeeElement(\Page\BusinessDashboard::BenefitOkIcon_2ndTier_BenefitsBlock_TierOverviews($i));
                        }
                        else {
                            $I->canSeeElement(\Page\BusinessDashboard::BenefitOkIcon_2ndTier_BenefitsBlock_TierOverviews($i));
                        }
                    }
                }
                break;
            case '3':
                if (isset($benefitsArray)){
                    for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->canSee($benefitsArray[$k], \Page\BusinessDashboard::Benefit_3rdTier_BenefitsBlock_TierOverviews($i));
                        if($benefitsArray[$k]=='No benefits'){
                            $I->cantSeeElement(\Page\BusinessDashboard::BenefitOkIcon_3rdTier_BenefitsBlock_TierOverviews($i));
                        }
                        else {
                            $I->canSeeElement(\Page\BusinessDashboard::BenefitOkIcon_3rdTier_BenefitsBlock_TierOverviews($i));
                        }
                    }
                }
                break;
        }
        $I->wait(1);
    }
    
    public function CanSeeNextTierAlert($tiername = null, $checklist_id = null)
    {
        $I = $this;
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\BusinessDashboard::$NextTierAlertBlock);
        $I->canSee("Alert", \Page\BusinessDashboard::$Title_NextTierAlertBlock);
        if (isset($tiername)){
            $I->canSee("You are close to reaching the next Tier Level—$tiername!", \Page\BusinessDashboard::$Info1_NextTierAlertBlock);
            $I->canSee("The $tiername Tier lets you gain recognition with a feature on our Statewide site.", \Page\BusinessDashboard::$Info2_NextTierAlertBlock);
            $I->canSee("Disover all the benefits and what’s needed to reach the next tier level.", \Page\BusinessDashboard::$Info3_NextTierAlertBlock);
        }
        if (isset($checklist_id)){
            $I->canSeeElement(\Page\BusinessDashboard::$LearnMoreButton_NextTierAlertBlock."[href*='tier_id=$checklist_id']");
        }
    }
    
    public function CantSeeNextTierAlert()
    {
        $I = $this;
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSeeElement(\Page\BusinessDashboard::$NextTierAlertBlock);
        $I->cantSeeElement(\Page\BusinessDashboard::$Title_NextTierAlertBlock);
        $I->cantSeeElement(\Page\BusinessDashboard::$LearnMoreButton_NextTierAlertBlock);
    }
}