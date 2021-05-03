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
use App\ConexionBD2;
class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $datos = User::where('id', auth()->user()->id)->get();
        return view('usuarios.perfil', compact('datos'));
    }
    public function dashboard()
    {
       $perfil = Auth::user()->hasAnyRole(['SuperAdmin', 'Admin']);
       if($perfil == true){
// regresa la vista admin.dashboard
       return view('/admin.dashboard');}
       else {
           return view('/home');
       }

    }




    public function create() {
                $roles = DB::table('roles')->get();
                return view('modals/users/add_user')->with('roles', $roles);
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuarios\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $datosRoles = User::getRol($id);
        $roles = DB::table('roles')->get();
        $user = User::find($id);
        return view('modals/users/edit_user')
            ->with(compact('user'))
            ->with(compact('datosRoles'))
            ->with(compact('roles'));
    }
    /**
     * Actualizar usuario.
     *
     * @param  Request  $request
     * @param  Users  $users
     * @return Response
     */
    public function update(Request $request, User $users)
    {
        \Log::info(__METHOD__);
        try {
            $id = $request->id_usuario;
            $id_rol = $request->id_rol;
            $estatus = ($request->estatus_user == "on" )? 1 : 0;

            $users = User::find($id);
            $users->name = $request->nombres;
            $users->apellido_paterno = $request->apellido_paterno;
            $users->apellido_materno = $request->apellido_materno;
            $users->email = $request->correo;
            $users->estatus = $estatus;
            $users->id_rol = $id_rol;
            // Actualización de password
            if ($request->filled('password') && $request->filled('password2') ) {
                $password = $request->password;
                $pass2 = $request->password2;
                if ($password == $pass2) {
                    $password = Hash::make($password);
                    $users->password = $password;
                }
            }
            $users->save();
            $idUsuarioRol = DB::table('model_has_roles')->where('model_id', '=', $id)->first();
            $idUsuarioRolAnterior = $idUsuarioRol->role_id;

            ModelHasRole::where('model_id', $id)
               ->where('role_id', $idUsuarioRolAnterior)
               ->update(['role_id' => $id_rol]);

            //$user->assignRole($grol->name);
            $response = ['success' => true, 'message' => 'Usuario actualizado satisfactoriamente.'];
        } catch (\Exception $th) {
          //  Bitacoras::registerError(__METHOD__, $th, 'Error al actualizar usuario (Exception).');
            $response = ['success' => false, 'message' => 'Error al actaulizar el usuario.'];
        }

        return $response;
    }
    public function store(Request $request) {
           \Log::info(__METHOD__.' Crear nuevo Usuario');
           try {
               $id_rol = $request->id_rol;
               DB::beginTransaction();
               $user = User::create([
                       'name' => $request->nombre,
                       'apellido_paterno' => $request->apellido_paterno,
                       'apellido_materno' => $request->apellido_materno,
                       'usuario' => $request->usuario,
                       'id_rol' => $id_rol,
                       'password' => bcrypt($request->password),
                       'email' => $request->email,
                       'estatus' => (!$request->cat_status) ? '0' : '1',
                       'id_ubicacion' => '1'
                   ]);
               $grol = DB::table('roles')->where('id', '=', $id_rol)->first();
               // Le asignamos el rol
               $user->assignRole($grol->name);
               $response = array('success' => true, 'message' => 'Usuario creado correctamente.');
               DB::commit();
           } catch (\Exception $th) {

               DB::rollback();
               $response = ['success' => false, 'message' => 'Error al guardar el usuario.'];
           }
           return $response;
       }

    public function listar_usuarios()
    {
        return view('usuarios.listar_usuarios');
    }

    public function data_listar_usuarios()
    {
        $users = User::select();
        return Datatables::of($users)->toJson();
    }
    public function listar_roles()
    {
        $roles = Role::all();//Get all roles
   //     return view('roles.index')->with('roles', $roles);
    return view('admin.roles.listar_roles')->with('roles', $roles);
    }

    public function data_listar_roles()

    {
        $role = Role::all();//Get all roles
      //  $permisos = =Permissions::getAllPermisos()
        //$role->permissions()->pluck('name');
     return Datatables::of($role)->toJson();
    }
    public function listar_permisos()
    {
        return view('usuarios.listar_permisos');
    }

    public function data_listar_permisos()
    {

        return Datatables::of(Permissions::getAllPermisos())

            ->toJson();
        //return view('usuarios.listar_usuarios', compact('users'));

    }

}
