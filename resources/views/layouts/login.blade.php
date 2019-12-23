<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/master.css" type='text/css' media='all'>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="panel left">
            <div class="content">
                <h2>Administración El Man Está Vivo</h2>
                
            </div>
        </div>
        <div class="panel right">
            <div class="content">
                <img src="img/logo-ixtus.svg" class="ixtus">
                <h2>Iniciar sesión</h2>
                <form action="{{url('verificar')}}" method="POST">
                    {!!csrf_field()!!}
                    <input type="hidden">
                    <input type="email" name="usuario" placeholder="E-mail">
                    <input type="password" name="pass" placeholder="Contraseña">
                    <button type="submit" class="btn"><span>Iniciar sesión</span></button>
                </form>
                <img src="/img/logo-cccmd.svg" class="cccmd">
            </div>
        </div>
    </div>
</body>

</html>