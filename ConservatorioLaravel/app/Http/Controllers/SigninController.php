<?php
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class SigninController extends BaseController
{
    public function create(){
        $request = request();

        User::create([
            'matricola'=>$request->matricola,
            'nome'=>$request->nome,
            'cognome'=>$request->cognome,
            'strumento'=>$request->strumento,
            'email'=>$request->email,
            'password'=> $request->password
        ]);

        return redirect('login')
            ->with('csrf_token',csrf_token());
    }

    public function checkEmail(Request $request){
        $email=$request->get('email');
        $count_email = User::where('email',$email)->get()->count();
        $ceck_result = [];
        $ceck_result ['result'] ='false';
        if($count_email>0){
            $ceck_result ['result'] ='true' ; //array che poi verrà convertito in json
        }
        return $ceck_result;
    }

    public function index(){
        return view('login');
    }
}
?>