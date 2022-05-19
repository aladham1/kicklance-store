<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>">
    <title>Create Category</title>

</head>
<body>
<div class="container">
    <form action="/categories/create" method="post" class="mt-4">
        <!--        <input type="hidden" name="_token" value="--><?php //echo csrf_token()?><!--">-->
        <?php echo csrf_field()?>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Name
                    </label>
                    <input type="text" name="name" class="form-control"
                           id="name">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Description
                    </label>
                    <textarea name="description" class="form-control"></textarea>
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
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category->id ?>"><?php echo $category->name?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>


</body>
</html>
