<?php


class WeightedStateCest
{
    public $state, $sector1, $sector2;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $audSubgroup2_SolidWaste, $id_audSubgroup2_SolidWaste;
    public $city_W, $zip_W, $program_W, $city_NW, $zip_NW, $program_NW, $city3, $zip3, $program3, $county;
    public $id_program_W, $id_program_NW, $id_program3;
    public $business1_Prog_W_S1, $business2_Prog_NW_S2;
    public $id_business1_Prog_W_S1, $id_business2_Prog_NW_S2;
    public $idMeasure1, $measure1Desc, $idMeasure2, $measure2Desc, $idMeasure3, $measure3Desc, $idMeasure4, $measure4Desc, $idMeasure5, $measure5Desc, $idMeasure6, $measure6Desc,
           $idMeasure7, $measure7Desc, $idMeasure8, $measure8Desc, $idMeasure9, $measure9Desc, $idMeasure10, $measure10Desc; 
    public $pointsMeas1 = "1", $pointsMeas2 = "2", $pointsMeas3 = "3", $pointsMeas4 = "4", $pointsMeas5 = "5", $pointsMeas6 = "6", $pointsMeas7 = "7", $pointsMeas8 = "8",
           $pointsMeas9 = "9", $pointsMeas10 = "10";
    public $measuresDesc_SuccessCreated = [];
    public $password = 'Qq!1111111';
    public $todayDate = [];
    public $id_SC_Sector1_T1_version1, $id_SC_Sector1_T2_version1, $id_SC_Sector1_T3_version1;
    public $id_SC_Sector1_T1_version2, $id_SC_Sector1_T2_version2, $id_SC_Sector1_T3_version2_published;
    public $id_SC_Sector1_T1_version3, $id_SC_Sector1_T2_version3, $id_SC_Sector1_T3_version3;
    public $id_SC_Sector1_T1_version4, $id_SC_Sector1_T2_version4, $id_SC_Sector1_T3_version4;
    
    public $id_SC_Sector2_T1_version1, $id_SC_Sector2_T2_version1, $id_SC_Sector2_T3_version1;
    public $id_SC_Sector2_T1_version2, $id_SC_Sector2_T2_version2, $id_SC_Sector2_T3_version2_published;
    public $id_SC_Sector2_T1_version3, $id_SC_Sector2_T2_version3, $id_SC_Sector2_T3_version3;
    public $id_SC_Sector2_T1_version4, $id_SC_Sector2_T2_version4, $id_SC_Sector2_T3_version4;
    
    public $id_PC_W_Sector1_T1, $id_PC_W_Sector1_T2, $id_PC_W_Sector1_T3, $id_PC_NW_Sector1_T1, $id_PC_NW_Sector1_T2, $id_PC_NW_Sector1_T3;
    public $id_PC_W_Sector2_T1, $id_PC_W_Sector2_T2, $id_PC_W_Sector2_T3, $id_PC_NW_Sector2_T1, $id_PC_NW_Sector2_T2, $id_PC_NW_Sector2_T3;
    
    public $id_old1_PC_W_Sector1_T1, $id_old1_PC_W_Sector1_T2, $id_old1_PC_W_Sector1_T3, $id_old1_PC_NW_Sector1_T1, $id_old1_PC_NW_Sector1_T2, $id_old1_PC_NW_Sector1_T3;
    public $id_old2_PC_W_Sector1_T2, $id_old2_PC_NW_Sector1_T2;
    
    public $id_old1_PC_W_Sector2_T1, $id_old1_PC_W_Sector2_T2, $id_old1_PC_NW_Sector2_T1, $id_old1_PC_NW_Sector2_T2, $id_old1_PC_NW_Sector2_T3;
    public $id_old2_PC_W_Sector2_T2, $id_old2_PC_NW_Sector2_T2;
    
    public $sectors_default = ['Office / Retail'];
    public $statuses_SC_Sector1_T1_version1 = ['not set',  'not set', 'core',     'not set',  'not set', 'not set', 'elective', 'not set',  'not set', 'not set'];
    public $statuses_SC_Sector1_T2_version1 = ['elective', 'core',    'elective', 'elective', 'not set', 'not set' , 'not set', 'not set',  'not set', 'not set'];
    public $statuses_SC_Sector1_T3_version1 = ['not set',  'not set', 'not set',  'not set',  'not set', 'elective', 'not set', 'elective', 'not set', 'not set'];
    
    public $statuses_SC_Sector1_T1_version2 = ['not set',  'not set', 'core',     'not set',  'not set', 'core', 'elective', 'not set',  'not set', 'not set'];
    public $statuses_SC_Sector1_T2_version2 = ['core',     'not set', 'elective', 'elective', 'not set',  'not set',  'not set', 'not set',  'not set', 'not set'];
    public $statuses_SC_Sector1_T3_version2 = ['elective', 'not set', 'not set',  'not set',  'not set',  'elective', 'not set', 'elective', 'core',    'not set'];
    
    public $statuses_PC_W_WithAdditional_T1_version1 = ['core',     'elective', 'elective', 'not set',  'elective', 'elective' , 'not set', 'not set',  'not set', 'not set'];
    public $statuses_PC_W_WithAdditional_T2_version1 = ['elective', 'core',     'elective', 'elective', 'elective', 'not set',   'not set', 'not set',  'not set', 'not set'];
    public $statuses_PC_W_WithAdditional_T3_version1 = ['not set',  'not set',  'not set',  'not set',  'not set',  'elective',  'not set', 'elective', 'not set', 'core'];
    
    public $statuses_PC_NW_WithAdditional_T1_version1 = ['not set',  'core',    'elective', 'not set',  'elective', 'not set',  'core',    'elective', 'core',    'not set'];
    public $statuses_PC_NW_WithAdditional_T2_version1 = ['elective', 'core',    'elective', 'elective', 'elective', 'not set',  'not set', 'not set',  'not set', 'not set'];
    public $statuses_PC_NW_WithAdditional_T3_version1 = ['not set',  'not set', 'not set',  'not set',  'not set',  'elective', 'not set', 'elective', 'not set', 'core'];
    
    public $extensions_default     = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default' , 'Default', 'Default', 'Default', 'Default'];
    
    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StSecCheckW");
        $shortName = 'SCW';
        
