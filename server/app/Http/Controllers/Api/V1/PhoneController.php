<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\GetPhoneNumbersRequest;
use App\Http\Resources\Api\V1\Filter\PhoneFilterResource;
use App\Http\Resources\Api\V1\Phone\PhoneCollection;
use App\Jobs\Api\V1\PhoneNumberParserJob;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class PhoneController extends Controller
{
    /**
     * @param GetPhoneNumbersRequest $request
     * @param CustomerRepositoryInterface $customerRepository
     * @return JsonResponse
     * index method which get mapped request and return json response
     */
    public function index(GetPhoneNumbersRequest $request, CustomerRepositoryInterface $customerRepository)
    : JsonResponse
    {
        /**
         * change the data to get all required data like country, state and ETC ..
         */
        $customers = $this->dispatch(new PhoneNumberParserJob($customerRepository->getAllCustomers()));

        /**
         * filter the data according to request filters if any
         */
        if ($request->country || $request->state){
            $customers = $customerRepository->filterCustomers($customers, $request->country, $request->state);
        }

        /**
         * generate pagination
         */
        $customers = $customerRepository->paginateCustomers($customers, $request->get('page', 1),
            $request->get('perPage', 15));

        /**
         * return json response with laravel resource
         */
        return response()->json(new PhoneCollection($customers));
    }

    /**
     * getFilters is responsible for returning required data for filter
     * [generated from backend to be able to add more data without the need to change on client side]
     * @return JsonResponse
     */
    public function getFilters(Request $request): JsonResponse
    {
        return response()->json(new PhoneFilterResource($request));
    }
}
