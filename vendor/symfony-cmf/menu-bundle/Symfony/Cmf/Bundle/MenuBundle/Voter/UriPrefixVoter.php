<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2013 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Symfony\Cmf\Bundle\MenuBundle\Voter;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;

use Knp\Menu\ItemInterface;

/**
 * This voter checks if the content entry in the menu item extras is a Symfony
 * Route instance and if so compares its option "currentUriPrefix" with the
 * request path. This allows to configure a menu entry to be the current entry
 * for a whole sub path.
 *
 * This voter is NOT enabled by default. Enable it in your bundle configuration
 * and set up a currentUriPrefix on menu content that is routes.
 *
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 * @author David Buchmann <mail@davidbu.ch>
 */
class UriPrefixVoter implements VoterInterface
{
    /**
     * @var Request|null
     */
    private $request;

    public function setRequest(Request $request = null)
    {
        $this->request = $request;
    }

    /**
     * {@inheritDoc}
     */
    public function matchItem(ItemInterface $item)
    {
        if (! $this->request) {
            return null;
        }

        $content = $item->getExtra('content');

        if ($content instanceof Route && $content->hasOption('currentUriPrefix')) {
            $currentUriPrefix = $content->getOption('currentUriPrefix');
            $currentUriPrefix = str_replace('{_locale}', $this->request->getLocale(), $currentUriPrefix);
            if (0 === strncmp($this->request->getPathinfo(), $currentUriPrefix, strlen($currentUriPrefix))) {
                return true;
            }
        }

        return null;
    }
}
