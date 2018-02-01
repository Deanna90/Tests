<?php
namespace Step\Acceptance;

class City extends \AcceptanceTester
{
    public function CreateCity($name = null, $state = null, $zips = null, $county = null)
    {
        $I = $this;
        $I->wantTo("Create City");
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(2);
        $I->waitForElement(\Page\CityCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\CityCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\CityCreate::$StateSelect, $state);
        }
        if (isset($county)){
            $I->wait(5);
            $I->selectOption(\Page\CityCreate::$CountySelect, $county);
        }
        if (isset($zips)){
            $I->fillField(\Page\CityCreate::$ZipsField, $zips);
        }
        $I->click(\Page\CityCreate::$CreateButton);
        $I->wait(3);
    }  
    
    public function UpdateCity($row, $name = null, $state = null, $zips = null)
    {
        $I = $this;
        $I->wantTo("Update City");
        $I->amOnPage(\Page\CityList::URL());
        $I->wait(1);
        $I->click(\Page\CityList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\CityUpdate::$UpdateButton);
        if (isset($name)){
            $I->fillField(\Page\CityUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\CityUpdate::$StateSelect, $state);
        }
        if (isset($zips)){
            $I->fillField(\Page\CityUpdate::$ZipsField, $zips);
        }
        $I->click(\Page\CityUpdate::$UpdateButton);
        $I->wait(1);
    }
    
    public function CheckInFieldsOnCityUpdatePage($name = null, $state = null, $zips = null)
    {
        $I = $this;
        $I->wantTo("Check Saved Values On City Update Page");
        $I->wait(1);
        $I->waitForElement(\Page\CityUpdate::$UpdateButton);
        if (isset($name)){
            $I->canSeeInField(\Page\CityUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->canSeeOptionIsSelected(\Page\CityUpdate::$StateSelect, $state);
        }
        if (isset($zips)){
            $I->canSeeInField(\Page\CityUpdate::$ZipsField, $zips);
        }
    }
    
    public function GetCityRowNumber($name)
    {
        $I = $this;
        $I->wantTo("Get City Row Number On List");
        $I->amOnPage(\Page\CityList::$URL);
        $I->wait(1);
        $count = $I->getAmount($I, \Page\CityList::$CityRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\CityList::NameLine($i)) == $name){
                break;
            }
        }
        $I->comment("City $name is on $i row");
        return $i;
    }
    
    public function GetCityOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\CityList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\CityList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\CityList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\CityList::$CityRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\CityList::NameLine($j)) == $name){
                    $I->comment("I find city: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $city['id']   = $I->grabTextFrom(\Page\CityList::IdLine($j));
        $city['page'] = $i;
        $city['row']  = $j;
        return $city;
    }
    
    public function CheckValuesOnCityListPage($row, $name = null, $state = null, $createdDate = null, $updatedDate = null, $status = 'active')
    {
        $I = $this;
        $I->wantTo("Check Saved Values On City List Page");
        $I->amOnPage(\Page\CityList::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\CityList::$CreateCityButton);
        if (isset($name)){
            $I->canSee($name, \Page\CityList::NameLine($row));
        }
        if (isset($state)){
            $I->canSee($state, \Page\CityList::StateLine($row));
        }
        if (isset($createdDate)){
            $I->canSee($createdDate, \Page\CityList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->canSee($updatedDate, \Page\CityList::UpdatedLine($row));
        }
        if (isset($status)){
            $I->canSee($status, \Page\CityList::StatusLine($row));
        }
    }
}