<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use App\Models\User ;
use App\Models\Solo_mode ;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function games_inf(){

        $user = Auth::user();
        $users = User::orderBy('score', 'desc')->get();
        $rating = 0 ;
        foreach ($users as $u) {
            $rating ++ ;
            if ($u -> id == $user->id) {
                break ;
            }
        }
        $user->rating = $rating ;
        
        $game_history = Solo_mode::where( [['user_id' , $user->id ]  , ['is_finished' , "True" ] ])->orderBy('id' , 'Desc')->take(4)->get() ;

        $running_games = Solo_mode::where( [['user_id' , $user->id] , ['is_finished' , "False" ] ])->orderBy('id' , 'desc')->take(4)->get() ;

        return [$game_history , $running_games] ; 

    } 


    public function index()
    {
        $a = $this->games_inf() ;
        return view('dashboard' , [ 'user' => Auth::user() , 'running_games' => $a[1] , 'game_history' => $a[0] ]);
    }
    
}
