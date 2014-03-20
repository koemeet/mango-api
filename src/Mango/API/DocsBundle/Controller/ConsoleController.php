<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 18/03/14
 * Time: 16:47
 */

namespace Mango\API\DocsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ConsoleController
 * @package Mango\API\DocsBundle\Controller
 */
class ConsoleController extends Controller
{
    public function indexAction()
    {
        $extractedDoc = $this->get('nelmio_api_doc.extractor.api_doc_extractor')->all();
        $html  = $this->get('nelmio_api_doc.formatter.html_formatter')->format($extractedDoc);

        return $this->render('MangoAPIDocsBundle:Console:index.html.twig', array(
            'resources_html' => $html
        ));
    }
} 