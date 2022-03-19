<?php

namespace App\Repository;

use App\Models\Customer;
use App\Repository\Core\Repository;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CustomerRepository extends Repository implements CustomerRepositoryInterface
{
    /**
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * @return array
     */
    public function getAllCustomers(): Collection
    {
        return $this->getModel()->all();
    }

    /**
     * @param array $customers
     * @param string|null $country
     * @param null $state
     * @return array
     */
    public function filterCustomers(Collection $customers, string $country = null, $state = null): Collection
    {
        return $customers->filter(function ($customer) use ($country, $state){
            if ($country && $state){
                return $customer['country'] == $country && $customer['state'] == $state;
            }

            if ($country){
             return $customer['country'] == $country;
            }

            if ($state){
                return $customer['state'] == $state;
            }
        });
    }

    /**
     * @param Collection $customers
     * @return LengthAwarePaginator
     */
    public function paginateCustomers(Collection $customers, int $page, int $perPage): LengthAwarePaginator
    {
        return new LengthAwarePaginator($customers->forPage($page, $perPage),
            $customers->count(), $perPage, $page);
    }
}