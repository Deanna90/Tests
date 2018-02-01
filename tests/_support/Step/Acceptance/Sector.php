<?php
namespace Step\Acceptance;

class Sector extends \AcceptanceTester
{
    
    public function CreateSector($name = null, $state = null, $program = null, $status = null, $stateId = null)
    {
        $I = $this;
        if (parent::$URL_UserAccess == '/state-admin'){
            $I->amOnPage(\Page\SectorCreate::URL()."?state_id=$stateId");
        }
        else {
            $I->amOnPage(\Page\SectorCreate::URL());
        }
        $I->wait(2);
        $I->waitForElement(\Page\SectorCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\SectorCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\SectorCreate::$StateSelect, $state);
            $I->wait(2);
        }
        if (isset($program)){
            $I->selectOption(\Page\SectorCreate::$ProgramSelect, $program);
            $I->wait(2);
        }
        if (isset($status)){
            $I->selectOption(\Page\SectorCreate::$StatusSelect, $status);
        }
        $I->click(\Page\SectorCreate::$CreateButton);
        $I->wait(3);
    } 
    
    public function UpdateSector($name = null, $program = null, $newName = null)
    {
        $I = $this;
        $I->amOnPage(\Page\SectorList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\SectorList::$CreateSectorButton);
        $I->click(\Page\SectorList::UpdateButtonLine_ByNameValue($name, $program));
        $I->wait(1);
        $I->waitForElement(\Page\SectorRenameWindow::$RenameWindow);
        $I->fillField(\Page\SectorRenameWindow::$NameField, $newName);
        $I->wait(1);
        $I->click(\Page\SectorRenameWindow::$UpdateButton);
        $I->wait(3);
    } 
    
    public function CheckInFieldsOnSectorUpdatePage($name = null, $state = null, $zips = null)
    {
        $I = $this;
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
    
    public function CheckValuesOnSectorListPage($name = null, $program = null, $status = 'active', $countBus = '0')
    {
        $I = $this;
        $I->amOnPage(\Page\SectorList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\SectorList::$CreateSectorButton);
        $I->canSeeElement(\Page\SectorList::NameLine_ByNameValue($name, $program));
        if (isset($status)){
            $I->canSee($status, \Page\SectorList::StatusLine_ByNameValue($name, $program));
        }
        if (isset($countBus)){
            $I->canSee($countBus, \Page\SectorList::CountOfBusinessesLine_ByNameValue($name, $program));
        }
    }
    
}