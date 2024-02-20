<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Customers;

use App\Enums\Version;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Symfony\Component\HttpFoundation\Response;

final class CustomersDestroyController extends Controller
{
    public function __invoke(Request $request, Version $version, Customer $customer): JsonResponse
    {
        try {
            // Log the customer ID before deletion
            Log::info('Deleting customer', ['customer_id' => $customer->id]);

            // Delete the customer
            $customer->delete();

            // Log a success message after deletion
            Log::info('Customer deleted successfully', ['customer_id' => $customer->id]);

            // Return an empty JSON response with HTTP status code 204 (No Content)
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            // Log any exceptions that occur during deletion
            Log::error('Failed to delete customer', ['customer_id' => $customer->id, 'exception' => $e->getMessage()]);

            // Return a JSON response with an error message and HTTP status code 500 (Internal Server Error)
            return response()->json(['message' => 'Failed to delete customer'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
