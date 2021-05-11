@extends('posts.layout')
   
@section('content')
<center>
<div class="container w-50">
    <div class="addForm mt-5 w-100 card">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <div class="header p-4 text-center text-white">
                        <h2>Edit Task</h2>
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
    
        <form action="{{ route('posts.update',$post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="container p-5">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $post->description }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary button">Submit</button>
                </div>
                </div>
            </div>
        </form>
    </div>
    <div class="pull-right mt-3">
        <a class="pt-2 pb-2 pr-4 pl-4 rounded bg-primary text-white text-center h5 float-right button" href="{{ route('posts.index') }}">Back</a>
    </div>
</div>
</center>
@endsection