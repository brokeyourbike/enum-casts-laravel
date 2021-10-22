<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\EnumCasts\Tests;

use Illuminate\Database\Eloquent\Model;
use BrokeYourBike\EnumCasts\NullableEnumCast;
use BrokeYourBike\EnumCasts\EnumCast;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class OrderFixture extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array<mixed>
     */
    protected $casts = [
        'state' => EnumCast::class . ':' . StateEnumFixture::class,
        'state_nullable' => NullableEnumCast::class . ':' . StateEnumFixture::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'state',
        'state_nullable',
    ];
}
