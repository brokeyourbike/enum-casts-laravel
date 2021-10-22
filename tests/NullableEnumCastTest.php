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
class NullableEnumCastTest extends TestCase
{
    /** @test */
    public function it_returns_attribute_as_enum_object(): void
    {
        $stateValue = (string) StateEnumFixture::A();
        $this->assertIsString($stateValue);

        $order = new OrderFixture();
        $order->setRawAttributes([
            'state_nullable' => $stateValue,
        ]);

        $this->assertInstanceOf(StateEnumFixture::class, $order->state_nullable);
        $this->assertEquals(StateEnumFixture::A(), $order->state_nullable);
    }

    /** @test */
    public function it_can_return_attribute_as_null()
    {
        $order = new OrderFixture();
        $order->setRawAttributes([
            'state_nullable' => null,
        ]);

        $this->assertNull($order->state_nullable);
    }

    /** @test */
    public function it_can_set_attribute_value_from_enum()
    {
        $order = new OrderFixture([
            'state_nullable' => StateEnumFixture::A(),
        ]);

        $attributes = $order->getAttributes();

        $this->assertArrayHasKey('state_nullable', $attributes);
        $this->assertSame('a', $attributes['state_nullable']);
    }

    /** @test */
    public function it_can_set_attribute_value_as_null()
    {
        $order = new OrderFixture([
            'state_nullable' => null,
        ]);

        $attributes = $order->getAttributes();

        $this->assertArrayHasKey('state_nullable', $attributes);
        $this->assertNull($attributes['state_nullable']);
    }

    /** @test */
    public function it_will_throw_if_stored_value_is_not_the_right_enum()
    {
        $this->expectExceptionMessage('The given value is not an '. StateEnumFixture::class .' instance');
        $this->expectException(\InvalidArgumentException::class);

        $order = new OrderFixture([
            'state_nullable' => DummyEnumFixture::PING(),
        ]);
    }

    /** @test */
    public function it_will_throw_if_enum_does_not_have_stored_value()
    {
        $order = new OrderFixture();
        $order->setRawAttributes([
            'state_nullable' => 'c',
        ]);

        $this->assertFalse(StateEnumFixture::isValidKey('c'));

        $this->expectExceptionMessage(StateEnumFixture::class);
        $this->expectException(\UnexpectedValueException::class);

        $order->state_nullable;
    }
}
