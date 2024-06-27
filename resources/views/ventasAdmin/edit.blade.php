@extends("layouts.app")
@section("content")
    <div class="row mt-4">
        <div class="col-2"></div>
        <div class="col">
            <form action="{{route("ventasAdmin.update", $venta->id_venta)}}" method="POST">
                @csrf
                @method("PUT")
                <h1>Editar ventas</h1>

                <input type="hidden" name="id_venta" value="{{$venta->id_venta}}">

                <div class="mb-3 mt-4">
                    <label for="id" class="form-label">Usuario</label>
                    <select class="form-control form-control-lg" id="id_usuario" name="id_usuario">
                        @foreach($usuarios as $usuario)
                            <option value="{{$usuario->id}}" {{$usuario->id==$venta->id?'selected':''}}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 mt-4">
                    <label for="id_criptomoneda" class="form-label">Criptomoneda</label>
                    <select class="form-control form-control-lg" id="id_criptomoneda" name="id_criptomoneda">
                            @foreach($criptomonedas as $criptomoneda)
                            <option value="{{ $criptomoneda->id_criptomoneda }}" {{$criptomoneda->id_criptomoneda == $venta->id_criptomoneda ? 'selected' : ''}}>
                                {{ $criptomoneda->nombre_c }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 mt-4">
                    <label for="cantidad_de_compra" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad_de_venta" aria-describedby="emailHelp" name="cantidad_de_venta" placeholder="Cantidad a vender: {{$venta->cantidad_de_venta}}" value="{{$venta->cantidad_de_venta}}">
                </div>

                <div class="mb-3 mt-4">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" id="total" aria-describedby="emailHelp" name="total" placeholder="Total de venta: {{$venta->total}}" value="{{$venta->total}}">
                </div>

                <div class="row">
                    <div class="col-1 me-3">
                        <a href="{{url("ventasAdmin")}}" type="submit" class="btn btn-danger mt-4 fw-bolder">Cancelar</a>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn text-white fw-bolder btn-primary btn-lg ">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
