<?php

namespace App\Http\Controllers;

use App\Models\Solo_mode;
use Illuminate\Support\Facades\Auth ;
use App\Models\Solo_mode_question ;
use App\Models\Question ;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Component\VarDumper\VarDumper;

use App\Models\Questions_statistic ;

class SoloModeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function index($id){
        
        $solo_mode_questions = Solo_mode_question::where('game_id' , $id)->get() ;
        $t = [] ;
        $score = 0 ;
        
        $q_array = [] ;

        foreach ($solo_mode_questions as $s) {
            if($s->is_true == 't'){
                array_push($t , "t");
                $score += 20 ;
                array_push($q_array , $this->find_question($s->question_id) ); 
            }elseif($s->is_true == 'f'){
                array_push($t , "f");
                array_push($q_array , $this->find_question($s->question_id) ); 
            
            }elseif($s->is_true == 'k'){
                array_push($t , "n");
                array_push($q_array , $this->find_question($s->question_id) );
            }
            

            
            
        }
        
        $user =  Auth::user() ;
        
        return view('solo_game_page' , ["user" => $user , 'questions' => $q_array , 'score' => $score , "score_board" => $t ]);

    }


    public function find_question($question_id){
        $question = Question::find($question_id) ;
        $question_text = explode('@#$' , $question->question_text) ;
        $array = [
            'question' => $question_text[0] ,
            'first_ans' => $question_text[1] ,
            'second_ans' => $question_text[2] ,
            'third_ans' => $question_text[3] ,
            'forth_ans' => $question_text[4] ,
            'correct_answer' => $question->correct_answer ,
            'question_id' => $question_id ,
        ] ;
        
        return $array ;
    }


    public function progress($id){

        $user = Auth::user() ;
        $row = Solo_mode::find($id) ;

        if ($row->is_finished == "True"){
            return redirect(route('solo_mode' , ['id' => $id]));
        }else {
            
            $count = Solo_mode_question::where('game_id' , $id)->count();

            if($count == 0){
                $expire_time = strtotime('now') + 35 ;
                
                $a = Solo_mode_question::create([
                    'game_id' => $id ,
                    'is_true' => 'n' ,
                    'question_number' => 1 ,
                    'expire_time' => $expire_time ,
                    'question_id' => explode("," , $row->questions_id )[0] ,
                ]);
                

                // return view question 1
                $question_id = explode("," , $row->questions_id )[0]  ;
                $question = $this -> find_question($question_id) ;
                return view('solo_progress' , ['question' => $question , 'expire_time' => $expire_time , 'waiting' => false]);
                
            }else {

                $r = Solo_mode_question::where('game_id' , $id)->OrderByDesc('id')->first() ;
                $question_number = $r->question_number ;
                if ($question_number == 3 && $r->is_true != 'n'){

                    // game finish 
                    $row->is_finished = 'True' ;
                    $row -> save() ;

                    // finishing game 
                    // $this->update_score($row->id);

                    // return redirect(route('solo_mode' , ['id' => $id] ) );

                }else{

                    $now = strtotime('now')+2;
                    if ($r->is_true == 'n' && $r->expire_time  >  $now ){

                        $question_id = explode("," , $row->questions_id )[$question_number-1];
                        
                        $question = $this -> find_question($question_id) ;
                        

                        return view('solo_progress' , ['question' => $question , 'expire_time' => $r->expire_time , 'waiting' => false]);


                    }elseif( $r->is_true != 'n') {
                        $view = View("waiting")->render() ;

                        $question_id = explode("," , $row->questions_id )[$question_number-1];
                        $question = $this -> find_question($question_id) ;

                        return view('solo_progress' , ['question' => $question ,'waiting' => true , "waiting_content" => $view , 'expire_time' => '' ]);
                    }

                }
 

            }

            
        }
    }


    public function guide(Request $request){

        $mode = $request->mode  ;
        $question_id = $request->question_id ;

        $user = Auth::user() ;
        $coin = $user->coin ;
        if($coin < 31){

            // $user->coin -= 60 ;
            // $user->save();

            return response()->json(["error" => true]); 
        }else{

            switch ($mode) {

                case 1:
                    
                    $question = Questions_statistic::where( 'question_id' , $question_id)->first() ;

                    $t = $question->first_option + $question->second_option + $question->third_option + $question->forth_option ;
                    
                    $f_p = round($question->first_option / $t* 100 )  ;
                    $s_p = round($question->second_option / $t* 100 ) ;
                    $t_p = round($question->third_option / $t* 100 ) ;
                    $fo_p = round($question->forth_option / $t* 100 ) ;

                    return response()->json(["error" => false , 'first_op' => $f_p , 'second_op' => $s_p ,
                    'third_op' => $t_p , 'forth_op' => $fo_p ]);
                        
                    break;

                
                case 2 :

                    $question = Question::find($question_id) ;

                    $question_text =explode("@#$" , $question->question_text) ;
                    $correct_ans = $question->correct_answer ;


                    $x = array_search($correct_ans , $question_text) ;
                    unset($question_text[$x]);
                    unset($question_text[0]) ;

                    $rand = [] ;
                    foreach ($question_text as $k) {
                        
                        array_push($rand , $k) ;
                    }

                    $l = array_rand( $rand, 2 ) ;
                    $n1 = array_search($rand[$l[0]] , $question_text) ;
                    $n2 = array_search($rand[$l[1]] , $question_text) ;

                    return response()->json(["error" => false , "n1" => $n1 , "n2" => $n2 ]);

                    break;
    
                case 3 :
                    
                    $solo_mode_question = Solo_mode_question::latest('id')->first() ;
                    $solo_mode_question -> expire_time += 30 ;
                    $solo_mode_question -> save();

                    break;
                    
            }


        }

        


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solo_mode  $solo_mode
     * @return \Illuminate\Http\Response
     */
    public function show(Solo_mode $solo_mode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solo_mode  $solo_mode
     * @return \Illuminate\Http\Response
     */
    public function edit(Solo_mode $solo_mode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solo_mode  $solo_mode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solo_mode $solo_mode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solo_mode  $solo_mode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solo_mode $solo_mode)
    {
        //
    }
}
