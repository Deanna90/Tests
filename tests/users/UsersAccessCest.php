<?php


class UsersAccessCest
{
    public $state, $program1, $program2, $idState, $idCity1, $idCity2, $idProg2, $sector_Coordinator, $sector_StateAdmin, $sector_Update, $city1, $city2, $zip1, $zip2;
    public $audSubgroup1_Energy, $idSubgroup1_Energy;
    public $measureDesc1_Coordinator, $measureDesc2_Coordinator, $measureDesc3_Coordinator;
    public $idMeasure1_Coordinator, $idMeasure2_Coordinator, $idMeasure3_Coordinator;
    public $measureDesc1_StateAdmin, $measureDesc2_StateAdmin, $measureDesc3_StateAdmin, $measureDesc4_StateAdmin, $measureDesc5_StateAdmin, $measureDesc6_StateAdmin, 
            $measureDesc7_StateAdmin, $measureDesc8_StateAdmin, $measureDesc9_StateAdmin;
    public $idMeasure1_StateAdmin, $idMeasure2_StateAdmin, $idMeasure3_StateAdmin, $idMeasure4_StateAdmin, $idMeasure5_StateAdmin, $idMeasure6_StateAdmin, 
            $idMeasure7_StateAdmin, $idMeasure8_StateAdmin, $idMeasure9_StateAdmin;
    public $grTip1_Coordinator, $grTip2_Coordinator;
    public $grTip1_Stateadmin, $grTip2_UpdateCoordinator;
    public $InspectorOrganization1_Coordinator, $AuditOrganization1_Coordinator;
    public $statusesT1_Coordinator        = ['core',  'core',  'elective'];
    public $extensionsT1_Coordinator      = ['Default',         'Large Landscape',   'Default'];
    public $emailStateAdmin, $emailCoordinator1, $emailCoordinator2, $emailInspector, $emailAuditor;
    public $idStateAdmin, $idCoordinator1, $idCoordinator2, $idInspector, $idAuditor;
    public $nameInspector, $nameAuditor;
    public $mainMenu_NationalAdmin = ['Dashboard', 'Programs', 'Measures', 'Green Tips', 'Checklists', 'Tiers', 'Users', 'States', 'Notification', 'Reports', 'Resources', 'Video Tutorials'];
    public $mainMenu_StateAdmin    = ['Dashboard', 'Programs', 'Measures', 'Green Tips', 'Checklists', 'Tiers', 'Users', 'Notification', 'Reports'];
    public $mainMenu_Coordinator   = ['Dashboard', 'Sector', 'Measures', 'Green Tips', 'Checklists', 'Tier', 'Users', 'Communication', 'Video Tutorials', "Reports"];
    public $mainMenu_Auditor       = ['Dashboard', 'Video Tutorials'];
    public $mainMenu_Inspector     = ['Dashboard', 'Video Tutorials'];
    public $measuresDesc_SuccessCreated = [];
    public $password = 'Qq!1111111';
    public $business1, $business2, $business3;
    public $tier1Name, $tier2Name;

    //--------------------------------------------------------------------------Login As National Admin------------------------------------------------------------------------------------
    
    public function NationalAdmin1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function NationalAdmin1_1_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StUserAccess");
        $shortName = 'UA';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
        $this->mainMenu_NationalAdmin[] = $this->state;
        $this->mainMenu_StateAdmin[] = $this->state;
    }
    
   
    public function NationalAdmin1_2_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function NationalAdmin1_3_NationalAdminMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        for($i=0, $c= count($this->mainMenu_NationalAdmin); $i<$c; $i++){
            $I->canSee($this->mainMenu_NationalAdmin[$i], Page\MainMenu::$MenuItem);
        }
    }
    
    public function NationalAdmin1_4_CheckSubItemsInMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        //Programs item
        $I->click(\Page\MainMenu::selectMenuItemByName('Programs'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Cities"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Sectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Source Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Audit Groups"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Green Tips'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Audit Groups"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "EC"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Checklists"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
    }
    
    //---------------------------Create State Admin-----------------------------
    
    public function NationalAdmin1_5_CreateStateAdmin_ForCreatedState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
    
    public function StateAdmin2_LogOut_And_LogInAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //--------------------------------Main Menu---------------------------------
    public function StateAdmin2_1_StateAdminMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Video Tutorials', \Page\MainMenu::$MenuItem);
        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
        for($i=0, $c= count($this->mainMenu_StateAdmin); $i<$c; $i++){
            $I->canSee($this->mainMenu_StateAdmin[$i], Page\MainMenu::$MenuItem);
        }
    }
    
    public function StateAdmin2_2_CheckSubItemsInMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        //Programs item
        $I->click(\Page\MainMenu::selectMenuItemByName('Programs'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Cities"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Sectors"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Source Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Audit Groups"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Green Tips'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Audit Groups"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "EC"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Checklists"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->wait(1);
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
    }
    
    //-----------------------No ability to create state-------------------------
    public function StateAdmin2_3_1_StatesPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\StateList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\StateList::$CreateStateButton);
        $I->amOnPage(Page\StateCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\StateCreate::$NameField);
        $I->amOnPage(Page\StateUpdate::URL($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\StateUpdate::$NameField);
    }
    
    //-----------------No ability to create video tutorial----------------------
    public function StateAdmin2_3_2_VideoTutorialsPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\VideoTutorialsList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\VideoTutorialsList::$FilterByCategorySelect);
        $I->amOnPage(Page\VideoTutorialsCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\VideoTutorialsCreate::$TitleField);
        $I->amOnPage(Page\VideoTutorialsUpdate::URL('3'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\VideoTutorialsUpdate::$TitleField);
        $I->amOnPage(Page\VideoTutorialsView::URL('3'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\VideoTutorialsView::$Description);
    }
    
    //--------------------No ability to create source program-------------------
    public function StateAdmin2_3_3_SourceProgramsPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SourceProgramList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramList::$CreateSourceProgramButton);
        $I->amOnPage(Page\SourceProgramCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramCreate::$TitleField);
        $I->amOnPage(Page\SourceProgramUpdate::URL('2'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramUpdate::$TitleField);
    }
    
    //------------------No ability to create popup therm option-----------------
    public function StateAdmin2_3_4_PopupThermOptionPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\PopupThermOptionList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionList::$CreatePopupThermsOptionButton);
        $I->amOnPage(Page\PopupThermOptionCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionCreate::$NameField);
