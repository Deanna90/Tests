<?php


class UsersAccessCest
{
    public $state, $program1, $program2, $idState, $county, $idCity1, $idCity2, $idProg2, $sector_Coordinator, $sector_StateAdmin, $sector_Update, $city1, $city2, $zip1, $zip2;
    public $idThermOption_NatAdm, $idBuildingType_NatAdm, $nameBuildingType_NatAdm, $idDeerHours_NatAdm, $idFixtureMap_NatAdm, $idSavingArea_NatAdm, $nameSavingArea_NatAdm, $idSourceProgram_NatAdm, 
            $idResource_NatAdm, $idVideoTutorial_NatAdm, $idGlobalVariable_NatAdm, $nameGlobalVariable_NatAdm, $titleGlobalVariable_NatAdm;
    public $idGlobalVariable_StAdm, $idEC_StAdm, $idApplicantEmail_StAdm, $idApplicationDirection_StAdm, $idComplianceCheck_StAdm, $nameComplianceCheck_StAdm;
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
    public $statusesT1_Coordinator        = ['core',  'core',  'elective',  'elective',  'elective',  'elective',  'elective',  'core',  'core',  'core',  'elective', 'core'];
    public $extensions_Coordinator        = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default'];
    public $statusesT3_Coordinator        = ['core',  'core',  'core',  'core',  'core',  'core',  'core',  'core',  'core',  'core',  'core', 'core'];
    public $emailStateAdmin, $emailCoordinator1, $emailCoordinator2, $emailInspector, $emailAuditor;
    public $firstName_StateAdmin, $firstName_Coordinator1, $firstName_Coordinator2, $firstName_Inspector, $firstName_Auditor;
    public $lastName_StateAdmin, $lastName_Coordinator1, $lastName_Coordinator2, $lastName_Inspector, $lastName_Auditor;
    public $idStateAdmin, $idCoordinator1, $idCoordinator2, $idInspector, $idAuditor;
    public $nameInspector, $nameAuditor;
    public $mainMenu_NationalAdmin = ['Dashboard', 'Programs', 'Measures', 'Green Tips', 'Checklists', 'Tiers', 'Users', 'States', 'Notification', 'Reports', 'Resources', 'Video Tutorials'];
    public $mainMenu_StateAdmin    = ['Dashboard', 'Programs', 'Measures', 'Green Tips', 'Checklists', 'Tiers', 'Users', 'Notification', 'Reports', 'Video Tutorials'];
    public $mainMenu_Coordinator   = ['Dashboard', 'Sector', 'Measures', 'Green Tips', 'Checklists', 'Tier', 'Users', 'Notification', 'Video Tutorials', "Reports"];
    public $mainMenu_Auditor       = ['Dashboard', 'Video Tutorials', 'Communication'];
    public $mainMenu_Inspector     = ['Dashboard', 'Video Tutorials', 'Communication'];
    public $measuresDesc_SuccessCreated = [];
    public $password = 'Qq!1111111';
    public $business1, $business2, $business3, $busId1, $busId2, $busId3;
    public $bus3_email, $bus3_phone, $bus3_userFullName;
    public $tier1Name, $tier2Name;
    public $todayDate = [];

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
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function NationalAdmin1_3_NationalAdminMainMenu(AcceptanceTester $I)
    {
        $I->comment("Check correct menu items for National Admin:");
        $I->wait(3);
        for($i=0, $c= count($this->mainMenu_NationalAdmin); $i<$c; $i++){
            $I->canSee($this->mainMenu_NationalAdmin[$i], Page\MainMenu::$MenuItem);
        }
    }
    
    public function NationalAdmin1_4_CheckSubItemsInMainMenu(AcceptanceTester $I)
    {
        $I->comment("Check correct menu SubItems for National Admin:");
        $I->wait(1);
        //Programs item
        $I->click(\Page\MainMenu::selectMenuItemByName('Programs'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Cities"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Sectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Source Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Audit Groups"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Green Tips'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Audit Groups"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "EC"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Checklists"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
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
                
        $I->wait(1);
        $I->CreateVideo($title, $description, $userTypes, $state);
        $video = $I->GetVideoTutorialOnPageInList($title);
        $this->idVideoTutorial_NatAdm = $video['id'];
    }
    
    //----------------------------Create source program-------------------------
    public function NationalAdmin1_5_2_SourceProgramCreate(Step\Acceptance\SourceProgram $I)
    {
        $title        = $I->GenerateNameOf("SourceProgram by national admin");
        $file         = 'City of Kirkland.zip';
                
        $I->wait(1);
        $I->CreateSourceProgram($title, $content = null, $file);
        $source = $I->GetSourceProgramOnPageInList($title);
        $this->idSourceProgram_NatAdm = $source['id'];
    }
    
    //---------------------------Create popup therm option----------------------
    public function NationalAdmin1_5_3_PopupThermOptionCreate(Step\Acceptance\PopupThermOption $I)
    {
        $name        = $I->GenerateNameOf("thermCreated by national admin");
        $thermsCount = '5';
                
        $I->wait(1);
        $I->CreateThermOption($name, $thermsCount);
        $therm = $I->GetThermOptionOnPageInList($name);
        $this->idThermOption_NatAdm = $therm['id'];
    }
    
    //------------------Create building type for lighting popup-----------------
    public function NationalAdmin1_5_4_PopupLighting_BuildingTypeCreate(Step\Acceptance\PopupLightingOption $I)
    {
        $name        = $this->nameBuildingType_NatAdm = $I->GenerateNameOf("buildType by national admin");
                
        $I->wait(1);
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
        
        $I->wait(1);
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
        
        $I->wait(1);
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
                
        $I->wait(1);
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
                
        $I->wait(1);
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
                
        $I->wait(1);
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
        $I->wait(5);
        $I->reloadPage();
        $I->wait(6);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(6);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(4);
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
//    public function NationalAdmin1_7_CheckAllUsersListPage1(\Step\Acceptance\User $I)
//    {
//        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
//        $I->wait(3);
//        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
//        $I->cantSee('master admin', \Page\UserList::$TypeRow);
//        $user1 = $I->GetUserOnPageInList($this->emailStateAdmin, Page\UserCreate::allType);
//        $row = $user1['row'];
//        $I->canSee($this->emailStateAdmin, \Page\UserList::EmailLine($row));
//        $I->canSee($this->firstName_StateAdmin, \Page\UserList::FirstNameLine($row));
//        $I->canSee($this->lastName_StateAdmin, \Page\UserList::LastNameLine($row));
//        $I->canSee('active', \Page\UserList::StatusLine($row));
//        $I->canSee('state admin', \Page\UserList::TypeLine($row));
//        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
//        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
//        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
//        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
//    }
    
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
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Cities"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Sectors"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Source Programs"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Programs', "Audit Groups"));
        //Measures item
        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
        //Green Tips item
        $I->click(\Page\MainMenu::selectMenuItemByName('Green Tips'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Measures"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Audit Groups"));
        //Checklists item
        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
        $I->wait(2);
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "EC"));
        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Checklists"));
        //Users item
        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
        $I->wait(2);
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
        $I->wait(1);
        $I->canSeeElement(Page\VideoTutorialsList::$FilterByCategorySelect);
        $I->amOnPage(Page\VideoTutorialsCreate::URL());
        $I->wait(1);
        $I->canSeeElement(\Page\VideoTutorialsCreate::$StateSelect);
        $I->amOnPage(Page\VideoTutorialsUpdate::URL($this->idVideoTutorial_NatAdm));
        $I->wait(1);
        $I->canSeeElement(Page\VideoTutorialsUpdate::$StateSelect);
        $I->amOnPage(Page\VideoTutorialsView::URL($this->idVideoTutorial_NatAdm));
        $I->canSeePageForbiddenAccess($I, "You can not access this video.");
    }
    
