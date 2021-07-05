<?php
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class HomeController extends BaseController
{
    public function home(){
        $user= User::find(session('user_id'));
            if($user!=null){
                return view('home')
                    ->with('nome',$user->nome); 
            }else{
                return view('home')
                    ->with('nome',null);
            }
    }
}
?>