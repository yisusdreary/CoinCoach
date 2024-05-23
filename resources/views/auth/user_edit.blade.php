@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mt-2"><h3>Modificar perfil</h3></div>

                    <div class="card-body" style="background: #eef0ef">
                        <form method="POST" action="{{ route('users.update',$user) }}" id="datos_cambio">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col text-center">
                                    <img src="{{ asset('storage/logo.png') }}" height="300px" width="300px">
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center mt-4">
                                <div class="col-md-6">
                                    <label for="nombre" class="col-12 col-form-label text-md-center"><h4>Nombre</h4></label>

                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $user->name) }}" required>

                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-6">
                                    <label for="capital" class="col-12 text-md-center"><h4>Capital</h4></label>

                                    <input id="capital" type="number" class="form-control @error('capital') is-invalid @enderror" name="capital" value="{{old('capital')}}" placeholder="{{'Capital actual: $'.$user->capital}}" required>

                                    @error('capital')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button id="cambiar_datos" type="button" class="btn btn-primary">
                                        {{ __('Cambiar datos') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#cambiar_datos').click(function (){
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Deseas actualizar tus datos?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario
                    document.getElementById('datos_cambio').submit();
                }
            });
        })
    </script>
@endsection
