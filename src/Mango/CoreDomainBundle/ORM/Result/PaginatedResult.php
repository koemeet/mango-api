<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 26/04/14
 * Time: 00:01
 */

namespace Mango\CoreDomainBundle\ORM\Result;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class PaginatedResult
 * @package Mango\CoreDomainBundle\ORM\Result
 */
class PaginatedResult extends \Mango\CoreDomain\Data\PaginatedResult
{
    /**
     * Constructor.
     *
     * @param QueryBuilder $queryBuilder
     */
    public function __construct(QueryBuilder $queryBuilder)
    {
        $paginator = new Paginator($queryBuilder);
        $data = $queryBuilder->getQuery()->getResult();

        parent::__construct($paginator->count(), $queryBuilder->getMaxResults(), $queryBuilder->getFirstResult(), $data);
    }
}