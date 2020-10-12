<?php
namespace Step\Acceptance;

class GreenTipForMeasure extends \AcceptanceTester
{
    public function CreateMeasureGreenTip($desc = null, $programsArray = null, $allPrograms = 'yes', $allSectors = 'yes', $sectorsArray = null)
    {
        $I = $this;
        $I->waitPageLoad();
        if (isset($desc)){
            $I->fillCkEditorTextarea(\Page\MeasureGreenTipCreate::$DescriptionField, $desc);
        }
        switch ($allPrograms){
            case 'yes':
                $I->click(\Page\MeasureGreenTipCreate::$UseForAllProgramsToggleButton);
                $I->wait(1);
                $I->waitPageLoad();
                break;
            case 'no':
                if (isset($programsArray)){
                    for ($i=1, $c= count($programsArray); $i<=$c; $i++){
                    $k = $i-1;
                    $I->click(\Page\MeasureGreenTipCreate::$ProgramSelect);
                    $I->wait(1);
                    $I->click(\Page\MeasureGreenTipCreate::selectProgramOptionByName($programsArray[$k]));
                    }
                }
                break;
        }
        $I->comment("All sectors value: $allSectors");
        switch ($allSectors){
            case 'yes':
                break;
            case 'no':
                $I->comment("sector choose1");
                $I->makeElementNotVisible([\Page\MeasureGreenTipCreate::$UseForAllSectorsToggleButtonSelect]);
                $I->wait(1);
                $I->selectOption(\Page\MeasureGreenTipCreate::$UseForAllSectorsToggleButtonSelect, 'no');
                $I->wait(1);
                $I->waitPageLoad();
                if (isset($sectorsArray)){
                    $I->comment("sector choose2");
                    for ($i=1, $c= count($sectorsArray); $i<=$c; $i++){
                    $k = $i-1;
                    $I->click(\Page\MeasureGreenTipCreate::$SectorSelect);
                    $I->wait(1);
                    $I->comment("sector choose3");
                    $I->click(\Page\MeasureGreenTipCreate::selectSectorOptionByName($sectorsArray[$k]));
                    }
                }
                break;
        }
        $I->comment("sector choose4");
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