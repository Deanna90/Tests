<?php


class NotificationOptInCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $emailStateAdmin, $emailCoordinator, $emailInspector, $emailAuditor, $fullName_Inspector, $fullName_Auditor;
    public $auditOrganization, $inspectorOrganization;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3, $county;
    public $id_program1, $id_program2, $id_program3;
    public $statuses_1             = ['core',     'elective'];
    public $statuses_2             = ['core',     'core'];
    public $statuses_3             = ['elective', 'elective'];
    public $checklistUrl_1, $id_checklist_1;
    public $checklistUrl_2, $id_checklist_2;
    public $checklistUrl_3, $id_checklist_3;
    public $business1, $business2, $business3, $email1, $email2, $email3, $id_business1, $id_business2, $id_business3;
    public $firstName_Bus1, $lastName_Bus1, $phone_Bus1, $email_Bus1, $address_Bus1, $contactPhone_Bus1;
    public $firstName_Bus3, $lastName_Bus3, $phone_Bus3, $email_Bus3, $address_Bus3, $contactPhone_Bus3;
    public $subject_GetStarted_All, $body_GetStarted_All, $subject_BusinessSubmision_All, $subject_Certification_All, $body_Certification_All, 
           $subject_RequiresRenewal_All, $body_RequiresRenewal_All, $subject_AuditComplete_All, $body_AuditComplete_All, $subject_InspectionComplete_All, $body_InspectionComplete_All;
    public $body_BusinessSubmision_All_Bus1_Row1, $body_BusinessSubmision_All_Bus3_Row1, $body_BusinessSubmision_All_Bus1_Row2, $body_BusinessSubmision_All_Bus3_Row2,
           $body_BusinessSubmision_All_Bus1_Row3, $body_BusinessSubmision_All_Bus3_Row3, $body_BusinessSubmision_All_Bus1_Row4, $body_BusinessSubmision_All_Bus3_Row4, 
           $body_BusinessSubmision_All_Bus1_Row5, $body_BusinessSubmision_All_Bus3_Row5, $body_BusinessSubmision_All_Bus1_Row6, $body_BusinessSubmision_All_Bus3_Row6,
           $body_BusinessSubmision_All_Bus1_Row7, $body_BusinessSubmision_All_Bus3_Row7, $body_BusinessSubmision_All_Bus1_Row8, $body_BusinessSubmision_All_Bus3_Row8,
           $body_BusinessSubmision_All_Bus1_Row9, $body_BusinessSubmision_All_Bus3_Row9;
    public $body_Certification_All_Bus1_Row1, $body_Certification_All_Bus1_Row2, $body_Certification_All_Bus1_Row3;
    public $subject_GetStarted_Prog2, $body_GetStarted_Prog2, $subject_BusinessSubmision_Prog2, $body_BusinessSubmision_Prog2;
    public $subject_Certification_Prog3, $body_Certification_Prog3;
    public $subject_BusinessRegistered_Prog3, $body_BusinessRegistered_Prog3;
    public $subject_BusinessRegistered_All, $body_BusinessRegistered_All_Bus1_Row1, $body_BusinessRegistered_All_Bus1_Row2, $body_BusinessRegistered_All_Bus1_Row3;
    public $subject_AuditComplete_Prog1, $body_AuditComplete_Prog1;
    public $subject_HelpNotification_All, $body_HelpNotification_Bus1_Row1, $body_HelpNotification_Bus1_Row2, $body_HelpNotification_Bus1_Row3, 
           $body_HelpNotification_Bus1_Row4, $body_HelpNotification_Bus1_Row5;
    public $body_HelpNotification_Bus2_Row1, $body_HelpNotification_Bus2_Row2, $body_HelpNotification_Bus2_Row3, $body_HelpNotification_Bus2_Row4, 
           $body_HelpNotification_Bus2_Row5, $body_HelpNotification_Bus2_Row6, $body_HelpNotification_Bus2_Row7, $body_HelpNotification_Bus2_Row8;
    public $body_HelpNotification_Bus3_Row1, $body_HelpNotification_Bus3_Row2, $body_HelpNotification_Bus3_Row3, 
           $body_HelpNotification_Bus3_Row4, $body_HelpNotification_Bus3_Row5;


    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StNotifOptIn");
        $shortName = 'NOI';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function CheckNotificationsTemplatedPresentInList(AcceptanceTester $I)
    {
        $template = 'Template';
        
        $I->amOnPage(Page\ApplicantEmailTextList::URL());
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::AuditorRequest_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::InspectorRequest_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::CertificationEmail_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::AuditComplete_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::InspectionComplete_Trigger, $template));
        $I->cantSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger, $template));
        $I->canSee('13', Page\ApplicantEmailTextList::$SummaryCount);
        $rows = $I->getAmount($I, Page\ApplicantEmailTextList::$EmailRow);
        $I->assertEquals('13', $rows);
    }
    
    //--------------------------Create audit subgroups--------------------------
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function Help_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure2_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
//    public function CheckDefaultValuesOnNotificationOptInPage(AcceptanceTester $I)
//    {
//        $I->wait(2);
//        $I->amOnPage(Page\NotificationOptInSettings::Url());
//        $I->wait(2);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, 'View All');
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::GettingStartedMessage_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::GettingStartedMessage_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::AuditorRequest_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::AuditorRequest_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::CertificationEmail_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::CertificationEmail_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::InspectorRequest_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::InspectorRequest_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::RequiresRenewal_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(2));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::RequiresRenewal_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//    }
    
    //-------------------------------Create county------------------------------
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city and program-------------------------
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("City1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("Prog1");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program1 = $prog['id'];
    }
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("City2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("Prog2");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program2 = $prog['id'];
    }
    
    public function Help_CreateCity3_And_Program3(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city3 = $I->GenerateNameOf("City3");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip3 = $I->GenerateZipCode();
        $program = $this->program3 = $I->GenerateNameOf("Prog3");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program3 = $prog['id'];
    }
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
//        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses);
        $I->PublishSectorChecklistStatus();
    }
    
    public function UpdateProgramChecklist_Tier2_Program1(\Step\Acceptance\Checklist $I) {
        $program = $this->program1;
        $sector  = 'Office / Retail';
        $tier    = 'Tier 2';
        
        $I->amOnPage(Page\ChecklistList::URL());
        $this->id_checklist_1 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_1));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_1);
    }
    
    public function UpdateProgramChecklist_Tier2_Program2(\Step\Acceptance\Checklist $I) {
        $program = $this->program2;
        $sector  = 'Office / Retail';
        $tier    = 'Tier 2';
        
        $I->amOnPage(Page\ChecklistList::URL());
        $this->id_checklist_2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_2);
    }
    
    public function UpdateProgramChecklist_Tier2_Program3(\Step\Acceptance\Checklist $I) {
        $program = $this->program3;
        $sector  = 'Office / Retail';
        $tier    = 'Tier 2';
        
        $I->amOnPage(Page\ChecklistList::URL());
        $this->id_checklist_3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, $tier));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_3));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, 'View All');
        $I->wait(4);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_3);
    }
    
//    public function Help_CreateChecklistForTier2_Program1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
//        $programDestination = $this->program1;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist_1 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses_1);
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_1));
//        $I->PublishChecklistStatus($this->id_checklist_1);
//    }
//    
//    public function Help_CreateChecklistForTier2_Program2(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program2;
//        $programDestination = $this->program2;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist_2 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses_2);
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_2));
//        $I->PublishChecklistStatus($this->id_checklist_2);
//    }
//    
//    public function Help_CreateChecklistForTier2_Program3(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program3;
//        $programDestination = $this->program3;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist_3 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statuses_3);
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_3));
//        $I->PublishChecklistStatus($this->id_checklist_3);
//    }
    
