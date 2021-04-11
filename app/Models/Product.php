<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Staudenmeir\EloquentHasManyDeep\HasEagerLimit;

// https://schema.org/Product
class Product extends Model
{
    use HasFactory;
    use HasRelationships;
    use HasEagerLimit;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'production_date',
        'purchase_date',
        'release_date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gtin13',
        'sku',
        'color',
        'pattern',
        'slogan',
        'production_date',
        'purchase_date',
        'release_date',
    ];

    public function thing()
    {
        return $this->belongsTo(Thing::class);
    }
    public function tags()
    {
        return $this->hasManyDeepFromRelations($this->thing(), (new Thing())->tags());
    }
}
