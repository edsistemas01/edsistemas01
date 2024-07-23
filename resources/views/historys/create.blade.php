@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center">
        
        <div class="col ml-0 pl-0 mr-0 pr-0">
            <!-- Datos de la Cita -->
            <div class="container d-flex justify-content-center pb-4">
                @php
                    use Carbon\Carbon;
                @endphp
                <form action="{{ route('historys.store') }}" method="POST">
                    @csrf
                    <div class="card" style="width: 398px;">
                        <div class="card-header card-header-custom d-flex justify-content-center"><h3>Datos de la Cita</h3></div>
                        <div class="card-body card-body-custom">
                            <div class="table-responsive-sm">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Fecha:</th>
                                            <td>
                                                <input type="text" class="form-control w-50" id="currentDate" name="currentDate" value="{{ Carbon::now('America/Lima')->format('d-m-Y'); }}" readonly required>
                                                <input type="text" class="form-control w-50" id="his_date" name="his_date" value="{{ Carbon::now('America/Lima')->format('Y-m-d'); }}" style="display: none;" readonly required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Turno:</th>
                                            <td>
                                                @php
                                                    $currentHour = Carbon::now()->format('H');

                                                    if ($currentHour >= 5 && $currentHour < 12) {
                                                        $shift = 'MAÑANA';
                                                    } elseif ($currentHour >= 12 && $currentHour < 18) {
                                                        $shift = 'TARDE';
                                                    } else {
                                                        $shift = 'NOCHE';
                                                    }
                                                @endphp
                                                <input type="text" class="form-control w-50" id="his_shift" name="his_shift" value="{{ $shift }}" readonly required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Doctor:</th>
                                            <td>
                                                @foreach ($doctors as $doctor)
                                                    <input type="text" class="form-control w-100" id="doctor_fk" name="doctor_fk" value="{{ $doctor->doc_name }}" readonly required>
                                                    <input type="text" class="form-control w-100" id="doctor_id" name="doctor_id" value="{{$doctor->id}}" style="display: none;" readonly required>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer card-footer-custom text-muted d-flex justify-content-end">
                            {{--  <a href="{{ route('patients.index') }}" class="btn btn-danger" style="margin-right: 10px">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>  --}}
                        </div>
                    </div>
                {{--  </form>  --}}
            </div>

            <!-- Datos del Paciente -->
            <div class="container d-flex justify-content-center">
                {{--  <form action="{{ route('patients.store') }}" method="POST">
                    @csrf  --}}
                    <div class="card" style="width: 398px;">
                        <div class="card-header card-header-custom d-flex justify-content-center"><h3>Datos del Paciente</h3></div>
                        <div class="card-body card-body-custom">
                            <div class="table-responsive-sm">
                                <table>
                                    <thead>
                                        
                                        <tr>
                                            <th>Nombre:</th>
                                            <td>
                                                <input type="text" class="form-control" id="pat_name" name="pat_name" tabindex="1" style="text-transform:uppercase;" autofocus required>
                                            </td>
                                        </tr>
                    
                                        <tr>
                                            <th>Edad:</th>
                                            <td>
                                                <input type="number" class="form-control w-25" id="pat_age" name="pat_age" tabindex="2" required>
                                            </td>
                                        </tr>
                                        
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer card-footer-custom text-muted d-flex justify-content-end">
                            {{--  <a href="{{ route('patients.index') }}" class="btn btn-danger" style="margin-right: 10px">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>  --}}
                        </div>
                    </div>
                {{--  </form>  --}}
            </div>

        </div>
        <div class="col ml-0 pl-0 mr-0 pr-0">
            <!-- Datos de la Consulta Médica -->
            <div class="container d-flex justify-content-center">
                {{--  <form action="{{ route('historys.store') }}" method="POST">
                    @csrf  --}}
                    <div class="card" style="width: 652px;">
                        <div class="card-header card-header-custom d-flex justify-content-center"><h3>Datos de la Consulta Médica</h3></div>
                        <div class="card-body card-body-custom">
                            <div class="table-responsive-sm">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Presión:</th>
                                             {{--  style="width: 8px;"  --}}
                                            <td>
                                                <input type="text" class="form-control w-100" id="his_pressure" name="his_pressure" tabindex="3" style="text-transform:uppercase;" autofocus>
                                            </td>
                                            <th>Diagnóstico:</th>
                                            <td style="width: 300px;">
                                                <textarea class="form-control" id="his_diagnostic" name="his_diagnostic" tabindex="9" style="text-transform:uppercase;" rows="2" cols="10"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>F. Cardiaca:</th>
                                            <td>
                                                <input type="text" class="form-control w-100" id="his_fcardiac" name="his_fcardiac" tabindex="4" style="text-transform:uppercase;">
                                            </td>
                                            <th>Tratamiento:</th>
                                            <td>
                                                <textarea class="form-control" id="his_treatment" name="his_treatment" tabindex="10" style="text-transform:uppercase;" rows="2" cols="10"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Temperatura:</th>
                                            <td>
                                                <input type="text" class="form-control w-100" id="his_temperature" name="his_temperature" tabindex="5" style="text-transform:uppercase;">
                                            </td>
                                            <th>Referencias:</th>
                                            <td>
                                                <textarea class="form-control" id="his_references" name="his_references" tabindex="11" style="text-transform:uppercase;" rows="2" cols="10"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>PP.Oxígeno:</th>
                                            <td>
                                                <input type="text" class="form-control w-100" id="his_ppoxygen" name="his_ppoxygen" tabindex="6">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Glucosa:</th>
                                            <td>
                                                <input type="number" class="form-control w-100" id="his_glucose" name="his_glucose" tabindex="7">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 68px;">Alergias:</th>
                                            <td>
                                                <input type="number" class="form-control w-100" id="his_allergies" name="his_allergies" tabindex="8">
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer card-footer-custom text-muted d-flex justify-content-end">
                            <a href="{{ route('historys.index') }}" class="btn btn-danger" tabindex="12" style="margin-right: 10px">Cancelar</a>
                            <button type="submit" class="btn btn-success" tabindex="13">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
    
