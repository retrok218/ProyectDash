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
    $tkasignado =DB::connection('pgsql2')->table('ticket')
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
    $tkasignado =DB::connection('pgsql2')->table('ticket')
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
    $tkasignado =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=', 6)
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


//tickets Por area
public function ticket_area(){
    $tk_por_area_1=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',1)->count();
    $tk_por_area_2=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',2)->count();
    $tk_por_area_3=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',3)->count();
    $tk_por_area_4=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',4)->count();

    $tk_por_area_32=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',32)->count();
    $tk_por_area_33=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',33)->count();

    $tk_por_area_36=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',36)->count();
    $tk_por_area_37=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',37)->count();
    


    return view('graficas/graficaporarea')
    ->with([
      'tk_por_area_1'=>$tk_por_area_1
      'tk_por_area_2'=>$tk_por_area_2
      'tk_por_area_3'=>$tk_por_area_3
      'tk_por_area_4'=>$tk_por_area_4

      

    ]);}

}