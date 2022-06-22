@extends('layouts.app')

@section('css_page')


@endsection



@section('page_title')
    Categories
@endsection

@section('content')
    <div class="row mt-4 mb-4">
        <div class="col-12">
            <a href="{{route('categories.create')}}" class="btn btn-primary">New Category</a>
        </div>
    </div>

    <form action="{{route('categories.index')}}" class="d-flex mb-3">
        <input type="text" name="name" placeholder="Search By name"
               class="form-control mr-3">
        <select name="parent_id" id="parent_id" class="form-control mr-3">
            <option value="">Select Category</option>
            @foreach($parentCategories as $parent)
                <option value="{{$parent->id}}">{{$parent->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <x-flash-message/>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $key => $category)
            <tr>
                <td>{{$key +1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->parent->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <a href="{{route('categories.show',$category->id)}}"
                       class="btn btn-success">Show</a>
                    <a href="{{route('categories.edit',$category->id)}}"
                       class="btn btn-primary">Edit</a>
                    <form action="{{route('categories.destroy', $category->id)}}" class="d-inline-block" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    {{$categories->links()}}
@endsection


