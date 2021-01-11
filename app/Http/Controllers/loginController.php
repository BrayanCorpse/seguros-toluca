<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;

class loginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function iniciar()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $user = $request["user"];
        $pass = md5($request["pass"]);

        $user = DB::table("users")->where([
                                        ["email","=",$user],
                                        ["password","=",$pass],
                                    ])
                                    ->get();
        if (count($user) > 0) {
            if ($user[0]->tipo_usuario == 1) {
                session(["admin"=>$user]);
                return Redirect("/sistema");
            }else{
                if ($user[0]->tipo_usuario == 2) {
                    session(["user"=>$user]);
                    return Redirect("datos_carrito");
                }else{
                    toastr ()->danger ('Credenciales incorrectas');
                    return Redirect("/login");
                }
            }
        }else{
            toastr () -> warning ('Credenciales incorrectas');
            return Redirect("/login");
        }
    }

    public function logout(Request $request){
        Session::forget("admin");
        Session::forget("user");
        toastr()->success('deslogueado!');
        return Redirect("/");
    }

    public function registrar(Request $request){
        if ($request->password != $request->password1) {
            toastr()->danger('Contraseñas no coinciden');
            return Redirect('/registrar');
        }
        DB::table('users')->insert([
            'user' => $request->user,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => md5($request->password)
        ]);
        toastr()->success('Usted ah sido registrado');
        return Redirect('login');
    }

    public function create(){
        return view('login.register');
    }
}
