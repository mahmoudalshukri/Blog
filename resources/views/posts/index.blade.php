@extends('layouts.app')
@section('content')
<div class="container mt-5">
        <h1>Posts CRUD</h1>
        <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Post By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($postsFromDB as $post)
                <tr>
                    <th scope="row">{{$post -> id}}</th>
                    <td>{{$post -> title}}</td>
                    {{-- <td>{{$post -> user_id}}</td> --}}
                    <td>{{$post -> user ? $post -> user -> name: 'user not found'}}</td>
                    <td>{{$post -> created_at -> format('y-d-m')}}</td>
                    <td>
                      <form method="POST" action="{{route('posts.destroy',['post' => $post -> id])}}">
                        <a href="{{route('posts.show',['post' => $post -> id])}}" class="btn btn-info">View</a>
                        <a href="{{route('posts.edit',['post' => $post -> id],['user_id' => $post -> user_id])}}" class="btn btn-primary">Edit</a>
                          {{ csrf_field() }}
                          {{method_field('delete')}} 
                          <button id="btn" onclick="return confirm('Are You Sure That Do You Want To Delete This Post?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection('content')
