@extends('layouts.app')

@section('page_title','Create Product')

@section('content')
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach()
        </ul>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <form action="{{route('products.store')}}" method="post"
                      class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('products.form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>

        </div>
    </div>

@endsection

