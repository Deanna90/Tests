<?php
namespace Step\Acceptance;

class CityMessage extends \AcceptanceTester
{
    public function CreateMessage($title = null, $message = null, $cityArray = null, $useForAllCities = 'ignore', $titleSpanish = null, $messageSpanish = null)
    {
        $I = $this;
        $I->amOnPage(\Page\CityMessageCreate::URL());
        if (isset($title)){
            $I->fillField(\Page\CityMessageCreate::$TitleField, $title);
        }
        if (isset($message)){
            $I->fillCkEditorTextarea(\Page\CityMessageCreate::$MessageField, $message);
        }
        if (isset($titleSpanish)){
            $I->fillField(\Page\CityMessageCreate::$TitleSpanishTranslationField, $titleSpanish);
        }
        if (isset($messageSpanish)){
            $I->fillCkEditorTextarea(\Page\CityMessageCreate::$MessageSpanishTranslationField, $messageSpanish);
        }
        switch ($useForAllCities){
                case 'yes':
                    $I->wait(2);
                    $I->click(\Page\CityMessageCreate::$AllCitiesToggleButton);
                    $I->wait(2);
                    $I->cantSeeElement(\Page\CityMessageCreate::$CitySelect);
                    break;
                case 'no':
                    $I->canSeeElement(\Page\CityMessageCreate::$CitySelect);
                    break;
                case 'ignore':
                    break;
        }
        if (isset($cityArray)){
            for ($i=1, $c= count($cityArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\CityMessageCreate::$CitySelect);
                $I->wait(3);
                $I->click(\Page\CityMessageCreate::selectCityOptionByName($cityArray[$k]));
            }
        }
        $I->click(\Page\CityMessageCreate::$SaveButton);
        $I->wait(1);
        $I->waitPageLoad('150');
    }  
    
