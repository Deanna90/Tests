<?php
//namespace AuditGroup;
//use \AcceptanceTester;

class AuditGreenTipCest
{
    public $state, $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3;
    public $id_gt1;
    public $audSubgroup1_Energy, $audSubgroup2_Energy;
    public $audSubgroup1_PolutionPrevention;
    public $audSubgroup1_General, $audSubgroup2_General;
    public $audSubgroup1_SolidWaste;
    public $audSubgroup1_Transportation, $audSubgroup2_Transportation;
    public $audSubgroup1_Wastewater;
    public $audSubgroup1_Water;

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
        $I->dontSeeElement(\Page\AuditGreenTipCreate::selectProgramOption('1'));
    }
    
    public function Help1_5_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityAGT1");
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgAGT1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $city);
    }
    
    public function AuditGT1_5_1_CreateAuditGreenTip(\Step\Acceptance\GreenTipForAuditGroup $I)
    {
        $title   = $I->GenerateNameOf("titleAGT");
        $desc    = $I->GenerateNameOf("greennnt1_AGT");
        $program = [$this->program1];
        
        $I->CreateAuditGreenTip($title, $desc, $program);
        $I->amOnPage(\Page\AuditGreenTipList::URL());
        $I->wait(1);
        $this->id_gt1 = $I->grabTextFrom(\Page\AuditGreenTipList::IdLine_ByTitleValue($title));
    }
    
