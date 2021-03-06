<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title"
           value="{{old('title', $product->title)}}"
           placeholder="Enter title">
</div>
<div class="form-group">
    <label for="cost">Cost</label>
    <input type="number" name="cost" class="form-control" id="cost"
           value="{{old('cost', $product->cost)}}"
           placeholder="Enter cost">
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" class="form-control" id="price"
           value="{{old('price', $product->price)}}"
           placeholder="Enter price">
</div>
<div class="form-group">
    <label for="sale_price">Sale Price</label>
    <input type="number" name="sale_price" class="form-control"
           value="{{old('sale_price', $product->sale_price)}}"
           id="sale_price"
           placeholder="Enter price">
</div>
<div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" class="form-control"
           value="{{old('quantity', $product->quantity)}}"
           id="quantity"
           placeholder="Enter quantity">
</div>
<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}"
                {{old('category_id', $product->category_id)  == $category->id ? 'selected' : ''}}
            >{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"
              placeholder="Enter Description...">{{old('description', $product->description)}}</textarea>
</div>
<div class="form-group">
    <label for="exampleInputFile">Main Image</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="main_image"
                   class="custom-file-input" id="image">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputFile">Images</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="images[]" multiple
                   class="custom-file-input" id="image">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="form-check">
        <input class="form-check-input" id="featured"
               {{$product->featured ?'checked':''}}
               type="checkbox" name="featured" value="1">
        <label class="form-check-label" for="featured">Featured</label>
    </div>
</div>
{{--<div class="form-group">--}}
{{--    @foreach($tags as $tag)--}}
{{--        <div class="form-check">--}}
{{--            <input class="form-check-input" name="tags[]"--}}
{{--                   value="{{$tag->id}}" type="checkbox" id="{{$tag->name}}">--}}
{{--            <label class="form-check-label" for="{{$tag->name}}">{{$tag->name}}</label>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

<div class="form-group">
    <label for="tags">Tags</label>
    {{--    <input type="text" name="tags" class="form-control"--}}
    {{--           value="{{$tags??''}}"--}}
    {{--           id="tags"--}}
    {{--           placeholder="Enter tags">--}}
    <input name="tags" placeholder="write some tags" value="">
</div>

