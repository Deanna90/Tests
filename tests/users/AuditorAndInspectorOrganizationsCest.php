<?php


class AuditorAndInspectorOrganizationsCest
{
    public $state, $program1, $program2, $idState, $county, $idCity1, $idCity2, $idProg2, $sector1, $sector2, $sector3, $city1, $city2, $zip1, $zip2;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy, $audSubgroup2_Energy, $id_audSubgroup2_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste, $audSubgroup2_SolidWaste, $id_audSubgroup2_SolidWaste;
    public $audSubgroup1_PollutionPrevention, $id_audSubgroup1_PollutionPrevention;
    public $audSubgroup1_Water, $id_audSubgroup1_Water;
    public $complCheck1_AirQuality, $complCheck2_HazWaste, $complCheck3_Created, $complCheck4_FoodSaf, $complCheck5_Stormwater, $complCheck6_Wastewater;
    public $idMeasure1_En1, $measure1Desc_En1, $idMeasure2_En2, $measure2Desc_En2, $idMeasure3_Pol1, $measure3Desc_Pol1, $idMeasure4_Wat1, $measure4Desc_Wat1, $idMeasure5_Sol1, $measure5Desc_Sol1; 
    public $measuresDesc_SuccessCreated = [];
    public $notifications_Auditor1 = [];
    public $notifications_Auditor2 = [];
    public $notifications_Auditor1_2 = [];
    public $notifications_Auditor1_2_Bus1 = [];
    public $notifications_Auditor1_2_Bus2 = [];
//    public $notifications_Auditor1_Bus1 = [];
//    public $notifications_Auditor2_Bus2 = [];
//    public $notifications_Auditor1_2_Bus1 = [];
//    public $notifications_Auditor1_2_Bus2 = [];
    public $notifications_Inspector1 = [];
    public $notifications_Inspector2 = [];
    public $notifications_Inspector1_2 = [];
    public $notifications_Inspector1_2_Bus1 = [];
    public $notifications_Inspector1_2_Bus2 = [];
    public $notifications_Bus1 = [];
    public $notifications_Bus2 = [];
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
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StOrganiz");
        $shortName = 'UA';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
    }
    
   
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
//        $I->wait(2);
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
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForEnergyGroup_2(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_Energy = $I->GenerateNameOf("EnAudSub2");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup2_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForSolidWasteGroup_1(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForSolidWasteGroup_2(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_SolidWaste = $I->GenerateNameOf("SolAudSub2");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup2_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForPollutionPreventionGroup_1(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_PollutionPrevention = $I->GenerateNameOf("PollutAudSub1");
        $auditGroup = Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_PollutionPrevention = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupForWaterGroup_1(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Water = $I->GenerateNameOf("WaterAudSub1");
        $auditGroup = Page\AuditGroupList::Water_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Water = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    //------------------------Create compliance check type----------------------
    public function Help_ComplianceCheckTypeCreate(\Step\Acceptance\ComplianceCheckType $I)
    {
        $name            = $this->complCheck3_Created = $I->GenerateNameOf("New ComplianceCheck ");
                
        $I->CreateComplianceCheckType($name);
        $comp = $I->GetComplianceCheckTypeOnPageInList($name);
//        $I->amOnPage(Page\ComplianceCheckTypeList::URL());
//        $this->complCheck1_AirQuality = $I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine(2));
//        $this->complCheck2_HazWaste = $I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine(4));
//        $this->complCheck4_FoodSaf = $I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine(5));
//        $this->idComplianceCheck_StAdm = $comp['id'];
        
        $this->complCheck1_AirQuality = 'Air Quality';
        $this->complCheck2_HazWaste   = 'Hazardous Waste';
        $this->complCheck4_FoodSaf    = 'Food Safety';
        $this->complCheck5_Stormwater = 'Stormwater';
        $this->complCheck6_Wastewater = 'Wastewater';
    }
    
    //----------------------------Create measures-------------------------------
    
    public function Help_CreateMeasure1_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc_En1 = $I->GenerateNameOf("Description_1 Energy1 ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure1_En1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure2_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc_En2 = $I->GenerateNameOf("Description_2 Energy2 ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure2_En2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure3_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc_Pol1 = $I->GenerateNameOf("Description_3 Pollution1 ");
        $auditGroup     = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_PollutionPrevention;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure3_Pol1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure4_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc_Wat1 = $I->GenerateNameOf("Description_4 Water1 ");
        $auditGroup     = \Page\AuditGroupList::Water_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Water;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure4_Wat1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure5_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc_Sol1 = $I->GenerateNameOf("Description_5 Solid1 ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure5_Sol1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
    }
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->PublishSectorChecklistStatus();
    }
    
    //----------------------------Update checklist------------------------------
    
    public function Update_ProgramChecklist_Program1_ForTier2(\Step\Acceptance\Checklist $I) {
        $program = $this->program1;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'Tier 2';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $this->id_checklist1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses1);
    }
    
    public function Update_ProgramChecklist_Program2_ForTier2(\Step\Acceptance\Checklist $I) {
        $program = $this->program2;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'Tier 2';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $this->id_checklist2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses2);
    }
    
    //----------------------Create Auditor without state------------------------
    
    public function CreateAuditorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor5_WithoutState = $I->GenerateEmail();
        $firstName           = $this->firstName_Auditor5_WithoutState = $I->GenerateNameOf('firnam');
        $lastName            = $this->lastName_Auditor5_WithoutState = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor5_WithoutState = $I->GeneratePhoneNumber();
        $this->fullName_Auditor5_WithoutState = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->amOnPage(\Page\UserList::URL($userType));
        $I->cantSee($email, \Page\UserList::$EmailRow);
//        $I->wait(2);
        $I->SelectDefaultState($I, "All States");
//        $I->wait(2);
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idAuditor5_WithoutState = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Auditor without program-----------------------
    
    public function CreateAuditorUser_WithoutProgram(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor4_WithoutProgram = $I->GenerateEmail();
        $firstName           = $this->firstName_Auditor4_WithoutProgram = $I->GenerateNameOf('firnam');
        $lastName            = $this->lastName_Auditor4_WithoutProgram = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor4_WithoutProgram = $I->GeneratePhoneNumber();
        $this->fullName_Auditor4_WithoutProgram = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
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
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
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
        $I->wait(1);
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
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
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
        $I->wait(1);
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
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idAuditor3_Prog1_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------Create Audit Organization With Program1--------------------
    
    public function CreateAuditOrganization_Program1(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_1_En_Gen_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog1_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
//        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSeeElement(Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->moveBack();
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor1_Prog1);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor1_Prog1));
    }
    
    //---------------Create Audit Organization With Program2--------------------
    
    public function CreateAuditOrganization_Program2(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_2_En_Pol_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog2_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor2_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor2_Prog2));
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor3_Prog1_Prog2));
    }
    
    //------------Create Audit Organization With Program1 & Program2------------
    
    public function CreateAuditOrganization_Program1_Program2(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog1_Prog2_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor1_Prog1);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor1_Prog1));
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor2_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor2_Prog2));
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor3_Prog1_Prog2));
    }
    
    //----------------Create Audit Organization Without Programs----------------
    
    public function CreateAuditOrganization_WithoutPrograms(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol = $I->GenerateNameOf('AuditOrg_WithoutProgs_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
    }
    
    //-----------------Create Audit Organization Without Auditors---------------
    
    public function CreateAuditOrganization_WithoutAuditors(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol = $I->GenerateNameOf('AuditOrg_WithoutAuditors_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
    }
    
    
    
    /////////////////////////////////////////////-------------Inspector--------------/////////////////////////////////////////////
    
    //---------------------Create Inspector without state-----------------------
    
    public function CreateInspectorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector5_WithoutState = $I->GenerateEmail();
        $firstName           = $this->firstName_Inspector5_WithoutState = $I->GenerateNameOf('firnam');
        $lastName            = $this->lastName_Inspector5_WithoutState = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector5_WithoutState = $I->GeneratePhoneNumber();
        $this->fullName_Inspector5_WithoutState = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->amOnPage(\Page\UserList::URL($userType));
        $I->cantSee($email, \Page\UserList::$EmailRow);
        $I->SelectDefaultState($I, "All States");
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idInspector5_WithoutState = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //--------------------Create Inspector without program----------------------
    
    public function CreateInspectorUser_WithoutProgram(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector4_WithoutProgram = $I->GenerateEmail();
        $firstName           = $this->firstName_Inspector4_WithoutProgram = $I->GenerateNameOf('firnam');
        $lastName            = $this->lastName_Inspector4_WithoutProgram = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector4_WithoutProgram = $I->GeneratePhoneNumber();
        $this->fullName_Inspector4_WithoutProgram = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
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
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
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
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
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
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idInspector3_Prog1_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------Create Inspector Organization With Program1--------------------
    
    public function CreateInspectorOrganization_Program1(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_1_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_Prog1_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm);
        $I->wait(1);
        $I->cantSeeElement(Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->moveBack();
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1_AirQuality);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1_AirQuality));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2_HazWaste);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2_HazWaste));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4_FoodSaf);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4_FoodSaf));
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector1_Prog1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector1_Prog1));
    }
    
    //---------------Create Inspector Organization With Program2--------------------
    
    public function CreateInspectorOrganization_Program2(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_2_C1_C2 = $I->GenerateNameOf('InspOrg_Prog2_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1_AirQuality);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1_AirQuality));
        
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2_HazWaste);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2_HazWaste));

        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck5_Stormwater);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck5_Stormwater));
        
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector2_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
    }
    
    //------------Create Inspector Organization With Program1 & Program2------------
    
    public function CreateInspectorOrganization_Program1_Program2(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_1_2_C2_C4 = $I->GenerateNameOf('InspOrg_Prog1_Prog2_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->reloadPage();
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2_HazWaste);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2_HazWaste));
        
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4_FoodSaf);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4_FoodSaf));
        
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck6_Wastewater);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck6_Wastewater));
        
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector1_Prog1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector1_Prog1));
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector2_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector3_Prog1_Prog2));
    }
    
    //----------------Create Inspector Organization Without Programs----------------
    
    public function CreateInspectorOrganization_WithoutPrograms(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_WithoutProgs_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1_AirQuality);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1_AirQuality));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2_HazWaste);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2_HazWaste));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4_FoodSaf);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4_FoodSaf));
    }
    
    //-----------------Create Inspector Organization Without Auditors---------------
    
    public function CreateInspectorOrganization_WithoutAuditors(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_WithoutInspectors_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck1_AirQuality);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1_AirQuality));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2_HazWaste);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2_HazWaste));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4_FoodSaf);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4_FoodSaf));
    }
    
    
    
    
    
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function Help_Business1Registration_Program1(Step\Acceptance\Business $I)
    {
        $firstName        = $this->firstName_Business1 = $I->GenerateNameOf("firnam");
        $lastName         = $this->lastName_Business1 = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->phone_Business1 = $I->GeneratePhoneNumber();
        $email            = $this->email_Business1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("busnam1_");
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
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    public function Help_LogOutFromBusiness1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Help_Business2Registration_Program2(Step\Acceptance\Business $I)
    {
        $firstName        = $this->firstName_Business2 = $I->GenerateNameOf("firnam");
        $lastName         = $this->lastName_Business2 = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->phone_Business2 = $I->GeneratePhoneNumber();
        $email            = $this->email_Business2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("busnam2_");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    public function Help_LogOutFromBusiness2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function Help_GoToBusinessViewPage_GetBusiness1Id(AcceptanceTester $I){
        $I->SelectDefaultState($I, $this->state);
        $I->amOnPage(Page\Dashboard::URL());
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_bus1 = $u1[1];
        $I->comment("Business1 id: $this->id_bus1");
    }
    
    public function Help_GoToBusinessViewPage_GetBusiness2Id(AcceptanceTester $I){
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url1: $url2");
        $u2 = explode('=', $url2);
        $this->id_bus2 = $u2[1];
        $I->comment("Business2 id: $this->id_bus2");
    }
    
    public function CheckAuditPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->comment("-----Check correct audit groups shows in popup-----");
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::General_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Wastewater_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Transportation_AuditGroup));
        
        $I->comment("-Check correct audit Organizations shows for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_1_En_Gen_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_2_En_Pol_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganiz_1_En_Gen_Sol_Wat);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor5_WithoutState));
        
        $I->comment("-Check correct audit Organizations shows for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_1_En_Gen_Sol_Wat));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_2_En_Pol_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->auditOrganiz_1_En_Gen_Sol_Wat);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor5_WithoutState));
        
        $I->comment("-Check correct audit Organizations shows for Pollution group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->auditOrganiz_1_En_Gen_Sol_Wat));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->auditOrganiz_2_En_Pol_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup), $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for Pollution group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->fullName_Auditor1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->fullName_Auditor3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->fullName_Auditor2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->fullName_Auditor4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup, $this->fullName_Auditor5_WithoutState));
    }
    
    public function CheckAuditPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->comment("-----Check correct audit groups shows in popup-----");
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::General_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Wastewater_AuditGroup));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Transportation_AuditGroup));
        
        $I->comment("-Check correct audit Organizations shows for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_1_En_Gen_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_2_En_Pol_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganiz_2_En_Pol_Sol_Wat);
        $I->wait(3);
        $I->comment("-Check correct users from Organization2 shows for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Energy_AuditGroup, $this->fullName_Auditor5_WithoutState));
        
        $I->comment("-Check correct audit Organizations shows for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_1_En_Gen_Sol_Wat));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_2_En_Pol_Sol_Wat));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_OrganizationOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->auditOrganiz_2_En_Pol_Sol_Wat);
        $I->wait(3);
        $I->comment("-Check correct users from Organization2 shows for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditorOptionByName(\Page\AuditGroupList::Water_AuditGroup, $this->fullName_Auditor5_WithoutState));
    }
    
    
    
    
    public function CheckInspectorPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->comment("-----Check correct compliance check types shows in popup-----");
        $I->comment("CompCheck1 = $this->complCheck1_AirQuality");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck1_AirQuality));
        $I->comment("CompCheck1 = $this->complCheck2_HazWaste");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck2_HazWaste));
        $I->comment("CompCheck1 = $this->complCheck3_Created");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck3_Created));
        $I->comment("CompCheck1 = $this->complCheck4_FoodSaf");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck4_FoodSaf));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality), $this->inspOrganiz_1_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization Without inspectors shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_1_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization Without inspectors shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created), $this->inspOrganiz_1_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck3_Created));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization Without inspectors shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck3_Created));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector5_WithoutState));
        
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf), $this->inspOrganiz_1_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector5_WithoutState));
    }
    
    public function CheckInspectorPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->comment("-----Check correct compliance check types shows in popup-----");
        $I->comment("CompCheck1 = $this->complCheck1_AirQuality");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck1_AirQuality));
        $I->comment("CompCheck1 = $this->complCheck2_HazWaste");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck2_HazWaste));
        $I->comment("CompCheck1 = $this->complCheck3_Created");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck3_Created));
        $I->comment("CompCheck1 = $this->complCheck4_FoodSaf");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck4_FoodSaf));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_1_2_C2_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1_AirQuality, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality), $this->inspOrganiz_2_C1_C2);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1_AirQuality, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_1_2_C2_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2_HazWaste, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_2_C1_C2);
        $I->wait(3);
        $I->comment("-Check correct users from Organization2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2_HazWaste, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck3_Created));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector5_WithoutState));
    
        $I->comment("-Check correct inspector Organizations shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4_FoodSaf, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4_FoodSaf, $this->fullName_Inspector5_WithoutState));
    }
    
    
    public function CompleteAuditPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        
        $I->comment("-Select Audit Organizations1 for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganiz_1_En_Gen_Sol_Wat);
        $I->wait(5);
        $I->comment("-Select Auditor1 from Organization1 for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor1_Prog1);
        $I->click(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), 'Ready');
        
        $I->comment("-Select Audit Organizations1_2 for Pollution group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup), $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->wait(5);
        $I->comment("-Select Auditor1_2 from Organization1_2 for Pollution group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup), $this->fullName_Auditor3_Prog1_Prog2);
        $I->click(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup), 'Ready');
        
        $I->comment("-Select Audit Organizations1_2 for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->wait(5);
        $I->comment("-Select Auditor1 from Organization1_2 for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->fullName_Auditor1_Prog1);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Water_AuditGroup), 'Ready');
        $I->click(Page\ApplicationDetails::$AuditsPopup_UpdateButton);
    }
    
    public function AuditPopup_Business1_SendMessageToAuditor1_Energy(AcceptanceTester $I) {
        $subject = "From ADMIN to auditor FN_1 (Business1) energy";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Energy_AuditGroup), 100);
        $I->wait(1);
        $I->comment("-Send Message to Auditor1 from Organization1 for Energy group-");
        $I->fillField(Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Energy_AuditGroup), $subject);
        $I->fillField(Page\ApplicationDetails::AuditsPopup_MessageFieldByName(\Page\AuditGroupList::Energy_AuditGroup), $message);
        $I->click(Page\ApplicationDetails::AuditsPopup_SendButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function AuditPopup_Business1_SendMessageToAuditor1_2_Pollution(AcceptanceTester $I) {
        $subject = "From ADMIN to auditor FN_1_2 (Business1) pollution";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup), 100);
        $I->wait(1);
        $I->comment("-Send Message to Auditor1 from Organization1_2 for Pollution group-");
        $I->fillField(Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup), $subject);
        $I->fillField(Page\ApplicationDetails::AuditsPopup_MessageFieldByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup), $message);
        $I->click(Page\ApplicationDetails::AuditsPopup_SendButtonByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function AuditPopup_Business1_SendMessageToAuditor1_Water(AcceptanceTester $I) {
        $subject = "From ADMIN to auditor FN_1 (Business1) water";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Water_AuditGroup), 100);
        $I->wait(1);
        $I->comment("-Send Message to Auditor1 from Organization1_2 for Water group-");
        $I->fillField(Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Water_AuditGroup), $subject);
        $I->fillField(Page\ApplicationDetails::AuditsPopup_MessageFieldByName(\Page\AuditGroupList::Water_AuditGroup), $message);
        $I->click(Page\ApplicationDetails::AuditsPopup_SendButtonByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function CompleteAuditPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        
        $I->comment("-Select Audit Organizations2 for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganiz_2_En_Pol_Sol_Wat);
        $I->wait(5);
        $I->comment("-Select Auditor2 from Organization2 for Energy group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor2_Prog2);
        $I->click(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), 'Ready');
        
        $I->comment("-Select Audit Organizations1_2 for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat);
        $I->wait(5);
        $I->comment("-Select Auditor2 from Organization1_2 for Water group-");
        $I->click(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Water_AuditGroup), $this->fullName_Auditor2_Prog2);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Water_AuditGroup), 'Ready');
        $I->click(Page\ApplicationDetails::$AuditsPopup_UpdateButton);
    }
    
    public function AuditPopup_Business2_SendMessageToAuditor2_Energy(AcceptanceTester $I) {
        $subject = "From ADMIN to auditor FN_2 (Business2) energy";
        $message = 'Text';
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Energy_AuditGroup), 100);
        $I->wait(1);
        $I->comment("-Send Message to Auditor2 from Organization2 for Energy group-");
        $I->fillField(Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Energy_AuditGroup), $subject);
        $I->fillField(Page\ApplicationDetails::AuditsPopup_MessageFieldByName(\Page\AuditGroupList::Energy_AuditGroup), $message);
        $I->click(Page\ApplicationDetails::AuditsPopup_SendButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function AuditPopup_Business2_SendMessageToAuditor2_Water(AcceptanceTester $I) {
        $subject = "From ADMIN to auditor FN_2 (Business2) water";
        $message = 'Text';
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 150, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Water_AuditGroup), 100);
        $I->wait(1);
        $I->comment("-Send Message to Auditor1 from Organization1_2 for Water group-");
        $I->fillField(Page\ApplicationDetails::AuditsPopup_SubjectFieldByName(\Page\AuditGroupList::Water_AuditGroup), $subject);
        $I->fillField(Page\ApplicationDetails::AuditsPopup_MessageFieldByName(\Page\AuditGroupList::Water_AuditGroup), $message);
        $I->click(Page\ApplicationDetails::AuditsPopup_SendButtonByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function CompleteInspectorPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->comment("-Select Inspector Organization1 shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality), $this->inspOrganiz_1_C1_C2_C3_C4);
        $I->wait(5);
        $I->comment("-Select Inspector1 from Organization1 for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality), $this->fullName_Inspector1_Prog1);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck1_AirQuality));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck1_AirQuality), 'Ready');
        
        $I->comment("-Select Inspector Organization1_2 shows for CompCheck6-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck6_Wastewater));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck6_Wastewater), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(5);
        $I->comment("-Select Inspector1 from Organization1_2 for CompCheck6-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck6_Wastewater));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck6_Wastewater), $this->fullName_Inspector1_Prog1);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck6_Wastewater));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck6_Wastewater), 'Ready');
        
        
        $I->comment("-Select Inspector Organization1_2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(5);
        $I->comment("-Select Inspector1_2 from Organization1_2 for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste), $this->fullName_Inspector3_Prog1_Prog2);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck2_HazWaste));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck2_HazWaste), 'Ready');
        
        $I->comment("-Select Inspector Organization1_2 shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(5);
        $I->comment("-Select Inspector1 from Organization1_2 for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf), $this->fullName_Inspector1_Prog1);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck4_FoodSaf));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck4_FoodSaf), 'Ready');
        $I->click(Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
    }
    
    public function InspectorPopup_Business1_SendMessageToInspector1_Air(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_1 (Business1) air";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck1_AirQuality));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck1_AirQuality), 100);
        $I->wait(1);
        $I->comment("-Send Message to Inspector1 from Organization1 for $this->complCheck1_AirQuality-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck1_AirQuality), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck1_AirQuality), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function InspectorPopup_Business1_SendMessageToInspector1_Wastewater(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_1 (Business1) wastewater";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck6_Wastewater));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck6_Wastewater), 100);
        $I->wait(1);
        $I->comment("-Send Message to Inspector1 from Organization1_2 for $this->complCheck6_Wastewater-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck6_Wastewater), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck6_Wastewater), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck6_Wastewater));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function InspectorPopup_Business1_SendMessageToInspector1_2_HazWas(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_1_2 (Business1) haz was";
        $message = 'Text';
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck2_HazWaste));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck2_HazWaste), 100);
        $I->wait(1);
        $I->comment("-Send Message to Inspector1_2 from Organization1_2 for $this->complCheck2_HazWaste-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck2_HazWaste), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck2_HazWaste), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function InspectorPopup_Business1_SendMessageToInspector1_Food(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_1 (Business1) food";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck4_FoodSaf));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck4_FoodSaf), 100);
        $I->wait(1);
        $I->comment("-Send Message to Inspector1 from Organization1_2 for $this->complCheck4_FoodSaf-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck4_FoodSaf), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck4_FoodSaf), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function CompleteInspectorPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->comment("-Select Inspector Organization2 shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1_AirQuality), $this->inspOrganiz_2_C1_C2);
        $I->wait(5);
        $I->comment("-Select Inspector2 from Organization2 for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1_AirQuality), $this->fullName_Inspector2_Prog2);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck1_AirQuality));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck1_AirQuality), 'Ready');
        
        $I->comment("-Select Inspector Organization2 shows for CompCheck5-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck5_Stormwater));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck5_Stormwater), $this->inspOrganiz_2_C1_C2);
        $I->wait(5);
        $I->comment("-Select Inspector2 from Organization2 for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck5_Stormwater), $this->fullName_Inspector2_Prog2);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck5_Stormwater));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck5_Stormwater), 'Ready');
        
        
        $I->comment("-Select Inspector Organization1_2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2_HazWaste), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(5);
        $I->comment("-Select Inspector1_2 from Organization1_2 for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2_HazWaste), $this->fullName_Inspector3_Prog1_Prog2);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck2_HazWaste));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck2_HazWaste), 'Ready');
        
        $I->comment("-Select Inspector Organization1_2 shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4_FoodSaf), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(5);
        $I->comment("-Select Inspector2 from Organization1_2 for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4_FoodSaf), $this->fullName_Inspector2_Prog2);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck4_FoodSaf));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->complCheck4_FoodSaf), 'Ready');
        $I->click(Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
    }
    
    public function InspectorPopup_Business2_SendMessageToInspector2_Air(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_2 (Business2) air";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck1_AirQuality));
        $I->wait(4);
        $I->comment("-Send Message to Inspector2 from Organization2 for $this->complCheck1_AirQuality-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck1_AirQuality), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck1_AirQuality), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function InspectorPopup_Business2_SendMessageToInspector2_Stormwater(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_2 (Business2) stormwater";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck5_Stormwater));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck5_Stormwater), 100);
        $I->wait(1);
        $I->comment("-Send Message to Inspector2 from Organization2 for $this->complCheck5_Stormwater-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck5_Stormwater), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck5_Stormwater), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function InspectorPopup_Business2_SendMessageToInspector1_2_HazWas(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_1_2 (Business2) haz was";
        $message = 'Text';
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck2_HazWaste));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck2_HazWaste), 100);
        $I->wait(1);
        $I->comment("-Send Message to Inspector1_2 from Organization1_2 for $this->complCheck2_HazWaste-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck2_HazWaste), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck2_HazWaste), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function InspectorPopup_Business2_SendMessageToInspector2_Food(AcceptanceTester $I) {
        $subject = "From ADMIN to inspector FN_2 (Business2) food";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->complCheck4_FoodSaf));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck4_FoodSaf), 100);
        $I->wait(1);
        $I->comment("-Send Message to Inspector2 from Organization1_2 for $this->complCheck4_FoodSaf-");
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_SubjectFieldByName($this->complCheck4_FoodSaf), $subject);
        $I->fillField(Page\ApplicationDetails::ComplianceCheckPopup_MessageFieldByName($this->complCheck4_FoodSaf), $message);
        $I->click(Page\ApplicationDetails::ComplianceCheckPopup_SendButtonByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->waitForText("Message was sent!", 300);
        $I->wait(1);
    }
    
    public function Help_LogOutAndLoginAsAuditor1(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailAuditor1_Prog1, $this->password, $I, 'auditor');
    }
    
    public function Auditor1_DashboardCheck(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::Water_AuditGroup));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::Energy_AuditGroup)."[@href='/auditor/communication/index?business_id=$this->id_bus1']");
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::Water_AuditGroup)."[@href='/auditor/communication/index?business_id=$this->id_bus1']");
    }
    
    public function Auditor1_CheckCommunicationsToAuditor_BusinessProfile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor1_CheckCommunicationsToAuditor_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor1_CreateCommunicationPage_ForBusiness1_CheckAvailableAuditGroups(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->canSee(\Page\AuditGroupList::Energy_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::General_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::SolidWaste_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->canSee(\Page\AuditGroupList::Water_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->canSee(\Page\AuditGroupList::PollutionPrevention_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->assertSame("3", "$options");
    }
    
    public function Auditor1_CreateCommunication1_ForBusiness1_WithoutGroups(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1 to Business1 (without groups)";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_CreateCommunication2_ForBusiness1_Energy(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1 to Business1 (energy)";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
  
    public function Auditor1_CreateCommunication5_ForBusiness1_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1 to Business1 (water)";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_CreateCommunication6_ForBusiness1_PollutionPrevention(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1 to Business1 (pollution)";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_CreateCommunication7_ForBusiness1_Energy_Water_PollutionPrevention(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1 to Business1 (energy, water, pollution)";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_CreateCommunication8_ForBusiness1_Energy_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1 to Business1 (energy, water)";
        $message = 'Text';
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    
    public function Help_LogOutAndLoginAsAuditor2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->Logout($I);
        $I->LoginAsUser($this->emailAuditor2_Prog2, $this->password, $I, 'auditor');
    }
    
    public function Auditor2_DashboardCheck(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, \Page\AuditGroupList::Water_AuditGroup));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, \Page\AuditGroupList::Energy_AuditGroup)."[@href='/auditor/communication/index?business_id=$this->id_bus2']");
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, \Page\AuditGroupList::Water_AuditGroup)."[@href='/auditor/communication/index?business_id=$this->id_bus2']");
    }
    
    public function Auditor2_CheckCommunicationsToAuditor_BusinessProfile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor2_CheckCommunicationsToAuditor_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function Auditor2_CreateCommunicationPage_ForBusiness2_CheckAvailableAuditGroups(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->canSee(\Page\AuditGroupList::Energy_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::General_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::SolidWaste_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->canSee(\Page\AuditGroupList::Water_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::PollutionPrevention_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->assertSame("2", "$options");
    }
    
    public function Auditor2_CreateCommunication1_ForBusiness2_WithoutGroups(AcceptanceTester $I)
    {
        $subject = "From auditor FN_2 to Business2 (without groups)";
        $message = 'Text';
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor2_CreateCommunication2_ForBusiness2_Energy(AcceptanceTester $I)
    {
        $subject = "From auditor FN_2 to Business2 (energy)";
        $message = 'Text';
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor2_CreateCommunication5_ForBusiness2_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_2 to Business2 (water)";
        $message = 'Text';
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor2_CreateCommunication8_ForBusiness2_Energy_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_2 to Business2 (energy, water)";
        $message = 'Text';
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Help_LogOutAndLoginAsAuditor1_2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailAuditor3_Prog1_Prog2, $this->password, $I, 'auditor');
    }
    
    public function Auditor1_2_DashboardCheck(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::PollutionPrevention_AuditGroup));
//        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::Water_AuditGroup));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::PollutionPrevention_AuditGroup)."[@href='/auditor/communication/index?business_id=$this->id_bus1']");
//        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, \Page\AuditGroupList::Water_AuditGroup)."[@href='/auditor/communication/index?business_id=$this->id_bus1']");
    }
    
    public function Auditor1_2_CheckCommunicationsToAuditor_Business1Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2_Bus1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2_Bus1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor1_2_CheckCommunicationsToAuditor_Business2Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2_Bus2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2_Bus2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor1_2_CheckCommunicationsToAuditor_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor1_2_CreateCommunicationPage_ForBusiness1_CheckAvailableAuditGroups(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->canSeeElement(Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->cantSee(\Page\AuditGroupList::Energy_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::General_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::SolidWaste_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->canSee(\Page\AuditGroupList::Water_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->canSee(\Page\AuditGroupList::PollutionPrevention_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->assertSame("2", "$options");
    }
    
    public function Auditor1_2_CreateCommunication1_ForBusiness1_WithoutGroups(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business1 (without groups)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_2_CreateCommunication2_ForBusiness1_PollutionPrevention(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business1 (pollution)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_2_CreateCommunication5_ForBusiness1_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business1 (water)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_2_CreateCommunication8_ForBusiness1_PollutionPrevention_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business1 (pollution, water)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus1[] = $subject;
        $this->notifications_Auditor1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    
    public function Auditor1_2_CreateCommunicationPage_ForBusiness2_CheckAvailableAuditGroups(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
//        $I->cantSeeElement(Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->canSee(\Page\AuditGroupList::Energy_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::General_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::SolidWaste_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->canSee(\Page\AuditGroupList::Water_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->cantSee(\Page\AuditGroupList::PollutionPrevention_AuditGroup, Page\CommunicationCreatePopup::$AuditGroupOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$AuditGroupOption);
        $I->assertSame("2", "$options");
    }
    
    public function Auditor1_2_CreateCommunication1_ForBusiness2_WithoutGroups(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business2 (without groups)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_2_CreateCommunication2_ForBusiness2_Energy(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business2 (energy)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus2[] = $subject;
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_2_CreateCommunication5_ForBusiness2_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business2 (water)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus2[] = $subject;
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Auditor1_2_CreateCommunication8_ForBusiness2_Energy_Water(AcceptanceTester $I)
    {
        $subject = "From auditor FN_1_2 to Business2 (energy, water)";
        $message = 'Text';
        $this->notifications_Auditor1_2[] = $subject;
        $this->notifications_Auditor1_2_Bus2[] = $subject;
        $this->notifications_Auditor2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$AuditGroupSelect);
        $I->click(Page\CommunicationCreatePopup::selectAuditGroupOptionByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    
    public function Auditor1_2_CheckCommunicationsToAuditor_Business1Profile_2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2_Bus1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2_Bus1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor1_2_CheckCommunicationsToAuditor_Business2Profile_2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2_Bus2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2_Bus2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Auditor1_2_CheckCommunicationsToAuditor_CommunicationList_2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_LogOutAndLoginAsAuditor1(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailAuditor1_Prog1, $this->password, $I, 'auditor');
    }
    
    public function AfterAllSent_Auditor1_CheckCommunicationsToAuditor_BusinessProfile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_Auditor1_CheckCommunicationsToAuditor_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_LogOutAndLoginAsAuditor2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailAuditor2_Prog2, $this->password, $I, 'auditor');
    }
    
    public function AfterAllSent_Auditor2_CheckCommunicationsToAuditor_BusinessProfile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_Auditor2_CheckCommunicationsToAuditor_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_LogOutAndLoginAsAuditor1_2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailAuditor3_Prog1_Prog2, $this->password, $I, 'auditor');
    }
    
    public function AfterAllSent_Auditor1_2_CheckCommunicationsToAuditor_Business1Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2_Bus1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2_Bus1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_Auditor1_2_CheckCommunicationsToAuditor_Business2Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2_Bus2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2_Bus2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_Auditor1_2_CheckCommunicationsToAuditor_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Auditor1_2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Auditor1_2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    
    
    
    
    
    
    
    
    public function Help_LogOutAndLoginAsInspector1(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailInspector1_Prog1, $this->password, $I, 'inspector');
    }
    
    public function Inspector1_DashboardCheck(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, $this->complCheck1_AirQuality));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, $this->complCheck4_FoodSaf));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, $this->complCheck1_AirQuality)."[@href='/inspector/communication/index?business_id=$this->id_bus1']");
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, $this->complCheck4_FoodSaf)."[@href='/inspector/communication/index?business_id=$this->id_bus1']");
    }
    
    public function Inspector1_CheckCommunicationsToInspector_BusinessProfile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Inspector1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Inspector1_CheckCommunicationsToInspector_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Inspector1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Inspector1_CreateCommunicationPage_ForBusiness1_CheckAvailableComplianceChecks(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->canSee($this->complCheck1_AirQuality, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck2_HazWaste, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck4_FoodSaf, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck6_Wastewater, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->cantSee($this->complCheck3_Created, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->assertSame("4", "$options");
    }
    
    public function Inspector1_CreateCommunication1_ForBusiness1_WithoutComplianceChecks(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1 to Business1 (without compliance checks)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_CreateCommunication1_ForBusiness1_Air_CompCheck1(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1 to Business1 ($this->complCheck1_AirQuality)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_CreateCommunication1_ForBusiness1_HazWaste_CompCheck2(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1 to Business1 ($this->complCheck2_HazWaste)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_CreateCommunication1_ForBusiness1_Food_CompCheck4(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1 to Business1 ($this->complCheck4_FoodSaf)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_CreateCommunication1_ForBusiness1_Air_Food_CompCheck1_CompCheck4(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1 to Business1 ($this->complCheck1_AirQuality, $this->complCheck4_FoodSaf)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_CreateCommunication1_ForBusiness1_Air_Food_HazWaste_CompCheck1_CompCheck4_CompCheck2(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1 to Business1 ($this->complCheck1_AirQuality, $this->complCheck4_FoodSaf, $this->complCheck2_HazWaste)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    
    public function Help_LogOutAndLoginAsInspector2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailInspector2_Prog2, $this->password, $I, 'inspector');
    }
    
    public function Inspector2_DashboardCheck(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck1_AirQuality));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck4_FoodSaf));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck5_Stormwater));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck1_AirQuality)."[@href='/inspector/communication/index?business_id=$this->id_bus2']");
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck4_FoodSaf)."[@href='/inspector/communication/index?business_id=$this->id_bus2']");
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck5_Stormwater)."[@href='/inspector/communication/index?business_id=$this->id_bus2']");
    }
    
    public function Inspector2_CheckCommunicationsToInspector_BusinessProfile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Inspector2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Inspector2_CheckCommunicationsToInspector_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $assert1 = array_diff($this->notifications_Inspector2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Inspector2_CreateCommunicationPage_ForBusiness2_CheckAvailableComplianceChecks(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->canSee($this->complCheck1_AirQuality, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck2_HazWaste, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck4_FoodSaf, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck5_Stormwater, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->cantSee($this->complCheck6_Wastewater, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->cantSee($this->complCheck3_Created, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->assertSame("4", "$options");
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_WithoutComplianceChecks(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 (without compliance checks)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_Air_CompCheck1(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck1_AirQuality)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_HazWaste_CompCheck2(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck2_HazWaste)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_FoodSaf_CompCheck4(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck4_FoodSaf)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_Stormwater_CompCheck5(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck5_Stormwater)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_Air_Stormwater_CompCheck1_CompCheck5(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck1_AirQuality, $this->complCheck5_Stormwater)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_HazWas_Stormwater_CompCheck2_CompCheck5(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck2_HazWaste, $this->complCheck5_Stormwater)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_Air_HazWas_Stormwater_CompCheck1_CompCheck2_CompCheck5(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck1_AirQuality, $this->complCheck2_HazWaste, $this->complCheck5_Stormwater)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector2_CreateCommunication1_ForBusiness2_Air_HazWas_Stormwater_Food_CompCheck1_CompCheck2_CompCheck5_CompCheck4(AcceptanceTester $I)
    {
        $subject = "From inspector FN_2 to Business2 ($this->complCheck1_AirQuality, $this->complCheck2_HazWaste, $this->complCheck5_Stormwater, $this->complCheck4_FoodSaf)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Help_LogOutAndLoginAsInspector1_2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL());
        $I->Logout($I);
        $I->LoginAsUser($this->emailInspector3_Prog1_Prog2, $this->password, $I, 'inspector');
    }
    
    public function Inspector1_2_DashboardCheck(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, $this->complCheck2_HazWaste));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck2_HazWaste));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business1, $this->complCheck2_HazWaste)."[@href='/inspector/communication/index?business_id=$this->id_bus1']");
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2, $this->complCheck2_HazWaste)."[@href='/inspector/communication/index?business_id=$this->id_bus2']");
    }
    
    public function Inspector1_2_CheckCommunicationsToInspector_Business1Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1_2_Bus1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1_2_Bus1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function Inspector1_2_CheckCommunicationsToInspector_Business2Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1_2_Bus2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1_2_Bus2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function Inspector1_2_CheckCommunicationsToInspector_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1_2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1_2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function Inspector1_2_CreateCommunicationPage_ForBusiness1_CheckAvailableComplianceChecks(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->cantSee($this->complCheck1_AirQuality, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck2_HazWaste, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck4_FoodSaf, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->cantSee($this->complCheck5_Stormwater, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck6_Wastewater, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->cantSee($this->complCheck3_Created, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->assertSame("3", "$options");
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness1_WithoutComplianceChecks(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business1 (without compliance checks)";
        $message = 'Text';
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness1_HazWas_CompCheck2(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business1 ($this->complCheck2_HazWaste)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
//        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness1_Food_CompCheck4(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business1 ($this->complCheck4_FoodSaf)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
//        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness1_Wastewater_CompCheck6(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business1 ($this->complCheck6_Wastewater)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
//        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck6_Wastewater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness1_Food_Wastewater_CompCheck4_CompCheck6(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business1 ($this->complCheck4_FoodSaf, $this->complCheck6_Wastewater)";
        $message = 'Text';
        $this->notifications_Inspector1[] = $subject;
//        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus1[] = $subject;
        $this->notifications_Bus1[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck6_Wastewater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunicationPage_ForBusiness2_CheckAvailableComplianceChecks(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->canSee($this->complCheck1_AirQuality, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck2_HazWaste, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck4_FoodSaf, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->canSee($this->complCheck5_Stormwater, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->cantSee($this->complCheck6_Wastewater, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->cantSee($this->complCheck3_Created, Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $options= $I->getAmount($I, \Page\CommunicationCreatePopup::$ComplianceCheckOption);
        $I->assertSame("4", "$options");
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness2_WithoutComplianceChecks(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business2 (without compliance checks)";
        $message = 'Text';
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness2_HazWas_CompCheck2(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business2 ($this->complCheck2_HazWaste)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck2_HazWaste));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness2_Food_CompCheck4(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business2 ($this->complCheck4_FoodSaf)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck4_FoodSaf));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness2_Air_CompCheck1(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business2 ($this->complCheck1_AirQuality)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck1_AirQuality));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function Inspector1_2_CreateCommunication1_ForBusiness2_Stormwater_CompCheck5(AcceptanceTester $I)
    {
        $subject = "From inspector FN_1_2 to Business2 ($this->complCheck5_Stormwater)";
        $message = 'Text';
        $this->notifications_Inspector2[] = $subject;
        $this->notifications_Inspector1_2[] = $subject;
        $this->notifications_Inspector1_2_Bus2[] = $subject;
        $this->notifications_Bus2[] = $subject;
        
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $I->click(Page\ApplicationDetails::$CreateNewConversationButton);
        $I->waitPageLoad();
        $I->executeJS('$("#ck_editor_modal").val("Text")');
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$ComplianceCheckSelect);
        $I->click(Page\CommunicationCreatePopup::selectComplianceCheckOptionByName($this->complCheck5_Stormwater));
        $I->wait(1);
        $I->fillField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(1);
        $I->waitForText("Message sent!", 300);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->business2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
    }
    
    public function AfterAllSent_Inspector1_2_CheckCommunicationsToInspector_Business1Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        $I->comment("Next count: $next");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1_2_Bus1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1_2_Bus1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function AfterAllSent_Inspector1_2_CheckCommunicationsToInspector_Business2Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        $I->comment("Next count: $next");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1_2_Bus2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1_2_Bus2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        }
    }
    
    public function AfterAllSent_Inspector1_2_CheckCommunicationsToInspector_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        $I->comment("Next count: $next");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1_2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1_2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function Logout_And_LoginAsInspector1(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailInspector1_Prog1, $this->password, $I, 'inspector');
    }

    public function LastCheck_AfterAllSent_Inspector1_CheckCommunicationsToInspector_Business1Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus1));
        
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->comment("Rows on 1st page: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        $I->comment("Next count: $next");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            $I->comment("Rows on 2nd page: $rows");
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function LastCheck_AfterAllSent_Inspector1_CheckCommunicationsToInspector_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows on 1st page: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        $I->comment("Next count: $next");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            $I->comment("Rows on 2nd page: $rows");
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector1, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector1);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function Logout_And_LoginAsInspector2(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailInspector2_Prog2, $this->password, $I, 'inspector');
    }

    public function LastCheck_AfterAllSent_Inspector2_CheckCommunicationsToInspector_Business2Profile(AcceptanceTester $I)
    {
        $I->amOnPage(Page\ApplicationDetails::URL_Communication($this->id_bus2));
        
        $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->comment("Rows on 1st page: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        $I->comment("Next count: $next");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            $I->comment("Rows on 2nd page: $rows");
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
    public function LastCheck_AfterAllSent_Inspector2_CheckCommunicationsToInspector_CommunicationList(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CommunicationsList::URL());
        $rows = $I->getAmount($I, Page\CommunicationsList::$SubjectColumnRow);
        $I->comment("Rows on 1st page: $rows");
        for($i=1; $i<=$rows; $i++){
            $notif[$i]=$I->grabTextFrom(Page\CommunicationsList::SubjectLine($i));
            $I->wait(1);
        }
        $next = $I->getAmount($I, ".next:not(.disabled)");
        $I->comment("Next count: $next");
        if($next == '1'){
            $I->click(".next:not(.disabled)");
            $I->wait(1);
            $I->waitPageLoad();
            $rows = $I->getAmount($I, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
            $I->comment("Rows on 2nd page: $rows");
            for($i=1; $i<=$rows; $i++){
                $notif[]=$I->grabTextFrom(Page\ApplicationDetails::SubjectLine_CommunicationTab($i));
                $I->wait(1);
            }
        }
        $assert1 = array_diff($this->notifications_Inspector2, $notif);
        $assert2 = array_diff($notif, $this->notifications_Inspector2);
        $I->comment("Assert 1:");
        foreach($assert1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Assert 2:");
        foreach($assert2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($assert1)){
            $message1 = "Absent these notifications: ";
            foreach ($assert1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR");
            $I->fail($message1);
        } 
        if(!empty($assert2)){
            $message2 = "Wrong notifications shown: ";
            foreach ($assert2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR");
            $I->fail($message2);
        } 
    }
    
}
