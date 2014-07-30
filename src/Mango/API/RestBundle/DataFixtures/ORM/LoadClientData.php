<?php
/*
 * This file is part of the Mango package.
 *
 * (c) Steffen Brem <steffenbrem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mango\API\RestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use FOS\OAuthServerBundle\Entity\ClientManager;
use FOS\OAuthServerBundle\Model\ClientInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * @author Steffen Brem <steffenbrem@gmail.com>
 */
class LoadClientData extends ContainerAware implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /** @var ClientManager $clientManager */
        $clientManager = $this->container->get('fos_oauth_server.client_manager.default');

        /** @var ClientInterface $client */
        $client = $clientManager->createClient();
        $client->setAllowedGrantTypes(array('client_credentials', 'password', 'refresh_token'));
        $client->setRandomId('dev');
        $client->setSecret('dev');

        $refl = new \ReflectionObject($client);
        $property = $refl->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($client, 1);

        $metadata = $this->container->get('doctrine.orm.entity_manager')->getClassMetaData(get_class($client));
        $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $clientManager->updateClient($client);
    }
} 