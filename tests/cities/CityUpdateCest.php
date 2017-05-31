<?php


class CityUpdateCest
{
    public $state, $idProg, $usedZip;
    public $states, $anotherState, $cityAnotherState, $zipAnotherState;
    public $cityNameCheck;
    public $requiredErrorName  = "Name cannot be blank.";
    public $requiredErrorState = "State cannot be blank.";
    public $requiredErrorZips  = "Zips cannot be blank.";
    public $ZipsHelpBlock      = "Enter zip codes separated by comma. Zip code should be numeric and max length 5.";
    
    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_1_GrabAllStates(\Step\Acceptance\State $I)
    {
        $I->amOnPage(Page\StateList::URL());
        $I->wait(1);
        $this->states = $I->GetAllStatesNames();
    }
    
    public function Help1_2_GrabAnotherStateAndCityZip(\Step\Acceptance\City $I)
    {
        $this->anotherState     = $this->states[3];
        $this->cityAnotherState = $I->GenerateNameOf("CityAnotherSt");
        $this->zipAnotherState  = $I->GenerateZipCode();
        
        $I->wait(2);
        $I->SelectDefaultState($I, $this->anotherState);
        $I->wait(1);
        $I->CreateCity($this->cityAnotherState, $this->anotherState, $this->zipAnotherState);
        $I->wait(3);
        $I->seeInCurrentUrl(\Page\CityList::URL());
    }
    
    public function Help1_3_CreateState(\Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StatCity");
        $shortName = "sn";
        
        $I->CreateState($name, $shortName);
        $this->states[] = $this->state;
    }
    
    public function Help1_4_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    //--------------------------------------------------------------------------Page Title-----------------------------------------------------------------------------------------
    
    public function CityCreate2_1_1_Title(\Step\Acceptance\City $I)
    {
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->see('Create City', \Page\CityCreate::$Title);
    }
    
    //--------------------------------------------------------------------------Name Field-----------------------------------------------------------------------------------------
    
