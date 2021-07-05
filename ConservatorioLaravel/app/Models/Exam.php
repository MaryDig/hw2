<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{
    protected $table = 'exams';

    protected $fillable =[
        'Materia',
        'aula',
        'data',
        'prenotati'
    ];

    public function users(){
        return $this->belogsTo("App\models\User");
    }
}
?>