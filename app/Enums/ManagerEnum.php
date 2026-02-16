<?php

namespace App\Enums;

enum ManagerEnum: string
{
    case INDIVIDUAL = 'individual';
    case ORGNIZATION = 'organization';


    public function color(): string
    {
        return match ($this) {
            self::INDIVIDUAL => 'danger',
            self::ORGNIZATION => 'success'
        };
    }

    public function colorCode(): string
    {
        return match ($this) {
            self::INDIVIDUAL => '#dc3545',
            self::ORGNIZATION => '#ffc107',
        };
    }

    public function translated(): string
    {
        return match ($this) {
            self::INDIVIDUAL => __('translation.enums.individual'),
            self::ORGNIZATION => __('translation.enums.organization'),
        };
    }
    
}