    public function CityCreate3_1_1_NameFieldAndLabel(\Step\Acceptance\City $I)
    {
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\CityCreate::$NameField);
        $I->see('Name', \Page\CityCreate::$NameLabel);
    }
    
    public function CityCreate3_1_2_NameFieldRequired(\Step\Acceptance\City $I)
    {
        $name  = '';
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $I->see($this->requiredErrorName, \Page\CityCreate::$NameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_1_3_NameField1Symbol(\Step\Acceptance\City $I)
    {
        $name  = 't';
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage($name);
    }
    
    public function CityCreate3_1_3_1_CheckInProgramCreatePage_NameField1Symbol(\Step\Acceptance\City $I)
    {
        $name  = 't';
        $state = $this->state;
        
        $I->wait(2);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->wait(2);
        $I->selectOption(Page\ProgramCreate::$StateSelect, $state);
        $I->wait(2);
        $I->click(\Page\ProgramCreate::$CitySelect);
        $I->wait(2);
        $I->see($name, \Page\ProgramCreate::$CityOption);
    }
    
    public function CityCreate3_1_3_2_CreateProgramWithCity_NameField1Symbol(\Step\Acceptance\Program $I)
    {
        $name  = 'prog1';
        $state = $this->state;
        $city  = 't';
        
        $I->CreateProgram($name, $state, $city);
        $I->amOnPage(Page\ProgramList::URL());
        $I->wait(1);
        $this->idProg = $I->grabTextFrom(Page\ProgramList::IdLine('1'));
    }
    
    public function CityCreate3_1_4_NameField128Symbol(\Step\Acceptance\City $I)
    {
        $name  = "city128city128 check city city128city128 check city city128city128 check city city128city128 check city city128city128 check cit";
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage($name);
    }
    
    public function CityCreate3_1_4_1_CheckInProgramCreatePage_NameField128Symbol(\Step\Acceptance\City $I)
    {
        $name  = "city128city128 check city city128city128 check city city128city128 check city city128city128 check city city128city128 check cit";
        $state = $this->state;
        
        $I->wait(2);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->wait(2);
        $I->selectOption(Page\ProgramCreate::$StateSelect, $state);
        $I->wait(2);
        $I->click(\Page\ProgramCreate::$CitySelect);
        $I->wait(2);
        $I->see($name, \Page\ProgramCreate::$CityOption);
    }
    
    public function CityCreate3_1_5_NameField255Symbol(\Step\Acceptance\City $I)
    {
        $this->cityNameCheck = $name  = $I->GenerateNameOf("city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city255check city");
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage($name);
    }
    
    public function CityCreate3_1_5_1_CheckInProgramCreatePage_NameField255Symbol(\Step\Acceptance\City $I)
    {
        $name  = $this->cityNameCheck;
        $state = $this->state;
        
        $I->wait(2);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->wait(2);
        $I->selectOption(Page\ProgramCreate::$StateSelect, $state);
        $I->wait(2);
        $I->click(\Page\ProgramCreate::$CitySelect);
        $I->wait(2);
        $I->see($name, \Page\ProgramCreate::$CityOption);
    }
    
    public function CityCreate3_1_6_ValidationNameField256Symbol(\Step\Acceptance\City $I)
    {
        $name1 = "dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blo";
        $name  = "dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256blockcheck dfgvvfcity256bl";
        
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->fillField(\Page\CityCreate::$NameField, $name1);
        $I->wait(1);
        $I->seeInField(\Page\CityCreate::$NameField, $name);
    }
    
    public function CityCreate3_1_7_NameFieldNumberSymbols(\Step\Acceptance\City $I)
    {
        $this->cityNameCheck = $name  = $I->GenerateNameOf("34546");
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage($name);
    }
    
    public function CityCreate3_1_7_1_CheckInProgramCreatePage_NameFieldNumberSymbols(\Step\Acceptance\City $I)
    {
        $name  = $this->cityNameCheck;
        $state = $this->state;
        
        $I->wait(2);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->wait(2);
        $I->selectOption(Page\ProgramCreate::$StateSelect, $state);
        $I->wait(2);
        $I->click(\Page\ProgramCreate::$CitySelect);
        $I->wait(2);
        $I->see($name, \Page\ProgramCreate::$CityOption);
    }
    
    public function CityCreate3_1_8_NameFieldPunctuationSymbols(\Step\Acceptance\City $I)
    {
        $this->cityNameCheck = $name  = $I->GenerateNameOf("+_)(*&^%$#@!`=-[]\';/.,<>?:{}|");
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage($name);
    }
    
    public function CityCreate3_1_8_1_CheckInProgramCreatePage_NameFieldPunctuationSymbols(\Step\Acceptance\City $I)
    {
        $name  = $this->cityNameCheck;
        $state = $this->state;
        
        $I->wait(2);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->wait(2);
        $I->selectOption(Page\ProgramCreate::$StateSelect, $state);
        $I->wait(2);
        $I->click(\Page\ProgramCreate::$CitySelect);
        $I->wait(2);
        $I->see($name, \Page\ProgramCreate::$CityOption);
    }
    
    public function CityCreate3_1_9_NameFieldPunctuationSymbols(\Step\Acceptance\City $I)
    {
        $this->cityNameCheck = $name  = $I->GenerateNameOf('hh"gtg');
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage($name);
    }
    
    public function CityCreate3_1_9_1_CheckInProgramCreatePage_NameFieldPunctuationSymbols(\Step\Acceptance\City $I)
    {
        $name  = $this->cityNameCheck;
        $state = $this->state;
        
        $I->wait(2);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->wait(2);
        $I->selectOption(Page\ProgramCreate::$StateSelect, $state);
        $I->wait(2);
        $I->click(\Page\ProgramCreate::$CitySelect);
        $I->wait(2);
        $I->see($name, \Page\ProgramCreate::$CityOption);
    }
}
