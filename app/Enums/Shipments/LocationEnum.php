<?php

namespace App\Enums\Shipments;

enum LocationEnum: int
{
    case BELGRADE = 1;
    case NOVI_SAD = 2;
    case ZAGREB = 3;
    case PULA = 4;
    case SARAJEVO = 5;
    case MOSTAR = 6;
    case SPLIT = 7;
    case DUBROVNIK = 8;
    case PODGORICA = 9;
    case TIRANA = 10;
    case SKOPJE = 11;
    case THESSALONIKI = 12;
    case ATHENS = 13;
    case SOFIA = 14;
    case PLOVDIV = 15;
    case TIMISOARA = 16;
    case CLUJ_NAPOCA = 17;
    case BUCHAREST = 18;
    case CONSTANTA = 19;
    case ISTANBUL = 20;

    public function getName(): string
    {
        return match($this) {
            self::BELGRADE      => 'Belgrade',
            self::NOVI_SAD      => 'Novi Sad',
            self::ZAGREB        => 'Zagreb',
            self::PULA          => 'Pula',
            self::SARAJEVO      => 'Sarajevo',
            self::MOSTAR        => 'Mostar',
            self::SPLIT         => 'Split',
            self::DUBROVNIK     => 'Dubrovnik',
            self::PODGORICA     => 'Podgorica',
            self::TIRANA        => 'Tirana',
            self::SKOPJE        => 'Skopje',
            self::THESSALONIKI  => 'Thessaloniki',
            self::ATHENS        => 'Athens',
            self::SOFIA         => 'Sofia',
            self::PLOVDIV       => 'Plovdiv',
            self::TIMISOARA     => 'Timisoara',
            self::CLUJ_NAPOCA   => 'Cluj-Napoca',
            self::BUCHAREST     => 'Bucharest',
            self::CONSTANTA     => 'Constanta',
            self::ISTANBUL      => 'Istanbul',
        };
    }
}