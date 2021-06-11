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





class Tks_DT_controlle extends Controller
{
  public function tickets_sol_toner()
  {
    $tksolicitudToner =DB::connection('pgsql2')->table('ticket')
    ->where('service_id','=', 79)
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

    return view('graficas/tickets_Sol_toner')
    ->with('tksolicitudToner',$tksolicitudToner)
    ->with('tickets_registro',$tickets_registro)
    ->with('ticket', $tickte)
    ->with('asignado',$asignado)
    ->with('atendido',$atendido)
    ->with('espinformacion',$espinformacion)

    ->with('pendienteatc',$pendienteatc)
    ->with('solicitudroner',$solicitudToner)

  ;}


  public function tickets_esp_info(){
    $tickets_esp_info =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=', 15)
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

    return view('graficas/tickets_espera_informacion')
    ->with('tickets_esp_info',$tickets_esp_info)
    ->with('tickets_registro',$tickets_registro)
    ->with('ticket', $tickte)
    ->with('asignado',$asignado)
    ->with('atendido',$atendido)
    ->with('espinformacion',$espinformacion)

    ->with('pendienteatc',$pendienteatc)
    ->with('solicitudroner',$solicitudToner)


  ;}


  public function tickets_pendiente(){
    $tickets_pendiente =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=', 6)
    ->join('queue','queue.id','queue_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','queue.name','ticket.customer_user_id')
    ->get();
    $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
    $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
    $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
    $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',6)->count();
    $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
    $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count();

    

    return view('graficas/tickets_pendientes')
    ->with('tickets_pendiente',$tickets_pendiente)
    ->with('tickets_registro',$tickets_registro)
    ->with('ticket', $tickte)
    ->with('asignado',$asignado)
    ->with('atendido',$atendido)
    ->with('espinformacion',$espinformacion)

    ->with('pendienteatc',$pendienteatc)
    ->with('solicitudroner',$solicitudToner)

    ;}

    

  public function velocimetrog(){
    $tkstotales = DB::connection('pgsql2')->table('ticket')->count();
    $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();


    return view('graficas/grafvelocimetro')
    ->with('tkstotales',$tkstotales)
    ->with('rticket',$rticket)
    ;}

   

}