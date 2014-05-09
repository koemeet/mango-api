<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 15:27
 */

namespace Mango\CoreDomainBundle\Repository;

use Mango\CoreDomainBundle\Document\ShopProduct;
use Mango\CoreDomain\Repository\ShopproductRepositoryInterface;
use PHPCR\Util\NodeHelper;

/**
 * Class ShopproductRepository
 *
 * Can find and persist shopproduct objects inside PHPCR.
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class ShopproductRepository extends DocumentRepository implements ShopproductRepositoryInterface
{
    protected $class = 'Mango\CoreDomainBundle\Document\ShopProduct';

    /**
     * Get the object id of the given model.
     *
     * @param $model
     * @return mixed
     */
    public function getModelIdentifier($model)
    {
        return $this->dm->getUnitOfWork()->getDocumentId($model);
    }

    /**
     * Find objects by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->dm->getRepository($this->class)->find($id);
    }

    /**
     * Find all objects.
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->dm->getRepository($this->class)->findAll();
    }

    /**
     * Create a new shop product.
     *
     * @return ShopProduct
     */
    public function createShopproduct()
    {
        return new ShopProduct();
    }

    /**
     * Add a shop product to the repository.
     *
     * @param $shopproduct
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function add($shopproduct)
    {
        if (!$shopproduct instanceof ShopProduct) {
            throw new \InvalidArgumentException(sprintf('First argument is not of the correct type, type %s given.', get_class($shopproduct)));
        }

        $session = $this->dm->getPhpcrSession();
        $rootPath = '/applications/' . $shopproduct->getApplication()->getId() . '/shop/products';
        NodeHelper::createPath($session, $rootPath);

        $shopproduct->setParent($this->dm->find(null, $rootPath));

        $this->dm->persist($shopproduct);
        $this->dm->flush($shopproduct);
    }
} 