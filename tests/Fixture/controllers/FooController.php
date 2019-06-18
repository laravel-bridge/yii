<?php

use Illuminate\Http\Request as LaravelRequest;
use LaravelBridge\Yii\CController;

class FooController extends CController
{
    public function actionBar(LaravelRequest $request, $test)
    {
        echo 'baz' . $test . get_class($request);
    }
}
