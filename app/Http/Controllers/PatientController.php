<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Patient;
use App\Http\Resources\Patient as PatientResource;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$patients = Patient::paginate(15);
        $patients = Patient::orderBy('created_at', 'desc')->paginate(5);

        return PatientResource::collection($patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$patient = $request->isMethod('put') ? Patient::findOrFail
        ($request->id) : new Patient;
        */

        $patient = new Patient;
        $patient->id = $request->input('id');
        $patient->nama = $request->input('nama');
        $patient->alamat = $request->input('alamat');
        $patient->jenis_kelamin = $request->input('jenis_kelamin');
        $patient->umur = $request->input('umur');
        $patient->jenis_penyakit = $request->input('jenis_penyakit');
        $patient->nomor_telepon = $request->input('nomor_telepon');


        if($patient->save()) {
            return new PatientResource($patient);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return new PatientResource($patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($patient = Patient::findOrFail($id)) {
            //$patient->id = $request->input('id');
            $patient->nama = $request->input('nama');
            $patient->alamat = $request->input('alamat');
            $patient->jenis_kelamin = $request->input('jenis_kelamin');
            $patient->umur = $request->input('umur');
            $patient->jenis_penyakit = $request->input('jenis_penyakit');
            $patient->nomor_telepon = $request->input('nomor_telepon');
            
            if($patient->save()) {
                return new PatientResource($patient);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        if($patient->delete()) {
            return new PatientResource($patient);
        }
    }
}
