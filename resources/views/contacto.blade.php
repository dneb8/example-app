<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>
    <h1>Formulario de contacto</h1><hr>
    <h3> {{$tipo}} </h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="validar-contacto" method="POST">
        @csrf
        <label for="correo">Correo</label><br>
        <input type="email" name="correo"
        @if($tipo == 'alumno')
            value="@alumnos.udg.mx"
        @else
            value="@gmail.com"
        @endif
        ><br>
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="comentario">Comentario</label><br>
        <textarea name="comentario" cols="30" rows="10">
        </textarea><br>
        @error('comentario')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Enviar">
    </form>
</body>
</html>