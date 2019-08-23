<?php
namespace Step\Acceptance;

class SavingArea extends \AcceptanceTester
{
    public function CreateSavingArea($name = null, $units = null, $shortUnits = null, $moneyConversionRate = null, $visualRepresentation = 'ignore', $chartColor = '#421717', 
                                $visualUnits = null, $image = null, $visualUnitsConversionRate = null, $visualName = null, $backgroundColor = '#df9d9d', $tileColor = '#921010', 
                                $status ='ignore')
    {
        $I = $this;
        $I->amOnPage(\Page\SavingAreaCreate::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\SavingAreaCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\SavingAreaCreate::$NameField, $name);
        }
        if (isset($units)){
            $I->fillField(\Page\SavingAreaCreate::$UnitsField, $units);
        }
        if (isset($shortUnits)){
            $I->fillField(\Page\SavingAreaCreate::$ShortUnitsField, $shortUnits);
        }
        if (isset($moneyConversionRate)){
            $I->fillField(\Page\SavingAreaCreate::$MoneyConversionRateField, $moneyConversionRate);
        }
        switch ($visualRepresentation) {
            case 'yes':
                $I->selectOption(\Page\SavingAreaCreate::$HasVisualRepresentationSelect, 'yes');
                $I->wait(1);
                if(isset($visualUnits)){
                    $I->fillField(\Page\SavingAreaCreate::$VisualUnitsField, $visualUnits);
                }
                if(isset($image)){
                    $I->attachFile(\Page\SavingAreaCreate::$ImageFileUpload, $image);
                }
                if(isset($visualUnitsConversionRate)){
                    $I->fillField(\Page\SavingAreaCreate::$VisualUnitsConversionRateField, $visualUnitsConversionRate);
                }
                if(isset($visualName)){
                    $I->fillField(\Page\SavingAreaCreate::$VisualNameField, $visualName);
                }
                break;
            case 'no':
                $I->selectOption(\Page\SavingAreaCreate::$HasVisualRepresentationSelect, 'no');
                $I->wait(2);
                break;
            case 'ignore':
                break;
        }
        if (isset($chartColor)){
            $I->fillField(\Page\SavingAreaCreate::$ChartColorField, $chartColor);
        }
        if (isset($backgroundColor)){
            $I->fillField(\Page\SavingAreaCreate::$BackgroundColorField, $backgroundColor);
        }
        if (isset($tileColor)){
            $I->fillField(\Page\SavingAreaCreate::$TileColorField, $tileColor);
        }
        switch ($status) {
            case 'yes':
                $I->selectOption(\Page\SavingAreaCreate::$StatusSelect, 'yes');
                $I->wait(1);
                break;
            case 'no':
                $I->selectOption(\Page\SavingAreaCreate::$StatusSelect, 'no');
                $I->wait(1);
                break;
            case 'ignore':
                break;
        }
        $I->scrollTo(\Page\SavingAreaCreate::$CreateButton);
        $I->wait(1);
        $I->click(\Page\SavingAreaCreate::$CreateButton);
        $I->waitPageLoad('60');
//        $I->wait(1);
    }  
    
    public function GetSavingAreaOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\SavingAreaList::URL());
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\SavingAreaList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\SavingAreaList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\SavingAreaList::$SavingAreaRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\SavingAreaList::NameLine($j)) == $name){
                    $I->comment("I find saving area: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $area['id']   = $I->grabTextFrom(\Page\SavingAreaList::IdLine($j));
        $area['page'] = $i;
        $area['row']  = $j;
        return $area;
    }
}