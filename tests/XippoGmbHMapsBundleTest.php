<?php

/*
 * This file is part of xippogmbh/maps-bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @license LGPL-3.0-or-later
 */

namespace XippoGmbH\MapsBundle\Tests;

use XippoGmbH\MapsBundle\XippoGmbHMapsBundle;
use PHPUnit\Framework\TestCase;

class XippoGmbHMapsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new XippoGmbHMapsBundle();

        $this->assertInstanceOf('XippoGmbH\MapsBundle\XippoGmbHMapsBundle', $bundle);
    }
}
