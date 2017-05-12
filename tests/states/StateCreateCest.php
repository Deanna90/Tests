<?php


class StateCreateCest
{
    public $requiredErrorName      = "Name cannot be blank.";
    public $requiredErrorShortName = "Short Name cannot be blank.";
    public $stateInput, $stateNo, $stateQuestions;
    public $idStateInput, $idStateNo, $idStateQuestions;
    public $pageNotFoundText  = "Page not found";
    public $titleNotFoundText = "Not Found (#404)";
    
    /**
     * @group weighted
     */
    
    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    //--------------------------------------------------------------------------Page Title-----------------------------------------------------------------------------------------
    
    public function StateCreate2_1_1_Title(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->see('Create State', \Page\StateCreate::$Title);
    }
    
    //--------------------------------------------------------------------------Name Field-----------------------------------------------------------------------------------------
    
    public function StateCreate3_1_1_NameFieldAndLabel(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\StateCreate::$NameField);
        $I->see('Name', \Page\StateCreate::$NameLabel);
    }
    
    public function StateCreate3_1_2_NameFieldRequired(\Step\Acceptance\State $I)
    {
        $name      = '';
        $shortName = "SN";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $I->see($this->requiredErrorName, \Page\StateCreate::$NameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\StateCreate::URL());
    }
    
    public function StateCreate3_1_3_NameField1Symbol(\Step\Acceptance\State $I)
    {
        $name      = 't';
        $shortName = "SN";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateCreate3_1_4_NameField128Symbol(\Step\Acceptance\State $I)
    {
        $name      = "state128state128 symbols128 state128state128 symbols128 state128state128 symbols128 state128state128 symbols128 state128state128";
        $shortName = "SN";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateCreate3_1_5_NameField255Symbol(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("Statetest255 statenew statetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 statenew tatetest255 staten");
        $shortName = "SN";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateCreate3_1_6_ValidationNameField256Symbol(\Step\Acceptance\State $I)
    {
        $name1     = "eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocks";
        $name      = "eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblocksdcdsefwef eeeeeee8state256 checkblock";
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->fillField(\Page\StateCreate::$NameField, $name1);
        $I->wait(1);
        $I->seeInField(\Page\StateCreate::$NameField, $name);
    }
    
    public function StateCreate3_1_7_NameFieldNumberSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("2345246");
        $shortName = "SN";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateCreate3_1_8_NameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("+_)(*&^%$#@!`=-[]\';/.,<>?:{}|");
        $shortName = "SN";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    public function StateCreate3_1_9_NameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf('hh"gg');
        $shortName = "SN";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage($name);
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->seeElement(Page\MainMenu::selectStateOptionByName($name));
    }
    
    //--------------------------------------------------------------------------Short Name Field------------------------------------------------------------------------------------
    
    public function StateCreate3_2_1_ShortNameFieldAndLabel(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\StateCreate::$ShortNameField);
        $I->see('Short Name', \Page\StateCreate::$ShortNameLabel);
    }
    
    public function StateCreate3_2_2_ShortNameFieldRequired(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $I->see($this->requiredErrorShortName, \Page\StateCreate::$ShortNameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\StateCreate::URL());
    }
    
    public function StateCreate3_2_3_ShortNameField1Symbol(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "r";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateCreate3_2_4_ShortNameField128Symbol(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname128 shortname12";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateCreate3_2_5_ShortNameField255Symbol(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "shortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkshortname255 checkfff";
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateCreate3_2_6_ValidationShortNameField256Symbol(\Step\Acceptance\State $I)
    {
        $shortName1     = "shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf erfe";
        $shortName      = "shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf shortname256 dfdf erf";
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->fillField(\Page\StateCreate::$ShortNameField, $shortName1);
        $I->wait(1);
        $I->seeInField(\Page\StateCreate::$ShortNameField, $shortName);
    }
    
    public function StateCreate3_2_7_ShortNameFieldNumberSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = $I->GenerateNameOf("2345246");
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateCreate3_2_8_ShortNameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = $I->GenerateNameOf("+_)(*&^%$#@!`=-[]\';/.,<>?:{}|");
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    public function StateCreate3_2_9_ShortNameFieldPunctuationSymbols(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = $I->GenerateNameOf('ff"gh');
        $I->CreateState($name, $shortName);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, $shortName);
    }
    
    //--------------------------------------------------------------------------Weighted Select------------------------------------------------------------------------------------
    
    /**
     * @group weighted
     */
  
    public function StateCreate4_1_1_WeightedSelectAndLabel(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\StateCreate::$WeightedSelect);
        $I->see('Weighted', \Page\StateCreate::$WeightedSelectLabel);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_2_DefaultValue_WeightedSelect(\Step\Acceptance\State $I)
    {
        $weighted  = 'No';
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->seeOptionIsSelected(\Page\StateCreate::$WeightedSelect, $weighted);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_3_CheckAllValues_WeightedSelect(\Step\Acceptance\State $I)
    {
        $weighted1  = 'No';
        $weighted2  = 'Input';
        $weighted3  = 'Questions';
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->click(\Page\StateCreate::$WeightedSelect);
        $I->see($weighted1, \Page\StateCreate::$WeightedOption);
        $I->see($weighted2, \Page\StateCreate::$WeightedOption);
        $I->see($weighted3, \Page\StateCreate::$WeightedOption);
        $countOption = $I->getAmount($I, \Page\StateCreate::$WeightedOption);
        $I->assertEquals('3', $countOption);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_4_InputOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $name      = $this->stateInput = $I->GenerateNameOf("StateSt");
        $shortName = "SN";
        $weighted  = 'Input';
        $I->CreateState($name, $shortName, $weighted);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $this->idStateInput = $state['id'];
        $I->CheckValuesOnStateListPage($state['row'], null, null, $weighted);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, null, $weighted);
    }
    
    /**
     * @group weighted
     */
    
    public function Help4_1_4_1_SelectDefaultState_StateInput(\Step\Acceptance\State $I)
    {
        $I->SelectDefaultState($I, $this->stateInput);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_4_2_InputOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $I->amOnPage(Page\WeightPointsList::URL());
        $I->wait(1);
        $I->dontSeeElement(Page\WeightPointsList::NameLine_ByName($this->stateInput));
        $I->amOnPage(\Page\WeightPointsCreate::URL_YesOrNo($this->idStateInput));
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->amOnPage(\Page\WeightPointsCreate::URL_Sections($this->idStateInput));
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_4_3_InputOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $I->amOnPage(Page\MeasureCreate::URL());
        $I->wait(2);
        $I->seeElement(Page\MeasureCreate::$PointsField);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_5_NoOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $name      = $this->stateNo = $I->GenerateNameOf("StateSt");
        $shortName = "SN";
        $weighted  = 'No';
        $I->CreateState($name, $shortName, $weighted);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $this->idStateNo = $state['id'];
        $I->CheckValuesOnStateListPage($state['row'], null, null, $weighted);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, null, $weighted);
    }
    
    /**
     * @group weighted
     */
    
    public function Help4_1_5_1_SelectDefaultState_StateInput(\Step\Acceptance\State $I)
    {
        $I->SelectDefaultState($I, $this->stateNo);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_5_2_InputOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $I->amOnPage(Page\WeightPointsList::URL());
        $I->wait(1);
        $I->dontSeeElement(Page\WeightPointsList::NameLine_ByName($this->stateNo));
        $I->amOnPage(\Page\WeightPointsCreate::URL_YesOrNo($this->idStateNo));
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->amOnPage(\Page\WeightPointsCreate::URL_Sections($this->idStateNo));
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_5_3_InputOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $I->amOnPage(Page\MeasureCreate::URL());
        $I->wait(2);
        $I->dontSeeElement(Page\MeasureCreate::$PointsField);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_6_QuestionsOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $name      = $this->stateQuestions = $I->GenerateNameOf("StateSt");
        $shortName = "SN";
        $weighted  = 'Questions';
        $I->CreateState($name, $shortName, $weighted);
        $I->wait(1);
        $state = $I->GetStateOnPageInList($name);
        $this->idStateQuestions = $state['id'];
        $I->CheckValuesOnStateListPage($state['row'], null, null, $weighted);
        $I->amOnPage(\Page\StateUpdate::URL($state['id']));
        $I->CheckInFieldsOnStateUpdatePage(null, null, $weighted);
    }
    
    /**
     * @group weighted
     */
    
    public function Help4_1_6_1_SelectDefaultState_StateInput(\Step\Acceptance\State $I)
    {
        $I->SelectDefaultState($I, $this->stateQuestions);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_6_2_InputOption_WeightedSelect(\Step\Acceptance\WeightPoints $I)
    {
        $I->amOnPage(Page\WeightPointsList::URL());
        $I->wait(1);
        $I->seeElement(Page\WeightPointsList::NameLine_ByName($this->stateQuestions));
    }
    
    /**
     * @group weighted
     */
    
    public function Help4_1_6_3_InputOption_WeightedSelect(\Step\Acceptance\WeightPoints $I)
    {
        $name1    = $I->GenerateNameOf("SectQues");
        $name2    = $I->GenerateNameOf("SectYesNo");
        $points   = '3';
        $sections = '5';
        $I->CreateSectionsQuestion($this->idStateQuestions, $name1, $sections, $points);
        $I->CreateYesOrNoQuestion($this->idStateQuestions, $name2, $points);
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_6_4_InputOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $I->amOnPage(Page\MeasureCreate::URL());
        $I->wait(2);
        $I->seeElement(Page\MeasureCreate::$SectionsQuestion_Name);
        $I->seeElement(Page\MeasureCreate::$YesOrNoQuestion_Name);
        $I->seeElement(Page\MeasureCreate::$YesOrNoQuestion_YesButton);
        $I->seeElement(Page\MeasureCreate::SectionsQuestion_Section(2));
    }
    
    /**
     * @group weighted
     */
    
    public function StateCreate4_1_6_5_InputOption_WeightedSelect(\Step\Acceptance\State $I)
    {
        $I->amOnPage(Page\MeasureCreate::URL());
        $I->wait(2);
        $I->dontSeeElement(Page\MeasureCreate::$PointsField);
    }
    
    //--------------------------------------------------------------------------Create Button-----------------------------------------------------------------------------------------
    
    public function StateCreate5_1_1_CreateButtonPresent(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\StateCreate::$CreateButton);
        $I->see("Create", \Page\StateCreate::$CreateButton);
    }
    
    public function StateCreate5_1_2_CreateButtonFunction_InputWeighted(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "SN";
        $weighted  = 'Input';
        $I->CreateState($name, $shortName, $weighted);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\StateList::URL());
    }
    
    public function StateCreate5_1_3_CreateButtonFunction_NoWeighted(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "SN";
        $weighted  = 'No';
        $I->CreateState($name, $shortName, $weighted);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\StateList::URL());
    }
    
    public function StateCreate5_1_4_CreateButtonFunction_QuestionsWeighted(\Step\Acceptance\State $I)
    {
        $name      = $I->GenerateNameOf("StateSt");
        $shortName = "SN";
        $weighted  = 'Questions';
        $I->CreateState($name, $shortName, $weighted);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\StateList::URL());
    }
}
