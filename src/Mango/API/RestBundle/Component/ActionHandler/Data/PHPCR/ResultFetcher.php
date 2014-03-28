<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 14:45
 */

namespace Mango\API\RestBundle\Component\ActionHandler\Data\PHPCR;


use Doctrine\ODM\PHPCR\DocumentManager;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;

/**
 * Class ResultFetcher
 * @package Mango\API\RestBundle\Component\ActionHandler\Data\PHPCR
 */
class ResultFetcher implements ResultFetcherInterface
{
    protected $dm;

    /**
     * @param DocumentManager $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->dm = $documentManager;
    }

    /**
     * Find documents by class and Query
     *
     * @param $entity
     * @param Query $query
     * @return array
     */
    public function find($entity, Query $query)
    {
        $qb = $this->dm->createQueryBuilder();
        $qb->fromDocument($entity, 'd');

        $firstResult = ($query->getPage() - 1) * $query->getLimit();
        $qb->setFirstResult($firstResult);
        $qb->setMaxResults($query->getLimit());

        return $qb->getQuery()->getResult();
    }

    public function findOne($entity, $identifier)
    {
        // TODO: Implement findOne() method.
    }

} 