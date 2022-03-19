<?php

namespace App\Enum;

class CountriesEnum
{
    const CAMERON       = 'Cameroon';
    const ETHIOPIA      = 'Ethiopia';
    const MOROCCO       = 'Morocco';
    const MOZAMBIQUE    = 'Mozambique';
    const UGANDA        = 'Uganda';

    /**
     * @return \string[][]
     */
    public static function getCountryFilters(): array
    {
        return [
            self::CAMERON => [
                'code' => '237',
                'regex' => '\(237\)\ ?[2368]\d{7,8}$'
            ],
            self::ETHIOPIA => [
                'code' => '251',
                'regex' => '\(251\)\ ?[1-59]\d{8}$'
            ],
            self::MOROCCO => [
                'code' => '212',
                'regex' => '\(212\)\ ?[5-9]\d{8}$'
            ],
            self::MOZAMBIQUE => [
                'code' => '258',
                'regex' => '\(258\)\ ?[28]\d{7,8}$'
            ],
            self::UGANDA => [
                'code' => '256',
                'regex' => '\(256\)\ ?\d{9}$'
            ]
        ];
    }

    /**
     * @return string[]
     */
    public static function getConstatnts(): array
    {
        return [
              self::CAMERON,
              self::ETHIOPIA,
              self::MOROCCO,
              self::MOZAMBIQUE,
              self::UGANDA
        ];
    }
}