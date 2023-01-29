<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = ['name','email','password','type', 'status', 'section_id', 'age', 'phone', 'twitter_link'];
    protected $hidden = ['password','remember_token',];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function statusWithLabel()
    {
        switch ($this->status) {
            case 0: $result = '<label class="badge badge-warning">غير مفعل</label>'; break;
            case 1: $result = '<label class="badge badge-success">مفعل</label>'; break;
        }
        return $result;
    }

    public function sectionsWithLable() {
        $section_name = $this->section?->name;
        $category_name = $this->section?->category?->name;
        $category_id = $this->section?->category?->id;
        return '<ul class="list list-mark font-weight-bold"><li><span class="section-label badge badge-secondary">'
                     . $section_name. ' | '. '<a href="'. route('categories.index') .'" class="bg-primary">'. $category_name . 
                '</a></span></li></ul>';
    }

    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function getCategoryBySectionId() {
        $section_id = $this->section_id;
        
        //$category = Category::where('section_id', $section_id)->get();
        return $section_id;
    }

    public function getSectionByCategoryId() {
        $section_id = $this->section->id;
        $section = Section::whereId($section_id)->get('category_id');
        $related_categories = Category::whereId($section)->get('name');
        return $related_categories;
    }
        
}