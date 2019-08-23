<?php


class NotWeightedStateCest
{
    public $state, $sector1;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $audSubgroup2_SolidWaste, $id_audSubgroup2_SolidWaste;
    public $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3, $county;
    public $id_program1, $id_program2, $id_program3;
    public $business1_Prog1, $business1_Prog2;
    public $idMeasure1, $measure1Desc, $idMeasure2, $measure2Desc, $idMeasure3, $measure3Desc, $idMeasure4, $measure4Desc, $idMeasure5, $measure5Desc, $idMeasure6, $measure6Desc,
           $idMeasure7, $measure7Desc, $idMeasure8, $measure8Desc, $idMeasure9, $measure9Desc, $idMeasure10, $measure10Desc; 
    public $measuresDesc_SuccessCreated = [];
    public $password = 'Qq!1111111';
    public $todayDate = [];
    public $id_SC_Sector1_T1, $id_SC_Sector1_T2;
    public $id_PC1_Sector1_T1, $id_PC1_Sector1_T2, $id_PC2_Sector1_T1, $id_PC2_Sector1_T2, $id_PC2_Sector1_T3;
    public $id_old1_SC_Sector1_T1, $id_old1_SC_Sector1_T2;
    public $id_old1_PC1_Sector1_T1, $id_old1_PC1_Sector1_T2, $id_old1_PC2_Sector1_T1, $id_old1_PC2_Sector1_T2, $id_old1_PC2_Sector1_T3;
    public $sectors_default = ['Office / Retail'];
    public $statuses_SC_Sector1_T1_version1 = ['core',    'elective', 'not set', 'not set',  'not set', 'elective', 'not set', 'not set', 'not set', 'not set'];
    public $statuses_SC_Sector1_T2_version1 = ['not set', 'not set',  'core',    'elective', 'not set', 'not set' , 'not set', 'not set', 'not set', 'not set'];
    
    public $statuses_SC_Sector1_T1_version2 = ['not set', 'core',    'not set',  'not set',  'elective', 'not set', 'core',    'elective', 'core',    'not set'];
    public $statuses_SC_Sector1_T2_version2 = ['core',    'not set', 'elective', 'elective', 'not set',  'not set', 'not set', 'not set',  'not set', 'not set'];
    
    public $statuses_PC2_WithAdditional_T1_version1 = ['core', 'elective',  'elective',    'not set', 'elective', 'elective' , 'not set', 'not set', 'not set', 'not set'];
    public $statuses_PC2_WithAdditional_T2_version1 = ['elective', 'not set',  'core',    'elective', 'not set', 'not set' , 'core', 'not set', 'not set', 'not set'];
    
    public $statuses_PC2_WithAdditional_T1_version2 = ['not set', 'core',    'elective', 'not set',  'elective', 'not set', 'core',    'elective', 'core',    'not set'];
    public $statuses_PC2_WithAdditional_T2_version2 = ['core',    'not set', 'elective', 'elective', 'not set',  'not set', 'core', 'not set',  'not set', 'not set'];
    
    public $statuses_PC1_WithAdditional_T1_version1 = ['not set', 'core',  'elective',    'not set', 'elective', 'elective' , 'core', 'elective', 'core', 'not set'];
    public $statuses_PC1_WithAdditional_T2_version1 = ['core', 'elective',  'elective',    'elective', 'not set', 'core' , 'elective', 'not set', 'not set', 'elective'];
    
    public $extensions_default     = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default' , 'Default', 'Default', 'Default', 'Default'];
    
    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StSecCheckNW");
        $shortName = 'SCNW';
        
        $I->CreateState($name, $shortName);
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
//        $I->wait(2);
        $count = $I->grabTextFrom(\Page\SectorList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\SectorList::UrlPageNumber($i));
//            $I->wait(1);
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
//        $I->wait(1);
        $I->GetSectorOnPageInList($name);
        $this->sectors_default[] = $this->sector1;
    }
    
    public function CheckManageSectorsList_Empty(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SectorsManage::URL());
