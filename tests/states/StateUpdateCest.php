<?php


class StateUpdateCest
{
    public $requiredErrorName      = "Name cannot be blank.";
    public $requiredErrorShortName = "Short Name cannot be blank.";
    public $idState, $firstStateName, $firstShortName, $stateName;


    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    //--------------------------------------------------------------------------Page Title-----------------------------------------------------------------------------------------
    
    public function StateUpdate2_1_1_Title(\Step\Acceptance\State $I)
    {
        $row = '6';
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $this->idState = $I->grabTextFrom(\Page\StateList::IdLine($row));
        $this->firstStateName = $I->grabTextFrom(\Page\StateList::NameLine($row));
        $this->firstShortName = $I->grabTextFrom(\Page\StateList::ShortNameLine($row));
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->see("Update State: $this->firstStateName", \Page\StateUpdate::$Title);
    }
    
    //--------------------------------------------------------------------------Name Field-----------------------------------------------------------------------------------------
    
    public function StateUpdate3_1_1_NameFieldAndLabel(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->seeElement(\Page\StateUpdate::$NameField);
        $I->see('Name', \Page\StateUpdate::$NameLabel);
    }
    
    public function StateUpdate3_1_2_NameFieldRequired(\Step\Acceptance\State $I)
    {
        $name      = '';
        $I->UpdateState($this->idState, $name);
        $I->wait(1);
        $I->see($this->requiredErrorName, \Page\StateCreate::$NameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\StateUpdate::URL($this->idState));
    }
    
