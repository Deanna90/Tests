<?php


class ChecklistCreateCest
{
    public $state, $idState;
    public $audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste;
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measure3Desc, $idMeasure3;
    public $measure4Desc, $idMeasure4;
    public $measure5Desc, $idMeasure5;
    public $measure6Desc, $idMeasure6;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $sector1, $county;
    public $city2, $zip2, $program2, $sector2;
    public $statusesDefault           = ['not set',  'not set',  'not set', 'not set',  'not set',  'not set'];
    public $statusesEC1               = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    public $statusesProg1OfficeRetail = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    public $statusesProg1Sector1      = ['elective', 'not set',  'not set', 'not set',  'elective', 'elective'];
    public $statusesProg2Sector2      = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    public $statusesEC3               = ['elective',     'elective', 'not set', 'not set',  'core', 'core'];
    public $extensionsEC3             = ['Default',         'Large Landscape',         'Default',         'Large Landscape',         'Large Building', 'Default'];
    public $extensionsDefault           = ['Default',         'Default',         'Default',         'Default',         'Default',         'Default'];
    public $extensionsEC1               = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    public $extensionsProg1OfficeRetail = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public $extensionsProg1Sector1      = ['Default',         'Default',         'Default',         'Default',         'Default',         'Default'];
    public $extensionsProg2Sector2      = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    public $checklistUrl, $statnewEC1, $statnewEC3;
    
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
        $name = $this->state = $I->GenerateNameOf("StCheckCreate");
        $shortName = 'ChCr';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
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
        $I->wait(1);
        $I->reloadPage();
        $I->wait(4);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
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
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
        $I->wait(2);
    }
    
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
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure1(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1");
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
    
    public function Help_CreateMeasure2(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
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
    
    public function Help_CreateMeasure3(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
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
    
    public function Help_CreateMeasure4(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description_4");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure5(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description_5");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure6(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description_6");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
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
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityChCr2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgChCr2");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //--------------------------------------------------------------------------Create Sectors-----------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateSectorForProgram1(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#1 for program#1 in default state");
        $name      = $this->sector1 = $I->GenerateNameOf("SecProg1");
        $state     = $this->state;
        $program   = $this->program1;
        
        $I->CreateSector($name, $state, $program, null, $this->idState);
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateSectorForProgram2(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#1 for program#2 in default state");
        $name      = $this->sector2 = $I->GenerateNameOf("SecProg2");
        $state     = $this->state;
        $program   = $this->program2;
        
        $I->CreateSector($name, $state, $program, null, $this->idState);
        $I->wait(2);
    }
    
    //----------------------------Create Coordinator----------------------------
    
    /**
     * @group coordinator
     */
    
    public function CreateCoordinatorUserWithoutShowInfo_ForProgram2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'off');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(6);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(6);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(3);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator = $coordinator['id'];
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //------------------Create Checklists Without Created EC--------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail_ForCoordinator(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(6);
        $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
        $I->wait(2);
        $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(3);
        $I->cantSee($programDestination, \Page\ChecklistCreate::$ProgramDestinationOption);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_Sector1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_Sector2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
        $I->reloadPage();
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_ForCoordinator(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(6);
        $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
        $I->wait(2);
        $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(3);
        $I->cantSee($programDestination, \Page\ChecklistCreate::$ProgramDestinationOption);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_Sector1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_Sector2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_OfficeRetail_PC_Program1_SC_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program1;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program1;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_ForCoordinator(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(6);
        $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
        $I->wait(2);
        $I->click(\Page\ChecklistCreate::$ProgramCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$ProgramCriteriaSelect, $programCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$SectorCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$SectorCriteriaSelect, $sectorCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(3);
        $I->cantSee($programDestination, \Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_ForCoordinator(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(6);
        $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
        $I->wait(2);
        $I->click(\Page\ChecklistCreate::$ProgramCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$ProgramCriteriaSelect, $programCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$SectorCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$SectorCriteriaSelect, $sectorCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(3);
        $I->cantSee($programDestination, \Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_Sector2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_Sector2_ForCoordinator(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program2;
        
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(6);
        $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
        $I->wait(2);
        $I->click(\Page\ChecklistCreate::$ProgramCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$ProgramCriteriaSelect, $programCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$SectorCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$SectorCriteriaSelect, $sectorCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(3);
        $I->cantSee($programDestination, \Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program1_SC_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program1;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program1_SC_OfficeRetail_ForCoordinator(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program1;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        
        $I->amOnPage(\Page\ChecklistCreate::URL());
        $I->wait(6);
        $I->click(\Page\ChecklistCreate::$SourceProgramSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistCreate::$SourceProgramSelect, $sourceProgram);
        $I->wait(2);
        $I->click(\Page\ChecklistCreate::$ProgramCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$ProgramCriteriaSelect, $programCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$SectorCriteriaSelect);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistCreate::$SectorCriteriaSelect, $sectorCriteria);
        $I->wait(3);
        $I->click(\Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(3);
        $I->cantSee($programDestination, \Page\ChecklistCreate::$ProgramDestinationSelect);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program2_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create EC----------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateEssentialCriteriaForTier1(\Step\Acceptance\EssentialCriteria $I) {
        $number = '1';
        $descs  = $this->measuresDesc_SuccessCreated;
        
        $I->CreateEssentialCriteria($number);
        $this->statnewEC1 = $I->ManageEssentialCriteria($descs, $this->statusesEC1, $this->extensionsEC1);
        $I->reloadPage();
        $I->PublishECStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateEssentialCriteriaForTier3(\Step\Acceptance\EssentialCriteria $I) {
        $number   = '3';
        $descs    = $this->measuresDesc_SuccessCreated;
        $statuses = $this->statusesDefault;
        
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $statuses);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateEssentialCriteriaForTier2(\Step\Acceptance\EssentialCriteria $I) {
        $number   = '2';
        $descs    = $this->measuresDesc_SuccessCreated;
        $statuses = $this->statnewEC1;
        
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $statuses);
        $this->statnewEC3 = $I->ManageEssentialCriteria($descs, $this->statusesEC3, $this->extensionsEC3);
        $I->reloadPage();
        $I->PublishECStatus();
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator2(AcceptanceTester $I)
    {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //------------------Create Checklists With Created EC-----------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_Sector1_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_Sector2_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
        $I->reloadPage();
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_Sector1_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_Sector2_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_OfficeRetail_PC_Program1_SC_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program1;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program1;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_Sector2_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program1_SC_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program1;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_Program2_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsAdmin2(AcceptanceTester $I)
    {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
        $I->wait(2);
    }
    
    //--------------------------Create Help Checklist---------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesProg1OfficeRetail = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public function Help_CreateChecklistForTier1_Program1_OfficeRetail(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist(null, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesProg1OfficeRetail, $this->extensionsProg1OfficeRetail);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $id_checklist = $u2[0];
        $I->comment("Checklist id: $id_checklist");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($id_checklist));
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesProg1Sector1      = ['elective', 'not set',  'not set', 'not set',  'elective', 'elective'];
    //$extensionsProg1Sector1      = ['Default',         'Default',         'Default',         'Default',         'Default',         'Default'];
    public function Help_CreateChecklistForTier1_Program1_Sector1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist(null, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesProg1Sector1, $this->extensionsProg1Sector1);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $id_checklist = $u2[0];
        $I->comment("Checklist id: $id_checklist");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($id_checklist));
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesProg2Sector2      = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    //$extensionsProg2Sector2      = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    public function Help_CreateChecklistForTier1_Program2_Sector2(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist(null, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesProg2Sector2, $this->extensionsProg2Sector2);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $id_checklist = $u2[0];
        $I->comment("Checklist id: $id_checklist");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($id_checklist));
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator3(AcceptanceTester $I)
    {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //-------------Create Checklists With Created EC & Checklists---------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesEC1                 = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1               = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg1OfficeRetail = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public function CreateChecklist_SP_Program1_PD_Program1_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'core', 'not set', 'elective', 'not set'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Large Landscape', 'Default', 'Large Landscape', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesEC1                 = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1               = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg1OfficeRetail   = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public function CreateChecklist_SP_Program1_PD_Program1_SD_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'core', 'not set', 'elective', 'not set'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Large Landscape', 'Default', 'Large Landscape', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesEC1                 = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1               = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg1OfficeRetail   = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public function CreateChecklist_SP_Program1_PD_Program1_SD_OfficeRetail_PC_Program1_SC_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program1;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program1;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'core', 'not set', 'elective', 'not set'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Large Landscape', 'Default', 'Large Landscape', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    //$statusesEC1                 = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1               = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //Program2 Office / Retail - Published Checklist Not Created
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    //$statusesEC1                 = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1               = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //Program2 Office / Retail - Published Checklist Not Created
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesEC1                   = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1                 = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg2Sector2          = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    //$extensionsProg2Sector2        = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    public function CreateChecklist_SP_EssentialCriteria_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'not set', 'elective', 'elective', 'elective'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Default', 'Large Building', 'Large Landscape', 'Large Building'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    //$statusesEC1                   = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1                 = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg2Sector2          = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    //$extensionsProg2Sector2        = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    
    public function CreateChecklist_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'not set', 'elective', 'elective', 'elective'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Default', 'Large Building', 'Large Landscape', 'Large Building'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    //$statusesEC1                 = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1               = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg1OfficeRetail   = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PC_Program1_SC_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program1;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'core', 'not set', 'elective', 'not set'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Large Landscape', 'Default', 'Large Landscape', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesEC1                   = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1                 = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg2Sector2          = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    //$extensionsProg2Sector2        = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    public function CreateChecklist_SP_Program2_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'not set', 'elective', 'elective', 'elective'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Default', 'Large Building', 'Large Landscape', 'Large Building'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //$statusesEC1                   = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1                 = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg1OfficeRetail     = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail   = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    //
    //$statusesProg2Sector2          = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    //$extensionsProg2Sector2        = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    public function CreateChecklist_SP_Program1_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'core', 'elective', 'elective', 'elective'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Large Landscape', 'Large Building', 'Large Landscape', 'Large Building'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    //$statusesEC1                   = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    //$extensionsEC1                 = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    //
    //$statusesProg1OfficeRetail     = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail   = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    //
    //$statusesProg1Sector1          = ['elective', 'not set',  'not set', 'not set',  'elective', 'elective'];
    //$extensionsProg1Sector1        = ['Default',         'Default',         'Default',         'Default',         'Default',         'Default'];
    public function CreateChecklist_SP_Program1_PD_Program2_SD_Sector2_PC_Program1_SC_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program1;
        $sectorCriteria     = $this->sector1;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = ['core', 'elective', 'core', 'not set', 'elective', 'elective'];
        $extensionsNew      = ['Large Landscape', 'Default', 'Large Landscape', 'Default', 'Large Landscape', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    //$statusesEC3        = ['elective',     'elective', 'not set', 'not set',  'core', 'core'];
    //$extensionsEC3      = ['Default',         'Large Landscape',         'Default',         'Large Landscape',         'Large Building', 'Default'];
    public function CreateChecklist_ForTier2_SP_Program1_PD_Program2_SD_Sector2_PC_Program1_SC_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program1;
        $sectorCriteria     = $this->sector1;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_ForTier2_SP_Program1_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_ForTier2_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     */
    
    public function CreateChecklist_ForTier2_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateChecklist_ForTier2_SP_EssencialCriteria_PD_Program1_SD_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
}
