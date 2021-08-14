<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

trait HasSchemalessAttributes
{

    public function initializeHasSchemalessAttributes()
    {
        $this->casts['additional_attributes'] = SchemalessAttributes::class;

        $this->fillable[] = 'additional_attributes';
    }

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->additional_attributes->modelScope();
    }
}
