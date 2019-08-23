<?php


class UsersAccessCest
{
    public $state, $program1, $program2, $idState, $county, $idCity1, $idCity2, $idCity3, $idProg2, $sector1_StAdm, $sector2_StAdm, $sector_Update, $city1, $city2, $city3, $zip1, $zip2, $zip3;
    public $idThermOption_NatAdm, $idBuildingType_NatAdm, $nameBuildingType_NatAdm, $idDeerHours_NatAdm, $idFixtureMap_NatAdm, $idSavingArea_NatAdm, $nameSavingArea_NatAdm, $idSourceProgram_NatAdm, 
            $idResource_NatAdm, $idVideoTutorial_NatAdm, $idGlobalVariable_NatAdm, $nameGlobalVariable_NatAdm, $titleGlobalVariable_NatAdm;
    public $idGlobalVariable_StAdm, $idSC_OfficeRetail_T1_StAdm, $idSC_OfficeRetail_T2_StAdm, $idSC_Sector1_T3_StAdm, $idApplicantEmail_StAdm, $idApplicationDirection_StAdm, $idComplianceCheck_StAdm, $nameComplianceCheck_StAdm;
    public $id_programChecklist2_T1;
    public $audSubgroup1_Energy, $idSubgroup1_Energy;
    public $measureDesc1_Coordinator, $measureDesc2_Coordinator, $measureDesc3_Coordinator;
    public $idMeasure1_Coordinator, $idMeasure2_Coordinator, $idMeasure3_Coordinator;
    public $measureDesc1_StateAdmin, $measureDesc2_StateAdmin, $measureDesc3_StateAdmin, $measureDesc4_StateAdmin, $measureDesc5_StateAdmin, $measureDesc6_StateAdmin, 
            $measureDesc7_StateAdmin, $measureDesc8_StateAdmin, $measureDesc9_StateAdmin;
    public $idMeasure1_StateAdmin, $idMeasure2_StateAdmin, $idMeasure3_StateAdmin, $idMeasure4_StateAdmin, $idMeasure5_StateAdmin, $idMeasure6_StateAdmin, 
            $idMeasure7_StateAdmin, $idMeasure8_StateAdmin, $idMeasure9_StateAdmin;
    public $grTip1_Coordinator, $grTip2_Coordinator;
    public $grTip1_Stateadmin, $grTip2_UpdateCoordinator;
    public $title_city3Mes, $message_city3Mes, $id_city3Mes;
    public $SL_message_Energy_Water_EMAIL, $Subject_SL_message_Energy_Water_EMAIL, $Body_SL_message_Energy_Water_EMAIL, $id_SL_message_Energy_Water_EMAIL;
    public $P1L_message_Energy, $id_P1L_message_Energy;
    public $InspectorOrganization1_Coordinator, $AuditOrganization1_Coordinator;
    public $statusesT1_Coordinator        = ['core',  'core',  'elective',  'elective',  'elective',  'elective',  'elective',  'core',  'core',  'core',  'elective', 'core'];
    public $extensions_Coordinator        = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default'];
    public $statusesT3_Coordinator        = ['core',  'core',  'core',  'core',  'core',  'core',  'core',  'core',  'core',  'core',  'core', 'core'];
    public $emailStateAdmin, $emailCoordinator1_Prog2, $emailCoordinator2_Prog1_Prog2, $emailInspector_Prog2, $emailInspector_Prog1_Prog2, $emailAuditor_Prog2, $emailAuditor2_Prog2;
    public $firstName_StateAdmin, $firstName_Coordinator1_Prog2, $firstName_Coordinator2, $firstName_Inspector_Prog2, $firstName_Auditor_Prog2;
    public $lastName_StateAdmin, $lastName_Coordinator1_Prog2, $lastName_Coordinator2, $lastName_Inspector_Prog2, $lastName_Auditor_Prog2;
    public $idStateAdmin, $idCoordinator1, $idCoordinator2, $idInspector, $idAuditor;
    public $nameInspector_Prog2, $nameAuditor;
    public $mainMenu_NationalAdmin = ['Dashboard', 'Programs', 'Measures', 'Resources', 'Checklists', 'Tiers', 'Users', 'States & GA', 'Notification', 'Reports', 'Video Tutorials'];
    public $mainMenu_StateAdmin    = ['Dashboard', 'Programs', 'Measures', 'Resources', 'Checklists', 'Tiers', 'Users', 'Notification', 'Reports', 'Video Tutorials'];
    public $mainMenu_Coordinator   = ['Dashboard', 'Sector', 'Measures', 'Resources', 'Checklists', 'Tier', 'Users', 'Notification', 'Video Tutorials', "Reports"];
    public $mainMenu_Auditor       = ['Dashboard', 'Video Tutorials', 'Communication'];
    public $mainMenu_Inspector     = ['Dashboard', 'Video Tutorials', 'Communication'];
    public $measuresDesc_SuccessCreated = [];
    public $password = 'Qq!1111111';
    public $business1_Prog1, $business2_Prog2, $business3_Prog2, $busId1, $busId2, $busId3;
    public $bus1_email_Prog1, $bus1_phone_Prog1, $bus2_email_Prog2, $bus2_phone_Prog2, $bus3_email_Prog2, $bus3_phone_Prog2, $bus2_userFullName, $bus3_userFullName, $bus1_firstName_Prog1, $bus2_firstName_Prog2, $bus3_firstName_Prog2, $bus1_lastName_Prog1, $bus2_lastName_Prog2, $bus3_lastName_Prog2;
    public $bus1_address_Prog1, $bus2_address_Prog2, $bus3_address_Prog2;
    public $tier1Name, $tier2Name;
    public $todayDate = [];
    public $subject_GetStarted_Prog2, $body_GetStarted_Prog2;
    public $benefits_P2_T1 = ['Ben1', 'Ben2', 'Ben3'];
    public $benefits_P2_T2 = ['prom1', 'prom2'];
    public $P2_2_LandTitle1, $P2_2_LandDesc1;
    public $P2_2_LandTitle2, $P2_2_LandDesc2;

    //--------------------------------------------------------------------------Login As National Admin------------------------------------------------------------------------------------
    
    public function NationalAdmin1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
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
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function NationalAdmin1_3_NationalAdminMainMenu(AcceptanceTester $I)
    {
        $I->comment("Check correct menu items for National Admin:");
        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
        for($i=0, $c= count($this->mainMenu_NationalAdmin); $i<$c; $i++){
            $I->canSee($this->mainMenu_NationalAdmin[$i], Page\MainMenu::$MenuItem);
        }
    }
    