        $I->CreateState($name, $shortName, $weighted = 'Input');
    }
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function CheckDefaultSectors(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SectorList::URL());
        $count = $I->grabTextFrom(\Page\SectorList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\SectorList::UrlPageNumber($i));
            $rows = $I->getAmount($I, \Page\SectorList::$SectorRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                $sectors[]=$I->grabTextFrom(\Page\SectorList::NameLine($j));
            }
        }
        $res1 = array_diff($this->sectors_default, $sectors);
        $res2 = array_diff($sectors, $this->sectors_default);
        if(!empty($res1)){
            $message1 = "Error. Sectors are Absent in List: ";
            foreach ($res1 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
        if(!empty($res2)){
            $message1 = "Error. Not Default Sectors are Present in List: ";
            foreach ($res2 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
    }
    
    public function CreateSector1(Step\Acceptance\Sector $I)
    {
        $name = $this->sector1 = $I->GenerateNameOf('Sec1_');
        
        $I->wait(1);
        $I->CreateSector($name, $this->state);
        $I->GetSectorOnPageInList($name);
        $this->sectors_default[] = $this->sector1;
    }
    
    public function CreateSector2(Step\Acceptance\Sector $I)
    {
        $name = $this->sector2 = $I->GenerateNameOf('Sec2_');
        
        $I->wait(1);
        $I->CreateSector($name, $this->state);
        $I->GetSectorOnPageInList($name);
        $this->sectors_default[] = $this->sector2;
    }
    
    public function CheckManageSectorsList_Empty(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->canSeeElement(\Page\SectorsManage::$EmptyListLabel);
    }
    
    public function CheckSectorsInSectorDropdown_SectorChecklistCreatePage(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorChecklistCreate::URL_WithoutStateId());
        $count = $I->getAmount($I, \Page\SectorChecklistCreate::$SectorOption);
        $I->comment("Sector option count = $count");
        for($i=1; $i<=$count; $i++){
            $sectors[]=$I->grabTextFrom(\Page\SectorChecklistCreate::selectSectorOption($i));
        }
        $res1 = array_diff($this->sectors_default, $sectors);
        $res2 = array_diff($sectors, $this->sectors_default);
        if(!empty($res1)){
            $message1 = "Error. Sectors are Absent in Dropdown: ";
            foreach ($res1 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
        if(!empty($res2)){
            $message1 = "Error. Not Default Sectors are Present in Dropdown: ";
            foreach ($res2 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
    }
    
    public function Create_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $sector             = $this->sector1;
        $tier               = '2';
        
        $this->id_SC_Sector1_T2_version1 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 2', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' TIER 2', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 2', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 2');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->PublishSectorChecklistStatus();
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
    
    public function Help_CreateAuditSubGroups1ForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroups2ForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_SolidWaste = $I->GenerateNameOf("SolWasAudSub2");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup2_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $points         = $this->pointsMeas1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
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
        $points         = $this->pointsMeas2;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure3_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $points         = $this->pointsMeas3;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure4_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description_4 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $points         = $this->pointsMeas4;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure5_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description_5 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $points         = $this->pointsMeas5;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure6_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description_6 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $points         = $this->pointsMeas6;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure7_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc = $I->GenerateNameOf("Description_7 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $points         = $this->pointsMeas7;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure8_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc = $I->GenerateNameOf("Description_8 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $points         = $this->pointsMeas8;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure9_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description_9 quant Number ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $points         = $this->pointsMeas9;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure10_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure10Desc = $I->GenerateNameOf("Description_10 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $points         = $this->pointsMeas10;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure10 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Update_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $sector             = $this->sector1;
        $tier               = '2';
        $group1              = Page\AuditGroupList::Energy_AuditGroup;
        $group2              = Page\AuditGroupList::SolidWaste_AuditGroup;
        
        $I->amOnPage(\Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '0');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '1');
        
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group2, $this->audSubgroup1_SolidWaste, $value = '0');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup1_SolidWaste, $value = '0');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        
        $I->UpdateChecklistPoints($points_Default = '8', $points_LB = '7', $points_LL = '8', $points_LL_LB = '8');
    }
    
    //-------------------------------Copy Sector checklist for Sector2------------------------------
    
    public function CopySectorChecklistForSector2(\Step\Acceptance\SectorChecklist $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->amOnPage(\Page\SectorChecklistList::URL());
        $I->click(\Page\SectorChecklistList::CopyButtonLine('1'));
        $I->wait(3);
        $I->selectOption(\Page\SectorChecklistList::$CopySectorChecklistPopup_ToSectorSelect, $this->sector2);
        $I->wait(1);
        $I->click(\Page\SectorChecklistList::$CopySectorChecklistPopup_CopyButton);
        $I->wait(5);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(\Page\SectorChecklistList::$FilterByVersionStatusSelect, '');
        $I->wait(1);
        $I->click(\Page\SectorChecklistList::$ApplyFiltersButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\SectorChecklistList::Sector_BySect_Tier_Line($this->sector1, "Tier 2"));
        $I->canSeeElement(\Page\SectorChecklistList::Sector_BySect_Tier_Line($this->sector2, "Tier 2"));
        $this->id_SC_Sector2_T2_version1 = $I->grabTextFrom(\Page\SectorChecklistList::Id_BySect_Tier_Line($this->sector2, 'Tier 2'));
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector2_T2_version1));
        $I->PublishSectorChecklistStatus();
        $I->wait(1);
    }
    
    //-------------------------------Create county------------------------------
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city1 and program Weighted-------------------------
    
    public function Help_CreateCity1_And_Program_W(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city     = $this->city_W = $I->GenerateNameOf("City_W_");
        $cityArr  = [$city];
        $state    = $this->state;
        $zips     = $this->zip_W = $I->GenerateZipCode();
        $program  = $this->program_W = $I->GenerateNameOf("Prog_W_");
        $county   = $this->county;
        $weighted = 'Input';
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program_W = $prog['id'];
        $Y->UpdateProgram($this->id_program_W, null, null, null, $weighted);
    }
    
    public function Help_CreateCity2_And_Program_NW(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city_NW = $I->GenerateNameOf("City_NW_");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip_NW = $I->GenerateZipCode();
        $program = $this->program_NW = $I->GenerateNameOf("Prog_NW_");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program_NW = $prog['id'];
    }
    
    public function CheckChecklistList_Empty(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSeeElement(\Page\ChecklistList::$EmptyListLabel);
    }
    
    public function ActivateSector1_ForProgram_NW(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $this->sector1);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program_NW, $this->sector1));
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function ActivateSector1_ForProgram_W(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $this->sector1);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program_W, $this->sector1));
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function ActivateSector2_ForProgram_NW(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $this->sector2);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program_NW, $this->sector2));
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function ActivateSector2_ForProgram_W(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $this->sector2);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program_W, $this->sector2));
        $I->wait(1);
    }
    
    public function CheckPublishedChecklistForPrograms(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSee('4', Page\ChecklistList::$SummaryCount);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 2'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee('4', Page\ChecklistList::$SummaryCount);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 2'));
    }
    
    public function GetProgramChecklistID_Tier2_W_S1(\Step\Acceptance\Checklist $I) {
        $this->id_PC_W_Sector1_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 2'));
    }
    
    public function GetProgramChecklistID_Tier2_NW_S1(\Step\Acceptance\Checklist $I) {
        $this->id_PC_NW_Sector1_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 2'));
    }
    
    public function GetProgramChecklistID_Tier2_W_S2(\Step\Acceptance\Checklist $I) {
        $this->id_PC_W_Sector2_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 2'));
    }
    
    public function GetProgramChecklistID_Tier2_NW_S2(\Step\Acceptance\Checklist $I) {
        $this->id_PC_NW_Sector2_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 2'));
    }
    
    /**
     * @group check
     */
    
    public function CheckLeftColumnAndDefineTotals_OnManageProgramChecklist_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '3', $llCount = '3', $allCount = '3');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '1', $llCount = '0', $allCount = '2');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    /**
     * @group check
     */
    
    public function CheckSectorChecklistMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    /**
     * @group check
     */
    
    public function CheckLeftColumnAndDefineTotals_OnManageProgramChecklist_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '3', $llCount = '3', $allCount = '3');
        
        $I->Check_PointsOf_Core_Measures_IncludedPointsForm($defaultPoints = '2', $lbPoints = '2', $llPoints = '2', $allPoints = '2');
        $I->Check_PointsOf_Elective_Measures_IncludedPointsForm($defaultPoints = '8', $lbPoints = '8', $llPoints = '8', $allPoints = '8');
        
        $I->CheckSavedChecklistPoints($points_Default = '8', $points_LB = '7', $points_LL = '8', $points_LL_LB = '8');
    }
    
    /**
     * @group check
     */
    
    public function CheckSectorChecklistMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    /**
     * @group check
     */
    
    public function UpdateDefineTotalsValuesForProgramChecklist_Tier2_Program_NW_ToHigherError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '3', $error = "must be less than or equal to 2");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '2', $error = "must be less than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '3', $error = "must be less than or equal to 2");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '2', $error = "must be less than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '11', $error = "must be less than or equal to 2");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '8', $error = "must be less than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '22', $error = "must be less than or equal to 2");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '34', $error = "must be less than or equal to 1");
    }
    
    /**
     * @group check
     */
    
    public function UpdateDefineTotalsValuesForProgramChecklist_Tier2_Program_NW_ToLessError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '0', $error = "must be greater than or equal to 2");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '0', $error = "must be greater than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '0', $error = "must be greater than or equal to 1");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
//                                                           $value = '1', $error = "must be greater than or equal to 0");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '0', $error = "must be greater than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '0', $error = "must be greater than or equal to 1");
    }
    
    /**
     * @group check
     */
    
    public function UpdatePointsValuesForProgramChecklist_Tier2_Program_W_ToHigherError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'def', $value = '11', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 10.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'lb', $value = '222', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 10.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'll', $value = '21', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 10.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'all', $value = '16', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 10.");
    }
    
    /**
     * @group check
     */
    
    public function UpdatePointsValuesForProgramChecklist_Tier2_Program_W_ToLessError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'def', $value = '7', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 8.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'lb', $value = '1', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 7.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'll', $value = '2', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 8.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'all', $value = '0', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 8.");
    }
    
    public function ActivateAdditionalMeasures_Tier2_Program_W_Sector1(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure5Desc];
        $statuses    = ['elective'];
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function ActivateAdditionalMeasures_Tier2_Program_NW_Sector1(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure5Desc];
        $statuses    = ['elective'];
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    
    /**
     * @group check
     */
    
    public function AfterAdditionalMeasuresActivation_UpdateDefineTotalsValuesForProgramChecklist_Tier2_Program_NW_ToHigherError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '4', $error = "must be less than or equal to 3");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '2', $error = "must be less than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '4', $error = "must be less than or equal to 3");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '2', $error = "must be less than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '11', $error = "must be less than or equal to 3");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '8', $error = "must be less than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '22', $error = "must be less than or equal to 3");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '34', $error = "must be less than or equal to 1");
    }
    
    /**
     * @group check
     */
    
    public function AfterAdditionalMeasuresActivation_UpdateDefineTotalsValuesForProgramChecklist_Tier2_Program_NW_ToLessError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '1', $error = "must be greater than or equal to 2");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '0', $error = "must be greater than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '0', $error = "must be greater than or equal to 1");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
