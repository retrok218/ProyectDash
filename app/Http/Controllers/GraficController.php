<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ModelHasRole;
use App\Requests\UserRequest;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\ConexionBD2;


class GraficController extends Controller
{
    public function index()
    {

      $perfil = Auth::user()->hasAnyRole(['SuperAdmin', 'Admin']);

// regresa la vista admin.dashboard





      $fecha_actual = Carbon::now()->toDateString(); //fecha ->toDateString da el formato que maneja la bd
      $fecha_mes = Carbon::now()->format('m');
      $fecha_dia = Carbon::now()->format('d');
      $fecha_año = Carbon::now()->format('Y');
      $fecha_mesp= $fecha_mes-1;
      $fecha_añop= $fecha_año-1;
      $fecha_diap= $fecha_dia-1;



      $tickte = DB::connection('pgsql2')->table('ticket')->count();
      $ticket_all = DB::connection('pgsql2')->table('ticket')->get();
      $nuevo = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',1)->count();
      $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
      $cerradocinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
      $open = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
      $removed = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',5)->count();
      $pendienteRE = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',6)->count();
      $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
      $pendienteAC = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',8)->count();
      $merged = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',9)->count();
      $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count();  // crear grafica y tabla
      $notificadoalU = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',11)->count();
      $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count(); // crear tabla para visualizar
      $CerradoPT2 = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',14)->count();
      $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count();
      $merged = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',16)->count();
      $Documentofirmado = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',17)->count();
      $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
      $FaltaDocumentar = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',19)->count();
      $FalteActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();

      //$prueba = DB::connection('pgsql2')-> table('prueba')->count();
      $SolicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
      $impresorasintt = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',78)->count();
      $tickets_por_dia=DB::connection('pgsql2')->table('ticket')->whereDate('create_time',('='),$fecha_actual)->count();
      $tickets_por_mes=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',$fecha_mes)
                                          ->whereYear('create_time','=',$fecha_año)->count();
      $tickets_por_año=DB::connection('pgsql2')->table('ticket')->whereYear('create_time','=',$fecha_año)->count();
      $ticket_mespasado=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',$fecha_mesp)
                                          ->whereYear('create_time','=',$fecha_año)
                                           ->count();
      $ticket_diap=DB::connection('pgsql2')->table('ticket')->whereDay('create_time','=',$fecha_diap)
                                      ->whereYear('create_time','=',$fecha_año)
                                      ->count();
                                      // datos segun el mes
      $mes_enero=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 1)
                                    ->whereYear('create_time','=', $fecha_año)
                                    ->count();
      $mes_febrero=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 2)
                                                                  ->whereYear('create_time','=', $fecha_año)
                                                                  ->count();
      $mes_marzo=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 3)
                                                  ->whereYear('create_time','=', $fecha_año)
                                                  ->count();
      $mes_abril=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 4)
                                                              ->whereYear('create_time','=', $fecha_año)
                                                              ->count();

      // Grafica lineal mes pasado

      $mes_enero2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 1)
                                    ->whereYear('create_time','=', $fecha_añop)
                                    ->count();
      $mes_febrero2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 2)
                                                                  ->whereYear('create_time','=', $fecha_añop)
                                                                  ->count();
      $mes_marzo2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 3)
                                                  ->whereYear('create_time','=', $fecha_añop)
                                                  ->count();
      $mes_abril2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 4)
                                                              ->whereYear('create_time','=', $fecha_añop)
                                                              ->count();

    if($perfil == true){
      return view('dash')
      ->with('ticket', $tickte)
      ->with('asignado',$asignado)
      ->with('atendido',$atendido)
      ->with('espinformacion',$espinformacion)
      ->with('rticket', $rticket)
      //->with('pendiente', $pendiente)
      //->with('abierto' , $abierto)
      //seleccionados
      ->with('pendienteatc',$pendienteatc)
      ->with('nuevo',$nuevo)
      ->with('cerradocinEX',$cerradocinEX)
      ->with('open',$open)
      ->with('removed',$removed)
      ->with('pendienteRE',$pendienteRE)
      ->with('pendienteAC',$pendienteAC)
      ->with('merged',$merged)
      ->with('cerradoPT',$cerradoPT)
      ->with('notificadoalU',$notificadoalU)
      ->with('CerradoPT2',$CerradoPT2)
      ->with('merged',$merged)
      ->with('Documentofirmado',$Documentofirmado)
      ->with('Entramite',$Entramite)
      ->with('FaltaDocumentar',$FaltaDocumentar)
      ->with('FalteActaRES',$FalteActaRES)


      ->with('solicitudroner',$SolicitudToner)
      ->with('impresorasintt',$impresorasintt)
      ->with('tickets_por_mes',$tickets_por_mes)
      ->with('tickets_por_dia',$tickets_por_dia)
      ->with('ticket_pot_año',$tickets_por_año)

      // ->with('pmes',$tickets_prueva_mes)
      // ->with('ticket_por_mes',$ticket_por_mes)

      // fecha fragmentada
      ->with('mes',$fecha_mes)
      ->with('dia',$fecha_dia)
      ->with('año',$fecha_año)
      ->with('mesp',$ticket_mespasado)
      ->with('diap',$ticket_diap)
      ->with('pruemesp',$ticket_mespasado)
      ->with('mes_enero',$mes_enero)
      ->with('mes_febrero',$mes_febrero)
      ->with('mes_marzo',$mes_marzo)
      ->with('mes_abril',$mes_abril)
      ->with('mes_enero2',$mes_enero2)
      ->with('mes_febrero2',$mes_febrero2)
      ->with('mes_marzo2',$mes_marzo2)
      ->with('mes_abril2',$mes_abril2)



      // iff
    ;}

    else {
        return view('/home');
    }

      ;}


