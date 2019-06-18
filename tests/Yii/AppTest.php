<?php

namespace Tests\Yii;

use CWebApplication;
use LaravelBridge\Yii\App;
use PHPUnit\Framework\TestCase;
use Yii;

class AppTest extends TestCase
{
    /**
     * @after
     */
    public function cleanApplicationInstance()
    {
        Yii::setApplication(null);
    }

    /**
     * @test
     */
    public function shouldBeOkay()
    {
        $this->assertInstanceOf(CWebApplication::class, new App(['basePath' => __DIR__]));
    }

    /**
     * @test
     */
    public function shouldAutoInjection()
    {
        $target = new App(['basePath' => __DIR__ . '/../Fixture']);

        $target->runController('/foo/bar/test/some');

        $this->assertTrue(true);
    }
}
