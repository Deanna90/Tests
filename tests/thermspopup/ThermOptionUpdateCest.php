<?php


class ThermOptionUpdateCest
{
    public $id, $optionName;
    public $requiredErrorName          = "Name cannot be blank.";
    public $requiredErrorThermsCount   = "Therms count cannot be blank.";
    public $invalid256ErrorName        = "Name should contain at most 255 characters.";
    public $integerErrorThermsCount    = "Therms count must be an integer.";
    
    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    //--------------------------------------------------------------------------Page Title-----------------------------------------------------------------------------------------
    
    public function ThermUpdate2_1_1_Title(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(Page\PopupThermOptionList::URL());
        $I->wait(1);
        $this->id = $I->grabTextFrom(Page\PopupThermOptionList::IdLine('1'));
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->wait(1);
        $I->see('Update option', \Page\PopupThermOptionUpdate::$Title);
    }
    
    //--------------------------------------------------------------------------Name Field-----------------------------------------------------------------------------------------
    
    public function ThermUpdate3_1_1_NameFieldAndLabel(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->wait(1);
        $I->seeElement(\Page\PopupThermOptionUpdate::$NameField);
        $I->see('Name', \Page\PopupThermOptionUpdate::$NameLabel);
    }
    
    public function ThermUpdate3_1_2_NameFieldRequired(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = '';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(2);
        $I->canSee($this->requiredErrorName, \Page\PopupThermOptionUpdate::$NameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionUpdate::URL($this->id));
    }
    
    public function ThermUpdate3_1_3_NameField1Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = 'u';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->assertEquals($this->id, $therm['id']);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermUpdate3_1_4_NameField128Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("uperm128therm128 check therm therm128therm128 check therm therm128therm128 check therm therm128therm128 check therm therm128");
         
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->assertEquals($this->id, $therm['id']);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermUpdate3_1_5_NameField255Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("updatetherm255therm255 check therm therm255therm255 check therm therm255therm255 check therm therm255therm255 check therm therm255 therm255therm255 check therm therm255therm255 check therm therm255therm255 check therm therm255therm255 check therm ther");
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->assertEquals($this->id, $therm['id']);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermUpdate3_1_6_NameField256Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("4therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256 therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256 c");
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(2);
        $I->canSee($this->invalid256ErrorName, \Page\PopupThermOptionUpdate::$NameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionUpdate::URL($this->id));
    }
    
    public function ThermUpdate3_1_7_NameFieldNumberSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("31234");
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->assertEquals($this->id, $therm['id']);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermUpdate3_1_8_NameFieldPunctuationSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf(")+_(*&^%#@!`=$-[]\';/.,<>?:{}|");
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->assertEquals($this->id, $therm['id']);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermUpdate3_1_9_NameFieldPunctuationSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf('ery"r');
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->assertEquals($this->id, $therm['id']);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    //--------------------------------------------------------------------------Therms Count Field-----------------------------------------------------------------------------------------
    
    public function ThermUpdate3_1_1_ThermsCountFieldAndLabel(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->wait(1);
        $I->seeElement(\Page\PopupThermOptionUpdate::$ThermsCountField);
        $I->see('Therms count', \Page\PopupThermOptionUpdate::$ThermsCountLabel);
    }
    
    public function ThermUpdate3_1_2_ThermsCountFieldRequired(\Step\Acceptance\PopupThermOption $I)
    {
        $thermsCount = '';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption(null, $thermsCount);
        $I->wait(2);
        $I->canSee($this->requiredErrorThermsCount, \Page\PopupThermOptionUpdate::$ThermsCountErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionUpdate::URL($this->id));
    }
    
    public function ThermUpdate3_1_3_ThermsCountField1Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $thermsCount = '4';
        $name        = $this->optionName = $I->GenerateNameOf("thermopt");
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($this->optionName);
        $I->see($thermsCount, Page\PopupThermOptionList::ThermsCount_ByName($this->optionName));
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->CheckInFieldsOnThermOptionUpdatePage(null ,$thermsCount);
    }
    
    public function ThermUpdate3_1_4_ThermsCountField5Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $thermsCount = '21212';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption(null, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($this->optionName);
        $I->see($thermsCount, Page\PopupThermOptionList::ThermsCount_ByName($this->optionName));
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage(null, $thermsCount);
    }
    
    public function ThermUpdate3_1_5_ThermsCountField9Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $thermsCount = '123456789';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption(null, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($this->optionName);
        $I->see($thermsCount, Page\PopupThermOptionList::ThermsCount_ByName($this->optionName));
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage(null, $thermsCount);
    }
    
    public function ThermUpdate3_1_6_ThermsCountField10Symbol_Blocked(\Step\Acceptance\PopupThermOption $I)
    {
//        $thermsCount = '123456789';
//        
//        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
//        $I->UpdateThermOption(null, $thermsCount);
//        $I->wait(1);
//        $therm = $I->GetThermOptionOnPageInList($this->optionName);
//        $I->see($thermsCount, Page\PopupThermOptionList::ThermsCount_ByName($this->optionName));
//        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
//        $I->CheckInFieldsOnThermOptionUpdatePage(null, $thermsCount);
    }
    
    public function ThermUpdate3_1_7_ThermsCountFieldLatinSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $thermsCount = 'erfg5';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption(null, $thermsCount);
        $I->wait(2);
        $I->canSee($this->integerErrorThermsCount, \Page\PopupThermOptionUpdate::$ThermsCountErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionUpdate::URL($this->id));
    }
    
    public function ThermUpdate3_1_8_ThermsCountFieldPunctuationSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $thermsCount = '@#$%^&*^"4(&-+),>?::$"{}[]\>,!*';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption(null, $thermsCount);
        $I->wait(2);
        $I->canSee($this->integerErrorThermsCount, \Page\PopupThermOptionUpdate::$ThermsCountErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionUpdate::URL($this->id));
    }
    
    //--------------------------------------------------------------------------Update Button---------------------------------------------------------------------------------

    public function ThermUpdate4_1_1_UpdateButtonPresent(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->wait(1);
        $I->seeElement(\Page\PopupThermOptionUpdate::$UpdateButton);
        $I->see("Update", \Page\PopupThermOptionUpdate::$UpdateButton);
    }
    
    public function ThermUpdate4_1_2_UpdateButtonFunction(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = '10';
        
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($this->id));
        $I->UpdateThermOption($name, $thermsCount);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\PopupThermOptionList::URL());
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->CheckValuesOnThermsListPage($therm['row'], $name, $thermsCount);
    }
}
