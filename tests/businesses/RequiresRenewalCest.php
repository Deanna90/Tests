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
    
    public $measure7Desc,  $idMeasure7;
    public $measure8Desc,  $idMeasure8;
    public $measure9Desc,  $idMeasure9;
    public $measure10Desc, $idMeasure10;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $county;
    public $statusesDefault           = ['not set',  'not set',  'not set', 'not set',  'not set',  'not set',  'not set',  'not set',  'not set',  'not set'];
    public $statusesFirst             = ['core',     'elective', 'core', 'elective',  'core', 'elective',  'core', 'elective',  'core', 'core'];
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
        $I->amOnPage(Page\AuditSubgroupList::URL());
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
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    //---------------------------Create popup therm option----------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NationalAdmin1_5_3_PopupThermOptionCreate(Step\Acceptance\PopupThermOption $I)
    {
        $name        = $this->thermName = $I->GenerateNameOf("therm");
        $thermsCount = $this->thermCount = '5';
                
        $I->CreateThermOption($name, $thermsCount);
    }
    
    //---------------------------Create State Admin-----------------------------
    
    /**
     * @group stateadmin
     */
    
    public function CreateStateAdmin_ForCreatedState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
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
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, null, null,
                            null, null, null, null, $sectorArray);
        $I->amOnPage(Page\MeasureList::URL());
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
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null,
                            null, null, null, null, null, $sectorArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure3_Quant_MultipleQuestionAndNumberSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3 quant Multiple Quest & Number Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['What?', "Where?", "Who?"];
        $answers        = ['Grey', 'Green', 'Red'];
        $reamOrLbs      = ['lbs', 'ream', "ream"];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, null, null, 
                            null, null, null, $reamOrLbs);
        $I->amOnPage(Page\MeasureList::URL());
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
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null,
                            null, null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
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
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null,
                            null, null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
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
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null,
                            null, null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
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
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, null, null,
                            null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
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
        $desc            = $this->measure8Desc = $I->GenerateNameOf("Description_8 NOTquant Multiple ques Number ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['Question1?', 'Question2?', 'Question3?'];
        $answers         = ['Opt1', 'Opt2', 'Opt3'];
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, null, null,
                            null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
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
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null,
                            null, null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure10_Quant_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure10Desc = $I->GenerateNameOf("Description_10 quant Waste Diversion Popup 2 Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $sectorArray    = [Page\SectorList::DefaultSectorOfficeRetail];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null,
                            null, null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure10 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
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
    
    //----------------------------Create Coordinator----------------------------
    
    /**
     * @group coordinator
     */
    
    public function CreateCoordinatorUser_ForProgram2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator = $coordinator['id'];
    }
    
    //----------------------------Create checklist------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statusesFirst);
        $I->PublishSectorChecklistStatus();
    }
    
    /**
     * @group coordinator
     */
//    
//    public function LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
//    }
    
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
    
    
    
