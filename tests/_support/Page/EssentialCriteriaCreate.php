<?php
namespace Page;

class EssentialCriteriaCreate
{
    public static function URL($stateId)  { return "/master-admin/checklist/create-criteria?state_id=$stateId";}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NumberSelect           = '#checklist-number';
    public static $SelectedNumberOption   = '#checklist-number [selected]';
    public static $NumberOption           = '#checklist-number option';
    
    public static $StateSelect            = '#checklist-state_id';
    
    public static $StatusSelect           = '#checklist-status';
    public static $SelectedStatusOption   = '#checklist-status [selected]';
    public static $StatusOption           = '#checklist-status option';
    
    public static $NumberSelectLabel      = '[for=checklist-number]';
    public static $StateSelectLabel       = '[for=checklist-state_id]';
    public static $StatusSelectLabel      = '[for=checklist-status]';
    
    public static $CompletePointsField    = '#checklist-complete_points';
    public static $CompletePointsLabel    = '[for=checklist-complete_points]';
    
    public static function selectNumberOption($number) { return "#checklist-number option:nth-of-type($number)";}
    public static function selectStatusOption($number) { return "#checklist-status option:nth-of-type($number)";}


}
