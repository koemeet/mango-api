<?php

namespace Mango\CoreDomainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ProductType
 *
 * @package Mango\CoreDomainBundle\Form
 */
class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('workspace', 'entity', array(
                'class' => 'Mango\CoreDomain\Model\Workspace',
                'property' => 'name'
            ))
            ->add('title')
            ->add('description')
            ->add('price')
            ->add('retailPrice')
            ->add('brand')
            ->add('type')
            ->add('stock')
            ->add('category', 'entity', array(
                'class' => 'Mango\CoreDomain\Model\Category',
                'property' => 'name'
            ))
            ->add('tags', 'collection')
            ->add('images', 'collection')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mango\CoreDomain\Model\Product',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'product';
    }
}
