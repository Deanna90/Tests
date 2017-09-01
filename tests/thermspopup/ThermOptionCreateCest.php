3_1_6<?php


class ThermOptionCreateCest
{
    public $state, $idProg, $usedZip;
    public $cityNameCheck;
    public $requiredErrorName          = "Name cannot be blank.";
    public $requiredErrorThermsCount   = "Therms count cannot be blank.";
    public $invalid256ErrorName        = "Name should contain at most 255 characters.";
    public $integerErrorThermsCount    = "Therms count must be an integer.";
    
    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
//    public function Help1_3_CreateState(\Step\Acceptance\State $I)
//    {
//        $name = $this->state = $I->GenerateNameOf("StatCity");
//        $shortName = "sn";
//        
//        $I->CreateState($name, $shortName);
//    }
//    
//    public function Help1_4_SelectDefaultState(AcceptanceTester $I)
//    {
//        $I->wait(2);
//        $I->SelectDefaultState($I, $this->state);
//    }
    
    //--------------------------------------------------------------------------Page Title-----------------------------------------------------------------------------------------
    
    public function ThermCreate2_1_1_Title(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(\Page\PopupThermOptionCreate::URL());
        $I->wait(1);
        $I->see('Create option', \Page\PopupThermOptionCreate::$Title);
    }
    
    //--------------------------------------------------------------------------Name Field-----------------------------------------------------------------------------------------
    
    public function ThermCreate3_1_1_NameFieldAndLabel(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(\Page\PopupThermOptionCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\PopupThermOptionCreate::$NameField);
        $I->see('Name', \Page\PopupThermOptionCreate::$NameLabel);
    }
    
    public function ThermCreate3_1_2_NameFieldRequired(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = '';
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $I->canSee($this->requiredErrorName, \Page\PopupThermOptionCreate::$NameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionCreate::URL());
    }
    
    public function ThermCreate3_1_3_NameField1Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = 'y';
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_4_NameField128Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("therm128therm128 check therm therm128therm128 check therm therm128therm128 check therm therm128therm128 check therm therm128");
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_5_NameField255Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("therm255therm255 check therm therm255therm255 check therm therm255therm255 check therm therm255therm255 check therm therm255 therm255therm255 check therm therm255therm255 check therm therm255therm255 check therm therm255therm255 check therm therm255 c");
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_6_NameField256Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = "6therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256 therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256 ctrew";
        $name2        = "6therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256 therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256therm256 check therm therm256 ctre";
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name2);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name2);
    }
    
    public function ThermCreate3_1_7_NameFieldNumberSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("34562");
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_8_NameFieldPunctuationSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf(")+_(*&^%$#@!`=-[]\';/.,<>?:{}|");
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_9_NameFieldPunctuationSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf('t"g');
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    //--------------------------------------------------------------------------Therms Count Field-----------------------------------------------------------------------------------------
    
    public function ThermCreate3_1_1_ThermsCountFieldAndLabel(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(\Page\PopupThermOptionCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\PopupThermOptionCreate::$ThermsCountField);
        $I->see('Therms count', \Page\PopupThermOptionCreate::$ThermsCountLabel);
    }
    
    public function ThermCreate3_1_2_ThermsCountFieldRequired(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = '';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(2);
        $I->canSee($this->requiredErrorThermsCount, \Page\PopupThermOptionCreate::$ThermsCountErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionCreate::URL());
    }
    
    public function ThermCreate3_1_3_ThermsCountField1Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = '4';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->see($thermsCount, Page\PopupThermOptionList::ThermsCount_ByName($name));
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage(null ,$thermsCount);
    }
    
    public function ThermCreate3_1_4_ThermsCountField5Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = '21212';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_5_ThermsCountField9Symbol(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = '123456789';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $therm = $I->GetThermOptionOnPageInList($name);
        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_6_ThermsCountField10Symbol_Blocked(\Step\Acceptance\PopupThermOption $I)
    {
//        $name        = $I->GenerateNameOf("ThermOpt");
//        $thermsCount = '123456789';
//        
//        $I->CreateThermOption($name, $thermsCount);
//        $I->wait(1);
//        $therm = $I->GetThermOptionOnPageInList($name);
//        $I->amOnPage(\Page\PopupThermOptionUpdate::URL($therm['id']));
//        $I->CheckInFieldsOnThermOptionUpdatePage($name);
    }
    
    public function ThermCreate3_1_7_ThermsCountFieldLatinSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = 'erfg5';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(2);
        $I->canSee($this->integerErrorThermsCount, \Page\PopupThermOptionCreate::$ThermsCountErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionCreate::URL());
    }
    
    public function ThermCreate3_1_8_ThermsCountFieldPunctuationSymbols(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = '@#$%^&*^"4(&-+),>?::"{}[]\>,!*';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(2);
        $I->canSee($this->integerErrorThermsCount, \Page\PopupThermOptionCreate::$ThermsCountErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\PopupThermOptionCreate::URL());
    }
    
    //--------------------------------------------------------------------------Create Button---------------------------------------------------------------------------------

    public function ThermCreate4_1_1_CreateButtonPresent(\Step\Acceptance\PopupThermOption $I)
    {
        $I->amOnPage(\Page\PopupThermOptionCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\PopupThermOptionCreate::$CreateButton);
        $I->see("Create", \Page\PopupThermOptionCreate::$CreateButton);
    }
    
    public function ThermCreate4_1_2_CreateButtonFunction(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("ThermOpt");
        $thermsCount = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\PopupThermOptionList::URL());
    }
}
