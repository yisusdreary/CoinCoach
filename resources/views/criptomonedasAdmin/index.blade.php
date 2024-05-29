@extends("layouts.app")
@section("content")
    <div class="row justify-content-center">
        <div class="col-8 bg-white pt-3">

            <a href="" class="btn btn-success text-white mb-3">Agregar criptomonedas</a>

            <table class="table">
                <thead>
                <tr>
                    <td>Indice</td>
                    <td>Nombre de criptomeda</td>
                    <td>Precio actual</td>
                    <td>Precio anterior</td>
                    <td>Eliminar</td>
                    <td>Editar</td>
                </tr>
                </thead>
                <tbody>
                @foreach($criptomonedas as $criptomoneda)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$criptomoneda->nombre_c}}</td>
                        <td>{{$criptomoneda->precio_actual}}</td>
                        <td>{{$criptomoneda->precio_anterior}}</td>
                        <td>
                            <form action="{{route("criptomonedasAdmin.destroy", $criptomoneda->id_criptomoneda)}}" method="POST" class="delete-form">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">x</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary text-white" href="">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
