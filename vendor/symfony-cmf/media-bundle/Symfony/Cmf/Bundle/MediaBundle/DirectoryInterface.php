<?php

namespace Symfony\Cmf\Bundle\MediaBundle;

/**
 * Interface for file objects containing directories.
 *
 * The path to a file is: /path/to/file/filename.ext
 *
 * For PHPCR the id is being the path.
 *
 * This is to be kept compatible with the Gaufrette adapter to be able to use a
 * filesystem with directories.
 */
interface DirectoryInterface extends HierarchyInterface
{
    /**
     * Returns the contents of this directory.
     *
     * @return HierarchyInterface[]
     */
    public function getChildren();
}
