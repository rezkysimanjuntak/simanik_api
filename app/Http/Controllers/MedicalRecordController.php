<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\MedicalRecord;
use App\Http\Resources\MedicalRecord as MedicalRecordResource;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$medicalrecords = MedicalRecord::paginate(15);
        $medicalrecords = MedicalRecord::orderBy('created_at', 'desc')->paginate(5);

        return MedicalRecordResource::collection($medicalrecords);
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
        /*$medicalrecord = $request->isMethod('put') ? MedicalRecord::findOrFail
        ($request->id) : new MedicalRecord;
        */

        $medicalrecord = new MedicalRecord;
        $medicalrecord->id = $request->input('id');
        $medicalrecord->nama_pasien = $request->input('nama_pasien');
        $medicalrecord->nama_dokter = $request->input('nama_dokter');
        $medicalrecord->jenis_penyakit = $request->input('jenis_penyakit');
        $medicalrecord->tanggal = $request->input('tanggal');
        $medicalrecord->total_biaya = $request->input('total_biaya');

        if($medicalrecord->save()) {
            return new MedicalRecordResource($medicalrecord);
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
        $medicalrecord = MedicalRecord::findOrFail($id);

        return new MedicalrecordResource($medicalrecord);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalrecord = MedicalRecord::findOrFail($id);

        if($medicalrecord->delete()) {
            return new MedicalRecordResource($medicalrecord);
        }
    }
}
