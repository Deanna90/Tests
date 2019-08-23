<?php
namespace Page;

class SectorChecklistCreate extends \AcceptanceTester
{
    public static function URL($stateId)         { return parent::$URL_UserAccess."/checklist/create-sector-checklist?state_id=$stateId";}
    public static function URL_WithoutStateId()  { return parent::$URL_UserAccess."/checklist/create-sector-checklist";}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NumberSelect           = '#checklist-number';
    public static $SelectedNumberOption   = '#checklist-number [selected]';
    public static $NumberOption           = '#checklist-number option';
    
    public static $StateSelect            = '#checklist-state_id';
    
    public static $SectorSelect           = '#checklist-sector_id';
    public static $SelectedSectorOption   = '#checklist-sector_id [selected]';
    public static $SectorOption           = '#checklist-sector_id option';
    
    public static $NumberSelectLabel      = '[for=checklist-number]';
    public static $StateSelectLabel       = '[for=checklist-state_id]';
    public static $SectorSelectLabel      = '[for=checklist-sector_id]';
    
    public static $CompletePointsField    = '#checklist-complete_points';
    public static $CompletePointsLabel    = '[for=checklist-complete_points]';
    
    public static function selectNumberOption($number) { return "#checklist-number option:nth-of-type($number)";}
    public static function selectSectorOption($number) { return "#checklist-sector_id option:nth-of-type($number)";}
}
