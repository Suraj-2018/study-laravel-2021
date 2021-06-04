@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card-header">
                	<h4>{{ __('Post Information') }}
                		<a href="{{ route('create-post') }}" class="btn btn-primary float-right">Create Post</a>
                	</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sr. No</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        	@if(count($posts) > 0)
	                            @foreach($posts as $key => $post)
	                            <tr>
	                                <td>{{ $key+1 }}</td>
	                                <td>{{ $post->description }}</td>
	                                <td>
	                                    @php $id = base64_encode($post->id); @endphp
	                                    <a href="{{ route('edit-post',$id) }}" class="btn btn-info">Edit</a> <a href="{{ route('delete-post',$id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
	                                </td>
	                            </tr>
	                            @endforeach
	                        @else
	                        	<tr>
	                        		<td colspan="3" class="text-center">No Records Found</td>
	                        	</tr>
	                        @endif
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $posts->links('pagination::bootstrap-4') }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection