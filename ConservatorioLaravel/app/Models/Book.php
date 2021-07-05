<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $table = 'books';

    protected $fillable =[
        'user_id',
        'book_id',
        'titolo',
        'thumbnail'  
    ];

    public function user(){
        return $this->hasMany("App\models\User");
    }

}
?>