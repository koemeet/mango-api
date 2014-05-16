<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Dependencies
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),
            new FOS\OAuthServerBundle\FOSOAuthServerBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Problematic\AclManagerBundle\ProblematicAclManagerBundle(),
            new Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            // Doctrine PHPCR
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
            //new Netvlies\Bundle\DoctrineBridgeBundle\NetvliesDoctrineBridgeBundle(),

            new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
//            new \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),

            // Serializer
            new Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),

            // ===================== MANGO ======================= //

            // Core Bundles
            new Mango\CoreDomainBundle\MangoCoreDomainBundle(),

            // Load API related bundles
            new Mango\API\DocsBundle\MangoAPIDocsBundle(),
            new Mango\API\RestBundle\MangoAPIRestBundle(),
            new Mango\API\SecurityBundle\MangoAPISecurityBundle(),
            new Mango\API\ImageBundle\MangoAPIImageBundle()
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
