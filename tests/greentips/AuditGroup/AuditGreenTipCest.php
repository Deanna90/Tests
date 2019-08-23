<?php
//namespace AuditGroup;
//use \AcceptanceTester;

class AuditGreenTipCest
{
    public $state, $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3, $county;
    public $id_gt1, $gt1_desc, $gt1_title;
    public $id_gt2, $gt2_desc, $gt2_title;
    public $id_gt3, $gt3_desc, $gt3_title;
    public $audSubgroup1_Energy, $audSubgroup2_Energy;
    public $audSubgroup1_PolutionPrevention;
    public $audSubgroup1_General, $audSubgroup2_General;
    public $audSubgroup1_SolidWaste;
    public $audSubgroup1_Transportation, $audSubgroup2_Transportation;
    public $audSubgroup1_Wastewater;
    public $audSubgroup1_Water;
    public $id_checklist1, $id_checklist2, $id_checklist3;
    public $measuresDesc_SuccessCreated = [];
    public $statuses1             = ['core', 'elective', 'core', 'elective', 'core', 'elective', 'core', 'elective', 'core', 'core', 'elective'];
    public $statuses2             = ['elective', 'core', 'elective', 'core', 'elective', 'core', 'elective', 'core', 'elective', 'elective', 'core'];
    

    public function Help1_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StateAGT");
        $shortName = 'AGT';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help1_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function AuditGT1_4_CheckAllProgramsAreAbsentInProgramSelectOnCreatePage(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\AuditGreenTipCreate::URL());
        $I->wait(1);
        $I->click(\Page\AuditGreenTipCreate::$ProgramSelect);
        $I->wait(1);
        $I->cantSeeElement(\Page\AuditGreenTipCreate::selectProgramOption('1'));
    }
    
    //-------------------------------Create county------------------------------
    public function CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    public function Help1_5_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city      = $this->city1 = $I->GenerateNameOf("CityAGT1");
        $state     = $this->state;
        $zips      = $this->zip1 = $I->GenerateZipCode();
        $program   = $this->program1 = $I->GenerateNameOf("ProgAGT1");
        $cityArray = [$city];
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArray);
    }
    
    public function AuditGT1_5_1_CreateAuditGreenTip(\Step\Acceptance\GreenTipForAuditGroup $I)
    {
        $title   = $this->gt1_title = $I->GenerateNameOf("titleAGT1");
        $desc    = $this->gt1_desc = $I->GenerateNameOf("greennnt1_AGT");
        $program = [$this->program1];
        
        $I->CreateAuditGreenTip($title, $desc, $program);
        $I->amOnPage(\Page\AuditGreenTipList::URL());
        $I->wait(1);
        $this->id_gt1 = $I->grabTextFrom(\Page\AuditGreenTipList::IdLine_ByTitleValue($title));
    }
    
    public function AuditGT1_4_CheckAllSubgroupsAreAbsentInAuditSubgroupSelect_OnAddingAuditGroupsPopup(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\AuditGreenTipUpdate::URL($this->id_gt1));
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->cantSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption('2'));
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->cantSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption('2'));
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->cantSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption('2'));
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->cantSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption('2'));
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Transportation_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->cantSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption('2'));
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Wastewater_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->cantSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption('2'));
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->cantSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption('2'));
    }
    
    public function Help1_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Energy audit group");
        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $name2      = $this->audSubgroup2_Energy = $I->GenerateNameOf("EnAudSub2");
        $auditGroup = \Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_4_CreateMeasure1(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas1");
        $auditGroup    = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_Energy;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateMeasure2(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas2");
        $auditGroup    = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup = $this->audSubgroup2_Energy;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateAuditSubGroupForPollutionPreventionGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Pollution Prevention audit group");
        $name1      = $this->audSubgroup1_PolutionPrevention = $I->GenerateNameOf("PolPrevAudSub1");
        $auditGroup = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_4_CreateMeasure3(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas3");
        $auditGroup    = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_PolutionPrevention;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateAuditSubGroupForGeneralGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for General audit group");
        $name1      = $this->audSubgroup1_General = $I->GenerateNameOf("GenAudSub1");
        $name2      = $this->audSubgroup2_General = $I->GenerateNameOf("GenAudSub2");
        $auditGroup = \Page\AuditGroupList::General_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_4_CreateMeasure4(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas4");
        $auditGroup    = \Page\AuditGroupList::General_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_General;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateMeasure5(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas5");
        $auditGroup    = \Page\AuditGroupList::General_AuditGroup;
        $auditSubgroup = $this->audSubgroup2_General;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateAuditSubGroupForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Solid Waste audit group");
        $name1      = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_4_CreateMeasure6(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas6");
        $auditGroup    = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_SolidWaste;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateAuditSubGroupForTransportationGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Transportation audit group");
        $name1      = $this->audSubgroup1_Transportation = $I->GenerateNameOf("TranAudSub1");
        $name2      = $this->audSubgroup2_Transportation = $I->GenerateNameOf("TranAudSub2");
        $auditGroup = \Page\AuditGroupList::Transportation_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_4_CreateMeasure7(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas7");
        $auditGroup    = \Page\AuditGroupList::Transportation_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_Transportation;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateMeasure8(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas8");
        $auditGroup    = \Page\AuditGroupList::Transportation_AuditGroup;
        $auditSubgroup = $this->audSubgroup2_Transportation;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateAuditSubGroupForWastewaterGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Wastewater audit group");
        $name1      = $this->audSubgroup1_Wastewater = $I->GenerateNameOf("WasWatAudSub1");
        $auditGroup = \Page\AuditGroupList::Wastewater_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_4_CreateMeasure9(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas9");
        $auditGroup    = \Page\AuditGroupList::Wastewater_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_Wastewater;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateAuditSubGroupForWaterGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Water audit group");
        $name1      = $this->audSubgroup1_Water = $I->GenerateNameOf("WatAudSub1");
        $auditGroup = \Page\AuditGroupList::Water_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_4_CreateMeasure10(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas10");
        $auditGroup    = \Page\AuditGroupList::Water_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_Water;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_4_CreateMeasure11(\Step\Acceptance\Measure $I)
    {
        $desc          = $I->GenerateNameOf("Meas11");
        $auditGroup    = \Page\AuditGroupList::Water_AuditGroup;
        $auditSubgroup = $this->audSubgroup1_Water;
        $quantitative  = 'yes';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function AuditGT1_5_1_9_CheckAllSubgroupsArePresentInAuditSubgroupSelect_OnAddingAuditGroupsPopup(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\AuditGreenTipUpdate::URL($this->id_gt1));
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Energy));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup2_Energy));
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::General_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_General));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup2_General));
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_PolutionPrevention));
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Transportation_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Transportation));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup2_Transportation));
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Wastewater_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Wastewater));
        $I->wait(1);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Water_AuditGroup);
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, "Select AuditSubGroup");
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName("Select AuditSubGroup"));
        $I->canSeeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Water));
    }
    
    //----------------------------Create checklist------------------------------
    
    
    public function Help_CreateChecklist1ForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist1 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses1);
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist1));
        $I->PublishChecklistStatus($this->id_checklist1);
    }
    
    public function UpdateGreenTip_AddingAllAuditSubgroups(\Step\Acceptance\GreenTipForAuditGroup $I) {
        $I->amOnPage(Page\AuditGreenTipUpdate::URL($this->id_gt1));
        $I->wait(2);
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_Energy);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup2_Energy);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::General_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_General);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::General_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup2_General);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_PolutionPrevention);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_SolidWaste);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::Transportation_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_Transportation);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::Transportation_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup2_Transportation);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::Wastewater_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_Wastewater);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::Water_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_Water);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
    }
    
    
    public function CheckGreenTipFor_Energy_1Subgroup_OnChecklistPreview_Core(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_Energy_2Subgroup_OnChecklistPreview_Elective(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_General_1Subgroup_OnChecklistPreview_Elective(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_General));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_General_2Subgroup_OnChecklistPreview(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_PolutionPrevention_1Subgroup_OnChecklistPreview_Core(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_PollutionPreventionGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_PollutionPreventionGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_PollutionPreventionGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_PolutionPrevention));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_PolutionPrevention));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_SolidWaste_1Subgroup_OnChecklistPreview_Core(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_Transportation_1Subgroup_OnChecklistPreview_Elective(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_TransportationGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Transportation));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Transportation));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_Transportation_2Subgroup_OnChecklistPreview_Core(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_TransportationGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Transportation));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Transportation));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_Wastewater_1Subgroup_OnChecklistPreview_Elective(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_WastewaterGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_WastewaterGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_WastewaterGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Wastewater));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Wastewater));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTipFor_Water_1Subgroup_OnChecklistPreview_CoreAndElective(AcceptanceTester $I) {
        $grTitle  = $this->gt1_title;
        $grDesc   = $this->gt1_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_WaterGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_WaterGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_WaterGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Water));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Water));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
        $gtCount = $I->getAmount($I, 'h4:contains('.$grTitle.')');
        $I->assertEquals('1', $gtCount);
    }
    
    public function Help1_6_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city      = $this->city2 = $I->GenerateNameOf("CityAGT2");
        $state     = $this->state;
        $zips      = $this->zip2 = $I->GenerateZipCode();
        $program   = $this->program2 = $I->GenerateNameOf("ProgAGT2");
        $cityArray = [$city];
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArray);
    }
    
    public function AuditGT1_6_1_CreateAuditGreenTip2(\Step\Acceptance\GreenTipForAuditGroup $I)
    {
        $title   = $this->gt2_title = $I->GenerateNameOf("titleAGT2");
        $desc    = $this->gt2_desc = $I->GenerateNameOf("greennnt2_AGT");
        $program = [$this->program2];
        
        $I->CreateAuditGreenTip($title, $desc, $program);
        $I->amOnPage(\Page\AuditGreenTipList::URL());
        $I->wait(1);
        $this->id_gt2 = $I->grabTextFrom(\Page\AuditGreenTipList::IdLine_ByTitleValue($title));
    }
    
    public function UpdateGreenTip2_AddingAllAuditSubgroups(\Step\Acceptance\GreenTipForAuditGroup $I) {
        $I->amOnPage(Page\AuditGreenTipUpdate::URL($this->id_gt2));
        $I->wait(2);
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_Energy);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        
        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        $I->wait(3);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, Page\AuditGroupList::PollutionPrevention_AuditGroup);
        $I->wait(2);
        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditSubgroupSelect_AddAuditGroupPopup, $this->audSubgroup1_PolutionPrevention);
        $I->wait(1);
        $I->click(\Page\AuditGreenTipUpdate::$AddButton_AddAuditGroupPopup);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
    }
    
    //----------------------------Create checklist------------------------------
    
    
    public function Help_1_6_2_CreateChecklist2_ForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist2 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses2);
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist2));
        $I->PublishChecklistStatus($this->id_checklist2);
    }
    
    public function CheckGreenTipFor_Energy_1Subgroup_OnChecklistPreview_Elective_Present(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_Energy_2Subgroup_OnChecklistPreview_Core_Absent(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_General_1Subgroup_OnChecklistPreview_Core_Absent(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_General));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_General_2Subgroup_OnChecklistPreview_Absent(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_PolutionPrevention_1Subgroup_OnChecklistPreview_Elective_Present(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_PollutionPreventionGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_PollutionPreventionGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_PollutionPreventionGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_PolutionPrevention));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_PolutionPrevention));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->canSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
        $I->canSee($grDesc, \Page\ChecklistPreview::AuditGreenTipDesc_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_SolidWaste_1Subgroup_OnChecklistPreview_Elective(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_Transportation_1Subgroup_OnChecklistPreview_Core(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_TransportationGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Transportation));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Transportation));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_Transportation_2Subgroup_OnChecklistPreview_Elective(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_TransportationGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_TransportationGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Transportation));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Transportation));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_Wastewater_1Subgroup_OnChecklistPreview_Core(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_WastewaterGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_WastewaterGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_WastewaterGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Wastewater));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Wastewater));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    public function CheckGreenTip2For_Water_1Subgroup_OnChecklistPreview_ElectiveAndCore_Absent(AcceptanceTester $I) {
        $grTitle  = $this->gt2_title;
        $grDesc   = $this->gt2_desc;
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(2);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_WaterGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_WaterGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_WaterGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Water));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Water));
        $I->wait(2);
        $I->scrollTo(".row.measure-container");
        $I->wait(1);
        $I->cantSeeElement(\Page\ChecklistPreview::AuditGreenTipTitle_ByTipTitle($grTitle));
    }
    
    
}
