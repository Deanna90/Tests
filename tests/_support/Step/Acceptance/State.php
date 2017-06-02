<?php
namespace Step\Acceptance;

class State extends \AcceptanceTester
{

    public function CreateState($name = null, $shortName = null, $weighted = 'No')
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
            case 'No':
                $I->selectOption(\Page\StateCreate::$WeightedSelect, $weighted);
                break;
            case 'Input':
                $I->selectOption(\Page\StateCreate::$WeightedSelect, $weighted);
                break;
            case 'Questions':
                $I->selectOption(\Page\StateCreate::$WeightedSelect, $weighted);
                break;
            case 'ignore':
                break;
        }
        $I->click(\Page\StateCreate::$CreateButton);
        $I->wait(1);
    }  
    
    public function UpdateState($id, $name = null, $shortName = null, $weighted = 'ignore')
    {
        $I = $this;
        $I->wantTo("Update State");
        $I->amOnPage(\Page\StateUpdate::URL($id));
        $I->wait(1);
        $I->waitForElement(\Page\StateUpdate::$UpdateButton);
        if (isset($name)){
            $I->fillField(\Page\StateUpdate::$NameField, $name);
        }
        if (isset($shortName)){
            $I->fillField(\Page\StateUpdate::$ShortNameField, $shortName);
        }
        switch ($weighted) {
            case 'No':
                $I->selectOption(\Page\StateUpdate::$WeightedSelect, $weighted);
                break;
            case 'Input':
                $I->selectOption(\Page\StateUpdate::$WeightedSelect, $weighted);
                break;
            case 'Questions':
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
        $I->wait(1);
        $I->waitForElement(\Page\StateUpdate::$UpdateButton);
        if (isset($name)){
            $I->canSeeInField(\Page\StateUpdate::$NameField, $name);
            $I->canSee("Update State: $name", \Page\StateUpdate::$Title);
        }
        if (isset($shortName)){
            $I->canSeeInField(\Page\StateUpdate::$ShortNameField, $shortName);
        }
        if (isset($weighted)){
            $I->canSeeOptionIsSelected(\Page\StateUpdate::$WeightedSelect, $weighted);
        }
    }
    
    public function GetStateRowNumber($name)
    {
        $I = $this;
        $I->wantTo("Get State Row Number On List");
        $I->amOnPage(\Page\StateList::URL());
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
    
    public function GetStateOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\StateList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\StateList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\StateList::$StateRow);
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\StateList::NameLine($j)) == $name){
                    $I->comment("I find state: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $state['id']   = $I->grabTextFrom(\Page\StateList::IdLine($j));
        $state['page'] = $i;
        $state['row']  = $j;
        return $state;
    }
    
    public function GetAllStatesNames()
    {
        $I = $this;
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $states = [];
        $count = $I->grabTextFrom(\Page\StateList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\StateList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\StateList::$StateRow);
            for($j=1; $j<=$rows; $j++){
                $states[] = $I->grabTextFrom(\Page\StateList::NameLine($j));
            }
        }
        return $states;
    }
    
    public function CheckValuesOnStateListPage($row, $name = null, $shortName = null, $weighted = null, $createdDate = null, $updatedDate = null, $status = 'active')
    {
        $I = $this;
        $I->wantTo("Check Saved Values On State List Page");
//        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\StateList::$CreateStateButton);
        if (isset($name)){
            $I->canSee($name, \Page\StateList::NameLine($row));
        }
        if (isset($shortName)){
            $I->canSee($shortName, \Page\StateList::ShortNameLine($row));
        }
        if (isset($weighted)){
            $I->canSee($weighted, \Page\StateList::WeightedLine($row));
        }
        if (isset($createdDate)){
            $I->canSee($createdDate, \Page\StateList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->canSee($updatedDate, \Page\StateList::CreatedLine($row));
        }
        if (isset($status)){
            $I->canSee($status, \Page\StateList::StatusLine($row));
        }
    }
}