    public function StateUpdate3_1_3_NameField1Symbol(\Step\Acceptance\State $I)
    {
        $name      = 'u';
        $I->UpdateState($this->idState, $name);
        $I->wait(1);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateUpdate3_1_4_NameField128Symbol(\Step\Acceptance\State $I)
    {
        $name      = "sttte128state128 symbols128 state128state128 symbols128 state128state128 symbols128 state128state128 symbols128 state128state128";
        $I->UpdateState($this->idState, $name);
        $I->wait(1);
        $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateUpdate3_1_5_NameField255Symbol(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("Stttetest255 statenew statetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 staten");
        $I->UpdateState($this->idState, $name);
        $I->wait(1);
        $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateUpdate3_1_6_ValidationNameField256Symbol(\Step\Acceptance\State $I)
    {
        $name1     = "eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocks";
        $name      = "eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblock";
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->fillField(\Page\StateUpdate::$NameField, $name1);
        $I->wait(1);
        $I->seeInField(\Page\StateUpdate::$NameField, $name);
    }
    
    public function StateUpdate3_1_7_NameFieldNumberSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("2345246");
        $I->UpdateState($this->idState, $name);
        $I->wait(1);
        $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateUpdate3_1_8_NameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("+_)(*&^%$#@!`=-[]\';/.,<>?:{}|");
        $I->UpdateState($this->idState, $name);
        $I->wait(1);
        $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateUpdate3_1_9_NameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf('jj"ff');
        $I->UpdateState($this->idState, $name);
        $I->wait(1);
        $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    //--------------------------------------------------------------------------Short Name Field------------------------------------------------------------------------------------
    
    public function StateUpdate3_2_1_ShortNameFieldAndLabel(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->seeElement(\Page\StateUpdate::$ShortNameField);
        $I->see('Short Name', \Page\StateUpdate::$ShortNameLabel);
    }
    
    public function StateUpdate3_2_2_ShortNameFieldRequired(\Step\Acceptance\State $I)
    {
        $shortName = "";
        $I->UpdateState($this->idState, null, $shortName);
        $I->wait(1);
        $I->see($this->requiredErrorShortName, \Page\StateCreate::$ShortNameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\StateUpdate::URL($this->idState));
    }
    
    public function StateUpdate3_2_3_ShortNameField1Symbol(\Step\Acceptance\State $I)
    {
        $name      = $this->stateName = $I->GenerateNameOf("StateSt");
        $shortName = "r";
        $I->UpdateState($this->idState, $name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->CheckValuesOnStateListPage($state['row'], null, $shortName);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateUpdate3_2_4_ShortNameField128Symbol(\Step\Acceptance\State $I)
    {
        $shortName = "shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname12";
        $I->UpdateState($this->idState, null, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($this->stateName);
        $I->CheckValuesOnStateListPage($state['row'], null, $shortName);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateUpdate3_2_5_ShortNameField255Symbol(\Step\Acceptance\State $I)
    {
        $shortName = "shortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkfff";
        $I->UpdateState($this->idState, null, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($this->stateName);
        $I->CheckValuesOnStateListPage($state['row'], null, $shortName);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateUpdate3_2_6_ValidationShortNameField256Symbol(\Step\Acceptance\State $I)
    {
        $shortName1     = "shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf erfe";
        $shortName      = "shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf erf";
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->fillField(\Page\StateUpdate::$ShortNameField, $shortName1);
        $I->wait(1);
        $I->seeInField(\Page\StateUpdate::$ShortNameField, $shortName);
    }
    
    public function StateUpdate3_2_7_ShortNameFieldNumberSymbols(\Step\Acceptance\State $I)
    {
        $shortName = $I->GenerateNameOf("2345246");
        $I->UpdateState($this->idState, null, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($this->stateName);
        $I->CheckValuesOnStateListPage($state['row'], null, $shortName);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateUpdate3_2_8_ShortNameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $shortName = $I->GenerateNameOf("+_)(*&^%$#@!`=-[]\';/.,<>?:{}|");
        $I->UpdateState($this->idState, null, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($this->stateName);
        $I->CheckValuesOnStateListPage($state['row'], null, $shortName);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateUpdate3_2_9_ShortNameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $shortName = $I->GenerateNameOf('uu"er');
        $I->UpdateState($this->idState, null, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($this->stateName);
        $I->CheckValuesOnStateListPage($state['row'], null, $shortName);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    //--------------------------------------------------------------------------Weighted Select------------------------------------------------------------------------------------
    
    public function StateUpdate4_1_1_WeightedSelectAndLabel(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->seeElement(\Page\StateCreate::$WeightedSelect);
        $I->see('Weighted', \Page\StateCreate::$WeightedSelectLabel);
    }
    
    public function StateUpdate4_1_3_CheckAllValues_WeightedSelect(\Step\Acceptance\State $I)
    {
        $weighted1  = 'no';
        $weighted2  = 'yes';
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->click(\Page\StateUpdate::$WeightedSelect);
        $I->see($weighted1, \Page\StateUpdate::$WeightedOption);
        $I->see($weighted2, \Page\StateUpdate::$WeightedOption);
        $countOption = $I->getAmount($I, \Page\StateUpdate::$WeightedOption);
        $I->assertEquals('2', $countOption);
    }
    
    public function StateUpdate4_1_4_YesOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $weighted  = 'yes';
        $I->UpdateState($this->idState, null, null, $weighted);
        $I->wait(1);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, null, $weighted);
    }
    
    public function StateUpdate4_1_5_NoOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $weighted  = 'no';
        $I->UpdateState($this->idState, null, null, $weighted);
        $I->wait(1);
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->CheckInFieldsOnStateUpdatePage(null, null, $weighted);
    }
    
    //--------------------------------------------------------------------------Update Button-----------------------------------------------------------------------------------------
    
    public function StateUpdate5_1_1_UpdateButtonPresent(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState));
        $I->wait(1);
        $I->seeElement(\Page\StateUpdate::$UpdateButton);
        $I->see("Update", \Page\StateUpdate::$UpdateButton);
    }
    
    public function StateUpdate5_1_2_UpdateButtonFunction_YesWeighted(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "SN11";
        $weighted  = 'yes';
        $I->UpdateState($this->idState, $name, $shortName, $weighted);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\StateList::URL());
    }
    
    public function StateUpdate5_1_3_UpdateButtonFunction_NoWeighted(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "SN22";
        $weighted  = 'no';
        $I->UpdateState($this->idState, $name, $shortName, $weighted);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\StateList::URL());
    }
}
