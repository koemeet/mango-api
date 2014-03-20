<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Editor\Helper;

use Symfony\Cmf\Bundle\MediaBundle\FileInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UploadCkeditorHelper extends UploadDefaultHelper
{
    /**
     * {@inheritdoc}
     */
    public function getUploadResponse(Request $request, array $files)
    {
        if (!isset($files[0]) && !$files[0] instanceof FileInterface) {
            throw new \InvalidArgumentException(
                'Provide at least one Symfony\Cmf\Bundle\MediaBundle\FileInterface file.'
            );
        }

        $urlSafePath = $this->mediaManager->getUrlSafePath($files[0]);
        $url         = $this->router->generate('cmf_media_image_display', array('path' => $urlSafePath));
        $funcNum     = $request->query->get('CKEditorFuncNum');

        $data = "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(".$funcNum.", '".$url."', 'success');</script>";

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }
}