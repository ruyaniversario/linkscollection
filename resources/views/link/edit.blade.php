@extends('layouts.app')
@section('content')
<br>
<h3>Edit Link</h3>
    <form action="/link/{{$link->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" id="title" value={{$link->title}}>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="description" rows="2">{{$link->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control" id="url" name="url" value={{$link->url}}>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection