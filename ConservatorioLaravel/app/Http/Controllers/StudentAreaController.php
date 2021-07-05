<?php
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Reservation;

class StudentAreaController extends BaseController
{

public function index(){
    $user= User::find(session('user_id'));
    return view('studentArea')
        ->with('nome',$user->nome);
}

public function uploadExams(){
        $user= User::find(session('user_id'));
        $reservations = Reservation::all()->where('user_id',$user->id);
        $exams = Exam::all();
        if($user!=null){
            if($reservations!='[]'){
                foreach ($reservations as $reservation) {  
                    foreach ($exams as $exam){
                        if($reservation->exam_id != $exam->id){
                            return $exam;

                        }

                    }
                }
            }else{
                return $exams;
            }
            return '[]';
        }
    } 

public function createReservation($exam_id){
        $user= User::find(session('user_id'));
        $exam = Exam::find($exam_id);
        
        $reservation= Reservation::create([
            'user_id'=>$user->id,
            'exam_id'=>$exam_id
        ]);

        return $reservation;
} 

public function removeReservation($exam_id){
    $user= User::find(session('user_id'));
    return Reservation::where('user_id',$user->id)->where('exam_id',$exam_id)->delete();
}


public function uploadBookedExams(){
    $user= User::find(session('user_id'));//prendo l'id dell'utente in session
    $reservations = Reservation::all()->where('user_id',$user->id);
    
    if($reservations!='[]'){
        foreach ($reservations as $reservation) {
            $exam = Exam::all()->where('id',$reservation->exam_id);
            return $exam;
        }

    }else{
        return '[]';
    }
}

    
}
?>