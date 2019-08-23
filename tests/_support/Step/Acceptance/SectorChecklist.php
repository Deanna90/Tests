<?php
namespace Step\Acceptance;

class SectorChecklist extends \AcceptanceTester
{
    public function CreateSectorChecklist($number = null, $sector = null, $state = null)
    {
        $I = $this;
        $I->amOnPage(\Page\SectorChecklistList::URL());
        $I->click(\Page\SectorChecklistList::$CreateSectorChecklistButton);
        $I->waitPageLoad();
        if (isset($number)){
            $I->click(\Page\SectorChecklistCreate::$NumberSelect);
            $I->wait(1);
            $I->waitPageLoad();
            $I->selectOption(\Page\SectorChecklistCreate::$NumberSelect, $number);
//            $I->wait(1);
            $I->waitPageLoad();
        }
        if (isset($sector)){
            $I->selectOption(\Page\SectorChecklistCreate::$SectorSelect, $sector);
        }
        if (isset($state)){
            $I->seeOptionIsSelected(\Page\SectorChecklistCreate::$StateSelect, $state);
        }
        $I->click(\Page\SectorChecklistCreate::$CreateButton);
        $I->wait(1);
        $I->waitPageLoad();
//        $I->wait(4);
        $I->waitForElement(\Page\SectorChecklistManage::$PreviewButton, 150);
        $I->wait(1);
        $checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url: $checklistUrl");
        $u1 = explode('=', $checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $id_checklist = $u2[0];
        $I->comment("Checklist id: $id_checklist");
        return $id_checklist;
    }  

    public function ManageSectorChecklist($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\SectorChecklistManage::$SaveButton_Header);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countStat = count($statuses);
            $I->comment("Count of measures: $countDesc");
            $I->comment("Count of statuses: $countStat");
            $count       = $countStat - $countDesc;
            $statusesNew = array_splice($statuses, $count);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->wait(1);
                $I->selectOption(\Page\SectorChecklistManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statusesNew[$i]);
            }
        }
        if (isset($descs) && isset($extension)){
            $countDesc = count($descs);
            $countExtens = count($extension);
            $I->comment("Count of measures: $countDesc");
            $I->comment("Count of extensions: $countExtens");
            $count       = $countExtens - $countDesc;
            $extensionsNew = array_splice($extension, $count);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->selectOption(\Page\SectorChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($descs[$i]), $extensionsNew[$i]);
            }
        }
        $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
        $I->wait(1);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
        return $statusesNew;
    }
    
    public function PublishSectorChecklistStatus($row = '1', $endStatus = 'published')
    {
        $I = $this;
        $I->wait(1);
        $I->waitPageLoad();
//        $I->wait(4);
//        $I->waitForElement(\Page\SectorChecklistManage::$VersionHistoryTab);
        $I->click(\Page\SectorChecklistManage::$VersionHistoryTab);
        $I->waitPageLoad();
        $I->click(\Page\SectorChecklistManage::PublishButtonLine_VersionHistoryTab($row));
        $I->wait(6); 
        $I->waitPageLoad();
        $popup = $I->getAmount($I, \Page\SectorChecklistManage::$PublishToProgramsPopup);
        if($popup == '1'){
            $I->click(\Page\SectorChecklistManage::$PublishToProgramsPopup_PublishToAllProgramsButton);
            $I->wait(6);   
            $I->waitPageLoad();
        }
        if($endStatus == 'published'){
            $popup2 = $I->getAmount($I, ".showSweetAlert.visible");
            if($popup2 == '1'){
                $I->waitForText("Checklists successfully published", 100);
                $I->click(".confirm");
                $I->wait(6);
                $I->waitPageLoad();
            }
            $I->canSee('Published', \Page\SectorChecklistManage::$StatusTitle);
        }
        else{
            $I->canSee('Draft', \Page\SectorChecklistManage::$StatusTitle);
        }
    }
    
    public function UpdateChecklistPoints($points_Default = null, $points_LB = null, $points_LL = null, $points_LL_LB = null)
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\SectorChecklistManage::$PointsTab);
        $I->waitPageLoad();
