<?php

namespace App\Repository\Interfaces;

use App\Repository\Core\Interfaces\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    /**
     * @return array
     */
    public function getAllCustomers(): Collection;

    /**
     * @param Collection $customers
     * @param string|null $country
     * @param null $state
     * @return array
     */
    public function filterCustomers(Collection $customers, string $country = null, $state = null): Collection;

    /**
     * @param Collection $customers
     * @param int $page
     * @return LengthAwarePaginator
     */
    public function paginateCustomers(Collection $customers, int $page, int $perPage): LengthAwarePaginator;
}