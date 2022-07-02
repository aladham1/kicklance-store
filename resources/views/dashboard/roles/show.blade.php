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

    <x-flash-message/>

    <h4> {{$category->name}}</h4>

    @if($category->children()->count() > 0)
        <h5>Children</h5>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($category->children as $child)
                        <tr>

                            <td>{{$child->id}}</td>
                            <td>{{$child->name}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    @endif

    <h5>Products</h5>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->cost}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->sale_price ?? 0}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <img src="{{asset('storage/'.$product->image)}}" width="130" alt="">
                        </td>
                        <td>{{$product->category_name}}</td>
                        <td>
                            <a href="{{route('products.edit',$product->id)}}"
                               class="btn btn-primary">Edit</a>
                            <form action="{{route('products.destroy', $product->id)}}" class="d-inline-block"
                                  method="post">
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


