@extends('layouts.app')

@section('page_title','Update Category')

@section('content')
    <div class="card card-primary">
        <form action="{{route('categories.update', $category->id)}}" method="post" class="mt-4">
            @csrf
            {{method_field('PUT')}}
            @include('categories.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
