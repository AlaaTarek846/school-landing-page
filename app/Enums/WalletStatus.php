<?php

namespace App\Enums;

enum WalletStatus: string
{
   //(deposit,withdraw)
    case DEPOSIT = 'Deposit';
    case WITHDRAW = 'Withdraw';


    public function color(): string
    {
        return match ($this) {
            self::DEPOSIT => 'success',
            self::WITHDRAW => 'danger',
        };
    }
    public function colorCode(): string
    {
        return match ($this) {
            self::DEPOSIT => '#198754',
            self::WITHDRAW => '#dc3545',
        };
    }

    public function translated(): string
    {
        return match ($this) {
            self::DEPOSIT => __('translation.enums.deposit'),
            self::WITHDRAW => __('translation.enums.withdraw')
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::DEPOSIT => 'bi bi-plus-circle',
            self::WITHDRAW => 'bi bi-minus-circle'
        };
    }


}