    public function NationalAdmin1_4_CheckSubItemsInMainMenu(AcceptanceTester $I)
    {
        $I->comment("Check correct menu SubItems for National Admin:");
        //Programs item
        $I->click(\Page\MainMenu::selectMenuItemByName('Programs'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Counties"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Cities"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "City Messages"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Manage Sectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Source Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Audit Groups"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Fee"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Resources'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Resources', "Measure Green Tips"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Resources', "Green Resources"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Sector Checklists"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Program Checklists"));
        //Tiers item
        $I->click(\Page\MainMenu::selectMenuItemByName('Tiers'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Tiers', "Manage"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Tiers', "Landing"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "All"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Business"));
        //States & GA item
        $I->click(\Page\MainMenu::selectMenuItemByName('States & GA'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('States & GA', "States"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('States & GA', "Sectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('States & GA', "Analytics"));
        //Notification item
        $I->click(\Page\MainMenu::selectMenuItemByName('Notification'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Notification"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Auditor"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Inspector"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Completion Notifications"));
        //Reports item
        $I->click(\Page\MainMenu::selectMenuItemByName('Reports'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Reports', "Reports"));
    }
    
    //---------------------------Create video tutorial--------------------------
    public function NationalAdmin1_5_1_VideoTutorialCreate(Step\Acceptance\VideoTutorial $I)
    {
        $title        = $I->GenerateNameOf("Video by national admin");
        $description  = 'descrippp';
        $userType1    = 'coordinator';
        $userType2    = 'auditor';
        $userTypes    = [$userType1, $userType2];
        $state        = [$this->state];
                
        $I->CreateVideo($title, $description, $userTypes, $state);
        $video = $I->GetVideoTutorialOnPageInList($title);
        $this->idVideoTutorial_NatAdm = $video['id'];
    }
    
    //----------------------------Create source program-------------------------
    public function NationalAdmin1_5_2_SourceProgramCreate(Step\Acceptance\SourceProgram $I)
    {
        $title        = $I->GenerateNameOf("SourceProgram by national admin");
        $file         = 'City of Kirkland.zip';
                
        $I->CreateSourceProgram($title, $content = null, $file);
        $source = $I->GetSourceProgramOnPageInList($title);
        $this->idSourceProgram_NatAdm = $source['id'];
    }
    
    //---------------------------Create popup therm option----------------------
    public function NationalAdmin1_5_3_PopupThermOptionCreate(Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("thermCreated by national admin");
        $thermsCount = '5';
                
        $I->CreateThermOption($name, $thermsCount);
        $therm = $I->GetThermOptionOnPageInList($name);
        $this->idThermOption_NatAdm = $therm['id'];
    }
    
    //------------------Create building type for lighting popup-----------------
    public function NationalAdmin1_5_4_PopupLighting_BuildingTypeCreate(Step\Acceptance\PopupLightingOption $I)
    {
        $name        = $this->nameBuildingType_NatAdm = $I->GenerateNameOf("buildType by national admin");
                
        $I->CreateBuildingType($name);
        $building = $I->GetBuildingTypeOnPageInList($name);
        $this->idBuildingType_NatAdm = $building['id'];
    }
    
    //-------------------Create deer hours for lighting popup-------------------
    public function NationalAdmin1_5_5_PopupLighting_DeerHoursCreate(Step\Acceptance\PopupLightingOption $I)
    {
        $hou                = '1000';
        $interactiveEffects = '2';
        $lightingType       = 'CFL';
        $buildingType       = $this->nameBuildingType_NatAdm;
        $buildingSpace      = 'Exterior';
        
        $I->CreateLightingDeerHours($hou, $interactiveEffects, $lightingType, $buildingType, $buildingSpace);
        $hours = $I->GetLightingDeerHoursOnPageInList($lightingType, $buildingType, $buildingSpace, $hou, $interactiveEffects);
        $this->idDeerHours_NatAdm = $hours['id'];
    }
    
    //------------------Create fixture map for lighting popup-------------------
    public function NationalAdmin1_5_6_PopupLighting_FixtureMapCreate(Step\Acceptance\PopupLightingOption $I)
    {
        $replacementLightingName    = $I->GenerateNameOf('replacName by national admin');
        $replacementLightingWattage = '12';
        $existingLightingName       = $I->GenerateNameOf('existName by national admin');
        $existingLightingWattage    = '45';
        $description                = 'desssssc';
        
        $I->CreateLightingFixtureMap($replacementLightingName, $replacementLightingWattage, $existingLightingName, $existingLightingWattage, $description);
        $map = $I->GetLightingFixtureMapOnPageInList($replacementLightingName);
        $this->idFixtureMap_NatAdm = $map['id'];
    }
    
    //----------------------------Create saving area----------------------------
    public function NationalAdmin1_5_7_SavingAreaCreate(Step\Acceptance\SavingArea $I)
    {
        $name                 = $this->nameSavingArea_NatAdm = $I->GenerateNameOf("SavingArea by national admin");
        $units                = 'un';
        $shortUnits           = 'sh';
        $moneyConversionRate  = '2';
        $visualRepresentation = 'no';
                
        $I->CreateSavingArea($name, $units, $shortUnits, $moneyConversionRate, $visualRepresentation);
        $area = $I->GetSavingAreaOnPageInList($name);
        $this->idSavingArea_NatAdm = $area['id'];
    }
    
    //------------------------------Create resource-----------------------------
    public function NationalAdmin1_5_8_ResourceCreate(\Step\Acceptance\Resource $I)
    {
        $title            = $I->GenerateNameOf("Resource by national admin");
        $shortDescription = 'desccc';
        $content          = 'content';
        $attachment       = 'report.xlsx';
        $attachmentName   = 'att name';
        
        $I->CreateResource($title, $shortDescription, $content, $attachment, $attachmentName);
        $resource = $I->GetResourceOnPageInList($title);
        $this->idResource_NatAdm = $resource['id'];
    }
    
    //--------------------------Create global variable--------------------------
    public function NationalAdmin1_5_9_GlobalVariableCreate(\Step\Acceptance\GlobalVariable $I)
    {
        $title                           = $this->titleGlobalVariable_NatAdm = $I->GenerateNameOf("GlobalVariable by national admin");
        $name                            = $this->nameGlobalVariable_NatAdm  = $I->GenerateNameOf("gv_name");
        $value                           = '2';
                
        $I->CreateGlobalVariable($title, $name, $value);
        $var = $I->GetGlobalVariableOnPageInList($title);
        $this->idGlobalVariable_NatAdm = $var['id'];
    }
    
    //---------------------------Create State Admin-----------------------------
    
    public function NationalAdmin1_6_CreateStateAdmin_ForCreatedState(\Step\Acceptance\User $I)
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
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->waitPageLoad();
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
    public function NationalAdmin1_7_CheckAllUsersListPage1(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->canSee('1', Page\UserList::$SummaryCount);
        
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        $user1 = $I->GetUserOnPageInList($this->emailStateAdmin, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailStateAdmin, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_StateAdmin, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_StateAdmin, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('state admin', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
    }
    
    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
    
    public function StateAdmin2_LogOut_And_LogInAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //--------------------------------Main Menu---------------------------------
    public function StateAdmin2_1_StateAdminMainMenu(AcceptanceTester $I)
    {
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
        for($i=0, $c= count($this->mainMenu_StateAdmin); $i<$c; $i++){
            $I->canSee($this->mainMenu_StateAdmin[$i], Page\MainMenu::$MenuItem);
        }
    }
    
    public function StateAdmin2_2_CheckSubItemsInMainMenu(AcceptanceTester $I)
    {
        //Programs item
        $I->click(\Page\MainMenu::selectMenuItemByName('Programs'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Counties"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Cities"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "City Messages"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Manage Sectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Source Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Audit Groups"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Fee"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Resources'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Resources', "Measure Green Tips"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Resources', "Green Resources"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Sector Checklists"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Program Checklists"));
        //Tiers item
        $I->click(\Page\MainMenu::selectMenuItemByName('Tiers'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Tiers', "Manage"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Tiers', "Landing"));
        //Notification item
        $I->click(\Page\MainMenu::selectMenuItemByName('Notification'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Notification"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Auditor"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Inspector"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Completion Notifications"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "All"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
    }
    
    //-----------------------No ability to create state-------------------------
    public function StateAdmin2_3_1_StatesPages_NotFound(AcceptanceTester $I)
    {
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
        $I->amOnPage(\Page\VideoTutorialsList::URL());
        $I->canSeeElement(Page\VideoTutorialsList::$FilterByCategorySelect);
        $I->amOnPage(Page\VideoTutorialsCreate::URL());
        $I->canSeeElement(\Page\VideoTutorialsCreate::$StateSelect);
        $I->amOnPage(Page\VideoTutorialsUpdate::URL($this->idVideoTutorial_NatAdm));
        $I->canSeeElement(Page\VideoTutorialsUpdate::$StateSelect);
        $I->amOnPage(Page\VideoTutorialsView::URL($this->idVideoTutorial_NatAdm));
        $I->canSeePageForbiddenAccess($I, "You can not access this video.");
    }
    
    //----------------------Ability to create source program--------------------
    public function StateAdmin2_3_3_SourceProgramsPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SourceProgramList::URL());
        $I->cantSeePageNotFound($I);
        $I->canSeeElement(Page\SourceProgramList::$CreateSourceProgramButton);
        $I->amOnPage(Page\SourceProgramCreate::URL());
        $I->cantSeePageNotFound($I);
        $I->canSeeElement(Page\SourceProgramCreate::$TitleField);
        $I->amOnPage(Page\SourceProgramUpdate::URL($this->idSourceProgram_NatAdm));
        $I->canSeePageForbiddenAccess($I, "You can not manage this item.");
        $I->cantSeeElement(Page\SourceProgramUpdate::$TitleField);
    }
    
    //------------------No ability to create popup therm option-----------------
    public function StateAdmin2_3_4_PopupThermOptionPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\PopupThermOptionList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionList::$CreatePopupThermsOptionButton);
        $I->amOnPage(Page\PopupThermOptionCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionCreate::$NameField);
        $I->amOnPage(Page\PopupThermOptionUpdate::URL($this->idThermOption_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionUpdate::$NameField);
    }
    
    //-----------------------No ability to create points------------------------
    public function StateAdmin2_3_6_PointPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\WeightPointsList::URL());
        $I->canSeeElement(\Page\WeightPointsList::$EmptyListLabel);
        $I->canSeeElement(Page\WeightPointsList::$NameLinkHead);
        $I->amOnPage(Page\WeightPointsCreate::URL_Sections($this->idState));
        $I->canSeePageForbiddenAccess($I, "Access denied");
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsCreate::URL_YesOrNo($this->idState));
        $I->canSeePageForbiddenAccess($I, "Access denied");
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsManage::URL($this->idState));
        $I->canSeePageForbiddenAccess($I, "Access denied");
        $I->cantSeeElement(Page\WeightPointsManage::$CreateYesOrNoButton);
    }
    
    //----------------------No ability to create saving area--------------------
    public function StateAdmin2_3_7_SavingAreaPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SavingAreaList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaList::$CreateSavingAreaButton);
        $I->amOnPage(Page\SavingAreaCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaCreate::$NameField);
        $I->amOnPage(Page\SavingAreaUpdate::URL($this->idSavingArea_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaUpdate::$NameField);
    }
    
    //----------------------No ability to create state admin--------------------
    public function StateAdmin2_3_8_StateAdminPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserList::$CreateUserButton);
        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserCreate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idStateAdmin));
        $I->canSeePageForbiddenAccess($I, "You can`t update information about this user.");
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
    }
    
    //----------------------No ability to create resource-----------------------
    public function StateAdmin2_3_9_ResourcesPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\ResourceList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceList::$CreateResourceButton);
        $I->amOnPage(Page\ResourceCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceCreate::$TitleField);
    }
    
    //--------------------No ability to create audit group----------------------
    public function StateAdmin2_3_10_AuditGroupsCreateAndUpdatePages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\AuditGroupList::URL());
        $I->canSee('8', \Page\AuditGroupList::$SummaryCount);
        $I->canSeeElement(\Page\AuditGroupList::$AuditGroupRow);
        $I->amOnPage(\Page\AuditGroupCreate::URL());
        $I->canSeePageNotFound($I);
        $I->amOnPage(\Page\AuditGroupUpdate::URL('2'));
        $I->canSeePageForbiddenAccess($I);
    }
    