//    public function CheckDefaultValuesOnNotificationOptInPage_2(AcceptanceTester $I)
//    {
//        $I->wait(2);
//        $I->amOnPage(Page\NotificationOptInSettings::Url());
//        $I->wait(2);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSee('Please, select Program and Email first.', Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, 'View All');
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, 'View All');
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::GettingStartedMessage_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->canSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->cantSee(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::GettingStartedMessage_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::AuditorRequest_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::AuditorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::AuditorRequest_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::AuditorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::AuditorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::AuditorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::CertificationEmail_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::CertificationEmail_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::CertificationEmail_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::CertificationEmail_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::CertificationEmail_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::CertificationEmail_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::InspectorRequest_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::InspectorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::InspectorRequest_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::InspectorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::InspectorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::InspectorRequest_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2'); 
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        
//        $I->selectOption(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::RequiresRenewal_Trigger);
//        $I->wait(4);
//        $I->canSee('Notification Opt In', Page\NotificationOptInSettings::$Title);
//        $I->cantSeeElement(Page\NotificationOptInSettings::$InfoMessage);
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByProgramSelect, $this->program3);
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program1));
//        $I->wait(4);
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByProgramSelectOption(5));
//        $I->canSeeOptionIsSelected(Page\NotificationOptInSettings::$FilterByTriggerSelect, Page\ApplicantEmailTextList::RequiresRenewal_Trigger);
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName('View All'));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::AuditorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::CertificationEmail_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::InspectorRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger));
//        $I->cantSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::filterByTriggerSelect_ByName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger));
//        $I->canSeeElement(Page\NotificationOptInSettings::$TriggerTitle);
//        $I->canSeeElement(Page\NotificationOptInSettings::$YesRadioButton_OptIn);
//        $I->canSeeElement(Page\NotificationOptInSettings::$NoRadioButton_OptIn);
//        $I->canSee(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program2));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//        $I->click(Page\NotificationOptInSettings::$FilterByProgramSelect);
//        $I->wait(1);
//        $I->click(Page\NotificationOptInSettings::filterByProgramSelect_ByName($this->program3));
//        $I->wait(4);
//        $I->canSee(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, Page\NotificationOptInSettings::$TriggerTitle);
//        $I->makeElementVisible(['#radio-yes2', '#radio-no2'], $style = 'display');
//        $I->wait(2);
//        $I->canSeeCheckboxIsChecked('#radio-yes2');
//        $I->cantSeeCheckboxIsChecked('#radio-no2');
//    }
//    
    public function GettingStarted_Off_Program1(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program1;
        $trigger_id      = Page\NotificationOptInSettings::GettingStartedMessage_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function CertificationEmail_Off_Program2(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program2;
        $trigger_id      = Page\NotificationOptInSettings::CertificationEmail_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function InspectorRequest_Off_Program1(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program1;
        $trigger_id      = Page\NotificationOptInSettings::InspectorRequest_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function AuditorRequest_Off_Program2(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program2;
        $trigger_id      = Page\NotificationOptInSettings::AuditorRequest_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function Month3BeforeCertification_Off_Program1(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program1;
        $trigger_id      = Page\NotificationOptInSettings::Month3BeforeCertification_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function RequiresRenewal_Off_Program2(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program2;
        $trigger_id      = Page\NotificationOptInSettings::RequiresRenewal_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function PleaseReviewMyChecklist_Off_Program1(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program1;
        $trigger_id      = Page\NotificationOptInSettings::PleaseReviewMyChecklist_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function BusinessTierSubmission_Off_Program2(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program2;
        $trigger_id      = Page\NotificationOptInSettings::BusinessTierSubmission_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function BusinessInactive30Days_Off_Program1(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program1;
        $trigger_id      = Page\NotificationOptInSettings::BusinessInactive30Days_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function AuditComplete_Off_Program2(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program2;
        $trigger_id      = Page\NotificationOptInSettings::AuditComplete_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function InspectionComplete_Off_Program1(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program1;
        $trigger_id      = Page\NotificationOptInSettings::InspectionComplete_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function BusinessRegistrated_Off_Program2(\Step\Acceptance\NotificationOptIn $I) {
        $program_id      = $this->id_program2;
        $trigger_id      = Page\NotificationOptInSettings::BusinessRegistered_TriggerID;
        $optIn           = 'no';
        
        $I->ManageNotification($program_id, $trigger_id, $optIn);
        $I->CheckNotificationSettings_ByIDs($program_id, $trigger_id, $optIn);
    }
    
    public function GettingStarted_ApplicantEmailTextCreate_All_GetValues(\Step\Acceptance\Notification $I)
    {
        
        $this->subject_GetStarted_All = 'Getting Started message';
        $this->body_GetStarted_All    = 'Getting Started message.';
    }
    
    public function BusinessTierSubmission_ApplicantEmailTextCreate_All_GetValues(\Step\Acceptance\Notification $I)
    {
        $this->subject_BusinessSubmision_All = 'Tier completion confirmation message';
    }
    
    public function Certification_ApplicantEmailTextCreate_All_GetValues(\Step\Acceptance\Notification $I)
    {
        
        $this->subject_Certification_All = 'Certification Email';
        $this->body_Certification_All    = '<p>Congratulations, your business is now a recognized San Francisco Green Businesses!<br />
On behalf of the San Francisco Green Business team, please accept our sincere appreciation for the efforts you and your<br />
business have taken to conserve resources and prevent pollution. Your contributions help make San Francisco a more<br />
sustainable city.</p>

<p><br />
You can now download high resolution versions of the logos on our website at: sfgreenbusiness.org/member-resources. We<br />
will also be mailing out an award packet that will contain two Green Business window decals/stickers. Please read the logo<br />
usage guidelines, also available at the above link, prior to using the logo files. We ask that you do not share this URL with<br />
anyone outside of your business to ensure the logo is used properly by the right people.<br />
Remember, the Green Business recognition is location specific and good for three years from your date of recognition.<br />
Three years after your awarded date, you will need to complete a full re-recognition. You will also need to fill out the annual<br />
self-recognition form once a year found at: sfgreenbusiness.org/member-resources.</p>

<p><br />
Sincerely,<br />
The SF Green Business Team<br />
P.S. You can keep up to date on SF Green Business Program activities by signing up for our newsletter<br />
(<a href="http://sfgreenbusiness.org/learn-about-us/newsletter/">http://sfgreenbusiness.org/learn-about-us/newsletter/</a>) or liking us on Facebook<br />
(<a href="http://www.facebook.com/sfgreenbusiness">http://www.facebook.com/sfgreenbusiness</a>)</p>';
    }
    
    public function AuditComplete_ApplicantEmailTextCreate_All_GetValues(\Step\Acceptance\Notification $I)
    {
        $this->subject_AuditComplete_All = 'Audit Complete';
    }
    
    public function InspectionComplete_ApplicantEmailTextCreate_All_GetValues(\Step\Acceptance\Notification $I)
    {
        $this->subject_AuditComplete_All = 'Inspection Complete';
    }
    
    //---------------------Create Applicant Email Text--------------------------
    public function GettingStarted_ApplicantEmailTextCreate_Program2(\Step\Acceptance\Notification $I)
    {
        $trigger      = Page\ApplicantEmailTextList::GettingStartedMessage_Trigger;
        $subject      = $this->subject_GetStarted_Prog2 = 'subject for program2 Getting Started';
        $body         = $this->body_GetStarted_Prog2 = 'bodyscsbcbs';
        $program      = $this->program2;
        $programArray = [$program];
                
        $I->CreateApplicantEmailText($subject, $body, $programArray);
        $appEmail = $I->GetApplicantEmailTextOnPageInList($trigger, $program);
    }
    
    public function BusinessTierSubmission_ApplicantEmailTextCreate_Program2(\Step\Acceptance\Notification $I)
    {
        $trigger      = Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger;
        $subject      = $this->subject_BusinessSubmision_Prog2 = 'subject for program2 Business Tier Submission';
        $body         = $this->body_BusinessSubmision_Prog22 = 'Body new created sc sbcbs body';
        $program      = $this->program2;
        $programArray = [$program];
                
        $I->CreateApplicantEmailText($subject, $body, $programArray, $trigger);
        $appEmail = $I->GetApplicantEmailTextOnPageInList($trigger, $program);
    }
    
    public function CertificationEmail_ApplicantEmailTextCreate_Program3(\Step\Acceptance\Notification $I)
    {
        $trigger      = Page\ApplicantEmailTextList::CertificationEmail_Trigger;
        $subject      = $this->subject_Certification_Prog3 = 'subject for program3 Certification';
        $body         = $this->body_Certification_Prog3 = 'bodyscsbcbs {contact_person_name}';
        $program      = $this->program3;
        $programArray = [$program];
                
        $I->CreateApplicantEmailText($subject, $body, $programArray, $trigger);
        $appEmail = $I->GetApplicantEmailTextOnPageInList($trigger, $program);
    }
    
    public function AuditComplete_ApplicantEmailTextCreate_Program1(\Step\Acceptance\Notification $I)
    {
        $trigger      = Page\ApplicantEmailTextList::AuditComplete_Trigger;
        $subject      = $this->subject_AuditComplete_Prog1 = 'subject for program1 Audit Complete';
        $body         = $this->body_AuditComplete_Prog1 = 'bodytest';
        $program      = $this->program1;
        $programArray = [$program];
                
        $I->CreateApplicantEmailText($subject, $body, $programArray, $trigger);
        $appEmail = $I->GetApplicantEmailTextOnPageInList($trigger, $program);
    }
    
    public function BusinessRegistrated_ApplicantEmailTextCreate_Program3(\Step\Acceptance\Notification $I)
    {
        $trigger      = Page\ApplicantEmailTextList::BusinessRegistered_Trigger;
        $subject      = $this->subject_BusinessRegistered_Prog3 = 'subject for program3 Registered for coordinator';
        $body         = $this->body_BusinessRegistered_Prog3 = 'bodyscsbcfdfbs';
        $program      = $this->program3;
        $programArray = [$program];
                
        $I->CreateApplicantEmailText($subject, $body, $programArray, $trigger);
        $appEmail = $I->GetApplicantEmailTextOnPageInList($trigger, $program);
    }
    
    public function CheckNotificationsTemplatedPresentInList_AfterCreatingNewEmailApplicants(AcceptanceTester $I)
    {
        $template = 'Template';
        $program = $this->program2;
        
        $I->amOnPage(Page\ApplicantEmailTextList::URL());
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::AuditorRequest_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::InspectorRequest_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::CertificationEmail_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::BusinessInactive30Days_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::PleaseReviewMyChecklist_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::AuditComplete_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::InspectionComplete_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::BusinessRegistered_Trigger, $template));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::BusinessHasChangedAddress_Trigger, $template));
        $I->cantSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::PGERegisterRequest_Trigger, $template));
        
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::GettingStartedMessage_Trigger, $program));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger, $program));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::CertificationEmail_Trigger, $this->program3));
        $I->canSeeElement(Page\ApplicantEmailTextList::EmailLine_ByProgramName(Page\ApplicantEmailTextList::AuditComplete_Trigger, $this->program1));
        
        $I->canSee('18', Page\ApplicantEmailTextList::$SummaryCount);
        $rows = $I->getAmount($I, Page\ApplicantEmailTextList::$EmailRow);
        $I->assertEquals('18', $rows);
    }
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    public function Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $this->firstName_Bus1 = $I->GenerateNameOf("firnam");
        $lastName         = $this->lastName_Bus1 = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->contactPhone_Bus1 = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1 = $I->GenerateNameOf("busnam1");
        $busPhone         = $this->phone_Bus1 = $I->GeneratePhoneNumber();
        $address          = $this->address_Bus1 = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    public function Off_CheckGetStartedMessage_Business1_CommunicationTab(AcceptanceTester $I){
        $subject                = $this->subject_GetStarted_Prog2;
        $subject_All            = $this->subject_GetStarted_All;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($subject, Page\CommunicationsList::$SubjectColumnRow);
        $I->cantSee($subject_All, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    public function On_CheckBusinessRegisteredMessage_Business1_CommunicationTab(AcceptanceTester $I){
        $subject   = $this->subject_BusinessRegistered_All = 'New business has registered with the Green Business Program';
        $body_Row1 = $this->body_BusinessRegistered_All_Bus1_Row1 = 'The following business has registered:';
        $body_Row2 = $this->body_BusinessRegistered_All_Bus1_Row2 = "$this->business1 $this->phone_Bus1 $this->address_Bus1, $this->city1, $this->state, $this->zip1 $this->firstName_Bus1 $this->lastName_Bus1 $this->contactPhone_Bus1 $this->email_Bus1";
        $body_Row3 = $this->body_BusinessRegistered_All_Bus1_Row3 = 'Checklist';
        $sender    = $this->business1;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->canSee($this->program1, Page\CommunicationsList::SenderLine('1'));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine('1'));
        $I->click(Page\CommunicationsList::ViewButtonLine('1'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]/a');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function ActivateHelpCheckboxForMeasure1_Business1(AcceptanceTester $I){
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->click(\Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure1Desc));
        $I->wait(2);
        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function SubmitTierChecklist_Business1(AcceptanceTester $I){
        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeInCurrentUrl(Page\BusinessDashboard::$URL);
    }
    
    public function On_BusinessTierSubmission_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_BusinessSubmision_All;
        $body_Row1 = $this->body_BusinessSubmision_All_Bus1_Row1 = "Business submitted his checklist.";
        $body_Row2 = $this->body_BusinessSubmision_All_Bus1_Row2 = "Business name: $this->business1";
        $body_Row3 = $this->body_BusinessSubmision_All_Bus1_Row3 = "Contact information:";
        $body_Row4 = $this->body_BusinessSubmision_All_Bus1_Row4 = "Name - $this->firstName_Bus1 $this->lastName_Bus1";
        $body_Row5 = $this->body_BusinessSubmision_All_Bus1_Row5 = "Phone - $this->contactPhone_Bus1";
        $body_Row6 = $this->body_BusinessSubmision_All_Bus1_Row6 = "Email - $this->email_Bus1";
        $body_Row7 = $this->body_BusinessSubmision_All_Bus1_Row7 = "Tier information:";
        $body_Row8 = $this->body_BusinessSubmision_All_Bus1_Row8 = "Number - 2";
        $body_Row9 = $this->body_BusinessSubmision_All_Bus1_Row9 = "Name - Tier 2";
        $sender    = $this->business1;
    
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program1, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($body_Row4, Page\CommunicationsView::PreviousMessage('1').'[4]');
        $I->canSee($body_Row5, Page\CommunicationsView::PreviousMessage('1').'[5]');
        $I->canSee($body_Row6, Page\CommunicationsView::PreviousMessage('1').'[6]');
        $I->canSee($body_Row7, Page\CommunicationsView::PreviousMessage('1').'[7]');
        $I->canSee($body_Row8, Page\CommunicationsView::PreviousMessage('1').'[8]');
        $I->canSee($body_Row9, Page\CommunicationsView::PreviousMessage('1').'[9]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_HelpNotification_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_HelpNotification_All = 'Summary of help measures';
        $body_Row1 = $this->body_HelpNotification_Bus1_Row1 = "Help measures";
        $body_Row2 = $this->body_HelpNotification_Bus1_Row2 = "$this->business1";
        $body_Row3 = $this->body_HelpNotification_Bus1_Row3 = Page\AuditGroupList::Energy_AuditGroup."\n".$this->audSubgroup1_Energy."\nDescription:$this->measure1Desc";
        $sender    = $this->business1;
    
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program1, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
//        $I->canSee($body_Row4, Page\CommunicationsView::PreviousMessage('1').'[4]');
//        $I->canSee($body_Row5, Page\CommunicationsView::PreviousMessage('1').'[5]');
    }
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business2_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2 = $I->GenerateNameOf("busnam2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    public function On_CheckGetStartedMessage_Business2_CommunicationTab(AcceptanceTester $I){
        $subject                = $this->subject_GetStarted_Prog2;
        $body                   = $this->body_GetStarted_Prog2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->canSee($this->program2, Page\CommunicationsList::SenderLine('1'));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine('1'));
        $I->click(Page\CommunicationsList::ViewButtonLine('1'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
    }
    
    public function Off_CheckBusinessRegisteredMessage_Business2_CommunicationTab(AcceptanceTester $I){
        $subject                = $this->subject_BusinessRegistered_Prog3;
        $subject_All            = $this->subject_BusinessRegistered_All;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($subject, Page\CommunicationsList::$SubjectColumnRow);
        $I->cantSee($subject_All, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    public function ActivateHelpCheckboxForMeasure1_Business2(AcceptanceTester $I){
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->click(\Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure1Desc));
        $I->wait(2);
        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function ActivateHelpCheckboxForMeasure2_Business2(AcceptanceTester $I){
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->click(\Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure2Desc));
        $I->wait(2);
        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function SubmitTierChecklist_Business2(AcceptanceTester $I){
        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeInCurrentUrl(Page\BusinessDashboard::$URL);
    }
    
    public function Off_BusinessTierSubmission_Business2_CommunicationTab(AcceptanceTester $I){
        $subject                = $this->subject_BusinessSubmision_Prog2;
        $subject_All            = $this->subject_BusinessSubmision_All;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($subject, Page\CommunicationsList::$SubjectColumnRow);
        $I->cantSee($subject_All, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    public function On_HelpNotification_Business2_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_HelpNotification_All = 'Summary of help measures';
        $body_Row1 = $this->body_HelpNotification_Bus2_Row1 = "Help measures";
        $body_Row2 = $this->body_HelpNotification_Bus2_Row2 = "$this->business2";
        $body_Row3 = $this->body_HelpNotification_Bus2_Row3 = Page\AuditGroupList::Energy_AuditGroup."\n".$this->audSubgroup1_Energy."\nDescription:$this->measure1Desc";
        $body_Row4 = $this->body_HelpNotification_Bus2_Row4 = Page\AuditGroupList::SolidWaste_AuditGroup."\n".$this->audSubgroup1_SolidWaste."\nDescription:$this->measure2Desc";
        $sender    = $this->business2;
    
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program2, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($body_Row4, Page\CommunicationsView::PreviousMessage('1').'[4]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function Help_LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business3_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $this->firstName_Bus3 = $I->GenerateNameOf("firnam");
        $lastName         = $this->lastName_Bus3 = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->contactPhone_Bus3 = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus3 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business3 = $I->GenerateNameOf("busnam3");
        $busPhone         = $this->phone_Bus3 = $I->GeneratePhoneNumber();
        $address          = $this->address_Bus3 = $I->GenerateNameOf("addr");
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    public function On_CheckGetStartedMessage_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_GetStarted_All;
        $body                   = $this->body_GetStarted_All;
        $sender                 = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program3, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
//        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_CheckBusinessRegisteredMessage_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_BusinessRegistered_Prog3;
        $body                   = $this->body_BusinessRegistered_Prog3;
        $sender                 = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program3, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function ActivateHelpCheckboxForMeasure1_Business3(AcceptanceTester $I){
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->click(\Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure1Desc));
        $I->wait(2);
        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function SubmitTierChecklist_Business3(AcceptanceTester $I){
        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->canSeeInCurrentUrl(Page\BusinessDashboard::$URL);
    }
    
    public function On_BusinessTierSubmission_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_BusinessSubmision_All;
        $body_Row1 = $this->body_BusinessSubmision_All_Bus3_Row1 = "Business submitted his checklist.";
        $body_Row2 = $this->body_BusinessSubmision_All_Bus3_Row2 = "Business name: $this->business3";
        $body_Row3 = $this->body_BusinessSubmision_All_Bus3_Row3 = "Contact information:";
        $body_Row4 = $this->body_BusinessSubmision_All_Bus3_Row4 = "Name - $this->firstName_Bus3 $this->lastName_Bus3";
        $body_Row5 = $this->body_BusinessSubmision_All_Bus3_Row5 = "Phone - $this->contactPhone_Bus3";
        $body_Row6 = $this->body_BusinessSubmision_All_Bus3_Row6 = "Email - $this->email_Bus3";
        $body_Row7 = $this->body_BusinessSubmision_All_Bus3_Row7 = "Tier information:";
        $body_Row8 = $this->body_BusinessSubmision_All_Bus3_Row8 = "Number - 2";
        $body_Row9 = $this->body_BusinessSubmision_All_Bus3_Row9 = "Name - Tier 2";
        $sender    = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program3, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($body_Row4, Page\CommunicationsView::PreviousMessage('1').'[4]');
        $I->canSee($body_Row5, Page\CommunicationsView::PreviousMessage('1').'[5]');
        $I->canSee($body_Row6, Page\CommunicationsView::PreviousMessage('1').'[6]');
        $I->canSee($body_Row7, Page\CommunicationsView::PreviousMessage('1').'[7]');
        $I->canSee($body_Row8, Page\CommunicationsView::PreviousMessage('1').'[8]');
        $I->canSee($body_Row9, Page\CommunicationsView::PreviousMessage('1').'[9]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_HelpNotification_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_HelpNotification_All = 'Summary of help measures';
        $body_Row1 = $this->body_HelpNotification_Bus3_Row1 = "Help measures";
        $body_Row2 = $this->body_HelpNotification_Bus3_Row2 = "$this->business3";
        $body_Row3 = $this->body_HelpNotification_Bus3_Row3 = Page\AuditGroupList::Energy_AuditGroup."\n".$this->audSubgroup1_Energy."\nDescription:$this->measure1Desc";
        $sender    = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program3, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function Help_LogOut_AndLoginAsAdmin(AcceptanceTester $I) {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function GetBusiness1ID(AcceptanceTester $I) {
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business1 = $u1[1];
        $I->comment("Business1 id: $this->id_business1.");
    }
    
    public function GetBusiness2ID(AcceptanceTester $I) {
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->id_business2 = $u2[1];
        $I->comment("Business2 id: $this->id_business2.");
    }
    
    public function GetBusiness3ID(AcceptanceTester $I) {
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3), 'href');
        $I->comment("Url3: $url3");
        $u3 = explode('=', $url3);
        $this->id_business3 = $u3[1];
        $I->comment("Business3 id: $this->id_business3.");
    }
    
    //---------------------Coordinator create Inspector-------------------------
    
    public function CreateInspectorUser(Step\Acceptance\User $I)
    {
        $userType                  = Page\UserCreate::inspectorType;
        $email                     = $this->emailInspector = $I->GenerateEmail();
        $firstName                 = $I->GenerateNameOf('firnam');
        $lastName                  = $I->GenerateNameOf('lastnam');
        $password                  = $confirmPassword = $this->password;
        $phone                     = $I->GeneratePhoneNumber();
        $this->fullName_Inspector  = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $userID = $I->GetUserIDFromUrl($I);
        $I->amOnPage(\Page\UserUpdate::URL_AddStateForm($userID));
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(\Page\UserUpdate::URL_AddProgramForm($userID));
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(\Page\UserUpdate::URL_AddProgramForm($userID));
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(\Page\UserUpdate::URL_AddProgramForm($userID));
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program3);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    //------------------------Coordinator create Auditor------------------------
    
    public function CreateAuditorUser(Step\Acceptance\User $I)
    {
        $userType          = Page\UserCreate::auditorType;
        $email             = $this->emailAuditor = $I->GenerateEmail();
        $firstName         = $I->GenerateNameOf('firnam');
        $lastName          = $I->GenerateNameOf('lastnam');
        $password          = $confirmPassword = $this->password;
        $phone             = $I->GeneratePhoneNumber();
        $this->fullName_Auditor = $firstName." ".$lastName;
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->waitForElement(".confirm", 150);
        $I->wait(2);
        $userID = $I->GetUserIDFromUrl($I);
        $I->amOnPage(\Page\UserUpdate::URL_AddStateForm($userID));
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(\Page\UserUpdate::URL_AddProgramForm($userID));
        $I->waitForElement(Page\UserUpdate::$ProgramSelect_AddProgramForm, 200);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(\Page\UserUpdate::URL_AddProgramForm($userID));
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(\Page\UserUpdate::URL_AddProgramForm($userID));
        $I->wait(2);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program3);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    //-------Create Audit Organization With Program1 & Program2 &Program3-------
    
    public function CreateAuditOrganization_Program1_Program2_Program3(Step\Acceptance\AuditOrganization $I)
    {
        $audOrganization = $this->auditOrganization = $I->GenerateNameOf('AuditOrg_Prog1_2_3_');
        
        $I->CreateAuditOrganization($audOrganization, $this->state);
        $orgID = $I->GetOrganizationIDFromUrl($I);
        $I->amOnPage(Page\AuditOrganizationUpdate::URL_AddProgramForm($orgID));
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\AuditOrganizationUpdate::URL_AddProgramForm($orgID));
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\AuditOrganizationUpdate::URL_AddProgramForm($orgID));
        $I->click(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\AuditOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program3);
        $I->click(Page\AuditOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\AuditOrganizationUpdate::URL_AddAuditGroupForm($orgID));
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::Energy_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\AuditOrganizationUpdate::URL_AddAuditGroupForm($orgID));
        $I->selectOption(\Page\AuditOrganizationUpdate::$AuditGroupSelect_AddAuditGroupForm, \Page\AuditGroupList::SolidWaste_AuditGroup);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddAuditGroupForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\AuditOrganizationUpdate::URL_AddMemberForm($orgID));
        $I->selectOption(\Page\AuditOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Auditor);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    //-----Create Inspector Organization With Program1 & Program2 &Program3-----
    
    public function CreateInspectorOrganization_Program1_Program2_Program3(Step\Acceptance\InspectorOrganization $I)
    {
        $inspOrganization = $this->inspectorOrganization = $I->GenerateNameOf('InspOrg_Prog1_2_3_');
        
        $I->CreateInspectorOrganization($inspOrganization, $this->state);
        $orgID = $I->GetOrganizationIDFromUrl($I);
        $I->amOnPage(Page\InspectorOrganizationUpdate::URL_AddProgramForm($orgID));
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\InspectorOrganizationUpdate::URL_AddProgramForm($orgID));
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program2);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\InspectorOrganizationUpdate::URL_AddProgramForm($orgID));
        $I->click(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(4);
        $I->selectOption(Page\InspectorOrganizationUpdate::$ProgramSelect_AddProgramForm, $this->program3);
        $I->click(Page\InspectorOrganizationUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\InspectorOrganizationUpdate::URL_AddComplianceCheckTypeForm($orgID));
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 'Wastewater');
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\InspectorOrganizationUpdate::URL_AddComplianceCheckTypeForm($orgID));
        $I->selectOption(\Page\InspectorOrganizationUpdate::$ComplianceCheckTypeSelect_AddComplianceCheckTypeForm, 'Stormwater');
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddComplianceCheckTypeForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->amOnPage(Page\InspectorOrganizationUpdate::URL_AddMemberForm($orgID));
        $I->selectOption(\Page\InspectorOrganizationUpdate::$MemberSelect_AddMemberForm, $this->fullName_Inspector);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationUpdate::$AddButton_AddMemberForm);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    //----------------------------------Business1--------------------------------
    
    public function InspectorPopup_ChangeStatusToReadyForComplianceCheckTypeInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Wastewater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Wastewater'), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Wastewater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Wastewater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToReadyForEnergyAuditGroupInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function Empty_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSeeElement(Page\InspectorNotificationsList::$EmptyListLabel);
    }
    
    public function Empty_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSeeElement(Page\AuditorNotificationsList::$EmptyListLabel);
    }
    
    public function InspectorPopup_AddInspectorWithoutChangingStatusToReadyForComplianceCheckTypeInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Stormwater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Stormwater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Stormwater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_AddAuditorWithoutChangingStatusToReadyForSolidWasteAuditGroupInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness1Message_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSeeElement(Page\InspectorNotificationsList::$EmptyListLabel);
    }
    
    public function CheckBusiness1Message_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        $I->canSee('1', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('1', $rows);
    }
    
    //----------------------------------Business2--------------------------------
    
    public function InspectorPopup_ChangeStatusToReadyForComplianceCheckTypeInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Wastewater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Wastewater'), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Wastewater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Wastewater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToReadyForEnergyAuditGroupInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness2MessageAbsent_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSeeElement(Page\InspectorNotificationsList::$EmptyListLabel);
    }
    
    public function CheckBusiness2MessageAbsent_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->cantSee($this->program2, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->cantSee($this->business2, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee('1', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('1', $rows);
    }
    
    public function InspectorPopup_AddInspectorWithoutChangingStatusToReadyForComplianceCheckTypeInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Stormwater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Stormwater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Stormwater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_AddAuditorWithoutChangingStatusToReadyForSolidWasteAuditGroupInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness2Message_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        $I->canSee('1', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('1', $rows);
    }
    
    public function CheckBusiness2MessageAbsent2_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        $I->canSee('1', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('1', $rows);
    }
    
    //----------------------------------Business3--------------------------------
    
    public function InspectorPopup_ChangeStatusToReadyForComplianceCheckTypeInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Wastewater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Wastewater'), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Wastewater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Wastewater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToReadyForEnergyAuditGroupInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::ReadyStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness3MessageAbsent_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->cantSee($this->program3, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->cantSee($this->business3, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee('1', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('1', $rows);
    }
    
    public function CheckBusiness3MessageAbsent_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->cantSee($this->program3, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->cantSee($this->business3, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee('1', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('1', $rows);
    }
    
    public function InspectorPopup_AddInspectorWithoutChangingStatusToReadyForComplianceCheckTypeInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Stormwater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Stormwater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Stormwater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_AddAuditorWithoutChangingStatusToReadyForSolidWasteAuditGroupInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness3Message_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee('2', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('2', $rows);
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine($rows));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine($rows));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine($rows));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine($rows));
    }
    
    public function CheckBusiness3Message_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee('2', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('2', $rows);
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine($rows));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine($rows));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine($rows));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine($rows));
    }
    
    public function Business1_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        $subject                = $this->subject_Certification_All;
        $body                   = $this->body_Certification_All;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(10);
    }
    
    public function Business2_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business2));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(15);
        $I->cantSeePopupIsOpened($I);
        $I->wait(3);
    }
    
    public function Business3_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        $this->body_Certification_Prog3 = "bodyscsbcbs $this->firstName_Bus3 $this->lastName_Bus3";
        
        $subject                = $this->subject_Certification_Prog3;
        $body                   = $this->body_Certification_Prog3;
        
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business3));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(10);
    }
    
    public function Business1_ChangeStatusToRequiresRenewal(AcceptanceTester $I){
        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
        $subject                = $this->subject_RequiresRenewal_All = \Page\ApplicantEmailTextList::RequiresRenewal_Trigger;
        $body                   = $this->body_RequiresRenewal_All = 'You need renewal your Application';
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->click(Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(10);
    }
    
    public function Business2_ChangeStatusToRequiresRenewal(AcceptanceTester $I){
        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
        $subject                = $this->subject_RequiresRenewal_All = \Page\ApplicantEmailTextList::RequiresRenewal_Trigger;
        $body                   = $this->body_RequiresRenewal_All = 'You need renewal your Application';
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business2));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->click(Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(15);
        $I->cantSeePopupIsOpened($I);
        $I->wait(1);
    }
    
    public function Business3_ChangeStatusToRequiresRenewal(AcceptanceTester $I){
        $status                 = \Page\BusinessChecklistView::RequiresRenewalStatus;
        $subject                = $this->subject_RequiresRenewal_All = \Page\ApplicantEmailTextList::RequiresRenewal_Trigger;
        $body                   = $this->body_RequiresRenewal_All = 'You need renewal your Application';
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business3));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->click(Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(10);
    }
    
    //----------------------------------Business1--------------------------------
    
    public function InspectorPopup_ChangeStatusToPassed_WithoutInspector_ForComplianceCheckTypeInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Wastewater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Wastewater'), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToPassed_WithoutAuditor_ForEnergyAuditGroupInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness1_Absent_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('2'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('2'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('2'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('2'));
        $I->canSee('2', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('2', $rows);
    }
    
    public function CheckBusiness1_Absent_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('2'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('2'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('2'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('2'));
        $I->canSee('2', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('2', $rows);
    }
    
    //----------------------------------Business1--------------------------------
    
    public function InspectorPopup_Passed_AddInspector_ForComplianceCheckTypeInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Wastewater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Wastewater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToPassed_AddAuditor_ForEnergyAuditGroupInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness1_Absent_Off_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee('2', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('2', $rows);
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine($rows));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine($rows));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine($rows));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine($rows));
    }
    
    public function CheckBusiness1_Present_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee('3', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('3', $rows);
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine($rows));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine($rows));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine($rows));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine($rows));
    }
    
    //----------------------------------Business2--------------------------------
    
    public function InspectorPopup_ChangeStatusToPassed_WithInspector_ForComplianceCheckTypeInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Wastewater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Wastewater'), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Wastewater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Wastewater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToPassed_WithAuditor_ForEnergyAuditGroupInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness2_Present_On_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('2'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('2'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('2'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('3'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('3'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('3'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('3'));
        $I->canSee('3', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('3', $rows);
    }
    
    public function CheckBusiness2_Absent_Off_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('2'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('2'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('2'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('3'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('3'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('3'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('3'));
        $I->canSee('3', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('3', $rows);
    }
    
    //----------------------------------Business3--------------------------------
    
    public function InspectorPopup_ChangeStatusToInProcess_WithInspector_ForComplianceCheckTypeInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Wastewater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Wastewater'), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Wastewater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Wastewater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToInProcess_WithAuditor_ForEnergyAuditGroupInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::Energy_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness3_Absent_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('2'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('2'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('2'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('3'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('3'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('3'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('3'));
        $I->canSee('3', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('3', $rows);
    }
    
    public function CheckBusiness3_Absent_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('2'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('2'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('2'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('3'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('3'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('3'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('3'));
        $I->canSee('3', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('3', $rows);
    }
    
    //----------------------------------Business3--------------------------------
    
    public function InspectorPopup_ChangeStatusToPassed_ForComplianceCheckTypeInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Wastewater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Wastewater'), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToPassed_ForEnergyAuditGroupInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::Energy_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::Energy_AuditGroup), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness3_Present_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee('4', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('4', $rows);
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine($rows));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine($rows));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine($rows));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine($rows));
    }
    
    public function CheckBusiness3_Present_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee('4', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('4', $rows);
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine($rows));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine($rows));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine($rows));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine($rows));
    }
    
    //----------------------------------Business1--------------------------------
    
    public function InspectorPopup_ChangeStatusToNotPassed_WithoutInspector_ForComplianceCheckType2InPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Stormwater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Stormwater'), \Page\ApplicationDetails::NotPassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToNotPassed_WithoutAuditor_ForSolidWasteAuditGroupInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), \Page\ApplicationDetails::NotPassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness1_NotPassed_Absent_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('2'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('2'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('2'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('3'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('3'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('3'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('3'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('4'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('4'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('4'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('4'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('4'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('4'));
        $I->canSee('4', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('4', $rows);
    }
    
    public function CheckBusiness1_NotPassed_Absent_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('2'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('2'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('2'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('3'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('3'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('3'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('3'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('4'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('4'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('4'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('4'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('4'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('4'));
        $I->canSee('4', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('4', $rows);
    }
    
    //----------------------------------Business1--------------------------------
    
    public function InspectorPopup_NotPassed_AddInspector_ForComplianceCheckType2InPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Stormwater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Stormwater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_NotPassed_AddAuditor_ForSolidWasteAuditGroupInPopup_Business1(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness1_NotPassed_Off_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('2'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('2'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('2'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('3'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('3'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('3'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('3'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('4'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('4'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('4'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('4'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('4'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('4'));
        $I->canSee('4', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('4', $rows);
    }
    
    public function CheckBusiness1_NotPassed_On_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee('5', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('5', $rows);
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine($rows));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine($rows));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine($rows));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine($rows));
    }
    
    //----------------------------------Business2--------------------------------
    
    public function InspectorPopup_ChangeStatusToNotPassed_WithInspector_ForComplianceCheckTypeInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Stormwater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Stormwater'), \Page\ApplicationDetails::NotPassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Stormwater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Stormwater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToNotPassed_WithAuditor_ForSolidWasteAuditGroupInPopup_Business2(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), \Page\ApplicationDetails::NotPassedStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness2_NotPassed_On_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee('5', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('5', $rows);
        
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine($rows));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine($rows));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine($rows));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine($rows));
    }
    
    public function CheckBusiness2_NotPassed_Off_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('2'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('2'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('2'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('3'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('3'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('3'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('3'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('4'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('4'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('4'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('4'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('4'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('4'));
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('5'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('5'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('5'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('5'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('5'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('5'));
        $I->canSee('5', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('5', $rows);
    }
    
    //----------------------------------Business3--------------------------------
    
    public function InspectorPopup_ChangeStatusToInProcess_WithInspector_ForComplianceCheckType2InPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::ComplianceCheckPopup_ComplianceCheckByName('Stormwater'));
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Stormwater'), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_OrganizationSelectByName('Stormwater'), $this->inspectorOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_InspectorSelectByName('Stormwater'), $this->fullName_Inspector);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToInProcess_WithAuditor_ForSolidWasteAuditGroupInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->canSeeElement(\Page\ApplicationDetails::AuditsPopup_AuditGroupByName(\Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), \Page\ApplicationDetails::InProcessStatus_TierTab);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_OrganizationSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->auditOrganization);
        $I->wait(5);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_AuditorSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), $this->fullName_Auditor);
        $I->wait(3);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness3_NotPassed_Absent_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('2'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('2'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('2'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('3'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('3'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('3'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('3'));
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('4'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('4'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('4'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('4'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('4'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('4'));
        
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('5'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('5'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('5'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('5'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('5'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('5'));
        $I->canSee('5', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('5', $rows);
    }
    
    public function CheckBusiness3_NotPassed_Absent_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('2'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('2'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('2'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('2'));
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('3'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('3'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('3'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('3'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('3'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('3'));
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('4'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('4'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('4'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('4'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('4'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('4'));
        
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('5'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('5'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('5'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('5'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('5'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('5'));
        $I->canSee('5', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('5', $rows);
    }
    
    //----------------------------------Business3--------------------------------
    
    public function InspectorPopup_ChangeStatusToNotPassed_ForComplianceCheckType2InPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_ComplianceCheck_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Inspectors", 90, \Page\ApplicationDetails::$ComplianceCheckPopup_Title);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::ComplianceCheckPopup_StatusSelectByName('Stormwater'), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$ComplianceCheckPopup_UpdateButton);
        $I->wait(5);
    }
    
    public function AuditPopup_ChangeStatusToNotPassed_ForSolidWasteAuditGroupInPopup_Business3(AcceptanceTester $I) {
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->id_business3));
        $I->scrollTo(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$AddDetailsButton_Audits_BusinessInfoTab);
        $I->wait(5);
        $I->waitForText("Assign Auditors", 90, \Page\ApplicationDetails::$AuditsPopup_Title);
        $I->wait(2);
        $I->selectOption(\Page\ApplicationDetails::AuditsPopup_StatusSelectByName(\Page\AuditGroupList::SolidWaste_AuditGroup), \Page\ApplicationDetails::PassedStatus_TierTab);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$AuditsPopup_UpdateButton);
        $I->wait(5);
    }
    
    //---------------------Audit/Inspection Complete List-----------------------
    public function CheckBusiness3_NotPassed_On_InspectionCompleteList(AcceptanceTester $I){
        $I->comment("Check on Inspection Complete List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL_InspectionComplete());
        $I->canSee('6', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('6', $rows);
        
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine($rows));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine($rows));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine($rows));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine($rows));
    }
    
    public function CheckBusiness3_NotPassed_On_AuditCompleteList(AcceptanceTester $I){
        $I->comment("Check on Audit Complete List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL_AuditComplete());
        $I->canSee('6', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('6', $rows);
        
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine($rows));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine($rows));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine($rows));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine($rows));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine($rows));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine($rows));
    }
    
    
    
    
    
    
    
    
    
    
    //-------------------------------Business1 Messages-------------------------
    public function Off_CheckGetStartedMessage_Business1(AcceptanceTester $I){
        $subject                = $this->subject_GetStarted_All;
        $subject_Prog2          = $this->subject_GetStarted_Prog2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business1));
        $I->cantSee($subject, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->cantSee($subject_Prog2, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
    }
    
    public function On_BusinessTierSubmission_Business1(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_BusinessSubmision_All;
        $body_Row1              = $this->body_BusinessSubmision_All_Bus1_Row1;
        $body_Row2              = $this->body_BusinessSubmision_All_Bus1_Row2;
        $body_Row3              = $this->body_BusinessSubmision_All_Bus1_Row3;
        $body_Row4              = $this->body_BusinessSubmision_All_Bus1_Row4;
        $body_Row5              = $this->body_BusinessSubmision_All_Bus1_Row5;
        $body_Row6              = $this->body_BusinessSubmision_All_Bus1_Row6;
        $body_Row7              = $this->body_BusinessSubmision_All_Bus1_Row7;
        $body_Row8              = $this->body_BusinessSubmision_All_Bus1_Row8;
        $body_Row9              = $this->body_BusinessSubmision_All_Bus1_Row9;
        $sender                 = $this->business1;
        
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business1));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($body_Row4, Page\CommunicationsView::PreviousMessage('1').'[4]');
        $I->canSee($body_Row5, Page\CommunicationsView::PreviousMessage('1').'[5]');
        $I->canSee($body_Row6, Page\CommunicationsView::PreviousMessage('1').'[6]');
        $I->canSee($body_Row7, Page\CommunicationsView::PreviousMessage('1').'[7]');
        $I->canSee($body_Row8, Page\CommunicationsView::PreviousMessage('1').'[8]');
        $I->canSee($body_Row9, Page\CommunicationsView::PreviousMessage('1').'[9]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_RequiresRenewal_Business1(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_RequiresRenewal_All;
        $body                   = $this->body_RequiresRenewal_All;
        $sender    = 'master admin';
        
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business1));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_HelpNotification_Business1(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_HelpNotification_All;
        $body_Row1              = $this->body_HelpNotification_Bus1_Row1;
        $body_Row2              = $this->body_HelpNotification_Bus1_Row2;
        $body_Row3              = $this->body_HelpNotification_Bus1_Row3;
        $sender    = $this->business1;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business1));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_CertificationEmail_Business1(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_Certification_All;
        $body_Row1              = $this->body_Certification_All_Bus1_Row1 = 'Congratulations, your business is now a recognized San Francisco Green Businesses!
On behalf of the San Francisco Green Business team, please accept our sincere appreciation for the efforts you and your
business have taken to conserve resources and prevent pollution. Your contributions help make San Francisco a more
sustainable city.';
        $body_Row2              = $this->body_Certification_All_Bus1_Row2 = '
You can now download high resolution versions of the logos on our website at: sfgreenbusiness.org/member-resources. We
will also be mailing out an award packet that will contain two Green Business window decals/stickers. Please read the logo
usage guidelines, also available at the above link, prior to using the logo files. We ask that you do not share this URL with
anyone outside of your business to ensure the logo is used properly by the right people.
Remember, the Green Business recognition is location specific and good for three years from your date of recognition.
Three years after your awarded date, you will need to complete a full re-recognition. You will also need to fill out the annual
self-recognition form once a year found at: sfgreenbusiness.org/member-resources.';
        $body_Row3              = $this->body_Certification_All_Bus1_Row3 = '
Sincerely,
The SF Green Business Team
P.S. You can keep up to date on SF Green Business Program activities by signing up for our newsletter
(http://sfgreenbusiness.org/learn-about-us/newsletter/) or liking us on Facebook
(http://www.facebook.com/sfgreenbusiness)';
        $sender    = 'master admin';
        
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business1));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    //-------------------------------Business2 Messages-------------------------
    public function On_CheckGetStartedMessage_Business2(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_GetStarted_Prog2;
        $body                   = $this->body_GetStarted_Prog2;
        $sender    = $this->business2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business2));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
//        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function Off_BusinessTierSubmission_Business2(AcceptanceTester $I){
        $subject                = $this->subject_BusinessSubmision_Prog2;
        $subject_All            = $this->subject_BusinessSubmision_All;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business2));
        $I->cantSee($subject, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->cantSee($subject_All, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
    }
    
    public function Off_RequiresRenewal_Business2(AcceptanceTester $I){
        $subject                = $this->subject_RequiresRenewal_All;
//        $subject_All            = $this->subject_r;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business2));
        $I->cantSee($subject, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
//        $I->cantSee($subject_All, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
    }
    
    public function On_HelpNotification_Business2(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_HelpNotification_All;
        $body_Row1              = $this->body_HelpNotification_Bus2_Row1;
        $body_Row2              = $this->body_HelpNotification_Bus2_Row2;
        $body_Row3              = $this->body_HelpNotification_Bus2_Row3;
        $body_Row4              = $this->body_HelpNotification_Bus2_Row4;
        $sender    = $this->business2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business2));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($body_Row4, Page\CommunicationsView::PreviousMessage('1').'[4]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function Off_CertificationEmail_Business2(AcceptanceTester $I){
        $subject                = $this->subject_Certification_All;
        $subject_All            = $this->subject_Certification_Prog3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business2));
        $I->cantSee($subject, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
        $I->cantSee($subject_All, Page\ApplicationDetails::$SubjectColumnRow_CommunicationTab);
    }
    
    //-------------------------------Business3 Messages-------------------------
    public function On_CheckGetStartedMessage_Business3(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_GetStarted_All;
        $body                   = $this->body_GetStarted_All;
        $sender    = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business3));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program3, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
//        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_BusinessTierSubmission_Business3(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_BusinessSubmision_All;
        $body_Row1              = $this->body_BusinessSubmision_All_Bus3_Row1;
        $body_Row2              = $this->body_BusinessSubmision_All_Bus3_Row2;
        $body_Row3              = $this->body_BusinessSubmision_All_Bus3_Row3;
        $body_Row4              = $this->body_BusinessSubmision_All_Bus3_Row4;
        $body_Row5              = $this->body_BusinessSubmision_All_Bus3_Row5;
        $body_Row6              = $this->body_BusinessSubmision_All_Bus3_Row6;
        $body_Row7              = $this->body_BusinessSubmision_All_Bus3_Row7;
        $body_Row8              = $this->body_BusinessSubmision_All_Bus3_Row8;
        $body_Row9              = $this->body_BusinessSubmision_All_Bus3_Row9;
        $sender    = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business3));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program3, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($body_Row4, Page\CommunicationsView::PreviousMessage('1').'[4]');
        $I->canSee($body_Row5, Page\CommunicationsView::PreviousMessage('1').'[5]');
        $I->canSee($body_Row6, Page\CommunicationsView::PreviousMessage('1').'[6]');
        $I->canSee($body_Row7, Page\CommunicationsView::PreviousMessage('1').'[7]');
        $I->canSee($body_Row8, Page\CommunicationsView::PreviousMessage('1').'[8]');
        $I->canSee($body_Row9, Page\CommunicationsView::PreviousMessage('1').'[9]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_RequiresRenewal_Business3(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_RequiresRenewal_All;
        $body                   = $this->body_RequiresRenewal_All;
        $sender                 = 'master admin';
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business3));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program3, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_HelpNotification_Business3(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_HelpNotification_All;
        $body_Row1              = $this->body_HelpNotification_Bus3_Row1;
        $body_Row2              = $this->body_HelpNotification_Bus3_Row2;
        $body_Row3              = $this->body_HelpNotification_Bus3_Row3;
        $sender    = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business3));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program3, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body_Row1, Page\CommunicationsView::PreviousMessage('1').'[1]');
        $I->canSee($body_Row2, Page\CommunicationsView::PreviousMessage('1').'[2]');
        $I->canSee($body_Row3, Page\CommunicationsView::PreviousMessage('1').'[3]');
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    public function On_CertificationEmail_Business3(\Step\Acceptance\Communication $I){
        $subject                = $this->subject_Certification_Prog3;
        $body                   = $this->body_Certification_Prog3;
        $sender    = 'master admin';
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->id_business3));
        $row = $I->GetNotificationRowOnCommunicationTab($subject);
        $I->canSee($this->program3, Page\ApplicationDetails::SenderLine_CommunicationTab($row));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab($row));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab($row));
        $I->wait(4);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $grabedBodyValue = $I->grabTextFrom(Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Grabed body value: $grabedBodyValue");
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    //------------------------------For All Businesses--------------------------
    public function InspectorMessages_InspectorRequestsList(AcceptanceTester $I){
        $I->comment("Check on Inspector Requests List");
        $I->amOnPage(\Page\InspectorNotificationsList::URL());
        $I->canSee($this->program2, Page\InspectorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business2, Page\InspectorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('1'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('1'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('1'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('1'));
        //
        $I->canSee($this->program3, Page\InspectorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\InspectorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Inspector, Page\InspectorNotificationsList::InspectorLine('2'));
        $I->canSee($this->emailInspector, Page\InspectorNotificationsList::InspectorEmailLine('2'));
        $I->canSee($this->inspectorOrganization, Page\InspectorNotificationsList::InspectorOrganizationLine('2'));
        $I->canSee('Sending', Page\InspectorNotificationsList::SentLine('2'));
        $I->canSee('2', Page\InspectorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\InspectorNotificationsList::$RequestRow);
        $I->assertEquals('2', $rows);
    }
    
    public function AuditorMessages_AuditorRequestsList(AcceptanceTester $I){
        $I->comment("Check on Auditor Requests List");
        $I->amOnPage(\Page\AuditorNotificationsList::URL());
        $I->canSee($this->program1, Page\AuditorNotificationsList::ProgramLine('1'));
        $I->canSee($this->business1, Page\AuditorNotificationsList::BusinessLine('1'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('1'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('1'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('1'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('1'));
        //
        $I->canSee($this->program3, Page\AuditorNotificationsList::ProgramLine('2'));
        $I->canSee($this->business3, Page\AuditorNotificationsList::BusinessLine('2'));
        $I->canSee($this->fullName_Auditor, Page\AuditorNotificationsList::AuditorLine('2'));
        $I->canSee($this->emailAuditor, Page\AuditorNotificationsList::AuditorEmailLine('2'));
        $I->canSee($this->auditOrganization, Page\AuditorNotificationsList::AuditOrganizationLine('2'));
        $I->canSee('Sending', Page\AuditorNotificationsList::SentLine('2'));
        $I->canSee('2', Page\AuditorNotificationsList::$SummaryCount);
        $rows = $I->getAmount($I, Page\AuditorNotificationsList::$RequestRow);
        $I->assertEquals('2', $rows);
    }
}
