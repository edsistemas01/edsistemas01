@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card" style="width: 448px;">
            <div class="card-header card-header-custom d-flex justify-content-center"><h3>Editar Paciente [{{ $patient->id }}]</h3></div>
            <div class="card-body card-body-custom">
                <div class="table-responsive-sm">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 68px;">DNI:</th>
                                <td>
                                    <input type="number" class="form-control w-50" id="pat_id" name="pat_id" style="text-transform:uppercase;" value="{{ $patient->pat_id }}" autofocus required>
                                </td>
                            </tr>
                            <tr>
                                <th>Nombre:</th>
                                <td>
                                    <input type="text" class="form-control" id="pat_name" name="pat_name" style="text-transform:uppercase;" value="{{ $patient->pat_name }}" autofocus required>
                                </td>
                            </tr>
                            <tr>
                                <th>Género:</th>
                                <td>
                                    @php
                                        $options = [
                                            'option1' => 'MASCULINO',
                                            'option2' => 'FEMENINO',
                                        ];
                                        if ($patient->pat_sex == 'MASCULINO'){
                                            $defaultOption = 'option1';
                                        }else{
                                            $defaultOption = 'option2';
                                        }
                                    @endphp
                                    @foreach($options as $key => $value)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pat_sex" id="{{ $key }}" value="{{ $value }}" {{ $key == $defaultOption ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $key }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Edad:</th>
                                <td>
                                    <input type="number" class="form-control w-25" id="pat_age" name="pat_age" value="{{ $patient->pat_age }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Teléfono:</th>
                                <td>
                                    <input type="number" class="form-control w-50" id="pat_phone" name="pat_phone" value="{{ $patient->pat_phone }}" required>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="card-footer card-footer-custom text-muted d-flex justify-content-end">
                <a href="{{ route('patients.index') }}" class="btn btn-danger" style="margin-right: 10px">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </form>
</div>

@endsection
