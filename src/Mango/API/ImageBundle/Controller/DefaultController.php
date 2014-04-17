<?php

namespace Mango\API\ImageBundle\Controller;

use Doctrine\ODM\PHPCR\DocumentManager;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Mango\CoreDomain\Media\ImageProcessor;
use Mango\CoreDomain\Model\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;


/**
 * Class DefaultController
 * @package Mango\API\ImageBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Rest\QueryParam(name="src", description="Image source location")
     * @param Request $request
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return Response
     */
    public function renderAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        if ($image = $request->query->get('image')) {
            /** @var DocumentManager $dm */
            $dm = $this->get('doctrine_phpcr.odm.default_document_manager');

            /** @var Image $image */
            $image = $dm->find('Mango\CoreDomain\Model\Image', $image);

            $image = $image->getContent();

            var_dump(imagecreatefromstring($image));
            die;

            return new Response($image, 200, array("Content-Type" => "image/jpeg"));
            die;
        }
        $processor = new ImageProcessor($paramFetcher->get('src'), $request->query->all());
        $image = $processor->process();

        return new Response($image, 200, array("Content-Type" => "image/jpeg"));
    }
}