//        $I->wait(2);
//        $I->cantSeeElement(\Page\SectorsManage::$SectorRow);
        $I->canSeeElement(\Page\SectorsManage::$EmptyListLabel);
    }
    
    public function CheckSectorsInSectorDropdown_SectorChecklistCreatePage(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SectorChecklistCreate::URL_WithoutStateId());
//        $I->wait(2);
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
        
        $this->id_SC_Sector1_T2 = $I->CreateSectorChecklist($tier, $sector);
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
//        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
//        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroups1ForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
//        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
//        $I->wait(2);
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroups2ForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_SolidWaste = $I->GenerateNameOf("SolWasAudSub2");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
//        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
//        $I->wait(2);
        $this->id_audSubgroup2_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
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
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure10 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Create_SectorChecklist_Sector1_ForTier1(\Step\Acceptance\SectorChecklist $I) {
        $sector             = $this->sector1;
        $tier               = '1';
        $group              = Page\AuditGroupList::SolidWaste_AuditGroup;
        $statuses_def       = ['not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $this->id_SC_Sector1_T1 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' TIER 1', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 1');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses_def, $this->extensions_default);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version1);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->PublishSectorChecklistStatus('1');
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group, $this->audSubgroup1_SolidWaste, $value = '2');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '0', $llCount = '0', $allCount = '0');
        
        $I->UpdateDefineTotalValue($extension = 'lb', $group, $this->audSubgroup1_SolidWaste, $value = '2');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '0', $allCount = '0');
        
        $I->UpdateDefineTotalValue($extension = 'll', $group, $this->audSubgroup1_SolidWaste, $value = '2');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '0');
        
        $I->UpdateDefineTotalValue($extension = 'all', $group, $this->audSubgroup1_SolidWaste, $value = '2');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
    }
    
    public function Update_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $sector             = $this->sector1;
        $tier               = '2';
        $group              = Page\AuditGroupList::SolidWaste_AuditGroup;
        
        $I->amOnPage(\Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1);
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group, $this->audSubgroup1_SolidWaste, $value = '1');
    }
    
    //-------------------------------Create county------------------------------
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city1 and program1-------------------------
    
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
    
    public function CheckManageSectorsList_Program1Sectors(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SectorsManage::URL());
