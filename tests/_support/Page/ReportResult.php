<?php
namespace Page;

class ReportResult
{
    public static $Title                     = 'h3';
    public static $ReportDetailsTitle        = 'h4';
    
    public static $BackButton                = "#report-prev-step";
    public static $SaveReportButton          = "[name=save]";
    public static $ExportDataToExcelButton   = 'input[name=export]';
    public static $HowCalculateInfoButton    = '[name=export][value=exportOnlyMeasuresInfo]';
    public static $BackToCreateReportButton  = "form a[href*='/report/configure']";
    
    public static $TableViewTab              = 'ul[role=tablist]>li:first-of-type>a';
    public static $GraphicViewTab            = 'ul[role=tablist]>li:nth-of-type(2)>a';
    
    public static $DateRangeStartLabel       = "//*[@class='company-status']//p[contains(text(), 'DATE RANGE START')]";
    public static $DateRangeEndLabel         = "//*[@class='company-status']//p[contains(text(), 'DATE RANGE END')]";
    public static $StateLabel                = "//*[@class='company-status']//p[contains(text(), 'STATE')]";
    public static $MeasuresLabel             = "//*[@class='company-status']//p[contains(text(), 'MEASURES')]";
    public static $CertifiedBusinessesLabel  = "//*[@class='company-status']//p[contains(text(), 'CERTIFIED BUSINESSES')]";
    
    public static $DateRangeStartInfo        = "//*[@class='company-status'][contains(p/text(), 'DATE RANGE START')]/p[2]";
    public static $DateRangeEndInfo          = "//*[@class='company-status'][contains(p[3]/text(), 'DATE RANGE END')]/p[4]";
    
    public static function StateInfo($row)      { $a = $row + 1; return "//*[@class='company-status'][contains(p/text(), 'STATE')]/p[$a]";}
    public static function MeasuresInfo($row)   { $a = $row + 1; return "//*[@class='company-status'][contains(p/text(), 'MEASURES')]/p[$a]";}
    
    public static function StateInfo_ByName($state)    { return "//*[@class='company-status'][contains(p/text(), 'STATE')]/p[contains(text(), '$state')]";}
    public static function MeasuresInfo_ById($measId)  { return "//*[@class='company-status'][contains(p/text(), 'MEASURES')]/p[contains(text(), '$measId')]";}
    
    public static $CertifiedBusinessesInfo   = "//*[@class='company-status'][contains(p/text(), 'CERTIFIED BUSINESSES')]/p[2]";
    
    public static $AuditGroupsTableTitle     = "#headingOne a";
    public static function AuditGroup_ByName($audGroup)                { return "//*[@id='collapseOne']//div/b[contains(text(), '$audGroup')]";}
    public static function AuditSubGroup_ByName($audGroup, $subGroup)  { return "//*[@id='collapseOne']//div[contains(b/text(), '$audGroup')]/div[contains(text(), '$subGroup')]";}
    
    public static $ProgramsTableTitle        = "#headingTwo a";
    public static function Program_ByName($program)                    { return "//*[@id='collapseTwo']//div[contains(text(), '$program')]";}
    
    //By Savings Area
    public static $MeasureIdHead             = 'table[class*=table] tr>th:first-of-type';
    public static $Head                      = 'table[class*=table] tr>th';
    public static function SavingAreaHead($number)                     { return "//table[contains(@class, 'table')]//tr/th[$number]";}
    public static function SavingAreaHead_ByArea($area)                { return "//table[contains(@class, 'table')]//tr/th[contains(text(), '$area')]";}
    
    public static function MeasureIdLine($measId)                      { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[1]/text(), '$measId')]/td[1]";}
    public static function SavingResultForMeasure($measId, $number)    { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[1]/text(), '$measId')]/td[$number]";}
    
    //By Year/Quater/Month
    public static $SavingAreaHead            = 'table[class*=table] tr>th:first-of-type';
    public static function TimeRangeHead($number)                      { $a = $number + 1; return "//table[contains(@class, 'table')]//tr/th[$a]";}
    public static function TimeRangeHead_ByTimeRangeName($rangeName)   { return "//table[contains(@class, 'table')]//tr/th[contains(text(), '$rangeName')]";}
    
    public static function SavingAreaLine($area)                       { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[1]/text(), '$area')]/td[1]";}
    public static function SavingResultForTimeRange($area, $number)    { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[1]/text(), '$area')]/td[$number]";}
    
    //Graphic tab (By Savings Area report type)
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
    
    //Graphic tab (By Year/Quarter/Month report type)
    public static $ChartView            = '#report_chart';
    public static function SavingAreaInChart($number)                      { return ".chart-legend>div:nth-of-type($number)";}
    public static function SavingAreaInChart_ByArea($area)                 { return ".chart-legend [data-line-key='$area']";}
}
