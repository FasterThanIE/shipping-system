<?php

namespace App\Enums\Shipments;

enum MethodEnum: int
{
    case AIRPlANE   = 1;
    case SHIP       = 2;
    case TRUCK      = 3;

    public function getName(): string
    {
        return match($this) {
            self::AIRPlANE  => 'Avion',
            self::SHIP      => 'Brod',
            self::TRUCK     => 'Kamion',
        };
    }
}