    //----------------------Ability to create source program--------------------
    public function StateAdmin2_3_3_SourceProgramsPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SourceProgramList::URL());
        $I->cantSeePageNotFound($I);
        $I->canSeeElement(Page\SourceProgramList::$CreateSourceProgramButton);
        $I->amOnPage(Page\SourceProgramCreate::URL());
        $I->cantSeePageNotFound($I);
        $I->canSeeElement(Page\SourceProgramCreate::$TitleField);
        $I->amOnPage(Page\SourceProgramUpdate::URL($this->idSourceProgram_NatAdm));
        $I->cantSeePageNotFound($I);
        $I->canSeePageForbiddenAccess($I, "You can not manage this item.");
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
        $I->amOnPage(Page\PopupThermOptionUpdate::URL($this->idThermOption_NatAdm));
        $I->canSeePageNotFound($I);
        $I->cantSeeElement(Page\PopupThermOptionUpdate::$NameField);
    }
    
    //-----------------------No ability to create points------------------------
    public function StateAdmin2_3_6_PointPages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\WeightPointsList::URL());
//        $I->canSeePageNotFound($I);
        $I->wait(1);
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
        $I->wait(1);
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
    
    //--------------------No ability to create audit group----------------------
    public function StateAdmin2_3_10_AuditGroupsCreateAndUpdatePages_NotFound(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\AuditGroupList::URL());
        $I->wait(1);
        $I->canSee('7', \Page\AuditGroupList::$SummaryCount);
        $I->canSeeElement(\Page\AuditGroupList::$AuditGroupRow);
        $I->amOnPage(\Page\AuditGroupCreate::URL());
        $I->canSeePageNotFound($I);
        $I->amOnPage(\Page\AuditGroupUpdate::URL('2'));
        $I->canSeePageForbiddenAccess($I);
    }
    
    //--------------------------Create global variable--------------------------
    public function StateAdmin2_3_11_GlobalVariableCreate_NotFound(\Step\Acceptance\GlobalVariable $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\GlobalVariableList::$GlobalVariableRow);
        $I->cantSeePageForbiddenAccess($I);
        $I->cantSeePageNotFound($I);
        $I->amOnPage(\Page\GlobalVariableCreate::URL());
        $I->canSeePageForbiddenAccess($I);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->idGlobalVariable_NatAdm));
        $I->wait(2);
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
        $I->wait(6);
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->wait(4);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(6);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(4);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator1 = $coordinator['id'];
    }
    
    public function StateAdmin2_8_CreateCoordinatorUserWithShowInfo_ForProgram2_Program1(Step\Acceptance\User $I)
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
        $I->wait(6);
        $I->canSee($this->state, \Page\UserUpdate::$State);
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(6);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(6);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(6);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(4);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator2 = $coordinator['id'];
    }
    
    public function StateAdmin2_8_1_CheckAllUsersListPage(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        
        $I->comment("---Check Master admin absent in All Users list---");
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        
        $I->comment("-------Check State admin in All Users list-------");
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
        $user2 = $I->GetUserOnPageInList($this->emailCoordinator1, Page\UserCreate::allType);
        $row = $user2['row'];
        $I->canSee($this->emailCoordinator1, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_Coordinator1, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_Coordinator1, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('coordinator', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
        
        $I->comment("-------Check Coordinator2 in All Users list-------");
        $user3 = $I->GetUserOnPageInList($this->emailCoordinator2, Page\UserCreate::allType);
        $row = $user3['row'];
        $I->canSee($this->emailCoordinator2, \Page\UserList::EmailLine($row));
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
                
        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->idGlobalVariable_NatAdm));
        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(2);
        $I->OverrideGlobalVariable($title, null, $value, $targetType, $targetId);
        $var = $I->GetGlobalVariableOnPageInList($title);
        $this->idGlobalVariable_StAdm = $var['id'];
    }
    
    //---------------------------------Create EC--------------------------------
    public function StateAdmin2_9_2_ECCreate(\Step\Acceptance\EssentialCriteria $I)
    {
        $number           = '1';
                
        $I->wait(2);
        $I->CreateEssentialCriteria($number);
        $I->PublishECStatus();
        $I->reloadPage();
        $this->idEC_StAdm = $I->GetIdOfPublishedEC();
    }
    
    //---------------------Create Applicant Email Text--------------------------
    public function StateAdmin2_9_3_ApplicantEmailTextCreate(\Step\Acceptance\Notification $I)
    {
        $trigger      = 'Getting Started message';
        $subject      = 'sub by state admin';
        $body         = 'bodyscsbcbs';
        $program      = $this->program2;
        $programArray = [$program];
                
        $I->wait(1);
        $I->CreateApplicantEmailText($subject, $body, $programArray);
        $appEmail = $I->GetApplicantEmailTextOnPageInList($trigger, $program);
        $this->idApplicantEmail_StAdm = $appEmail['id'];
    }
    
    //---------------------Create Applicant Email Text--------------------------
    public function StateAdmin2_9_4_GetApplicationDirectionIdOnList(\Step\Acceptance\Notification $I)
    {
        $key = Page\ApplicationDirectionsList::Key_ContactText;
                
        $I->wait(1);
        $I->amOnPage(Page\ApplicationDirectionsList::URL());
        $I->wait(1);
        $appDir = $I->GetApplicationDirectionOnPageInList($key, $this->state);
        $this->idApplicationDirection_StAdm = $appDir['id'];
    }
    
    //------------------------Create compliance check type----------------------
    public function StateAdmin2_9_5_ComplianceCheckTypeCreate(\Step\Acceptance\ComplianceCheckType $I)
    {
        $name            = $this->nameComplianceCheck_StAdm = $I->GenerateNameOf("ComplianceCheck by state admin");
                
        $I->wait(1);
        $I->CreateComplianceCheckType($name);
        $comp = $I->GetComplianceCheckTypeOnPageInList($name);
        $this->idComplianceCheck_StAdm = $comp['id'];
    }
    
