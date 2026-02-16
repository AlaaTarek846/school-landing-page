<?php

namespace App\Enums;

enum ContractStatusEnum: string
{
    case IN_ACTIVE = 'inactive';
    case CANCEL = 'cancel';
    case ACTIVE = 'active';
    

    public function color(): string
    {
        return match ($this) {
            self::IN_ACTIVE => 'danger',
            self::CANCEL => 'warning',
            self::ACTIVE => 'success'
        };
    }

    public function colorCode(): string
    {
        return match ($this) {
            self::IN_ACTIVE => '#dc3545',
            self::CANCEL => '#ffc107',
            self::ACTIVE => '#198754'
        };
    }

    public function translated(): string
    {
        return match ($this) {
            self::IN_ACTIVE => __('translation.enums.inactive'),
            self::CANCEL => __('translation.enums.canceled'),
            self::ACTIVE => __('translation.enums.active')
        };
    }
    
}
