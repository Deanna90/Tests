<?php


class AllPagesOpenSuccessfullyCest
{
    public $stateName, $rowState, $cityName, $rowCity;
    
    public function Login(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    //-------------------------------States-------------------------------------
    
//    public function OpenStateCreatePage(AcceptanceTester $I)
//    {
//        $I->wantTo("Check State Create Page Open");
//        $I->amOnPage(Page\StateCreate::$URL);
//        $I->wait(1);
//        $I->seeElement(Page\StateCreate::$NameField);
//        $I->seeElement(Page\StateCreate::$WeightedSelect);
//        $I->seeElement(Page\StateCreate::$CreateButton);
//    }
//    
//    public function SuccessStateCreate(\Step\Acceptance\State $I)
//    {
//        $I->wantTo("Check Success State Create");
//        $name      = $this->stateName = $I->GenerateNameOf("State");
//        $shortName = "SN";
//        $weighted  = 'yes';
//        $I->CreateState($name, $shortName, $weighted);
//        $I->wait(1);
//        $I->seeInCurrentUrl(\Page\StateList::$URL);
//    }
//    
//    public function OpenStateListPage(\Step\Acceptance\State $I)
//    {
//        $I->wantTo("Check State List Page Open");
//        $name      = $this->stateName;
//        $shortName = "SN";
//        $I->amOnPage(\Page\StateList::$URL);
//        $I->wait(1);
//        $I->seeElement(\Page\StateList::$CreateStateButton);
//        $I->seeElement(\Page\StateList::UpdateButtonLine('1'));
//        $I->seeElement(\Page\StateList::NameLine('1'));
//        $row = $I->GetStateRowNumber($name);
//        $I->CheckValuesOnStateListPage($row, $name, $shortName);
//    }
//    
//    public function OpenStateUpdatePage(\Step\Acceptance\State $I)
//    {
//        $I->wantTo("Check State Update Page Open");
//        $name = $this->stateName;
//        $row  = $this->rowState = $I->GetStateRowNumber($name);
//        $I->click(\Page\StateList::UpdateButtonLine($row));
//        $I->CheckInFieldsOnStateUpdatePage($name);
//        $I->seeElement(\Page\StateUpdate::$ShortNameField);
//        $I->seeElement(\Page\StateUpdate::$UpdateButton);
//    }
//    
//    public function SuccessStateUpdate(\Step\Acceptance\State $I)
//    {
//        $I->wantTo("Check Success State Update");
//        $name      = $I->GenerateNameOf("State");
//        $shortName = "NS";
//        $weighted  = 'no';
//        $I->UpdateState($this->rowState, $name, $shortName, $weighted);
//        $I->wait(1);
//        $I->seeInCurrentUrl(\Page\StateList::$URL);
//        $this->stateName = $name;
//    }
//    
//    //-------------------------------Cities-------------------------------------
//    
//    
//    public function SuccessCityCreate(\Step\Acceptance\City $I)
//    {
//        $I->wantTo("Check Success City Create");
//        $name   = $this->cityName = $I->GenerateNameOf("City");
//        $zips   = "12349";
//        $state  = $this->stateName;
//        $I->CreateCity($name, $state, $zips);
//        $I->wait(1);
//        $I->seeInCurrentUrl(\Page\CityList::$URL);
//    }
//    
//    public function OpenCityListPage(\Step\Acceptance\City $I)
//    {
//        $I->wantTo("Check City List Page Open");
//        $name  = $this->cityName;
//        $state = $this->stateName;
//        $I->amOnPage(\Page\CityList::$URL);
//        $I->wait(1);
//        $I->seeElement(\Page\CityList::$CreateCityButton);
//        $I->seeElement(\Page\CityList::NameLine('1'));
//        $row = $this->rowCity = $I->GetCityRowNumber($name);
//        $I->CheckValuesOnCityListPage($row, $name, $state);
//    }
//    
//    public function OpenCityUpdatePage(\Step\Acceptance\City $I)
//    {
//        $I->wantTo("Check City Update Page Open");
//        $name = $this->stateName;
//        $row  = $this->rowCity;
//        $I->click(\Page\CityList::UpdateButtonLine($row));
//        $I->CheckInFieldsOnCityUpdatePage($name);
//        $I->seeElement(\Page\CityUpdate::$ShortNameField);
//        $I->seeElement(\Page\CityUpdate::$UpdateButton);
//    }
//    
//    public function SuccessCityUpdate(\Step\Acceptance\City $I)
//    {
//        $I->wantTo("Check Success City Update");
//        $name = $I->GenerateNameOf("City");
//        $zips = '54321';
//        $row  = $this->rowCity;
//        $I->UpdateCity($row, $name, null, $zips);
//        $I->wait(1);
//        $I->seeInCurrentUrl(\Page\CityList::$URL);
//        $this->cityName = $name;
//    }
    
    public function MeasureCreate(\Step\Acceptance\Measure $I) {
        $desc = $I->GenerateNameOf("Description");
        $auditGroup     = 'Energy';
        $auditSubgroup  = 'Equipment';
        $quantitative   = 'yes';
        $submeasureType = 'Multiple question + Number';
        $questions = ['ques1', 'ques2', 'ques3'];
        $answers = ['a1', 'a2'];
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $row = $I->GetMeasureRowNumber($desc);
        $I->CheckSavedValuesOnMeasureUpdatePage($row, $desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, $quantToggleStatus = 'on');
    }
}
