@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <!-- Columna Izquierda: Formulario -->
            <div class="col-md-6">
                <h1 class="display-4 mb-5" style="font-size: 3.5rem;">Venta</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('ventas.store') }}" method="POST">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="id_criptomoneda" class="custom-label">Seleccionar Criptomoneda</label>
                        <select class="form-control form-control-lg" id="id_criptomoneda" name="id_criptomoneda">
                            @foreach($criptomonedas as $criptomoneda)
                                <option value="{{ $criptomoneda->id_criptomoneda }}" data-precio="{{ $criptomoneda->precio_actual }}">
                                    {{ $criptomoneda->nombre_c }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label for="cantidad_de_venta" class="custom-label">Cantidad de Criptomonedas a Vender</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-currency-dollar fs-1"></i></span>
                            </div>
                            <input type="number" class="form-control form-control-lg text-center" id="cantidad_de_venta" name="cantidad_de_venta">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="total" class="custom-label">Ganancia a Pesos</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-currency-dollar fs-1"></i></span>
                            </div>
                            <input type="number" class="form-control form-control-lg text-center" id="total" name="total" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn text-white fw-bolder btn-primary btn-lg">Vender Criptos</button>
                    </div>
                </form>
            </div>

            <!-- Columna Derecha: Gráfica -->
            <div class="col-md-6">
                <canvas id="cryptoChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .custom-label {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3E95D1;
            color: white;
            font-size: 1.25rem;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('cryptoChart').getContext('2d');
            var cryptoChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                    datasets: [
                        {
                            label: 'Bitcoin',
                            data: [300010, 320010, 310020, 330000, 340000],
                            borderColor: '#3E95D1',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Ethereum',
                            data: [4500, 1600, 4700, 4800, 56000],
                            borderColor: '#8e5ea2',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Litecoin',
                            data: [200, 220, 210, 230, 240],
                            borderColor: '#3cba9f',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Ripple',
                            data: [0.5, 0.6, 0.55, 0.65, 0.7],
                            borderColor: '#e8c3b9',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuad'
                    },
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            // Actualizar el precio total al cambiar la criptomoneda o la cantidad
            const criptomonedaSelect = document.getElementById('id_criptomoneda');
            const cantidadInput = document.getElementById('cantidad_de_venta');
            const totalInput = document.getElementById('total');

            function actualizarTotal() {
                const selectedOption = criptomonedaSelect.options[criptomonedaSelect.selectedIndex];
                const precio = selectedOption.getAttribute('data-precio');
                const cantidad = cantidadInput.value;
                totalInput.value = precio * cantidad;
            }

            criptomonedaSelect.addEventListener('change', actualizarTotal);
            cantidadInput.addEventListener('input', actualizarTotal);
        });
    </script>
@endsection
