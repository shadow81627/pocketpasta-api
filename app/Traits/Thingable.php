<?php

namespace App\Traits;

trait Thingable
{
    public function initalizeThingable()
    {
        array_push(
            $this->fillable,
            'slug',
            'name',
            'description',
            'additional_attributes',
        );
    }
}
