<?php
// This is global bootstrap for autoloading
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_support\Page');
\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_support\Step');
\Codeception\Util\Autoload::registerSuffix('Tester', __DIR__.DIRECTORY_SEPARATOR.'_support');
include_once 'config.php';
