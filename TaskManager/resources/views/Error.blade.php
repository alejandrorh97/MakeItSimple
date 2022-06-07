<html>

<head>
    <title>Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br>
    <h1 class="text-center">Error - no tienes permisos para acceder a este sitio</h1>
    <br><br>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <input type="submit" value="Cerrar sesion" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</body>

</html>