<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 07/05/14
 * Time: 12:47
 */

namespace Mango\CoreDomainBundle\Repository;


use Mango\CoreDomain\Data\PaginatedResult;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\ModuleRepositoryInterface;

class ModuleRepository extends EntityRepository implements ModuleRepositoryInterface
{
    protected $class = 'Mango\CoreDomain\Model\Module';

    /**
     * Find all records.
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findAll($limit = 10, $offset = 0)
    {
        // TODO: Implement findAll() method.
    }

    /**
     * Find records by certain criteria.
     *
     * @param array $criteria
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0)
    {
        // TODO: Implement findBy() method.
    }

} 