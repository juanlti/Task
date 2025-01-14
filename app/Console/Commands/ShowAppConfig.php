<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ShowAppConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:timeZone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info(' ------------ formato y horario de la app ------------ ');
        $timezone = Config::get('app.timezone');
        $locale = Config::get('app.locale');
        $currentDateTime = now()->format('Y-m-d H:i:s');

        $this->info("Zona horaria: $timezone");
        $this->info("Idioma: $locale");
        $this->info("Fecha y hora actual: $currentDateTime");

        $this->info(' ------------ formato y horario de la bd ------------ ');

        $timezone = DB::select("SHOW VARIABLES LIKE 'time_zone'");
        $dateFormat = DB::select("SELECT DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s') AS formatted_date");

        $this->info("Zona horaria de la base de datos: " . $timezone[0]->Value);
        $this->info("Formato de fecha de la base de datos: " . $dateFormat[0]->formatted_date);
    }
}
