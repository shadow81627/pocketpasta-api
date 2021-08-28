<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use App\Traits\HasSchemalessAttributes;
use App\Traits\Thingable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Organization extends Model
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'description',
        'additional_attributes',
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
            ->preventOverwrite()
            ->slugsShouldBeNoLongerThan(50);
    }
}
