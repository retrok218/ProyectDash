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


class GraficController extends Controller
{
    public function index()
    {
      $fecha_actual = Carbon::now()->toDateString(); //fecha ->toDateString da el formato que maneja la bd
      $fecha_mes = Carbon::now()->format('m');
      $fecha_dia = Carbon::now()->format('d');
      $fecha_año = Carbon::now()->format('Y');
      $fecha_mesp= $fecha_mes-1;
      $fecha_añop= $fecha_año-1;
      $fecha_diap= $fecha_dia-1;



      $tickte = DB::table('ticket')->count();
      $ticket_all = DB::table('ticket')->get();
      $asignado =DB::table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::table('ticket')->where('ticket_state_id','=', 13)->count();
      $espinformacion = DB::table('ticket')->where('ticket_state_id','=', 15)->count();
      $rticket = DB::table('ticket')->where('ticket_state_id','=', 2)->count();
      //$prueba = DB:: table('prueba')->count();
      $pendienteatc = DB:: table('ticket')->where('ticket_state_id','=',7)->count();
      $new = DB:: table('ticket')->where('ticket_state_id','=',1)->count();
      $cerradocinEX = DB:: table('ticket')->where('ticket_state_id','=',3)->count();
      $open = DB:: table('ticket')->where('ticket_state_id','=',4)->count();
      $removed = DB:: table('ticket')->where('ticket_state_id','=',5)->count();
      $pendienteRE = DB:: table('ticket')->where('ticket_state_id','=',6)->count();
      $pendienteAC = DB:: table('ticket')->where('ticket_state_id','=',8)->count();
      $merged = DB:: table('ticket')->where('ticket_state_id','=',9)->count();
      $cerradoPT = DB:: table('ticket')->where('ticket_state_id','=',10)->count();
      $notificadoalU = DB:: table('ticket')->where('ticket_state_id','=',11)->count();
      $CerradoPT2 = DB:: table('ticket')->where('ticket_state_id','=',14)->count();
      $merged = DB:: table('ticket')->where('ticket_state_id','=',16)->count();
      $Documentofirmado = DB:: table('ticket')->where('ticket_state_id','=',17)->count();
      $Entramite = DB:: table('ticket')->where('ticket_state_id','=',18)->count();
      $FaltaDocumentar = DB:: table('ticket')->where('ticket_state_id','=',19)->count();
      $FalteActaRES = DB:: table('ticket')->where('ticket_state_id','=',21)->count();
      $SolicitudToner = DB:: table('ticket')->where('service_id','=',79)->count();
      $impresorasintt = DB:: table('ticket')->where('service_id','=',78)->count();
      $tickets_por_dia=DB::table('ticket')->whereDate('create_time',('='),$fecha_actual)->count();

      $tickets_por_mes=DB::table('ticket')->whereMonth('create_time','=',$fecha_mes)
                                          ->whereYear('create_time','=',$fecha_año)->count();

      $tickets_por_año=DB::table('ticket')->whereYear('create_time','=',$fecha_año)->count();


      $ticket_mespasado=DB::table('ticket')->whereMonth('create_time','=',$fecha_mesp)
                                          ->whereYear('create_time','=',$fecha_año)
                                           ->count();

      $ticket_diap=DB::table('ticket')->whereDay('create_time','=',$fecha_diap)
                                      ->whereYear('create_time','=',$fecha_año)
                                      ->count();
      //$ticket_por_mes = DB::table('ticket')->whereMonth('create_time', ('='),1)->count();
      $progresbar  = ($rticket*100) / $tickte ;


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
      ->with('new',$new)
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
      //->with('prueba', $prueba)
      ->with('progreso',$progresbar)
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

      ->with('pruemesp',$ticket_mespasado)
      ->with('diap',$ticket_diap)
      ;}



