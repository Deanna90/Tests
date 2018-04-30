<?php


class AuditorAndInspectorOrganizationsCest
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
    
    public $emailInspector1_Prog1, $emailInspector2_Prog2, $emailInspector3_Prog1_Prog2, $emailInspector4_WithoutProgram, $emailInspector5_WithoutState,
           $emailAuditor1_Prog1, $emailAuditor2_Prog2, $emailAuditor3_Prog1_Prog2, $emailAuditor4_WithoutProgram, $emailAuditor5_WithoutState;
    
    public $firstName_Inspector1_Prog1, $firstName_Inspector2_Prog2, $firstName_Inspector3_Prog1_Prog2, $firstName_Inspector4_WithoutProgram, $firstName_Inspector5_WithoutState,
           $firstName_Auditor1_Prog1, $firstName_Auditor2_Prog2, $firstName_Auditor3_Prog1_Prog2, $firstName_Auditor4_WithoutProgram, $firstName_Auditor5_WithoutState;
    
    public $lastName_Inspector1_Prog1, $lastName_Inspector2_Prog2, $lastName_Inspector3_Prog1_Prog2, $lastName_Inspector4_WithoutProgram, $lastName_Inspector5_WithoutState,
           $lastName_Auditor1_Prog1, $lastName_Auditor2_Prog2, $lastName_Auditor3_Prog1_Prog2, $lastName_Auditor4_WithoutProgram, $lastName_Auditor5_WithoutState;
    
    public $fullName_Inspector1_Prog1, $fullName_Inspector2_Prog2, $fullName_Inspector3_Prog1_Prog2, $fullName_Inspector4_WithoutProgram, $fullName_Inspector5_WithoutState,
           $fullName_Auditor1_Prog1, $fullName_Auditor2_Prog2, $fullName_Auditor3_Prog1_Prog2, $fullName_Auditor4_WithoutProgram, $fullName_Auditor5_WithoutState;
    
    public $idInspector1_Prog1, $idInspector2_Prog2, $idInspector3_Prog1_Prog2, $idInspector4_WithoutProgram, $idInspector5_WithoutState, 
           $idAuditor1_Prog1, $idAuditor2_Prog2, $idAuditor3_Prog1_Prog2, $idAuditor4_WithoutProgram, $idAuditor5_WithoutState;
    
    public $phone_Inspector1_Prog1, $phone_Inspector2_Prog2, $phone_Inspector3_Prog1_Prog2, $phone_Inspector4_WithoutProgram, $phone_Inspector5_WithoutState, 
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
    
    public function Help_CreateMeasure1_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc_En1 = $I->GenerateNameOf("Description_1 Energy1 ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
        $I->wait(1);
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
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
        $I->wait(1);
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
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
        $I->wait(1);
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
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
        $I->wait(1);
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
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 25);
        $I->wait(1);
        $this->idMeasure5_Sol1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
    }
    
    //----------------------------Create checklist------------------------------
    
    
    public function Help_CreateChecklistForTier2_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $id_checklist = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses1);
        $I->PublishChecklistStatus($id_checklist);
    }
    
    public function Help_CreateChecklistForTier2_Program2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $id_checklist = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses2);
        $I->PublishChecklistStatus($id_checklist);
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
        $firstName           = $this->firstName_Auditor4_WithoutProgram = $I->GenerateNameOf('firnam');
        $lastName            = $this->lastName_Auditor4_WithoutProgram = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Auditor4_WithoutProgram = $I->GeneratePhoneNumber();
        $this->fullName_Auditor4_WithoutProgram = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(3);
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
        $I->wait(3);
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
        $I->wait(6);
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
        $I->wait(3);
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
        $I->wait(6);
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
        $I->wait(3);
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
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(6);
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
        $I->wait(6);
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->click(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm);
        $I->wait(1);
        $I->cantSeeElement(Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->moveBack();
        $I->wait(2);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddAuditGroupButton, 150);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
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
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
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
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor1_Prog1));
        $I->wait(3);
    }
    
    //---------------Create Audit Organization With Program2--------------------
    
    public function CreateAuditOrganization_Program2(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_2_En_Pol_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog2_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
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
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
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
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor2_Prog2));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->cantSee($this->fullName_Auditor1_Prog1, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor2_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Auditor3_Prog1_Prog2, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor4_WithoutProgram, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Auditor5_WithoutState, Page\AuditOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor3_Prog1_Prog2));
        $I->wait(3);
    }
    
    //------------Create Audit Organization With Program1 & Program2------------
    
    public function CreateAuditOrganization_Program1_Program2(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_1_2_Pol_Gen_Sol_Wat = $I->GenerateNameOf('AuditOrg_Prog1_Prog2_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
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
        $I->wait(2);
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
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Water_AuditGroup));
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
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
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor1_Prog1));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
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
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor2_Prog2));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
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
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->fullName_Auditor3_Prog1_Prog2));
        $I->wait(3);
    }
    
    //----------------Create Audit Organization Without Programs----------------
    
    public function CreateAuditOrganization_WithoutPrograms(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_WithoutProgram_En_Pol_Gen_Sol = $I->GenerateNameOf('AuditOrg_WithoutProgs_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(2);
    }
    
    //-----------------Create Audit Organization Without Auditors---------------
    
    public function CreateAuditOrganization_WithoutAuditors(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganiz_WithoutAuditors_En_Pol_Gen_Sol = $I->GenerateNameOf('AuditOrg_WithoutAuditors_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(6);
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
        $I->wait(2);
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
        $I->wait(2);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::PollutionPrevention_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->wait(3);
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(4);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, 150);
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(5);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(2);
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
        $firstName           = $this->firstName_Inspector4_WithoutProgram = $I->GenerateNameOf('firnam');
        $lastName            = $this->lastName_Inspector4_WithoutProgram = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $this->phone_Inspector4_WithoutProgram = $I->GeneratePhoneNumber();
        $this->fullName_Inspector4_WithoutProgram = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(3);
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
        $I->wait(3);
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
        $I->wait(6);
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
        $I->wait(3);
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
        $I->wait(6);
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
        $I->wait(3);
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
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(6);
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
        $I->wait(6);
        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->wait(2);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->click(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm);
        $I->wait(1);
        $I->cantSeeElement(Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->moveBack();
        $I->wait(2);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton, 150);
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
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
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
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->canSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector1_Prog1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector1_Prog1));
        $I->wait(3);
    }
    
    //---------------Create Inspector Organization With Program2--------------------
    
    public function CreateInspectorOrganization_Program2(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_2_C1_C2 = $I->GenerateNameOf('InspOrg_Prog2_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(6);
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
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
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
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
        $I->wait(3);
    }
    
    //------------Create Inspector Organization With Program1 & Program2------------
    
    public function CreateInspectorOrganization_Program1_Program2(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_1_2_C2_C4 = $I->GenerateNameOf('InspOrg_Prog1_Prog2_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(6);
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
        $I->wait(2);
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
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->canSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector1_Prog1);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
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
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector2_Prog2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 150);
        $I->cantSee($this->fullName_Inspector1_Prog1, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector2_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->canSee($this->fullName_Inspector3_Prog1_Prog2, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector4_WithoutProgram, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->cantSee($this->fullName_Inspector5_WithoutState, Page\InspectorOrganizationUpdate::$MemberOption_AddMemberForm);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector3_Prog1_Prog2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->fullName_Inspector3_Prog1_Prog2));
        $I->wait(3);
    }
    
    //----------------Create Inspector Organization Without Programs----------------
    
    public function CreateInspectorOrganization_WithoutPrograms(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_WithoutProgs_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
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
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4));
        $I->wait(3);
    }
    
    //-----------------Create Inspector Organization Without Auditors---------------
    
    public function CreateInspectorOrganization_WithoutAuditors(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4 = $I->GenerateNameOf('InspOrg_WithoutInspectors_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(6);
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
        $I->wait(2);
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
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck1));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck2);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck2));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck3_Created);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck3_Created));
        $I->wait(3);
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(4);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 150);
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->complCheck4);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(5);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->wait(1);
        $I->reloadPage();
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->complCheck4));
        $I->wait(3);
    }
    
    
    
    
    
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function Help_Business1Registration_Program1(Step\Acceptance\Business $I)
    {
        $firstName        = $this->firstName_Business1 = $I->GenerateNameOf("firnam");
        $lastName         = $this->lastName_Business1 = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->phone_Business1 = $I->GeneratePhoneNumber();
        $email            = $this->email_Business1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
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
        $I->wait(15);
    }
    
    public function Help_LogOutFromBusiness1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function Help_Business2Registration_Program2(Step\Acceptance\Business $I)
    {
        $firstName        = $this->firstName_Business2 = $I->GenerateNameOf("firnam");
        $lastName         = $this->lastName_Business2 = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->phone_Business2 = $I->GeneratePhoneNumber();
        $email            = $this->email_Business2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("busnam");
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
        $I->wait(15);
    }
    
    public function Help_LogOutFromBusiness2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function Help_GoToBusinessViewPage_GetBusiness1Id(AcceptanceTester $I){
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_bus1 = $u1[1];
        $I->comment("Business1 id: $this->id_bus1");
    }
    
    public function Help_GoToBusinessViewPage_GetBusiness2Id(AcceptanceTester $I){
        $I->wait(1);
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url1: $url2");
        $u2 = explode('=', $url2);
        $this->id_bus2 = $u2[1];
        $I->comment("Business2 id: $this->id_bus2");
    }
    
    public function CheckAuditPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus1));
        $I->wait(8);
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
        $I->wait(8);
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
        $I->wait(8);
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->comment("-----Check correct compliance check types shows in popup-----");
        $I->comment("CompCheck1 = $this->complCheck1");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck1));
        $I->comment("CompCheck1 = $this->complCheck2");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck2));
        $I->comment("CompCheck1 = $this->complCheck3_Created");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck3_Created));
        $I->comment("CompCheck1 = $this->complCheck4");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck4));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1), $this->inspOrganiz_1_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2), $this->inspOrganiz_1_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck3_Created));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector5_WithoutState));
    }
    
    public function CheckInspectorPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_bus2));
        $I->wait(8);
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 150, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->comment("-----Check correct compliance check types shows in popup-----");
        $I->comment("CompCheck1 = $this->complCheck1");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck1));
        $I->comment("CompCheck1 = $this->complCheck2");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck2));
        $I->comment("CompCheck1 = $this->complCheck3_Created");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck3_Created));
        $I->comment("CompCheck1 = $this->complCheck4");
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->complCheck4));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_1_2_C2_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck1, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1), $this->inspOrganiz_2_C1_C2);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1 shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck1), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck1-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck1, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_1_2_C2_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck2, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2), $this->inspOrganiz_1_2_C2_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2), $this->inspOrganiz_2_C1_C2);
        $I->wait(3);
        $I->comment("-Check correct users from Organization2 shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck2), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck2-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck2, $this->fullName_Inspector5_WithoutState));
        
        $I->comment("-Check correct inspector Organizations shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_1_2_C2_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck3_Created, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck3_Created), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck3-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck3_Created));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck3_Created, $this->fullName_Inspector5_WithoutState));
    
        $I->comment("-Check correct inspector Organizations shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4, $this->inspOrganiz_1_C1_C2_C3_C4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4, $this->inspOrganiz_1_2_C2_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4, $this->inspOrganiz_2_C1_C2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4, $this->inspOrganiz_WithoutProgram_C1_C2_C3_C4));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationOptiomByName($this->complCheck4, $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4), $this->inspOrganiz_2_C1_C2);
        $I->wait(3);
        $I->comment("-Check correct users from Organization1_2 shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector1_Prog1));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector3_Prog1_Prog2));
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector5_WithoutState));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->complCheck4), $this->inspOrganiz_WithoutInspectors_C1_C2_C3_C4);
        $I->wait(3);
        $I->comment("-Check correct users from Organization without inspectors shows for CompCheck4-");
        $I->click(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->complCheck4));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector1_Prog1));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector3_Prog1_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector2_Prog2));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector4_WithoutProgram));
        $I->cantSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorOptionByName($this->complCheck4, $this->fullName_Inspector5_WithoutState));
        
    }
}
