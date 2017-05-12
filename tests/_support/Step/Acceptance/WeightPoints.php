<?php
namespace Step\Acceptance;

class WeightPoints extends \AcceptanceTester
{
    public function CreateYesOrNoQuestion($idState, $name = null, $points = null, $type = null)
    {
        $I = $this;
        $I->amOnPage(\Page\WeightPointsCreate::URL_YesOrNo($idState));
        $I->wait(1);
        $I->waitForElement(\Page\WeightPointsCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\WeightPointsCreate::$NameField, $name);
        }
        if (isset($type)){
            $I->seeOptionIsSelected(\Page\WeightPointsCreate::$TypeSelect, "Yes/No");
        }
        if (isset($points)){
            $I->fillField(\Page\WeightPointsCreate::$PointsField, $points);
        }
        $I->click(\Page\WeightPointsCreate::$CreateButton);
        $I->wait(2);
    }  
    
    public function CreateSectionsQuestion($idState, $name = null, $sections = null, $points = null, $type = null)
    {
        $I = $this;
        $I->amOnPage(\Page\WeightPointsCreate::URL_Sections($idState));
        $I->wait(1);
        $I->waitForElement(\Page\WeightPointsCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\WeightPointsCreate::$NameField, $name);
        }
        if (isset($type)){
            $I->seeOptionIsSelected(\Page\WeightPointsCreate::$TypeSelect, "Sections");
        }
        if (isset($sections)){
            $I->fillField(\Page\WeightPointsCreate::$SectionsField, $sections);
        }
        if (isset($points)){
            $I->fillField(\Page\WeightPointsCreate::$PointsField, $points);
        }
        $I->click(\Page\WeightPointsCreate::$CreateButton);
        $I->wait(2);
    }  
}