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
}