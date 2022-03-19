<?php

namespace App\Enum;

class StateEnum
{
    const OK = 'OK';
    const NOK = 'NOK';

    /**
     * @return string[]
     */
    public static function getConstatnts(): array
    {
        return [
            self::OK,
            self::NOK
        ];
    }
}