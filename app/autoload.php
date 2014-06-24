<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

$mainLoader = require __DIR__.'/../vendor/autoload.php';
AnnotationRegistry::registerLoader(array($mainLoader, 'loadClass'));

$libraryLoader = require __DIR__.'/../mango-library/autoload.php';
AnnotationRegistry::registerLoader(array($libraryLoader, 'loadClass'));

return $mainLoader;
