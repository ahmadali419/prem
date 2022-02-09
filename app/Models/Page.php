<?php

namespace App\Models;

use App\PageCategory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'image_path', 'status',
    ];
    public function sliders()
    {
        return $this->hasMany(Slider::class, 'page_id', 'id');
    }
    public function Categories()
    {
        return $this->hasMany(PageCategory::class, 'page_id', 'id');
    }
}
