<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\History;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //$historys = DB::table('historys')->get();
        $historys = History::with('patient')->get();
        return view('historys.index', compact('historys'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('historys.create', compact('doctors','patients'));
        //return view('historys.create');
    }

    public function store(Request $request)
    {
        $currentDate = Carbon::now('America/Lima')->format('Y-m-d');

        $request->validate([
            'his_date' => 'required',
            'his_shift' => 'required',
        ]);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $doctor_id = $_POST['doctor_id'];
        }

        $patient_id = DB::table('patients')->insertGetId([
            'pat_name' => strtoupper($request->pat_name),
            'pat_age' => $request->pat_age,
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);

        DB::table('historys')->insertGetId([
            'his_date' => $request->his_date,
            'his_shift' => strtoupper($request->his_shift),
            'doctor_id' => $doctor_id,
            'patient_id' => $patient_id,
            /* 'his_pressure' => $request->his_pressure,
            'his_fcardiac' => $request->his_fcardiac,
            'his_temperature' => $request->his_temperature,
            'his_ppoxygen' => $request->his_ppoxygen,
            'his_glucose' => strtoupper($request->his_glucose),
            'his_allergies' => strtoupper($request->his_allergies),
            'his_diagnostic' => strtoupper($request->his_diagnostic),
            'his_treatment' => strtoupper($request->his_treatment),
            'his_references' => strtoupper($request->his_references), */
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);

        return redirect()->route('historys.index')
            ->with('success', 'Historia Clínica creada con éxito.');
    }

    public function show($id)
    {
        //$history = DB::table('historys')->where('id', $id)->first();
        $history = History::with('patient')->where('id', $id)->first();
        return view('historys.show', compact('history'));
    }

    public function edit($id)
    {
        $history = DB::table('historys')->where('id', $id)->first();
        return view('historys.edit', compact('history'));
    }

    public function update(Request $request, $history)
    {
        $currentDate = Carbon::now('America/Lima')->format('Y-m-d');

        $request->validate([
            'his_date' => 'required',
            'his_shift' => 'required',
        ]);

        DB::table('historys')->where('id', $history)->update([
            'his_date' => $request->his_date,
            'his_shift' => strtoupper($request->his_shift),
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'his_pressure' => $request->his_pressure,
            'his_fcardiac' => $request->his_fcardiac,
            'his_temperature' => $request->his_temperature,
            'his_ppoxygen' => $request->his_ppoxygen,
            'his_glucose' => strtoupper($request->his_glucose),
            'his_allergies' => strtoupper($request->his_allergies),
            'his_diagnostic' => strtoupper($request->his_diagnostic),
            'his_treatment' => strtoupper($request->his_treatment),
            'his_references' => strtoupper($request->his_references),
            'updated_at' => $currentDate,
        ]);

        return redirect()->route('historys.index')
            ->with('success', 'Historia Clínica actualizada con éxito.');
    }

    public function destroy($id)
    {
        DB::table('historys')->where('id', $id)->delete();

        return redirect()->route('historys.index')
            ->with('success', 'Historia Clínica eliminada con éxito.');
    }

}
