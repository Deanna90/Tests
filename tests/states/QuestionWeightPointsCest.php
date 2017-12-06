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
    public $measure10Desc, $idMeasure10, $pointsMeas10;
    public $measure11Desc, $idMeasure11, $pointsMeas11;
    public $measure12Desc, $idMeasure12, $pointsMeas12;
    public $measure13Desc, $idMeasure13, $pointsMeas13;
    public $measure14Desc, $idMeasure14, $pointsMeas14;
    public $measure15Desc, $idMeasure15, $pointsMeas15;
    public $measuresDesc_SuccessCreated = [], $pointsT1 = '65', $pointsT2 = '0', $pointsT3 = '25', $completePointsT1 = '0', $completePointsT2 = '0', $completePointsT3 = '0', 
                            $coreCountT1 = '0', $coreCountT2 = '4', $coreCountT3 = '3', $completeCoreMeasuresT1 = '0', $completeCoreMeasuresT2 = '0', $completeCoreMeasuresT3 = '0';
    public $city1, $zip1, $program1;
    public $statusesT1 = ['elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'not set',  'not set', 'not set',  'not set',  'not set',  'not set'];
    public $statusesT2 = ['core',     'elective', 'core',     'not set',  'elective', 'elective', 'core',     'not set',  'elective', 'not set',  'not set', 'elective', 'elective', 'core',     'not set'];
    public $statusesT3 = ['elective', 'not set',  'not set',  'not set',  'not set',  'not set',  'not set',  'elective', 'elective', 'elective', 'core',    'elective', 'core',     'elective', 'core'];
    public $tier1Name = 'Start', $tier2Name = 'Certified', $tier3Name = 'Leader';
    public $tier1Desc = 'tier111111Desc for tier11111', $tier2Desc = 'Desc2222 22222 222Desc';
    public $checklistUrlT1, $checklistUrlT2, $checklistUrlT3, $id_checklistT1, $id_checklistT2, $id_checklistT3;
    public $business1, $business2, $id_business1, $id_business2;
    public $totalEarnedText       = "Total points earned across all tiers";
    public $measuresText          = " required measures";
    public $pointsText            = " points";
    public $measuresCompletedText = " measures completed";
    public $pointsEarnedText      = " points earned";
    
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
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['Yes', 'No'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['3'];
        $this->pointsMeas3 = $this->pointsQuesYesNo1 + $this->pointsQuesSection1 * 3;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
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
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['No', 'Yes'];
        $sectionNameArray  = [$this->quesSection3Name];
        $sectionValueArray = ['1'];
        $this->pointsMeas4 = $this->pointsQuesYesNo2 + $this->pointsQuesSection3 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
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
        $yesNoNameArray    = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray   = ['No', 'No'];
        $sectionNameArray  = [$this->quesSection1Name];
        $sectionValueArray = ['1'];
        $this->pointsMeas5 = $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
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
    
    public function MeasTypes1_14_CreateMeasure10_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc               = $this->measure10Desc = $I->GenerateNameOf("Description10");
        $auditGroup         = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup      = $this->audSubgroup1_SolidWaste;
        $quantitative       = 'yes';
        $submeasureType     = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray     = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray    = ['Yes', 'Yes'];
        $sectionNameArray   = [$this->quesSection1Name];
        $sectionValueArray  = ['1'];
        $this->pointsMeas10 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure10 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure10));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_14_CreateMeasure11_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc               = $this->measure11Desc = $I->GenerateNameOf("Description11");
        $auditGroup         = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup      = $this->audSubgroup1_SolidWaste;
        $quantitative       = 'yes';
        $submeasureType     = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray     = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray    = ['Yes', 'Yes'];
        $sectionNameArray   = [$this->quesSection1Name];
        $sectionValueArray  = ['1'];
        $this->pointsMeas11 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure11 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure11));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_14_CreateMeasure12_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc               = $this->measure12Desc = $I->GenerateNameOf("Description12");
        $auditGroup         = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup      = $this->audSubgroup1_SolidWaste;
        $quantitative       = 'yes';
        $submeasureType     = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray     = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray    = ['Yes', 'Yes'];
        $sectionNameArray   = [$this->quesSection1Name];
        $sectionValueArray  = ['1'];
        $this->pointsMeas12 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure12 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure12));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_14_CreateMeasure13_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc               = $this->measure13Desc = $I->GenerateNameOf("Description13");
        $auditGroup         = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup      = $this->audSubgroup1_SolidWaste;
        $quantitative       = 'yes';
        $submeasureType     = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray     = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray    = ['Yes', 'Yes'];
        $sectionNameArray   = [$this->quesSection1Name];
        $sectionValueArray  = ['1'];
        $this->pointsMeas13 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure13 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure13));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_14_CreateMeasure14_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc               = $this->measure14Desc = $I->GenerateNameOf("Description14");
        $auditGroup         = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup      = $this->audSubgroup1_SolidWaste;
        $quantitative       = 'yes';
        $submeasureType     = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray     = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray    = ['Yes', 'Yes'];
        $sectionNameArray   = [$this->quesSection1Name];
        $sectionValueArray  = ['1'];
        $this->pointsMeas14 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure14 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure14));
        $I->CheckSavedValuesOnMeasureUpdatePage(null, null, null, 'ignore', $submeasureType, null, null, null, null, null, $quantToggleStatus = 'ignore', 
                                            $multipAnswerToggleStatus= 'ignore', null, $yesNoNameArray, $yesNoValueArray, $sectionNameArray, $sectionValueArray);
    }
    
    public function MeasTypes1_14_CreateMeasure15_WithoutSubmeasure_Quant(\Step\Acceptance\Measure $I) {
        $desc               = $this->measure15Desc = $I->GenerateNameOf("Description15");
        $auditGroup         = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup      = $this->audSubgroup1_SolidWaste;
        $quantitative       = 'yes';
        $submeasureType     = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $yesNoNameArray     = [$this->quesYesNo1Name, $this->quesYesNo2Name];
        $yesNoValueArray    = ['Yes', 'Yes'];
        $sectionNameArray   = [$this->quesSection1Name];
        $sectionValueArray  = ['1'];
        $this->pointsMeas15 = $this->pointsQuesYesNo1 + $this->pointsQuesYesNo2 + $this->pointsQuesSection1 * 1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, null, $yesNoNameArray, $yesNoValueArray, 
                            $sectionNameArray, $sectionValueArray);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure15 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->amOnPage(\Page\MeasureUpdate::URL($this->idMeasure15));
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
    
    public function Help1_15_CreateChecklistForTier1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        $points             = $this->pointsT1;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesT1);
        $this->checklistUrlT1 = $I->grabFromCurrentUrl();
        $I->comment("Url tier1 checklist: $this->checklistUrlT1");
        $u1 = explode('=', $this->checklistUrlT1);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklistT1 = $u2[0];
        $I->comment("Tier1 checklist id: $this->id_checklistT1");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklistT1));
        $I->PublishChecklistStatus();
        $I->amOnPage(Page\ChecklistManage::URL_PointsTab($this->id_checklistT1));
        $I->UpdateChecklistPoints($points);
    }
    
    public function Help1_15_CreateChecklistForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $points             = $this->pointsT2;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesT2);
        $this->checklistUrlT2 = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrlT2");
        $u1 = explode('=', $this->checklistUrlT2);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklistT2 = $u2[0];
        $I->comment("Tier2 checklist id: $this->id_checklistT2");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklistT2));
        $I->PublishChecklistStatus();
        $I->amOnPage(Page\ChecklistManage::URL_PointsTab($this->id_checklistT2));
        $I->UpdateChecklistPoints($points);
    }
    
    public function Help1_15_CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $points             = $this->pointsT3;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statusesT3);
        $this->checklistUrlT3 = $I->grabFromCurrentUrl();
        $I->comment("Url tier3 checklist: $this->checklistUrlT3");
        $u1 = explode('=', $this->checklistUrlT3);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklistT3 = $u2[0];
        $I->comment("Tier3 checklist id: $this->id_checklistT3");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklistT3));
        $I->PublishChecklistStatus();
        $I->amOnPage(Page\ChecklistManage::URL_PointsTab($this->id_checklistT3));
        $I->UpdateChecklistPoints($points);
    }
    
    public function Coordinator3_11_ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
        $program   = $this->program1;
        $tierOptIn = 'yes';
        
        $I->ManageTiers($program, $tier1='1', $this->tier1Name, $this->tier1Desc, $tierOptIn);
        $I->ManageTiers($program, null, null, null, null, $tier2='2', $this->tier2Name, $this->tier2Desc);
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3='3', $this->tier3Name, null, $tierOptIn);
    }
    
