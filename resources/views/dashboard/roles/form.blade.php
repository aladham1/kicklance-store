<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <x-form.input name="name" type="text" label="Role name"
                              class="my-input" placeholder="Role name"
                              value="{{$role->name ?? ''}}"
                />


                {{--            @if($errors->has('name'))--}}
                {{--                <p class="text-danger">--}}
                {{--                    {{$errors->first('name')}}--}}
                {{--                </p>--}}
                {{--            @endif--}}
            </div>

            <div class="mb-3">
                <div class="form-group">
                    @foreach(config('abilities') as $key => $ability)
                        <div class="form-check">
                            <input class="form-check-input" value="{{$key}}" id="{{$key}}"
                                   type="checkbox" name="abilities[]"
                                {{in_array($key, $role->abilities ?? []) ? 'checked' : ''}}
                            >
                            <label class="form-check-label" for="{{$key}}">{{$ability}}</label>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