//        $I->wait(1);
//        $I->waitForElement(\Page\SectorChecklistManage::$RequiredPointsField, 150);
//        $I->wait(1);
        if(isset($points_Default)){
            $I->comment("-----                      Points for Default:                      -----");
            $I->fillField(\Page\SectorChecklistManage::$RequiredPointsField, $points_Default);
            $I->wait(1);
            $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
//            $I->wait(2);
            $I->waitForElement(\Page\SectorChecklistManage::$RequiredPointsField, 150);
        }
        if(isset($points_LB)){
            $I->comment("-----                         Points for LB:                        -----");
            $I->click(\Page\SectorChecklistManage::$LBTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_lb'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='lb'].active", 150);
            $I->wait(1);
            $I->fillField(\Page\SectorChecklistManage::$RequiredPointsField, $points_LB);
            $I->wait(1);
            $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
//            $I->wait(1);
            $I->waitForElement(".tabs a[href*='lb'].active", 150);
        }
        if(isset($points_LL)){
            $I->comment("-----                         Points for LL:                        -----");
            $I->click(\Page\SectorChecklistManage::$LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_ll'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='ll'].active", 150);
            $I->wait(1);
            $I->fillField(\Page\SectorChecklistManage::$RequiredPointsField, $points_LL);
            $I->wait(1);
            $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
//            $I->wait(2);
            $I->waitForElement(".tabs a[href*='ll'].active", 150);
        }
        if(isset($points_LL_LB)){
            $I->comment("-----                        Points for LL&LB:                      -----");
            $I->click(\Page\SectorChecklistManage::$LB_LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'all'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='all'].active", 150);
            $I->wait(1);
            $I->fillField(\Page\SectorChecklistManage::$RequiredPointsField, $points_LL_LB);
            $I->wait(1);
            $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
            $I->wait(3);
            $I->waitForText("Points was successfully updated!", 150);
            $I->reloadPage();
            $I->waitPageLoad();
//            $I->wait(2);
            $I->waitForElement(".tabs a[href*='all'].active", 150);
        }
    }
    
    public function CheckSavedPoints($points_Default = null, $points_LB = null, $points_LL = null, $points_LL_LB = null)
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\SectorChecklistManage::$PointsTab);
        $I->waitPageLoad();