//    public $statusesT1 = ['elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'elective', 'not set', 'not set', 'not set', 'not set', 'not set',  'not set'];
    
    public function MeasTypes1_15_5_CheckPoints_OnChecklistPreview_Tier1(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure4Desc));
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT1, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("$this->pointsMeas7 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure9Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnChecklistPreview_Tier1(AcceptanceTester $I) {
        $completePoints = '0';
        $points         = $this->pointsT1;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$completePoints $this->tier1Name points earned. A minimum of $this->pointsT1 $this->tier1Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT1 $this->tier1Name measures completed. A minimum of $this->coreCountT1 $this->tier1Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT1, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$completePoints $this->tier1Name points earned. A minimum of $this->pointsT1 $this->tier1Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT1 $this->tier1Name measures completed. A minimum of $this->coreCountT1 $this->tier1Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
    }
    
//    public $statusesT2 = ['core', 'elective', 'core', 'not set', 'elective', 'elective', 'core', 'not set', 'elective', 'not set', 'not set', 'elective', 'elective', 'core', 'not set'];
    
    public function MeasTypes1_15_5_CheckPoints_OnChecklistPreview_Tier2(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT2, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure4Desc));
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT2, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$this->pointsMeas5 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure5Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSee("$this->pointsMeas7 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure7Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure9Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure10Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure11Desc));
        $I->canSee("$this->pointsMeas12 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure12Desc));
        $I->canSee("$this->pointsMeas13 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure13Desc));
        $I->canSee("$this->pointsMeas14 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure14Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure15Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnChecklistPreview_Tier2(AcceptanceTester $I) {
        $completePoints = '0';
        
        $I->wait(1);
        $I->comment("Check total points value: $this->pointsT2 on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT2, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$completePoints $this->tier2Name points earned. A minimum of $this->pointsT2 $this->tier2Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT2 $this->tier2Name measures completed. A minimum of $this->coreCountT2 $this->tier2Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT2, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$completePoints $this->tier2Name points earned. A minimum of $this->pointsT2 $this->tier2Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT2 $this->tier2Name measures completed. A minimum of $this->coreCountT2 $this->tier2Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
    }
    
//    public $statusesT3 = ['elective', 'not set',  'not set',  'not set',  'not set',  'not set',  'not set',  'elective', 'elective', 'elective', 'core',    'elective', 'core',     'elective', 'core'];
    
    public function MeasTypes1_15_5_CheckPoints_OnChecklistPreview_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT3, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure4Desc));
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT3, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure6Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure7Desc));
        $I->canSee("$this->pointsMeas8 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure8Desc));
        $I->canSee("$this->pointsMeas9 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure9Desc));
        $I->canSee("$this->pointsMeas10 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure10Desc));
        $I->canSee("$this->pointsMeas11 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure11Desc));
        $I->canSee("$this->pointsMeas12 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure12Desc));
        $I->canSee("$this->pointsMeas13 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure13Desc));
        $I->canSee("$this->pointsMeas14 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure14Desc));
        $I->canSee("$this->pointsMeas15 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure15Desc));
    }
    
    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnChecklistPreview_Tier3(AcceptanceTester $I) {
        $completePoints = '0';
        
        $I->wait(1);
        $I->comment("Check total points value: $this->pointsT3 on checklist preview page. Completed points value: $completePoints");
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT3, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("$completePoints of $this->tier3Name points earned. A minimum of $this->pointsT3 $this->tier3Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT3 $this->tier3Name measures completed. A minimum of $this->coreCountT3 $this->tier3Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklistT3, $this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
        $I->canSee("$completePoints of $this->tier3Name points earned. A minimum of $this->pointsT3 $this->tier3Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT3 $this->tier3Name measures completed. A minimum of $this->coreCountT3 $this->tier3Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
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
        $completePoints = $this->completePointsT1;
        $points         = $this->pointsT1;
        
        $I->wait(1);
        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
        $I->comment("------------------------------------------------------------------");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->comment("Check correct info in Progress Bar on $this->id_audSubgroup1_Energy subgroup checklist page:");
//        $I->canSee("$completePoints $this->tier1Name points earned. A minimum of $this->pointsT1 $this->tier1Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT1 $this->tier1Name measures completed. A minimum of $this->coreCountT1 $this->tier1Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        
        $I->comment("Check correct info in Right Block on $this->id_audSubgroup1_Energy subgroup checklist page:");
        $I->canSee($this->totalEarnedText, Page\RegistrationStarted::$TotalPointsText_RightBlock);
        $I->canSee($completePoints, Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        $I->canSee($this->tier1Desc, Page\RegistrationStarted::$TierDescription_RightBlock);
        $I->comment("Check correct info in Left Menu on $this->id_audSubgroup1_Energy subgroup checklist page:");
        $I->canSee("TOTAL POINTS EARNED: $completePoints", Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //tier1
        $I->canSee($this->tier1Name, Page\RegistrationStarted::LeftMenu_TierName('1'));
        $I->canSee("$this->tier1Name $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee("$this->tier1Name $this->pointsText", Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('1'));
        $I->canSee($this->completeCoreMeasuresT1, Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee("$completePoints", Page\RegistrationStarted::LeftMenu_EarnedPointsCount('1'));
        $I->canSee("$this->completeCoreMeasuresT1 of $this->coreCountT1"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('1'));
        $I->canSee("$completePoints"."$this->pointsEarnedText", Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //tier2
        $I->canSee($this->tier2Name, Page\RegistrationStarted::LeftMenu_TierName('2'));
        $I->canSee("$this->tier2Name $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('2'));
        $I->canSee("$this->tier2Name $this->pointsText", Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('2'));
        $I->canSee($this->completeCoreMeasuresT2, Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee("$completePoints", Page\RegistrationStarted::LeftMenu_EarnedPointsCount('2'));
        $I->canSee("$this->completeCoreMeasuresT2 of $this->coreCountT2"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('2'));
        $I->canSee("$completePoints"."$this->pointsEarnedText", Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //tier3
        $I->canSee($this->tier3Name, Page\RegistrationStarted::LeftMenu_TierName('3'));
        $I->canSee("$this->tier3Name $this->measuresText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('3'));
        $I->canSee("$this->tier3Name $this->pointsText", Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('3'));
        $I->canSee($this->completeCoreMeasuresT3, Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('3'));
        $I->canSee("$completePoints", Page\RegistrationStarted::LeftMenu_EarnedPointsCount('3'));
        $I->canSee("$this->completeCoreMeasuresT3 of $this->coreCountT3"."$this->measuresCompletedText", Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo('3'));
        $I->canSee("$completePoints"."$this->pointsEarnedText", Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        $I->comment("------------------------------------------------------------------");
        
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->wait(3);
//        $I->canSee("$completePoints $this->tier1Name points earned. A minimum of $this->pointsT1 $this->tier1Name points are required.", Page\ChecklistPreview::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasuresT1 $this->tier1Name measures completed. A minimum of $this->coreCountT1 $this->tier1Name measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
    }
    
    //tier1-elective/tier2-core/tier3-elective
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
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $this->completePointsT1 = $this->completePointsT1 + $this->pointsMeas1;
        $this->completePointsT2 = $this->completePointsT2 + $this->pointsMeas1;
        $this->completePointsT3 = $this->completePointsT3 + $this->pointsMeas1;
        $this->completeCoreMeasuresT2 = $this->completeCoreMeasuresT2 + 1;
        $completePoints = $this->completePointsT1;
//        $I->canSee("$completePoints $this->tier1Name points earned. A minimum of $this->pointsT1 $this->tier1Name points are required.", \Page\RegistrationStarted::$TotalPointsInfo_ProgressBar);
        $I->canSee("$this->completeCoreMeasures $this->tier1Name measures completed. A minimum of $this->coreCountT1 $this->tier1Name measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSee($completePoints, Page\BusinessChecklistView::$TotalPointsCount_RightBlock);
        $I->canSee("TOTAL POINTS EARNED: $completePoints", Page\BusinessChecklistView::$LeftMenu_TotalPointsEarnedInfo);
        $I->canSee($this->completePointsT1, Page\BusinessChecklistView::LeftMenu_EarnedPointsCount('1'));
        $I->canSee($this->completeCoreMeasuresT1, Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('1'));
        $I->canSee($this->completePointsT2, Page\BusinessChecklistView::LeftMenu_EarnedPointsCount('2'));
        $I->canSee($this->completeCoreMeasuresT2, Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('2'));
        $I->canSee($this->completePointsT3, Page\BusinessChecklistView::LeftMenu_EarnedPointsCount('3'));
        $I->canSee($this->completeCoreMeasuresT3, Page\RegistrationStarted::LeftMenu_CompletedMeasuresCount('3'));
    }
    
//    public function MeasTypes1_17_1_CompleteMeasure2(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $value1   = '11';
//        $value2   = '22';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure2 with $this->pointsMeas2 and save. Check completed points value after saving.");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
//        $I->wait(2);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $this->completePoints = $this->completePoints + $this->pointsMeas2;
//        $completePoints = $this->completePoints;
//        $I->see("completed $completePoints out of $this->pointsT1 total", \Page\RegistrationStarted::$TotalPointsInfo_ProgressBar);
//    }
//    
//    public function MeasTypes1_17_1_CompleteMeasure3(AcceptanceTester $I) {
//        $measDesc = $this->measure3Desc;
//                
//        $I->wait(1);
//        $I->comment("Complete Measure3 with $this->pointsMeas3 and save. Check completed points value after saving.");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
//        $I->wait(2);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(2);
//        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
//        $I->wait(2);
//        $I->click(Page\RegistrationStarted::$ThermsPopup_CloseButton);
//        $I->wait(2);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $completePoints = $this->pointsT1;
//        $I->see("completed $completePoints out of $this->pointsT1 total", \Page\RegistrationStarted::$TotalPointsInfo_ProgressBar);
//    }
//    
//    public function MeasTypes1_17_1_DecompleteMeasure3(AcceptanceTester $I) {
//        $measDesc = $this->measure3Desc;
//                
//        $I->wait(1);
//        $I->comment("Decomplete Measure3 with $this->pointsMeas3 and save. Check completed points value after saving.");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
//        $I->wait(2);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'no');
//        $I->wait(2);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $completePoints = $this->completePoints;
//        $I->see("completed $completePoints out of $this->pointsT1 total", \Page\RegistrationStarted::$TotalPointsInfo_ProgressBar);
//    }
//    
//    public function Help1_18_LogOutFromBusiness_And_LoginAsNationalAdmin(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsAdmin($I);
//    }
//      
//    public function Help1_18_GoToBusinessViewPage(AcceptanceTester $I){
//        $I->wait(1);
//        $I->SelectDefaultState($I, $this->state);
//        $I->wait(1);
//        $I->amOnPage(Page\Dashboard::URL());
//        $I->wait(2);
//        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
//        $I->comment("Url1: $url1");
//        $u1 = explode('=', $url1);
//        $this->id_business1 = $u1[1];
//        $I->comment("Business1 id: $this->id_business1");
//    }
//     
//    public function MeasTypes1_15_5_CheckPoints_OnBusinessView(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check all points value on business checklist pages");
//        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->canSee("$this->pointsMeas1 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas3 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure3Desc));
//        $I->canSee("$this->pointsMeas4 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure4Desc));
//        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_SolidWaste));
//        $I->wait(3);
//        $I->canSee("$this->pointsMeas5 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure5Desc));
//        $I->canSee("$this->pointsMeas6 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure6Desc));
//        $I->canSee("$this->pointsMeas7 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure7Desc));
//        $I->canSee("$this->pointsMeas8 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure8Desc));
//        $I->canSee("$this->pointsMeas9 Points", \Page\BusinessChecklistView::MeasurePoints_ByDesc($this->measure9Desc));
//    }
//    
//    public function MeasTypes1_17_1_CheckTotalPointsForChecklist_OnBusinessView(AcceptanceTester $I) {
//        $completePoints = $this->completePoints;
//        $points         = $this->pointsT1;
//        
//        $I->wait(1);
//        $I->comment("Check total points value: $points on checklist preview page. Completed points value: $completePoints");
//        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->see("completed $completePoints out of $points total", \Page\BusinessChecklistView::$TotalPointsInfo);
//        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_SolidWaste));
//        $I->wait(3);
//        $I->see("completed $completePoints out of $points total", \Page\BusinessChecklistView::$TotalPointsInfo);
//    }
 
}
