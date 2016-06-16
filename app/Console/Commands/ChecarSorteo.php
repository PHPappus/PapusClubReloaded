<?php

namespace papusclub\Console\Commands;

use Illuminate\Console\Command;
use papusclub\Models\Sorteo;
use papusclub\Models\Reserva;


class ChecarSorteo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:sorteo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecuta el sorteo y transfiere las reservas necesarias';

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
        \Log::info('I was here @ '. \Carbon\Carbon::now());
    }
}
