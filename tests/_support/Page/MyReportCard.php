<?php
namespace Page;

class MyReportCard
{
    public static $URL_ReportTab            = '/user/report/index';
    public static $URL_VisualScoreboardTab  = '/user/report/visual';
    
    public static $ReportTab                = 'table.version-history tr.dark-green>td:nth-of-type(1)';
    public static $VisualScoreboardTab      = 'table.version-history tr.dark-green>td:nth-of-type(1)';
    
    //Report tab page
    public static $ProgramHead_InfoTable                = 'table.version-history tr.dark-green>td:nth-of-type(1)';
    public static $SectorHead_InfoTable                 = 'table.version-history tr.dark-green>td:nth-of-type(2)';
    public static $EnrollmentDayHead_InfoTable          = 'table.version-history tr.dark-green>td:nth-of-type(3)';
    
    public static function ProgramLine($row)            { return "//table[contains(@class, 'version-history')][contains(thead/tr/@class, 'dark-green')]/tbody/tr[$row]/td[1]";}
    public static function SectorLine($row)             { return "//table[contains(@class, 'version-history')][contains(thead/tr/@class, 'dark-green')]/tbody/tr[$row]/td[2]";}
    public static function EnrollmentDayLine($row)      { return "//table[contains(@class, 'version-history')][contains(thead/tr/@class, 'dark-green')]/tbody/tr[$row]/td[3]";}
    
    public static $ResourceHead_ReportTable             = 'table.version-history tr.liter-green>td:nth-of-type(1)';
    public static $PerYearHead_ReportTable              = 'table.version-history tr.liter-green>td:nth-of-type(2)';
    public static $SinceEnrollmentHead_ReportTable      = 'table.version-history tr.liter-green>td:nth-of-type(3)';
    public static $TotalCostSavingsHead_ReportTable     = 'table.version-history tr.liter-green>td:nth-of-type(4)';
    
    public static function SavingAreaLine($area)        { return "//table[contains(@class, 'version-history')]//tbody/tr/td[1]/p/strong[contains(text(), '$area')]";}
    public static function PerYearLine($area)           { return "//table[contains(@class, 'version-history')]//tbody/tr[contains(td[1]/p/strong/text(), '$area')]/td[2]/p";}
    public static function SinceEnrollmentLine($area)   { return "//table[contains(@class, 'version-history')]//tbody/tr[contains(td[1]/p/strong/text(), '$area')]/td[3]/p";}
    public static function TotalCostSavingsLine($area)  { return "//table[contains(@class, 'version-history')]//tbody/tr[contains(td[1]/p/strong/text(), '$area')]/td[4]/p";}
    
    public static $Row_ReportTable                      = "//table[contains(@class, 'version-history')][contains(thead/tr/@class, 'liter-green')]/tbody/tr/td[1]";
    
    //Visual Scoreboard tab page
    public static $EnergySavedBlock                     = '.saving-area-energy-saved';
    public static $FuelSavedBlock                       = '.saving-area-fuel-saved';
    public static $ThermsBlock                          = '.saving-area-therms';
    public static $GreenhouseGasEmissionsSavedBlock     = '.saving-area-greenhouse-gas-emissions-saved';
    public static $SolidWasteDivertedBlock              = '.saving-area-solid-waste-diverted';
    public static $WaterSavedBlock                      = '.saving-area-water-saved';
    public static $HazardousWasteReducedBlock           = '.saving-area-hazardous-waste-reduced';
    public static $MercuryReducedBlock                  = '.saving-area-mercury-reduced';
    public static $GreaseRecycledBlock                  = '.saving-area-grease-recycled';
    public static $VocBlock                             = '.saving-area-voc';
    
