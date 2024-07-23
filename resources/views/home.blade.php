@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenid@ al Sistema de Atención Médica') }}</div>
                
                <div class="card-body">
                    
                    {{--  @if (session('status'))
                        //dd(session('status'));
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif  --}}

                    {{--  @if (session('status'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.opacity
                            class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif  --}}

                    {{ __('¡Estas conectad@!') }}
                    {{ Auth::user()->name.'!' }}
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
