<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

$loader = require __DIR__.'/../vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

require __DIR__.'/../mango-library/autoload.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));


return $loader;
