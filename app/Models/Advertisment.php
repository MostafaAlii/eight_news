<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};


class Advertisment extends BaseModel implements HasMedia {
    use HasFactory, InteractsWithMedia;
    protected $table = 'advertisments';
    protected $guard = [];
}