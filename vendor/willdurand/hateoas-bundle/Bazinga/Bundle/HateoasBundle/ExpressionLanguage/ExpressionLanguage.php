<?php

namespace Bazinga\Bundle\HateoasBundle\ExpressionLanguage;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage as BaseExpressionLanguage;

/**
 * Adds some function to the default ExpressionLanguage.
 *
 * To get a service, use service('request').
 * To get a parameter, use parameter('kernel.debug').
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ExpressionLanguage extends BaseExpressionLanguage
{
    protected function registerFunctions()
    {
        parent::registerFunctions();

        $this->register('service', function ($arg) {
            return sprintf('$this->get(%s)', $arg);
        }, function (array $variables, $value) {
            return $variables['container']->get($value);
        });

        $this->register('parameter', function ($arg) {
            return sprintf('$this->getParameter(%s)', $arg);
        }, function (array $variables, $value) {
            return $variables['container']->getParameter($value);
        });
    }
}