    //--------------------------Create global variable--------------------------
    public function StateAdmin2_3_11_GlobalVariableCreate_NotFound(\Step\Acceptance\GlobalVariable $I)
    {
        $I->amOnPage(\Page\GlobalVariableList::URL());
        $I->canSeeElement(\Page\GlobalVariableList::$GlobalVariableRow);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeePageNotFound($I);
        $I->amOnPage(\Page\GlobalVariableCreate::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->idGlobalVariable_NatAdm));
        $I->canSeeElement(\Page\GlobalVariableUpdate::$NameField);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeePageNotFound($I);
    }
    
    //-------------------------------Create county------------------------------
    public function StateAdmin_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        
        $I->CreateCounty($name, $state);
    }
    
    //------------------State Admin create Cities & Programs--------------------
    public function StateAdmin2_4_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityAccess1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgAccess1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function StateAdmin2_5_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
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
    
    public function StateAdmin2_5_CreateCity3(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city3 = $I->GenerateNameOf("CityAccess3");
        $state   = $this->state;
        $zips    = $this->zip3 = $I->GenerateZipCode();
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $cit = $I->GetCityOnPageInList($city);
        $this->idCity3 = $cit['id'];
    }
    
    //--------------------State admin create Audit Subgroups--------------------
    public function StateAdmin2_6_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $subgroup = $I->GetAuditSubgroupOnPageInList($name);
        $this->idSubgroup1_Energy = $subgroup['id'];
    }
    
    //---------------------State Admin Create Coordinator-----------------------
    
    public function StateAdmin2_7_CreateCoordinatorUserWithoutShowInfo_ForProgram2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator1_Prog2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'off');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator1 = $coordinator['id'];
    }
    
    public function StateAdmin2_8_CreateCoordinatorUserWithShowInfo_ForProgram2_Program1(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator2_Prog1_Prog2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'on');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator2 = $coordinator['id'];
    }
    
    public function StateAdmin2_8_1_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->canSee('3', Page\UserList::$SummaryCount);
        
        $I->comment("---Check Master admin absent in All Users list---");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        $I->comment("-------Check State admin present in All Users list------");
        $user1 = $I->GetUserOnPageInList($this->emailStateAdmin, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailStateAdmin, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_StateAdmin, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_StateAdmin, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('state admin', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------Check Coordinator1 in All Users list-------");
        $user2 = $I->GetUserOnPageInList($this->emailCoordinator1_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailCoordinator1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('coordinator', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------Check Coordinator2 in All Users list-------");
        $user3 = $I->GetUserOnPageInList($this->emailCoordinator2_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->emailCoordinator2_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('coordinator', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
    }
    
    //--------------------------Create global variable--------------------------
    public function StateAdmin2_9_1_GlobalVariableOverride(\Step\Acceptance\GlobalVariable $I)
    {
        $title            = $I->GenerateNameOf("GlobalVariable override by state admin");
        $value            = '1';
        $targetType       = 'State';
        $targetId         = $this->state;
                
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->idGlobalVariable_NatAdm));
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->waitPageLoad();
        $I->OverrideGlobalVariable($title, null, $value, $targetType, $targetId);
        $var = $I->GetGlobalVariableOnPageInList($title, 'State' , $this->state);
        $this->idGlobalVariable_StAdm = $var['id'];
    }
    
    //----------------------Create Sector Checklist Tier1-----------------------
    public function StateAdmin2_9_2_SectorChecklistCreate(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '1';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->PublishSectorChecklistStatus();
        $I->reloadPage();
        $I->waitPageLoad();
        $this->idSC_OfficeRetail_T1_StAdm = $I->GetIdOfPublishedSectorChecklist();
    }
    
    
    //---------------------Create Applicant Email Text--------------------------
    public function StateAdmin2_9_3_ApplicantEmailTextCreate(\Step\Acceptance\Notification $I)
    {
        $trigger      = 'Getting Started message';
        $subject      = $this->subject_GetStarted_Prog2 = 'sub by state admin';
        $body         = $this->body_GetStarted_Prog2 = 'bodyscsbcbs';
        $program      = $this->program2;
        $programArray = [$program];
                
        $I->CreateApplicantEmailText($subject, $body, $programArray);
        $appEmail = $I->GetApplicantEmailTextOnPageInList($trigger, $program);
        $this->idApplicantEmail_StAdm = $appEmail['id'];
    }
    
    //---------------------Create Applicant Email Text--------------------------
    public function StateAdmin2_9_4_GetApplicationDirectionIdOnList(\Step\Acceptance\Notification $I)
    {
        $key = Page\ApplicationDirectionsList::Key_ContactText;
                
        $I->amOnPage(Page\ApplicationDirectionsList::URL());
        $appDir = $I->GetApplicationDirectionOnPageInList($key, $this->state);
        $this->idApplicationDirection_StAdm = $appDir['id'];
    }
    
    //------------------------Create compliance check type----------------------
    public function StateAdmin2_9_5_ComplianceCheckTypeCreate(\Step\Acceptance\ComplianceCheckType $I)
    {
        $name            = $this->nameComplianceCheck_StAdm = $I->GenerateNameOf("ComplianceCheck by state admin");
                
        $I->CreateComplianceCheckType($name);
        $comp = $I->GetComplianceCheckTypeOnPageInList($name);
        $this->idComplianceCheck_StAdm = $comp['id'];
    }
    
    //-----------------------Create Sector--------------------------
    public function StateAdmin2_9_6_CreateSector(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector1_StAdm = $I->GenerateNameOf("SectAcStAdm");
        $state   = $this->state;
        $program = $this->program2;
        
        $I->amOnPage(\Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->fillField(\Page\SectorCreate::$NameField, $sector);
        $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
        $I->click(\Page\SectorCreate::$CreateButton);
        $I->waitPageLoad();
    }
    
    //-------------------------Create City Message------------------------------
    public function StateAdmin2_9_7_CreateCityMessage(\Step\Acceptance\CityMessage $I) {
        $title     = $this->title_city3Mes = $I->GenerateNameOf("Title to City3 $this->city3 ");
        $message   = $this->message_city3Mes = $I->GenerateNameOf("Message to City3 $this->city3 ");;
        $cityArray = [$this->city3];
        
        $I->amOnPage(\Page\CityMessageCreate::URL());
        $I->click(\Page\CityMessageCreate::$CitySelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city1));
        $I->cantSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city2));
        $I->canSeeElement(\Page\CityMessageCreate::selectCityOptionByName($this->city3));
        $I->CreateMessage($title, $message, $cityArray);
        $mes = $I->GetMessageOnPageInList($title);
        $this->id_city3Mes = $mes['id'];
    }
    
    
    //----------------------Create Completion Notification----------------------
    public function StateAdmin2_9_8_CreateCompletionNotification_StateLevel_Energy_Water(\Step\Acceptance\CompletionNotifications $I) {
        $program = null;
        $this->SL_message_Energy_Water_EMAIL = $message = $I->GenerateNameOf("Message to business State Level--Energy&Water--Email ");
        $auditGroupsArray = [\Page\AuditGroupList::Energy_AuditGroup, \Page\AuditGroupList::Water_AuditGroup];
        $sendEmail = 'yes';
        $this->Subject_SL_message_Energy_Water_EMAIL = $emailSubject = $I->GenerateNameOf("Email subject State Level--Energy&Water--Email ");
        $this->Body_SL_message_Energy_Water_EMAIL = $emailBody = $I->GenerateNameOf("Email body State Level--Energy&Water--Email ");
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
        $mes = $I->GetCompletionNotificationOnPageInList($message);
        $this->id_SL_message_Energy_Water_EMAIL = $mes['id'];
    }
    
    public function StateAdmin2_9_9_CreateCompletionNotification_Program1Level_Energy(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program1;
        $this->P1L_message_Energy = $message = $I->GenerateNameOf("Message to business Program1 Level--Energy ");
        $auditGroupsArray = [\Page\AuditGroupList::Energy_AuditGroup];
        $sendEmail = 'no';
        $emailSubject = null;
        $emailBody = null;
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
        $mes = $I->GetCompletionNotificationOnPageInList($message, $program);
        $this->id_P1L_message_Energy = $mes['id'];
    }
    
    public function StateAdmin2_9_10_Program2_EnableNotifications(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program2;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->click(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonLine_ByNameValue($program));
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
    
    public function Coordinator3_LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator1_Prog2, $this->password, $I, 'coordinator');
    }
    
    //--------------------------------Main Menu---------------------------------
    public function Coordinator3_1_CoordinatorMainMenu(AcceptanceTester $I)
    {
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
        $I->cantSee('Cities', \Page\MainMenu::$MenuItem);
        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
        $I->cantSee('Communication', \Page\MainMenu::$MenuItem);
        for($i=0, $c= count($this->mainMenu_Coordinator); $i<$c; $i++){
            $I->canSee($this->mainMenu_Coordinator[$i], Page\MainMenu::$MenuItem);
        }
        $I->canSee('Prefer Program', Page\MainMenu::$MenuItem);
    }
    
    public function Coordinator3_2_CheckSubItemsInMainMenu(AcceptanceTester $I)
    {
        //Sectors item
        $I->click(\Page\MainMenu::selectMenuItemByName('Sector'));
        $I->waitPageLoad();
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Programs"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Cities"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Sectors"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Source Programs"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Audit Groups"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->waitPageLoad();
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Resources'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Resources', "Measure Green Tips"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Resources', "Green Resources"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Sector Checklists"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Program Checklists"));
        //Tier item
        $I->click(\Page\MainMenu::selectMenuItemByName('Tier'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Tier', "Manage"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Tier', "Landing"));
        //Notification item
        $I->click(\Page\MainMenu::selectMenuItemByName('Notification'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Notification"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Auditor"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Inspector"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Notification', "Completion Notifications"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "All"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
        //Program drop down
        $I->click(Page\MainMenu::$StateSelect);
        $I->waitPageLoad();
        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("$this->program2"));
        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("All Programs"));
    }
    
    //-----------------------No ability to create state-------------------------
    public function Coordinator3_3_1_StatesPages_NotFound_Coordinator(AcceptanceTester $I)
    {
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
        $I->amOnPage(\Page\ProgramList::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\ProgramList::$CreateProgramButton);
        $I->amOnPage(Page\ProgramCreate::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\ProgramCreate::$NameField);
        $I->amOnPage(Page\ProgramUpdate::URL($this->idProg2));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\ProgramUpdate::$NameField);
    }
    
    //--------------------No ability to create audit group----------------------
    public function Coordinator3_3_4_AuditGroupsPages_NotFound_Coordinator(AcceptanceTester $I)
    {
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
        $I->amOnPage(\Page\VideoTutorialsList::URL());
        $I->canSeeElement(Page\VideoTutorialsList::$FilterByCategorySelect);
        $I->amOnPage(Page\VideoTutorialsCreate::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\VideoTutorialsCreate::$TitleField);
        $I->amOnPage(Page\VideoTutorialsUpdate::URL($this->idVideoTutorial_NatAdm));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\VideoTutorialsUpdate::$TitleField);
        $I->amOnPage(Page\VideoTutorialsView::URL($this->idVideoTutorial_NatAdm));
        $I->canSeeElement(Page\VideoTutorialsView::$Description);
    }
    
    //----------------------No ability to create resource-----------------------
    public function Coordinator3_3_7_ResourcesPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\ResourceList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceList::$CreateResourceButton);
        $I->amOnPage(Page\ResourceCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceCreate::$TitleField);
        $I->amOnPage(Page\ResourceUpdate::URL($this->idResource_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ResourceUpdate::$TitleField);
    }
    
    //--------------------No ability to create source program-------------------
    public function Coordinator3_3_8_SourceProgramsPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SourceProgramList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramList::$CreateSourceProgramButton);
        $I->amOnPage(Page\SourceProgramCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramCreate::$TitleField);
        $I->amOnPage(Page\SourceProgramUpdate::URL($this->idSourceProgram_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SourceProgramUpdate::$TitleField);
    }
    
    //------------------No ability to create popup therm option-----------------
    public function Coordinator3_3_9_PopupThermOptionPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\PopupThermOptionList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionList::$CreatePopupThermsOptionButton);
        $I->amOnPage(Page\PopupThermOptionCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionCreate::$NameField);
        $I->amOnPage(Page\PopupThermOptionUpdate::URL($this->idThermOption_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionUpdate::$NameField);
    }
    
    //----------------No ability to create popup lighting option----------------
    public function Coordinator3_3_10_PopupLightingOptionPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\PopupLighting_BuildingTypesList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_BuildingTypesList::$CreateBuildingTypeButton);
        $I->amOnPage(Page\PopupLighting_BuildingTypesCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_BuildingTypesCreate::$NameField);
        $I->amOnPage(Page\PopupLighting_BuildingTypesUpdate::URL('1'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_BuildingTypesUpdate::$NameField);
        //
        $I->amOnPage(\Page\PopupLighting_DeerHoursList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_DeerHoursList::$CreateDeerHourButton);
        $I->amOnPage(Page\PopupLighting_DeerHoursCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_DeerHoursCreate::$BuildingSpaceSelect);
        $I->amOnPage(Page\PopupLighting_DeerHoursUpdate::URL('1'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_DeerHoursUpdate::$BuildingSpaceSelect);
        //
        $I->amOnPage(\Page\PopupLighting_FixtureMapsList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_FixtureMapsList::$CreateFixtureMapsButton);
        $I->amOnPage(Page\PopupLighting_FixtureMapsCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_FixtureMapsCreate::$ReplacementLightingNameField);
        $I->amOnPage(Page\PopupLighting_FixtureMapsUpdate::URL('1'));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupLighting_FixtureMapsUpdate::$ReplacementLightingNameField);
    }
    
    //-----------------------No ability to create points------------------------
    public function Coordinator3_3_11_PointPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\WeightPointsList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsList::$NameLinkHead);
        $I->amOnPage(Page\WeightPointsCreate::URL_Sections($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsCreate::URL_YesOrNo($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
        $I->amOnPage(Page\WeightPointsManage::URL($this->idState));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\WeightPointsManage::$CreateYesOrNoButton);
    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_12_SavingAreaPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SavingAreaList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaList::$CreateSavingAreaButton);
        $I->amOnPage(Page\SavingAreaCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaCreate::$NameField);
        $I->amOnPage(Page\SavingAreaUpdate::URL($this->idSavingArea_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\SavingAreaUpdate::$NameField);
    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_13_GlobalVariablePages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\GlobalVariableList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\GlobalVariableList::$CreateGlobalVariableButton);
        $I->amOnPage(Page\GlobalVariableCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\GlobalVariableCreate::$NameField);
        $I->amOnPage(Page\GlobalVariableUpdate::URL($this->idGlobalVariable_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\GlobalVariableUpdate::$NameField);
    }
    
    //----------------------No ability to create state admin--------------------
    public function Coordinator3_3_14_StateAdminPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserList::$CreateUserButton);
        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserCreate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idStateAdmin));
        $I->canSeePageForbiddenAccess($I, 'Access Denied');
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
    }
    
    //----------------------No ability to create state admin--------------------
    public function Coordinator3_3_15_CoordinatorPages_NotFound(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::coordinatorType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserList::$CreateUserButton);
        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\UserCreate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idCoordinator1));
        $I->canSeePageForbiddenAccess($I, 'Access Denied');
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
        $I->amOnPage(Page\UserUpdate::URL($this->idCoordinator2));
        $I->canSeePageForbiddenAccess($I, 'Access Denied');
        $I->cantSeeElement(Page\UserUpdate::$EmailField);
    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_16_SectorChecklistPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorChecklistList::URL());
        $I->canSee($this->idSC_OfficeRetail_T1_StAdm, Page\SectorChecklistList::IdLine('1'));
        $I->canSeeElement(Page\SectorChecklistList::ViewButtonLine('1'));
        $I->cantSeeElement(Page\SectorChecklistList::CopyButtonLine('1'));
        $I->cantSeeElement(Page\SectorChecklistList::ManageButtonLine('1'));
        $I->cantSeeElement(Page\SectorChecklistList::SummaryButtonLine('1'));
        $I->cantSeeElement(Page\SectorChecklistList::$CreateSectorChecklistButton);
        $I->amOnPage(Page\SectorChecklistCreate::URL($this->idState));
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\SectorChecklistCreate::$NumberSelect);
        $I->amOnPage(Page\SectorChecklistManage::URL($this->idSC_OfficeRetail_T1_StAdm));
        $I->canSeeElement(Page\SectorChecklistManage::$SaveButton_Header.'.disabled');
        $I->canSeeElement(Page\SectorChecklistManage::$SaveButton_Footer.'.disabled');
        $I->canSeeElement(Page\SectorChecklistManage::$PrintButton);
        $I->canSeeElement(Page\SectorChecklistManage::$PreviewButton);
        $I->canSeeInCurrentUrl(\Page\SectorChecklistManage::URL($this->idSC_OfficeRetail_T1_StAdm));
    }
    
    //------------------------No ability to notifications-----------------------
    public function Coordinator3_3_17_NotificationPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\ApplicantEmailTextList::URL());
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\ApplicantEmailTextList::$CreateApplicantEmailButton);
        $I->amOnPage(Page\ApplicantEmailTextCreate::URL());
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\ApplicantEmailTextCreate::$TriggerSelect);
        $I->amOnPage(Page\ApplicantEmailTextManage::URL($this->idApplicantEmail_StAdm));
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\ApplicantEmailTextManage::$SubjectField);
        $I->amOnPage(\Page\ApplicationDirectionsList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ApplicationDirectionsList::ManageButtonLine('1'));
        $I->amOnPage(Page\ApplicationDirectionsManage::URL($this->idApplicationDirection_StAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ApplicationDirectionsManage::$ContentField);
    }
    
    //----------------------No ability to create saving area--------------------
    public function Coordinator3_3_18_ComplianceCheckTypePages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\ComplianceCheckTypeList::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ComplianceCheckTypeList::$CreateComplianceCheckTypeButton);
        $I->amOnPage(Page\ComplianceCheckTypeCreate::URL());
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ComplianceCheckTypeCreate::$NameField);
        $I->amOnPage(Page\ComplianceCheckTypeUpdate::URL($this->idComplianceCheck_StAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\ComplianceCheckTypeUpdate::$NameField);
    }
    
    //------------------------No ability to create sector-----------------------
    public function Coordinator3_3_19_SectorPages_NotFound_Coordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorList::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\SectorList::$CreateSectorButton);
        $I->amOnPage(Page\SectorCreate::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\SectorCreate::$NameField);
    }
    