//        $I->wait(2);
        $count = $I->grabTextFrom(\Page\SectorsManage::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\SectorsManage::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\SectorsManage::$SectorRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                $I->canSee($this->program1, \Page\SectorsManage::ProgramLine($j));
                $sectors[]=$I->grabTextFrom(\Page\SectorsManage::SectorLine($j));
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
    
    //--------------------------Create city2 and program2-------------------------
    
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
    
    public function CheckManageSectorsList_Program1_Program2_Sectors(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SectorsManage::URL());
//        $I->wait(2);
        $countAll = $I->grabTextFrom(\Page\SectorsManage::$SummaryCount);
        
        $I->selectOption(Page\SectorsManage::$FilterByProgramSelect, $this->program1);
        $I->wait(1);
        $I->click(Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $count1 = $I->grabTextFrom(\Page\SectorsManage::$SummaryCount);
        $pageCount = ceil($count1/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\SectorsManage::UrlPageNumber($i)."&RelSectorToProgram[program_id]=$this->id_program1");
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\SectorsManage::$SectorRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                $I->canSee($this->program1, \Page\SectorsManage::ProgramLine($j));
                $sectors[]=$I->grabTextFrom(\Page\SectorsManage::SectorLine($j));
            }
        }
        $res1 = array_diff($this->sectors_default, $sectors);
        $res2 = array_diff($sectors, $this->sectors_default);
        if(!empty($res1)){
            $message1 = "Error. Program1 Sectors are Absent in List: ";
            foreach ($res1 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
        if(!empty($res2)){
            $message1 = "Error. Not Default Program1 Sectors are Present in List: ";
            foreach ($res2 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
        
        $I->selectOption(Page\SectorsManage::$FilterByProgramSelect, $this->program2);
        $I->wait(1);
        $I->click(Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $count2 = $I->grabTextFrom(\Page\SectorsManage::$SummaryCount);
        $pageCount = ceil($count1/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\SectorsManage::UrlPageNumber($i)."&RelSectorToProgram[program_id]=$this->id_program2");
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\SectorsManage::$SectorRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                $I->canSee($this->program2, \Page\SectorsManage::ProgramLine($j));
                $sectors[]=$I->grabTextFrom(\Page\SectorsManage::SectorLine($j));
            }
        }
        $res1 = array_diff($this->sectors_default, $sectors);
        $res2 = array_diff($sectors, $this->sectors_default);
        if(!empty($res1)){
            $message1 = "Error. Program2 Sectors are Absent in List: ";
            foreach ($res1 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
        if(!empty($res2)){
            $message1 = "Error. Not Default Program2 Sectors are Present in List: ";
            foreach ($res2 as $el) {
                $message1 .= $el . "\n";
            }                 
            $I->fail($message1);
        }
        
        $countSum = $count1+$count2;
        $I->assertEquals($countSum, $countAll);
    }
    
    public function CheckChecklistList_Empty(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
//        $I->wait(2);
        $I->cantSeeElement(\Page\ChecklistList::IdByIdLine($this->id_SC_Sector1_T2)); 
        
        $I->cantSeeElement(\Page\ChecklistList::IdByIdLine($this->id_SC_Sector1_T1));
        $I->canSeeElement(\Page\ChecklistList::$EmptyListLabel);
    }
    
    public function ActivateSector1_ForProgram1(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SectorsManage::URL());
//        $I->wait(2);
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $this->sector1);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program1, $this->sector1));
        $I->wait(1);
    }
    
    public function CheckPublishedChecklistForProgram1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
//        $I->wait(2); 
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 2'));
        
        $I->cantSeeElement(\Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 1'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->wait(2);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 1'));
        
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 2'));
        $this->id_PC1_Sector1_T1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 1'));
        $this->id_PC1_Sector1_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 2'));
    }
    
    //-----------------------Activate Tier 1 for Program1-----------------------
    public function ActivateAndUpdateTier1_Program1(\Step\Acceptance\Tier $I) {
        $program    = $this->program1;
        $tier1      = '1';
        $tier1Name  = $this->tier1 = "tiername1";
        $tier1Desc  = 'tier desc';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
//        $I->wait(1);
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(10);
        $I->waitPageLoad();
        $I->ManageTiers($program, $tier1='1', $tier1Name, $tier1Desc, $tier1OptIn);
        $I->wait(1);
    }
    
    public function CheckLeftColumnAndDefineTotals_OnManageProgramChecklist_Tier1_Program1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(2);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '2', $requiredElective = '2', $totalRequired = '2');
    }
    
    public function CheckLeftColumnAndDefineTotals_OnManageProgramChecklist_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T2));
//        $I->wait(2);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '1', $electiveCount = '0', $requiredElective = '0', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
    }
    
    public function CheckSectorChecklistMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier1_Program1(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure6Desc];
        $active_descs   = [$this->measure3Desc, $this->measure4Desc, $this->measure5Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function CheckSectorChecklistMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T2));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    
    
