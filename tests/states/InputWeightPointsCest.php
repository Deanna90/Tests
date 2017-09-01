<?php


class InputWeightPointsCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $audSubgroup2_SolidWaste, $id_audSubgroup1_SolidWaste, $id_audSubgroup2_SolidWaste;
    public $measure1Desc, $idMeasure1, $pointsMeas1 = "1";
    public $measure2Desc, $idMeasure2, $pointsMeas2 = "2";
    public $measure3Desc, $idMeasure3, $pointsMeas3 = "3";
    public $measure4Desc, $idMeasure4, $pointsMeas4 = "4";
    public $measure5Desc, $idMeasure5, $pointsMeas5 = "5";
    public $measure6Desc, $idMeasure6, $pointsMeas6 = "6";
    public $measure7Desc, $idMeasure7, $pointsMeas7 = "7";
    public $measure8Desc, $idMeasure8, $pointsMeas8 = "8";
    public $measure9Desc, $idMeasure9, $pointsMeas9 = "9";
    public $measuresDesc_SuccessCreated = [], $points = '10', $completePoints = '0';
    public $city1, $zip1, $program1;
    public $statuses = ['elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective'];
    public $checklistUrl;
    public $business1, $business2, $id_business1, $id_business2;
    
    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StInputWeight");
        $shortName = 'IW';
        $weighted  = 'Input';
        
        $I->CreateState($name, $shortName, $weighted);
    }
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help2_4_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name1      = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $name2      = $this->audSubgroup2_SolidWaste = $I->GenerateNameOf("SolWasAudSub2");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name1));
        $this->id_audSubgroup2_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name2));
    }
    
    public function MeasTypes1_6_CreateMeasure1_MultipleQuesAndNumber_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description1");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['ques1', 'ques2'];
        $answers        = ['a1', 'a2', 'a3'];
        $points         = $this->pointsMeas1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure1));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_7_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $points         = $this->pointsMeas2;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure2));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_8_CreateMeasure3_ThermsPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup therms description');
        $points         = $this->pointsMeas3;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure3));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_9_CreateMeasure4_LightingPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description4");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Lighting popup desc');
        $points         = $this->pointsMeas4;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure4));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_10_CreateMeasure5_WasteDivertionPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description5");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup Waste Div description');
        $points         = $this->pointsMeas5;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure5));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_11_CreateMeasure6_MultipleQues_NotQuant(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure6Desc = $I->GenerateNameOf("Description6");
        $auditGroup      = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_SolidWaste;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?'];
        $points          = $this->pointsMeas6;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure6));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_12_CreateMeasure7_MultipleQuesAndNumber_NotQuant(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure7Desc = $I->GenerateNameOf("Description7");
        $auditGroup      = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup   = $this->audSubgroup2_SolidWaste;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        $points          = $this->pointsMeas7;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure7));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_13_CreateMeasure8_WithoutSubmeasure_NotQuant(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure8Desc = $I->GenerateNameOf("Description8");
        $auditGroup      = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup   = $this->audSubgroup2_SolidWaste;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $points          = $this->pointsMeas8;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $points);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure8));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function MeasTypes1_14_CreateMeasure9_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description9");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $points         = $this->pointsMeas9;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $points);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure9));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', $points);
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityIW1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgIW1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_15_CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $points             = $this->points;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
        $I->reloadPage();
        $I->UpdateChecklistPoints($points);
    }
    
    public function MeasTypes1_15_5_CheckPoints_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure4Desc));
        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        $I->wait(3);
        $I->waitForElement(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure6Desc));
        $I->wait(3);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas7 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnChecklistPreview(AcceptanceTester $I) {
        $completePoints = '0';
        $points         = $this->points;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->see("completed $completePoints out of $points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function Help1_17_BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("busnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
    }
    
    public function MeasTypes1_15_5_CheckPoints_OnBusinessChecklist(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check all points value on business checklist pages");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure6Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas7 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnBusinessChecklist(AcceptanceTester $I) {
        $completePoints = '0';
        $points         = $this->points;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->see("completed $completePoints out of $points total", \Page\RegistrationStarted::$TotalPointsInfo);
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->see("completed $completePoints out of $points total", \Page\RegistrationStarted::$TotalPointsInfo);
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->wait(2);
        $I->see("completed $completePoints out of $points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    
    public function MeasTypes1_17_1_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '11';
        $value2   = '22';
                
        $I->wait(1);
        $I->comment("Complete Measure1 with $this->pointsMeas1 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $this->completePoints = $this->completePoints + $this->pointsMeas1;
        $completePoints = $this->completePoints;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function MeasTypes1_17_1_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '11';
        $value2   = '22';
                
        $I->wait(1);
        $I->comment("Complete Measure2 with $this->pointsMeas2 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $this->completePoints = $this->completePoints + $this->pointsMeas2;
        $completePoints = $this->completePoints;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function MeasTypes1_17_1_CompleteMeasure8(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure8 with $this->pointsMeas8 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $completePoints = $this->points;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function MeasTypes1_17_1_DecompleteMeasure8(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->wait(1);
        $I->comment("Decomplete Measure8 with $this->pointsMeas8 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'no');
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $completePoints = $this->completePoints;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function Help1_18_LogOutFromBusiness_And_LoginAsNationalAdmin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
      
    public function Help1_18_GoToBusinessViewPage(AcceptanceTester $I){
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business1 = $u1[1];
        $I->comment("Business1 id: $this->id_business1");
    }
     
    public function MeasTypes1_15_5_CheckPoints_OnBusinessView(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check all points value on business checklist pages");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure4Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup2_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas7 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnBusinessView(AcceptanceTester $I) {
        $completePoints = $this->completePoints;
        $points         = $this->points;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->see("completed $completePoints out of $points total", \Page\BusinessChecklistView::$TotalPointsInfo);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->see("completed $completePoints out of $points total", \Page\BusinessChecklistView::$TotalPointsInfo);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup2_SolidWaste));
        $I->wait(3);
        $I->see("completed $completePoints out of $points total", \Page\BusinessChecklistView::$TotalPointsInfo);
    }
    

}
