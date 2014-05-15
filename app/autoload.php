<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

require __DIR__ . '/../libs/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
AnnotationRegistry::registerFile(__DIR__.'/../vendor/netvlies/doctrinebridgebundle/Netvlies/Bundle/DoctrineBridgeBundle/Mapping/Annotations/DoctrineAnnotations.php');

return $loader;
