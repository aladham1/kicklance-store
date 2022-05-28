<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <x-form.input name="name" type="text" label="Category name"
                              class="my-input dsfsdf" placeholder="Category name"
                value="{{$category->name ?? ''}}"
                />


                {{--            @if($errors->has('name'))--}}
                {{--                <p class="text-danger">--}}
                {{--                    {{$errors->first('name')}}--}}
                {{--                </p>--}}
                {{--            @endif--}}
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">
                    Description
                </label>
                <textarea name="description"
                          class="form-control  @error('description') is-invalid @enderror">
            {{old('description', $category->description ?? '')}}</textarea>
                @error('description')
                <p class="invalid-feedback">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">
                    Image
                </label>
                <input type="file" name="image" class="form-control"
                       id="image">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">
                    Parent
                </label>
                <select name="parent_id" class="form-control">
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $item) { ?>
                    <option value="<?php echo $item->id ?>"
                    <?php echo isset($category->parent_id) && $category->parent_id == $item->id ? 'selected' : '' ?>
                    ><?php echo $item->name?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>
