@extends('layouts.app')

@section('page_title','Create Category')

@section('content')
    <div class="card card-primary">
    <form action="{{route('categories.store')}}" method="post" class="mt-4">
        @csrf
        @include('categories.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>
@endsection

