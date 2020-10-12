<?php
namespace Step\Acceptance;

class Program extends \AcceptanceTester
{
    public function CreateProgram($name = null, $state = null, $cityArray = null, $recerticationCycle = '1 year', $compledTiersArray = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ProgramCreate::URL());
        if (isset($name)){
            $I->fillField(\Page\ProgramCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\ProgramCreate::$StateSelect, $state);
            $I->wait(5);
            $I->waitPageLoad();
        }
        if (isset($cityArray)){
            for ($i=1, $c= count($cityArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\ProgramCreate::$CitySelect);
                $I->wait(3);
                $I->click(\Page\ProgramCreate::selectCityOptionByName($cityArray[$k]));
            }
        }
        $I->selectOption(\Page\ProgramCreate::$RecertificationCycleSelect, $recerticationCycle);
        if (isset($compledTiersArray)){
            for ($i=1, $c= count($compledTiersArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\ProgramCreate::$CompletedTiersSelect);
                $I->wait(3);
                $I->click(\Page\ProgramCreate::selectCompletedTiersOptionByName($compledTiersArray[$k]));
            }
        }
        $I->click(\Page\ProgramCreate::$CreateButton);
        $I->wait(1);
        $I->waitPageLoad('150');
    }  
    
    public function GetProgramOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\ProgramList::URL());
        $count = $I->grabTextFrom(\Page\ProgramList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\ProgramList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\ProgramList::$ProgramRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\ProgramList::NameLine($j)) == $name){
                    $I->comment("I find program: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $prog['id']   = $I->grabTextFrom(\Page\ProgramList::IdLine($j));
        $prog['page'] = $i;
        $prog['row']  = $j;
        return $prog;
    }
    
    public function UpdateProgram($idProg = null, $name = null, $state = null, $cityArray = null, $weighted = null, $recerticationCycle = null, $compledTiersArray = null)
    {
        $I = $this;
        if (isset($idProg)){
            $I->amOnPage(\Page\ProgramUpdate::URL($idProg));
        }
        $I->wait(3);
        $I->waitForElement(\Page\ProgramUpdate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\ProgramUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\ProgramUpdate::$StateSelect, $state);
            $I->wait(5);
        }
        if (isset($cityArray)){
            for ($i=1, $c= count($cityArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\ProgramUpdate::$CitySelect);
                $I->wait(3);
                $I->click(\Page\ProgramUpdate::selectCityOptionByName($cityArray[$k]));
            }
        }
        if (isset($weighted)){
            $I->selectOption(\Page\ProgramUpdate::$WeightedSelect, $weighted);
            $I->wait(1);
        }
        if (isset($recerticationCycle)){
            $I->selectOption(\Page\ProgramUpdate::$RecertificationCycleSelect, $recerticationCycle);
        }
        if (isset($compledTiersArray)){
            for ($i=1, $c= count($compledTiersArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\ProgramUpdate::$CompletedTiersSelect);
                $I->wait(3);
                $I->click(\Page\ProgramUpdate::selectCompletedTiersOptionByName($compledTiersArray[$k]));
            }
        }
        $I->click(\Page\ProgramUpdate::$UpdateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }  
}