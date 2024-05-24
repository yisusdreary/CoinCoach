@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="custom-size">Venta</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero1">Cantidad de criptomonedas a vender</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="bi bi-currency-bitcoin fs-1"></i>
                        </div>
                        <input type="number" class="form-control" id="numero1" name="numero1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero2">Ganancias a pesos</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="bi bi-currency-dollar fs-1"></i>
                        </div>
                        <input type="number" class="form-control" id="numero2" name="numero2">
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary">Vender criptos</button>
                </div>
            </div>
        </div>
    </div>
@endsection