//    public function Help_CreateChecklistForTier2(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
//        $programDestination = $this->program1;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statusesFirst);
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist));
//        $I->PublishChecklistStatus($this->id_checklist);
//    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
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
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     */
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin6(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator6(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GoToBusinessViewPage_GetBusiness1Id_1stApplication(AcceptanceTester $I){
//        $I->wait(1);
//        $I->SelectDefaultState($I, $this->state);
//        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business1 = $u1[1];
        $I->comment("Business1 id: $this->id_business1");
        $I->canSee("0 / 6 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business1), ['style' => 'width: 0%;']);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTab_1stApplication(AcceptanceTester $I){
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
        $lastModifiedDate = "(not set)";
        $recognitionDate  = "(not set)";
        $renewalDate      = "(not set)";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
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
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        
        $I->cantSee(\Page\BusinessChecklistView::RequiresRenewalStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->cantSee(\Page\BusinessChecklistView::RecertifyStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("0 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
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
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->canSee("0 Tier 2 measures completed. A minimum of 6 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 6 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
                                "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
                                "[data-measure-id=$this->idMeasure9]", "[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
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
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure10Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure10Desc), 'no');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnDashboard_2ndApplication(AcceptanceTester $I){
        $I->amOnPage(Page\Dashboard::URL());
        $I->canSee("0 / 6 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business1));
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
        
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
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
    
    public function CheckAllMeasures_Submeasures_Answers_2ndApplication(AcceptanceTester $I){
        $I->comment("Check: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
               "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
               "[data-measure-id=$this->idMeasure9]", "[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'no');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '2'), '');
        $I->canSee('question1', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '1'));
        $I->canSee('question2', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'no');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure2Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'no');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '1'), 'Grey');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '2'), 'Grey');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '3'), 'Grey');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '2'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '3'), '');
        $I->canSee('What?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '1'));
        $I->canSee('Where?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '2'));
        $I->canSee('Who?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure4Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure4Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure5Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure5Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure6Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure7Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '3'));
        $I->canSee('ques1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSee('ques2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSee('ques3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure8Desc), 'no');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '1'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '2'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '3'), 'Opt1');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '2'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '3'), '');
        $I->canSee('Question1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '1'));
        $I->canSee('Question2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '2'));
        $I->canSee('Question3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure9Desc), 'no');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure9Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure10Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure10Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '3'));
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     * @group uploadFile
     */
    
    public function UploadFile_Measure2_2ndApplication(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
        $I->comment("Upload File To Measure2 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->attachFile(\Page\BusinessChecklistView::UploadInput_ByDesc($measDesc), 'report.xlsx');
        $I->wait(5);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\BusinessChecklistView::UploadButton_ByDesc($measDesc));
        $I->canSee('report.xlsx', \Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
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
                
        $I->comment("Complete Measure1 for NA business: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
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
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 Tier 2 measures completed. A minimum of 6 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 16%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 17%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 17%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 17%;']);
        $I->canSee("1 of 6 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     * @group uploadFile
     */
    
    public function UploadFile_Measure1_2ndApplication(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Upload File To Measure1 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->attachFile(\Page\BusinessChecklistView::UploadInput_ByDesc($measDesc), 'report.xlsx');
        $I->wait(5);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\BusinessChecklistView::UploadButton_ByDesc($measDesc));
        $I->canSee('report.xlsx', \Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure8_NA_Answer_2ndApplication(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->comment("Complete Measure8 for NA business: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $readonly = $I->grabAttributeFrom(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
        $I->assertSame("true", "$readonly");
        $I->canSee("1 Tier 2 measures completed. A minimum of 6 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 16%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 17%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 17%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 17%;']);
        $I->canSee("1 of 6 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure10_Yes_YesToSmallPopupSubmeasure_2ndApplication(AcceptanceTester $I) {
        $measDesc = $this->measure10Desc;
        $paper    = '25';
        $bottles  = '55';
        $compost  = '46';
        
        $I->comment("Complete Measure10 fand save.");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '2'));
        $I->wait(15);
        $I->executeJS('$(".modal.in [name=all_paper_percent]").val("25");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=bottles_cans_percent]").val("55");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=compost_percent]").val("46");'); 
        $I->wait(2);
//        $I->fillField(Page\BusinessChecklistView::$WasteDiversionPopup_NO_AllPaperInput, $paper);
//        $I->wait(1);
//        $I->fillField(Page\BusinessChecklistView::$WasteDiversionPopup_NO_BottlesAndCansInput, $bottles);
//        $I->wait(1);
//        $I->fillField(Page\BusinessChecklistView::$WasteDiversionPopup_NO_CompostInput, $compost);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_SaveButton);
        $I->wait(3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure10_Savings_2ndApplications(AcceptanceTester $I) {
        $measDesc           = $this->measure10Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -52801.840045955 lbs of waste\ndaily: -144.66257546837 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
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
        
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
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
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        
        $I->cantSee(\Page\BusinessChecklistView::RequiresRenewalStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->cantSee(\Page\BusinessChecklistView::RecertifyStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("2 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
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
    
    public function CheckAllMeasures_Submeasures_Answers_3rdApplication(AcceptanceTester $I){
        $I->comment("Check: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
               "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
               "[data-measure-id=$this->idMeasure9]", "[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '1'), '10');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '2'), '20');
        $I->canSee('question1', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '1'));
        $I->canSee('question2', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'no');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure2Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'no');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '1'), 'Grey');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '2'), 'Grey');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '3'), 'Grey');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '2'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '3'), '');
        $I->canSee('What?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '1'));
        $I->canSee('Where?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '2'));
        $I->canSee('Who?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure4Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure4Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure5Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure5Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure6Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure7Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '3'));
        $I->canSee('ques1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSee('ques2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSee('ques3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure8Desc), 'na');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '1'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '2'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '3'), 'Opt1');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '2'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '3'), '');
        $I->canSee('Question1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '1'));
        $I->canSee('Question2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '2'));
        $I->canSee('Question3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure9Desc), 'no');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure9Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure10Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure10Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '3'));
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckAnswersInNewChecklist_3rdApplication(AcceptanceTester $I){
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->canSee("2 Tier 2 measures completed. A minimum of 6 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 33%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 34%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 34%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 34%;']);
        $I->canSee("2 of 6 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("2 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
                                "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
                                "[data-measure-id=$this->idMeasure9]", "[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
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
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure10Desc));
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure10Desc), 'yes');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnDashboard_3rdApplication(AcceptanceTester $I){
        $I->amOnPage(Page\Dashboard::URL());
        $I->canSee("2 / 6 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business1), ['style' => 'width: 33%;']);
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
        
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
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
    
    public function CheckPopupData_Measure10_3rdApplication(AcceptanceTester $I) {
        $measDesc = $this->measure10Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->comment("Check Measure10 popup data");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '2'));
        $I->wait(15);
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_AllPaperProgressBar.'[style="width: 25%;"]');
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_BottlesAndCansProgressBar.'[style="width: 55%;"]');
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_CompostProgressBar.'[style="width: 46%;"]');
        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure10_Savings_3rdApplications(AcceptanceTester $I) {
        $measDesc           = $this->measure10Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual:  -52801.840045955 lbs of waste\ndaily: -144.66257546837 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     * @group uploadFile
     */
    
    public function UploadFile_Measure4_3rdApplication(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->comment("Upload File To Measure4 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->attachFile(\Page\BusinessChecklistView::UploadInput_ByDesc($measDesc), 'report.xlsx');
        $I->wait(5);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\BusinessChecklistView::UploadButton_ByDesc($measDesc));
        $I->canSee('report.xlsx', \Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     * @group uploadFile
     */
    
    public function UploadFile_Measure5_3rdApplication(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->comment("Upload File To Measure5 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->attachFile(\Page\BusinessChecklistView::UploadInput_ByDesc($measDesc), 'report.xlsx');
        $I->wait(5);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\BusinessChecklistView::UploadButton_ByDesc($measDesc));
        $I->canSee('report.xlsx', \Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
    }
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure4_3rdApplication(AcceptanceTester $I) {
        $measDesc  = $this->measure4Desc;
        $totalOpt1 = '25';
        $sum       = '125';
                
        $I->comment("Complete Measure4 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->click(Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(4);
        $I->waitForElement(Page\BusinessChecklistView::ThermsPopup, 50);
        $I->wait(1);
        $I->selectOption(Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2('1'), $this->thermName);
        $I->wait(1);
        $I->fillField(Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2('1'), '25');
        $I->wait(6);
        $I->canSeeInField(Page\BusinessChecklistView::$ThermsPopup_TotalReadonlyField, $sum);
        $I->click(\Page\BusinessChecklistView::$ThermsPopup_SaveChangesButton);
        $I->wait(3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure5_3rdApplication(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $sum = '138.88';
                
        $I->comment("Complete Measure5 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(4);
        $I->selectOption(\Page\BusinessChecklistView::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $I->wait(3);
        $I->selectOption(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('1'), '5');
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureQuantityField('1'), '4');
        $I->fillField(\Page\BusinessChecklistView::LightingPopup_ExistingFixtureQuantityField('1'), '4');
        $I->wait(3);
        $I->canSeeInField(Page\BusinessChecklistView::LightingPopup_EnergySavingsField('1'), $sum);
        $I->click(Page\BusinessChecklistView::$LightingPopup_SaveChangesButton);
        $I->wait(3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure5_Savings_3rdApplications(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 138.88000488281 kWh\ndaily: 0.3804931640625 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure6_3rdApplication(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->comment("Complete Measure6 fand save.");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
//        $I->makeElementVisible(["[data-measure_id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(5);
        $I->click(\Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
//        $I->wait(3);
//        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->waitPageLoad();
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
//        $I->wait(3);
//        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
//        $I->wait(2);
//        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $before), '32 gallons');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $before), '4');
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $before), '7x / week');
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'DUMPSTER');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $after), '6');
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $after), '5x / week');
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure6_Savings_3rdApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure6Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -40867.929681485 lbs of waste\ndaily: -111.96693063421 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTabAfterComplitingMeasures_3rdApplication(AcceptanceTester $I){
        $lastModifiedDate1 = "(not set)";
        $recognitionDate1  = "(not set)";
        $renewalDate1      = "(not set)";
        $recognitionDate2  = "(not set)";
        $renewalDate2      = "(not set)";
        $recognitionDate3  = "(not set)";
        $renewalDate3      = "(not set)";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
        //First row
        $I->comment("First row (current applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate3, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate3, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        //Second row (1st application)
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
        $I->canSee($lastModifiedDate1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDate1, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDate1, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    /////////////////////////////////////////////////////////////////////////////
    public function ChangeBusiness1StatusToRecognized_3rdApplication(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->waitForElement(".modal.in", 200);
        $I->wait(1);
        $I->click(".modal.in .close");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::RecognizedStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("3 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("Tier 2", \Page\ApplicationDetails::TierName_BusinessInfoTab(1));
        $I->cantSeeElement(\Page\ApplicationDetails::TierStatus_BusinessInfoTab(1));
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
    
    public function ChangeBusiness1StatusToRecertify_3rdApplication(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecertifyStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->cantSee(\Page\BusinessChecklistView::RequiresRenewalStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(5);
        $I->waitForElement(".modal.in", 120);
        $I->wait(1);
        $I->canSee("Send Message");
        $I->canSee("Create Communication");
        $I->canSee("Subject");
        $I->canSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".modal.in .close");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::RecertifyingStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("3 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
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
    
    public function CheckAllMeasures_Submeasures_Answers_4thApplication(AcceptanceTester $I){
        $I->comment("Check: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
               "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
               "[data-measure-id=$this->idMeasure9]", "[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '1'), '10');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '2'), '20');
        $I->canSee('question1', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '1'));
        $I->canSee('question2', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'no');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure2Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'no');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '1'), 'Grey');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '2'), 'Grey');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '3'), 'Grey');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '2'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '3'), '');
        $I->canSee('What?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '1'));
        $I->canSee('Where?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '2'));
        $I->canSee('Who?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure4Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure4Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure5Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure5Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure6Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure7Desc), 'no');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '3'));
        $I->canSee('ques1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSee('ques2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSee('ques3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure8Desc), 'na');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '1'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '2'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '3'), 'Opt1');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '2'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '3'), '');
        $I->canSee('Question1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '1'));
        $I->canSee('Question2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '2'));
        $I->canSee('Question3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure9Desc), 'no');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure9Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure10Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure10Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '3'));
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure4_4thApplication(AcceptanceTester $I) {
        $measDesc  = $this->measure4Desc;
        $totalOpt1 = '25';
        $thermsSum = '125';
                
        $I->comment("Check Measure4 popup data");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(4);
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2('1'), $this->thermName);
        $I->canSeeInField(Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2('1'), '25');
        $I->canSeeInField(Page\BusinessChecklistView::$ThermsPopup_TotalReadonlyField, $thermsSum);
//        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure4_Savings_4thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 125 therms of natural gas per year\ndaily: 0.34246575342466 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure5_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $sum = '138.88';
                
        $I->comment("Check Measure5 popup data");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(4);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $selected = $I->grabTextFrom(Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('1').">option:nth-of-type(5)");
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('1'), $selected);
//        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('0'), '5');
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureQuantityField('0'), '4');
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_ExistingFixtureQuantityField('0'), '4');
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_EnergySavingsField('0'), $sum);
//        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure5_Savings_4thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 138.88000488281 kWh\ndaily: 0.3804931640625 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdatePopup_Measure5(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $sum = '793.6';
                
        $I->comment("Update Measure5 popup and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(5);
        $I->click(\Page\BusinessChecklistView::$LightingPopup_AddOptionButton);
        $I->wait(4);
        $I->selectOption(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('2'), '2');
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureQuantityField('2'), '60');
        $I->fillField(\Page\BusinessChecklistView::LightingPopup_ExistingFixtureQuantityField('2'), '56');
        $I->wait(3);
        $I->canSeeInField(Page\BusinessChecklistView::LightingPopup_EnergySavingsField('2'), $sum);
        $I->click(Page\BusinessChecklistView::$LightingPopup_SaveChangesButton);
        $I->wait(3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure5_Savings_4thApplication_AfterUpdate(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 932.47998046875 kWh\ndaily: 2.5547396725171 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure6_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->comment("Check Measure6 popup data");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->makeElementVisible([\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $before)], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $before), '32 gallons');
        $I->canSeeInField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $before), '4');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $before), '7x / week');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $before), 'no');
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        $I->makeElementVisible([\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $after)], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CommoditySelect('1', $after), 'Cardboard');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'DUMPSTER');
        $I->canSeeInField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $after), '6');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $after), '5x / week');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $after), 'yes');
//        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure6_Savings_4thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure6Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -40867.929681485 lbs of waste\ndaily: -111.96693063421 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure10_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure10Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->comment("Check Measure10 popup data");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '2'));
        $I->wait(15);
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_AllPaperProgressBar.'[style="width: 25%;"]');
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_BottlesAndCansProgressBar.'[style="width: 55%;"]');
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_CompostProgressBar.'[style="width: 46%;"]');
        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure10_Savings_4thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure10Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -52801.840045955 lbs of waste\ndaily: -144.66257546837 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure7_Yes_Answer_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->click(\Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '3'));
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("4 Tier 2 measures completed. A minimum of 6 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 66%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 67%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 67%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 67%;']);
        $I->canSee("4 of 6 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("4 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure9_Yes_Answer_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
                
        $I->comment("Complete Measure9 for business: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("5 Tier 2 measures completed. A minimum of 6 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 83%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 84%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 84%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 84%;']);
        $I->canSee("5 of 6 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("5 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure3_Yes_Answer_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '77';
        $value2   = '2';
        $value3   = '12';
        $option1  = 'Red';
        $option2  = 'Green';
        $option3  = 'Grey';
                
        $I->comment("Complete Measure3 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($measDesc, '1'), $option1);
        $I->selectOption(\Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($measDesc, '2'), $option2);
        $I->selectOption(\Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($measDesc, '3'), $option3);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '3'), $value3);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("6 Tier 2 measures completed. A minimum of 6 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 4 Measures", \Page\BusinessChecklistView::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("6 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     * @group uploadFile
     */
    
    public function DeleteUploadedFile_Measure2_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
        $I->comment("Delete Uploaded File To Measure2 and save.");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->click(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->wait(3);
        $I->canSeeInPopup("Are you sure you want to delete this?");
        $I->acceptPopup();
        $I->wait(3);
        $I->canSeeElement(\Page\BusinessChecklistView::UploadButton_ByDesc($measDesc));
        $I->cantSeeElement(\Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::UploadButton_ByDesc($measDesc));
        $I->cantSeeElement(\Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     * @group uploadFile
     */
    
    public function UploadFile_OneMoreTime_Measure2_4thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
        $I->comment("Upload File One more time To Measure2 and save.");
        $I->attachFile(\Page\BusinessChecklistView::UploadInput_ByDesc($measDesc), 'image2.png');
        $I->wait(5);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee('image2.png', \Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::UploadButton_ByDesc($measDesc));
        $I->cantSeeElement(\Page\BusinessChecklistView::UploadedFile_ByDesc($measDesc, '2'));
        $I->cantSeeElement(\Page\BusinessChecklistView::ViewButton_UploadedFile_ByDesc($measDesc, '2'));
        $I->cantSeeElement(\Page\BusinessChecklistView::DeleteButton_UploadedFile_ByDesc($measDesc, '2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTabAfterComplitingMeasures_4thApplication(AcceptanceTester $I){
        $lastModifiedDate1 = "(not set)";
        $recognitionDate1  = "(not set)";
        $renewalDate1      = "(not set)";
        $recognitionDate2  = "(not set)";
        $renewalDate2      = "(not set)";
        $Renew             = strtotime("+1 year", strtotime($this->todayDate));
        $recognitionDate3  = $this->todayDate;
        $renewalDate3      = date("m/d/Y", $Renew);
        $recognitionDate4  = "(not set)";
        $renewalDate4      = "(not set)";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
        //First row
        $I->comment("First row (current applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecertifyingStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate4, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate4, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        //Second row (3rd application)
        $I->comment("Second row (3rd applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDate3, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDate3, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        //Third row (2nd application)
        $I->comment("Third row (2nd applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDate2, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDate2, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
        //Fourth row (1st application)
        $I->comment("Third row (1st applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('4'));
        $I->canSee($lastModifiedDate1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('4'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('4'));
        $I->canSee($recognitionDate1, Page\ApplicationDetails::RecognitionLine_RecordsTab('4'));
        $I->canSee($renewalDate1, Page\ApplicationDetails::RenewalLine_RecordsTab('4'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('4'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business_ChangeStatusToRecertify_PressOnRequiresNewChecklistButton_4thApplication(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresNewChecklistStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 200);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(10);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::RecertifyingStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("6 of 6 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("Tier 2", \Page\ApplicationDetails::TierName_BusinessInfoTab(1));
        $I->canSee('(NOT SET)', \Page\ApplicationDetails::TierStatus_BusinessInfoTab(1));
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSee(Page\AuditGroupList::Energy_AuditGroup, \Page\ApplicationDetails::Category_BusinessInfoTab('1'));
        $I->canSeeElement(\Page\ApplicationDetails::CategoryStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Green_ProgressStatus);
        $I->canSeeElement(\Page\ApplicationDetails::CategoryAuditStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Grey_ProgressStatus);
        $I->cantSeeElement(\Page\ApplicationDetails::Category_BusinessInfoTab('2'));
        $I->canSeeInField(\Page\ApplicationDetails::$GeneralProgramNotesField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckAllMeasures_Submeasures_Answers_5thApplication(AcceptanceTester $I){
        $I->comment("Check: $this->business1");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]", "[data-measure-id=$this->idMeasure2]", "[data-measure-id=$this->idMeasure3]", "[data-measure-id=$this->idMeasure4]",
               "[data-measure-id=$this->idMeasure5]", "[data-measure-id=$this->idMeasure6]", "[data-measure-id=$this->idMeasure7]", "[data-measure-id=$this->idMeasure8]",
               "[data-measure-id=$this->idMeasure9]", "[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure1Desc), 'yes');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '1'), '10');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure1Desc, '2'), '20');
        $I->canSee('question1', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '1'));
        $I->canSee('question2', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure1Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure2Desc), 'no');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure2Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure3Desc), 'yes');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '1'), 'Red');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '2'), 'Green');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure3Desc, '3'), 'Grey');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '1'), '77');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '2'), '2');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure3Desc, '3'), '12');
        $I->canSee('What?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '1'));
        $I->canSee('Where?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '2'));
        $I->canSee('Who?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure3Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure4Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure4Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure4Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure4Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure5Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure5Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '1'));
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure5Desc, '2'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure5Desc, '2'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure6Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure6Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure6Desc, '3'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure7Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure7Desc, '3'));
        $I->canSee('ques1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '1'));
        $I->canSee('ques2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '2'));
        $I->canSee('ques3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure7Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure8Desc), 'na');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '1'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '2'), 'Opt1');
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::SubmeasureSelect_ByMeasureDesc($this->measure8Desc, '3'), 'Opt1');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '1'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '2'), '');
        $I->canSeeInField(Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($this->measure8Desc, '3'), '');
        $I->canSee('Question1?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '1'));
        $I->canSee('Question2?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '2'));
        $I->canSee('Question3?', Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure8Desc, '4'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure9Desc), 'yes');
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure9Desc, '1'));
        
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->canSeeElement(Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure10Desc));
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($this->measure10Desc), 'yes');
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_NO_2Items_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '1'));
        $I->canSee("I pay the waste collection bill for my business", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '1'));
        
        $I->canSeeElement(\Page\BusinessChecklistView::SubmeasureToggleButton_YES_2Items_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '2'));
        $I->canSee("Waste collection costs are included in my rent", Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '2'));
        
        $I->cantSeeElement(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($this->measure10Desc, '3'));
        $I->cantSeeElement(Page\BusinessChecklistView::Submeasure_ByMeasureDesc($this->measure10Desc, '3'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRecordsTabAfterComplitingMeasures_5thApplication(AcceptanceTester $I){
        $lastModifiedDate1 = "(not set)";
        $recognitionDate1  = "(not set)";
        $renewalDate1      = "(not set)";
        $recognitionDate2  = "(not set)";
        $renewalDate2      = "(not set)";
        $Renew             = strtotime("+1 year", strtotime($this->todayDate));
        $recognitionDate3  = $this->todayDate;
        $renewalDate3      = date("m/d/Y", $Renew);
        $recognitionDate4  = "(not set)";
        $renewalDate4      = "(not set)";
        $recognitionDate5  = "(not set)";
        $renewalDate5      = "(not set)";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->id_business1));
        //First row
        $I->comment("First row (current applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecertifyingStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate5, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate5, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        //Second row (4th application)
        $I->comment("Second row (4th applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDate4, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDate4, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        //Third row (3rd application)
        $I->comment("Third row (3rd applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDate3, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDate3, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
        //Fourth row (2nd application)
        $I->comment("Fourth row (2nd applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('4'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('4'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('4'));
        $I->canSee($recognitionDate2, Page\ApplicationDetails::RecognitionLine_RecordsTab('4'));
        $I->canSee($renewalDate2, Page\ApplicationDetails::RenewalLine_RecordsTab('4'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('4'));
        //Fifth row (1st application)
        $I->comment("Fifth row (1st applicaton):");
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('5'));
        $I->canSee($lastModifiedDate1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('5'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('5'));
        $I->canSee($recognitionDate1, Page\ApplicationDetails::RecognitionLine_RecordsTab('5'));
        $I->canSee($renewalDate1, Page\ApplicationDetails::RenewalLine_RecordsTab('5'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('5'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure4_5thApplication(AcceptanceTester $I) {
        $measDesc  = $this->measure4Desc;
        $totalOpt1 = '25';
        $thermsSum = '125';
                
        $I->comment("Check Measure4 popup data");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2('1'), $this->thermName);
        $I->canSeeInField(Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2('1'), '25');
        $I->canSeeInField(Page\BusinessChecklistView::$ThermsPopup_TotalReadonlyField, $thermsSum);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure4_Savings_5thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 125 therms of natural gas per year\ndaily: 0.34246575342466 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure5_5thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $sum1 = '138.88';
        $sum2 = '793.6';
                
        $I->comment("Check Measure5 popup data");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $selected = $I->grabTextFrom(Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('0').">option:nth-of-type(6)");
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('0'), $selected);
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureQuantityField('0'), '4');
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_ExistingFixtureQuantityField('0'), '4');
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_EnergySavingsField('0'), $sum1);
        $I->wait(1);
        $selected2 = $I->grabTextFrom(Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('1').">option:nth-of-type(3)");
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureSelect('1'), $selected2);
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_ReplacementFixtureQuantityField('1'), '60');
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_ExistingFixtureQuantityField('1'), '56');
        $I->canSeeInField(\Page\BusinessChecklistView::LightingPopup_EnergySavingsField('1'), $sum2);
//        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure5_Savings_5thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 932.47998046875 kWh\ndaily: 2.5547396725171 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure6_5thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->comment("Check Measure6 popup data");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->makeElementVisible([\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $before)], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $before), '32 gallons');
        $I->canSeeInField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $before), '4');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $before), '7x / week');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $before), 'no');
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        $I->makeElementVisible([\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $after)], $style = 'visibility');
        $I->wait(3);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CommoditySelect('1', $after), 'Cardboard');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'DUMPSTER');
        $I->canSeeInField(\Page\BusinessChecklistView::WasteDiversionPopup_ContainersField('1', $after), '6');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CollectionPerWeekField('1', $after), '5x / week');
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::WasteDiversionPopup_CompactedToggleButtonSelect('1', $after), 'yes');
//        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure6_Savings_5thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure6Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -40867.929681485 lbs of waste\ndaily: -111.96693063421 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckPopupData_Measure10_5thApplication(AcceptanceTester $I) {
        $measDesc = $this->measure10Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->comment("Check Measure10 popup data");
        $I->amOnPage(Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::SubmeasureLink_ByMeasureDesc($measDesc, '2'));
        $I->wait(15);
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_AllPaperProgressBar.'[style="width: 25%;"]');
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_BottlesAndCansProgressBar.'[style="width: 55%;"]');
        $I->canSeeElement(\Page\BusinessChecklistView::$WasteDiversionPopup_NO_CompostProgressBar.'[style="width: 46%;"]');
//        $I->wait(1);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure10_Savings_5thApplication(AcceptanceTester $I) {
        $measDesc           = $this->measure10Desc;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -52801.840045955 lbs of waste\ndaily: -144.66257546837 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
}
