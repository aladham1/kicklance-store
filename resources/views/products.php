<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>


<!-- product 1 , price 30$ -->

<ul>
    <?php
    foreach ($products as $key => $product) : ?>
        <li>
            <a href="/products/show/<?php echo $key?>"
            target="_blank"
            ><?php echo $product['title'] .' '. $product['price'] ?></a>
        </li>
    <?php
    endforeach;
    ?>
</ul>

</body>
</html>




