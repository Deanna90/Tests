<?php


class CoordinatorUpdateAuditorsAndInspectorsCest
{
    public $state, $program1, $program2, $idState, $county, $idCity1, $idCity2, $idProg2, $sector1, $sector2, $sector3, $city1, $city2, $zip1, $zip2;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy, $audSubgroup2_Energy, $id_audSubgroup2_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste, $audSubgroup2_SolidWaste, $id_audSubgroup2_SolidWaste;
    public $audSubgroup1_PollutionPrevention, $id_audSubgroup1_PollutionPrevention;
    public $audSubgroup1_Water, $id_audSubgroup1_Water;
    public $complCheck1, $complCheck2, $complCheck3_Created, $complCheck4;
    public $idMeasure1_En1, $measure1Desc_En1, $idMeasure2_En2, $measure2Desc_En2, $idMeasure3_Pol1, $measure3Desc_Pol1, $idMeasure4_Wat1, $measure4Desc_Wat1, $idMeasure5_Sol1, $measure5Desc_Sol1; 
    public $measuresDesc_SuccessCreated = [];
    public $checklistUrl1, $id_checklist1, $checklistUrl2, $id_checklist2;
    public $statuses1                  = ['core', 'elective', 'core', 'core'];
    public $statuses2                  = ['elective', 'elective', 'not set', 'core'];
    public $business1, $id_bus1, $email_Business1, $firstName_Business1, $lastName_Business1, $phone_Business1;
    public $business2, $id_bus2, $email_Business2, $firstName_Business2, $lastName_Business2, $phone_Business2;
    
    public $auditOrganiz_1_En_Gen_Sol_Wat, $auditOrganiz_2_En_Pol_Sol_Wat, $auditOrganiz_1_2_Pol_Gen_Sol_Wat, $auditOrganiz_WithoutProgram_En_Pol_Gen_Sol,
           $auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol;
    public $inspOrganiz_1_C1_C2_C3_C4, $inspOrganiz_2_C1_C2, $inspOrganiz_1_2_C2_C4, $inspOrganiz_WithoutProgram_C1_C2_C3_C4,
           $inspOrganiz_WithoutInspectors_C1_C2_C3_C4;
    
    public $emailCoordinator1_Prog1, $emailCoordinator2_Prog2, $emailCoordinator3_Prog1_Prog2, $emailCoordinator4_WithoutProgram, $emailCoordinator5_WithoutState, 
           $emailInspector1_Prog1, $emailInspector2_Prog2, $emailInspector3_Prog1_Prog2, $emailInspector4_WithoutProgram, $emailInspector5_WithoutState,
           $emailAuditor1_Prog1, $emailAuditor2_Prog2, $emailAuditor3_Prog1_Prog2, $emailAuditor4_WithoutProgram, $emailAuditor5_WithoutState;
    
    public $firstName_Coordinator1_Prog1, $firstName_Coordinator2_Prog2, $firstName_Coordinator3_Prog1_Prog2, $firstName_Coordinator4_WithoutProgram, $firstName_Coordinator5_WithoutState,
           $firstName_Inspector1_Prog1, $firstName_Inspector2_Prog2, $firstName_Inspector3_Prog1_Prog2, $firstName_Inspector4_WithoutProgram, $firstName_Inspector5_WithoutState,
           $firstName_Auditor1_Prog1, $firstName_Auditor2_Prog2, $firstName_Auditor3_Prog1_Prog2, $firstName_Auditor4_WithoutProgram, $firstName_Auditor5_WithoutState;
    
    public $lastName_Coordinator1_Prog1, $lastName_Coordinator2_Prog2, $lastName_Coordinator3_Prog1_Prog2, $lastName_Coordinator4_WithoutProgram, $lastName_Coordinator5_WithoutState,
           $lastName_Inspector1_Prog1, $lastName_Inspector2_Prog2, $lastName_Inspector3_Prog1_Prog2, $lastName_Inspector4_WithoutProgram, $lastName_Inspector5_WithoutState,
           $lastName_Auditor1_Prog1, $lastName_Auditor2_Prog2, $lastName_Auditor3_Prog1_Prog2, $lastName_Auditor4_WithoutProgram, $lastName_Auditor5_WithoutState;
    
    public $fullName_Inspector1_Prog1, $fullName_Inspector2_Prog2, $fullName_Inspector3_Prog1_Prog2, $fullName_Inspector4_WithoutProgram, $fullName_Inspector5_WithoutState,
           $fullName_Auditor1_Prog1, $fullName_Auditor2_Prog2, $fullName_Auditor3_Prog1_Prog2, $fullName_Auditor4_WithoutProgram, $fullName_Auditor5_WithoutState;
    
    public $idCoordinator1_Prog1, $idCoordinator2_Prog2, $idCoordinator3_Prog1_Prog2, $idCoordinator4_WithoutProgram, $idCoordinator5_WithoutState, 
           $idInspector1_Prog1, $idInspector2_Prog2, $idInspector3_Prog1_Prog2, $idInspector4_WithoutProgram, $idInspector5_WithoutState, 
           $idAuditor1_Prog1, $idAuditor2_Prog2, $idAuditor3_Prog1_Prog2, $idAuditor4_WithoutProgram, $idAuditor5_WithoutState;
    