//                                                           $value = '1', $error = "must be greater than or equal to 0");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
                                                           $value = '0', $error = "must be greater than or equal to 1");
        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
                                                           $value = '0', $error = "must be greater than or equal to 1");
    }
    
    /**
     * @group check
     */
    
    public function AfterAdditionalMeasuresActivation_UpdatePointsValuesForProgramChecklist_Tier2_Program_W_ToHigherError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'def', $value = '16', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 15.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'lb', $value = '222', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 15.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'll', $value = '21', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 15.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'all', $value = '18', 
                    $error = "Total amount of complete points is greater that sum of points of all active measures in this checklist. Maximum amount of point is 15.");
    }
    
    /**
     * @group check
     */
    
    public function AfterAdditionalMeasuresActivation_UpdatePointsValuesForProgramChecklist_Tier2_Program_W_ToLessError(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'def', $value = '7', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 8.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'lb', $value = '1', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 7.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'll', $value = '2', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 8.");
        $I->CheckValidationErrorWhenUpdatePointsValue($extension = 'all', $value = '0', 
                    $error = "Total amount of complete points is less that sum of points of Sector Checklist. Minimum amount of point is 8.");
    }
    
    
    public function UpdateChecklistPoints_Tier2_Program_W_Sector1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->UpdateChecklistPoints($points_Default = '11', $points_LB = '9', $points_LL = '12', $points_LL_LB = '15');
        $I->CheckSavedChecklistPoints($points_Default = '11', $points_LB = '9', $points_LL = '12', $points_LL_LB = '15');
    }
    
    public function UpdateChecklistDefineTotals_Tier2_Program_NW_Sector1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->UpdateDefineTotalValue($extension = 'def', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '3');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1 = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '3');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    
    public function ActivateAdditionalMeasures_Tier2_Program_W_Sector2(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure5Desc];
        $statuses    = ['elective'];
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->UpdateChecklistPoints($points_Default = '11', $points_LB = '9', $points_LL = '12', $points_LL_LB = '15');
        $I->CheckSavedChecklistPoints($points_Default = '11', $points_LB = '9', $points_LL = '12', $points_LL_LB = '15');
    }
    
    public function ActivateAdditionalMeasures_Tier2_Program_NW_Sector2(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure5Desc];
        $statuses    = ['elective'];
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        $I->wait(1);
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '3');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1 = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '3');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    public function LogOut1(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //-----------Business registration. Program&Sector with checklist-----------
    public function Business1_BusinessRegister_Program_W_Sector1(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("fn_W_");
        $lastName         = $I->GenerateNameOf("ln_W_");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1_Prog_W_S1 = $I->GenerateNameOf("busnamProg_W_S1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip_W;
        $city             = $this->city_W;
        $website          = 'fgfh.fh';
        $busType          = $this->sector1;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
        $I->click(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(4);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->canSee("Print Tier 2", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
    }
    
    public function LogOut11(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
    }
    
    //-----------Business registration. Program&Sector with checklist-----------
    public function Business2_BusinessRegister_Program_NW_Sector2(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("fn_NW_");
        $lastName         = $I->GenerateNameOf("ln_NW_");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2_Prog_NW_S2 = $I->GenerateNameOf("busnamProg_NW_S2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip_NW;
        $city             = $this->city_NW;
        $website          = 'fgfh.fh';
        $busType          = $this->sector2;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 200);
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
        $I->click(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->wait(4);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton);
        $I->canSee("Print Tier 2", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
    }
    
    public function LogOut_AndLoginAsAdmin(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group check
     */
    
    public function Check_Blocked_SectorChecklist_S1_Tier2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version1));
        
        $I->canSeeElement(Page\SectorChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\SectorChecklistManage::OnlyViewModeMessage, Page\SectorChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\SectorChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\SectorChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\SectorChecklistManage::OnlyViewModeMessage, Page\SectorChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\SectorChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\SectorChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\SectorChecklistManage::OnlyViewModeMessage, Page\SectorChecklistManage::$OnlyViewModeAlert);
    }
    
    /**
     * @group check
     */
    
    public function Check_Blocked_ProgramChecklist_S1_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    /**
     * @group check
     */
    
    public function Check_Not_Blocked_ProgramChecklist_S1_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    public function Clone_Tier2_SectorChecklist_S1_AndPublishNewVersion(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector1_T2_version1));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->click(Page\SectorChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(3);
        
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector1_T2_version1));
        $this->id_SC_Sector1_T2_version2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee('Draft', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version2));
        $I->UpdateChecklistPoints($points_Default = '10', $points_LB = '10', $points_LL = '6', $points_LL_LB = '8');
        $I->UpdateDefineTotalValue($extension = 'def', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group1 = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, $value = '0');
        $I->UpdateDefineTotalValue($extension = 'll', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1 = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'all', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '0');
        $I->PublishSectorChecklistStatus('1');
    }
    
    public function Clone_Tier2_SectorChecklist_S2_AndPublishNewVersion(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector2_T2_version1));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->click(Page\SectorChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(3);
        
        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector2_T2_version1));
        $this->id_SC_Sector2_T2_version2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee('Draft', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector2_T2_version2));
        $I->UpdateChecklistPoints($points_Default = '10', $points_LB = '10', $points_LL = '6', $points_LL_LB = '8');
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group1 = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, $value = '0');
        $I->UpdateDefineTotalValue($extension = 'll', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1 = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'all', $group1 = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, $value = '0');
        $I->PublishSectorChecklistStatus('1');
    }
    
    
    
    public function CheckNewPublishedVersion_S1_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_W_Sector1_T2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $this->id_old1_PC_W_Sector1_T2 = $this->id_PC_W_Sector1_T2;
        $this->id_PC_W_Sector1_T2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->CheckSavedChecklistPoints($points_Default = '11', $points_LB = '10', $points_LL = '12', $points_LL_LB = '15');
    }
    
    public function CheckThatVersionIsUpdated_PublishedVersion_S1_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector1_T2));
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->cantSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->id_PC_NW_Sector1_T2, Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    /**
     * @group check
     */
    
    public function Check_OldVersion_ProgramChecklist_S1_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_old1_PC_W_Sector1_T2));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->CheckSavedChecklistPoints($points_Default = '11', $points_LB = '9', $points_LL = '12', $points_LL_LB = '15');
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    
    public function CheckNewPublishedVersion_S2_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_W_Sector2_T2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->cantSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->id_PC_W_Sector2_T2, Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        $I->CheckSavedChecklistPoints($points_Default = '11', $points_LB = '10', $points_LL = '12', $points_LL_LB = '15');
    }
    
    public function CheckThatVersionIsUpdated_PublishedVersion_S2_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector2_T2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $this->id_old1_PC_NW_Sector2_T2 = $this->id_PC_NW_Sector2_T2;
        $this->id_PC_NW_Sector2_T2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    /**
     * @group check
     */
    
    public function Check_OldVersion_ProgramChecklist_S2_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_old1_PC_NW_Sector2_T2));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '4', $llCount = '4', $allCount = '4');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '3', $llCount = '0', $allCount = '4');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    public function Help1_18_GetID_Business1(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1_Prog_W_S1));
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1_Prog_W_S1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business1_Prog_W_S1 = $u1[1];
        $I->comment("Business1 id: $this->id_business1_Prog_W_S1.");
    }
    
    public function Help1_18_GetID_Business2(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2_Prog_NW_S2));
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2_Prog_NW_S2), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->id_business2_Prog_NW_S2 = $u2[1];
        $I->comment("Business2 id: $this->id_business2_Prog_NW_S2.");
    }
    
    public function Business1_ChangeStatusToRequiresRenewal(AcceptanceTester $I){
        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1_Prog_W_S1));
        
        $I->cantSee(\Page\BusinessChecklistView::RequiresRenewalStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->cantSee(\Page\BusinessChecklistView::RecertifyStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
    }
    
    public function Business2_ChangeStatusToRequiresRenewal(AcceptanceTester $I){
        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business2_Prog_NW_S2));
        
        $I->cantSee(\Page\BusinessChecklistView::RequiresRenewalStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->cantSee(\Page\BusinessChecklistView::RecertifyStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
    }
    
    //-----------------------Activate Tier 1 for Program1-----------------------
    public function ActivateAndUpdateTier1_Program_W(\Step\Acceptance\Tier $I) {
        $program    = $this->program_W;
        $tier1      = '1';
        $tier1Name  = $this->tier1 = "tiername1";
        $tier1Desc  = 'tier desc';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageTiers($program, $tier1='1', $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    //-----------------------Activate Tier 1 for Program2-----------------------
    public function ActivateAndUpdateTier1_Program_NW(\Step\Acceptance\Tier $I) {
        $program    = $this->program_NW;
        $tier1      = '1';
        $tier1Name  = $this->tier1 = "tiername1";
        $tier1Desc  = 'tier desc';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageTiers($program, $tier1='1', $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    public function Create_SectorChecklist_Sector1_ForTier1(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector1;
        $tier     = '1';
        $descs    = [$this->measure3Desc, $this->measure7Desc];
        $group1   = Page\AuditGroupList::Energy_AuditGroup;
                
        $this->id_SC_Sector1_T1_version1 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 1', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 1');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version1);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '0');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '0');
        
        $I->UpdateChecklistPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
        $I->PublishSectorChecklistStatus();
    }
    
    public function Create_SectorChecklist_Sector2_ForTier1(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector2;
        $tier     = '1';
        $descs    = [$this->measure3Desc, $this->measure7Desc];
        $group1   = Page\AuditGroupList::Energy_AuditGroup;
                
        $this->id_SC_Sector2_T1_version1 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 1', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 1');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version1);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '0');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '0');
        
        $I->UpdateChecklistPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
        $I->PublishSectorChecklistStatus();
    }
    
    
    public function AfterActivationTier1_CheckPublishedChecklistForPrograms(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSee('8', Page\ChecklistList::$SummaryCount);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 2'));
        
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'tiername1'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee('8', Page\ChecklistList::$SummaryCount);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 2'));
        
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'tiername1'));
    }
    
    public function GetProgramChecklistID_Tier1_W_S1(\Step\Acceptance\Checklist $I) {
        $this->id_PC_W_Sector1_T1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'tiername1'));
    }
    
    public function GetProgramChecklistID_Tier1_NW_S1(\Step\Acceptance\Checklist $I) {
        $this->id_PC_NW_Sector1_T1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'tiername1'));
    }
    
    public function GetProgramChecklistID_Tier1_W_S2(\Step\Acceptance\Checklist $I) {
        $this->id_PC_W_Sector2_T1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'tiername1'));
    }
    
    public function GetProgramChecklistID_Tier1_NW_S2(\Step\Acceptance\Checklist $I) {
        $this->id_PC_NW_Sector2_T1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'tiername1'));
    }
    
    
    //--------------------------------------Check Sectors Checklist Tier2---------------------------------
    public function NewVersion_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_SC_Sector1_T2_version2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('3'));
        $this->id_SC_Sector1_T2_version3 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_SC_Sector1_T2_version3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        //T2(new) = -meas3 points
        //T2(old, max=15 points): def=11; ll=10; lb=12; all=15  + T1(new, max=10 points): def=8; ll=9; lb=10; all=5
        
        //T2(new) = -meas3 points
        //T2(old, max=10 points): def=10; ll=10; lb=6; all=8  + T1(new, max=10 points): def=8; ll=9; lb=10; all=5
        $I->CheckSavedPoints($points_Default = '15', $points_LB = '16', $points_LL = '16', $points_LL_LB = '12');
    }
    
    /**
     * @group check
     */
    
    public function OldVersion2_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(\Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        //T2(old): def=11; ll=10; lb=12; all=15  + T1(new): def=8; ll=9; lb=10; all=5
        
        //T2(old): def=10; ll=10; lb=6; all=8  + T1(new): def=8; ll=9; lb=10; all=5
        $I->CheckSavedPoints($points_Default = '18', $points_LB = '19', $points_LL = '16', $points_LL_LB = '13');
    }
    
    /**
     * @group check
     */
    
    public function OldVersion1_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(\Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        //T2(old): def=11; ll=10; lb=12; all=15  + T1(new): def=8; ll=9; lb=10; all=5
        
        //T2(old): def=8; ll=7; lb=8; all=8  + T1(new): def=8; ll=9; lb=10; all=5
        $I->CheckSavedPoints($points_Default = '16', $points_LB = '16', $points_LL = '18', $points_LL_LB = '13');
    }
    
    public function NewVersion_SectorChecklist_Sector2_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_SC_Sector2_T2_version2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('3'));
        $this->id_SC_Sector2_T2_version3 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_SC_Sector2_T2_version3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        //T2(new) = -meas3 points
        //T2(old, max=15 points): def=11; ll=10; lb=12; all=15  + T1(new, max=10 points): def=8; ll=9; lb=10; all=5 
        $I->CheckSavedPoints($points_Default = '15', $points_LB = '16', $points_LL = '16', $points_LL_LB = '12');
    }
    
    /**
     * @group check
     */
    
    public function OldVersion2_SectorChecklist_Sector2_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(\Page\SectorChecklistManage::URL($this->id_SC_Sector2_T2_version2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        
        //Need to do. Archived checklist should not include required points from published checklist (tier1)
        //T2(old): def=11; ll=10; lb=12; all=15  + T1(new): def=8; ll=9; lb=10; all=5
        $I->CheckSavedPoints($points_Default = '18', $points_LB = '19', $points_LL = '16', $points_LL_LB = '13');
    }
    
    /**
     * @group check
     */
    
    public function OldVersion1_SectorChecklist_Sector2_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(\Page\SectorChecklistManage::URL($this->id_SC_Sector2_T2_version1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        
        //Need to do. Archived checklist should not include required points from published checklist (tier1)
        //T2(old): def=8; ll=7; lb=8; all=8  + T1(new): def=8; ll=9; lb=10; all=5
        $I->CheckSavedPoints($points_Default = '16', $points_LB = '16', $points_LL = '18', $points_LL_LB = '13');
    }
    
    //---------------------------------Check Program Checklists-----------------------------
    public function AfterTier1Adding_CheckNewPublishedVersion_S1_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_W_Sector1_T2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('3'));
        $this->id_old2_PC_W_Sector1_T2 = $this->id_PC_W_Sector1_T2;
        $this->id_PC_W_Sector1_T2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        $I->CheckSavedChecklistPoints($points_Default = '19', $points_LB = '19', $points_LL = '22', $points_LL_LB = '17');
    }
    
    public function AfterTier1Adding_CheckThatVersionIsUpdated_PublishedVersion_S1_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector1_T2));
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->cantSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->id_PC_NW_Sector1_T2, Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    /**
     * @group check
     */
    
    public function AfterTier1Adding_Check_OldVersion2_ProgramChecklist_S1_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_old2_PC_W_Sector1_T2));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        //T2(old): def=11; ll=10; lb=12; all=15  + T1(new): def=8; ll=9; lb=10; all=5
        $I->CheckSavedChecklistPoints($points_Default = '19', $points_LB = '19', $points_LL = '22', $points_LL_LB = '20');
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    /**
     * @group check
     */
    
    public function AfterTier1Adding_Check_OldVersion1_ProgramChecklist_S1_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_old1_PC_W_Sector1_T2));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        //T2(old): def=11; ll=9; lb=12; all=15  + T1(new): def=8; ll=9; lb=10; all=5
        $I->CheckSavedChecklistPoints($points_Default = '19', $points_LB = '18', $points_LL = '22', $points_LL_LB = '20');
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    
    public function AfterTier1Adding_CheckNewPublishedVersion_S2_Tier2_Program_W(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_W_Sector2_T2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->cantSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->id_PC_W_Sector2_T2, Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        $I->CheckSavedChecklistPoints($points_Default = '19', $points_LB = '19', $points_LL = '22', $points_LL_LB = '17');
    }
    
    public function AfterTier1Adding_NewVersionIsUpdated_PublishedVersion_S2_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector2_T2));
        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
        $this->id_old2_PC_NW_Sector2_T2 = $this->id_PC_NW_Sector2_T2;
        $this->id_PC_NW_Sector2_T2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    /**
     * @group check
     */
    
    public function AfterTier1Adding_Check_OldVersion2_ProgramChecklist_S2_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_old2_PC_NW_Sector2_T2));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '4', $llCount = '4', $allCount = '4');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '3', $llCount = '2', $allCount = '4');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    /**
     * @group check
     */
    
    public function AfterTier1Adding_Check_OldVersion1_ProgramChecklist_S2_Tier2_Program_NW(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_old1_PC_NW_Sector2_T2));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '4', $llCount = '4', $allCount = '4');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '3', $llCount = '0', $allCount = '4');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        $I->click(\Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
    }
    
    
    
    
    public function Create_SectorChecklist_Sector1_ForTier3_DraftVersion1(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector1;
        $tier     = '3';
        $descs    = [$this->measure6Desc, $this->measure8Desc];
        $group1   = Page\AuditGroupList::SolidWaste_AuditGroup;
                
        $this->id_SC_Sector1_T3_version1 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 3');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T3_version1);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateChecklistPoints($points_Default = '16', $points_LB = '19', $points_LL = '20', $points_LL_LB = '26');
    }
    
    public function Create_SectorChecklist_Sector2_ForTier3_DraftVersion1(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector2;
        $tier     = '3';
        $descs    = [$this->measure6Desc, $this->measure8Desc];
        $group1   = Page\AuditGroupList::SolidWaste_AuditGroup;
                
        $this->id_SC_Sector2_T3_version1 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 3');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T3_version1);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateChecklistPoints($points_Default = '16', $points_LB = '19', $points_LL = '20', $points_LL_LB = '26');
    }
    
    
    public function Create_SectorChecklist_Sector1_ForTier3(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector1;
        $tier     = '3';
        $descs    = [$this->measure6Desc, $this->measure8Desc];
        $group1   = Page\AuditGroupList::SolidWaste_AuditGroup;
                
        $this->id_SC_Sector1_T3_version2_published = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 3');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T3_version1);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateChecklistPoints($points_Default = '26', $points_LB = '20', $points_LL = '30', $points_LL_LB = '20');
        $I->PublishSectorChecklistStatus();
    }
    
    public function Create_SectorChecklist_Sector2_ForTier3(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector2;
        $tier     = '3';
        $descs    = [$this->measure6Desc, $this->measure8Desc];
        $group1   = Page\AuditGroupList::SolidWaste_AuditGroup;
                
        $this->id_SC_Sector2_T3_version2_published = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 3');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T3_version1);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateChecklistPoints($points_Default = '26', $points_LB = '20', $points_LL = '30', $points_LL_LB = '20');
        $I->PublishSectorChecklistStatus();
    }
    
    public function Create_SectorChecklist_Sector1_ForTier3_DraftVersion2(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector1;
        $tier     = '3';
        $descs    = [$this->measure1Desc, $this->measure6Desc, $this->measure8Desc, $this->measure9Desc];
        $group1   = Page\AuditGroupList::Energy_AuditGroup;
        $group2   = Page\AuditGroupList::SolidWaste_AuditGroup;
                
        $this->id_SC_Sector1_T3_version3 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 3');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T3_version2);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateChecklistPoints($points_Default = '23', $points_LB = '23', $points_LL = '23', $points_LL_LB = '23');
    }
    
    public function Create_SectorChecklist_Sector2_ForTier3_DraftVersion2(\Step\Acceptance\SectorChecklist $I) {
        $sector   = $this->sector2;
        $tier     = '3';
        $descs    = [$this->measure1Desc, $this->measure6Desc, $this->measure8Desc, $this->measure9Desc];
        $group1   = Page\AuditGroupList::Energy_AuditGroup;
        $group2   = Page\AuditGroupList::SolidWaste_AuditGroup;
                
        $this->id_SC_Sector2_T3_version3 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 3');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T3_version2);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateChecklistPoints($points_Default = '23', $points_LB = '23', $points_LL = '23', $points_LL_LB = '23');
    }
    
    public function AfterPublicationTier3SectorChecklist_CheckPublishedChecklistForPrograms(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
        $I->canSee('8', Page\ChecklistList::$SummaryCount);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 2'));
        
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'tiername1'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee('12', Page\ChecklistList::$SummaryCount);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 2'));
        
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'tiername1'));
        
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 3'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 3'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 3'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 3'));
    }
    
    public function GetProgramChecklistID_Tier3_W_S1(\Step\Acceptance\Checklist $I) {
        $this->id_PC_W_Sector1_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_W, $this->sector1, 'Tier 3'));
    }
    
    public function GetProgramChecklistID_Tier3_NW_S1(\Step\Acceptance\Checklist $I) {
        $this->id_PC_NW_Sector1_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_NW, $this->sector1, 'Tier 3'));
    }
    
    public function GetProgramChecklistID_Tier3_W_S2(\Step\Acceptance\Checklist $I) {
        $this->id_PC_W_Sector2_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_W, $this->sector2, 'Tier 3'));
    }
    
    public function GetProgramChecklistID_Tier3_NW_S2(\Step\Acceptance\Checklist $I) {
        $this->id_PC_NW_Sector2_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program_NW, $this->sector2, 'Tier 3'));
    }
    
