<?php

namespace App\JsonApi\V1\Things;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class ThingRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }

}
