<?php

namespace App\Http\Requests\Api\V1;

use App\Enum\CountriesEnum;
use App\Enum\StateEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed country
 * @property mixed state
 * @property mixed page
 * @property mixed perPage
 */
class GetPhoneNumbersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "country" => ['nullable', Rule::in(CountriesEnum::getConstatnts())],
            "state" => ['nullable', Rule::in(StateEnum::getConstatnts())],
            "page" => ['nullable', "numeric"],
            "perPage" => ['nullable', "numeric"],
        ];
    }
}
