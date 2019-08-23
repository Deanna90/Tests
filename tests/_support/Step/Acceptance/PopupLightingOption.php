<?php
namespace Step\Acceptance;

class PopupLightingOption extends \AcceptanceTester
{
    public function CreateBuildingType($name = null)
    {
        $I = $this;
        $I->amOnPage(\Page\PopupLighting_BuildingTypesCreate::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\PopupLighting_BuildingTypesCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\PopupLighting_BuildingTypesCreate::$NameField, $name);
        }
        $I->click(\Page\PopupLighting_BuildingTypesCreate::$CreateButton);
        $I->waitPageLoad('60');
//        $I->wait(1);
    }  
    
    public function GetBuildingTypeOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\PopupLighting_BuildingTypesList::URL());
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\PopupLighting_BuildingTypesList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\PopupLighting_BuildingTypesList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\PopupLighting_BuildingTypesList::$BuildingTypeRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\PopupLighting_BuildingTypesList::NameLine($j)) == $name){
                    $I->comment("I find lighting building type: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $building['id']   = $I->grabTextFrom(\Page\PopupLighting_BuildingTypesList::IdLine($j));
        $building['page'] = $i;
        $building['row']  = $j;
        return $building;
    }
    
    public function CreateLightingDeerHours($hou = null, $interactiveEffects = null, $lightingType = null, $buildingType = null, $buildingSpace = null)
    {
        $I = $this;
        $I->amOnPage(\Page\PopupLighting_DeerHoursCreate::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\PopupLighting_DeerHoursCreate::$HouField);
        if (isset($lightingType)){
            $I->selectOption(\Page\PopupLighting_DeerHoursCreate::$LightingTypeSelect, $lightingType);
        }
        if (isset($buildingType)){
            $I->selectOption(\Page\PopupLighting_DeerHoursCreate::$BuildingTypeSelect, $buildingType);
        }
        if (isset($buildingSpace)){
            $I->selectOption(\Page\PopupLighting_DeerHoursCreate::$BuildingSpaceSelect, $buildingSpace);
        }
        if (isset($hou)){
            $I->fillField(\Page\PopupLighting_DeerHoursCreate::$HouField, $hou);
        }
        if (isset($interactiveEffects)){
            $I->fillField(\Page\PopupLighting_DeerHoursCreate::$InteractiveEffectsField, $interactiveEffects);
        }
        $I->click(\Page\PopupLighting_DeerHoursCreate::$CreateButton);
        $I->waitPageLoad('60');
//        $I->wait(1);
    }  
    
    public function GetLightingDeerHoursOnPageInList($lightingType, $buildingType, $buildingSpace, $hou, $interactiveEffects)
    {
        $I = $this;
        $I->amOnPage(\Page\PopupLighting_DeerHoursList::URL());
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\PopupLighting_DeerHoursList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\PopupLighting_DeerHoursList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\PopupLighting_DeerHoursList::$DeerHourRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\PopupLighting_DeerHoursList::TechnologyTypeLine($j)) == $lightingType and 
                        $I->grabTextFrom(\Page\PopupLighting_DeerHoursList::BuildingTypeLine($j)) == $buildingType and 
                        $I->grabTextFrom(\Page\PopupLighting_DeerHoursList::BuildingSpaceLine($j)) == $buildingSpace and 
                        $I->grabTextFrom(\Page\PopupLighting_DeerHoursList::HouLine($j)) == $hou and 
                        $I->grabTextFrom(\Page\PopupLighting_DeerHoursList::InteractiveEffectsLine($j)) == $interactiveEffects){
                    
                    $I->comment("I find deer hour with lighting type: $lightingType\nand with building type: $buildingType\nand with building space: $buildingSpace\n at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $hours['id']   = $I->grabTextFrom(\Page\PopupLighting_DeerHoursList::IdLine($j));
        $hours['page'] = $i;
        $hours['row']  = $j;
        return $hours;
    }
    
    public function CreateLightingFixtureMap($replacementLightingName = null, $replacementLightingWattage = null, $existingLightingName = null, $existingLightingWattage = null, 
                                        $description = null, $lightingType = null)
    {
        $I = $this;
        $I->amOnPage(\Page\PopupLighting_FixtureMapsCreate::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\PopupLighting_FixtureMapsCreate::$ReplacementLightingNameField);
        if (isset($replacementLightingName)){
            $I->fillField(\Page\PopupLighting_FixtureMapsCreate::$ReplacementLightingNameField, $replacementLightingName);
        }
        if (isset($replacementLightingWattage)){
            $I->fillField(\Page\PopupLighting_FixtureMapsCreate::$ReplacementLightingWattageField, $replacementLightingWattage);
        }
        if (isset($existingLightingName)){
            $I->fillField(\Page\PopupLighting_FixtureMapsCreate::$ExistingLightingNameField, $existingLightingName);
        }
        if (isset($existingLightingWattage)){
            $I->fillField(\Page\PopupLighting_FixtureMapsCreate::$ExistingLightingWattageField, $existingLightingWattage);
        }
        if (isset($description)){
            $I->fillField(\Page\PopupLighting_FixtureMapsCreate::$DescriptionField, $description);
        }
        if (isset($lightingType)){
            $I->selectOption(\Page\PopupLighting_FixtureMapsCreate::$TechnologyTypeSelect, $lightingType);
        }
        $I->click(\Page\PopupLighting_FixtureMapsCreate::$CreateButton);
        $I->waitPageLoad('60');
//        $I->wait(1);
    }  
    
    public function GetLightingFixtureMapOnPageInList($replacementLightingName)
    {
        $I = $this;
        $I->amOnPage(\Page\PopupLighting_FixtureMapsList::URL());
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\PopupLighting_FixtureMapsList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\PopupLighting_FixtureMapsList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\PopupLighting_FixtureMapsList::$FixtureMapRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\PopupLighting_FixtureMapsList::ReplacementLightingNameLine($j)) == $replacementLightingName){
                    $I->comment("I find fixture map with replacement name: $replacementLightingName at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $map['id']   = $I->grabTextFrom(\Page\PopupLighting_FixtureMapsList::IdLine($j));
        $map['page'] = $i;
        $map['row']  = $j;
        return $map;
    }
}