@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificar su Cuenta de Correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un Link de verificacion fue enviado a su Correo electronico.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor conprueve el link de verificacion en su correo.') }}
                    {{ __('si no recibio el mail de verificacion') }}, <a href="{{ route('verification.resend') }}">{{ __('hacer click aca para recibir otro correo') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
