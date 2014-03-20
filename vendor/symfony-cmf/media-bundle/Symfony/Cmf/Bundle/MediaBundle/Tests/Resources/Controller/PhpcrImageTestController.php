<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Tests\Resources\Controller;

use Doctrine\ODM\PHPCR\Document\Generic;
use PHPCR\Util\PathHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Cmf\Bundle\MediaBundle\File\UploadFileHelperInterface;
use Symfony\Cmf\Bundle\MediaBundle\Tests\Resources\Document\Content;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PhpcrImageTestController extends Controller
{
    protected function getUploadForm($type = null)
    {
        return $this->container->get('form.factory')->createNamedBuilder(null, 'form')
            ->add('image', 'file')
            ->getForm()
        ;
    }

    protected function getContentForm(Content $contentObject = null, array $imageOptions = array())
    {
        if (is_null($contentObject)) {
            $contentObject = new Content();
        }

        return $this->createFormBuilder($contentObject)
            ->add('name')
            ->add('title')
            ->add('image', 'cmf_media_image', array_merge(array('required' => false), $imageOptions))
            ->getForm()
        ;
    }

    protected function getUrlSafePath($object)
    {
        return ltrim($object->getId(), '/');
    }

    protected function mapUrlSafePathToId($path)
    {
        // The path is being the id
        return PathHelper::absolutizePath($path, '/');
    }

    public function indexAction(Request $request)
    {
        $dm = $this->get('doctrine_phpcr')->getManager('default');

        // get image(s)
        $imageClass = 'Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image';
        $images     = $dm->getRepository($imageClass)->findAll();

        // get content with image object
        $contentClass  = 'Symfony\Cmf\Bundle\MediaBundle\Tests\Resources\Document\Content';
        $contentObject = $dm->getRepository($contentClass)->findOneBy(array());

        $uploadForm = $this->getUploadForm();
        $editorUploadForm = $this->getUploadForm();

        // Form - content object with image embedded
        $newContentForm = $this->getContentForm(null, array('required' => true));
        $contentForm = $this->getContentForm($contentObject, array('imagine_filter' => false));
        $contentFormImagine = $this->getContentForm($contentObject);

        // action url
        if ($contentObject) {
            $contentFormEditAction = $this->generateUrl('phpcr_image_test_content_edit', array(
                'path' => $this->getUrlSafePath($contentObject),
            ));
        } else {
            $contentFormEditAction = false;
        }

        return $this->render('::tests/image.html.twig', array(
            'upload_form'              => $uploadForm->createView(),
            'editor_form'              => $editorUploadForm->createView(),
            'content_form_new'         => $newContentForm->createView(),
            'content_form'             => $contentForm->createView(),
            'content_form_imagine'     => $contentFormImagine->createView(),
            'content_form_edit_action' => $contentFormEditAction,
            'images'                   => $images,
        ));
    }

    public function uploadAction(Request $request)
    {
        $form = $this->getUploadForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                /** @var UploadFileHelperInterface $uploadFileHelper */
                $uploadImageHelper = $this->get('cmf_media.upload_image_helper');

                $uploadedFile = $request->files->get('image');

                $image = $uploadImageHelper->handleUploadedFile($uploadedFile);

                // persist
                $dm = $this->get('doctrine_phpcr')->getManager('default');
                $dm->persist($image);
                $dm->flush();
            }
        }

        return $this->redirect($this->generateUrl('phpcr_image_test'));
    }

    public function newAction(Request $request)
    {
        $dm = $this->get('doctrine_phpcr')->getManager('default');
        $contentRoot = $dm->find(null, '/test/content');

        if (!$contentRoot) {
            $root = $dm->find(null, '/test');
            $contentRoot = new Generic();
            $contentRoot->setNodename('content');
            $contentRoot->setParent($root);
            $dm->persist($contentRoot);
        }

        $contentObject = new Content();
        $contentObject->setParent($contentRoot);

        $form = $this->getContentForm($contentObject);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                // persist
                $dm = $this->get('doctrine_phpcr')->getManager('default');
                $dm->persist($contentObject);
                $dm->flush();
            }
        }

        return $this->redirect($this->generateUrl('phpcr_image_test'));
    }

    public function editAction(Request $request, $path)
    {
        $dm = $this->get('doctrine_phpcr')->getManager('default');

        $contentObject = $dm->find(null, $this->mapUrlSafePathToId($path));

        if (!$contentObject || !$contentObject instanceof Content) {
            throw new NotFoundHttpException(sprintf(
                'Object with identifier %s cannot be resolved to a valid instance of Symfony\Cmf\Bundle\MediaBundle\Tests\Resources\Document\Content',
                $path
            ));
        }

        $form = $this->getContentForm($contentObject);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                // persist
                $dm = $this->get('doctrine_phpcr')->getManager('default');
                $dm->persist($contentObject);
                $dm->flush();
            }
        }

        return $this->redirect($this->generateUrl('phpcr_image_test'));
    }
}
