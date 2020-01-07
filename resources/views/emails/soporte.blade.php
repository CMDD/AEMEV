<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .comentario{
        border-left: 2px solid #ccc;
        margin-top: 20px;
        color: #888;
        padding-left: 20px;
        margin-left: 20px;
    }
    </style>
</head>
<body>
    <h2>¡Hola {{$request->nombre}}!</h2>
    <p>{{$request->mensaje}}</p>
    <div>
        <div class="comentario">
            <em> 
                {{$request->comentario}}
            </em>
        </div>
    </div>
</body>
</html>