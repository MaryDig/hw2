<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable =[
        'user_id',
        'exam_id'
    ];

    public function users(){
        return $this->hasMany("App\models\User");
    }

    public function exams(){
        return $this->belogsTo("App\models\Exam");
    }
}
?>