</div>









<div class="container">
    <h2>Crear Historia Clínica</h2>
    <table class="table border=0">
        <form action="{{ route('historys.store') }}" method="POST">
            @csrf
            <thead>
                <tr>
                    <th>Fecha:</th>
                    <td>
                        <input type="text" class="form-control" id="his_date" name="his_date" value="{{ now()->format('Y-m-d'); }}" readonly required placeholder="Ingrese fecha actual">
                        {{--  <input type="text" class="form-control" id="his_date" name="his_date" value="{{ old('his_date', $history->his_date ?? '') }}" autofocus required>  --}}
                    </td>
                    <th>Turno:</th>
                    <td>
                        <input type="text" class="form-control" id="his_shift" name="his_shift" style="text-transform:uppercase;" autofocus required placeholder="Ingrese turno">
                    </td>
                    <th>Doctor:</th>
                    <td>
                        <select name="doctor_fk" id="doctor_fk" class="form-control">
                            <option value="">1</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ old('doctor_fk', $history->doctor_fk ?? '') == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->doc_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Paciente:</th>
                    <td>
                        <input type="text" class="form-control" id="patient_fk" name="patient_fk" style="text-transform:uppercase;" placeholder="Ingrese nombre del paciente">
                    </td>
                    
                </tr>
                <tr>
                    <!-- A partir de acá empiezan los datos de la Historia Clínica -->
                    <th>Presión:</th>
                    <td>
                        <input type="text" class="form-control" id="his_pressure" name="his_pressure" style="text-transform:uppercase;" required placeholder="Ingrese presión">
                    </td>
                    <th>F. Cardiaca:</th>
                    <td>
                        <input type="text" class="form-control" id="his_fcardiac" name="his_fcardiac" style="text-transform:uppercase;" required placeholder="Ingrese frecuencia cardiaca">
                    </td>
                    <th>Temperatura:</th>
                    <td>
                        <input type="text" class="form-control" id="his_temperature" name="his_temperature" style="text-transform:uppercase;" placeholder="Ingrese temperatura">
                    </td>
                </tr>
                <tr>
                    <th>PP Oxígeno:</th>
                    <td>
                        <input type="text" class="form-control" id="his_ppoxygen" name="his_ppoxygen" style="text-transform:uppercase;" placeholder="Ingrese presión parcial de oxígeno">
                    </td>
                    <th>Glucosa:</th>
                    <td>
                        <input type="text" class="form-control" id="his_glucose" name="his_glucose" style="text-transform:uppercase;" placeholder="Ingrese glucosa">
                    </td>
                    <th>Alergias:</th>
                    <td>
                        <input type="text" class="form-control" id="his_allergies" name="his_allergies" style="text-transform:uppercase;" placeholder="Ingrese alergias">
                    </td>
                </tr>
                <tr>
                    <th>Diagnóstico:</th>
                    <td colspan=2>
                        <input type="text" class="form-control" id="his_diagnostic" name="his_diagnostic" style="text-transform:uppercase;" placeholder="Ingrese diagnóstico">
                    </td>
                    <th>Tratamiento:</th>
                    <td colspan=3>
                        <input type="text" class="form-control" id="his_treatment" name="his_treatment" style="text-transform:uppercase;" placeholder="Ingrese tratamiento">
                    </td>
                </tr>
                <tr>
                    <th>Referencias:</th>
                    <td colspan=5>
                        <input type="text" class="form-control" id="his_references" name="his_references" style="text-transform:uppercase;" placeholder="Ingrese referencias">
                    </td>
                </tr>
            </thead>
            <a href="{{ route('historys.index') }}" class="btn btn-danger" data-dismiss="modal">
                Cancelar
            </a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </table>
</div>

@endsection