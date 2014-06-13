<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/05/14
 * Time: 20:19
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use Mango\CoreDomainBundle\Service\ImageService;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Mango\CoreDomain\Repository\ImageRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ImagesController
 *
 * @package Mango\API\RestBundle\Controller
 */
class ImagesController extends RestController
{
    /**
     * @var ImageService
     */
    protected $imageService;

    /**
     * @var ImageRepositoryInterface
     */
    protected $imageRepository;

    public function init()
    {
        $this->imageService = $this->get('mango_core_domain.image_service');
        $this->imageRepository = $this->get('mango_core_domain.image_repository');
    }

    /**
     * Get all images
     *
     * @ApiDoc(
     *  section = "Images"
     * )
     * @param ParamFetcher $paramFetcher
     */
    public function getImagesAction(ParamFetcher $paramFetcher)
    {
        // TODO: Implement this shit
    }

    /**
     * Get image by id.
     *
     * @ApiDoc(
     *  section = "Images"
     * )
     * @param $id
     * @return array
     */
    public function getImageAction($id)
    {
        return array(
            'images' => $this->imageRepository->find($id)
        );
    }

    /**
     * Create a new image
     *
     * @ApiDoc(
     *  section = "Images"
     * )
     * @param Request $request
     * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\FormInterface
     */
    public function postImagesAction(Request $request)
    {
        $form = $this->imageService->create($request);
        if ($form->isValid()) {
            return $this->createCreatedView($form, 'get_image');
        }
        return $form;
    }

    /**
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     */
    public function newImagesAction(Request $request)
    {
        return $this->generateNewView($this->postImagesAction($request), 'post_images');
    }
}