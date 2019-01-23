<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\TodoCategoryAttribute;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Metable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Storage;

class TodoCategory extends Model
{
    use Sortable,
        TodoCategoryAttribute,
        Eloquence,
        Metable,
        SoftDeletes,
        CascadeSoftDeletes;

    /**
     * The sortable attributes.
     *
     * @var array
     */

    protected $sortable = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ["todo_id", "category_id"];

    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'todo_categories';

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
     * Get  the Todo that owns the TodoCategory.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }

    /**
     * Get  the Category that owns the TodoCategory.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ***********************************************************
    // ***********************************************************
    // ************************CASCADE  RELATIONS ****************
    // ***********************************************************
    // ***********************************************************
}
