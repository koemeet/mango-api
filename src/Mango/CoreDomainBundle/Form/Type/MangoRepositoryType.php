<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 11:18
 */

namespace Mango\CoreDomainBundle\Form\Type;

use Mango\CoreDomain\Repository\RepositoryInterface;
use Mango\CoreDomainBundle\Form\DataTransformer\ModelToIdentifierTransformer;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class MangoRepositoryType
 *
 * @package Mango\CoreDomainBundle\Form\Type
 */
class MangoRepositoryType extends AbstractType
{
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $formBuilder, array $options)
    {
        parent::buildForm($formBuilder, $options);

        /** @var RepositoryInterface $repository */
        $repository = $this->container->get($options['service_id']);
        $formBuilder->addModelTransformer(new ModelToIdentifierTransformer($repository));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array('service_id'));
    }

    public function getParent()
    {
        return 'text';
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'mango_repository';
    }
} 