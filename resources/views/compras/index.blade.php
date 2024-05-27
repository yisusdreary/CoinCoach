@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="custom-size">Compra</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-4">
                    <label for="criptomoneda">Seleccionar Criptomoneda</label>
                    <select class="form-control-lg" id="criptomoneda" name="criptomoneda">
                        <option value="bitcoin">Bitcoin</option>
                        <option value="ethereum">Ethereum</option>
                        <option value="litecoin">Litecoin</option>
                        <option value="ripple">Ripple</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="numero1">Cantidad de criptomonedas a comprar</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-currency-bitcoin fs-1"></i></span>
                        </div>
                        <input type="number" class="form-control-lg text-center" id="numero1" name="numero1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero2">Precio a pesos</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-currency-dollar fs-1"></i></span>
                        </div>
                        <input type="number" class="form-control-lg text-center" id="numero2" name="numero2">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="button" class="btn btn-primary">Comprar criptos</button>
                </div>
            </div>
        </div>
    </div>
@endsection
