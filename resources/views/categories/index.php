<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>">
    <title>Categories</title>

</head>
<body>

<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-12">
            <a href="/categories/create" class="btn btn-primary">New Category</a>
        </div>
    </div>

    <?php if (session()->has('success')){ ?>
        <div class="alert alert-success">
            <?php echo session()->get('success') ?>
        </div>
    <?php } ?>
    <table class="table">
       <thead>
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Description</th>
           <th>Action</th>
       </tr>
       </thead>
    <tbody>
    <?php foreach ($categories as $category) { ?>
        <tr>
            <td><?php echo $category->id ?></td>
            <td><?php echo $category->name ?></td>
            <td><?php echo $category->description ?></td>
            <td>
                <a href="/categories/<?php echo $category->id ?>/edit" class="btn btn-primary">Edit</a>
            </td>
        </tr>

    <?php } ?>
    </tbody>

    </table>
</div>

</body>
</html>
