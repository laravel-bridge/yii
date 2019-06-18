<?php

namespace Tests;

use LaravelBridge\Yii\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testSample()
    {
        $this->assertTrue((new App())->alwaysTrue());
    }
}
