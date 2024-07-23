@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <div class="card" style="width: 448px;">
        <div class="card-header card-header-custom d-flex justify-content-center"><h3>Información del Paciente [{{ $patient->id }}]</h3></div>
        <div class="card-body card-body-custom">
            <div class="table-responsive-sm">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 68px;">DNI:</th>
                            <td>
                                <input type="number" class="form-control w-50" id="pat_id" name="pat_id" style="text-transform:uppercase;" value="{{ $patient->pat_id }}" readonly required>
                            </td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>
                                <input type="text" class="form-control" id="pat_name" name="pat_name" style="text-transform:uppercase;" value="{{ $patient->pat_name }}" readonly required>
                            </td>
                        </tr>
                        <tr>
                            <th>Género:</th>
                            <td>
                                <input type="text" class="form-control w-50" id="pat_sex" name="pat_sex" style="text-transform:uppercase;" value="{{ $patient->pat_sex }}" readonly required>
                            </td>
                        </tr>
                        <tr>
                            <th>Edad:</th>
                            <td>
                                <input type="number" class="form-control w-25" id="pat_age" name="pat_age" value="{{ $patient->pat_age }}" readonly required>
                            </td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>
                                <input type="number" class="form-control w-50" id="pat_phone" name="pat_phone" value="{{ $patient->pat_phone }}" readonly required>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer card-footer-custom text-muted d-flex justify-content-end">
            <a href="{{ route('patients.index') }}" class="btn btn-danger" style="margin-right: 10px">Cerrar</a>
        </div>
    </div>
</div>

@endsection