//    //-----------------------Coordinator Create Sector--------------------------
//    public function Coordinator3_4_CreateSector(\Step\Acceptance\Sector $I) {
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
//        $I->wait(4);
//    }
    
    //------------------------No ability to create measure-----------------------
    public function Coordinator3_3_20_MeasuresCreatePages_NotFound_Coordinator(AcceptanceTester $I)
    {
//        $I->wait(1);
//        $I->amOnPage(\Page\SectorList::URL());
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\SectorList::$CreateSectorButton);
        $I->amOnPage(Page\MeasureCreate::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\MeasureCreate::$DescriptionField);
    }

    
    //---------------------Coordinator create Inspector-------------------------
    
    public function Coordinator3_12_CreateInspectorUser(Step\Acceptance\User $I)
    {
        $userType                  = Page\UserCreate::inspectorType;
        $email                     = $this->emailInspector_Prog2 = $I->GenerateEmail();
        $firstName                 = $I->GenerateNameOf('firnam');
        $lastName                  = $I->GenerateNameOf('lastnam');
        $password                  = $confirmPassword = $this->password;
        $phone                     = $I->GeneratePhoneNumber();
        $this->nameInspector_Prog2 = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
        $I->wait(1);
    }
    
    //------------------------Coordinator create Auditor------------------------
    
    public function Coordinator3_13_CreateAuditorUser(Step\Acceptance\User $I)
    {
        $userType          = Page\UserCreate::auditorType;
        $email             = $this->emailAuditor_Prog2 = $I->GenerateEmail();
        $firstName         = $I->GenerateNameOf('firnam');
        $lastName          = $I->GenerateNameOf('lastnam');
        $password          = $confirmPassword = $this->password;
        $phone             = $I->GeneratePhoneNumber();
        $this->nameAuditor = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
    }
    
    public function Coordinator3_14_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->canSee('3', Page\UserList::$SummaryCount);
        
        $I->comment("-------Check Master admin absent in All Users list-------");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        $I->comment("--------Check State admin absent in All Users list-------");
        $I->cantSee($this->emailStateAdmin, \Page\UserList::$EmailRow);
        $I->cantSee('state admin', \Page\UserList::$TypeRow);
        
        $I->comment("-------Check Coordinator1 present in All Users list------");
        $user2 = $I->GetUserOnPageInList($this->emailCoordinator1_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailCoordinator1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('coordinator', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------Check Coordinator2 absent in All Users list-------");
        $I->cantSee($this->emailCoordinator2_Prog1_Prog2, \Page\UserList::$EmailRow);
        
        $I->comment("------------Check Inspector in All Users list------------");
        $user2 = $I->GetUserOnPageInList($this->emailInspector_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailInspector_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('inspector', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------------Check Auditor in All Users list-------------");
        $user3 = $I->GetUserOnPageInList($this->emailAuditor_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->emailAuditor_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('auditor', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
    }
    
    //-----------------------Login as Created Inspector-------------------------
    public function Inspector4_LogOut_And_LogInAsInspector(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailInspector_Prog2, $this->password, $I, 'inspector');
    }
    
    //-------------------------Inspector Main Menu------------------------------
    public function Inspector4_1_InspectorMainMenu(AcceptanceTester $I)
    {
        for($i=0, $c= count($this->mainMenu_Inspector); $i<$c; $i++){
            $I->canSee($this->mainMenu_Inspector[$i], Page\MainMenu::$MenuItem);
        }
        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
    }
    
    //-----------------------Inspector Empty Dashboard--------------------------
    public function Inspector4_2_InspectorEmptyDashboard(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->canSee('Inspector Tasks', Page\Dashboard::$TasksTitle);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
        $I->canSee('City', Page\Dashboard::$CityHead);
        $I->canSee('Contact', Page\Dashboard::$ContactHead);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
        $I->canSee('Email', Page\Dashboard::$EmailHead);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
        
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSee('Archive of businesses that have been passed', Page\Dashboard::$TasksTitle_ArchivedTasks);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead_ArchivedTasks);
        $I->canSee('City', Page\Dashboard::$CityHead_ArchivedTasks);
        $I->canSee('Contact', Page\Dashboard::$ContactHead_ArchivedTasks);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead_ArchivedTasks);
        $I->canSee('Email', Page\Dashboard::$EmailHead_ArchivedTasks);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead_ArchivedTasks);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead_ArchivedTasks);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead_ArchivedTasks);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead_ArchivedTasks);
    }
    
    //-----------------------Login as Created Auditor-------------------------
    public function Auditor5_LogOut_And_LogInAsAuditor(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailAuditor_Prog2, $this->password, $I, 'auditor');
    }
    
    //---------------------------Auditor Main Menu------------------------------
    public function Auditor5_1_AuditorMainMenu(AcceptanceTester $I)
    {
        for($i=0, $c= count($this->mainMenu_Auditor); $i<$c; $i++){
            $I->canSee($this->mainMenu_Auditor[$i], Page\MainMenu::$MenuItem);
        }
        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
    }
    
    //-------------------------Auditor Empty Dashboard--------------------------
    public function Auditor5_2_AuditorEmptyDashboard(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->canSee('Auditor Tasks', Page\Dashboard::$TasksTitle);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
        $I->canSee('City', Page\Dashboard::$CityHead);
        $I->canSee('Address', Page\Dashboard::$AddressHead);
        $I->canSee('Contact', Page\Dashboard::$ContactHead);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
        $I->canSee('Email', Page\Dashboard::$EmailHead);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
        
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSee('Archive of businesses that have been passed', Page\Dashboard::$TasksTitle_ArchivedTasks);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead_ArchivedTasks);
        $I->canSee('City', Page\Dashboard::$CityHead_ArchivedTasks);
        $I->canSee('Contact', Page\Dashboard::$ContactHead_ArchivedTasks);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead_ArchivedTasks);
        $I->canSee('Email', Page\Dashboard::$EmailHead_ArchivedTasks);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead_ArchivedTasks);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead_ArchivedTasks);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead_ArchivedTasks);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead_ArchivedTasks);
    }
    
    //--------------------------Login as Coordinator----------------------------
    public function Coordinator6_LogOut_And_LogInAsCoordinatore(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator1_Prog2, $this->password, $I, 'coordinator');
    }
    
    //----------------Coordinator create Inspector Organization-----------------
    
    public function Coordinator6_1_CreateInspectorOrganization(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->InspectorOrganization1_Coordinator = $I->GenerateNameOf('InsOrg_Coordinator');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->waitForElement(Page\InspectorOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->nameInspector_Prog2);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->nameInspector_Prog2));
        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->nameComplianceCheck_StAdm);
        $I->waitPageLoad();
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->nameComplianceCheck_StAdm));
    }
    
    //-------------------Coordinator create Audit Organization------------------
    
    public function Coordinator6_2_CreateAuditOrganization(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->AuditOrganization1_Coordinator = $I->GenerateNameOf('AuditOrg_Coordinator');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->waitForElement(Page\AuditOrganizationUpdate::$AddMemberButton, 150);
        $I->canSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->nameAuditor);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->nameAuditor));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->waitPageLoad();
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
        $I->waitPageLoad();
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
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Wastewater_AuditGroup);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Wastewater_AuditGroup));
    }
    
    //-----------------------Login as Created Inspector-------------------------
    public function Inspector7_LogOut_And_LogInAsInspector2(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailInspector_Prog2, $this->password, $I, 'inspector');
    }
    
    //-------------------------Inspector Main Menu------------------------------
    public function Inspector7_1_InspectorMainMenu2(AcceptanceTester $I)
    {
        for($i=0, $c= count($this->mainMenu_Inspector); $i<$c; $i++){
            $I->canSee($this->mainMenu_Inspector[$i], Page\MainMenu::$MenuItem);
        }
        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
    }
    
    //-----------------------Inspector Empty Dashboard--------------------------
    public function Inspector7_2_InspectorEmptyDashboard2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->canSee('Inspector Tasks', Page\Dashboard::$TasksTitle);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
        $I->canSee('City', Page\Dashboard::$CityHead);
        $I->canSee('Address', Page\Dashboard::$AddressHead);
        $I->canSee('Contact', Page\Dashboard::$ContactHead);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
        $I->canSee('Email', Page\Dashboard::$EmailHead);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
        
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSee('Archive of businesses that have been passed', Page\Dashboard::$TasksTitle_ArchivedTasks);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead_ArchivedTasks);
        $I->canSee('City', Page\Dashboard::$CityHead_ArchivedTasks);
        $I->canSee('Contact', Page\Dashboard::$ContactHead_ArchivedTasks);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead_ArchivedTasks);
        $I->canSee('Email', Page\Dashboard::$EmailHead_ArchivedTasks);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead_ArchivedTasks);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead_ArchivedTasks);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead_ArchivedTasks);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead_ArchivedTasks);
    }
    
    //-----------------------Login as Created Auditor-------------------------
    public function Auditor8_LogOut_And_LogInAsAuditor2(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailAuditor_Prog2, $this->password, $I, 'auditor');
    }
    
    //-------------------------Auditor Main Menu------------------------------
    public function Auditor8_1_AuditorMainMenu2(AcceptanceTester $I)
    {
        for($i=0, $c= count($this->mainMenu_Auditor); $i<$c; $i++){
            $I->canSee($this->mainMenu_Auditor[$i], Page\MainMenu::$MenuItem);
        }
        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
        $I->cantSee('Measures', \Page\MainMenu::$MenuItem);
        $I->cantSee('Green Tips', \Page\MainMenu::$MenuItem);
        $I->cantSee('Checklists', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tiers', \Page\MainMenu::$MenuItem);
        $I->cantSee('Tier', \Page\MainMenu::$MenuItem);
        $I->cantSee('Users', \Page\MainMenu::$MenuItem);
        $I->cantSee('States', \Page\MainMenu::$MenuItem);
        $I->cantSee('Notification', \Page\MainMenu::$MenuItem);
        $I->cantSee('Reports', \Page\MainMenu::$MenuItem);
        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
    }
    
    //-------------------------Auditor Empty Dashboard--------------------------
    public function Auditor8_2_AuditorEmptyDashboard2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->canSee('Auditor Tasks', Page\Dashboard::$TasksTitle);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead);
        $I->canSee('City', Page\Dashboard::$CityHead);
        $I->canSee('Address', Page\Dashboard::$AddressHead);
        $I->canSee('Contact', Page\Dashboard::$ContactHead);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead);
        $I->canSee('Email', Page\Dashboard::$EmailHead);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead);
        $I->canSee('Action', Page\Dashboard::$ActionLinkHead);
        
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSee('Archive of businesses that have been passed', Page\Dashboard::$TasksTitle_ArchivedTasks);
        $I->canSee('Company name', Page\Dashboard::$CompanyHead_ArchivedTasks);
        $I->canSee('City', Page\Dashboard::$CityHead_ArchivedTasks);
        $I->canSee('Address', Page\Dashboard::$AddressHead_ArchivedTasks);
        $I->canSee('Contact', Page\Dashboard::$ContactHead_ArchivedTasks);
        $I->canSee('Phone', Page\Dashboard::$PhoneHead_ArchivedTasks);
        $I->canSee('Email', Page\Dashboard::$EmailHead_ArchivedTasks);
        $I->canSee('Review Type', Page\Dashboard::$ReviewTypeLinkHead_ArchivedTasks);
        $I->canSee('Audit Status', Page\Dashboard::$AuditStatusLinkHead_ArchivedTasks);
        $I->canSee('Audit Ready Date', Page\Dashboard::$AuditReadyDateLinkHead_ArchivedTasks);
        $I->canSee('Completion Date', Page\Dashboard::$CompletionDateLinkHead_ArchivedTasks);
    }
    
    //-------------------Login as State Admin to approve measures---------------
    public function StateAdmin9_LogOut_And_LogInAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //---------------Coordinator Create Not Quantitative Measures---------------
    public function StateAdmin3_5_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc1_Coordinator = $I->GenerateNameOf("Description Created by Coordinator1");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(2);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->wait(6);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 45);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure1_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    
    
    public function StateAdmin3_6_CreateMeasure_NotQuantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc2_Coordinator = $I->GenerateNameOf("Description Created by Coordinator2");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(2);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->wait(6);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 45);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($this->measureDesc2_Coordinator)); 
        $this->idMeasure2_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
   
    public function StateAdmin3_7_CreateMeasure_NotQuantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc3_Coordinator = $I->GenerateNameOf("Description Created by Coordinator3");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->wait(6);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 45);
        $this->idMeasure3_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Coordinator10_LogOut_And_LogInAsCoordinatorr2(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator1_Prog2, $this->password, $I, 'coordinator');
    }
    
    //-----------------Coordinator create Green Tips for measures---------------
    public function Coordinator3_8_CreateGreenTipForMeasure1(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1_Coordinator;
        $descGT      = $this->grTip1_Coordinator = $I->GenerateNameOf("GT1_Coordinator");
        $program     = [$this->program2];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1_Coordinator));
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1_Coordinator));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Coordinator3_9_CreateGreenTipForMeasure2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc2_Coordinator;
        $descGT      = $this->grTip2_Coordinator = $I->GenerateNameOf("GT2_Coordinator");
        $program     = [$this->program2];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2_Coordinator));
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2_Coordinator));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    //------------------Coordinator create Checklist For Tier 1-----------------
    public function Coordinator3_10_ActivateSectorForProgram2_CreateChecklistForTier1_MeasuresArePresentsent_ButNotActivated(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $program            = $this->program2;
        $sector             = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $sector);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->cantSeeElement(\Page\SectorsManage::ToggleButtonLine_ByNameValue($program, $sector));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistList::URL());
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->waitPageLoad();
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $this->id_programChecklist2_T1 = $I->grabTextFrom(\Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
        $I->click(Page\ChecklistList::ManageButtonLine('1'));
        $I->waitPageLoad();
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
    }
    
    //-------------------------Coordinator activate Tier 1----------------------
    public function Coordinator3_11_UpdateTier1_ActivationIsNotAvailable(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier1      = '1';
        $tier1Name  = $this->tier1Name = "tiername1_Coordinator";
        $tier1Desc  = 'tier desc update by coordinator';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->cantSee($this->program1, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee('Tier 1', Page\TierManage::$Tier1Button_LeftMenu);
        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
        $I->click(\Page\TierManage::$Tier1Button_LeftMenu);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElementIsDisabled($I, \Page\TierManage::$NoRadioButton_OptIn.'/input', 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\TierManage::$YesRadioButton_OptIn.'/input', 'xpath');
        $I->click(\Page\TierManage::$Tier2Button_LeftMenu);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElementIsDisabled($I, \Page\TierManage::$NoRadioButton_OptIn.'/input', 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\TierManage::$YesRadioButton_OptIn.'/input', 'xpath');
        $I->click(\Page\TierManage::$Tier3Button_LeftMenu);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElementIsDisabled($I, \Page\TierManage::$NoRadioButton_OptIn.'/input', 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\TierManage::$YesRadioButton_OptIn.'/input', 'xpath');
        $I->ManageTiers($program, $tier1='1', $tier1Name, $tier1Desc, null);
    }
    
    //----------------------Adding Benefits Tier 1 for Program2-----------------
    public function Coordinator_Program2_AddingBenefitsToTier1(\Step\Acceptance\Tier $I) {
        $program       = $this->program2;
        $tierNumber    = '1';
        $benefitsArray = $this->benefits_P2_T1;
        
        $I->AddBenefitToTier($program, $tierNumber, $benefitsArray);
    }
    
    //----------------------Adding Benefits Tier 2 for Program2-----------------
    public function Coordinator_Program2_AddingBenefitsToTier2(\Step\Acceptance\Tier $I) {
        $program       = $this->program2;
        $tierNumber    = '2';
        $benefitsArray = $this->benefits_P2_T2;
        
        $I->AddBenefitToTier($program, $tierNumber, $benefitsArray);
    }
    
    //-----------------------------Create Landings for -------------------------
    
    public function CreateTierLanding_Program2_Tier2_1(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = 'Tier 2';
        $title       = $this->P2_2_LandTitle1 = $I->GenerateNameOf("Title Prog2_T2_1 ");
        $description = $this->P2_2_LandDesc1 = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program2 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
    }
    
    public function CreateTierLanding_Program2_Tier2_2(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = 'Tier 2';
        $title       = $this->P2_2_LandTitle2 = $I->GenerateNameOf("Title Prog2_T2_2 ");
        $description = $this->P2_2_LandDesc2 = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program2 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier2 Program2 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle1));
    }
    
    public function Activate_Program2_Tier2_AllItems(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = 'Tier 2';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_2_LandTitle1), ".left-column.landing-list");
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_2_LandTitle2), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle1));
        $I->wait(2);
        $I->click(Page\TierLandingManage::$SaveOrderButton);
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle1));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle2));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle1));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle2));
        $I->canSee($this->P2_2_LandTitle1, Page\TierLandingManage::TitleLine('1'));
        $I->canSee($this->P2_2_LandTitle2, Page\TierLandingManage::TitleLine('2'));
    }
    
    //-------------------Login as State Admin to approve measures---------------
    public function StateAdmin9_LogOut_And_LogInAsStateAdmin2(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //-------------------------Coordinator activate Tier 1----------------------
    public function StateAdmin3_11_ActivateTier1(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier1      = '1';
        $tier1Name  = $this->tier1Name = "tiername1_Coordinator";
        $tier1Desc  = 'tier desc update by coordinator';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->canSee($this->program1, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee($tier1Name, Page\TierManage::$Tier1Button_LeftMenu);
        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
        $I->ManageTiers($program, $tier1='1', null, null, $tier1OptIn);
    }
    
    //------------------State Admin create Sector Checklist For Tier 2-----------------
    public function StateAdmin9_4_CreateSectorChecklistForTier2_OfficeRetail(\Step\Acceptance\SectorChecklist $I) {
        $number = '2';
        $sector = \Page\SectorList::DefaultSectorOfficeRetail;
        $descs  = $this->measuresDesc_SuccessCreated;
               
        $this->idSC_OfficeRetail_T2_StAdm = $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
        $I->CheckSavedValuesOnManageSectorChecklistPage($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
    }
    
    //------------------Coordinator create Checklist For Tier 2-----------------
    public function StateAdmin9_5_CreateSectorChecklistForTier2_Sector1(\Step\Acceptance\SectorChecklist $I) {
        $number = '2';
        $sector = $this->sector1_StAdm;
        $descs  = $this->measuresDesc_SuccessCreated;
        
        $this->idSC_Sector1_T3_StAdm = $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
        $I->CheckSavedValuesOnManageSectorChecklistPage($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->PublishSectorChecklistStatus(1);
    }
    
    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
    
    public function Coordinator10_LogOut_And_LogInAsCoordinatorr(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator1_Prog2, $this->password, $I, 'coordinator');
    }
    
    //------------------Coordinator create Checklist For Tier 1-----------------
    public function Coordinator10_1_UpdateChecklistForTier1(\Step\Acceptance\Checklist $I) {
        $descs              = $this->measuresDesc_SuccessCreated;
        
//        $id_checklist = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_programChecklist2_T1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
        $I->ManageChecklist($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
        $I->reloadPage();
        $I->waitPageLoad();
//        $I->PublishChecklistStatus($id_checklist);
    }
    
    public function Coordinator10_2_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------Business registration. Program without checklist--------------
    public function Business11_BusinessRegister_SectorWithoutChecklistAbsentInDropDown_Program1(Step\Acceptance\Business $I)
    {
        $zip              = $this->zip1;
        $city             = $this->city1;
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        
        $I->amOnPage(\Page\BusinessRegistration::$URL);
        $I->fillField(\Page\BusinessRegistration::$ZipField, $zip);
        $I->wait(1);
        $I->click(\Page\BusinessRegistration::$CitySelect);
        $I->wait(2);
        $I->selectOption(\Page\BusinessRegistration::$CitySelect, $city);
        $I->wait(1);
        $I->click(\Page\BusinessRegistration::$BusinessTypeSelect);
        $I->wait(1);
        $I->cantSee($busType, \Page\BusinessRegistration::$BusinessTypeOption);
    }
    
    //------------Business registration. Sector without checklist--------------
    public function Business12_BusinessRegister_SectorWithoutChecklistAbsentInDropDown_Program2_Sector2(Step\Acceptance\Business $I)
    {
        $zip              = $this->zip2;
        $city             = $this->city2;
        $busType          = $this->sector1_StAdm;
        
        $I->amOnPage(\Page\BusinessRegistration::$URL);
        $I->fillField(\Page\BusinessRegistration::$ZipField, $zip);
        $I->wait(1);
        $I->click(\Page\BusinessRegistration::$CitySelect);
        $I->wait(2);
        $I->selectOption(\Page\BusinessRegistration::$CitySelect, $city);
        $I->wait(1);
        $I->click(\Page\BusinessRegistration::$BusinessTypeSelect);
        $I->wait(1);
        $I->cantSee($busType, \Page\BusinessRegistration::$BusinessTypeOption);
    }
    
    //------------Business registration. City Message popup check--------------
    public function Business13_BusinessRegister_CityMessageThatCityHaveNotProgram(Step\Acceptance\CityMessage $I)
    {
        $zip          = $this->zip3;
        $result       = 'popup';   
        $cityArray    = null;
        $titlePopup   = $this->title_city3Mes;
        $messagePopup = $this->message_city3Mes;
                
        $I->CityMessageCheckOnRegisterBusiness($zip, $result, $cityArray, $titlePopup, $messagePopup);
        $I->click(Page\BusinessRegistration::$CityZipMessagePopup_OkButton);
        $I->wait(2);
        $I->click(\Page\BusinessRegistration::$CitySelect);
        $I->wait(2);
        $I->cantSee($this->city3, \Page\BusinessRegistration::$CityOption);
        $I->wait(1);
        $I->click(\Page\BusinessRegistration::$BusinessTypeSelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\BusinessRegistration::$BusinessTypeOption);
    }
    
    //-----------Business registration. Program&Sector with checklist-----------
    public function Business14_BusinessRegister_WithChecklist_Program2_OfficeRetail(Step\Acceptance\Business $I)
    {
        $firstName        = $this->bus3_firstName_Prog2 = $I->GenerateNameOf("fnUserAccess3");
        $lastName         = $this->bus3_lastName_Prog2 = $I->GenerateNameOf("lnUserAccess3");
        $phoneNumber      = $this->bus3_phone_Prog2 = $I->GeneratePhoneNumber();
        $email            = $this->bus3_email_Prog2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business3_Prog2 = $I->GenerateNameOf("busnamUA3");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $this->bus3_address_Prog2 = $I->GenerateNameOf("addr");;
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        $this->bus3_userFullName = $firstName.' '.$lastName;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        $I->wait(2);
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
        $I->click(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(4);
        $I->cantSee("Attention!");
        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->canSee("Print $this->tier1Name", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
        $I->cantSee("Tier 2");
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator1_Prog2));
//        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator2_Prog1_Prog2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor_Prog2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector_Prog2));
    }
    
    public function Business14_1_CheckGreenTipForMeasure1_Quant_MultipleQuesAndNumber(AcceptanceTester $I) {
        $I->wantTo("Check ");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measureDesc3_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc3_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureGreenTip($this->grTip1_Coordinator));
        $I->canSeeElement(Page\RegistrationStarted::MeasureGreenTip($this->grTip2_Coordinator));
    }
    
    public function Business3_CheckLandingPage_Tier1(Step\Acceptance\TierLanding $I)
    {
        
        $I->amOnPage(\Page\LandingForTier::URL_BusLogin());
        $I->canSee("1", \Page\LandingForTier::$Title_NumberIcon_1stTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier1Name LEVEL", \Page\LandingForTier::$Title_TierInfo_1stTier);
        $I->cantSeeElement(\Page\LandingForTier::Line('1'));
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('1', \Page\LandingForTier::$FirstTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier1Name Benefits", \Page\LandingForTier::$FirstTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('1', $this->benefits_P2_T1);
        $I->cantSeeElement(\Page\LandingForTier::$SecondTierTitle_BenefitsBlock);
    }
    
    public function Business3_Energy_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    public function Business3_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business3_Prog2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business3_CompleteMeasure2_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business3_Prog2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business3_CompleteMeasure3_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business3_Prog2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business3_Energy_MessageAbsent_AfterCompleting(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    public function Business3_Energy_EmailAbsent_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->canSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    public function Coordinator13_2_LogOut2df(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator2_Prog1_Prog2, $this->password, $I, 'coordinator');
    }
    
    public function Coordinator13_2_1_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->canSee('4', Page\UserList::$SummaryCount);
        
        $I->comment("-------Check Master admin absent in All Users list-------");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        $I->comment("--------Check State admin absent in All Users list-------");
        $I->cantSee($this->emailStateAdmin, \Page\UserList::$EmailRow);
        $I->cantSee('state admin', \Page\UserList::$TypeRow);
        
        $I->comment("-------Check Coordinator1 absent in All Users list-------");
        $I->cantSee($this->emailCoordinator1_Prog2, \Page\UserList::$EmailRow);
        
        $I->comment("-------Check Coordinator2 absent in All Users list-------");
        $user2 = $I->GetUserOnPageInList($this->emailCoordinator2_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailCoordinator2_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('coordinator', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("------------Check Inspector in All Users list------------");
        $user2 = $I->GetUserOnPageInList($this->emailInspector_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailInspector_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('inspector', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------------Check Auditor in All Users list-------------");
        $user3 = $I->GetUserOnPageInList($this->emailAuditor_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->emailAuditor_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('auditor', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("----------Check Business3 user in All Users list---------");
        $user3 = $I->GetUserOnPageInList($this->bus3_email_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->bus3_email_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->bus3_firstName_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->bus3_lastName_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('business', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
    }
    
    //------------------Coordinator create Checklist For Tier 2-----------------
    public function Coordinator13_3_PublishSectorChecklistForTier2_OfficeRetail(\Step\Acceptance\SectorChecklist $I) {
        $program  = $this->program1;
        $sector   = \Page\SectorList::DefaultSectorOfficeRetail;
        
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->idSC_OfficeRetail_T2_StAdm));
        $I->click(Page\SectorChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->wait(5);
        $I->canSeeElement('.showSweetAlert.visible');
        $I->canSee('Error');
        $I->canSee('Forbidden');
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->idSC_OfficeRetail_T2_StAdm));
        $I->click(Page\SectorChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        $I->wait(5);
        $I->canSeeElement('.showSweetAlert.visible');
        $I->canSee("You don't have access to this checklist!");
    }
    
    public function Coordinator13_4_LogOut2dvff(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    //--------------State Admin publish Sector Checklist For Tier 2-------------
    public function StateAdmin13_3_PublishSectorChecklistForTier2_OfficeRetail(\Step\Acceptance\SectorChecklist $I) {
        $program1  = $this->program1;
        $program2  = $this->program2;
        $sector   = \Page\SectorList::DefaultSectorOfficeRetail;
        
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->idSC_OfficeRetail_T2_StAdm));
        $I->PublishSectorChecklistStatus(1);
        $I->amOnPage(Page\ChecklistList::URL());
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program1, $sector, 'Tier 1'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program1, $sector, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program2, $sector, 'tiername1_Coordinator'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program2, $sector, 'Tier 2'));
    }
    
    public function StateAdmin13_4_LogOut2dff(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator1_Prog2, $this->password, $I, 'coordinator');
    }
    
    //------------------Coordinator create Checklist For Tier 2-----------------
    public function Coordinator13_5_Activate_Program2_Sector1(\Step\Acceptance\Checklist $I) {
        $program = $this->program2;
        $sector  = $this->sector1_StAdm;
        
        $I->wait(1);
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $sector);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($program, $sector));
        $I->wait(5);
        $I->amOnPage(Page\ChecklistList::URL());
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 3'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->wait(2);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 3'));
    }
    
    public function Coordinator13_6_LogOutu(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------Business registration. Program without checklist--------------
    public function Business13_7_BusinessRegister_WithoutChecklist_Program1(Step\Acceptance\Business $I)
    {
        $firstName        = $this->bus1_firstName_Prog1 = $I->GenerateNameOf("fnUserAccess1");
        $lastName         = $this->bus1_lastName_Prog1 = $I->GenerateNameOf("lnUserAccess1");
        $phoneNumber      = $this->bus1_phone_Prog1 = $I->GeneratePhoneNumber();
        $email            = $this->bus1_email_Prog1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1_Prog1 = $I->GenerateNameOf("busnamUA1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $this->bus1_address_Prog1 = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
        $I->click(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(4);
        $I->cantSee("Attention!");
        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->canSee("Print Tier 2", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator1_Prog2));
//        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator2_Prog1_Prog2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor_Prog2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector_Prog2));
    }
    
    public function Business1_CheckLandingPage_Tier2(Step\Acceptance\TierLanding $I)
    {
        $benefits = ['No benefits']; 
        
        $I->amOnPage(\Page\LandingForTier::URL_BusLogin());
        $I->canSee("1", \Page\LandingForTier::$Title_NumberIcon_2ndTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE Tier 2 LEVEL", \Page\LandingForTier::$Title_TierInfo_2ndTier);
        $I->cantSeeElement(\Page\LandingForTier::Line('1'));
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->cantSeeElement(\Page\LandingForTier::Benefit_1stTier_BenefitsBlock(1));
        $I->canSee('No benefits', \Page\LandingForTier::Benefit_2ndTier_BenefitsBlock(1));
        $I->cantSeeElement(\Page\LandingForTier::Benefit_3rdTier_BenefitsBlock(1));
        $I->cantSeeElement(\Page\LandingForTier::$FirstTierTitle_BenefitsBlock);
        $I->canSeeElement(\Page\LandingForTier::$SecondTierTitle_BenefitsBlock);
        $I->cantSeeElement(\Page\LandingForTier::$ThirdTierTitle_BenefitsBlock);
    }
    
    public function Business1_Energy_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
        $I->cantSee($this->P1L_message_Energy);
    }
    
    public function Business1_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business1_Prog1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business1_CompleteMeasure2_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business1_Prog1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business1_CompleteMeasure3_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business1_Prog1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business1_Energy_MessageAbsent_AfterCompleting(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
        $I->cantSee($this->P1L_message_Energy);
    }
    
    public function Business1_Energy_EmailAbsent_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    public function Business13_8_LogOutfv(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
    }
    
    //------------Business registration. Sector without checklist--------------
    public function Business13_9_BusinessRegister_WithChecklist_Program2_Sector2(Step\Acceptance\Business $I)
    {
        $firstName        = $this->bus2_firstName_Prog2 = $I->GenerateNameOf("fnUserAccess2");
        $lastName         = $this->bus2_lastName_Prog2 = $I->GenerateNameOf("lnUserAccess2");
        $phoneNumber      = $this->bus2_phone_Prog2 = $I->GeneratePhoneNumber();
        $email            = $this->bus2_email_Prog2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2_Prog2 = $I->GenerateNameOf("busnamUA2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $this->bus2_address_Prog2 = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = $this->sector1_StAdm;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        $this->bus2_userFullName = $firstName.' '.$lastName;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
        $I->click(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(4);
        $I->cantSee("Attention!");
        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->canSee("Print Tier 2", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator1_Prog2));
//        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator2_Prog1_Prog2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor_Prog2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector_Prog2));
    }
    
    public function Business2_CheckLandingPage_Tier2(Step\Acceptance\TierLanding $I)
    {
        $title1 = $this->P2_2_LandTitle1;
        $title2 = $this->P2_2_LandTitle2;
        
        $I->amOnPage(\Page\LandingForTier::URL_BusLogin());
        $I->canSee("1", \Page\LandingForTier::$Title_NumberIcon_2ndTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE Tier 2 LEVEL", \Page\LandingForTier::$Title_TierInfo_2ndTier);
        $I->canSee($title1, Page\LandingForTier::TitleLine('1'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title1));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title1).\Page\TierLandingManage::$GrayColor);
        $I->canSee($title2, Page\LandingForTier::TitleLine('2'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title2));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title2).\Page\TierLandingManage::$GreenColor);
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('1', \Page\LandingForTier::$SecondTierNumberIcon_BenefitsBlock);
        $I->canSee("Tier 2 Benefits", \Page\LandingForTier::$SecondTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('2', $this->benefits_P2_T2);
    }
    
    public function Business2_Energy_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    public function Business2_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business2_Prog2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business2_CompleteMeasure2_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business2_Prog2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business2_CompleteMeasure3_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3_Coordinator;
                
        $I->comment("Complete Measure1 for business: $this->business2_Prog2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3_Coordinator]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3_Coordinator']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business2_Energy_MessageAbsent_AfterCompleting(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    public function Business2_Energy_EmailPresent_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->canSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    public function Business13_10_LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator1_Prog2, $this->password, $I, 'coordinator');
    }
    
    //----------------------------Coordinator Dashboard-------------------------
    public function Coordinator14_1_CheckDashboard_OnlyBusinessesFromProgram2Present(AcceptanceTester $I) {
        $I->amOnPage(Page\Dashboard::URL());
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        $I->cantSeeElement(\Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        $I->cantSeeElement(\Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1_Prog1));
        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1_Prog1));
        
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2_Prog2));
        $I->canSee('3 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2_Prog2));
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2_Prog2));
        
        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3_Prog2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3_Prog2));
        $I->canSee('2 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3_Prog2));
        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3_Prog2));
        
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(4);
        $I->waitPageLoad();
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1_Prog1));
        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1_Prog1));
        
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2_Prog2));
        $I->canSee('3 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2_Prog2));
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2_Prog2));
        
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3_Prog2));
        $I->canSee('2 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3_Prog2));
        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3_Prog2));
        
        $I->SelectDefaultState($I, $this->program2);
        $I->wait(1);
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1_Prog1));
        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1_Prog1));
        
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2_Prog2));
        $I->canSee('3 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2_Prog2));
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2_Prog2));
        
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3_Prog2));
        $I->canSee('2 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3_Prog2));
        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3_Prog2));
        
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(4);
        $I->waitPageLoad();
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1_Prog1));
        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1_Prog1));
        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1_Prog1));
        
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2_Prog2));
        $I->canSee('3 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2_Prog2));
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2_Prog2));
        
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3_Prog2));
        $I->canSee('2 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3_Prog2));
        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3_Prog2));
    }
    
    public function GetBusiness2ID(AcceptanceTester $I) {
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2_Prog2), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->busId2 = $u2[1];
        $I->comment("Business2 id: $this->busId2.");
    }
    
    public function GetBusiness3ID(AcceptanceTester $I) {
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3_Prog2), 'href');
        $I->comment("Url3: $url3");
        $u3 = explode('=', $url3);
        $this->busId3 = $u3[1];
        $I->comment("Business3 id: $this->busId3.");
    }
    
    public function CheckGetStartedMessage_Business2(AcceptanceTester $I){
        $subject                = $this->subject_GetStarted_Prog2;
        $body                   = $this->body_GetStarted_Prog2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId2));
