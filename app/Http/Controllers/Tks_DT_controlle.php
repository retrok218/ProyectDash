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





class Tks_DT_controlle extends Controller
{
  public function tickets_sol_toner()
  {
    $tkasignado =DB::table('ticket')
    ->where('service_id','=', 79)
    ->join('queue','queue.id','queue_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','queue.name','ticket.customer_user_id')
    ->get();
    $tickets_registro =DB::table('ticket') ->get();
    $tickte = DB::table('ticket')->count();
    $asignado =DB::table('ticket')->where('ticket_state_id','=', 12)->count();
    $atendido = DB::table('ticket')->where('ticket_state_id','=', 13)->count();
    $pendienteatc = DB:: table('ticket')->where('ticket_state_id','=',7)->count();
    $solicitudToner = DB:: table('ticket')->where('service_id','=',79)->count();
    $espinformacion = DB::table('ticket')->where('ticket_state_id','=', 15)->count();

    return view('graficas/tickets_Sol_toner')
    ->with('tkasignado',$tkasignado)
    ->with('tickets_registro',$tickets_registro)
    ->with('ticket', $tickte)
    ->with('asignado',$asignado)
    ->with('atendido',$atendido)
    ->with('espinformacion',$espinformacion)

    ->with('pendienteatc',$pendienteatc)
    ->with('solicitudroner',$solicitudToner)

  ;}


  public function tickets_esp_info(){
    $tkasignado =DB::table('ticket')
    ->where('ticket_state_id','=', 15)
    ->join('queue','queue.id','queue_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','queue.name','ticket.customer_user_id')
    ->get();
    $tickets_registro =DB::table('ticket') ->get();
    $tickte = DB::table('ticket')->count();
    $asignado =DB::table('ticket')->where('ticket_state_id','=', 12)->count();
    $atendido = DB::table('ticket')->where('ticket_state_id','=', 13)->count();
    $pendienteatc = DB:: table('ticket')->where('ticket_state_id','=',7)->count();
    $solicitudToner = DB:: table('ticket')->where('service_id','=',79)->count();
    $espinformacion = DB::table('ticket')->where('ticket_state_id','=', 15)->count();

    return view('graficas/tickets_espera_informacion')
    ->with('tkasignado',$tkasignado)
    ->with('tickets_registro',$tickets_registro)
    ->with('ticket', $tickte)
    ->with('asignado',$asignado)
    ->with('atendido',$atendido)
    ->with('espinformacion',$espinformacion)

    ->with('pendienteatc',$pendienteatc)
    ->with('solicitudroner',$solicitudToner)


  ;}


  public function tickets_pendiente(){
    $tkasignado =DB::table('ticket')
    ->where('ticket_state_id','=', 6)
    ->join('queue','queue.id','queue_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','queue.name','ticket.customer_user_id')
    ->get();
    $tickets_registro =DB::table('ticket') ->get();
    $tickte = DB::table('ticket')->count();
    $asignado =DB::table('ticket')->where('ticket_state_id','=', 12)->count();
    $atendido = DB::table('ticket')->where('ticket_state_id','=', 13)->count();
    $pendienteatc = DB:: table('ticket')->where('ticket_state_id','=',7)->count();
    $solicitudToner = DB:: table('ticket')->where('service_id','=',79)->count();
    $espinformacion = DB::table('ticket')->where('ticket_state_id','=', 15)->count();

    return view('graficas/tickets_pendientes')
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
