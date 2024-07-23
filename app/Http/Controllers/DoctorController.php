<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$doctors = DB::table('doctors')->get();
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentDate = Carbon::now('America/Lima')->format('Y-m-d');

        DB::table('doctors')->insert([
            'doc_id' => $request->doc_id,
            'doc_name' => strtoupper($request->doc_name),
            'doc_speciality' => strtoupper($request->doc_speciality),
            'doc_phone' => $request->doc_phone,
            'doc_email' => $request->doc_email,
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);

        return redirect()->route('doctors.index')
        ->with('success', 'Doctor creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $currentDate = Carbon::now('America/Lima')->format('Y-m-d');

        DB::table('doctors')->where('id', $id)->update([
            'doc_id' => $request->doc_id,
            'doc_name' => strtoupper($request->doc_name),
            'doc_speciality' => strtoupper($request->doc_speciality),
            'doc_phone' => $request->doc_phone,
            'doc_email' => $request->doc_email,
            'updated_at' => $currentDate,
        ]);

        return redirect()->route('doctors.index')
        ->with('success', 'Doctor actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('doctors')->where('id', $id)->delete();

        return redirect()->route('doctors.index')
        ->with('success', 'Doctor eliminado satisfactoriamente.');

    }

}
