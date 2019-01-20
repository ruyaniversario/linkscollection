@extends('layouts.app')
@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-6">
        <h2>Links Collection</h2>
        </div>
        <div class="col-md=4">
            <form action="/search" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="form-control">
                    <span class="input-group-preprend">
                    <button type="submit" class="btn btn-primary">Search</button>
                    </span>    
                </div>
            </form>    
    </div>
    <div class="col-md-2 text-right" >
            <a href="link/create" class="btn btn-primary">Add link</a>
    </div>               
    </div>
                    @if(count($links)>0)
                    <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date Collected</th>
                        <th scope="col" width="150">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                            <tr>
                                <td><a href="{{ $link->url}}" target="_blank">{{$link->title}}</a></td>
                                <td>{{$link->description}}</td>
                                <td>{{$link->created_at}}</td>
                                <td>
                                    <!--
                                    DELETE part of the blog form.
                                    -->
                                
                                    <form action="link/{{$link->id}}" method="POST">
                                        @csrf 
                                        @method("DELETE")
                                        <a href="/link/{{$link->id}}/edit" class="btn btn-warning">Edit</a>
                                        <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr> 
                        @endforeach    
                    </tbody>
                    </table>
                    @else
                        <p>You have no posts.</p>
                    @endif
</div>
        
@endsection