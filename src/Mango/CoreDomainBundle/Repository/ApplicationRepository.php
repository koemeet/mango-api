<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 16:43
 */

namespace Mango\CoreDomainBundle\Repository;

use Doctrine\ODM\PHPCR\DocumentManager;
use Doctrine\ORM\EntityManager;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Mango\CoreDomainBundle\ORM\Result\PaginatedResult;
use PHPCR\Util\NodeHelper;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class ApplicationRepository
 *
 * Provides functionality to add, update or remove applications. Also you can query this repository
 * to find specific applications.
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class ApplicationRepository extends EntityRepository implements ApplicationRepositoryInterface
{
    protected $class = 'Mango\CoreDomain\Model\Application';

    /**
     * @var DocumentManager
     */
    protected $dm;

    /**
     * @param EntityManager $entityManager
     * @param \Doctrine\ODM\PHPCR\DocumentManager $documentManager
     */
    public function __construct(EntityManager $entityManager, DocumentManager $documentManager)
    {
        parent::__construct($entityManager);
        $this->dm = $documentManager;
    }

    /**
     * Get the object id of the given model.
     *
     * @param $model
     * @return mixed
     */
    public function getModelIdentifier($model)
    {
        return $this->em->getUnitOfWork()->getEntityIdentifier($model);
    }

    /**
     * @return Application
     */
    public function createApplication()
    {
        return new $this->class;
    }

    /**
     * Add an Application.
     *
     * When we add an application, we create PHPCR nodes for it, so we can store its content in it.
     *
     * @param Application $application
     * @return bool
     */
    public function add(Application $application)
    {
        $this->em->persist($application);
        $this->em->flush();

        $session = $this->dm->getPhpcrSession();
        $root = 'applications/' . $application->getId();

        // Create PHPCR nodes
        foreach (array('routes', 'content', 'menu') as $node) {
            $path = $root . '/' . $node;
            NodeHelper::createPath($session, $path);
        }

        $session->save();
    }

    /**
     * Removes the given Application.
     *
     * @param Application $application
     * @return bool
     */
    public function remove(Application $application)
    {
        $this->em->remove($application);
        $this->em->flush();
    }

    /**
     * @param $id
     * @return object
     */
    public function find($id)
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    /**
     * @param array $criteria
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0)
    {
        $qb = $this->getQueryBuilder($this->class);
        $qb->setMaxResults($limit);
        $qb->setFirstResult($offset);

        foreach ($criteria as $field => $value) {
            $param = $field;
            $qb->andWhere(sprintf('t.%s = :%s', $field, $param))->setParameter($param, $value);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findAll($limit = 10, $offset = 0)
    {
        return $this->findBy(array(), $limit, $offset);
    }

    /**
     * Find applications by user.
     *
     * @param User  $user
     * @param Query $query
     * @return mixed
     */
    public function findByUser(User $user, Query $query)
    {
        $qb = $this->getQueryBuilder($this->class, $query);
        $qb->join('Mango\CoreDomain\Model\UserApplication', 'ua', 'WITH', 'ua.user = :user')
            ->setParameter('user', $user);

        return $qb->getQuery()->getResult();

        //$qb->join('t.
    }
} 