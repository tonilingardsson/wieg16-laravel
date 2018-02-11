<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CustomerAddress;
use App\Item;
use App\Order;

class ImportOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing orders from Milletech';

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
        $ch = curl_init();
        $url = "https://www.milletech.se/invoicing/export/";
        $this->info("Importing data from: ".$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $this->info("Sending request...");
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $this->info("Retaining only orders with status:processing...");
        $allowed = 'processing';
        $filtered = array_filter($result, function ($order) use ($allowed) {
            if (stripos($order['status'], $allowed) !== false) {
                return true;
            }
            return false;
        });
        $this->info("Looping through orders...");
        foreach ($filtered as $order) {
            $this->info("Inserting/updating order number: ".$order['id']);
            $dbOrder = Order::findOrNew($order['id']);
            $dbOrder->fill($order)->save();
            $this->info("Inserting/updating addresses...");
            // Importing billing address
            if ($order['billing_address']==!null) {
                $this->info("Inserting/updating billing address with number: ".$order['billing_address']['id']);
                $dbItems = CustomerAddress::findOrNew($order['billing_address']['id']);
                $dbItems->fill($order['billing_address'])->save();
            }
            // Importing shipping address
            if ($order['shipping_address']==!null) {
                $this->info("Inserting/updating shipping address with number: ".$order['shipping_address']['id']);
                $dbItems = CustomerAddress::findOrNew($order['shipping_address']['id']);
                $dbItems->fill($order['shipping_address'])->save();
            }
            if (is_array($order['items'])) {
                foreach ($order['items'] as $item) {
                    $dbItem = Item::findOrNew($item['id']);
                    $dbItem->fill($item)->save();
                }
            }
        }

    }
}
