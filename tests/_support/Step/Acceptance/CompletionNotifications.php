<?php
namespace Step\Acceptance;

class CompletionNotifications extends \AcceptanceTester
{
    public function CreateCompletionNotification($program = null, $message = null, $auditGroupsArray = null, $sendEmail = 'no', $emailSubject = null, $emailBody = null, $points = null)
    {
        $I = $this;
        $I->amOnPage(\Page\CompletionNotificationsManage::URL());
        $I->wait(3);
        $I->waitPageLoad();
        if (isset($program)){
            $I->selectOption(\Page\CompletionNotificationsManage::$ProgramSelect, $program);
            $I->wait(1);
            $I->waitPageLoad();
        }
        $I->click(\Page\CompletionNotificationsManage::$NewNotificationButton);
        $I->wait(3);
        switch ($sendEmail){
            case 'no':
                $I->cantSeeElement(\Page\CompletionNotificationsCreatePopup::$EmailSubjectField);
                $I->cantSeeElement(\Page\CompletionNotificationsCreatePopup::$EmailBodyField);
                break;
            case 'yes':
                $I->click(\Page\CompletionNotificationsCreatePopup::$EmailToggleButton);
                $I->wait(5);
                $I->canSeeElement(\Page\CompletionNotificationsCreatePopup::$EmailSubjectField);
                $I->canSeeElement(\Page\CompletionNotificationsCreatePopup::$EmailBodyField);
                if(isset($emailSubject)){
                    $I->fillField(\Page\CompletionNotificationsCreatePopup::$EmailSubjectField, $emailSubject);
                }
                if(isset($emailBody)){
                    $I->fillField(\Page\CompletionNotificationsCreatePopup::$EmailBodyField, $emailBody);
                }
                break;
        }
        if (isset($auditGroupsArray)){
            for ($i=1, $c= count($auditGroupsArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\CompletionNotificationsCreatePopup::$AuditGroupsSelect);
                $I->wait(3);
                $I->click(\Page\CompletionNotificationsCreatePopup::selectAuditGroupsOptionByName($auditGroupsArray[$k]));
            }
        }
        if (isset($points)){
            $I->click(\Page\CompletionNotificationsCreatePopup::$TypeSelect);
            $I->wait(2);
            $I->selectOption(\Page\CompletionNotificationsCreatePopup::$TypeSelect, 'Reach Points');
            $I->wait(2);
            $I->fillField(\Page\CompletionNotificationsCreatePopup::$PointsField, $points);
        }
        if (isset($message)){
            $I->executeJS("$('#completionnotification-message').val('$message')");
            $I->wait(1);    
//            $I->fillCkEditorTextarea(\Page\CompletionNotificationsCreatePopup::$MessageField, $message);
//            $I->wait(2);
//            $I->click("iframe.cke_reset");
        }
        $I->click(\Page\CompletionNotificationsCreatePopup::$SaveButton);
        $I->wait(3);
    }
    
    public function GetCompletionNotificationOnPageInList($message, $program = null)
    {
        $I = $this;
        $I->amOnPage(\Page\CompletionNotificationsManage::URL());
        if (isset($program)){
            $I->click(\Page\CompletionNotificationsManage::$ProgramSelect);
            $I->wait(2);
            $I->selectOption(\Page\CompletionNotificationsManage::$ProgramSelect, $program);
            $I->wait(2);
            $I->waitPageLoad();
        }
        $rows = $I->getAmount($I, \Page\CompletionNotificationsManage::$MessageRow);
        $I->comment("Count of rows = $rows");
        for($j=1; $j<=$rows; $j++){
            if($I->grabTextFrom(\Page\CompletionNotificationsManage::MessageLine($j)) == $message){
                $I->comment("I find completion notification: $message at row: $j");
                $notif['id'] = $I->grabTextFrom(\Page\CompletionNotificationsManage::IdLine($j));
                break;
            }
        }
        $notif['row']  = $j;
        return $notif;
    }
}