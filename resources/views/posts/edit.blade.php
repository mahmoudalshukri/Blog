@extends('layouts.app')
@section('content')
<div class="card ">
    <div class="card-header">
                Edit Post
                <div class="card-body">
                        <form method="POST" action="{{route('posts.update',['post' => $post -> id])}})}}">
                            {{ csrf_field() }}
                            {{method_field('put')}} 
                            <div class="form-group">
                              <label for="titile">Post Title</label>
                              <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title" value='{{$post -> title}}'>
                            </div>
                            <div class="form-group">
                              <label for="description">Post Description</label>
                              <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{$post -> description}}</textarea>
                            </div>
                            <div class="form-group mt-2">
                              <select class="form-select" name="user_id">
                                @foreach ($users as $user)
                                    <option  value="{{$user -> id}}" @if($user -> id == $post -> user_id) selected @endif>{{$user -> name}}</option>
                                @endforeach
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update Post</button>
                          </form>
                    </div>
        </div>
        
@endsection('content')