//    public function UpdateDefineTotalsValuesForProgramChecklist_Tier1_Program1_ToHigherError(\Step\Acceptance\Checklist $I) {
//        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(3);
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
//                                                           $value = '1', $error = "must be less than or equal to 0");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '3', $error = "must be less than or equal to 2");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
//                                                           $value = '2', $error = "must be less than or equal to 0");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '5', $error = "must be less than or equal to 2");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
//                                                           $value = '11', $error = "must be less than or equal to 0");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '3', $error = "must be less than or equal to 2");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy,
//                                                           $value = '1', $error = "must be less than or equal to 0");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '34', $error = "must be less than or equal to 2");
//    }
//    
//    public function UpdateDefineTotalsValuesForProgramChecklist_Tier1_Program1_ToLessError(\Step\Acceptance\Checklist $I) {
//        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(3);
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '1', $error = "must be greater than or equal to 2");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '0', $error = "must be greater than or equal to 2");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '1', $error = "must be greater than or equal to 2");
//        $I->CheckValidationErrorWhenUpdateDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste,
//                                                           $value = '0', $error = "must be greater than or equal to 2");
//    }
    
    //-----------------------Activate Tier 3 for Program2-----------------------
    public function ActivateAndUpdateTier3_Program2(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier3      = '3';
        $tier3Name  = $this->tier3 = "tiername3";
        $tier3Desc  = 'tier desc';
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
//        $I->wait(1);
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(10);
        $I->waitPageLoad();
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3, $tier3Name, $tier3Desc, $tier3OptIn);
    }
    
    public function ActivateSector1_ForProgram2(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage(\Page\SectorsManage::URL());
//        $I->wait(2);
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $this->sector1);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program2, $this->sector1));
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function CheckPublishedChecklistForProgram2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistList::URL());
//        $I->wait(2); 
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 2'));
        
        $I->cantSeeElement(\Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 1'));
        
        $I->selectOption(\Page\ChecklistList::$FilterByOptInSelect, '');
        $I->click(\Page\ChecklistList::$FilterButton);
        $I->wait(2);
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'tiername1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 2'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 1'));
        $I->canSee('Published', \Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 2'));
        $this->id_PC2_Sector1_T1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 1'));
        $this->id_PC2_Sector1_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 2'));
    }
    
    public function CheckSectorChecklistMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier1_Program2(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure6Desc];
        $active_descs   = [$this->measure3Desc, $this->measure4Desc, $this->measure5Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T1));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function CheckSectorChecklistMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T2));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function ActivateAdditionalMeasures_Tier1_Program2(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure3Desc, $this->measure5Desc];
        $statuses    = ['elective', 'elective'];
        $disabled_descs = [$this->measure1Desc, $this->measure2Desc, $this->measure6Desc];
        $active_descs   = [$this->measure3Desc, $this->measure4Desc, $this->measure5Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T1));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($addit_descs, $statuses);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC2_WithAdditional_T1_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function ActivateAdditionalMeasures_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure1Desc, $this->measure7Desc];
        $statuses    = ['elective', 'core'];
        $disabled_descs = [$this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T2));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC2_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function CheckLeftColumnAndDefineTotals_OnManageProgramChecklist_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T2));
//        $I->wait(2);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
    }
    
    public function LogOut1(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitPageLoad();
        $I->Logout($I);
    }
    
    //-----------Business registration. Program&Sector with checklist-----------
    public function Business1_BusinessRegister_Program2_Sector1(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("fn1_");
        $lastName         = $I->GenerateNameOf("ln1_");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1_Prog2 = $I->GenerateNameOf("busnamProg2_1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip2;
        $city             = $this->city2;
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
    
    public function LogOut_AndLoginAsAdmin(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsAdmin($I);
    }
    
    public function CheckBlocked_SectorChecklist_Tier2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2));
//        $I->wait(2);
        
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
    
    public function CheckNotBlocked_SectorChecklist_Tier1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T1));
//        $I->wait(2);
        
        $I->cantSeeElement(Page\SectorChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\SectorChecklistManage::$VersionHistoryTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSeeElement(Page\SectorChecklistManage::$OnlyViewModeAlert);
        
        $I->click(\Page\SectorChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSeeElement(Page\SectorChecklistManage::$OnlyViewModeAlert);
    }
    
    public function CheckBlocked_ProgramChecklist_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T2));
//        $I->wait(2);
        
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
    
    public function CheckNotBlocked_ProgramChecklist_Tier1_Program1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(2);
        
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
    
    public function CheckNotBlocked_ProgramChecklist_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T2));
