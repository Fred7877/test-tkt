<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Compagny;

class RecoverDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recover:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows the recovery of the data of compagnies contained in the mock file mock_data.json';

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
        $file = base_path().'/mock_data.json';
        if(File::exists($file)) {
            collect(json_decode(File::get($file), true))->each(function($compagny) {
                Compagny::with('results')->firstOrCreate(
                    [
                        'name' => $compagny['name'],
                        'sector' => $compagny['sector'],
                        'siren' => $compagny['siren']
                    ]
                )->results()->createMany($compagny['results']);
            });

        } else {
            $this->error('le fichier mock_data.json doit être présent à la racine du projet.');
        }
    }
}
