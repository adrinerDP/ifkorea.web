<?php

namespace App\Console\Commands;

use App\Models\Route;
use App\Services\Aquila\Import;
use Illuminate\Console\Command;

class ImportRoutes extends Command
{
    protected $signature = 'ifkorea:routes';
    protected $description = 'Import routes from excel file.';
    protected Import $import;

    public function __construct(Import $import)
    {
        parent::__construct();
        $this->import = $import;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (Route::count() > 0 && $this->confirm('Confirm overwrite to routes database?')) {
            Route::truncate();
        }
        return $this->import->routesFromExcel();
    }
}
