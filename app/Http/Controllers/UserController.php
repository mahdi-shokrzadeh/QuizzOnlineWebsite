<?php

namespace App\Http\Controllers;

use App\Models\Solo_mode;
use App\Models\User ;
use App\Models\Subject ;
use App\Models\Question ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User_statistic ;


class UserController extends Controller
{

    public function user_inf () {

        $user = Auth::user();
        $id = Auth::id();
        $user = User::find($id);

        
        return [
            
            'name' => $user->name ,
            'url' => $user->profile_url ,
             
        ] ;
    }

    public function user_profile_inf ($id) {
        $user = User::find($id) ;

        // rate
        $users = User::orderBy('score', 'desc')->get();
        $rating = 0 ;
        foreach ($users as $u) {
            $rating ++ ;
            if ($u -> id == $id) {
                break ;
            }
        }

        $array = [] ;

        $subjects = Subject::all() ;
        foreach($subjects as $s){
            $user_statistic_count = User_statistic::where( [['subject_id' , $s->id] ,
            ['user_id' , $user->id] ]
            )->count() ;

            if($user_statistic_count == 0){

                $name = $s->subject ;
                $p = "0 %";

            }else{
                $user_statistic = User_statistic::where([['subject_id' , $s->id] ,
                ['user_id' , $user->id]]
                )->first() ;

                $name = $s->subject ;
                $p = strval(round($user_statistic->correct_answers / $user_statistic->answered_questions * 100))." %"  ; 


            }

            array_push($array , [$name , $p]);

        }

        return [
            
            'name' => $user->name ,
            'score' => $user->score ,
            'rating' => $rating ,
            'statistic' => $array ,
        ] ;


    }


    public function index(){
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('index') ;
        }
    }


    public function profile($url){
        $count = User::where('profile_url', '=', $url)->count();
        if ($count == 0) {
            
            abort(404);

        } else {

            $user = User::where('profile_url', $url)->first() ;

            $id = $user->id ;

            $profile_inf = $this->user_profile_inf($id) ;
            
            if (Auth::check()) {

                return view('profile' , ['user' => $this->user_inf() , 'profile_inf' => $profile_inf ]);


            } else {

                return view('profile' , ['user' => null , 'profile_inf' => $profile_inf  ]) ;
            }


        }
    }

    public function create_new_game($mode , $subject) {

        $user = Auth::user() ;
        // check if the numbers of games out of 5 


        // find subject id 
        $subject = Subject::where('subject' , '=' ,$subject )->first() ;

        // random questions 
        $questions = Question::where('subject_id' , $subject->id)->get() ;
        $qq = [] ;
        foreach ($questions as $q) {
            array_push($qq , $q->id);
        }
        $random_questions = array_rand($qq , 3);
        $array = [] ;
        foreach ($random_questions as $r){
            array_push($array ,$qq[$r]);
        } 

        $questions_id = implode("," , $array) ;

        switch ($mode) {

            case 'solo_mode':
                $row = Solo_mode::create([
                    'user_id' => $user->id,
                    'subject_id' => $subject->id ,
                    'is_finished' => 'False',
                    'questions_id' => $questions_id, 
                ]);
                return redirect(route('solo_mode' , ['id' => $row->id ] )) ;
                break;
            
            case 'double_mode':
                # code...
                break;

                    
            default:
                abort(404) ;
                break;
        }


    }

}
