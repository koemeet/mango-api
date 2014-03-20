<?php

use Symfony\Component\Routing\RouteCollection;

$collection = new RouteCollection();
$collection->addCollection(
    $loader->import(__DIR__.'/routing/cmf_media.yml')
);
$collection->addCollection(
    $loader->import(__DIR__.'/routing/liip_imagine.yml')
);

return $collection;
