@extends('layouts.app')

@section('css_page')


@endsection



@section('page_title')
Users
@endsection

@section('content')
    <div class="row mt-4 mb-4">
        <div class="col-12">
            <a href="{{route('users.create')}}" class="btn btn-primary">New User</a>
        </div>
    </div>

    <x-flash-message />
   <div class="card">
       <div class="card-body">
           <table class="table">
               <thead>
               <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Country</th>
                   <th>City</th>
                   <th>Birthdate</th>
                   <th>Action</th>
               </tr>
               </thead>
               <tbody>
               @foreach ($users as $key => $user)
                   <tr>
                       <td>{{$key +1}}</td>
                       <td>{{$user->name}}</td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->profile->country}}</td>
                       <td>{{$user->profile->city}}</td>
                       <td>{{$user->profile->birthdate}}</td>

                       <td>
                           <a href="{{route('users.edit',$user->id)}}"
                              class="btn btn-primary">Edit</a>
                           <form action="{{route('users.destroy', $user->id)}}" class="d-inline-block" method="post">
                               @csrf
                               @method('DELETE')
                               <button class="btn btn-danger">Delete</button>
                           </form>
                       </td>
                   </tr>
               @endforeach

               </tbody>

           </table>
       </div>
   </div>
@endsection


