<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * retrieve the top 5 customers details spent the most money on orders in the last year
     */
    public function getCustomerDetails()
    {
        try {
            $customerDetails = Customer::select('customers.customer_id', 'customers.name', 'customers.email', DB::raw('SUM(amount) as total_spent'))
                        ->join('orders', 'orders.customer_id', '=', 'customers.customer_id')
                        ->where('order_date', '>=', Carbon::now()->subYear())
                        ->groupBy('orders.customer_id')
                        ->orderBy('total_spent', 'desc')
                        ->limit('5')
                        ->get();
            return response()->json($customerDetails, '200');
        } catch (\Illuminate\Validation\ValidationException $ex) {
            return response()->json([$ex->getMessage()], '422');
        } catch (\Exception $ex) {
            Log::error("Exception : register User | ".$ex->getMessage());
            return response()->json(['ex' => $ex->getMessage() ], '500');
        }
    }
}