//        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
    }
    
    //-----------------------No ability to create points------------------------
    public function StateAdmin2_3_6_PointPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\WeightPointsList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsList::$NameLinkHead);
        $I->amOnPage(Page\WeightPointsCreate::URL_Sections($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsCreate::URL_YesOrNo($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsManage::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsManage::$CreateYesOrNoButton);
//        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
    }
    
    //----------------------No ability to create saving area--------------------
    public function StateAdmin2_3_7_SavingAreaPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SavingAreaList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaList::$CreateSavingAreaButton);
        $I->amOnPage(Page\SavingAreaCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaCreate::$NameField);
        $I->amOnPage(Page\SavingAreaUpdate::URL('1'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaUpdate::$NameField);
    }
    
    //----------------------No ability to create state admin--------------------
    public function StateAdmin2_3_8_StateAdminPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserList::$CreateUserButton);
        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserCreate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idStateAdmin));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
    }
    
    //----------------------No ability to create resource-----------------------
    public function StateAdmin2_3_9_ResourcesPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\ResourceList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceList::$CreateResourceButton);
        $I->amOnPage(Page\ResourceCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceCreate::$TitleField);
    }
    
    
    
    
    //------------------State Admin create Cities & Programs--------------------
    public function StateAdmin2_4_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityAccess1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgAccess1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function StateAdmin2_5_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityAccess2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgAccess2");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
        $cit = $I->GetCityOnPageInList($city);
        $this->idCity2 = $cit['id'];
        $prog = $Y->GetProgramOnPageInList($program);
        $this->idProg2 = $prog['id'];
    }
    
    //--------------------State admin create Audit Subgroups--------------------
    public function StateAdmin2_6_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $subgroup = $I->GetAuditSubgroupOnPageInList($name);
        $this->idSubgroup1_Energy = $subgroup['id'];
    }
    
    //---------------------State Admin Create Coordinator-----------------------
    
    public function StateAdmin2_7_CreateCoordinatorUserWithoutShowInfo_ForProgram2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator1 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'off');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator1 = $coordinator['id'];
    }
    
    public function StateAdmin2_8_CreateCoordinatorUserWithShowInfo_ForProgram2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'on');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator2 = $coordinator['id'];
    }
    
    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
    
    public function Coordinator3_LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
    }
    
    //--------------------------------Main Menu---------------------------------
    public function Coordinator3_1_CoordinatorMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
        $I->cantSee('Cities', \Page\MainMenu::$MenuItem);
        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
        for($i=0, $c= count($this->mainMenu_Coordinator); $i<$c; $i++){
            $I->canSee($this->mainMenu_Coordinator[$i], Page\MainMenu::$MenuItem);
        }
        $I->canSee('Prefer Program', Page\MainMenu::$MenuItem);
    }
    
    public function Coordinator3_2_CheckSubItemsInMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        //Sectors item
        $I->click(\Page\MainMenu::selectMenuItemByName('Sector'));
        $I->wait(1);
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Programs"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Cities"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Sectors"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Source Programs"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Audit Groups"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->wait(1);
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Green Tips'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Audit Groups"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->wait(1);
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "EC"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Checklists"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->wait(1);
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
        //Program drop down
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("$this->program2"));
        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("All Programs"));
    }
    
    //-----------------------No ability to create state-------------------------
    public function Coordinator3_3_1_StatesPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\StateList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\StateList::$CreateStateButton);
        $I->amOnPage(Page\StateCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\StateCreate::$NameField);
        $I->amOnPage(Page\StateUpdate::URL($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\StateUpdate::$NameField);
    }
    
    //-----------------------No ability to create city-------------------------
    public function Coordinator3_3_2_CitiesPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\CityList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\CityList::$CreateCityButton);
        $I->amOnPage(Page\CityCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\CityCreate::$NameField);
        $I->amOnPage(Page\CityUpdate::URL($this->idCity2));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\CityUpdate::$NameField);
    }
    
    //-----------------------No ability to create program-----------------------
    public function Coordinator3_3_3_ProgramsPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\ProgramList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ProgramList::$CreateProgramButton);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ProgramCreate::$NameField);
        $I->amOnPage(Page\ProgramUpdate::URL($this->idProg2));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ProgramUpdate::$NameField);
    }
    
    //--------------------No ability to create audit group----------------------
    public function Coordinator3_3_4_AuditGroupsPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\AuditGroupList::URL());
        $I->canSeePageNotFound($I);
        $I->amOnPage(\Page\AuditGroupCreate::URL());
        $I->canSeePageNotFound($I);
        $I->amOnPage(\Page\AuditGroupUpdate::URL('2'));
        $I->canSeePageNotFound($I);
    }
    
    //--------------------No ability to create audit subgroup----------------------
    public function Coordinator3_3_5_AuditSubgroupsPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\AuditSubgroupList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\AuditSubgroupList::$CreateAuditSubgroupButton);
        $I->amOnPage(Page\AuditSubgroupCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\AuditSubgroupCreate::$NameField);
        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
    }
    
    //-----------------No ability to create video tutorial----------------------
    public function Coordinator3_3_6_VideoTutorialsPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\VideoTutorialsList::URL());
        $I->canSeeElement(Page\VideoTutorialsList::$FilterByCategorySelect);
        $I->amOnPage(Page\VideoTutorialsCreate::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\VideoTutorialsCreate::$TitleField);
        $I->amOnPage(Page\VideoTutorialsUpdate::URL('3'));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\VideoTutorialsUpdate::$TitleField);
        $I->amOnPage(Page\VideoTutorialsView::URL('3'));
        $I->canSeeElement(Page\VideoTutorialsView::$Description);
    }
    
    //----------------------No ability to create resource-----------------------
    public function Coordinator3_3_7_ResourcesPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\ResourceList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceList::$CreateResourceButton);
        $I->amOnPage(Page\ResourceCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceCreate::$TitleField);