//    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
//    
//    public function Coordinator3_LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //--------------------------------Main Menu---------------------------------
//    public function Coordinator3_1_CoordinatorMainMenu(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->cantSee('States', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Programs', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Cities', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Resources', \Page\MainMenu::$MenuItem);
//        $I->cantSee('Communication', \Page\MainMenu::$MenuItem);
//        for($i=0, $c= count($this->mainMenu_Coordinator); $i<$c; $i++){
//            $I->canSee($this->mainMenu_Coordinator[$i], Page\MainMenu::$MenuItem);
//        }
//        $I->canSee('Prefer Program', Page\MainMenu::$MenuItem);
//    }
//    
//    public function Coordinator3_2_CheckSubItemsInMainMenu(AcceptanceTester $I)
//    {
//        $I->wait(2);
//        //Sectors item
//        $I->click(\Page\MainMenu::selectMenuItemByName('Sector'));
//        $I->wait(3);
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Programs"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Cities"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Sectors"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Source Programs"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Sector', "Audit Groups"));
//        //Measures item
//        $I->click(\Page\MainMenu::selectMenuItemByName('Measures'));
//        $I->wait(3);
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Measures"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Therm Options"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Popup Lighting Options"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Points"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Global Variables"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Measures', "Saving Areas"));
//        //Green Tips item
//        $I->click(\Page\MainMenu::selectMenuItemByName('Green Tips'));
//        $I->wait(3);
//        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Measures"));
//        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Green Tips', "Audit Groups"));
//        //Checklists item
//        $I->click(\Page\MainMenu::selectMenuItemByName('Checklists'));
//        $I->wait(3);
//        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "EC"));
//        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Checklists', "Checklists"));
//        //Users item
//        $I->click(\Page\MainMenu::selectMenuItemByName('Users'));
//        $I->wait(3);
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "State Admins"));
//        $I->cantSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Coordinators"));
//        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Inspectors"));
//        $I->canSeeElement(Page\MainMenu::selectMenuItemOptionByOptionName('Users', "Auditors"));
//        //Program drop down
//        $I->click(Page\MainMenu::$StateSelect);
//        $I->wait(3);
//        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("$this->program2"));
//        $I->canSeeElement(Page\MainMenu::selectStateOptionByName("All Programs"));
//    }
//    
//    //-----------------------No ability to create state-------------------------
//    public function Coordinator3_3_1_StatesPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\StateList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\StateList::$CreateStateButton);
//        $I->amOnPage(Page\StateCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\StateCreate::$NameField);
//        $I->amOnPage(Page\StateUpdate::URL($this->idState));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\StateUpdate::$NameField);
//    }
//    
//    //-----------------------No ability to create city-------------------------
//    public function Coordinator3_3_2_CitiesPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\CityList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\CityList::$CreateCityButton);
//        $I->amOnPage(Page\CityCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\CityCreate::$NameField);
//        $I->amOnPage(Page\CityUpdate::URL($this->idCity2));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\CityUpdate::$NameField);
//    }
//    
//    //-----------------------No ability to create program-----------------------
//    public function Coordinator3_3_3_ProgramsPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\ProgramList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ProgramList::$CreateProgramButton);
//        $I->amOnPage(Page\ProgramCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ProgramCreate::$NameField);
//        $I->amOnPage(Page\ProgramUpdate::URL($this->idProg2));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ProgramUpdate::$NameField);
//    }
//    
//    //--------------------No ability to create audit group----------------------
//    public function Coordinator3_3_4_AuditGroupsPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\AuditGroupList::URL());
//        $I->canSeePageNotFound($I);
//        $I->amOnPage(\Page\AuditGroupCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->amOnPage(\Page\AuditGroupUpdate::URL('2'));
//        $I->canSeePageNotFound($I);
//    }
//    
//    //--------------------No ability to create audit subgroup----------------------
//    public function Coordinator3_3_5_AuditSubgroupsPages_NotFound_Coordinator(AcceptanceTester $I)
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
//    
//    //-----------------No ability to create video tutorial----------------------
//    public function Coordinator3_3_6_VideoTutorialsPages_NotFound(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\VideoTutorialsList::URL());
//        $I->canSeeElement(Page\VideoTutorialsList::$FilterByCategorySelect);
//        $I->amOnPage(Page\VideoTutorialsCreate::URL());
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\VideoTutorialsCreate::$TitleField);
//        $I->amOnPage(Page\VideoTutorialsUpdate::URL($this->idVideoTutorial_NatAdm));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\VideoTutorialsUpdate::$TitleField);
//        $I->amOnPage(Page\VideoTutorialsView::URL($this->idVideoTutorial_NatAdm));
//        $I->canSeeElement(Page\VideoTutorialsView::$Description);
//    }
//    
//    //----------------------No ability to create resource-----------------------
//    public function Coordinator3_3_7_ResourcesPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\ResourceList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ResourceList::$CreateResourceButton);
//        $I->amOnPage(Page\ResourceCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ResourceCreate::$TitleField);
//        $I->amOnPage(Page\ResourceUpdate::URL($this->idResource_NatAdm));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ResourceUpdate::$TitleField);
//    }
//    
//    //--------------------No ability to create source program-------------------
//    public function Coordinator3_3_8_SourceProgramsPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\SourceProgramList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\SourceProgramList::$CreateSourceProgramButton);
//        $I->amOnPage(Page\SourceProgramCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\SourceProgramCreate::$TitleField);
//        $I->amOnPage(Page\SourceProgramUpdate::URL($this->idSourceProgram_NatAdm));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\SourceProgramUpdate::$TitleField);
//    }
//    
//    //------------------No ability to create popup therm option-----------------
//    public function Coordinator3_3_9_PopupThermOptionPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\PopupThermOptionList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupThermOptionList::$CreatePopupThermsOptionButton);
//        $I->amOnPage(Page\PopupThermOptionCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupThermOptionCreate::$NameField);
//        $I->amOnPage(Page\PopupThermOptionUpdate::URL($this->idThermOption_NatAdm));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupThermOptionUpdate::$NameField);
//    }
//    
//    //----------------No ability to create popup lighting option----------------
//    public function Coordinator3_3_10_PopupLightingOptionPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\PopupLighting_BuildingTypesList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_BuildingTypesList::$CreateBuildingTypeButton);
//        $I->amOnPage(Page\PopupLighting_BuildingTypesCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_BuildingTypesCreate::$NameField);
//        $I->amOnPage(Page\PopupLighting_BuildingTypesUpdate::URL('1'));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_BuildingTypesUpdate::$NameField);
//        //
//        $I->wait(1);
//        $I->amOnPage(\Page\PopupLighting_DeerHoursList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_DeerHoursList::$CreateDeerHourButton);
//        $I->amOnPage(Page\PopupLighting_DeerHoursCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_DeerHoursCreate::$BuildingSpaceSelect);
//        $I->amOnPage(Page\PopupLighting_DeerHoursUpdate::URL('1'));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_DeerHoursUpdate::$BuildingSpaceSelect);
//        //
//        $I->wait(1);
//        $I->amOnPage(\Page\PopupLighting_FixtureMapsList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_FixtureMapsList::$CreateFixtureMapsButton);
//        $I->amOnPage(Page\PopupLighting_FixtureMapsCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_FixtureMapsCreate::$ReplacementLightingNameField);
//        $I->amOnPage(Page\PopupLighting_FixtureMapsUpdate::URL('1'));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\PopupLighting_FixtureMapsUpdate::$ReplacementLightingNameField);
//    }
//    
//    //-----------------------No ability to create points------------------------
//    public function Coordinator3_3_11_PointPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\WeightPointsList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\WeightPointsList::$NameLinkHead);
//        $I->amOnPage(Page\WeightPointsCreate::URL_Sections($this->idState));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
//        $I->amOnPage(Page\WeightPointsCreate::URL_YesOrNo($this->idState));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\WeightPointsCreate::$NameField);
//        $I->amOnPage(Page\WeightPointsManage::URL($this->idState));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\WeightPointsManage::$CreateYesOrNoButton);
//    }
//    
//    //----------------------No ability to create saving area--------------------
//    public function Coordinator3_3_12_SavingAreaPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\SavingAreaList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\SavingAreaList::$CreateSavingAreaButton);
//        $I->amOnPage(Page\SavingAreaCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\SavingAreaCreate::$NameField);
//        $I->amOnPage(Page\SavingAreaUpdate::URL($this->idSavingArea_NatAdm));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\SavingAreaUpdate::$NameField);
//    }
//    
//    //----------------------No ability to create saving area--------------------
//    public function Coordinator3_3_13_GlobalVariablePages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\GlobalVariableList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\GlobalVariableList::$CreateGlobalVariableButton);
//        $I->amOnPage(Page\GlobalVariableCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\GlobalVariableCreate::$NameField);
//        $I->amOnPage(Page\GlobalVariableUpdate::URL($this->idGlobalVariable_NatAdm));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\GlobalVariableUpdate::$NameField);
//    }
//    
//    //----------------------No ability to create state admin--------------------
//    public function Coordinator3_3_14_StateAdminPages_NotFound(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::stateAdminType));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\UserList::$CreateUserButton);
//        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\UserCreate::$EmailField);
//        $I->amOnPage(Page\UserUpdate::URL($this->idStateAdmin));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\UserUpdate::$EmailField);
//    }
//    
//    //----------------------No ability to create state admin--------------------
//    public function Coordinator3_3_15_CoordinatorPages_NotFound(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\UserList::URL(Page\UserCreate::coordinatorType));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\UserList::$CreateUserButton);
//        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\UserCreate::$EmailField);
//        $I->amOnPage(Page\UserUpdate::URL($this->idCoordinator1));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\UserUpdate::$EmailField);
//        $I->amOnPage(Page\UserUpdate::URL($this->idCoordinator2));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\UserUpdate::$EmailField);
//    }
//    
//    //----------------------No ability to create saving area--------------------
//    public function Coordinator3_3_16_ECPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\EssentialCriteriaList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\EssentialCriteriaList::$CreateECButton);
//        $I->amOnPage(Page\EssentialCriteriaCreate::URL($this->idState));
//        $I->canSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\EssentialCriteriaCreate::$NumberSelect);
//        $I->amOnPage(Page\EssentialCriteriaManage::URL($this->idEC_StAdm));
//        $I->wait(1);
//        $I->cantSeeElement(Page\EssentialCriteriaManage::$ChangeTierButton_ManageMeasureTab);
//        $I->canSeeInCurrentUrl(\Page\ChecklistList::URL());
//    }
//    
//    //------------------------No ability to notifications-----------------------
//    public function Coordinator3_3_17_NotificationPages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\ApplicantEmailTextList::URL());
//        $I->cantSeePageForbiddenAccess($I);
//        $I->canSeeElement(Page\ApplicantEmailTextList::$CreateApplicantEmailButton);
//        $I->amOnPage(Page\ApplicantEmailTextCreate::URL());
//        $I->cantSeePageForbiddenAccess($I);
//        $I->canSeeElement(Page\ApplicantEmailTextCreate::$TriggerSelect);
//        $I->amOnPage(Page\ApplicantEmailTextManage::URL($this->idApplicantEmail_StAdm));
//        $I->cantSeePageForbiddenAccess($I);
//        $I->canSeeElement(Page\ApplicantEmailTextManage::$SubjectField);
//        $I->wait(1);
//        $I->amOnPage(\Page\ApplicationDirectionsList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ApplicationDirectionsList::ManageButtonLine('1'));
//        $I->amOnPage(Page\ApplicationDirectionsManage::URL($this->idApplicationDirection_StAdm));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ApplicationDirectionsManage::$ContentField);
//    }
//    
//    //----------------------No ability to create saving area--------------------
//    public function Coordinator3_3_18_ComplianceCheckTypePages_NotFound_Coordinator(AcceptanceTester $I)
//    {
//        $I->wait(1);
//        $I->amOnPage(\Page\ComplianceCheckTypeList::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ComplianceCheckTypeList::$CreateComplianceCheckTypeButton);
//        $I->amOnPage(Page\ComplianceCheckTypeCreate::URL());
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ComplianceCheckTypeCreate::$NameField);
//        $I->amOnPage(Page\ComplianceCheckTypeUpdate::URL($this->idComplianceCheck_StAdm));
//        $I->canSeePageNotFound($I);
//        $I->cantSeeElement(Page\ComplianceCheckTypeUpdate::$NameField);
//    }
//    
//    
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
//        $I->wait(1);
//    }
//    
//    //---------------Coordinator Create Not Quantitative Measures---------------
//    public function Coordinator3_5_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc1_Coordinator = $I->GenerateNameOf("Description Created by Coordinator1");
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
//        $I->scrollTo(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $this->idMeasure1_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    
//    
//    public function Coordinator3_6_CreateMeasure_NotQuantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc2_Coordinator = $I->GenerateNameOf("Description Created by Coordinator2");
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
//        $I->scrollTo(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
//        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($this->measureDesc2_Coordinator)); 
//        $this->idMeasure2_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//   
//    public function Coordinator3_7_CreateMeasure_NotQuantitative_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc3_Coordinator = $I->GenerateNameOf("Description Created by Coordinator3");
//        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup   = $this->audSubgroup1_Energy;
//        $quantitative    = 'no';
//        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(8);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure3_Coordinator = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    //-----------------Coordinator create Green Tips for measures---------------
//    public function Coordinator3_8_CreateGreenTipForMeasure1(\Step\Acceptance\GreenTipForMeasure $I) {
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
//    public function Coordinator3_9_CreateGreenTipForMeasure2(\Step\Acceptance\GreenTipForMeasure $I) {
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
//    public function Coordinator3_10_CreateChecklistForTier1_MeasuresAreAbsent(\Step\Acceptance\Checklist $I) {
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
//    public function Coordinator3_11_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
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
//        $I->wait(6);
//        $I->canSee('Tier 1', Page\TierManage::$Tier1Button_LeftMenu);
//        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
//        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
//        $I->ManageTiers($program, $tier1='1', $tier1Name, $tier1Desc, $tier1OptIn);
//    }
//    
//    //---------------------Coordinator create Inspector-------------------------
//    
//    public function Coordinator3_12_CreateInspectorUser(Step\Acceptance\User $I)
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
//        $I->wait(6);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->wait(1);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->wait(1);
//    }
//    
//    //------------------------Coordinator create Auditor------------------------
//    
//    public function Coordinator3_13_CreateAuditorUser(Step\Acceptance\User $I)
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
//        $I->wait(6);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->wait(1);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->wait(1);
//    }
//    
//    //-----------------------Login as Created Inspector-------------------------
//    public function Inspector4_LogOut_And_LogInAsInspector(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailInspector, $this->password, $I, 'inspector');
//    }
//    
//    //-------------------------Inspector Main Menu------------------------------
//    public function Inspector4_1_InspectorMainMenu(AcceptanceTester $I)
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
//    }
//    
//    //-----------------------Inspector Empty Dashboard--------------------------
//    public function Inspector4_2_InspectorEmptyDashboard(AcceptanceTester $I)
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
//    public function Auditor5_LogOut_And_LogInAsAuditor(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailAuditor, $this->password, $I, 'auditor');
//    }
//    
//    //---------------------------Auditor Main Menu------------------------------
//    public function Auditor5_1_AuditorMainMenu(AcceptanceTester $I)
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
//    }
//    
//    //-------------------------Auditor Empty Dashboard--------------------------
//    public function Auditor5_2_AuditorEmptyDashboard(AcceptanceTester $I)
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
//    public function Coordinator6_LogOut_And_LogInAsCoordinatore(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //----------------Coordinator create Inspector Organization-----------------
//    
//    public function Coordinator6_1_CreateInspectorOrganization(Step\Acceptance\InspectorOrganization $I)
//    {
//        $inspOrganization = $this->InspectorOrganization1_Coordinator = $I->GenerateNameOf('InsOrg_Coordinator');
//        
//        $I->CreateInspectorOrganization($inspOrganization, $this->state);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program2));
//        $I->cantSeeElement(\Page\InspectorOrganizationUpdate::ProgramNameLine_ByName($this->program1));
//        $I->wait(2);
//        $I->click(\Page\InspectorOrganizationUpdate::$AddMemberButton);
//        $I->wait(4);
//        $I->waitForElement(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, 60);
//        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->nameInspector);
//        $I->wait(2);
//        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
//        $I->wait(2);
//        $I->waitForElement(Page\InspectorOrganizationUpdate::$NameField, 30);
//        $I->canSeeElement(\Page\InspectorOrganizationUpdate::UserLine_ByName($this->nameInspector));
//        $I->wait(2);
//        $I->click(\Page\InspectorOrganizationUpdate::$AddComplianceCheckTypeButton);
//        $I->wait(5);
//        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, $this->nameComplianceCheck_StAdm);
//        $I->wait(1);
//        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
//        $I->wait(2);
//        $I->waitForElement(Page\InspectorOrganizationUpdate::$NameField, 30);
//        $I->canSeeElement(\Page\InspectorOrganizationUpdate::ComplianceCheckTypeLine_ByName($this->nameComplianceCheck_StAdm));
//        $I->wait(2);
//    }
//    
//    //-------------------Coordinator create Audit Organization------------------
//    
//    public function Coordinator6_2_CreateAuditOrganization(Step\Acceptance\AuditOrganization $I)
//    {
//        $audOrganization = $this->AuditOrganization1_Coordinator = $I->GenerateNameOf('AuditOrg_Coordinator');
//        
//        $I->CreateAuditOrganization($audOrganization, $this->state);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program2));
//        $I->cantSeeElement(\Page\AuditOrganizationUpdate::ProgramNameLine_ByName($this->program1));
//        $I->wait(2);
//        $I->click(\Page\AuditOrganizationUpdate::$AddMemberButton);
//        $I->wait(3);
//        $I->waitForElement(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, 60);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->nameAuditor);
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
//        $I->wait(10);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::UserLine_ByName($this->nameAuditor));
//        $I->wait(3);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(5);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(10);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Energy_AuditGroup));
//        $I->wait(3);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(5);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::General_AuditGroup);
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(10);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::General_AuditGroup));
//        $I->wait(3);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(5);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(10);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
//        $I->wait(3);
//        $I->click(\Page\AuditOrganizationUpdate::$AddAuditGroupButton);
//        $I->wait(5);
//        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Wastewater_AuditGroup);
//        $I->wait(1);
//        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
//        $I->wait(10);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSeeElement(\Page\AuditOrganizationUpdate::AuditGroupLine_ByName(\Page\AuditGroupList::Wastewater_AuditGroup));
//        $I->wait(2);
//    }
//    
//    //-----------------------Login as Created Inspector-------------------------
//    public function Inspector7_LogOut_And_LogInAsInspector2(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailInspector, $this->password, $I, 'inspector');
//    }
//    
//    //-------------------------Inspector Main Menu------------------------------
//    public function Inspector7_1_InspectorMainMenu2(AcceptanceTester $I)
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
//    }
//    
//    //-----------------------Inspector Empty Dashboard--------------------------
//    public function Inspector7_2_InspectorEmptyDashboard2(AcceptanceTester $I)
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
//    public function Auditor8_LogOut_And_LogInAsAuditor2(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailAuditor, $this->password, $I, 'auditor');
//    }
//    
//    //-------------------------Auditor Main Menu------------------------------
//    public function Auditor8_1_AuditorMainMenu2(AcceptanceTester $I)
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
//    }
//    
//    //-------------------------Auditor Empty Dashboard--------------------------
//    public function Auditor8_2_AuditorEmptyDashboard2(AcceptanceTester $I)
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
//    public function StateAdmin9_LogOut_And_LogInAsStateAdmin(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
//    }
//    
//    //-------------------Login as State Admin to approve measures---------------
//    public function StateAdmin9_1_StateAdminAproveMeasuresCreatedByCoordinator(\Step\Acceptance\Measure $I)
//    {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->selectOption(Page\MeasureList::$FilterByStatusSelect, 'pending');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(1);
//        $I->click(Page\MeasureList::$ApplyFiltersButton);
//        $I->wait(4);
//        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc1_Coordinator));
//        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc2_Coordinator));
//        $I->canSeeElement(Page\MeasureList::DescriptionLine_ByDescValue($this->measureDesc3_Coordinator));
//        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc1_Coordinator));
//        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc2_Coordinator));
//        $I->canSee('pending', Page\MeasureList::StatusLine_ByDescValue($this->measureDesc3_Coordinator));
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure1_Coordinator));
//        $I->wait(1);
//        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc1_Coordinator, null, null, null, \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(1);
//        $I->click(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(6);
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2_Coordinator));
//        $I->wait(1);
//        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc2_Coordinator, null, null, null, \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(1);
//        $I->click(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(6);
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure3_Coordinator));
//        $I->wait(1);
//        $I->CheckSavedValuesOnMeasureUpdatePage($this->measureDesc3_Coordinator, null, null, null, \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure, null, null, null, null, $this->state, $quantToggleStatus = 'no', $multipAnswerToggleStatus = 'yes');
//        $I->wait(1);
//        $I->scrollTo(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(1);
//        $I->click(Page\MeasureUpdate::$ApproveButton);
//        $I->wait(20);
//    }
//    
//    //--------------------------------------------------------------------------Login As Coordinator------------------------------------------------------------------------------------
//    
//    public function Coordinator10_LogOut_And_LogInAsCoordinatorr(AcceptanceTester $I)
//    {
//        $I->reloadPage();
//        $I->wait(1);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //------------------Coordinator create Checklist For Tier 1-----------------
//    public function Coordinator10_1_CreateChecklistForTier1(\Step\Acceptance\Checklist $I) {
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
//        $I->ManageChecklist($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
//        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
//        $I->reloadPage();
//        $I->PublishChecklistStatus();
//    }
//    
//    public function Coordinator10_2_LogOut(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->Logout($I);
//    }
//    
//    //------------Business registration. Program without checklist--------------
//    public function Business11_BusinessRegister_SectorWithoutChecklistAbsentInDropDown_Program1(Step\Acceptance\Business $I)
//    {
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
//        
//        $I->amOnPage(\Page\BusinessRegistration::$URL);
//        $I->wait(2);
//        $I->fillField(\Page\BusinessRegistration::$ZipField, $zip);
//        $I->wait(1);
//        $I->click(\Page\BusinessRegistration::$CitySelect);
//        $I->wait(2);
//        $I->selectOption(\Page\BusinessRegistration::$CitySelect, $city);
//        $I->wait(1);
//        $I->click(\Page\BusinessRegistration::$BusinessTypeSelect);
//        $I->wait(1);
//        $I->cantSee($busType, \Page\BusinessRegistration::$BusinessTypeOption);
//    }
//    
//    //------------Business registration. Sector without checklist--------------
//    public function Business12_BusinessRegister_SectorWithoutChecklistAbsentInDropDown_Program2_Sector2(Step\Acceptance\Business $I)
//    {
//        $zip              = $this->zip2;
//        $city             = $this->city2;
//        $busType          = $this->sector_Coordinator;
//        
//        $I->amOnPage(\Page\BusinessRegistration::$URL);
//        $I->wait(2);
//        $I->fillField(\Page\BusinessRegistration::$ZipField, $zip);
//        $I->wait(1);
//        $I->click(\Page\BusinessRegistration::$CitySelect);
//        $I->wait(2);
//        $I->selectOption(\Page\BusinessRegistration::$CitySelect, $city);
//        $I->wait(1);
//        $I->click(\Page\BusinessRegistration::$BusinessTypeSelect);
//        $I->wait(1);
//        $I->cantSee($busType, \Page\BusinessRegistration::$BusinessTypeOption);
//    }
//    
//    //-----------Business registration. Program&Sector with checklist-----------
//    public function Business13_BusinessRegister_WithChecklist_Program2_OfficeRetail(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("fnUserAccess");
//        $lastName         = $I->GenerateNameOf("lnUserAccess");
//        $phoneNumber      = $this->bus3_phone = $I->GeneratePhoneNumber();
//        $email            = $this->bus3_email = $I->GenerateEmail();
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
//        $this->bus3_userFullName = $firstName.' '.$lastName;
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(15);
//        $I->cantSee("Attention!");
//        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
//        $I->canSee("Print $this->tier1Name", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator1));
//        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector));
//    }
//    
//    public function Business13_1_CheckGreenTipForMeasure1_Quant_MultipleQuesAndNumber(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->wantTo("Check ");
//        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->idSubgroup1_Energy));
//        $I->wait(3);
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
//    public function Coordinator13_2_LogOut2df(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator2, $this->password, $I, 'coordinator');
//    }
//    
//    //------------------Coordinator create Checklist For Tier 2-----------------
//    public function Coordinator13_3_CreateChecklistForTier2_Program1_OfficeRetail(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
//        $programDestination = $this->program1;
//        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
//        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
//        $I->reloadPage();
//        $I->PublishChecklistStatus();
//    }
//    
//    public function Coordinator13_4_LogOut2dff(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //------------------Coordinator create Checklist For Tier 2-----------------
//    public function Coordinator13_5_CreateChecklistForTier3_Program2_Sector2(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
//        $programDestination = $this->program2;
//        $sectorDestination  = $this->sector_Coordinator;
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
//        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT3_Coordinator, $this->extensions_Coordinator);
//        $I->reloadPage();
//        $I->PublishChecklistStatus();
//    }
//    
//    public function Coordinator13_6_LogOutu(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->Logout($I);
//    }
//    
//    //------------Business registration. Program without checklist--------------
//    public function Business13_7_BusinessRegister_WithoutChecklist_Program1(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("fnUserAccess");
//        $lastName         = $I->GenerateNameOf("lnUserAccess");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business1 = $I->GenerateNameOf("busnamUA");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
//        $employees        = '455';
//        $busFootage       = '4566';
//        $landscapeFootage = '12345';
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(10);
//        $I->cantSee("Attention!");
//        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
//        $I->canSee("Print Tier 2", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator1));
//        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector));
//    }
//    
//    public function Business13_8_LogOutfv(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//    }
//    
//    //------------Business registration. Sector without checklist--------------
//    public function Business13_9_BusinessRegister_WithoutChecklist_Program2_Sector2(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("fnUserAccess");
//        $lastName         = $I->GenerateNameOf("lnUserAccess");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business2 = $I->GenerateNameOf("busnamUA");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");
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
//        $I->wait(10);
//        $I->cantSee("Attention!");
//        $I->cantSee("No checklist! Sorry but we don`t have a checklist for your business.");
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
//        $I->canSee("Print Tier 2", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator1));
//        $I->canSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailCoordinator2));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailStateAdmin));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailAuditor));
//        $I->cantSeeElement(Page\RegistrationStarted::CoordinatorEmail_ByEmail($this->emailInspector));
//    }
//    
//    public function Business13_10_LogOut2(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //----------------------------Coordinator Dashboard-------------------------
//    public function Coordinator14_1_CheckDashboard_OnlyBusinessesFromProgram2Present(AcceptanceTester $I) {
//        $I->amOnPage(Page\Dashboard::URL());
//        $I->wait(6);
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//        
//        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1));
//        
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSee('0 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
//        
//        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('0 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3));
//        
//        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->wait(4);
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//        
//        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1));
//        
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSee('0 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
//        
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('0 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3));
//        
//        $I->SelectDefaultState($I, $this->program2);
//        $I->wait(1);
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//        
//        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1));
//        
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSee('0 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
//        
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('0 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3));
//        
//        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->wait(4);
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//        
//        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->cantSee(\Page\Dashboard::NoChecklistText, \Page\Dashboard::NoChecklistInfo_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
//        $I->cantSeeElement(\Page\Dashboard::TierName_ByBusName($this->business1));
//        
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSee('0 / 3 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
//        
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('0 / 2 measures completed', \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//        $I->canSee("$this->tier1Name", \Page\Dashboard::TierName_ByBusName($this->business3));
//    }
//    
//    public function GetBusiness2ID(AcceptanceTester $I) {
//        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
//        $I->comment("Url2: $url2");
//        $u2 = explode('=', $url2);
//        $this->busId2 = $u2[1];
//        $I->comment("Business2 id: $this->busId2.");
//    }
//    
//    public function GetBusiness3ID(AcceptanceTester $I) {
//        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3), 'href');
//        $I->comment("Url3: $url3");
//        $u3 = explode('=', $url3);
//        $this->busId3 = $u3[1];
//        $I->comment("Business3 id: $this->busId3.");
//    }
//    
//    public function Coordinator14_2_ChangeStatusToReadyForComplianceCheckTypeInPopup_Business3(AcceptanceTester $I) {
//        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
//        $I->wait(8);
//        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
//        $I->wait(5);
//        $I->waitForText("Assign Inspectors", 30, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
//        $I->wait(2);
//        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName($this->nameComplianceCheck_StAdm));
//        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::ReadyStatus_TierTab);
//        $I->wait(2);
//        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName($this->nameComplianceCheck_StAdm), $this->InspectorOrganization1_Coordinator);
//        $I->wait(3);
//        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName($this->nameComplianceCheck_StAdm), $this->nameInspector);
//        $I->wait(3);
//        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
//        $I->wait(5);
//    }
//    
//    public function Coordinator14_3_ChangeStatusToReadyForEnergyAuditGroupInPopup_Business3(AcceptanceTester $I) {
//        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
//        $I->wait(8);
//        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(1);
//        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(5);
//        $I->waitForText("Assign Auditors", 30, \Page\ApplicationDetails::$AuditsPopup_Title);
//        $I->wait(2);
//        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
//        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::ReadyStatus_TierTab);
//        $I->wait(2);
//        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->AuditOrganization1_Coordinator);
//        $I->wait(3);
//        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->nameAuditor);
//        $I->wait(3);
//        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
//        $I->wait(5);
//    }
//    
//    //-----------------------Login as Created Inspector-------------------------
//    public function Inspector15_LogOut_And_LogInAsInspector(AcceptanceTester $I)
//    {
//        $I->reloadPage();
//        $I->wait(1);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailInspector, $this->password, $I, 'inspector');
//    }
//    
//    //-----------------------Inspector Dashboard With Task----------------------
//    public function Inspector15_1_InspectorDashboard_CheckTaskFromBusiness3IsPresent(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->cantSeePageNotFound($I);
//        $I->cantSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
//        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business3, $this->nameComplianceCheck_StAdm));
//        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3, $this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::InProcessStatus_TierTab);
//        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business3, $this->nameComplianceCheck_StAdm));
//        $I->canSee($this->bus3_phone, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business3, $this->nameComplianceCheck_StAdm));
//        $I->canSee($this->bus3_email, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business3, $this->nameComplianceCheck_StAdm));
//        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business3, $this->nameComplianceCheck_StAdm));
//        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
//    }
//    
//    public function Inspector15_2_ChangeStatusOfTaskToPassed(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business3, $this->nameComplianceCheck_StAdm));
//        $I->selectOption(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3, $this->nameComplianceCheck_StAdm), \Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(1);
//        $I->click(\Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business3, $this->nameComplianceCheck_StAdm));
//        $I->wait(5);
//    }
//    
//    //-----------------------Login as Created Auditor-------------------------
//    public function Auditor16_LogOut_And_LogInAsAuditor(AcceptanceTester $I)
//    {
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailAuditor, $this->password, $I, 'auditor');
//    }
//    
//    //------------------------Auditor Dashboard With Task-----------------------
//    public function Auditor16_1_AuditorDashboard_CheckTaskFromBusiness3IsPresent(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->cantSeePageNotFound($I);
//        $I->cantSeePageForbiddenAccess($I);
//        $I->cantSeeElement(Page\Dashboard::$EmptyListLabel);
//        $I->canSeeElement(Page\Dashboard::CompanyNameLine_ByBusinessNameAndReviewType_InspDashboard($this->business3, \Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeOptionIsSelected(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3, Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::InProcessStatus_TierTab);
//        $I->canSee($this->city2, Page\Dashboard::CityLine_ByBusinessNameAndReviewType($this->business3, Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSee($this->bus3_phone, Page\Dashboard::PhoneLine_ByBusinessNameAndReviewType($this->business3, Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSee($this->bus3_email, Page\Dashboard::EmailLine_ByBusinessNameAndReviewType($this->business3, Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSee($this->bus3_userFullName, Page\Dashboard::ContactLine_ByBusinessNameAndReviewType($this->business3, Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSee('1', Page\Dashboard::$TasksSummaryCount);
//    }
//    
//    public function Auditor16_2_ChangeStatusOfTaskToPassed(AcceptanceTester $I)
//    {
//        $I->amOnPage(Page\Dashboard::URL_InspAud());
//        $I->wait(2);
//        $I->selectOption(Page\Dashboard::AuditStatusSelectLine_ByBusinessNameAndReviewType($this->business3, Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(1);
//        $I->click(\Page\Dashboard::UpdateButtonLine_ByBusinessNameAndReviewType($this->business3, \Page\AuditGroupList::Energy_AuditGroup));
//        $I->wait(5);
//    }
//    
//    public function Coordinator17_LogOut_And_LoginAsCoordinator1(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(1);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, 'coordinator');
//    }
//    
//    //----------------------------Coordinator Dashboard-------------------------
//    public function Coordinator17_1_CheckDashboard_CheckStatuses_ChangeStatuses_CheckStatuses(AcceptanceTester $I) {
//        $I->amOnPage(Page\Dashboard::URL());
//        $I->wait(4);
//        //Application statuses on dashboard
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//        //Check on business application details
//        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
//        $I->wait(5);
//        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
//        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
//        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
//        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
//        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
//        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PendingStatus_TierTab);
//        $I->click(Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
//        $I->wait(6);
//        $I->waitForText("Assign Inspectors", 30, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
//        $I->wait(2);
//        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName($this->nameComplianceCheck_StAdm), Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->reloadPage();
//        $I->wait(2);
//        $I->scrollTo(Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(2);
//        $I->click(Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
//        $I->wait(6);
//        $I->waitForText("Assign Auditors", 30, \Page\ApplicationDetails::$AuditsPopup_Title);
//        $I->wait(2);
//        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->reloadPage();
//        $I->wait(1);
//        $I->selectOption(Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->selectOption(Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->selectOption(Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->selectOption(Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->selectOption(Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->selectOption(Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, Page\ApplicationDetails::PassedStatus_TierTab);
//        $I->wait(2);
//        $I->amOnPage(Page\Dashboard::URL());
//        $I->wait(4);
//        //Application statuses on dashboard
//        $I->canSee(\Page\Dashboard::PassedStatus, \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::PassedStatus, \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::PassedStatus, \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProcessStatus, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
//        $I->canSee(\Page\Dashboard::InProgressStatus, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        $I->canSee("2", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        $I->canSee("0", \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
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
//        $I->wait(3);
//        $I->CheckValuesOnSectorListPage($sector, $program);
//    }
//    
//    public function StateAdmin_UpdateSectorCreatedByCoordinator(\Step\Acceptance\Sector $I) {
//        $sector            = $this->sector_Coordinator;
//        $newsectorName     = $this->sector_Update = "new_changed by state admin";
//        $program           = $this->program2;
//        $countOfBusinesses = '1';
//        
//        $I->UpdateSector($sector, $program, $newsectorName);
//        $I->wait(1);
//        $I->CheckValuesOnSectorListPage($newsectorName, $program, $status = 'active', $countOfBusinesses);
//        $I->cantSeeElement(Page\SectorList::NameLine_ByNameValue($sector, $program));
//    }
//    
//    //-------State Admin Create Quantitative & Not Quantitative Measures--------
//    public function StateAdmin_CreateMeasure_NotQuantitative_MultipleQuestions(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc1_StateAdmin = $I->GenerateNameOf("Description Created by State Admin1");
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
//        $desc            = $this->measureDesc2_StateAdmin = $I->GenerateNameOf("Description Created by State Admin2");
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
//        $desc            = $this->measureDesc3_StateAdmin = $I->GenerateNameOf("Description Created by State Admin3");
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
//        $desc            = $this->measureDesc4_StateAdmin = $I->GenerateNameOf("Description Created by State Admin4");
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
//    public function StateAdmin_CheckGlobalVariableInMeasure_Quantitative_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
//        $questions       = ['What color?'];
//        $answers         = ['Grey', 'Green', 'Red'];
//        
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure4_StateAdmin));
//        $I->wait(2);
//        $I->canSee("You have to select Global Variables for next combination Question and Option", Page\MeasureUpdate::$FormulasAlert_MultipleQuestionAndNumber);
//        $I->canSee("$questions[0] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
//        $I->canSee("$questions[0] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
//        $I->canSee("$questions[0] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
//        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
//        $I->wait(1);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
//        $I->wait(2);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[0]));
//        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[1]));
//        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[2]));
//        $I->canSee($this->titleGlobalVariable_NatAdm, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[0]));
//        $I->canSee($this->titleGlobalVariable_NatAdm, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[1]));
//        $I->canSee($this->titleGlobalVariable_NatAdm, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[2]));
//        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[1]), $this->titleGlobalVariable_NatAdm);
//        $I->click(Page\MeasureFormulasPopup::$SaveButton);
//        $I->wait(1);
//        $I->reloadPage();
//        $I->wait(1);
//        $I->canSee("You have to select Global Variables for next combination Question and Option", Page\MeasureUpdate::$FormulasAlert_MultipleQuestionAndNumber);
//        $I->canSee("$questions[0] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
//        $I->cantSee("$questions[0] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
//        $I->canSee("$questions[0] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_Number(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc5_StateAdmin = $I->GenerateNameOf("Description Created by State Admin5");
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
//    public function StateAdmin_CheckGlobalVariableInMeasure_Quantitative_Number(\Step\Acceptance\Measure $I) {
//        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure5_StateAdmin));
//        $I->wait(2);
//        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
//        $I->wait(1);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
//        $I->wait(2);
//        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
//        $I->wait(2);
//        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, $this->nameSavingArea_NatAdm);
//        $I->wait(1);
//        $I->click(\Page\MeasureFormulasPopup::$AddButton);
//        $I->wait(5);
//        $I->reloadPage();
//        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
//        $I->wait(1);
//        $I->canSee($this->nameSavingArea_NatAdm, \Page\MeasureFormulasPopup::AreaLine('1'));
//        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine('1'));
//        $I->wait(2);
//        $I->canSee('['.$this->nameGlobalVariable_NatAdm.']', ".formulas-list>div:nth-of-type(1) ul>div>b");
//    }
//    
//    public function StateAdmin_CreateMeasure_Quantitative_ThermsPopup(\Step\Acceptance\Measure $I) {
//        $desc            = $this->measureDesc6_StateAdmin = $I->GenerateNameOf("Description Created by State Admin6");
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
//        $desc            = $this->measureDesc7_StateAdmin = $I->GenerateNameOf("Description Created by State Admin7");
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
//        $desc            = $this->measureDesc8_StateAdmin = $I->GenerateNameOf("Description Created by State Admin8");
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
//        $desc            = $this->measureDesc9_StateAdmin = $I->GenerateNameOf("Description Created by State Admin9");
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
//        $program     = [$this->program1];
//        
//        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1_StateAdmin));
//        $I->wait(2);
//        $I->CreateMeasureGreenTip($descGT, $program);
//        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1_StateAdmin));
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
//        $I->wait(3);
//        $I->click(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($descMeasure));
//        $I->wait(4);
//        $I->UpdateMeasureGreenTip($descGT);
//        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2_Coordinator));
//        $I->wait(3);
//        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
//        $I->cantSee($this->grTip2_Coordinator, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
//    }
//    
//    //------------------State Admin create Checklist For Tier 2-----------------
//    public function StateAdmin_CreateChecklistForTier1_MeasuresPresent(\Step\Acceptance\Checklist $I) {
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
//        $I->wait(3);
//        $I->canSee($program, Page\TierManage::$ProgramOption);
//        $I->canSee($this->program1, Page\TierManage::$ProgramOption);
//        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
//        $I->wait(4);
//        $I->canSee($this->tier1Name, Page\TierManage::$Tier1Button_LeftMenu);
//        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
//        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
//        $I->ManageTiers($program, $tier1, $tier1Name, $tier1Desc, $tier1OptIn);
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
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(4);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(4);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(4);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(4);
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
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//        $I->reloadPage();
//        $I->wait(6);
//        $I->canSee($this->state, \Page\UserUpdate::$State);
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(4);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(4);
//        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->cantSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::$AddProgramButton);
//        $I->wait(4);
//        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
//        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(4);
//        $I->click(\Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1));
//        $I->wait(4);
//        $I->acceptPopup();
//        $I->wait(4);
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
//        $I->ManageChecklist($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
//        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesT1_Coordinator, $this->extensions_Coordinator);
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
