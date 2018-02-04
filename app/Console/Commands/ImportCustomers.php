<?php

namespace App\Console\Commands;

use App\Customer;
use App\CustomerAddress;
use App\Company;
use DB;
use Illuminate\Console\Command;

class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import customers from json';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Retrieve the data and save the data one by one
        $ch = curl_init();
        $url = "https://www.milletech.se/invoicing/export/customers";
        $this->info("Importing data from: " . $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $this->info("Sending request...");
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $this->info("Looping through customers...");
        $companies = [];
        foreach ($result as $customer) {
            $this->info("Inserting/updating customer with id: " . $customer['id']);
            $dbCustomer = Customer::findOrNew($customer['id']);
            $dbCustomer->fill($customer)->save();

            // Importing customers' addresses in customers' table (separately).

                if ($customer['address'] == !null) {

                $this->info("Inserting/updating address with id: " . $customer['address']['id']);
                $dbCustomerAddress = CustomerAddress::findOrNew($customer['address']['id']);
                $dbCustomerAddress->fill($customer['address'])->save();
            }
            // This solves Övning 6. It saves the companies info in a separate table, but linked to customers' table.
            $this->info("Inserting/updating customer with id: " . $customer['id']);
            $companies[] = $customer['customer_company'];
        }

        $companies = array_unique($companies);

        foreach ($companies as $company) {
            $this->info("Inserting/updating company table for " . $company);
            /* @var Company $dbCompany */
            $dbCompany = Company::findOrNew($company);
            $dbCompany->company_name = $company;

            $dbCompany->save();

            //Update statement
            DB::table('customers')
                ->where('customer_company', '=', $dbCompany->company_name)
                ->update(['company_id' => $dbCompany->id]);

        }
    }
}