    public $phone_Coordinator1_Prog1, $phone_Coordinator2_Prog2, $phone_Coordinator3_Prog1_Prog2, $phone_Coordinator4_WithoutProgram, $phone_Coordinator5_WithoutState, 
           $phone_Inspector1_Prog1, $phone_Inspector2_Prog2, $phone_Inspector3_Prog1_Prog2, $phone_Inspector4_WithoutProgram, $phone_Inspector5_WithoutState, 
           $phone_Auditor1_Prog1, $phone_Auditor2_Prog2, $phone_Auditor3_Prog1_Prog2, $phone_Auditor4_WithoutProgram, $phone_Auditor5_WithoutState;
    
    public $password = 'Qq!1111111';
    //--------------------------------------------------------------------------Login As National Admin------------------------------------------------------------------------------------
    
    public function Help_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StCoord&AudInsp");
        $shortName = 'UA';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
    }
    
   
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    //-------------------------------Create county------------------------------
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //------------------State Admin create Cities & Programs--------------------
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityAccess1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgAccess1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityAccess2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgAccess2");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
        $cit = $I->GetCityOnPageInList($city);
        $this->idCity2 = $cit['id'];
        $prog = $Y->GetProgramOnPageInList($program);
        $this->idProg2 = $prog['id'];
    }
    
    //--------------------------Create audit subgroups--------------------------
    
    
    public function Help_CreateAuditSubGroupForEnergyGroup_1(\Step\Acceptance\AuditSubGroup $I)
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
    
    public function Help_CreateAuditSubGroupForEnergyGroup_2(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_Energy = $I->GenerateNameOf("EnAudSub2");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup2_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForSolidWasteGroup_1(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForSolidWasteGroup_2(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_SolidWaste = $I->GenerateNameOf("SolAudSub2");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup2_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForPollutionPreventionGroup_1(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_PollutionPrevention = $I->GenerateNameOf("PollutAudSub1");
        $auditGroup = Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_PollutionPrevention = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForWaterGroup_1(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Water = $I->GenerateNameOf("WaterAudSub1");
        $auditGroup = Page\AuditGroupList::Water_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_Water = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    //------------------------Create compliance check type----------------------
    public function Help_ComplianceCheckTypeCreate(\Step\Acceptance\ComplianceCheckType $I)
    {
        $name            = $this->complCheck3_Created = $I->GenerateNameOf("New ComplianceCheck ");
                
        $I->wait(1);
        $I->CreateComplianceCheckType($name);
        $comp = $I->GetComplianceCheckTypeOnPageInList($name);
        $I->amOnPage(Page\ComplianceCheckTypeList::URL());
        $I->wait(2);
        $this->complCheck1 = $I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine(2));
        $this->complCheck2 = $I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine(4));
        $this->complCheck4 = $I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine(5));
//        $this->idComplianceCheck_StAdm = $comp['id'];
    }
    
    //----------------------------Create measures-------------------------------
    
//    public function Help_CreateMeasure1_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure1Desc_En1 = $I->GenerateNameOf("Description_1 Energy1 ");
//        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_Energy;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
//        $I->wait(1);
//        $this->idMeasure1_En1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help_CreateMeasure2_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure2Desc_En2 = $I->GenerateNameOf("Description_2 Energy2 ");
//        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup2_Energy;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
//        $I->wait(1);
//        $this->idMeasure2_En2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help_CreateMeasure3_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure3Desc_Pol1 = $I->GenerateNameOf("Description_3 Pollution1 ");
//        $auditGroup     = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_PollutionPrevention;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
//        $I->wait(1);
//        $this->idMeasure3_Pol1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help_CreateMeasure4_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure4Desc_Wat1 = $I->GenerateNameOf("Description_4 Water1 ");
//        $auditGroup     = \Page\AuditGroupList::Water_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_Water;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
//        $I->wait(1);
//        $this->idMeasure4_Wat1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help_CreateMeasure5_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure5Desc_Sol1 = $I->GenerateNameOf("Description_5 Solid1 ");
//        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
//        $I->wait(1);
//        $this->idMeasure5_Sol1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//    }
    
    //----------------------------Create checklist------------------------------
    
    
//    public function Help_CreateChecklistForTier2_Program1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
//        $programDestination = $this->program1;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $id_checklist = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses1);
//        $I->PublishChecklistStatus($id_checklist);
//    }
//    
//    public function Help_CreateChecklistForTier2_Program2(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program2;
//        $programDestination = $this->program2;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $id_checklist = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses2);
//        $I->PublishChecklistStatus($id_checklist);
//    }
//    
    //---------------------Create Coordinator without state-----------------------
    
    public function CreateCoordinatorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator5_WithoutState = $I->GenerateEmail();
        $firstName = $this->firstName_Coordinator5_WithoutState = $I->GenerateNameOf('firnam_WS');
        $lastName  = $this->lastName_Coordinator5_WithoutState = $I->GenerateNameOf('lastnam_WS');
        $password  = $confirmPassword = $this->password;
        $phone     = $this->phone_Coordinator5_WithoutState = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null);
        $I->waitForElement(".confirm", 150);
//        $I->SearchUserByEmailOnPageInList($userType, $email);
//        $this->idCoordinator5_WithoutState = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Coordinator without program-------------------
    
    public function CreateCoordinatorUser_WithoutProgram(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator4_WithoutProgram = $I->GenerateEmail();
        $firstName = $this->firstName_Coordinator4_WithoutProgram = $I->GenerateNameOf('firnam_WP');
        $lastName  = $this->lastName_Coordinator4_WithoutProgram = $I->GenerateNameOf('lastnam_WP');
        $password  = $confirmPassword = $this->password;
        $phone     = $this->phone_Coordinator4_WithoutProgram = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->waitPageLoad();
//        $I->SearchUserByEmailOnPageInList($userType, $email);
//        $this->idCoordinator4_WithoutProgram = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    public function CreateCoordinatorUser_Program1(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator1_Prog1 = $I->GenerateEmail();
        $firstName = $this->firstName_Coordinator1_Prog1 = $I->GenerateNameOf('firnam_1');
        $lastName  = $this->lastName_Coordinator1_Prog1 = $I->GenerateNameOf('lastnam_1');
        $password  = $confirmPassword = $this->password;
        $phone     = $this->phone_Coordinator1_Prog1 = $I->GeneratePhoneNumber();
        $showInfoForProgramsArray = [$this->program1];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->AddProgramsToShowInfoDropdownOnUserUpdatePage($showInfoForProgramsArray);
//        $I->SearchUserByEmailOnPageInList($userType, $email);
//        $this->idCoordinator1_Prog1 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    public function CreateCoordinatorUser_Program2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator2_Prog2 = $I->GenerateEmail();
        $firstName = $this->firstName_Coordinator2_Prog2 = $I->GenerateNameOf('firnam_2');
        $lastName  = $this->lastName_Coordinator2_Prog2 = $I->GenerateNameOf('lastnam_2');
        $password  = $confirmPassword = $this->password;
        $phone     = $this->phone_Coordinator2_Prog2 = $I->GeneratePhoneNumber();
        $showInfoForProgramsArray = [$this->program2];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->AddProgramsToShowInfoDropdownOnUserUpdatePage($showInfoForProgramsArray);
//        $I->SearchUserByEmailOnPageInList($userType, $email);
//        $this->idCoordinator2_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    public function CreateCoordinatorUser_Program1_Program2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator3_Prog1_Prog2 = $I->GenerateEmail();
        $firstName = $this->firstName_Coordinator3_Prog1_Prog2 = $I->GenerateNameOf('firnam_1_2');
        $lastName  = $this->lastName_Coordinator3_Prog1_Prog2 = $I->GenerateNameOf('lastnam_1_2');
        $password  = $confirmPassword = $this->password;
        $phone     = $this->phone_Coordinator3_Prog1_Prog2 = $I->GeneratePhoneNumber();
        $showInfoForProgramsArray = [$this->program1, $this->program2];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->AddProgramsToShowInfoDropdownOnUserUpdatePage($showInfoForProgramsArray);
//        $I->SearchUserByEmailOnPageInList($userType, $email);
//        $this->idCoordinator3_Prog1_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //----------------------Create Auditor without state------------------------
    
    public function CreateAuditorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor5_WithoutState = $I->GenerateEmail();
        $firstName           = $this->firstName_Auditor5_WithoutState = $I->GenerateNameOf('firnam_WS');
        $lastName            = $this->lastName_Auditor5_WithoutState = $I->GenerateNameOf('lastnam_WS');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor5_WithoutState = $I->GeneratePhoneNumber();
        $this->fullName_Auditor5_WithoutState = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->amOnPage(\Page\UserList::URL($userType));
        $I->wait(2);
        $I->cantSee($email, \Page\UserList::$EmailRow);
        $I->wait(2);
        $I->SelectDefaultState($I, "All States");
        $I->wait(2);
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idAuditor5_WithoutState = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Auditor without program-----------------------
    
    public function CreateAuditorUser_WithoutProgram(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor4_WithoutProgram = $I->GenerateEmail();
        $firstName           = $this->firstName_Auditor4_WithoutProgram = $I->GenerateNameOf('firnam_WP');
        $lastName            = $this->lastName_Auditor4_WithoutProgram = $I->GenerateNameOf('lastnam_WP');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor4_WithoutProgram = $I->GeneratePhoneNumber();
        $this->fullName_Auditor4_WithoutProgram = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idAuditor4_WithoutProgram = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Auditor with Program1-------------------------
    
    public function CreateAuditorUser_Program1(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor1_Prog1 = $I->GenerateEmail();
        $firstName           = $this->firstName_Auditor1_Prog1 = $I->GenerateNameOf('firnam_1');
        $lastName            = $this->lastName_Auditor1_Prog1 = $I->GenerateNameOf('lastnam_1');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor1_Prog1 = $I->GeneratePhoneNumber();
        $this->fullName_Auditor1_Prog1 = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idAuditor1_Prog1 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //----------------------Create Auditor with Program2------------------------
    
    public function CreateAuditorUser_Program2(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor2_Prog2 = $I->GenerateEmail();
        $firstName           = $this->firstName_Auditor2_Prog2 = $I->GenerateNameOf('firnam_2');
        $lastName            = $this->lastName_Auditor2_Prog2 = $I->GenerateNameOf('lastnam_2');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor2_Prog2 = $I->GeneratePhoneNumber();
        $this->fullName_Auditor2_Prog2 = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idAuditor2_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------Create Auditor with Program1 & Program2--------------------
    
    public function CreateAuditorUser_Program1_Program2(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor3_Prog1_Prog2 = $I->GenerateEmail();
        $firstName           = $this->firstName_Auditor3_Prog1_Prog2 = $I->GenerateNameOf('firnam_1_2');
        $lastName            = $this->lastName_Auditor3_Prog1_Prog2 = $I->GenerateNameOf('lastnam_1_2');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor3_Prog1_Prog2 = $I->GeneratePhoneNumber();
        $this->fullName_Auditor3_Prog1_Prog2 = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitPageLoad();
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idAuditor3_Prog1_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------Create Audit Organization With Program1--------------------
    
    public function CreateAuditOrganization_Program1(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_1_En_Gen_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog1_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm);
        $I->wait(1);
        $I->cantSeeElement(Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->moveBack();
        $I->wait(2);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddAuditGroupButton, 150);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(2);
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 200);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->canSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor1_Prog1);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor1_Prog1));
    }
    
    //---------------Create Audit Organization With Program2--------------------
    
    public function CreateAuditOrganization_Program2(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_2_En_Pol_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog2_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\AuditOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor2_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor2_Prog2));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(2);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor3_Prog1_Prog2));
    }
    
    //------------Create Audit Organization With Program1 & Program2------------
    
    public function CreateAuditOrganization_Program1_Program2(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog1_Prog2_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\AuditOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\AuditOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->canSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor1_Prog1);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor1_Prog1));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor2_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor2_Prog2));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor3_Prog1_Prog2));
    }
    
    //----------------Create Audit Organization Without Programs----------------
    
    public function CreateAuditOrganization_WithoutPrograms(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol = $I->GenerateNameOf('AuditOrg_WithoutProgs_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
    }
    
    //-----------------Create Audit Organization Without Auditors---------------
    
    public function CreateAuditOrganization_WithoutAuditors(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol = $I->GenerateNameOf('AuditOrg_WithoutAuditors_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\AuditOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\AuditOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
    }
    
    
    
    /////////////////////////////////////////////-------------Inspector--------------/////////////////////////////////////////////
    
    //---------------------Create Inspector without state-----------------------
    
    public function CreateInspectorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector5_WithoutState = $I->GenerateEmail();
        $firstName           = $this->firstName_Inspector5_WithoutState = $I->GenerateNameOf('firnam_WS');
        $lastName            = $this->lastName_Inspector5_WithoutState = $I->GenerateNameOf('lastnam_WS');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector5_WithoutState = $I->GeneratePhoneNumber();
        $this->fullName_Inspector5_WithoutState = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->amOnPage(\Page\UserList::URL($userType));
        $I->wait(2);
        $I->cantSee($email, \Page\UserList::$EmailRow);
        $I->wait(2);
        $I->SelectDefaultState($I, "All States");
        $I->wait(2);
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idInspector5_WithoutState = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //--------------------Create Inspector without program----------------------
    
    public function CreateInspectorUser_WithoutProgram(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector4_WithoutProgram = $I->GenerateEmail();
        $firstName           = $this->firstName_Inspector4_WithoutProgram = $I->GenerateNameOf('firnam_WP');
        $lastName            = $this->lastName_Inspector4_WithoutProgram = $I->GenerateNameOf('lastnam_WP');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector4_WithoutProgram = $I->GeneratePhoneNumber();
        $this->fullName_Inspector4_WithoutProgram = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idInspector4_WithoutProgram = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Inspector with Program1-------------------------
    
    public function CreateInspectorUser_Program1(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector1_Prog1 = $I->GenerateEmail();
        $firstName           = $this->firstName_Inspector1_Prog1 = $I->GenerateNameOf('firnam_1');
        $lastName            = $this->lastName_Inspector1_Prog1 = $I->GenerateNameOf('lastnam_1');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector1_Prog1 = $I->GeneratePhoneNumber();
        $this->fullName_Inspector1_Prog1 = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idInspector1_Prog1 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Inspector with Program2-----------------------
    
    public function CreateInspectorUser_Program2(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector2_Prog2 = $I->GenerateEmail();
        $firstName           = $this->firstName_Inspector2_Prog2 = $I->GenerateNameOf('firnam_2');
        $lastName            = $this->lastName_Inspector2_Prog2 = $I->GenerateNameOf('lastnam_2');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector2_Prog2 = $I->GeneratePhoneNumber();
        $this->fullName_Inspector2_Prog2 = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idInspector2_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //--------------Create Inspector with Program1 & Program2-------------------
    
    public function CreateInspectorUser_Program1_Program2(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector3_Prog1_Prog2 = $I->GenerateEmail();
        $firstName           = $this->firstName_Inspector3_Prog1_Prog2 = $I->GenerateNameOf('firnam_1_2');
        $lastName            = $this->lastName_Inspector3_Prog1_Prog2 = $I->GenerateNameOf('lastnam_1_2');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector3_Prog1_Prog2 = $I->GeneratePhoneNumber();
        $this->fullName_Inspector3_Prog1_Prog2 = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->waitForElement(Page\UserUpdate::$AddStateButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$StateSelect_AddStateForm, 200);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\UserUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitPageLoad();
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(2);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idInspector3_Prog1_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------Create Inspector Organization With Program1--------------------
    
    public function CreateInspectorOrganization_Program1(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_1_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_Prog1_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->wait(2);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm);
        $I->wait(1);
        $I->cantSeeElement(Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->moveBack();
        $I->wait(2);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton, 150);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4));
        $I->wait(2);
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->canSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector1_Prog1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(6);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector1_Prog1));
    }
    
    //---------------Create Inspector Organization With Program2--------------------
    
    public function CreateInspectorOrganization_Program2(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_2_C1_C2 = $I->GenerateNameOf('InspOrg_Prog2_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$AddProgramButton, 150);
        $I->wait(2);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector2_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(6);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
    }
    
    //------------Create Inspector Organization With Program1 & Program2------------
    
    public function CreateInspectorOrganization_Program1_Program2(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_1_2_C2_C4 = $I->GenerateNameOf('InspOrg_Prog1_Prog2_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->canSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector1_Prog1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(6);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector1_Prog1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector2_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(6);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->wait(1);
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(6);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector3_Prog1_Prog2));
    }
    
    //----------------Create Inspector Organization Without Programs----------------
    
    public function CreateInspectorOrganization_WithoutPrograms(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_WithoutProgs_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        //$I->waitPageLoad();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4));
    }
    
    //-----------------Create Inspector Organization Without Auditors---------------
    
    public function CreateInspectorOrganization_WithoutAuditors(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_WithoutInspectors_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(3);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(5);
        $I->waitForElement(Page\InspectorOrganizationUpdate::$AddProgramButton, 200);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->wait(1);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        //$I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4));
    }
    
    //---------------------------Login as Coordinator1--------------------------
    public function Help_LogOut_LogInAsCoordinator1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->comment("-------------------Login as Coordinator1-------------------");
        $I->LoginAsUser($this->emailCoordinator1_Prog1, $this->password, $I, 'coordinator');
    }
    
    public function Coordinator1_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $stateAdmin_type  = 'state admin';
        $coordinator_type = 'coordinator';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        $business_type    = 'business';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        
        //Coordinator 1 present
        $I->comment("-------------------Coordinator1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailCoordinator1_Prog1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailCoordinator1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($coordinator_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Coordinator 5 absent
        $I->comment("-------------------Coordinator2 ABSENT------------------");
        $I->cantSee($this->emailCoordinator2_Prog2, \Page\UserList::$EmailRow);
        
        //Coordinator 5 absent
        $I->comment("-------------------Coordinator3 ABSENT------------------");
        $I->cantSee($this->emailCoordinator3_Prog1_Prog2, \Page\UserList::$EmailRow);
        
        //Coordinator 5 absent
        $I->comment("-------------------Coordinator4 ABSENT------------------");
        $I->cantSee($this->emailCoordinator4_WithoutProgram, \Page\UserList::$EmailRow);
        
        //Coordinator 5 absent
        $I->comment("-------------------Coordinator5 ABSENT------------------");
        $I->cantSee($this->emailCoordinator5_WithoutState, \Page\UserList::$EmailRow);
        
        //Inspector 1 present
        $I->comment("-------------------Inspector1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector1_Prog1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 2 absent
        $I->comment("-------------------Inspector2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 3 present
        $I->comment("-------------------Inspector3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector3_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 4 present
        $I->comment("-------------------Inspector4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 5 absent
        $I->comment("-------------------Inspector5 ABSENT------------------");
        $I->cantSee($this->emailInspector5_WithoutState, \Page\UserList::$EmailRow);
        
        //Auditor 1 present
        $I->comment("-------------------Auditor1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor1_Prog1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 2 absent
        $I->comment("-------------------Auditor2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 3 present
        $I->comment("-------------------Auditor3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor3_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 4 present
        $I->comment("-------------------Auditor4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
    }
     
    
    public function Coordinator1_CheckInspectors_OnInspectorsListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::inspectorType));
//        $I->wait(3);
        
        //Inspector 1 present
        $I->comment("-------------------Inspector1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector1_Prog1, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 2 absent
        $I->comment("-------------------Inspector2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector2_Prog2, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 3 present
        $I->comment("-------------------Inspector3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector3_Prog1_Prog2, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 4 present
        $I->comment("-------------------Inspector4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector4_WithoutProgram, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 5 absent
        $I->comment("-------------------Inspector5 ABSENT------------------");
        $I->cantSee($this->emailInspector5_WithoutState, \Page\UserList::$EmailRow);
    }
    
    public function Coordinator1_CheckAuditors_OnAuditorsListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::auditorType));
        $I->wait(3);
        
        //Auditor 1 present
        $I->comment("-------------------Auditor1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor1_Prog1, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 2 absent
        $I->comment("-------------------Auditor2 ABSENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor2_Prog2, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 3 present
        $I->comment("-------------------Auditor3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor3_Prog1_Prog2, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 4 present
        $I->comment("-------------------Auditor4 ABSENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor4_WithoutProgram, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
    }
    
    public function Coordinator1_CheckInspectorOrganizations_OnInspectorOrganizationListPage(\Step\Acceptance\InspectorOrganization $I)
    {
        $status           = 'active';
        
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
        $I->wait(3);
        
        //Inspector Organization 1 present
        $I->comment("----------------Inspector Organization1 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_1_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 2 present
        $I->comment("----------------Inspector Organization2 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_2_C1_C2);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 3 present
        $I->comment("-----------------Inspector Organization3 PRESENT---------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_1_2_C2_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 4 present
        $I->comment("----------------Inspector Organization4 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 5 present
        $I->comment("-------------------Inspector Organization5 PRESENT------------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_WithoutProgram_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
    }    
    
    public function Coordinator1_CheckAuditOrganizations_OnAuditOrganizationListPage(\Step\Acceptance\AuditOrganization $I)
    {
        $status           = 'active';
        
        $I->amOnPage(\Page\AuditOrganizationList::URL());
        $I->wait(3);
        
        //Audit Organization 1 present
        $I->comment("----------------Audit Organization1 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_1_En_Gen_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 2 present
        $I->comment("----------------Audit Organization2 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_2_En_Pol_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 3 present
        $I->comment("-----------------Audit Organization3 PRESENT---------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 4 present
        $I->comment("----------------Audit Organization4 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 5 present
        $I->comment("---------------Audit Organization5 PRESENT-----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
    }    
    
    //---------------------------Login as Coordinator2--------------------------
    public function Help_LogOut_LogInAsCoordinator2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->comment("-------------------Login as Coordinator2-------------------");
        $I->LoginAsUser($this->emailCoordinator2_Prog2, $this->password, $I, 'coordinator');
    }
    
    public function Coordinator2_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $stateAdmin_type  = 'state admin';
        $coordinator_type = 'coordinator';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        $business_type    = 'business';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        
        //Coordinator 1 absent
        $I->comment("-------------------Coordinator1 ABSENT------------------");
        $I->cantSee($this->emailCoordinator1_Prog1, \Page\UserList::$EmailRow);
        
        //Coordinator 2 present
        $I->comment("-------------------Coordinator2 Present------------------");
        $user1 = $I->GetUserOnPageInList($this->emailCoordinator2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailCoordinator2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($coordinator_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Coordinator 3 absent
        $I->comment("-------------------Coordinator3 ABSENT------------------");
        $I->cantSee($this->emailCoordinator3_Prog1_Prog2, \Page\UserList::$EmailRow);
        
        //Coordinator 1 absent
        $I->comment("-------------------Coordinator4 ABSENT------------------");
        $I->cantSee($this->emailCoordinator4_WithoutProgram, \Page\UserList::$EmailRow);
        
        //Coordinator 1 absent
        $I->comment("-------------------Coordinator5 ABSENT------------------");
        $I->cantSee($this->emailCoordinator5_WithoutState, \Page\UserList::$EmailRow);
        
        //Inspector 1 present
        $I->comment("-------------------Inspector1 Present------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector1_Prog1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 2 present
        $I->comment("-------------------Inspector2 Present------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 3 present
        $I->comment("-------------------Inspector3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector3_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 4 present
        $I->comment("-------------------Inspector4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 5 absent
        $I->comment("-------------------Inspector5 ABSENT------------------");
        $I->cantSee($this->emailInspector5_WithoutState, \Page\UserList::$EmailRow);
        
        //Auditor 1 ABSENT
        $I->comment("-------------------Auditor1 ABSENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor1_Prog1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 2 present
        $I->comment("-------------------Auditor2 Present------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 3 present
        $I->comment("-------------------Auditor3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor3_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 4 present
        $I->comment("-------------------Auditor4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
    }
     
    
    public function Coordinator2_CheckInspectors_OnInspectorsListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::inspectorType));
        $I->wait(3);
        
        //Inspector 1 absent
        $I->comment("-------------------Inspector1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector1_Prog1, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 2 present
        $I->comment("-------------------Inspector2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector2_Prog2, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 3 present
        $I->comment("-------------------Inspector3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector3_Prog1_Prog2, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 4 present
        $I->comment("-------------------Inspector4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector4_WithoutProgram, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 5 absent
        $I->comment("-------------------Inspector5 ABSENT------------------");
        $I->cantSee($this->emailInspector5_WithoutState, \Page\UserList::$EmailRow);
    }
    
    public function Coordinator2_CheckAuditors_OnAuditorsListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::auditorType));
        $I->wait(3);
        
        //Auditor 1 ABSENT
        $I->comment("-------------------Auditor1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor1_Prog1, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 2 present
        $I->comment("-------------------Auditor2 Present------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor2_Prog2, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 3 present
        $I->comment("-------------------Auditor3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor3_Prog1_Prog2, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 4 present
        $I->comment("-------------------Auditor4 ABSENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor4_WithoutProgram, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
    }
    
    public function Coordinator2_CheckInspectorOrganizations_OnInspectorOrganizationListPage(\Step\Acceptance\InspectorOrganization $I)
    {
        $status           = 'active';
        
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
        $I->wait(3);
        
        //Inspector Organization 1 present
        $I->comment("----------------Inspector Organization1 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_1_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 2 present
        $I->comment("----------------Inspector Organization2 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_2_C1_C2);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 3 present
        $I->comment("-----------------Inspector Organization3 PRESENT---------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_1_2_C2_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 4 present
        $I->comment("----------------Inspector Organization4 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 5 present
        $I->comment("-------------------Inspector Organization5 PRESENT------------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_WithoutProgram_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
    }    
    
    public function Coordinator2_CheckAuditOrganizations_OnAuditOrganizationListPage(\Step\Acceptance\AuditOrganization $I)
    {
        $status           = 'active';
        
        $I->amOnPage(\Page\AuditOrganizationList::URL());
        $I->wait(3);
        
        //Audit Organization 1 present
        $I->comment("----------------Audit Organization1 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_1_En_Gen_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 2 present
        $I->comment("----------------Audit Organization2 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_2_En_Pol_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 3 present
        $I->comment("-----------------Audit Organization3 PRESENT---------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 4 present
        $I->comment("----------------Audit Organization4 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 5 present
        $I->comment("---------------Audit Organization5 PRESENT-----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
    }    
    
    
    
    //---------------------------Login as Coordinator1_2--------------------------
    public function Help_LogOut_LogInAsCoordinator1_2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->comment("-------------------Login as Coordinator1_2-------------------");
        $I->LoginAsUser($this->emailCoordinator3_Prog1_Prog2, $this->password, $I, 'coordinator');
    }
    
    public function Coordinator1_2_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $stateAdmin_type  = 'state admin';
        $coordinator_type = 'coordinator';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        $business_type    = 'business';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        
        //Coordinator 1 absent
        $I->comment("-------------------Coordinator1 ABSENT------------------");
        $I->cantSee($this->emailCoordinator1_Prog1, \Page\UserList::$EmailRow);
        
        //Coordinator 2 absent
        $I->comment("-------------------Coordinator2 ABSENT------------------");
        $I->cantSee($this->emailCoordinator2_Prog2, \Page\UserList::$EmailRow);
        
        //Coordinator 3 present
        $I->comment("-------------------Coordinator3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailCoordinator3_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailCoordinator3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($coordinator_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Coordinator 4 absent
        $I->comment("-------------------Coordinator4 ABSENT------------------");
        $I->cantSee($this->emailCoordinator4_WithoutProgram, \Page\UserList::$EmailRow);
        
        //Coordinator 5 absent
        $I->comment("-------------------Coordinator5 ABSENT------------------");
        $I->cantSee($this->emailCoordinator5_WithoutState, \Page\UserList::$EmailRow);
        
        //Inspector 1 present
        $I->comment("-------------------Inspector1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector1_Prog1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 2 present
        $I->comment("-------------------Inspector2 Present------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 3 present
        $I->comment("-------------------Inspector3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector3_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 4 present
        $I->comment("-------------------Inspector4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 5 absent
        $I->comment("-------------------Inspector5 ABSENT------------------");
        $I->cantSee($this->emailInspector5_WithoutState, \Page\UserList::$EmailRow);
        
        //Auditor 1 present
        $I->comment("-------------------Auditor1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor1_Prog1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 2 present
        $I->comment("-------------------Auditor2 Present------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 3 present
        $I->comment("-------------------Auditor3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor3_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 4 present
        $I->comment("-------------------Auditor4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
    }
     
    
    public function Coordinator1_2_CheckInspectors_OnInspectorsListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::inspectorType));
        $I->wait(3);
        
        //Inspector 1 present
        $I->comment("-------------------Inspector1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector1_Prog1, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 2 present
        $I->comment("-------------------Inspector2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector2_Prog2, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 3 present
        $I->comment("-------------------Inspector3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector3_Prog1_Prog2, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 4 present
        $I->comment("-------------------Inspector4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailInspector4_WithoutProgram, Page\UserCreate::inspectorType);
        $row = $user1['row'];
        $I->canSee($this->emailInspector4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($inspector_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Inspector 5 absent
        $I->comment("-------------------Inspector5 ABSENT------------------");
        $I->cantSee($this->emailInspector5_WithoutState, \Page\UserList::$EmailRow);
    }
    
    public function Coordinator1_2_CheckAuditors_OnAuditorsListPage(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::auditorType));
        $I->wait(3);
        
        //Auditor 1 present
        $I->comment("-------------------Auditor1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor1_Prog1, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor1_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor1_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor1_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 2 present
        $I->comment("-------------------Auditor2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor2_Prog2, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 3 present
        $I->comment("-------------------Auditor3 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor3_Prog1_Prog2, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor3_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor3_Prog1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor3_Prog1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 4 present
        $I->comment("-------------------Auditor4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailAuditor4_WithoutProgram, Page\UserCreate::auditorType);
        $row = $user1['row'];
        $I->canSee($this->emailAuditor4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($auditor_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
    }
    
    public function Coordinator1_2_CheckInspectorOrganizations_OnInspectorOrganizationListPage(\Step\Acceptance\InspectorOrganization $I)
    {
        $status           = 'active';
        
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
        $I->wait(3);
        
        //Inspector Organization 1 present
        $I->comment("----------------Inspector Organization1 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_1_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 2 present
        $I->comment("----------------Inspector Organization2 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_2_C1_C2);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 3 present
        $I->comment("-----------------Inspector Organization3 PRESENT---------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_1_2_C2_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 4 present
        $I->comment("----------------Inspector Organization4 PRESENT----------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
        
        //Inspector Organization 5 present
        $I->comment("-------------------Inspector Organization5 PRESENT------------------");
        $row = $I->GetInspectorOrganizationRowNumber($this->inspOrganiz_WithoutProgram_C1_C2_C3_C4);
        $I->canSee($this->state, \Page\InspectorOrganizationList::StateLine($row));
        $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\InspectorOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\InspectorOrganizationList::ViewButtonLine($row));
    }    
    
    public function Coordinator1_2_CheckAuditOrganizations_OnAuditOrganizationListPage(\Step\Acceptance\AuditOrganization $I)
    {
        $status           = 'active';
        
        $I->amOnPage(\Page\AuditOrganizationList::URL());
        $I->wait(3);
        
        //Audit Organization 1 present
        $I->comment("----------------Audit Organization1 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_1_En_Gen_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 2 present
        $I->comment("----------------Audit Organization2 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_2_En_Pol_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 3 present
        $I->comment("-----------------Audit Organization3 PRESENT---------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 4 present
        $I->comment("----------------Audit Organization4 PRESENT----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
        
        //Audit Organization 5 present
        $I->comment("---------------Audit Organization5 PRESENT-----------------");
        $row = $I->GetAuditOrganizationRowNumber($this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol);
        $I->canSee($this->state, \Page\AuditOrganizationList::StateLine($row));
        $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\AuditOrganizationList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\AuditOrganizationList::ViewButtonLine($row));
    }    
    
    //---------------------------Login as Coordinator_WP--------------------------
    public function Help_LogOut_LogInAsCoordinator_WP(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->comment("-------------------Login as Coordinator_WP-------------------");
        $I->LoginAsUser($this->emailCoordinator4_WithoutProgram, $this->password, $I, 'coordinator');
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
    }
    
    public function Coordinator_WP_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\UserList::$UserRow);
    }
    
    public function Coordinator_WP_CheckInspectors_OnInspectorsListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::inspectorType));
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\UserList::$UserRow);
    }
    
    public function Coordinator_WP_CheckAuditors_OnAuditorsListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::auditorType));
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\UserList::$UserRow);
    }
    
    public function Coordinator_WP_CheckInspectorOrganizations_OnInspectorOrganizationListPage(\Step\Acceptance\InspectorOrganization $I)
    {
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\InspectorOrganizationList::$InspectorOrganizationRow);
    }    
    
    public function Coordinator_WP_CheckAuditOrganizations_OnAuditOrganizationListPage(\Step\Acceptance\AuditOrganization $I)
    {
        $I->amOnPage(\Page\AuditOrganizationList::URL());
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\AuditOrganizationList::$AuditOrganizationRow);
    }    
    
    //---------------------------Login as Coordinator_WS--------------------------
    public function Help_LogOut_LogInAsCoordinator_WS(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->comment("-------------------Login as Coordinator_WS-------------------");
        $I->LoginAsUser($this->emailCoordinator5_WithoutState, $this->password, $I, 'coordinator');
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
    }
    
    public function Coordinator_WS_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\UserList::$UserRow);
    }
    
    public function Coordinator_WS_CheckInspectors_OnInspectorsListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::inspectorType));
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\UserList::$UserRow);
    }
    
    public function Coordinator_WS_CheckAuditors_OnAuditorsListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::auditorType));
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\UserList::$UserRow);
    }
    
    public function Coordinator_WS_CheckInspectorOrganizations_OnInspectorOrganizationListPage(\Step\Acceptance\InspectorOrganization $I)
    {
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\InspectorOrganizationList::$InspectorOrganizationRow);
    }    
    
    public function Coordinator_WS_CheckAuditOrganizations_OnAuditOrganizationListPage(\Step\Acceptance\AuditOrganization $I)
    {
        $I->amOnPage(\Page\AuditOrganizationList::URL());
        $I->wait(3);
        $I->canSeePageForbiddenAccess($I, $text="You are not allowed to perform any action.");
        $I->cantSeeElement(Page\AuditOrganizationList::$AuditOrganizationRow);
    }    
}
