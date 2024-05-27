@extends("layouts.app")
@section("content")
    <div class="row justify-content-center">
        <div class="col-8 bg-white pt-3">

            <a href="" class="btn btn-success text-white mb-3">Agregar ventas</a>

            <table class="table">
                <thead>
                <tr>
                    <td>Indice</td>
                    <td>ID de cliente</td>
                    <td>ID de criptomoneda</td>
                    <td>Fecha de venta</td>
                    <td>Cantidad</td>
                    <td>Total</td>
                    <td>Eliminar</td>
                    <td>Editar</td>
                </tr>
                </thead>
                <tbody>
                @foreach($ventas as $venta)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$venta->id_cliente}}</td>
                        <td>{{$venta->id_criptomoneda}}</td>
                        <td>{{$venta->fecha_venta}}</td>
                        <td>{{$venta->cantidad_de_venta}}</td>
                        <td>{{$venta->total}}</td>
                        <td>
                            <form action="" method="POST">
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
