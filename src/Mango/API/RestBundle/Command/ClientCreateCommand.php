<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 12/03/14
 * Time: 10:39
 */

namespace Mango\API\RestBundle\Command;

use FOS\OAuthServerBundle\Entity\Client;
use FOS\OAuthServerBundle\Entity\ClientManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ClientCreateCommand
 * @package Mango\API\RestBundle\Command
 */
class ClientCreateCommand extends ContainerAwareCommand
{
    protected function configure ()
    {
        $this
            ->setName('mango_api:oauth:client:create')
            ->setDescription('Creates a new client')
            ->addOption('redirect-uri', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Sets the redirect uri. Use multiple times to set multiple uris.', null)
            ->addOption('grant-type', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Set allowed grant type. Use multiple times to set multiple grant types',
                array('client_credentials'))
        ;
    }

    protected function execute (InputInterface $input, OutputInterface $output)
    {
        /** @var DialogHelper $dialog */
        $dialog = $this->getHelperSet()->get('dialog');

        $clientCredentials  = $dialog->askConfirmation($output, "Allow client credentials [yes]? ", true);
        $userCredentials    = $dialog->askConfirmation($output, "Allow user credentials [yes]? ", true);
        $refreshToken       = $dialog->askConfirmation($output, "Allow refresh token [yes]?", true);

        $conf = $dialog->askConfirmation($output, "Are you sure you want to create a new client [yes]? ", true);

        if (!$conf) {
            return;
        }

        $grantTypes = array();

        if ($clientCredentials) {
            $grantTypes[] = "client_credentials";
        }

        if ($userCredentials) {
            $grantTypes[] = "password";
        }

        if ($refreshToken) {
            $grantTypes[] = "refresh_token";
        }

        $grantTypes = array_replace($input->getOption('grant-type'), $grantTypes);

        /** @var ClientManager $clientManager */
        $clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');

        /** @var Client $client */
        $client = $clientManager->createClient();
        $client->setRedirectUris($input->getOption('redirect-uri'));
        $client->setAllowedGrantTypes($grantTypes);
        $clientManager->updateClient($client);

        $output->writeln("Added a new client.");
        $output->writeln(sprintf('client_id: <info>%s</info>', $client->getPublicId()));
        $output->writeln(sprintf("client_secret: <info>%s</info>", $client->getSecret()));
    }
} 