<?php

namespace App\Services;

class PhoneNumberParser
{
    private $phone;
    private $validators;

    /**
     * @param string $phone
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
        $this->validators = $this->getValidators();
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $this->phone, $matches);

            if (sizeof($matches) > 0) {
                $country = $key;
            }
        }

        if (!isset($country)){
            return "Not Found Country";
        }

        return $country;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        $valid = "NOK";

        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . $validator['regex'] . '/', $this->phone, $matches);

            if (sizeof($matches) > 0) {
                $valid = "OK";
            }
        }

        return $valid;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $this->phone, $matches);

            if (sizeof($matches) > 0) {
                $code = $validator['code'];
            }
        }

        if (!isset($code)){
            return explode(' ', $this->phone)[0];
        }

        return $code;
    }

    public function getPhone(): string
    {

        return explode(' ', $this->phone)[1];
    }

    /**
     * @return \string[][]
     */
    private function getValidators(): array
    {
        return  [
            'Cameroon' => [
                'code' => '+237',
                'regex' => '\(237\)\ ?[2368]\d{7,8}$'
            ],
            'Ethiopia' => [
                'code' => '+251',
                'regex' => '\(251\)\ ?[1-59]\d{8}$'
            ],
            'Morocco' => [
                'code' => '+212',
                'regex' => '\(212\)\ ?[5-9]\d{8}$'
            ],
            'Mozambique' => [
                'code' => '+258',
                'regex' => '\(258\)\ ?[28]\d{7,8}$'
            ],
            'Uganda' => [
                'code' => '+256',
                'regex' => '\(256\)\ ?\d{9}$'
            ]
        ];
    }
}