//        $I->wait(2);
        
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
    
    public function Create_NewVersion2_SectorChecklist_Sector1_ForTier1(\Step\Acceptance\SectorChecklist $I) {
        $sector             = $this->sector1;
        $tier               = '1';
        $group1              = Page\AuditGroupList::Energy_AuditGroup;
        $group2              = Page\AuditGroupList::SolidWaste_AuditGroup;
        $statuses_def       = ['not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $this->id_old1_SC_Sector1_T1 = $this->id_SC_Sector1_T1;
        $this->id_SC_Sector1_T1 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' TIER 1', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 1', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 1');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses_def, $this->extensions_default);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->PublishSectorChecklistStatus('1');
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '3', $llCount = '3', $allCount = '3');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        
    }
    
    public function Create_NewVersion2_SectorChecklist_Sector1_ForTier2(\Step\Acceptance\SectorChecklist $I) {
        $sector             = $this->sector1;
        $tier               = '2';
        $group1              = Page\AuditGroupList::Energy_AuditGroup;
        $group2              = Page\AuditGroupList::SolidWaste_AuditGroup;
        $statuses_def       = ['not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set', 'not set'];
        
        $this->id_old1_SC_Sector1_T2 = $this->id_SC_Sector1_T2;
        $this->id_SC_Sector1_T2 = $I->CreateSectorChecklist($tier, $sector);
        $I->cantSeePageNotFound($I);
        $I->cantSee('Error');
        $I->canSee($sector.' Tier 2', \Page\SectorChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'DRAFT'.' | '.$sector.' TIER 2', \Page\SectorChecklistManage::$VersionDateInfo);
        $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        $I->canSee($sector.' Tier 2', \Page\SectorChecklistManage::$SectorTierTitle);
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$TierLevelSelect_ManageMeasureTab, $sector.' Tier 2');
        $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Draft');
        $I->CheckSavedValuesOnManageSectorChecklistPage($this->measuresDesc_SuccessCreated, $statuses_def, $this->extensions_default);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version2);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->PublishSectorChecklistStatus('1');
        $I->reloadPage();
        $I->waitPageLoad();
        
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'll', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '1');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
    }
    
    public function CheckMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier1_Program1(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure2Desc, $this->measure5Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc];
        $active_descs   = [$this->measure1Desc, $this->measure3Desc, $this->measure4Desc, $this->measure6Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(2);
        $I->canSee($this->program1.':'.$this->sector1, \Page\ChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | tiername1', \Page\ChecklistManage::$VersionDateInfo);
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'tiername1');
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T1_version2, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '3', $llCount = '3', $allCount = '3');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_PC1_Sector1_T1));
//        $I->wait(2);
        $I->comment("-----           -----Versions 1st row-----           -----");
        $I->canSee($this->id_PC1_Sector1_T1, \Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        
        $I->comment("-----        -----Versions 2nd row absent-----        -----");
        $I->cantSeeElement(\Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
    }
    
    public function CheckMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure2Desc, $this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T2));
//        $I->wait(2);
        $I->canSee($this->program1.':'.$this->sector1, \Page\ChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | TIER 2', \Page\ChecklistManage::$VersionDateInfo);
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'Tier 2');
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version2, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_PC1_Sector1_T2));
//        $I->wait(2);
        $I->comment("-----           -----Versions 1st row-----           -----");
        $I->canSee($this->id_PC1_Sector1_T2, \Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        
        $I->comment("-----        -----Versions 2nd row absent-----        -----");
        $I->cantSeeElement(\Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
    }
    
    public function CheckMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier1_Program2(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure2Desc, $this->measure5Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc];
        $active_descs   = [$this->measure1Desc, $this->measure3Desc, $this->measure4Desc, $this->measure6Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T1));