//    public function Business1_ChangeStatusToRequiresRenewal2(AcceptanceTester $I){
//        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
//        
//        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1_Prog_W_S1));
//        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
//        $I->wait(5);
//    }
//    
//    public function Business2_ChangeStatusToRequiresRenewal2(AcceptanceTester $I){
//        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
//        
//        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business2_Prog_NW_S2));
//        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
//        $I->wait(5);
//    }
    
    public function ActivateAdditionalMeasures_Tier3_Program_W_Sector1(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure10Desc];
        $statuses    = ['core'];
        $disabled_descs = [$this->measure6Desc, $this->measure8Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc, $this->measure5Desc, $this->measure7Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T3_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '23', $points_LL = '36', $points_LL_LB = '25');
    }
    
    public function UpdateChecklistPoints_Tier3_Program_W_Sector1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T3));
        $I->UpdateChecklistPoints($points_Default = null, $points_LB = '40', $points_LL = '46', $points_LL_LB = '31');
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '40', $points_LL = '46', $points_LL_LB = '31');
    }
    
    public function ActivateAdditionalMeasures_Tier3_Program_NW_Sector1(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure10Desc];
        $statuses    = ['core'];
        $disabled_descs = [$this->measure6Desc, $this->measure8Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc, $this->measure5Desc, $this->measure7Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T3_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function ActivateAdditionalMeasures_Tier3_Program_W_Sector2(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure10Desc];
        $statuses    = ['core'];
        $disabled_descs = [$this->measure6Desc, $this->measure8Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc, $this->measure5Desc, $this->measure7Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_W_WithAdditional_T3_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '23', $points_LL = '36', $points_LL_LB = '25');
    }
    
    public function UpdateChecklistPoints_Tier3_Program_W_Sector2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T3));
        $I->UpdateChecklistPoints($points_Default = null, $points_LB = '40', $points_LL = '46', $points_LL_LB = '31');
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '40', $points_LL = '46', $points_LL_LB = '31');
    }
    
    public function ActivateAdditionalMeasures_Tier3_Program_NW_Sector2(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure10Desc];
        $statuses    = ['core'];
        $disabled_descs = [$this->measure6Desc, $this->measure8Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure3Desc, $this->measure4Desc, $this->measure5Desc, $this->measure7Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC_NW_WithAdditional_T3_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function AddMeasure6_Tier1_Sector1Checklist(\Step\Acceptance\SectorChecklist $I) {
        $addit_descs = [$this->measure6Desc];
        $statuses    = ['core'];
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T1_version1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageSectorChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version2, $this->extensions_default);
    }
    
    public function AddMeasure6_Tier1_Sector2Checklist(\Step\Acceptance\SectorChecklist $I) {
        $addit_descs = [$this->measure6Desc];
        $statuses    = ['core'];
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector2_T1_version1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageSectorChecklist($addit_descs, $statuses);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version2, $this->extensions_default);
    }
    
    
    public function AfterMeasure6AdditionInTier1_CheckPointsAndDefineTotals_SectorChecklist_Sector1_ForTier3_DraftVersion1(\Step\Acceptance\SectorChecklist $I) {
        $group1   = Page\AuditGroupList::SolidWaste_AuditGroup;
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T3_version1));
        
        $I->CheckSavedDefineTotalValue($extension ='def', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension ='def', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='ll', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension ='ll', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension ='lb', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension ='lb', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension ='all', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension ='all', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        
        $I->CheckSavedPoints($points_Default = '16', $points_LB = '19', $points_LL = '20', $points_LL_LB = '20');
    }
    
    public function AfterMeasure6AdditionInTier1_CheckPointsAndDefineTotals_SectorChecklist_Sector1_ForTier3(\Step\Acceptance\SectorChecklist $I) {
        $group1   = Page\AuditGroupList::SolidWaste_AuditGroup;
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T3_version2_published));
        
        $I->CheckSavedDefineTotalValue($extension ='def', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='def', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='ll', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='ll', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='lb', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='lb', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='all', $group1, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='all', $group1, $this->audSubgroup2_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        
        $I->CheckSavedPoints($points_Default = '23', $points_LB = '20', $points_LL = '24', $points_LL_LB = '20');
    }
    
    public function AfterMeasure6AdditionInTier1_CheckPointsAndDefineTotals_SectorChecklist_Sector1_ForTier3_DraftVersion2(\Step\Acceptance\SectorChecklist $I) {
        $group1   = Page\AuditGroupList::Energy_AuditGroup;
        $group2   = Page\AuditGroupList::SolidWaste_AuditGroup;
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T3_version3));
        
        $I->CheckSavedDefineTotalValue($extension ='def', $group1, $this->audSubgroup1_Energy, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='ll', $group1, $this->audSubgroup1_Energy, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='lb', $group1, $this->audSubgroup1_Energy, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='all', $group1, $this->audSubgroup1_Energy, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        
        $I->CheckSavedDefineTotalValue($extension ='def', $group2, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='def', $group2, $this->audSubgroup2_SolidWaste, $coreCount = '1', $elCount ='1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension ='ll', $group2, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='ll', $group2, $this->audSubgroup2_SolidWaste, $coreCount = '1', $elCount ='1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension ='lb', $group2, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='lb', $group2, $this->audSubgroup2_SolidWaste, $coreCount = '1', $elCount ='1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension ='all', $group2, $this->audSubgroup1_SolidWaste, $coreCount = '0', $elCount ='1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension ='all', $group2, $this->audSubgroup2_SolidWaste, $coreCount = '1', $elCount ='1', $requiredElective = '1', $totalRequired = '2');
        
        $I->CheckSavedPoints($points_Default = '23', $points_LB = '23', $points_LL = '23', $points_LL_LB = '23');
    }
    
    public function AfterMeasure6AdditionInTier1_CheckPointsAndDefineTotals_ProgramChecklist_Tier3_Program_W_Sector1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T3));
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '37', $points_LL = '40', $points_LL_LB = '31');
    }
    
    public function AfterMeasure6AdditionInTier1_CheckPointsAndDefineTotals_ProgramChecklist_Tier3_Program_W_Sector2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T3));
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '37', $points_LL = '40', $points_LL_LB = '31');
    }
    
    public function AddMeasure1AndMeasure9ToTier3_Core_Sector2_LL(\Step\Acceptance\SectorChecklist $I) {
        $sectorsArray  = [$this->sector2];
        $measuresIDs   = "$this->idMeasure1,$this->idMeasure9";
        $tierNumber    = "3";
        $measExtension = 'Large Landscape';
        $status        = 'Core';
                
        $I->AddMeasuresToSectorChecklist($sectorsArray, $measuresIDs, $tierNumber, $measExtension, $status);
        $I->wait('5');
        $I->waitForText("Measures were added!", 1000);
    }
    
    public function RemoveMeasure1From_Sector1(\Step\Acceptance\SectorChecklist $I) {
        $sectorsArray  = [$this->sector1];
        $measuresIDs   = "$this->idMeasure1";
                
        $I->RemoveMeasuresFromSectorChecklist($sectorsArray, $measuresIDs);
        $I->wait('5');
        $I->waitForText("Measures were removed!", 1000);
    }
    
    //--------------------------------------Check Sector1 Checklist Tier1---------------------------------
    public function _SectorChecklist_Sector1_ForTier1(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T1_version1));
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        
        $I->CheckSavedPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
    }
    
    //--------------------------------------Check Sector1 Checklist Tier2---------------------------------
    public function _SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $statuses = ['not set', 'core', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version3));
        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        $I->CheckSavedPoints($points_Default = '14', $points_LB = '15', $points_LL = '16', $points_LL_LB = '11');
    }
    
    //--------------------------------------Check Sector1 Checklist Tier3---------------------------------
    public function _SectorChecklist_Sector1_ForTier3(\Step\Acceptance\SectorChecklist $I) {
        $statuses = ['not set', 'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'not set', 'not set'];
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T3_version2_published));
        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        
        $I->CheckSavedPoints($points_Default = '22', $points_LB = '19', $points_LL = '24', $points_LL_LB = '19');
    }
    
    //--------------------------------------Check Sector2 Checklist Tier1---------------------------------
    public function _SectorChecklist_Sector2_ForTier1(\Step\Acceptance\SectorChecklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T1_version1));
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        
        $I->CheckSavedPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
    }
    
    //--------------------------------------Check Sector2 Checklist Tier2---------------------------------
    public function _SectorChecklist_Sector2_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $statuses = ['elective', 'core', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version3));
        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        
        $I->CheckSavedPoints($points_Default = '15', $points_LB = '16', $points_LL = '16', $points_LL_LB = '12');
    }
    
    //--------------------------------------Check Sector2 Checklist Tier3---------------------------------
    public function _SectorChecklist_Sector2_ForTier3(\Step\Acceptance\SectorChecklist $I) {
        $statuses   = ['core',            'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'core',            'not set'];
        $extensions = ['Large Landscape', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
        
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T3_version2_published));
        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        
        $I->CheckSavedPoints($points_Default = '23', $points_LB = '20', $points_LL = '24', $points_LL_LB = '20');
    }
    
    //--------------------------------------Check ProgNW Checklist Tier1---------------------------------
    public function ProgNWChecklist_Sector1_ForTier1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T1));
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
    }
    
    //--------------------------------------Check ProgNW Checklist Tier2---------------------------------
    public function ProgNWChecklist_Sector1_ForTier2(\Step\Acceptance\Checklist $I) {
        $statuses = ['not set', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    //--------------------------------------Check ProgNW Checklist Tier3---------------------------------
    public function ProgNWChecklist_Sector1_ForTier3(\Step\Acceptance\Checklist $I) {
        $statuses = ['not set', 'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'not set', 'core'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    //--------------------------------------Check Sector2 Checklist Tier1---------------------------------
    public function ProgNWChecklist_Sector2_ForTier1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T1));
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
    }
    
    //--------------------------------------Check Sector2 Checklist Tier2---------------------------------
    public function ProgNWChecklist_Sector2_ForTier2(\Step\Acceptance\Checklist $I) {
        $statuses = ['elective', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
    }
    
    //--------------------------------------Check Sector2 Checklist Tier3---------------------------------
    public function ProgNWChecklist_Sector2_ForTier3(\Step\Acceptance\Checklist $I) {
        $statuses   = ['core',            'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'core',            'core'];
        $extensions = ['Large Landscape', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '1', $totalRequired = '3');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '1', $totalRequired = '3');
    }
    
    
    
    
    //--------------------------------------Check ProgW Sector1 Checklist Tier1---------------------------------
    public function ProgWChecklist_Sector1_ForTier1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T1));
        $I->CheckSavedChecklistPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
    }
    
    //--------------------------------------Check ProgW Sector1 Checklist Tier2---------------------------------
    public function ProgWChecklist_Sector1_ForTier2(\Step\Acceptance\Checklist $I) {
        $statuses = ['not set', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedChecklistPoints($points_Default = '19', $points_LB = '19', $points_LL = '21', $points_LL_LB = '16');
    }
    
    //--------------------------------------Check ProgW Sector1 Checklist Tier3---------------------------------
    public function ProgWChecklist_Sector1_ForTier3(\Step\Acceptance\Checklist $I) {
        $statuses = ['not set', 'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'not set', 'core'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '37', $points_LL = '39', $points_LL_LB = '30');
    }
    
    //--------------------------------------Check ProgW Sector2 Checklist Tier1---------------------------------
    public function ProgWChecklist_Sector2_ForTier1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T1));
        $I->CheckSavedChecklistPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
    }
    
    //--------------------------------------Check ProgW Sector2 Checklist Tier2---------------------------------
    public function ProgWChecklist_Sector2_ForTier2(\Step\Acceptance\Checklist $I) {
        $statuses = ['elective', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
        
        $I->CheckSavedChecklistPoints($points_Default = '19', $points_LB = '19', $points_LL = '22', $points_LL_LB = '17');
    }
    
    //--------------------------------------Check ProgW Sector2 Checklist Tier3---------------------------------
    public function ProgWChecklist_Sector2_ForTier3(\Step\Acceptance\Checklist $I) {
        $statuses   = ['core',            'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'core',            'core'];
        $extensions = ['Large Landscape', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
        
        $I->CheckSavedChecklistPoints($points_Default = '30', $points_LB = '37', $points_LL = '40', $points_LL_LB = '31');
    }
    
     //-----------------------Activate Tier 3 for Program1-----------------------
    public function ActivateAndUpdateTier3_Program_W(\Step\Acceptance\Tier $I) {
        $program    = $this->program_W;
        $tier3      = '3';
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3='3', null, null, $tier3OptIn);
    }
    
    //-----------------------Activate Tier 3 for Program2-----------------------
    public function ActivateAndUpdateTier3_Program_NW(\Step\Acceptance\Tier $I) {
        $program    = $this->program_NW;
        $tier3      = '3';
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(1);
        $I->waitPageLoad();
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3='3', null, null, $tier3OptIn);
    }
    
    public function Business1_ChangeStatusToRequiresRenewal2(AcceptanceTester $I){
        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1_Prog_W_S1));
        
        $I->cantSee(\Page\BusinessChecklistView::RequiresRenewalStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->cantSee(\Page\BusinessChecklistView::RecertifyStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
    }
    
    public function Business2_ChangeStatusToRequiresRenewal2(AcceptanceTester $I){
        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business2_Prog_NW_S2));
        
        $I->cantSee(\Page\BusinessChecklistView::RequiresRenewalStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->cantSee(\Page\BusinessChecklistView::RecertifyStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
    }
    
    
//    public function AddMeasure10ToTier1_Core_Sector1_Def(\Step\Acceptance\SectorChecklist $I) {
//        $sectorsArray  = [$this->sector1];
//        $measuresIDs   = "$this->idMeasure10";
//        $tierNumber    = "1";
//        $measExtension = 'Default';
//        $status        = 'Core';
//                
//        $I->AddMeasuresToSectorChecklist($sectorsArray, $measuresIDs, $tierNumber, $measExtension, $status);
//        $I->wait('5');
//        $I->waitForText("Measures were added!", 1000);
//    }
//    
//    //--------------------------------------Check Sector1 Checklist Tier1---------------------------------
//    public function CheckNewVersion_SectorChecklist_Sector1_ForTier1(\Step\Acceptance\SectorChecklist $I) {
//        $statuses = ['not set', 'not set', 'core', 'not set', 'not set', 'core', 'elective', 'not set', 'not set', 'core'];
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector1_T1_version1));
//        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $this->id_SC_Sector1_T1_version2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T1_version2));
//        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->sector1.' Tier 1', \Page\SectorChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | '.$this->sector1.' Tier 1', \Page\SectorChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\SectorChecklistManage::$StatusTitle);
//        $I->canSee($this->sector1.' Tier 1', \Page\SectorChecklistManage::$SectorTierTitle);
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $this->sector1.' Tier 1');
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        
//        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        
//        $I->CheckSavedPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
//    }
//    
//    //--------------------------------------Check Sector1 Checklist Tier2---------------------------------
//    public function CheckNewVersionNotCreated_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
//        $statuses = ['not set', 'core', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector1_T2_version3));
//        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2_version3));
//        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->sector1.' Tier 2', \Page\SectorChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | '.$this->sector1.' Tier 2', \Page\SectorChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\SectorChecklistManage::$StatusTitle);
//        $I->canSee($this->sector1.' Tier 2', \Page\SectorChecklistManage::$SectorTierTitle);
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $this->sector1.' Tier 2');
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        
//        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        
//        $I->CheckSavedPoints($points_Default = '14', $points_LB = '15', $points_LL = '16', $points_LL_LB = '11');
//    }
//    
//    //--------------------------------------Check Sector1 Checklist Tier3---------------------------------
//    public function CheckNewVersionNotCreated_SectorChecklist_Sector1_ForTier3(\Step\Acceptance\SectorChecklist $I) {
//        $statuses = ['not set', 'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector1_T3_version2_published));
//        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T3_version2_published));
//        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->sector1.' Tier 3', \Page\SectorChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | '.$this->sector1.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\SectorChecklistManage::$StatusTitle);
//        $I->canSee($this->sector1.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $this->sector1.' Tier 3');
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        
//        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        
//        $I->CheckSavedPoints($points_Default = '22', $points_LB = '19', $points_LL = '24', $points_LL_LB = '19');
//    }
//    
//    
//    
//    //--------------------------------------Check ProgNW Checklist Tier1---------------------------------
//    public function AfterAddingMeasure10ToTier1_ProgNWChecklist_Sector1_ForTier1(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'not set', 'core', 'not set', 'not set', 'core', 'elective', 'not set', 'not set', 'core'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector1_T1));
//        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->cantSeeElement(Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T1));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->program_NW.':'.$this->sector1, \Page\ChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | tiername1', \Page\ChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'tiername1');
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//    }
//    
//    //--------------------------------------Check ProgNW Checklist Tier2---------------------------------
//    public function AfterAddingMeasure10ToTier1_ProgNWChecklist_Sector1_ForTier2(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T2));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->program_NW.':'.$this->sector1, \Page\ChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | Tier 2', \Page\ChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'Tier 2');
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//    }
//    
//    //--------------------------------------Check ProgNW Checklist Tier3---------------------------------
//    public function AfterAddingMeasure10ToTier1_ProgNWChecklist_Sector1_ForTier3(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'not set', 'core'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector1_T3));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->program_NW.':'.$this->sector1, \Page\ChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | Tier 3', \Page\ChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'Tier 3');
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//    }
//    
//    
//    //--------------------------------------Check ProgW Sector1 Checklist Tier1---------------------------------
//    public function AfterAddingMeasure10ToTier1_ProgWChecklist_Sector1_ForTier1(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'not set', 'core', 'not set', 'not set', 'core', 'elective', 'not set', 'not set', 'core'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_W_Sector1_T1));
//        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $this->id_old1_PC_W_Sector1_T1 = $this->id_PC_W_Sector1_T1;
//        $this->id_PC_W_Sector1_T1 = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T1));
//        $I->canSee($this->program_W.':'.$this->sector1, \Page\ChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | tiername1', \Page\ChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'tiername1');
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        $I->CheckSavedChecklistPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
//    }
//    
//    //--------------------------------------Check ProgW Sector1 Checklist Tier2---------------------------------
//    public function AfterAddingMeasure10ToTier1_ProgWChecklist_Sector1_ForTier2(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T2));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->program_W.':'.$this->sector1, \Page\ChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | Tier 2', \Page\ChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'Tier 2');
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedChecklistPoints($points_Default = '19', $points_LB = '19', $points_LL = '21', $points_LL_LB = '16');
//    }
//    
//    //--------------------------------------Check ProgW Sector1 Checklist Tier3---------------------------------
//    public function AfterAddingMeasure10ToTier1_ProgWChecklist_Sector1_ForTier3(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'not set', 'core'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_W_Sector1_T3));
//        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $this->id_old1_PC_W_Sector1_T3 = $this->id_PC_W_Sector1_T3;
//        $this->id_PC_W_Sector1_T3 = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector1_T3));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->program_W.':'.$this->sector1, \Page\ChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | Tier 3', \Page\ChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'Tier 3');
//        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedChecklistPoints($points_Default = '27', $points_LB = '27', $points_LL = '29', $points_LL_LB = '24');
//    }
//    
//    public function Error_ActivateAdditionalMeasures_Tier1_Program_W_Sector2(\Step\Acceptance\Checklist $I) {
//        $addit_descs = [$this->measure4Desc, $this->measure2Desc];
//        $statuses    = ['elective', 'core'];
//        $disabled_descs = [$this->measure3Desc, $this->measure6Desc, $this->measure7Desc, $this->measure10Desc];
//        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure4Desc, $this->measure5Desc, $this->measure8Desc, $this->measure9Desc];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T1));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->ManageChecklist($addit_descs, $statuses);
//        $I->wait(1);
//        $I->waitForText("Checklist was not updated! You try to change measures that affect the next tier levels. (Points are less than in sector checklist) Checklist ID:$this->id_PC_W_Sector2_T2.", 100);
//    }
//    
//    public function ActivateAdditionalMeasures_Measure2_Tier1_Program_W_Sector2(\Step\Acceptance\Checklist $I) {
//        $statuses_saved = ['not set', 'elective', 'core', 'not set', 'not set', 'core', 'elective', 'not set', 'not set', 'not set'];
//    
//        $addit_descs = [$this->measure2Desc];
//        $statuses    = ['elective'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T1));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->ManageChecklist($addit_descs, $statuses);
//        $I->wait(1);
//        $I->waitForText("Checklist was successfully updated!", 100);
//        $I->waitPageLoad();
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $statuses_saved, $this->extensions_default);
//    }
//    
//    public function Error_ActivateAdditionalMeasures_Measure4_Tier1_Program_W_Sector2(\Step\Acceptance\Checklist $I) {
//        $statuses_saved = ['not set', 'elective', 'core', 'not set', 'not set', 'core', 'elective', 'not set', 'not set', 'not set'];
//    
//        $addit_descs = [$this->measure4Desc];
//        $statuses    = ['elective'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T1));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->ManageChecklist($addit_descs, $statuses);
//        $I->wait(1);
//        $I->waitForText("Checklist was not updated! You try to change measures that affect the next tier levels. (Points are less than in sector checklist) Checklist ID:$this->id_PC_W_Sector2_T2.", 100);
//        $I->waitPageLoad();
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $statuses_saved, $this->extensions_default);
//    }
//    
//    public function Clone_Tier1_ProgW_Checklist_S2_ActivateMeasure4_ErrorWhenTryToPublishNewVersion(\Step\Acceptance\Checklist $I) {
//        $addit_descs = [$this->measure4Desc];
//        $statuses    = ['elective'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_W_Sector2_T1));
//        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->click(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
//        $I->wait(3);
//        
//        $this->id_old1_PC_W_Sector1_T1 = $this->id_PC_W_Sector2_T1;
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_old1_PC_W_Sector1_T1));
//        $this->id_PC_W_Sector2_T1 = $I->grabTextFrom(Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
//        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T1));
//        $I->ManageChecklist($addit_descs, $statuses);
//        
//        $I->PublishChecklistStatus($this->id_PC_W_Sector2_T1, '1', 'ignore');
//        $I->wait(1);
//        $I->waitForText("Checklist didn't published! Wrong required points in $this->sector2 - Tier 2", 100);
//    }
//    
//    public function RemoveMeasure1AndMeasure6_From_Sector2(\Step\Acceptance\SectorChecklist $I) {
//        $sectorsArray  = [$this->sector2];
//        $measuresIDs   = "$this->idMeasure1,$this->idMeasure6";
//                
//        $I->RemoveMeasuresFromSectorChecklist($sectorsArray, $measuresIDs);
//        $I->wait('5');
//        $I->waitForText("Measures were removed!", 1000);
//    }
//    
//    //--------------------------------------Check Sector2 Checklist Tier1---------------------------------
//    public function CheckNewVersion_SectorChecklist_Sector2_ForTier1(\Step\Acceptance\SectorChecklist $I) {
//        $statuses = ['not set', 'not set', 'core', 'not set', 'not set', 'not set', 'elective', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector2_T1_version1));
//        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $this->id_SC_Sector2_T1_version2 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector2_T1_version2));
//        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->sector2.' Tier 1', \Page\SectorChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | '.$this->sector2.' Tier 1', \Page\SectorChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\SectorChecklistManage::$StatusTitle);
//        $I->canSee($this->sector2.' Tier 1', \Page\SectorChecklistManage::$SectorTierTitle);
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $this->sector2.' Tier 1');
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        
//        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
//        
//        $I->CheckSavedPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
//    }
//    
//    //--------------------------------------Check Sector2 Checklist Tier2---------------------------------
//    public function CheckNewVersion_SectorChecklist_Sector2_ForTier2(\Step\Acceptance\SectorChecklist $I) {
//        $statuses = ['not set', 'core', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector2_T2_version3));
//        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $this->id_SC_Sector2_T2_version4 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector2_T2_version4));
//        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->sector2.' Tier 2', \Page\SectorChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | '.$this->sector2.' Tier 2', \Page\SectorChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\SectorChecklistManage::$StatusTitle);
//        $I->canSee($this->sector2.' Tier 2', \Page\SectorChecklistManage::$SectorTierTitle);
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $this->sector2.' Tier 2');
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        
//        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        
//        $I->CheckSavedPoints($points_Default = '14', $points_LB = '15', $points_LL = '16', $points_LL_LB = '11');
//    }
//    
//    //--------------------------------------Check Sector2 Checklist Tier3---------------------------------
//    public function CheckNewVersion_SectorChecklist_Sector2_ForTier3(\Step\Acceptance\SectorChecklist $I) {
//        $statuses = ['not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'elective', 'core', 'not set'];
//        $extensions = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL_VersionTab($this->id_SC_Sector2_T3_version2_published));
//        $I->canSee('Published', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Draft', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $I->canSee('Archived', Page\SectorChecklistManage::StatusLine_VersionHistoryTab('3'));
//        $this->id_SC_Sector2_T3_version4 = $I->grabTextFrom(Page\SectorChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector2_T3_version4));
//        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->canSee($this->sector2.' Tier 3', \Page\SectorChecklistManage::$Title);
//        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | '.$this->sector2.' Tier 3', \Page\SectorChecklistManage::$VersionDateInfo);
//        $I->canSee('Published', \Page\SectorChecklistManage::$StatusTitle);
//        $I->canSee($this->sector2.' Tier 3', \Page\SectorChecklistManage::$SectorTierTitle);
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $this->sector2.' Tier 3');
//        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
//        
//        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
//        
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
////        
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        
//        $I->CheckSavedPoints($points_Default = '22', $points_LB = '19', $points_LL = '24', $points_LL_LB = '19');
//    }
//    
//    //--------------------------------------Check Sector2 Checklist Tier1---------------------------------
//    public function AfterRemovingMeasure1And6_OldVersion_ProgNWChecklist_Sector2_ForTier1(\Step\Acceptance\Checklist $I) {
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T1));
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//    }
//    
//    public function AfterRemovingMeasure1And6_NewVersion_ProgNWChecklist_Sector2_ForTier1(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'not set', 'core', 'not set', 'not set', 'not set', 'elective', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector2_T1));
//        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $this->id_old1_PC_NW_Sector2_T1 = $this->id_PC_NW_Sector2_T1;
//        $this->id_PC_NW_Sector2_T1 = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T1));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '0', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//    }
//    
//    //--------------------------------------Check Sector2 Checklist Tier2---------------------------------
//    public function AfterRemovingMeasure1And6_OldVersion_ProgNWChecklist_Sector2_ForTier2(\Step\Acceptance\Checklist $I) {
//        $statuses = ['elective', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T2));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '2', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '3', $requiredElective = '3', $totalRequired = '3');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//    }
//    
//    public function AfterRemovingMeasure1And6_NewVersion_ProgNWChecklist_Sector2_ForTier2(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector2_T2));
//        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $I->canSee('Archived', \Page\ChecklistManage::StatusLine_VersionHistoryTab('3'));
//        $I->canSee('Archived', \Page\ChecklistManage::StatusLine_VersionHistoryTab('4'));
//        $this->id_old1_PC_NW_Sector2_T2 = $this->id_PC_NW_Sector2_T2;
//        $this->id_PC_NW_Sector2_T2 = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T2));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//    }
//    
//    //--------------------------------------Check Sector2 Checklist Tier3---------------------------------
//    public function AfterRemovingMeasure1And6_OldVersion_ProgNWChecklist_Sector2_ForTier3(\Step\Acceptance\Checklist $I) {
//        $statuses   = ['core',            'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'core',            'core'];
//        $extensions = ['Large Landscape', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T3));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
//                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '1', $totalRequired = '3');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '1', $totalRequired = '3');
//    }
//    
//    public function AfterRemovingMeasure1And6_NewVersion_ProgNWChecklist_Sector2_ForTier3(\Step\Acceptance\Checklist $I) {
//        $statuses   = ['not set', 'not set', 'not set', 'not set', 'not set', 'not set',  'not set', 'elective', 'core',            'core'];
//        $extensions = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_PC_NW_Sector2_T3));
//        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
//        $I->canSee('Archived', \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
//        $this->id_old1_PC_NW_Sector2_T3 = $this->id_PC_NW_Sector2_T3;
//        $this->id_PC_NW_Sector2_T3 = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_NW_Sector2_T3));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
//        
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
//        
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '1', $electiveCount = '1', $requiredElective = '1', $totalRequired = '2');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '1', $totalRequired = '3');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
////                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '1', $totalRequired = '3');
//    }
//    
//    //--------------------------------------Check ProgW Sector2 Checklist Tier1---------------------------------
//    public function AfterRemovingMeasure1And6_ProgWChecklist_Sector2_ForTier1(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'elective', 'core', 'not set', 'not set', 'not set', 'elective', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T1));
//        $I->CheckSavedChecklistPoints($points_Default = '8', $points_LB = '9', $points_LL = '10', $points_LL_LB = '5');
//    }
//    
//    //--------------------------------------Check ProgW Sector2 Checklist Tier2---------------------------------
//    public function AfterRemovingMeasure1And6_ProgWChecklist_Sector2_ForTier2(\Step\Acceptance\Checklist $I) {
//        $statuses = ['not set', 'core', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T2));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $this->extensions_default);
//        
//        $I->CheckSavedChecklistPoints($points_Default = '17', $points_LB = '18', $points_LL = '19', $points_LL_LB = '14');
//    }
//    
//    //--------------------------------------Check ProgW Sector2 Checklist Tier3---------------------------------
//    public function AfterRemovingMeasure1And6_ProgWChecklist_Sector2_ForTier3(\Step\Acceptance\Checklist $I) {
//        $statuses   = ['not set', 'not set', 'not set', 'not set', 'not set', 'not set',  'not set', 'elective', 'core',            'core'];
//        $extensions = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
//        
//        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC_W_Sector2_T3));
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
//        
//        $I->CheckSavedChecklistPoints($points_Default = '28', $points_LB = '36', $points_LL = '40', $points_LL_LB = '28');//ll=37?
//    }
//    
//    public function ActivateAdditionalMeasures_Measure6_Tier3_Sector2(\Step\Acceptance\SectorChecklist $I) {
//        $statuses   = ['core', 'not set', 'not set', 'not set', 'not set', 'elective', 'not set', 'elective', 'core', 'not set'];
//        $extensions = ['Large Landscape', 'Default', 'Default', 'Default', 'Default', 'Default',  'Default', 'Default',  'Large Landscape', 'Default'];
//    
//        $addit_descs = [$this->measure6Desc];
//        $statuses    = ['elective'];
//        
//        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector2_T3_version4));
//        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->ManageSectorChecklist($addit_descs, $statuses);
//        $I->wait(1);
//        $I->waitForText("Checklist was successfully updated!", 100);
//        $I->waitPageLoad();
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses, $extensions);
////        
////        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
////        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
////        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
////                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
////        
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '0', $requiredElective = '0', $totalRequired = '0');
//        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup2_SolidWaste, 
//                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
//        
//        $I->CheckSavedPoints($points_Default = '22', $points_LB = '19', $points_LL = '24', $points_LL_LB = '19');
//    }
}
