@extends('layouts.app')

@section('content')

<div class="container">
    <h2>
        Doctor
        <div class="d-flex justify-content-end">
            <a href="{{ route('doctors.create') }}" class="btn btn-primary" style="display:inline;">
                Crear Nuevo Doctor</a>
        </div>
    </h2>
    
    <table id="data-tables0" class="dataTable mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->doc_id }}</td>
                    <td>{{ strtoupper($doctor->doc_name); }}</td>
                    <td>{{ strtoupper($doctor->doc_speciality); }}</td>
                    <td>{{ $doctor->doc_phone }}</td>
                    <td>{{ $doctor->doc_email }}</td>
                    <td>
                        <a title="Mostrar" href="{{ route('doctors.show', $doctor->id) }}" class="btn">
                            <i class="fas fa-eye" style="color: blue;"></i>
                        </a>
                        <a title="Editar" href="{{ route('doctors.edit', $doctor->id) }}" class="btn">
                            <i class="fas fa-edit" style="color: green;"></i>
                        </a>  
                        <a title="Eliminar" href="" onclick="openModal('{{ config('app.name', 'Laravel') }}', '¿Está seguro de que desea eliminar al Doctor {{ strtoupper($doctor->doc_name); }}?', '{{ route('doctors.destroy', $doctor->id) }}')" data-bs-toggle="modal" class="btn">
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
