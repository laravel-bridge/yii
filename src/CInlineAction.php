<?php

namespace LaravelBridge\Yii;

use CInlineAction as BaseCInlineAction;
use LaravelBridge\Support\Traits\ContainerAwareTrait;
use ReflectionException;
use ReflectionMethod;

class CInlineAction extends BaseCInlineAction
{
    use ContainerAwareTrait;

    /**
     * @param array $params
     * @return bool
     * @throws ReflectionException
     */
    public function runWithParams($params)
    {
        $methodName = 'action' . $this->getId();
        $controller = $this->getController();
        $method = new ReflectionMethod($controller, $methodName);

        if ($method->getNumberOfParameters() > 0) {
            return $this->container->call([$controller, $methodName], $params);
        }

        return $controller->$methodName();
    }
}
