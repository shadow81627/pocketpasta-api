<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Spatie\Activitylog\Traits\LogsActivity;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Traits\ClearsResponseCache;
use App\Traits\Thingable;
use App\Traits\HasSchemalessAttributes;
use Spatie\Activitylog\LogOptions;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;

// https://schema.org/Product
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use HasSlug;
    use HasTags;
    use LogsActivity;
    use ClearsResponseCache;
    use CascadeSoftDeletes;
    use SchemalessAttributesTrait;
    use HasSchemalessAttributes;
    use Thingable;

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
        'name',
        'description',
        'additional_attributes',

        'gtin',
        'size',
        'sku',
        'color',
        'pattern',
        'slogan',
        'production_date',
        'purchase_date',
        'release_date',

        'created_at',
        'updated_at',
    ];

    /**
     * Write changes to log
     *
     * @var boolean
     */
    protected static $logFillable = true;

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults();
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->preventOverwrite();
    }

    public function brand()
    {
        return $this->belongsTo(Organization::class);
    }
}
