<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Customers;

use App\Enums\Version;
use App\Models\Customer;
use App\Http\Requests\Api\v1_0\CustomerStoreRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class CustomersStoreController extends Controller
{
    public function __invoke(CustomerStoreRequest $request, Version $version): JsonResource
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Create the customer with the provided data
        $customer = Customer::create([
            'admin_id' => $validatedData['admin_id'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
        ]);

        // Check if the customer was successfully created
        if ($customer) {
            // Return a JSON resource with a success message
            return new JsonResource($customer, [
                'message' => 'Customer created successfully'
            ]);
        } else {
            // Return a JSON response with an error message and status code
            return response()->json([
                'message' => 'Failed to create customer'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
