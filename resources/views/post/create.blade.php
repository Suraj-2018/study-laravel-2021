@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h4>{{ __('Create New Post') }}
                	</h4>
                </div>
                <div class="card-body">
                   <form method="post" action="{{ route('insert-post') }}">
                    @csrf
                      <div class="row">
                        <div class="col-md-12">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Post Here"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div> 
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection