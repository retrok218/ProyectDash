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
    ->orwhere('service_id','=',78 )
    ->join('queue','queue.id','queue_id')
    ->join('ticket_state','ticket_state.id','ticket_state_id')
    ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
    ->get();
    $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
    $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
    $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
    $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
    $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
    $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count();
    //$dependecia = DB:: conection('psql2')->table(); *** Creando
    //$consumible = DB::conection('psql2')->table();  *** Creando 

    return view('Consumibles/tickets_Sol_toner')
    ->with('tksolicitudToner',$tksolicitudToner)
    ->with('tickets_registro',$tickets_registro)
    ->with('ticket', $tickte)
    ->with('asignado',$asignado)
    ->with('atendido',$atendido)
    ->with('espinformacion',$espinformacion)
    ->with('pendienteatc',$pendienteatc)
    ->with('solicitudroner',$solicitudToner)

  ;}

  public function pr_sol_toner(){
    $perfil = Auth::user()->hasAnyRole(['SuperAdmin', 'Admin']);


      $tk_id = DB::connection('pgsql2')
        ->table('ticket_history')
        ->where('history_type_id', '=', 28)
        ->where('state_id','=', 13 )
        ->where('name','LIKE','%Value%%Toner%')
        ->orwhere('name','LIKE','%ITSMReviewRequired64%')
        ->orwhere('name','LIKE','%ITSMReviewRequired65%')
        ->orwhere('name','LIKE','%ITSMReviewRequired7%')
        ->orderBy('ticket_id','DESC')
        ->join('ticket','ticket_history.ticket_id','ticket.id')
        //->SELECT('ticket_id','ARRAY_AGG (name)' )

        //->select('ticket.tn as tktnumetoor','ticket_history.name', 'ticket_history.ticket_id','ticket_history.create_time')
        ->get();

//----------------------------------------------------------------------------------------------------
    //dd($perfil);
  if($perfil === true){

    return view('Consumibles/pr_solToner')
    ->with('tk_id',$tk_id );
  } else {
    return view('auth/login');
    }
  ;}



  //SELECT * FROM "public"."ticket_history" WHERE "public"."ticket_history"."name" LIKE '%toner%'
  public function tickets_esp_info(){
    $tickets_esp_info =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=', 15)
    ->join('queue','queue.id','queue_id')
    ->join('ticket_state','ticket_state.id','ticket_state_id')
    ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
    ->get();
    $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
    
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
      $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
      $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
      $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
      $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
      $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
      $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
      $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
      $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
      $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
      $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
      $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();

    return view('graficas/tickets_espera_informacion')
    ->with('tickets_esp_info',$tickets_esp_info)
    ->with('tickets_registro',$tickets_registro)
      ->with('ticket', $tickte)
      ->with('asignado',$asignado)
      ->with('atendido',$atendido)
      ->with('espinformacion',$espinformacion)
      ->with('pendienteatc',$pendienteatc)
      ->with('solicitudroner',$solicitudToner)
      ->with('abierto',$abierto)
      ->with('FaltaActaRES',$FaltaActaRES)
      ->with('cerradosinEX',$cerradosinEX)
      ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
      ->with('Entramite',$Entramite)
      ->with('cerradoPT',$cerradoPT)
      ->with('cerradoexitosamente',$rticket)
    


  ;}


  public function tickets_pendiente(){
    $tickets_pendiente =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=', 6)
    ->join('ticket_state','ticket_state.id','ticket_state_id')
    ->join('queue','queue.id','queue_id')
    ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
    ->get();
    $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
    
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
      $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
      $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
      $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
      $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
      $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
      $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
      $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
      $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
      $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
      $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
      $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();

        

    return view('graficas/tickets_pendientes')
    ->with('tickets_pendiente',$tickets_pendiente)
    ->with('tickets_registro',$tickets_registro)

    ->with('ticket', $tickte)
        ->with('asignado',$asignado)
        ->with('atendido',$atendido)
        ->with('espinformacion',$espinformacion)
        ->with('pendienteatc',$pendienteatc)
        ->with('solicitudroner',$solicitudToner)
        ->with('abierto',$abierto)
        ->with('FaltaActaRES',$FaltaActaRES)
        ->with('cerradosinEX',$cerradosinEX)
        ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
        ->with('Entramite',$Entramite)
        ->with('cerradoPT',$cerradoPT)
        ->with('cerradoexitosamente',$rticket)
        
    

    ;}

  public function tickets_falta_acta_responsiva(){
    $tickets_falta_acta_responsiva =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=', 21)
    ->join('ticket_state','ticket_state.id','ticket_state_id')
    ->join('queue','queue.id','queue_id')
    ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
    ->get();
    $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
    
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
      $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
      $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
      $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
      $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
      $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
      $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
      $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
      $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
      $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
      $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
      $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();

        

    return view('graficas/tickets_falta_acta_resp')
    ->with('tickets_falta_acta_responsiva',$tickets_falta_acta_responsiva)
    ->with('tickets_registro',$tickets_registro)

    ->with('ticket', $tickte)
        ->with('asignado',$asignado)
        ->with('atendido',$atendido)
        ->with('espinformacion',$espinformacion)
        ->with('pendienteatc',$pendienteatc)
        ->with('solicitudroner',$solicitudToner)
        ->with('abierto',$abierto)
        ->with('FaltaActaRES',$FaltaActaRES)
        ->with('cerradosinEX',$cerradosinEX)
        ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
        ->with('Entramite',$Entramite)
        ->with('cerradoPT',$cerradoPT)
        ->with('cerradoexitosamente',$rticket)
  ;}

  public function tickets_abiertos(){

    $tickets_abiertos =DB::connection('pgsql2')->table('ticket')
    ->where('ticket_state_id','=',4)
    ->join('ticket_state','ticket_state.id','ticket_state_id')
    ->join('queue','queue.id','queue_id')
    ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
    ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
    ->get();
    $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
    
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
      $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
      $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
      $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
      $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
      $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
      $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
      $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
      $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
      $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
      $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
      $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
      $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();

    return view('graficas/tickets_abiertos')
    ->with('tickets_abiertos',$tickets_abiertos)
    ->with('tickets_registro',$tickets_registro)

    ->with('ticket', $tickte)
        ->with('asignado',$asignado)
        ->with('atendido',$atendido)
        ->with('espinformacion',$espinformacion)
        ->with('pendienteatc',$pendienteatc)
        ->with('solicitudroner',$solicitudToner)
        ->with('abierto',$abierto)
        ->with('FaltaActaRES',$FaltaActaRES)
        ->with('cerradosinEX',$cerradosinEX)
        ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
        ->with('Entramite',$Entramite)
        ->with('cerradoPT',$cerradoPT)
        ->with('cerradoexitosamente',$rticket)
    ;}



    public function tickets_cerrados_exitosamente(){

      $tickets_cerrados_exitosamente =DB::connection('pgsql2')->table('ticket')
      ->where('ticket_state_id','=',2)
      ->join('ticket_state','ticket_state.id','ticket_state_id')
      ->join('queue','queue.id','queue_id')
      ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
      ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
      ->get();
      $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
      
      $tickte = DB::connection('pgsql2')->table('ticket')->count();
        $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
        $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
        $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
        $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
        $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
        $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
        $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
        $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
        $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
        $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
        $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
        $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
  
      return view('graficas/tickets_cerrados_exitosamente')
      ->with('tickets_cerrados_exitosamente',$tickets_cerrados_exitosamente)
      ->with('tickets_registro',$tickets_registro)
  
      ->with('ticket', $tickte)
          ->with('asignado',$asignado)
          ->with('atendido',$atendido)
          ->with('espinformacion',$espinformacion)
          ->with('pendienteatc',$pendienteatc)
          ->with('solicitudroner',$solicitudToner)
          ->with('abierto',$abierto)
          ->with('FaltaActaRES',$FaltaActaRES)
          ->with('cerradosinEX',$cerradosinEX)
          ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
          ->with('Entramite',$Entramite)
          ->with('cerradoPT',$cerradoPT)
          ->with('cerradoexitosamente',$rticket)
      ;}



      public function tickets_cerradosPT(){

        $tickets_cerradosPT =DB::connection('pgsql2')->table('ticket')
        ->where('ticket_state_id','=',10)
        ->join('ticket_state','ticket_state.id','ticket_state_id')
        ->join('queue','queue.id','queue_id')
        ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
        ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
        ->get();
        $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
        
        $tickte = DB::connection('pgsql2')->table('ticket')->count();
          $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
          $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
          $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
          $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
          $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
          $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
          $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
          $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
          $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
          $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
          $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
          $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
    
        return view('graficas/tickets_cerradosPT')
        ->with('tickets_cerradosPT',$tickets_cerradosPT)
        ->with('tickets_registro',$tickets_registro)
    
        ->with('ticket', $tickte)
            ->with('asignado',$asignado)
            ->with('atendido',$atendido)
            ->with('espinformacion',$espinformacion)
            ->with('pendienteatc',$pendienteatc)
            ->with('solicitudroner',$solicitudToner)
            ->with('abierto',$abierto)
            ->with('FaltaActaRES',$FaltaActaRES)
            ->with('cerradosinEX',$cerradosinEX)
            ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
            ->with('Entramite',$Entramite)
            ->with('cerradoPT',$cerradoPT)
            ->with('cerradoexitosamente',$rticket)  
        ;}

        public function notificadosalusuario(){

          $tickets_notificadosalusuario =DB::connection('pgsql2')->table('ticket')
          ->where('ticket_state_id','=',11)
          ->join('ticket_state','ticket_state.id','ticket_state_id')
          ->join('queue','queue.id','queue_id')
          ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
          ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
          ->get();
          $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
          
          
          $tickte = DB::connection('pgsql2')->table('ticket')->count();
            $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
            $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
            $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
            $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
            $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
            $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
            $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
            $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
            $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
            $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
            $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
            $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
      
          return view('graficas/tickets_notificado_al_usuario')
          ->with('tickets_notificadosalusuario',$tickets_notificadosalusuario)
          ->with('tickets_registro',$tickets_registro)
      
          ->with('ticket', $tickte)
              ->with('asignado',$asignado)
              ->with('atendido',$atendido)
              ->with('espinformacion',$espinformacion)
              ->with('pendienteatc',$pendienteatc)
              ->with('solicitudroner',$solicitudToner)
              ->with('abierto',$abierto)
              ->with('FaltaActaRES',$FaltaActaRES)
              ->with('cerradosinEX',$cerradosinEX)
              ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
              ->with('Entramite',$Entramite)
              ->with('cerradoPT',$cerradoPT)
              ->with('cerradoexitosamente',$rticket)  
          ;}

          public function monitoreo_tks (){
            $tickte = DB::connection('pgsql2')->table('ticket')->count();
            $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
            $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
            $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
            $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
            $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
            $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
            $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
            $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
            $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
            $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
            $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
            $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
            return view('graficas/monitoreo_tks')
            ->with('ticket', $tickte)
              ->with('asignado',$asignado)
              ->with('atendido',$atendido)
              ->with('espinformacion',$espinformacion)
              ->with('pendienteatc',$pendienteatc)
              ->with('solicitudroner',$solicitudToner)
              ->with('abierto',$abierto)
              ->with('FaltaActaRES',$FaltaActaRES)
              ->with('cerradosinEX',$cerradosinEX)
              ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
              ->with('Entramite',$Entramite)
              ->with('cerradoPT',$cerradoPT)
              ->with('cerradoexitosamente',$rticket) 
          ;}


}