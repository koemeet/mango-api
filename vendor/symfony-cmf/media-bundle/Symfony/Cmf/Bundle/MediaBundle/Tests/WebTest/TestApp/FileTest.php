<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Tests\WebTest\TestApp;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileTest extends BaseTestCase
{
    private $testDataDir;

    public function setUp()
    {
        $this->db('PHPCR')->loadFixtures(array(
            'Symfony\Cmf\Bundle\MediaBundle\Tests\Resources\DataFixtures\Phpcr\LoadMediaData',
        ));
        $this->testDataDir = $this->getContainer()->get('kernel')->getRootDir() . '/Resources/data';
    }

    public function testPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('get', $this->getContainer()->get('router')->generate('phpcr_file_test'));
        $resp = $client->getResponse();

        $this->assertEquals(200, $resp->getStatusCode());
        // 1 file and 1 image
        $this->assertGreaterThanOrEqual(2, $crawler->filter('.downloads li a')->count());
    }

    public function testUpload()
    {
        $client = $this->createClient();
        $crawler = $client->request('get', $this->getContainer()->get('router')->generate('phpcr_file_test'));
        $cntDownloadLinks = $crawler->filter('.downloads li a')->count();

        $buttonCrawlerNode = $crawler->filter('form.standard')->selectButton('submit');
        $form = $buttonCrawlerNode->form();
        $form['file']->upload($this->testDataDir . '/testfile.txt');

        $client->submit($form);
        $crawler = $client->followRedirect();
        $resp = $client->getResponse();

        $this->assertEquals(200, $resp->getStatusCode());
        $this->assertEquals($cntDownloadLinks + 1, $crawler->filter('.downloads li a')->count());
    }

    public function testEditorUpload()
    {
        $client = $this->createClient(array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'adminpass',
        ));
        $crawler = $client->request('get', $this->getContainer()->get('router')->generate('phpcr_file_test'));
        $cntDownloadLinks = $crawler->filter('.downloads li a')->count();

        $buttonCrawlerNode = $crawler->filter('form.editor.default')->selectButton('submit');
        $form = $buttonCrawlerNode->form();
        $form['file']->upload($this->testDataDir . '/testfile.txt');

        $client->submit($form);
        $crawler = $client->followRedirect();
        $resp = $client->getResponse();

        $this->assertEquals(200, $resp->getStatusCode());
        $this->assertEquals($cntDownloadLinks + 1, $crawler->filter('.downloads li a')->count());
    }

    public function testDownload()
    {
        $client = $this->createClient();
        $crawler = $client->request('get', $this->getContainer()->get('router')->generate('phpcr_file_test'));

        // find first download link
        $link = $crawler->filter('.downloads li a')->eq(0)->link();
        $client->click($link);
        $resp = $client->getResponse();

        $this->assertEquals(200, $resp->getStatusCode());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\BinaryFileResponse', $resp);
    }
}
