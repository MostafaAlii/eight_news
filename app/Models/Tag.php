<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'admin_id',
    ];
    

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }


    public function tagesCategories()
    {
        return $this->belongsToMany(Tag::class,'Post_Tags','tag_id','post_id');
    }

}