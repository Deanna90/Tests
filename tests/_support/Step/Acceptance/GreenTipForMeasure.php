<?php
namespace Step\Acceptance;

class GreenTipForMeasure extends \AcceptanceTester
{
    public function CreateMeasureGreenTip($desc = null, $program = null)
    {
        $I = $this;
        $I->wait(2);
        $I->waitForElement(\Page\MeasureGreenTipCreate::$DescriptionField);
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
        $I->wait(2);
    }  
}