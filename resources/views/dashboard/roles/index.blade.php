@extends('layouts.app')

@section('css_page')


@endsection



@section('page_title')
    Roles
@endsection

@section('content')
    <div class="row mt-4 mb-4">
                    <div class="col-12">
                        <a href="{{route('roles.create')}}"
                           class="btn btn-primary">New Role</a>
                    </div>


    </div>


    <x-flash-message/>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Users</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{$key +1}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->users_count}}</td>
                <td>
                    <a href="{{route('roles.edit',$role->id)}}"
                       class="btn btn-primary">Edit</a>
                    <form action="{{route('roles.destroy', $role->id)}}" class="d-inline-block" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    {{$roles->links()}}
@endsection


