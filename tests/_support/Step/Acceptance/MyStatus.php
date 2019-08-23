<?php
namespace Step\Acceptance;

class MyStatus extends \AcceptanceTester
{
    public function CheckBenefitsToTier_BenefitsByTierBlock($tierNumber = '1', $benefitsArray = null)
    {
        $I = $this;
        $I->wait(2);
        for ($i=1, $c= count($benefitsArray); $i<=$c; $i++){
            $k = $i-1;
            $I->canSee($benefitsArray[$k], \Page\MyStatus_TierStatus::Benefit_BenefitsByTierBlock($tierNumber, $i));
        }
        $I->wait(1);
    }
}