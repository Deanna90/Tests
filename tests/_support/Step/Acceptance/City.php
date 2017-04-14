<?php
namespace Step\Acceptance;

class City extends \AcceptanceTester
{
    public function CreateCity($name = null, $state = null, $zips = null)
    {
        $I = $this;
        $I->wantTo("Create City");
        $I->amOnPage(\Page\CityCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\CityCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\CityCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\CityCreate::$StateSelect, $state);
        }
        if (isset($zips)){
            $I->fillField(\Page\CityCreate::$ZipsField, $zips);
        }
        $I->click(\Page\CityCreate::$CreateButton);
        $I->wait(1);
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
            $I->seeInField(\Page\CityUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->seeOptionIsSelected(\Page\CityUpdate::$StateSelect, $state);
        }
        if (isset($zips)){
            $I->seeInField(\Page\CityUpdate::$ZipsField, $zips);
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
    
    public function CheckValuesOnCityListPage($row, $name = null, $state = null, $createdDate = null, $updatedDate = null, $status = 'active')
    {
        $I = $this;
        $I->wantTo("Check Saved Values On City List Page");
        $I->amOnPage(\Page\CityList::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\CityList::$CreateCityButton);
        if (isset($name)){
            $I->see($name, \Page\CityList::NameLine($row));
        }
        if (isset($state)){
            $I->see($shortName, \Page\CityList::StateLine($row));
        }
        if (isset($createdDate)){
            $I->see($createdDate, \Page\CityList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->see($updatedDate, \Page\CityList::UpdatedLine($row));
        }
        if (isset($status)){
            $I->see($status, \Page\CityList::StatusLine($row));
        }
    }
}