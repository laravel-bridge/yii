<?php

namespace LaravelBridge\Yii;

use CHttpException;
use CWebApplication;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;
use LaravelBridge\Support\Traits\ContainerAwareTrait;
use Yii;

class App extends CWebApplication
{
    use ContainerAwareTrait;

    /**
     * App constructor.
     * @param null $config
     * @param ContainerContract|null $container
     */
    public function __construct($config = null, ContainerContract $container = null)
    {
        parent::__construct($config);

        if ($container === null) {
            $container = new Container();
        }

        $this->setContainer($container);
    }

    /**
     * Overwrite controller for implement for Laravel Container auto injection
     */
    public function runController($route)
    {
        if (($ca = $this->createController($route)) !== null) {
            /** @var CController $controller */
            list($controller, $actionID) = $ca;

            $oldController = $this->getController();

            $controller->setContainer($this->container);
            $controller->init();
            $controller->run($actionID);

            $this->setController($oldController);
        } else {
            throw new CHttpException(404, Yii::t(
                'yii',
                'Unable to resolve the request "{route}".',
                ['{route}' => $route === '' ? $this->defaultController : $route]
            ));
        }
    }
}
