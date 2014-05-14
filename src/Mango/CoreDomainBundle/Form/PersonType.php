<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 14/05/14
 * Time: 12:44
 */

namespace Mango\CoreDomainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PersonType
 *
 * @package Mango\CoreDomainBundle\Form
 */
abstract class PersonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('phone')
            ->add('address')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mango\CoreDomain\Model\Person',
            'csrf_protection' => false
        ));
    }
} 