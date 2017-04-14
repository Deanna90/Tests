<?php
namespace Step\Acceptance;

class State extends \AcceptanceTester
{

    public function CreateState($name = null, $shortName = null, $weighted = 'no')
    {
        $I = $this;
        $I->wantTo("Create State");
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\StateCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\StateCreate::$NameField, $name);
        }
        if (isset($shortName)){
            $I->fillField(\Page\StateCreate::$ShortNameField, $shortName);
        }
        switch ($weighted) {
            case 'yes'||'no':
                $I->selectOption(\Page\StateCreate::$WeightedSelect, $weighted);
                break;
            case 'ignore':
                break;
        }
        $I->click(\Page\StateCreate::$CreateButton);
        $I->wait(1);
    }  
    
    public function UpdateState($row, $name = null, $shortName = null, $weighted = 'ignore')
    {
        $I = $this;
        $I->wantTo("Update State");
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->click(\Page\StateList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\StateUpdate::$UpdateButton);
        if (isset($name)){
            $I->fillField(\Page\StateUpdate::$NameField, $name);
        }
        if (isset($shortName)){
            $I->fillField(\Page\StateUpdate::$ShortNameField, $shortName);
        }
        switch ($weighted) {
            case 'yes'||'no':
                $I->selectOption(\Page\StateUpdate::$WeightedSelect, $weighted);
                break;
            case 'ignore':
                break;
        }
        $I->click(\Page\StateUpdate::$UpdateButton);
        $I->wait(1);
    }
    
    public function CheckInFieldsOnStateUpdatePage($name = null, $shortName = null, $weighted = null)
    {
        $I = $this;
        $I->wantTo("Check Saved Values On State Update Page");
        $I->wait(1);
        $I->waitForElement(\Page\StateUpdate::$UpdateButton);
        if (isset($name)){
            $I->seeInField(\Page\StateUpdate::$NameField, $name);
        }
        if (isset($shortName)){
            $I->seeInField(\Page\StateUpdate::$ShortNameField, $shortName);
        }
        if (isset($weighted)){
            $I->seeOptionIsSelected(\Page\StateUpdate::$WeightedSelect, $weighted);
        }
    }
    
    public function GetStateRowNumber($name)
    {
        $I = $this;
        $I->wantTo("Get State Row Number On List");
        $I->amOnPage(\Page\StateList::$URL);
        $I->wait(1);
        $count = $I->getAmount($I, \Page\StateList::$StateRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\StateList::NameLine($i)) == $name){
                break;
            }
        }
        $I->comment("State $name is on $i row");
        return $i;
    }
    
    public function CheckValuesOnStateListPage($row, $name = null, $shortName = null, $createdDate = null, $updatedDate = null, $status = 'active')
    {
        $I = $this;
        $I->wantTo("Check Saved Values On State List Page");
        $I->amOnPage(\Page\StateList::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\StateList::$CreateStateButton);
        if (isset($name)){
            $I->see($name, \Page\StateList::NameLine($row));
        }
        if (isset($shortName)){
            $I->see($shortName, \Page\StateList::ShortNameLine($row));
        }
        if (isset($createdDate)){
            $I->see($createdDate, \Page\StateList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->see($updatedDate, \Page\StateList::CreatedLine($row));
        }
        if (isset($status)){
            $I->see($status, \Page\StateList::StatusLine($row));
        }
    }
}