<?php

namespace App\Enums;

enum EntityTypeEnum: string
{
    case INDIVIDUAL = 'Individual';
    case FOUNDATION = 'Foundation';
    case COMPANY = 'Company';


    public function color(): string
    {
        return match ($this) {
            self::INDIVIDUAL => 'danger',
            self::FOUNDATION => 'success',
            self::COMPANY => 'warning'
        };
    }

    public function colorCode(): string
    {
        return match ($this) {
            self::INDIVIDUAL => '#dc3545',
            self::FOUNDATION => '#ffc107',
            self::COMPANY => '#198754',
        };
    }

    public function translated(): string
    {
        return match ($this) {
            self::INDIVIDUAL => __('translation.enums.individual'),
            self::FOUNDATION => __('translation.enums.foundation'),
            self::COMPANY => __('translation.enums.company'),
        };
    }
    
}
