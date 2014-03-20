<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 20/03/14
 * Time: 10:49
 */

namespace Mango\API\DomainBundle\Form;

/**
 * Class RouteType
 * @package Mango\API\DomainBundle\Form
 */
class RouteType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('path')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Symfony\Component\Routing\Route',
            'csrf_protection'   => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }
} 