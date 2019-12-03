<?php

namespace App\Http\Controllers;
use App\Models\Administrador;
use App\Models\Docente;
use App\Models\Persona;
use App\Models\Recover;
use App\Mail\RestorePassReceived;
use Mail;

use Illuminate\Http\Request;

class loginController extends Controller{

    public function redireccionar(){
    	
    	$data= request()->all();
        $cedula=$data['cedula'];
        $contrasena=$data['contrasena'];
        $tipo=$data['tipo'];

        if(empty($cedula) || empty($contrasena)){
            $var=1;
            session(['validar'=>$var]);
            return view('login'); 
        }else{
            switch ($tipo) {
            case "Vicerrectoria":
            $Administrador=Administrador::where('cedula',$cedula)->first();
            $contra=decrypt($Administrador['contrasena']);
                if($contra===$contrasena){
                    return view('vicerrectoria/gen-listados');
                }
                $var=0;
                session(['validar'=>$var]);
                return view('login');                  
            break;

            case "Director de Grupo":
            $director=Docente::where('num_documento',$cedula)->first();
                if($director['contrasena_director']===$contrasena){
                    session(['docente'=> $director]);
                    return view('director/gen-listados');
                }
                $var=0;
                session(['validar'=>$var]);
                return view('login');         
            break;

            case "Docente Investigador":
            $docente=Docente::where('num_documento',$cedula)->first();
            $contra=decrypt($docente['contrasena']);
                if($contra===$contrasena){
                    session(['doc'=> $docente]);
                    return view('docente/doce-index');
                }
                $var=0;
                session(['validar'=>$var]);
                return view('login');   
            break;
            }
        }

    } 

    public function restaurarContrasena(){

       $data= request()->all();
       $correo=$data['correoR'];
       $tipo=$data['tipoR'];

        if(empty($correo)){
           $var=1;
           session(['restaurar'=>$var]);
           return view('login');
        }else {

            $u=null;
                if(STRCMP($tipo,"Vicerrectoria")===0){
                    $u=Administrador::where('correo',$correo)->first();
                }else{
                    $u=Persona::where('correo',$correo)->first();
                } 

                if(!is_null($u)){
             
                $recupe = Recover::where('email', $correo)->first();
                //$recupe->delete();

                       if(!empty($recupe)){
                           $recupe->delete();
                       }
                       $token = bin2hex(random_bytes(32));
                       $r = new Recover();
                       $r->email =$correo;
                       $r->token = $token;
                       $r->save();

                        Mail::to($correo)->send(new RestorePassReceived($r));
                        return view('login');
                }
            
          return view('login');
        }
    }

    public function VALIDAR(){

       $ad=Administrador::where('correo',$_GET['email'])->first();
       $r=Recover::where('email',$_GET['email'])->first();
       if(!empty($ad) && !empty($r) && $r->token === $_GET['token']){
        $correo=$ad->correo;
            session(['correo'=>$correo]);
           return view('mail/form-recuperar-contra');
       }else{
           return view('mail/pass-error');
       }
   }

   public function cambiarContrasena(){
      $correo=session('correo');
      $data=request()->all();
      $newP=$data['newP'];
      $RnewP=$data['RnewP'];
      $validar=0;

      if(empty($newP) || empty($RnewP)){
        $validar=0;
        session(['cambiar'=>$validar]);
        return view('mail/form-recuperar-contra');
      }elseif ($newP != $RnewP) {
        $validar=1;
        session(['cambiar'=>$validar]);
        return view('mail/form-recuperar-contra');
      }else{
        $admin=Administrador::where('correo',$correo)->first();     
        $admin->contrasena=encrypt($newP);
        $admin->save();

        $recupe =Recover::where('email', $correo)->first();
        $recupe->delete();

        $validar=2;
        session()->forget('correo');
        session(['cambiar'=>$validar]);
        return view('login');
      }
      

   }



}

