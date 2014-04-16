<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 19:12
 */

namespace Mango\CoreDomainBundle\Command;


use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ApplicationCreateCommand extends ContainerAwareCommand
{
    protected $types = array('website', 'iphone', 'android');

    protected function configure ()
    {
        $this
            ->setName('mango:application:create')
            ->setDescription('Create a new application')
            ->setHelp('Use this command to create new applications.')
            ->addOption('redirect-uri', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Sets the redirect uri. Use multiple times to set multiple uris.', null)
            ->addOption('grant-type', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Set allowed grant type. Use multiple times to set multiple grant types',
                array('client_credentials'))
        ;
    }

    protected function execute (InputInterface $input, OutputInterface $output)
    {
        /** @var DialogHelper $dialog */
        $dialog = $this->getHelperSet()->get('dialog');

        $name = $dialog->ask($output, "Name of the application: ");

        $type = $dialog->askAndValidate($output, "Type of application (website, iphone, android): ", function($value) {
            if (!in_array($value, $this->types)) {
                throw new \RuntimeException("Application type is invalid");
            }
            return $value;
        }, false, null, $this->types);

        $container = $this->getContainer();

        /** @var $repository ApplicationRepositoryInterface $em */
        $repository = $container->get('mango_core_domain.application_repository');

        $application = $repository->createApplication();
        $application->setName($name);
        $application->setCreatedOn(new \DateTime());

        // Add application to our database
        $repository->add($application);

        $output->writeln(sprintf('Application ID: <info>%s</info>', $application->getId()));
    }
} 