//        $I->wait(1);
//        $I->waitForElement(\Page\SectorChecklistManage::$RequiredPointsField, 150);
//        $I->wait(1);
        if(isset($points_Default)){
            $I->comment("-----                      Points for Default:                      -----");
            $I->canSeeInField(\Page\SectorChecklistManage::$RequiredPointsField, $points_Default);
//            $I->wait(2);
        }
        if(isset($points_LB)){
            $I->comment("-----                         Points for LB:                        -----");
            $I->click(\Page\SectorChecklistManage::$LBTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_lb'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='lb'].active", 150);
            $I->wait(1);
            $I->canSeeInField(\Page\SectorChecklistManage::$RequiredPointsField, $points_LB);
//            $I->wait(2);
        }
        if(isset($points_LL)){
            $I->comment("-----                         Points for LL:                        -----");
            $I->click(\Page\SectorChecklistManage::$LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'is_ll'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='ll'].active", 150);
            $I->wait(1);
            $I->canSeeInField(\Page\SectorChecklistManage::$RequiredPointsField, $points_LL);
//            $I->wait(2);
        }
        if(isset($points_LL_LB)){
            $I->comment("-----                        Points for LL&LB:                      -----");
            $I->click(\Page\SectorChecklistManage::$LB_LLTab_DefineTotalTab);
//            $I->amOnPage(\Page\ChecklistManage::URL_PointsTab_ExtensionTab($id_checklist, 'all'));
            $I->wait(1);
            $I->waitPageLoad();
            $I->waitForElement(".tabs a[href*='all'].active", 150);
            $I->wait(1);
            $I->canSeeInField(\Page\SectorChecklistManage::$RequiredPointsField, $points_LL_LB);
//            $I->wait(2);
        }
    }
    
    public function UpdateDefineTotalValue($extension, $auditGroup, $subgroup, $value) {
        $I = $this;
        $I->comment("-----                      -----                       -----");
        $I->comment("---------------------$auditGroup group----------------------");
        $I->comment("--------------$subgroup subgroup $extension TAB-------------");
        $I->click(\Page\SectorChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->waitForElement(".tabs a[href*='tab=def'].active", 150);
        $I->wait(1);
        switch ($extension) {
            case 'def':
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
            case 'lb':
                $I->click(\Page\SectorChecklistManage::$LBTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='lb'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
            case 'll':
                $I->click(\Page\SectorChecklistManage::$LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='ll'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
            case 'all':
                $I->click(\Page\SectorChecklistManage::$LB_LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='all'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                $I->comment("-----                      -----                       -----");
                break;
        }
    }
    
    public function CheckSavedDefineTotalValue($extension, $auditGroup, $subgroup, $coreCount =null, $electiveCount=null, $requiredElective=null, $totalRequired=null) {
        $I = $this;
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\SectorChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        $I->comment("---------------------$auditGroup group----------------------");
        $I->comment("--------------$subgroup subgroup $extension TAB-------------");
        switch ($extension) {
            case 'def':
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\SectorChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\SectorChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\SectorChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
            case 'lb':
                $I->click(\Page\SectorChecklistManage::$LBTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='lb'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\SectorChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\SectorChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\SectorChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
            case 'll':
                $I->click(\Page\SectorChecklistManage::$LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='ll'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\SectorChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\SectorChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\SectorChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
            case 'all':
                $I->click(\Page\SectorChecklistManage::$LB_LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='all'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                if(isset($coreCount)){
                    $I->canSee($coreCount, \Page\SectorChecklistManage::CoreMeasuresLine_DefineTotalTab($subgroup));
                }
                if(isset($electiveCount)){
                    $I->canSee($electiveCount, \Page\SectorChecklistManage::TotalElectiveLine_DefineTotalTab($subgroup));
                }
                if(isset($requiredElective)){
                    $I->canSeeInField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $requiredElective);
                }
                if(isset($totalRequired)){
                    $I->canSee($totalRequired, \Page\SectorChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($subgroup));
                }
                break;
        }
    }
    
    public function CheckValidationErrorWhenUpdateDefineTotalValue($extension, $auditGroup, $subgroup, $value, $error) {
        $I = $this;
        $I->comment("-----                      -----                       -----");
        $I->comment("---------------------$auditGroup group----------------------");
        $I->comment("--------------$subgroup subgroup $extension TAB-------------");
        $I->click(\Page\SectorChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(1);
        $I->waitPageLoad();
        switch ($extension) {
            case 'def':
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\SectorChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
            case 'lb':
                $I->click(\Page\SectorChecklistManage::$LBTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='lb'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\SectorChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
            case 'll':
                $I->click(\Page\SectorChecklistManage::$LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='ll'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\SectorChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
            case 'all':
                $I->click(\Page\SectorChecklistManage::$LB_LLTab_DefineTotalTab);
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement(".tabs a[href*='all'].active", 150);
                $I->wait(1);
                $I->click(\Page\SectorChecklistManage::FilterMenu_AuditGroupItem($auditGroup));
                $I->wait(1);
                $I->waitPageLoad();
                $I->waitForElement("//p[text()='$auditGroup']", 60);
                $I->wait(1);
                $I->fillField(\Page\SectorChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup), $value);
                $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee("Checklist was not updated!");
                $I->click(".confirm");
                $I->wait(2);
                $I->waitPageLoad();
                $I->canSee($error, \Page\SectorChecklistManage::ErrorCountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($subgroup));
                $I->comment("-----                      -----                       -----");
                break;
        }
    }
    
    public function GetIdOfPublishedSectorChecklist()
    {
        $I = $this;
        $I->wait(3);
        $I->click(\Page\SectorChecklistManage::$VersionHistoryTab);
        $I->waitPageLoad();
        $id = $I->grabTextFrom(\Page\SectorChecklistManage::$IdOfPublishedSectorChecklist_VersionHistoryTab);
        $I->comment("Published Sector Checklist id: $id");
        return $id;
    }
    
    public function UpdateSectorChecklistPoints($points)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\SectorChecklistManage::$SaveButton_Header);
        $I->click(\Page\SectorChecklistManage::$PointsTab);
        $I->wait(1);
        $I->fillField(\Page\SectorChecklistManage::$RequiredPointsField);
        $I->wait(1);        
        $I->click(\Page\SectorChecklistManage::$SaveButton_Header);
    }
    
    public function CheckSavedValuesOnManageSectorChecklistPage($descs = null, $statuses = null, $extension = null)
    {
        $I = $this;
        $I->wait(3);
        $I->waitForElement(\Page\SectorChecklistManage::$SaveButton_Header);
        if (isset($descs) && isset($statuses)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::StatusSelectLine_ManageMeasureTab($descs[$i]), $statuses[$i]);
            }
        }
        if (isset($descs) && isset($extension)){
            $countDesc = count($descs);
            $countDesc--;
            $I->comment("Count of measures: $countDesc");
            for($i=0; $i<=$countDesc; $i++){
                $I->canSeeOptionIsSelected(\Page\SectorChecklistManage::MeasureExtensionSelectLine_ManageMeasureTab($descs[$i]), $extension[$i]);
            }
        }
        $I->wait(1);
    }
    
    public function Check_CountOf_Core_Measures_IncludedMeasuresForm($defaultCount = null, $lbCount = null, $llCount = null, $allCount = null) {
        $I = $this;
        $I->comment("---                     ---Core---                    ---");
        if(isset($defaultCount)){
            $I->canSee($defaultCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        }
        if(isset($lbCount)){
            $I->canSee($lbCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        }
        if(isset($llCount)){
            $I->canSee($llCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        }
        if(isset($allCount)){
            $I->canSee($allCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        }
    }
    
    public function Check_CountOf_Elective_Measures_IncludedMeasuresForm($defaultCount = null, $lbCount = null, $llCount = null, $allCount = null) {
        $I = $this;
        $I->comment("---                   ---Elective---                  ---");
        if(isset($defaultCount)){
            $I->canSee($defaultCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        }
        if(isset($lbCount)){
            $I->canSee($lbCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        }
        if(isset($llCount)){
            $I->canSee($llCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        }
        if(isset($allCount)){
            $I->canSee($allCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        }
    }
    
    public function Check_CountOf_RequiredElective_Measures_IncludedMeasuresForm($defaultCount = null, $lbCount = null, $llCount = null, $allCount = null) {
        $I = $this;
        $I->comment("---              ---Required Elective---              ---");
        if(isset($defaultCount)){
            $I->canSee($defaultCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_DefaultElectiveRequiredValue);
        }
        if(isset($lbCount)){
            $I->canSee($lbCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LBElectiveRequiredValue);
        }
        if(isset($llCount)){
            $I->canSee($llCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LLElectiveRequiredValue);
        }
        if(isset($allCount)){
            $I->canSee($allCount, \Page\SectorChecklistManage::$IncludedMeasuresForm_LB_LLElectiveRequiredValue);
        }
    }
    
    public function AddMeasuresToSectorChecklist($sectorsArray = null, $measuresIDs = null, $tierNumber = null, $measExtension = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\AddMeasures_SectorChecklist::URL());
        if (isset($sectorsArray)){
            for ($i=1, $c= count($sectorsArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\AddMeasures_SectorChecklist::$SectorSelect);
                $I->wait(3);
                $I->click(\Page\AddMeasures_SectorChecklist::selectSectorOptionByName($sectorsArray[$k]));
            }
        }
        if (isset($measuresIDs)){
            $I->fillField(\Page\AddMeasures_SectorChecklist::$MeasuresIDsField, $measuresIDs);
        }
        if (isset($tierNumber)){
            $I->selectOption(\Page\AddMeasures_SectorChecklist::$TierNumberSelect, $tierNumber);
            $I->wait(5);
            $I->waitPageLoad();
        }
        if (isset($measExtension)){
            $I->selectOption(\Page\AddMeasures_SectorChecklist::$MeasureExtensionSelect, $measExtension);
            $I->wait(5);
            $I->waitPageLoad();
        }
        if (isset($status)){
            $I->selectOption(\Page\AddMeasures_SectorChecklist::$TypeSelect, $status);
            $I->wait(5);
            $I->waitPageLoad();
        }
        $I->click(\Page\AddMeasures_SectorChecklist::$AddButton);
        $I->wait(1);
        $I->waitPageLoad();
    }  
    
    
    public function RemoveMeasuresFromSectorChecklist($sectorsArray = null, $measuresIDs = null)
    {
        $I = $this;
        $I->amOnPage(\Page\RemoveMeasures_SectorChecklist::URL());
        if (isset($sectorsArray)){
            for ($i=1, $c= count($sectorsArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\RemoveMeasures_SectorChecklist::$SectorSelect);
                $I->wait(3);
                $I->click(\Page\RemoveMeasures_SectorChecklist::selectSectorOptionByName($sectorsArray[$k]));
            }
        }
        if (isset($measuresIDs)){
            $I->fillField(\Page\RemoveMeasures_SectorChecklist::$MeasuresIDsField, $measuresIDs);
        }
        $I->click(\Page\RemoveMeasures_SectorChecklist::$RemoveButton);
        $I->wait(1);
        $I->waitPageLoad();
    }  
}