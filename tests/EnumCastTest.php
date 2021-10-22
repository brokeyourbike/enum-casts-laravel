<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\EnumCasts\Tests;

use PHPUnit\Framework\TestCase;
use BrokeYourBike\EnumCasts\Tests\StateEnumFixture;
use BrokeYourBike\EnumCasts\Tests\OrderFixture;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class EnumCastTest extends TestCase
{
    /** @test */
    public function it_returns_attribute_as_enum_object(): void
    {
        $stateValue = (string) StateEnumFixture::A();
        $this->assertIsString($stateValue);

        $order = new OrderFixture();
        $order->setRawAttributes([
            'state' => $stateValue,
        ]);

        $this->assertInstanceOf(StateEnumFixture::class, $order->state);
        $this->assertEquals(StateEnumFixture::A(), $order->state);
    }

    /** @test */
    public function it_can_not_return_attribute_as_null()
    {
        $order = new OrderFixture();
        $order->setRawAttributes([
            'state' => null,
        ]);

        $this->expectExceptionMessage(StateEnumFixture::class);
        $this->expectException(\UnexpectedValueException::class);

        $this->assertNull($order->state);
    }

    /** @test */
    public function it_can_set_attribute_value_from_enum()
    {
        $order = new OrderFixture([
            'state' => StateEnumFixture::A(),
        ]);

        $attributes = $order->getAttributes();

        $this->assertArrayHasKey('state', $attributes);
        $this->assertSame('a', $attributes['state']);
    }

    /** @test */
    public function it_can_not_set_attribute_value_as_null()
    {
        $this->expectExceptionMessage(StateEnumFixture::class);
        $this->expectException(\UnexpectedValueException::class);

        $order = new OrderFixture([
            'state' => null,
        ]);
    }

    /** @test */
    public function it_will_throw_if_stored_value_is_not_the_right_enum()
    {
        $this->expectExceptionMessage('The given value is not an '. StateEnumFixture::class .' instance');
        $this->expectException(\InvalidArgumentException::class);

        $order = new OrderFixture([
            'state' => DummyEnumFixture::PING(),
        ]);
    }

    /** @test */
    public function it_will_throw_if_enum_does_not_have_stored_value()
    {
        $order = new OrderFixture();
        $order->setRawAttributes([
            'state' => 'c',
        ]);

        $this->assertFalse(StateEnumFixture::isValidKey('c'));

        $this->expectExceptionMessage(StateEnumFixture::class);
        $this->expectException(\UnexpectedValueException::class);

        $order->state;
    }
}
