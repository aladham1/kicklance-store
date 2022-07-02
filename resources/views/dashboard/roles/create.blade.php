@extends('layouts.app')

@section('page_title','Create role')

@section('content')
    <div class="card card-primary">
    <form action="{{route('roles.store')}}" method="post" class="mt-4">
        @csrf
        @include('dashboard.roles.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>
@endsection

