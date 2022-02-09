<?php

namespace App;

use App\Models\PageCategoryAttachment;
use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $fillable = [
      'page_id','title', 'image_path', 'status',
    ];
    public function pages()
    {
        return $this->hasMany(Page::class, 'page_id', 'id');
    }
    public function pageCategoryAttachments()
    {
        return $this->hasMany(PageCategoryAttachment::class, 'page_category_id', 'id');
    }
}
