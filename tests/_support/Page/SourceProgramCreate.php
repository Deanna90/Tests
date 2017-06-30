<?php
namespace Page;

class SourceProgramCreate extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/landing-map-program/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
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
