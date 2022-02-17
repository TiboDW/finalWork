@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('upload document') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                        @csrf
                         

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"  required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="synopsis" class="col-md-4 col-form-label text-md-end">synopsis</label>

                            <div class="col-md-6">
                                <textarea id="synopsis" name="synopsis" type="text" class="form-control @error('synopsis') is-invalid @enderror"  name="synopsis" rows="10" cols="50" required > </textarea>
                                
                                @error('synopsis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Document (only pdf)</label>

                            <div class="col-md-6">
                                <input id="title" name="file" type="file" class="form-control @error('file') is-invalid @enderror" required > 

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('upload') }}
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