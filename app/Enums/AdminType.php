<?php

namespace App\Enums;


enum AdminType: string {
    case SUPER_ADMIN = "Super Admin";
    case SUPERVISOR = "Supervisor";
    case ADMIN = "Admin";

    public static function type($value): string {
        return match ($value) {
            self::SUPER_ADMIN => '<span class="badge badge-default">مسؤل</span>',
            self::SUPERVISOR => '<span class="badge badge-default">مدير</span>',
            self::ADMIN => '<span class="badge badge-default">ادارى</span>',
        };
    }
}