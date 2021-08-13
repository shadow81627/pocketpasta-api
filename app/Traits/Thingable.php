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
            'extra_attributes',
        );

        $this->casts['extra_attributes'] = AsArrayObject::class;
    }
}
