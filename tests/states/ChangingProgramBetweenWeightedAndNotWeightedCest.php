<?php


class ChangingProgramBetweenWeightedAndNotWeightedCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $measure1Desc, $idMeasure1, $pointsMeas1 = "1";
    public $measure2Desc, $idMeasure2, $pointsMeas2 = "2";
    public $measure3Desc, $idMeasure3, $pointsMeas3 = "3";
    public $measure4Desc, $idMeasure4, $pointsMeas4 = "4";
    public $measure5Desc, $idMeasure5, $pointsMeas5 = "5";
    public $measure6Desc, $idMeasure6, $pointsMeas6 = "6";
    public $measure7Desc, $idMeasure7, $pointsMeas7 = "7";
    public $measure8Desc, $idMeasure8, $pointsMeas8 = "8";
    public $measure9Desc, $idMeasure9, $pointsMeas9 = "9";
    public $measuresDesc_SuccessCreated = [], $points = '10', $completePoints = '0', $coreCount = '1', $completeCoreMeasures = '0';
    public $city1_NW, $zip1_NW, $program1_NW, $city2_W, $zip2_W, $program2_W, $county;
    public $statuses_Tier1   = ['not set', 'elective', 'not set',  'core',    'not set', 'not set', 'not set',  'elective', 'not set'];
    public $statuses_Tier2_1st   = ['core',    'core',     'core',     'not set', 'not set', 'core',    'not set',  'not set',  'elective'];
    public $statuses_Tier3   = ['not set', 'not set',  'elective', 'not set', 'core',    'not set', 'elective', 'core',     'not set'];
    
    public $statuses_Tier2_2nd   = ['not set',    'core',     'elective',     'elective', 'elective', 'core',    'not set',  'not set',  'elective'];
    
    public $extensions = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default'];
    
    public $statuses_Tier1_Updated   = ['elective', 'not set', 'core',  'core',    'not set', 'not set', 'core',  'elective', 'not set'];
    public $extensions_Tier1_Updated = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default'];
    
    public $id_checklist_Tier1_NW_1st, $id_checklist_Tier2_NW_1st, $id_checklist_Tier3_NW_1st, 
            $id_checklist_Tier1_NW_2nd,$id_checklist_Tier2_NW_2nd, $id_checklist_Tier3_NW_2nd, 
            $id_checklist_Tier1_NW_3rd, $id_checklist_Tier2_NW_3rd, $id_checklist_Tier3_NW_3rd;
    public $id_checklist_Tier1_W_1st, $id_checklist_Tier2_W_1st, $id_checklist_Tier3_W_1st, 
            $id_checklist_Tier1_W_2nd, $id_checklist_Tier2_W_2nd, $id_checklist_Tier3_W_2nd, 
            $id_checklist_Tier1_W_3rd, $id_checklist_Tier2_W_3rd, $id_checklist_Tier3_W_3rd;
    public $email_Bus1_W, $email_Bus1_NW;
    public $email_Bus2_W, $email_Bus2_NW;
    public $email_Bus3_W_NW, $email_Bus3_NW_W;
    public $bus_busSquire  = '14900', $bus_landSquire  = '1200';
    public $business1_W, $business1_NW;
    public $business2_W, $business2_NW;
    public $business3_W_NW, $business3_NW_W;
    public $id_business1_W, $id_business1_NW;
    public $id_business2_W, $id_business2_NW;
    public $id_business3_W_NW, $id_business3_NW_W;
    public $totalEarnedText       = "Total points earned across all tiers";
    public $measuresText          = " required measures";
    public $pointsText            = " points";
    public $measuresCompletedText = " measures completed";
    public $pointsEarnedText      = " points earned";

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
        $name = $this->state = $I->GenerateNameOf("StWeightedProgs");
        $shortName = 'WP';
        $weighted  = 'Input';
        
        $I->CreateState($name, $shortName, $weighted);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
//        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
//        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
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
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
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
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
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
        $points         = $this->pointsMeas1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas2;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas3;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas4;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas5;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas6;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas7;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas8;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas9;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1_NW = $I->GenerateNameOf("CityNotWeighted1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1_NW = $I->GenerateZipCode();
        $program = $this->program1_NW = $I->GenerateNameOf("ProgNotWeighted1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city     = $this->city2_W = $I->GenerateNameOf("CityWeighted2");
        $cityArr  = [$city];
        $state    = $this->state;
        $zips     = $this->zip2_W = $I->GenerateZipCode();
        $program  = $this->program2_W = $I->GenerateNameOf("ProgWeighted2");
        $weighted = 'Input';
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $idProg = $prog['id'];
        $Y->UpdateProgram($idProg, null, null, null, $weighted);
    }
    
    //----------------------------Create Coordinator----------------------------
    
    /**
     * @group coordinator
     */
    
    public function CreateCoordinatorUser_For_Program1_Program2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'off');