//        $I->wait(2);
        $I->canSee($this->program2.':'.$this->sector1, \Page\ChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | TIER 1', \Page\ChecklistManage::$VersionDateInfo);
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'Tier 1');
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC2_WithAdditional_T1_version2, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '3', $llCount = '3', $allCount = '3');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '3', $llCount = '3', $allCount = '3');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_PC2_Sector1_T1));
//        $I->wait(2);
        $I->comment("-----           -----Versions 1st row-----           -----");
        $I->canSee($this->id_PC2_Sector1_T1, \Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        
        $I->comment("-----        -----Versions 2nd row absent-----        -----");
        $I->cantSeeElement(\Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
    }
    
    public function CheckMeasuresActiveAndBlocked_OnManageProgramChecklist_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure1Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure2Desc, $this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $this->id_old1_PC2_Sector1_T2 = $this->id_PC2_Sector1_T2;
        $I->amOnPage(\Page\ChecklistList::URL());
//        $I->wait(2); 
        $this->id_PC2_Sector1_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 2'));
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T2));
//        $I->wait(2);
        $I->canSee($this->program2.':'.$this->sector1, \Page\ChecklistManage::$Title);
        $I->canSee('VERSION:'.$this->todayDate.' - '.'PUBLISHED'.' | TIER 2', \Page\ChecklistManage::$VersionDateInfo);
        $I->canSee('Published', \Page\ChecklistManage::$StatusTitle);
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$TierLevelSelect_ManageMeasureTab, 'Tier 2');
        $I->canSeeOptionIsSelected(\Page\ChecklistManage::$VersionToEditSelect_ManageMeasureTab, $this->todayDate.' - Published');
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC2_WithAdditional_T2_version2, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_PC2_Sector1_T2));
//        $I->wait(2);
        $I->comment("-----           -----Versions 1st row-----           -----");
        $I->canSee($this->id_PC2_Sector1_T2, \Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->comment("-----           -----Versions 2nd row-----           -----");
        $I->canSee($this->id_old1_PC2_Sector1_T2, \Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $I->canSee('Archived', \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::CreatedLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, \Page\ChecklistManage::UpdatedLine_VersionHistoryTab('2'));
        $I->canSeeElement(\Page\ChecklistManage::ViewButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(\Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->comment("-----        -----Versions 3rd row absent-----        -----");
        $I->cantSeeElement(\Page\ChecklistManage::IdLine_VersionHistoryTab('3'));
    }
    
    public function Check_OldVersion_SectorChecklist_Tier2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_old1_SC_Sector1_T2));
//        $I->wait(2);
        
        $I->canSeeElement(Page\SectorChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\SectorChecklistManage::OnlyViewModeMessage, Page\SectorChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\SectorChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_SC_Sector1_T2_version1, $this->extensions_default);
        
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
    
    public function Check_OldVersion_ProgramChecklist_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $disabled_descs = [$this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure1Desc, $this->measure2Desc, $this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_old1_PC2_Sector1_T2));
