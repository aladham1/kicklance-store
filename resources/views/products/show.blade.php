@extends('layouts.app')

@section('page_title',$product->title)

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-body">
                  <h4> {{$product->title}}</h4>
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
              </div>
            </div>

        </div>
    </div>

@endsection

