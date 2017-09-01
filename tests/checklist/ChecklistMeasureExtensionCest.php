<?php

class ChecklistMeasureExtensionCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
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
    public $city1, $zip1, $program1;
    public $statuses   = ['core', 'elective', 'not set', 'core', 'elective', 'not set', 'core', 'elective', 'not set'];
    public $extensions = ['Default', 'Default', 'Default', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    public $checklistUrl;
    public $business1_LB,      $bus1_busSquire_LB      = '35000', $bus1_landSquire_LB      = '999';
    public $business2_LL,      $bus2_busSquire_LL      = '34999', $bus2_landSquire_LL      = '1000';
    public $business3_LB_LL,   $bus3_busSquire_LB_LL   = '35001', $bus3_landSquire_LB_LL   = '1001'; 
    public $business4_Default, $bus4_busSquire_Default = '17500', $bus4_landSquire_Default = '500';
    
    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StMeasExtens");
        $shortName = 'ME';
        
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
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help2_4_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
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
    
    public function Help1_7_CreateMeasure1_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure3_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure4_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure5_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure6_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure7_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['op1', 'op2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure8_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure9_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['opt1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
//    public function Help1_7_CreateMeasure10_Number_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure10Desc = $I->GenerateNameOf("Description");
//        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
//        $questions      = ['o1'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure10 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help1_7_CreateMeasure11_Number_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure11Desc = $I->GenerateNameOf("Description");
//        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
//        $questions      = ['opt1'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure11 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help1_7_CreateMeasure12_Number_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure12Desc = $I->GenerateNameOf("Description");
//        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
//        $questions      = ['o1'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure12 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityME1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgME1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_15_CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses, $this->extensions);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function MeasExtension1_15_1_CheckLeftColumn_OnManageChecklist(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        $I->click(\Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->fillField(\Page\ChecklistManage::CountOfOptionalEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '1');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->canSee('Core', \Page\ChecklistManage::$IncludedMeasuresForm_CoreTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreLabel);
        $I->canSee('Lg Building:', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreLabel);
        $I->canSee('Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreLabel);
        $I->canSee('Total core required:', \Page\ChecklistManage::$IncludedMeasuresForm_TotalCoreRequiredLabel);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_TotalCoreRequiredValue);
        $I->canSee('Elective', \Page\ChecklistManage::$IncludedMeasuresForm_ElectiveTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveLabel);
        $I->canSee('Lg Building:', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveLabel);
        $I->canSee('Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveLabel);
        $I->canSee('Total elective:', \Page\ChecklistManage::$IncludedMeasuresForm_TotalElectiveLabel);
        $I->canSee('Total elective required:', \Page\ChecklistManage::$IncludedMeasuresForm_TotalElectiveRequiredLabel);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_TotalElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_TotalElectiveRequiredValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedMeasuresForm_TotalValue);
        $I->wait(1);
    }
    
    //--------------------------------------------------------------------------Default Extension On Checklist Preview-------------------------------------------------------
    
    public function MeasExtension1_15_1_CheckDefaultMeasures_Present_Default_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
    }
    
    public function MeasExtension1_15_1_CheckDefaultMeasures_Absent_LB_LL_LBAndLL_NotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
    }
    
    //--------------------------------------------------------------------------LB Extension On Checklist Preview------------------------------------------------------------
    
    public function MeasExtension1_15_1_CheckLBMeasures_Present_Default_LB_LbAndLL_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Building");
        $I->wait(3);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
        $I->wait(1);
        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure8Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure10Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure11Desc));
    }
    
    public function MeasExtension1_15_1_CheckLBMeasures_Absent_LL_NotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Building");
        $I->wait(3);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
        $I->wait(1);
        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure9Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure12Desc));
    }
    
    //--------------------------------------------------------------------------LL Extension On Checklist Preview------------------------------------------------------------
    
    public function MeasExtension1_15_1_CheckLLMeasures_Present_Default_LL_LbAndLL_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Landscape");
        $I->wait(3);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure10Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure11Desc));
    }
    
    public function MeasExtension1_15_1_CheckLLMeasures_Absent_LB_NotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Landscape");
        $I->wait(3);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
//        $I->wait(1);
//        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure7Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure8Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure9Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure12Desc));
    }
    
//    //--------------------------------------------------------------------------LB+LL Extension On Checklist Preview------------------------------------------------------------
//    
//    public function MeasExtension1_15_1_CheckLBAndLLMeasures_Present_AllCoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage($this->checklistUrl);
//        $I->wait(2);
//        $I->click(Page\ChecklistManage::$PreviewButton);
//        $I->wait(2);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Lg Building + Lg Landscape");
//        $I->wait(2);
//        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
//            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
//        }
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
//        $I->wait(2);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->wait(1);
//        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure7Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure8Desc));
////        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure10Desc));
////        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure11Desc));
//    }
//    
//    public function MeasExtension1_15_1_CheckLBAndLLMeasures_Absent_AllNotSet_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage($this->checklistUrl);
//        $I->wait(2);
//        $I->click(Page\ChecklistManage::$PreviewButton);
//        $I->wait(2);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Lg Building + Lg Landscape");
//        $I->wait(2);
//        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
//            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
//        }
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
//        $I->wait(2);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
//        $I->wait(1);
//        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure9Desc));
////        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure12Desc));
//    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------LB business register--------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function MeasExtension1_17_LargeBusiness_Register(Step\Acceptance\Business $I)
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
        $I->wait(8);
    }
    
    public function MeasExtension1_17_1_CheckMeasuresPresent_LB_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LB, LB&LL, Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure10Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure11Desc));
    }
    
    public function MeasExtension1_17_1_CheckMeasuresAbsent_LL_NotSet(AcceptanceTester $I) {
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
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure12Desc));
    }
    
    public function Help1_18_LogOutFromBusiness1(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------LL business register--------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function MeasExtension1_17_LargeLandscape_Register(Step\Acceptance\Business $I)
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
        $I->wait(8);
    }
    
    public function MeasExtension1_17_1_CheckMeasuresPresent_LL_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LL, LB&LL, Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure10Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure11Desc));
    }
    
    public function MeasExtension1_17_1_CheckMeasuresAbsent_LB_NotSet(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LB measures and measures with not set status are absent in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
    }
    
    public function Help1_18_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------LB&LL business register-----------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function MeasExtension1_17_LargeBusinessAndLargeLandscape_Register(Step\Acceptance\Business $I)
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
        $I->wait(8);
    }
    
    public function MeasExtension1_17_1_CheckMeasuresPresent_LL_LB_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that LL, LB, LB&LL, Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure7Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure8Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure10Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure11Desc));
    }
    
    public function MeasExtension1_17_1_CheckMeasuresAbsent_NotSet(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that measures with not set status are absent in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure9Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure12Desc));
    }
    
    public function Help1_18_LogOutFromBusiness3(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Default business register---------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function MeasExtension1_17_Default_Register(Step\Acceptance\Business $I)
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
        $I->wait(8);
    }
    
    public function MeasExtension1_17_1_CheckMeasuresPresent_Default_CoreAndElective(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
    }
    
    public function MeasExtension1_17_1_CheckMeasuresAbsent_LL_LB_LBAndLL_NotSet(AcceptanceTester $I) {
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
    
    public function Help1_18_LogOutFromBusiness4(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
}
