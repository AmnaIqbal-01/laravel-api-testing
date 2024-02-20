<?php

namespace App\Http\Controllers\Api\Customers;

use App\Enums\Version;
use App\Models\Customer;
use App\Http\Resources\v1_0\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

final class CustomersIndexController extends Controller
{
    public function __invoke(Request $request, Version $version): AnonymousResourceCollection
    {
        $customers = Customer::paginate();

        return CustomerResource::collection($customers);
    }
}
