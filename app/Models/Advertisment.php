<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Advertisment extends BaseModel {
    use HasFactory;
    protected $table = 'advertisments';
    protected $guarded = [];
    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        return asset('uploads/advertisment/' . $this->image->filename);
    }
}