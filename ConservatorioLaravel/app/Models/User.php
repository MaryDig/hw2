<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $hidden = ['password','remever_token'];
    protected $table = 'users';

    protected $fillable =[
        'matricola',
        'nome',
        'cognome',
        'strumento',
        'email',
        'password'    
    ];

    public function exams(){
        return $this->hasMany("App\models\Exsam");
    }

    public function books(){
        return $this->hasMany("App\models\Book");
    }

}
?>