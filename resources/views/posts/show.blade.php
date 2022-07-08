@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
                Post Information
            </div>
            <div class="card-body">
                <h5 class="card-title">ID: {{$post -> id}}</h5>
                <h5 class="card-title">Title: {{$post -> title}}</h5>
                <h5 class="card-title">Description: {{$post -> description}}</h5>
                <h5 class="card-title">User Name:
                    @foreach ($users as $user)
                        @if($post -> user_id == $user -> id)
                        {{$user -> name}}
                        @endif
                    @endforeach
                </h5>
            </div>
        </div>
        
@endsection('content')