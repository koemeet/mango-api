<?php

namespace Mango\CoreDomainBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class EmployeeType
 *
 * @package Mango\CoreDomainBundle\Form
 */
class EmployeeType extends PersonType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('user')
            ->add('company', 'entity', array(
                'class' => 'MangoCoreDomain:Company',
                'property' => 'name'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mango\CoreDomain\Model\Employee',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'employee';
    }
}
