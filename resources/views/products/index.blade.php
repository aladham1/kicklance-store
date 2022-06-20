@extends('layouts.app')

@section('css_page')


@endsection



@section('page_title')
Products
@endsection

@section('content')
    <div class="row mt-4 mb-4">
        <div class="col-12">
            <a href="{{route('products.create')}}" class="btn btn-primary">New Product</a>
        </div>
    </div>

    <x-flash-message />
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
                   <th>Tags</th>
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
{{--                       <td>{{$product->category ?$product->category->name:''}}</td>--}}
                       <td>{{$product->category->name}}</td>
{{--                       @php--}}
{{--                       $tags = $product->tags()->pluck('name')->toArray()--}}
{{--                       @endphp--}}
{{--                       <td>{{implode(',',$tags)}}</td>--}}
                       <td>
                           @foreach($product->tags as $tag)
                               <a href="{{route('tags.products', $tag->id)}}">{{$tag->name}}</a>
                           @endforeach

                       </td>
                       <td>
                           <a href="{{route('products.show',$product->id)}}"
                              class="btn btn-success">Show</a>
                           <a href="{{route('products.edit',$product->id)}}"
                              class="btn btn-primary">Edit</a>
                           <form action="{{route('products.destroy', $product->id)}}" class="d-inline-block" method="post">
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
{{--{{$categories->links()}}--}}
@endsection