    public static $EnergySavedBlock_Title                      = '.saving-area-energy-saved h4';
    public static $FuelSavedBlock_Title                        = '.saving-area-fuel-saved h4';
    public static $ThermsBlock_Title                           = '.saving-area-therms h4';
    public static $GreenhouseGasEmissionsSavedBlock_Title      = '.saving-area-greenhouse-gas-emissions-saved h4';
    public static $SolidWasteDivertedBlock_Title               = '.saving-area-solid-waste-diverted h4';
    public static $WaterSavedBlock_Title                       = '.saving-area-water-saved h4';
    public static $HazardousWasteReducedBlock_Title            = '.saving-area-hazardous-waste-reduced h4';
    public static $MercuryReducedBlock_Title                   = '.saving-area-mercury-reduced h4';
    public static $GreaseRecycledBlock_Title                   = '.saving-area-grease-recycled h4';
    public static $VocBlock_Title                              = '.saving-area-voc h4';
    
    public static $EnergySavedBlock_SavedValue                 = '.saving-area-energy-saved>p>strong:nth-of-type(1)>span';
    public static $EnergySavedBlock_SavedMoney                 = '.saving-area-energy-saved>p>strong:nth-of-type(2)>span';
    
    public static $FuelSavedBlock_SavedValue                   = '.saving-area-fuel-saved>p>strong:nth-of-type(1)>span';
    public static $FuelSavedBlock_SavedMoney                   = '.saving-area-fuel-saved>p>strong:nth-of-type(2)>span';
    
    public static $ThermsBlock_SavedValue                      = '.saving-area-therms>p>strong:nth-of-type(1)>span';
    public static $ThermsBlock_SavedMoney                      = '.saving-area-therms>p>strong:nth-of-type(2)>span';
    
    public static $GreenhouseGasEmissionsSavedBlock_SavedValue = '.saving-area-greenhouse-gas-emissions-saved>p>strong:nth-of-type(1)>span';
    public static $GreenhouseGasEmissionsSavedBlock_SavedMoney = '.saving-area-greenhouse-gas-emissions-saved>p>strong:nth-of-type(2)>span';
    
    public static $SolidWasteDivertedBlock_SavedValue          = '.saving-area-solid-waste-diverted>p>strong:nth-of-type(1)>span';
    public static $SolidWasteDivertedBlock_SavedMoney          = '.saving-area-solid-waste-diverted>p>strong:nth-of-type(2)>span';
    
    public static $WaterSavedBlock_SavedValue                  = '.saving-area-water-saved>p>strong:nth-of-type(1)>span';
    public static $WaterSavedBlock_SavedMoney                  = '.saving-area-water-saved>p>strong:nth-of-type(2)>span';
    
    public static $HazardousWasteReducedBlock_SavedValue       = '.saving-area-hazardous-waste-reduced>p>strong:nth-of-type(1)>span';
    public static $HazardousWasteReducedBlock_SavedMoney       = '.saving-area-hazardous-waste-reduced>p>strong:nth-of-type(2)>span';
    
    public static $MercuryReducedBlock_SavedValue              = '.saving-area-mercury-reduced>p>strong:nth-of-type(1)>span';
    public static $MercuryReducedBlock_SavedMoney              = '.saving-area-mercury-reduced>p>strong:nth-of-type(2)>span';
    
    public static $GreaseRecycledBlock_SavedValue              = '.saving-area-grease-recycled>p>strong:nth-of-type(1)>span';
    public static $GreaseRecycledBlock_SavedMoney              = '.saving-area-grease-recycled>p>strong:nth-of-type(2)>span';
    
    public static $VocBlock_SavedValue                         = '.saving-area-voc>p>strong:nth-of-type(1)>span';
    public static $VocBlock_SavedMoney                         = '.saving-area-voc>p>strong:nth-of-type(2)>span';
    
    public static function SavingAreaBlock($area)  { 
        $str = strtolower($area);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str = trim($str, "-");
        return ".saving-area-$str";
    }
    
    public static function SavingAreaBlock_Title($area)  { 
        $str = strtolower($area);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str = trim($str, "-");
        return ".saving-area-$str h4";
    }
    
    public static function SavingAreaBlock_SavedValue($area)  { 
        $str = strtolower($area);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str = trim($str, "-");
        return ".saving-area-$str>p>strong:nth-of-type(1)>span";
    }
    
    public static function SavingAreaBlock_SavedMoney($area)  { 
        $str = strtolower($area);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str = trim($str, "-");
        return ".saving-area-$str>p>strong:nth-of-type(2)>span";
    }
}
