<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Ingrese su reclamo</title>
</head>
<body class="micolor">
    <div class="d-flex mx-auto gap-5 w-50 justify-content-center" style="max-width: 500px " >
        <img src="{{URL::asset('/image/redescucha.png')}}" class="img-fluid" alt="...">
    </div>
    <div class= "mx-auto w-75 text-center">
        <h1 class="text-warning shadowing"> Nos interesa tu opinión, ¿Cómo fue tu trayecto el día de hoy?</h1>
    </div>
    <form method="POST" action="{{route ('comments.store')}}">
        <div class="form-group mt-4 d-grid mx-auto w-50">
          @csrf
          {{-- <label for="exampleInputComplaint">Email address</label> --}}
          <textarea class="form-control rounded" id="exampleInputComplaint" aria-describedby="ComplaintHelp" name="comentario" rows="5" placeholder="Ingrese su experiencia"></textarea>
          <small id="ComplaintHelp" class="form-text text-muted"></small>
          <button class="btn btn-info pull-right btn-warning" style="margin-top:10px" type="submit">Enviar</button>
    </form>

      <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
