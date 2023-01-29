<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'photo',
        'category_id',
        'admin_id',
        'status',
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function postCategories()
    {
        return $this->belongsToMany(Post::class,'Post_Categories','post_id','post_id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class,'category_id');
    }

}