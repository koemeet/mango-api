<?php

namespace Symfony\Cmf\Bundle\MediaBundle\File;

use Symfony\Cmf\Bundle\MediaBundle\Editor\BrowserEditorHelperInterface;

class BrowserFileHelper
{
    protected $editorHelpers;
    protected $defaultBrowser;

    public function __construct($defaultBrowser = null)
    {
        $this->defaultBrowser = $defaultBrowser;
    }

    /**
     * Add an editor helper
     *
     * @param string                       $name
     * @param BrowserEditorHelperInterface $helper
     */
    public function addEditorHelper($name, $editor, BrowserEditorHelperInterface $helper)
    {
        $this->editorHelpers[$name][$editor] = $helper;
    }

    /**
     * Get helper
     *
     * @param $name    leave null to get the default helper
     * @param $browser leave null to get the default helper
     *
     * @return BrowserEditorHelperInterface|null
     */
    public function getEditorHelper($name = null, $browser = null)
    {
        $helpers = $this->editorHelpers;

        if ($name && isset($this->editorHelpers[$name]) && count($this->editorHelpers[$name]) > 0) {
            if ($browser && isset($this->editorHelpers[$name][$browser])) {
                // found name and browser
                return $this->editorHelpers[$name][$browser];
            }

            if ($this->defaultBrowser && isset($this->editorHelpers[$name][$this->defaultBrowser])) {
                // get default
                return $this->editorHelpers[$name][$this->defaultBrowser];
            }
        }

        if ($this->defaultBrowser && isset($this->editorHelpers['default'][$this->defaultBrowser])) {
            // get default
            return $this->editorHelpers['default'][$this->defaultBrowser];
        }

        return null;
    }
}