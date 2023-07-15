<?php

namespace App\Http\Controllers;

use App\Models\Solo_mode_question;
use Illuminate\Http\Request;
use App\Models\Solo_mode ;
use App\Models\Question ;
use App\Models\User ;
// use Facade\FlareClient\View;
use Illuminate\Support\Facades\View;
use App\Models\Questions_statistic ;
use App\Models\User_statistic ;
use Illuminate\Support\Facades\Auth;

class SoloModeQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function update_statistics($question_id , $answer , $solo_mode, $answer_status){

        $user = Auth::user() ;

        $subject_id = $solo_mode -> subject_id ;
        $count_user_statistic = User_statistic::where([
            ['user_id', '=', $user->id],
            ['subject_id', '=', $subject_id],                    
        ])->count() ;
        

        
        if($count_user_statistic == 0){

            
            $user_statistic = User_statistic::create([

                'user_id' => $user->id ,
                'subject_id' => $subject_id ,
                'correct_answers' => 0 ,
                'answered_questions' => 0 ,

            ]);
            
            
            if($answer_status == true){
                $user_statistic -> correct_answers += 1 ;
                $user_statistic -> answered_questions += 1 ;

            }else{

                $user_statistic -> answered_questions += 1 ;

            }
            

            $user_statistic -> save();
            
        

        }else{

            $user_statistic =  User_statistic::where([
                ['user_id', '=', $user->id],
                ['subject_id', '=', $subject_id],                    
            ])->first() ;

            if($answer_status == true){
                $user_statistic->correct_answers += 1 ;
                $user_statistic->answered_questions += 1 ;
            }else{
                $user_statistic->answered_questions += 1 ;
            }
            
            $user_statistic->save();

        }

        
        $count_question_statistic = Questions_statistic::where('question_id' , $question_id)->count();


        if($count_question_statistic == 0){

            $question_statistic = Questions_statistic::create([
                
                'question_id' => $question_id ,
                'first_option' => 0 ,
                'second_option' => 0 ,
                'third_option' => 0 ,
                'forth_option' => 0 ,

            ]);

            $question = $this->find_question($question_id);


            if($question['first_ans'] == $answer){

                $question_statistic->first_option += 1 ;
                $question_statistic->save() ;

            }elseif($question['second_ans'] == $answer){

                $question_statistic->second_option += 1 ;
                $question_statistic->save() ;

            }elseif($question['third_ans'] == $answer){

                $question_statistic->third_option += 1 ;
                $question_statistic->save() ;

            }else{

                $question_statistic->forth_option += 1 ;
                $question_statistic->save() ;

            }
            

        }else{
            
            $question = $this->find_question($question_id);
            $question_statistic = Questions_statistic::where('question_id' , $question_id)->first() ;

            if($question['first_ans'] == $answer){
                $question_statistic->first_option += 1 ;
                $question_statistic->save() ;

            }elseif($question['second_ans'] == $answer){

                $question_statistic->second_option += 1 ;
                $question_statistic->save() ;

            }elseif($question['third_ans'] == $answer){
                $question_statistic->third_option += 1 ;
                $question_statistic->save() ;

            }else{
                $question_statistic->forth_option += 1 ;
                $question_statistic->save() ;

            }

        }

    }


    
    public function index(Request $request){   



        $id = $request->id ;
        $solo_mode = Solo_mode::find($id) ;
        $row = Solo_mode_question::where('game_id' , $id)->OrderByDesc('id')->first() ;

        if ($row->is_true != "n") {
            return response()->json([ 'verified' => 'false' , 'status'=>'true']);
            
        }else {

            if($request->verified == 'f'){
                $row->is_true = 'k' ;
                $row->save();
                $view = View("waiting")->render();
                return response()->json([ 'verified' => 'true' , 'status'=>'finish_time' , 'waiting_content' => $view , 'solo_id' => $id ]);
            }else{
                $question_id = $row->question_id ;
                $question = Question::find($question_id);
                $correct_ans = $question->correct_answer ;

                $view = View("waiting")->render();

                if($request->answer == $correct_ans){
                    $row->is_true = 't' ;
                    $row->save();

                    // update game statistics            
                    $this->update_statistics($question_id , $request->answer , $solo_mode , true);

                    return response()->json([ 'verified' => 'true' , 'status'=>'true' , 'waiting_content' => $view , 'solo_id' => $id ]);
                    
                }else {
                    
                    $row->is_true = 'f' ;
                    $row->save();

                    // update game statistics

                    $this->update_statistics($question_id , $request->answer , $solo_mode , false);

                    return response()->json([ 'verified' => 'true' , 'status'=>'false' , 'waiting_content' => $view , 'solo_id' => $id ]);

                }
            }
            

        }




    }


    public function next($id){
        
        $solo_mode = Solo_mode::find($id) ;
        $row = Solo_mode_question::where('game_id' , $id)->OrderByDesc('id')->first() ;

        if ($row->question_number < 3){
            $expire_time = strtotime('now') + 35 ;
                
            $a = Solo_mode_question::create([
                'game_id' => $id ,
                'is_true' => 'n' ,
                'question_number' => $row->question_number+1 ,
                'expire_time' => $expire_time ,
                'question_id' => explode("," , $solo_mode->questions_id )[$row->question_number] ,
            ]);
            

            // return view question 1
            $question_id = explode("," , $solo_mode->questions_id )[$row->question_number]  ;
            $question = $this -> find_question($question_id) ;
            
            return redirect(route('solo_mode_progress' , ['id' => $id]));


        }else {
            $solo_mode->is_finished = "True" ;
            $solo_mode -> save();
            $this->update_score($id);

            return redirect(route('solo_mode' , ['id' => $id] ));
        }
        
    }

    
    public function update_score($id){

        $questions =  Solo_mode_question::where('game_id' , $id)->get() ;

        $score  = 0 ;
        $coin = 0 ;
        foreach($questions as $q){

            if($q->is_true == "t"){
                $score += 20 ;
                $coin += 10 ;
            }

        }

        $user = Auth::user() ;
        $user->coin += $coin ;
        $user->score += $score ;
        $user->save();
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
        ] ;
        return $array ;
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
     * @param  \App\Models\Solo_mode_question  $solo_mode_question
     * @return \Illuminate\Http\Response
     */
    public function show(Solo_mode_question $solo_mode_question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solo_mode_question  $solo_mode_question
     * @return \Illuminate\Http\Response
     */
    public function edit(Solo_mode_question $solo_mode_question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solo_mode_question  $solo_mode_question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solo_mode_question $solo_mode_question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solo_mode_question  $solo_mode_question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solo_mode_question $solo_mode_question)
    {
        //
    }
}
