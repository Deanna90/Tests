<?php namespace Measure;
use \Page as Page;
use \Step as Step;
use \AcceptanceTester as AcceptanceTester;

class GreenTipWithSectorsCest
{
    public $state, $idState;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $measureDesc1, $idMeasure1;
    public $measureDesc2, $idMeasure2;
    public $measureDesc3, $idMeasure3;
    public $measuresDesc_2measures = [];
    public $measuresDesc_3measures = [];
    public $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3, $county, $cityNew, $zipNew, $programNew;
    public $sector1, $sector2, $sector3, $sectorNew;
    public $id_program1, $id_program2, $id_program3, $id_programNew;
    public $statuses_3measures = ['elective', 'elective', 'core'];
    public $statuses_2measures = ['elective', 'core'];
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $id_checklist_P1, $id_checklist_P2, $id_checklist_P3;
    public $business1, $business2, $business3, $business4, $id_business1, $id_business2, $id_business3, $id_business4;
    public $business5, $business6, $business7, $business8, $id_business5, $id_business6, $id_business7, $id_business8;
    public $business9, $business10, $business11, $business12, $id_business9, $id_business10, $id_business11, $id_business12;
    public $business13, $business14, $business15, $business16, $id_business13, $id_business14, $id_business15, $id_business16;
    public $business17, $business18, $business19, $business20, $id_business17, $id_business18, $id_business19, $id_business20;
    public $email1, $email2, $email3, $email4, $email5, $email6, $email7, $email8, $email9, $email10, $email11, $email12, $email13, $email14, $email15, $email16, $email17, $email18, $email19, $email20;
    public $gt_M1_AllProgs_AllSectors, $gt_M1_AllProgs_Sect1_Sect2, $gt_M1_AllProgs_Office, $gt_M1_Prog1_Prog2_Office_Sect1, $gt_M1_Prog1_AllSectors, $gt_M1_Prog2_Sect3;
    public $gt_M2_AllProgs_AllSectors, $gt_M2_AllProgs_Sect1_Sect2, $gt_M2_Prog1_AllSectors, $gt_M2_Prog2_Sect1;
    public $gt_M3_AllProgs_Sect1_Sect2_Sect3_Office, $gt_M3_Prog1_Prog2_Prog3_AllSectors;



