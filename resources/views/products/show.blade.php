@extends('layouts.app')

@section('page_title',$product->title)

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-body">
                    <h4 class="mb-4"> {{$product->title}}</h4>
                    <h5 class="mb-4">Category: {{$product->category->name}}</h5>
                    <p>{{$product->description}}</p>
                    @if(count($product->tags) > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($product->tags as $tag)
                                <tr>

                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-body">
                    <h4>Images</h4>
                    <div class="row">
                        @foreach($product->images as $image)
                            <form method="post"
                                action="{{route('products.images.destroy',$image->id)}}">
                              @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <img src="{{asset('storage/'.$image->path_image)}}"
                                     alt="{{$product->title}}" class="img-fluid"
                                     style="height: 150px; width: 150px; padding: 10px">
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

