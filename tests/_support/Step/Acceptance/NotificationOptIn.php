<?php
namespace Step\Acceptance;

class NotificationOptIn extends \AcceptanceTester
{
    public function ManageNotification($program_id = null, $trigger_id = null, $optIn = 'yes')
    {
        $I = $this;
        $I->wait(1);
        $I->amOnPage(\Page\NotificationOptInSettings::Url_ProgId_TriggerId($program_id, $trigger_id));
        $I->wait(2);
        switch ($optIn){
            case 'yes':
                $I->click(\Page\NotificationOptInSettings::$YesRadioButton_OptIn);
                break;
            case 'no':
                $I->click(\Page\NotificationOptInSettings::$NoRadioButton_OptIn);
                break;
            case 'ignore':
                break;
        }
        $I->click(\Page\NotificationOptInSettings::$SaveButton);
        $I->wait(2);
    }

    public function CheckNotificationSettings_ByIDs($program_id = null, $trigger_id = null, $optIn = 'yes')
    {
        $I = $this;
        $I->wait(1);
        $I->amOnPage(\Page\NotificationOptInSettings::Url_ProgId_TriggerId($program_id, $trigger_id));
        $I->wait(2);
        $I->canSeeElement(\Page\NotificationOptInSettings::filterByProgramSelect_ById($program_id).'[@selected]');
        $I->canSeeElement(\Page\NotificationOptInSettings::filterByTriggerSelect_ById($trigger_id).'[@selected]');
        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
        $I->wait(2);
        switch ($optIn){
            case 'yes':
                $I->canSeeCheckboxIsChecked('#radio-yes2');
                $I->cantSeeCheckboxIsChecked('#radio-no2');
                break;
            case 'no':
                $I->cantSeeCheckboxIsChecked('#radio-yes2');
                $I->canSeeCheckboxIsChecked('#radio-no2');
                break;
            case 'ignore':
                break;
        }
        $I->wait(1);
    }
}