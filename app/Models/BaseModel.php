<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class BaseModel extends Model {
    use HasFactory;
    
    public function status() {
        switch ($this->status) {
            case 'notActive': $result = '<label class="badge badge-warning">غير مفعل</label>'; break;
            case 'active': $result = '<label class="badge badge-success">مفعل</label>'; break;
        }
        return $result;
    }

    public function statusWithLabel() {
        switch ($this->status) {
            case 0: $result = '<label class="badge badge-warning">غير مفعل</label>'; break;
            case 1: $result = '<label class="badge badge-success">مفعل</label>'; break;
        }
        return $result;
    }

    public function scopeGetActive() {
        return $this->whereStatus('active')->get();
    }

    public function image(): MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }
}