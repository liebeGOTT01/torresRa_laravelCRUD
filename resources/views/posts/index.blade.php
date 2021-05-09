@extends('posts.layout')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card p-5">
                <div class="row">
                    <div class="col-lg-6 margin-tb">
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

        <div class="col-lg-6">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @foreach ($data as $key => $value)
            <div class="card mt-3">
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
        <!-- <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $value)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$value->title}}</td>
                <td>{{\Str::limit($value->description, 100)}}</td>
                <td>
                    <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                        <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>    
                        <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                        @csrf
                        @method('DELETE')      
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>   -->
        {!! $data->links() !!}  
    </div>
</div>    
@endsection