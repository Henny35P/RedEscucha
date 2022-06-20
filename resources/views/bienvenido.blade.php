<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Bienvenido a RedEscucha</title>
</head>

<body class="micolor">
  <div class="d-flex mx-auto gap-5 vw-50 justify-content-center" style="max-width: 600px ">
    <img src="{{URL::asset('/image/redescucha.png')}}" class="ms-5 img-fluid shadowimage glowie" alt="...">
  </div>
  <div class="d-grid gap-5 mx-auto w-50">
    <a class="btn btn-primary btn-lg rounded-pill btn-warning link-dark" href="reclamos" role="button">Ingresa tus reclamos y sugerencias</a>
    <a class="btn btn-primary btn-lg rounded-pill btn-warning link-dark" href="#" role="button">Revisa las mejoras en el transporte</a>
  </div>
  <footer class="fixed-bottom text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-4 text-white">
      <a class="text-white fs-5 " href="https://mdbootstrap.com/">Preguntas Frecuentes sobre Red Escucha</a>
      <img src="{{URL::asset('/image/BPLogo.jpg')}}" class="w-25 position-absolute bottom-0 end-0" style="max-width:10em" alt="...">
    </div>

    <!-- Copyright -->
  </footer>

  <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
