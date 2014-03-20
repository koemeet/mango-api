<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Tests\Unit\File;

use org\bovigo\vfs\vfsStream;
use Symfony\Cmf\Bundle\MediaBundle\File\UploadFileHelperDoctrine;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;

class UploadFileHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $registryMock;
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $dmMock;
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $mediaManagerMock;
    /**
     * @var string
     */
    private $class;
    /**
     * @var string
     */
    private $rootPath;

    public function setUp()
    {
        $this->registryMock = $this->getMockBuilder('Doctrine\Bundle\PHPCRBundle\ManagerRegistry')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $this->dmMock = $this->getMockBuilder('Doctrine\ODM\PHPCR\DocumentManager')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $this->mediaManagerMock = $this->getMockBuilder('Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\MediaManager')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $this->class = 'Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\File';
        $this->rootPath = '/test/media';
    }

    private function getUploadFileHelper()
    {
        return new UploadFileHelperDoctrine($this->registryMock, 'themanager', $this->class, $this->rootPath, $this->mediaManagerMock);
    }

    public function testAddGetEditorHelper()
    {
        $uploadFileHelper = $this->getUploadFileHelper();

        $this->assertNull($uploadFileHelper->getEditorHelper());
        $this->assertNull($uploadFileHelper->getEditorHelper('unknown'));

        $uploadDefaultHelper = $this->getMockBuilder('Symfony\Cmf\Bundle\MediaBundle\Editor\Helper\UploadDefaultHelper')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $uploadCkeditorHelper = $this->getMockBuilder('Symfony\Cmf\Bundle\MediaBundle\Editor\Helper\UploadCkeditorHelper')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $uploadFileHelper->addEditorHelper('default', $uploadDefaultHelper);
        $uploadFileHelper->addEditorHelper('ckeditor', $uploadCkeditorHelper);

        $this->assertEquals($uploadDefaultHelper, $uploadFileHelper->getEditorHelper('default'));
        $this->assertEquals($uploadDefaultHelper, $uploadFileHelper->getEditorHelper('unknown'));
        $this->assertEquals($uploadCkeditorHelper, $uploadFileHelper->getEditorHelper('ckeditor'));
    }

    public function provideHandleUploadedFile()
    {
        return array(
            array(array(
                'allow_non_uploaded_file' => false,
                'upload_error' => UPLOAD_ERR_OK,
                'expected_exception' => array(
                    'symfony\component\httpfoundation\file\exception\uploadexception',
                    'The file likely did not pass the is_uploaded_file() check',
                ),
            )),
            array(array(
                'upload_error' => UPLOAD_ERR_INI_SIZE,
                'expected_exception' => array(
                    'symfony\component\httpfoundation\file\exception\uploadexception',
                    'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                ),
            )),
            array(array()),
        );
    }

    /**
     * @dataProvider provideHandleUploadedFile
     */
    public function testHandleUploadedFile($options)
    {
        // UploadedFile only has a test mode since 2.3
        if (version_compare(Kernel::VERSION, '2.3') < 0) {
            return;
        }

        $options = array_merge(array(
            'allow_non_uploaded_file' => true,
            'expected_exception' => null,
            'upload_error' => null,
        ), $options);

        vfsStream::setup('home');
        $testFile = vfsStream::url('home/test.txt');
        file_put_contents($testFile, "Test file content.");

        $class = 'Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\File';
        $uploadFileHelper = $this->getUploadFileHelper();

        $uploadFileHelper->setClass($class);
        $uploadFileHelper->setRootPath($this->rootPath.'/file');
        $uploadedFile = new UploadedFile($testFile, 'test.txt', null, null, $options['upload_error'], $options['allow_non_uploaded_file']);

        if (null !== $options['expected_exception']) {
            list($eType, $eMessage) = $options['expected_exception'];
            $this->setExpectedException($eType, $eMessage);
        } else {
            $this->mediaManagerMock->expects($this->once())
                ->method('setDefaults')
                ->with(
                    $this->isInstanceOf($this->class),
                    $this->equalTo($this->rootPath.'/file')
                )
            ;
        }

        $file = $uploadFileHelper->handleUploadedFile($uploadedFile);

        $this->assertInstanceOf($class, $file);
        $this->assertEquals('test.txt', $file->getName());
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function testHandleUploadedFileException()
    {
        vfsStream::setup('home');
        $testFile = vfsStream::url('home/test.txt');
        file_put_contents($testFile, "Test file content.");

        $uploadFileHelper = $this->getUploadFileHelper();
        $uploadedFile = new UploadedFile($testFile, 'test.txt', null, null, null, true);

        $this->mediaManagerMock->expects($this->once())
            ->method('setDefaults')
            ->will($this->throwException(new \RuntimeException()))
        ;

        $uploadFileHelper->handleUploadedFile($uploadedFile);
    }

    public function testGetUploadedResponse()
    {
        vfsStream::setup('home');
        $testFile = vfsStream::url('home/test.txt');
        file_put_contents($testFile, "Test file content.");

        $request = new Request();
        $request->files->set('file', new UploadedFile($testFile, 'test.txt', null, null, null, true));
        $response = new Response('upload response');

        $uploadFileHelper = $this->getUploadFileHelper();

        $uploadDefaultHelper = $this->getMockBuilder('Symfony\Cmf\Bundle\MediaBundle\Editor\Helper\UploadDefaultHelper')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $uploadFileHelper->addEditorHelper('default', $uploadDefaultHelper);

        $uploadDefaultHelper->expects($this->once())
            ->method('setFileDefaults')
            ->with(
                $this->equalTo($request),
                $this->isInstanceOf($this->class)
            )
        ;

        $class = $this->class;
        $uploadDefaultHelper->expects($this->once())
            ->method('getUploadResponse')
            ->with(
                $this->equalTo($request),
                $this->callback(function ($files) use ($class) {
                    return isset($files[0]) && $files[0] instanceof $class;
                })
            )
            ->will($this->returnValue($response))
        ;

        $this->mediaManagerMock->expects($this->once())
            ->method('setDefaults')
            ->with(
                $this->isInstanceOf($this->class),
                $this->equalTo($this->rootPath)
            )
        ;

        $uploadFileHelper->setManagerName('anothermanager');
        $this->registryMock->expects($this->any())
            ->method('getManager')
            ->with($this->equalTo('anothermanager'))
            ->will($this->returnValue($this->dmMock))
        ;
        $this->dmMock->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf($this->class))
        ;
        $this->dmMock->expects($this->once())
            ->method('flush')
        ;

        $this->assertEquals($response, $uploadFileHelper->getUploadResponse($request));
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function testGetUploadResponseException()
    {
        $uploadFileHelper = $this->getUploadFileHelper();

        $uploadFileHelper->getUploadResponse(new Request());
    }
}
