<?php
namespace Step\Acceptance;

class GreenTipForAuditGroup extends \AcceptanceTester
{
    public function CreateAuditGreenTip($title = null, $desc = null, $program = null, $allProg = 'ignore')
    {
        $I = $this;
        $I->amOnPage(\Page\AuditGreenTipCreate::URL());
        $I->wait(2);
        $I->waitForElement(\Page\AuditGreenTipCreate::$CreateButton);
        if (isset($desc)){
            $I->fillCkEditorTextarea(\Page\AuditGreenTipCreate::$DescriptionField, $desc);
            $I->wait(2);
        }
        if (isset($title)){
            $I->fillField(\Page\AuditGreenTipCreate::$TitleField, $title);
        }
//        switch ($allProg){
//            case 'yes':
//                $I->click(\Page\AuditGreenTipCreate::$UseForAllProgramsToggleButton);
//                $I->wait(1);
//                break;
//            case 'no':
//                break;
//            case 'ignore':
//                break;
//        }
        if (isset($program)){
            for ($i=1, $c= count($program); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\AuditGreenTipCreate::$ProgramSelect);
                $I->wait(1);
                $I->click(\Page\AuditGreenTipCreate::selectProgramOptionByName($program[$k]));
            }
        }
        $I->click(\Page\AuditGreenTipCreate::$CreateButton);
        $I->wait(2);
    }  
    
    public function UpdateAuditGreenTip($title = null, $desc = null, $program = null, $group = null, $subgroup = null, $allProg = 'ignore')
    {
        $I = $this;
        $I->wait(2);
        $I->waitForElement(\Page\AuditGreenTipUpdate::$AddAuditGroupButton);
        if (isset($title)){
            $I->fillField(\Page\AuditGreenTipUpdate::$TitleField, $title);
        }
        if (isset($desc)){
            $I->fillCkEditorTextarea(\Page\AuditGreenTipUpdate::$DescriptionField, $desc);
        }
        if (isset($program)){
            $kil = $I->getAmount($I, \Page\AuditGreenTipUpdate::$DeleteProgramOption);
            $I->comment("Count of selected options: $kil");
            if($kil!=0){
                for($k=1; $k<=$kil; $k++){
                    $I->click(\Page\AuditGreenTipUpdate::DeleteSelectedProgramOption('1'));
                    $I->wait(1);
                }
            }
            for ($i=1, $c = count($program); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\AuditGreenTipUpdate::$ProgramSelect);
                $I->wait(1);
                $I->click(\Page\AuditGreenTipUpdate::selectProgramOptionByName($program[$k]));
            }
        }
        $I->click(\Page\AuditGreenTipUpdate::$UpdateButton);
        $I->wait(2);
    } 
}