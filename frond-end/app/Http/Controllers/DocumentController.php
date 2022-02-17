<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DocumentController extends Controller
{
    public function _contruct(){
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function create(){

        return view('Documents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4',
            'synopsis' => 'required',
        ]);

        $document = new Document;
        $document->title = $validated['title'];
        $document->synopsis = $validated['synopsis'];
        $document->user_id = Auth::user()->id;
        
        $document->save();

        $fileName = $document->id.'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('/uploads'), $fileName);

        $document->file = $fileName;

        $document->save();
      

        $url = "/Users/tibodewinter/Documents/finalwork/frond-end/public/uploads/".$fileName;
         
        //echo $url;
        
        //$command = "/usr/local/bin/python3 /Users/tibodewinter/Documents/finalwork/backend/converfile.py \"{$url}\" ";
        
        $process = new Process(['python3', '/Users/tibodewinter/Documents/finalwork/backend/converfile.py', $url]);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        
        echo $process->getOutput();

        
        //python3 converfile.py "/Users/tibodewinter/Documents/finalwork/frond-end/public/uploads/64.pdf"

        

        return redirect()->route('index');
    }

    public function index(){
        $documents = Document::all()->where('user_id', '=', Auth::user()->id);

        return view('documents.index', compact('documents'));
    }

    public function show($id){
        $document = Document::findOrFail($id);
        
        return view('documents.show', compact('document'));
    }

}