//        $I->wait(2);
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab('2'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('2'));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab('2'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($this->firstName_Coordinator2." ".$this->lastName_Coordinator2, Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function CheckGetStartedMessage_Business3(AcceptanceTester $I){
        $subject                = $this->subject_GetStarted_Prog2;
        $body                   = $this->body_GetStarted_Prog2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId3));
//        $I->wait(2);
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab('2'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('2'));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab('2'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($this->firstName_Coordinator2." ".$this->lastName_Coordinator2, Page\CommunicationsView::PreviousMessageSender('1'));
    }
        
    public function Coordinator14_2_ChangeStatusToReadyForComplianceCheckTypeInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_ViewButtonByName($this->nameComplianceCheck_StAdm));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->nameComplianceCheck_StAdm), $this->InspectorOrganization1_Coordinator);
        $I->wait(3);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->nameComplianceCheck_StAdm), $this->nameInspector_Prog2);
        $I->wait(3);
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_ViewButtonByName($this->nameComplianceCheck_StAdm));
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function Coordinator14_2_1_CheckMessageButtonAppears_ComplianceCheckTypeInPopup_Business3(AcceptanceTester $I) {
//        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
//        $I->wait(8);
//        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
//        $I->wait(5);
//        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
//        $I->wait(2);
        $I->canSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_ViewButtonByName($this->nameComplianceCheck_StAdm));
