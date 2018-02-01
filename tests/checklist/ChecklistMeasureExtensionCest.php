<?php

class ChecklistMeasureExtensionCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measure3Desc, $idMeasure3;
    public $measure4Desc, $idMeasure4;
    public $measure5Desc, $idMeasure5;
    public $measure6Desc, $idMeasure6;
    public $measure7Desc, $idMeasure7;
    public $measure8Desc, $idMeasure8;
    public $measure9Desc, $idMeasure9;
    public $measure10Desc, $idMeasure10;
    public $measure11Desc, $idMeasure11;
    public $measure12Desc, $idMeasure12;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $county;
    public $statuses    = ['core', 'elective', 'not set', 'core', 'elective', 'not set', 'core', 'elective', 'not set'];
    public $statuses2   = ['core', 'core', 'core', 'elective', 'core', 'elective', 'core', 'not set', 'core'];
    public $extensions  = ['Default', 'Default', 'Default', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    public $extensions2 = ['Default', 'Large Building', 'Default', 'Large Building', 'Large Building', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    public $checklistUrl, $id_checklist;
    public $business_NAanswers, $bus_busSquire_NAanswers  = '45678', $bus_landSquire_NAanswers = '5666';
    public $business1_LB,       $bus1_busSquire_LB        = '30000', $bus1_landSquire_LB       = '999';
    public $business2_LL,       $bus2_busSquire_LL        = '29999', $bus2_landSquire_LL       = '1000';
    public $business3_LB_LL,    $bus3_busSquire_LB_LL     = '30001', $bus3_landSquire_LB_LL    = '1001'; 
    public $business4_Default,  $bus4_busSquire_Default   = '17500', $bus4_landSquire_Default  = '500';
    
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
        $name = $this->state = $I->GenerateNameOf("StMeasExtens");
        $shortName = 'ME';
        
        $I->CreateState($name, $shortName);
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
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
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
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
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
    
    public function Help_CreateMeasure1_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure3_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure4_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description_4_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure5_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description_5_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure6_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description_6_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure7_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc = $I->GenerateNameOf("Description_7_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['op1', 'op2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure8_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc = $I->GenerateNameOf("Description_8_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure9_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description_9_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['opt1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateCounty(\Step\Acceptance\County $I) {
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
        $city    = $this->city1 = $I->GenerateNameOf("CityME1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgME1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
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
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Create_Checklist1_ForTier2_1stForExtensionUpdatingTest(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->wait(5);
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(3);
        $I->comment("-----DEFAULT TAB-----");
        $I->cantSeeElement(Page\ChecklistManage::$SubgroupRow_DefineTotalTab);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->comment("-----LARGE BUILDING TAB-----");
        $I->cantSeeElement(Page\ChecklistManage::$SubgroupRow_DefineTotalTab);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->comment("-----LARGE LANDSCAPE TAB-----");
        $I->cantSeeElement(Page\ChecklistManage::$SubgroupRow_DefineTotalTab);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->comment("-----LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->cantSeeElement(Page\ChecklistManage::$SubgroupRow_DefineTotalTab);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->cantSeeElement(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(2);
        $I->ManageChecklist($descs, $this->statuses, $this->extensions);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url1: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Checklist (For Extensions Updating Test) id: $this->id_checklist");
        $I->reloadPage();
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(3);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '2');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '2');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeExtensionStatusesInChecklist1_CheckCorrectDefineTotalsValuesAfterExtensionsUpdating(\Step\Acceptance\Checklist $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions2);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->comment("                                             ");
        $I->canSee('Core', \Page\ChecklistManage::$IncludedMeasuresForm_CoreTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreLabel);
        $I->canSee('Lg Building:', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreLabel);
        $I->canSee('Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreLabel);
        $I->canSee('Lg Building + Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreLabel);
        
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('Elective', \Page\ChecklistManage::$IncludedMeasuresForm_ElectiveTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveLabel);
        $I->canSee('Lg Building:', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveLabel);
        $I->canSee('Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveLabel);
        $I->canSee('Lg Building + Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveLabel);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Required elective:---");
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredLabel);
        $I->canSee('Lg Building:', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredLabel);
        $I->canSee('Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredLabel);
        $I->canSee('Lg Building + Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredLabel);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredValue);
        $I->wait(1);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->comment("-----Energy subgroup DEFAULT TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup DEFAULT TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "1");
        $I->canSee("3", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "2");
        $I->canSee("4", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
    }
    
    //For Test Statuses Updating
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Create_Checklist2_ForTier2_ForStatusesUpdatingTest(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(2);
        $I->ManageChecklist($descs, $this->statuses, $this->extensions);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url1: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Checklist (For Statuses Updating Test) id: $this->id_checklist");
        $I->reloadPage();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '2');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '2');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeExtensionStatusesInChecklist2_CheckCorrectDefineTotalsValuesAfterStatusesUpdating(\Step\Acceptance\Checklist $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses2);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(2);
        $I->comment("                                             ");
        $I->canSee('4', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('6', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        $I->comment("---Required elective:---");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredValue);
        $I->wait(1);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->comment("-----Energy subgroup DEFAULT TAB-----");
        $I->canSee("3", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "1");
        $I->canSee("4", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup DEFAULT TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING TAB-----");
        $I->canSee("3", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "1");
        $I->canSee("4", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("4", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "2");
        $I->canSee("6", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("4", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "2");
        $I->canSee("6", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_Create_Checklist3_ForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->comment("------------------------------------------------------");
        $I->comment("---------------Checklist For Main Tests---------------");
        $I->comment("------------------------------------------------------");
        $I->wait(3);
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses, $this->extensions);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url1: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Checklist id: $this->id_checklist");
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndDefineTotals_OnManageChecklist_BeforeDefineTotalUpdate(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        $I->comment("---Required elective:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredValue);
        $I->wait(1);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->comment("-----Energy subgroup DEFAULT TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup DEFAULT TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "0");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "0");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckThatMoreThanCountOfElectiveMeasures_CANTBeSave_InEnabledElectiveField(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '10');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '4');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '2');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '3');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '11');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '222');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '3');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '2');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckSavedMaxValuesAfterDefineTotalUpdate(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        $I->comment("---Required elective:---");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredValue);
        $I->wait(1);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->comment("-----Energy subgroup DEFAULT TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup DEFAULT TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "2");
        $I->canSee("4", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "2");
        $I->canSee("4", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotal(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '0');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '2');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '0');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckAfterDefineTotalUpdate(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        $I->comment("---Required elective:---");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredValue);
        $I->wait(1);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->comment("-----Energy subgroup DEFAULT TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup DEFAULT TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "1");
        $I->canSee("2", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "2");
        $I->canSee("4", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE LANDSCAPE TAB-----");
        $I->canSee("0", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("0", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::$FilterMenu_EnergyGroupButton);
        $I->wait(2);
        $I->comment("-----Energy subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("2", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), "1");
        $I->canSee("3", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
        
        $I->comment("-----                      -----                       -----");
        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->comment("-----Solid Waste subgroup LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSee("1", Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSee("1", Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), "0");
        $I->canSee("1", Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_SolidWaste));
    }
    
    //--------------------------------------------------------------------------Default Extension On Checklist Preview-------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckDefaultMeasures_Present_Default_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 1 Measures", \Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */ 
    
    public function CheckDefaultMeasures_Absent_LB_LL_LBAndLL_NotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
    }
    
    //--------------------------------------------------------------------------LB Extension On Checklist Preview------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLBMeasures_Present_Default_LB_LbAndLL_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Building");
        $I->wait(3);
        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\ChecklistPreview::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
        $I->wait(1);
        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 1 Measures", \Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure8Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLBMeasures_Absent_LL_NotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Building");
        $I->wait(3);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure9Desc));
    }
    
    //--------------------------------------------------------------------------LL Extension On Checklist Preview------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLLMeasures_Present_Default_LL_LbAndLL_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Landscape");
        $I->wait(3);
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->canSee("0 of 2 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
        $I->canSee("0 of 2 required measures completed", \Page\ChecklistPreview::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 2 of the 2 Measures", \Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLLMeasures_Absent_LB_NotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Landscape");
        $I->wait(3);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
    }
    
    //--------------------------------------------------------------------------LB+LL Extension On Checklist Preview------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLBAndLLMeasures_Present_AllCoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Lg Building + Lg Landscape");
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->canSee("0 of 2 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 2 Measures", \Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->wait(1);
        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\ChecklistPreview::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure8Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLBAndLLMeasures_Absent_AllNotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Lg Building + Lg Landscape");
        $I->wait(2);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
        $I->wait(1);
        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business registration for check N/A answers---------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function BusinessRegistration_Check_NA_answers(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business_NAanswers = $I->GenerateNameOf("bus_NA");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus_busSquire_NAanswers;
        $landscapeFootage = $this->bus_landSquire_NAanswers;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(9);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NA_CompleteMeasure1_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '20';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for NA business: $this->business_NAanswers");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 34%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NA_CompleteMeasure8_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure8 for NA business: $this->business_NAanswers");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
        $I->assertEquals('true', $readonly);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 34%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NA_CompleteMeasure7_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure7 for NA business: $this->business_NAanswers");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
        $I->assertEquals('true', $readonly);
        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), 'readonly');
        $I->assertEquals('true', $readonly);
        $I->canSee("2 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 34%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NA_CompleteMeasure5_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $value1   = '11';
                
        $I->wait(1);
        $I->comment("Complete Measure5 for NA business: $this->business_NAanswers");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("3 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 67%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("3 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NA_CompleteMeasure4_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure4 for NA business: $this->business_NAanswers");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
        $I->assertEquals('true', $readonly);
        $I->canSee("4 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("4 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_AfterComplitingMeasures_NA(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("After Compliting Measures - Check on Review Page - NA LB&LL");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("4 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("1 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusinessNA(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------LB business registration----------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LargeBusiness_Business1Registration(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1_LB = $I->GenerateNameOf("bus1_LB");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus1_busSquire_LB;
        $landscapeFootage = $this->bus1_landSquire_LB;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(9);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresPresent_LB_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LB, LB&LL, Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresAbsent_LL_NotSet(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LL measures and measures with not set status are absent in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_LB(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - LB");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("0 of 3 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LB_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '20';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for LB business: $this->business1_LB");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("1 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 33%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 34%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LB_CompleteMeasure8(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        $value1   = '88';
                
        $I->wait(1);
        $I->comment("Complete Measure8 for LB business: $this->business1_LB");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("2 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 66%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 67%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("2 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_AfterComplitingMeasures_LB(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("After Compliting Measures - Check on Review Page - LB");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("2 of 3 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::InProgressStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness1(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------LL business registration----------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LargeLandscape_Business2Registration(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2_LL = $I->GenerateNameOf("bus2_LL");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus2_busSquire_LL;
        $landscapeFootage = $this->bus2_landSquire_LL;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(9);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresPresent_LL_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LL, LB&LL, Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 2 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 2 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresAbsent_LB_NotSet(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LB measures and measures with not set status are absent in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_LL(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - LL");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("0 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /2", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LL_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '34';
        $value2   = '22';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for LL business: $this->business2_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 2 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 2 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LL_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '5';
                
        $I->wait(1);
        $I->comment("Complete Measure8 for LL business: $this->business2_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("2 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 2 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_AfterComplitingMeasures_LL(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("After Compliting Measures - Check on Review Page - LL");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("2 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------LB&LL business registration-------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LargeBusinessAndLargeLandscape_Business3Registration(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3_LB_LL = $I->GenerateNameOf("bus3_LB_LL");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus3_busSquire_LB_LL;
        $landscapeFootage = $this->bus3_landSquire_LB_LL;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(9);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresPresent_LL_LB_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LL, LB, LB&LL, Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresAbsent_NotSet(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that measures with not set status are absent in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_LB_LL(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - LB&LL");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("0 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LB_LL_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '4';
        $value2   = '2';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for LB&LL business: $this->business3_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 34%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LB_LL_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '77';
                
        $I->wait(1);
        $I->comment("Complete Measure8 for LB&LL business: $this->business3_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("2 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 67%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 2 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_AfterComplitingMeasures_LB_LL(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("After Compliting Measures - Check on Review Page - LB&LL");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("2 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness3(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Default business registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Default_Business4Registration(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business4_Default = $I->GenerateNameOf("bus4_Def");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus4_busSquire_Default;
        $landscapeFootage = $this->bus4_landSquire_Default;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(9);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresPresent_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresAbsent_LL_LB_LBAndLL_NotSet(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LL, LB, LB&LL measures and measures with not set status are absent in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_Default(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Default_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '66';
        $value2   = '33';
                
        $I->wait(1);
        $I->comment("Complete Measure1 for Default business: $this->business4_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Default_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '2';
                
        $I->wait(1);
        $I->comment("Complete Measure8 for Default business: $this->business4_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->canSee("2 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 1 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_AfterComplitingMeasures_Default(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("After Compliting Measures - Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
        $I->wait(2);
        $I->canSee("2 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness4(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckBusinessesOnDashboard(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(3);
        $I->comment("Check business with NA answers:");
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business_NAanswers), ['style' => 'width: 100%;']);
        $I->canSee("4 / 4 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business_NAanswers));
        
        $I->comment("Check Default business:");
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business4_Default), ['style' => 'width: 100%;']);
        $I->canSee("2 / 2 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business4_Default));
        
        $I->comment("Check LB business:");
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business1_LB), ['style' => 'width: 66%;']);
        $I->canSee("2 / 3 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business1_LB));
        
        $I->comment("Check LL business:");
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business2_LL), ['style' => 'width: 50%;']);
        $I->canSee("2 / 4 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business2_LL));
        
        $I->comment("Check LB+LL business:");
        $I->canSeeElement(\Page\Dashboard::MeasuresCompleted_ProgressBar_ByBusName($this->business3_LB_LL), ['style' => 'width: 50%;']);
        $I->canSee("2 / 4 measures completed", \Page\Dashboard::MeasuresCompletedInfo_ByBusName($this->business3_LB_LL));
    }
}
