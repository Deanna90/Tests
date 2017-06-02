<?php


class UsersAccessCest
{
    public $state, $program1, $program2, $idState, $idCity1, $idCity2, $idProg2, $sector_Coordinator, $sector_StateAdmin, $sector_Update, $city1, $city2, $zip1, $zip2;
    public $audSubgroup1_Energy;
    public $measureDesc1_Coordinator, $measureDesc2_Coordinator, $measureDesc3_Coordinator;
    public $idMeasure1_Coordinator, $idMeasure2_Coordinator, $idMeasure3_Coordinator;
    public $measureDesc1_StateAdmin, $measureDesc2_StateAdmin, $measureDesc3_StateAdmin, $measureDesc4_StateAdmin, $measureDesc5_StateAdmin, $measureDesc6_StateAdmin, 
            $measureDesc7_StateAdmin, $measureDesc8_StateAdmin, $measureDesc9_StateAdmin;
    public $idMeasure1_StateAdmin, $idMeasure2_StateAdmin, $idMeasure3_StateAdmin, $idMeasure4_StateAdmin, $idMeasure5_StateAdmin, $idMeasure6_StateAdmin, 
            $idMeasure7_StateAdmin, $idMeasure8_StateAdmin, $idMeasure9_StateAdmin;
    public $grTip1_Coordinator, $grTip2_Coordinator;
    public $statusesT1_Coordinator        = ['core',  'core',  'elective'];
    public $extensionsT1_Coordinator      = ['Default',         'Large Landscape',   'Default'];
    public $emailStateAdmin, $emailCoordinator, $emailInspector, $emailAuditor;
    public $mainMenu_NationalAdmin = ['Dashboard', 'Programs', 'Measures', 'Green Tips', 'Checklists', 'Tiers', 'Users', 'States', 'Notification', 'Reports', 'Resources', 'Video Tutorials'];
    public $mainMenu_StateAdmin    = ['Dashboard', 'Programs', 'Measures', 'Green Tips', 'Checklists', 'Tiers', 'Users', 'Notification', 'Reports', 'Resources'];
    public $mainMenu_Coordinator   = ['Dashboard', 'Sector', 'Measures', 'Green Tips', 'Checklists', 'Tier', 'Users', 'Communication', 'Video Tutorials'];
    public $mainMenu_Auditor       = ['Dashboard', 'Video Tutorials'];
    public $mainMenu_Inspector     = ['Dashboard', 'Video Tutorials'];
    public $measuresDesc_SuccessCreated = [];
    public $password = 'Qq!1111111';
    public $business1, $business2, $business3;
    public $tier1Name;

