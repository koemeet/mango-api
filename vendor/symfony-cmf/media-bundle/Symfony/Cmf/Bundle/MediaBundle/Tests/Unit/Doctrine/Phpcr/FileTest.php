<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Tests\Unit\Doctrine\Phpcr;

use org\bovigo\vfs\vfsStream;
use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    public function getExtensionProvider()
    {
        return array(
            array('filename.ext', 'ext'),
            array('filename.', ''),
            array('filename', ''),
            array('filename.ext.ext2', 'ext2'),
        );
    }

    /**
     * @dataProvider getExtensionProvider
     */
    public function testGetExtension($name, $expectedExtension)
    {
        $file = new File();
        $file->setName($name);

        $this->assertEquals($expectedExtension, $file->getExtension());
    }

    public function testSetFileContentFromFilesystem()
    {
        vfsStream::setup('home');
        $fileSystemFile = vfsStream::url('home/test.txt');
        file_put_contents($fileSystemFile, "Test file content.");

        $file = new File();
        $file->setFileContentFromFilesystem($fileSystemFile);

        $this->assertEquals('Test file content.', $file->getContentAsString());
        $this->assertEquals('text/plain', $file->getContentType());
        $this->assertEquals(18, $file->getSize());
        $this->assertInstanceOf('DateTime', $file->getUpdatedAt());
    }

    public function testGetContent()
    {
        $file = new File();

        $this->assertInstanceOf('Doctrine\ODM\PHPCR\Document\Resource', $file->getContent());
    }

    public function contentAsStringProvider()
    {
        $testContent = 'Test file content.';

        $stream = fopen('php://memory', 'rwb+');
        fwrite($stream, $testContent);
        rewind($stream);

        return array(
            array('', ''),
            array($testContent, $testContent),
            array($stream, $testContent),
        );
    }

    /**
     * @dataProvider contentAsStringProvider
     */
    public function testContentAsString($content, $expectedContent)
    {
        $file =  new File();

        $file->setContentFromString($content);

        $this->assertEquals($expectedContent, $file->getContentAsString());
        $this->assertEquals(0, ftell($file->getContent()->getData()), 'filepointer at the beginning of \Doctrine\ODM\PHPCR\Document\Resource::data');
    }

    public function copyContentFromFileProvider()
    {
        $testContent = 'Test file content.';

        vfsStream::setup('home');
        $fileSystemFile = vfsStream::url('home/test.txt');
        file_put_contents($fileSystemFile, $testContent);

        $binaryFile = new File();
        $binaryFile->setContentFromString($testContent);

        return array(
            array(new \SplFileObject($fileSystemFile), $testContent, 'text/plain', 18),
            array($binaryFile, $testContent, 'application/octet-stream', 18),
        );
    }

    /**
     * @dataProvider copyContentFromFileProvider
     */
    public function testCopyContentFromFile($fileInput, $expectedContent, $expectedContentType, $expectedSize)
    {
        $file =  new File();

        $file->copyContentFromFile($fileInput);

        $stream = $file->getContentAsStream();

        $this->assertTrue(is_resource($stream));
        $this->assertEquals(0, ftell($stream), 'filepointer at the beginning of \Doctrine\ODM\PHPCR\Document\Resource::data');

        $this->assertEquals($expectedContent, $file->getContentAsString());
        $this->assertEquals($expectedContentType, $file->getContentType());
        $this->assertEquals($expectedSize, $file->getSize());
        $this->assertInstanceOf('DateTime', $file->getUpdatedAt());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCopyContentFromFileException()
    {
        $file =  new File();

        $file->copyContentFromFile('');
    }

    public function testContentAsStream()
    {
        $file = new File();

        $file->setContentFromString('Test file content.');

        $stream = $file->getContentAsStream();

        $this->assertTrue(is_resource($stream));
        $this->assertEquals(0, ftell($stream), 'filepointer at the beginning of \Doctrine\ODM\PHPCR\Document\Resource::data');

        $stat = fstat($stream);
        $this->assertEquals(18, $stat['size']);

        $this->assertEquals('application/octet-stream', $file->getContentType()); // cannot determine mime-type for php://memory stream
        $this->assertEquals(18, $file->getSize());
        $this->assertInstanceOf('DateTime', $file->getUpdatedAt());
    }

    public function getSizeProvider()
    {
        return array(
            array('', 0),
            array('Test file content.', 18),
        );
    }

    /**
     * @dataProvider getSizeProvider
     */
    public function testSize($content, $expectedSize)
    {
        $file = new File();
        $file->setContentFromString($content);

        $this->assertSame($expectedSize, $file->getSize());
    }
}