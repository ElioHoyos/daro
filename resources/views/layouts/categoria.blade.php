@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        {{-- <div class="col-md-6">&nbsp;</div> --}}
        <div class="col-md-5">
            {{-- <div class="card"> --}}
            <div class="card">
                <div class="card-header text-center" style="background-color: #942a29; color: white">{{ __('INGRESAR AL SISTEMA') }}</div>
                {{-- <div class="card-header" style="background-color: #145cb1a3">{{ __('Inicio de Sesión') }}</div> --}}
                @php
                    var_dump($categoria);
                @endphp
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img src="{{asset('img/logo_daro_gif.gif')}}" alt="" class="img-fluid">
                    </div> 
                    <br>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user" class="col-sm-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control form-control-sm{{ $errors->has('user') ? ' is-invalid' : '' }}" 
                                    name="user" value="{{ old('user') }}" required autofocus placeholder="Ingresar Usuario">

                                @if ($errors->has('user'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                    name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-navy">
                                    {{ __('Iniciar Sesión') }}
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