//        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
    }
    
    //--------------------No ability to create source program-------------------
    public function Coordinator3_3_8_SourceProgramsPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SourceProgramList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramList::$CreateSourceProgramButton);
        $I->amOnPage(Page\SourceProgramCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramCreate::$TitleField);
        $I->amOnPage(Page\SourceProgramUpdate::URL('2'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramUpdate::$TitleField);
    }
    
    //------------------No ability to create popup therm option-----------------
    public function Coordinator3_3_9_PopupThermOptionPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\PopupThermOptionList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionList::$CreatePopupThermsOptionButton);
        $I->amOnPage(Page\PopupThermOptionCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionCreate::$NameField);
//        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
    }
    
    //----------------No ability to create popup lighting option----------------
    public function Coordinator3_3_10_PopupLightingOptionPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\PopupLighting_BuildingTypesList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_BuildingTypesList::$CreateBuildingTypeButton);
        $I->amOnPage(Page\PopupLighting_BuildingTypesCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_BuildingTypesCreate::$NameField);
        $I->amOnPage(Page\PopupLighting_BuildingTypesUpdate::URL('1'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_BuildingTypesUpdate::$NameField);
    }
    
    //-----------------------No ability to create points------------------------
    public function Coordinator3_3_11_PointPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\WeightPointsList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsList::$NameLinkHead);
        $I->amOnPage(Page\WeightPointsCreate::URL_Sections($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsCreate::URL_YesOrNo($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsManage::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsManage::$CreateYesOrNoButton);
//        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_12_SavingAreaPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SavingAreaList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaList::$CreateSavingAreaButton);
        $I->amOnPage(Page\SavingAreaCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaCreate::$NameField);
        $I->amOnPage(Page\SavingAreaUpdate::URL('1'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaUpdate::$NameField);
    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_13_GlobalVariablePages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\GlobalVariableList::$CreateGlobalVariableButton);
        $I->amOnPage(Page\GlobalVariableCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\GlobalVariableCreate::$NameField);
        $I->amOnPage(Page\GlobalVariableUpdate::URL('3'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\GlobalVariableUpdate::$NameField);
    }
    
    //----------------------No ability to create state admin--------------------
    public function Coordinator2_3_14_StateAdminPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserList::$CreateUserButton);
        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserCreate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idStateAdmin));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
    }
    
    //----------------------No ability to create state admin--------------------
    public function Coordinator2_3_15_CoordinatorPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::coordinatorType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserList::$CreateUserButton);
        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserCreate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idCoordinator1));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idCoordinator2));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_16_ECPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\EssentialCriteriaList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\EssentialCriteriaList::$CreateECButton);
        $I->amOnPage(Page\EssentialCriteriaCreate::URL($this->idState));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\EssentialCriteriaCreate::$NumberSelect);
    }
    
    //----------------------No ability to create saving area--------------------
