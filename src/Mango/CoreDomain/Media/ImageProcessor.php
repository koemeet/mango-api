<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 17/04/14
 * Time: 15:13
 */

namespace Mango\CoreDomain\Media;

/**
 * Class ImageProcessor
 *
 * Provides an unified way to process an image.
 *
 * @package Mango\CoreDomain\Media
 */
class ImageProcessor
{
    /**
     * @var \Imagick
     */
    protected $im;

    protected $width = 100;
    protected $height = 100;

    /**
     * Constructor.
     *
     * @param $file
     * @param array $options
     */
    public function __construct($file, array $options = array())
    {
        $this->im = new \Imagick($file);

        $this->width = (isset($options['width'])) ? $options['width'] : $this->width;
        $this->height = (isset($options['height'])) ? $options['height'] : $this->width;
    }

    /**
     *
     */
    public function process()
    {
        $this->im->cropthumbnailimage($this->width, $this->height);
        return $this->im;
    }
}