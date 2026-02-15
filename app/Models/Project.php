<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'thumbnail',
        'file_path',
        'demo_url',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }
}
