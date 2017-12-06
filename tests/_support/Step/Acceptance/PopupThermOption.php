<?php
namespace Step\Acceptance;

class PopupThermOption extends \AcceptanceTester
{
    public function CreateThermOption($name = null, $thermsCount = null)
    {
        $I = $this;
        $I->comment("Create Therm Option:");
        $I->amOnPage(\Page\PopupThermOptionCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\PopupThermOptionCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\PopupThermOptionCreate::$NameField, $name);
        }
        if (isset($thermsCount)){
            $I->fillField(\Page\PopupThermOptionCreate::$ThermsCountField, $thermsCount);
        }
        $I->click(\Page\PopupThermOptionCreate::$CreateButton);
        $I->wait(1);
    } 
    
    public function UpdateThermOption($name = null, $thermsCount = null)
    {
        $I = $this;
        $I->wait(1);
        $I->comment("Update Therm Option:");
        $I->waitForElement(\Page\PopupThermOptionUpdate::$UpdateButton);
        if (isset($name)){
            $I->fillField(\Page\PopupThermOptionUpdate::$NameField, $name);
        }
        if (isset($thermsCount)){
            $I->fillField(\Page\PopupThermOptionUpdate::$ThermsCountField, $thermsCount);
        }
        $I->click(\Page\PopupThermOptionUpdate::$UpdateButton);
        $I->wait(1);
    }
    
    public function CheckInFieldsOnThermOptionUpdatePage($name = null, $thermsCount = null)
    {
        $I = $this;
        $I->wait(1);
        $I->comment("Check correct saved values on therm option update page:");
        $I->waitForElement(\Page\PopupThermOptionUpdate::$UpdateButton);
        if (isset($name)){
            $I->canSeeInField(\Page\PopupThermOptionUpdate::$NameField, $name);
        }
        if (isset($thermsCount)){
            $I->canSeeInField(\Page\PopupThermOptionUpdate::$ThermsCountField, $thermsCount);
        }
    }
    
    public function GetThermOptionRowNumber($name)
    {
        $I = $this;
        
        $I->amOnPage(\Page\PopupThermOptionList::$URL);
        $I->wait(1);
        $count = $I->getAmount($I, \Page\PopupThermOptionList::$ThermOptionRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\PopupThermOptionList::NameLine($i)) == $name){
                break;
            }
        }
        $I->comment("Therm option $name is on $i row");
        return $i;
    }
    
    public function GetThermOptionOnPageInList($name)
    {
        $I = $this;
        $I->comment("Get Therm Option on list. Get id, page number and row:");
        $I->amOnPage(\Page\PopupThermOptionList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\PopupThermOptionList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\PopupThermOptionList::UrlPageNumber($i));
            $I->wait(2);
            $rows = $I->getAmount($I, \Page\PopupThermOptionList::$ThermOptionRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\PopupThermOptionList::NameLine($j)) == $name){
                    $I->comment("I find therm option: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $therm['id']   = $I->grabTextFrom(\Page\PopupThermOptionList::IdLine($j));
        $therm['page'] = $i;
        $therm['row']  = $j;
        return $therm;
    }
    
    public function CheckValuesOnThermsListPage($row, $name = null, $thermsCount = null, $status = 'active')
    {
        $I = $this;
        $I->comment("Check correct saved values on Therm Options List:");
        $I->amOnPage(\Page\PopupThermOptionList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\PopupThermOptionList::$CreatePopupThermsOptionButton);
        if (isset($name)){
            $I->canSee($name, \Page\PopupThermOptionList::NameLine($row));
        }
        if (isset($thermsCount)){
            $I->canSee($thermsCount, \Page\PopupThermOptionList::ThermsCountLine($row));
        }
        if (isset($status)){
            $I->canSee($status, \Page\PopupThermOptionList::StatusLine($row));
        }
    }
}