<?php


class ChecklistCreateCest
{
    public $state;
    public $audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measure3Desc, $idMeasure3;
    public $measure4Desc, $idMeasure4;
    public $measure5Desc, $idMeasure5;
    public $measure6Desc, $idMeasure6;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $sector1;
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
    
    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StCheckCreate");
        $shortName = 'ChCr';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help2_4_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_7_CreateMeasure1(\Step\Acceptance\Measure $I) {
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
    
    public function Help1_7_CreateMeasure2(\Step\Acceptance\Measure $I) {
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
    
    public function Help1_7_CreateMeasure3(\Step\Acceptance\Measure $I) {
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
    
    public function Help1_7_CreateMeasure4(\Step\Acceptance\Measure $I) {
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
    
    public function Help1_7_CreateMeasure5(\Step\Acceptance\Measure $I) {
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
    
    public function Help1_7_CreateMeasure6(\Step\Acceptance\Measure $I) {
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
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityChCr1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgChCr1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_6_3_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityChCr2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgChCr2");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //--------------------------------------------------------------------------Create Sectors-----------------------------------------------------------------------------------------
    
    public function CreateSectorForProgram1(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#1 for program#1 in default state");
        $name      = $this->sector1 = $I->GenerateNameOf("SecProg1");
        $state     = $this->state;
        $program   = $this->program1;
        
        $I->CreateSector($name, $state, $program);
        $I->wait(2);
    }
    
    public function CreateSectorForProgram2(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#1 for program#2 in default state");
        $name      = $this->sector2 = $I->GenerateNameOf("SecProg2");
        $state     = $this->state;
        $program   = $this->program2;
        
        $I->CreateSector($name, $state, $program);
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //------------------Create Checklists Without Created EC--------------------
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_Sector1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_Sector2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
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
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_Sector1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_Sector2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
    }
    //
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
    
    //--------------------------------------------------------------------------Create EC----------------------------------------------------------------------------------------------
    
    public function CreateEssentialCriteriaForTier1(\Step\Acceptance\EssentialCriteria $I) {
        $number = '1';
        $descs  = $this->measuresDesc_SuccessCreated;
        
        $I->CreateEssentialCriteria($number);
        $this->statnewEC1 = $I->ManageEssentialCriteria($descs, $this->statusesEC1, $this->extensionsEC1);
        $I->reloadPage();
        $I->PublishECStatus();
    }
    
    public function CreateEssentialCriteriaForTier3(\Step\Acceptance\EssentialCriteria $I) {
        $number   = '3';
        $descs    = $this->measuresDesc_SuccessCreated;
        $statuses = $this->statusesDefault;
        
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $statuses);
        $this->statnewEC3 = $I->ManageEssentialCriteria($descs, $this->statusesEC3, $this->extensionsEC3);
        $I->reloadPage();
        $I->PublishECStatus();
    }
    
    public function CreateEssentialCriteriaForTier2(\Step\Acceptance\EssentialCriteria $I) {
        $number   = '2';
        $descs    = $this->measuresDesc_SuccessCreated;
        $statuses = $this->statnewEC1;
        
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $statuses);
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //------------------Create Checklists With Created EC-----------------------
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
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
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_Sector2_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
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
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    public function CreateChecklist_SP_Program1_PD_Program1_SD_Sector1_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_Sector2_PublishedEC(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    //
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
    
    //--------------------------Create Help Checklist---------------------------
    
    //$statusesProg1OfficeRetail = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    //$extensionsProg1OfficeRetail = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public function Help1_15_CreateChecklistForTier1_Program1_OfficeRetail(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist(null, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesProg1OfficeRetail, $this->extensionsProg1OfficeRetail);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //$statusesProg1Sector1      = ['elective', 'not set',  'not set', 'not set',  'elective', 'elective'];
    //$extensionsProg1Sector1      = ['Default',         'Default',         'Default',         'Default',         'Default',         'Default'];
    public function Help1_15_CreateChecklistForTier1_Program1_Sector1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist(null, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesProg1Sector1, $this->extensionsProg1Sector1);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //$statusesProg2Sector2      = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    //$extensionsProg2Sector2      = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    public function Help1_15_CreateChecklistForTier1_Program2_Sector2(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist(null, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesProg2Sector2, $this->extensionsProg2Sector2);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //-------------Create Checklists With Created EC & Checklists---------------
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program1_SD_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
    public function CreateChecklist_SP_EssencialCriteria_PD_Program2_SD_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
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
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
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
    
    public function CreateChecklist_SP_Program2_PD_Program2_SD_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnewEC1, $this->extensionsEC1);
    }
    
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
    
    //$statusesEC3        = ['elective',     'elective', 'not set', 'not set',  'core', 'core'];
    //$extensionsEC3      = ['Default',         'Large Landscape',         'Default',         'Large Landscape',         'Large Building', 'Default'];
    public function CreateChecklist_ForTier3_SP_Program1_PD_Program2_SD_Sector2_PC_Program1_SC_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program1;
        $sectorCriteria     = $this->sector1;
        $programDestination = $this->program2;
        $sectorDestination  = $this->sector2;
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    public function CreateChecklist_ForTier3_SP_Program1_PD_Program1_SD_Sector1_PC_Program2_SC_Sector2_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programCriteria    = $this->program2;
        $sectorCriteria     = $this->sector2;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    public function CreateChecklist_ForTier3_SP_EssentialCriteria_PD_Program2_SD_OfficeRetail_PC_Program2_SC_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programCriteria    = $this->program2;
        $sectorCriteria     = Page\SectorList::DefaultSectorOfficeRetail;
        $programDestination = $this->program2;
        $sectorDestination  = Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier, $programCriteria, $sectorCriteria);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    public function CreateChecklist_ForTier3_SP_EssencialCriteria_PD_Program2_SD_OfficeRetail_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
    
    public function CreateChecklist_ForTier3_SP_EssencialCriteria_PD_Program1_SD_Sector1_PublishedECAndChecklists(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = $this->sector1;
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $statusesNew        = $this->statnewEC3;
        $extensionsNew      = ['Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $statusesNew, $extensionsNew);
    }
}
