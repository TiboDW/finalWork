@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('paper') }}</div>

                <div class="card-body">

                    <h3>{{$paper->title}}</h3>
                    <h6 class="card-subtitle mb-2 text-muted">{{$paper->synopsis}}</h6>
                    <p>{{$paper->text}}</p>
                    <small>Published by <a style="color: black;" href="{{route('profile', $paper->user->name)}}">{{$paper->user->name}}</a> on {{$paper->created_at->format('d/m/Y')}}.</small><br>
                    <div class="form-group">
                        @auth
                            <a href="#" class="btn btn-success">👍 </a>
                            <a href="#" class="btn btn-danger">👎 </a>
                            
                            @if ($paper->user->id == Auth::user()->id)
                                <a href="{{route('papers.edit', $paper->id)}}" class="btn btn-primary float-right">edit</a>
                                
                            @endif
                            @if(Auth::user()->is_admin)
                                <br><br>  
                                <form method="post" action="{route('papers.destroy', $paper->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="float-righ btn btn-warning">Delete</button>
                                </form>
                                
                            @endif
                        @endauth
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection