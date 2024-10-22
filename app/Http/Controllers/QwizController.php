<?php

namespace App\Http\Controllers;

use App\Models\Qwiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QwizController extends Controller
{
    //
    
    public function newQwiz()
    {
        
        return view('qwiz_start');

    }

    public function GetTitle()
    {
        $products = Product::where('hide',1)->get();
        return $products;

    }

    public  function index( $number ) {

        $question = Qwiz::where('id',$number)->first();
        return view('qwiz',compact('question'));
        //return view('qwiz');
    }
    
        public  function store(Request $request) {
            
            
        $answer=mb_strtolower($request->input('answer'));//это ответ игрока
        $number = $request->input('number');//номер вопроса
        
        $question_prew = Qwiz::where('id',$number)->first();
        
        $number=$number+1;
        
        $question = Qwiz::where('id',$number)->first();//следующий
        

        
        
        if($answer==mb_strtolower($question_prew->answer)){
            $user = Auth::user();
            $user->karma = $user->karma + $question_prew->prize;
            $user->save();
        return redirect("/games/gwizle/$number")->with('success', "Верный ответ! Добавили +$question_prew->prize кармы!");}
        else{
        return redirect("/games/gwizle/$number")->with('error', 'Не верный ответ!');}
    }
    
}
