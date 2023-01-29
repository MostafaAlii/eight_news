<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'post_title',
        'post_content',
        'admin_id',
        'user_id',
        'status',
        'visitor',
        'is_shared',
        'is_comment',
    ];

    public function status()
    {
        switch ($this->status) {
            case 'Unpublished':
                $result = '<label class="badge badge-warning">غير منشورة</label>';
                break;
            case 'published':
                $result = '<label class="badge badge-success">نشرت</label>';
                break;
            case 'draft':
                $result = '<label class="badge badge-danger">مسودة</label>';
                break;
        }
        return $result;
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postCategories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'Post_Categories');
    }

    public function postsTages()
    {
        return $this->belongsToMany(Tag::class, 'Post_Tags', 'post_id', 'tag_id');
    }


}
