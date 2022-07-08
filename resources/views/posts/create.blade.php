@extends('layouts.app')
@section('content')
<div class="card ">
    <div class="card-header">
                Create Post
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('posts.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="titile">Post Title</label>
                      <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                      <label for="description">Post Description</label>
                      <textarea name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group mt-2">
                      <select class="form-select" name="user_id">
                        <option selected>Open this select menu</option>
                        @foreach ($users as $user)
                            <option  value="{{$user -> id}}">{{$user -> name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Create Post</button>
                  </form>
            </div>
        </div>
        
@endsection('content')