//        $I->wait(2);
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(3);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC2_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '1', $lbCount = '1', $llCount = '1', $allCount = '1');
        
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'def', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'lb', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'll', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy, 
                                       $coreCount = '2', $electiveCount = '1', $requiredElective = '0', $totalRequired = '2');
        $I->CheckSavedDefineTotalValue($extension = 'all', $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste, 
                                       $coreCount = '0', $electiveCount = '1', $requiredElective = '1', $totalRequired = '1');
        
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
    
    
    
    
    public function ActivateAdditionalMeasures_Tier1_Program1(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure3Desc, $this->measure6Desc];
        $statuses    = ['elective', 'elective'];
        $disabled_descs = [$this->measure2Desc, $this->measure5Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc];
        $active_descs   = [$this->measure1Desc, $this->measure3Desc, $this->measure4Desc, $this->measure6Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC1_WithAdditional_T1_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function UpdateDefineTotals_Tier1_Program1(\Step\Acceptance\Checklist $I) {
        
        $group1              = Page\AuditGroupList::Energy_AuditGroup;
        $group2              = Page\AuditGroupList::SolidWaste_AuditGroup;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(2);
        $I->UpdateDefineTotalValue($extension = 'def', $group1, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup1_SolidWaste, $value = '1');
        
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '2');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '3', $lbCount = '3', $llCount = '3', $allCount = '3');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '4', $llCount = '4', $allCount = '4');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '3', $llCount = '2', $allCount = '3');
        
    }
    
    public function ActivateAdditionalMeasures_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        $addit_descs = [$this->measure2Desc, $this->measure6Desc, $this->measure7Desc, $this->measure10Desc];
        $statuses    = ['elective', 'core', 'elective', 'elective'];
        $disabled_descs = [$this->measure1Desc, $this->measure3Desc, $this->measure4Desc];
        $active_descs   = [$this->measure2Desc, $this->measure5Desc, $this->measure6Desc, $this->measure7Desc, $this->measure8Desc, $this->measure9Desc, $this->measure10Desc];
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T2));
//        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->waitPageLoad();
        $I->ManageChecklist($addit_descs, $statuses);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->waitPageLoad();
        $I->CheckSavedValuesOnManageProgramChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses_PC1_WithAdditional_T2_version1, $this->extensions_default);
        $I->CheckStatusSelectsForEditingOnManageProgramChecklistPage(null, $active_descs, $disabled_descs);
    }
    
    public function UpdateDefineTotals_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        
        $group1              = Page\AuditGroupList::Energy_AuditGroup;
        $group2              = Page\AuditGroupList::SolidWaste_AuditGroup;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_PC1_Sector1_T2));
//        $I->wait(2);
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup1_SolidWaste, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'def', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateDefineTotalValue($extension = 'lb', $group1, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'lb', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->UpdateDefineTotalValue($extension = 'll', $group1, $this->audSubgroup1_Energy, $value = '2');
        
        $I->UpdateDefineTotalValue($extension = 'all', $group1, $this->audSubgroup1_Energy, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup1_SolidWaste, $value = '2');
        $I->UpdateDefineTotalValue($extension = 'all', $group2, $this->audSubgroup2_SolidWaste, $value = '1');
        
        $I->Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = '2', $lbCount = '2', $llCount = '2', $allCount = '2');
        $I->Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = '5', $lbCount = '5', $llCount = '5', $allCount = '5');
        $I->Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = '4', $lbCount = '4', $llCount = '3', $allCount = '5');
    }
    
    public function LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
        $I->Logout($I);
    }
    
    //-----------Business registration. Program&Sector with checklist-----------
    public function Business2_BusinessRegister_Program1_Sector1(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("fn1_");
        $lastName         = $I->GenerateNameOf("ln1_");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1_Prog1 = $I->GenerateNameOf("busnamProg1_1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
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
        $I->canSee("Print tiername1", Page\RegistrationStarted::LeftMenu_PrintTierButton(1));
        $I->canSee("Print Tier 2", Page\RegistrationStarted::LeftMenu_PrintTierButton(2));
    }
    
    public function LogOut_AndLoginAsAdmin2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->waitPageLoad();
        $I->Logout($I);
        $I->waitPageLoad();
        $I->LoginAsAdmin($I);
    }
    
    public function CheckBlocked_SectorChecklist_Tier2_2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T2));
//        $I->wait(2);
        
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
    
    public function CheckBlocked_SectorChecklist_Tier1_2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\SectorChecklistManage::URL($this->id_SC_Sector1_T1));
//        $I->wait(2);
        
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
    
    public function CheckNotBlocked_ProgramChecklist_Tier2_Program2_2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC2_Sector1_T2));
//        $I->wait(2);
        
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
    
    public function CheckBlocked_ProgramChecklist_Tier1_Program1_2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T1));
//        $I->wait(2);
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
    
    public function CheckBlocked_ProgramChecklist_Tier2_Program1_2(\Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\ChecklistManage::URL($this->id_PC1_Sector1_T2));
//        $I->wait(2);
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
}
