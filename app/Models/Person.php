<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\PersonAttribute;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Metable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Storage;

class Person extends Model
{
    use Sortable,
        PersonAttribute,
        Eloquence,
        Metable,
        SoftDeletes,
        CascadeSoftDeletes,
        HasSlug;

    /**
     * Get the options for generating the slug.
     */

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name ')
            ->saveSlugsTo('slug');
    }

    /**
     * The sortable attributes.
     *
     * @var array
     */

    protected $sortable = ["id", "name", "email"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ["name", "email", "sms"];

    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['todosCascade'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'men';

    /**
     * Get the key name for route model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    // ***********************************************************
    // ***********************************************************
    // ************************ RELATIONS ************************
    // ***********************************************************
    // ***********************************************************

    /**
     * Get all the todos for the Person.
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function duties()
    {
        return $this->belongsToMany(Todo::class, 'comments')
            ->whereNull('comments.deleted_at')
            ->withTimestamps()
            ->withPivot(['body']);
    }

    // ***********************************************************
    // ***********************************************************
    // ************************CASCADE  RELATIONS ****************
    // ***********************************************************
    // ***********************************************************

    /**
     * Cascade Deletes for comments relation
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */

    public function todosCascade()
    {
        return $this->hasMany(Comment::class, "person_id", "id");
    }
}
