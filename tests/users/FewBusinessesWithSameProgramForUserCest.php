<?php


class FewBusinessesWithSameProgramForUserCest
{
    public $state, $shortName, $county, $city, $zips, $program, $audSubgroup1_Energy, $audSubgroup1_SolidWaste, $business1, $business2, $business3, $busId1, $busId2, $busId3;
    public $id_audSubgroup1_Energy, $id_audSubgroup1_SolidWaste;
    public $email, $password, $firstName, $lastName, $phone, $todayDate;
    public $phoneBus1, $phoneBus2, $addressBus1, $addressBus2, $employeesBus1, $employeesBus2, $BSBus1, $BSBus2, $LSBus1, $LSBus2, $siteBus1, $siteBus2;
    public $measure1Desc, $measure2Desc, $measure3Desc, $measure4Desc, $measure5Desc;
    public $idMeasure1, $idMeasure2, $idMeasure3, $idMeasure4, $idMeasure5;
    public $measuresDesc_SuccessCreated;
    public $statuses = ['core', 'elective', 'elective', 'core', 'elective'];
    public $measuresText          = " required measures";
    public $measuresCompletedText = " measures completed";


    public function Help1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StFewBusSameProg");
        $shortName = $this->shortName = 'FBSP';
        
        $I->CreateState($name, $shortName);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function Help3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help5_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help1_7_CreateMeasure1_MultipleQuesAndNumber_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description1");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $answers        = ['23'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure3_WasteDivertionPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $popupDesc      = '';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure4_LightingPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description4");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure5_ThermsPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description5");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city = $I->GenerateNameOf("CityFBSP1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zips = $I->GenerateZipCode();
        $program = $this->program = $I->GenerateNameOf("ProgFBSP1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_15_CreateChecklistForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program;
        $programDestination = $this->program;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business register-----------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function FewBusinesses1_17_Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $this->firstName = $I->GenerateNameOf("firnam");
        $lastName         = $this->lastName = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->phone = $I->GeneratePhoneNumber();
        $email            = $this->email = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("bus1_FBSP");
        $busPhone         = $this->phoneBus1 = $I->GeneratePhoneNumber();
        $address          = $this->addressBus1 = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = $this->siteBus1 = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesBus1 = '455';
        $busFootage       = $this->BSBus1 = '234';
        $landscapeFootage = $this->LSBus1 = '666';
        $aboutActivateValueArray = [\Page\ApplicationDetails::$AboutQuestion_OwnershipStatus_HomeOffice, \Page\ApplicationDetails::$AboutQuestion_BusinessLocation_Yes, 
                                    \Page\ApplicationDetails::$AboutQuestion_HazardousMaterialsOrWaste_No, \Page\ApplicationDetails::$AboutQuestion_PoolOrSpa_Yes, 
                                    \Page\ApplicationDetails::$AboutQuestion_EmergencyBackUpGenerator_No];
        $permitsActivateArray    = [\Page\ApplicationDetails::$Permits_AirButton, \Page\ApplicationDetails::$Permits_StormWaterButton, \Page\ApplicationDetails::$Permits_OtherButton];
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage, $agree = 'on', null, $aboutActivateValueArray, $permitsActivateArray);
        $I->wait(8);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '11';
        $value2   = '22';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for Business1");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '111';
                
        $I->wait(1);
        $I->comment("Complete Measure2 for Business1");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure3 for Business1");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
