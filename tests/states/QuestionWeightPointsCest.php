<?php


class QuestionWeightPointsCest
{
    public $state, $idState;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $quesYesNo1Name, $quesYesNo2Name, $quesSection1Name, $quesSection2Name, $quesSection3Name;
    public $pointsQuesYesNo1, $pointsQuesYesNo2, $pointsQuesSection1, $pointsQuesSection2, $pointsQuesSection3;
    public $measure1Desc, $idMeasure1, $pointsMeas1;
    public $measure2Desc, $idMeasure2, $pointsMeas2;
    public $measure3Desc, $idMeasure3, $pointsMeas3;
    public $measure4Desc, $idMeasure4, $pointsMeas4;
    public $measure5Desc, $idMeasure5, $pointsMeas5;
    public $measure6Desc, $idMeasure6, $pointsMeas6;
    public $measure7Desc, $idMeasure7, $pointsMeas7;
    public $measure8Desc, $idMeasure8, $pointsMeas8;
    public $measure9Desc, $idMeasure9, $pointsMeas9;
    public $measuresDesc_SuccessCreated = [], $points = '65', $completePoints = '0';
    public $city1, $zip1, $program1;
    public $statuses = ['elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective'];
    public $checklistUrl;
    public $business1, $business2, $id_business1, $id_business2;
    
    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StQuesWeight");
        $shortName = 'QW';
        $weighted  = 'Questions';
        
        $I->CreateState($name, $shortName, $weighted);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
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
    
    public function CreateWeightedYesNoQuestion1(\Step\Acceptance\WeightPoints $I)
    {
        $name       = $this->quesYesNo1Name = $I->GenerateNameOf("YesNoQues1_3p_");
        $points     = $this->pointsQuesYesNo1 = '3';
        
        $I->CreateYesOrNoQuestion($this->idState, $name, $points);
    }
    
    public function CreateWeightedYesNoQuestion2(\Step\Acceptance\WeightPoints $I)
    {
        $name       = $this->quesYesNo2Name = $I->GenerateNameOf("YesNoQues2_1p_");
        $points     = $this->pointsQuesYesNo2 = '1';
        
        $I->CreateYesOrNoQuestion($this->idState, $name, $points);
    }
    
    public function CreateWeightedSectionQuestion1(\Step\Acceptance\WeightPoints $I)
    {
        $name       = $this->quesSection1Name = $I->GenerateNameOf("SectionQues1_2p_");
        $sections   = '5';
        $points     = $this->pointsQuesSection1 = '2';
        
        $I->CreateSectionsQuestion($this->idState, $name, $sections, $points);
    }
    
    public function CreateWeightedSectionQuestion2(\Step\Acceptance\WeightPoints $I)
    {
        $name       = $this->quesSection2Name = $I->GenerateNameOf("SectionQues2_1p_");
        $sections   = '10';
        $points     = $this->pointsQuesSection2 = '1';
        
        $I->CreateSectionsQuestion($this->idState, $name, $sections, $points);
    }
    
    public function CreateWeightedSectionQuestion3(\Step\Acceptance\WeightPoints $I)
    {
        $name       = $this->quesSection3Name = $I->GenerateNameOf("SectionQues3_10p_");
        $sections   = '2';
        $points     = $this->pointsQuesSection3 = '10';
        
        $I->CreateSectionsQuestion($this->idState, $name, $sections, $points);
    }
    
