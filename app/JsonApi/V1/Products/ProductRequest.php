<?php

namespace App\JsonApi\V1\Products;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class ProductRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'thing' => ['required', JsonApiRule::toOne()],
            'sku' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
            'pattern' => ['nullable', 'string'],
            'slogan' => ['nullable', 'string'],
            'production_date' => ['nullable', JsonApiRule::dateTime()],
            'purchase_date' => ['nullable', JsonApiRule::dateTime()],
            'release_date' => ['nullable', JsonApiRule::dateTime()],
        ];
    }
}
