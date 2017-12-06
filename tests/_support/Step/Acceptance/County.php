<?php
namespace Step\Acceptance;

class County extends \AcceptanceTester
{

    public function CreateCounty($name = null, $state = null)
    {
        $I = $this;
        $I->wantTo("Create County");
        $I->amOnPage(\Page\CountyCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\CountyCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\CountyCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\CountyCreate::$StateSelect, $state);
        }
        $I->click(\Page\CountyCreate::$CreateButton);
        $I->wait(3);
    }  
    
    public function UpdateCounty($row, $name = null, $state = null)
    {
        $I = $this;
        $I->wantTo("Update County");
        $I->amOnPage(\Page\CountyList::URL());
        $I->wait(1);
        $I->click(\Page\CountyList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\CountyUpdate::$UpdateButton);
        if (isset($name)){
            $I->fillField(\Page\CountyUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\CountyUpdate::$StateSelect, $state);
        }
        $I->click(\Page\CountyUpdate::$UpdateButton);
        $I->wait(1);
    }
    
    public function CheckInFieldsOnCountyUpdatePage($name = null, $state = null)
    {
        $I = $this;
        $I->wantTo("Check Saved Values On County Update Page");
        $I->wait(1);
        $I->waitForElement(\Page\CountyUpdate::$UpdateButton);
        if (isset($name)){
            $I->canSeeInField(\Page\CountyUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->canSeeOptionIsSelected(\Page\CountyUpdate::$StateSelect, $state);
        }
    }
    
    public function GetCountyOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\CountyList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\CountyList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\CountyList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\CountyList::$CityRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\CountyList::NameLine($j)) == $name){
                    $I->comment("I find county: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $county['id']   = $I->grabTextFrom(\Page\CountyList::IdLine($j));
        $county['page'] = $i;
        $county['row']  = $j;
        return $county;
    }
    
    public function CheckValuesOnCountyListPage($row, $name = null, $state = null, $updatedDate = null)
    {
        $I = $this;
        $I->wantTo("Check Saved Values On County List Page");
        $I->amOnPage(\Page\CountyList::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\CountyList::$CreateCountyButton);
        if (isset($name)){
            $I->canSee($name, \Page\CountyList::NameLine($row));
        }
        if (isset($state)){
            $I->canSee($state, \Page\CountyList::StateLine($row));
        }
        if (isset($updatedDate)){
            $I->canSee($updatedDate, \Page\CountyList::UpdatedLine($row));
        }
    }
}