    public function Help_LoginAsNationalAdmin(\AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help_CreateState(\Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StGTWithSectors");
        $shortName = 'GTS';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
    }
    
    public function Help_SelectDefaultState(\AcceptanceTester $I)
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
    
    //-----------------------Create Sector--------------------------
    public function CreateSector1(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector1 = "Sector1";
        $state   = $this->state;
        
        $I->amOnPage(Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->fillField(Page\SectorCreate::$NameField, $sector);
        $I->selectOption(Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
        $I->click(Page\SectorCreate::$CreateButton);
        $I->waitPageLoad();
    }
    
    public function CreateSector2(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector2 = "Sector2";
        $state   = $this->state;
        
        $I->amOnPage(Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->fillField(Page\SectorCreate::$NameField, $sector);
        $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
        $I->click(Page\SectorCreate::$CreateButton);
        $I->waitPageLoad();
    }
    
    public function CreateSector3(\Step\Acceptance\Sector $I) {
        $sector  = $this->sector3 = "Sector3";
        $state   = $this->state;
        
        $I->amOnPage(Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->fillField(Page\SectorCreate::$NameField, $sector);
        $I->selectOption(Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
        $I->click(Page\SectorCreate::$CreateButton);
        $I->waitPageLoad();
    }
    
    public function CreateMeasure1_AllSectors(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc1 = $I->GenerateNameOf("Description for Measure1 All ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $useInSectorsToggleStatus = 'on';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null,
                            null, null, null, null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_2measures[] = $desc;
        $this->measuresDesc_3measures[] = $desc;
    }
    
    public function CreateMeasure2_Sector1_Sector2(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc2 = $I->GenerateNameOf("Description for Measure2 Sect1&Sect2 ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $sectorArray     = [$this->sector1, $this->sector2];
        $useInSectorsToggleStatus = 'off';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null,
                            null, null, null, null, null, null, null, $sectorArray);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_3measures[] = $desc;
    }
    
    public function CreateMeasure3_AllSectors(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc3 = $I->GenerateNameOf("Description for Measure3 All ");
        $auditGroup      = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_SolidWaste;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $useInSectorsToggleStatus = 'on';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null,
                            null, null, null, null, null, null, null);
        $I->amOnPage(Page\MeasureList::URL());
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_2measures[] = $desc;
        $this->measuresDesc_3measures[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city and program-------------------------
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, \Step\Acceptance\Program $Y) {
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
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, \Step\Acceptance\Program $Y) {
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
    
    public function Help_CreateCity3_And_Program3(\Step\Acceptance\City $I, \Step\Acceptance\Program $Y) {
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
    
    public function SectorChecklistCreate_Tier2_OfficeRetail(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_2measures, $this->statuses_2measures);
        $I->PublishSectorChecklistStatus();
    }
    
    public function SectorChecklistCreate_Tier2_Sector1(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = $this->sector1;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_3measures, $this->statuses_3measures);
        $I->PublishSectorChecklistStatus();
    }
    
    public function SectorChecklistCreate_Tier2_Sector2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = $this->sector2;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_3measures, $this->statuses_3measures);
        $I->PublishSectorChecklistStatus();
    }
    
    public function SectorChecklistCreate_Tier2_Sector3(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = $this->sector3;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_2measures, $this->statuses_2measures);
        $I->PublishSectorChecklistStatus();
    }
    
    public function ActivateSectorsForPrograms(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->cantSeeElement(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program1, \Page\SectorList::DefaultSectorOfficeRetail));
        $I->cantSeeElement(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program2, \Page\SectorList::DefaultSectorOfficeRetail));
        $I->cantSeeElement(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program3, \Page\SectorList::DefaultSectorOfficeRetail));
        $I->wait(1);
        
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program1, $this->sector1));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program1, $this->sector2));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program1, $this->sector3));
        $I->wait(1);
        $I->waitPageLoad();
        
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program2, $this->sector1));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program2, $this->sector2));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program2, $this->sector3));
        $I->wait(1);
        $I->waitPageLoad();
        
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program3, $this->sector1));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program3, $this->sector2));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program3, $this->sector3));
        $I->wait(1);
        $I->waitPageLoad();
        
        $I->amOnPage(Page\ChecklistList::URL());
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector1, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector2, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, $this->sector3, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program1, \Page\SectorList::DefaultSectorOfficeRetail, 'Tier 2'));
        
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program2, $this->sector1, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program2, $this->sector2, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program2, $this->sector3, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program2, \Page\SectorList::DefaultSectorOfficeRetail, 'Tier 2'));
        
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program3, $this->sector1, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program3, $this->sector2, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program3, $this->sector3, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($this->program3, \Page\SectorList::DefaultSectorOfficeRetail, 'Tier 2'));
        
    }
    
    public function Measure1_CreateGreenTip1_AllPrograms_AllSectors(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1;
        $descGT      = $this->gt_M1_AllProgs_AllSectors = $I->GenerateNameOf("M1_GT All Programs + All Sectors ");
        $allPrograms = 'yes';
        $allSectors  = 'yes';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->CreateMeasureGreenTip($descGT, $program =null, $allPrograms, $allSectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure1_CreateGreenTip2_AllPrograms_Sector1_Sector2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1;
        $descGT      = $this->gt_M1_AllProgs_Sect1_Sect2 = $I->GenerateNameOf("M1_GT All Programs + Sector1&Sector2 ");
        $sectors     = [$this->sector1, $this->sector2];
        $allPrograms = 'yes';
        $allSectors  = 'no';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->CreateMeasureGreenTip($descGT, $program = null, $allPrograms, $allSectors, $sectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure1_CreateGreenTip3_AllPrograms_OfficeRetail(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1;
        $descGT      = $this->gt_M1_AllProgs_Office = $I->GenerateNameOf("M1_GT All Programs + Office/Retail ");
        $sectors     = [\Page\SectorList::DefaultSectorOfficeRetail];
        $allPrograms = 'yes';
        $allSectors  = 'no';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->CreateMeasureGreenTip($descGT, $program = null, $allPrograms, $allSectors, $sectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure1_CreateGreenTip4_Program1_Program2_OfficeRetail_Sector1(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1;
        $descGT      = $this->gt_M1_Prog1_Prog2_Office_Sect1 = $I->GenerateNameOf("M1_GT Program1&Program2 + Office/Retail&Sector1 ");
        $program     = [$this->program1, $this->program2];
        $sectors     = [\Page\SectorList::DefaultSectorOfficeRetail, $this->sector1];
        $allPrograms = 'no';
        $allSectors  = 'no';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->CreateMeasureGreenTip($descGT, $program, $allPrograms, $allSectors, $sectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure1_CreateGreenTip5_Program1_AllSectors(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1;
        $descGT      = $this->gt_M1_Prog1_AllSectors = $I->GenerateNameOf("M1_GT Program1 + All Sectors");
        $program     = [$this->program1];
        $allPrograms = 'no';
        $allSectors  = 'yes';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->CreateMeasureGreenTip($descGT, $program, $allPrograms, $allSectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure1_CreateGreenTip6_Program2_Sector3(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc1;
        $descGT      = $this->gt_M1_Prog2_Sect3 = $I->GenerateNameOf("M1_GT Program2 + Sector3");
        $program     = [$this->program2];
        $sectors     = [$this->sector3];
        $allPrograms = 'no';
        $allSectors  = 'no';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->CreateMeasureGreenTip($descGT, $program, $allPrograms, $allSectors, $sectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    
    public function Measure2_CreateGreenTip1_AllPrograms_AllSectors(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc2;
        $descGT      = $this->gt_M2_AllProgs_AllSectors = $I->GenerateNameOf("M2_GT All Programs + All Sectors ");
        $allPrograms = 'yes';
        $allSectors  = 'yes';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2));
        $I->CreateMeasureGreenTip($descGT, $program =null, $allPrograms, $allSectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure2_CreateGreenTip2_AllPrograms_Sector1_Sector2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc2;
        $descGT      = $this->gt_M2_AllProgs_Sect1_Sect2 = $I->GenerateNameOf("M2_GT All Programs + Sector1&Sector2 ");
        $sectors     = [$this->sector1, $this->sector2];
        $allPrograms = 'yes';
        $allSectors  = 'no';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2));
        $I->CreateMeasureGreenTip($descGT, $program = null, $allPrograms, $allSectors, $sectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure2_CreateGreenTip3_Program1_AllSectors(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc2;
        $descGT      = $this->gt_M2_Prog1_AllSectors = $I->GenerateNameOf("M2_GT Program1 + All Sectors");
        $program     = [$this->program1];
        $allPrograms = 'no';
        $allSectors  = 'yes';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2));
        $I->CreateMeasureGreenTip($descGT, $program, $allPrograms, $allSectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure2_CreateGreenTip4_Program2_Sector1(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc2;
        $descGT      = $this->gt_M2_Prog2_Sect1 = $I->GenerateNameOf("M2_GT Program2 + Sector1");
        $program     = [$this->program2];
        $sectors     = [$this->sector1];
        $allPrograms = 'no';
        $allSectors  = 'no';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2));
        $I->CreateMeasureGreenTip($descGT, $program, $allPrograms, $allSectors, $sectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure3_CreateGreenTip1_AllPrograms_Sector1_Sector2_Sector3_OfficeRetail(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc3;
        $descGT      = $this->gt_M3_AllProgs_Sect1_Sect2_Sect3_Office = $I->GenerateNameOf("M3_GT All Programs + Sector1&Sector2&Sector3&OfficeRetail ");
        $sectors     = [$this->sector1, $this->sector2, $this->sector3, Page\SectorList::DefaultSectorOfficeRetail];
        $allPrograms = 'yes';
        $allSectors  = 'no';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure3));
        $I->CreateMeasureGreenTip($descGT, $program = null, $allPrograms, $allSectors, $sectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function Measure3_CreateGreenTip2_Program1_Program2_Program3_AllSectors(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measureDesc3;
        $descGT      = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors = $I->GenerateNameOf("M3_GT Program1&Program2&Program3 + All Sectors");
        $program     = [$this->program1, $this->program2, $this->program3];
        $allPrograms = 'no';
        $allSectors  = 'yes';
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure3));
        $I->CreateMeasureGreenTip($descGT, $program, $allPrograms, $allSectors);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function H1_LogOut(\AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1 = $I->GenerateNameOf("busnam1_Prog1_Sect1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = $this->sector1;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    public function Business1_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog1_Prog2_Office_Sect1;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business1_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_Prog1_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business1_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
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
        $email            = $this->email2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2 = $I->GenerateNameOf("busnam2_Prog1_Sect2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = $this->sector2;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business2_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog1_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business2_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_Prog1_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business2_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
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
        $email            = $this->email3 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business3 = $I->GenerateNameOf("busnam3_Prog1_Sect3");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = $this->sector3;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business3_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog1_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
//    
//    public function Business3_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business3_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut3(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business4_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email4 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business4 = $I->GenerateNameOf("busnam4_Prog1_Office");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business4_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog1_Prog2_Office_Sect1;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
//    public function Business4_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business4_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut4(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business5_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email5 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business5 = $I->GenerateNameOf("busnam5_Prog2_Sect1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = $this->sector1;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business5_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog1_Prog2_Office_Sect1;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business5_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_Prog2_Sect1;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business5_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut5(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business6_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email6 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business6 = $I->GenerateNameOf("busnam6_Prog2_Sect2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = $this->sector2;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business6_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business6_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business6_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut6(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business7_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email7 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business7 = $I->GenerateNameOf("busnam7_Prog2_Sect3");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = $this->sector3;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business7_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog2_Sect3;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
//    public function Business7_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business7_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut7(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business8_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email8 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business8 = $I->GenerateNameOf("busnam8_Prog2_Office");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business8_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog1_Prog2_Office_Sect1;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
//    public function Business8_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business8_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut8(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    
    public function Business9_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email9 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business9 = $I->GenerateNameOf("busnam9_Prog3_Sect1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = $this->sector1;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business9_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business9_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business9_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut9(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business10_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email10 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business10 = $I->GenerateNameOf("busnam10_Prog3_Sect2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = $this->sector2;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business10_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business10_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business10_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut10(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    
    public function Business11_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email11 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business11 = $I->GenerateNameOf("busnam11_Prog3_Sect3");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = $this->sector3;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business11_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
//    public function Business11_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business11_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut11(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business12_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email12 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business12 = $I->GenerateNameOf("busnam12_Prog3_Office");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business12_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_Office;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
//    public function Business12_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business12_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut12(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    //------------------------Create new city and program-----------------------
    
    public function Help_CreateCityNew_And_ProgramNew(\Step\Acceptance\City $I, \Step\Acceptance\Program $Y) {
        $city    = $this->cityNew = $I->GenerateNameOf("CityNew_");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zipNew = $I->GenerateZipCode();
        $program = $this->programNew = $I->GenerateNameOf("ProgNew_");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_programNew = $prog['id'];
    }
    
    public function ActivateSectorsForProgramNew(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(\Page\SectorsManage::URL());
        
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->programNew, $this->sector1));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->programNew, $this->sector2));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->programNew, $this->sector3));
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function H2_LogOut(\AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function Business13_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email13 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business13 = $I->GenerateNameOf("busnam13_ProgNew_Sect1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zipNew;
        $city             = $this->cityNew;
        $website          = 'fgfh.fh';
        $busType          = $this->sector1;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business13_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business13_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business13_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_AllProgs_Sect1_Sect2_Sect3_Office;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut13(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business14_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email14 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business14 = $I->GenerateNameOf("busnam14_ProgNew_Sect2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zipNew;
        $city             = $this->cityNew;
        $website          = 'fgfh.fh';
        $busType          = $this->sector2;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business14_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business14_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_Sect1_Sect2;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business14_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_AllProgs_Sect1_Sect2_Sect3_Office;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut14(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    
    public function Business15_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email15 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business15 = $I->GenerateNameOf("busnam15_ProgNew_Sect3");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zipNew;
        $city             = $this->cityNew;
        $website          = 'fgfh.fh';
        $busType          = $this->sector3;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business15_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
//    public function Business11_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business15_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_AllProgs_Sect1_Sect2_Sect3_Office;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut15(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business16_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email16 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business16 = $I->GenerateNameOf("busnam16_ProgNew_Office");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zipNew;
        $city             = $this->cityNew;
        $website          = 'fgfh.fh';
        $busType          = Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business16_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_Office;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
//    public function Business12_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $grTip    = $this->gt_M2_Prog1_AllSectors;
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
//    }
    
    public function Business16_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_AllProgs_Sect1_Sect2_Sect3_Office;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut16(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    //-----------------------Create Sector--------------------------
    public function CreateSectorNew(\Step\Acceptance\Sector $I) {
        $sector  = $this->sectorNew = "Sector New";
        $state   = $this->state;
        
        $I->amOnPage(Page\SectorCreate::URL()."?state_id=$this->idState");
        $I->fillField(Page\SectorCreate::$NameField, $sector);
        $I->selectOption(Page\SectorCreate::$StateSelect, $state);
        $I->wait(1);
        $I->click(Page\SectorCreate::$CreateButton);
        $I->waitPageLoad();
    }
    
    public function UpdateMeasure2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
        $I->click(\Page\MeasureUpdate::$SectorSelect);
        $I->wait(3);
        $I->click(\Page\MeasureUpdate::selectSectorOptionByName($this->sectorNew));
        $I->wait(1);
        $I->click(Page\MeasureUpdate::$UpdateButton);
        $I->wait(2);
    }
    
    public function AddMeasure2ToAllSectors(Step\Acceptance\SectorChecklist $I) {
        $sectorsArray = [$this->sector3, Page\SectorList::DefaultSectorOfficeRetail];
        $measuresIDs  = $this->idMeasure2;
        $tierNumber = '2';
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
        $I->AddMeasuresToSectorChecklist($sectorsArray, $measuresIDs, $tierNumber);
        $I->wait(2);
    }
    
    public function SectorChecklistCreate_Tier2_SectorNew(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = $this->sectorNew;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_3measures, $this->statuses_3measures);
        $I->PublishSectorChecklistStatus();
    }
    
    public function ActivateSectorsForSectorNew(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(\Page\SectorsManage::URL());
        
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program1, $this->sectorNew));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program2, $this->sectorNew));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->program3, $this->sectorNew));
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(\Page\SectorsManage::ToggleButtonLine_ByNameValue($this->programNew, $this->sectorNew));
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function H3_LogOut(\AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function Business17_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email17 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business17 = $I->GenerateNameOf("busnam17_Prog1_SectNew");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = $this->sectorNew;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business17_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_Prog1_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business17_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_Prog1_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business17_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut17(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business18_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email18 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business18 = $I->GenerateNameOf("busnam18_Prog2_SectNew");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = $this->sectorNew;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business18_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business18_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business18_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut18(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business19_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email19 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business19 = $I->GenerateNameOf("busnam19_Prog3_SectNew");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = $this->sectorNew;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business19_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business19_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business19_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip    = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Help_LogOut19(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business20_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email20 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business20 = $I->GenerateNameOf("busnam20_ProgNew_SectNew");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zipNew;
        $city             = $this->cityNew;
        $website          = 'fgfh.fh';
        $busType          = $this->sectorNew;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
     public function Business20_CheckGreenTipForMeasure1_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc1;
        $grTip    = $this->gt_M1_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business20_CheckGreenTipForMeasure2_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc2;
        $grTip    = $this->gt_M2_AllProgs_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    public function Business20_CheckGreenTipForMeasure3_BusinessChecklist(AcceptanceTester $I) {
        $measDesc = $this->measureDesc3;
        $grTip1   = $this->gt_M3_AllProgs_Sect1_Sect2_Sect3_Office;
        $grTip2   = $this->gt_M3_Prog1_Prog2_Prog3_AllSectors;
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip1));
        $I->cantSeeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip2));
    }
    
    public function Help_LogOut20(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
}
