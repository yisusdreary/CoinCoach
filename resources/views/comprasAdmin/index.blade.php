@extends("layouts.app")
@section("content")
    <div class="row justify-content-center">
        <div class="col-8 bg-white pt-3">

            <a href="{{url("comprasAdmin/create")}}" class="btn btn-success text-white mb-3">Agregar compras</a>

            <table class="table">
                <thead>
                <tr>
                    <td>Indice</td>
                    <td>ID de cliente</td>
                    <td>ID de criptomoneda</td>
                    <td>Fecha de compra</td>
                    <td>Cantidad</td>
                    <td>Total</td>
                    <td>Eliminar</td>
                    <td>Editar</td>
                </tr>
                </thead>
                <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$compra->id_cliente}}</td>
                        <td>{{$compra->id_criptomoneda}}</td>
                        <td>{{$compra->fecha_compra}}</td>
                        <td>{{$compra->cantidad_de_compra}}</td>
                        <td>{{$compra->total}}</td>
                        <td>
                            <form action="{{route("comprasAdmin.destroy", $compra->id_compra)}}" method="POST" class="delete-form">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">x</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary text-white" href="{{route("comprasAdmin.edit", $compra->id_compra)}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