//        $I->wait(1);
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
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1_NW);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2_W);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator = $coordinator['id'];
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ActivateAndUpdateTier3_ForProg1(\Step\Acceptance\Tier $I) {
        $program    = $this->program1_NW;
        $tier3      = '3';
        $tier3Name  = "tiername3";
        $tier3Desc  = 'tier desc3';
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(3);
        $I->waitPageLoad();
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3, $tier3Name, $tier3Desc, $tier3OptIn);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SectorChecklistCreate_Tier1(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '1';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
//        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statusesFirst);
        $I->PublishSectorChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
//        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statusesFirst);
        $I->PublishSectorChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SectorChecklistCreate_Tier3(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '3';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
//        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statusesFirst);
        $I->PublishSectorChecklistStatus();
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
    }
    
   
 
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Update_Checklist1_NotWeightedProgram_ForTier1(\Step\Acceptance\Checklist $I) {
        $program = $this->program1_NW;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'Tier 1';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_Tier1_NW_1st = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier1_NW_1st));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier1, $this->extensions);
//        $I->PublishChecklistStatus($this->id_checklist_Tier1_NW_1st);
        
//        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1_NW_1st));
//        $I->wait(1);
//        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
//        $I->wait(3);
//        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
//        $I->wait(1); 
//        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 50);
//        $I->cantSeeElement(Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
//        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
//        $I->canSee('Need to create Draft Version', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
//        $I->canSee('Need to create Draft Version', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername3'));
//        $I->canSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Update_Checklist2_WeightedProgram_ForTier1(\Step\Acceptance\Checklist $I) {
        $program = $this->program2_W;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'Tier 1';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_Tier1_W_1st = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier1_W_1st));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier1, $this->extensions);
//        $I->PublishChecklistStatus($this->id_checklist_Tier1_W_1st);
//        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1_W_1st));
//        $I->wait(1);
//        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
//        $I->wait(3);
//        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
//        $I->wait(1); 
//        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 50);
//        $I->cantSeeElement(Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
//        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
//        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
////        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername1'));
//        $I->canSee('Need to create Draft Version', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
//        $I->canSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Update_Checklist1_NotWeightedProgram_ForTier2(\Step\Acceptance\Checklist $I) {
        $program = $this->program1_NW;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'Tier 2';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_Tier2_NW_1st = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier2_NW_1st));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier2_1st, $this->extensions);
//        $I->PublishChecklistStatus($this->id_checklist_Tier2_NW_1st);
//        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_NW_1st));
//        $I->wait(1);
//        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
//        $I->wait(3);
//        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
//        $I->wait(1); 
//        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 100);
//        $I->canSee("You have 1 draft version.", Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
//        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
//        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
//        $I->canSee('Need to create Draft Version', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername3'));
//        $I->canSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Update_Checklist2_WeightedProgram_ForTier2(\Step\Acceptance\Checklist $I) {
        $program = $this->program2_W;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'Tier 2';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_Tier2_W_1st = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier2_W_1st));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier2_2nd, $this->extensions);
//        $I->PublishChecklistStatus($this->id_checklist_Tier2_W_1st);
//        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_W_1st));
//        $I->wait(1);
//        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
//        $I->wait(3);
//        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
//        $I->wait(1); 
//        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 100);
//        $I->canSee("You have 1 draft version.", Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
//        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
//        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
////        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername1'));
//        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
//        $I->cantSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
//        $I->click(Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
//        $I->wait(3);
//        $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
//        if($popup2 == '1'){
//            $I->click(".confirm");
//            $I->wait(3);
//        }
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Update_Checklist1_NotWeightedProgram_ForTier3(\Step\Acceptance\Checklist $I) {
        $program = $this->program1_NW;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'tiername3';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_Tier3_NW_1st = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier3_NW_1st));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier3, $this->extensions);
