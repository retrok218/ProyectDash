@extends('home')
<!-- <meta http-equiv="refresh" content="30"> -->
@section('content')


<div class="container">
    <h1>Ejemplo de Check Box </h1>
    <form action="submit" method="POST">
        @csrf
            <input type="text" name="nombre_pru" placeholder="Ingresa Eje">
            <br> <br>
        <div class="container">
            <input type="checkbox" name="Areas[]"  value="Area 1"> Area-1
            <input type="checkbox" name="Areas[]"  value="Area 2"> Area-2
            <input type="checkbox" name="Areas[]"  value="Area 3"> Area-3
            <input type="checkbox" name="Areas[]"  value="Area 4"> Area-5
            <input type="checkbox" name="Areas[]"  value="Area 4"> Area-6
            <br>
            <input type="checkbox" name="Areas[]"  value="Area 4"> Area-7
            <input type="checkbox" name="Areas[]"  value="Area 4"> Area-8
            <input type="checkbox" name="Areas[]"  value="Area 4"> Area-9
            <input type="checkbox" name="Areas[]"  value="Area 4"> Area-10
            <input type="checkbox" name="Areas[]"  value="Area 4"> Area-11
        </div>
        <br>
        <button type="submit">Enviar datos</button>
    </form>
</div>






@endsection