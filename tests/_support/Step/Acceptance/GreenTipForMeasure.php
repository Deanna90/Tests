<?php
namespace Step\Acceptance;

class GreenTipForMeasure extends \AcceptanceTester
{
    public function CreateMeasureGreenTip($desc = null, $program = null)
    {
        $I = $this;
        $I->waitPageLoad();
        if (isset($desc)){
            $I->fillCkEditorTextarea(\Page\MeasureGreenTipCreate::$DescriptionField, $desc);
        }
        if (isset($program)){
            for ($i=1, $c= count($program); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\MeasureGreenTipCreate::$ProgramSelect);
                $I->wait(1);
                $I->click(\Page\MeasureGreenTipCreate::selectProgramOptionByName($program[$k]));
            }
        }
        $I->click(\Page\MeasureGreenTipCreate::$CreateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }  
    
    public function UpdateMeasureGreenTip($desc = null, $program = null)
    {
        $I = $this;
        $I->waitPageLoad();
        if (isset($desc)){
            $I->fillCkEditorTextarea(\Page\MeasureGreenTipUpdate::$DescriptionField, $desc);
        }
        if (isset($program)){
            $kil = $I->getAmount($I, \Page\MeasureGreenTipUpdate::$DeleteProgramOption);
            $I->comment("Count of selected options: $kil");
            if($kil!=0){
                for($k=1; $k<=$kil; $k++){
                    $I->click(\Page\MeasureGreenTipUpdate::DeleteSelectedProgramOption('1'));
                    $I->wait(1);
                }
            }
            for ($i=1, $c = count($program); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\MeasureGreenTipUpdate::$ProgramSelect);
                $I->wait(1);
                $I->click(\Page\MeasureGreenTipUpdate::selectProgramOptionByName($program[$k]));
            }
        }
        $I->click(\Page\MeasureGreenTipUpdate::$UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    } 
}