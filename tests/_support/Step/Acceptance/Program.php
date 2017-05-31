<?php
namespace Step\Acceptance;

class Program extends \AcceptanceTester
{
    public function CreateProgram($name = null, $state = null, $city = null, $recerticationCycle = '1 year')
    {
        $I = $this;
        $I->amOnPage(\Page\ProgramCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\ProgramCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\ProgramCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\ProgramCreate::$StateSelect, $state);
        }
        if (isset($city)){
            for ($i=1, $c= count($city); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\ProgramCreate::$CitySelect);
                $I->wait(1);
                $I->click(\Page\ProgramCreate::selectCityOptionByName($city[$k]));
            }
        }
        $I->selectOption(\Page\ProgramCreate::$RecertificationCycleSelect, $recerticationCycle);
        $I->click(\Page\ProgramCreate::$CreateButton);
        $I->wait(1);
    }  
    
    public function GetProgramOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\ProgramList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\ProgramList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\ProgramList::UrlPageNumber($i));
            $I->wait(1);
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
}