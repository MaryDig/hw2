<?php
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Book;

class ControllerApi extends BaseController
{
    public function indexBook(){
        $user= User::find(session('user_id'));
        return view('book')
            ->with('nome',$user->nome);
    }

    public function indexFavouriteLibrary(){
        $user= User::find(session('user_id'));
        return view('favouriteLibrary')
            ->with('nome',$user->nome);
    }

    public function indexVideo(){
        $user= User::find(session('user_id'));
        return view('video')
            ->with('nome',$user->nome);
    }
    
    public function serchBooks($query){
        $response = Http::get('https://www.googleapis.com/books/v1/volumes',[
            'q' => $query,
            'api_key' => env('GOOGLEBOOKSAPIKEY')
        ]); 

        if($response->failed()) abort(500);

        return $response->json();
    } 

    public function addBookFavorites($title,$book_id,$img){
        $user= User::find(session('user_id'));
        
        $book = Book::create([
            'user_id'=> $user->id,
            'book_id'=>$book_id,
            'titolo'=>$title,
            'thumbnail'=>$img
        ]);

        return $book;
    }

    public function removeBookFavorites($title,$book_id,$img){
        $user= User::find(session('user_id'));
        return Book::where('user_id',$user->id)->where('book_id',$book_id)
            ->where('titolo',$title)->where('thumbnail',$img)->delete();
    }

    public function uploadFavouriteBooks(){
        $user= User::find(session('user_id'));//prendo l'id dell'utente in session
        $favouriteBooks = Book::all()->where('user_id',$user->id);
        
        return $favouriteBooks;
    }

    public function serchVideo(){
        $response = Http::get('https://www.googleapis.com/youtube/v3/videos?part=player&chart=mostPopular&videoCategoryId=10&q=piano&key=AIzaSyB_ytIzB3x30MCmTR5pUMhiV4GowQJPzQc');

        if($response->failed()) abort(500);

        return $response->json();
    } 
    
}
?>