<?php

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class LoginController extends BaseController
{
    public function login(){
            //verifico se l'utente ha già fatto il login
            if(session('user_id')!=null){
               return redirect('studentArea');
           }else{
               //Verifichiamo se c'è stato un'errore nel login
               return view('login')
               ->with('csrf_token',csrf_token());
           }
        
    }

    public function checkLogin(){
        $user = User::where('email',request('email'))->where('password',request('password'))->first(); //applicano un filtro sui dati neutro
        if(isset($user)){
            //credenziali valide
            Session::put('user_id',$user->id);
            return view('studentArea')
                ->with('nome',$user->nome);
        }else{
            //nesssuna credenziale
            $old_email= Request::old('email');
            return view('login')
                ->with('csrf_token',csrf_token())
                ->with("old_email",$old_email);
        }  
    }

    public function logout(){
        //eliminiamo i dati di sessione
        Session::flush();
        //torniamo al login
        return redirect('login');
    }
}
?>
