<?php

namespace berthott\NgLaravel\Tests\Unit;

use berthott\NgLaravel\Tests\TestCase;

class LoadConfigTest extends TestCase
{
    /** @test */
    public function load_config()
    {
        $this->assertSame('assets/angular', config('angular.output'));
        $this->assertSame(['web'], config('angular.middleware'));
    }
}
