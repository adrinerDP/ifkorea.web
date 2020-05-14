<?php

namespace App\Console\Commands;

use App\Models\Airport;
use App\Services\Aquila\ImportRoutes;
use Illuminate\Console\Command;

class ImportAirports extends Command
{
    protected $signature = 'ifkorea:airport';

    protected $description = 'Import Airport database from OpenFlights.org';

    protected ImportRoutes $import;

    /**
     * ImportAirports constructor.
     * @param ImportRoutes $import
     */
    public function __construct(ImportRoutes $import)
    {
        parent::__construct();
        $this->import = $import;
    }

    /**
     * Import airports from API.
     * @return bool
     */
    public function handle()
    {
        if (Airport::count() > 0 &&  $this->confirm('Confirm overwrite airports database?')) {
            Airport::truncate();
            return $this->import->fromOpenFlights();
        } else {
            return false;
        }
    }
}
