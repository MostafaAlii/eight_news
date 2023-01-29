<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends BaseModel
{
    use HasFactory;
    protected $table = 'sections';
    protected $fillable = [
        'name',
        'description',
        'status',
        'admin_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    
}