    //--------------------------------------------------------------------------Login As National Admin------------------------------------------------------------------------------------
    
    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_1_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StUserAccess");
        $shortName = 'UA';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
        $this->mainMenu_NationalAdmin[] = $this->state;
        $this->mainMenu_StateAdmin[] = $this->state;
    }
    
   
    public function Help1_2_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function NationalAdminMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        for($i=0, $c= count($this->mainMenu_NationalAdmin); $i<$c; $i++){
            $I->canSee($this->mainMenu_NationalAdmin[$i], Page\MainMenu::$MenuItem);
        }
    }
    
    //---------------------------Create State Admin-----------------------------
    
    public function UserCreate3_1_2_CreateStateAdmin_ForCreatedState(\Step\Acceptance\User $I)
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
    }
    
    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
    
    public function Help1_LogOut_And_LogInAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //--------------------------------Main Menu---------------------------------
    public function StateAdminMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        for($i=0, $c= count($this->mainMenu_StateAdmin); $i<$c; $i++){
            $I->canSee($this->mainMenu_StateAdmin[$i], Page\MainMenu::$MenuItem);
        }
        $I->cantSee('Video Tutorials', \Page\MainMenu::$MenuItem);
    }
    
    //-----------------------No ability to create state-------------------------
    public function StatesPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\StateList::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\StateList::$CreateStateButton);
        $I->amOnPage(Page\StateCreate::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\StateCreate::$NameField);
        $I->amOnPage(Page\StateUpdate::URL($this->idState));
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\StateUpdate::$NameField);
    }
    
    //------------------State Admin create Cities & Programs--------------------
    public function Help1_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityAccess1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgAccess1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_3_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
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
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    //---------------------State Admin Create Coordinator-----------------------
    
    public function Help1_5_CreateCoordinatorUser_ForProgram2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
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
    }
    
    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
    
    public function Help1_LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
    }
    
    //--------------------------------Main Menu---------------------------------
    public function CoordinatorMainMenu(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
        $I->cantSee('Cities', \Page\MainMenu::$MenuItem);
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Programs"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Cities"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Cities', "Programs"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Cities', "Cities"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Programs"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Cities"));
        for($i=0, $c= count($this->mainMenu_Coordinator); $i<$c; $i++){
            $I->canSee($this->mainMenu_Coordinator[$i], Page\MainMenu::$MenuItem);
        }
        $I->canSee('Prefer Program', Page\MainMenu::$MenuItem);
        $I->click(Page\MainMenu::selectMenuItemByName('Green Tips'));
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Audit Groups"));
        $I->click(Page\MainMenu::$StateSelect);
        $I->wait(1);
        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("$this->program2"));
        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("All Programs"));
    }
    
    //-----------------------No ability to create state-------------------------
    public function StatesPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\StateList::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\StateList::$CreateStateButton);
        $I->amOnPage(Page\StateCreate::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\StateCreate::$NameField);
        $I->amOnPage(Page\StateUpdate::URL($this->idState));
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\StateUpdate::$NameField);
    }
    
    //-----------------------No ability to create city-------------------------
    public function CitiesPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\CityList::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\CityList::$CreateCityButton);
        $I->amOnPage(Page\CityCreate::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\CityCreate::$NameField);
        $I->amOnPage(Page\CityUpdate::URL($this->idCity2));
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\CityUpdate::$NameField);
    }
    
    //-----------------------No ability to create program-----------------------
    public function ProgramsPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\ProgramList::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\ProgramList::$CreateProgramButton);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\ProgramCreate::$NameField);
        $I->amOnPage(Page\ProgramUpdate::URL($this->idProg2));
        $I->seePageNotFound($I);
        $I->cantSeeElement(Page\ProgramUpdate::$NameField);
    }
    
    //-----------------------Coordinator Create Sector--------------------------
    public function Help1_3_CreateSector(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector_Coordinator = $I->GenerateNameOf("SectAcCoord");
        $state   = $this->state;
        $program = $this->program2;
        
        $I->amOnPage(\Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->wait(2);
        $I->waitForElement(\Page\SectorCreate::$NameField);
        $I->fillField(\Page\SectorCreate::$NameField, $sector);
        $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
        $I->selectOption(\Page\SectorCreate::$ProgramSelect, $program);
        $I->wait(1);
        $I->click(\Page\SectorCreate::$CreateButton);
        $I->wait(1);
    }
    
//    public function Help1_2_SelectDefaultProgram_AllPrograms(AcceptanceTester $I)
//    {
//        $I->wait(2);
//        $I->SelectDefaultState($I, 'All Programs');
//    }
    
    //---------------Coordinator Create Not Quantitative Measures---------------
    public function Coordinator_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc1_Coordinator = $I->GenerateNameOf("Description Created by Coordinator");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
        $I->wait(1);
        $I->click(Page\MeasureList::$ApplyFiltersButton);
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure1_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    
    
    public function Coordinator_CreateMeasure_NotQuantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc2_Coordinator = $I->GenerateNameOf("Description Created by Coordinator");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
        $I->wait(1);
        $I->click(Page\MeasureList::$ApplyFiltersButton);
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($this->measureDesc2_Coordinator)); 
        $this->idMeasure2_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
   
    public function Coordinator_CreateMeasure_NotQuantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc3_Coordinator = $I->GenerateNameOf("Description Created by Coordinator");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
        $I->wait(1);
        $I->click(Page\MeasureList::$ApplyFiltersButton);
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-----------------Coordinator create Green Tips for measures---------------
    public function Coordinator_CreateGreenTipForMeasure1(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1_Coordinator;
        $descGT      = $this->grTip1_Coordinator = $I->GenerateNameOf("GT1_Coordinator");
        $program     = [$this->program2];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1_Coordinator));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1_Coordinator));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Coordinator_CreateGreenTipForMeasure2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc2_Coordinator;
        $descGT      = $this->grTip2_Coordinator = $I->GenerateNameOf("GT2_Coordinator");
        $program     = [$this->program2];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2_Coordinator));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2_Coordinator));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    //------------------Coordinator create Checklist For Tier 1-----------------
    public function Coordinator_CreateChecklistForTier1_MeasuresAreAbsent(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->cantSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
        $I->cantSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
        $I->cantSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
    }
    
    //-------------------------Coordinator activate Tier 1----------------------
    public function Coordinator_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier1      = '1';
        $tier1Name  = $this->tier1Name = "tiername1_Coordinator";
        $tier1Desc  = 'tier desc update by coordinator';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->wait(1);
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->cantSee($this->program1, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(2);
        $I->canSee('Tier 1', Page\TierManage::$Tier1Button_LeftMenu);
        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
        $I->ManageTiers($program, $tier1='1', $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    //---------------------Coordinator create Inspector-------------------------
    
    public function Help1_6_CreateInspectorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::inspectorType;
        $email     = $this->emailInspector = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->reloadPage();
        $I->wait(1);
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->wait(1);
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
        $I->wait(1);
    }
    
    //------------------------Coordinator create Auditor------------------------
    
    public function Help1_7_CreateAuditorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::auditorType;
        $email     = $this->emailAuditor = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->wait(1);
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->wait(1);
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
        $I->wait(1);
    }
    
    //-------------------Login as State Admin to approve measures---------------
    public function Help1_LogOut_And_LogInAsStateAdmind(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //-------------------Login as State Admin to approve measures---------------
    public function StateAdminAproveMeasuresCreatedByCoordinator(\Step\Acceptance\Measure $I)
    {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
        $I->wait(1);
        $I->click(Page\MeasureList::$ApplyFiltersButton);
        $I->wait(2);
        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc3_Coordinator));
        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc1_Coordinator));
        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc2_Coordinator));
        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc3_Coordinator));
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure1_Coordinator));
        $I->wait(1);
        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc1_Coordinator, null, null, null, \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
        $I->click(Page\MeasureUpdate::$ApproveButton);
        $I->wait(1);
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2_Coordinator));
        $I->wait(1);
        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc2_Coordinator, null, null, null, \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
        $I->click(Page\MeasureUpdate::$ApproveButton);
        $I->wait(1);
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure3_Coordinator));
        $I->wait(1);
        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc3_Coordinator, null, null, null, \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
        $I->click(Page\MeasureUpdate::$ApproveButton);
        $I->wait(1);
    }
    
    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
    
    public function Help1_LogOut_And_LogInAsCoordinatorr(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
    }
    
    //------------------Coordinator create Checklist For Tier 1-----------------
    public function Coordinator_CreateChecklistForTier1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
        $I->ManageChecklist($descs, $this->statusesT1_Coordinator, $this->extensionsT1_Coordinator);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT1_Coordinator, $this->extensionsT1_Coordinator);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------Business registration. Program without checklist--------------
    public function Help1_17_BusinessRegister_WithoutChecklist_Program1(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("fnUserAccess");
        $lastName         = $I->GenerateNameOf("lnUserAccess");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1 = $I->GenerateNameOf("busnamUA");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->canSee("Attention!");
        $I->canSee("No checklist! Sorry but we don`t have a checklist for your business.");
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GeneralGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_TransportationGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_PollutionPreventionGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WastewaterGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WaterGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_HowToUseThisAppButton);
        $I->cantSeeElement(Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
    }
    
    public function Help1_16_LogOutf(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------Business registration. Sector without checklist--------------
    public function Help1_17_BusinessRegister_WithoutChecklist_Program2_Sector2(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("fnUserAccess");
        $lastName         = $I->GenerateNameOf("lnUserAccess");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2 = $I->GenerateNameOf("busnamUA");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = $this->sector;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->canSee("Attention!");
        $I->canSee("No checklist! Sorry but we don`t have a checklist for your business.");
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GeneralGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_TransportationGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_PollutionPreventionGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WastewaterGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_WaterGroupButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_HowToUseThisAppButton);
        $I->cantSeeElement(Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
    }
    
    public function Help1_16_LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //-----------Business registration. Program&Sector with checklist-----------
    public function Help1_17_BusinessRegister_WithChecklist_Program2_OfficeRetail(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("fnUserAccess");
        $lastName         = $I->GenerateNameOf("lnUserAccess");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business3 = $I->GenerateNameOf("busnamUA");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->cantSee("Attention!");
        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        //$I->canSeeElement(Page\RegistrationStarted::$LeftMenu_HowToUseThisAppButton);
        $I->canSee("Print Tier 1 $this->tier1Name", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator));
        $I->canSeeElement(Page\RegistrationStarted::CoordinatorPhone_ByEmail($this->emailCoordinator));
        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor));
        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector));
    }
    
    public function MeasTypes1_17_1_CheckGreenTipForMeasure1_Quant_MultipleQuesAndNumber(AcceptanceTester $I) {
        $I->wait(1);
        $I->wantTo("Check ");
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc3_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc3_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureGreenTip($this->grTip1_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureGreenTip($this->grTip2_Coordinator));
    }
    
    public function Help1_16_LogOut2df(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
    }
    
    //----------------------------Coordinator Dashboard-------------------------
    public function CheckDashboard(AcceptanceTester $I) {
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(4);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('0 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3));
        $I->canSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
        $I->canSee("Tier 1: $this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3));
    }
    
    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
    
    public function Help1_LogOut_And_LogInAsStateAdmin2(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //-----------------------State Admin Create Sector--------------------------
    public function StateAdmin_CreateSector(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector_StateAdmin = $I->GenerateNameOf("SectAcStateAdmin");
        $state   = $this->state;
        $program = $this->program1;
        
        $I->amOnPage(\Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->wait(2);
        $I->waitForElement(\Page\SectorCreate::$NameField);
        $I->fillField(\Page\SectorCreate::$NameField, $sector);
        $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
        $I->selectOption(\Page\SectorCreate::$ProgramSelect, $program);
        $I->wait(1);
        $I->click(\Page\SectorCreate::$CreateButton);
        $I->wait(1);
        $I->CheckValuesOnSectorListPage($sector, $program);
    }
    
    public function StateAdmin_UpdateSectorCreatedByCoordinator(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector_StateAdmin = $I->GenerateNameOf("SectAcStateAdmin");
        $newsectrorName = $this->sector_Update = "new_changed by state sdmin";
        $program = $this->program2;
        
        $I->UpdateSector($sector, $program, $newsectrorName);
        $I->wait(1);
        $I->CheckValuesOnSectorListPage($newsectrorName, $program);
        $I->cantSeeElement(Page\SectorList::NameLine_ByNameValue($sector, $program));
    }
    
    //-------State Admin Create Quantitative & Not Quantitative Measures--------
    public function StateAdmin_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc1_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
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
        $this->idMeasure1_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_NotQuantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc2_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($this->measureDesc2_StateAdmin)); 
        $this->idMeasure2_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
   
    public function StateAdmin_CreateMeasure_NotQuantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc3_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc4_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions       = ['What color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure4_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_Number(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc5_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions       = ['What', "Where"];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure5_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_ThermsPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc6_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure6_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_LightingPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc7_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure7_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc8_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure8_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc9_StateAdmin = $I->GenerateNameOf("Description Created by State Admin");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure9_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-----------------State Admin create Green Tips for measures---------------
//    public function StateAdmin_CreateGreenTipForMeasure1(\Step\Acceptance\GreenTipForMeasure $I) {
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
//    public function StateAdmin_CreateGreenTipForMeasure2(\Step\Acceptance\GreenTipForMeasure $I) {
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
//    //------------------State Admin create Checklist For Tier 1-----------------
//    public function StateAdmin_CreateChecklistForTier1_MeasuresAreAbsent(\Step\Acceptance\Checklist $I) {
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
//    //-------------------------State Admin activate Tier 1----------------------
//    public function StateAdmin_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
//        $program    = $this->program2;
//        $tier1      = '1';
//        $tier1Name  = $this->tier1Name = "tiername1_StateAdmin";
//        $tier1Desc  = 'tier desc update by State Admin';
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
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->wait(1);
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
//    public function Help1_16_LogOut(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->Logout($I);
//    }
}
