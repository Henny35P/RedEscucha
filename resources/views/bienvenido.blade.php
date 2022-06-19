<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Bienvenido a RedEscucha</title>
</head>
<body class="micolor">
    <div class="d-flex mx-auto gap-5 w-50 justify-content-center" style="max-width: 600px " >
        <img src="{{URL::asset('/image/redescuchalogo.png')}}" class="img-fluid" alt="...">
    </div>
    <div class="d-grid gap-5 mx-auto w-50">
        <a class="btn btn-primary btn-lg rounded-pill btn-warning link-dark" href="reclamos" role="button">Ingresa tus reclamos y sugerencias</a>
        <a class="btn btn-primary btn-lg rounded-pill btn-warning link-dark" href="#" role="button">Revisa las nuevas mejoras en el transporte</a>
      </div>

      <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
