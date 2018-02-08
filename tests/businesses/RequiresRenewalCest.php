<?php


class RequiresRenewalCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $globVariableTitle, $globVariableValue;
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $thermName, $thermCount;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measure3Desc, $idMeasure3;
    public $measure4Desc, $idMeasure4, $savingMeas4_Annual_ThermsArea_Bus1, $savingMeas4_Daily_ThermsArea_Bus1;
    public $measure5Desc, $idMeasure5, $savingMeas5_Annual_EnergySavedArea_Bus1, $savingMeas5_Daily_EnergySavedArea_Bus1,
                                       $savingMeas5_Annual_EnergySavedArea_Bus2, $savingMeas5_Daily_EnergySavedArea_Bus2;
    
    public $measure6Desc, $idMeasure6, $savingMeas6_Annual_SolidWasteDivertedArea_Bus1, $savingMeas6_Daily_SolidWasteDivertedArea_Bus1,
                                       $savingMeas6_Annual_SolidWasteDivertedArea_Bus2, $savingMeas6_Daily_SolidWasteDivertedArea_Bus2;
    
    public $measure7Desc, $idMeasure7;
    public $measure8Desc, $idMeasure8;
    public $measure9Desc, $idMeasure9;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $county;
    public $statusesDefault           = ['not set',  'not set',  'not set', 'not set',  'not set',  'not set',  'not set',  'not set',  'not set'];
    public $statusesFirst             = ['core',     'elective', 'core', 'elective',  'core', 'elective',  'core', 'elective',  'core'];
    public $checklistUrl, $id_checklist;
    public $employeesCount1, $business1, $id_business1;
    public $employeesCount2, $business2, $id_business2;
    public $todayDate;


    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StReqRenew");
        $shortName = 'SR';
        
        $I->CreateState($name, $shortName);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    //--------------------------Create audit subgroups--------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
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
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
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
    
    //------------------------------Create measures-----------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure2_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure3_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3 quant Multiple Quest & Number Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['What?', "Where?", "Who?"];
        $answers        = ['Grey', 'Green', 'Red'];
        $reamOrLbs      = ['lbs', 'ream', "ream"];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, null, null, null, null, null, $reamOrLbs);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure4_Quant_ThermsPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure4Desc = $I->GenerateNameOf("Description_4 quant Therms Popup Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure5_Quant_LightingPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure5Desc = $I->GenerateNameOf("Description_5 quant Lighting Popup Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure6_Quant_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure6Desc = $I->GenerateNameOf("Description_6 quant Waste Diversion Popup Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure7_NotQuant_MultipleQuestions(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure7Desc = $I->GenerateNameOf("Description_7 NOTquant Multiple ques ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure8_NotQuant_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure8Desc = $I->GenerateNameOf("Description_8 NOTquant Multiple ques & Number ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['Question?'];
        $answers         = ['Opt1', 'Opt2', 'Opt3'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
   
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure9_NotQuant_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure9Desc = $I->GenerateNameOf("Description_9 NOTquant Without Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city and program-------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityChCr1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgChCr1");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //---------------------------Create applicant email-------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
//    public function Help_CreateApplicantEmail_RequiresRenewal(\Step\Acceptance\Notification $I) {
//        $subject      = 'subtest';
//        $body         = "emailbbboddy";
//        $programArray = [$this->program1];
//        $trigger      = "Requires renewal";
//        
//        $I->CreateApplicantEmailText($subject, $body, $programArray, $trigger);
//        
//    }
    
    //----------------------------Create checklist------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateChecklistForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesFirst);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Tier2 checklist id: $this->id_checklist");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist));
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("busnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesCount1 = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(12);
    }
    
    /**
     * @group admin
     */
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GoToBusinessViewPage_GetBusiness1Id_1stApplication(AcceptanceTester $I){
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
        $I->canSee("0 / 5 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business1), ['style' => 'width: 0%;']);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTab_1stApplication(AcceptanceTester $I){
        date_default_timezone_set("UTC");
        $lastModifiedDate = "(not set)";
        $recognitionDate  = "(not set)";
        $renewalDate      = "(not set)";
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
        $I->wait(2);
        //First row
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeBusiness1StatusToRequiresRenewal_1stApplication(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(5);
        $I->click(".confirm");
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("0 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("Tier 2", \Page\ApplicationDetails::TierName_BusinessInfoTab(1));
        $I->canSee(\Page\ApplicationDetails::InProcessStatus, \Page\ApplicationDetails::TierStatus_BusinessInfoTab(1));
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSee(Page\AuditGroupList::Energy_AuditGroup, \Page\ApplicationDetails::Category_BusinessInfoTab('1'));
        $I->canSeeElement(\Page\ApplicationDetails::CategoryStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Grey_ProgressStatus);
        $I->canSeeElement(\Page\ApplicationDetails::CategoryAuditStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Grey_ProgressStatus);
        $I->cantSeeElement(\Page\ApplicationDetails::Category_BusinessInfoTab('2'));
        $I->canSeeInField(\Page\ApplicationDetails::$GeneralProgramNotesField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckAnswersInNewApplication_2ndApplication(AcceptanceTester $I){
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 5 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
                                "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
                                "[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure4Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure6Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure7Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure8Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure9Desc), 'no');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnDashboard_2ndApplication(AcceptanceTester $I){
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(3);
        $I->canSee("0 / 5 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business1), ['style' => 'width: 0%;']);
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee("(not set)", \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
        $I->canSee(Page\SectorList::DefaultSectorOfficeRetail, \Page\Dashboard::SectorOfBusiness_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTab_2ndApplication(AcceptanceTester $I){
        $lastModifiedDate1 = "(not set)";
        $recognitionDate1  = "(not set)";
        $renewalDate1      = "(not set)";
        $recognitionDate2  = "(not set)";
        $renewalDate2      = "(not set)";
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
        $I->wait(2);
        //First row
        $I->comment("First row (current applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate2, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate2, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        //Second row (1st application)
        $I->comment("Second row (1st applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDate1, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDate1, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure1_Yes_Answer_2ndApplication(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '20';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for NA business: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("1 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSee("1 of 5 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure8_NA_Answer_2ndApplication(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure8 for NA business: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(3);
        $readonly = $I->grabAttributeFrom(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
        $I->assertEquals('true', $readonly);
        $I->canSee("1 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSee("1 of 5 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTabAfterComplitingMeasures_2ndApplication(AcceptanceTester $I){
        $lastModifiedDate1 = "(not set)";
        $recognitionDate1  = "(not set)";
        $renewalDate1      = "(not set)";
        $recognitionDate2  = "(not set)";
        $renewalDate2      = "(not set)";
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
        $I->wait(2);
        //First row
        $I->comment("First row (current applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate2, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate2, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        //Second row (1st application)
        $I->comment("Second row (1st applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDate1, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDate1, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeBusiness1StatusToRequiresRenewal_2ndApplication(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("1 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("Tier 2", \Page\ApplicationDetails::TierName_BusinessInfoTab(1));
        $I->canSee(\Page\ApplicationDetails::InProcessStatus, \Page\ApplicationDetails::TierStatus_BusinessInfoTab(1));
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSee(Page\AuditGroupList::Energy_AuditGroup, \Page\ApplicationDetails::Category_BusinessInfoTab('1'));
        $I->canSeeElement(\Page\ApplicationDetails::CategoryStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Yellow_ProgressStatus);
        $I->canSeeElement(\Page\ApplicationDetails::CategoryAuditStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Grey_ProgressStatus);
        $I->cantSeeElement(\Page\ApplicationDetails::Category_BusinessInfoTab('2'));
        $I->canSeeInField(\Page\ApplicationDetails::$GeneralProgramNotesField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckAnswersInNewChecklist_3rdApplication(AcceptanceTester $I){
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSee("1 of 5 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
                                "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
                                "[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure4Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure6Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure7Desc), 'no');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure8Desc), 'na');
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure9Desc), 'no');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnDashboard_3rdApplication(AcceptanceTester $I){
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(3);
        $I->canSee("1 / 5 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business1), ['style' => 'width: 20%;']);
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee("(not set)", \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
        $I->canSee(Page\SectorList::DefaultSectorOfficeRetail, \Page\Dashboard::SectorOfBusiness_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTab_3rdApplication(AcceptanceTester $I){
        $recognitionDate1  = "(not set)";
        $renewalDate1      = "(not set)";
        $recognitionDate2  = "(not set)";
        $renewalDate2      = "(not set)";
        $lastModifiedDate3 = "(not set)";
        $recognitionDate3  = "(not set)";
        $renewalDate3      = "(not set)";
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
        $I->wait(2);
        //First row
        $I->comment("First row (current applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate1, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate1, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        //Second row (2nd application)
        $I->comment("Second row (2nd applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDate2, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDate2, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        //Third row (1st application)
        $I->comment("Third row (1st applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($lastModifiedDate3, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDate3, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDate3, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure4(AcceptanceTester $I) {
        $measDesc  = $this->measure4Desc;
        $totalOpt1 = '25';
                
        $I->wait(1);
        $I->comment("Complete Measure4 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->click(Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->selectOption(Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2('1'), $this->thermName);
        $I->wait(1);
        $I->fillField(Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2('1'), '25');
        $I->wait(3);
        $I->click(\Page\BusinessChecklistView::$ThermsPopup_SaveChangesButton);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure5(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure5 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(4);
        $I->click(Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $I->wait(3);
        $I->selectOption(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('1'), '5');
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureQuantityField('1'), '4');
        $I->fillField(\Page\BusinessChecklistView::LightingPopup_ExistingFixtureQuantityField('1'), '4');
        $I->wait(3);
        $I->click(Page\BusinessChecklistView::$LightingPopup_SaveChangesButton);
        $I->wait(3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure6(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->wait(1);
        $I->comment("Complete Measure6 fand save.");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->makeElementVisible(["[data-measure_id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\BusinessChecklistView::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(6);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $before), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $before), '4');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $before), '10');
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'DUMPSTER');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $after), '6');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $after), '5');
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(2);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(3);
    }
}
