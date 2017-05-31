<?php


class CityCreateCest
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
    
    //--------------------------------------------------------------------------Zips Field-----------------------------------------------------------------------------------------
    
    public function CityCreate3_2_1_ZipsFieldAndLabel(\Step\Acceptance\City $I)
    {
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\CityCreate::$ZipsField);
        $I->see('Zips', \Page\CityCreate::$ZipsLabel);
    }
    
    public function CityCreate3_2_2_ZipsFieldRequired(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips  = '';
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $I->canSee($this->requiredErrorZips, \Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_2_3_ZipsFieldHelpBlock(\Step\Acceptance\City $I)
    {
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->see($this->ZipsHelpBlock, \Page\CityCreate::$ZipsErrorHintBlock);
    }
    
    public function CityCreate3_2_4_ZipsField_5NotNumberSymbols(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips1 = 'ftfhr';
        $zips2 = '4573j';
        $zips3 = '@^*%*';
        $zips4 = '45+66';
        
        $I->CreateCity($name, $state, $zips1);
        $I->wait(1);
        $I->canSee("Zip code $zips1 should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
        $I->fillField(Page\CityCreate::$ZipsField, $zips2);
        $I->wait(1);
        $I->click(Page\CityCreate::$CreateButton);
        $I->wait(3);
        $I->canSee("Zip code $zips2 should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
        $I->fillField(Page\CityCreate::$ZipsField, $zips3);
        $I->wait(1);
        $I->click(Page\CityCreate::$CreateButton);
        $I->wait(3);
        $I->canSee("Zip code $zips3 should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
        $I->fillField(Page\CityCreate::$ZipsField, $zips4);
        $I->wait(1);
        $I->click(Page\CityCreate::$CreateButton);
        $I->wait(3);
        $I->canSee("Zip code $zips4 should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_2_5_ZipsField_1NumberSymbols_1Zip(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips  = '4';
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
        $I->canSee("Zip code $zips should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_2_6_ZipsField_5NumberSymbols_1NumberSymbol_2Zips(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zip1  = $I->GenerateZipCode();
        $zip2  = '6';
        $zips  = "$zip1,$zip2";
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
        $I->canSee("Zip code $zip2 should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_2_7_ZipsField_4NumberSymbols_1Zip(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips  = '4367';
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
        $I->canSee("Zip code $zips should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_2_8_ZipsField_6NumberSymbols_1Zip(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips  = '256764';
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
        $I->canSee("Zip code $zips should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_2_9_ZipsField_1NumberSymbols_1Zip(\Step\Acceptance\City $I)
    {
        $name   = $I->GenerateNameOf('city');
        $state  = $this->state;
        $zip1   = '44573';
        $zip2   = '96847';
        $zipsCr = "$zip1 $zip2";
        $zipsEr = "$zip1$zip2";
        
        $I->CreateCity($name, $state, $zipsCr);
        $I->wait(1);
        $I->canSee("Zip code $zipsEr should be numeric and max length 5.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    public function CityCreate3_2_10_ZipsField_5NumberSymbols_1Zip(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->canSee($zips, Page\CityList::ZipsLine($city['row']));
        $this->usedZip = $zips;
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage(null, null, $zips);
    }
    
    public function CityCreate3_2_11_ZipsField_5NumberSymbols_3Zip(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zip1  = $I->GenerateZipCode();
        $zip2  = $I->GenerateZipCode();
        $zip3  = $I->GenerateZipCode();
        $zipsCr  = "$zip1,$zip2,$zip3";
        $zipsUp  = "$zip1\n$zip2\n$zip3";
        
        $I->CreateCity($name, $state, $zipsCr);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->canSee($zipsUp, Page\CityList::ZipsLine($city['row']));
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage(null, null, $zipsUp);
    }
    
    public function CityCreate3_2_12_ZipsField_5NumberSymbols_10Zip(\Step\Acceptance\City $I)
    {
        $name   = $I->GenerateNameOf('city');
        $state  = $this->state;
        $zip1   = $I->GenerateZipCode();
        $zip2   = $I->GenerateZipCode();
        $zip3   = $I->GenerateZipCode();
        $zip4   = $I->GenerateZipCode();
        $zip5   = $I->GenerateZipCode();
        $zip6   = $I->GenerateZipCode();
        $zip7   = $I->GenerateZipCode();
        $zip8   = $I->GenerateZipCode();
        $zip9   = $I->GenerateZipCode();
        $zip10  = $I->GenerateZipCode();
        $zipsCr = "$zip1,$zip2,$zip3,$zip4,$zip5,$zip6,$zip7,$zip8,$zip9,$zip10";
        $zipsUp = "$zip1\n$zip2\n$zip3\n$zip4\n$zip5\n$zip6\n$zip7\n$zip8\n$zip9\n$zip10";
        
        $I->CreateCity($name, $state, $zipsCr);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->canSee($zipsUp, Page\CityList::ZipsLine($city['row']));
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage(null, null, $zipsUp);
    }
    
    public function CityCreate3_2_13_ZipsField_AlreadyUsedZip_1Zip(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips  = $this->usedZip;
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $city = $I->GetCityOnPageInList($name);
        $I->canSee($zips, Page\CityList::ZipsLine($city['row']));
        $I->amOnPage(\Page\CityUpdate::URL($city['id']));
        $I->CheckInFieldsOnCityUpdatePage(null, null, $zips);
    }
    
    public function CityCreate3_2_14_ZipsField_AlreadyUsedForAnotherState_1Zip(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = $this->state;
        $zips  = $this->zipAnotherState;
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
        $I->canSee("Zip code $zips what you enter related to different state.", Page\CityCreate::$ZipsErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    //--------------------------------------------------------------------------State Select----------------------------------------------------------------------------------
    
    public function CityCreate4_1_1_StateSelectAndLabel(\Step\Acceptance\City $I)
    {
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\CityCreate::$StateSelect);
        $I->see('State', \Page\CityCreate::$StateSelectLabel);
    }
    
    
    public function CityCreate4_1_2_DefaultValue_StateSelect(\Step\Acceptance\City $I)
    {
        $default  = 'Select State';
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->seeOptionIsSelected(\Page\CityCreate::$StateSelect, $default);
    }
    
    public function CityCreate4_1_3_ZipsFieldRequired(\Step\Acceptance\City $I)
    {
        $name  = $I->GenerateNameOf('city');
        $state = 'Select State';
        $zips  = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $I->canSee($this->requiredErrorState, \Page\CityCreate::$StateErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\CityCreate::URL());
    }
    
    
    public function CityCreate4_1_4_CheckAllValues_StateSelect(\Step\Acceptance\City $I)
    {
        $state1     = $this->state;
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->click(\Page\CityCreate::$StateSelect);
        $I->see($state1, \Page\CityCreate::$StateOption);
        $countOption = $I->getAmount($I, \Page\CityCreate::$StateOption);
        $I->assertEquals('2', $countOption);
    }
    
    public function Help4_1_5_SelectDefaultAllStates(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, "All States");
    }
    
    public function CityCreate4_1_6_CheckAllValues_StateSelect(\Step\Acceptance\City $I)
    {
        $state1     = $this->state;
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->click(\Page\CityCreate::$StateSelect);
        for($i=1, $c= count($this->states); $i<$c; $i++){
            $k=$i-1;
            $I->see($this->states[$k], \Page\CityCreate::$StateOption);
        }
        $countOption = $I->getAmount($I, \Page\CityCreate::$StateOption);
        $c++;
        $I->assertEquals($c, $countOption);
    }
    
    //--------------------------------------------------------------------------Create Button---------------------------------------------------------------------------------

    public function CityCreate5_1_1_CreateButtonPresent(\Step\Acceptance\City $I)
    {
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->seeElement(\Page\CityCreate::$CreateButton);
        $I->see("Create", \Page\CityCreate::$CreateButton);
    }
    
    public function CityCreate5_1_2_CreateButtonFunction_InputWeighted(\Step\Acceptance\City $I)
    {
        $name      = $I->GenerateNameOf("city");
        $state     = $this->state;
        $zips      = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\CityList::URL());
    }
    
    public function Help5_1_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function CityCreate5_1_4_CreateButtonFunction_NoWeighted(\Step\Acceptance\City $I)
    {
        $name      = $I->GenerateNameOf("city");
        $state     = $this->state;
        $zips      = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\CityList::URL());
    }
}
