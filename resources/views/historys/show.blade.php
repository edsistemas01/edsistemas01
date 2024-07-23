@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h2>Detalles de la Historia Clínica</h2>
        <table class="table border=0">
            <thead>
                <tr>
                    <th scope="col">Fecha:</th>
                    <td>{{ $history->formatted_date }}</td>
                    <th scope="col">Turno:</th>
                    <td>{{ $history->his_shift }}</td>
                    <th scope="col">Doctor:</th>
                    <td>{{ $history->doctor->doc_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th scope="col">Paciente:</th>
                    <td>{{ $history->patient->pat_name ?? 'N/A' }}</td>
                    <th scope="col">Presión:</th>
                    <td>{{ $history->his_pressure ?? 'N/A' }}</td>
                    <th scope="col">F. Cardiaca:</th>
                    <td>{{ $history->his_fcardiac }}</td>
                </tr>
                <tr>
                    <th scope="col">Temperatura:</th>
                    <td>{{ $history->his_temperature }}</td>
                    <th scope="col">PP Oxígeno:</th>
                    <td>{{ $history->his_ppoxygen }}</td>
                    <th scope="col">Glucosa:</th>
                    <td>{{ $history->his_glucose }}</td>
                </tr>
                <tr>
                    <th scope="col">Alergias:</th>
                    <td>{{ $history->his_allergies }}</td>
                    <th scope="col">Diagnóstico:</th>
                    <td colspan=3>{{ $history->his_diagnostic }}</td>
                </tr>
                <tr>
                    <th scope="col">Tratamiento:</th>
                    <td colspan=2>{{ $history->his_treatment }}</td>
                    <th scope="col">Referencias:</th>
                    <td colspan=2>{{ $history->his_references }}</td>
                </tr>
            </thead>
        </table>
        <a href="{{ route('historys.index') }}" class="btn btn-danger">Cerrar</a>
    </div>
@endsection