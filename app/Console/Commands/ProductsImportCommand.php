<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Imports\ProductsImport;

class ProductsImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from csv';

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
     * @return int
     */
    public function handle()
    {
        $this->output->title('Starting import');
        (new ProductsImport)->withOutput($this->output)->import('imports/openfoodfacts_search_coles.csv');
        $this->output->success('Import successful');
    }
}