//    public function Coordinator3_3_17_NotificationPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\AuditSubgroupList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupList::$CreateAuditSubgroupButton);
//        $I->amOnPage(Page\AuditSubgroupCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupCreate::$NameField);
//        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
//    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_18_ComplianceCheckTypePages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\ComplianceCheckTypeList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ComplianceCheckTypeList::$CreateComplianceCheckTypeButton);
        $I->amOnPage(Page\ComplianceCheckTypeCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ComplianceCheckTypeCreate::$NameField);
//        $I->amOnPage(Page\AuditSubgroupUpdate::URL($this->idSubgroup1_Energy));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\AuditSubgroupUpdate::$NameField);
    }
    
//    
//    //-----------------------Coordinator Create Sector--------------------------
//    public function Help1_3_CreateSector(\Step\Acceptance\Sector $I) {
//        $sector  = $this->sector_Coordinator = $I->GenerateNameOf("SectAcCoord");
//        $state   = $this->state;
//        $program = $this->program2;
//        
//        $I->amOnPage(\Page\SectorCreate::URL()."?state_id=$this->idState");
//        $I->wait(2);
//        $I->waitForElement(\Page\SectorCreate::$NameField);
//        $I->fillField(\Page\SectorCreate::$NameField, $sector);
//        $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
//        $I->wait(1);
//        $I->selectOption(\Page\SectorCreate::$ProgramSelect, $program);
//        $I->wait(1);
//        $I->click(\Page\SectorCreate::$CreateButton);
//        $I->wait(1);
//    }
//    
////    public function Help1_2_SelectDefaultProgram_AllPrograms(AcceptanceTester $I)
////    {
////        $I->wait(2);
////        $I->SelectDefaultState($I, 'All Programs');
////    }
//    
//    //---------------Coordinator Create Not Quantitative Measures---------------
//    public function Coordinator_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc1_Coordinator = $I->GenerateNameOf("Description Created by Coordinator");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'no';
//        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
//        $questions       = ['ques1?', 'ques2?', 'ques3?'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->wait(1);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(2);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(2);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure1_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    
//    
//    public function Coordinator_CreateMeasure_NotQuantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc2_Coordinator = $I->GenerateNameOf("Description Created by Coordinator");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'no';
//        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
//        $questions       = ['What is your favourite color?'];
//        $answers         = ['Grey', 'Green', 'Red'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
//        $I->wait(1);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(2);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(2);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($this->measureDesc2_Coordinator)); 
//        $this->idMeasure2_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//   
//    public function Coordinator_CreateMeasure_NotQuantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc3_Coordinator = $I->GenerateNameOf("Description Created by Coordinator");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'no';
//        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(6);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(2);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure3_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    //-----------------Coordinator create Green Tips for measures---------------
//    public function Coordinator_CreateGreenTipForMeasure1(\Step\Acceptance\GreenTipForMeasure $I) {
//        $descMeasure = $this->measureDesc1_Coordinator;
//        $descGT      = $this->grTip1_Coordinator = $I->GenerateNameOf("GT1_Coordinator");
//        $program     = [$this->program2];
//        
//        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1_Coordinator));
//        $I->wait(2);
//        $I->CreateMeasureGreenTip($descGT, $program);
//        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1_Coordinator));
//        $I->wait(2);
//        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
//    }
//    
//    public function Coordinator_CreateGreenTipForMeasure2(\Step\Acceptance\GreenTipForMeasure $I) {
//        $descMeasure = $this->measureDesc2_Coordinator;
//        $descGT      = $this->grTip2_Coordinator = $I->GenerateNameOf("GT2_Coordinator");
//        $program     = [$this->program2];
//        
//        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2_Coordinator));
//        $I->wait(2);
//        $I->CreateMeasureGreenTip($descGT, $program);
//        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2_Coordinator));
//        $I->wait(2);
//        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
//    }
//    
//    //------------------Coordinator create Checklist For Tier 1-----------------
//    public function Coordinator_CreateChecklistForTier1_MeasuresAreAbsent(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
//        $programDestination = $this->program2;
//        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
//        $tier               = '1';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->cantSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
//        $I->cantSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
//        $I->cantSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
//    }
//    
//    //-------------------------Coordinator activate Tier 1----------------------
//    public function Coordinator_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
//        $program    = $this->program2;
//        $tier1      = '1';
//        $tier1Name  = $this->tier1Name = "tiername1_Coordinator";
//        $tier1Desc  = 'tier desc update by coordinator';
//        $tier1OptIn = 'yes';
//        
//        $I->amOnPage(Page\TierManage::URL());
//        $I->wait(1);
//        $I->canSee($program, Page\TierManage::$ProgramOption);
//        $I->cantSee($this->program1, Page\TierManage::$ProgramOption);
//        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
//        $I->wait(2);
//        $I->canSee('Tier 1', Page\TierManage::$Tier1Button_LeftMenu);
//        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
//        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
//        $I->ManageTiers($program, $tier1='1', $tier1Name, $tier1Desc, $tier1OptIn);
//    }
//    
//    //---------------------Coordinator create Inspector-------------------------
//    
//    public function Help1_6_CreateInspectorUser(Step\Acceptance\User $I)
//    {
//        $userType            = Page\UserCreate::inspectorType;
//        $email               = $this->emailInspector = $I->GenerateEmail();
//        $firstName           = $I->GenerateNameOf('firnam');
//        $lastName            = $I->GenerateNameOf('lastnam');
//        $password            = $confirmPassword = $this->password;
//        $phone               = $I->GeneratePhoneNumber();
//        $this->nameInspector = $firstName." ".$lastName;
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//        $I->reloadPage();
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->wait(1);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->wait(1);
//    }
//    
//    //------------------------Coordinator create Auditor------------------------
//    
//    public function Help1_7_CreateAuditorUser(Step\Acceptance\User $I)
//    {
//        $userType          = Page\UserCreate::auditorType;
//        $email             = $this->emailAuditor = $I->GenerateEmail();
//        $firstName         = $I->GenerateNameOf('firnam');
//        $lastName          = $I->GenerateNameOf('lastnam');
//        $password          = $confirmPassword = $this->password;
//        $phone             = $I->GeneratePhoneNumber();
//        $this->nameAuditor = $firstName." ".$lastName;
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->wait(1);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->wait(1);
//    }
//    
//    //-----------------------Login as Created Inspector-------------------------
//    public function Help1_LogOut_And_LogInAsInspector(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailInspector, $this->password, $I, 'inspector');
//    }
//    
//    //-------------------------Inspector Main Menu------------------------------
//    public function InspectorMainMenu(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        for($i=0, $c= count($this->mainMenu_Inspector); $i<$c; $i++){
//            $I->canSee($this->mainMenu_Inspector[$i], Page\MainMenu::$MenuItem);
//        }
//        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
//        $I->cantSee('States', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Communication', \Page\MainMenu::$MenuItem);
//    }
//    
//    //-----------------------Inspector Empty Dashboard--------------------------
//    public function InspectorEmptyDashboard(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->cantSeePageNotFound($I);
//        $I->cantSeePageForbiddenAccess($I);
//        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
//        $I->canSee('Inspector Tasks', Page\Dashboard::$TasksTitle);
//        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
//        $I->canSee('City', Page\Dashboard::$CityHead);
//        $I->canSee('Contact', Page\Dashboard::$ContactHead);
//        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
//        $I->canSee('Email', Page\Dashboard::$EmailHead);
//        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
//        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
//        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
//        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
//        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
//    }
//    
//    
//    
//    
//    
//    
//    //-----------------------Login as Created Auditor-------------------------
//    public function Help1_LogOut_And_LogInAsAuditor(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailAuditor, $this->password, $I, 'auditor');
//    }
//    
//    //-------------------------Auditor Main Menu------------------------------
//    public function AuditorMainMenu(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        for($i=0, $c= count($this->mainMenu_Auditor); $i<$c; $i++){
//            $I->canSee($this->mainMenu_Auditor[$i], Page\MainMenu::$MenuItem);
//        }
//        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
//        $I->cantSee('States', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Communication', \Page\MainMenu::$MenuItem);
//    }
//    
//    //-----------------------Auditor Empty Dashboard--------------------------
//    public function AuditorEmptyDashboard(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->cantSeePageNotFound($I);
//        $I->cantSeePageForbiddenAccess($I);
//        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
//        $I->canSee('Auditor Tasks', Page\Dashboard::$TasksTitle);
//        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
//        $I->canSee('City', Page\Dashboard::$CityHead);
//        $I->canSee('Contact', Page\Dashboard::$ContactHead);
//        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
//        $I->canSee('Email', Page\Dashboard::$EmailHead);
//        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
//        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
//        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
//        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
//        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
//    }
//    
//    //--------------------------Login as Coordinator----------------------------
//    public function Help1_LogOut_And_LogInAsCoordinatore(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //----------------Coordinator create Inspector Organization-----------------
//    
//    public function Help1_7_CreateInspectorOrganization(Step\Acceptance\InspectorOrganization $I)
//    {
//        $inspOrganization = $this->InspectorOrganization1_Coordinator = $I->GenerateNameOf('InsOrg_Coordinator');
//        
//        $I->CreateInspectorOrganization($inspOrganization, $this->state);
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program2));
//        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program1));
//        $I->wait(1);
//        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
//        $I->wait(2);
//        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->nameInspector);
//        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
//        $I->wait(2);
//        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->nameInspector));
//    }
//    
//    //-------------------Coordinator create Audit Organization------------------
//    
//    public function Help1_7_CreateAuditOrganization(Step\Acceptance\AuditOrganization $I)
//    {
//        $audOrganization = $this->AuditOrganization1_Coordinator = $I->GenerateNameOf('AuditOrg_Coordinator');
//        
//        $I->CreateAuditOrganization($audOrganization, $this->state);
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
//        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
//        $I->wait(2);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->nameAuditor);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
//        $I->wait(1);
//        $I->reloadPage();
//        $I->wait(2);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->nameAuditor));
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(2);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(1);
//        $I->reloadPage();
//        $I->wait(2);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(2);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(1);
//        $I->reloadPage();
//        $I->wait(2);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(2);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(1);
//        $I->reloadPage();
//        $I->wait(2);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(2);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Wastewater_AuditGroup);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(1);
//        $I->reloadPage();
//        $I->wait(2);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Wastewater_AuditGroup));
//        $I->wait(1);
//    }
//    
//    //-----------------------Login as Created Inspector-------------------------
//    public function Help1_LogOut_And_LogInAsInspector2(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailInspector, $this->password, $I, 'inspector');
//    }
//    
//    //-------------------------Inspector Main Menu------------------------------
//    public function InspectorMainMenu2(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        for($i=0, $c= count($this->mainMenu_Inspector); $i<$c; $i++){
//            $I->canSee($this->mainMenu_Inspector[$i], Page\MainMenu::$MenuItem);
//        }
//        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
//        $I->cantSee('States', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Communication', \Page\MainMenu::$MenuItem);
//    }
//    
//    //-----------------------Inspector Empty Dashboard--------------------------
//    public function InspectorEmptyDashboard2(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->cantSeePageNotFound($I);
//        $I->cantSeePageForbiddenAccess($I);
//        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
//        $I->canSee('Inspector Tasks', Page\Dashboard::$TasksTitle);
//        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
//        $I->canSee('City', Page\Dashboard::$CityHead);
//        $I->canSee('Contact', Page\Dashboard::$ContactHead);
//        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
//        $I->canSee('Email', Page\Dashboard::$EmailHead);
//        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
//        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
//        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
//        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
//        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
//    }
//    
//    //-----------------------Login as Created Auditor-------------------------
//    public function Help1_LogOut_And_LogInAsAuditor2(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailAuditor, $this->password, $I, 'auditor');
//    }
//    
//    //-------------------------Auditor Main Menu------------------------------
//    public function AuditorMainMenu2(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        for($i=0, $c= count($this->mainMenu_Auditor); $i<$c; $i++){
//            $I->canSee($this->mainMenu_Auditor[$i], Page\MainMenu::$MenuItem);
//        }
//        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
//        $I->cantSee('States', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Communication', \Page\MainMenu::$MenuItem);
//    }
//    
//    //-----------------------Auditor Empty Dashboard--------------------------
//    public function AuditorEmptyDashboard2(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->cantSeePageNotFound($I);
//        $I->cantSeePageForbiddenAccess($I);
//        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
//        $I->canSee('Auditor Tasks', Page\Dashboard::$TasksTitle);
//        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
//        $I->canSee('City', Page\Dashboard::$CityHead);
//        $I->canSee('Contact', Page\Dashboard::$ContactHead);
//        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
//        $I->canSee('Email', Page\Dashboard::$EmailHead);
//        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
//        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
//        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
//        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
//        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
//    }
//    
//    //-------------------Login as State Admin to approve measures---------------
//    public function Help1_LogOut_And_LogInAsStateAdmind(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
//    }
//    
//    //-------------------Login as State Admin to approve measures---------------
//    public function StateAdminAproveMeasuresCreatedByCoordinator(\Step\Acceptance\Measure $I)
//    {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(2);
//        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc3_Coordinator));
//        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc1_Coordinator));
//        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc2_Coordinator));
//        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc3_Coordinator));
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure1_Coordinator));
//        $I->wait(1);
//        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc1_Coordinator, null, null, null, \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
//        $I->click(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(1);
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2_Coordinator));
//        $I->wait(1);
//        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc2_Coordinator, null, null, null, \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
//        $I->click(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(1);
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure3_Coordinator));
//        $I->wait(1);
//        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc3_Coordinator, null, null, null, \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
//        $I->click(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(1);
//    }
//    
//    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
//    
//    public function Help1_LogOut_And_LogInAsCoordinatorr(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //------------------Coordinator create Checklist For Tier 1-----------------
//    public function Coordinator_CreateChecklistForTier1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
//        $programDestination = $this->program2;
//        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
//        $tier               = '1';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
//        $I->ManageChecklist($descs, $this->statusesT1_Coordinator, $this->extensionsT1_Coordinator);
//        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT1_Coordinator, $this->extensionsT1_Coordinator);
//        $I->reloadPage();
//        $I->PublishChecklistStatus();
//    }
//    
//    public function Help1_16_LogOut(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->Logout($I);
//    }
//    
//    //------------Business registration. Program without checklist--------------
//    public function Help1_17_BusinessRegister_WithoutChecklist_Program1(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("fnUserAccess");
//        $lastName         = $I->GenerateNameOf("lnUserAccess");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business1 = $I->GenerateNameOf("busnamUA");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;;
//        $employees        = '455';
//        $busFootage       = '4566';
//        $landscapeFootage = '12345';
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(8);
//        $I->canSee("Attention!");
//        $I->canSee("No checklist! Sorry but we don`t have a checklist for your business.");
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GeneralGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_TransportationGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_PollutionPreventionGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WastewaterGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WaterGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_HowToUseThisAppButton);
//        $I->cantSeeElement(Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//    }
//    
//    public function Help1_16_LogOutf(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//    }
//    
//    //------------Business registration. Sector without checklist--------------
//    public function Help1_17_BusinessRegister_WithoutChecklist_Program2_Sector2(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("fnUserAccess");
//        $lastName         = $I->GenerateNameOf("lnUserAccess");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business2 = $I->GenerateNameOf("busnamUA");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip2;
//        $city             = $this->city2;
//        $website          = 'fgfh.fh';
//        $busType          = $this->sector_Coordinator;
//        $employees        = '455';
//        $busFootage       = '4566';
//        $landscapeFootage = '12345';
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(8);
//        $I->canSee("Attention!");
//        $I->canSee("No checklist! Sorry but we don`t have a checklist for your business.");
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GeneralGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_TransportationGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_PollutionPreventionGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WastewaterGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WaterGroupButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_HowToUseThisAppButton);
//        $I->cantSeeElement(Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//    }
//    
//    public function Help1_16_LogOut2(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//    }
//    
//    //-----------Business registration. Program&Sector with checklist-----------
//    public function Help1_17_BusinessRegister_WithChecklist_Program2_OfficeRetail(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("fnUserAccess");
//        $lastName         = $I->GenerateNameOf("lnUserAccess");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business3 = $I->GenerateNameOf("busnamUA");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip2;
//        $city             = $this->city2;
//        $website          = 'fgfh.fh';
//        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
//        $employees        = '455';
//        $busFootage       = '4566';
//        $landscapeFootage = '12345';
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(8);
//        $I->cantSee("Attention!");
//        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
//        //$I->canSeeElement(Page\RegistrationStarted::$LeftMenu_HowToUseThisAppButton);
//        $I->canSee("Print Tier 1 $this->tier1Name", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator1));
//        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector));
//    }
//    
//    public function MeasTypes1_17_1_CheckGreenTipForMeasure1_Quant_MultipleQuesAndNumber(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->wantTo("Check ");
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->wait(2);
//        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
//        $I->wait(2);
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc3_Coordinator));
//        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc3_Coordinator));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureGreenTip($this->grTip1_Coordinator));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureGreenTip($this->grTip2_Coordinator));
//    }
//    
//    public function Help1_16_LogOut2df(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //----------------------------Coordinator Dashboard-------------------------
//    public function CheckDashboard(AcceptanceTester $I) {
//        $I->amOnPage(Page\Dashboard::URL());
//        $I->wait(6);
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->canSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business2));
//        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
//        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business2));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('0 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3));
//        $I->canSee('In process', \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
//        $I->canSee('In progress', \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee('In progress', \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee('In progress', \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee('In progress', \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//        $I->canSee("Tier 1: $this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3));
//    }
    
