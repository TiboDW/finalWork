<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;
use Auth;

class PaperController extends Controller
{
    public function _contruct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    

    public function index(){
        $papers = Paper::orderBy('created_at', 'desc')->get();
        return view('papers.index', compact('papers'));
    }

    public function show($id){
        $paper = Paper::findOrFail($id);

        return view('papers.show', compact('paper'));
    }

    public function edit($id){
        $paper = Paper::findOrFail($id);
        return view('papers.edit', compact('paper'));
    }

    public function update($id, Request $request){
        $paper = Paper::findorfail($id);

        if($paper->user_id != Auth::user()->id){
            abort(403);
        }


        $validated = $request->validate([
            'title' => 'required|min:4',
            'synopsis' => 'required',
            'text' => 'required',
        ]);

        $paper->title = $validated['title'];
        $paper->synopsis = $validated['synopsis'];
        $paper->text = $validated['text'];
        
        
        
        $paper->save();
        
        return redirect()->route('papers.show', $paper->id);
    }

    public function create(){
        return view('papers.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:4',
            'synopsis' => 'required',
            'text' => 'required',
        ]);

        $paper = new Paper;
        $paper->title = $validated['title'];
        $paper->synopsis = $validated['synopsis'];
        $paper->text = $validated['text'];
        $paper->user_id = Auth::user()->id;
        $paper->save();

        return redirect()->route('index');

    }

    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403, 'only admins can delete papers');
        }

        $paper = Paper::findOrFail($id);

        $paper->delete();

        return redirect()->route('index');
    }


}
