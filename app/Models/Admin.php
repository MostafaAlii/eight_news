<?php
namespace App\Models;
use App\Enums\AdminType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admins';
    protected $guard = 'admin';
    protected $fillable = ['name','email','password','type', 'status'];
    protected $hidden = ['password','remember_token',];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function statusWithLabel() {
        switch ($this->status) {
            case 0: $result = '<label class="badge badge-warning">غير مفعل</label>'; break;
            case 1: $result = '<label class="badge badge-success">مفعل</label>'; break;
        }
        return $result;
    }
}