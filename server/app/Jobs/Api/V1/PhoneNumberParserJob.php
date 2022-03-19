<?php

namespace App\Jobs\Api\V1;

use App\Enum\CountriesEnum;
use App\Enum\StateEnum;
use Illuminate\Support\Collection;

class PhoneNumberParserJob
{

    /**
     * @var string
     */
    private $phone;
    /**
     * @var array
     */
    private $validators;
    /**
     * @var array
     */
    private $customers;

    /**
     * Create a new job instance.
     *
     * @param array $customers
     */
    public function __construct(Collection $customers)
    {
        /**
         * Get Validations
         **/
        $this->validators = CountriesEnum::getCountryFilters();
        /**
         * Get Validations rows from db from caller
         **/
        $this->customers = $customers;
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle(): Collection
    {
        /**
         * Declare Empty Collection
         **/
        $filtered_phones = collect([]);

        /**
         * loop through customers and add new data object to predefined $filtered_phones collection
         **/
        foreach ($this->customers as $row){
            $this->phone = $row['phone'];

            $filtered_phones->push([
                "id" => $row["id"],
                "country" => $this->getCountry(),
                "code" => $this->getCode(),
                "phone" => $this->getPhone(),
                "state" => $this->getState()

            ]);
        }

        return $filtered_phones;
    }

    /**
     * get country as string
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
     * get state as string
     * @return string
     */
    public function getState(): string
    {
        $valid = StateEnum::NOK;

        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . $validator['regex'] . '/', $this->phone, $matches);

            if (sizeof($matches) > 0) {
                $valid = StateEnum::OK;
            }
        }

        return $valid;
    }

    /**
     * get country code as string
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
            $code =  str_replace(['(', ')'], '', explode(' ', $this->phone)[0]);
        }

        return '+' . $code;
    }

    /**
     * get phone number without country code
     * @return string
     */
    public function getPhone(): string
    {
        return explode(' ', $this->phone)[1];
    }
}
