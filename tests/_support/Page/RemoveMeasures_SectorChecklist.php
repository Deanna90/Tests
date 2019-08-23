<?php
namespace Page;

class RemoveMeasures_SectorChecklist extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/checklist/remove-measures';}
    public static $Title                  = 'h1';
    
    public static $RemoveButton              = '[type=submit][class*=btn-danger]';
    
    public static $MeasuresIDsField               = '#replacemeasureform-measureids';
    
    public static $SectorSelect                   = '#replacemeasureform_sectorids_chosen';
    public static $SelectedSectorOption           = '#replacemeasureform_sectorids_chosen a>span';
    public static $SectorOption                   = '#replacemeasureform_sectorids_chosen ul>li';
    
    public static function selectSectorOption($number)       { return "#replacemeasureform_sectorids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectSectorOptionByName($name)   { return "//*[@id='replacemeasureform_sectorids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedSectorOption($number)     { return "#preplacemeasureform_sectorids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedSectorOptionByName($name) { return "//*[@id='replacemeasureform_sectorids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    
    public static $MeasuresIDsLabel            = '[for=replacemeasureform-measureids]';
    public static $SectorSelectLabel           = '[for=replacemeasureform-sectorids]';
    public static $SectorErrorHelpBlock        = '#replacemeasureform_sectorids_chosen+.help-block';
    public static $MeasuresIDsHelpBlock        = '#replacemeasureform-measureids+.hint-block';
    public static $MeasuresIDsErrorHelpBlock   = '#replacemeasureform-measureids+.help-block';
}
