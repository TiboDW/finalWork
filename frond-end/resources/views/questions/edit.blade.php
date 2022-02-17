@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('answer question') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('questions.update', $question->id) }}">
                        @csrf
                        @method('put')

                        <div class="row mb-3">
                            <label for="answer" class="col-md-4 col-form-label text-md-end">answer</label>

                            <div class="col-md-6">
                                <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" required autofocus>

                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('answer') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div> 

                
            </div>
        </div>
    </div>
</div>
@endsection