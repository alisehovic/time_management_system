<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Country;


class ImportCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

            if (($handle = fopen(public_path()."/csvs/countries.csv", "r")) !== FALSE)
            {
              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
                {
                    $country = new Country();
                    echo $data[0]. "\n";// . "<br />\n";
                    $country->name = $data[0];
                    $country->save();

                    
                }
                fclose($handle);
            }
    }
}
