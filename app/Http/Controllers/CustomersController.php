<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerAddress;
use DB;
use Illuminate\Http\Request;

// Övning 2 Make /customers print on the screen all the data in json-format.
// Send the appropriate header to show that it is json data you send and not regular html.

class CustomersController extends Controller
{
    public function showCustomers()
    {
        return response()->json(Customer::all());
    }

    // Övning 3. Keep coding so it shows one customer at a time.

    public function showCustomer($id)
    {

        $customer = Customer::find($id);

        // Övning 4. Write code so it will send a header status code 404 and screen out "Customer not found" in json-format.

        if ($customer == null) {
            $code = 404;
            $response = ['message' => 'Customer not found'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customer);
            return $result;
        }
    }

    // Övning 5. Keep coding so it shows a selected customer's address.

    public function showCustomerAddress($customer_id)
    {
        $customerAddress = DB::table('customers')->where('customer_id', '=', $customer_id)->get();
        if (count($customerAddress) == null) {
            $code = 404;
            $response = ['message' => 'Address not found'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customerAddress);
            return $result;
        }
    }

    // Övning 7. Write code so it shows all the customers that belong to a selected company_id.

    public function showCustomersByCompanyId($company_id)
    {
        $customers = DB::table('customers')->where('company_id', '=', $company_id)->get();
        if (count($customers) == null) {
            $code = 404;
            $response = ['message' => 'No customers with this company ID'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customers);
            return $result;
        }
    }
}