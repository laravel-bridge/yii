<?php

namespace LaravelBridge\Yii;

use CAction;
use CController as BaseController;
use LaravelBridge\Support\Traits\ContainerAwareTrait;

class CController extends BaseController
{
    use ContainerAwareTrait;

    public function runAction($action)
    {
        $priorAction = $this->getAction();

        $action = new CInlineAction($this, $action->getId());
        $action->setContainer($this->container);

        $this->setAction($action);

        if ($this->beforeAction($action)) {
            if ($action->runWithParams($this->getActionParams()) === false) {
                $this->invalidActionParams($action);
            } else {
                $this->afterAction($action);
            }
        }

        $this->setAction($priorAction);
    }
}
