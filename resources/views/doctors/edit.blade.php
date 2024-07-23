@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card" style="width: 548px;">
            <div class="card-header card-header-custom d-flex justify-content-center"><h3>Editar Doctor</h3></div>
            <div class="card-body card-body-custom">
                <div class="table-responsive-sm">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 168px;">DNI:</th>
                                <td>
                                    <input type="number" class="form-control w-50" id="doc_id" name="doc_id" style="text-transform:uppercase;" value="{{ strtoupper($doctor->doc_id); }}" autofocus required>
                                </td>
                            </tr>
                            <tr>
                                <th>Nombre:</th>
                                <td>
                                    <input type="text" class="form-control" id="doc_name" name="doc_name" style="text-transform:uppercase;" value="{{ strtoupper($doctor->doc_name); }}" autofocus required>
                                </td>
                            </tr>
                            <tr>
                                <th>Especialidad:</th>
                                <td>
                                    <input type="text" class="form-control" id="doc_speciality" name="doc_speciality" style="text-transform:uppercase;" value="{{ strtoupper($doctor->doc_speciality); }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Teléfono:</th>
                                <td>
                                    <input type="number" class="form-control w-50" id="doc_phone" name="doc_phone" value="{{ $doctor->doc_phone }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Correo electrónico:</th>
                                <td>
                                    <input type="email" class="form-control" id="doc_email" name="doc_email" value="{{ $doctor->doc_email }}" required>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="card-footer card-footer-custom text-muted d-flex justify-content-end">
                <a href="{{ route('doctors.index') }}" class="btn btn-danger" style="margin-right: 10px">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </form>
</div>

@endsection
