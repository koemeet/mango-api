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
        // TODO: Create our own form type that uses repositories.
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
            ->add('category', 'phpcr_document', array(
                'class' => 'Mango\CoreDomainBundle\Document\Category',
                'property' => 'name',
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
