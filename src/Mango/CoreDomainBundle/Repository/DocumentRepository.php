<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 16:59
 */

namespace Mango\CoreDomainBundle\Repository;

use Doctrine\ODM\PHPCR\DocumentManager;

/**
 * Class DocumentRepository
 * @package Mango\CoreDomainBundle\Repository
 */
abstract class DocumentRepository
{
    protected $dm;

    /**
     * @param DocumentManager $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->dm = $documentManager;
    }
} 