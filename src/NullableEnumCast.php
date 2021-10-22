<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\EnumCasts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class NullableEnumCast implements CastsAttributes
{
    /**
     * The enum classname.
     *
     * @var class-string
     */
    protected $enumClassname;

    /**
     * Create a new cast class instance.
     *
     * @param  class-string  $enumClassname
     * @return void
     */
    public function __construct($enumClassname)
    {
        $this->enumClassname = $enumClassname;
    }

    /**
     * Transform the attribute from the underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \MyCLabs\Enum\Enum|null
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return null;
        }

        return $this->enumClassname::from($value);
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return $value;
        }

        if (!$value instanceof $this->enumClassname) {
            throw new \InvalidArgumentException("The given value is not an {$this->enumClassname} instance");
        }

        return (string) $value;
    }
}
