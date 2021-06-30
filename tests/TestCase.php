<?php

namespace berthott\NgLaravel\Tests;

use berthott\NgLaravel\NgBuildServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
  }

  protected function getPackageProviders($app)
  {
    return [
      NgBuildServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
  }
}