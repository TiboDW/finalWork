@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Frequently ask question') }}
                     @auth 
                        <a style="margin-left: 550px;" href="{{route('questions.create')}}" class=" btn btn-primary btn-sm">ask question</a> 
                     @endauth
                </div>

                    <select class="form-select" aria-label="Default select example">
                        @foreach($questions as $question)
                            <option value="{{$question->category}}">{{$question->category}}</option>
                        @endforeach
                    </select>

                <div class="card-body">

                    @foreach($questions as $question)
                    <h3>{{$question->question}}</a></h3>
                    <p>{{$question->answer}}</p>
                    <h6 class="card-subtitle mb-2 text-muted">Asked by <a style="color: black;" href="{{route('profile', $question->user->name)}}">{{$question->user->name}}</a> on {{$question->created_at->format('d/m/Y')}}.</h6><br>
                    <div class="form-group">
                        @auth
                            
                            @if (Auth::user()->is_admin)
                                    @if($question->answer == '')
                                    <a href="{{route('questions.edit', $question->id)}}" class="btn btn-primary float-right">answer</a>
                                    <br><br>
                                    @endif
                                <form method="post" action="{{route('questions.destroy', $question->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="float-righ btn btn-warning">Delete</button>
                                </form>
                                
                            @endif
                        @endauth
                    </div>
                    <hr>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection