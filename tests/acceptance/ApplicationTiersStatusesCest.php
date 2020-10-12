<?php


class ApplicationTiersStatusesCest
{
    public $state, $city, $city2, $county, $zips, $program, $program2, $audSubgroup1_Energy, $audSubgroup1_SolidWaste, $business1, $business2, $business3, $busId1, $busId2, $busId3;
    public $id_audSubgroup1_Energy, $id_audSubgroup1_SolidWaste;
    public $measure1Desc, $measure2Desc, $measure3Desc, $measure4Desc, $measure5Desc, $measure6Desc, $measure7Desc, $measure8Desc, $measure9Desc;
    public $idMeasure1, $idMeasure2, $idMeasure3, $idMeasure4, $idMeasure5, $idMeasure6, $idMeasure7, $idMeasure8, $idMeasure9;
    public $measuresDesc_SuccessCreated;
    public $statuses1 = ['not set', 'elective', 'not set',  'core',    'not set', 'not set', 'not set',  'elective', 'not set'];
    public $statuses2 = ['core',    'core',     'core',     'not set', 'not set', 'core',    'not set',  'not set',  'core'];
    public $statuses3 = ['not set', 'not set',  'elective', 'not set', 'core',    'not set', 'elective', 'core',     'not set'];
    public $id_checklist_Tier1, $id_checklist_Tier2, $id_checklist_Tier3;
    public $todayDate = [];
    
    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StAppTierStat");
        $shortName = 'ATS';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $group = $I->GetAuditSubgroupOnPageInList($name);
        $this->id_audSubgroup1_Energy = $group['id'];
    }
    
    public function Help2_4_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $group = $I->GetAuditSubgroupOnPageInList($name);
        $this->id_audSubgroup1_SolidWaste = $group['id'];
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure1_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure3_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure4_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description_4_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure5_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description_5_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure6_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description_6_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure7_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc = $I->GenerateNameOf("Description_7_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['op1', 'op2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure8_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc = $I->GenerateNameOf("Description_8_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure9_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description_9_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['opt1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
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
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city = $I->GenerateNameOf("CityATS1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zips = $I->GenerateZipCode();
        $program = $this->program = $I->GenerateNameOf("ProgATS1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
//    public function Help1_6_3_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
//        $city    = $this->city2 = $I->GenerateNameOf("CityATS2");
//        $cityArr = [$city];
//        $state   = $this->state;
//        $zips    = $this->zips = $I->GenerateZipCode();
//        $program = $this->program2 = $I->GenerateNameOf("ProgATS2");
//        
//        $I->CreateCity($city, $state, $zips, $this->county);
//        $Y->CreateProgram($program, $state, $cityArr);
//    }
    
    public function Help1_6_3_ActivateTiers_Program1(\Step\Acceptance\Tier $I) {
        $tier3     = '';
        $tierOptIn = 'yes';
        $program   = $this->program;
        
        $I->ManageTiers($program, null,null,null,null,null,null,null,null,$tier3, null, null, $tierOptIn);
    }
    
   
    public function SectorChecklistCreate_Tier1(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '1';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses1);
        $I->PublishSectorChecklistStatus();
    }
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses2);
        $I->PublishSectorChecklistStatus();
    }
    
    public function SectorChecklistCreate_Tier3(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '3';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses3);
        $I->PublishSectorChecklistStatus();
    }
    
    public function Coordinator3_10_ActivateSectorForProgram2_CreateChecklistForTier1_MeasuresArePresentsent_ButNotActivated(\Step\Acceptance\Checklist $I) {
        
        $program            = $this->program2;
        $sector             = \Page\SectorList::DefaultSectorOfficeRetail;
        
        $I->amOnPage(Page\ChecklistList::URL());
//        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
//        $I->cantSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->waitPageLoad();
//        $I->wait(2);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program, $sector, 'Tier 3'));
        $this->id_checklist_Tier1 = $I->grabTextFrom(\Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 1'));
        $this->id_checklist_Tier2 = $I->grabTextFrom(\Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $this->id_checklist_Tier3 = $I->grabTextFrom(\Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 3'));
    }
    
    
    
//    public function Help1_15_CreateChecklistForTier1_Program1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program;
//        $programDestination = $this->program;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '1';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist_Tier1 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses1);
//        $I->reloadPage();
//        $I->PublishChecklistStatus($this->id_checklist_Tier1);
//    }
//    
//    public function Help1_15_CreateChecklistForTier2_Program1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program;
//        $programDestination = $this->program;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist_Tier2 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses2);
//        $I->reloadPage();
//        $I->PublishChecklistStatus($this->id_checklist_Tier2);
//    }
//    
//    public function Help1_15_CreateChecklistForTier3_Program1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program;
//        $programDestination = $this->program;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '3';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist_Tier3 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses3);
//        $I->reloadPage();
//        $I->PublishChecklistStatus($this->id_checklist_Tier3);
//    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business register-----------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //public $statuses1 = ['core', 'elective', 'elective', 'core', 'elective'];
    public function Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("bus1_ATS");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('0 /4', \Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee('0 /0', \Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSeeElement(\Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).'[@title="Not-started"]');
        $I->canSee('0 /1', \Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee('0 /0', \Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).'[@title="Not-started"]');
        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(10);
        $I->canSeeInCurrentUrl(Page\BusinessDashboard::$URL);
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2));
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("Tier 2 Review & Submit", Page\ReviewAndSubmit::$ReviewTitle);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewNextTierButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$ReviewPreviousTierButton);
        $I->canSee("Last submitted $this->todayDate", Page\ReviewAndSubmit::$SubmittedDateInfo);
        $I->canSeeElement(Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$GoToNextLevelButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        //Tier3
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3));
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("Tier 3 Review & Submit", Page\ReviewAndSubmit::$ReviewTitle);
        $I->cantSeeElement(Page\ReviewAndSubmit::$ReviewNextTierButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewPreviousTierButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$SubmittedDateInfo);
        $I->canSeeElement(Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$GoToNextLevelButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
    }
    
    public function Business1_CheckCurrentTier2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::$URL_TierLanding);
        $I->click(\Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(1);
        $I->waitPageLoad();
//        $I->click(Page\RegistrationStarted::$GetStartedButton);
//        $I->wait(5);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->click(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->wait(5);
        $I->cantSeeElement(\Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->canSee("Tier 2", Page\RegistrationStarted::$TierTitle);
        $I->canSeeElement(Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->cantSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->canSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("0 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business1_NotBlockedMeasure3_Tier3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '11';
                
        $I->comment("Not blocked Measure3 for Business1");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure3']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
        $I->wait(1);
    }
    
    public function Business1_CompleteMeasure5_Tier3(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $value1   = '11';
                
        $I->comment("Complete Measure5 for Business1");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
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
        $I->waitPageLoad();
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("1 Tier 3 measures completed. A minimum of 2 Tier 3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business1_CheckCurrentTier3(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::$URL_TierLanding);
        $I->click(\Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(1);
        $I->waitPageLoad();
//        $I->click(Page\RegistrationStarted::$GetStartedButton);
//        $I->wait(5);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->click(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->wait(5);
        $I->cantSeeElement(\Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->canSee("Tier 3", Page\RegistrationStarted::$TierTitle);
        $I->canSeeElement(Page\RegistrationStarted::$PreviousTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->canSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->cantSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("1 Tier 3 measures completed. A minimum of 2 Tier 3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business1_CheckSubmittedTier2_EnergyGroup(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2");
        $I->cantSeeElement(Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->cantSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->canSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("0 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business1_NotBlockedMeasure6_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
                
        $I->comment("Not blocked Measure6 for Business1");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure6']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
        $I->wait(1);
        
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
    }
    
    public function Business1_NotBlockedMeasure3_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->comment("Not blocked Measure3 for Business1");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure3']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
    }
    
    public function Business1_NotBlockedMeasure2_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
        $I->comment("Not blocked Measure2 for Business1");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure2']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
    }
    
    public function Business1_NotBlockedMeasure1_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Not blocked Measure1 for Business1");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure1']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2')."[@readonly='disabled']");
    }
    
    public function Business1_CheckSubmittedTier2_SolidWasteGroup(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier2");
        $I->cantSeeElement(Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->cantSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->canSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("0 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business1_NotBlockedMeasure9_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
                
        $I->comment("Not blocked Measure9 for Business1");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure9']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
    }
    
    public function Business1_CheckDashboard(Step\Acceptance\BusinessDashboard $I)
    {
        $benefits = ['No benefits'];
        
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        //My Status
        $I->comment("--------------------My Status Block----------------------");
        $I->canSee("Tier 2", \Page\BusinessDashboard::Tier_TierStatus('1'));
        $I->canSee("Not Started", \Page\BusinessDashboard::StatusForTier_TierStatus('1'));
        $I->canSee("1", \Page\BusinessDashboard::TierNumberIcon_TierStatus('1'));
        $I->canSee("Tier 3", \Page\BusinessDashboard::Tier_TierStatus('2'));
        $I->canSee("In Process", \Page\BusinessDashboard::StatusForTier_TierStatus('2'));
        $I->canSee("2", \Page\BusinessDashboard::TierNumberIcon_TierStatus('2'));
        $I->canSeeElement(\Page\BusinessDashboard::CurrentTierRow_TierStatus('2'));
        $I->cantSeeElement(\Page\BusinessDashboard::Tier_TierStatus('3'));
        //Tier Overviews
        $I->comment("------------------Tier Overviews Block-------------------");
        $I->comment("--------------Tier3 Benefits----------------");
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 3");
        $I->canSee("In Process", \Page\BusinessDashboard::$TierStatus_3rdTier_TierOverviews);
        $I->canSee("Tier 3 tier overview", \Page\BusinessDashboard::$TierTitle_3rdTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('3', $benefits);
        $I->comment("--------------Tier2 Benefits----------------");
        $I->selectOption(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 2");
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 2");
        $I->canSee("Not Started", \Page\BusinessDashboard::$TierStatus_2ndTier_TierOverviews);
        $I->canSee("Tier 2 tier overview", \Page\BusinessDashboard::$TierTitle_2ndTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('2', $benefits);
    }
    
    public function Help1_18_LogOutFromBusiness1(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business2_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("bus2_ATS");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
    }

    public function Business2_CheckDefaultCurrentTier2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::$URL_TierLanding);
        $I->click(\Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->click(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->wait(5);
        $I->cantSeeElement(\Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->canSee("Tier 2", Page\RegistrationStarted::$TierTitle);
        $I->canSeeElement(Page\RegistrationStarted::$PreviousTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->cantSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->canSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("0 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_CompleteMeasure1_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '1111';
        $value2   = '2222';
                
        $I->comment("Complete Measure1 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(3);
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
        $I->waitPageLoad();
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("1 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_CheckThatAlertToNextTierIsAbsent1(\Step\Acceptance\BusinessDashboard $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->CantSeeNextTierAlert();
    }
        
    public function Business2_CompleteMeasure2_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '90';
                
        $I->comment("Complete Measure2 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
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
        $I->waitPageLoad();
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('2', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("2 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_CheckThatAlertToNextTierIsAbsent2(\Step\Acceptance\BusinessDashboard $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->CantSeeNextTierAlert();
    }
    
    public function Business2_CompleteMeasure3_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->comment("Complete Measure3 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('3', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("3 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_CheckThatAlertToNextTierIsAbsent3(\Step\Acceptance\BusinessDashboard $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->CantSeeNextTierAlert();
    }
    
    public function Business2_CompleteMeasure6_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
                
        $I->comment("Complete Measure1 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('4', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("4 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_CheckThatAlertToNextTierIsPresent(\Step\Acceptance\BusinessDashboard $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
//        $I->CanSeeNextTierAlert('Tier 3', $this->id_checklist_Tier3);
        $I->CantSeeNextTierAlert();
    }
    
    public function Business2_SubmitTier3(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3));
        $I->canSee('0 /1', \Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee('1 /0', \Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSeeElement(\Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).'[@title="In-progress"]');
        $I->canSee('0 /1', \Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee('0 /0', \Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).'[@title="Not-started"]');
        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(10);
        $I->canSeeInCurrentUrl(Page\BusinessDashboard::$URL);
        
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3));
        
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("Tier 3 Review & Submit", Page\ReviewAndSubmit::$ReviewTitle);
        $I->cantSeeElement(Page\ReviewAndSubmit::$ReviewNextTierButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewPreviousTierButton);
        $I->canSee("Last submitted $this->todayDate", Page\ReviewAndSubmit::$SubmittedDateInfo);
        $I->canSeeElement(Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$GoToNextLevelButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        //Tier2
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2));
        
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("Tier 2 Review & Submit", Page\ReviewAndSubmit::$ReviewTitle);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewNextTierButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$ReviewPreviousTierButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$SubmittedDateInfo);
        $I->canSeeElement(Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$GoToNextLevelButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
    }
    
    public function Business2_CheckThatAlertToNextTierIsAbsent_AfterTier3Submition(\Step\Acceptance\BusinessDashboard $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->CantSeeNextTierAlert();
    }
    
    public function Business2_CheckCurrentTier2(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::$URL_Started);
//        $I->wait(3);
        $I->click(\Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(1);
        $I->waitPageLoad();
//        $I->wait(3);
//        $I->click(Page\RegistrationStarted::$HowToUseThisAppButton);
//        $I->wait(5);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->click(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(5);
        $I->cantSeeElement(\Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->canSee("Tier 2", Page\RegistrationStarted::$TierTitle);
        $I->canSeeElement(Page\RegistrationStarted::$PreviousTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->cantSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->canSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('4', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("4 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_NotBlockedMeasure3_Tier2(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '11';
                
        $I->comment("Not blocked Measure3 for Business2");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure3']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
        $I->wait(1);
    }
    
    public function Business2_CheckSubmittedTier3_EnergyGroup(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3");
        $I->cantSeeElement(Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->canSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->cantSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('4', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("0 Tier 3 measures completed. A minimum of 2 Tier 3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_NotBlockedMeasure5_Tier3(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->comment("Not blocked Measure5 for Business2");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure5']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
    }
    
    public function Business2_CheckSubmittedTier3_SolidWasteGroup(AcceptanceTester $I)
    {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3");
        $I->cantSeeElement(Page\RegistrationStarted::$OnlyViewModeAlert);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveButton_Footer);
        $I->cantSeeElementIsDisabled($I, \Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->cantSeeElement(\Page\RegistrationStarted::$NextButton_Footer);
        $I->canSeeElement(\Page\RegistrationStarted::$SaveAndNextButton_Footer);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        $I->canSee('Previous tier', Page\RegistrationStarted::$PreviousTierButton.' strong');
        $I->cantSee('Next tier', Page\RegistrationStarted::$NextTierButton.' strong');
        $I->canSee('4', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("0 Tier 3 measures completed. A minimum of 2 Tier 3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business2_NotBlockedMeasure8_Tier3(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->comment("Not blocked Measure8 for Business2");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure8']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
    }
    
    public function Business2_NotBlockedMeasure7_Tier3(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Not blocked Measure7 for Business2");
        $I->cantSeeElementIsDisabled($I, "[data-measure-id='$this->idMeasure7']");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'));
        $I->canSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'));
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1')."[@readonly='disabled']");
        $I->cantSeeElement(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2')."[@readonly='disabled']");
    }
    
    public function Business2_CheckDashboard(Step\Acceptance\BusinessDashboard $I)
    {
        $benefits = ['No benefits'];
        
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        //My Status
        $I->comment("--------------------My Status Block----------------------");
        $I->canSee("Tier 2", \Page\BusinessDashboard::Tier_TierStatus('1'));
        $I->canSee("In Process", \Page\BusinessDashboard::StatusForTier_TierStatus('1'));
        $I->canSee("1", \Page\BusinessDashboard::TierNumberIcon_TierStatus('1'));
        $I->canSee("Tier 3", \Page\BusinessDashboard::Tier_TierStatus('2'));
        $I->canSee("In Process", \Page\BusinessDashboard::StatusForTier_TierStatus('2'));
        $I->canSee("2", \Page\BusinessDashboard::TierNumberIcon_TierStatus('2'));
        $I->canSeeElement(\Page\BusinessDashboard::CurrentTierRow_TierStatus('1'));
        $I->cantSeeElement(\Page\BusinessDashboard::Tier_TierStatus('3'));
        //Tier Overviews
        $I->comment("------------------Tier Overviews Block-------------------");
        $I->comment("--------------Tier2 Benefits----------------");
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 2");
        $I->canSee("In Process", \Page\BusinessDashboard::$TierStatus_2ndTier_TierOverviews);
        $I->canSee("Tier 2 tier overview", \Page\BusinessDashboard::$TierTitle_2ndTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('2', $benefits);
        $I->comment("--------------Tier3 Benefits----------------");
        $I->selectOption(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 3");
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 3");
        $I->canSee("In Process", \Page\BusinessDashboard::$TierStatus_3rdTier_TierOverviews);
        $I->canSee("Tier 3 tier overview", \Page\BusinessDashboard::$TierTitle_3rdTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('3', $benefits);
    }
    
    public function Help1_18_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    
    public function ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
        $program    = $this->program;
        $tier1      = '1';
        $tier1Name  = "tiername1";
        $tier1Desc  = 'tier desc1';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(10);
        $I->ManageTiers($program, $tier1, $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    public function Help1_18_Dashboard1(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->cantSeeElement(\Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_LogOutFromAdmin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business3_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3 = $I->GenerateNameOf("bus3_ATS");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2));
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('0 /4', \Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee('0 /0', \Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSeeElement(\Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).'[@title="Not-started"]');
        $I->canSee('0 /1', \Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee('0 /0', \Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).'[@title="Not-started"]');
        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(10);
        $I->canSeeInCurrentUrl(Page\BusinessDashboard::$URL);
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2));
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("Tier 2 Review & Submit", Page\ReviewAndSubmit::$ReviewTitle);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewNextTierButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewPreviousTierButton);
        $I->canSee("Last submitted $this->todayDate", Page\ReviewAndSubmit::$SubmittedDateInfo);
        $I->canSeeElement(Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$GoToNextLevelButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        //Tier1
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1));
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("tiername1 Review & Submit", Page\ReviewAndSubmit::$ReviewTitle);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewNextTierButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$ReviewPreviousTierButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$SubmittedDateInfo);
        $I->canSeeElement(Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$GoToNextLevelButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        //Tier3
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3));
        
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("Tier 3 Review & Submit", Page\ReviewAndSubmit::$ReviewTitle);
        $I->cantSeeElement(Page\ReviewAndSubmit::$ReviewNextTierButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$ReviewPreviousTierButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$SubmittedDateInfo);
        $I->canSeeElement(Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->cantSeeElement(Page\ReviewAndSubmit::$GoToNextLevelButton);
        $I->canSeeElement(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
    }
    
    public function Business3_CheckThatAlertToNextTierIsAbsent1(\Step\Acceptance\BusinessDashboard $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->CantSeeNextTierAlert();
    }
    
    public function Business3_CheckDashboard(Step\Acceptance\BusinessDashboard $I)
    {
        $benefits = ['No benefits']; 
        
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->canSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        //My Status
        $I->comment("--------------------My Status Block----------------------");
        $I->canSee("tiername1", \Page\BusinessDashboard::Tier_TierStatus('1'));
        $I->canSeeElement(\Page\BusinessDashboard::CurrentTierRow_TierStatus('1'));
        $I->canSee("Not Started", \Page\BusinessDashboard::StatusForTier_TierStatus('1'));
        $I->canSee("1", \Page\BusinessDashboard::TierNumberIcon_TierStatus('1'));
        $I->canSee("Tier 2", \Page\BusinessDashboard::Tier_TierStatus('2'));
        $I->canSee("Not Started", \Page\BusinessDashboard::StatusForTier_TierStatus('2'));
        $I->canSee("2", \Page\BusinessDashboard::TierNumberIcon_TierStatus('2'));
        $I->canSee("Tier 3", \Page\BusinessDashboard::Tier_TierStatus('3'));
        $I->canSee("Not Started", \Page\BusinessDashboard::StatusForTier_TierStatus('3'));
        $I->canSee("3", \Page\BusinessDashboard::TierNumberIcon_TierStatus('3'));
        //Tier Overviews
        $I->comment("------------------Tier Overviews Block-------------------");
        $I->comment("--------------Tier1 Benefits----------------");
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "tiername1");
        $I->canSee("Not Started", \Page\BusinessDashboard::$TierStatus_1stTier_TierOverviews);
        $I->canSee("tiername1 tier overview", \Page\BusinessDashboard::$TierTitle_1stTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('1', $benefits);
        $I->comment("--------------Tier2 Benefits----------------");
        $I->selectOption(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 2");
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 2");
        $I->canSee("Not Started", \Page\BusinessDashboard::$TierStatus_2ndTier_TierOverviews);
        $I->canSee("Tier 2 tier overview", \Page\BusinessDashboard::$TierTitle_2ndTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('2', $benefits);
        $I->comment("--------------Tier3 Benefits----------------");
        $I->selectOption(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 3");
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "Tier 3");
        $I->canSee("Not Started", \Page\BusinessDashboard::$TierStatus_3rdTier_TierOverviews);
        $I->canSee("Tier 3 tier overview", \Page\BusinessDashboard::$TierTitle_3rdTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('3', $benefits);
    }
    
    public function Business3_CompleteMeasure4_Tier1(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->comment("Complete Measure4 for Business3");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee('1', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee('0', Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('3'));
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
    }
    
    public function Business3_CheckThatAlertToNextTierIsPresentAfterTier1Completing(\Step\Acceptance\BusinessDashboard $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
//        $I->CanSeeNextTierAlert('Tier 3', $this->id_checklist_Tier3);
        $I->CantSeeNextTierAlert();
    }
    
    public function Help1_18_LogOutFromBusiness3_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_18_Dashboard2(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('2', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url2: $url2");
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3), 'href');
        $I->comment("Url3: $url3");
        $u1 = explode('=', $url1);
        $u2 = explode('=', $url2);
        $u3 = explode('=', $url3);
        $this->busId1 = $u1[1];
        $this->busId2 = $u2[1];
        $this->busId3 = $u3[1];
        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2. Business3 id: $this->busId3.");
    }
    
    public function Dashboard_CheckCurrentTiers(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1)); //Tier3 current
        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business1));
        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
        
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business2));
        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
        
        $I->canSee("tiername1", \Page\Dashboard::TierName_ByBusName($this->business3));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
    }
    
    public function BusinessView_CheckCurrentTiers(AcceptanceTester $I){
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->cantSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('tiername1'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('Tier 2'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('Tier 3'));
        $I->cantSeeElement(\Page\ApplicationDetails::TierTabActive_BusinessInfoTab('Tier 2'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTabActive_BusinessInfoTab('Tier 3'));
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->cantSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('tiername1'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('Tier 2'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('Tier 3'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTabActive_BusinessInfoTab('Tier 2'));
        $I->cantSeeElement(\Page\ApplicationDetails::TierTabActive_BusinessInfoTab('Tier 3'));
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->canSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('tiername1'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('Tier 2'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTab_BusinessInfoTab('Tier 3'));
        $I->canSeeElement(\Page\ApplicationDetails::TierTabActive_BusinessInfoTab('tiername1'));
        $I->cantSeeElement(\Page\ApplicationDetails::TierTabActive_BusinessInfoTab('Tier 2'));
        $I->cantSeeElement(\Page\ApplicationDetails::TierTabActive_BusinessInfoTab('Tier 3'));
    }
    
    public function Business1_UpdateApplicationStatusesToPassedOrNotApplicable(AcceptanceTester $I){
        $passedOption        = "Passed";
        $notApplicableOption = "Not Applicable";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->click(\Page\ApplicationDetails::TierTab_BusinessInfoTab("Tier 2"));
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, $notApplicableOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, $notApplicableOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::TierTab_BusinessInfoTab("Tier 3"));
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, $notApplicableOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, $notApplicableOption);
        $I->wait(2);
    }
    
    public function Business2_UpdateApplicationStatusesToPassedOrNotApplicable(AcceptanceTester $I){
        $passedOption        = "Passed";
        $notApplicableOption = "Not Applicable";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->click(\Page\ApplicationDetails::TierTab_BusinessInfoTab("Tier 2"));
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, $notApplicableOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
    }
    
    public function Business3_UpdateApplicationStatusesToPassedOrNotApplicable(AcceptanceTester $I){
        $passedOption        = "Passed";
        $notApplicableOption = "Not Applicable";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->click(\Page\ApplicationDetails::TierTab_BusinessInfoTab("Tier 2"));
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::TierTab_BusinessInfoTab("Tier 3"));
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, $passedOption);
        $I->wait(2);
    }
    
    public function Dashboard_CheckCurrentTiers_AfterStatusesUpdate(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1)); //Tier3 current
        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business1));
        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
        
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business2));
        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
        $I->canSee("Passed", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
        $I->canSee("Passed", \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
        
        $I->canSee("tiername1", \Page\Dashboard::TierName_ByBusName($this->business3));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
    }
    
    public function Business3_MarkTier1_Tier3_AsCompleted(AcceptanceTester $I){
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->click(\Page\ApplicationDetails::TierToggleButton_BusinessInfoTab('1'));
        $I->wait(3);
//        $I->waitPageLoad();
        $I->click(\Page\ApplicationDetails::TierToggleButton_BusinessInfoTab('3'));
        $I->wait(3);
//        $I->waitPageLoad();
        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('1'));
        $I->canSee("In process", Page\ApplicationDetails::TierStatus_BusinessInfoTab('2'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('3'));
    }
    
    public function Help1_18_Dashboard22(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('2', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Dashboard_CheckCurrentTiers_AfterCompletingTiers(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1)); //Tier3 current
        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business1));
        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
        
        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business2));
        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
        $I->canSee("Passed", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
        $I->canSee("Passed", \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
        
        $I->canSee("tiername1", \Page\Dashboard::TierName_ByBusName($this->business3));
        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
    }
    
    public function Business3_ChangeStatusToRecognized(AcceptanceTester $I){
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->selectOption(\Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, Page\ApplicationDetails::RecognizedStatus);
        $I->wait(6);
//        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
    }
//    
//    public function Help1_18_Dashboard234(AcceptanceTester $I){
//        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        
//        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
//        $I->canSee('2', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        
//        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//    }
//    
//    public function Dashboard_CheckCurrentTiers_AfterChangingStatusToRecognized(AcceptanceTester $I){
//        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1)); //Tier3 current
//        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business1));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
//        
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
//        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
//        
//        $I->canSee("tiername1", \Page\Dashboard::TierName_ByBusName($this->business3));
//        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//    }
//    
//    public function Business3_MarkTier2_AsCompleted(AcceptanceTester $I){
//        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
//        $I->click(\Page\ApplicationDetails::TierToggleButton_BusinessInfoTab('2'));
//        $I->wait(3);
////        $I->waitPageLoad();
//        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('1'));
//        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('2'));
//        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('3'));
//    }
//    
//    public function Help1_18_Dashboard23(AcceptanceTester $I){
//        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        
//        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
//        $I->canSee('2', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        
//        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//    }
//    
//    public function Dashboard_CheckCurrentTiers_ChangingStatusToRecognized2(AcceptanceTester $I){
//        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1)); //Tier3 current
//        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business1));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
//        
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
//        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
//        
//        $I->canSee("tiername1", \Page\Dashboard::TierName_ByBusName($this->business3));
//        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//    }
//    
//    public function Business3_MarkTier3_AsNotCompleted(AcceptanceTester $I){
//        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
//        $I->click(\Page\ApplicationDetails::TierToggleButton_BusinessInfoTab('3'));
//        $I->wait(3);
////        $I->waitPageLoad();
//        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('1'));
//        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('2'));
//        $I->canSee($this->todayDate, Page\ApplicationDetails::TierStatus_BusinessInfoTab('3'));
//    }
//    
//    public function Help1_18_Dashboard233(AcceptanceTester $I){
//        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
//        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
//        
//        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
//        $I->canSee('2', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
//        
//        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
//        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
//        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
//        
//        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
//    }
//    
//    public function Dashboard_CheckCurrentTiers_ChangingStatusToRecognized23(AcceptanceTester $I){
//        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business1)); //Tier3 current
//        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business1));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business1));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business1));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business1));
//        
//        $I->canSee("Tier 2", \Page\Dashboard::TierName_ByBusName($this->business2));
//        $I->canSee("In progress", \Page\Dashboard::TierStatus_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfAudits_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business2));
//        $I->canSee("Passed", \Page\Dashboard::StatusOfApplication_ByBusName($this->business2));
//        
//        $I->canSee("tiername1", \Page\Dashboard::TierName_ByBusName($this->business3));
//        $I->canSee($this->todayDate, \Page\Dashboard::TierStatus_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfAudits_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfCompliance_ByBusName($this->business3));
//        $I->canSee("In progress", \Page\Dashboard::StatusOfApplication_ByBusName($this->business3));
//    }
}
