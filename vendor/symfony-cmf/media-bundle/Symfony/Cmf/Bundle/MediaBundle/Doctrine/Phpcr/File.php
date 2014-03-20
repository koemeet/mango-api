<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr;

use Doctrine\ODM\PHPCR\Document\File as DoctrineOdmFile;
use Symfony\Cmf\Bundle\MediaBundle\BinaryInterface;
use Symfony\Cmf\Bundle\MediaBundle\FileInterface;
use Symfony\Cmf\Bundle\MediaBundle\FileSystemInterface;

/**
 * This class represents a CmfMedia Doctrine Phpcr file.
 *
 * Note: the modified information from the content is used.
 */
class File extends DoctrineOdmFile implements FileInterface, BinaryInterface
{
    /**
     * @var string $description
     */
    protected $description;

    /**
     * @var string $copyright
     */
    protected $copyright;

    /**
     * @var string $authorName
     */
    protected $authorName;

    /**
     * @var array $metadata
     */
    protected $metadata;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->nodename;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->nodename = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        if ($parent instanceof Directory) {
            $parent->addChild($this);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * {@inheritDoc}
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * {@inheritDoc}
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadataValue($name, $default = null)
    {
        return isset($this->metadata[$name]) ? $this->metadata[$name] : $default;
    }

    /**
     * {@inheritDoc}
     */
    public function setMetadataValue($name, $value)
    {
        $this->metadata[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function unsetMetadataValue($name)
    {
        unset($this->metadata[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsString()
    {
        $stream = $this->getContentAsStream();
        if (! is_resource($stream)) {
            return '';
        }

        $content = stream_get_contents($stream);
        rewind($stream);

        return $content !== false ? $content : '';
    }

    /**
     * {@inheritdoc}
     */
    public function setContentFromString($content)
    {
        if (!is_resource($content)) {
            $stream = fopen('php://memory', 'rwb+');
            fwrite($stream, $content);
            rewind($stream);
        } else {
            $stream = $content;
        }

        $this->setContentFromStream($stream);
    }

    /**
     * {@inheritdoc}
     */
    public function copyContentFromFile($file)
    {
        if ($file instanceof \SplFileInfo) {
            $this->setFileContentFromFilesystem($file->getPathname());
        } elseif ($file instanceof BinaryInterface) {
            $this->setContentFromStream($file->getContentAsStream());
        } elseif ($file instanceof FileSystemInterface) {
            $this->setFileContentFromFilesystem($file->getFileSystemPath());
        } elseif ($file instanceof FileInterface) {
            $this->setContentFromString($file->getContentAsString());
        } else {
            $type = is_object($file) ? get_class($file) : gettype($file);
            throw new \InvalidArgumentException(sprintf(
                'File is not a valid type, "%s" given.',
                 $type
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsStream()
    {
        $stream = $this->getContent()->getData();
        if (!is_resource($stream)) {
            return null;
        }
        rewind($stream);

        return $stream;
    }

    /**
     * {@inheritdoc}
     */
    public function setContentFromStream($stream)
    {
        if (!is_resource($stream)) {
            throw new \InvalidArgumentException('Expected a stream');
        }

        $this->getContent()->setData($stream);
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        try {
            $size = (int) $this->getContent()->getSize();
        } catch (\BadMethodCallException $e) {
            $stat = fstat($this->getContentAsStream());
            $size = $stat['size'];
        }

        return $size;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->getContent()->setMimeType($contentType);
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType()
    {
        return $this->getContent()->getMimeType();
    }

    /**
     * {@inheritdoc}
     */
    public function getExtension()
    {
        return pathinfo($this->getName(), PATHINFO_EXTENSION);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->created;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->getContent()->getLastModified();
    }

    /**
     * Getter for updatedBy
     *
     * @return string name of the (jcr) user who updated the file
     */
    public function getUpdatedBy()
    {
        return $this->getContent()->getLastModifiedBy();
    }
}
