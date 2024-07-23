@extends('layouts.app')

@section('content')

<div class="container">
    <h2>
        Historia Clínica
        <div class="d-flex justify-content-end">
            <a href="{{ route('historys.create') }}" class="btn btn-primary" style="display:inline;">
                Agregar Historia Clínica</a>
        </div>
    </h2>
    
    <table id="data-tables" class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th style="width:3cm">Fecha</th>
                <th>Turno</th>
                <th style="width:10cm">Doctor</th>
                <th style="width:10cm">Paciente</th>
                {{--  <th>Edad</th>
                <th>Presión</th>
                <th>F Cardiaca</th>
                <th>Temperatura</th>
                <th>PP Oxígeno</th>
                <th>Glucosa</th>
                <th>Alergias</th>
                <th>Diagnóstico</th>
                {{--  <th>Tratamiento</th>
                <th>Referencias</th>  --}}
                <th style="width:5cm">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historys as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->formatted_date }}</td>
                    <td>{{ $history->his_shift }}</td>
                    <td>{{ $history->doctor->doc_name ?? 'N/A' }}</td>
                    <td>{{ $history->patient->pat_name ?? 'N/A' }}</td>
                    {{--  <td>{{ $history->patient->pat_age ?? 'N/A' }}</td>
                    <td>{{ $history->his_pressure }}</td>
                    <td>{{ $history->his_fcardiac }}</td>
                    <td>{{ $history->his_temperature }}</td>
                    <td>{{ $history->his_ppoxygen }}</td>
                    <td>{{ $history->his_glucose }}</td>
                    <td>{{ $history->his_allergies }}</td>
                    <td>{{ $history->his_diagnostic }}</td>
                    {{--  <td>{{ $history->his_treatment }}</td>
                    <td>{{ $history->his_references }}</td>  --}}
                    <td>
                        <a title="Mostrar" href="{{ route('historys.show', $history->id) }}" class="btn pr-0">
                            <i class="fas fa-eye" style="color: blue;"></i>
                        </a>
                        <a title="Editar" href="{{ route('historys.edit', $history->id) }}" class="btn pr-0">
                            <i class="fas fa-edit" style="color: green;"></i>
                        </a>  
                        <a title="Eliminar" href="" onclick="openModal('{{ config('app.name', 'Laravel') }}', '¿Está seguro de que desea eliminar la Historia Clínica Nº {{ $history->id }}?', '{{ route('historys.destroy', $history->id) }}')" data-bs-toggle="modal" class="btn pr-0">
                            <i class="fas fa-trash" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function openModal(title, content, actionUrl) {
        $('#globalModalLabel').text(title);
        $('#globalModal .modal-body').text(content);
        $('#modalForm').attr('action', actionUrl);
        $('#globalModal').modal('show');
    }
</script>
    
@endsection