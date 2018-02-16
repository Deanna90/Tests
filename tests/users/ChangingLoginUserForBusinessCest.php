<?php


class ChangingLoginUserForBusinessCest
{
    public $state, $program1, $program2, $idState, $county, $idCity1, $idCity2, $idProg2, $sector1, $sector2, $sector3, $city1, $city2, $zip1, $zip2;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $idMeasure1, $measure1Desc; 
    public $measuresDesc_SuccessCreated = [];
    public $checklistUrl1, $id_checklist1, $checklistUrl2, $id_checklist2;
    public $statuses                  = ['core'];
    public $business1, $id_business1, $email_Business1, $firstName_Business1, $lastName_Business1;
    public $business2, $id_business2, $email_Business2, $firstName_Business2, $lastName_Business2;
    

    public $emailStateAdmin1, $emailStateAdmin2, $emailStateAdmin3_WithoutState, 
           $emailCoordinator1_Prog1, $emailCoordinator2_Prog2, $emailCoordinator3_Prog1_Prog2, $emailCoordinator4_WithoutProgram, $emailCoordinator5_WithoutState, 
           $emailInspector1_Prog1, $emailInspector2_Prog2, $emailInspector3_Prog1_Prog2, $emailInspector4_WithoutProgram, $emailInspector5_WithoutState,
           $emailAuditor1_Prog1, $emailAuditor2_Prog2, $emailAuditor3_Prog1_Prog2, $emailAuditor4_WithoutProgram, $emailAuditor5_WithoutState;
    
    public $firstName_StateAdmin1, $firstName_StateAdmin2, $firstName_StateAdmin3_WithoutState, 
           $firstName_Coordinator1_Prog1, $firstName_Coordinator2_Prog2, $firstName_Coordinator3_Prog1_Prog2, $firstName_Coordinator4_WithoutProgram, $firstName_Coordinator5_WithoutState,
           $firstName_Inspector1_Prog1, $firstName_Inspector2_Prog2, $firstName_Inspector3_Prog1_Prog2, $firstName_Inspector4_WithoutProgram, $firstName_Inspector5_WithoutState,
           $firstName_Auditor1_Prog1, $firstName_Auditor2_Prog2, $firstName_Auditor3_Prog1_Prog2, $firstName_Auditor4_WithoutProgram, $firstName_Auditor5_WithoutState;
    
    public $lastName_StateAdmin1, $lastName_StateAdmin2, $lastName_StateAdmin3_WithoutState, 
           $lastName_Coordinator1_Prog1, $lastName_Coordinator2_Prog2, $lastName_Coordinator3_Prog1_Prog2, $lastName_Coordinator4_WithoutProgram, $lastName_Coordinator5_WithoutState,
           $lastName_Inspector1_Prog1, $lastName_Inspector2_Prog2, $lastName_Inspector3_Prog1_Prog2, $lastName_Inspector4_WithoutProgram, $lastName_Inspector5_WithoutState,
           $lastName_Auditor1_Prog1, $lastName_Auditor2_Prog2, $lastName_Auditor3_Prog1_Prog2, $lastName_Auditor4_WithoutProgram, $lastName_Auditor5_WithoutState;
    
    public $idStateAdmin1, $idStateAdmin2, $idStateAdmin3_WithoutState, 
           $idCoordinator1_Prog1, $idCoordinator2_Prog2, $idCoordinator3_Prog1_Prog2, $idCoordinator4_WithoutProgram, $idCoordinator5_WithoutState, 
           $idInspector1_Prog1, $idInspector2_Prog2, $idInspector3_Prog1_Prog2, $idInspector4_WithoutProgram, $idInspector5_WithoutState, 
           $idAuditor1_Prog1, $idAuditor2_Prog2, $idAuditor3_Prog1_Prog2, $idAuditor4_WithoutProgram, $idAuditor5_WithoutState;
    
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
        $name = $this->state = $I->GenerateNameOf("StAllUsers");
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
    
