<?php

namespace App\Enums\Shipments;

enum SizeEnum: int
{
    case SMALL   = 1;
    case MEDIUM       = 2;
    case LARGE      = 3;

    public function getMethodName(): string
    {
        return match($this) {
            self::SMALL     => 'Mali',
            self::MEDIUM    => 'Srednji',
            self::LARGE     => 'Veliki',
        };
    }
}