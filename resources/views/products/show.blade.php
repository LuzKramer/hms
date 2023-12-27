<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background:green;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h1>informações</h1>

    <ul>
        <li>{{ $product->name ?? 'N/A' }}</li>
        <li>{{ $product->category ?? 'N/A' }}</li>
        <li>{{ $product->descript ?? 'N/A' }}</li>
        <li>{{ $product->exp_date ?? 'N/A' }}</li>
    </ul>



    <h2>fodassse</h2>


</body>

</html>
