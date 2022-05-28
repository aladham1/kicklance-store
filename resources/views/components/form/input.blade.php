@props(['type','label','name','value','placeholder'])

<label for="name" class="form-label">
    {{$label}}
</label>
<input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}"
@error($name) is-invalid @enderror " value="{{old($name, $value)}}" id="name"
{{$attributes->class(['form-control'])}}
>
@error($name)
<p class="text-danger">
    {{$message}}
</p>
@enderror
