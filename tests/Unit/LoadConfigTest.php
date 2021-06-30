<?php

namespace berthott\NgLaravel\Tests\Unit;

use berthott\NgLaravel\Tests\TestCase;

class LoadConfigTest extends TestCase
{
    /** @test */
    function load_config()
    {
        $this->assertSame('assets/angular', config('angular.output'));
        $this->assertSame('angular', config('angular.route.prefix'));
        $this->assertSame(['web'], config('angular.route.middleware'));
    }
}