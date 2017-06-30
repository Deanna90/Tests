<?php
namespace Page;

class MainMenu
{
    public static $MenuItem               = '.nav-pills>li>a';
    public static function selectMenuItem($number)              { return ".nav-pills>li:nth-of-type($number)>a";}
    public static function selectMenuItemByName($name)          { return "//*[@class='nav-pills navbar-default nav']/li/a[contains(text(), '$name')]";}
    public static function selectMenuItemOptionByOptionName($item, $option)   { return "//*[@class='nav-pills navbar-default nav']/li[contains(a/text(), '$item')]//ul/li/a[text()='$option']";}
    
    public static $StateSelect            = '.navbar-default>li:last-of-type';
    public static $SelectedStateOption    = '.navbar-default>li:last-of-type a>span';
    public static $StateOption            = '.navbar-default>li:last-of-type ul>li';

    public static function selectStateOption($number)           { return ".navbar-default>li:last-of-type ul>li:nth-of-type($number)>a";}
    public static function selectStateOptionByName($stateName)  { return "//*[@class='nav-pills navbar-default nav']/li[last()]/ul/li/a[text()='$stateName']";}
}
