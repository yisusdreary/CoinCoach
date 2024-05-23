@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @php(\Brian2694\Toastr\Facades\Toastr::success('Se actualizaron los datos correctamente','Exito'))
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    {{--Indica que si la sesion existe con el nombre success, va a entra en el if--}}
    @if(Session::has('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
            {{--Saca el mensaje que contiene la variable de sesion, este mesaje lo mando desde el controlador que retorna la vista--}}
                title: "{{ Session::get('success') }}",
                showConfirmButton: false,
                timer: 1000
            });
        </script>
    @endif
@endsection