//        $I->PublishChecklistStatus($this->id_checklist_Tier3_NW_1st);
//        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3_NW_1st));
//        $I->wait(1);
//        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
//        $I->wait(3);
//        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
//        $I->wait(1); 
//        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 100);
//        $I->canSee("You have 2 drafts version.", Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
//        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
//        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
//        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
//        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername3'));
//        $I->cantSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
//        $I->click(Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
//        $I->wait(3);
//        $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
//        if($popup2 == '1'){
//            $I->click(".confirm");
//            $I->wait(3);
//        }
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Update_Checklist2_WeightedProgram_ForTier3(\Step\Acceptance\Checklist $I) {
        $program = $this->program2_W;
        $sector  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier    = 'Tier 3';
        $descs   = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(3);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_Tier3_W_1st = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier3_W_1st));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier3, $this->extensions);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsAdmin1(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Coordinator3_11_ActivateAndUpdateTier1_ForProg2(\Step\Acceptance\Tier $I) {
        $program    = $this->program2_W;
        $tier1      = '1';
        $tier1Name  = "tiername1";
        $tier1Desc  = 'tier desc1';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(3);
        $I->waitPageLoad();
        $I->ManageTiers($program, $tier1, $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator22(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
//    
//    public function PublishTier1_WeightedProgram(\Step\Acceptance\Checklist $I) {
//        $I->PublishChecklistStatus($this->id_checklist_Tier1_W_1st);
//    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function WeightedProgram_Tier1_AddRequiredPoints(\Step\Acceptance\Checklist $I) {
        $points_Default      = '8';
        $points_LL           = '9';
        $points_LB           = '10';
        $points_LL_LB        = '11';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1_W_1st));
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function WeightedProgram_Tier2_AddRequiredPoints(\Step\Acceptance\Checklist $I) {
        $points_Default      = '11';
        $points_LL           = '12';
        $points_LB           = '13';
        $points_LL_LB        = '14';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2_W_1st));
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function WeightedProgram_Tier3_AddRequiredPoints(\Step\Acceptance\Checklist $I) {
        $points_Default      = '14';
        $points_LL           = '15';
        $points_LB           = '16';
        $points_LL_LB        = '17';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3_W_1st));
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NotWeightedProgram_Tier1_AddDefineTotalsValuesForChecklist(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_DefineTotalTab($this->id_checklist_Tier1_NW_1st));
        $I->UpdateDefineTotalValue('def', \Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, '1');
        $I->UpdateDefineTotalValue('lb', \Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, '1');
        $I->UpdateDefineTotalValue('lb', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, '1');
        $I->UpdateDefineTotalValue('ll', \Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, '1');
        $I->UpdateDefineTotalValue('all', \Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, '1');
        $I->UpdateDefineTotalValue('all', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, '1');
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NotWeightedProgram_Tier2_AddDefineTotalsValuesForChecklist(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier2_NW_1st));
        $I->UpdateDefineTotalValue('def', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, '1');
        $I->UpdateDefineTotalValue('ll', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, '1');
        $I->UpdateDefineTotalValue('all', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, '1');
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business1 NW registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Registration_NotWeightedProgram(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus1_NW = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1_NW = $I->GenerateNameOf("bus1_NW");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1_NW;
        $city             = $this->city1_NW;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus_busSquire;
        $landscapeFootage = $this->bus_landSquire;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_NW_CompleteMeasure6(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $value1   = '88';
                
        $I->comment("Complete Measure6 for business: $this->business1_NW");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 4 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("1 of 5 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_NW_CheckOnReviewPage_AfterComplitingMeasures_Tier2(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2_NW_1st));
        $I->canSee("1 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("1 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_NW_CheckOnReviewPage_AfterComplitingMeasures_Tier3(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3_NW_1st));
        $I->canSee("1 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
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
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business1 W registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Registration_WeightedProgram(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus1_W = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1_W = $I->GenerateNameOf("bus1_W");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2_W;
        $city             = $this->city2_W;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus_busSquire;
        $landscapeFootage = $this->bus_landSquire;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_W_CheckPoints(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSee("4 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("2 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSee("8 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("6 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("2 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("5 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("4 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("3 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("9 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_W_CompleteMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $value1   = '66';
                
        $I->comment("Complete Measure4 for business: $this->business1_W");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("4 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 4", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("4", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_W_CompleteMeasure6(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $value1   = '66';
                
        $I->comment("Complete Measure6 for business: $this->business1_W");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("4 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("6 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 10", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("10", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_W_CompleteMeasure8(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        $value1   = '111';
                
        $I->comment("Complete Measure8 for business: $this->business1_W");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
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
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("12 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("18 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 18", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("18", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_W_CheckOnReviewPage_Tier1_Completed(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1_W_1st));
        $I->canSee("tiername1 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("12 tiername1 points earned. A minimum of 9 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("12 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("18 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("4", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("8", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("18", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_W_CheckOnReviewPage_Tier2_Completed(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2_W_1st));
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("18 Tier 2 points earned. A minimum of 12 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("12 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("18 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("6", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("18", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group coordinator
     */
    
    public function Help_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin2(AcceptanceTester $I)
    {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeToWeighted_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $program = $this->program1_NW;
        $weighted = 'Input';
        
        $prog = $Y->GetProgramOnPageInList($program);
        $idProg = $prog['id'];
        $Y->UpdateProgram($idProg, null, null, null, $weighted);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeToNotWeighted_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $program  = $this->program2_W;
        $weighted = 'No';
        
        $prog = $Y->GetProgramOnPageInList($program);
        $idProg = $prog['id'];
        $Y->UpdateProgram($idProg, null, null, null, $weighted);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut4(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business1 NW registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_NW_Registration_NotWeightedProgram(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus2_NW = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2_NW = $I->GenerateNameOf("bus2_NW");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1_NW;
        $city             = $this->city1_NW;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus_busSquire;
        $landscapeFootage = $this->bus_landSquire;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_NW_CheckOnReviewPage_NotComplitedMeasures_Tier2(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2_NW_1st));
        $I->canSee("0 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_NW_CheckOnReviewPage_NotComplitedMeasures_Tier3(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3_NW_1st));
        $I->canSee("0 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
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
    
    public function Help_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business2 W registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Registration_WeightedProgram(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus2_W = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2_W = $I->GenerateNameOf("bus2_W");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2_W;
        $city             = $this->city2_W;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus_busSquire;
        $landscapeFootage = $this->bus_landSquire;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_W_CheckPoints(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSee("4 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("2 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSee("8 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("6 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("2 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("5 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("4 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("3 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("9 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_W_CheckOnReviewPage_Tier1_NotCompleted(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1_W_1st));
        $I->canSee("tiername1 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 tiername1 points earned. A minimum of 9 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_W_CheckOnReviewPage_Tier2_NotCompleted(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2_W_1st));
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 Tier 2 points earned. A minimum of 12 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group coordinator
     */
    
    public function Help_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin3(AcceptanceTester $I)
    {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOldChecklistsArePublished(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_1st));
        $I->click(\Page\ChecklistList::$FilterByOptInSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_W_1st));
    }
    
    //-------------------------------------------Program1 W->NW-----------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CloneTier2ChecklistVersion_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_NW_1st));
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->click(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(3);
        $this->id_checklist_Tier2_NW_2nd = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier2_NW_2nd));
//        $I->wait(2);
        $I->click(Page\ChecklistManage::$Filter_ByStatusSelect);
        $I->wait(1);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_Tier2_1st, $this->extensions);
        $I->canSee("Points", \Page\ChecklistManage::$PointsTab);
        $I->cantSee("define total measures needed", \Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->CheckSavedChecklistPoints('0', '0', '0', '0');
        //old checklist version
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier2_NW_1st));
        $I->click(Page\ChecklistManage::$Filter_ByStatusSelect);
        $I->wait(1);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_Tier2_1st, $this->extensions);
        $I->cantSee("Points", \Page\ChecklistManage::$PointsTab);
        $I->canSee("define total measures needed", \Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(3);
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedDefineTotalValue('def', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, null, null, $requiredElective = '1');
        $I->CheckSavedDefineTotalValue('ll', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, null, null, $requiredElective = '1');
        $I->CheckSavedDefineTotalValue('lb', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, null, null, $requiredElective = '0');
        $I->CheckSavedDefineTotalValue('all', \Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, null, null, $requiredElective = '1');
        
////        $I->waitForElement(".tabs a[href*='def'].active", 150);
////        $I->wait(1);
//        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
//        $I->wait(1);
//        $I->waitPageLoad();
////        $I->waitForElement("//p[text()='Solid Waste']", 60);
//        $I->canSeeInField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
//        
//        $I->comment("-----                      -----                       -----");
//        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
//        $I->wait(1);
//        $I->waitPageLoad();
////        $I->waitForElement(".tabs a[href*='ll'].active", 150);
////        $I->wait(1);
//        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
//        $I->wait(1);
//        $I->waitPageLoad();
////        $I->waitForElement("//p[text()='Solid Waste']", 60);
//        $I->canSeeInField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
//        
//        $I->comment("-----                      -----                       -----");
//        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
//        $I->wait(1);
//        $I->waitPageLoad();
////        $I->waitForElement(".tabs a[href*='all'].active", 150);
////        $I->wait(1);
//        $I->click(Page\ChecklistManage::$FilterMenu_SolidWasteGroupButton);
//        $I->wait(1);
//        $I->waitPageLoad();
////        $I->waitForElement("//p[text()='Solid Waste']", 60);
//        $I->canSeeInField(\Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_SolidWaste), '1');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_NewChecklist_Tier2_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_NW_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
        $I->wait(1); 
        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 50);
        $I->canSee("You have 1 draft version.", Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
        $I->canSee('Need to create Draft Version', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername3'));
        $I->canSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
        $I->cantSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAnywayButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier2_VersionTab_AfterTryingToPublishNewWeightedChecklist_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_NW_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOldChecklistsArePublished_AfterTryingToPublishNewWeightedChecklist(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_1st));
        $I->click(\Page\ChecklistList::$FilterByOptInSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_NW_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_W_1st));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Create_Checklist2_Tier1_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1_NW;
        $programDestination = $this->program1_NW;
        $sectorDestination  = 'Office / Retail';
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist_Tier1_NW_2nd = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier1_Updated, $this->extensions);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Create_Checklist2_Tier3_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1_NW;
        $programDestination = $this->program1_NW;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist_Tier3_NW_2nd = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier3, $this->extensions);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_NewChecklist_Tier3_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3_NW_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
        $I->wait(1); 
        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 100);
        $I->canSee("You have 2 drafts version.", Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername3'));
        $I->cantSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
        $I->click(\Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
        $I->wait(3);
        $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
        if($popup2 == '1'){
            $I->click(".confirm");
            $I->wait(3);
        }
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier1_VersionTab_AfterPublishingNewWeightedChecklist_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1_NW_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier2_VersionTab_AfterPublishingNewWeightedChecklist_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_NW_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Archived", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier3_VersionTab_AfterPublishingNewWeightedChecklist_Prog1NW_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3_NW_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Archived", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('2'));
    }
    
    //-------------------------------------------Program2 NW->W-----------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CloneTier2ChecklistVersion_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_W_1st));
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->click(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(3);
        $this->id_checklist_Tier2_W_2nd = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier2_W_2nd));
        $I->click(Page\ChecklistManage::$Filter_ByStatusSelect);
        $I->wait(1);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_Tier2_2nd, $this->extensions);
        $I->cantSee("Points", \Page\ChecklistManage::$PointsTab);
        $I->canSee("define total measures needed", \Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        
        //old checklist version
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier2_W_1st));
        $I->CheckSavedChecklistPoints('11', '13', '12', '14');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_NewChecklist_Tier2_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_W_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
        $I->wait(1); 
        $I->waitForElement(Page\ChecklistManage::$PublishAllPopup, 100);
        $I->canSee("You have 1 draft version.", Page\ChecklistManage::$PublishAllPopup_DraftVersionCountInfo);
        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername1'));
        $I->canSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('Tier 2'));
        $I->cantSeeElement(Page\ChecklistManage::PublishAllPopup_TierNameLine('tiername3'));
        $I->canSee('Need to create Draft Version', Page\ChecklistManage::PublishAllPopup_StatusLine('tiername1'));
        $I->canSee('Draft', Page\ChecklistManage::PublishAllPopup_StatusLine('Tier 2'));
        $I->canSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAllDraftButton);
        $I->cantSeeElementIsDisabled($I, Page\ChecklistManage::$PublishAllPopup_PublishAnywayButton);
        $I->click(Page\ChecklistManage::$PublishAllPopup_PublishAnywayButton);
        $I->wait(5);
        $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
        if($popup2 == '1'){
            $I->click(".confirm");
            $I->wait(3);
        }
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOldChecklists_AfterTier2Publish_PublishAnyway_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_2nd));
        $I->click(\Page\ChecklistList::$FilterByOptInSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->click(\Page\ChecklistList::$FilterByStatusSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistList::$FilterByStatusSelect, '');
        $I->wait(1);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_2nd));
        $I->canSee("Draft", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_NW_1st));
        $I->canSee("Archived", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_1st));
        $I->canSee("Archived", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_1st));
        
        $I->canSee("Draft", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_1st));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_2nd));
        $I->canSee("Archived", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_1st));
        $I->canSee("Draft", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_W_1st));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier1_VersionTab_AfterPublishingTier2_NewNotWeightedChecklist_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1_W_1st));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier2_VersionTab_AfterPublishingTier2_NewNotWeightedChecklist_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_W_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Archived", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier3_VersionTab_AfterPublishingTier2_NewNotWeightedChecklist_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3_W_1st));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Create_NewChecklist_Tier1_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1_W_1st));
        $I->click(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $this->id_checklist_Tier1_W_2nd = $I->grabTextFrom(Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1_W_2nd));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(2);
        $I->waitPageLoad();
        $I->ManageChecklist($descs, $this->statuses_Tier1, $this->extensions);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_NewChecklist_Tier1_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1_W_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->wait(3);
        $I->click(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
        $I->wait(1); 
        $I->wait(3);
        $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
        if($popup2 == '1'){
            $I->click(".confirm");
            $I->wait(3);
        }
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
        
        //old checklist version
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist_Tier1_W_1st));
        $I->CheckSavedChecklistPoints('8', '10', '9', '11');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOldChecklistsAreDraft_NewArePublished(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_2nd));
        $I->click(\Page\ChecklistList::$FilterByOptInSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->click(\Page\ChecklistList::$FilterByStatusSelect);
        $I->wait(2);
        $I->selectOption(\Page\ChecklistList::$FilterByStatusSelect, '');
        $I->wait(1);
        $I->click(Page\ChecklistList::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_2nd));
        $I->canSee("Draft", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_NW_1st));
        $I->canSee("Archived", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_NW_1st));
        $I->canSee("Archived", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_NW_1st));
        
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_2nd));
        $I->canSee("Published", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_2nd));
        $I->canSee("Draft", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier1_W_1st));
        $I->canSee("Archived", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier2_W_1st));
        $I->canSee("Draft", \Page\ChecklistList::VersionStatusByIdLine($this->id_checklist_Tier3_W_1st));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier1_VersionTab_AfterPublishingAll_NewNotWeightedChecklist_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1_W_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
         
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier2_VersionTab_AfterPublishingAll_NewNotWeightedChecklist_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2_W_2nd));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Published", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee("Archived", \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->canSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Check_Tier3_VersionTab_AfterPublishingAll_NewNotWeightedChecklist_Prog2W_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3_W_1st));
        $I->waitForElement(\Page\ChecklistManage::$VersionHistoryTab, 60);
        $I->canSee("Draft", \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function AddingPointsToTier2_Prog1_NW_W(\Step\Acceptance\Checklist $I) {
        $points_Default     = '6';
        $points_LB          = '7';
        $points_LL          = '6';
        $points_LL_LB       = '7';
                
        $I->amOnPage(Page\ChecklistManage::URL_PointsTab($this->id_checklist_Tier2_NW_2nd));
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function AddingPointsToTier3_Prog1_NW_W(\Step\Acceptance\Checklist $I) {
        $points_Default     = '8';
        $points_LB          = '9';
        $points_LL          = '8';
        $points_LL_LB       = '9';
                
        $I->amOnPage(Page\ChecklistManage::URL_PointsTab($this->id_checklist_Tier3_NW_2nd));
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut8(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business3 W->NW registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Registration_Program2_W_NW(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus3_W_NW = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3_W_NW = $I->GenerateNameOf("bus3_W_NW");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2_W;
        $city             = $this->city2_W;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus_busSquire;
        $landscapeFootage = $this->bus_landSquire;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_W_NW_CheckThatPointsValuesAreAbsent(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier1_W_2nd");
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure8Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2_W_2nd");
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
        
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure6Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier2_W_2nd");
        $I->canSeeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure9Desc));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_W_NW_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '88';
                
        $I->comment("Complete Measure2 for business: $this->business3_W_NW");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
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
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_W_NW_CompleteMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $value1   = '88';
                
        $I->comment("Complete Measure4 for business: $this->business3_W_NW");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$ElectiveCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("Complete at least 0 of the 1 Measures", \Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_W_NW_CheckOnReviewPage_AfterComplitingMeasures_Tier1(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1_W_2nd));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_W_NW_CheckOnReviewPage_AfterComplitingMeasures_Tier2(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2_W_2nd));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("1 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut9(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business3 NW->W registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_NW_W_Registration_Program1_NW_W(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus3_NW_W = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3_NW_W = $I->GenerateNameOf("bus3_NW_W");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1_NW;
        $city             = $this->city1_NW;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus_busSquire;
        $landscapeFootage = $this->bus_landSquire;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitPageLoad();
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_NW_W_CheckPoints(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSee("1 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("2 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("3 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("6 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure6Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSee("9 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure9Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3_NW_2nd");
        $I->canSee("3 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("5 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3_NW_2nd");
        $I->canSee("7 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("8 points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_NW_W_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '66';
                
        $I->comment("Complete Measure3 for business: $this->business3_NW_W");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 4 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("3 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 3", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("3", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_NW_W_CompleteMeasure5(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $value1   = '12';
                
        $I->comment("Complete Measure5 for business: $this->business3_NW_W");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3_NW_2nd");
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
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("3 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("5 points", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 8", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("8", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_NW_W_CheckOnReviewPage_Tier2_Completed(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2_NW_2nd));
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 Tier 2 points earned. A minimum of 6 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 50%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("5 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("8", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_NW_W_CheckOnReviewPage_Tier3_Completed(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3_NW_2nd));
        $I->canSee("tiername3 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("5 tiername3 points earned. A minimum of 8 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 63%;']);
        //Tier1
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("5 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("5", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
        //Total
        $I->canSee("8", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group coordinator
     */
    
    public function Help_LogOut10(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin4(AcceptanceTester $I)
    {
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetID_Business1_NW(AcceptanceTester $I) {
        $I->amOnPage(\Page\Dashboard::URL());
        $url = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1_NW), 'href');
        $I->comment("Url2: $url");
        $u = explode('=', $url);
        $this->id_business1_NW = $u[1];
        $I->comment("Business1_NW (old) id: $this->id_business1_NW.");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetID_Business1_W(AcceptanceTester $I) {
        $url = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1_W), 'href');
        $I->comment("Url3: $url");
        $u = explode('=', $url);
        $this->id_business1_W = $u[1];
        $I->comment("Business1_W (old) id: $this->id_business1_W.");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetID_Business2_NW(AcceptanceTester $I) {
        $I->amOnPage(\Page\Dashboard::URL());
        $url = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2_NW), 'href');
        $I->comment("Url2: $url");
        $u = explode('=', $url);
        $this->id_business2_NW = $u[1];
        $I->comment("Business2_NW (old) id: $this->id_business2_NW.");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetID_Business2_W(AcceptanceTester $I) {
        $url = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2_W), 'href');
        $I->comment("Url3: $url");
        $u = explode('=', $url);
        $this->id_business2_W = $u[1];
        $I->comment("Business2_W (old) id: $this->id_business2_W.");
    }
    
    
    
    
    
    //----------------------------Check Old Businesses--------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_NW_CheckThatPointsAreAbsent(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure1Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3_NW_1st");
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3_NW_1st");
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure7Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
    }
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_NW_CompletingMeasure6(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $value1   = '88';
                
        $I->comment("Complete Measure6 for business: $this->business1_NW");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeInField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->canSee("1 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 20%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 4 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        $I->canSee("1 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("0 of 2 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("2"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_NW_CheckOnReviewPage_AfterComplitingMeasures_Tier2(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_AdminLogin($this->id_business1_NW));
        $I->canSee("1 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("1 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_NW_CheckOnReviewPage_AfterComplitingMeasures_Tier3(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_Tier_AdminLogin($this->id_business1_NW, $this->id_checklist_Tier3_NW_1st));
        $I->canSee("1 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
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
    
    public function Business1_NW_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '66';
                
        $I->comment("Complete Measure3 for business: $this->business1_NW");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("2 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 40%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 40%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("2 of 4 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("2 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        //Tier3 in left menu
        $I->canSee("0 of 2 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("2"));;
        //Total 
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_NW_CompleteMeasure5(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $value1   = '12';
                
        $I->comment("Complete Measure5 for business: $this->business1_NW");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3_NW_1st");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("1 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("2 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        //Tier3 in left menu
        $I->canSee("1 of 2 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("2"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_NW_CompleteMeasure9(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
        $value1   = '12';
                
        $I->comment("Complete Measure9 for business: $this->business1_NW");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("3 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 60%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$ElectiveCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 60%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("3 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        //Tier3 in left menu
        $I->canSee("1 of 2 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("2"));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_NW_CompleteMeasure2_NA(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '12';
                
        $I->comment("Complete Measure9 for business: $this->business1_NW");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSee("4 Tier 2 measures completed. A minimum of 5 Tier 2 measures are required.", \Page\BusinessChecklistView::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 80%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 80%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("3 of 4 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("4 of 5 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        //Tier3 in left menu
        $I->canSee("1 of 2 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("2"));
    }
    
    //---------------------------------------------------------Renew checklist for Business1_NW----------------------------------------------------------
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRequiresRenewal_Business1_NW(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1_NW));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(5);
        $I->waitForElement(".modal.in", 120);
        $I->wait(1);
        $I->click(".modal.in .close");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
        $I->canSee("Tier 2", \Page\BusinessChecklistView::LeftMenu_TierName('1'));
        $I->canSee("3 of 4 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("Tier 2", \Page\ApplicationDetails::TierName_BusinessInfoTab(1));
        $I->canSee(\Page\ApplicationDetails::InProcessStatus, \Page\ApplicationDetails::TierStatus_BusinessInfoTab(1));
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ApplicationStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$PhoneConsultStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$ComplianceCheckStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$SiteVisitStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$AuditsStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$RecognitionTasksStatusSelect_BusinessInfoTab, \Page\ApplicationDetails::PendingStatus_TierTab);
        $I->canSee(Page\AuditGroupList::Energy_AuditGroup, \Page\ApplicationDetails::Category_BusinessInfoTab('1'));
        $I->canSeeElement(\Page\ApplicationDetails::CategoryStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Yellow_ProgressStatus);
        $I->canSeeElement(\Page\ApplicationDetails::CategoryAuditStatus_BusinessInfoTab('1').\Page\ApplicationDetails::Grey_ProgressStatus);
        $I->canSee(Page\AuditGroupList::SolidWaste_AuditGroup, \Page\ApplicationDetails::Category_BusinessInfoTab('2'));
        $I->canSeeElement(\Page\ApplicationDetails::CategoryStatus_BusinessInfoTab('2').\Page\ApplicationDetails::Green_ProgressStatus);
        $I->canSeeElement(\Page\ApplicationDetails::CategoryAuditStatus_BusinessInfoTab('2').\Page\ApplicationDetails::Grey_ProgressStatus);
        $I->canSeeInField(\Page\ApplicationDetails::$GeneralProgramNotesField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NewApplication_Business1_NW_CheckPoints(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy));
        $I->canSee("6 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("3 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("2 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("1 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure1Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_SolidWaste));
        $I->canSee("9 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3_NW_2nd");
        $I->canSee("5 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("3 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_NW, $this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3_NW_2nd");
        $I->canSee("8 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("7 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure7Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NewApplication_Business1_NW_CheckOnReviewPage_Tier2(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_AdminLogin($this->id_business1_NW));
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("3 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("18 Tier 2 points earned. A minimum of 6 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("3 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("18 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("5 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("3 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("9", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("9", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("23", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NewApplication_Business1_NW_CheckOnReviewPage_Tier3(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_Tier_AdminLogin($this->id_business1_NW, $this->id_checklist_Tier3_NW_2nd));
        $I->canSee("tiername3 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("5 tiername3 points earned. A minimum of 8 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 63%;']);
        //Tier1
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("3 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("18 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("5 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("5", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
        //Total
        $I->canSee("23", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business1 W check-----------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_W_CheckPoints(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_W, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier1_W_1st");
        $I->canSee("4 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("2 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_W, $this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier1_W_1st");
        $I->canSee("8 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_W, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("6 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("2 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("5 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("4 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("3 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_W, $this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("9 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_W_CompletingMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $value1   = '66';
                
        $I->comment("Complete Measure4 for business: $this->business1_W");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_W, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier1_W_1st");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeInField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("You have completed all measures.", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("12 points", \Page\BusinessChecklistView::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("1 of 2 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("18 points", \Page\BusinessChecklistView::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 18", \Page\BusinessChecklistView::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("18", Page\BusinessChecklistView::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_W_CompletingMeasure6(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $value1   = '66';
         
        $I->comment("Complete Measure6 for business: $this->business1_W");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_W, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->canSeeInField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\BusinessChecklistView::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetails_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("1 of 2 required measures completed", \Page\BusinessChecklistView::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("12 points", \Page\BusinessChecklistView::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("1 of 2 measures completed", \Page\BusinessChecklistView::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("18 points", \Page\BusinessChecklistView::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 18", \Page\BusinessChecklistView::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("18", Page\BusinessChecklistView::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_W_CheckOnReviewPage_Tier1_Completed(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_Tier_AdminLogin($this->id_business1_W, $this->id_checklist_Tier1_W_1st));
        $I->canSee("tiername1 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("12 tiername1 points earned. A minimum of 9 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("12 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("18 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("4", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("8", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("18", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business1_W_CheckOnReviewPage_Tier2_Completed(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_Tier_AdminLogin($this->id_business1_W, $this->id_checklist_Tier2_W_1st));
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("18 Tier 2 points earned. A minimum of 12 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("12 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("18 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("6", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("18", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business2_NW_CheckThatPointsAreAbsent(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_NW, $this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure6Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure1Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_NW, $this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure9Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_NW, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3_NW_1st");
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_NW, $this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3_NW_1st");
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(\Page\BusinessChecklistView::MeasureDescription_ByDesc($this->measure8Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure7Desc));
        $I->cantSeeElement(\Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business2_NW_CheckOnReviewPage_NotComplitedMeasures_Tier2(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_AdminLogin($this->id_business2_NW));
        $I->canSee("0 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusLine_ByName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business2_NW_CheckOnReviewPage_NotComplitedMeasures_Tier3(AcceptanceTester $I) {
        $I->comment("After Compliting Measures - Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_Tier_AdminLogin($this->id_business2_NW, $this->id_checklist_Tier3_NW_1st));
        $I->canSee("0 of 5 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_ElectiveLine_ByName($this->audSubgroup1_Energy));
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
    
    public function CheckOld_Business2_W_CheckPoints(Step\Acceptance\Business $I)
    {
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_W, $this->id_audSubgroup1_Energy));
        $I->canSee("4 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("2 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_W, $this->id_audSubgroup1_SolidWaste));
        $I->canSee("8 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_W, $this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("6 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("2 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("5 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("4 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSee("3 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_W, $this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier2_W_1st");
        $I->canSee("9 points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business2_W_CheckOnReviewPage_Tier1_NotCompleted(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_AdminLogin($this->id_business2_W));
        $I->canSee("tiername1 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 tiername1 points earned. A minimum of 9 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOld_Business2_W_CheckOnReviewPage_Tier2_NotCompleted(AcceptanceTester $I) {
        $I->comment("Check on Review Page");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_Tier_AdminLogin($this->id_business2_W, $this->id_checklist_Tier2_W_1st));
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 Tier 2 points earned. A minimum of 12 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Total points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
}
