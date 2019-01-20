@extends('layouts.app')
@section('content')
<br>
<h3>Add Link</h3>
    <form action="{{action('LinkController@store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="description" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control" id="url" name="url">
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