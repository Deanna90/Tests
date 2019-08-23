<?php


class TierLandingsCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $emailStateAdmin, $emailCoordinator, $emailInspector, $emailAuditor, $fullName_Inspector, $fullName_Auditor;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measure3Desc, $idMeasure3;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3, $county;
    public $id_program1, $id_program2, $id_program3;
    public $statuses_T2_prog1             = ['core',     'elective', 'elective'];
    public $statuses_T1_prog2             = ['not set',  'core',     'core'];
    public $statuses_T2_prog2             = ['elective', 'core',     'not set'];
    public $statuses_T3_prog2             = ['not set',  'elective', 'not set'];
    public $statuses_T2_prog3             = ['core',     'elective', 'core'];
    public $statuses_T3_prog3             = ['elective', 'core',     'not set'];
    public $checklistUrl_1_T2, $id_checklist_1_T2;
    public $checklistUrl_2_T1, $id_checklist_2_T1, $checklistUrl_2_T2, $id_checklist_2_T2, $checklistUrl_2_T3, $id_checklist_2_T3;
    public $checklistUrl_3_T2, $id_checklist_3_T2, $checklistUrl_3_T3, $id_checklist_3_T3;
    public $tier1Name_Prog2, $tier3Name_Prog2, $tier3Name_Prog3, $tier1Name_Def = 'Tier 1', $tier2Name_Def = 'Tier 2', $tier3Name_Def = 'Tier 3';
    public $business1, $business2, $business3, $email_Bus1, $email_Bus2, $email_Bus3, $id_business1, $id_business2, $id_business3;
    public $P1_2_LandTitle1, $P1_2_LandTitle2, $P1_2_LandTitle3;
    public $P2_1_LandTitle1, $P2_1_LandTitle2, $P2_1_LandTitle3;
    public $P2_2_LandTitle1, $P2_2_LandTitle2, $P2_2_LandTitle3, $P2_2_LandTitle4;
    public $P2_3_LandTitle1, $P2_3_LandTitle2, $P2_3_LandTitle3;
    public $P3_2_LandTitle1, $P3_2_LandTitle2, $P3_2_LandTitle3;
    public $P3_3_LandTitle1, $P3_3_LandTitle2, $P3_3_LandTitle3;
    public $state_2_LandTitle1, $state_2_LandTitle2, $state_2_LandTitle3;
    public $benefits_P1_T2 = ['Test1', 'Test2', 'Test3', 'Test4'];
    public $benefits_P2_T1 = ['Ben1', 'Ben2', 'Ben3', 'Ben4', 'Ben5', 'Ben6', 'Ben7', 'Ben8', 'Ben9', 'Ben10', 'Ben11', 'Ben12'];
    public $benefits_P2_T2 = ['prom1', 'prom2', 'prom3', 'prom&gg4', 'fgtr<3 fd', 'ret>tt', 'rtg"tt'];
    public $benefits_P2_T3 = ['prom255 testt prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom255', 'q', 'prom128 testt prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom111 test prom128 te'];
    public $benefits_P3_T3 = ['Tier3_prom1', 'Tier3_prom2'];

    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StTierLand");
        $shortName = 'TL';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
    }
    
    //--------------------------Create audit subgroups--------------------------
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure2_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure3_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city and program-------------------------
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("City1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("Prog1");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program1 = $prog['id'];
    }
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("City2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("Prog2");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program2 = $prog['id'];
    }
    
    public function Help_CreateCity3_And_Program3(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city3 = $I->GenerateNameOf("City3");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip3 = $I->GenerateZipCode();
        $program = $this->program3 = $I->GenerateNameOf("Prog3");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program3 = $prog['id'];
    }
    
    //-------------------------Activate Tier 1 for Program2---------------------
    public function Program2_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier1      = '1';
        $tier1Name  = $this->tier1Name_Prog2 = "tiername1";
        $tier1Desc  = 'tier11 desc dd11';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(4);
        $I->ManageTiers($program, $tier1, $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    //-------------------------Activate Tier 3 for Program2---------------------
    public function Program2_ActivateAndUpdateTier3(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier3      = '1';
        $tier3Name  = $this->tier3Name_Prog2 = "tiername3";
        $tier3Desc  = 'tier33 desc dd33';
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(4);
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3, $tier3Name, $tier3Desc, $tier3OptIn);
    }
    
    //-------------------------Activate Tier 3 for Program3---------------------
    public function Program3_ActivateAndUpdateTier3(\Step\Acceptance\Tier $I) {
        $program    = $this->program3;
        $tier3      = '1';
        $tier3Name  = $this->tier3Name_Prog3 = "tier3tier3tier3";
        $tier3Desc  = 'desc prog3 tier333';
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(4);
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3, $tier3Name, $tier3Desc, $tier3OptIn);
    }
    
    //----------------------Adding Benefits Tier 2 for Program1-----------------
    public function Program1_AddingBenefitsToTier2(\Step\Acceptance\Tier $I) {
        $program       = $this->program1;
        $tierNumber    = '2';
        $benefitsArray = $this->benefits_P1_T2;
        
        $I->AddBenefitToTier($program, $tierNumber, $benefitsArray);
    }
    
    //----------------------Adding Benefits Tier 1 for Program2-----------------
    public function Program2_AddingBenefitsToTier1(\Step\Acceptance\Tier $I) {
        $program       = $this->program2;
        $tierNumber    = '1';
        $benefitsArray = $this->benefits_P2_T1;
        
        $I->AddBenefitToTier($program, $tierNumber, $benefitsArray);
    }
    
    //----------------------Adding Benefits Tier 2 for Program2-----------------
    public function Program2_AddingBenefitsToTier2(\Step\Acceptance\Tier $I) {
        $program       = $this->program2;
        $tierNumber    = '2';
        $benefitsArray = $this->benefits_P2_T2;
        
        $I->AddBenefitToTier($program, $tierNumber, $benefitsArray);
    }
    
    //----------------------Adding Benefits Tier 3 for Program2-----------------
    public function Program2_AddingBenefitsToTier3(\Step\Acceptance\Tier $I) {
        $program       = $this->program2;
        $tierNumber    = '3';
        $benefitsArray = $this->benefits_P2_T3;
        
        $I->AddBenefitToTier($program, $tierNumber, $benefitsArray);
    }
    
    //----------------------Adding Benefits Tier 3 for Program3-----------------
    public function Program3_AddingBenefitsToTier3(\Step\Acceptance\Tier $I) {
        $program       = $this->program3;
        $tierNumber    = '3';
        $benefitsArray = $this->benefits_P3_T3;
        
        $I->AddBenefitToTier($program, $tierNumber, $benefitsArray);
    }
    
    public function SectorChecklistCreate_Tier1(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '1';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->PublishSectorChecklistStatus();
    }
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->PublishSectorChecklistStatus();
    }
    
    public function SectorChecklistCreate_Tier3(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '3';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->PublishSectorChecklistStatus();
    }
    
    public function UpdateProgramChecklist_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        $program = $this->program1;
        $sector  = 'Office / Retail';
        $tier    = $this->tier2Name_Def;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_1_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_T2_prog1);
    }
    
    public function UpdateProgramChecklist_Tier1_Program2(\Step\Acceptance\Checklist $I) {
        $program = $this->program2;
        $sector  = 'Office / Retail';
        $tier    = $this->tier1Name_Prog2;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_2_T1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_2_T1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_T1_prog2);
    }
    
    public function UpdateProgramChecklist_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $program = $this->program2;
        $sector  = 'Office / Retail';
        $tier    = $this->tier2Name_Def;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_2_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_T2_prog2);
    }
    
    public function UpdateProgramChecklist_Tier3_Program2(\Step\Acceptance\Checklist $I) {
        $program = $this->program2;
        $sector  = 'Office / Retail';
        $tier    = $this->tier3Name_Prog2;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_2_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_2_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_T3_prog2);
    }
    
    public function UpdateProgramChecklist_Tier2_Program3(\Step\Acceptance\Checklist $I) {
        $program = $this->program3;
        $sector  = 'Office / Retail';
        $tier    = $this->tier2Name_Def;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_3_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_3_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_T2_prog3);
    }
    
    public function UpdateProgramChecklist_Tier3_Program3(\Step\Acceptance\Checklist $I) {
        $program = $this->program3;
        $sector  = 'Office / Retail';
        $tier    = $this->tier3Name_Prog3;
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->selectOption(Page\ChecklistList::$FilterByOptInSelect, '');
        $I->wait(1);
        $I->waitPageLoad();
        $this->id_checklist_3_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_3_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_T3_prog3);
    }
    
    //-----------------------------Create Landings for -------------------------
    
    public function CreateTierLanding_Program1_Tier2_1(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program1;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P1_2_LandTitle1 = $I->GenerateNameOf("Title Prog1_T2_1 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program1 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
    }
    
    public function CreateTierLanding_Program1_Tier2_2(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program1;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P1_2_LandTitle2 = $I->GenerateNameOf("Title Prog1_T2_2 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program1 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier2 Program1 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P1_2_LandTitle1));
    }
    
    public function CreateTierLanding_Program1_Tier2_3(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program1;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P1_2_LandTitle3 = $I->GenerateNameOf("Title Prog1_T2_3 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program1 Item3-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier2 Program1 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P1_2_LandTitle1));
        $I->comment("--------------------Tier2 Program1 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P1_2_LandTitle2));
    }
    
    //----------------------Create Landings for State Level---------------------
    
    public function CreateTierLanding_StateLevel_Tier2_1(\Step\Acceptance\TierLanding $I) {
        $program     = 'State Level';
        $tierName    = $this->tier2Name_Def;
        $title       = $this->state_2_LandTitle1 = $I->GenerateNameOf("Title StateLevel_T2_1 ");
        $description = $I->GenerateNameOf("Dfescrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("------------------Tier2 State Level Item1------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
    }
    
    public function CreateTierLanding_StateLevel_Tier2_2(\Step\Acceptance\TierLanding $I) {
        $program     = 'State Level';
        $tierName    = $this->tier2Name_Def;
        $title       = $this->state_2_LandTitle2 = $I->GenerateNameOf("Title StateLevel_T2_2 ");
        $description = $I->GenerateNameOf("Dfescrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("------------------Tier2 State Level Item2------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->comment("------------------Tier2 State Level Item1------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
    }
    
    public function CreateTierLanding_StateLevel_Tier2_3(\Step\Acceptance\TierLanding $I) {
        $program     = 'State Level';
        $tierName    = $this->tier2Name_Def;
        $title       = $this->state_2_LandTitle3 = $I->GenerateNameOf("Title StateLevel_T2_3 ");
        $description = $I->GenerateNameOf("Dfescrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("------------------Tier2 State Level Item3------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->comment("------------------Tier2 State Level Item1------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("------------------Tier2 State Level Item2------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    //-----------------------------Create Landings for -------------------------
    
    public function CreateTierLanding_Program2_Tier1_1(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier1Name_Prog2;
        $title       = $this->P2_1_LandTitle1 = $I->GenerateNameOf("Title Prog2_T1_1 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier1 Program2 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("---------------Absent Tier2 State Level Item1--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item2--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program2_Tier1_2(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier1Name_Prog2;
        $title       = $this->P2_1_LandTitle2 = $I->GenerateNameOf("Title Prog2_T1_2 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier1 Program2 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier1 Program2 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_1_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item1--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item2--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program2_Tier2_1(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P2_2_LandTitle1 = $I->GenerateNameOf("Title Prog2_T2_1 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
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
        $I->comment("---------------Tier2 State Level Item1--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Tier2 State Level Item2--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program2_Tier2_2(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P2_2_LandTitle2 = $I->GenerateNameOf("Title Prog2_T2_2 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
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
        $I->comment("---------------Tier2 State Level Item1--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Tier2 State Level Item2--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program2_Tier2_3(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P2_2_LandTitle3 = $I->GenerateNameOf("Title Prog2_T2_3 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program2 Item3-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier2 Program2 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle1));
        $I->comment("--------------------Tier2 Program2 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle2));
        $I->comment("---------------Tier2 State Level Item1--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Tier2 State Level Item2--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program2_Tier2_4(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P2_2_LandTitle4 = $I->GenerateNameOf("Title Prog2_T2_4 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program2 Item4-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier2 Program2 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle1));
        $I->comment("--------------------Tier2 Program2 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle2));
        $I->comment("--------------------Tier2 Program2 Item3-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle3));
        $I->comment("---------------Tier2 State Level Item1--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Tier2 State Level Item2--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program2_Tier3_1(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier3Name_Prog2;
        $title       = $this->P2_3_LandTitle1 = $I->GenerateNameOf("Title Prog2_T3_1 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier3 Program2 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("---------------Absent Tier2 State Level Item1--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item2--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    //-----------------------------Create Landings for -------------------------
    
    public function CreateTierLanding_Program3_Tier2_1(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program3;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P3_2_LandTitle1 = $I->GenerateNameOf("Title Prog3_T2_1 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program3 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("---------------Tier2 State Level Item1--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Tier2 State Level Item2--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program3_Tier2_2(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program3;
        $tierName    = $this->tier2Name_Def;
        $title       = $this->P3_2_LandTitle2 = $I->GenerateNameOf("Title Prog3_T2_2 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Gray';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier2 Program3 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GrayColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier2 Program3 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P3_2_LandTitle1));
        $I->comment("---------------Tier2 State Level Item1--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Tier2 State Level Item2--------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(\Page\TierLandingManage::StateIconLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program3_Tier3_1(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program3;
        $tierName    = $this->tier3Name_Prog3;
        $title       = $this->P3_3_LandTitle1 = $I->GenerateNameOf("Title Prog3_T3_1 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier3 Program3 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("---------------Absent Tier2 State Level Item1--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item2--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program3_Tier3_2(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program3;
        $tierName    = $this->tier3Name_Prog3;
        $title       = $this->P3_3_LandTitle2 = $I->GenerateNameOf("Title Prog3_T3_2 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier3 Program3 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier3 Program3 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P3_3_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item1--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item2--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function CreateTierLanding_Program3_Tier3_3(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program3;
        $tierName    = $this->tier3Name_Prog3;
        $title       = $this->P3_3_LandTitle3 = $I->GenerateNameOf("Title Prog3_T3_3 ");
        $description = $I->GenerateNameOf("Descrip fgbgf");
        $color       = 'Green';
        
        $I->OpenTierLandingList($program, $tierName);
        $I->CreateTierLandingItem($title, $description, $color);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->comment("--------------------Tier3 Program3 Item3-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DescriptionLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::EditButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::DeleteButtonLine_AvailableItems_ByTitle($title));
        $I->canSeeElement(\Page\TierLandingManage::Line_ByTitle($title).\Page\TierLandingManage::$GreenColor);
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($title));
        $I->comment("--------------------Tier3 Program3 Item1-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P3_3_LandTitle1));
        $I->comment("--------------------Tier3 Program3 Item2-------------------");
        $I->canSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P3_3_LandTitle2));
        $I->comment("---------------Absent Tier2 State Level Item1--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->comment("---------------Absent Tier2 State Level Item2--------------");
        $I->cantSeeElement(\Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
    }
    
    public function Activate_Program1_Tier2_AllItems(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program1;
        $tierName    = $this->tier2Name_Def;
        
        $I->OpenTierLandingList($program, $tierName);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P1_2_LandTitle1), ".left-column.landing-list");
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P1_2_LandTitle2), ".left-column.landing-list");
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->state_2_LandTitle2), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P1_2_LandTitle1));
        $I->wait(2);
        $I->click(Page\TierLandingManage::$SaveOrderButton);
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P1_2_LandTitle1));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P1_2_LandTitle2));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->state_2_LandTitle2));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P1_2_LandTitle1));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P1_2_LandTitle2));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSee($this->P1_2_LandTitle1, Page\TierLandingManage::TitleLine('1'));
        $I->canSee($this->state_2_LandTitle2, Page\TierLandingManage::TitleLine('2'));
        $I->canSee($this->P1_2_LandTitle2, Page\TierLandingManage::TitleLine('3'));
        
    }
    
    public function Activate_Program2_Tier1_AllItems(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier1Name_Prog2;
        
        $I->OpenTierLandingList($program, $tierName);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_1_LandTitle1), ".left-column.landing-list");
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_1_LandTitle2), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_1_LandTitle1));
        $I->wait(2);
        $I->click(Page\TierLandingManage::$SaveOrderButton);
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_1_LandTitle1));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_1_LandTitle2));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_1_LandTitle1));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_1_LandTitle2));
        $I->canSee($this->P2_1_LandTitle1, Page\TierLandingManage::TitleLine('1'));
        $I->canSee($this->P2_1_LandTitle2, Page\TierLandingManage::TitleLine('2'));
    }
    
    public function Activate_Program2_Tier2_AllItems(\Step\Acceptance\TierLanding $I) {
        $program     = $this->program2;
        $tierName    = $this->tier2Name_Def;
        
        $I->OpenTierLandingList($program, $tierName);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_2_LandTitle1), ".left-column.landing-list");
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_2_LandTitle2), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle1));
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_2_LandTitle4), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle2));
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->state_2_LandTitle2), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle4));
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->state_2_LandTitle1), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->state_2_LandTitle2));
        $I->wait(2);
        $I->dragAndDrop(\Page\TierLandingManage::Line_ByTitle($this->P2_2_LandTitle3), Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->state_2_LandTitle1));
        $I->wait(2);
        $I->click(Page\TierLandingManage::$SaveOrderButton);
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle1));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle2));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle4));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->state_2_LandTitle1));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->P2_2_LandTitle3));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_ActiveItems_ByTitle($this->state_2_LandTitle3));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle1));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle2));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle3));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->P2_2_LandTitle4));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle1));
        $I->cantSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle2));
        $I->canSeeElement(Page\TierLandingManage::TitleLine_AvailableItems_ByTitle($this->state_2_LandTitle3));
        $I->canSee($this->P2_2_LandTitle1, Page\TierLandingManage::TitleLine('1'));
        $I->canSee($this->P2_2_LandTitle2, Page\TierLandingManage::TitleLine('2'));
        $I->canSee($this->P2_2_LandTitle4, Page\TierLandingManage::TitleLine('3'));
        $I->canSee($this->state_2_LandTitle2, Page\TierLandingManage::TitleLine('4'));
        $I->canSee($this->state_2_LandTitle1, Page\TierLandingManage::TitleLine('5'));
        $I->canSee($this->P2_2_LandTitle3, Page\TierLandingManage::TitleLine('6'));
    }
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1 = $I->GenerateNameOf("busnam1");
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
        $I->wait(4);
        $I->waitPageLoad();
        $I->wait(1);
        $I->cantSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->canSee('Registration', \Page\MainMenu::$StartedMenuItem_Registration);
        $I->canSee('Application', \Page\MainMenu::$StartedMenuItem_Application);
        $I->canSee('Review & Submit', \Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
    }
    
    public function Business1_CheckLandingPage_Tier2(Step\Acceptance\TierLanding $I)
    {
        $title1 = $this->P1_2_LandTitle1;
        $title2 = $this->state_2_LandTitle2;
        $title3 = $this->P1_2_LandTitle2;
        
        $I->amOnPage(\Page\LandingForTier::URL_BusinessLogin($this->id_checklist_1_T2));
        $I->canSee("1", \Page\LandingForTier::$Title_NumberIcon_2ndTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier2Name_Def LEVEL", \Page\LandingForTier::$Title_TierInfo_2ndTier);
        $I->canSee($title1, Page\LandingForTier::TitleLine('1'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title1));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title1).\Page\TierLandingManage::$GrayColor);
        $I->canSee($title2, Page\LandingForTier::TitleLine('2'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title2));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title2).\Page\TierLandingManage::$GreenColor);
        $I->canSee($title3, Page\LandingForTier::TitleLine('3'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title3));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title3).\Page\TierLandingManage::$GrayColor);
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('1', \Page\LandingForTier::$SecondTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier2Name_Def Benefits", \Page\LandingForTier::$SecondTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('2', $this->benefits_P1_T2);
    }
    
    public function Business1_CompleteMeasure1_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '20';
                
        $I->comment("Complete Measure1 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
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
        $I->wait(5);
    }
    
    public function Business1_CheckLandingPage_Tier2_AfterDashboardAppears(Step\Acceptance\TierLanding $I)
    {
        $title1 = $this->P1_2_LandTitle1;
        $title2 = $this->state_2_LandTitle2;
        $title3 = $this->P1_2_LandTitle2;
        
        $I->amOnPage(\Page\LandingForTier::URL_BusinessLogin($this->id_checklist_1_T2));
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        
        $I->canSee("1", \Page\LandingForTier::$Title_NumberIcon_2ndTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier2Name_Def LEVEL", \Page\LandingForTier::$Title_TierInfo_2ndTier);
        $I->canSee($title1, Page\LandingForTier::TitleLine('1'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title1));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title1).\Page\TierLandingManage::$GrayColor);
        $I->canSee($title2, Page\LandingForTier::TitleLine('2'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title2));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title2).\Page\TierLandingManage::$GreenColor);
        $I->canSee($title3, Page\LandingForTier::TitleLine('3'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title3));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title3).\Page\TierLandingManage::$GrayColor);
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('1', \Page\LandingForTier::$SecondTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier2Name_Def Benefits", \Page\LandingForTier::$SecondTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('2', $this->benefits_P1_T2);
    }
    
    public function Business1_CheckDashboard(Step\Acceptance\BusinessDashboard $I)
    {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        //My Status
        $I->comment("--------------------My Status Block----------------------");
        $I->canSee("$this->tier2Name_Def", \Page\BusinessDashboard::Tier_TierStatus('1'));
        $I->canSeeElement(\Page\BusinessDashboard::CurrentTierRow_TierStatus('1'));
        $I->cantSeeElement(\Page\BusinessDashboard::Tier_TierStatus('2'));
        $I->cantSeeElement(\Page\BusinessDashboard::Tier_TierStatus('3'));
        $I->canSee("Completed", \Page\BusinessDashboard::StatusForTier_TierStatus('1'));
        $I->canSee("1", \Page\BusinessDashboard::TierNumberIcon_TierStatus('1'));
        //Tier Overviews
        $I->comment("------------------Tier Overviews Block--------------------");
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "$this->tier2Name_Def");
        $I->cantSeeElement(\Page\BusinessDashboard::$TiersSelect_TierOverviews.'>option:nth-of-type(2)');
        $I->canSee("Completed", \Page\BusinessDashboard::$TierStatus_2ndTier_TierOverviews);
        $I->canSee("$this->tier2Name_Def tier overview", \Page\BusinessDashboard::$TierTitle_2ndTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('2', $this->benefits_P1_T2);
    }
    
    public function Business1_CheckTierStatusPage(Step\Acceptance\MyStatus $I)
    {
        $I->amOnPage(\Page\MyStatus_TierStatus::$URL);
        //Benefits by Tier
        $I->comment("------------------Benefits by Tier Block--------------------");
        $I->canSee("BENEFITS BY TIER", \Page\MyStatus_TierStatus::$BenefitsByTierBlock_Title);
        $I->canSee("$this->tier2Name_Def", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('1'));
        $I->CheckBenefitsToTier_BenefitsByTierBlock('1', $this->benefits_P1_T2);
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '1'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '2'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '3'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '4'));
    }
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business2_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2 = $I->GenerateNameOf("busnam2");
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
        $I->wait(4);
        $I->waitPageLoad();
        $I->wait(1);
    }
    
    public function Business2_CheckLandingPage_Tier1(Step\Acceptance\TierLanding $I)
    {
        $title1 = $this->P2_1_LandTitle1;
        $title2 = $this->P2_1_LandTitle2;
        
        $I->amOnPage(\Page\LandingForTier::URL_BusinessLogin($this->id_checklist_2_T1));
        $I->canSee("1", \Page\LandingForTier::$Title_NumberIcon_1stTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier1Name_Prog2 LEVEL", \Page\LandingForTier::$Title_TierInfo_1stTier);
        $I->canSee($title1, Page\LandingForTier::TitleLine('1'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title1));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title1).\Page\TierLandingManage::$GrayColor);
        $I->canSee($title2, Page\LandingForTier::TitleLine('2'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title1));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title1).\Page\TierLandingManage::$GrayColor);
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('1', \Page\LandingForTier::$FirstTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier1Name_Prog2 Benefits", \Page\LandingForTier::$FirstTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('1', $this->benefits_P2_T1);
        $I->CheckBenefitsToTierOnLandingPage('2', $this->benefits_P2_T2);
        $I->CheckBenefitsToTierOnLandingPage('3', $this->benefits_P2_T3);
    }
    
    public function Business2_CheckLandingPage_Tier2(Step\Acceptance\TierLanding $I)
    {
        $title1 = $this->P2_2_LandTitle1;
        $title2 = $this->P2_2_LandTitle2;
        $title3 = $this->P2_2_LandTitle4;
        $title4 = $this->state_2_LandTitle2;
        $title5 = $this->state_2_LandTitle1;
        $title6 = $this->P2_2_LandTitle3;
        
        $I->amOnPage(\Page\LandingForTier::URL_BusinessLogin($this->id_checklist_2_T2));
        $I->canSee("2", \Page\LandingForTier::$Title_NumberIcon_2ndTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier2Name_Def LEVEL", \Page\LandingForTier::$Title_TierInfo_2ndTier);
        $I->canSee($title1, Page\LandingForTier::TitleLine('1'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title1));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title1).\Page\TierLandingManage::$GrayColor);
        $I->canSee($title2, Page\LandingForTier::TitleLine('2'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title2));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title2).\Page\TierLandingManage::$GreenColor);
        $I->canSee($title3, Page\LandingForTier::TitleLine('3'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title3));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title3).\Page\TierLandingManage::$GrayColor);
        $I->canSee($title4, Page\LandingForTier::TitleLine('4'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title4));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title4).\Page\TierLandingManage::$GreenColor);
        $I->canSee($title5, Page\LandingForTier::TitleLine('5'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title5));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title5).\Page\TierLandingManage::$GrayColor);
        $I->canSee($title6, Page\LandingForTier::TitleLine('6'));
        $I->canSeeElement(\Page\LandingForTier::DescriptionLine_ByTitle($title6));
        $I->canSeeElement(\Page\LandingForTier::Line_ByTitle($title6).\Page\TierLandingManage::$GreenColor);
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('2', \Page\LandingForTier::$SecondTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier2Name_Def Benefits", \Page\LandingForTier::$SecondTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('1', $this->benefits_P2_T1);
        $I->CheckBenefitsToTierOnLandingPage('2', $this->benefits_P2_T2);
        $I->CheckBenefitsToTierOnLandingPage('3', $this->benefits_P2_T3);
    }
    
    public function Business2_CheckLandingPage_Tier3(Step\Acceptance\TierLanding $I)
    {
        $I->amOnPage(\Page\LandingForTier::URL_BusinessLogin($this->id_checklist_2_T3));
        $I->canSee("3", \Page\LandingForTier::$Title_NumberIcon_3rdTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier3Name_Prog2 LEVEL", \Page\LandingForTier::$Title_TierInfo_3rdTier);
        $I->cantSeeElement(Page\LandingForTier::TitleLine('1'));
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('3', \Page\LandingForTier::$ThirdTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier3Name_Prog2 Benefits", \Page\LandingForTier::$ThirdTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('1', $this->benefits_P2_T1);
        $I->CheckBenefitsToTierOnLandingPage('2', $this->benefits_P2_T2);
        $I->CheckBenefitsToTierOnLandingPage('3', $this->benefits_P2_T3);
    }
    
    public function Business2_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
//        $value1   = '10';
//        $value2   = '20';
                
        $I->comment("Complete Measure1 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_2_T2");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
    }
    
    public function Business2_CheckDashboard(Step\Acceptance\BusinessDashboard $I)
    {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        //My Status
        $I->comment("--------------------My Status Block----------------------");
        $I->canSee("$this->tier1Name_Prog2", \Page\BusinessDashboard::Tier_TierStatus('1'));
        $I->canSee("Not Started", \Page\BusinessDashboard::StatusForTier_TierStatus('1'));
        $I->canSee("1", \Page\BusinessDashboard::TierNumberIcon_TierStatus('1'));
        $I->canSee("$this->tier2Name_Def", \Page\BusinessDashboard::Tier_TierStatus('2'));
        $I->canSeeElement(\Page\BusinessDashboard::CurrentTierRow_TierStatus('2'));
        $I->canSee("In Process", \Page\BusinessDashboard::StatusForTier_TierStatus('2'));
        $I->canSee("2", \Page\BusinessDashboard::TierNumberIcon_TierStatus('2'));
        $I->canSee("$this->tier3Name_Prog2", \Page\BusinessDashboard::Tier_TierStatus('3'));
        $I->canSee("Completed", \Page\BusinessDashboard::StatusForTier_TierStatus('3'));
        $I->canSee("3", \Page\BusinessDashboard::TierNumberIcon_TierStatus('3'));
        //Tier Overviews
        $I->comment("------------------Tier Overviews Block--------------------");
        $I->comment("--------------Tier2 Benefits----------------");
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "$this->tier2Name_Def");
        $I->canSee("In Process", \Page\BusinessDashboard::$TierStatus_2ndTier_TierOverviews);
        $I->canSee("$this->tier2Name_Def tier overview", \Page\BusinessDashboard::$TierTitle_2ndTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('2', $this->benefits_P2_T2);
        $I->comment("--------------Tier1 Benefits----------------");
        $I->selectOption(\Page\BusinessDashboard::$TiersSelect_TierOverviews, $this->tier1Name_Prog2);
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "$this->tier1Name_Prog2");
        $I->canSee("Not Started", \Page\BusinessDashboard::$TierStatus_1stTier_TierOverviews);
        $I->canSee("$this->tier1Name_Prog2 tier overview", \Page\BusinessDashboard::$TierTitle_1stTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('1', $this->benefits_P2_T1);
        $I->comment("--------------Tier3 Benefits----------------");
        $I->selectOption(\Page\BusinessDashboard::$TiersSelect_TierOverviews, $this->tier3Name_Prog2);
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "$this->tier3Name_Prog2");
        $I->canSee("Completed", \Page\BusinessDashboard::$TierStatus_3rdTier_TierOverviews);
        $I->canSee("$this->tier3Name_Prog2 tier overview", \Page\BusinessDashboard::$TierTitle_3rdTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('3', $this->benefits_P2_T3);
    }
    
    public function Business2_CheckTierStatusPage(Step\Acceptance\MyStatus $I)
    {
        $I->amOnPage(\Page\MyStatus_TierStatus::$URL);
        //Benefits by Tier
        $I->comment("------------------Benefits by Tier Block--------------------");
        $I->canSee("BENEFITS BY TIER", \Page\MyStatus_TierStatus::$BenefitsByTierBlock_Title);
        $I->canSee("$this->tier1Name_Prog2", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('1'));
        $I->canSee("$this->tier2Name_Def", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('2'));
        $I->canSee("$this->tier3Name_Prog2", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('3'));
        $I->CheckBenefitsToTier_BenefitsByTierBlock('1', $this->benefits_P2_T1);
        $I->CheckBenefitsToTier_BenefitsByTierBlock('2', $this->benefits_P2_T2);
        $I->CheckBenefitsToTier_BenefitsByTierBlock('3', $this->benefits_P2_T3);
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '1'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '2'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '3'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '4'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '5'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '6'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '7'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '8'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '9'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '10'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '11'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '12'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '1'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '2'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '3'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '4'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '5'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '6'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '7'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('3', '1'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('3', '2'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('3', '3'));
        
    }
    
    public function Help_LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business3_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus3 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business3 = $I->GenerateNameOf("busnam3");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
        $I->wait(1);
    }
    
    public function Business3_CheckLandingPage_Tier2(Step\Acceptance\TierLanding $I)
    {
        $benefits = ['No benefits']; 
        
        $I->amOnPage(\Page\LandingForTier::URL_BusinessLogin($this->id_checklist_3_T2));
        $I->canSee("1", \Page\LandingForTier::$Title_NumberIcon_2ndTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier2Name_Def LEVEL", \Page\LandingForTier::$Title_TierInfo_2ndTier);
        $I->cantSeeElement(Page\LandingForTier::TitleLine('1'));
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('1', \Page\LandingForTier::$SecondTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier2Name_Def Benefits", \Page\LandingForTier::$SecondTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('2', $benefits);
        $I->CheckBenefitsToTierOnLandingPage('3', $this->benefits_P3_T3);
    }
    
    public function Business3_CheckLandingPage_Tier3(Step\Acceptance\TierLanding $I)
    {
        $benefits = ['No benefits'];
        
        $I->amOnPage(\Page\LandingForTier::URL_BusinessLogin($this->id_checklist_3_T3));
        $I->canSee("2", \Page\LandingForTier::$Title_NumberIcon_3rdTier);
        $I->canSee("Welcome to", \Page\LandingForTier::$Title_Welcome);
        $I->canSee("THE $this->tier3Name_Prog3 LEVEL", \Page\LandingForTier::$Title_TierInfo_3rdTier);
        $I->cantSeeElement(Page\LandingForTier::TitleLine('1'));
        $I->canSee('Tier Benefits', \Page\LandingForTier::$Title_BenefitsBlock);
        $I->canSee('2', \Page\LandingForTier::$ThirdTierNumberIcon_BenefitsBlock);
        $I->canSee("$this->tier3Name_Prog3 Benefits", \Page\LandingForTier::$ThirdTierTitle_BenefitsBlock);
        $I->CheckBenefitsToTierOnLandingPage('2', $benefits);
        $I->CheckBenefitsToTierOnLandingPage('3', $this->benefits_P3_T3);
    }
    
    public function Business3_CompleteMeasure2_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
//        $value1   = '10';
//        $value2   = '20';
                
        $I->comment("Complete Measure2 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
    }
    
    public function Business3_CheckDashboard(Step\Acceptance\BusinessDashboard $I)
    {
        $benefits = ['No benefits'];
        
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->canSeeElement(\Page\MainMenu::selectMenuItemByName('Dashboard'));
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Registration);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_Application);
        $I->cantSeeElement(\Page\MainMenu::$StartedMenuItem_ReviewAndSubmit);
        //My Status
        $I->comment("--------------------My Status Block----------------------");
        $I->canSee("$this->tier2Name_Def", \Page\BusinessDashboard::Tier_TierStatus('1'));
        $I->canSeeElement(\Page\BusinessDashboard::CurrentTierRow_TierStatus('1'));
        $I->canSee("In Process", \Page\BusinessDashboard::StatusForTier_TierStatus('1'));
        $I->canSee("1", \Page\BusinessDashboard::TierNumberIcon_TierStatus('1'));
        $I->canSee("$this->tier3Name_Prog3", \Page\BusinessDashboard::Tier_TierStatus('2'));
        $I->canSee("Completed", \Page\BusinessDashboard::StatusForTier_TierStatus('2'));
        $I->canSee("2", \Page\BusinessDashboard::TierNumberIcon_TierStatus('2'));
        $I->cantSeeElement(\Page\BusinessDashboard::Tier_TierStatus('3'));
        //Tier Overviews
        $I->comment("------------------Tier Overviews Block--------------------");
        $I->comment("--------------Tier2 Benefits----------------");
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "$this->tier2Name_Def");
        $I->cantSeeElement(\Page\BusinessDashboard::$TiersSelect_TierOverviews.'>option:nth-of-type(3)');
        $I->canSee("In Process", \Page\BusinessDashboard::$TierStatus_2ndTier_TierOverviews);
        $I->canSee("$this->tier2Name_Def tier overview", \Page\BusinessDashboard::$TierTitle_2ndTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('2', $benefits);
        $I->comment("--------------Tier3 Benefits----------------");
        $I->selectOption(\Page\BusinessDashboard::$TiersSelect_TierOverviews, $this->tier3Name_Prog3);
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessDashboard::$TiersSelect_TierOverviews, "$this->tier3Name_Prog3");
        $I->canSee("Completed", \Page\BusinessDashboard::$TierStatus_3rdTier_TierOverviews);
        $I->canSee("$this->tier3Name_Prog3 tier overview", \Page\BusinessDashboard::$TierTitle_3rdTier_TierOverviews);
        $I->canSee("Tier benefits", \Page\BusinessDashboard::$Title_BenefitsBlock_TierOverviews);
        $I->CheckBenefitsToTier_TierOverviews('3', $this->benefits_P3_T3);
    }
    
    public function Business3_CheckTierStatusPage(Step\Acceptance\MyStatus $I)
    {
        $benefits = ['No benefits'];
        
        $I->amOnPage(\Page\MyStatus_TierStatus::$URL);
        //Benefits by Tier
        $I->comment("------------------Benefits by Tier Block--------------------");
        $I->canSee("BENEFITS BY TIER", \Page\MyStatus_TierStatus::$BenefitsByTierBlock_Title);
        $I->canSee("$this->tier2Name_Def", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('1'));
        $I->canSee("$this->tier3Name_Prog3", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('2'));
        $I->CheckBenefitsToTier_BenefitsByTierBlock('1', $benefits);
        $I->CheckBenefitsToTier_BenefitsByTierBlock('2', $this->benefits_P3_T3);
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('1', '1'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '1'));
        $I->cantSeeElement(\Page\MyStatus_TierStatus::BenefitOk_BenefitsByTierBlock('2', '2'));
    }
    
    public function Help_LogOut_AndLoginAsAdmin(AcceptanceTester $I) {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
}
