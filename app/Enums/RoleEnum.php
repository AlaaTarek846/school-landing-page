<?php

namespace App\Enums;

enum RoleEnum: string
{

    case ADMIN = 'admin';
    case STAFF = 'staff';
    case OWNER = 'owner';
    case MANAGER = 'manager';
    case UNIT_CHIEF = 'unit_chief';
    case SERVICE_PROVIDER = 'service_provider';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
    
}
