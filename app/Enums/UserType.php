<?php
namespace App\Enums;
enum UserType: string {
    case PUBLISHER = "Publisher";
    case NORMAL_USER = "User";

    public static function type($value): string {
        return match ($value) {
            self::PUBLISHER => '<span class="badge badge-default">ناشر</span>',
            self::NORMAL_USER => '<span class="badge badge-default">مستخدم</span>',
        };
    }
}