//        $I->wait(1);
    }
    
    public function Coordinator14_3_ChangeStatusToReadyForEnergyAuditGroupInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_ViewButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->AuditOrganization1_Coordinator);
        $I->wait(3);
        $I->waitPageLoad();
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->nameAuditor);
        $I->wait(3);
        $I->waitPageLoad();
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_ViewButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function Coordinator14_3_1_CheckMessageButtonAppears_EnergyAuditGroupInPopup_Business3(AcceptanceTester $I) {
//        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
//        $I->wait(8);
//        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(1);
//        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(5);
//        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
//        $I->wait(2);
        $I->canSeeElement(Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_ViewButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
//        $I->wait(1);
    }
    
    public function Coordinator14_4_AddInspectorWithoutChangingStatusToReadyForComplianceCheckTypeInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_ViewButtonByName($this->nameComplianceCheck_StAdm));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->nameComplianceCheck_StAdm), $this->InspectorOrganization1_Coordinator);
        $I->wait(3);
        $I->waitPageLoad();
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->nameComplianceCheck_StAdm), $this->nameInspector_Prog2);
        $I->wait(3);
        $I->waitPageLoad();
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_ViewButtonByName($this->nameComplianceCheck_StAdm));
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function Coordinator14_4_1_CheckMessageButtonAppears_ComplianceCheckTypeInPopup_Business2(AcceptanceTester $I) {
//        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
//        $I->wait(8);
//        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
//        $I->wait(5);
//        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
//        $I->wait(2);
        $I->canSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_MessageButtonByName($this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\ApplicationDetails::ComplianceCheckPopup_ViewButtonByName($this->nameComplianceCheck_StAdm));
//        $I->wait(1);
    }
    
    public function Coordinator14_5_AddAuditorWithoutChangingStatusToReadyForEnergyAuditGroupInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_ViewButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->AuditOrganization1_Coordinator);
        $I->wait(3);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->nameAuditor);
        $I->wait(3);
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_ViewButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function Coordinator14_5_1_CheckMessageButtonAppears_EnergyAuditGroupInPopup_Business2(AcceptanceTester $I) {
//        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
//        $I->wait(8);
//        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(1);
//        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(5);
//        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
//        $I->wait(2);
        $I->canSeeElement(Page\ApplicationDetails::AuditsPopup_MessageButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\ApplicationDetails::AuditsPopup_ViewButtonByName(\Page\AuditGroupList::Energy_AuditGroup));
//        $I->wait(1);
    }
    
    public function Coordinator14_6_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->canSee('5', Page\UserList::$SummaryCount);
        
        $I->comment("-------Check Master admin absent in All Users list-------");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        $I->comment("--------Check State admin absent in All Users list-------");
        $I->cantSee($this->emailStateAdmin, \Page\UserList::$EmailRow);
        $I->cantSee('state admin', \Page\UserList::$TypeRow);
        
        $I->comment("-------Check Coordinator1 absent in All Users list-------");
        $user2 = $I->GetUserOnPageInList($this->emailCoordinator1_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailCoordinator1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator1_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator1_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('coordinator', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------Check Coordinator2 absent in All Users list-------");
        $I->cantSee($this->emailCoordinator2_Prog1_Prog2, \Page\UserList::$EmailRow);
        
        $I->comment("------------Check Inspector in All Users list------------");
        $user2 = $I->GetUserOnPageInList($this->emailInspector_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailInspector_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('inspector', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------------Check Auditor in All Users list-------------");
        $user3 = $I->GetUserOnPageInList($this->emailAuditor_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->emailAuditor_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('auditor', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("------Check Business1 user absent in All Users list------");
        $I->cantSee($this->bus1_email_Prog1, \Page\UserList::$EmailRow);
        
        $I->comment("----------Check Business2 user in All Users list---------");
        $user3 = $I->GetUserOnPageInList($this->bus2_email_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->bus2_email_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->bus2_firstName_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->bus2_lastName_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('business', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("----------Check Business3 user in All Users list---------");
        $user3 = $I->GetUserOnPageInList($this->bus3_email_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->bus3_email_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->bus3_firstName_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->bus3_lastName_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('business', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
    }
    
    //-----------------------Login as Created Inspector-------------------------
    public function Inspector15_LogOut_And_LogInAsInspector(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailInspector_Prog2, $this->password, $I, 'inspector');
    }
    
    //-----------------------Inspector Dashboard With Task----------------------
    public function Inspector15_1_InspectorDashboard_CheckTaskFromBusiness3IsPresent(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSeeInField(Page\Dashboard::AuditReadyDateFieldLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm), '');
        $I->canSeeInField(Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm), '');
        $I->canSeeElement(Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
        
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->cantSeeElement(Page\Dashboard::$TasksSummaryCount_ArchivedTasks);
    }
    
    public function Inspector15_2_InspectorDashboard_CheckTaskFromBusiness2IsAbsent(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
    }
    
    public function Inspector15_3_ChangeStatusOfBusiness3TaskToPassed(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->selectOption(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(1);
        $I->click(\Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->wait(5);
    }
    
    public function Inspector15_4_InspectorDashboard_CheckTaskFromBusiness3IsAbsent_AfterChangingStatus(AcceptanceTester $I)
    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->wait(2);
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->cantSeeElement(Page\Dashboard::$TasksSummaryCount);
        
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee(\Page\ApplicationDetails::PassedStatus_TierTab, Page\Dashboard::AuditStatusLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('(not set)', Page\Dashboard::AuditReadyDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('(not set)', Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount_ArchivedTasks);
        
    }
    
    //-----------------------Login as Created Auditor-------------------------
    public function Auditor16_LogOut_And_LogInAsAuditor(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailAuditor_Prog2, $this->password, $I, 'auditor');
    }
    
    //------------------------Auditor Dashboard With Task-----------------------
    public function Auditor16_1_AuditorDashboard_CheckTaskFromBusiness3IsPresent(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($this->business3_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeInField(Page\Dashboard::AuditReadyDateFieldLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup), '');
        $I->canSeeInField(Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup), '');
        $I->canSeeElement(Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
        
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->cantSeeElement(Page\Dashboard::$TasksSummaryCount_ArchivedTasks);
    }
    
    public function Auditor16_2_AuditorDashboard_CheckTaskFromBusiness2IsAbsent(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($this->business2_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
    }
    
    public function Auditor16_3_ChangeStatusOfBusiness3TaskToPassed(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->selectOption(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(1);
        $I->click(\Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business3_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->wait(5);
    }
    
    public function Auditor16_4_AuditorDashboard_CheckTaskFromBusiness3IsAbsent_AfterChangingStatus(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->canSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($this->business2_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($this->business3_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->cantSeeElement(Page\Dashboard::$TasksSummaryCount);
        
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard_ArchivedTasks($this->business3_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee(\Page\ApplicationDetails::PassedStatus_TierTab, Page\Dashboard::AuditStatusLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('(not set)', Page\Dashboard::AuditReadyDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('(not set)', Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount_ArchivedTasks);
        
    }
    
    public function Coordinator17_LogOut_And_LoginAsCoordinator1(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator1_Prog2, $this->password, $I, 'coordinator');
    }
    
    //----------------------------Coordinator Dashboard-------------------------
    public function Coordinator17_1_CheckDashboard_CheckStatuses_ChangeStatuses_CheckStatuses(AcceptanceTester $I) {
        $I->amOnPage(Page\Dashboard::URL());
        //Application statuses on dashboard
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3_Prog2));
        
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        $I->cantSeeElement(\Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        //Check on business application details
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
        $I->click(Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->nameComplianceCheck_StAdm), Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->scrollTo(Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(2);
        $I->click(Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->amOnPage(Page\Dashboard::URL());
        //Application statuses on dashboard
        $I->canSee(\Page\Dashboard::PassedStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::PassedStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::PassedStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3_Prog2));
        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3_Prog2));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3_Prog2));
        
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        $I->cantSeeElement(\Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Coordinator17_2_ChangeStatusToReadyForComplianceCheckTypeInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->nameComplianceCheck_StAdm));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function Coordinator17_3_ChangeStatusToReadyForEnergyAuditGroupInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    //-----------------------Login as Created Inspector-------------------------
    public function Inspector17_4_LogOut_And_LogInAsInspector(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailInspector_Prog2, $this->password, $I, 'inspector');
    }
    
    //-----------------------Inspector Dashboard With Task----------------------
    public function Inspector17_5_InspectorDashboard_CheckTaskFromBusiness3IsPresent(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
//        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
//        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
//        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
//        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus2_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus2_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus2_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus2_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSeeInField(Page\Dashboard::AuditReadyDateFieldLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm), '');
        $I->canSeeInField(Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm), '');
        $I->canSeeElement(Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
        
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee(\Page\ApplicationDetails::PassedStatus_TierTab, Page\Dashboard::AuditStatusLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee($this->bus3_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('(not set)', Page\Dashboard::AuditReadyDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('(not set)', Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, $this->nameComplianceCheck_StAdm));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount_ArchivedTasks);
    }
    
    
    //-----------------------Login as Created Auditor-------------------------
    public function Auditor17_6_LogOut_And_LogInAsAuditor(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailAuditor_Prog2, $this->password, $I, 'auditor');
    }
    
    //------------------------Auditor Dashboard With Task-----------------------
    public function Auditor17_7_AuditorDashboard_CheckTaskFromBusiness3IsPresent(AcceptanceTester $I)
    {
        $I->amOnPage(Page\Dashboard::URL_InspAud());
        $I->cantSeePageNotFound($I);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
        $I->cantSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($this->business3_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard($this->business2_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus2_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus2_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus2_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus2_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeInField(Page\Dashboard::AuditReadyDateFieldLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup), '');
        $I->canSeeInField(Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup), '');
        $I->canSeeElement(Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\Dashboard::MessageButtonLine_ByBusinessNameAndReviewType($this->business2_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
        
        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel_ArchivedTasks);
        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_AuditDashboard_ArchivedTasks($this->business3_Prog2, \Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee(\Page\ApplicationDetails::PassedStatus_TierTab, Page\Dashboard::AuditStatusLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_phone_Prog2, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_email_Prog2, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee($this->bus3_address_Prog2, Page\Dashboard::AdressLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('(not set)', Page\Dashboard::AuditReadyDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('(not set)', Page\Dashboard::CompletionDateLine_ByBusinessNameAndReviewType_ArchivedTasks($this->business3_Prog2, Page\AuditGroupList::Energy_AuditGroup));
        $I->canSee('1', Page\Dashboard::$TasksSummaryCount_ArchivedTasks);
        
    }
    
    
    //--------------------------------------------------------------------------Login As Coordinator2------------------------------------------------------------------------------------
    
    public function Coordinator18_LogOut_And_LoginAsCoordinator2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailCoordinator2_Prog1_Prog2, $this->password, $I, 'coordinator');
    }
    
    public function Coordinator18_1_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->canSee('6', Page\UserList::$SummaryCount);
        
        $I->comment("-------Check Master admin absent in All Users list-------");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        $I->comment("--------Check State admin absent in All Users list-------");
        $I->cantSee($this->emailStateAdmin, \Page\UserList::$EmailRow);
        $I->cantSee('state admin', \Page\UserList::$TypeRow);
        
        $I->comment("-------Check Coordinator1 absent in All Users list-------");
        $I->cantSee($this->emailCoordinator1_Prog2, \Page\UserList::$EmailRow);
        
        $I->comment("-------Check Coordinator2 absent in All Users list-------");
        $user2 = $I->GetUserOnPageInList($this->emailCoordinator2_Prog1_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailCoordinator2_Prog1_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('coordinator', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("------------Check Inspector in All Users list------------");
        $user2 = $I->GetUserOnPageInList($this->emailInspector_Prog2, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailInspector_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Inspector_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Inspector_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('inspector', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------------Check Auditor in All Users list-------------");
        $user3 = $I->GetUserOnPageInList($this->emailAuditor_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->emailAuditor_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Auditor_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Auditor_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('auditor', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("------Check Business1 user absent in All Users list------");
        $user3 = $I->GetUserOnPageInList($this->bus1_email_Prog1, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->bus1_email_Prog1, \Page\UserList::EmailLine($row));
        $I->canSee($this->bus1_firstName_Prog1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->bus1_lastName_Prog1, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('business', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("----------Check Business2 user in All Users list---------");
        $user3 = $I->GetUserOnPageInList($this->bus2_email_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->bus2_email_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->bus2_firstName_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->bus2_lastName_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('business', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("----------Check Business3 user in All Users list---------");
        $user3 = $I->GetUserOnPageInList($this->bus3_email_Prog2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->bus3_email_Prog2, \Page\UserList::EmailLine($row));
        $I->canSee($this->bus3_firstName_Prog2, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->bus3_lastName_Prog2, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('business', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
    }
    
    
    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
    
    public function Help1_LogOut_And_LogInAsStateAdmin2(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
     
    public function GetBusiness1ID(AcceptanceTester $I) {
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1_Prog1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->busId1 = $u1[1];
        $I->comment("Business1 id: $this->busId1.");
    }
    
    public function StateAdmin_CheckGetStartedMessage_Business1(AcceptanceTester $I){
        $subject                = 'Getting Started message';
        $body                   = 'Getting Started message.';
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId1));
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab('1'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($this->firstName_Coordinator2." ".$this->lastName_Coordinator2, Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function StateAdmin_CheckGetStartedMessage_Business2(AcceptanceTester $I){
        $subject                = $this->subject_GetStarted_Prog2;
        $body                   = $this->body_GetStarted_Prog2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId2));
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab('2'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('2'));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab('2'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($this->firstName_Coordinator2." ".$this->lastName_Coordinator2, Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function StateAdmin_CheckGetStartedMessage_Business3(AcceptanceTester $I){
        $subject                = $this->subject_GetStarted_Prog2;
        $body                   = $this->body_GetStarted_Prog2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId3));
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab('2'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('2'));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab('2'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($this->firstName_Coordinator2." ".$this->lastName_Coordinator2, Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    //-----------------------State Admin Create Sector--------------------------
    public function StateAdmin_CreateSector(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector2_StAdm = $I->GenerateNameOf("SectAcStateAdmin2");
        $state   = $this->state;
//        $program = $this->program1;
        
        $I->amOnPage(\Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->waitForElement(\Page\SectorCreate::$NameField);
        $I->fillField(\Page\SectorCreate::$NameField, $sector);
        $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
//        $I->selectOption(\Page\SectorCreate::$ProgramSelect, $program);
//        $I->wait(1);
        $I->click(\Page\SectorCreate::$CreateButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckValuesOnSectorListPage($sector);
    }
    
    public function StateAdmin_UpdateSector1_CreatedByStateAdmin(\Step\Acceptance\Sector $I) {
        $sector            = $this->sector1_StAdm;
        $newsectorName     = $this->sector_Update = "new_changed by state admin";
//        $program           = $this->program2;
        
        $I->UpdateSector($sector, $newsectorName);
        $I->CheckValuesOnSectorListPage($newsectorName, $status = 'active');
//        $I->cantSeeElement(Page\SectorList::NameLine_ByNameValue($sector, $program));
    }
    
    //-------State Admin Create Quantitative & Not Quantitative Measures--------
    public function StateAdmin_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc1_StateAdmin = $I->GenerateNameOf("Description Created by State Admin1");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure1_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_NotQuantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc2_StateAdmin = $I->GenerateNameOf("Description Created by State Admin2");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($this->measureDesc2_StateAdmin)); 
        $this->idMeasure2_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
   
    public function StateAdmin_CreateMeasure_NotQuantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc3_StateAdmin = $I->GenerateNameOf("Description Created by State Admin3");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc4_StateAdmin = $I->GenerateNameOf("Description Created by State Admin4");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions       = ['What color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure4_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CheckGlobalVariableInMeasure_Quantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $questions       = ['What color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure4_StateAdmin));
        $I->canSee("You have to select Global Variables for next combination Question and Option", Page\MeasureUpdate::$FormulasAlert_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(2);
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[0]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[1]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[2]));
        $I->canSee($this->titleGlobalVariable_NatAdm, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[0]));
        $I->canSee($this->titleGlobalVariable_NatAdm, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[1]));
        $I->canSee($this->titleGlobalVariable_NatAdm, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[2]));
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[1]), $this->titleGlobalVariable_NatAdm);
        $I->click(Page\MeasureFormulasPopup::$SaveButton);
        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee("You have to select Global Variables for next combination Question and Option", Page\MeasureUpdate::$FormulasAlert_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[0] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_Number(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc5_StateAdmin = $I->GenerateNameOf("Description Created by State Admin5");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions       = ['What', "Where"];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure5_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CheckGlobalVariableInMeasure_Quantitative_Number(\Step\Acceptance\Measure $I) {
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure5_StateAdmin));
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(1);
        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(2);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(2);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, $this->nameSavingArea_NatAdm);
        $I->wait(1);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(5);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee($this->nameSavingArea_NatAdm, \Page\MeasureFormulasPopup::AreaLine('1'));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine('1'));
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee('['.$this->nameGlobalVariable_NatAdm.']', ".formulas-list>div:nth-of-type(1) ul>div>b");
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_ThermsPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc6_StateAdmin = $I->GenerateNameOf("Description Created by State Admin6");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure6_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_LightingPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc7_StateAdmin = $I->GenerateNameOf("Description Created by State Admin7");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure7_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc8_StateAdmin = $I->GenerateNameOf("Description Created by State Admin8");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure8_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function StateAdmin_CreateMeasure_Quantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc9_StateAdmin = $I->GenerateNameOf("Description Created by State Admin9");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure9_StateAdmin = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-----------------State Admin create Green Tips for measures---------------
    public function StateAdmin_CreateGreenTipForMeasure1(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1_StateAdmin;
        $descGT      = $this->grTip1_Stateadmin = $I->GenerateNameOf("GT1_StateAdmin");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1_StateAdmin));
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1_StateAdmin));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function StateAdmin_UpdateGreenTipForMeasure2Coordinator(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc2_Coordinator;
        $descGT      = $this->grTip2_UpdateCoordinator = $I->GenerateNameOf("GT2_Coordinator_UpdateByStateAdmin");
        $program     = [$this->program2];
        
        $I->amOnPage(Page\MeasureGreenTipList::URL($this->idMeasure2_Coordinator));
        $I->click(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($descMeasure));
        $I->wait(1);
        $I->waitPageLoad();
        $I->UpdateMeasureGreenTip($descGT);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2_Coordinator));
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->cantSee($this->grTip2_Coordinator, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    //------------------State Admin create Checklist For Tier 2-----------------
    public function StateAdmin_CreateChecklistForTier1_MeasuresPresent(\Step\Acceptance\SectorChecklist $I) {
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '2';
        
        $I->CreateSectorChecklist($tier, $sector);
        
//        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc4_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc5_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc6_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc7_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc8_StateAdmin));
        $I->canSeeElement(Page\SectorChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc9_StateAdmin));
    }
    
    //-------------------------State Admin activate Tier 1----------------------
    public function StateAdmin_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier1      = '1';
        $tier1Name  = $this->tier2Name = "tiername2_StateAdmin";
        $tier1Desc  = 'tier desc update by St Admin';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->canSee($this->program1, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(4);
        $I->waitPageLoad();
        $I->canSee($this->tier1Name, Page\TierManage::$Tier1Button_LeftMenu);
        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
        $I->ManageTiers($program, $tier1, $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    //---------------------State Admin create Inspector-------------------------
    
    public function StateAdmin_CreateInspectorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::inspectorType;
        $email     = $this->emailInspector_Prog1_Prog2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
        $I->click(\Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
        $I->click(\Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
    }
    
    //------------------------State Admin create Auditor------------------------
    
    public function StateAdmin_CreateAuditorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::auditorType;
        $email     = $this->emailAuditor2_Prog2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
        $I->click(\Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
//        $I->wait(2);
        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
        $I->click(\Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1));
        $I->wait(5);
        $I->acceptPopup();
        $I->wait(4);
        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
    }
    
    //------------------State Admin create Checklist For Tier 1-----------------
//    public function StateAdmin_CreateChecklistForTier1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
//        $programDestination = $this->program2;
//        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
//        $tier               = '1';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $id_checklist = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\ChecklistManage::MeasureDescLine_ManageMeasureTab($this->measureDesc3_Coordinator));
//        $I->ManageChecklist($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
//        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
//        $I->reloadPage();
//        $I->PublishChecklistStatus($id_checklist);
//    }
//    
//    public function Help1_16_LogOutttt(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->Logout($I);
//    }
}
