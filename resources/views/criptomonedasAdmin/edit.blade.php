@extends("layouts.app")
@section("content")
    <div class="row mt-4">
        <div class="col-2"></div>
        <div class="col">
            <form action="{{url("comprasAdmin")}}" method="POST">
                @csrf
                @method("PUT")
                <h1>Registrar criptomonedas</h1>

                <div class="mb-3 mt-4">
                    <label for="nombre_c" class="form-label">Nombre de la criptomoneda</label>
                    <input type="text" class="form-control" id="nombre_c" aria-describedby="emailHelp" name="nombre_c" placeholder="Escriba el nombre de la criptomoneda" value="{{$criptomoneda->nombre_c}}">
                </div>

                <div class="mb-3 mt-4">
                    <label for="precio_actual" class="form-label">Precio de la criptomoneda</label>
                    <input type="number" class="form-control" id="precio_actual" aria-describedby="emailHelp" name="precio_actual" placeholder="Escriba el precio de la criptomoneda" value="{{$criptomoneda->precio_actual}}">
                </div>

                <div class="row">
                    <div class="col-1 me-3">
                        <a href="{{url("criptomonedasAdmin")}}" type="submit" class="btn btn-danger mt-4 fw-bolder">Cancelar</a>
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
