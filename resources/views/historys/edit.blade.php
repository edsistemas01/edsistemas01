@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Historia Clínica</h2>
        <form action="{{ route('historys.update', $history->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="his_date">Fecha</label>
                <input type="text" class="form-control" id="his_date" name="his_date" value="{{ $history->his_date }}" required>
            </div>
            <div class="form-group">
                <label for="his_shift">Turno</label>
                <input type="text" class="form-control" id="his_shift" name="his_shift" value="{{ $history->his_shift }}" required>
            </div>
            <div class="form-group">
                <label for="doctor_id">Doctor</label>
                <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ $history->doctor_id }}" required>
            </div>
            <div class="form-group">
                <label for="patient_id">Paciente</label>
                <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ $history->patient_id }}" required>
            </div>
            <div class="form-group">
                <label for="his_pressure">Presión</label>
                <input type="text" class="form-control" id="his_pressure" name="his_pressure" value="{{ $history->his_pressure }}" required>
            </div>
            {{--  <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ $patient->address }}</textarea>
            </div>  --}}
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection