<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = DB::table('patients')->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentDate = Carbon::now('America/Lima')->format('Y-m-d');

        DB::table('patients')->insert([
            'pat_id' => $request->pat_id,
            'pat_name' => strtoupper($request->pat_name),
            'pat_sex' => strtoupper($request->pat_sex),
            'pat_age' => $request->pat_age,
            'pat_phone' => $request->pat_phone,
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);

        return redirect()->route('patients.index')
        ->with('success', 'Paciente creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = DB::table('patients')->where('id', $id)->first();
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = DB::table('patients')->where('id', $id)->first();
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $currentDate = Carbon::now('America/Lima')->format('Y-m-d');

        DB::table('patients')->where('id', $id)->update([
            'pat_id' => $request->pat_id,
            'pat_name' => strtoupper($request->pat_name),
            'pat_sex' => strtoupper($request->pat_sex),
            'pat_age' => $request->pat_age,
            'pat_phone' => $request->pat_phone,
            'updated_at' => $currentDate,
        ]);

        return redirect()->route('patients.index')
        ->with('success', 'Paciente actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('patients')->where('id', $id)->delete();

        return redirect()->route('patients.index')
        ->with('success', 'Paciente eliminado satisfactoriamente.');
    }
}