    public function Help_CreateMeasure1_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 ");
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
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //----------------------------Create checklist------------------------------
    
    
    public function Help_CreateChecklistForTier2_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $this->checklistUrl1 = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrl1");
        $u1 = explode('=', $this->checklistUrl1);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist1 = $u2[0];
        $I->comment("Tier2 checklist id: $this->id_checklist1");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist1));
        $I->PublishChecklistStatus();
    }
    
    public function Help_CreateChecklistForTier2_Program2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $this->checklistUrl2 = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrl2");
        $u1 = explode('=', $this->checklistUrl2);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist2 = $u2[0];
        $I->comment("Tier2 checklist id: $this->id_checklist2");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist2));
        $I->PublishChecklistStatus();
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
        $phoneNumber      = $I->GeneratePhoneNumber();
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
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Business2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("busnam");
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
    
    public function Help_LogOutFromBusiness2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    //---------------------------Create State Admin1-----------------------------
    
    public function CreateStateAdmin1_ForCreatedState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin1 = $I->GenerateEmail();
        $firstName = $this->firstName_StateAdmin1 = $I->GenerateNameOf('firnam');
        $lastName  = $this->lastName_StateAdmin1 = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin1 = $stateAdmin['id'];
    }
    
    //---------------------------Create State Admin2-----------------------------
    
    public function CreateStateAdmin2_ForCreatedState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin2 = $I->GenerateEmail();
        $firstName = $this->firstName_StateAdmin2 = $I->GenerateNameOf('firnam');
        $lastName  = $this->lastName_StateAdmin2 = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin2 = $stateAdmin['id'];
    }
    
    //---------------------------Create State Admin3 without state-----------------------------
    
    public function CreateStateAdmin3_WithoutState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin3_WithoutState = $I->GenerateEmail();
        $firstName = $this->firstName_StateAdmin3_WithoutState = $I->GenerateNameOf('firnam');
        $lastName  = $this->lastName_StateAdmin3_WithoutState = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
        $I->wait(2);
        $I->amOnPage(\Page\UserList::URL($userType));
        $I->wait(2);
        $I->cantSee($email, \Page\UserList::$EmailRow);
        $I->wait(2);
        $I->SelectDefaultState($I, "All States");
        $I->wait(2);
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idStateAdmin3_WithoutState = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Coordinator without state-----------------------
    
    public function CreateCoordinatorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator5_WithoutState = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'off');
        $I->waitForElement(".confirm", 50);
        $I->wait(2);
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idCoordinator5_WithoutState = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Coordinator without program-------------------
    
    public function CreateCoordinatorUser_WithoutProgram(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator4_WithoutProgram = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'off');
        $I->waitForElement(".confirm", 50);
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
        $this->idCoordinator4_WithoutProgram = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    public function CreateCoordinatorUser_Program1(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator1_Prog1 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'on');
        $I->waitForElement(".confirm", 50);
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
        $this->idCoordinator1_Prog1 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    public function CreateCoordinatorUser_Program2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator2_Prog2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'on');
        $I->waitForElement(".confirm", 50);
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
        $this->idCoordinator2_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    public function CreateCoordinatorUser_Program1_Program2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator3_Prog1_Prog2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'on');
        $I->waitForElement(".confirm", 50);
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
        $I->wait(4);
        $I->SearchUserByEmailOnPageInList($userType, $email);
        $this->idCoordinator3_Prog1_Prog2 = $I->grabTextFrom(\Page\UserList::IdLine(1));
    }
    
    //---------------------Create Inspector without state-----------------------
    
    public function CreateInspectorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::inspectorType;
        $email               = $this->emailInspector5_WithoutState = $I->GenerateEmail();
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
//        $this->nameInspector = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
//        $this->nameInspector = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
//        $this->nameInspector = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
//        $this->nameInspector = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
//        $this->nameInspector = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
    
    //----------------------Create Auditor without state------------------------
    
    public function CreateAuditorUser_WithoutState(Step\Acceptance\User $I)
    {
        $userType            = Page\UserCreate::auditorType;
        $email               = $this->emailAuditor5_WithoutState = $I->GenerateEmail();
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
//        $this->nameInspector = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
        $firstName           = $I->GenerateNameOf('firnam');
        $lastName            = $I->GenerateNameOf('lastnam');
        $password            = $confirmPassword = $this->password;
        $phone               = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 50);
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
    
    
    
    public function CheckAllUsersListPage_AllStatesSelected(\Step\Acceptance\User $I)
    {
        $userType         = Page\UserCreate::allType;
        $status           = 'active';
        $stateAdmin_type  = 'state admin';
        $coordinator_type = 'coordinator';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        $business_type    = 'business';
                
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        
        //Business user 1 present
        $I->comment("-------------------Business1 user PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->email_Business1, $this->firstName_Business1, $this->lastName_Business1, $status, $business_type, $this->todayDate);
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->canSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Business user 2 present
        $I->comment("-------------------Business2 user PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->email_Business2, $this->firstName_Business2, $this->lastName_Business2, $status, $business_type, $this->todayDate);
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->canSeeElement(\Page\UserList::ViewButtonLine(1));
        
        $I->comment("-------------------Master admin ABSENT-------------------");
        $I->wait(1);
        $I->fillField(\Page\UserList::$ByNameEmailSearchField, USER_EMAIL);
        $I->wait(1);
        $I->pressKey(\Page\UserList::$ByNameEmailSearchField, \WebDriverKeys::ENTER);
        $I->wait(5);
        $I->cantSeeElement(\Page\UserList::$EmailRow);
        
        //State admin 1 present
        $I->comment("-------------------State admin1 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailStateAdmin1, $this->firstName_StateAdmin1, $this->lastName_StateAdmin1, $status, $stateAdmin_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //State admin 2 present
        $I->comment("-------------------State admin2 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailStateAdmin2, $this->firstName_StateAdmin2, $this->lastName_StateAdmin2, $status, $stateAdmin_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //State admin 3 present
        $I->comment("-------------------State admin3 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailStateAdmin3_WithoutState, $this->firstName_StateAdmin3_WithoutState, $this->lastName_StateAdmin3_WithoutState, $status, $stateAdmin_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Coordinator 1 present
        $I->comment("-------------------Coordinator1 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailCoordinator1_Prog1, $this->firstName_Coordinator1_Prog1, $this->lastName_Coordinator1_Prog1, $status, $coordinator_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Coordinator 2 present
        $I->comment("-------------------Coordinator2 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailCoordinator2_Prog2, $this->firstName_Coordinator2_Prog2, $this->lastName_Coordinator2_Prog2, $status, $coordinator_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Coordinator 3 present
        $I->comment("-------------------Coordinator3 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailCoordinator3_Prog1_Prog2, $this->firstName_Coordinator3_Prog1_Prog2, $this->lastName_Coordinator3_Prog1_Prog2, $status, $coordinator_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Coordinator 4 present
        $I->comment("-------------------Coordinator4 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailCoordinator4_WithoutProgram, $this->firstName_Coordinator4_WithoutProgram, $this->lastName_Coordinator4_WithoutProgram, $status, $coordinator_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Coordinator 5 present
        $I->comment("-------------------Coordinator5 PRESENT------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailCoordinator5_WithoutState, $this->firstName_Coordinator5_WithoutState, $this->lastName_Coordinator5_WithoutState, $status, $coordinator_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Inspector 1 present
        $I->comment("--------------------Inspector1 PRESENT-------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailInspector1_Prog1, $this->firstName_Inspector1_Prog1, $this->lastName_Inspector1_Prog1, $status, $inspector_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Inspector 2 present
        $I->comment("--------------------Inspector2 PRESENT-------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailInspector2_Prog2, $this->firstName_Inspector2_Prog2, $this->lastName_Inspector2_Prog2, $status, $inspector_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Inspector 3 present
        $I->comment("--------------------Inspector3 PRESENT-------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailInspector3_Prog1_Prog2, $this->firstName_Inspector3_Prog1_Prog2, $this->lastName_Inspector3_Prog1_Prog2, $status, $inspector_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Inspector 4 present
        $I->comment("--------------------Inspector4 PRESENT-------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailInspector4_WithoutProgram, $this->firstName_Inspector4_WithoutProgram, $this->lastName_Inspector4_WithoutProgram, $status, $inspector_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Inspector 5 present
        $I->comment("--------------------Inspector5 PRESENT-------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailInspector5_WithoutState, $this->firstName_Inspector5_WithoutState, $this->lastName_Inspector5_WithoutState, $status, $inspector_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Auditor 1 present
        $I->comment("---------------------Auditor1 PRESENT--------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailAuditor1_Prog1, $this->firstName_Auditor1_Prog1, $this->lastName_Auditor1_Prog1, $status, $auditor_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Auditor 2 present
        $I->comment("---------------------Auditor2 PRESENT--------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailAuditor2_Prog2, $this->firstName_Auditor2_Prog2, $this->lastName_Auditor2_Prog2, $status, $auditor_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Auditor 3 present
        $I->comment("---------------------Auditor3 PRESENT--------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailAuditor3_Prog1_Prog2, $this->firstName_Auditor3_Prog1_Prog2, $this->lastName_Auditor3_Prog1_Prog2, $status, $auditor_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Auditor 4 present
        $I->comment("---------------------Auditor4 PRESENT--------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailAuditor4_WithoutProgram, $this->firstName_Auditor4_WithoutProgram, $this->lastName_Auditor4_WithoutProgram, $status, $auditor_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
        
        //Auditor 5 present
        $I->comment("---------------------Auditor5 PRESENT--------------------");
        $I->SearchUserByEmailOnPageInList($userType, $this->emailAuditor5_WithoutState, $this->firstName_Auditor5_WithoutState, $this->lastName_Auditor5_WithoutState, $status, $auditor_type, $this->todayDate);
        $I->canSeeElement(\Page\UserList::UpdateButtonLine(1));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine(1));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine(1));
    }
    
    public function NationalAdmin1_2_SelectDefaultState2(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function NationalAdmin1_7_CheckAllUsersListPage_StateSelected(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $stateAdmin_type  = 'state admin';
        $coordinator_type = 'coordinator';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        $business_type    = 'business';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        $I->canSee('16', Page\UserList::$SummaryCount);
        
        //Business 1 user present
        $I->comment("-------------------Business user1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->email_Business1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->email_Business1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Business1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Business1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($business_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Business 2 user present
        $I->comment("-------------------Business user2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->email_Business2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->email_Business2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Business2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Business2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($business_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------------------Master admin ABSENT-------------------");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        //State admin 1 present
        $I->comment("-------------------State admin1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailStateAdmin1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailStateAdmin1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_StateAdmin1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_StateAdmin1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($stateAdmin_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //State admin 2 present
        $I->comment("-------------------State admin2 PRESENT------------------");
        $user2 = $I->GetUserOnPageInList($this->emailStateAdmin2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailStateAdmin2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_StateAdmin2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_StateAdmin2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($stateAdmin_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //State admin 3 absent
        $I->comment("-------------------State admin3 ABSENT------------------");
        $I->cantSee($this->emailStateAdmin3_WithoutState, \Page\UserList::$EmailRow);
        
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
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Coordinator 2 present
        $I->comment("-------------------Coordinator2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailCoordinator2_Prog2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailCoordinator2_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator2_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator2_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($coordinator_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
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
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Coordinator 4 present
        $I->comment("-------------------Coordinator4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailCoordinator4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailCoordinator4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($coordinator_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
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
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
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
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
        
        $count = $I->getAmount($I, \Page\UserList::$EmailRow);
        $I->assertEquals('16', $count);
    }
    
    public function Help_LogOut_LogInAsStateAdmin1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin1, $this->password, $I, 'state admin');
    }
    
    public function StateAdmin1_CheckAllUsersListPage_StateSelected(\Step\Acceptance\User $I)
    {
        $status           = 'active';
        $stateAdmin_type  = 'state admin';
        $coordinator_type = 'coordinator';
        $inspector_type   = 'inspector';
        $auditor_type     = 'auditor';
        $business_type    = 'business';
        
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        $I->canSee('12', Page\UserList::$SummaryCount);
        
        //Business 1 user present
        $I->comment("-------------------Business user1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->email_Business1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->email_Business1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Business1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Business1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($business_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Business 2 user present
        $I->comment("-------------------Business user2 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->email_Business2, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->email_Business2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Business2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Business2, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($business_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------------------Master admin ABSENT-------------------");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        //State admin 1 present
        $I->comment("-------------------State admin1 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailStateAdmin1, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailStateAdmin1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_StateAdmin1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_StateAdmin1, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($stateAdmin_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //State admin 2 present
        $I->comment("--------------------State admin2 ABSENT------------------");
        $I->cantSee($this->emailStateAdmin2, \Page\UserList::$EmailRow);
        
        //State admin 3 absent
        $I->comment("-------------------State admin3 ABSENT------------------");
        $I->cantSee($this->emailStateAdmin3_WithoutState, \Page\UserList::$EmailRow);
        
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
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Coordinator 2 present
        $I->comment("-------------------Coordinator2 PRESENT------------------");
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
        
        //Coordinator 4 present
        $I->comment("-------------------Coordinator4 PRESENT------------------");
        $user1 = $I->GetUserOnPageInList($this->emailCoordinator4_WithoutProgram, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailCoordinator4_WithoutProgram, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator4_WithoutProgram, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator4_WithoutProgram, \Page\UserList::LastNameLine($row));
        $I->canSee($status, \Page\UserList::StatusLine($row));
        $I->canSee($coordinator_type, \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
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
        $I->comment("-------------------Inspector2 PRESENT------------------");
        $I->cantSee($this->emailInspector2_Prog2, \Page\UserList::$EmailRow);
        
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
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
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
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
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
        $I->comment("-------------------Auditor2 PRESENT------------------");
        $I->cantSee($this->emailAuditor2_Prog2, \Page\UserList::$EmailRow);
        
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
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
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
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        //Auditor 5 absent
        $I->comment("-------------------Auditor5 ABSENT------------------");
        $I->cantSee($this->emailAuditor5_WithoutState, \Page\UserList::$EmailRow);
        
        $count = $I->getAmount($I, \Page\UserList::$EmailRow);
        $I->assertEquals('12', $count);
    }
}
