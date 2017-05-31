<?php
namespace Step\Acceptance;

class Measure extends \AcceptanceTester
{
    //-----Submeasures types-----
    const WithoutSubmeasures_QuantitativeSubmeasure           = 'Select submeasure type';
    const MultipleQuestionAndNumber_QuantitativeSubmeasure    = 'Multiple question + Number';
    const Number_QuantitativeSubmeasure                       = 'Number';
    const PopupTherms_QuantitativeSubmeasure                  = 'Popup Therms';
    const PopupLighting_QuantitativeSubmeasure                = 'Popup Lighting';
    const PopupWasteDivertion_QuantitativeSubmeasure          = 'Popup Waste diversion';
    const MultipleQuestionAndNumber_MultipleAnswersSubmeasure = 'Multiple question + Number';
    const MultipleQuestion_MultipleAnswersSubmeasure          = 'Multiple question';
    
    public function CreateMeasure($desc = null, $auditGroup = null, $auditSubgroup = null, $quantitative = 'ignore', $submeasureType = null,
                                   $questions = null, $options = null, $requiredTotalAnswers = null, $popupDesc = null, $state = null, $points = null)
    {
        $I = $this;
        $I->amOnPage(\Page\MeasureCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureCreate::$DescriptionField);
        if (isset($desc)){
            $I->fillField(\Page\MeasureCreate::$DescriptionField, $desc);
        }
        if (isset($auditGroup)){
            $I->selectOption(\Page\MeasureCreate::$AuditGroupSelect, $auditGroup);
        }
        if (isset($auditSubgroup)){
            $I->wait(1);
            $I->click(\Page\MeasureCreate::$AuditSubgroupSelect);
            $I->wait(1);
            $I->selectOption(\Page\MeasureCreate::$AuditSubgroupSelect, $auditSubgroup);
        }
        switch ($quantitative){
            case 'yes':
                $I->click(\Page\MeasureCreate::$IsQuantitativeToggleButton);
                $I->wait(3);
                if(isset($submeasureType)){
                    $I->selectOption(\Page\MeasureCreate::$SubmeasureTypeSelect, $submeasureType);
                    $I->wait(2);
                    switch ($submeasureType){
                        case 'Multiple question + Number':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureCreate::$AddQuestionButton_MultipleQuestionAndNumber);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureCreate::QuestionField_MultipleQuestionAndNumber($i), $questions[$k]);
                                }
                            }
                            if (isset($options)){
                                for ($i=1, $c= count($options); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureCreate::$AddAnswerButton_MultipleQuestionAndNumber);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureCreate::AnswerField_MultipleQuestionAndNumber($i), $options[$k]);
                                }  
                            }
                            if (isset($requiredTotalAnswers)){
                                $I->fillField(\Page\MeasureCreate::$TotalAnswersRequiredField_MultipleQuestionAndNumber, $requiredTotalAnswers);
                            }
                            break;
                        case 'Number':
                            if (isset($questions)){
                                $I->wait(1);
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureCreate::$AddAnswerButton_Number);
                                    $I->wait(2);
                                    $I->fillField(\Page\MeasureCreate::AnswerField_Number($i), $questions[$k]);
                                }
                            }
                            break;
                        case 'Popup Therms':
                            if (isset($popupDesc)){
                                $I->fillField(\Page\MeasureCreate::$PopupDescriptionField_PopupTherms, $popupDesc);
                            }
                            break;
                        case 'Popup Lighting':
                            if (isset($popupDesc)){
                                $I->fillField(\Page\MeasureCreate::$PopupDescriptionField_PopupLighting, $popupDesc);
                            }
                            break;
                        case 'Popup Waste diversion':
                            if (isset($popupDesc)){
                                $I->fillField(\Page\MeasureCreate::$PopupDescriptionField_PopupWasteDiversion, $popupDesc);
                            }
                            break;
                        case 'Select submeasure type':
                            break;
                    }
                }
                break;
            case 'no':
                $I->click(\Page\MeasureCreate::$HaveMultipleAnswersToggleButton);
                $I->wait(3);
                if(isset($submeasureType)){
                    $I->selectOption(\Page\MeasureCreate::$SubmeasureTypeSelect, $submeasureType);
                    $I->wait(2);
                    switch ($submeasureType){
                        case 'Multiple question + Number':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureCreate::$AddQuestionButton_MultipleQuestionAndNumber);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureCreate::QuestionField_MultipleQuestionAndNumber($i), $questions[$k]);
                                }
                            }
                            if (isset($options)){
                                for ($i=1, $c= count($options); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureCreate::$AddAnswerButton_MultipleQuestionAndNumber);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureCreate::AnswerField_MultipleQuestionAndNumber($i), $options[$k]);
                                }  
                            }
                            if (isset($requiredTotalAnswers)){
                                $I->fillField(\Page\MeasureCreate::$TotalAnswersRequiredField_MultipleQuestionAndNumber, $requiredTotalAnswers);
                            }
                            break;
                        case 'Multiple question':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureCreate::$AddAnswerButton_MultipleAnswers);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureCreate::AnswerField_MultipleAnswers($i), $questions[$k]);
                                }
                            }
                            if (isset($requiredTotalAnswers)){
                                $I->fillField(\Page\MeasureCreate::$TotalAnswersRequiredField_MultipleAnswers, $requiredTotalAnswers);
                            }
                            break;                    
                        case 'Select submeasure type':
                            break;
                    }
                }
                break;
            case 'ignore':
                break;
        }
        if (isset($points)){
            $I->fillField(\Page\MeasureCreate::$PointsField, $points);
        }
        if (isset($state)){
            $I->canSeeOptionIsSelected(\Page\MeasureCreate::$StateDisableSelect, $state);
        }
        $I->wait(2);
        $I->click(\Page\MeasureCreate::$CreateButton);
        $I->wait(2);
    }  
    
    public function CheckSavedValuesOnMeasureUpdatePage($desc = null, $auditGroup = null, $auditSubgroup = null, $quantitative = 'ignore', $submeasureType = null,
                           $questions = null, $answers = null, $requiredTotalAnswers = null, $popupDesc = null, $state = null, $quantToggleStatus = 'ignore', 
                           $multipAnswerToggleStatus ='ignore', $points = null)
    {
        $I = $this;
        $I->wait(2);
        $I->waitForElement(\Page\MeasureUpdate::$UpdateButton);
        if (isset($desc)){
            $I->canSeeInField(\Page\MeasureUpdate::$DescriptionField, $desc);
        }
        if (isset($auditGroup)){
            $I->canSeeOptionIsSelected(\Page\MeasureUpdate::$AuditGroupSelect, $auditGroup);
        }
        if (isset($auditSubgroup)){
            $I->canSeeOptionIsSelected(\Page\MeasureUpdate::$AuditSubgroupSelect, $auditSubgroup);
        }
        switch ($quantToggleStatus){
            case 'on':
                $I->canSeeElement(\Page\MeasureUpdate::$IsQuantitativeToggleButton." [style*='(111, 183, 80)']");
                break;
            case 'off':
                $I->canSeeElement(\Page\MeasureUpdate::$IsQuantitativeToggleButton." [style*='(209, 74, 60)']");
                break;
            case 'ignore':
                break;
        }
        switch ($multipAnswerToggleStatus){
            case 'on':
                $I->canSeeElement(\Page\MeasureUpdate::$HaveMultipleAnswersToggleButton." [style*='(111, 183, 80)']");
                break;
            case 'off':
                $I->canSeeElement(\Page\MeasureUpdate::$HaveMultipleAnswersToggleButton." [style*='(209, 74, 60)']");
                break;
            case 'ignore':
                break;
        }
        switch ($quantitative){
            case 'yes':
                if(isset($submeasureType)){
                    $I->canSeeOptionIsSelected(\Page\MeasureUpdate::$SubmeasureTypeSelect, $submeasureType);
                    switch ($submeasureType){
                        case 'Multiple question + Number':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->canSeeInField(\Page\MeasureUpdate::QuestionField_MultipleQuestionAndNumber($i), $questions[$k]);
                                }
                            }
                            if (isset($answers)){
                                for ($i=1, $c= count($answers); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->canSeeInField(\Page\MeasureUpdate::AnswerField_MultipleQuestionAndNumber($i), $answers[$k]);
                                }  
                            }
                            if (isset($requiredTotalAnswers)){
                                $I->canSeeInField(\Page\MeasureUpdate::$TotalAnswersRequiredField_MultipleQuestionAndNumber, $requiredTotalAnswers);
                            }
                            break;
                        case 'Number':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->canSeeInField(\Page\MeasureUpdate::AnswerField_Number($i), $questions[$k]);
                                }
                            }
                            break;
                        case 'Popup Therms':
                            if (isset($popupDesc)){
                                $I->canSeeInField(\Page\MeasureUpdate::$PopupDescriptionField_PopupTherms, $popupDesc);
                            }
                            break;
                        case 'Popup Lighting':
                            if (isset($popupDesc)){
                                $I->canSeeInField(\Page\MeasureUpdate::$PopupDescriptionField_PopupLighting, $popupDesc);
                            }
                            break;
                        case 'Popup Waste diversion':
                            if (isset($popupDesc)){
                                $I->canSeeInField(\Page\MeasureUpdate::$PopupDescriptionField_PopupWasteDiversion, $popupDesc);
                            }
                            break;
                        case 'Select submeasure type':
                            break;
                    }
                }
                break;
            case 'no':
                if(isset($submeasureType)){
                    $I->canSeeOptionIsSelected(\Page\MeasureUpdate::$SubmeasureTypeSelect, $submeasureType);
                    switch ($submeasureType){
                        case 'Multiple question + Number':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->canSeeInField(\Page\MeasureUpdate::QuestionField_MultipleQuestionAndNumber($i), $questions[$k]);
                                }
                            }
                            if (isset($answers)){
                                for ($i=1, $c= count($answers); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->canSeeInField(\Page\MeasureUpdate::AnswerField_MultipleQuestionAndNumber($i), $answers[$k]);
                                }  
                            }
                            if (isset($requiredTotalAnswers)){
                                $I->canSeeInField(\Page\MeasureUpdate::$TotalAnswersRequiredField_MultipleQuestionAndNumber, $requiredTotalAnswers);
                            }
                            break;
                        case 'Multiple question':
                            if (isset($answers)){
                                for ($i=1, $c= count($answers); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->canSeeInField(\Page\MeasureUpdate::AnswerField_MultipleAnswers($i), $answers[$k]);
                                }
                            }
                            if (isset($requiredTotalAnswers)){
                                $I->canSeeInField(\Page\MeasureUpdate::$TotalAnswersRequiredField_MultipleAnswers, $requiredTotalAnswers);
                            }
                            break;
                        case 'Select submeasure type':
                            break;    
                    } 
                }
            case 'ignore':
                break;
        }
        if (isset($points)){
            $I->canSeeInField(\Page\MeasureUpdate::$PointsField, $points);
        }
        if (isset($state)){
            $I->canSeeOptionIsSelected(\Page\MeasureUpdate::$StateDisableSelect, $state);
        }
    }
        
        
    public function GetMeasureRowNumber($desc)
    {
        $I = $this;
        $I->wantTo("Get Measure Row Number On List");
        $I->amOnPage(\Page\MeasureList::$URL);
        $I->wait(1);
        $count = $I->getAmount($I, \Page\MeasureList::$MeasureRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\MeasureList::DescriptionLine($i)) == $desc){
                break;
            }
            else {$I->fail("Measure $desc NOT FOUND!!!");}
        }
        $I->comment("Measure with description $desc is on $i row");
        return $i;
    } 
    
    public function GoToMeasureUpdatePage($desc)
    {
        $I = $this;
        $I->wantTo("Go to measure update page");
        $I->amOnPage(\Page\MeasureList::URL());
        $I->wait(2);
        $I->click(\Page\MeasureList::UpdateButtonLine_ByDescValue($desc));
        $I->wait(2);
    } 
    
    public function CheckSavedValuesOnMeasureListPage($row, $desc = null, $quantitative = 'ignore', $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\MeasureList::URL());
        $I->wait(2);
        if (isset($desc)){
            $I->see($desc, \Page\MeasureList::DescriptionLine($row));
        }
        if (isset($status)){
            $I->see($status, \Page\MeasureList::StatusLine($row));
        }
        switch ($quantitative){
            case 'yes':
                $I->see('Yes', \Page\MeasureList::StatusLine($row));
                break;
            case 'no':
                $I->see('No', \Page\MeasureList::StatusLine($row));
                break;
            case 'ignore':
                break;
        }
    }
    
    public function UpdateMeasure($desc = null, $auditGroup = null, $auditSubgroup = null, $quantitative = 'ignore', $submeasureType = null,
                                   $questions = null, $answers = null, $requiredTotalAnswers = null, $popupDesc = null, $state = null, $points = null)
    {
        $I = $this;
        $I->amOnPage(\Page\MeasureList::URL());
        $I->wait(1);
        $I->click(\Page\MeasureList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\MeasureUpdate::$DescriptionField);
        if (isset($desc)){
            $I->fillField(\Page\MeasureUpdate::$DescriptionField, $desc);
        }
        if (isset($auditGroup)){
            $I->selectOption(\Page\MeasureUpdate::$AuditGroupSelect, $auditGroup);
        }
        if (isset($auditSubgroup)){
            $I->wait(1);
            $I->selectOption(\Page\MeasureUpdate::$AuditSubgroupSelect, $auditSubgroup);
        }
        switch ($quantitative){
            case 'yes':
                $I->click(\Page\MeasureUpdate::$IsQuantitativeToggleButton);
                $I->wait(3);
                if(isset($submeasureType)){
                    $I->selectOption(\Page\MeasureUpdate::$SubmeasureTypeSelect, $submeasureType);
                    $I->wait(2);
                    switch ($submeasureType){
                        case 'Multiple question + Number':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureUpdate::$AddQuestionButton_MultipleQuestionAndNumber);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureUpdate::QuestionField_MultipleQuestionAndNumber($i), $questions[$k]);
                                }
                            }
                            if (isset($answers)){
                                for ($i=1, $c= count($answers); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureUpdate::$AddAnswerButton_MultipleQuestionAndNumber);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureUpdate::AnswerField_MultipleQuestionAndNumber($i), $answers[$k]);
                                }  
                            }
                            if (isset($requiredTotalAnswers)){
                                $I->fillField(\Page\MeasureUpdate::$TotalAnswersRequiredField_MultipleQuestionAndNumber, $requiredTotalAnswers);
                            }
                            break;
                        case 'Number':
                            if (isset($questions)){
                                for ($i=1, $c= count($questions); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\MeasureUpdate::$AddAnswerButton_Number);
                                    $I->wait(1);
                                    $I->fillField(\Page\MeasureUpdate::AnswerField_Number($i), $questions[$k]);
                                }
                            }
                            break;
                        case 'Popup Therms':
                            if (isset($popupDesc)){
                                $I->fillField(\Page\MeasureUpdate::$PopupDescriptionField_PopupTherms, $popupDesc);
                            }
                            break;
                        case 'Popup Lighting':
                            if (isset($popupDesc)){
                                $I->fillField(\Page\MeasureUpdate::$PopupDescriptionField_PopupLighting, $popupDesc);
                            }
                            break;
                        case 'Popup Waste diversion':
                            if (isset($popupDesc)){
                                $I->fillField(\Page\MeasureUpdate::$PopupDescriptionField_PopupWasteDiversion, $popupDesc);
                            }
                            break;
                        case 'Select submeasure type':
                            break;
                    }
                }
                break;
            case 'no':
                $I->click(\Page\MeasureUpdate::$HaveMultipleAnswersToggleButton);
                $I->wait(2);
                if (isset($answers)){
                    for ($i=1, $c= count($answers); $i<=$c; $i++){
                        $k = $i-1;
                        $I->click(\Page\MeasureUpdate::$AddAnswerButton_MultipleAnswers);
                        $I->wait(1);
                        $I->fillField(\Page\MeasureUpdate::AnswerField_MultipleAnswers($i), $answers[$k]);
                    }
                }
                break;
            case 'ignore':
                break;
        }
        if (isset($state)){
            $I->fillField(\Page\MeasureUpdate::$PointsField, $points);
        }
        if (isset($state)){
            $I->seeOptionIsSelected(\Page\MeasureUpdate::$StateDisableSelect, $state);
        }
        $I->click(\Page\MeasureUpdate::$UpdateButton);
        $I->wait(1);
    }
}