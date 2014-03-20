<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 12/02/14
 * Time: 15:53
 */

namespace Mango\API\DocsBundle\Formatter;

/**
 * Class HtmlFormatter
 * @package Mango\API\DocsBundle\Formatter
 */
class HtmlFormatter extends \Nelmio\ApiDocBundle\Formatter\HtmlFormatter
{
    /**
     * {@inheritdoc}
     */
    protected function render(array $collection)
    {
        return $this->engine->render('MangoAPIDocsBundle:Console:resources.html.twig',  array_merge(
            array(
                'resources' => $collection,
            ),
            array(
                'apiName'              => 'API documentation',
                'authentication'       => false,
                'endpoint'             => '',
                'enableSandbox'        => true,
                'requestFormatMethod'  => 'format_param',
                'acceptType'           => 'json',
                'bodyFormat'           => 'json',
                'defaultRequestFormat' => 'json',
                'date'                 => date(DATE_RFC822)
            )
        ));
    }
} 