    public function MeasTypes1_6_CreateMeasure1_MultipleQuesAndNumber_Quant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure1Desc = $I->GenerateNameOf("Description1");
        $auditGroup        = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_Energy;
        $quantitative      = 'yes';
        $submeasureType    = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions         = ['ques1', 'ques2'];
        $answers           = ['a1', 'a2', 'a3'];
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['Yes', 'Yes'];
        $sectionNameArray  = [$this->quesSection1Name, $this->quesSection2Name, $this->quesSection3Name];
        $sectionValueArray = ['4', '1', '2'];
        $this->pointsMeas1 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 4 + $this->pointsQuesSection2 * 1 + $this->pointsQuesSection3 * 2;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure1));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus = 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_7_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure2Desc = $I->GenerateNameOf("Description2");
        $auditGroup        = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_Energy;
        $quantitative      = 'yes';
        $submeasureType    = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions         = ['question1', 'question2'];
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['No', 'No'];
        $sectionNameArray  = [$this->quesSection1Name, $this->quesSection3Name];
        $sectionValueArray = ['2', '2'];
        $this->pointsMeas2 = $this->pointsQuesSection1 * 2 + $this->pointsQuesSection3 * 2;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure2));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_8_CreateMeasure3_ThermsPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure3Desc = $I->GenerateNameOf("Description3");
        $auditGroup        = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_Energy;
        $quantitative      = 'yes';
        $submeasureType    = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $popupDesc         = $I->GenerateNameOf('Popup therms description');
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['Yes', 'No'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['3'];
        $this->pointsMeas3 = $this->pointsQuesYesNo1 + $this->pointsQuesSection1 * 3;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure3));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_9_CreateMeasure4_LightingPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure4Desc = $I->GenerateNameOf("Description4");
        $auditGroup        = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_Energy;
        $quantitative      = 'yes';
        $submeasureType    = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        $popupDesc         = $I->GenerateNameOf('Lighting popup desc');
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['No', 'Yes'];
        $sectionNameArray  = [$this->quesSection3Name];
        $sectionValueArray = ['1'];
        $this->pointsMeas4 = $this->pointsQuesYesNo2 + $this->pointsQuesSection3 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure4));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_10_CreateMeasure5_WasteDivertionPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure5Desc = $I->GenerateNameOf("Description5");
        $auditGroup        = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_SolidWaste;
        $quantitative      = 'yes';
        $submeasureType    = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $popupDesc         = $I->GenerateNameOf('Popup Waste Div description');
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['No', 'No'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['1'];
        $this->pointsMeas5 = $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure5));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_11_CreateMeasure6_MultipleQues_NotQuant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure6Desc = $I->GenerateNameOf("Description6");
        $auditGroup        = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_SolidWaste;
        $quantitative      = 'no';
        $submeasureType    = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions         = ['ques1?', 'ques2?', 'ques3?'];
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['No', 'No'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['2'];
        $this->pointsMeas6 = $this->pointsQuesSection1 * 2;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure6));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_12_CreateMeasure7_MultipleQuesAndNumber_NotQuant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure7Desc = $I->GenerateNameOf("Description7");
        $auditGroup        = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_SolidWaste;
        $quantitative      = 'no';
        $submeasureType    = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions         = ['What is your favourite color?'];
        $answers           = ['Grey', 'Green', 'Red'];
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['Yes', 'Yes'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['5'];
        $this->pointsMeas7 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 5;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure7));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_13_CreateMeasure8_WithoutSubmeasure_NotQuant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure8Desc = $I->GenerateNameOf("Description8");
        $auditGroup        = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_SolidWaste;
        $quantitative      = 'no';
        $submeasureType    = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['No', 'No'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['5'];
        $this->pointsMeas8 = $this->pointsQuesSection1 * 5;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure8));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_14_CreateMeasure9_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc              = $this->measure9Desc = $I->GenerateNameOf("Description9");
        $auditGroup        = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup     = $this->audSubgroup1_SolidWaste;
        $quantitative      = 'yes';
        $submeasureType    = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['Yes', 'Yes'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['1'];
        $this->pointsMeas9 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure9));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityQW1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgQW1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_15_CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $points             = $this->points;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
        $I->reloadPage();
        $I->UpdateChecklistPoints($points);
    }
    
    public function MeasTypes1_15_5_CheckPoints_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure4Desc));
        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("$this->pointsMeas7 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnChecklistPreview(AcceptanceTester $I) {
        $completePoints = '0';
        $points         = $this->points;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(3);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->see("completed $completePoints out of $points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function Help1_17_BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("busnam");
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
        $I->wait(8);
    }
    
    public function MeasTypes1_15_5_CheckPoints_OnBusinessChecklist(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check all points value on business checklist pages");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("$this->pointsMeas7 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnBusinessChecklist(AcceptanceTester $I) {
        $completePoints = '0';
        $points         = $this->points;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->see("completed $completePoints out of $points total", \Page\RegistrationStarted::$TotalPointsInfo);
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->see("completed $completePoints out of $points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function MeasTypes1_17_1_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '11';
        $value2   = '22';
                
        $I->wait(1);
        $I->comment("Complete Measure1 with $this->pointsMeas1 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $this->completePoints = $this->completePoints + $this->pointsMeas1;
        $completePoints = $this->completePoints;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function MeasTypes1_17_1_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '11';
        $value2   = '22';
                
        $I->wait(1);
        $I->comment("Complete Measure2 with $this->pointsMeas2 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $this->completePoints = $this->completePoints + $this->pointsMeas2;
        $completePoints = $this->completePoints;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function MeasTypes1_17_1_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure3 with $this->pointsMeas3 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->click(Page\RegistrationStarted::$ThermsPopup_CloseButton);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $completePoints = $this->points;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function MeasTypes1_17_1_DecompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->wait(1);
        $I->comment("Decomplete Measure3 with $this->pointsMeas3 and save. Check completed points value after saving.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'no');
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $completePoints = $this->completePoints;
        $I->see("completed $completePoints out of $this->points total", \Page\RegistrationStarted::$TotalPointsInfo);
    }
    
    public function Help1_18_LogOutFromBusiness_And_LoginAsNationalAdmin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
      
    public function Help1_18_GoToBusinessViewPage(AcceptanceTester $I){
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business1 = $u1[1];
        $I->comment("Business1 id: $this->id_business1");
    }
     
    public function MeasTypes1_15_5_CheckPoints_OnBusinessView(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check all points value on business checklist pages");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure4Desc));
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("$this->pointsMeas7 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnBusinessView(AcceptanceTester $I) {
        $completePoints = $this->completePoints;
        $points         = $this->points;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->see("completed $completePoints out of $points total", \Page\BusinessChecklistView::$TotalPointsInfo);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->see("completed $completePoints out of $points total", \Page\BusinessChecklistView::$TotalPointsInfo);
    }
 
}
