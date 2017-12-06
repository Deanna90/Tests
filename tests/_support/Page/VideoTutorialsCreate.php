<?php
namespace Page;

class VideoTutorialsCreate extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/video/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $CategorySelect         = '#video-category_id';
    public static $CategoryOption         = '#video-category_id option';
    
    public static $StateSelect            = '#video_states_list_chosen';
    public static $StateOption            = '#video_states_list_chosen ul>li';
    public static function selectStateOption($number)    { return "#video_states_list_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectStateByName($name)      { return "//*[@id='video_states_list_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedStateOption($number)  { return "#video_states_list_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedStateByName($name)    { return "//*[@id='video_states_list_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    
    public static $UserTypesSelect        = '#video_user_types_chosen';
    public static $UserTypesOption        = '#video_user_types_chosen ul>li';
    public static function selectUserTypesOption($number)    { return "#video_user_types_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectUserTypesByName($name)      { return "//*[@id='video_user_types_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedUserTypesOption($number)  { return "#video_user_types_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedUserTypesByName($name)    { return "//*[@id='video_user_types_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}

    
    public static $TitleField             = '#video-title';
    public static $DescriptionField       = '#video-description';
    
    public static $VideoFileUpload        = '#video-video_file';
    
    public static $CategorySelectLabel    = '[for=video-category_id]';
    public static $StateSelectLabel       = '[for=video-states_list]';
    public static $UserTypesSelectLabel   = '[for=video-user_types]';
    public static $TitleLabel             = '[for=video-title]';
    public static $DescriptionLabel       = '[for=video-description]';
    
    public static $VideoFileUploadLabel   = '[for=video-video_file]';

}
