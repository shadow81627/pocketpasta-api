<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Spatie\Activitylog\Traits\LogsActivity;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Traits\ClearsResponseCache;
use Spatie\Activitylog\LogOptions;

class Thing extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use HasSlug;
    use HasTags;
    use LogsActivity;
    use ClearsResponseCache;
    use CascadeSoftDeletes;

    protected $cascadeDeletes = ['products'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'description',
        'extra_attributes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'extra_attributes' => AsArrayObject::class,
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
            ->doNotGenerateSlugsOnUpdate();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
