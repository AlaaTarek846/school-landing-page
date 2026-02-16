<?php

namespace App\Enums;

enum PropertyTypeEnum: string
{
    case RESIDENTIAL = 'residential';
    case COMMERCIAL = 'commercial';
    case MIXED = 'mixed';
    

    public function color(): string
    {
        return match ($this) {
            self::RESIDENTIAL => 'danger',
            self::COMMERCIAL => 'warning',
            self::MIXED => 'success'
        };
    }

    public function colorCode(): string
    {
        return match ($this) {
            self::RESIDENTIAL => '#dc3545',
            self::COMMERCIAL => '#ffc107',
            self::MIXED => '#198754'
        };
    }

    public function translated(): string
    {
        return match ($this) {
            self::RESIDENTIAL => __('translation.enums.residential'),
            self::COMMERCIAL => __('translation.enums.commercial'),
            self::MIXED => __('translation.enums.mixed')
        };
    }
    
}
