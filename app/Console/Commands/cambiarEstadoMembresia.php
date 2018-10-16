<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Membresia;
use App\EstadoMembresia;

class cambiarEstadoMembresia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'membresias:actualizar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'actializa el estado de la mebresia en funcion de la fecha actual';

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
         $membresias=Membresia::where('estado_membresia_id',1)
         ->orWhere('estado_membresia_id',2)
         ->orWhere('estado_membresia_id',3)
         ->get();
        
       
       
        $estadoPendiente=EstadoMembresia::find(2);
        $estadoMoroso=EstadoMembresia::find(3);
        $estadoPerdido=EstadoMembresia::find(5);
        $estadoActivo=EstadoMembresia::find(1);

        $fechaLimitePago =$this->fechaLimitePago();
        $fechaLimiteMoroso=$this->fechaLimiteMoroso() ;
        $fechaInicioMes=$this->fechaInicioMes();

        foreach ($membresias as $mem) {

            if($mem->fecha_vencimiento < $fechaLimiteMoroso){
                $mem->estado_membresia()->associate($estadoPerdido);
            }elseif($mem->fecha_vencimiento< $fechaInicioMes){
                $mem->estado_membresia()->associate($estadoMoroso);
            }elseif($mem->fecha_vencimiento< $fechaLimitePago){
                $mem->estado_membresia()->associate($estadoPendiente);
            }else{
                $mem->estado_membresia()->associate($estadoActivo);
            }
            $mem->save();
            
        }
       
    }

    public function fechaLimitePago() {
        $month = date('m');
        $year = date('Y');
        return date('Y-m-d', mktime(0,0,0, $month, 10, $year));
    }

    public function fechaLimiteMoroso() {
        $month = date('m');
        $year = date('Y');
        return date('Y-m-d', mktime(0,0,0, $month-1, 1, $year));
    }

    public function fechaInicioMes() {
        $month = date('m');
        $year = date('Y');
        return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
    }


}
