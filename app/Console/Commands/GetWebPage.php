<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;


class GetWebPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching content of the page and saving it in a file.';

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
        $url = $this->argument('https://www.milletech.se/invoicing/export/products');
        $file = $this->argument('storage/app/products.json');

        $this->info("Initializing curl...");
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);              /* skickar bara tillbaka innehållet */
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);      /* Lagra data */

        $this->info("Sending request to:".$url);
        $response = curl_exec($curl);
        Storage::put($file, $response);
        $this->info("File stored at:".$file);
        var_dump($url, $file);
    }
}
