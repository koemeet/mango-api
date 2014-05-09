<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 10:46
 */

namespace Mango\CoreDomainBundle\Form\Type;


use Doctrine\Bundle\PHPCRBundle\Form\DataTransformer\DocumentToPathTransformer;
use Doctrine\ODM\PHPCR\DocumentManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PhpcrDocumentType
 *
 * @package Mango\CoreDomainBundle\Form
 */
class PhpcrDocumentType extends AbstractType
{
    protected $dm;

    /**
     * @param DocumentManager $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->dm = $documentManager;
    }

    public function buildForm(FormBuilderInterface $formBuilder, array $options)
    {
        $transformer = new DocumentToPathTransformer($this->dm);
        $formBuilder->addModelTransformer($transformer);
    }

    public function getParent()
    {
        return 'choice';
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'mango_phpcr_document';
    }
} 