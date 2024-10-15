@extends("layouts.app")
@section("content")
    <div class="row justify-content-center">
        <div class="col-8 bg-white pt-3 table-responsive">

            <div class="card">
                <div class="card-header">
                    <H2>Usuarios.</H2>
                </div>
                <div class="card-body">
                    <table class="table">
                    <thead>
                    <tr>
                        <td>Indice</td>
                        <td>Nombre</td>
                        <td>No. de identificación</td>
                        <td>Capital</td>
                        <td>Rendimiento</td>
                        <td>Correo</td>
                        <td>Eliminar</td>
                        <td>Editar</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$usuario->name}}</td>
                            <td STYLE="width: 15%">{{$usuario->no_identificacion}}</td>
                            <td>{{$usuario->capital}}</td>
                            <td>{{$usuario->rendimiento != null ? $usuario->rendimiento : 'Sin registros'}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                                <form action="{{route('users.destroy',$usuario)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                 <button class="btn btn-danger">x</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-primary text-white" href="{{route('users.edit',$usuario->id)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
