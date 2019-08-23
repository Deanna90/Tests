<?php


class CityHaveNotProgramNotificationsCest
{
    public $state, $city1, $city2, $city3, $city4, $city5, $county, $zip1, $zip2, $zip3, $zip4, $zip5, $zip6, $zip7, $program1, $program2, $audSubgroup1_Energy, $business1, $business2, $business3, $busId1, $busId2, $busId3;
    public $id_audSubgroup1_Energy;
    public $measure1Desc;
    public $idMeasure1;
    public $measuresDesc_SuccessCreated;
    public $statuses = ['core'];
    public $title_City2, $message_City2, $title_City4, $message_City4, $title_City4_City5, $message_City4_City5, $title_AllCities ,$message_AllCities;
    
    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StCityMes");
        $shortName = 'CM';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $group = $I->GetAuditSubgroupOnPageInList($name);
        $this->id_audSubgroup1_Energy = $group['id'];
    }
    
    public function CreateMeasure1_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    public function CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    public function GenerateZips(\Step\Acceptance\County $I) {
        $this->zip1 = $I->GenerateZipCode();
        $this->zip2 = $I->GenerateZipCode();
        $this->zip3 = $I->GenerateZipCode();
        $this->zip4 = $I->GenerateZipCode();
        $this->zip5 = $I->GenerateZipCode();
        $this->zip6 = $I->GenerateZipCode();
        $this->zip7 = $I->GenerateZipCode();
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityCM1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = "$this->zip1, $this->zip2";
        $program = $this->program1 = $I->GenerateNameOf("ProgCM1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_6_3_CreateCity2(\Step\Acceptance\City $I) {
        $city    = $this->city2 = $I->GenerateNameOf("CityCM2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = "$this->zip2, $this->zip3";
        
        $I->CreateCity($city, $state, $zips, $this->county);
    }
    
    public function Help1_6_3_CreateCity3(\Step\Acceptance\City $I) {
        $city    = $this->city3 = $I->GenerateNameOf("CityCM3");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = "$this->zip3, $this->zip4";
        
        $I->CreateCity($city, $state, $zips, $this->county);
    }
    
    public function Help1_6_3_CreateCity4(\Step\Acceptance\City $I) {
        $city    = $this->city4 = $I->GenerateNameOf("CityCM4");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip5;
        
        $I->CreateCity($city, $state, $zips, $this->county);
    }
    
    public function Help1_6_3_CreateCity5(\Step\Acceptance\City $I) {
        $city    = $this->city5 = $I->GenerateNameOf("CityCM5");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip6;
        
        $I->CreateCity($city, $state, $zips, $this->county);
    }
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses);
        $I->PublishSectorChecklistStatus();
    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function CheckZip1_CityOption(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip1;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip2_CityOption(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip2;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip3_ValidationError(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip3;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip4_ValidationError(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip4;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip5_ValidationError(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip5;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip6_ValidationError(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip6;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip_ThatHaventCity(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip7;
        $result       = 'error';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function Help1_16_LogOutAndLoginAsAdmin(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function CheckCitiesOptionsOnCityMessageCreatePage(Step\Acceptance\CityMessage $I) { 
        $I->amOnPage(\Page\CityMessageCreate::URL());
        $I->click(\Page\CityMessageCreate::$CitySelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city1));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city2));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city3));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city4));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city5));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOption('5'));
    }
    
    public function CreateCityMessage_City2(Step\Acceptance\CityMessage $I) { 
        $title = $this->title_City2 = $I->GenerateNameOf("City2 with zips $this->zip2 and $this->zip3 ");
        $message = $this->message_City2 = $I->GenerateNameOf("Message for City2 with zips $this->zip2 and $this->zip3 ");
        $cityArray = [$this->city2];
        $cities = $this->city2;
                
        $I->CreateMessage($title, $message, $cityArray);
        $I->CheckValuesOnCityMessagesListPage_ByMessage($cities, $title, $message);
    }
    
    public function Help1_16_LogOut1(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function CheckZip1_CityOption1(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip1;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip2_CityOption1(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip2;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip3_PopupAppears1(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip3;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City2;
        $messagePopup = $this->message_City2;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip4_ValidationError1(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip4;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip5_ValidationError1(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip5;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip6_ValidationError1(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip6;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip_ThatHaventCity1(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip7;
        $result       = 'error';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function Help1_16_LogOutAndLoginAsAdmin2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function CheckCitiesOptionsOnCityMessageCreatePage2(Step\Acceptance\CityMessage $I) { 
        $I->amOnPage(\Page\CityMessageCreate::URL());
        $I->click(\Page\CityMessageCreate::$CitySelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city1));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city2));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city3));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city4));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city5));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOption('4'));
    }
    
    public function CreateCityMessage_City4(Step\Acceptance\CityMessage $I) { 
        $title = $this->title_City4 = null;
        $message = $this->message_City4 = $I->GenerateNameOf("Message for City4 with zips $this->zip5 ");
        $cityArray = [$this->city4];
        $cities = $this->city4;
                
        $I->CreateMessage($title, $message, $cityArray);
        $I->CheckValuesOnCityMessagesListPage_ByMessage($cities, $title, $message);
    }
    
    public function Help1_16_LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function CheckZip1_CityOption2(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip1;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip2_CityOption2(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip2;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip3_PopupAppears2(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip3;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City2;
        $messagePopup = $this->message_City2;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip4_ValidationError2(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip4;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip5_PopupAppears2(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip5;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = $this->message_City4;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip6_ValidationError2(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip6;
        $result       = 'anyMessage';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip_ThatHaventCity2(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip7;
        $result       = 'error';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function Help1_16_LogOutAndLoginAsAdmin3(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function CheckCitiesOptionsOnCityMessageCreatePage3(Step\Acceptance\CityMessage $I) { 
        $I->amOnPage(\Page\CityMessageCreate::URL());
        $I->click(\Page\CityMessageCreate::$CitySelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city1));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city2));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city3));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city4));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city5));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOption('3'));
    }
    
    public function CreateCityMessage_All(Step\Acceptance\CityMessage $I) { 
        $title = $this->title_AllCities = null;
        $message = $this->message_AllCities = $I->GenerateNameOf("Message for All Cities ");
        $cityArray = null;
        $cities = 'All';
        $allCities = 'yes';
                
        $I->CreateMessage($title, $message, $cityArray, $allCities);
        $I->CheckValuesOnCityMessagesListPage_ByMessage($cities, $title, $message);
    }
    
    public function Help1_16_LogOut3(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function CheckZip1_CityOption3(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip1;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip2_CityOption3(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip2;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip3_PopupAppears3(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip3;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City2;
        $messagePopup = $this->message_City2;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip4_PopupAppears3(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip4;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_AllCities;
        $messagePopup = $this->message_AllCities;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip5_PopupAppears3(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip5;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = $this->message_City4;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip6_PopupAppears3(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip6;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_AllCities;
        $messagePopup = $this->message_AllCities;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip_ThatHaventCity3(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip7;
        $result       = 'error';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function Help1_16_LogOutAndLoginAsAdmin4(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function CheckCitiesOptionsOnCityMessageCreatePage4(Step\Acceptance\CityMessage $I) { 
        $I->amOnPage(\Page\CityMessageCreate::URL());
        $I->click(\Page\CityMessageCreate::$CitySelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city1));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city2));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city3));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city4));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city5));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOption('3'));
    }
    
    public function UpdateCityMessageForCity4_AddCity5(Step\Acceptance\CityMessage $I) { 
        $title = $this->title_City4_City5 = 'Title test City4, City5';
        $messageOld = $this->message_City4;
        $message = $this->message_City4_City5 = $I->GenerateNameOf("Message Updated City4&City5 zips: $this->zip5, $this->zip6 ");
        $cityAddArray = [$this->city5];
        $cities = "$this->city4, $this->city5";
                
        $I->UpdateMessage_ByMessage($messageOld, $title, $message, $cityAddArray);
        $I->CheckValuesOnCityMessagesListPage_ByMessage($cities, $title, $message);
    }
    
    public function Help1_16_LogOut4(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function CheckZip1_CityOption4(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip1;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip2_CityOption4(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip2;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip3_PopupAppears4(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip3;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City2;
        $messagePopup = $this->message_City2;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip4_PopupAppears4(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip4;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_AllCities;
        $messagePopup = $this->message_AllCities;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip5_PopupAppears4(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip5;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City4_City5;
        $messagePopup = $this->message_City4_City5;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip6_PopupAppears4(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip6;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City4_City5;
        $messagePopup = $this->message_City4_City5;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip_ThatHaventCity4(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip7;
        $result       = 'error';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function Help1_16_LogOutAndLoginAsAdmin5(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function CheckCitiesOptionsOnCityMessageCreatePage5(Step\Acceptance\CityMessage $I) { 
        $I->amOnPage(\Page\CityMessageCreate::URL());
        $I->click(\Page\CityMessageCreate::$CitySelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city1));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city2));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city3));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city4));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city5));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOption('2'));
    }
    
    public function UpdateCityMessageForCity4City5_RemoveCity4AndAddCity3(Step\Acceptance\CityMessage $I) { 
        $title = null;
        $messageOld = $this->message_City4_City5;
        $message = null;
        $cityAddArray = [$this->city3];
        $cityRemoveArray = [$this->city4];
        $cities = "$this->city3, $this->city5";
        $titleUp = $this->title_City4_City5;
        $messageUp = $this->message_City4_City5;
                
        $I->UpdateMessage_ByMessage($messageOld, $title, $message, $cityAddArray, $cityRemoveArray);
        $I->CheckValuesOnCityMessagesListPage_ByMessage($cities, $title, $message);
    }
    
    public function Help1_16_LogOut5(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function CheckZip1_CityOption5(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip1;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip2_CityOption5(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip2;
        $result       = 'city';   
        $cityArray    = [$this->city1];
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip3_PopupAppears5(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip3;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City2;
        $messagePopup = $this->message_City2;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip4_PopupAppears5(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip4;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City4_City5;
        $messagePopup = $this->message_City4_City5;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip5_PopupAppears5(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip5;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_AllCities;
        $messagePopup = $this->message_AllCities;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip6_PopupAppears5(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip6;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_City4_City5;
        $messagePopup = $this->message_City4_City5;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
    
    public function CheckZip_ThatHaventCity5(Step\Acceptance\CityMessage $I) {
        $zip          = $this->zip7;
        $result       = 'error';   
        $cityArray    = null;
        $titlePopup   = null;
        $messagePopup = null;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
    }
}
