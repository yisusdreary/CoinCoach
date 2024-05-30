@extends("layouts.app")
@section("content")
    <div class="row mt-4">
        <div class="col-2"></div>
        <div class="col">
            <form action="{{url("ventasAdmin")}}" method="POST">
                @csrf
                <h1>Registrar ventas</h1>

                <div class="mb-3 mt-4">
                    <label for="id" class="form-label">Usuario</label>
                    <select class="form-control form-control-lg" id="id" name="id">
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id}}">
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 mt-4">
                    <label for="id_criptomoneda" class="form-label">Criptomoneda</label>
                    <select class="form-control form-control-lg" id="id_criptomoneda" name="id_criptomoneda">
                        @foreach($criptomonedas as $criptomoneda)
                            <option value="{{ $criptomoneda->id_criptomoneda }}" data-precio="{{ $criptomoneda->precio_actual }}">
                                {{ $criptomoneda->nombre_c }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 mt-4">
                    <label for="cantidad_de_compra" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad_de_compra" aria-describedby="emailHelp" name="cantidad_de_compra" placeholder="Cantidad a comprar">
                </div>

                <div class="mb-3 mt-4">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" id="total" aria-describedby="emailHelp" name="total" placeholder="Total de compra">
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