    public function prueva()
    {
      $tickets_registro =DB::table('ticket')->get();

      $tickte = DB::table('ticket')->count();
      $asignado =DB::table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::table('ticket')->where('ticket_state_id','=', 13)->count();
      $espinformacion = DB::table('ticket')->where('ticket_state_id','=', 15)->count();
      $rticket = DB::table('ticket')->where('ticket_state_id','=', 2)->count();
      //$prueba = DB:: table('prueba')->count();
      $pendienteatc = DB:: table('ticket')->where('ticket_state_id','=',7)->count();
      $new = DB:: table('ticket')->where('ticket_state_id','=',1)->count();
      $cerradocinEX = DB:: table('ticket')->where('ticket_state_id','=',3)->count();
      $open = DB:: table('ticket')->where('ticket_state_id','=',4)->count();
      $removed = DB:: table('ticket')->where('ticket_state_id','=',5)->count();
      $pendienteRE = DB:: table('ticket')->where('ticket_state_id','=',6)->count();
      $pendienteAC = DB:: table('ticket')->where('ticket_state_id','=',8)->count();
      $merged = DB:: table('ticket')->where('ticket_state_id','=',9)->count();
      $cerradoPT = DB:: table('ticket')->where('ticket_state_id','=',10)->count();
      $notificadoalU = DB:: table('ticket')->where('ticket_state_id','=',11)->count();
      $CerradoPT2 = DB:: table('ticket')->where('ticket_state_id','=',14)->count();
      $merged = DB:: table('ticket')->where('ticket_state_id','=',16)->count();
      $Documentofirmado = DB:: table('ticket')->where('ticket_state_id','=',17)->count();
      $Entramite = DB:: table('ticket')->where('ticket_state_id','=',18)->count();
      $FaltaDocumentar = DB:: table('ticket')->where('ticket_state_id','=',19)->count();
      $FalteActaRES = DB:: table('ticket')->where('ticket_state_id','=',21)->count();
      $SolicitudToner = DB:: table('ticket')->where('service_id','=',79)->count();
      $impresorasintt = DB:: table('ticket')->where('service_id','=',78)->count();

      return view('graficas/tablatickets')
      ->with('ticket', $tickte)
      ->with('asignado',$asignado)
      ->with('atendido',$atendido)
      ->with('espinformacion',$espinformacion)
      ->with('rticket', $rticket)
      ->with('pendienteatc',$pendienteatc)
      ->with('solicitudroner',$SolicitudToner)
      ->with('tickets_registro',$tickets_registro)
    ;}  



















    public function graficas()
    {

      $tickets_registro =DB::table('ticket')->get();

      $tickte = DB::table('ticket')->count();
      $asignado =DB::table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::table('ticket')->where('ticket_state_id','=', 13)->count();
      $espinformacion = DB::table('ticket')->where('ticket_state_id','=', 15)->count();
      $rticket = DB::table('ticket')->where('ticket_state_id','=', 2)->count();
      //$prueba = DB:: table('prueba')->count();
      $pendienteatc = DB:: table('ticket')->where('ticket_state_id','=',7)->count();
      $new = DB:: table('ticket')->where('ticket_state_id','=',1)->count();
      $cerradocinEX = DB:: table('ticket')->where('ticket_state_id','=',3)->count();
      $open = DB:: table('ticket')->where('ticket_state_id','=',4)->count();
      $removed = DB:: table('ticket')->where('ticket_state_id','=',5)->count();
      $pendienteRE = DB:: table('ticket')->where('ticket_state_id','=',6)->count();
      $pendienteAC = DB:: table('ticket')->where('ticket_state_id','=',8)->count();
      $merged = DB:: table('ticket')->where('ticket_state_id','=',9)->count();
      $cerradoPT = DB:: table('ticket')->where('ticket_state_id','=',10)->count();
      $notificadoalU = DB:: table('ticket')->where('ticket_state_id','=',11)->count();
      $CerradoPT2 = DB:: table('ticket')->where('ticket_state_id','=',14)->count();
      $merged = DB:: table('ticket')->where('ticket_state_id','=',16)->count();
      $Documentofirmado = DB:: table('ticket')->where('ticket_state_id','=',17)->count();
      $Entramite = DB:: table('ticket')->where('ticket_state_id','=',18)->count();
      $FaltaDocumentar = DB:: table('ticket')->where('ticket_state_id','=',19)->count();
      $FalteActaRES = DB:: table('ticket')->where('ticket_state_id','=',21)->count();
      $SolicitudToner = DB:: table('ticket')->where('service_id','=',79)->count();
      $impresorasintt = DB:: table('ticket')->where('service_id','=',78)->count();

      return view('graficas/estatustickets')
      ->with('ticket', $tickte)
      ->with('asignado',$asignado)
      ->with('atendido',$atendido)
      ->with('espinformacion',$espinformacion)
      ->with('rticket', $rticket)
      ->with('pendienteatc',$pendienteatc)
      ->with('solicitudroner',$SolicitudToner)
      ->with('tickets_registro',$tickets_registro)
    ;}
}
