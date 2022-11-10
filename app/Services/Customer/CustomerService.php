<?php
namespace App\Services\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Services\BaseService;


class CustomerService extends BaseService implements CustomerServiceInterface{
    public $repository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
        $this->repository = $CustomerRepository;
    }
}
