<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\TodoAttribute;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Metable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Storage;

class Todo extends Model
{
    use Sortable,
        TodoAttribute,
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
            ->generateSlugsFrom('title ')
            ->saveSlugsTo('slug');
    }

    /**
     * The sortable attributes.
     *
     * @var array
     */

    protected $sortable = ["id", "title", "deadline"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ["title", "description", "deadline"];

    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', "deadline"];
    protected $cascadeDeletes = ['categoriesCascade', 'menCascade'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'todos';

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
     * Get all the categories for the Todo.
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'todo_categories')
            ->whereNull('todo_categories.deleted_at')
            ->withTimestamps();
    }

    /**
     * Get all the men for the Todo.
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Person::class, 'comments')
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
     * Cascade Deletes for todo_categories relation
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */

    public function categoriesCascade()
    {
        return $this->hasMany(TodoCategory::class, "todo_id", "id");
    }

    /**
     * Cascade Deletes for comments relation
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */

    public function menCascade()
    {
        return $this->hasMany(Comment::class, "todo_id", "id");
    }
}
