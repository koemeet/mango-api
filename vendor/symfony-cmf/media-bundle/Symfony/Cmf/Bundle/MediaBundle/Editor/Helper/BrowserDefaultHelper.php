<?php

namespace Symfony\Cmf\Bundle\MediaBundle\Editor\Helper;

use Symfony\Cmf\Bundle\MediaBundle\Editor\BrowserEditorHelperInterface;
use Symfony\Component\Routing\RouterInterface;

class BrowserDefaultHelper implements BrowserEditorHelperInterface
{
    protected $router;
    protected $name;
    protected $parameters;
    protected $referenceType;

    /**
     * @param RouterInterface $router
     * @param string          $name          The name of the route
     * @param mixed           $parameters    An array of parameters
     * @param Boolean|string  $referenceType The type of reference to be
     *      generated (one of the RouterInterface constants)
     */
    public function __construct(
        RouterInterface $router,
        $name = null,
        array $parameters = array(),
        $referenceType = RouterInterface::ABSOLUTE_PATH)
    {
        $this->router        = $router;
        $this->name          = $name;
        $this->parameters    = $parameters;
        $this->referenceType = $referenceType;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        if (!$this->name) {
            return false;
        }

        return $this->router->generate($this->name, $this->parameters, $this->referenceType);
    }
}