//    public function AuditGT1_4_CheckAllSubgroupsAreAbsentInAuditSubgroupSelect_OnAddingAuditGroupsPopup(AcceptanceTester $I)
//    {
//        $I->amOnPage(\Page\AuditGreenTipUpdate::URL($this->id_gt1));
//        $I->wait(1);
//        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Energy_AuditGroup);
//        $I->wait(1);
//        $I->dontSeeElement(\Page\AuditGreenTipUpdate::$AuditSubgroupOption_AddAuditGroupPopup);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::General_AuditGroup);
//        $I->wait(1);
//        $I->dontSeeElement(\Page\AuditGreenTipUpdate::$AuditSubgroupOption_AddAuditGroupPopup);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
//        $I->wait(1);
//        $I->dontSeeElement(\Page\AuditGreenTipUpdate::$AuditSubgroupOption_AddAuditGroupPopup);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::SolidWaste_AuditGroup);
//        $I->wait(1);
//        $I->dontSeeElement(\Page\AuditGreenTipUpdate::$AuditSubgroupOption_AddAuditGroupPopup);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Transportation_AuditGroup);
//        $I->wait(1);
//        $I->dontSeeElement(\Page\AuditGreenTipUpdate::$AuditSubgroupOption_AddAuditGroupPopup);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Wastewater_AuditGroup);
//        $I->wait(1);
//        $I->dontSeeElement(\Page\AuditGreenTipUpdate::$AuditSubgroupOption_AddAuditGroupPopup);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Water_AuditGroup);
//        $I->wait(1);
//        $I->dontSeeElement(\Page\AuditGreenTipUpdate::$AuditSubgroupOption_AddAuditGroupPopup);
//    }
//    
//    public function Help1_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
//    {
//        $I->wantTo("Create audit subgroups for Energy audit group");
//        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
//        $name2      = $this->audSubgroup2_Energy = $I->GenerateNameOf("EnAudSub2");
//        $auditGroup = \Page\AuditGroupList::Energy_AuditGroup;
//        $state      = $this->state;
//        
//        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
//        $I->wait(3);
//        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
//        $I->wait(3);
//    }
//    
//    public function Help1_4_CreateMeasure1(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas1");
//        $auditGroup    = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup = $this->audSubgroup1_Energy;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateMeasure2(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas2");
//        $auditGroup    = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup = $this->audSubgroup2_Energy;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateAuditSubGroupForPollutionPreventionGroup(\Step\Acceptance\AuditSubGroup $I)
//    {
//        $I->wantTo("Create audit subgroups for Pollution Prevention audit group");
//        $name1      = $this->audSubgroup1_PolutionPrevention = $I->GenerateNameOf("PolPrevAudSub1");
//        $auditGroup = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
//        $state      = $this->state;
//        
//        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
//        $I->wait(3);
//    }
//    
//    public function Help1_4_CreateMeasure3(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas3");
//        $auditGroup    = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
//        $auditSubgroup = $this->audSubgroup1_PolutionPrevention;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateAuditSubGroupForGeneralGroup(\Step\Acceptance\AuditSubGroup $I)
//    {
//        $I->wantTo("Create audit subgroups for General audit group");
//        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("GenAudSub1");
//        $name2      = $this->audSubgroup2_Energy = $I->GenerateNameOf("GenAudSub2");
//        $auditGroup = \Page\AuditGroupList::General_AuditGroup;
//        $state      = $this->state;
//        
//        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
//        $I->wait(3);
//        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
//        $I->wait(3);
//    }
//    
//    public function Help1_4_CreateMeasure4(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas4");
//        $auditGroup    = \Page\AuditGroupList::General_AuditGroup;
//        $auditSubgroup = $this->audSubgroup1_General;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateMeasure5(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas5");
//        $auditGroup    = \Page\AuditGroupList::General_AuditGroup;
//        $auditSubgroup = $this->audSubgroup2_General;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateAuditSubGroupForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
//    {
//        $I->wantTo("Create audit subgroups for Solid Waste audit group");
//        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("SolWasAudSub1");
//        $auditGroup = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $state      = $this->state;
//        
//        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
//        $I->wait(3);
//    }
//    
//    public function Help1_4_CreateMeasure6(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas6");
//        $auditGroup    = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $auditSubgroup = $this->audSubgroup1_SolidWaste;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateAuditSubGroupForTransportationGroup(\Step\Acceptance\AuditSubGroup $I)
//    {
//        $I->wantTo("Create audit subgroups for Transportation audit group");
//        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("TranAudSub1");
//        $name2      = $this->audSubgroup2_Energy = $I->GenerateNameOf("TranAudSub2");
//        $auditGroup = \Page\AuditGroupList::Transportation_AuditGroup;
//        $state      = $this->state;
//        
//        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
//        $I->wait(3);
//        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
//        $I->wait(3);
//    }
//    
//    public function Help1_4_CreateMeasure7(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas7");
//        $auditGroup    = \Page\AuditGroupList::Transportation_AuditGroup;
//        $auditSubgroup = $this->audSubgroup1_Transportation;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateMeasure8(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas8");
//        $auditGroup    = \Page\AuditGroupList::Transportation_AuditGroup;
//        $auditSubgroup = $this->audSubgroup2_Transportation;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateAuditSubGroupForWastewaterGroup(\Step\Acceptance\AuditSubGroup $I)
//    {
//        $I->wantTo("Create audit subgroups for Wastewater audit group");
//        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("WasWatAudSub1");
//        $auditGroup = \Page\AuditGroupList::Wastewater_AuditGroup;
//        $state      = $this->state;
//        
//        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
//        $I->wait(3);
//    }
//    
//    public function Help1_4_CreateMeasure9(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas9");
//        $auditGroup    = \Page\AuditGroupList::Wastewater_AuditGroup;
//        $auditSubgroup = $this->audSubgroup1_Wastewater;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function Help1_4_CreateAuditSubGroupForWaterGroup(\Step\Acceptance\AuditSubGroup $I)
//    {
//        $I->wantTo("Create audit subgroups for Water audit group");
//        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("WatAudSub1");
//        $auditGroup = \Page\AuditGroupList::Water_AuditGroup;
//        $state      = $this->state;
//        
//        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
//        $I->wait(3);
//    }
//    
//    public function Help1_4_CreateMeasure10(\Step\Acceptance\Measure $I)
//    {
//        $desc          = $I->GenerateNameOf("Meas10");
//        $auditGroup    = \Page\AuditGroupList::Water_AuditGroup;
//        $auditSubgroup = $this->audSubgroup1_Water;
//        $quantitative  = 'yes';
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative);
//    }
//    
//    public function AuditGT1_5_1_9_CheckAllSubgroupsAreAbsentInSAuditSubgroupSelect_OnAddingAuditGroupsPopup(AcceptanceTester $I)
//    {
//        $I->amOnPage(\Page\AuditGreenTipUpdate::URL($this->id_gt1));
//        $I->wait(1);
//        $I->click(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Energy_AuditGroup);
//        $I->wait(1);
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Energy));
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup2_Energy));
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::General_AuditGroup);
//        $I->wait(1);
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_General));
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup2_General));
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::PollutionPrevention_AuditGroup);
//        $I->wait(1);
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_PolutionPrevention));
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::SolidWaste_AuditGroup);
//        $I->wait(1);
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Transportation_AuditGroup);
//        $I->wait(1);
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Transportation));
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup2_Transportation));
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Wastewater_AuditGroup);
//        $I->wait(1);
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Wastewater));
//        $I->wait(1);
//        $I->selectOption(\Page\AuditGreenTipUpdate::$AuditGroupSelect_AddAuditGroupPopup, \Page\AuditGroupList::Water_AuditGroup);
//        $I->wait(1);
//        $I->seeElement(\Page\AuditGreenTipUpdate::selectAuditSubgroupOption_ByName($this->audSubgroup1_Water));
//    }
    
}
