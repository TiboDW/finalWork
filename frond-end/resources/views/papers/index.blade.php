@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('papers') }}</div>

                <div class="card-body">

                    @foreach($papers as $paper)
                    <h3><a style="color: black;" href="{{ route('papers.show', $paper->id) }}">{{$paper->title}}</a></h3>
                    <p>{{$paper->synopsis}}</p>
                    <small>Published by <a style="color: black;" href="{{route('profile', $paper->user->name)}}">{{$paper->user->name}}</a> on {{$paper->created_at->format('d/m/Y')}}.</small><br>
                    <div class="form-group">
                        @auth
                            <a href="#" class="btn btn-success">👍 </a>
                            <a href="#" class="btn btn-danger">👎 </a>
                            
                            @if ($paper->user->id == Auth::user()->id)
                                <a href="{{route('papers.edit', $paper->id)}}" class="btn btn-primary float-right">edit</a>
                                
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