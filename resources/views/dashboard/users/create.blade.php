@extends('layouts.app')

@section('page_title','Create User')

@section('content')
    @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach()
          </ul>
      </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <form action="{{route('users.store')}}" method="post"
                      class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('dashboard.users.form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>

        </div>
    </div>

@endsection

