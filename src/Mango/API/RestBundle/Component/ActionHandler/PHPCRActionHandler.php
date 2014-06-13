<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 16:08
 */

namespace Mango\API\RestBundle\Component\ActionHandler;


use FOS\RestBundle\Request\ParamFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\ParamQueryExtractor;
use Symfony\Component\Form\FormTypeInterface;

/**
 * Class PHPCRActionHandler
 * @package Mango\API\RestBundle\Component\ActionHandler
 */
class PHPCRActionHandler implements ActionHandlerInterface
{
    protected $resultFetcher;
    protected $queryExtractor;

    /**
     * @param ResultFetcherInterface $resultFetcher
     */
    public function __construct(ResultFetcherInterface $resultFetcher)
    {
        $this->resultFetcher = $resultFetcher;
        $this->queryExtractor = new ParamQueryExtractor();
    }

    /**
     * @param $entity
     * @param ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function find($entity, ParamFetcherInterface $paramFetcher = null)
    {
        $query = $this->queryExtractor->extract($paramFetcher);
        return $this->resultFetcher->find($entity, $query);
    }

    /**
     * @param $entity
     * @param array $identifier
     * @return mixed
     */
    public function findOne($entity, $identifier = null)
    {
        // TODO: Implement findOne() method.
    }

    /**
     * @param FormTypeInterface $formType
     * @param $entity
     * @param bool $persist
     * @return FormInterface
     */
    public function update(FormTypeInterface $formType, $entity, $persist = true)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param FormTypeInterface $formType
     * @param $entity
     * @param bool $persist
     * @return FormInterface
     */
    public function insert(FormTypeInterface $formType, $entity, $persist = true)
    {
        // TODO: Implement insert() method.
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

} 