// controlador para datatable de los tickets totales
    // public function tickett(){
    //   $tickets_totales =DB::table('ticket')
    //   ->join('queue','queue.id','=','ticket.id')
    //   ->select('*')
    //   ->get();
    //   return view('graficas/tablatickets')
    //   ->with('tickets_totales',$tickets_totales)
    //
    // ;}







    // controlador para tickets asignados
    public function ticketa(){
      $tkasignado =DB::connection('pgsql2')->table('ticket')
      ->where('ticket_state_id','=', 12)
      ->join('queue','queue.id','queue_id')
      ->select('ticket.tn','ticket.create_time','ticket.title','queue.name','ticket.customer_user_id')
      ->get();
      $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
      $tickte = DB::connection('pgsql2')->table('ticket')->count();
      $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
      $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
      $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
      $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count();


      return view('graficas/tickets_asignados')
      ->with('tkasignado',$tkasignado)
      ->with('tickets_registro',$tickets_registro)
      ->with('ticket', $tickte)
      ->with('asignado',$asignado)
      ->with('atendido',$atendido)
      ->with('espinformacion',$espinformacion)
      ->with('pendienteatc',$pendienteatc)
      ->with('solicitudroner',$solicitudToner)

    ;}
// Fin Controlador tickets asignados


// controlador tickets totales
    public function graficas()
    {
      $tickets_totales =DB::connection('pgsql2')->table('ticket')
      ->join('queue','queue.id','queue_id')
      ->select('ticket.tn','ticket.create_time','ticket.title','queue.name','ticket.customer_user_id')
      ->get();

      $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
      $tickte = DB::connection('pgsql2')->table('ticket')->count();
      $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
      $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
      $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
      $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
      $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count();

      return view('graficas/estatustickets')
      ->with('ticket', $tickte)
      ->with('asignado',$asignado)
      ->with('atendido',$atendido)
      ->with('espinformacion',$espinformacion)
      ->with('rticket', $rticket)
      ->with('pendienteatc',$pendienteatc)
      ->with('solicitudroner',$solicitudToner)
      ->with('tickets_registro',$tickets_registro)
      ->with('tickets_totales',$tickets_totales)

    ;}


// controlador tickets Atendidos
  public function tickets_atendidos()
  {
    $tkasignado =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=', 13)
    ->join('queue','queue.id','queue_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','queue.name','ticket.customer_user_id')
    ->get();
    $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
    $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
    $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
    $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
    $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
    $espinformacion = DB::connection('pgsql2')->  table('ticket')->where('ticket_state_id','=', 15)->count();

    return view('graficas/tickets_atendidos')
    ->with('tkasignado',$tkasignado)
    ->with('tickets_registro',$tickets_registro)
    ->with('ticket', $tickte)
    ->with('asignado',$asignado)
    ->with('atendido',$atendido)
    ->with('espinformacion',$espinformacion)

    ->with('pendienteatc',$pendienteatc)
    ->with('solicitudroner',$solicitudToner)

  ;}
}
