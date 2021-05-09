@extends('posts.layout')
 
@section('content')
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-sm-5 col-2 h-100 bg-dark text-white py-2 d-flex align-items-center justify-content-center fixed-top" id="left">
                <div class="card p-5 w-75 m-3">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left text-danger">
                                <h2>Add New Product</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>

        <div class="col-sm-7 invisible col-2">
            <!--hidden spacer-->
        </div>

        <div class="col offset-2 offset-sm-6 py-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @foreach ($data as $key => $value)
                    <div class="card mb-3">
                        <div class="card-header">
                        <span>{{ ++$i }}</span>
                            <h1> {{ $value->title }} </h1>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ \Str::limit($value->description, 100) }}</h5>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                                <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>    
                                <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                                @csrf
                                @method('DELETE')      
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
        </div>
    {!! $data->links() !!}  
    </div>
</div>    
@endsection
        <!-- <div class="row" style="margin-top: 5rem;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 8 CRUD Example from scratch - laravelcode.com</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                </div>
            </div>
        </div> -->