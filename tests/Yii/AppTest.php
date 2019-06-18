<?php

namespace Tests\Yii;

use CWebApplication;
use LaravelBridge\Yii\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testSample()
    {
        $this->assertInstanceOf(CWebApplication::class, new App(['basePath' => __DIR__]));
    }
}
