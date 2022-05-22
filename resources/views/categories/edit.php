<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>">
    <title>Edit Category</title>

</head>
<body>
<div class="container">
    <?php if ($errors->any()) { ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors->all() as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <form action="/categories/<?php echo $category->id?>" method="post" class="mt-4">
        <!--        <input type="hidden" name="_token" value="--><?php //echo csrf_token()?><!--">-->
        <?php echo csrf_field()?>
<!--        <input type="hidden" name="_method" value="PUT">-->
        <?php echo method_field('PUT')?>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Name
                    </label>
                    <input type="text" name="name" class="form-control"
                           value="<?php echo old('name',$category->name)?>"
                           id="name">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Description
                    </label>
                    <textarea name="description" class="form-control"><?php echo old('name',$category->description)?></textarea>
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
                         <?php echo $category->parent_id == $item->id ? 'selected': '' ?>
                            ><?php echo $item->name?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


</body>
</html>
