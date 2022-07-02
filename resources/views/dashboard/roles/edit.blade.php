@extends('layouts.app')

@section('page_title','Update Category')

@section('content')
    <div class="card card-primary">
        <form action="{{route('roles.update', $role->id)}}" method="post" class="mt-4">
            @csrf
            {{method_field('PUT')}}
            @include('dashboard.roles.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