//    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
//    
//    public function Help1_LogOut_And_LogInAsStateAdmin2(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
//    }
//    
//    //-----------------------State Admin Create Sector--------------------------
//    public function StateAdmin_CreateSector(\Step\Acceptance\Sector $I) {
//        $sector  = $this->sector_StateAdmin = $I->GenerateNameOf("SectAcStateAdmin");
//        $state   = $this->state;
//        $program = $this->program1;
//        
//        $I->amOnPage(\Page\SectorCreate::URL()."?state_id=$this->idState");
//        $I->wait(2);
//        $I->waitForElement(\Page\SectorCreate::$NameField);
//        $I->fillField(\Page\SectorCreate::$NameField, $sector);
//        $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
//        $I->wait(1);
//        $I->selectOption(\Page\SectorCreate::$ProgramSelect, $program);
//        $I->wait(1);
//        $I->click(\Page\SectorCreate::$CreateButton);
//        $I->wait(1);
//        $I->CheckValuesOnSectorListPage($sector, $program);
//    }
//    
//    public function StateAdmin_UpdateSectorCreatedByCoordinator(\Step\Acceptance\Sector $I) {
//        $sector  = $this->sector_StateAdmin;
//        $newsectorName = $this->sector_Update = "new_changed by state sdmin";
//        $program = $this->program2;
//        
//        $I->UpdateSector($sector, $program, $newsectorName);
//        $I->wait(1);
//        $I->CheckValuesOnSectorListPage($newsectorName, $program);
//        $I->cantSeeElement(Page\SectorList::NameLine_ByNameValue($sector, $program));
//    }
//    
//    //-------State Admin Create Quantitative & Not Quantitative Measures--------
//    public function StateAdmin_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc1_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'no';
//        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
//        $questions       = ['ques1?', 'ques2?', 'ques3?'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure1_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function StateAdmin_CreateMeasure_NotQuantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc2_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'no';
//        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
//        $questions       = ['What is your favourite color?'];
//        $answers         = ['Grey', 'Green', 'Red'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($this->measureDesc2_StateAdmin)); 
//        $this->idMeasure2_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//   
//    public function StateAdmin_CreateMeasure_NotQuantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc3_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'no';
//        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(6);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure3_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc4_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'yes';
//        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
//        $questions       = ['What color?'];
//        $answers         = ['Grey', 'Green', 'Red'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure4_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_Number(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc5_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'yes';
//        $submeasureType  = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
//        $questions       = ['What', "Where"];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure5_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_ThermsPopup(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc6_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'yes';
//        $submeasureType  = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure6_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_LightingPopup(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc7_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'yes';
//        $submeasureType  = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure7_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc8_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'yes';
//        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure8_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc9_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'yes';
//        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure9_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    //-----------------State Admin create Green Tips for measures---------------
//    public function StateAdmin_CreateGreenTipForMeasure1(\Step\Acceptance\GreenTipForMeasure $I) {
//        $descMeasure = $this->measureDesc1_StateAdmin;
//        $descGT      = $this->grTip1_Stateadmin = $I->GenerateNameOf("GT1_StateAdmin");
//        $program     = [$this->program2];
//        
//        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1_Coordinator));
//        $I->wait(2);
//        $I->CreateMeasureGreenTip($descGT, $program);
//        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1_Coordinator));
//        $I->wait(2);
//        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
//    }
//    
//    public function StateAdmin_UpdateGreenTipForMeasure2Coordinator(\Step\Acceptance\GreenTipForMeasure $I) {
//        $descMeasure = $this->measureDesc2_Coordinator;
//        $descGT      = $this->grTip2_UpdateCoordinator = $I->GenerateNameOf("GT2_Coordinator_UpdateByStateAdmin");
//        $program     = [$this->program2];
//        
//        $I->amOnPage(Page\MeasureGreenTipList::URL($this->idMeasure2_Coordinator));
//        $I->wait(2);
//        $I->click(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($descMeasure));
//        $I->wait(2);
//        $I->UpdateMeasureGreenTip($descGT);
//        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2_Coordinator));
//        $I->wait(2);
//        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
//        $I->cantSee($this->grTip2_Coordinator, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
//    }
//    
//    //------------------State Admin create Checklist For Tier 2-----------------
//    public function StateAdmin_CreateChecklistForTier1_MeasuresAreAbsent(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
//        $programDestination = $this->program2;
//        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc4_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc5_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc6_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc7_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc8_StateAdmin));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc9_StateAdmin));
//    }
//    
//    //-------------------------State Admin activate Tier 2----------------------
//    public function StateAdmin_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
//        $program    = $this->program2;
//        $tier1      = '1';
//        $tier1Name  = $this->tier2Name = "tiername2_StateAdmin";
//        $tier1Desc  = 'tier desc update by St Admin';
//        $tier1OptIn = 'yes';
//        
//        $I->amOnPage(Page\TierManage::URL());
//        $I->wait(1);
//        $I->canSee($program, Page\TierManage::$ProgramOption);
//        $I->cantSee($this->program2, Page\TierManage::$ProgramOption);
//        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
//        $I->wait(2);
//        $I->canSee('Tier 1', Page\TierManage::$Tier1Button_LeftMenu);
//        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
//        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
//        $I->ManageTiers($program, $tier1='2', $tier1Name, $tier1Desc, $tier1OptIn);
//    }
//    
//    //---------------------State Admin create Inspector-------------------------
//    
//    public function StateAdmin_CreateInspectorUser(Step\Acceptance\User $I)
//    {
//        $userType  = Page\UserCreate::inspectorType;
//        $email     = $this->emailInspector = $I->GenerateEmail();
//        $firstName = $I->GenerateNameOf('firnam');
//        $lastName  = $I->GenerateNameOf('lastnam');
//        $password  = $confirmPassword = $this->password;
//        $phone     = $I->GeneratePhoneNumber();
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->wait(1);
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(2);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(2);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->wait(1);
//    }
//    
//    //------------------------State Admin create Auditor------------------------
//    
//    public function StateAdmin_CreateAuditorUser(Step\Acceptance\User $I)
//    {
//        $userType  = Page\UserCreate::auditorType;
//        $email     = $this->emailAuditor = $I->GenerateEmail();
//        $firstName = $I->GenerateNameOf('firnam');
//        $lastName  = $I->GenerateNameOf('lastnam');
//        $password  = $confirmPassword = $this->password;
//        $phone     = $I->GeneratePhoneNumber();
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->wait(1);
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(2);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(2);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->click(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->wait(2);
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->wait(1);
//    }
//    
//    //------------------State Admin create Checklist For Tier 1-----------------
//    public function StateAdmin_CreateChecklistForTier1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
//        $programDestination = $this->program2;
//        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
//        $tier               = '1';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
//        $I->ManageChecklist($descs, $this->statusesT1_Coordinator, $this->extensionsT1_Coordinator);
//        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT1_Coordinator, $this->extensionsT1_Coordinator);
//        $I->reloadPage();
//        $I->PublishChecklistStatus();
//    }
//    
//    public function Help1_16_LogOutttt(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->Logout($I);
//    }
}