    public function GetMessageOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\CityMessageList::URL());
        $count = $I->grabTextFrom(\Page\CityMessageList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\CityMessageList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\CityMessageList::$MessageRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\CityMessageList::TitleLine($j)) == $name){
                    $I->comment("I find city messsage: $name at row: $j on page: $i");
                    $prog['id']   = $I->grabTextFrom(\Page\CityMessageList::IdLine($j));
                    break 2;
                }
            }
        }
        $prog['page'] = $i;
        $prog['row']  = $j;
        return $prog;
    }
    
    public function CityMessageCheckOnRegisterBusiness($zip = null, $result = 'popup', $cityArray = null, $titlePopup = null, $messagePopup = null)
    {
        $I = $this;
        $I->amOnPage(\Page\BusinessRegistration::$URL);
        $I->wait(2);
        $I->waitForElement(\Page\BusinessRegistration::$BusinessNameField, 150);
        if (isset($zip)){
            $I->appendField(\Page\BusinessRegistration::$ZipField, $zip);
            $I->waitPageLoad();
            $I->wait(3);
            switch ($result){
                case 'popup':
                    $I->wait(2);
                    $I->canSeeElement(\Page\BusinessRegistration::$CityZipMessagePopup);
                    if(isset($titlePopup)){
                        $I->canSee($titlePopup, \Page\BusinessRegistration::$CityZipMessagePopup_Title);
                    }
                    if(isset($messagePopup)){
                        $I->canSee($messagePopup, \Page\BusinessRegistration::$CityZipMessagePopup_MessageText);
                    }
                    break;
                case 'anyMessage':
                    $I->cantSeeElement(\Page\BusinessRegistration::$CityZipMessagePopup);
                    $I->wait(3);
                    $I->cantSeeElement(\Page\BusinessRegistration::$Error_Zip);
                    $I->click(\Page\BusinessRegistration::$CitySelect);
                    $I->wait(3);
                    $I->canSeeElement(\Page\BusinessRegistration::selectCityOptionByName('Select city'));
                    $I->cantSeeElement(\Page\BusinessRegistration::selectCityOption('2'));
                    break;
                case 'error':
                    $I->cantSeeElement(\Page\BusinessRegistration::$CityZipMessagePopup);
                    $I->wait(3);
                    $I->canSee("We're sorry, but there is currently no Green Business Program in your area.", \Page\BusinessRegistration::$Error_Zip);
                    $I->click(\Page\BusinessRegistration::$CitySelect);
                    $I->wait(3);
                    $I->canSeeElement(\Page\BusinessRegistration::selectCityOptionByName('Select city'));
                    $I->cantSeeElement(\Page\BusinessRegistration::selectCityOption('2'));
                    break;
                case 'city':
                    $I->wait(4);
                    $I->cantSeeElement(\Page\BusinessRegistration::$CityZipMessagePopup);
                    for ($i=1, $c= count($cityArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->click(\Page\BusinessRegistration::$CitySelect);
                        $I->wait(3);
                        $I->canSeeElement(\Page\BusinessRegistration::selectCityOptionByName($cityArray[$k]));
                    }
                    $absentRow = $i+1;
                    $I->comment("Absent option: $absentRow");
                    $I->cantSeeElement(\Page\BusinessRegistration::selectCityOption($absentRow));
                    break;
            }
        }
    }  
    
    public function CheckValuesOnCityMessagesListPage($row, $cities = null, $title = null, $message = null, $actions = 'update/delete')
    {
        $I = $this;
        $I->wantTo("Check Saved Values On City Messages List Page");
        $I->amOnPage(\Page\CityMessageList::URL());
        $I->waitForElement(\Page\CityMessageList::$CreateMessageButton);
        if (isset($cities)){
            $I->canSee($cities, \Page\CityMessageList::CitiesLine($row));
        }
        if (isset($title)){
            $I->canSee($title, \Page\CityMessageList::TitleLine($row));
        }
        if (isset($message)){
            $I->canSee($message, \Page\CityMessageList::MessageLine($row));
        }
        switch ($actions){
                case 'update/delete':
                    $I->canSeeElement(\Page\CityMessageList::UpdateButtonLine($row));
                    $I->canSeeElement(\Page\CityMessageList::DeleteButtonLine($row));
                    break;
                case 'update':
                    $I->canSeeElement(\Page\CityMessageList::UpdateButtonLine($row));
                    $I->cantSeeElement(\Page\CityMessageList::DeleteButtonLine($row));
                    break;
                case 'delete':
                    $I->cantSeeElement(\Page\CityMessageList::UpdateButtonLine($row));
                    $I->canSeeElement(\Page\CityMessageList::DeleteButtonLine($row));
                    break;
                case 'any':
                    $I->cantSeeElement(\Page\CityMessageList::UpdateButtonLine($row));
                    $I->cantSeeElement(\Page\CityMessageList::DeleteButtonLine($row));
                    break;
        }
    }
    
    public function CheckValuesOnCityMessagesListPage_ByMessage($cities = null, $title = null, $message = null, $actions = 'update/delete')
    {
        $I = $this;
        $I->wantTo("Check Saved Values On City Messages List Page");
        $I->amOnPage(\Page\CityMessageList::URL());
        $I->waitForElement(\Page\CityMessageList::$CreateMessageButton);
        if (isset($cities)){
            $I->canSee($cities, \Page\CityMessageList::CitiesLine_ByName($message));
        }
        if (isset($title)){
            $I->canSee($title, \Page\CityMessageList::TitleLine_ByName($message));
        }
        if (isset($message)){
            $I->canSeeElement(\Page\CityMessageList::MessageLine_ByName($message));
        }
        switch ($actions){
                case 'update/delete':
                    $I->canSeeElement(\Page\CityMessageList::UpdateButtonLine_ByName($message));
                    $I->canSeeElement(\Page\CityMessageList::DeleteButtonLine_ByName($message));
                    break;
                case 'update':
                    $I->canSeeElement(\Page\CityMessageList::UpdateButtonLine_ByName($message));
                    $I->cantSeeElement(\Page\CityMessageList::DeleteButtonLine_ByName($message));
                    break;
                case 'delete':
                    $I->cantSeeElement(\Page\CityMessageList::UpdateButtonLine_ByName($message));
                    $I->canSeeElement(\Page\CityMessageList::DeleteButtonLine_ByName($message));
                    break;
                case 'any':
                    $I->cantSeeElement(\Page\CityMessageList::UpdateButtonLine_ByName($message));
                    $I->cantSeeElement(\Page\CityMessageList::DeleteButtonLine_ByName($message));
                    break;
        }
    }
    
    public function UpdateMessage_ByMessage($messageOld = null, $title = null, $message = null, $cityAddArray = null, $cityRemoveArray = null, $useForAllCities = null,$titleSpanish = null, $messageSpanish = null)
    {
        $I = $this;
        $I->amOnPage(\Page\CityMessageList::URL());
        $I->click(\Page\CityMessageList::UpdateButtonLine_ByName($messageOld));
        $I->wait(1);
        $I->waitPageLoad();
        if (isset($title)){
            $I->fillField(\Page\CityMessageUpdate::$TitleField, $title);
        }
        if (isset($message)){
            $I->fillCkEditorTextarea(\Page\CityMessageUpdate::$MessageField, $message);
        }
        if (isset($titleSpanish)){
            $I->fillField(\Page\CityMessageUpdate::$TitleSpanishTranslationField, $titleSpanish);
        }
        if (isset($messageSpanish)){
            $I->fillCkEditorTextarea(\Page\CityMessageUpdate::$MessageSpanishTranslationField, $messageSpanish);
        }
        if (isset($useForAllCities)){
            $I->fillCkEditorTextarea(\Page\CityMessageUpdate::$MessageSpanishTranslationField, $messageSpanish);
        }
        if (isset($cityAddArray)){
            for ($i=1, $c= count($cityAddArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\CityMessageUpdate::$CitySelect);
                $I->wait(3);
                $I->click(\Page\CityMessageUpdate::selectCityOptionByName($cityAddArray[$k]));
            }
        }
        if (isset($cityRemoveArray)){
            for ($i=1, $c= count($cityRemoveArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\CityMessageUpdate::$CitySelect);
                $I->wait(3);
                $I->click(\Page\CityMessageUpdate::DeleteSelectedCityOptionByName($cityRemoveArray[$k]));
                $I->wait(1);
            }
        }
        $I->click(\Page\CityMessageUpdate::$SaveButton);
        $I->wait(1);
        $I->waitPageLoad('150');
    }  
    
    public function UpdateMessage($row, $title = null, $message = null, $cityAddArray = null, $cityRemoveArray = null, $titleSpanish = null, $messageSpanish = null)
    {
        $I = $this;
        $I->amOnPage(\Page\CityMessageList::URL());
        $I->click(\Page\CityMessageList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        if (isset($title)){
            $I->fillField(\Page\CityMessageUpdate::$TitleField, $title);
        }
        if (isset($message)){
            $I->fillCkEditorTextarea(\Page\CityMessageUpdate::$MessageField, $message);
        }
        if (isset($titleSpanish)){
            $I->fillField(\Page\CityMessageUpdate::$TitleSpanishTranslationField, $titleSpanish);
        }
        if (isset($messageSpanish)){
            $I->fillCkEditorTextarea(\Page\CityMessageUpdate::$MessageSpanishTranslationField, $messageSpanish);
        }
        if (isset($cityAddArray)){
            for ($i=1, $c= count($cityAddArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\CityMessageUpdate::$CitySelect);
                $I->wait(3);
                $I->click(\Page\CityMessageUpdate::selectCityOptionByName($cityAddArray[$k]));
            }
        }
        if (isset($cityRemoveArray)){
            for ($i=1, $c= count($cityRemoveArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\CityMessageUpdate::$CitySelect);
                $I->wait(3);
                $I->click(\Page\CityMessageUpdate::DeleteSelectedCityOptionByName($cityRemoveArray[$k]));
            }
        }
        $I->click(\Page\CityMessageUpdate::$SaveButton);
        $I->wait(1);
        $I->waitPageLoad('150');
    }  
}