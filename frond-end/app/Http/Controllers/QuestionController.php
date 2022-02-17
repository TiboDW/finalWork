<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;

class QuestionController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
    }

   public function index(){
       $questions = Question::orderBy('created_at', 'desc')->get();


       

       return view('questions.index', compact('questions'));
   }

   public function edit($id){
    $question = Question::findOrFail($id);
    return view('questions.edit', compact('question'));
    }

    public function update($id, Request $request){

        $question = Question::findorfail($id);

        if(Auth::user()->is_admin != 1){
            abort(403);
        }

        $validated = $request->validate([
            'answer' => 'required',
        ]);

        $question->answer = $validated['answer'];
        
                
        $question->save();
        
        return redirect()->route('questions.index');

    }

    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403, 'only admins can delete questions');
        }

        $question = Question::findOrFail($id);

        $question->delete();

        return redirect()->route('questions.index');
    }

    public function create(){
        return view('questions.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'question' => 'required',
            'category' => 'required',
        ]);

        $question = new Question;
        $question->question = $validated['question'];
        $question->category = $validated['category'];
        $question->answer = '';
        $question->user_id = Auth::user()->id;
        $question->save();

        return redirect()->route('questions.index');
    }
}
