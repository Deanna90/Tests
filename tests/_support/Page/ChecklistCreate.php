<?php
namespace Page;

class ChecklistCreate extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/checklist/merge-checklists';}
    public static $Title                  = 'h2';
    
    public static $SaveButton             = '[type=submit].btn-green-lite';
    
    public static $SourceProgramSelect              = '#source-program-id';
    public static $SelectedSourceProgramOption      = '#source-program-id [selected]';
    public static $SourceProgramOption              = '#source-program-id option';
    
    public static $ProgramCriteriaSelect            = '#criteria-program-id';
    public static $SelectedProgramCriteriaOption    = '#criteria-program-id [selected]';
    public static $ProgramCriteriaOption            = '#criteria-program-id option';
    
    public static $SectorCriteriaSelect             = '#criteria-sector-id';
    public static $SelectedSectorCriteriaOption     = '#criteria-sector-id [selected]';
    public static $SectorCriteriaOption             = '#criteria-sector-id option';

    public static $ProgramDestinationSelect         = '#target-program-id';
    public static $SelectedProgramDestinationOption = '#target-program-id [selected]';
    public static $ProgramDestinationOption         = '#target-program-id option';
    
    public static $SectorDestinationSelect          = '#target-sector-id';
    public static $SelectedSectorDestinationOption  = '#target-sector-id [selected]';
    public static $SectorDestinationOption          = '#target-sector-id option';
    
    public static $TierSelect                       = '#target_checklist_number';
    public static $SelectedTierOption               = '#target_checklist_number [selected]';
    public static $TierOption                       = '#target_checklist_number option';
        
    public static function selectSourceProgramOption($number)      { return "#source-program-id option:nth-of-type($number)";}
    public static function selectProgramCriteriaOption($number)    { return "#criteria-program-id option:nth-of-type($number)";}
    public static function selectSectorCriteriaOption($number)     { return "#criteria-sector-id option:nth-of-type($number)";}
    public static function selectProgramDestinationOption($number) { return "#target-program-id option:nth-of-type($number)";}
    public static function selectSectorDestinationOption($number)  { return "#target-sector-id option:nth-of-type($number)";}
    public static function selectTierOption($number)               { return "#target_checklist_number option:nth-of-type($number)";}
}
