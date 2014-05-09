<?php
namespace Mango\CoreDomainBundle\Repository;

use Mango\CoreDomain\Data\PaginatedResult;
use Mango\CoreDomain\Model\Workspace;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\ProductRepositoryInterface;
use Mango\CoreDomainBundle\Document\Product;
use PHPCR\Util\NodeHelper;
use PHPCR\Util\UUIDHelper;

/**
 * Class ProductRepository
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class ProductRepository extends DocumentRepository implements ProductRepositoryInterface
{
    protected $class = 'Mango\CoreDomainBundle\Document\Product';

    /**
     * Create a new product object.
     *
     * @return Product
     */
    public function createProduct()
    {
        return new Product();
    }

    /**
     * Add product.
     *
     * @param mixed $product
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function add($product)
    {
        if (!$product instanceof Product) {
            throw new \InvalidArgumentException("product is not the correct type");
        }

        $workspaceId = $product->getWorkspace()->getId();
        $rootPath = '/workspaces/' . $workspaceId . '/products';

        // Make sure the rootPath is available in the content repository
        $session = $this->dm->getPhpcrSession();
        NodeHelper::createPath($session, $rootPath);
        $session->save();

        $parent = $this->dm->find(null, $rootPath);
        $product->setParent($parent);

        $this->dm->persist($product);
        $this->dm->flush($product);
    }


    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
    }

    /**
     * Find all records.
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findAll($limit = 10, $offset = 0)
    {
        $products = $this->dm->getRepository($this->class)->findAll();
        return $this->normalizeArray($products);
    }

    /**
     * Find records by certain criteria.
     *
     * @param array $criteria
     * @param int   $limit
     * @param int   $offset
     * @return mixed
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0)
    {
        // TODO: Implement findBy() method.
    }

    /**
     * Find records with the provided Query context.
     *
     * @param $query
     * @return PaginatedResult
     */
    public function findByQuery(Query $query)
    {
        // TODO: Implement findByQuery() method.
    }

    /**
     * Find products by workspace.
     *
     * @param Workspace $workspace
     * @param Query     $query
     * @return mixed
     */
    public function findByWorkspace(Workspace $workspace, Query $query = null)
    {
        $qb = $this->dm->getRepository($this->class)->createQueryBuilder('product');
        return $qb->getQuery()->execute();
    }

    /**
     * Make sure the neccessary nodes exist.
     */
    private function createNodesIfNotExists()
    {
        $session = $this->dm->getPhpcrSession();
        NodeHelper::createPath($session, '/workspaces/123/products');
        $session->save();
    }
}