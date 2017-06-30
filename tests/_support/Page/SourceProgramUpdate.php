<?php
namespace Page;

class SourceProgramUpdate extends \AcceptanceTester
{
    public static function URL($id)          {  return parent::$URL_UserAccess."/landing-map-program/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $SubdomainSelect        = '#landingmapprogram-subdomain';
    public static $SubdomainOption        = '#landingmapprogram-subdomain option';
    
    public static $TitleField             = '#landingmapprogram-title';
    public static $ContentField           = '#landingmapprogram-content';
    public static $ColorField             = '#landingmapprogram-color';
    
    public static $FileUpload             = '#landingmapprogram-file';
    
    public static $SubdomainSelectLabel   = '[for=landingmapprogram-subdomain]';
    public static $TitleLabel             = '[for=landingmapprogram-title]';
    public static $ContentLabel           = '[for=landingmapprogram-content]';
    public static $ColorLabel             = '[for=landingmapprogram-color]';
    
    public static $FileUploadLabel        = '[for=landingmapprogram-file]';
}
