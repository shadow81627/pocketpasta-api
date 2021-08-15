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
    public function handle(): int
    {
        $this->output->title('Starting import');
        (new ProductsImport)->queue('imports/openfoodfacts_search_coles.csv')->allOnQueue('imports');
        $this->output->success('Import successful');
        return 0;
    }
}
