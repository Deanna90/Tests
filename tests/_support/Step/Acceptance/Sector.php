<?php
namespace Step\Acceptance;

class Sector extends \AcceptanceTester
{
    
    public function CreateSector($name = null, $state = null, $program = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\SectorCreate::URL());
        $I->wait(2);
        $I->waitForElement(\Page\SectorCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\SectorCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
            $I->wait(1);
        }
        if (isset($program)){
            $I->selectOption(\Page\SectorCreate::$ProgramSelect, $program);
            $I->wait(1);
        }
        if (isset($status)){
            $I->selectOption(\Page\SectorCreate::$StatusSelect, $status);
        }
        $I->click(\Page\SectorCreate::$CreateButton);
        $I->wait(1);
    } 
}