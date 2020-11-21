<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace XippoGmbH\ContaoMapsBundle\Tests;

use XippoGmbH\ContaoMapsBundle\ContaoMapsBundle;
use PHPUnit\Framework\TestCase;

class ContaoMapsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoSkeletonBundle();

        $this->assertInstanceOf('XippoGmbH\ContaoMapsBundle\ContaoMapsBundle', $bundle);
    }
}
