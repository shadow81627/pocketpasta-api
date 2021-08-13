<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use LaravelJsonApi\Core\Responses\DataResponse;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;
use LaravelJsonApi\Laravel\Http\Requests\AnonymousCollectionQuery;
use App\Models\Product;

class ProductController extends Controller
{
    use Actions\FetchMany;
    use Actions\FetchOne;
    use Actions\Store;
    use Actions\Update;
    use Actions\Destroy;
    use Actions\FetchRelated;
    use Actions\FetchRelationship;
    use Actions\UpdateRelationship;
    use Actions\AttachRelationship;
    use Actions\DetachRelationship;

    public function search(AnonymousCollectionQuery $request)
    {
        return new DataResponse(Product::search($request->search)->get());
    }
}
