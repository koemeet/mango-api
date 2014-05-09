<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 11:28
 */

namespace Mango\CoreDomain\Repository;

/**
 * Interface RepositoryInterface
 *
 * @package Mango\CoreDomain\Repository
 */
interface RepositoryInterface
{
    /**
     * Get the object id of the given model.
     *
     * @param $model
     * @return mixed
     */
    public function getModelIdentifier($model);

    /**
     * Find objects by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find all objects.
     *
     * @return mixed
     */
    public function findAll();
} 