//        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
//        $I->wait(2);
//        $I->click(Page\RegistrationStarted::$ThermsPopup_CloseButton);
//        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function CheckOnBusiness1_GetStartedPage(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(2);
        $I->waitForElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSee('1 /2', \Page\RegistrationStarted::$RightBlock_CurrentlyCompletedMeasuresInfo);
        $I->canSee("There are 2 measures that need to be completed in this Application.", \Page\RegistrationStarted::$RightBlock_NeedToCompleteMeasuresInfo);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function CheckOnBusiness1_ReviewAndSubmitPage(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(\Page\ReviewAndSubmit::$URL);
        $I->wait(2);
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("2 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    public function FewBusinesses1_17_Business2_Register(Step\Acceptance\Business $I)
    {
        $busName          = $this->business2 = $I->GenerateNameOf("bus2_FBSP");
        $busPhone         = $this->phoneBus2 = $I->GeneratePhoneNumber();
        $address          = $this->addressBus2 = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = $this->siteBus2 = 'newsite2.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesBus2 = '40';
        $busFootage       = $this->BSBus2 = '222';
        $landscapeFootage = $this->LSBus2 = '333';
        
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
        $I->wait(2);
        $I->RegisterBusiness(null, null, null, null, null, null, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->waitForElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSee('0 /2', \Page\RegistrationStarted::$RightBlock_CurrentlyCompletedMeasuresInfo);
        $I->canSee("There are 2 measures that need to be completed in this Application.", \Page\RegistrationStarted::$RightBlock_NeedToCompleteMeasuresInfo);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
        $I->canSeeElement(\Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->canSee($busName, \Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->click(\Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::selectBusinessOptionByName('Add new'));
        $I->canSeeElement(\Page\RegistrationStarted::selectBusinessOptionByName($this->business1));
        $I->canSeeElement(\Page\RegistrationStarted::selectBusinessOptionByName($busName));
        $I->click(\Page\RegistrationStarted::selectBusinessOptionByName($this->business1));
        $I->wait(4);
        $I->canSee($this->business1, \Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->waitForElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSee('1 /2', \Page\RegistrationStarted::$RightBlock_CurrentlyCompletedMeasuresInfo);
        $I->canSee("There are 2 measures that need to be completed in this Application.", \Page\RegistrationStarted::$RightBlock_NeedToCompleteMeasuresInfo);
    }
    
    public function CheckOnBusiness1AndBusiness2_ReviewAndSubmitPage1(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(\Page\ReviewAndSubmit::$URL);
        $I->wait(2);
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("2 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
        $I->click(\Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::selectBusinessOptionByName($this->business2));
        $I->wait(1);
        $I->amOnPage(\Page\ReviewAndSubmit::$URL);
        $I->wait(2);
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    public function Help1_18_LogOutFromBusiness2_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_18_Dashboard(AcceptanceTester $I){
        $I->wait(1);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url2: $url2");
        $u1 = explode('=', $url1);
        $u2 = explode('=', $url2);
        $this->busId1 = $u1[1];
        $this->busId2 = $u2[1];
        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2");
    }
    
    public function CheckBusiness1DataOnApplicationDetailsPage(AcceptanceTester $I){
        $aboutActivateValueArray = [Page\ApplicationDetails::$AboutQuestion_OwnershipStatus_HomeOffice, Page\ApplicationDetails::$AboutQuestion_BusinessLocation_Yes, 
                                    Page\ApplicationDetails::$AboutQuestion_HazardousMaterialsOrWaste_No, Page\ApplicationDetails::$AboutQuestion_PoolOrSpa_Yes, 
                                    Page\ApplicationDetails::$AboutQuestion_EmergencyBackUpGenerator_No];
        $aboutDeactiveValueArray = [Page\ApplicationDetails::$AboutQuestion_OwnershipStatus_OwnBuilding, Page\ApplicationDetails::$AboutQuestion_OwnershipStatus_RentSpace, 
                                    Page\ApplicationDetails::$AboutQuestion_BusinessLocation_No, Page\ApplicationDetails::$AboutQuestion_HazardousMaterialsOrWaste_Yes, 
                                    Page\ApplicationDetails::$AboutQuestion_PoolOrSpa_No, Page\ApplicationDetails::$AboutQuestion_EmergencyBackUpGenerator_Yes];
        $permitsActivateArray    = [Page\ApplicationDetails::$Permits_AirButton, Page\ApplicationDetails::$Permits_StormWaterButton, Page\ApplicationDetails::$Permits_OtherButton];
        $permitsDeactiveArray    = [Page\ApplicationDetails::$Permits_HazardousMaterialsButton, Page\ApplicationDetails::$Permits_HazardousWasteButton, 
                                    Page\ApplicationDetails::$Permits_AboveGroundStorageTanksButton, Page\ApplicationDetails::$Permits_FireCodeButton, 
                                    Page\ApplicationDetails::$Permits_FoodSafetyButton, Page\ApplicationDetails::$Permits_PoolAndSpaSafetyButton,
                                    Page\ApplicationDetails::$Permits_UndergroundStorageTanksButton, Page\ApplicationDetails::$Permits_WastewaterButton];
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(\Page\ApplicationDetails::$ContactNameField_BusinessInfoTab, $this->firstName.' '.$this->lastName);
        $I->canSeeInField(\Page\ApplicationDetails::$PhoneNumberField_BusinessInfoTab, $this->phone);
        $I->canSeeInField(\Page\ApplicationDetails::$EmailField_BusinessInfoTab, $this->email);
        
        $I->canSee($this->addressBus1, \Page\ApplicationDetails::$BusinessAddress_BusinessInfoTab);
        $I->canSee($this->city.' , '. $this->shortName.' '.$this->zips, \Page\ApplicationDetails::$City_Zip_ShortStateName_BusinessInfoTab);
        $I->canSee($this->phoneBus1, \Page\ApplicationDetails::$Phone_BusinessInfoTab);
        $I->canSee("Office / Retail", Page\ApplicationDetails::$Sector_BusinessInfoTab);
        
        $I->canSee('Tier 2', \Page\ApplicationDetails::TierName_BusinessInfoTab('1'));
        $I->canSee('In process', \Page\ApplicationDetails::TierStatus_BusinessInfoTab('1'));
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessProfile($this->busId1));
        $I->wait(2);
        $I->canSeeInField(\Page\ApplicationDetails::$BusinessNameField_BusinessProfileTab, $this->business1);
        $I->canSeeInField(\Page\ApplicationDetails::$AddressField_BusinessProfileTab, $this->addressBus1);
        $I->canSee($this->city, \Page\ApplicationDetails::$City_BusinessProfileTab);
        $I->canSee($this->zips, \Page\ApplicationDetails::$Zip_BusinessProfileTab);
        
        $I->canSeeInField(\Page\ApplicationDetails::$PhoneField_BusinessProfileTab, $this->phoneBus1);
        $I->canSeeInField(\Page\ApplicationDetails::$FaxField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$EmailField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$SiteField_BusinessProfileTab, 'https://'.$this->siteBus1);
        $I->canSeeInField(\Page\ApplicationDetails::$FacebookLinkField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$TwitterLinkField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$LinkedInField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$ZipCodeSelect_BusinessProfileTab, $this->zips);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$CitySelect_BusinessProfileTab, $this->city);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ProgramSelect_BusinessProfileTab, $this->program);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$SectorSelect_BusinessProfileTab, 'Office / Retail');
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$BusinessTypeSelect_BusinessProfileTab, 'Select Type');
        $I->canSeeInField(\Page\ApplicationDetails::$BusinessDescriptionField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$DescribeHowBusinessIsGreenField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$TestimonialsField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$NumberOfEmployeesField_BusinessProfileTab, $this->employeesBus1);
        $I->canSeeInField(\Page\ApplicationDetails::$BusinessSquareFootageField_BusinessProfileTab, $this->BSBus1);
        $I->canSeeInField(\Page\ApplicationDetails::$LandscapeSquareFootageField_BusinessProfileTab, $this->LSBus1);
        for ($c= count($aboutActivateValueArray), $i=$c; $i>=1; $i--){
            $k = $i-1;
            $I->makeElementVisible([$aboutActivateValueArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->canSeeElementInDOM($aboutActivateValueArray[$k]."[checked]");
            $I->wait(1);
        }
        for ($c= count($aboutDeactiveValueArray), $i=$c; $i>=1; $i--){
            $k = $i-1;
            $I->makeElementVisible([$aboutDeactiveValueArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOM($aboutDeactiveValueArray[$k]."[checked]");
            $I->wait(1);
        }
        for ($i=1, $c= count($permitsActivateArray); $i<=$c; $i++){
            $k = $i-1;
            $I->makeElementVisible([$permitsActivateArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->canSeeElementInDOM($permitsActivateArray[$k]."[checked]");
            $I->wait(1);
        }
        for ($i=1, $c= count($permitsDeactiveArray); $i<=$c; $i++){
            $k = $i-1;
            $I->makeElementVisible([$permitsDeactiveArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOM($permitsDeactiveArray[$k]."[checked]");
            $I->wait(1);
        }
    }
    
    public function CheckBusiness1CompletedMeasuresInChecklist(AcceptanceTester $I){
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->busId1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'yes');
//        $I->click(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
        $I->wait(1);
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->busId1, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]", "[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'no');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'no');
    }
    
    public function CheckBusiness2DataOnApplicationDetailsPage(AcceptanceTester $I){
        $aboutDeactiveValueArray = [Page\ApplicationDetails::$AboutQuestion_OwnershipStatus_HomeOffice, Page\ApplicationDetails::$AboutQuestion_BusinessLocation_Yes, 
                                    Page\ApplicationDetails::$AboutQuestion_HazardousMaterialsOrWaste_No, Page\ApplicationDetails::$AboutQuestion_PoolOrSpa_Yes, 
                                    Page\ApplicationDetails::$AboutQuestion_EmergencyBackUpGenerator_No, Page\ApplicationDetails::$AboutQuestion_OwnershipStatus_OwnBuilding, 
                                    Page\ApplicationDetails::$AboutQuestion_OwnershipStatus_RentSpace, Page\ApplicationDetails::$AboutQuestion_BusinessLocation_No, 
                                    Page\ApplicationDetails::$AboutQuestion_HazardousMaterialsOrWaste_Yes, Page\ApplicationDetails::$AboutQuestion_PoolOrSpa_No, 
                                    Page\ApplicationDetails::$AboutQuestion_EmergencyBackUpGenerator_Yes];
        $permitsDeactiveArray    = [Page\ApplicationDetails::$Permits_AirButton, Page\ApplicationDetails::$Permits_StormWaterButton, Page\ApplicationDetails::$Permits_OtherButton, 
                                    Page\ApplicationDetails::$Permits_HazardousMaterialsButton, Page\ApplicationDetails::$Permits_HazardousWasteButton, 
                                    Page\ApplicationDetails::$Permits_AboveGroundStorageTanksButton, Page\ApplicationDetails::$Permits_FireCodeButton, 
                                    Page\ApplicationDetails::$Permits_FoodSafetyButton, Page\ApplicationDetails::$Permits_PoolAndSpaSafetyButton,
                                    Page\ApplicationDetails::$Permits_UndergroundStorageTanksButton, Page\ApplicationDetails::$Permits_WastewaterButton];
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->wait(2);
        $I->canSeeInField(\Page\ApplicationDetails::$ContactNameField_BusinessInfoTab, $this->firstName.' '.$this->lastName);
        $I->canSeeInField(\Page\ApplicationDetails::$PhoneNumberField_BusinessInfoTab, $this->phone);
        $I->canSeeInField(\Page\ApplicationDetails::$EmailField_BusinessInfoTab, $this->email);
        
        $I->canSee($this->addressBus2, \Page\ApplicationDetails::$BusinessAddress_BusinessInfoTab);
        $I->canSee($this->city.' , '. $this->shortName.' '.$this->zips, \Page\ApplicationDetails::$City_Zip_ShortStateName_BusinessInfoTab);
        $I->canSee($this->phoneBus2, \Page\ApplicationDetails::$Phone_BusinessInfoTab);
        $I->canSee('Office / Retail', \Page\ApplicationDetails::$Sector_BusinessInfoTab);
        
        $I->canSee('Tier 2', \Page\ApplicationDetails::TierName_BusinessInfoTab('1'));
        $I->canSee('In process', \Page\ApplicationDetails::TierStatus_BusinessInfoTab('1'));
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessProfile($this->busId2));
        $I->wait(2);
        $I->canSeeInField(\Page\ApplicationDetails::$BusinessNameField_BusinessProfileTab, $this->business2);
        $I->canSeeInField(\Page\ApplicationDetails::$AddressField_BusinessProfileTab, $this->addressBus2);
        $I->canSee($this->city, \Page\ApplicationDetails::$City_BusinessProfileTab);
        $I->canSee($this->zips, \Page\ApplicationDetails::$Zip_BusinessProfileTab);
        
        $I->canSeeInField(\Page\ApplicationDetails::$PhoneField_BusinessProfileTab, $this->phoneBus2);
        $I->canSeeInField(\Page\ApplicationDetails::$FaxField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$EmailField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$SiteField_BusinessProfileTab, 'https://'.$this->siteBus2);
        $I->canSeeInField(\Page\ApplicationDetails::$FacebookLinkField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$TwitterLinkField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$LinkedInField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$ZipCodeSelect_BusinessProfileTab, $this->zips);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$CitySelect_BusinessProfileTab, $this->city);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ProgramSelect_BusinessProfileTab, $this->program);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$SectorSelect_BusinessProfileTab, 'Office / Retail');
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$BusinessTypeSelect_BusinessProfileTab, 'Select Type');
        $I->canSeeInField(\Page\ApplicationDetails::$BusinessDescriptionField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$DescribeHowBusinessIsGreenField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$TestimonialsField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\ApplicationDetails::$NumberOfEmployeesField_BusinessProfileTab, $this->employeesBus2);
        $I->canSeeInField(\Page\ApplicationDetails::$BusinessSquareFootageField_BusinessProfileTab, $this->BSBus2);
        $I->canSeeInField(\Page\ApplicationDetails::$LandscapeSquareFootageField_BusinessProfileTab, $this->LSBus2);
        for ($c= count($aboutDeactiveValueArray), $i=$c; $i>=1; $i--){
            $k = $i-1;
            $I->makeElementVisible([$aboutDeactiveValueArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOM($aboutDeactiveValueArray[$k]."[checked]");
            $I->wait(1);
        }
        for ($i=1, $c= count($permitsDeactiveArray); $i<=$c; $i++){
            $k = $i-1;
            $I->makeElementVisible([$permitsDeactiveArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOm($permitsDeactiveArray[$k]."[checked]");
            $I->wait(1);
        }
    }
    
    public function CheckBusiness2CompletedMeasuresInChecklist(AcceptanceTester $I){
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->busId2, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('0', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("0 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 0 out of 2 total", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'no');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'no');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'no');
        $I->wait(1);
//        $I->click(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->busId2, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('0', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("0 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 0 out of 2 total", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]", "[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'no');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'no');
    }
    
    public function Help1_18_LogOutFromAdmin_LoginAsBusinessUser(AcceptanceTester $I){
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email, $this->password, $I, $type = 'user');
        $I->canSee($this->business2, Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->wait(1);
        $I->click(Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->wait(2);
        $I->click(Page\RegistrationStarted::selectBusinessOptionByName($this->business2));
        $I->wait(1);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure1_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '5';
        $value2   = '12';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure2_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '20';
                
        $I->wait(1);
        $I->comment("Complete Measure2 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure3_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->wait(1);
        $I->comment("Complete Measure3 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->makeElementVisible(["[data-measure_id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(3);
//        $I->click('[Detailed Inputs Form]');
//        $I->click("[Detailed Inputs Form]", "#");
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(10);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $before), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $before), '4');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $before), '10');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'DUMPSTER');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $after), '6');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $after), '5');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure4_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure4 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(4);
        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureSelect('1'), '5');
        $I->wait(2);
        $I->fillField(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureQuantityField('1'), '4');
        $I->fillField(\Page\RegistrationStarted::LightingPopup_ExistingFixtureQuantityField('1'), '4');
        $I->wait(3);
        $I->click(Page\RegistrationStarted::$LightingPopup_SaveChangesButton);
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('2', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("2 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("2 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("You have completed all measures.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 2 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CompleteMeasure5_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure5 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->selectOption(Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('1'), '4');
        $I->wait(1);
        $I->fillField(Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), '12');
        $I->wait(3);
        $I->click(\Page\RegistrationStarted::$ThermsPopup_SaveChangesButton);
//        $I->wait(3);
//        $I->click(Page\RegistrationStarted::$ThermsPopup_CloseButton);
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('2', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("2 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("2 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("You have completed all measures.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function CheckOnBusiness2_GetStartedPage(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(2);
        $I->waitForElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSee('2 /2', \Page\RegistrationStarted::$RightBlock_CurrentlyCompletedMeasuresInfo);
        $I->canSee("There are 2 measures that need to be completed in this Application.", \Page\RegistrationStarted::$RightBlock_NeedToCompleteMeasuresInfo);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function CheckOnBusiness2_ReviewAndSubmitPage(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(\Page\ReviewAndSubmit::$URL);
        $I->wait(2);
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("2 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("1 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
    }
    
    public function SelectBusiness1(AcceptanceTester $I){
        $I->canSee($this->business2, Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->wait(1);
        $I->click(Page\RegistrationStarted::$FewBusinessesDropdownButton);
        $I->wait(2);
        $I->click(Page\RegistrationStarted::selectBusinessOptionByName($this->business1));
        $I->wait(1);
    }
    
    public function FewBusinesses1_17_1_CheckMeasure3_Business1(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->wait(1);
        $I->comment("Complete Measure3 popup for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]", "[data-measure_id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\RegistrationStarted::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'no');
        $I->wait(2);
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(10);
        $I->cantSeeElement(\Page\RegistrationStarted::WasteDiversionPopup_CommoditySelect('1', $before));
        $I->cantSeeElement(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $before));
        $I->cantSeeElement(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $before));
        $I->cantSeeElement(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $before));
//        $I->cantSeeElement(\Page\RegistrationStarted::$WasteDiversionPopup_AfterGBTab);
        $I->cantSeeElement(Page\RegistrationStarted::WasteDiversionPopup_SaveChangesButton($before));
        $I->canSeeElement(".factor_bar");
        $I->canSee("ALL PAPER");
        $I->canSee("BOTTLES / CANS");
        $I->canSee("COMPOST");
        $I->canSeeElement(Page\RegistrationStarted::$WasteDiversionPopup_SaveButton_NoAnswer);
        $I->click(Page\RegistrationStarted::$WasteDiversionPopup_SaveButton_NoAnswer);
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CheckMeasure4_Business1(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->wait(1);
        $I->comment("Check Measure4 popup for Business1 is empty");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]", "[data-measure_id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->cantSeeOptionIsSelected(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->cantSeeOptionIsSelected(\Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->click(\Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(3);
        $I->cantSeeOptionIsSelected(\Page\RegistrationStarted::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $I->wait(3);
        $I->cantSeeElement(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureSelect('1'));
        $I->wait(2);
        $I->cantSeeElement(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureQuantityField('1'));
        $I->cantSeeElement(\Page\RegistrationStarted::LightingPopup_ExistingFixtureQuantityField('1'));
        $I->wait(3);
        $I->click(Page\RegistrationStarted::$LightingPopup_CloseButton);
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 2 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function FewBusinesses1_17_1_CheckMeasure5_Business1(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->wait(1);
        $I->comment("Check Measure5 popup for Business1 is empty");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]", "[data-measure_id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->cantSeeOptionIsSelected(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->cantSeeOptionIsSelected(\Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(2);
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->cantSeeOptionIsSelected(Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('1'), '4');
        $I->wait(1);
        $I->cantSeeInField(Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), '12');
        $I->wait(3);
        $I->click(\Page\RegistrationStarted::$ThermsPopup_CloseButton);
//        $I->wait(3);
//        $I->click(Page\RegistrationStarted::$ThermsPopup_CloseButton);
        $I->wait(3);
        $I->canSee("Tier 2 $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
    }
    
    public function SubmitBusiness1_ReviewAndSubmitPage(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(\Page\ReviewAndSubmit::$URL);
        $I->wait(2);
        $I->scrollTo(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(1);
        $I->click(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(5);
        $I->click(".confirm");
    }
    
    public function CheckBusiness1_BusinessDashboard(AcceptanceTester $I) {
        $aboutActivateValueArray = [Page\CompanyProfile::$AboutQuestion_OwnershipStatus_HomeOffice, Page\CompanyProfile::$AboutQuestion_BusinessLocation_Yes, 
                                    Page\CompanyProfile::$AboutQuestion_HazardousMaterialsOrWaste_No, Page\CompanyProfile::$AboutQuestion_PoolOrSpa_Yes, 
                                    Page\CompanyProfile::$AboutQuestion_EmergencyBackUpGenerator_No];
        $aboutDeactiveValueArray = [Page\CompanyProfile::$AboutQuestion_OwnershipStatus_OwnBuilding, Page\CompanyProfile::$AboutQuestion_OwnershipStatus_RentSpace, 
                                    Page\CompanyProfile::$AboutQuestion_BusinessLocation_No, Page\CompanyProfile::$AboutQuestion_HazardousMaterialsOrWaste_Yes, 
                                    Page\CompanyProfile::$AboutQuestion_PoolOrSpa_No, Page\CompanyProfile::$AboutQuestion_EmergencyBackUpGenerator_Yes];
        $permitsActivateArray    = [Page\CompanyProfile::$Permits_AirButton, Page\CompanyProfile::$Permits_StormWaterButton, Page\CompanyProfile::$Permits_OtherButton];
        $permitsDeactiveArray    = [Page\CompanyProfile::$Permits_HazardousMaterialsButton, Page\CompanyProfile::$Permits_HazardousWasteButton, 
                                    Page\CompanyProfile::$Permits_AboveGroundStorageTanksButton, Page\CompanyProfile::$Permits_FireCodeButton, 
                                    Page\CompanyProfile::$Permits_FoodSafetyButton, Page\CompanyProfile::$Permits_PoolAndSpaSafetyButton,
                                    Page\CompanyProfile::$Permits_UndergroundStorageTanksButton, Page\CompanyProfile::$Permits_WastewaterButton];
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->wait(2);
        $I->canSee($this->business1, \Page\MainMenu::$StateSelect);
        $I->canSee($this->business1, Page\BusinessDashboard::$BusinessName);
        $I->canSee($this->addressBus1, Page\BusinessDashboard::$BusinessAddress_BusinessInfo);
        $I->canSee($this->city.", ".$this->shortName." ".$this->zips, Page\BusinessDashboard::$City_Zip_ShortStateName_BusinessInfo);
        $I->canSee("Office / Retail", Page\BusinessDashboard::$Sector_BusinessInfo);
        $I->canSee("NA", Page\BusinessDashboard::$BusinessType_BusinessInfo);
        $I->canSee("NA", Page\BusinessDashboard::$BusinessCategory_BusinessInfo);
        $I->canSee("Tier 2", Page\BusinessDashboard::Tier_TierStatus('1'));
        $I->canSee("In process", Page\BusinessDashboard::StatusForTier_TierStatus('1'));
        $I->canSee("Pending", Page\BusinessDashboard::$Status_ApplicationStatus);
        $I->canSee("0 Times", Page\BusinessDashboard::$Certified_ApplicationStatus);
        $I->canSee($this->todayDate, Page\BusinessDashboard::CreatedLine_Records('1'));
        $I->canSee($this->todayDate, Page\BusinessDashboard::LastModifiedLine_Records('1'));
        $I->canSee(\Page\ApplicationDetails::InProcessStatus, Page\BusinessDashboard::StatusLine_Records('1'));
        $I->canSee('(not set)', Page\BusinessDashboard::RecognitionLine_Records('1').">span");
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->wait(2);
        $I->canSee($this->business1, \Page\CompanyProfile::$BusinessName_BusinessProfileTab);
        $I->canSee($this->addressBus1, \Page\CompanyProfile::$Address_BusinessProfileTab);
        $I->canSee($this->city, \Page\CompanyProfile::$City_BusinessProfileTab);
        $I->canSee($this->zips, \Page\CompanyProfile::$Zip_BusinessProfileTab);
        
        $I->canSeeInField(\Page\CompanyProfile::$PhoneField_BusinessProfileTab, $this->phoneBus1);
        $I->canSeeInField(\Page\CompanyProfile::$FaxField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\CompanyProfile::$EmailField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\CompanyProfile::$SiteField_BusinessProfileTab, 'https://'.$this->siteBus1);
        $I->canSeeInField(\Page\CompanyProfile::$FacebookLinkField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\CompanyProfile::$TwitterLinkField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\CompanyProfile::$LinkedInField_BusinessProfileTab, '');
        $I->canSeeOptionIsSelected(\Page\CompanyProfile::$BusinessTypeSelect_BusinessProfileTab, 'Select Type');
        $I->canSeeInField(\Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, '');
        $I->canSeeInField(\Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, '');
        $I->cantSeeElement(\Page\CompanyProfile::$NumberOfEmployeesField_BusinessProfileTab);
        $I->cantSeeElement(\Page\CompanyProfile::$BusinessSquareFootageField_BusinessProfileTab);
        $I->cantSeeElement(\Page\CompanyProfile::$LandscapeSquareFootageField_BusinessProfileTab);
        for ($c= count($aboutActivateValueArray), $i=$c; $i>=1; $i--){
            $k = $i-1;
            $I->makeElementVisible([$aboutActivateValueArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOM($aboutActivateValueArray[$k]."[checked]");
            $I->wait(1);
        }
        for ($c= count($aboutDeactiveValueArray), $i=$c; $i>=1; $i--){
            $k = $i-1;
            $I->makeElementVisible([$aboutDeactiveValueArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOM($aboutDeactiveValueArray[$k]."[checked]");
            $I->wait(1);
        }
        for ($i=1, $c= count($permitsActivateArray); $i<=$c; $i++){
            $k = $i-1;
            $I->makeElementVisible([$permitsActivateArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOM($permitsActivateArray[$k]."[checked]");
            $I->wait(1);
        }
        for ($i=1, $c= count($permitsDeactiveArray); $i<=$c; $i++){
            $k = $i-1;
            $I->makeElementVisible([$permitsDeactiveArray[$k]], $style = 'display');
            $I->wait(2);
            $I->comment("1");
            $I->cantSeeElementInDOm($permitsDeactiveArray[$k]."[checked]");
            $I->wait(1);
        }
        $I->click(Page\MainMenu::$StateSelect);
        $I->canSee($this->business2, \Page\MainMenu::$StateOption);
        $I->canSee($this->business1, \Page\MainMenu::$StateOption);
    }
    
    public function Logout_And_LoginAsAdmin(AcceptanceTester $I) {
        $I->reloadPage();
        $I->wait(1);
        $I->Logout($I);
        $I->wait(2);
        $I->LoginAsAdmin($I);
    }
    
    public function CheckBusiness1_CompletedMeasuresInChecklist(AcceptanceTester $I){
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(4);
        
        $I->canSee('Tier 2', \Page\ApplicationDetails::TierName_BusinessInfoTab('1'));
        $I->canSee('In process', \Page\ApplicationDetails::TierStatus_BusinessInfoTab('1'));
        
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        $I->wait(4);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'yes');
        $I->click(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
        $I->wait(4);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('1', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("1 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("completed 1 out of 2 total", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]", "[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'no');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'no');
    }
    
    public function CheckBusiness2_CompletedMeasuresInChecklist(AcceptanceTester $I){
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->wait(4);
        
        $I->canSee('Tier 2', \Page\ApplicationDetails::TierName_BusinessInfoTab('1'));
        $I->canSee($this->todayDate, \Page\ApplicationDetails::TierStatus_BusinessInfoTab('1'));
        
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        $I->wait(4);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('2', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("2 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("2 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("You have completed all measures.", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'yes');
        $I->click(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
        $I->wait(4);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('2', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("2 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("2 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("You have completed all measures.", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]", "[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'yes');
    }
    
    public function DeleteBusiness1(AcceptanceTester $I) {
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(4);
        $I->click(\Page\BusinessChecklistView::$LeftMenu_DeleteApplicationButton);
        $I->wait(4);
        $I->canSee('Are you sure?', ".sweet-alert h2");
        $I->canSee('You really want delete this application?', ".sweet-alert h2+p");
        $I->click(".sweet-alert .confirm");
        $I->wait(3);
        $I->canSeeInCurrentUrl(Page\Dashboard::URL());
        $I->cantSeeElement(Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(Page\Dashboard::BusinessLink_ByBusName($this->business2));
    }
    
    public function DeletedBusiness1_PageNotFound(AcceptanceTester $I) {
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeePageNotFound($I, "Business not found");
    }
    
    public function Business2_CheckBusinessFound(AcceptanceTester $I) {
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->wait(4);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->busId2, $this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('2', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("2 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("2 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("You have completed all measures.", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'yes');
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->busId2, $this->id_audSubgroup1_SolidWaste));
        $I->wait(4);
        $I->canSee("Tier 2 $this->measuresText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee('2', Page\BusinessChecklistView::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("2 of 2"."$this->measuresCompletedText", Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("2 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
//        $I->see("You have completed all measures.", \Page\BusinessChecklistView::$TotalMeasuresInfo);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]", "[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'yes');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'yes');
    }
    
    public function Logout_And_LoginAsBusinessUser(AcceptanceTester $I) {
        $I->wait(1);
        $I->Logout($I);
        $I->wait(2);
        $I->LoginAsUser($this->email, $this->password, $I, $type = 'user');
        $I->wait(2);
        $I->canSeeInCurrentUrl(\Page\RegistrationStarted::$URL_Started);
        $I->canSee('2 /2', \Page\RegistrationStarted::$RightBlock_CurrentlyCompletedMeasuresInfo);
        $I->canSee("There are 2 measures that need to be completed in this Application.", \Page\RegistrationStarted::$RightBlock_NeedToCompleteMeasuresInfo);
        $I->canSeeElement(\Page\Header::$NewBusinessButton);
        $I->cantSeeElement(\Page\RegistrationStarted::$FewBusinessesDropdownButton);
    }
    
}
