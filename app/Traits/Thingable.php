<?php

namespace App\Traits;

trait Thingable
{
    public function initalizeThingable()
    {
        array_push(
            $this->fillable,
            'name',
            'description',
            'additional_attributes',
        );
    }
}
