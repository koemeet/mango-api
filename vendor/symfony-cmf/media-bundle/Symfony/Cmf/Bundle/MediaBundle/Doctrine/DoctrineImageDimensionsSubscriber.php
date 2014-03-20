<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Imagine\Image\ImagineInterface;
use Symfony\Cmf\Bundle\MediaBundle\BinaryInterface;
use Symfony\Cmf\Bundle\MediaBundle\FileSystemInterface;
use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;

/**
 * A listener to update the dimensions of an image object from the content.
 *
 * This is done using the imagine service if passed into the listener,
 * otherwise GD is used if available.
 *
 * @author Roel Sint
 * @author David Buchmann <mail@davidbu.ch>
 */
class DoctrineImageDimensionsSubscriber implements EventSubscriber
{
    protected $imagine;

    /**
     * @param ImagineInterface $imagine Optional imagine service to use.
     */
    public function __construct(ImagineInterface $imagine = null)
    {
        $this->imagine = $imagine;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
        );
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $this->updateDimensionsFromContent($args);
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->updateDimensionsFromContent($args);
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function updateDimensionsFromContent(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if (!$object instanceof Image) {
            return;
        }

        if ($this->imagine) {
            /** @var $image \Imagine\Image\ImageInterface */
            $image = false;

            // use imagine to determine the dimensions
            if ($object instanceof BinaryInterface) {
                $stream = $object->getContentAsStream();
                try {
                    $image = $this->imagine->read($stream);
                } catch(\Imagine\Exception\InvalidArgumentException $e) {
                    // ignore this exception, we will set the dimensions to 0
                }
            } elseif ($object instanceof FileSystemInterface) {
                if ($object->getFileSystemPath()) {
                    $image = $this->imagine->open($object->getFileSystemPath());
                }
            } else {
                $content = $object->getContentAsString();
                if ($content) {
                    $image = $this->imagine->load($content);
                }
            }

            if ($image) {
                $size = $image->getSize();

                $object->setWidth($size->getWidth());
                $object->setHeight($size->getHeight());
            } else {
                $object->setWidth(0);
                $object->setHeight(0);
            }

            return;
        }

        if (function_exists('imagecreatefromstring')) {
            // use gd to determine the dimensions
            $content = $object->getContentAsString();
            if ($content) {
                $resource = imagecreatefromstring($content);
            } else {
                $resource = false;
            }
            if ($resource) {
                $object->setWidth(imagesx($resource));
                $object->setHeight(imagesy($resource));
            } else {
                $object->setWidth(0);
                $object->setHeight(0);
            }

            return;
        }

        throw new \RuntimeException('Neither have Imagine nor the gd PHP extension');
    }
}
