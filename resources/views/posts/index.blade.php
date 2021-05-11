@extends('posts.layout')
 
@section('content')
<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-5 col-2 w-100 h-100 py-2 d-flex align-items-center justify-content-center fixed-top" id="left">
                <div class="card w-75 m-3 addForm">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <div class="header p-4 text-center text-white">
                                    <h2>Add New Task</h2>
                                </div>
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
                            <div class="container p-4 mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <!-- <strong>Title:</strong> -->
                                    <input type="text" name="title" class="form-control" placeholder="Enter Task">
                                </div>
                            </div>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <!-- <strong>Description:</strong> -->
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="Enter Task Description"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary float-right button">Submit</button>
                            </div>
                            </div>
                        </div>
                    </form>

                </div>
        </div>


        <div class="col offset-2 offset-sm-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-primary">
                        <p>{{ $message }}</p>
                    </div>
                @endif

            <div class="col-md-12 mt-5">
                @foreach ($data as $key => $value)
                <div class="container-fluid mb-5 pb-4 glass-container">
                    <div class="row header p-2 text-white">
                            <span class="bg-primary rounded-circle h3 pr-3 pl-3 pt-2 pb-2 text-white mr-3">{{ ++$i }}</span>
                            <h2 class="text-white">{{ $value->title }}</h2>
                        </div>
                    <div class="p-4 text-warning">
                        <span class="small">Task description:</span> <br>
                        <em class="text-white">{{ \Str::limit($value->description, 100) }}</em>
                    </div>
                    <span class="row float-right pt-2 pl-5 pr-5 pb-2 mr-3 details">
                        <form action="{{ route('posts.destroy',$value->id) }}" method="POST" class="">   
                            <!-- <a class="btn btn-primary mr-2 green" href="{{ route('posts.show',$value->id) }}">Show</a>     -->
                            <a class="btn btn-warning text-white mr-2 button" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                            @csrf
                            @method('DELETE')      
                            <button type="submit" class="btn btn-danger button">Delete</button>
                        </form>
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    {!! $data->links() !!}  
    </div>
</div>    
@endsection

                    <!-- <div class="container mb-4 p-4 glass-container">
                        <div class="card-header title ">
                        <span>{{ ++$i }}</span>
                            <h1> {{ $value->title }} </h1>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ \Str::limit($value->description, 100) }}</h5>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('posts.destroy',$value->id) }}" method="POST" class="float-right">   
                                <a class="btn btn-primary green" href="{{ route('posts.show',$value->id) }}">Show</a>    
                                <a class="btn btn-success blue" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                                @csrf
                                @method('DELETE')      
                                <button type="submit" class="btn btn-danger red">Delete</button>
                            </form>
                        </div>
                    </div> -->

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