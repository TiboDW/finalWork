@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('contact form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contactSend') }}" enctype="multipart/form">
                        @csrf
                        @method('put')

                        

                        <div class="row mb-3">
                            <label for="text" class="col-md-4 col-form-label text-md-end">text</label>

                            <div class="col-md-6">
                                <textarea id="text" name="text" type="text" class="form-control @error('text') is-invalid @enderror"  name="text" rows="10" cols="50" required > </textarea>
                                
                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('send') }}
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