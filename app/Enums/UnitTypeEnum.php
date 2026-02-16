<?php

namespace App\Enums;

enum UnitTypeEnum: string
{
    case COMMERCIAL = 'Commercial';
    case RESIDENTIAL = 'Residential';


    public function color(): string
    {
        return match ($this) {
            self::COMMERCIAL => 'danger',
            self::RESIDENTIAL => 'warning',
        };
    }

    public function colorCode(): string
    {
        return match ($this) {
            self::COMMERCIAL => '#dc3545',
            self::RESIDENTIAL => '#ffc107',
        };
    }

    public function translated(): string
    {
        return match ($this) {
            self::COMMERCIAL => __('translation.enums.Commercial'),
            self::RESIDENTIAL => __('translation.enums.Residential'),
        };
    }
    
}
