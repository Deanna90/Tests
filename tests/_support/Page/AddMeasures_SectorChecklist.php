<?php
namespace Page;

class AddMeasures_SectorChecklist extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/checklist/add-measures';}
    public static $Title                  = 'h1';
    
    public static $AddButton              = '[type=submit][class*=btn-primary]';
    
    public static $MeasuresIDsField               = '#replacemeasureform-measureids';
    
    public static $SectorSelect                   = '#replacemeasureform_sectorids_chosen';
    public static $SelectedSectorOption           = '#replacemeasureform_sectorids_chosen a>span';
    public static $SectorOption                   = '#replacemeasureform_sectorids_chosen ul>li';
    
    public static function selectSectorOption($number)       { return "#replacemeasureform_sectorids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectSectorOptionByName($name)   { return "//*[@id='replacemeasureform_sectorids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedSectorOption($number)     { return "#preplacemeasureform_sectorids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedSectorOptionByName($name) { return "//*[@id='replacemeasureform_sectorids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    
    public static $TierNumberSelect               = '#replacemeasureform-number';
    public static $SelectedTierNumberOption       = '#replacemeasureform-number [selected]';
    public static $TierNumberOption               = '#replacemeasureform-number option';
   
    public static $MeasureExtensionSelect         = '#replacemeasureform-measureextension';
    public static $SelectedMeasureExtensionOption = '#replacemeasureform-measureextension [selected]';
    public static $MeasureExtensionOption         = '#replacemeasureform-measureextension option';
    
    public static $TypeSelect            = '#replacemeasureform-type';
    public static $SelectedTypeOption    = '#replacemeasureform-type [selected]';
    public static $TypeOption            = '#replacemeasureform-type option';
    
    public static $MeasuresIDsLabel            = '[for=replacemeasureform-measureids]';
    public static $SectorSelectLabel           = '[for=replacemeasureform-sectorids]';
    public static $TierNumberSelectLabel       = '[for=replacemeasureform-number]';
    public static $MeasureExtensionSelectLabel = '[for=replacemeasureform-measureextension]';
    public static $TypeSelectLabel             = '[for=replacemeasureform-type]';
    public static $SectorErrorHelpBlock        = '#replacemeasureform_sectorids_chosen+.help-block';
    public static $MeasuresIDsHelpBlock        = '#replacemeasureform-measureids+.hint-block';
    public static $MeasuresIDsErrorHelpBlock   = '#replacemeasureform-measureids+.help-block';
}
