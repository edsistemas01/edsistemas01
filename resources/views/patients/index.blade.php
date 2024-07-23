@extends('layouts.app')

@section('content')

<div class="container">
    <h2>
        Paciente
        <div class="d-flex justify-content-end">
            <a href="{{ route('patients.create') }}" class="btn btn-primary" style="display:inline;">Crear Nuevo Paciente</a>
        </div>
    </h2>
    
    <table id="data-tables" class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Género</th>
                <th>Edad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->pat_id }}</td>
                    <td>{{ $patient->pat_name }}</td>
                    <td>{{ $patient->pat_sex }}</td>
                    <td>{{ $patient->pat_age }}</td>
                    <td>{{ $patient->pat_phone }}</td>
                    <td>
                        <a title="Mostrar" href="{{ route('patients.show', $patient->id) }}" class="btn">
                            <i class="fas fa-eye" style="color: blue;"></i>
                        </a>
                        <a title="Editar" href="{{ route('patients.edit', $patient->id) }}" class="btn">
                            <i class="fas fa-edit" style="color: green;"></i>
                        </a>  
                        <a title="Eliminar" href="" onclick="openModal('{{ config('app.name', 'Laravel') }}', '¿Está seguro de que desea eliminar al Paciente {{ strtoupper($patient->pat_name); }}?', '{{ route('patients.destroy', $patient->id) }}')" data-bs-toggle="modal" class="btn">
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
