<?php

namespace Mango\CoreDomainBundle\Form;

use Doctrine\Bundle\PHPCRBundle\Form\DataTransformer\DocumentToPathTransformer;
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
            ->add('workspace', 'mango_repository', array(
                'service_id' => 'mango_core_domain.workspace_repository'
            ))
            ->add('productType')
            ->add('title')
            ->add('description')
            ->add('price')
            ->add('retailPrice')
            ->add('brand')
            ->add('type')
            ->add('stock')
            ->add('category', 'mango_repository', array(
                'service_id' => 'mango_core_domain.category_repository'
            ))
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
